@extends('admin.layouts.main')
@section('title',"Danh sach bài viết")
@section('css')
@endsection
@section('content')
    <div class="content-wrapper lb_template_list_post">

    @include('admin.partials.content-header',['name'=>"Comment bài viết","key"=>"Danh sách comment"])

    <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        @if(session("alert"))
                            <div class="alert alert-success">
                                {{session("alert")}}
                            </div>
                        @elseif(session('error'))
                            <div class="alert alert-warning">
                                {{session("error")}}
                            </div>
                        @endif
                        @php
                            $message = Session::get('message');
                            if($message){
                                echo '<div class="alert alert-success">'.$message.'</div>';
                                Session::put('message', null);
                            }
                        @endphp

                        <div class="card card-outline card-primary">
                            <div class="card-header">
                                <div class="card-tools w-100 mb-3">
                                    <form action="{{ route('admin.post.comment.index') }}" method="GET">
                                        <div class="row">
                                            <div class="col-md-10">
                                                <div class="row">
                                                    <div class="form-group col-md-9 mb-0">
                                                        <input id="keyword" value="{{ $keyword }}" name="keyword" type="text" class="form-control" placeholder="Nội dung comment">
                                                        <div id="keyword_feedback" class="invalid-feedback">

                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-3 mb-0" style="min-width:100px;">
                                                        <select id="order" name="order_with" class="form-control">
                                                            <option value="">-- Sắp xếp theo --</option>
                                                            <option value="dateASC" {{ $order_with=='dateASC'? 'selected':'' }}>Ngày tạo tăng dần</option>
                                                            <option value="dateDESC" {{ $order_with=='dateDESC'? 'selected':'' }}>Ngày tạo giảm dần</option>
                                                            {{-- <option value="viewASC" {{ $order_with=='viewASC'? 'selected':'' }}>Lượt xem tăng dần</option>
                                                            <option value="viewDESC" {{ $order_with=='viewDESC'? 'selected':'' }}>Lượt xem giảm dần</option> --}}
                                                        </select>
                                                    </div>
                                                    {{-- <div class="form-group col-md-2 mb-0" style="min-width:100px;">
                                                        <select id="" name="fill_action" class="form-control">
                                                            <option value="">-- Lọc --</option>
                                                            <option value="hot" {{ $fill_action=='hot'? 'selected':'' }}>Bài viết nổi bật</option>
                                                            <option value="noHot" {{ $fill_action=='noHot'? 'selected':'' }}>Bài viết không nổi bật</option>
                                                        </select>
                                                    </div> --}}
                                                    {{-- <div class="form-group col-md-2 mb-0" style="min-width:100px;">
                                                        <select id="" name="fill_status" class="form-control">
                                                            <option value="">-- Trạng thái bài viết --</option>
                                                            <option value="1" {{ $fill_status==1? 'selected':'' }}>Đã đăng</option>
                                                            <option value="2" {{ $fill_status==2? 'selected':'' }}>Bài viết đã gửi duyệt</option>
                                                            <option value="3" {{ $fill_status==3? 'selected':'' }}>Bài viết đã duyệt</option>
                                                            <option value="4" {{ $fill_status==4? 'selected':'' }}>Bài viết đã trả lại</option>
                                                            <option value="4" {{ $fill_status==5? 'selected':'' }}>Bài viết sửa (trả lại)</option>
                                                        </select>
                                                    </div> --}}
                                                    {{-- <div class="form-group col-md-2 mb-0" style="min-width:100px;">
                                                        <select id="" name="fill_active" class="form-control">
                                                            <option value="">-- Trạng thái hiển thị --</option>
                                                            <option value="1" {{ $fill_active==1? 'selected':'' }}>Hiển thị</option>
                                                            <option value="2" {{ $fill_active==2? 'selected':'' }}>Bài viết đã hạ</option>

                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-2 mb-0" style="min-width:100px;">
                                                        <select id="categoryProduct" name="category" class="form-control">
                                                            <option value="">-- Tất cả danh mục --</option>

                                                            {!!$option!!}
                                                        </select>
                                                    </div> --}}
                                                </div>
                                            </div>

                                            <div class="col-md-1 mb-0">
                                                <button type="submit" class="btn btn-success w-100">Tìm kiếm</button>
                                            </div>
                                            <div class="col-md-1 mb-0">
                                                <a  class="btn btn-danger w-100" href="{{ route('admin.post.comment.index') }}">Làm lại</a>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="card-body table-responsive p-0 lb-list-category">
                                <table class="table table-head-fixed" style="font-size:13px;">
                                    <thead>
                                    <tr>
                                    <tr>
                                        <th>STT</th>
                                        <th>Thông tin người gửi</th>
                                        <th class="white-space-nowrap">Nội dung bình luận</th>
                                        <th class="white-space-nowrap">Bài viết</th>
                                        <th class="white-space-nowrap">Duyệt</th>
                                        <th class="white-space-nowrap">Tác vụ</th>
                                    </tr>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @foreach($data as $commentItem)
                                        <tr>
                                            <td>{{$loop->index}}</td>
                                            <td>
                                                <ul>
                                                    <li><strong>Tên: </strong> <span>{{ $commentItem->name }}</span></li>
                                                    <li><strong>Email: </strong> <span>{{ $commentItem->email }}</span></li>
                                                </ul>
                                            </td>

                                            <td>{!! $commentItem->content !!}</td>
                                            <td >
                                                @php
                                                    $post = App\Models\Post::where('id', $commentItem->parent_id)->first();
                                                @endphp
                                                <a href="{{ $post->slug_full }}" target="_blank">{{ $post->name }}</a>
                                            </td>
                                            <td>
                                            @if($commentItem->active == 1)
                                                <a href="{{ route('admin.post.active', $commentItem->id) }}"><span class="text-ellipsis fa fa-thumbs-o-up">Hiện</span></a>
                                            @else
                                                <a href="{{ route('admin.post.unactive', $commentItem->id) }}"><span class="text-ellipsis fa fa-thumbs-o-down">Ẩn</span></a>
                                            @endif
                                            </td>

                                            <td class="white-space-nowrap">
                                                <a href="{{ route('admin.post.delete', $commentItem->id) }}" class="tooltip11"><i class="fa fa-times text-danger text"></i><span class="tooltiptext">Xóa</span></a>
                                            </td>

                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        {{$data->appends(request()->input())->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('js')
    <script>
        $(function(){
            $(document).on('click', '.lb-status', function() {
                event.preventDefault();

                let wrapActive = $(this).parents('.wrap-load-status');
                let urlRequest = $(this).data("url");

                let type = $(this).data("type");
                let title = '';
                title = 'Bạn có chắc chắn muốn ' + type;
                Swal.fire({
                    title: title,
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Đồng ý!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            type: "GET",
                            url: urlRequest,
                            success: function(data) {
                                if (data.code == 200) {
                                    let html = data.html;
                                    wrapActive.html(html);
                                }
                            }
                        });
                    }
                })
            });

        });
    </script>
@endsection
