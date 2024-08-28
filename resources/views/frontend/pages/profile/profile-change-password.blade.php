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
                        @elseif(session('success'))
                        <div class="alert alert-success">
                            {{session("success")}}
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
                                                    <a href="{{ \Auth::check() ? route('profile.editInfo') : route('login')}}" class="tab-cart-link">
                                                        <span>Hồ sơ</span>
                                                    </a>
                                                </li>
                                                <li class="tab-cart-item active">
                                                    <a href="{{\Auth::check() ? route('profile.changePassword') : route('login')}}" class="tab-cart-link">
                                                        <span>Đổi mật khẩu</span>
                                                    </a>
                                                </li>
                                                <li class="tab-cart-item ">
                                                    <a href="{{\Auth::check() ? route('profile.history') : route('login')}}" class="tab-cart-link">
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
                                                Để bảo mật tài khoản vui lòng không chia sẻ tài khoản cho người khác
                                              </div>
                                                <div class="history_order">
                                                    <div id="change-password" class="id_form active">
                                                       
                                                        
                                                        <form method="POST" action="{{ route('profile.changeStorePassword') }}">
                                                            @csrf
                                                            @if(session('error'))
                                                            <div class="alert alert-warning">
                                                            {{session("error")}}
                                                            </div>
                                                            @endif
                                                            @if ($errors->any())
                                                                <div class="alert alert-danger">
                                                                    <ul>
                                                                        @foreach ($errors->all() as $error)
                                                                            <li>{{ $error }}</li>
                                                                        @endforeach
                                                                    </ul>
                                                                </div>
                                                            @endif
                            
                                                            <div class="form-group row">
                                                                <div class="col-md-12">
                                                                    <input id="old_password" type="password" class="form-control @error('old_password') is-invalid @enderror" name="old_password" required autocomplete="current-password" placeholder="Mật khẩu hiện tại">
                                                                    @error('old_password')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror
                                                                </div>
                                                            </div>

                                                            <div class="form-group row">
                                                                <div class="col-md-12">
                                                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Mật khẩu mới">
                                                                    @error('password')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror
                                                                </div>
                                                            </div>

                                                            <div class="form-group row">
                                                                <div class="col-md-12">
                                                                    <input id="comfim_password" type="password" class="form-control @error('comfim_password') is-invalid @enderror" name="comfim_password" required autocomplete="current-password" placeholder="Nhập lại mật khẩu mới">
                                                                    @error('comfim_password')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                            
                            
                                                            <div class="form-group row mb-0">
                                                                <div class="col-md-12">
                                                                    <button type="submit" class="btn btn-primary">
                                                                        Xác nhận
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </form>
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
   
@endsection
