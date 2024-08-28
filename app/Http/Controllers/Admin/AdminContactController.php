<?php

namespace App\Http\Controllers\Admin;

use App\Models\Contact;
use Illuminate\Http\Request;
use App\Traits\DeleteRecordTrait;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ExcelExportContact;

class AdminContactController extends Controller
{
    use DeleteRecordTrait;
    private  $contact;
    private $listStatus;
    public function __construct(Contact $contact)
    {
        $this->contact = $contact;
        $this->listStatus = $this->contact->listStatus;
    }
    public function index(Request $request)
    {
        $contacts = $this->contact;

        //   $a=  \DB::table('contacts')
        //     ->select('status', \DB::raw('count(*) as total'))
        //     ->groupBy('status')->get();
        //     dd($a);

        // $collection =  $this->contact->groupBy('status')
        // ->selectRaw('count(*) as total, status')
        // ->get();
        // dd($collection);

        $contactGroupByStatus = $this->contact->where('status', '<>', -1)->select($this->contact->where('status', '<>', -1)->raw('count(status) as total'), 'status')->groupBy('status')->get();
        $totalContact = $this->contact->all()->count();

        $dataContactGroupByStatus = $this->listStatus;
        foreach ($contactGroupByStatus as $item) {
            $dataContactGroupByStatus[$item->status]['total'] = $item->total;
        }



        $where = [];
        if ($request->has('keyword') && $request->input('keyword')) {
            $where[] = ['name', 'like', '%' . $request->input('keyword') . '%'];
        }
        if ($request->has('status') && $request->input('status')) {
            $where[] = ['status', $request->input('status')];
        }
        if ($where) {
            $contacts = $contacts->where($where);
        }
        $orderby = [];
        if ($request->has('order_with') && $request->input('order_with')) {
            $key = $request->input('order_with');
            switch ($key) {
                case 'dateASC':
                    $orderby[] = ['created_at'];
                    break;
                case 'dateDESC':
                    $orderby[] = [
                        'created_at',
                        'DESC'
                    ];
                    break;
                case 'statusASC':
                    $orderby[] = ['status', 'ASC'];
                    $orderby[] = ['created_at', 'DESC'];
                    break;
                case 'statusDESC':
                    $orderby[] = ['status', 'DESC'];
                    $orderby[] = [
                        'created_at',
                        'DESC'
                    ];
                    break;
                default:
                    $orderby[] = [
                        'created_at',
                        'DESC'
                    ];
                    break;
            }
            foreach ($orderby as $or) {
                $contacts = $contacts->orderBy(...$or);
            }
        } else {
            $contacts = $contacts->orderBy("created_at", "DESC");
        }
        $contacts =  $contacts->paginate(15);
        return view('admin.pages.contact.index', [
            'dataContactGroupByStatus' => $dataContactGroupByStatus,
            'totalContact' => $totalContact,
            'data' => $contacts,
            'listStatus' => $this->listStatus,
            'keyword' => $request->input('keyword') ? $request->input('keyword') : "",
            'order_with' => $request->input('order_with') ? $request->input('order_with') : "",
            'statusCurrent' => $request->input('status') ? $request->input('status') : "",
        ]);
    }
    public function loadNextStepStatus(Request $request)
    {
        $id = $request->id;
        $contact = $this->contact->find($id);
        $status = $contact->status;
        switch ($status) {
            case -1:
                break;
            case 1:
                $status += 1;
                break;
            case 2:
                break;
            default:
                break;
        }
        $contact->update([
            'status' => $status,
        ]);
        return response()->json([
            'code' => 200,
            'htmlStatus' => view('admin.components.status', [
                'dataStatus' => $contact,
                'listStatus' => $this->listStatus,
            ])->render(),
            'messange' => 'success'
        ], 200);
    }
    public function loadContactDetail($id)
    {

        $contact = $this->contact->find([$id]);

        return response()->json([
            'code' => 200,
            'htmlTransactionDetail' => view('admin.components.contact-detail', [
                'data' => $contact,
                'listStatus' => $this->listStatus,
            ])->render(),
            'messange' => 'success'
        ], 200);
    }

    public function destroy($id)
    {
        return $this->deleteTrait($this->contact, $id);
    }

    public function show($id)
    {
        $contacts = $this->contact->find($id);
        return view('admin.pages.transaction.show', [
            'data' => $contacts,
        ]);
    }
    public function excelExportDatabase(Request $request)
    {
        $contacts = $this->contact;
        $where = [];
        if ($request->has('keyword') && $request->input('keyword')) {
            $where[] = ['name', 'like', '%' . $request->input('keyword') . '%'];
        }
        if ($request->has('status') && $request->input('status')) {
            $where[] = ['status', $request->input('status')];
        }
        if ($where) {
            $contacts = $contacts->where($where);
        }
        $orderby = [];
        if ($request->has('order_with') && $request->input('order_with')) {
            $key = $request->input('order_with');
            switch ($key) {
                case 'dateASC':
                    $orderby[] = ['created_at'];
                    break;
                case 'dateDESC':
                    $orderby[] = [
                        'created_at',
                        'DESC'
                    ];
                    break;
                case 'statusASC':
                    $orderby[] = ['status', 'ASC'];
                    $orderby[] = ['created_at', 'DESC'];
                    break;
                case 'statusDESC':
                    $orderby[] = ['status', 'DESC'];
                    $orderby[] = [
                        'created_at',
                        'DESC'
                    ];
                    break;
                default:
                    $orderby[] = [
                        'created_at',
                        'DESC'
                    ];
                    break;
            }
            foreach ($orderby as $or) {
                $contacts = $contacts->orderBy(...$or);
            }
        } else {
            $contacts = $contacts->orderBy("created_at", "DESC");
        }
        $data = $contacts->get();
        $dataCSV = $data->map(function ($item) {
            return [
                isset($item->name) && !empty($item->name) ? $item->name  : '--',
                isset($item->email) && !empty($item->email) ? $item->email : '--',
                isset($item->phone) && !empty($item->phone) ? $item->phone : '--',
                isset($item->content) && !empty($item->content) ? $item->content : '--',
                isset($item->created_at) && !empty($item->created_at) ? $item->created_at : '--',
            ];
        });
        $dataCSV = $dataCSV->toArray();
        $nameFile = 'contact-' . date('d-m-Y') . '.xlsx';
        return  Excel::download(new ExcelExportContact('contact', $dataCSV, 'admin.pages.contact.export', [
            'STT',
            'Tên',
            'Email',
            'Số điện thoại',
            'Nội dung',
            'Thời gian đăng ký',
        ]), $nameFile);
    }
}
