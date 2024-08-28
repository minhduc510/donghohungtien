@extends('frontend.layouts.main-profile')

@section('title', $seo['title'] ?? '' )
@section('keywords', $seo['keywords']??'')
@section('description', $seo['description']??'')
@section('abstract', $seo['abstract']??'')
@section('image', $seo['image']??'')
@section('css')
    <style>

        .badge-1 {
            background: #dc3545;
        }

        .badge-1 {
            background: #c3e6cb;
        }

        .badge-2 {
            background: #ffc107;
        }

        .badge-3 {
            background: #17a2b8;
        }

        .badge-4 {
            background: #28a745;
        }
        .info-box {
            box-shadow: 0 0 1px rgb(0 0 0 / 13%), 0 1px 3px rgb(0 0 0 / 20%);
            border-radius: .25rem;
            background-color: #fff;
            display: -ms-flexbox;
            display: flex;
            margin-bottom: 1rem;
            min-height: 80px;
            padding: .5rem;
            position: relative;
            width: 100%;
        }
        .info-box .info-box-icon {
            border-radius: .25rem;
            -ms-flex-align: center;
            align-items: center;
            display: -ms-flexbox;
            display: flex;
            font-size: 1.875rem;
            -ms-flex-pack: center;
            justify-content: center;
            text-align: center;
            width: 60px;
        }

        #sidebar-profile .nav-pills{
            background-color: #17a2b8;
        }

        #sidebar-profile nav .nav-item a{
            color: #fff;
            padding: 5px 14px;
            font-size: 14px;
        }

        .wrap-history .badge{
            font-size: 12px;
            padding: 10px 10px;
            color: #fff;
        }

        .info-box .info-box-icon i{
            color: #fff;
        }
        .info-box .info-box-content {
            display: -ms-flexbox;
            display: flex;
            -ms-flex-direction: column;
            flex-direction: column;
            -ms-flex-pack: center;
            justify-content: center;
            line-height: 1.8;
            -ms-flex: 1;
            flex: 1;
            padding: 0 10px;
        }
		.bg-info {
			background-color: #0d6b41!important;
		}
		#sidebar-profile nav .nav-item .nav-link {
			background-color: #0d6b41!important;
		}
		.card-body {
			background: #fff;
		}
        .info-box .info-box-text, .info-box .progress-description {
            display: block;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
			font-size: 15px;
        }
        .info-box .info-box-number {
            display: block;
            margin-top: .25rem;
            font-weight: 700;
        }
        .modal-header{
            background-color: #000;
            color: #fff;
        }
        .modal-header .close{
            opacity: 1;
            color: #fff;
        }
        .modal-title{
            margin: 0;

        }

        #sidebar-profile .nav-pills{
            background-color: #17a2b8;
        }

        #sidebar-profile nav .nav-item a{
            color: #fff;
            padding: 5px 14px;
            font-size: 14px;
        }
        .box-check-radio{
            float: right;
            line-height:normal;
        }
        .box-check-item {
           
            height: 30px;
            line-height: 30px;
            border: 1px solid #888;
            text-align: center;
            border-radius: 4px;
            width: 90px;
        }
        .box-check-item select{
            height:auto;
        }
        .box-check-item label{
            font-size: 15px;
        }
        .form-control{
            display:inline-block;

            border:none;
            
        }
        textarea.form-control{
            padding: 1.375rem 0.75rem;
        }
        .form-group{margin-bottom:20px}
        .form-control:focus{
            border:none;
            box-shadow:unset;
        }
        .table-responsive{
            overflow-x:unset;
            border-radius:14px;
            padding:8px 14px;
        }
        .gender{
            display:inline-block;
            width:100%
        }
        hr {
        margin: 30px 0;
        width: 50%;
        background: #000;
        height: 1px;
        border: none;
        }
        .tab-cart-items{
            margin-bottom:10px;
        }
        .card-header{
            padding:0;
        }
        .tab-step-cart{
            top:-7px
        }

        @media (max-width: 550px){
            .table-responsive {
                border-radius: 8px;
                padding: 20px 14px;
            }

            .box-check-radio{
                float: left;
            }
        }
    </style>
@endsection

@section('content')
    <div class="content-wrapper">
        <div class="main">
            {{-- @isset($breadcrumbs,$typeBreadcrumb)
                @include('frontend.components.breadcrumbs',[
                    'breadcrumbs'=>$breadcrumbs,
                    'type'=>$typeBreadcrumb,
                ])
            @endisset --}}
            {{--
             <div class="row">
                
                 <div class="col-md-12">
                    <div class="list-count">
                        <div class="row">
                            @isset($dataTransactionGroupByStatus)
                                <div class="col-sm-12">
                                    <div class="list-count">
                                        <div class="row">
                                            @foreach ($dataTransactionGroupByStatus as $item)

                                            <div class="col-md-6 col-sm-12 ">
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
                        </div>
                    </div>
                 </div>
                 <div class="col-sm-12">
                    <div class="wrap-history" style="font-size:13px;">
                        <div class="card-body table-responsive p-0">
                            <table class="table table-head-fixed">
                               <thead>
                                  <tr>
                                     <th>ID</th>
                                     <th class="text-nowrap">Thông tin</th>
                                     <th class="text-nowrap">Tổng tiền</th>
                                     <th class="text-nowrap">Tài khoản</th>
                                     <th class="text-nowrap">Trạng thái</th>
                                     <th>Thời gian</th>
                                     <th>Xem đơn hàng</th>
                                  </tr>
                               </thead>
                               <tbody>
                                   @foreach ($data as $transaction)
                                   <tr>
                                       <td>{{ $transaction->id }}</td>
                                       <td>
                                           <ul>
                                               <li>
                                                 <strong>Name:</strong>  {{ $transaction->name }}
                                               </li>
                                               <li>
                                                <strong>Phone:</strong>   {{ $transaction->phone }}
                                               </li>
                                               <li>
                                                <strong>Email:</strong>   {{ $transaction->email }}
                                               </li>
                                           </ul>
                                       </td>
                                        <td class="text-nowrap">
                                           <span class="tag tag-success"></span>
                                            <ul>
                                                <li>
                                                    <strong>Tổng:</strong>  {{ number_format($transaction->total) }} đ
                                                </li>
                                                
                                                <li>
                                                    <strong>Tri trả bằng tiền:</strong>   {{ number_format($transaction->money)}} đ
                                                </li>
                                                <li>
                                                    <strong>Tri trả bằng điểm:</strong>   {{ number_format($transaction->point)}} điểm
                                                </li>
                                                
                                            </ul>
                                        </td>
                                       <td class="text-nowrap">{{ $transaction->user_id?'Thành viên':'Khách vãng lai' }}</td>
                                       <td class="text-nowrap ">
                                        @foreach ($listStatus as $status)
                                            @if ($status['status']==$transaction->status)
                                                <span  class="badge badge-@if ($transaction->status<=0)danger @else{{ $transaction->status }}@endif">
                                                    {{ $status['name'] }}
                                                </span>
                                            @endif
                                        @endforeach
                                       </td>
                                       <td class="text-nowrap">{{ $transaction->created_at }}</td>
                                       <td>
                                        <a  class="btn btn-sm btn-info" id="btn-load-transaction-detail" data-url="{{route('profile.transaction.detail',['id'=>$transaction->id])}}" ><i class="fas fa-eye"></i></a>
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
             --}}
             <div class="wrap-content-main">
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

                        <div class="row">
                            <div class="col-md-12">
                                <div class="card card-outline card-primary">
                                    {{--<div class="card-header">
                                        <h3 class="card-title">Tài khoản của tôi</h3>
                                        <div class="tab-step-cart">
                                            <ul class="tab-cart-items">
                                                <li class="tab-cart-item">
                                                    <a href="{{route('profile.editInfo')}}" class="tab-cart-link">
                                                        <span>Hồ sơ</span>
                                                    </a>
                                                </li>
                                                <li class="tab-cart-item">
                                                    <a href="{{asset('profile/change-password')}}" class="tab-cart-link">
                                                        <span>Đổi mật khẩu</span>
                                                    </a>
                                                </li>
                                                <li class="tab-cart-item active">
                                                    <a href="{{route('profile.history')}}" class="tab-cart-link">
                                                        <span>Lịch sử mua hàng</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>--}}
                                    <div class="card-body table-responsive">
                                        <div class="row">
                                            <div class="col-md-12 col-card-body">
                                              <div class="prod_buy_label">
                                                Sản phẩm bạn đã mua trong thời gian qua
                                              </div>
                                                <div class="history_order">
                                                  @if(isset($data) && $data)
                                                  @foreach($data as $transaction)
                                                  @foreach($transaction->orders as $value)
                                                      <div class="item">
                                                        <div class="box">
                                                          <div class="image">
                                                            <img src="{{ asset($value->avatar_path) }}" alt="Máy hút bụi">
                                                          </div>
                                                          <div class="box_info">
                                                            <div class="box_info_top">
                                                              <div class="group_title3">
                                                                @if($value->product)
                                                                <div class="sub_title">
                                                                  {{$value->product->category->name}}
                                                                </div>
                                                                @endif
                                                                <div class="title">
                                                                  {{$value->name}}
                                                                </div>
                                                              </div>
                                                              <div class="group_status">
                                                                <div class="time">
                                                                  {{$value->created_at->format('m/d/y')}}
                                                                </div>
                                                                  @foreach ($listStatus as $status)
                                                                      @if ($status['status']==$transaction->status)
                                                                          <div data-status="{{ $transaction->status }}" class="status_order">
                                                                              {{ $status['name'] }}
                                                                          </div>
                                                                      @endif
                                                                  @endforeach
                                                              </div>
                                                            </div>
                                                            <div class="box_info_bottom">
                                                              <div class="qty">
                                                                  Số lượng: {{$value->quantity}}
                                                              </div>
                                                              <div class="price">{{number_format($transaction->total, 0, ',', '.')}} <span class="donvi">₫</span></div>
                                                            </div>
                                                          </div>
                                                        </div>
                                                      </div>
                                                    @endforeach
                                                    @endforeach
                                                  @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
      
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="modal fade in" id="transactionDetail">
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
              <button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
            </div>
          </div>
        </div>
      </div>

@endsection
@section('js')
      <script>
          $(function(){
            // js load ajax chi tiet don hang
            $(document).on("click", "#btn-load-transaction-detail", function() {
                let contentWrap = $('#loadTransactionDetail');

                let urlRequest = $(this).data("url");
                $.ajax({
                    type: "GET",
                    url: urlRequest,
                    success: function(data) {
                        if (data.code == 200) {
                            let html = data.html;
                            contentWrap.html(html);
                            $('#transactionDetail').modal('show');
                        }
                    }
                });
            });
          })
      </script>
@endsection
