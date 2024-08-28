<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Traits\StorageImageTrait;
use App\Traits\DeleteRecordTrait;
use App\Models\Comment;
use DB;
use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
session_start();

class AdminPostCommentController extends Controller
{
    //
    use StorageImageTrait, DeleteRecordTrait;
    private $comment;
    public function __construct(
        Comment $comment
    ) {
        $this->comment = $comment;
    }
    public function index(Request $request)
    {
        $data = $this->comment;
        // if ($request->input('category')) {
        //     $categoryPostId = $request->input('category');
        //     $idCategorySearch = $this->categoryPost->getALlCategoryChildren($categoryPostId);
        //     $idCategorySearch[] = (int)($categoryPostId);
        //     $data = $data->whereIn('posts.category_id', $idCategorySearch);
        //     $htmlselect = $this->categoryPost->getHtmlOption($categoryPostId);
        // } else {
        //     $htmlselect = $this->categoryPost->getHtmlOption();
        // }
        $where = [];
        if ($request->input('keyword')) {
            // $where[] = ['name', 'like', '%' . $request->input('keyword') . '%'];
            $data = $data->where([
                ['content', 'like', '%' . request()->input('keyword') . '%']
            ]);
        }
        // if ($request->has('fill_active') && $request->input('fill_active')) {
        //     $key = $request->input('fill_active');
        //     switch ($key) {
        //         case '2':
        //             $where[] = ['active', '=', 0];
        //             break;
        //         case '1':
        //             $where[] = ['active', '=', 1];
        //             break;
        //         default:
        //             break;
        //     }
        // }
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
                default:
                    $orderby =  $orderby = [
                        'created_at',
                        'DESC'
                    ];
                    break;
            }
            $data = $data->orderBy(...$orderby);
        } else {
            $data = $data->latest();
            //dd($data);
        }
        $data = $data->paginate(15);

        return view("admin.pages.comment.list",
            [
                'data' => $data,
                //  'option' => $htmlselect,
                'keyword' => $request->input('keyword') ? $request->input('keyword') : "",
                'order_with' => $request->input('order_with') ? $request->input('order_with') : "",
                'fill_action' => $request->input('fill_action') ? $request->input('fill_action') : "",
                'fill_status' => $request->input('fill_status') ? $request->input('fill_status') : "",
                'fill_active' => $request->input('fill_active') ? $request->input('fill_active') : "",
            ]
        );
    }

    public function activeComment($id){
        DB::table('comments')->where('id', $id)->update(['active'=>0]);
        session::put('message', 'Comment đã bị ẩn');
        return Redirect::to(route('admin.post.comment.index'));
    }
    public function unactiveComment($id){
        DB::table('comments')->where('id', $id)->update(['active'=>1]);
        session::put('message', 'Comment đã được hiện');
        return Redirect::to(route('admin.post.comment.index'));
    }
    public function deleteComment($id){
        DB::table('comments')->where('id', $id)->delete();
        session::put('message', 'Xóa comment thành công');
        return Redirect::to(route('admin.post.comment.index'));
    }

    public function destroy($id)
    {
        return $this->deleteTrait($this->comment, $id);
    }

}
