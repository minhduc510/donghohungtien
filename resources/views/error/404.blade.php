@extends('errors::minimal')

@section('title', __('Server Error'))
@section('code', '404')

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
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
    }

    .logo_bfc img{
        width: auto;
        max-width: 100%;
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
        color: #7a2d74;
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
        color: #7a2d74;
        font-size: 16px;
        text-transform: uppercase;
        font-weight: 600;
        text-decoration: none;
        font-family: 'Arial';
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
            font-size: 20px;
        }

        .menu_line a {
            padding: 0 10px;
            font-size: 14px;
        }
    }

    
</style>
<body>
    <div class="box_404">
    {{--<div class="logo_bfc">
            <img src="https://bfchem.vn/upload/images/logo_1568682394.png" alt="Logo">
        </div>--}}
        <div class="img_404">
            <img src="https://bfchem.vn/images/img_404.png" alt="404">
        </div>
        <div class="bug_404">
            Page not found!
        </div>
        <div class="menu_line">
            <a href="https://bfchem.vn">Trang chủ</a>
            <a href="https://bfchem.vn/gioi-thieu.html">Giới thiệu</a>
            <a href="https://bfchem.vn/san-pham.html">Sản phẩm</a>
        </div>
    </div>
</body>
</html>


@section('message', __('Server Error'))
