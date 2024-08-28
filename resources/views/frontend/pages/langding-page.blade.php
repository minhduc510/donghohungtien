@extends('frontend.layouts.main')
@section('title', $seo['title'] ?? '' )
@section('keywords', $seo['keywords']??'')
@section('description', $seo['description']??'')
@section('abstract', $seo['abstract']??'')
@section('image', $seo['image']??'')
@section('content')
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/stylesheet-3.css') }}">
@php
$ss0 = $data->childs()->where('active', 1)->where('order', 0)->first();
$ss1 = $data->childs()->where('active', 1)->where('order', 1)->first();
$ss2 = $data->childs()->where('active', 1)->where('order', 2)->first();
$ss3 = $data->childs()->where('active', 1)->where('order', 3)->first();
$ss4 = $data->childs()->where('active', 1)->where('order', 4)->first();
$ss5 = $data->childs()->where('active', 1)->where('order', 5)->first();
$ss6 = $data->childs()->where('active', 1)->where('order', 6)->first();
$ss7 = $data->childs()->where('active', 1)->where('order', 7)->first();
$ss8 = $data->childs()->where('active', 1)->where('order', 8)->first();
$ss9 = $data->childs()->where('active', 1)->where('order', 9)->first();
$ss10 = $data->childs()->where('active', 1)->where('order', 10)->first();
$ss11 = $data->childs()->where('active', 1)->where('order', 11)->first();
$ss12 = $data->childs()->where('active', 1)->where('order', 12)->first();
$ss13 = $data->childs()->where('active', 1)->where('order', 13)->first();
@endphp
<div class="content-wrapper">
    <div class="main">
    @if(isset($ss10))
        <section class="form-tv-ld-pages form-cn">
            <div class="bg-ld-pages">
                <div class="content-page-popup">
                    <div class="box-form-pages-ss">
                        <div class="img-form-popup">
                            <img src="{{ asset($ss10->avatar_path) }}" alt="{{ $ss10->name }}">
                            <div class="close-form-ld-pages">
                                <i class="fas fa-times"></i>
                            </div>
                        </div>
                        <div class="content-form-pages">
                            <p>Gửi yêu cầu để được tư vấn sofa chuyên sâu và báo giá ưu đãi nhất</p>
                            {{--<span class="ss-somnhat">*Dành cho 20 khách hàng đăng ký sớm nhất tháng</span>--}}
                            <form action="{{ route('contact.storeAjax') }}" data-url="{{ route('contact.storeAjax') }}" data-ajax="submit" data-target="alert" data-href="#modalAjax" data-content="#content" data-method="POST" method="POST" name="frm" id="frm" onsubmit="return validateForm()">
                                <input type="hidden" name="title" value="ĐĂNG KÝ TƯ VẤN LANDING PAGE">
                                @csrf
                                <div class="ladi-form-item-input">
                                    <input name="name" type="text" placeholder="Họ và tên">
                                    <input name="phone" type="tel" placeholder="Số điện thoại">
                                    <input class="email-cn" name="email" type="text" placeholder="Để lại lời nhắn cho chúng tôi">
                                    <!-- <textarea name="content" placeholder="Thông tin thêm" cols="30" rows="5"> -->
                                    </textarea>
                                    <button type="submit">Đăng ký ngay</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
@endif
        @if(isset($ss1))
        <section class="banner-cn">
            <div class="box-all-twet">
                @if(count($ss1->childs)>0)
                <div class="all-content-banner">
                    @foreach($ss1->childs()->where('active', 1)->orderBy('order')->limit(5)->get() as $item)
                    <div class="box-banner-cn">
                        <img src="{{ asset($item->avatar_path) }}" alt="{{ $item->name }}">
                    </div>
                    @endforeach
                </div>
                @endif
                <div class="content-slider-bottom-cn">
                    <div class="container">
                        <div class="content-slider-cn">
                            <h1>{{ $ss1->name }}</h1>
                            <h2> {{ $ss1->description }} </h2>
                            <div class="bpxx-price-opp-cn">
                                <div class="box-price-cn">
                                    <h4>RẺ</h4>
                                    <h4>HƠN</h4>
                                </div>
                                <div class="col-4-CN">
                                    <h1 class="persent-sale">{!! $ss1->content !!}</h1>
                                    <div class="box-text-right-cn">
                                        <p class="persent-buy-ptram">%</p>
                                        <p class="persent-buy">So với mua sẵn</p>
                                    </div>
                                </div>
                            </div>
                            <div class="bt-fist-section btn-form-pages">TƯ VẤN NGAY</div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        @endif
        @if(isset($ss2))
        <section class="second-section">
            <div class="container">
                <div class="content-top-cn">
                    <h1>{{ $ss2->name }}</h1>
                    <p>{{ $ss2->description }}</p>
                </div>
                @if(count($ss2->childs)>0)
                <div class="row">
                    @foreach($ss2->childs()->where('active', 1)->orderBy('order')->limit(3)->get() as $item)
                    <div class="clm block-section-second" style="--w-lg:4;--w-md:4;--w-xs:12">
                        <div class="box-all-secont-ss">
                            <div class="item-blog-secontd">
                                <div class="item-img-second">
                                    <img src="{{ asset($item->avatar_path) }}" alt="{{ $item->name }}">
                                </div>
                                <div class="content-title-second">
                                    <p>{{ $item->name }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                @endif
            </div>
        </section>
        @endif
        @if(isset($ss3))
        <section class="ladi-section-cn-pages">
            <div class="container">
                <div class="conten-title-laddi">
                    <h1>{{ $ss3->name }}</h1>
                    <span>{{ $ss3->description }}</span>
                </div>
                @if(count($ss3->childs)>0)
                <div class="content-pages-ladi-box">
                    <div class="row">
                        @foreach($ss3->childs()->where('active', 1)->orderBy('order')->limit(4)->get() as $item)
                        <div class="clm abate-box" style="--w-lg:3;--w-md:4;--w-xs:12">
                            <div class="box-content-all-image">
                                <div class="img-producs-ld-pages">
                                    <img src="{{ asset($item->avatar_path) }}" alt="{{ $item->name }}">
                                </div>
                                <div class="content-ladi-box">
                                    <span>{{ $item->name }}</span>
                                    <p>{{ $item->description }}</p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    {{--<div class="bt-fist-section">XEM THÊM</div>--}}
                </div>
                @endif
            </div>
        </section>
        @endif
        @if(isset($ss4))
        <section class="ss-banner-opper" style=" background-image: url('https://w.ladicdn.com/s1440x324/59770c13085efa0c562ddfc2/sofa-vang-20230516100624-wo9vx.jpg');">
            <div class="container">

                <div class="box-content-opper">
                    <div class="row">
                        <div class="clm" style="--w-lg:6;--w-md:6;--w-xs:12">
                            <div class="content-top-cn">
                                <h1>{{ $ss4->name }}</h1>
                            </div>
                            <div class="box-left-content-opper">
                                <div class="box-saper">
                                    <div class="item-top-content-opper">
                                        <p>{{ $ss4->childs()->where('active', 1)->where('order', 1)->first()->name }} <span>{!! $ss4->childs()->where('active', 1)->where('order', 1)->first()->content !!}</span></p>
                                        <span>{{ $ss4->childs()->where('active', 1)->where('order', 1)->first()->description }}</span>
                                    </div>
                                </div>
                                <div class="box-content-btom-spaset">
                                    <p>{{ $ss4->childs()->where('active', 1)->where('order', 2)->first()->name }}</p>
                                    <a href="javascript:;" class="btn-form-pages"> NHẬN TƯ VẤN BÁO GIÁ </a>
                                </div>
                            </div>
                        </div>
                        <div class="clm" style="--w-lg:6;--w-md:6;--w-xs:12">
                            <div class="login-box">
                                <p>ĐĂNG KÝ TƯ VẤN</p>
                                <form action="{{ route('contact.storeAjax') }}" data-url="{{ route('contact.storeAjax') }}" data-ajax="submit" data-target="alert" data-href="#modalAjax" data-content="#content" data-method="POST" method="POST" name="frm" id="frm" onsubmit="return validateForm()">
                                    <input type="hidden" name="title" value="ĐĂNG KÝ TƯ VẤN LANDING PAGE">
                                    @csrf
                                    <div class="user-box">
                                        <input required="" name="name" type="text">
                                        <label>Họ và tên</label>
                                    </div>
                                    <div class="user-box">
                                        <input required="" name="email" type="text">
                                        <label>Email</label>
                                    </div>
                                    <div class="user-box">
                                        <input required="" name="phone" type="tel">
                                        <label>Số điện thoại</label>
                                    </div>
                                    <div class="user-box">
                                        <textarea name="content" cols="30" rows="5">
                                        </textarea>
                                        <label class="textra">Thông tin thêm</label>
                                    </div>
                                    <button type="submit">
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                        ĐĂNG KÝ
                                    </button>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        @endif
        @if(isset($ss5))
        <section class="font-ships">
            <div class="container">
                <div class="conten-title-laddi">
                    <h1>{{ $ss5->name }}</h1>
                    <span>{{ $ss5->description }}</span>
                </div>
                @if(count($ss5->childs)>0)
                @foreach($ss5->childs()->where('active', 1)->orderBy('order')->limit(6)->get() as $item)
                <div class="box-contetn-font-ships">
                    <div class="ladi-headline-ships">
                        <p>{{ $item->name }}</p>
                        <img src="public/frontend/images/icon-ld.PNG" alt="">
                    </div>
                </div>
                @if(count($item->childs)>0)
                <div class="row box-hepter">
                    @foreach($item->childs()->where('active', 1)->orderBy('order')->limit(6)->get() as $itemC)
                    <div class="clm" style="--w-lg:4;--w-md:4;--w-xs:12">
                        <div class="item-hepprter">
                            <img src="{{ asset($itemC->avatar_path) }}" alt="{{ $itemC->name }}">
                            <div class="content-ships">
                                <a href="javascript:;">{{ $itemC->name }}</a>
                                <p>{{ $itemC->description }}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    {{--<div class="btn-next-ships">
                            <a href="">Xem thêm </a>
                            <span><i class="fas fa-angle-down"></i></span>
                        </div>--}}
                </div>
                @endif
                @endforeach
                @endif
            </div>
        </section>
        @endif
        @if(isset($ss6))
        <section class="maydo-pages">
            <div class="container">
                <div class="conten-title-laddi">
                    <h1>{{ $ss6->name }}</h1>
                </div>
                @if(count($ss6->childs)>0)
                @foreach($ss6->childs()->where('active', 1)->orderBy('order')->limit(3)->get() as $item)
                <div class="item-maydo-pages">
                    <div class="row">
                        <div class="clm" style="--w-lg:4;--w-md:4;--w-xs:12">
                            <div class="item-name-maydo">
                                <p>{{ $item->name }}</p>
                                <span>{{ $item->description }}</span>
                            </div>
                        </div>
                        <div class="clm" style="--w-lg:5;--w-md:5;--w-xs:12">
                            <div class="item-name-maydo-center">
                                {!! $item->content !!}
                            </div>
                        </div>
                        <div class="clm" style="--w-lg:3;--w-md:3;--w-xs:12">
                            <div class="img-maydo-pages">
                                <img src="{{ asset($item->avatar_path) }}" alt="{{ $item->name }}">
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                @endif
            </div>
        </section>
        @endif
        @if(isset($ss7))
        <section class="box-slider-ld-pages">
            <div class="container">
                <div class="conten-title-laddi">
                    <h1>{{ $ss7->name }}</h1>
                    <span>{{ $ss5->description }}</span>
                </div>
                @if(count($ss7->childs)>0)
                <div class="item-slider-ld-pages">
                    @foreach($ss7->childs()->where('active', 1)->orderBy('order')->limit(20)->get() as $item)
                    <div class="item-img">
                        <img src="{{ asset($item->avatar_path) }}" alt="{{ $item->name }}">
                    </div>
                    @endforeach
                </div>
                @endif
            </div>
        </section>
        @endif
    </div>
</div>
@endsection
@section('js')
<script>
    var btnFormPages = document.querySelectorAll(".btn-form-pages");
    btnFormPages.forEach(function(element) {
        element.addEventListener("click", function() {
            document.body.classList.add("form-ld-pages");
            element.classList.add("form-ld-pages");
        });
    });
    var closeFormElement = document.querySelector(".close-form-ld-pages");
    closeFormElement.addEventListener("click", function() {
        document.body.classList.remove("form-ld-pages");
    });
</script>
@endsection