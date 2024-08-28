@extends('frontend.layouts.main')
@section('title', $seo['title'] ?? '')
@section('keywords', $seo['keywords'] ?? '')
@section('description', $seo['description'] ?? '')
@section('abstract', $seo['abstract'] ?? '')
@section('image', asset($seo['image'] ?? ''))
@section('canonical')
    <link rel="canonical" href="{{ $data->slug_full }}" />
@endsection
@section('css')
    <script src="{{ asset('frontend/js/lightbox-plus-jquery.min.js') }}"></script>
    <script src="{{ asset('frontend/js/slick.min.js') }}"></script>

    <style type="text/css">
        .fancybox-navigation button {
            display: none !important;
        }

        h1.title-header span {
            display: inline;
            font-size: 23px;
        }

        .box-image-product {
            margin-bottom: 15px;
        }

        .banner-product-by::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(180deg, rgba(0, 0, 0, 0.71) 11%, rgba(0, 0, 0, 0.33375356978728987) 33%, rgba(26, 84, 148, 0) 79%);
        }

        .main {}

        .header {
            position: unset;
        }

        .header.fixed {
            position: fixed !important;
        }

        .title-product span:after {
            font-family: inherit;
            content: "(Chưa bao gồm VAT)";
            font-size: 11px;
            color: inherit;
            font-style: italic;
            margin-left: 8px;
        }

        .main {
            margin-top: 0px !important;
        }

        .section-title-fw {
            font-weight: 500;
        }

        .price ins {
            text-decoration: unset;
        }

        .text-image .desc h2 {
            font-weight: 500;
            text-transform: uppercase;
            color: #08c;
        }

        .price ins bdi {
            color: red !important;
            font-size: 19px;
            margin-left: 10px;
            text-decoration: unset;
        }

        .product-list {
            background-color: #EFF0F200 !important;
        }

        .product-small-content {
            background-color: #F7F8FA00;
        }

        .product-small-content a h3 {
            text-transform: uppercase;
        }

        @media (max-width: 1199px) {
            .main {
                margin-top: 0;
            }
        }

        @media (max-width: 991px) {
            .main {
                margin-top: 0;
            }
        }

        .service-box {
            padding: 20px 60px;
            text-align: center;
        }

        .service__img img {
            height: 65px;
            width: auto;
        }

        .service__text {
            margin-top: 10px;
        }

        .so-widget-sow-editor {
            background: #fff;
            border-radius: 10px;
            padding: 24px;
            box-shadow: 0px 0px 10px 0px #d1d1d1;
        }

        .item-smoll-pone {
            padding: 0px 5px;
        }

        @media (max-width: 991px) {
            .main {
                margin-top: 0;
            }

            .comment .group-form:nth-child(3) {
                padding-left: 20px;
            }

            section.box-tt-products {
                padding-left: usnet;
                padding-bottom: 30px;
            }
        }

        .fancybox-navigation .fancybox-button {
            opacity: 1 !important;
            visibility: visible !important;
        }

        .fancybox-button svg path {
            stroke-width: 0 !important;
            fill: white !important;
        }

        /* .fancybox-slide--image .fancybox-content {
                width: 30% !important;
                height: 40% !important;
            } */

        .fancybox-button[disabled],
        .fancybox-button[disabled]:hover {
            color: #888;
            cursor: unset !important;
        }

        .box-banner-smoll {
            margin: 0px -5px;
        }

        .column {
            padding: 0px 5px;
        }

        @media (max-width: 1199px) {
            /* .fancybox-slide--image .fancybox-content {
                    width: 50% !important;
                    height: 38% !important;
                } */
        }

        @media (max-width:586px) {

            /* .fancybox-slide--image .fancybox-content {
                    width: 90% !important;
                    height: 26% !important;
                } */
        }


        .service {
            box-shadow: unset;
            background-color: #fff;
        }
    </style>
    <style>
        .pupup-lienhe {
            position: fixed;
            top: 0;
            left: 0;
            z-index: 1050;
            display: none;
            width: 100%;
            height: 100%;
            overflow: hidden;
            outline: 0;
        }

        .pupup-lienhe.active {
            display: block;
            overflow: visible;
        }

        .pupup-lienhe-bg {
            background-color: #0000005c;
        }

        .pupup-lienhe-content {
            background-color: white;
            padding: 15px;
            text-align: center;
            border-radius: 6px;
        }

        .pupup-lienhe-content input {
            border: 1px solid #222;
            background: #fff;
            flex: 1;
            min-width: 40px;
            border-radius: 3px;
            min-height: 38px;
            margin-bottom: 8px;
            font-size: 16px;
            color: #333;
            background-color: Transparent;
            padding: 7px 10px;
            height: auto;
            overflow: hidden;
            height: 48px;
            border: solid 1px #ddd;
            background-color: #fff;
            margin-bottom: 12px;
            display: block;
            width: 100%;
        }

        .pupup-lienhe-content button {
            border-radius: 3px;
            padding: 0;
            border-color: #1d1f5e;
            display: block;
            background-color: #1d1f5e;
            text-transform: uppercase;
            font-weight: 500;
            color: #fff;
            font-size: 18px;
            position: relative;
            line-height: 50px;
            text-align: center;
            width: 100%;
        }

        .pupup-lienhe-content h2 {
            color: black;
            font-weight: 600;
        }

        .pupup-lienhe-content span {
            margin-bottom: 10px;
            color: black;
            font-size: 14px;
            display: block;
        }

        .pupup-lienhe-content {
            position: absolute;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
        }

        .pupup-lienhe-close {
            position: absolute;
            right: 10px;
            top: 10px;
        }

        .pupup-lienhe-close svg {
            height: 18px;
            width: 21px;
            fill: #000;
        }
    </style>
@endsection
@section('content')
    <div class="main">
        <div class="breadcrumbs clearfix">
            <div class="ctnr">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <ul>
                            <li class="breadcrumbs-item">
                                <a href="{{ makeLink('home') }}" title="{{ __('home.home') }}" style="color: #333;">
                                    {{ __('home.home') }}
                                </a>
                            </li>
                            <li class="breadcrumbs-item" style="color: #84c561; padding-left:12px">
                                {{ $category->name }}
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        {{-- @if ($loiich && count($loiich->childs) > 0)
		<section class="service">
			<div class="ctnr">
				<div class="row">
					@foreach ($loiich->childs()->where('active', 1)->orderBy('order')->get() as $i)
						<div class="clm" style="--w-lg: 3; --w-sm: 6; --w-xs: 6;">
						<div class="service-box">
							<div class="service__img">
								<img src="{{ $i->image_path }}" alt="{{ $i->name }}">
							</div>
							<div class="service__text ta-center">
								{!! $i->description !!}
							</div>
						</div>
					</div>
					@endforeach
				</div>
			</div>
		</section> 
        @endif --}}
        <section class="Design-top-details">
            <div class="ctnr">
                <div class="so-widget-sow-editor">
                    <div class="row">
                        <div class="clm" style="--w-lg:4;--w-md:6;--w-xs:12">
                            <div class="box-image-product" id="load-image">
                                @if ($data->price && $data->old_price)
                                    <div class="tit">
                                        <span>Giảm
                                            {{ round((($data->old_price - $data->price) / $data->old_price) * 100) }}%</span>
                                    </div>
                                @endif
                                <div id="img_{{ $data->id }}" class="image-main">
                                    <a class="hrefImg" href="{{ asset($data->avatar_path) }}" data-fancybox="gallery">
                                        <div class="zoom">
                                            <img id="" class="expandedImg bk-product-image"
                                                src="{{ asset($data->avatar_path) }}" alt="{{ $data->name }}">
                                        </div>
                                    </a>
                                    @if ($data->images()->count() > 0)
                                        <div class="list-small-image ">
                                            <div class="pt-box autoplay5-product-detail-new box-banner-smoll">
                                                <div class="small-image column">
                                                    <img class="img_list_smail" src="{{ asset($data->avatar_path) }}"
                                                        alt="{{ asset($data->name) }}">
                                                </div>
                                                @foreach ($data->images as $image)
                                                    <div class="small-image column" data-id_option="{{ $image->id }}">
                                                        <img class="img_list_smail" src="{{ asset($image->image_path) }}"
                                                            alt="{{ $data->name }}">
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <script>
                            const smallImages = document.querySelectorAll('.img_list_smail');
                            smallImages.forEach(smallImage => {
                                smallImage.addEventListener('click', () => {
                                    const expandedImg = document.querySelector('.expandedImg');
                                    expandedImg.src = smallImage.src;
                                    const expandedImg2 = document.querySelector('#img-zoom');
                                    expandedImg2.src = smallImage.src;
                                });
                            });
                            $('.column').click(function() {
                                var src = $(this).find('img').attr('src');
                                $(".hrefImg").attr("href", src);
                                $("#expandedImg").attr("src", src);
                            });
                        </script>

                        <div class="clm" style="--w-lg:5;--w-md:6;--w-xs:12">
                            <section class="box-tt-products">

                                @php
                                    // $size = DB::table('options')
                                    //     ->select('product_id', 'size')
                                    //     ->where('product_id', $data->id)
                                    //     ->distinct('size')
                                    //     ->get();

                                    $size = DB::table('options')
                                        ->select('product_id', 'size', 'id')
                                        ->whereIn('id', function ($query) use ($data) {
                                            $query->select(DB::raw('MIN(id)'))
                                                ->from('options')
                                                ->where('product_id', $data->id)
                                                ->groupBy('size');
                                        })
                                        ->get();
                                    $optionPrice = DB::table('options')
                                        ->where('product_id', $data->id)
                                        ->first();
                                @endphp

                                <div class="box-title-details">
                                    <h1 class="title-header">{{ $data->name }}</h1>
                                    <span>MSP: {{ $data->masp }}</span>
                                    
                                    <div class="list-prices-products">
                                        @if ($optionPrice && $optionPrice->price > 0)
                                            <h1 class="title-header"><span class="giamoi">Giá: </span>{{ number_format($optionPrice->price) }}đ</h1>
                                        @else
                                            @if ($data->price > 0)
                                                <h1 class="title-header"><span class="giamoi">Giá: </span>{{ number_format($data->price) }}đ</h1>
                                            @else
                                                <h1 class="title-header">Liên hệ</h1>
                                            @endif
                                        @endif
                                    </div>
                                </div>



                                
                                
                                @if ($size->count() > 0)
                                    <div class="product-detail-filter loc1">
                                        <span class="product-detail__text d-block">
                                            Chọn kích thước tiêu chuẩn
                                        </span>
                                        <ul>
                                            @foreach ($size as $i)
                                                <li data-name1="{{ $i->size }}" class="uiverse get_size @if($optionPrice->size == $i->size) active @endif">
                                                    <span type="{{ $i->size }}">{{ $i->size }}</span>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif


                                <script>
                                    document.addEventListener('DOMContentLoaded', function() {
                                        var uiverseElements = document.querySelectorAll('.uiverse');
                            
                                        uiverseElements.forEach(function(element) {
                                            element.addEventListener('click', function() {
                                                var box = element.closest('.product-detail-filter');
                                                
                                                var uiverseInBox = box.querySelectorAll('.uiverse');
                                                uiverseInBox.forEach(function(el) {
                                                    el.classList.remove('active');
                                                });
                            
                                                element.classList.add('active');
                            
                                                var spanHienthi = box.querySelector('.hedding .hienthi');
                                                var typeValue = element.querySelector('span[type]').getAttribute('type');
                                                spanHienthi.textContent = typeValue;
                                            });
                                        });
                                    });
                                </script>

                                <script>
                                    $(document).ready(function() {
                                        function updateDataAttributes() {
                                            var size = $('.box__size').text().trim();
                                            var price = $('.giamoi').text().replace('Giá:', '').trim();
                            
                                            $('.dat_mua.buy-now').attr('data-size', size)
                                                .attr('data-price', price)
                                        }
                            
                                        var selectedSize = null;
                            
                                        function sendAjaxRequest() {
                                            if (selectedSize) {
                                                $.ajax({
                                                    url: '{{ route('UpdateOptionPrice') }}',
                                                    method: 'POST',
                                                    data: {
                                                        size: selectedSize,
                                                        product_id: {{ $data->id }} ,
                                                        _token: '{{ csrf_token() }}'
                                                    },
                                                    success: function(response) {
                                                        // console.log(response.price);
                                                        if (response.success) {
                                                            var newPriceHTML = '<h1 class="title-header"><span class="giamoi">Giá: </span>' + response.price.toLocaleString() + ' ₫';
                                                            $('.list-prices-products').html(newPriceHTML);
                                                        } else {
                                                            $('.list-prices-products').html('<h1 class="title-header">Liên hệ</h1>');
                                                        }
                                                    },
                                                    error: function(xhr) {
                                                        console.error('Error:', xhr.responseText);
                                                    }
                                                });
                                            }
                                        }
                            
                                        $('.get_size').click(function() {
                                            selectedSize = $(this).find('span[type]').attr('type');
                                            $('.box__size').text(selectedSize);
                                            updateDataAttributes();
                                            sendAjaxRequest();
                                        });
                                    });
                                </script>






                                {{-- <div class="delete-choose" style="display:none">
                                    <a id="remoteActive">Xóa</a>
                                    <div class="product__price d-flex ai-center js-between">
                                        <span class="product-detail__text">
                                            Đơn giá:
                                        </span>
                                        <span class="price__cate" id="loadPrice"></span>
                                    </div>
                                </div> --}}

                                {{-- <script>
                                    document.addEventListener('DOMContentLoaded', function () {
                                        const listItems1 = document.querySelectorAll('.product-detail-filter.loc1 ul li');
                                        const addToCartBtn = document.querySelector('.btn__addCarts a');
                                        const btn__addCarts = document.querySelector('.btn__addCarts');
                                        const deleteChoose = document.querySelector('.delete-choose');
                                        const addToCartClick = document.querySelector('.add-to-cart-click');

                                        const remoteActiveBtn = document.getElementById('remoteActive');
                                        if (remoteActiveBtn) {
                                            remoteActiveBtn.addEventListener('click', function () {
                                                listItems1.forEach(li => {
                                                    li.classList.remove('active');
                                                });
                                                if (btn__addCarts) {
                                                    btn__addCarts.style.cursor = 'no-drop';
                                                }
                                                if (addToCartBtn) {
                                                    addToCartBtn.classList.remove('active');
                                                }
                                                deleteChoose.style.display = 'none';
                                            });
                                        }

                                        function checkAllActive() {
                                            let allActive1 = false;
                                            listItems1.forEach(item => {
                                                if (item.classList.contains('active')) {
                                                    allActive1 = true;
                                                }
                                            });
                                            return allActive1;
                                        }

                                        listItems1.forEach(item => {
                                            item.addEventListener('click', () => {
                                                listItems1.forEach(li => {
                                                    li.classList.remove('active');
                                                });
                                                item.classList.add('active');
                                                if (checkAllActive()) {
                                                    if (addToCartBtn) {
                                                        addToCartBtn.classList.add('active');
                                                    }
                                                    if (btn__addCarts) {
                                                        btn__addCarts.style.cursor = 'pointer';
                                                    }
                                                    deleteChoose.style.display = 'block';
                                                    sendAjaxRequest();
                                                } else {
                                                    deleteChoose.style.display = 'none';
                                                    if (addToCartBtn) {
                                                        addToCartBtn.classList.remove('active');
                                                    }
                                                }
                                            });
                                        });

                                        function sendAjaxRequest() {
                                            var activeItem = document.querySelector('.product-detail-filter.loc1 ul li.active');
                                            if (!activeItem || !addToCartClick) return;
                                            var kichthuoc = activeItem.dataset.name1;
                                            var baseUrl = addToCartClick.dataset.url;
                                            if (!baseUrl) return;
                                            var optionParam;

                                            $.ajax({
                                                type: 'GET',
                                                url: '/load-price',
                                                data: {
                                                    kichthuoc: kichthuoc,
                                                },
                                                success: function (response) {
                                                    $('#loadPrice').html(response.price);
                                                    if (response.id_option !== null) {
                                                        optionParam = '?option_id=' + response.id_option;
                                                        baseUrl = baseUrl.split('?')[0];
                                                        baseUrl = baseUrl + optionParam;
                                                        addToCartClick.dataset.url = baseUrl;
                                                    }
                                                },
                                                error: function (error) {
                                                    console.log(error);
                                                }
                                            });
                                        }
                                    });
                                </script> --}}





                                <ul class="list-turn d-flex ai-center">
                                    <li class="d-flex ai-center">
                                        <a href="#danh-gia">
                                            <label for="">
                                                @if ($rounded_medium && $rounded_medium != 0)
                                                    @if (in_array($rounded_medium, [1, 2, 3, 4, 5]))
                                                        {{ $rounded_medium }}.0
                                                    @else
                                                        {{ $rounded_medium }}
                                                    @endif
                                                @else
                                                    5.0
                                                @endif
                                            </label>
                                        </a>
                                        <div class="star d-flex ai-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                                <path
                                                    d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z" />
                                            </svg>
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                                <path
                                                    d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z" />
                                            </svg>
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                                <path
                                                    d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z" />
                                            </svg>
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                                <path
                                                    d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z" />
                                            </svg>
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                                <path
                                                    d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z" />
                                            </svg>
                                        </div>
                                    </li>
                                    <li class="d-flex ai-center">
                                        <a href="#danh-gia">
                                            <label for="">{{ $countRating }}</label>
                                            <span>Đánh giá</span>
                                        </a>
                                    </li>
                                    <li class="d-flex ai-center">
                                        <label for="">{{ $data->view + 100 ?? '0' }}</label>
                                        <span>Lượt xem</span>
                                    </li>
                                </ul>
                                <div class="desc_content">
                                    {!! $data->description !!}
                                </div>
                                {{-- <div class="gia-product-keytion">
                                    <div class="title-product"><span>Giá bán</span></div>
                                    <div class="box-price-deis">
                                        @if ($data->price > 0)
                                            <div class="woocommerce-Price-products">
                                                {{ number_format($data->price) }}đ
                                            </div>
                                        @else
                                            <div class="woocommerce-Price-products">
                                                Liên hệ
                                            </div>
                                        @endif
                                        @if ($data->old_price > 0)
                                            <s class="woocommerce-Price-old-products">
                                                {{ number_format($data->old_price) }}đ
                                            </s>
                                        @endif
                                    </div>
                                </div> --}}
                                @if ($data->price > 0)
                                    <div class="box-quantyli-details">
                                        <div class="sl-deatil-quantyli">
                                            <input type="button" value="-">
                                            <input type="number" id="quantityInput" min="1" step="1"
                                                max="9" value="1" size="4" inputmode="numeric">
                                            <input type="button" value="+">
                                        </div>
                                        <script>
                                            $(document).ready(function() {
                                                $('input[type="button"][value="+"]').click(function() {
                                                    var quantityValue = parseInt($('#quantityInput').val()) + 1;
                                                    if (quantityValue > 9) {
                                                        quantityValue = 9;
                                                    }
                                                    $('#quantityInput').val(quantityValue);
                                                    $('.link_3d a').attr('data-quantity', quantityValue);
                                                });
                                                $('input[type="button"][value="-"]').click(function() {
                                                    var quantityValue = parseInt($('#quantityInput').val()) - 1;
                                                    if (quantityValue < 1) {
                                                        quantityValue = 1;
                                                    }
                                                    $('#quantityInput').val(quantityValue);
                                                    $('.link_3d a').attr('data-quantity', quantityValue);
                                                });
                                            });
                                        </script>

                                        <div class="link_3d">
                                            <span>
                                                <a class="dat_mua buy-now" data-cart-list="{{ route('cart.list') }}"
                                                    data-post_id="{{ $data->id }}"
                                                    data-url="{{ route('cart.add', ['id' => $data->id]) }}"
                                                    data-start="{{ route('cart.add', ['id' => $data->id]) }}"
                                                    data-quantity="1">Mua
                                                    ngay</a>
                                            </span>
                                        </div>

                                        <div class="link_3d box-them-cart">
                                            <span>
                                                <a class="dat_mua add-to-cart" data-cart-list="{{ route('cart.list') }}"
                                                    data-post_id="{{ $data->id }}"
                                                    data-url="{{ route('cart.add', ['id' => $data->id]) }}"
                                                    data-start="{{ route('cart.add', ['id' => $data->id]) }}"
                                                    data-quantity="1">Thêm giỏ hàng</a>
                                            </span>
                                        </div>
                                    </div>
                                @else
                                    <div class="box-quantyli-details">
                                        <div class="link_3d link_3d-register">
                                            <span class="tt-up">
                                                Đăng ký tư vấn
                                            </span>
                                        </div>
                                    </div>
                                @endif
                            </section>
                            @if ($baohanh_chinhsach && count($baohanh_chinhsach->childs) > 0)
                                <ul class="chinhsach-pro">
                                    @foreach ($baohanh_chinhsach->childs()->where('active', 1)->orderBy('order')->get() as $i)
                                        <li>
                                            <img width="32" height="32" src="{{ $i->image_path }}"
                                                alt="{{ $i->name }}">
                                            <span>{{ $i->name }}</span>
                                        </li>
                                    @endforeach
                                </ul>
                            @endif


                        </div>
                        <div class="clm" style="--w-lg:3;--w-md:12;--w-xs:12">
                            <ul class="dm-list-right">
                                @if ($data->old_price > 0)
                                    <li class="ds-item1 cart">
                                        <a class="">
                                            <p style="color: #fff; font-size: 15px; text-decoration: line-through;">Giá:
                                                {{ number_format($data->old_price) }}đ</p>

                                            <p>(Giá gốc của sản phẩm)</p>
                                        </a>
                                    </li>
                                @endif

                                <li class="ds-item1 cart">
                                    <a class="dat_mua add-to-cart add-to-cart-click" data-cart-list="{{ route('cart.list') }}"
                                        data-post_id="{{ $data->id }}"
                                        data-url="{{ route('cart.add', ['id' => $data->id]) }}"
                                        data-start="{{ route('cart.add', ['id' => $data->id]) }}" data-quantity="1">
                                        <span>MUA NGAY</span>
                                    </a>
                                </li>
                                @if ($hd_muahang)
                                    <li class="ds-item cart">
                                        <a class="" href="{{ $hd_muahang->slug }}">
                                            <span
                                                style="background-image: linear-gradient(to bottom right, #029826, #029826);">{{ $hd_muahang->name }}</span>
                                        </a>
                                    </li>
                                @endif

                                @if ($hd_thanhtoan)
                                    <li class="ds-item cart">
                                        <a class="" href="{{ $hd_thanhtoan->slug }}">
                                            <span
                                                style="background-image: linear-gradient(to bottom right, #293991, #293991);">{{ $hd_thanhtoan->name }}</span>
                                        </a>
                                    </li>
                                @endif

                            </ul>


                            @if ($uu_dai)
                                <div class="programme-sale">
                                    <aside class="promotion_wrapper">
                                        <h2 class="ribbon-wrap-ws">
                                            <div class="ribbon"><a href="javascript:void(0)">{{ $uu_dai->name }}</a>
                                            </div>
                                        </h2>
                                        <div class="khuyenmai-info">
                                            <div class="kmChung">
                                                <div class="pack-detail">
                                                    {!! $uu_dai->description !!}
                                                    <p class="note">{{ $uu_dai->value }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </aside>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </section>

        @if ($data->tabs()->count() > 0)
            <section class="outstanding-prd  pd-section-top pd-section-bottom">
                <div class="ctnr">
                    <h2 class="section-title tt-up ta-center">
                        Đặc điểm nổi bật
                    </h2>
                    <div class="outstanding-prd-body autoplay6">
                        @foreach ($data->tabs()->get() as $i)
                            <div class="outstanding-prd-box">
                                <img src="{{ $i->avatar_path }}" alt="{{ $i->name }}">
                                <span>{{ $i->name }}</span>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>
        @endif
        @if ($data->phukien)
            <section class="text-image pd-section-top pd-section-bottom">
                <div class="ctnr">
                    <div class="title title-img">
                        <h2>Thông tin chi tiết</h2>
                    </div>
                    <div class="row">
                        <div class="clm" style="--w-md: 12; --w-xs: 12;">
                            <div class="desc">
                                {!! $data->phukien !!}
                            </div>
                        </div>

                    </div>
                </div>
            </section>
        @endif
        <section class="parameter pd-section-top pd-section-bottom">
            <div class="ctnr">
                <div class="row">
                    @if ($data->content2)
                        <div class="clm" style="--w-md: 7; --w-xs: 12;">
                            {!! $data->content2 !!}
                        </div>
                    @endif
                    @if ($data->model)
                        <div class="clm d-flex js-left" style="--w-md: 5; --w-xs: 12;">
                            <div style="--w-md: 10; --w-xs: 12;">
                                <h2 class="section-title section-title-fw tt-up">
                                    Thông số kỹ thuật
                                </h2>
                                <div class="sp-table">
                                    {!! $data->model !!}
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
                <div class="seemore d-flex js-center">
                    <a href="" class="tt-up">
                        Xem thêm
                    </a>
                </div>
            </div>
        </section>
        <div class="comment-question pd-section-top pd-section-bottom">
            <div class="ctnr">
                <div class="row">

                    <div class="clm " style="--w-lg: 5; --w-xs: 12;">
                        @if ($cauhoi)
                            <section class="faq pd-section-top pd-section-bottom">
                                <div class="">
                                    <h2 class="section-title section-title-fw tt-up">
                                        {{ $cauhoi->name }}
                                    </h2>
                                    <h4>{{ $cauhoi->value }}</h4>
                                    @if (count($cauhoi->childs) > 0)
                                        @foreach ($cauhoi->childs()->where('active', 1)->orderBy('order')->get() as $i)
                                            <div class="question">
                                                <h2
                                                    class="question-title @if ($loop->first) active @endif d-flex">
                                                    <svg class="question-title-tru" xmlns="http://www.w3.org/2000/svg"
                                                        viewBox="0 0 448 512">

                                                        <path
                                                            d="M432 256c0 17.7-14.3 32-32 32L48 288c-17.7 0-32-14.3-32-32s14.3-32 32-32l352 0c17.7 0 32 14.3 32 32z" />
                                                    </svg>
                                                    <svg class="question-title-cong" xmlns="http://www.w3.org/2000/svg"
                                                        viewBox="0 0 448 512">

                                                        <path
                                                            d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z" />
                                                    </svg>
                                                    {{ $i->name }}
                                                </h2>
                                                <div class="answer @if ($loop->first) active @endif">
                                                    {{ $i->value }}
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                            </section>
                        @endif
                    </div>
                    <div class="clm" style="--w-lg:7; --w-xs: 12;">
                        <section class="comment">
                            <div class="" id="danh-gia">
                                <h2>Đánh giá sản phẩm</h2>
                                <div class="reviews">
                                    <h3> {{ $data->name }} </h3>
                                    <div class="reviews-box d-flex ai-center">
                                        <div class="rating-average">
                                            <div class="point-comment">
                                                @if ($rounded_medium && $rounded_medium != 0)
                                                    @if (in_array($rounded_medium, [1, 2, 3, 4, 5]))
                                                        {{ $rounded_medium }}.0
                                                    @else
                                                        {{ $rounded_medium }}
                                                    @endif
                                                @else
                                                    5.0
                                                @endif
                                            </div>
                                            <div class="product-rating">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                                    <path
                                                        d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z" />
                                                </svg>
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                                    <path
                                                        d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z" />
                                                </svg>
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                                    <path
                                                        d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z" />
                                                </svg>
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                                    <path
                                                        d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z" />
                                                </svg>
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                                    <path
                                                        d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z" />
                                                </svg>
                                            </div>
                                            @if ($countRating == 0)
                                                <span class="dont">Chưa có đánh giá nào.</span>
                                            @else
                                                <span class="dont">Đã có {{ $countRating }} đánh giá.</span>
                                            @endif
                                        </div>
                                        @if ($countRating == 0)
                                            @php
                                                $countRating = 1;
                                            @endphp
                                        @endif
                                        <div class="list-reviews flex-1">
                                            <div class="mecom_review_row d-flex">
                                                <span class="mecom_stars_value d-flex ai-center">5
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                                        <path
                                                            d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z" />
                                                    </svg>
                                                </span>
                                                <span class="mecom_rating_bar flex-1 d-flex ai-center">
                                                    <span style="background-color: #eee"
                                                        class="mecom_scala_rating p-relative w-100 d-block">
                                                        <span class="mecom_perc_rating p-absolute top-0 bottom-0 d-block"
                                                            style="width: {{ (count($star5) / $countRating) * 100 }}%; background-color: #f5a623"></span>
                                                    </span>
                                                </span>
                                                <span
                                                    class="mecom_num_reviews"><b>{{ floor((count($star5) / $countRating) * 100) }}%</b>
                                                    ({{ count($star5) }})</span>
                                            </div>
                                            <div class="mecom_review_row d-flex">
                                                <span class="mecom_stars_value d-flex ai-center">4
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                                        <path
                                                            d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z" />
                                                    </svg>
                                                </span>
                                                <span class="mecom_rating_bar flex-1 d-flex ai-center">
                                                    <span style="background-color: #eee"
                                                        class="mecom_scala_rating p-relative w-100 d-block">
                                                        <span class="mecom_perc_rating p-absolute top-0 bottom-0 d-block"
                                                            style="width: {{ (count($star4) / $countRating) * 100 }}%; background-color: #f5a623"></span>
                                                    </span>
                                                </span>
                                                <span
                                                    class="mecom_num_reviews"><b>{{ floor((count($star4) / $countRating) * 100) }}%</b>
                                                    ({{ count($star4) }})</span>
                                            </div>
                                            <div class="mecom_review_row d-flex">
                                                <span class="mecom_stars_value d-flex ai-center">3
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                                        <path
                                                            d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z" />
                                                    </svg>
                                                </span>
                                                <span class="mecom_rating_bar flex-1 d-flex ai-center">
                                                    <span style="background-color: #eee"
                                                        class="mecom_scala_rating p-relative w-100 d-block">
                                                        <span class="mecom_perc_rating p-absolute top-0 bottom-0 d-block"
                                                            style="width: {{ (count($star3) / $countRating) * 100 }}%; background-color: #f5a623"></span>
                                                    </span>
                                                </span>
                                                <span
                                                    class="mecom_num_reviews"><b>{{ floor((count($star3) / $countRating) * 100) }}%</b>
                                                    ({{ count($star3) }})</span>
                                            </div>
                                            <div class="mecom_review_row d-flex">
                                                <span class="mecom_stars_value d-flex ai-center">2
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                                        <path
                                                            d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z" />
                                                    </svg>
                                                </span>
                                                <span class="mecom_rating_bar flex-1 d-flex ai-center">
                                                    <span style="background-color: #eee"
                                                        class="mecom_scala_rating p-relative w-100 d-block">
                                                        <span class="mecom_perc_rating p-absolute top-0 bottom-0 d-block"
                                                            style="width: {{ (count($star2) / $countRating) * 100 }}%; background-color: #f5a623"></span>
                                                    </span>
                                                </span>
                                                <span
                                                    class="mecom_num_reviews"><b>{{ floor((count($star2) / $countRating) * 100) }}%</b>
                                                    ({{ count($star2) }})</span>
                                            </div>
                                            <div class="mecom_review_row d-flex">
                                                <span class="mecom_stars_value d-flex ai-center">1
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                                        <path
                                                            d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z" />
                                                    </svg>
                                                </span>
                                                <span class="mecom_rating_bar flex-1 d-flex ai-center">
                                                    <span style="background-color: #eee"
                                                        class="mecom_scala_rating p-relative w-100 d-block">
                                                        <span class="mecom_perc_rating p-absolute top-0 bottom-0 d-block"
                                                            style="width: {{ (count($star1) / $countRating) * 100 }}%; background-color: #f5a623"></span>
                                                    </span>
                                                </span>
                                                <span
                                                    class="mecom_num_reviews"><b>{{ floor((count($star1) / $countRating) * 100) }}%</b>
                                                    ({{ count($star1) }})</span>
                                            </div>
                                        </div>
                                        <div class="review-btn btn-menu-mobile__2">
                                            <a href="" class="tt-up">
                                                Đánh giá ngay
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <!--Begin: List Star-->
                                @if ($data->stars()->where('active', 1)->count() > 0)
                                    <section class="danhgia">
                                        @foreach ($data->stars()->where('active', 1)->orderBy('created_at', 'desc')->get() as $item)
                                            <div class="comment-items row" id="comments">
                                                <div class="clm d-flex" style="--w-lg: 3; --w-sm: 4; --w-xs: 12;">
                                                    <div class="f-cmusers">
                                                        @php
                                                            $parts = explode(' ', $item->name); // Tách tên thành các phần
                                                            $initial = '';

                                                            foreach ($parts as $part) {
                                                                $initial .= substr($part, 0, 1); // Lấy chữ cái đầu tiên
                                                            }
                                                        @endphp
                                                        <abbrs>{{ $initial }}</abbrs>
                                                    </div>
                                                    <div class="box-cm">
                                                        <strong class="f-cmnames">{{ $item->name }}</strong>
                                                        <span class="d-flex">
                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                                                <path
                                                                    d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM369 209L241 337c-9.4 9.4-24.6 9.4-33.9 0l-64-64c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l47 47L335 175c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9z" />
                                                            </svg>
                                                            Đã mua hàng
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="clm" style="--w-lg: 9; --w-sm: 8; --w-xs: 12;">
                                                    <div class="cmuser-contents">
                                                        <div class="d-flex js-between">
                                                            <div class="star d-flex ai-center box-cm">
                                                                @for ($i = 1; $i <= 5; $i++)
                                                                    @if ($i <= $item->star)
                                                                        <li>
                                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                                viewBox="0 0 576 512">
                                                                                <path
                                                                                    d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z">
                                                                                </path>
                                                                            </svg>
                                                                        </li>
                                                                    @else
                                                                        <li>
                                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                                viewBox="0 0 576 512">
                                                                                <path fill="#C0C0C0"
                                                                                    d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z">
                                                                                </path>
                                                                            </svg>
                                                                        </li>
                                                                    @endif
                                                                @endfor
                                                                <strong class="f-cmnames">{{ $item->title }}</strong>
                                                            </div>
                                                            <div class="box-cm">

                                                                <span
                                                                    class="f-cmtimes">{{ $item->created_at->format('d/m/Y') }}</span></br>

                                                            </div>
                                                        </div>
                                                        <div class="f-cmmains">{{ $item->content }}</div>
                                                    </div>
                                                </div>


                                            </div>
                                        @endforeach
                                    </section>
                                @endif
                                <!--End: List Star-->

                                <!--Begin: Form Comment-->
                                {{-- <form action="{{ route('product.comment', ['id' => $data->id]) }}" id="comment"
                            method="POST"
                            enctype="multipart/form-data" data-url="{{ route('product.comment', ['id' => $data->id]) }}"
                            data-ajax="comment" data-method="POST">
                            @csrf
                            <div class="group-form">
                                <textarea name="content" id="" cols="30" rows="4" placeholder="Nhập bình luận..." class="w-100 d-block"></textarea>
                            </div>
                            <div class="group-form d-flex">
                                <label for="male">
                                    <input type="radio" id="male" name="gender" value="Anh">
                                    <span>Anh</span>
                                </label>
                                <label for="female">
                                    <input type="radio" id="female" name="gender" value="Chị">
                                    <span>Chị</span>
                                </label>
                                <input type="text" name="name" placeholder="Họ tên (bắt buộc)" required>
                                <input type="text" name="email" id="" placeholder="Email">
                                <button type="submit" class="tt-up">Gửi</button>
                            </div>
                            </form>

                            @if (count($data->comments) > 0)
                            <section class="danhgia">
                                @foreach ($data->comments()->where('active', 1)->orderBy('created_at', 'desc')->get() as $item)
                                <div class="comment-items" id="comments">
                                    <div class="f-cmusers">
                                        @php
                                        $parts = explode(" ", $item->name); // Tách tên thành các phần
                                        $initial = '';

                                        foreach ($parts as $part) {
                                        $initial .= substr($part, 0, 1); // Lấy chữ cái đầu tiên
                                        }
                                        @endphp
                                        <abbrs>{{ $initial }}</abbrs>
                                    </div>
                                </div>
                                @endforeach
                            </section>
                            @endif
                            @if (count($data->comments()->where('active', 1)->get()) == 0)
                            <span class="dont">Chưa có bình luận nào.</span>
                            @else
                            <span class="dont">Đã có {{ count($data->comments()->where('active', 1)->get()) }} bình
                                luận.</span>
                            @endif --}}
                                <!--End: Form Comment-->
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>


        <div class="bupup-review">
            <div class="bupup-review-bg  btn-menu-mobile__2"></div>
            <div class="bupup-review-body">
                <div style="">
                    <form action="{{ route('product.rating', ['id' => $data->id]) }}" id="rating" method="POST"
                        enctype="multipart/form-data" data-url="{{ route('product.rating', ['id' => $data->id]) }}"
                        data-ajax="rating" data-method="POST">
                        @csrf
                        <input type="hidden" name="allFilesData" id="allFilesDataInput" multiple>
                        <div class="bupup-review-close btn-menu-mobile__2">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512">
                                <!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                <path
                                    d="M342.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 210.7 86.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L146.7 256 41.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L192 301.3 297.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L237.3 256 342.6 150.6z" />
                            </svg>
                        </div>
                        @php
                            $titleStar = App\Models\Setting::find(278);
                        @endphp
                        <h5>Đánh giá {{ $data->name }} </h5>

                        <textarea id="comment" name="content" cols="45" rows="8" minlength="10" required=""
                            placeholder="Mời bạn chia sẻ thêm một số cảm nhận..." aria-required="true">
                    </textarea>
                        @if ($titleStar && count($titleStar->childs) > 0)
                            <select id="mySelect" name="title">
                                @foreach ($titleStar->childs as $item)
                                    <option value="{{ $item->name }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        @endif
                        {{-- <div class="wrap-attaddsend">
                        <div class="review-attach"><span class="btn-attach mecom_insert_attach">Gửi ảnh thực tế</span>
                        </div>
                    </div>
                    <div class="list_attach show-btn d-flex ai-center">
                        <ul class="mecom_attach_view">
                            <li></li>
                        </ul>
                        <span class="mecom_insert_attach">
                            <i class="mecom-plus">+</i>
                            <input type="file" name="image[]" id="imageInput" multiple>
                        </span>
                    </div> --}}
                        <script>
                            $(document).on('change', '#imageInput', function() {
                                var fileInput = $(this)[0];
                                var files = fileInput.files;
                                // console.log(files);

                                var html = '';

                                var allFilesData = JSON.parse(localStorage.getItem('allFilesData')) || {};
                                for (let i = 0; i < files.length; i++) {
                                    let file_img = files[
                                        i]; // Sử dụng 'let' thay vì 'var' để tạo một biến mới cho mỗi vòng lặp



                                    var reader = new FileReader();


                                    reader.onload = function(event) {
                                        var fileData = event.target.result; // Chuỗi mã hóa Base64
                                        var fileName = file_img.name;

                                        // Thêm dữ liệu của tệp vào đối tượng allFilesData
                                        allFilesData[fileName] = fileData;

                                        // Kiểm tra xem đã đọc xong tất cả các tệp chưa
                                        if (Object.keys(allFilesData).length === files.length) {
                                            // Lưu đối tượng chứa dữ liệu của tất cả các tệp vào localStorage
                                            localStorage.setItem('allFilesData', JSON.stringify(allFilesData));
                                        }
                                    };
                                    html += `
                                                <li><div class="img-wrap p-relative">
                                                    
                                                    <div class="img-wrap-box">
                                                        <img src="${URL.createObjectURL(file_img)}" alt="" class="h-100 w-100">
                                                    </div>
                                                </div></li>
                                            `;
                                    // Đọc tệp dưới dạng URL dữ liệu (mã hóa Base64)
                                    reader.readAsDataURL(file_img);

                                }
                                $('.mecom_attach_view').append(html);
                            });


                            $(document).on('click', 'span.close', function() {
                                var allFilesData = JSON.parse(localStorage.getItem('allFilesData'));
                                var key = $(this).data('key');
                                // Xóa phần tử DOM tương ứng
                                $(this).closest('li').remove();
                                // Xóa mục từ allFilesData
                                delete allFilesData[key];
                                // Cập nhật dữ liệu trong localStorage
                                localStorage.setItem('allFilesData', JSON.stringify(allFilesData));
                            });
                        </script>
                        <div class="comment-form-rating d-flex">
                            <label for="rating">Bạn cảm thấy thế nào về sản phẩm? (Chọn sao)</label>
                            <p class="stars selected flex-1">
                                <span class="d-flex w-100">
                                    <a class="star-1 active" data-star="1">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                            <path
                                                d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z" />
                                        </svg>
                                        Rất tệ
                                    </a>
                                    <a class="star-2 active" data-star="2">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                            <path
                                                d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z" />
                                        </svg>
                                        Tệ
                                    </a>
                                    <a class="star-3 active" data-star="3">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                            <path
                                                d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z" />
                                        </svg>
                                        Bình thường
                                    </a>
                                    <a class="star-4 active" data-star="4">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                            <path
                                                d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z" />
                                        </svg>
                                        Tốt
                                    </a>
                                    <a class="star-5 active" data-star="5">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                            <path
                                                d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z" />
                                        </svg>
                                        Rất tốt
                                    </a>
                                </span>
                            </p>

                        </div>
                        <div class="d-flex ai-center input-star">
                            <input type="text" name="name" placeholder="Họ tên (bắt buộc)" class="flex-1"
                                required>
                            <input type="text" name="phone" placeholder="Số điện thoại (bắt buộc)" class="flex-1"
                                required>
                            <input type="text" name="email" placeholder="Email" class="flex-1">
                        </div>
                        <div class="form-group">
                            {{-- <input type="checkbox" name="save" id="">
                        <span>Lưu tên của tôi, email, và trang web trong trình duyệt này cho lần bình luận kế tiếp của
                            tôi.</span> --}}
                        </div>
                        <button id="submitBtn">Gửi đánh giá</button>
                        <input type="hidden" name="star" id="starInput" value="5">
                    </form>
                    <script>
                        $(document).on('submit', "[data-ajax='comment']", function(e) {
                            e.preventDefault();
                            let myThis = $(this);
                            let formValues = $(this).serialize();
                            let dataInput = $(this).data();


                            $.ajax({
                                type: dataInput.method,
                                url: dataInput.url,
                                data: formValues,
                                dataType: "json",
                                success: function(response) {
                                    if (response.code == 200) {
                                        myThis.find(
                                                'input:not([type="hidden"]), textarea:not([type="hidden"])')
                                            .val(
                                                '');
                                        Swal.fire({
                                            position: 'center',
                                            icon: 'success',
                                            title: response.message,
                                            showConfirmButton: false,
                                            timer: 1500
                                        });
                                    } else {
                                        Swal.fire({
                                            position: 'center',
                                            icon: 'error',
                                            title: response.message,
                                            showConfirmButton: false,
                                            timer: 1500
                                        });
                                    }
                                    location.reload();
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
                    </script>
                    <script>
                        document.addEventListener("DOMContentLoaded", function() {
                            // Lấy tất cả các sao
                            const stars = document.querySelectorAll(".stars a");

                            // Lặp qua từng sao
                            stars.forEach(function(star) {
                                // Gắn sự kiện click cho mỗi sao
                                star.addEventListener("click", function(event) {
                                    // Ngăn chặn hành vi mặc định của thẻ 'a' (chẳng hạn đi đến một URL khác)
                                    event.preventDefault();
                                    const starValue = star.getAttribute("data-star");
                                    const starInput = document.getElementById("starInput");
                                    starInput.value = starValue;

                                    // Lấy ra tất cả các sao trước và bao gồm sao hiện tại
                                    const clickedStarIndex = parseInt(star.classList[0].split('-')[1]);
                                    const allStars = document.querySelectorAll(
                                        `.stars a[class*="star-"]`);

                                    // Lặp qua từng sao và thêm/xóa lớp 'active' tùy thuộc vào vị trí của sao được click
                                    allStars.forEach(function(singleStar, index) {
                                        if (index < clickedStarIndex) {
                                            singleStar.classList.add("active");
                                        } else {
                                            singleStar.classList.remove("active");
                                        }
                                    });
                                });
                            });
                        });
                    </script>

                    <script>
                        $(document).on('submit', "[data-ajax='rating']", function(e) {
                            e.preventDefault();
                            let myThis = $(this);
                            let formValues = $(this).serialize();
                            let dataInput = $(this).data();


                            $.ajax({
                                type: dataInput.method,
                                url: dataInput.url,
                                data: formValues,
                                dataType: "json",
                                success: function(response) {
                                    if (response.code == 200) {
                                        myThis.find(
                                                'input:not([type="hidden"]), textarea:not([type="hidden"])')
                                            .val(
                                                '');
                                        Swal.fire({
                                            position: 'center',
                                            icon: 'success',
                                            title: response.message,
                                            showConfirmButton: false,
                                            timer: 1500
                                        });
                                    } else {
                                        Swal.fire({
                                            position: 'center',
                                            icon: 'error',
                                            title: response.message,
                                            showConfirmButton: false,
                                            timer: 1500
                                        });
                                    }
                                    // console.log( response.html);
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
                    </script>
                </div>
            </div>
        </div>


        <div class="pupup-lienhe">
            <div class="pupup-lienhe-bg p-absolute top-0 left-0 right-0 bottom-0"></div>
            <div class="pupup-lienhe-body h-100 p-relative">
                <div class="ctnr">
                    <div class="pupup-lienhe-content" style="--w-xl: 3;--w-lg: 4.5; --w-md: 6.5; --w-sm: 8.5; --w-xs: 12">
                        <div class="pupup-lienhe-close link_3d-register">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                <!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                <path
                                    d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM175 175c9.4-9.4 24.6-9.4 33.9 0l47 47 47-47c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9l-47 47 47 47c9.4 9.4 9.4 24.6 0 33.9s-24.6 9.4-33.9 0l-47-47-47 47c-9.4 9.4-24.6 9.4-33.9 0s-9.4-24.6 0-33.9l47-47-47-47c-9.4-9.4-9.4-24.6 0-33.9z" />
                            </svg>
                        </div>
                        <h2 class="tt-up">
                            Đăng ký ngay
                        </h2>
                        <span>(Điền đầy thủ thông tin vào ô nhập thông tin)</span>
                        <form action="{{ route('contact.storeAjax') }}" data-url="{{ route('contact.storeAjax') }}"
                            data-ajax="submit03" data-target="alert" data-href="#modalAjax" data-content="#content"
                            data-method="POST" method="POST" name="frm" id="frm">
                            <input type="hidden" name="title" value="ĐĂNG KÝ TƯ VẤN ĐẶT HÀNG">
                            @csrf
                            <input type="text" name="id" id="" placeholder="Sản phẩm muốn xem *"
                                value="{{ $data->name }}">
                            <input type="text" name="name" id="" placeholder="Họ tên *">
                            <input type="tel" name="phone" id="" placeholder="Số điện thoại *">
                            <input type="text" name="address_detail" id="" placeholder="Địa chỉ">
                            <input type="text" name="content" id="" placeholder="Nội dung">
                            <button type="submit" class="tt-up">Đăng ký ngay</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <script>
            function toggleContent() {
                var contentDiv = document.getElementById("myTabContents");
                var button = document.querySelector(".btn-ngan-text");

                if (contentDiv.style.height === "100%") {
                    contentDiv.style.height = "100px";
                    contentDiv.style.overflow = "hidden"; // Corrected typo here
                    button.textContent = "Xem thêm";
                } else {
                    contentDiv.style.height = "100%";
                    button.textContent = "Thu gọn";
                }
            }
        </script>

        <script>
            $(document).ready(function() {
                // Function to update sticky header position
                function updateStickyHeaderPosition() {
                    var stickyHeader = $('#stickyHeader');
                    var firstColumn = $('.para_product .clm').first();

                    // Get the top position of the first column
                    var firstColumnTop = firstColumn.offset().top;

                    // Calculate the height of the sticky header
                    var stickyHeaderHeight = stickyHeader.outerHeight();

                    // Calculate the maximum scroll position to keep the header in view
                    var maxScroll = firstColumnTop - 50; // 50px offset from the top

                    // Get the current scroll position
                    var scrollPos = $(window).scrollTop();

                    // Check if the scroll position is within the allowed range
                    if (scrollPos <= maxScroll) {
                        // Adjust the top position of the header based on the scroll position
                        stickyHeader.css({
                            top: scrollPos + 50 + 'px' // Adjust this value based on your design
                        });
                    } else {
                        // Reset the top position when the header is not in view
                        stickyHeader.css({
                            top: '50px' // Adjust this value based on your design
                        });
                    }
                }

                // Update sticky header position on page load
                updateStickyHeaderPosition();

                // Update sticky header position on window scroll
                $(window).scroll(function() {
                    updateStickyHeaderPosition();
                });
            });
        </script>
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                const questions = document.querySelectorAll('.question');

                questions.forEach(function(question) {
                    const title = question.querySelector('.question-title');

                    title.addEventListener('click', function() {
                        // Toggle class 'active' để mở hoặc đóng câu trả lời
                        question.querySelector('.answer').classList.toggle('active');
                        question.querySelector('.question-title').classList.toggle('active');
                    });
                });
            });
        </script>
        <!--Begin: Sản phẩm ghép đôi-->
        @php
            $main_product_id = $data->id;
            $productId = DB::table('product_and_product')
                ->where('main_product_id', $main_product_id)
                ->pluck('compound_product_id')
                ->toArray();
            $products = App\Models\Product::whereIn('id', $productId)
                ->where('active', 1)
                ->orderBy('order')
                ->limit(20)
                ->get();
        @endphp

        <!--End: Sản phẩm ghép đôi-->
        <!--Sản phẩm cùng danh mục-->


        <section class="product pd-section-top pd-section-bottom">
            <div class="ctnr">
                <div class="d-flex fw-wrap">
                    <div class="w-100">
                        <div class="group-title">
                            <div class="title title-img">
                                <h2>SẢN PHẨM LIÊN QUAN</h2>
                            </div>
                        </div>
                        @if (count($dataRelate) > 0)
                            <div class="slide-3">
                                @foreach ($dataRelate as $item)
                                    <div class="product-box ">
                                        <div class="product-item">
                                            <div class="product-img p-relative">
                                                <a href="{{ $item->slug_full }}" tabindex="0">
                                                    <img class="d-block" src="{{ asset($item->avatar_path) }}"
                                                        alt="{{ $item->name }}">
                                                </a>
                                                <div class="product-action clearfix hidden-xs d-flex js-center">
                                                    <a title="Xem nhanh" href="{{ $item->slug_full }}"
                                                        data-handle="{{ $item->name }}"
                                                        class="xem_nhanh btn-circle btn_view btn right-to quick-view hidden-xs hidden-sm hidden-md">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                    <a class="dat_mua buy-now" data-cart-list="{{ route('cart.list') }}"
                                                        data-post_id="{{ $item->id }}"
                                                        data-url="{{ route('cart.add', ['id' => $item->id]) }}"
                                                        data-start="{{ route('cart.add', ['id' => $item->id]) }}"
                                                        data-quantity="1">
                                                        <i class="fas fa-dolly"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="product-content">
                                                @if ($item->price && $item->old_price)
                                                    <div class="tit">
                                                        <span>Giảm
                                                            {{ round((($item->old_price - $item->price) / $item->old_price) * 100) }}%</span>
                                                    </div>
                                                @endif
                                                <a href="{{ $item->slug_full }}" tabindex="0">
                                                    <h3>{{ $item->name }}</h3>
                                                </a>
                                                <div class="price d-flex ai-center">
                                                    @if ($item->price > 0)
                                                        <div class="price-new">{{ number_format($item->price) }}đ</div>
                                                    @else
                                                        <div class="price-new">Liên hệ</div>
                                                    @endif
                                                    @if ($item->price > 0 && $item->old_price > 0)
                                                        <del
                                                            class="price-old">{{ number_format($item->old_price) }}đ</del>
                                                    @endif
                                                </div>
                                                <div class="star d-flex ai-center">
                                                    @php
                                                        $avgRating = 0;
                                                        $sumRating = array_sum(
                                                            array_column(
                                                                $item->stars()->where('active', 1)->get()->toArray(),
                                                                'star',
                                                            ),
                                                        );
                                                        $countRating = count($item->stars()->where('active', 1)->get());
                                                        if ($countRating != 0) {
                                                            $avgRating = $sumRating / $countRating;
                                                        }
                                                    @endphp
                                                    @if ($avgRating == 0)
                                                        <li>
                                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                                                <path
                                                                    d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z">
                                                                </path>
                                                            </svg>
                                                        </li>
                                                        <li>
                                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                                                <path
                                                                    d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z">
                                                                </path>
                                                            </svg>
                                                        </li>
                                                        <li>
                                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                                                <path
                                                                    d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z">
                                                                </path>
                                                            </svg>
                                                        </li>
                                                        <li>
                                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                                                <path
                                                                    d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z">
                                                                </path>
                                                            </svg>
                                                        </li>
                                                        <li>
                                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                                                <path
                                                                    d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z">
                                                                </path>
                                                            </svg>
                                                        </li>
                                                    @else
                                                        @for ($i = 1; $i <= 5; $i++)
                                                            @if ($i <= $avgRating)
                                                                <li>
                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                        viewBox="0 0 576 512">
                                                                        <path
                                                                            d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z">
                                                                        </path>
                                                                    </svg>
                                                                </li>
                                                            @else
                                                                <li>
                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                        viewBox="0 0 576 512">
                                                                        <path fill="#C0C0C0"
                                                                            d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z">
                                                                        </path>
                                                                    </svg>
                                                                </li>
                                                            @endif
                                                        @endfor
                                                    @endif
                                                </div>
                                                <div class="view">
                                                    Lượt xem: {{ $item->view + 100 }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </section>



        <script>
            $('.box-banner-smoll').slick({
                prevArrow: '<button type="button" class="slick-prev"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l192 192c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L77.3 256 246.6 86.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-192 192z"/></svg></button>',
                nextArrow: '<button type="button" class="slick-next"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M310.6 233.4c12.5 12.5 12.5 32.8 0 45.3l-192 192c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3L242.7 256 73.4 86.6c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0l192 192z"/></svg></button>',
                dots: false,
                speed: 1000,
                slidesToShow: 3,
                slidesToScroll: 1,
                arrows: true,
                autoplay: true,
                responsive: [{
                    breakpoint: 767,
                    settings: {
                        arrows: false,
                        prevArrow: false,
                        nextArrow: false,
                        slidesToShow: 3,
                        vertical: false,
                    },
                    breakpoint: 486,
                    settings: {
                        slidesToShow: 3,
                        vertical: false,
                    }
                }]
            });
        </script>

        <!--Begin: Popup Thông báo đanh giá star-->
        <div id="popup" style="display: none;" class="popup">
            <div class="popup-content">
                <div>
                    <img style="width: 100px; height: auto" src="{{ $header['logo']->image_path }}"
                        alt="{{ $header['logo']->name }}" class="lazyload logo__header-img">
                </div>
                <br>
                <span class="popup-message">{{ session('arlert') }}</span>
            </div>
        </div>
        <!--End: Popup Thông báo đanh giá star-->
        <script>
            $(window).scroll(function(event) {
                var tabList = $('html,body').scrollTop();
                if (tabList > 500) {
                    $('.nav-tabs').addClass('fixed');

                    // Kiểm tra xem div ctnr đã tồn tại chưa
                    if ($('.nav-tabs .ctnr').length === 0) {
                        // Nếu chưa tồn tại, thêm một div mới với class là "ctnr" bao quanh các phần tử con của ".nav-tabs"
                        $('.nav-tabs > *').wrapAll('<div class="ctnr"></div>');
                    }
                } else {
                    $('.nav-tabs').removeClass('fixed');

                    // Xóa div ctnr nếu tồn tại
                    $('.nav-tabs .ctnr').contents().unwrap();
                }
            });
        </script>
        <script>
            $(document).ready(function() {
                var popupMessage = "{{ session('arlert') }}";
                if (popupMessage) {
                    // Hiển thị thông báo popup
                    $(".popup-message").text(popupMessage);
                    $("#popup").show();
                    // Thiết lập thời gian trễ 5 giây trước khi ẩn popup
                    setTimeout(function() {
                        $("#popup").hide();
                    }, 3000); // 5000 milliseconds = 5 giây
                }
                // Đóng popup khi nhấn nút Đóng
                $("#close-popup").click(function() {
                    $("#popup").hide();
                });
            });

            document.querySelectorAll('.star-list').forEach(function(starList) {
                var listItems = starList.querySelectorAll('.star li');

                listItems.forEach(function(item, index) {
                    item.addEventListener('click', function() {
                        listItems.forEach(function(li) {
                            li.classList.remove('selected');
                        });

                        for (var i = 0; i <= index; i++) {
                            listItems[i].classList.add('selected');
                        }
                    });
                });
            });
        </script>
        <script>
            $(document).ready(function() {
                // Function to handle tab clicks and scroll to the tab content
                function handleTabClickAndScroll(tabId) {
                    // Remove the "active" class from all tab links
                    $('ul.nav-tabs li').removeClass('active');

                    // Add the "active" class to the clicked tab link
                    $('ul.nav-tabs li a[href="' + tabId + '"]').parent().addClass('active');

                    // Remove "show" and "active" classes from all tab content
                    $('.tab-content div').removeClass('show active');

                    // Add "show" and "active" classes to the corresponding tab content
                    $(tabId).addClass('show active');

                    // Get the top position of the tab content
                    var tabTopPosition = $(tabId).offset().top;

                    // Adjust the top position of the webpage with a 50px offset
                    $('html, body').animate({
                        scrollTop: tabTopPosition - 130
                    }, 500);
                }

                // Handle tab clicks and scroll to the tab content
                $('ul.nav-tabs li a').click(function(e) {
                    e.preventDefault(); // Prevent the default link behavior
                    var tab_id = $(this).attr('href');
                    handleTabClickAndScroll(tab_id);
                });
            });
        </script>
        <script type="text/javascript">
            $(document).ready(function() {
                $('.column').click(function() {
                    var src = $(this).find('img').attr('src');
                    $(".hrefImg").attr("href", src);
                    $("#expandedImg").attr("src", src);
                });

                $('.faded').slick({
                    infinite: true,
                    speed: 1000,
                    autoplay: true,
                    autoplaySpeed: 3000,
                    fade: true,
                    cssEase: 'linear'
                });
                $('.box-slick-new-tintuc').slick({
                    dots: false,
                    slidesToShow: 2,
                    slidesToScroll: 1,
                    autoplay: false,
                    arrows: false,
                    autoplaySpeed: 2000,
                })

                $('.autoplay5').slick({
                    dots: false,
                    slidesToShow: 4,
                    slidesToScroll: 1,
                    autoplay: true,
                    autoplaySpeed: 2000,
                    responsive: [{
                            breakpoint: 992,
                            settings: {
                                slidesToShow: 3,
                                autoplay: true,
                                autoplaySpeed: 2000,
                            }
                        },
                        {
                            breakpoint: 551,
                            settings: {
                                slidesToShow: 2,
                                autoplay: true,
                                autoplaySpeed: 2000,
                            }
                        }
                    ]
                });
                $('.autoplay6').slick({
                    dots: true,
                    arrows: false,
                    slidesToShow: 4,
                    slidesToScroll: 1,
                    autoplay: true,
                    autoplaySpeed: 2000,
                    responsive: [{
                            breakpoint: 992,
                            settings: {
                                slidesToShow: 3,
                                autoplay: true,
                                autoplaySpeed: 2000,
                            }
                        },
                        {
                            breakpoint: 551,
                            settings: {
                                slidesToShow: 2,
                                autoplay: true,
                                autoplaySpeed: 2000,
                            }
                        }
                    ]
                });


                $(".autoplay4_small").slick({
                    dots: false,
                    infinite: true,
                    slidesToShow: 4,
                    slidesToScroll: 1,
                    autoplay: true,
                    speed: 500,
                    autoplaySpeed: 1500,
                    responsive: [{
                        breakpoint: 425,
                        settings: {
                            slidesToShow: 3,
                        }
                    }]
                });


                $('.imgproduct').slick({
                    dots: false,
                    infinite: true,
                    speed: 1000,
                    slidesToShow: 5,
                    slidesToScroll: 1,
                    arrows: true,
                    autoplay: true,
                });
            });
        </script>
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                var header = document.getElementById("stickyHeader");
                header.style.position = "sticky";
                header.style.top = "0";
                header.style.zIndex = "100";
            });
        </script>
        <script>
            document.getElementById("myButton").addEventListener("click", function() {
                var modal = document.getElementById("myModal");
                if (modal.classList.contains("show")) {
                    modal.classList.remove("show");
                } else {
                    modal.classList.add("show");
                }
            });
        </script>
        <script>
            document.getElementById("closeButton").addEventListener("click", function() {
                var modal = document.getElementById("myModal");
                if (modal.classList.contains("show")) {
                    modal.classList.remove("show");
                }
            });
        </script>
        <script>
            function validateForm() {
                var name = document.forms["frm"]["name"].value;
                var email = document.forms["frm"]["email"].value;
                var sdt = document.forms["frm"]["phone"].value;
                var isPhoneNumber = /^[0-9]{10}$/;
                var isEmail = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
                if (name.trim() === "") {
                    alert("Vui lòng nhập họ tên!");
                    return false;
                }

                if (email.trim() === "") {
                    alert("Vui lòng nhập email!");
                    return false;
                }
                if (!(isEmail.test(email))) {
                    alert("Vui lòng nhập email hợp lệ.");
                    return false;
                }
                // if (sdt.trim() === "") {
                //   alert("Vui lòng nhập số điện thoại!");
                //   return false;
                // }
                if (!(isPhoneNumber.test(sdt))) {
                    alert("Vui lòng nhập số điện thoại hợp lệ.");
                    return false;
                }

                // alert('gửi thông tin thành công');
                return true;
            }
        </script>


        <script>
            var tabLinks = document.querySelectorAll(".tablinks");
            var tabContent = document.querySelectorAll(".tabcontent");

            tabLinks.forEach(function(el) {
                el.addEventListener("click", openTabs);
            });


            function openTabs(el) {
                var btn = el.currentTarget; // lắng nghe sự kiện và hiển thị các element
                var electronic = btn.dataset.electronic; // lấy giá trị trong data-electronic

                tabContent.forEach(function(el) {
                    el.classList.remove("active");
                }); //lặp qua các tab content để remove class active

                tabLinks.forEach(function(el) {
                    el.classList.remove("active");
                }); //lặp qua các tab links để remove class active

                document.querySelector("#" + electronic).classList.add("active");
                // trả về phần tử đầu tiên có id="" được add class active

                btn.classList.add("active");
                // các button mà chúng ta click vào sẽ được add class active
            }
        </script>
        <script>
            const linkprojects2 = document.querySelectorAll(".btn-menu-mobile__2");
            const bupuplinkproject2 = document.querySelector('.bupup-review');
            let isMenuOpenlinkproject2 = false;

            linkprojects2.forEach(linkproject2 => {
                linkproject2.addEventListener('click', l2 => {
                    l2.preventDefault();
                    isMenuOpenlinkproject2 = !isMenuOpenlinkproject2;
                    // linkproject.setAttribute('aria-expanded', String(isMenuOpen));
                    // menu.hidden = !isMenuOpen;
                    if (isMenuOpenlinkproject2) {
                        bupuplinkproject2.classList.add('active');
                    } else {
                        bupuplinkproject2.classList.remove('active');
                    }
                });
            });
        </script>

        <script>
            $(document).on('submit', "[data-ajax='sendPhone']", function(e) {
                e.preventDefault();
                let myThis = $(this);
                let formValues = $(this).serialize();
                let dataInput = $(this).data();
                let sdt = document.forms["sendPhone"]["phone"].value;
                let isPhoneNumber = /^[0-9]{10}$/;


                if (sdt.trim() === "") {
                    Swal.fire({
                        position: 'center',
                        icon: 'error',
                        title: 'Vui lòng nhập số điện thoại của bạn!',
                        showConfirmButton: false,
                        timer: 1500
                    });
                    return false;
                } else if (!(isPhoneNumber.test(sdt))) {
                    Swal.fire({
                        position: 'center',
                        icon: 'error',
                        title: 'Vui lòng nhập số điện thoại hợp lệ!',
                        showConfirmButton: false,
                        timer: 1500
                    });
                    return false;
                }

                $.ajax({
                    type: dataInput.method,
                    url: dataInput.url,
                    data: formValues,
                    dataType: "json",
                    success: function(response) {
                        if (response.code == 200) {
                            myThis.find('input:not([type="hidden"]), textarea:not([type="hidden"])').val(
                                '');
                            Swal.fire({
                                position: 'center',
                                icon: 'success',
                                title: response.html,
                                showConfirmButton: false,
                                timer: 1500
                            });
                        } else {
                            Swal.fire({
                                position: 'center',
                                icon: 'error',
                                title: response.html,
                                showConfirmButton: false,
                                timer: 1500
                            });
                        }
                        // console.log( response.html);
                    },
                    error: function(response) {
                        Swal.fire({
                            position: 'center',
                            icon: 'error',
                            title: 'Your work has been saved',
                            showConfirmButton: false,
                            timer: 1500
                        });
                    }
                });
                return false;
            });
        </script>
        <script>
            $(document).on('submit', "[data-ajax='submit03']", function(event) {
                event.preventDefault();
                let myThis = $(this);
                let formValues = $(this).serialize();
                let dataInput = $(this).data();

                var nameVal = myThis.find('[name="name"]').val().trim();

                var phoneVal = myThis.find('[name="phone"]').val().trim();

                let isPhone = /^\d{10,}$/;

                if (nameVal === '') {
                    Swal.fire({
                        position: 'center',
                        icon: 'error',
                        title: 'Vui lòng nhập Tên!',
                        showConfirmButton: false,
                        timer: 1500
                    });
                    return false;
                }

                if (phoneVal === '') {
                    Swal.fire({
                        position: 'center',
                        icon: 'error',
                        title: 'Vui lòng nhập số điện thoại!',
                        showConfirmButton: false,
                        timer: 1500
                    });
                    return false;
                } else if (!(isPhone.test(phoneVal))) {
                    Swal.fire({
                        position: 'center',
                        icon: 'error',
                        title: 'Vui lòng nhập số điện thoại hợp lệ!',
                        showConfirmButton: false,
                        timer: 1500
                    });
                    return false;
                }

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
                                    default:
                                        break;
                                }
                            }
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
                            title: 'Gửi thông tin thấy bại',
                            showConfirmButton: false,
                            timer: 1500
                        });
                    }
                });
                return false;
            });
        </script>
    @endsection
