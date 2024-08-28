@extends('frontend.layouts.main-profile')

@section('title', $seo['title'] ?? '' )
@section('keywords', $seo['keywords']??'')
@section('description', $seo['description']??'')
@section('abstract', $seo['abstract']??'')
@section('image', $seo['image']??'')
@section('css')
    <style>
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
                        <form action="{{route('profile.updateInfo',['id'=>$data->id])}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card card-outline card-primary">
                                        {{--<div class="card-header">
                                            <h3 class="card-title">Tài khoản của tôi</h3>
                                            <div class="tab-step-cart">
                                                <ul class="tab-cart-items">
                                                    <li class="tab-cart-item active" onclick="openTab('Tab1')" data-id="Tab1">
                                                        <a href="{{route('profile.editInfo')}}" class="tab-cart-link">
                                                            <span>Hồ sơ</span>
                                                        </a>
                                                    </li>
                                                    <li class="tab-cart-item" onclick="openTab('Tab2')" data-id="Tab2">
                                                        <a href="{{asset('profile/change-password')}}" class="tab-cart-link">
                                                            <span>Đổi mật khẩu</span>
                                                        </a>
                                                    </li>
                                                    <li class="tab-cart-item" onclick="openTab('Tab3')" data-id="Tab3">
                                                        <a href="{{route('profile.history')}}" class="tab-cart-link">
                                                            <span>Lịch sử mua hàng</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>--}}
                                        <div class="card-body table-responsive">

                                            <div class="row">
                                                <div class="col-md-1"></div>
                                                <div class="col-md-10">
                                                    <div class="level-member">
                                                        <div class="level-title">Cấp độ MEMBER</div>
                                                        <div class="box-point">
                                                            <label>Số điểm hiện tại</label>
                                                            <span>{{ $data->point }}</span>
                                                            <div class="point-unit">?</div>
                                                        </div>
                                                    </div>
                                                    <div class="level-image" style="margin-top: 20px;">
                                                        <div class="row">
                                                            <div class="col-12 col-sm-6 col-md-3 col-level">
                                                                <div class="level-img-item @if($data->rank ==0) gold-level @endif">
                                                                    <span>Normal member</span>
                                                                </div>
                                                            </div>
                                                            <div class="col-12 col-sm-6 col-md-3 col-level">
                                                                <div class="level-img-item @if($data->rank ==1) gold-level @endif">
                                                                    <span>Sliver member</span>
                                                                </div>
                                                            </div>
                                                            <div class="col-12 col-sm-6 col-md-3 col-level">
                                                                <div class="level-img-item @if($data->rank ==2) gold-level @endif">
                                                                    <span>Gold member</span>
                                                                </div>
                                                            </div>
                                                            <div class="col-12 col-sm-6 col-md-3 col-level">
                                                                <div class="level-img-item @if($data->rank ==3) gold-level @endif">
                                                                    <span>Diamon member</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-2"></div>
                                                <div class="col-md-12 col-logout">
                                                    <a class="btn-logout" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Đăng xuất</a>
                                                </div>
                                            </div>
                                        </div>
                                        @php
                                            $modelCate = new App\Models\CategoryPost;
                                            $chinhsach = $modelCate->where('active',1)->find(98);
                                        @endphp
                                        <div class="cskh">
                                            @if(isset($chinhsach) && $chinhsach->count()>0 )
                                            <a href="{{ $chinhsach->slug_full }}">Chính sách khách hàng</a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
<script>

   $(function(){
        // js load image khi upload
    $(document).on('change', '.img-load-input', function() {
        let input = $(this);
        displayImage(input, '.wrap-load-image', '.img-load');
    });

    function displayImage(input, selectorWrap, selectorImg) {
        let img = input.parents(selectorWrap).find(selectorImg);
        let file = input.prop('files')[0];
        let reader = new FileReader();

        reader.addEventListener("load", function() {
            // convert image file to base64 string
            img.attr('src', reader.result);
        }, false);

        if (file) {
            reader.readAsDataURL(file);
        }
    }
   });

</script>
@endsection
