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

            .list_sanpham table,
            th,
            td {
                display: block;

            }

            .list_sanpham table tbody tr:nth-child(1) {
                display: none;
            }

            .list_sanpham table .count .uk-position-relative {
                flex-direction: row;
            }

            .list_sanpham td {
                padding-left: 120px !important;
                position: relative;
                text-align: left;
                width: 100%;
            }

            .table-tong tr {
                padding: 10px;
                display: block;
            }

            #ec-module-cart td {
                width: 100%;
            }

            .list_sanpham td:before {
                position: absolute;
                top: 6px;
                left: 5px;
                width: 33%;
                padding-right: 10px;
                white-space: nowrap;
                text-align: left;
            }

            .list_sanpham td:nth-of-type(1):before {
                content: "Hình ảnh";
            }

            .list_sanpham td:nth-of-type(2):before {
                content: "Sản phẩm";
            }

            .list_sanpham td:nth-of-type(3):before {
                content: "Mã sản phẩm";
            }

            .list_sanpham td:nth-of-type(4):before {
                content: "Đơn giá";
            }

            .list_sanpham td:nth-of-type(5):before {
                content: "Số lượng";
            }

            .list_sanpham td:nth-of-type(6):before {
                content: "Thành tiền";
            }

            .list_sanpham td:nth-of-type(7):before {
                content: "Xóa";
            }

            table .count .uk-position-relative {
                justify-content: left;
            }

            .box_dattour center {
                text-align: right;
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
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
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

                </div>
            </div>
        </div> --}}

            <div class="breadcrumbs clearfix">
                <div class="ctnr">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
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
                </div>
            </div>

            <div class="home_top">
                <div class="ctnr">
                    {{-- @dd($data) --}}
                    @if (count($data) > 0)
                        <div class="payment mtb20">
                            <ul class="uk-list uk-clearfix step">
                                <li class="item step-1 active"><a class="link" href="javascript:;" title=""><span
                                            class="number">1</span> {{ __('home.don_hang') }}</a></li>
                                <li class="item step-2 "><a class="link" href="javascript:;" title=""><span
                                            class="number">2</span> {{ __('home.thong_tin_giao_hang') }}</a></li>
                                <li class="item step-3 "><a class="link" href="javascript:;" title=""><span
                                            class="number">3</span>{{ __('home.dat_hang_thanh_cong') }}</a></li>
                            </ul>
                        </div>
                        <div class="" id="ec-module-cart">
                            <div class="list_sanpham ">
                                <form id="ajax-cart-form" method="POST" action="" name="checkoutform">
                                    <input type="hidden" name="id_mem" value="">
                                    <div class="cart-wrapper">
                                        <table border="1" cellpadding="5" cellspacing="0" bordercolor="#d2d2d2"
                                            width="100%" bgcolor="#ffffff">
                                            <tbody>
                                                <tr>
                                                    <td width="10%"><strong>{{ __('home.hinh_anh') }}</strong></td>
                                                    <td><b>{{ __('home.sp') }}</b></td>
                                                    <td><b>{{ __('home.masp') }}</b></td>
                                                    <td width="13%" align="center"><b>{{ __('home.don_gia') }}</b></td>
                                                    <td width="18%" align="center"><b>{{ __('home.so_luong') }}</b></td>
                                                    <td width="13%" colspan="2" align="center">
                                                        <b>{{ __('home.thanh_tien') }}</b>
                                                    </td>
                                                    <td width="7%" align="center"><b>{{ __('home.xoa') }}</b></td>
                                                </tr>
                                                @foreach ($data as $cartItem)
                                                    <tr height="30" class="cart-item">
                                                        <td data-title="Hình ảnh" bgcolor="#FFFFFF"><img
                                                                src="{{ $cartItem['avatar_path'] }}"
                                                                alt="{{ $cartItem['name'] }}" height="40"></td>
                                                        <td data-title="Sản phẩm" bgcolor="#FFFFFF"><a target="_blank"
                                                                href="{{ $cartItem['slug'] }}">{{ $cartItem['name'] }}</a>
                                                        </td>
                                                        <td data-title="Mã sản phẩm" bgcolor="#FFFFFF" align="center">
                                                            <strong>{{ $cartItem['masp'] }}</strong>
                                                        </td>
                                                        <td data-title="Đơn giá" bgcolor="#FFFFFF" align="center">
                                                            <strong>{{ number_format($cartItem['price']) }}đ</strong>
                                                        </td>
                                                        <td data-title="Số lượng" class="" bgcolor="#FFFFFF"
                                                            align="center" style="height:40px !imptant">
                                                            <div class="count quantity-cart">
                                                                <div class="uk-position-relative  box-quantity">
                                                                    <span class="next-cart btn augment "
                                                                        id="btncart"></span>

                                                                    <input class="quantity number-cart bk-product-qty"
                                                                        data-url="{{ route('cart.update', ['id' => $cartItem['id'], 'option' => $cartItem['option_id']]) }}"
                                                                        value="{{ $cartItem['quantity'] }}" type="text"
                                                                        id="" name="quantity" disabled="disabled">
                                                                    <span class="prev-cart btn abate" id="btncart"></span>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td data-title="Thành tiền" colspan="2" align="center"
                                                            bgcolor="#FFFFFF"><span>
                                                                &nbsp;{{ number_format($cartItem['price'] * $cartItem['quantity']) }}đ</span>
                                                        </td>
                                                        <td data-title="Xóa" bgcolor="#FFFFFF" align="center">
                                                            <a data-url="{{ route('cart.remove', ['id' => $cartItem['id'], 'option' => $cartItem['option_id']]) }}"
                                                                class="remove-cart"> <i class="fa fa-trash"
                                                                    aria-hidden="true"></i></a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </form>
                            </div>
                            <div class="">
                                <div class="">
                                    <div class="">
                                        <table class="table-tong" border="1" cellpadding="5" cellspacing="0"
                                            bordercolor="#ccc" width="100%" bgcolor="#ffffff">
                                            <tbody>
                                                <tr>
                                                    <td width="80.1%"><strong>{{ __('home.tong_tien') }}:</strong></td>
                                                    <td bgcolor="#FFFFFF"><span
                                                            style="color: #f00; font-size: 18px; font-weight: bold; text-align: right;"
                                                            id="tongtien">{{ number_format($totalPrice) }}đ</span></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="box-btn-dattour">
                                        <div class="dat_hang">
                                            <a href="{{ makeLink('home') }}">
                                                <button><i class="fa fa-hand-o-right" aria-hidden="true"></i>
                                                    {{ __('home.tiep_tuc_chon_sp') }}</button>
                                            </a>
                                        </div>
                                        <div class="box_dattour">
                                            <center><a href="{{ route('cart.step2') }}"
                                                    style="background:#f00; color:#FFF; padding:10px 25px; font-weight:bold; border-radius:5px">{{ __('home.tiep_tuc') }}
                                                    &nbsp;<i class="fa fa-forward" aria-hidden="true"></i></a></center>
                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>
                    @else
                        <strong>Giỏ hàng của bạn đang trống!</strong>
                    @endif
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
