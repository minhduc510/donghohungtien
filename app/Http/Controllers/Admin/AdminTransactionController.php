<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Transaction;
use App\Models\DiscountCode;
use App\Traits\DeleteRecordTrait;
use PDF;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ExcelExportContact;
use App\Traits\PointTrait;

use App\Http\Requests\Admin\ValidateAddDiscount;
use App\Http\Requests\Admin\ValidateEditDiscount;

use App\Mail\TransactionEmail;
use App\Mail\DiscountEmail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rules\EmailRule;
use Illuminate\Support\Facades\Log;

use DB;

class AdminTransactionController extends Controller
{
    //
    use DeleteRecordTrait, PointTrait;
    private  $transaction;
    private  $discount;
    private $unit;
    private $listStatus;
    private $typePoint;
    private $rose;
    public function __construct(Transaction $transaction, DiscountCode $discount)
    {
        $this->transaction = $transaction;
        $this->discount = $discount;
        $this->unit = "đ";
        $this->listStatus = $this->transaction->listStatus;
        $this->typePoint = config('point.typePoint');
        $this->rose = config('point.rose');
    }
    public function index(Request $request)
    {
        //thống kê giao dịch
        $transactionGroupByStatus = $this->transaction->select($this->transaction->raw('count(status) as total'), 'status')->groupBy('status')->get();
        $totalTransaction = $this->transaction->get()->count();

        $dataTransactionGroupByStatus = $this->listStatus;
        foreach ($transactionGroupByStatus as $item) {
            $dataTransactionGroupByStatus[$item->status]['total'] = $item->total;
        }
        //    dd($dataTransactionGroupByStatus);

        $transactions = $this->transaction;
        $where = [];
        $orWhere = null;
        if ($request->has('keyword') && $request->input('keyword')) {

            $transactions = $transactions->where(function ($query) {
                $query->where([
                    ['name', 'like', '%' . request()->input('keyword') . '%']
                ])->orWhere([
                    ['id', 'like', '%' . request()->input('keyword') . '%']
                ]);
            });
            // $where[] = ['name', 'like', '%' . $request->input('keyword') . '%'];
            // $orWhere = ['code', 'like', '%' . $request->input('keyword') . '%'];
        }
        if ($request->has('status') && $request->input('status')) {
            $where[] = ['status', $request->input('status')];
        }
        if ($where) {
            $transactions = $transactions->where($where);
        }
        if ($orWhere) {
            $transactions = $transactions->orWhere(...$orWhere);
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
                    $orderby[]  = [
                        'created_at',
                        'DESC'
                    ];
                    break;
            }
            foreach ($orderby as $or) {
                $transactions = $transactions->orderBy(...$or);
            }
        } else {
            $transactions = $transactions->orderBy("created_at", "DESC");
        }

        $transactions =  $transactions->paginate(15);
        return view('admin.pages.transaction.index', [
            'data' => $transactions,
            'dataTransactionGroupByStatus' => $dataTransactionGroupByStatus,
            'totalTransaction' => $totalTransaction,
            'listStatus' => $this->listStatus,
            'keyword' => $request->input('keyword') ? $request->input('keyword') : "",
            'order_with' => $request->input('order_with') ? $request->input('order_with') : "",
            'statusCurrent' => $request->input('status') ? $request->input('status') : "",
        ]);
    }
    public function discount(Request $request)
    {
        $discount = $this->discount;
        $where = [];
        $orWhere = null;
        if ($request->has('keyword') && $request->input('keyword')) {

            $discount = $discount->where(function ($query) {
                $query->where([
                    ['name', 'like', '%' . request()->input('keyword') . '%']
                ])->orWhere([
                    ['id', 'like', '%' . request()->input('keyword') . '%']
                ]);
            });
        }
        // if ($request->has('status') && $request->input('status')) {
        //     $where[] = ['status', $request->input('status')];
        // }
        if ($where) {
            $discount = $discount->where($where);
        }
        if ($orWhere) {
            $discount = $discount->orWhere(...$orWhere);
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
                    $orderby[]  = [
                        'created_at',
                        'DESC'
                    ];
                    break;
            }
            foreach ($orderby as $or) {
                $discount = $discount->orderBy(...$or);
            }
        } else {
            $discount = $discount->orderBy("created_at", "DESC");
        }

        $discount =  $discount->paginate(15);
        return view('admin.pages.discount.list', [
            'data' => $discount,
            // 'dataTransactionGroupByStatus' => $dataTransactionGroupByStatus,
            // 'totalTransaction' => $totalTransaction,
            // 'listStatus' => $this->listStatus,
            'keyword' => $request->input('keyword') ? $request->input('keyword') : "",
            'order_with' => $request->input('order_with') ? $request->input('order_with') : "",
            // 'statusCurrent' => $request->input('status') ? $request->input('status') : "",
        ]);
    }
    public function loadNextStepStatus(Request $request)
    {
        $id = $request->id;
        $transaction = $this->transaction->find($id);
        $status = $transaction->status;

        $dataUpdate = [];
        switch ($status) {
            case -1:
                break;
            case 1:
                $status += 1;
                break;
            case 2:
                $status += 1;
                break;
            case 3:
                $status += 1;
                break;
            case 4:
                break;
            default:
                break;
        }
        $dataUpdate['status'] = $status;
        $transaction->update($dataUpdate);
        return response()->json([
            'code' => 200,
            'htmlStatus' => view('admin.components.status', [
                'dataStatus' => $transaction,
                'listStatus' => $this->listStatus,
            ])->render(),
            'messange' => 'success'
        ], 200);
    }
    public function loadTransactionDetail($id)
    {
        $orders = $this->transaction->find($id)->orders()->get();
        return response()->json([
            'code' => 200,
            'htmlTransactionDetail' => view('admin.components.transaction-detail', [
                'orders' => $orders,
            ])->render(),
            'messange' => 'success'
        ], 200);
    }

    public function destroy($id)
    {
        return $this->deleteTrait($this->transaction, $id);
    }

    public function loadThanhtoan($id)
    {
        $transaction   =  $this->transaction->find($id);
        $thanhtoan = $transaction->thanhtoan;

        if ($thanhtoan) {
            $thanhtoanUpdate = 0;
        } else {
            $thanhtoanUpdate = 1;
        }
        $updateResult =  $transaction->update([
            'thanhtoan' => $thanhtoanUpdate,
        ]);

        $transaction   =  $this->transaction->find($id);
        if ($updateResult) {
            return response()->json([
                "code" => 200,
                "html" => view('admin.components.load-change-thanhtoan', ['data' => $transaction])->render(),
                "message" => "success"
            ], 200);
        } else {
            return response()->json([
                "code" => 500,
                "message" => "fail"
            ], 500);
        }
    }


    public function show($id)
    {
        $transactions = $this->transaction->find($id);
        return view('admin.pages.transaction.show', [
            'data' => $transactions,
            "unit" => $this->unit,
        ]);
    }
    public function exportPdfTransactionDetail($id)
    {

        $transactions = $this->transaction->find($id);
        $unit = $this->unit;
        $data = $transactions;
        $pdf = \App::make('dompdf.wrapper');

        $pdf->loadView("admin.pages.transaction.show-pdf", compact('data'), compact('unit'));

        return $pdf->download("transaction.pdf");
    }

    public function editDis(Request $request)
    {
        if ($request->ajax()) {
            if ($request->id_prod) {
                $id_prod = $request->id_prod;
                $discount = $this->discount->find($id_prod);

                $discount_id = $discount->id;

                $discount_name = $discount->name;
                $discount_created_at = $discount->created_at;
                $discount_end_date = $discount->end_date;
                $discount_price_is_reduced = $discount->price_is_reduced;


                //echo json_encode($output);
                return response()->json([
                    'code' => 200,
                    'html' => view('admin.components.load-change-discount', [
                        'discount_name' => $discount_name,
                        'discount_created_at' => $discount_created_at,
                        'discount_end_date' => $discount_end_date,
                        'discount_id' => $discount_id,
                        'discount_price_is_reduced' => $discount_price_is_reduced,
                    ])->render(),
                    'messange' => 'success'
                ], 200);
            }
        }
    }
    public function updateDis(Request $request, $id)
    {
        if ($id) {

            try {
                DB::beginTransaction();
                $dataAdminDiscountUpdate = [
                    "name" => $request->input('name'),
                    "price_is_reduced" => $request->input('price_is_reduced') ?? 0,
                ];
                if ($request->has('created_at') && $request->input('created_at')) {
                    $dataAdminDiscountUpdate['created_at'] = $request->created_at;
                }
                if ($request->has('end_date') && $request->input('end_date')) {
                    $dataAdminDiscountUpdate['end_date'] = $request->end_date;
                }
                // insert database in product table
                $this->discount->find($id)->update($dataAdminDiscountUpdate);
                $discount = $this->discount->find($id);

                $emails = User::where('active', 1)->pluck('email')->toArray();
                //dd($emails);
                DB::commit();
                Mail::to($emails)->send(new DiscountEmail($discount));
                return redirect()->route('admin.discount.index')->with("msg", "Gửi mã giảm giá thành công!");
            } catch (\Exception $exception) {
                DB::rollBack();
                Log::error('message' . $exception->getMessage() . 'line :' . $exception->getLine());
                return redirect()->route('admin.discount.index')->with("msg", "Gửi mã giảm giá không thành công");
            }
        }
    }

    public function createDiscount(Request $request = null)
    {
        $discount = $this->discount->all();
        return view(
            "admin.pages.discount.add",
            [
                'request' => $request,
                'discount' => $discount,
            ]
        );
    }
    public function storeDiscount(ValidateAddDiscount $request)
    {
        try {
            DB::beginTransaction();
            $dataAdminDiscountCreate = [
                "name" => $request->input('name'),
                "price_is_reduced" => $request->input('price_is_reduced') ?? 0,
            ];
            if ($request->has('created_at') && $request->input('created_at')) {
                $dataAdminDiscountCreate['created_at'] = $request->created_at;
            }
            if ($request->has('end_date') && $request->input('end_date')) {
                $dataAdminDiscountCreate['end_date'] = $request->end_date;
            }
            //dd($dataAdminDiscountCreate);
            // insert database in user table
            $discount = $this->discount->create($dataAdminDiscountCreate);
            DB::commit();
            return redirect()->route('admin.discount.index')->with("alert", "Thêm mã giảm giá thành công");
        } catch (\Exception $exception) {
            //throw $th;
            dd($exception);
            DB::rollBack();
            Log::error('message' . $exception->getMessage() . 'line :' . $exception->getLine());
            return redirect()->route('admin.discount.index')->with("error", "Thêm mã giảm giá không thành công");
        }
    }
    public function editDiscount($id)
    {
        $data = $this->discount->find($id);

        return view("admin.pages.discount.edit", [
            'data' => $data,
        ]);
    }

    public function updateDiscount(ValidateEditDiscount $request, $id)
    {
        try {
            DB::beginTransaction();
            $dataAdminDiscountUpdate = [
                "name" => $request->input('name'),
                "price_is_reduced" => $request->input('price_is_reduced') ?? 0,
            ];
            if ($request->has('created_at') && $request->input('created_at')) {
                $dataAdminDiscountUpdate['created_at'] = $request->created_at;
            }
            if ($request->has('end_date') && $request->input('end_date')) {
                $dataAdminDiscountUpdate['end_date'] = $request->end_date;
            }
            // insert database in product table
            $this->discount->find($id)->update($dataAdminDiscountUpdate);
            $discount = $this->discount->find($id);

            DB::commit();
            return redirect()->route('admin.discount.index')->with("alert", "Sửa mã giảm giá thành công");
        } catch (\Exception $exception) {
            //throw $th;
            DB::rollBack();
            Log::error('message' . $exception->getMessage() . 'line :' . $exception->getLine());
            return redirect()->route('admin.discount.index')->with("error", "Sửa mã giảm giá không thành công");
        }
    }

    public function destroyDiscount($id)
    {
        return $this->deleteTrait($this->discount, $id);
    }

    public function excelExportDatabase(Request $request)
    {
        $transactions = $this->transaction;
        $where = [];
        $orWhere = null;
        if ($request->has('keyword') && $request->input('keyword')) {

            $transactions = $transactions->where(function ($query) {
                $query->where([
                    ['name', 'like', '%' . request()->input('keyword') . '%']
                ])->orWhere([
                    ['id', 'like', '%' . request()->input('keyword') . '%']
                ]);
            });
            // $where[] = ['name', 'like', '%' . $request->input('keyword') . '%'];
            // $orWhere = ['code', 'like', '%' . $request->input('keyword') . '%'];
        }
        if ($request->has('status') && $request->input('status')) {
            $where[] = ['status', $request->input('status')];
        }
        if ($where) {
            $transactions = $transactions->where($where);
        }
        if ($orWhere) {
            $transactions = $transactions->orWhere(...$orWhere);
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
                    $orderby[]  = [
                        'created_at',
                        'DESC'
                    ];
                    break;
            }
            foreach ($orderby as $or) {
                $transactions = $transactions->orderBy(...$or);
            }
        } else {
            $transactions = $transactions->orderBy("created_at", "DESC");
        }
        $data = $transactions->get();
        $dataCSV = $data->map(function ($item) {
            return [
                'MGD0' . $item->id,
                $item->name,
                $item->phone,
                $item->address_detail,
                $item->note,
                optional($item->setting)->name,
                number_format($item->total) . ' vnđ',
                $item->user_id ? 'Thành viên' : 'Khách vãng lai',

                $item->thanhtoan == 1 ? 'Đã thanh toán' : 'Chưa thanh toán',
                $item->created_at
            ];
        });
        $dataCSV = $dataCSV->toArray();
        $nameFile = 'transactions-' . date('d-m-Y') . '.xls';
        return Excel::download(new ExcelExportContact('transaction', $dataCSV, 'admin.pages.transaction.export', [
            'STT',
            'Mã giao dịch',
            'Tên',
            'Số điện thoại',
            'Địa chỉ',
            'Ghi chú',
            'Hình thức thanh toán',
            'Tổng tiền',
            'Tài khoản',
            // 'Trạng thái',
            'Thanh toán',
            'Thời gian đặt mua',
        ]), $nameFile);
    }
}
