<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Key;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Traits\StorageImageTrait;
use App\Traits\DeleteRecordTrait;
use App\Traits\ParagraphTrait;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Admin\ValidateAddPost;
use App\Http\Requests\Admin\ValidateEditPost;

use App\Exports\ExcelExportsDatabase;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ExcelImportsDatabase;

class AdminKeyController extends Controller
{
    use StorageImageTrait, DeleteRecordTrait, ParagraphTrait;
    private $key;
    private $htmlselect;
    private $langConfig;
    private $langDefault;
    private $configParagraph;


    public function __construct(Key $key)
    {
        $this->key = $key;
    }
    //
    public function index(Request $request)
    {
        $data = $this->key;
        $where = [];
        $orWhere = null;
        if ($request->input('keyword')) {

            $data = $data->where([
                ['slug', 'like', '%' . request()->input('keyword') . '%']
            ]);
        }
        if ($request->has('type') && $request->input('type')) {
            $key = $request->input('type');
            switch ($key) {
                case '1':
                    $where[] = ['type', '=', 1];
                    break;
                case '2':
                    $where[] = ['type', '=', 2];
                    break;
                case '3':
                    $where[] = ['type', '=', 3];
                    break;
                case '4':
                    $where[] = ['type', '=', 4];
                    break;
                default:
                    break;
            }
        }
        if ($where) {
            $data = $data->where($where);
        }
        if ($request->input('order_with')) {
            $key = $request->input('order_with');
            switch ($key) {
                case 'dateASC':
                    $orderby = ['created_at'];
                    break;
                case 'dateDESC':
                    $orderby = [
                        'created_at',
                        'DESC'
                    ];
                    break;
                case 'viewASC':
                    $orderby = [
                        'view',
                        'ASC'
                    ];
                    break;
                case 'viewDESC':
                    $orderby = [
                        'view',
                        'DESC'
                    ];
                    break;
                default:
                    $orderby =  $orderby = [
                        'created_at',
                        'DESC'
                    ];
                    break;
            }
            $data = $data->orderBy(...$orderby);
        } else {
            $data = $data->orderBy("created_at", "DESC");
        }
        $data = $data->paginate(15);

        return view(
            "admin.pages.key.list",
            [
                'data' => $data,
                'keyword' => $request->input('keyword') ? $request->input('keyword') : "",
                'type' => $request->input('type') ? $request->input('type') : "",
                'order_with' => $request->input('order_with') ? $request->input('order_with') : "",
            ]
        );
    }

    public function destroy($id)
    {
        try {
            $this->key->find($id)->delete();
            return response()->json([
                "code" => 200,
                "message" => "success"
            ], 200);
        } catch (\Exception $exception) {
            Log::error('message' . $exception->getMessage() . 'line :' . $exception->getLine());
            return response()->json([
                "code" => 500,
                "message" => "fail"
            ], 500);
        }
    }
}
