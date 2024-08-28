@extends('frontend.layouts.main')
@section('title', __('home.giohang'))
@section('css')
    <!-- BK CSS -->
    <link rel="stylesheet" href="https://pc.baokim.vn/css/bk.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/cart.css') }}">
    <!-- END BK CSS -->
    <style>
        .header {
            position: unset;
        }

        .btn-light {
            color: #fff;
            text-decoration: none;
            text-transform: uppercase;
            background-color: #a3a3a3;
        }

        .bk-btn {
            margin-top: 10px;
            text-align: right;
        }

        .bk-btn .bk-btn-paynow {
            line-height: 1.5rem;
        }

        .bk-btn .bk-btn-installment {
            line-height: 1.5rem;
            margin-right: 0px;
        }

        @media (max-width: 991px) {
            .menu-desktop {
                display: none !important;
            }
        }

        @media (min-width: 991px) {
            .menu-mobile-right {
                display: none !important;
            }
        }

        @media (max-width: 786px) {
td.chu_noidung {
    padding-left: 0px !important;
}
            table,
            th,
            td {
                display: block;

            }

            table tbody tr:nth-child(1) {
                display: none;
            }

            table tbody tr:nth-child(3) {
                display: flex;
            }

            table .count .uk-position-relative {
                flex-direction: row;
            }

            td {
                padding-left: 120px !important;
                position: relative;
                text-align: left;
                width: 100%;
            }

            .table-tong .pay-product {
                padding: 10px;
                display: block;
            }

            #ec-module-cart td {
                width: 100%;
            }

            .pay-product td:before {
                position: absolute;
                top: 6px;
                left: 5px;
                width: 45%;
                padding-right: 10px;
                white-space: nowrap;
                text-align: left;
            }

            .pay-product td:nth-of-type(1):before {
                content: "Hình ảnh";
            }

            .pay-product td:nth-of-type(2):before {
                content: "Sản phẩm";
            }

            .pay-product td:nth-of-type(3):before {
                content: "Mã sản phẩm";
            }

            .pay-product td:nth-of-type(4):before {
                content: "Đơn giá";
            }

            .pay-product td:nth-of-type(5):before {
                content: "Số lượng";
            }

            .pay-product td:nth-of-type(6):before {
                content: "Thành tiền";
            }

            .pay-product td:nth-of-type(7):before {
                content: "Xóa";
            }

            table .count .uk-position-relative {
                justify-content: left;
            }
        }
    </style>
@endsection



@section('content')
    <div class="content-wrapper">
        <div class="main">
            {{-- <div class="slide slide_desktop">
            <div class="banner_top">
                <div class="bg_goc">
                    <img src="http://ntcomvn.com/images/bg_goc.png" alt="">
                </div>
                <div class="box-slide" style="background-image: url('../frontend/images/san-pham.jpg');">
                    <div class="image">
                        <img src="../frontend/images/san-pham.jpg" alt="">
                    </div>
                </div>
                <div class="nd_banner">
                    <div class="ctnr">
                        <div class="title">
                            {{__('home.thong_tin_dat_hang')}}
                        </div>
                        <div class="desc">
                            <div>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div> --}}

            <div class="breadcrumbs clearfix">
                <div class="ctnr">
                    <ul>
                        <li class="breadcrumbs-item">
                            <a href="{{ makeLink('home') }}" title="{{ __('home.home') }}">
                                <span>{{ __('home.home') }}</span>
                            </a>
                        </li>
                        <li class="breadcrumbs-item active" style="color: #84c561; padding-left:12px">
                            {{ __('home.giohang') }}
                        </li>
                    </ul>
                </div>
            </div>

            <div class="home_top">
                <div class="ctnr">
                    <div class="payment mtb20">
                        <ul class="uk-list uk-clearfix step">
                            <li class="item step-1 "><a class="link" href="javascript:;" title=""><span
                                        class="number">1</span> {{ __('home.don_hang') }}</a></li>
                            <li class="item step-2 "><a class="link" href="javascript:;" title=""><span
                                        class="number">2</span> {{ __('home.thong_tin_giao_hang') }}</a></li>
                            <li class="item step-3 active"><a class="link" href="javascript:;" title=""><span
                                        class="number">3</span>{{ __('home.dat_hang_thanh_cong') }}</a></li>
                        </ul>
                    </div>
                    <form style="width:100%; padding:0" method="post" action="{{ route('cart.order.submit') }}">
                        @csrf
                        <input type="hidden" value="{{ $data_khach['name'] }}" name="name">
                        <input type="hidden" value="{{ $data_khach['email'] }}" name="email">
                        <input type="hidden" value="{{ $data_khach['sdt'] }}" name="phone">
                        {{-- <input type="hidden" value="{{$data_khach['id_tinhthanh']}}" name="city_id">
                    <input type="hidden" value="{{$data_khach['id_quanhuyen']}}" name="district_id"> --}}
                        <input type="hidden" value="{{ $data_khach['diachi'] }}" name="address_detail">
                        <input type="hidden" value="{{ $data_khach['ghichu'] }}" name="note">
                        <input type="hidden" value="{{ $data_khach['httt'] }}" name="httt">
                        <div style="float:left">
                            <input name="success" type="hidden" value="success">
                            <div class="row fix-grid-news">
                                <div class="col-md-12 cach_left_ini">
                                    <div class="label mb10"
                                        style="background:#efefef;text-transform:uppercase; padding:7px; width: 100%;display: block;line-height: 20px;color: #000;font-size: 15px; margin-top: 20px; margin-bottom: 20px;">
                                        {{ __('home.thong_tin_dat_hang') }}</div>
                                </div>
                                <div class="col-md-5 cach_left_ini col-xs:12">
                                    <!--<div class="title_thongtin" style="margin-top: 20px;color:green;text-transform:uppercase; font-weight:bold; text-align:center">
                                                                Thông tin đặt hàng
                                                            </div>-->
                                    <div class="contact_primary2">
                                        <!--<div style="line-height:18px; margin-bottom:30px">Cảm ơn Anh/ Chị đã đặt hàng tại Công ty. Nhân viên chăm sóc khách hàng sẽ liên hệ lại với Anh/ Chị để xác nhận thông tin đặt hàng trong thời gian sớm nhất.</div>-->

                                        <div class="row">
                                            <div class="col-md-4 col-sm-5 col-xs-5">
                                                <strong>{{ __('home.ten_khach_hang') }}:</strong>
                                            </div>
                                            <div class="col-md-8 col-sm-7 col-xs-7">
                                                {{ $data_khach['name'] }}
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4 col-sm-5 col-xs-5">
                                                <strong>{{ __('home.email') }}:</strong>
                                            </div>
                                            <div class="col-md-8 col-sm-7 col-xs-7">
                                                {{ $data_khach['email'] }}
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4 col-sm-5 col-xs-5">
                                                <strong>{{ __('home.sdt') }}:</strong>
                                            </div>
                                            <div class="col-md-8 col-sm-7 col-xs-7">
                                                {{ $data_khach['sdt'] }}
                                            </div>
                                        </div>
                                        {{-- <!-- <div class="row">
                                                <div class="col-md-4 col-sm-5 col-xs-5">
                                                    <strong>{{__('home.tinh_thanh')}}:</strong>
                                                </div>
                                                <div class="col-md-8 col-sm-7 col-xs-7">
                                                    {{$data_khach['tinhthanh']}}
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4 col-sm-5 col-xs-5"><strong>{{__('home.quan_huyen')}}:</strong></div>
                                                <div class="col-md-8 col-sm-7 col-xs-7">
                                                    {{$data_khach['quanhuyen']}}
                                                </div>
                                            </div>--> --}}
                                        <div class="row">
                                            <div class="col-md-4 col-sm-5 col-xs-5">
                                                <strong>{{ __('home.dia_chi') }}:</strong>
                                            </div>
                                            <div class="col-md-8 col-sm-7 col-xs-7">
                                                {{ $data_khach['diachi'] }}
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4 col-sm-5 col-xs-5">
                                                <strong>{{ __('home.ghi_chu') }}:</strong>
                                            </div>
                                            <div class="col-md-8 col-sm-7 col-xs-7">
                                                {{ $data_khach['ghichu'] }}
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4 col-sm-5 col-xs-5">
                                                <strong>Hình thức thanh toán:</strong>
                                            </div>
                                            {{-- @dd($data_khach['httt']) --}}
                                            <div class="col-md-8 col-sm-7 col-xs-7">
                                                {{ $data_khach['httt'] }}
                                                {{-- {{App\Models\Setting::where('id',$data_khach['httt'])->first()->name}} --}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-7 col-xs-12">
                                    <table border="1" cellpadding="5" cellspacing="0"
                                        style="border-collapse: collapse; margin-top:0px "
                                        bordercolor="#9999CC"='#cc3300'="" width="100%" bgcolor="#ffffff">
                                        <tbody>
                                            <tr>
                                                <td width="10%" bgcolor="#eee" style="font-weight:bold">
                                                    {{ __('home.hinh_anh') }}</td>
                                                <td bgcolor="#eee" style="font-weight:bold">{{ __('home.sp') }}</td>
                                                <td bgcolor="#eee" style="font-weight:bold">{{ __('home.masp') }}</td>
                                                <td width="15%" align="center" bgcolor="#eee"
                                                    style="font-weight:bold">{{ __('home.don_gia') }}</td>
                                                <td width="14%" align="center" bgcolor="#eee"
                                                    style="font-weight:bold">{{ __('home.so_luong') }}</td>
                                                <td width="9%" align="center" bgcolor="#eee"
                                                    style="font-weight:bold">{{ __('home.thanh_tien') }}</td>

                                            </tr>
                                            @foreach ($data as $cartItem)
                                                <tr height="30" class="pay-product">
                                                    <td data-title="Hình ảnh" bgcolor="#FFFFFF"><img
                                                            src="{{ $cartItem['avatar_path'] }}"
                                                            alt="{{ $cartItem['name'] }}" height="40"></td>
                                                    <td data-title="Sản phẩm" bgcolor="#FFFFFF">{{ $cartItem['name'] }}
                                                    </td>
                                                    <td data-title="Mã sản phẩm" bgcolor="#FFFFFF">
                                                        {{ $cartItem['masp'] }}</td>
                                                    <td data-title="Đơn giá" bgcolor="#FFFFFF" align="center">
                                                        {{ number_format($cartItem['price']) }}đ</td>
                                                    <td data-title="Số lượng" bgcolor="#FFFFFF" align="center">
                                                        {{ $cartItem['quantity'] }}</td>
                                                    <td data-title="Thành tiền" align="center" bgcolor="#FFFFFF">
                                                        <strong>{{ number_format($cartItem['price'] * $cartItem['quantity']) }}đ</strong>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            <tr>
                                                <td colspan="4" class="chu_noidung">{{ __('home.tong_tien') }}:</td>
                                                <td colspan="2" align="center"
                                                    style="font-weight:bold; color:#F00; font-size:14px">
                                                    {{ number_format($totalPrice) }}đ</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12" style="width:100%; float:left; margin-bottom:80px">
                            <div class="box_dattour" style="width:100%; text-align:center">
                                <button type="submit"><i class="fa fa-hand-o-right" aria-hidden="true"></i>
                                    {{ __('home.xac_nhan_don_hang') }} <i class="fa fa-long-arrow-right"
                                        aria-hidden="true"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- BK MODAL -->
    <div id='bk-modal'></div>
    <!-- END BK MODAL -->
@endsection

@section('js')
    <script src="{{ asset('frontend/js/load-address.js') }}"></script>
    <script>
        $(document).on('click', '.btn-colsap', function() {
            $('#list-thanhtoan').find('.active').removeClass('active');
            $(this).addClass('active');
            $(this).parent('.colsap').addClass('active');
            let value = $(this).parent('.colsap.active').data('value');
            $('#hinhthuc').val(value);
            console.log(value);
            $('#list-thanhtoan').find('.colsap:not(".active") .content-colsap').slideUp();
            $(this).parent('.colsap.active').find('.content-colsap').slideDown();
        });
        $("#chinhanh").change(function() {
            var id = $(this).val();
            if (id != "0") {
                $(".list-chinhanh #cn_" + id).addClass("active").siblings().removeClass("active");
            } else
                $(".list-chinhanh .item").removeClass("active");
        });
    </script>
    <!-- BK JS -->
    <script src="https://pc.baokim.vn/js/bk_plus_v2.popup.js"></script>
    <!-- END BK JS -->
@endsection
