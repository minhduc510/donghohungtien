<!DOCTYPE html>
<html lang="vi">

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
    <meta name="AUTHOR" content="@yield('title')" />
    <meta name="revisit-after" content="1 days" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta property="og:image" content="@yield('image')" />
    <meta property="og:image:alt" content="@yield('image')" />

    <meta property="og:url" content="{{ makeLink('home') }}" />
    <meta property="og:type" content="article">
    <meta property="og:title" content="@yield('title')">
    <meta property="og:description" content="@yield('description')">
    <link rel="shortcut icon" href="{{ URL::to('/favicon.ico') }}" />

    <meta property="og:url" content="{{ url()->full() }}" />
    <meta property="og:type" content="article">
    <meta property="og:title" content="@yield('title')">
    <meta property="og:description" content="@yield('description')">
    <link rel="shortcut icon" href="{{ URL::to('/favicon.ico') }}" />

    <meta name="copyright" content="Copyright (c) by {{ makeLink('home') }}" />
    <meta name="author" content="@yield('title')" />
    <meta http-equiv="audience" content="General" />
    <meta name="resource-type" content="Document" />
    <meta name="distribution" content="Global" />
    <meta name="revisit-after" content="1 days" />
    <meta name="GENERATOR" content="{{ makeLink('home') }}" />
    <meta name="application-name" content="@yield('title')" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width">
    <meta name="theme-color" content="#fff" />
    <link rel="alternate" href="{{ url()->full() }}" hreflang="vi-vn" />
    @yield('canonical')
    @yield('prevPage')
    @yield('nextPage')
    <!-- facebook -->
    <meta property="og:locale" content="vi_VN" />
    <meta property="og:site_name" content="@yield('title')" />
    <meta property="og:url" content="{{ url()->full() }}" />
    <meta property="og:type" content="" />
    <meta property="og:title" content="@yield('title')" />
    <meta property="og:description" content="@yield('description')" />
    <meta property="og:image" content="@yield('image')" />
    <meta property="og:image:width" content="900" />
    <meta property="og:image:height" content="420" />
    <!-- Thu vien CSS -->
    <link rel="stylesheet" href="{{ asset('lib/sweetalert2/css/sweetalert2.css') }}">
    <link rel="stylesheet" href="{{ asset('lib/sweetalert2/css/sweetalert2.min.css') }}">

    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/utilities.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/css/animate.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('frontend/css/lightbox.min.css') }}" type="text/css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('font/fontawesome-5.13.1/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/colorbox.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/slick.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/css/slick-theme.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/css/stylesheet.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('frontend/css/loc.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('frontend/css/header.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('frontend/fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
    <script src="{{ asset('bootstrap/js/jquery-3.2.1.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>
    <style>

    </style>
    @yield('css')
    @yield('code_schema')
    @php
        $code_header = \App\Models\Code::find(2);
        $code_home = \App\Models\Code::find(3);
        $code_footer = \App\Models\Code::find(4);
    @endphp
    @if ($code_header)
        {!! $code_header->description !!}
    @endif
</head>

<body class="smooth">

    @if ($code_home)
        {!! $code_home->description !!}
    @endif
    <div class="wrapper home">
        <!-- Navbar -->
        @include('frontend.partials.header')
        <!-- /.navbar -->
        @yield('content')
        @include('frontend.partials.footer')
    </div>


    <!-- <script src="{{ asset('frontend/bootstrap/js/bootstrap.min.js') }}"></script> -->
    <script src="{{ asset('frontend/js/slick.min.js') }}"></script>
    <script src="{{ asset('frontend/js/slick.js') }}"></script>
    {{-- <script src="{{ asset('frontend/js/ryk.js') }}"></script> --}}
    <script src="{{ asset('frontend/js/jquery.colorbox.js') }}"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css" />
    <script>
        $(document).ready(function() {
            //Examples of how to assign the Colorbox event to elements
            $(".group1").colorbox();
            $(".group2").colorbox({
                rel: 'group2',
                transition: "fade"
            });
            $(".group3").colorbox({
                rel: 'group3',
                transition: "none",
                width: "75%",
                height: "75%"
            });
            $(".group4").colorbox({
                rel: 'group4',
                slideshow: true
            });
            $(".ajax").colorbox();
            $(".youtube").colorbox({
                iframe: true,
                maxWidth: "100%",
                innerWidth: 640,
                innerHeight: 390
            });
            $(".vimeo").colorbox({
                iframe: true,
                innerWidth: 500,
                innerHeight: 409
            });
            $(".iframe").colorbox({
                iframe: true,
                width: "80%",
                height: "80%"
            });
            $(".inline").colorbox({
                inline: true,
                width: "80%",
                rel: 'inline'
            });
            $(".callbacks").colorbox({
                onOpen: function() {
                    alert('onOpen: colorbox is about to open');
                },
                onLoad: function() {
                    alert('onLoad: colorbox has started to load the targeted content');
                },
                onComplete: function() {
                    alert('onComplete: colorbox has displayed the loaded content');
                },
                onCleanup: function() {
                    alert('onCleanup: colorbox has begun the close process');
                },
                onClosed: function() {
                    alert('onClosed: colorbox has completely closed');
                }
            });

            $('.non-retina').colorbox({
                rel: 'group5',
                transition: 'none'
            })
            $('.retina').colorbox({
                rel: 'group5',
                transition: 'none',
                retinaImage: true,
                retinaUrl: true
            });

            //Example of preserving a JavaScript event for inline calls.
            $("#click").click(function() {
                $('#click').css({
                    "background-color": "#f00",
                    "color": "#fff",
                    "cursor": "inherit"
                }).text("Open this window again and this message will still be here.");
                return false;
            });
        });
    </script>

    <script src="{{ asset('lib/sweetalert2/js/sweetalert2.all.min.js') }}"></script>

    <script src="{{ asset('lib/components/js/Cart.js') }}"></script>
    <script>
        $(document).ready(function() {
            // Kích hoạt FancyBox cho ảnh
            $("[data-fancybox]").fancybox();
        });
    </script>

    @yield('js')
    @if ($code_footer)
        {!! $code_footer->description !!}
    @endif
</body>

</html>
