<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Server ErrorG</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="Content-Language" content="vi">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="abstract" content="">
    <meta name="ROBOTS" content="Metaflow">
    <meta name="ROBOTS" content="index, follow, all">
    <meta name="AUTHOR" content="Bivaco">
    <meta name="revisit-after" content="1 days">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta property="og:image" content="http://vision.vsscorp.vn/frontend/images/logo.jpg">
    <meta property="og:image:alt" content="http://vision.vsscorp.vn/frontend/images/logo.jpg">
    
    <meta property="og:url" content="http://vision.vsscorp.vn">
    <meta property="og:type" content="article">
    <meta property="og:title" content="VISION SHIPPING">
    <meta property="og:description" content="">
    <link rel="canonical" href="http://vision.vsscorp.vn">
    <link rel="shortcut icon" href="http://vision.vsscorp.vn/favicon.ico">
    </head>

<style type="text/css">
    .box_404{
        width: 100%;
        height: 100vh;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
    }

    .logo_bfc{
        width: auto;
        text-align: center;
        margin-bottom: 20px;
    }

    .logo_bfc img{
        width: auto;
        max-width: 100%;
        height: 94px;
    }

    .img_404{
        width: auto;
        text-align: center;
    }

    .img_404 img{
        width: auto;
        max-width: 500px;
    }

    .bug_404{
        text-align: center;
        width: auto;
        color: #2e3285;
        font-size: 30px;
    }

    .menu_line{
        width: auto;
        display: flex;
        align-items: center;
        margin-top: 28px;
    }

    .menu_line a{
        display: inline-block;
        padding: 0 15px;
        color: #2e3285;
        text-decoration: none;
        text-align: center;
        width: auto;
        font-size: 30px;
    }

    .menu_line a:hover{
        text-decoration: underline;
    }

    @media (max-width: 550px){
        .img_404 img{
            width: auto;
            max-width: 74%;
        }

        .bug_404{
            font-size: 28px;
        }

        .menu_line a {
            padding: 0 10px;
            font-size: 24px;
        }

        .logo_bfc img {
            height: 60px;
        }
    }
    
</style>
<body>
    <div class="box_404">
    {{--<div class="logo_bfc">
            <img src="https://akitech.com.vn/storage/setting/2/logo_1.png" alt="Logo">
        </div>--}}
        <div class="img_404">
            <img src="{{ asset('/frontend/images/img_404.png')}}" alt="404">
        </div>
        <div class="bug_404">
            Page not found!
        </div>
        <div class="menu_line">
            <a href="{{URL::to('/')}}">Quay lại Trang Chủ</a>
        </div>
    </div>
</body>
</html>
