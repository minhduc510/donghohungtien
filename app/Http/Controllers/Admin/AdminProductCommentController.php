<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ProductComment;
use App\Traits\DeleteRecordTrait;
use PDF;
use App\Traits\PointTrait;

class AdminProductCommentController extends Controller
{
    //
    use DeleteRecordTrait, PointTrait;
    private  $productcomment;
    private $unit;
    private $listStatus;
    private $typePoint;
    private $rose;
    public function __construct(ProductComment $productComment)
    {
        $this->productcomment = $productComment;
    }
    public function index(Request $request)
    {
        $productComment = $this->productcomment;
        $where = [];
        $orWhere = null;
        if ($request->has('keyword') && $request->input('keyword')) {

            $productComment = $productComment->where(function ($query) {
                $query->where([
                    ['email', 'like', '%' . request()->input('keyword') . '%']
                ])->orWhere([
                    ['title', 'like', '%' . request()->input('keyword') . '%']
                ]);
            });
            // $where[] = ['name', 'like', '%' . $request->input('keyword') . '%'];
            // $orWhere = ['code', 'like', '%' . $request->input('keyword') . '%'];
        }
        if ($request->has('hot') && $request->input('hot')) {
            $where[] = ['hot', $request->input('hot')];
        }
        if ($where) {
            $productComment = $productComment->where($where);
        }
        if ($orWhere) {
            $productComment = $productComment->orWhere(...$orWhere);
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
                $productComment = $productComment->orderBy(...$or);
            }
        } else {
            $productComment = $productComment->orderBy("created_at", "DESC");
        }

        $productComment =  $productComment->paginate(15);
        return view('admin.pages.comment.list-product', [
            'data' => $productComment,
            'keyword' => $request->input('keyword') ? $request->input('keyword') : "",
            'order_with' => $request->input('order_with') ? $request->input('order_with') : "",
            'statusCurrent' => $request->input('hot') ? $request->input('hot') : "",
        ]);
    }

    public function destroy($id)
    {
        return $this->deleteTrait($this->productcomment, $id);
    }

    public function loadHot($id)
    {
        $productComment   =  $this->productcomment->find($id);
        $active = $productComment->active;

        if ($active) {
            $activeUpdate = 0;
        } else {
            $activeUpdate = 1;
        }
        $updateResult =  $productComment->update([
            'active' => $activeUpdate,
        ]);

        $productComment   =  $this->productcomment->find($id);
        if ($updateResult) {
            return response()->json([
                "code" => 200,
                "html" => view('admin.components.load-change-hot1', ['data' => $productComment, 'type' => 'sản phẩm'])->render(),
                "message" => "success"
            ], 200);
        } else {
            return response()->json([
                "code" => 500,
                "message" => "fail"
            ], 500);
        }
    }
}
