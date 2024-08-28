@extends('frontend.layouts.main')
@section('title', __('home.giohang'))
@section('css')
    <!-- BK CSS -->
    <link rel="stylesheet" href="https://pc.baokim.vn/css/bk.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/cart.css') }}">
    <!-- END BK CSS -->
    <style>
        .content-box {
            border: 1px solid #cecdcd;
            background: #fff;
            background-clip: padding-box;
            border-radius: 5px;
            color: #545454;
        }

        .content-box__row {
            display: table;
            box-sizing: border-box;
            width: 100%;
            position: relative;
            padding: 1em;
        }

        .radio-wrapper:last-child {
            margin-bottom: 0;
            position: relative;
        }

        .radio-wrapper {
            display: table;
            box-sizing: border-box;
            width: 100%;
        }

        .radio__input,
        .checkbox__input {
            display: table-cell;
            position: absolute;
        }

        .radio__input,
        .checkbox__input {
            white-space: nowrap;
            /* padding-right: .75em; */
        }

        .input-checkbox:checked,
        .input-radio:checked {
            border: none;
            -webkit-box-shadow: 0 0 0 10px #337ab7 inset;
            box-shadow: 0 0 0 10px #337ab7 inset;
        }

        .content-box .input-checkbox,
        .content-box .input-radio {
            border-color: #d9d9d9;
            background-color: #fff;
            margin-top: 7px;
        }

        .input-checkbox:checked:after,
        .input-radio:checked:after {
            -webkit-transform: scale(1);
            transform: scale(1);
            opacity: 1;
        }

        .input-checkbox:after,
        .input-radio:after {
            content: "";
            display: block;
            position: absolute;
            top: 50%;
            left: 50%;
            -webkit-transform: scale(.2);
            transform: scale(.2);
            -webkit-transition: all .2s ease-in-out .1s;
            transition: all .2s ease-in-out .1s;
            opacity: 0;
        }

        .input-radio:after {
            width: 4px;
            height: 4px;
            margin-left: -2px;
            margin-top: -2px;
            background-color: #fff;
            border-radius: 50%;
        }

        .radio__label,
        .checkbox__label {
            cursor: pointer;
            vertical-align: middle;
            display: flex;
            width: 100%;
            align-items: center;
            padding-left: 30px;
            margin-bottom: 0px;
        }

        .radio__label__primary {
            cursor: inherit;
            font-family: inherit;
            vertical-align: top;
            display: table-cell;
            width: 100%;
            margin-top: 0px;
        }

        .radio__label__accessory {
            text-align: right;
            padding-left: .75em;
            white-space: nowrap;
            display: table-cell;
            vertical-align: middle;
        }

        .radio__label__icon {
            color: #1990c6;
            font-size: 1.5em;
            height: 100%;
            display: inline-block;
        }

        .radio__label__icon svg {
            height: 22px;
            fill: #357ebd;
        }

        .description {
            display: none;
        }

        .description {
            padding-bottom: 10px;
        }

        .ml-3,
        .mx-3 {
            margin-left: 1rem !important;
        }

        .content-box__row~.content-box__row {
            border-top: 1px solid #d9d9d9;
        }

        .content-box__row {
            display: table;
            box-sizing: border-box;
            width: 100%;
            position: relative;
            padding: 1em;
        }

        .section__content {
            width: max-content;
        }



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

        .delivery-type-item .delivery-title {
            margin-left: 10px;
        }

        .delivery-type-item label span {
            padding-left: 25px;
            display: block;
        }

        .delivery-type-item input {
            margin-top: 1px;
        }

        .infomation-title {
            position: relative;
            padding-left: 29px;
        }

        .infomation-title svg {
            position: absolute;
            left: 0;
            height: 22px;
            width: 22px;
        }

        .box_dattour {
            height: auto;
            position: relative;
            margin-bottom: 10px;
        }

        @media (max-width: 991px) {
			.section__content {
    width: 100%;
}
            tr.table-tongtien td:nth-child(1) {
                display: none;
            }

            tr.table-tongtien td:nth-child(2):before {
                content: "Tổng tiền :";
            }

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

            table,
            th,
            td {
                display: block;

            }

            table tbody tr:nth-child(1) {
                display: none;
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

            .table-tong tr {
                padding: 10px;
                display: block;
            }

            #ec-module-cart td {
                width: 100%;
            }

            td:before {
                position: absolute;
                top: 6px;
                left: 5px;
                width: 45%;
                padding-right: 10px;
                white-space: nowrap;
                text-align: left;
            }

            td:nth-of-type(1):before {
                content: "Hình ảnh";
            }

            td:nth-of-type(2):before {
                content: "Sản phẩm:";
            }

            td:nth-of-type(3):before {
                content: "Mã sản phẩm:";
            }

            td:nth-of-type(4):before {
                content: "Đơn giá:";
            }

            td:nth-of-type(5):before {
                content: "Số lượng:";
            }

            td:nth-of-type(6):before {
                content: "Thành tiền:";
            }

            td:nth-of-type(7):before {
                content: "Tổng tiền:";
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
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="title">
                                        {{ __('home.thong_tin_dat_hang') }}
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
                    <script language="javascript" type="text/javascript">
                        $(document).ready(function() {
                            $('#frmorder2').submit(function() {
                                var error = 0;
                                // if (!($('#checkboxid').is(':checked'))) {
                                //     error = 1
                                //     alert("{{ __('home.ban_can_xac_nhan_mua_hang') }}");
                                // }

                                if (error) {
                                    return false;
                                } else {
                                    return true;
                                }

                            });
                        });
                    </script>
                    <div class="payment mtb20">
                        <ul class="uk-list uk-clearfix step">
                            <li class="item step-1 "><a class="link" href="javascript:;" title=""><span
                                        class="number">1</span>
                                    {{ __('home.don_hang') }}</a></li>
                            <li class="item step-2 active"><a class="link" href="javascript:;" title=""><span
                                        class="number">2</span>
                                    {{ __('home.thong_tin_giao_hang') }}</a></li>
                            <li class="item step-3 "><a class="link" href="javascript:;" title=""><span
                                        class="number">3</span>{{ __('home.dat_hang_thanh_cong') }}</a></li>
                        </ul>
                    </div>
                    <form style="width:100%; padding:0" method="post" action="{{ route('cart.step3') }}" name="frmorder2"
                        id="frmorder2" enctype="multipart/form-data" onsubmit="return checkForm(this);">
                        @csrf

                        <input type="hidden" value="1" name="gone">
                        <div class="fix-grid-news ">
                            <div>
                                <table border="1" cellpadding="5" cellspacing="0"
                                    style="border-collapse: collapse; margin-top:10px " bordercolor="#9999CC"='#cc3300'=""
                                    width="100%" bgcolor="#ffffff">
                                    <tbody>
                                        <tr>
                                            <td width="7%" bgcolor="#f7f7f7" style="font-weight:bold">
                                                {{ __('home.hinh_anh') }}</td>
                                            <td bgcolor="#f7f7f7" style="font-weight:bold">
                                                {{ __('home.sp') }}</td>
                                            <td width="15%" align="center" bgcolor="#f7f7f7" style="font-weight:bold">
                                                {{ __('home.masp') }}</td>
                                            <td width="15%" align="center" bgcolor="#f7f7f7" style="font-weight:bold">
                                                {{ __('home.don_gia') }}</td>
                                            <td width="14%" align="center" bgcolor="#f7f7f7" style="font-weight:bold">
                                                {{ __('home.so_luong') }}</td>
                                            <td width="9%" align="center" bgcolor="#f7f7f7" style="font-weight:bold">
                                                {{ __('home.thanh_tien') }}
                                            </td>
                                        </tr>
                                        @foreach ($data as $cartItem)
                                            <tr height="30">
                                                <td data-title="Hình ảnh" bgcolor="#FFFFFF"><img
                                                        src="{{ $cartItem['avatar_path'] }}" alt="{{ $cartItem['name'] }}"
                                                        height="40">
                                                </td>
                                                <td data-title="Sản phẩm" bgcolor="#FFFFFF">{{ $cartItem['name'] }}<br>
                                                    {{-- <a class="bosanphan remove-cart"
                                                            data-url="{{ route('cart.remove', ['id' => $cartItem['id'], 'option' => $cartItem['option_id']]) }}"
                                                            title="Xóa">
                                                            <i class="fa fa-trash-o"
                                                                aria-hidden="true"></i>
                                                            {{ __('home.xoa') }}
                                                        </a> --}}
                                                </td>
                                                <td data-title="Mã sản phẩm" bgcolor="#FFFFFF" align="center">
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
                                        <tr class="table-tongtien">
                                            <td colspan="4" class="chu_noidung">
                                                {{ __('home.tong_tien') }}</td>
                                            <td colspan="2" align="center"
                                                style="font-weight:bold; color:#F00; font-size:14px">
                                                {{ number_format($totalPrice) }}đ</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row">
                            <div class="clm" style="--w-md:6; --w-xs:12;">
                                <input name="success" type="hidden" value="success">
                                <div class="title_thongtin" style="margin-top: 20px; margin-bottom: 10px;">
                                    {{ __('home.thong_tin_thanh_toan') }}
                                </div>
                                <div class="contact_primary1">
                                    <div class="row fix-grid-news">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="clm" style="--w-xs:4;">
                                                    {{ __('home.ten_khach_hang') }} <em>*</em>
                                                </div>
                                                <div class="clm" style="--w-xs:8;">
                                                    <input name="name" type="text" value="" id="name"
                                                        placeholder="{{ __('home.vd_name') }}">
                                                </div>
                                                <div class="clm" style="--w-xs:4;">
                                                    {{ __('home.email') }}<em>*</em>
                                                </div>
                                                <div class="clm" style="--w-xs:8;">
                                                    <input name="email" type="email" value="" id="email"
                                                        placeholder="{{ __('home.vd_mail') }}">
                                                    <span></span>
                                                </div>
                                                <div class="clm" style="--w-xs:4;">
                                                    {{ __('home.sdt') }} <em>*</em>
                                                </div>
                                                <div class="clm" style="--w-xs:8;">
                                                    <input name="tel" type="text" value="" id="tel"
                                                        placeholder="{{ __('home.vd_sdt') }}">
                                                    <span></span>
                                                </div>
                                                <!-- <div class="clm" style="--w-xs:4;">
                                                                                                                                                                                                                                                    {{ __('home.tinh_thanh') }}<em>*</em>
                                                                                                                                                                                                                                                </div>
                                                                                                                                                                                                                                                <div class="clm" style="--w-xs:8;">
                                                                                                                                                                                                                                                    <select name="id_tinhthanh" id="city"
                                                                                                                                                                                                                                                        required="" class="form-control span12"
                                                                                                                                                                                                                                                        data-url="{{ route('ajax.address.districts') }}">
                                                                                                                                                                                                                                                        <option value="">[
                                                                                                                                                                                                                                                            {{ __('home.tinh_thanh') }} ]</option>
                                                                                                                                                                                                                                                        @if ($ct)
                                                                                                                                                                                                                                                            @foreach ($ct as $i)
    <option
                                                                                                                                                                                                                                                                    value="{{ $i->id }}">
                                                                                                                                                                                                                                                                    {{ $i->name }}</option>
    @endforeach
                                                                                                                                                                                                                                                        @endif
                                                                                                                                                                                                                                                    </select>
                                                                                                                                                                                                                                                </div>
                                                                                                                                                                                                                                                <div class="clm" style="--w-xs:4;">
                                                                                                                                                                                                                                                    {{ __('home.quan_huyen') }}<em>*</em></div>
                                                                                                                                                                                                                                                <div class="clm" style="--w-xs:8;">
                                                                                                                                                                                                                                                    <select name="id_quanhuyen" id="district"
                                                                                                                                                                                                                                                        required="" class="form-control span12"
                                                                                                                                                                                                                                                        data-url="{{ route('ajax.address.communes') }}">
                                                                                                                                                                                                                                                        <option value="">[
                                                                                                                                                                                                                                                            {{ __('home.quan_huyen') }} ]</option>
                                                                                                                                                                                                                                                    </select>
                                                                                                                                                                                                                                                </div>-->
                                                <div class="clm" style="--w-xs:4;">
                                                    {{ __('home.dia_chi') }}<em>*</em>
                                                </div>
                                                <div class="clm" style="--w-xs:8;">
                                                    <input name="address" type="text" value="" id="address"
                                                        placeholder="{{ __('home.vd_dia_chi') }}">
                                                </div>
                                                <div class="clm" style="--w-xs:4;">
                                                    {{ __('home.ghi_chu') }}<br><span
                                                        style="color: #898989; font-size: 12px; font-weight: normal;">({{ __('home.ko_bat_buoc') }})</span>
                                                </div>
                                                <div class="clm" style="--w-xs:8;">
                                                    <textarea name="addinfo" type="text" id="addinfo" placeholder="{{ __('home.ghi_chu') }}:"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="clm" style="--w-md:6; --w-xs:12;">
                                <div class="section__content">


                                    <div class="content-box" data-define="{paymentMethod: undefined}">

                                        <div class="content-box__row">
                                            <div class="radio-wrapper">
                                                @isset($pttt1)
                                                    <div class="radio__input">
                                                        <input name="httt" type="radio" checked=""
                                                            class="input-radio" data-bind="paymentMethod"
                                                            value="{{ $pttt1->name }}" data-provider-id="3">

                                                    </div>
                                                @endisset
                                                <label for="paymentMethod-750123" class="radio__label">
                                                    @isset($pttt1)
                                                        <span class="radio__label__primary">{{ $pttt1->name }}</span>
                                                    @endisset
                                                    <span class="radio__label__accessory">
                                                        <span class="radio__label__icon">
                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                viewBox="0 0 576 512"><!--!Font Awesome Free 6.5.2 by @fontawesome  - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                                                <path
                                                                    d="M112 112c0 35.3-28.7 64-64 64V336c35.3 0 64 28.7 64 64H464c0-35.3 28.7-64 64-64V176c-35.3 0-64-28.7-64-64H112zM0 128C0 92.7 28.7 64 64 64H512c35.3 0 64 28.7 64 64V384c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V128zM176 256a112 112 0 1 1 224 0 112 112 0 1 1 -224 0zm80-48c0 8.8 7.2 16 16 16v64h-8c-8.8 0-16 7.2-16 16s7.2 16 16 16h24 24c8.8 0 16-7.2 16-16s-7.2-16-16-16h-8V208c0-8.8-7.2-16-16-16H272c-8.8 0-16 7.2-16 16z">
                                                                </path>
                                                            </svg>
                                                        </span>
                                                    </span>


                                                </label>
                                            </div>

                                        </div>
                                        <div class="content-box__row">
                                            <div class="radio-wrapper">
                                                @isset($pttt2)
                                                    <div class="radio__input">
                                                        <input name="httt" type="radio" class="input-radio"
                                                            data-bind="paymentMethod" value="{{ $pttt2->name }}"
                                                            data-provider-id="3">
                                                    @endisset
                                                </div>
                                                <label for="paymentMethod-750123" class="radio__label">
                                                    @isset($pttt2)
                                                        <span class="radio__label__primary">{{ $pttt2->name }}</span>
                                                    @endisset
                                                    <span class="radio__label__accessory">
                                                        <span class="radio__label__icon">
                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                viewBox="0 0 576 512"><!--!Font Awesome Free 6.5.2 by @fontawesome  - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                                                <path
                                                                    d="M112 112c0 35.3-28.7 64-64 64V336c35.3 0 64 28.7 64 64H464c0-35.3 28.7-64 64-64V176c-35.3 0-64-28.7-64-64H112zM0 128C0 92.7 28.7 64 64 64H512c35.3 0 64 28.7 64 64V384c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V128zM176 256a112 112 0 1 1 224 0 112 112 0 1 1 -224 0zm80-48c0 8.8 7.2 16 16 16v64h-8c-8.8 0-16 7.2-16 16s7.2 16 16 16h24 24c8.8 0 16-7.2 16-16s-7.2-16-16-16h-8V208c0-8.8-7.2-16-16-16H272c-8.8 0-16 7.2-16 16z">
                                                                </path>
                                                            </svg>
                                                        </span>
                                                    </span>


                                                </label>
                                            </div>

                                        </div>
                                        <div class="description ml-3" style="display: none;">
                                            {!! $pttt2->description !!}
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="box_dattour" style="width:100%; text-align:center">
                            <button id="gone" name="gone" type="submit">{{ __('home.tiep_tuc_thanh_toan') }} <i
                                    class="fa fa-forward" aria-hidden="true"></i></button>
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
        $(document).ready(function() {


            $('#gone').click(function() {
                var name = document.getElementById('name').value;
                var email = document.getElementById('email').value;
                var tel = document.getElementById('tel').value;
                // var city = document.getElementById('city').value;
                // var district = document.getElementById('district').value;
                var address = document.getElementById('address').value;
                var addinfo = document.getElementById('addinfo').value;

                let isEmail = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
                let isPhone = /^\d{10}$/;
                if (name === '') {
                    Swal.fire({
                        position: 'center',
                        icon: 'error',
                        title: 'Vui lòng nhập Tên!',
                        showConfirmButton: false,
                        timer: 1500
                    });
                    return false;
                }

                if (email === '') {
                    Swal.fire({
                        position: 'center',
                        icon: 'error',
                        title: 'Vui lòng nhập email!',
                        showConfirmButton: false,
                        timer: 1500
                    });
                    return false;
                } else if (!(isEmail.test(email))) {
                    Swal.fire({
                        position: 'center',
                        icon: 'error',
                        title: 'Vui lòng nhập email hợp lệ!',
                        showConfirmButton: false,
                        timer: 1500
                    });
                    return false;
                }

                if (tel === '') {
                    Swal.fire({
                        position: 'center',
                        icon: 'error',
                        title: 'Vui lòng nhập số điện thoại!',
                        showConfirmButton: false,
                        timer: 1500
                    });
                    return false;
                } else if (!(isPhone.test(tel))) {
                    Swal.fire({
                        position: 'center',
                        icon: 'error',
                        title: 'Vui lòng nhập số điện thoại hợp lệ!',
                        showConfirmButton: false,
                        timer: 1500
                    });
                    return false;
                }

                if (address === '') {
                    Swal.fire({
                        position: 'center',
                        icon: 'error',
                        title: 'Vui lòng nhập Địa chỉ!',
                        showConfirmButton: false,
                        timer: 1500
                    });
                    return false;
                }
                $.ajax({
                    type: 'POST',
                    url: "{{ route('save.session.data') }}",
                    data: {
                        name: name,
                        email: email,
                        tel: tel,
                        // city: city,
                        // district: district,
                        address: address,
                        addinfo: addinfo,
                        // Add more data fields here
                    },
                    success: function(response) {
                        console.log(response.message);
                    }
                });
            });
        })
    </script>
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

    <script type="text/javascript">
        $(document).on('change', '#city', function() {
            let urlRequest = $(this).data("url");
            let mythis = $(this);
            let value = $(this).val();
            let defaultCity = "<option value=''>[{{ __('home.tinh_thanh') }} ]</option>";
            let defaultDistrict = "<option value=''>[{{ __('home.quan_huyen') }} ]</option>";
            let defaultCommune = "<option value=''>Chọn xã/phường/thị trấn</option>";
            if (!value) {
                $('#district').html(defaultDistrict);
                $('#commune').html(defaultCommune);
            } else {
                $.ajax({
                    type: "GET",
                    url: urlRequest,
                    data: {
                        'cityId': value
                    },
                    success: function(data) {
                        if (data.code == 200) {
                            let html = defaultDistrict + data.data;
                            $('#district').html(html);
                            $('#commune').html(defaultCommune);
                        }
                    }
                });
            }
        })
        $(document).on('change', '#district', function() {
            let urlRequest = $(this).data("url");
            let mythis = $(this);
            let value = $(this).val();
            let defaultCity = "<option value=''>[ {{ __('home.tinh_thanh') }} ]</option>";
            let defaultDistrict = "<option value=''>[ {{ __('home.quan_huyen') }} ]</option>";
            let defaultCommune = "<option value=''>Chọn xã/phường/thị trấn</option>";
            if (!value) {
                $('#commune').html(defaultCommune);
            } else {
                $.ajax({
                    type: "GET",
                    url: urlRequest,
                    data: {
                        'districtId': value
                    },
                    success: function(data) {
                        if (data.code == 200) {
                            let html = defaultCommune + data.data;
                            $('#commune').html(html);
                        }
                    }
                });
            }
        })
    </script>
    <!-- BK JS -->
    <script src="https://pc.baokim.vn/js/bk_plus_v2.popup.js"></script>
    <!-- END BK JS -->

    <script>
        $(document).ready(function() {
            // Ẩn tất cả các mô tả khi trang tải lần đầu
            $('.description').hide();

            // Hiển thị mô tả cho radio button được chọn mặc định
            $('input[name="httt"]:checked').closest('.content-box__row').next('.description').show();

            $('input[name="httt"]').on('change', function() {
                // Ẩn tất cả các mô tả
                $('.description').hide();

                // Hiển thị mô tả cho radio button được chọn
                $(this).closest('.content-box__row').next('.description').show();
            });
        });
    </script>
@endsection
