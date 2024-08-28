@extends('admin.layouts.main')
@section('title',"danh sach mã giảm giá")

@section('css')
<link rel="stylesheet" href="{{asset('lib/sweetalert2/css/sweetalert2.min.css')}}">
@endsection
@section('content')
<div class="content-wrapper">

    @include('admin.partials.content-header',['name'=>"Mã giảm giá","key"=>"Danh sách mã giảm giá"])

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

                @if(session("numberUpdate"))
                <div class="alert alert-success">
                   {{session("numberUpdate")}}
                </div>
                @endif
                <a href="{{route('admin.discount.create')}}" class="btn  btn-info btn-md mb-2">+ Thêm mới</a>
                <div class="card card-outline card-primary">
                    <div class="card-header">
                        <div class="card-tools w-100 mb-3">
                            <form action="{{ route('admin.transaction.index') }}" method="GET">
                                <div class="row">
                                    <div class="col-md-9">
                                        <div class="row">
                                            <div class="form-group col-md-5 mb-0">
                                                <input id="keyword" value="{{ $keyword }}" name="keyword" type="text" class="form-control"  placeholder="Từ khóa">
                                                <div id="keyword_feedback" class="invalid-feedback"></div>
                                            </div>
                                            <div class="form-group col-md-5 mb-0" style="min-width:100px;">
                                                <select id="order" name="order_with" class="form-control">
                                                    <option value="">Sắp xếp theo</option>
                                                    <option value="dateASC" {{ $order_with=='dateASC'? 'selected':'' }}>Ngày tạo tăng dần</option>
                                                    <option value="dateDESC" {{ $order_with=='dateDESC'? 'selected':'' }}>Ngày tạo giảm dần</option>
                                                    
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 text-right">
                                        <button type="submit" class="btn btn-success">Tìm kiếm</button>
                                        <a href="{{ route('admin.transaction.index') }}" class="btn btn-danger">Làm lại</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="card-tools text-right pl-3 pr-3 pt-2 pb-2">
                        <div class="count">
                            Tổng số bản ghi <strong>{{  $data->count() }}</strong>
                        </div>
                    </div>

                    <div class="card-body table-responsive p-0 lb-list-category">
                        <table class="table table-head-fixed" style="font-size: 13px;">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Mã</th>
                                    <th>Giảm</th>
                                    <th>Ngày bắt đầu</th>
                                    <th>Ngày kết thúc</th>
                                    <th>Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data as $discountItem)
                                <tr>
                                    <td>{{$loop->index}}</td>
                                    <td>{{$discountItem->name}}</td>
                                    <td>{{ number_format($discountItem->price_is_reduced??'0') }}vnđ</td>
                                    <td>{{ Illuminate\Support\Carbon::parse($discountItem->created_at)->format('d/m/Y') }}</td>
                                    <td>{{ Illuminate\Support\Carbon::parse($discountItem->end_date)->format('d/m/Y') }}</td>
                                    <td>
                                    <a data-url="{{route('admin.discount.edit.dis')}}" data-id="{{$discountItem->id}}" class="btn btn-sm btn-danger lb_edit_dis" style="background-color: #138496; border-color:#138496 ;">Gửi mã</a>
                                        <a href="{{route('admin.discount.edit',['id'=>$discountItem->id])}}" class="btn btn-sm btn-info tooltip11"><i class="fas fa-edit"></i><span class="tooltiptext">Sửa</span></a>
                                        <a data-url="{{route('admin.discount.destroy',['id'=>$discountItem->id])}}" class="btn btn-sm btn-danger lb_delete tooltip11"><i class="far fa-trash-alt"></i><span class="tooltiptext">Xóa</span></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                {{$data->links()}}
            </div>
        </div>
      </div>
    </div>
</div>
<div id="update_time" class="modal fade update_time" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h3>Cập nhật thông tin</h3>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div id="change_price">
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
<script>
    // Khi chọn sản phẩm được list ra từ ô tìm kiếm
    $(document).on('click','.lb_edit_dis', function(){
        let id_prod = $(this).data('id');
    
        if(id_prod != ''){
            let urlRequest = $(this).data('url')+'?'+'id_prod'+'='+id_prod;
            $.ajax({
                url: urlRequest,
                method:"GET",
                dataType:"JSON",
                success:function(response){
                    if (response.code == 200) {
                        $("#change_price").html(response.html);
                        // $('#price').number( true, 0,',','.' );
                        // let price_show = $('#price').val();
                        // let price_hide = $('#price_hide').val(price_show);
                        // $('#price').on('keyup',function(){ 
                        //     let price_show = $('#price').val();
                        //     let price_hide = $('#price_hide').val(price_show);
                        // });
                        $('#update_time').modal('show');
                    }
                }
            })   
        }
    });
</script>
@endsection
