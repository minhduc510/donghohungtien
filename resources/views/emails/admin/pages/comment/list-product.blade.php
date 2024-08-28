@extends('admin.layouts.main')
@section('title',"Danh sách bình luận")
@section('css')
<style>
ul{
    padding-left: 20px;
}
	.info-box .info-box-number {
    display: block;
    margin-top: .25rem;
		color: #f00;
    font-weight: 700;
}
</style>
@endsection
@section('content')
   <div class="content-wrapper">
        @include('admin.partials.content-header',['name'=>"Bình luận","key"=>"Danh sách bình luận"])
        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    @isset($dataTransactionGroupByStatus)
                        <div class="col-sm-12">
                            <div class="list-count">
                                <div class="row">
                                    @foreach ($dataTransactionGroupByStatus as $item)

                                    <div class="col-md-4 col-sm-6 col-12">
                                        <div class="info-box">
                                        <span class="info-box-icon bg-info"><i class="fas fa-calculator"></i></span>
                                        <div class="info-box-content">
                                            <span class="info-box-text">Số giao dịch {{ $item['name'] }} </span>
                                            <span class="info-box-number"><strong>{{ number_format($item['total']??0) }}</strong> / tổng số {{ $totalTransaction }}</span>
                                        </div>
                                        <!-- /.info-box-content -->
                                        </div>
                                        <!-- /.info-box -->
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                    </div>
                    @endisset

                    <div class="col-sm-12">
                        <div class="card card-outline card-primary">
                           <div class="card-header">
                              <h3 class="card-title">Danh sách bình luận mới</h3>
                              {{-- <div class="card-tools w-60">
                                  <form action="{{ route('admin.productcomment.index') }}" method="GET">

                                    <div class="row">
                                        <div class="col-md-9">
                                            <div class="row">
                                                <div class="form-group col-md-4 mb-0">
                                                    <input id="keyword" value="{{ $keyword }}" name="keyword" type="text" class="form-control" placeholder="Từ khóa">
                                                    <div id="keyword_feedback" class="invalid-feedback">

                                                    </div>
                                                </div>
                                                <div class="form-group col-md-4 mb-0" style="min-width:100px;">
                                                    <select id="order" name="order_with" class="form-control">
                                                        <option value="">Sắp xếp theo</option>
                                                        <option value="dateASC" {{ $order_with=='dateASC'? 'selected':'' }}>Ngày đặt hàng tăng dần</option>
                                                        <option value="dateDESC" {{ $order_with=='dateDESC'? 'selected':'' }}>Ngày đặt hàng giảm dần</option>
                                                        <option value="statusASC" {{ $order_with=='statusASC'? 'selected':'' }}>Trạng thái 1-n</option>
                                                        <option value="statusDESC" {{ $order_with=='statusDESC'? 'selected':'' }}>Trạng thái n-1</option>
                                                    </select>
                                                </div>

                                                <div class="form-group col-md-4 mb-0" style="min-width:100px;">
                                                    <select id="status" name="status" class="form-control">
                                                        <option value="">Tình trang đơn hàng</option>
                                                        @foreach ($listStatus as $status)
                                                          <option value="{{ $status['status'] }}" {{ $status['status']==$statusCurrent? 'selected':'' }}>Đơn hàng {{ $status['name'] }}</option>
                                                          @endforeach
                                                    </select>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-md-3 text-right">
                                            <button type="submit" class="btn btn-success">Tìm kiếm</button>
                                            <a href="{{ route('admin.productcomment.index') }}" class="btn btn-danger">Làm lại</a>
                                        </div>

                                    </div>
                                </form>
                              </div> --}}
                           </div>
                           <div class="card-tools text-right pl-3 pr-3 pt-2 pb-2">
                            <div class="count">
                                Tổng số bản ghi <strong>{{  $data->count() }}</strong> 
                             </div>
                          </div>
                           <!-- /.card-header -->
                           <div class="card-body table-responsive p-0">
                              <table class="table table-head-fixed">
                                 <thead>
                                    <tr>
                                       <th>ID</th>
                                       <th class="text-nowrap">Họ tên</th>
                                       <th class="text-nowrap">Email</th>
                                       <th class="text-nowrap">Nội dung</th>
                                       {{-- <th class="text-nowrap">Số sao</th>  --}}
                                       <th class="text-nowrap">Bình luận Sản phẩm</th>
                                       <th class="text-nowrap">Trạng thái</th>
                                       <th>Thời gian</th>
                                       <th>Hành động</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                     @foreach ($data as $productstar)
                                     <tr>
                                         <td>{{ $productstar->id }}</td>
                                         <td>{{ $productstar->name }}</td>
                                         <td>{{ $productstar->email }}</td>
                                         <td>{{ $productstar->content }}</td>
                                         {{-- <td>{{ $productstar->star }}</td>  --}}
                                         
                                         <td> <a href="{{ $productstar->origin->slug_full }}" target="_blank"> {{ $productstar->origin->name }} </a></td>
                                         <td class="wrap-load-hot" data-url="{{ route('admin.productcomment.load.hot',['id'=>$productstar->id]) }}">
                                            @include('admin.components.load-change-hot1',['data'=>$productstar,'type'=>'bình luận'])
                                         </td>
                                         <td class="text-nowrap">{{ $productstar->created_at }}</td>
                                         <td>
                                            <a href="" data-url="{{route('admin.productcomment.destroy',['id'=>$productstar->id])}}"  class="btn btn-sm btn-info btn-danger lb_delete tooltip11"><i class="far fa-trash-alt"></i><span class="tooltiptext">Xóa</span></a>
                                        </td>
                                      </tr>
                                     @endforeach

                                 </tbody>
                              </table>
                           </div>
                           <!-- /.card-body -->
                        </div>
                     </div>
                     <div class="col-md-12">
                        {{$data->appends(request()->input())->links()}}
                    </div>
                </div>
            </div>
        </div>
        <!-- /.content -->
    </div>
     <!-- The Modal chi tiết đơn hàng -->
  <div class="modal fade in" id="productstarDetail">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Chi tiết đơn hàng</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
         <div class="content" id="loadTransactionDetail">

         </div>
        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
@endsection
@section('js')

@endsection
