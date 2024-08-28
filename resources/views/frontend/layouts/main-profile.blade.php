<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> @yield('title') </title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="Content-Language" content="vi" />
    <meta name="keywords" content="@yield('keywords')" />
    <meta name="description" content="@yield('description')" />
    <meta name="abstract" content="@yield('abstract')" />
    <meta name="ROBOTS" content="Metaflow" />
    <meta name="ROBOTS" content="noindex, nofollow, all" />
    <meta name="AUTHOR" content="Bivaco" />
    <meta name="revisit-after" content="1 days" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta property="og:image" content="@yield('image')" />
    <meta property="og:image:alt" content="@yield('image')" />

    <meta property="og:url" content="{{ makeLink('home') }}" />
    <meta property="og:type" content="article">
    <meta property="og:title" content="@yield('title')">
    <meta property="og:description" content="@yield('description')">
    <link rel="canonical" href="{{ makeLink('home') }}" />
    <link rel="shortcut icon" href="{{ URL::to('/favicon.ico') }}" />
    <script type="text/javascript" src="{{ asset('lib/jquery/jquery-3.2.1.min.js') }} "></script>
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" type="text/css" href="{{ asset('lib/bootstrap-4.5.3-dist/css/bootstrap.min.css') }}">
    {{-- <link rel="stylesheet" type="text/css" href="{{ asset('font/fontawesome-5.13.1/css/all.min.css') }}"> --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('font/fontawesome-5.13.1/css/all.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('lib/wow/css/animate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('lib/slick-1.8.1/css/slick.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('lib/slick-1.8.1/css/slick-theme.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('lib/lightbox-plus/css/lightbox.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/reset.css') }}">
    {{-- <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/stylesheet.css') }}"> --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/stylesheet-2.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/about-us.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/header.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/footer.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/tin-tuc.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/cart.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/feedback.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/hoptac.css') }}">

    @yield('css')
    <style>
        .avatar {}

        .avatar h4 {
            font-size: 18px;
            font-weight: bold;
            margin: 0;
            width: 100%;
            text-align: left;
        }

        .avatar .media img {
            margin-top: 0;
        }

        .avatar .media {
            align-items: center;
        }

        .wrap-profile-container {
            background-color: #ebebeb;
            padding-top: 16px;
            padding-bottom: 36px;
        }

        #sidebar-profile nav .nav-item {
            white-space: nowrap;
            border-bottom: 1px solid #e5e5e5;
        }

        #sidebar-profile nav .nav-item:last-child {
            border: unset;
        }

        .bg-left {
            background-color: transparent;
        }

        #sidebar-profile nav .nav-item .nav-link {
            white-space: nowrap;
            overflow: hidden;
        }

        #sidebar-profile nav .nav-item .nav-link p {
            display: inline-block;
            margin: 0;
        }

        #sidebar-profile nav .nav-item .nav-link i {
            margin-right: 5px;
        }

        h1 {
            font-size: 25px;
            font-weight: bold;
            margin-top: 0;
        }

        .card-title {
            margin: 0;
        }

        .card-title h3 {
            margin: 0;
            font-size: 25px;
            font-weight: bold;
        }
    </style>
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/profile.css') }}">

</head>

<body class="template-search">
    <div class="wrapper home">
        <!-- Navbar -->
        @include('frontend.partials.header')
        <div class="text-left wrap-breadcrumbs" style="margin-bottom: 0;">
            <div class="ctnr">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <ul class="breadcrumb">
                            <li class="breadcrumbs-item">
                                <a href="{{ makeLink('home') }}">Trang chủ</a>
                            </li>
                            <li class="breadcrumbs-item active"><a href="{{ route('profile.editInfo') }}"
                                    class="currentcat">Tài khoản</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.navbar -->
        <div class="wrap-profile-container">
            <div class="ctnr">
                <div class="row justify-content-center wrap-profile-row">
                    <div class="col-lg-3 bg-left">
                        <div id="sidebar-profile">
                            <div class="avatar">
                                <a href="javascript:;" class="info_user">
                                    <img class="info_user_img"
                                        src="{{ $user->avatar_path ? $user->avatar_path : $shareFrontend['userNoImage'] }}"
                                        alt="{{ $user->name }}" class="mb-3 rounded-circle">
                                    <h4 class="info_user_name">{{ $user->name }}</h4>
                                </a>
                            </div>
                            <nav class="mt-2">
                                <ul class="myAccleftNav">
                                    <li class="myAccleftNav-li">
                                        <a href="{{ route('profile.editInfo') }}" class="myAccleftNav-a">
                                            <img class="myAccleftNav_img"
                                                src="https://asset.vuahanghieu.com/assets/images/icon-account.png"
                                                alt="">
                                            <span class="myAccleftNav_span">Thông tin tài khoản </span>
                                        </a>
                                    </li>
                                    <li class="myAccleftNav-li">
                                        <a href="{{ route('profile.changePassword') }}" class="myAccleftNav-a">
                                            <img class="myAccleftNav_img"
                                                src="https://asset.vuahanghieu.com/assets/images/icon-account.png"
                                                alt="">
                                            <span class="myAccleftNav_span">Thay đổi mật khẩu </span>
                                        </a>
                                    </li>
                                    <li class="myAccleftNav-li">
                                        <a href="{{ route('profile.ranking') }}" class="myAccleftNav-a">
                                            <img class="myAccleftNav_img"
                                                src="	https://asset.vuahanghieu.com/assets/images/award.png"
                                                alt="">
                                            <span class="myAccleftNav_span">Xếp hạng thành viên </span>
                                        </a>
                                    </li>
                                    <li class="myAccleftNav-li">
                                        <a href="{{ route('profile.history') }}" class="myAccleftNav-a">
                                            <img class="myAccleftNav_img"
                                                src="https://asset.vuahanghieu.com/assets/images/icon-order.png"
                                                alt="">
                                            <span class="myAccleftNav_span">Quản lý đơn hàng </span>
                                        </a>
                                    </li>
                                    <li class="myAccleftNav-li">
                                        <a href="{{ route('profile.discountCode') }}" class="myAccleftNav-a">
                                            <img class="myAccleftNav_img"
                                                src="https://asset.vuahanghieu.com/assets/images/discount.svg"
                                                alt="">
                                            <span class="myAccleftNav_span"> Mã giảm giá </span>
                                        </a>
                                    </li>
                                    {{-- <li class="myAccleftNav-li">
                                        <a href="" class="myAccleftNav-a">
                                            <img class="myAccleftNav_img" src="https://asset.vuahanghieu.com/assets/images/heart.svg" alt="">
                                            <span class="myAccleftNav_span"> Sản phẩm yêu thích </span>
                                        </a>
                                    </li> --}}
                                    <li class="myAccleftNav-li">
                                        <a href="{{ route('profile.address') }}" class="myAccleftNav-a">
                                            <img class="myAccleftNav_img"
                                                src="https://asset.vuahanghieu.com/assets/images/address.svg"
                                                alt="">
                                            <span class="myAccleftNav_span"> Sổ địa chỉ </span>
                                        </a>
                                    </li>
                                    <li class="myAccleftNav-li">
                                        <a href="{{ makeLink('home') }}" class="myAccleftNav-a">
                                            <img class="myAccleftNav_img"
                                                src="	https://asset.vuahanghieu.com/assets/images/icon-home.png"
                                                alt="">
                                            <span class="myAccleftNav_span">Quay về trang chủ</span>
                                        </a>
                                    </li>

                                </ul>
                            </nav>

                        </div>
                    </div>
                    <div class="col-lg-9 bg-right">
                        @yield('content')
                    </div>
                </div>
            </div>

        </div>


        @include('frontend.partials.footer')


    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script type="text/javascript" src="{{ asset('lib/lightbox-plus/js/lightbox-plus-jquery.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script type="text/javascript" src="{{ asset('lib/bootstrap-4.5.3-dist/js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('lib/wow/js/wow.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('lib/slick-1.8.1/js/slick.min.js') }}"></script>
    <script src="{{ asset('lib/sweetalert2/js/sweetalert2.all.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('frontend/js/main.js') }}"></script>
    <script src="{{ asset('lib/components/js/Cart.js') }}"></script>
    <script src="{{ asset('lib/components/js/Compare.js') }}"></script>
    <script>
        new WOW().init();
        $(function() {
            $(document).on('click', '.pt_icon_right', function() {
                event.preventDefault();
                $(this).parent('a').parent('li').children("ul").slideToggle();
                $(this).parent('a').parent('li').toggleClass('active');
            });
            $(document).on('click', '.btn-sb-toogle', function() {
                $(this).parents('.box-list-fill').find('.fill-list-item').slideToggle();
                $(this).toggleClass('active');
            });
        })
    </script>
    {{-- <script>
        $(document).on('submit', "[data-ajax='submit']", function() {
            let myThis = $(this);
            let formValues = $(this).serialize();
            let dataInput = $(this).data();

           

            // Tiếp tục xử lý AJAX request
            $.ajax({
                type: dataInput.method,
                url: dataInput.url,
                data: formValues,
                dataType: "json",
                success: function(response) {
                    if (response.code == 200) {
                        myThis.find('input:not([type="hidden"]), textarea:not([type="hidden"])').val(
                        '');
                        if (dataInput.content) {
                            $(dataInput.content).html(response.html);
                        }
                        if (dataInput.target) {
                            switch (dataInput.target) {
                                case 'modal':
                                    $(dataInput.href).modal();
                                    break;
                                case 'alert':
                                    Swal.fire({
                                        position: 'center',
                                        icon: 'success',
                                        title: response.html,
                                        showConfirmButton: false,
                                        timer: 1500
                                    });
                                    break;
                                default:
                                    break;
                            }
                        }
                        // alert('Gửi thông tin thành công');
                    } else {
                        Swal.fire({
                            position: 'center',
                            icon: 'error',
                            title: response.html,
                            showConfirmButton: false,
                            timer: 1500
                        });
                    }
                },
                error: function(response) {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'error',
                        title: 'Your work has been saved',
                        showConfirmButton: false,
                        timer: 1500
                    });
                }
            });
            return false;
        });
    </script> --}}
    @yield('js')
</body>

</html>
