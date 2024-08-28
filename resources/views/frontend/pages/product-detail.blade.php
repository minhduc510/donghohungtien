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

@endsection
@section('content')
    <div class="main">
        <div class="box-details-tops">
            <div class="ctnr">
                <div class="row">
                    <div class="clm" style="--w-lg:7;--w-md:12;--w-xs:12">
                        <div class="box-slider-doc-products">
                            <div class="contai-products-doc">
                                <div class="item-product-slider-doc">
                                    <div class="item-slider-doc-left">
                                        <div class="item-active-slider-docs">
                                            <img src="{{ asset($data->avatar_path) }}" alt="">
                                        </div>
                                        @if ($data->images()->count() > 0)
                                            @foreach ($data->images()->get() as $item)
                                                <div class="item-active-slider-docs">
                                                    <img src="{{ asset($item->image_path) }}" alt="{{ $item->name }}">
                                                </div>
                                            @endforeach
                                        @endif
                                    </div>
                                    <div class="box-main-slicl-details-right">
                                        <div class="item-slider-doc-right">
                                            <div class="item-img-path-products">
                                                <a class="zoom " onmousemove="zoomImage(event)"
                                                    onmouseleave="resetZoom(event)" href="{{ asset($data->avatar_path) }}"
                                                    data-fancybox="abums-details">
                                                    <img src="{{ asset($data->avatar_path) }}" class="remove-bg"
                                                        alt="">
                                                    <a href="{{ asset($data->avatar_path) }}" data-fancybox="abum-zoom">
                                                        <span class="product_image_zoom_button"><i
                                                                class="fa fa-expand"></i></span>
                                                    </a>
                                                    @if ($data->old_price)
                                                        <ul class="product-flags js-product-flags">
                                                            <li class="product-flag new">-{{ $data->old_price }}%</li>
                                                        </ul>
                                                    @endif
                                                </a>
                                            </div>
                                            @if ($data->images()->count() > 0)
                                                @foreach ($data->images()->get() as $item)
                                                    <div class="item-img-path-products">
                                                        <a class="zoom " onmousemove="zoomImage(event)"
                                                            onmouseleave="resetZoom(event)"
                                                            href="{{ asset($item->image_path) }}"
                                                            data-fancybox="abums-details">
                                                            <img src="{{ asset($item->image_path) }}" class="remove-bg"
                                                                alt="">
                                                            <a href="{{ asset($item->image_path) }}"
                                                                data-fancybox="abum-zoom">
                                                                <span class="product_image_zoom_button"><i
                                                                        class="fa fa-expand"></i></span>
                                                            </a>
                                                            @if ($data->old_price)
                                                                <ul class="product-flags js-product-flags">
                                                                    <li class="product-flag new">-{{ $data->old_price }}%
                                                                    </li>
                                                                </ul>
                                                            @endif
                                                        </a>
                                                    </div>
                                                @endforeach
                                            @endif

                                        </div>

                                        @isset($uu_dai2)
                                            <div class="list-image">
                                                <div class="block-uudai">
                                                    <h2>{{ $uu_dai2->name }}</h2>
                                                    @if ($uu_dai2->childs()->where('active', 1)->count() > 0)
                                                        <div class="box-camnhan-uudai">
                                                            <div class="box-list-uudai">
                                                                @foreach ($uu_dai2->childs()->where('active', 1)->orderBy('order', 'asc')->get() as $item)
                                                                    <div class="image-item">
                                                                        <img src="{{ asset($item->image_path) }}"
                                                                            alt="{{ $item->name }}">
                                                                    </div>
                                                                @endforeach

                                                            </div>
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        @endisset
                                    </div>
                                </div>
                            </div>


                        </div>

                    </div>
                    <div class="clm" style="--w-lg:5;--w-md:12;--w-xs:12">
                        <div class="box-share-master-container">
                            <a href="javascript:;" class="social-sharing">
                                <i class="fa fa-share-alt"></i>
                                <span>Share</span>
                            </a>
                        </div>
                        <div class="box-contents-products">
                            <div id="breadcrumbs">
                                <span class="item-brck">
                                    <a href="{{ makelink('home') }}" class="home">
                                        <span>Trang chủ</span>
                                    </a>
                                </span>
                                <span class="item-brck">
                                    <a href="{{ $data->category()->first()->slug }}" class="home">
                                        <span>{{ $data->category()->first()->name }}</span>
                                    </a>
                                </span>
                                <span class="item-brck">
                                    <span class="post post-product current-item">{{ $data->name }}</span>
                                </span>
                            </div>
                            <h1 class="product_title entry-title">{{ $data->name }}</h1>
                            <div class="price-products-tion">
                                @if ($data->price)
                                    @if ($data->old_price)
                                        <span>{{ number_format($data->price * ((100 - $data->old_price) / 100)) }}
                                            VNĐ</span>

                                        <s>{{ number_format($data->price) }} VNĐ</s>
                                    @else
                                        <span>{{ number_format($data->price) }} VNĐ</span>
                                    @endif
                                @else
                                    <span>Liên hệ</span>
                                @endif
                            </div>
                            <div class="woocommerce-product-details__short-description">
                                <ul>

                                    <li class="thong_so_sp">
                                        <div class="thongso_left">Mã sản phẩm</div>
                                        <div class="thongso_right">{{ $data->masp ?? '(Chưa có thông tin)' }}</div>
                                    </li>
                                    <li class="thong_so_sp">
                                        <div class="thongso_left">Thương hiệu</div>
                                        @if ($data->supplier()->first())
                                            <div class="thongso_right">
                                                {{ $data->supplier()->first()->name }}</div>
                                        @else
                                            <div class="thongso_right">(Chưa có thông tin)</div>
                                        @endif
                                    </li>
                                    @if (isset($attributeData) && count($attributeData))
                                        <div>
                                            @foreach ($attributeData as $item)
                                                <li class="thong_so_sp">
                                                    <div class="thongso_left">{{ $item['name'] }}</div>
                                                    <div class="thongso_right">
                                                        {{ $item['value'] ?? '(Chưa có thông tin)' }}
                                                    </div>
                                                </li>
                                            @endforeach
                                        </div>
                                    @endif

                                    <li class="thong_so_sp">
                                        <div class="thongso_left">Trạng thái</div>
                                        <div class="thongso_right">{{ $data->size ? 'Còn hàng' : 'Hết hàng' }}</div>
                                    </li>

                                    <li>
                                        <div class="clear10"></div>
                                    </li>

                                </ul>
                            </div>
                            @if ($data->size)
                                <div class="box-models-content-detail-border">
                                    <div class="box-btn-details-liper">
                                        <div class="btn-plus">
                                            <input id="quantity_6694cb1261d2b" class="input-text qty text" name="quantity"
                                                value="1" aria-label="Product quantity" size="4" min="1"
                                                max="" step="1" placeholder="" inputmode="numeric"
                                                autocomplete="off">
                                            <div class="qty-adjust">
                                                <a class="qty-plus" href="#" data-value="1">
                                                    <svg width="64px" height="64px" viewBox="0 0 24 24"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                            stroke-linejoin="round"></g>
                                                        <g id="SVGRepo_iconCarrier">
                                                            <path d="M16 14L12 10L8 14" stroke="#000000" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"></path>
                                                        </g>
                                                    </svg>
                                                </a>
                                                <a class="qty-minus" href="#" data-value="1">
                                                    <svg width="64px" height="64px" viewBox="0 0 24 24"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                            stroke-linejoin="round"></g>
                                                        <g id="SVGRepo_iconCarrier">
                                                            <path d="M8 10L12 14L16 10" stroke="#000000" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"></path>
                                                        </g>
                                                    </svg>
                                                </a>
                                            </div>
                                        </div>
                                        <button type="submit" class="single_add_to_cart_button">
                                            <a class="add-to-cart" id="addCart"
                                                data-cart-list="{{ route('cart.list') }}"
                                                data-post_id="{{ $data->id }}"
                                                data-url="{{ route('cart.add', ['id' => $data->id]) }}"
                                                data-start="{{ route('cart.add', ['id' => $data->id]) }}"
                                                data-quantity="1" href="{{ route('cart.add', ['id' => $data->id]) }}">
                                                <strong>Mua ngay</strong>
                                                <span>Giao tận nơi hoặc nhận tại cửa hàng</span>
                                            </a>
                                        </button>
                                        <button type="submit" class="single_add_to_cart_button tra-gop">
                                            <a data-cart-list="{{ route('cart.list') }}"
                                                data-post_id="{{ $data->id }}"
                                                data-url="{{ route('cart.add', ['id' => $data->id]) }}"
                                                data-start="{{ route('cart.add', ['id' => $data->id]) }}"
                                                data-quantity="1" style='display:inline-block'
                                                class="buy-now btn_buynow button buy_now_button"
                                                href="{{ route('cart.add', ['id' => $data->id]) }}">
                                                <strong>Trả góp qua thẻ</strong>
                                                <span>Visa, Master, JCB</span>
                                            </a>
                                        </button>
                                    </div>

                                    <aside class="promotion_wrapper" style="display:block">
                                        @isset($uu_dai)
                                            <b id="promotion_header"><i class="fa fa-gift" aria-hidden="true"></i>
                                                {{ $uu_dai->name }}</b>
                                            <div class="khuyenmai-info">
                                                <div class="kmChung">
                                                    <div class="pack-detail">
                                                        <ul class="el-promotion-pack" style="margin-bottom: 0px">
                                                            {!! $uu_dai->description !!}
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        @endisset
                                    </aside>

                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <section class="tabs-products-details">
            <div class="ctnr">
                <div class="box-tabs-detailss">
                    <button class="tablinks active" data-electronic="tab1">Thông tin chi tiết</button>
                    @isset($baohanh_chinhsach)
                        <button class="tablinks" data-electronic="tab2">{{ $baohanh_chinhsach->name }}</button>
                    @endisset
                    @isset($cauhoi)
                        <button class="tablinks" data-electronic="tab3">{{ $cauhoi->name }}</button>
                    @endisset
                </div>

                <div id="tab1" class="tabcontent active">
                    @if ($data->content)
                        {!! $data->content !!}
                    @else
                        <div>Đang cập nhật...</div>
                    @endif
                </div>
                @isset($baohanh_chinhsach)
                    <div id="tab2" class="tabcontent">
                        {!! $baohanh_chinhsach->description !!}
                    </div>
                @endisset
                @isset($cauhoi)
                    <div id="tab3" class="tabcontent">
                        {!! $cauhoi->description !!}
                    </div>
                @endisset
            </div>
        </section>

        <div class="ctnr">
            <div class="multi-lines-box margin-b100">
                <div class="multi-lines"></div>
                <div class="multi-lines"></div>
            </div>
        </div>

        <div class="list-product-details-lq">
            <div class="ctnr">
                <div class="box-hedding-title-block">
                    <div class="block-title">Sản phẩm liên quan</div>
                </div>
                @isset($dataRelate)
                    <div class="list-product-lq-slick">
                        @if ($dataRelate->count() > 0)
                            @foreach ($dataRelate as $item)
                                <div class="col-item-product p10 clm" style="--w-lg:2.4;--w-md:4;--w-xs:6">
                                    <div class="spinner-bounce palign-center">
                                        <article class="item">
                                            <div class="product">
                                                <article class="product-miniature js-product-miniature">
                                                    <div class="thumbnail-container">
                                                        <a href="{{ $item->slug }}" class="thumbnail product-thumbnail">
                                                            <img class="img-fluid " src="{{ asset($item->avatar_path) }}"
                                                                height="370" width="328" alt="Matte Bracelet Watch"
                                                                loading="lazy"
                                                                data-full-size-image-url="{{ asset($item->avatar_path) }}">
                                                            <img class="replace-2x img_1 img-responsive " alt=""
                                                                src="{{ asset($item->avatar_path) }}">
                                                        </a>
                                                        @if ($item->old_price)
                                                            <ul class="product-flags js-product-flags">
                                                                <li class="product-flag new">
                                                                    -{{ $item->old_price }}%
                                                                </li>
                                                            </ul>
                                                        @endif
                                                    </div>

                                                    <div class="product-description">
                                                        <span class="h3 product-title"><a
                                                                href="{{ $item->slug }}">{{ $item->name }}</a></span>
                                                    </div>

                                                    <div class="box-prices-products">
                                                        @if ($item->price)
                                                            @if ($item->old_price)
                                                                <div class="price1">Giá cũ:
                                                                    <span>{{ number_format($item->price) }}</span>
                                                                    VNĐ
                                                                </div>
                                                                <div class="price">Giá bán:
                                                                    <span>{{ number_format($item->price * ((100 - $item->old_price) / 100)) }}</span>
                                                                    VNĐ
                                                                </div>
                                                            @else
                                                                <div class="price">Giá bán:
                                                                    <span>{{ number_format($item->price) }}</span>
                                                                    VNĐ
                                                                </div>
                                                            @endif
                                                        @else
                                                            <div class="price">
                                                                <span>Liên hệ</span>
                                                            </div>
                                                        @endif
                                                    </div>
                                                    <div class="status">

                                                        Tình trạng:
                                                        @if ($item->size)
                                                            <span class="conhang">Còn
                                                                hàng</span>
                                                        @else
                                                            <span class="hethang">Hết
                                                                hàng</span>
                                                        @endif
                                                    </div>
                                                    @if ($item->size)
                                                        <div class="product-bottom">

                                                            <div class="add-to-cart-button">
                                                                <form method="post" class="add-to-cart-or-refresh">
                                                                    <button class="btn btn-primary add-to-cart  "
                                                                        data-cart-list="{{ route('cart.list') }}"
                                                                        data-post_id="{{ $item->id }}"
                                                                        data-url="{{ route('cart.add', ['id' => $item->id]) }}"
                                                                        data-start="{{ route('cart.add', ['id' => $item->id]) }}"
                                                                        data-quantity="1">
                                                                        Thêm vào giỏ
                                                                        hàng
                                                                    </button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    @endif
                                                </article>
                                            </div>
                                        </article>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                @endisset
            </div>
        </div>
    </div>










    <canvas id="canvas"></canvas>

@endsection
@section('js')
    <script>
        function removeWhiteBackground(imgElement) {
            const canvas = document.getElementById('canvas');
            const ctx = canvas.getContext('2d');
            const img = new Image();

            img.onload = function() {
                canvas.width = img.width;
                canvas.height = img.height;
                ctx.drawImage(img, 0, 0);
                const imageData = ctx.getImageData(0, 0, canvas.width, canvas.height);
                const data = imageData.data;

                for (let i = 0; i < data.length; i += 4) {
                    const red = data[i];
                    const green = data[i + 1];
                    const blue = data[i + 2];
                    const alpha = data[i + 3];

                    // Nếu màu trắng thì đặt alpha (độ trong suốt) về 0
                    if (red > 240 && green > 240 && blue > 240) {
                        data[i + 3] = 0;
                    }
                }

                ctx.putImageData(imageData, 0, 0);

                // Chuyển đổi canvas thành dữ liệu ảnh và thay thế ảnh gốc
                imgElement.src = canvas.toDataURL();
            };

            img.src = imgElement.src;
        }

        document.addEventListener('DOMContentLoaded', () => {
            const imgElements = document.querySelectorAll('img.remove-bg');

            imgElements.forEach(img => {
                removeWhiteBackground(img);
            });
        });
    </script>

    <script>
        function zoomImage(event) {
            var zoomer = event.currentTarget;
            var offsetX = event.offsetX;
            var offsetY = event.offsetY;
            var xPercent = (offsetX / zoomer.offsetWidth) * 10;
            var yPercent = (offsetY / zoomer.offsetHeight) * 10;

            zoomer.querySelector('img').style.transformOrigin = xPercent + '% ' + yPercent + '%';
            zoomer.querySelector('img').style.transform = 'scale(1.1)'; // hoặc bất kỳ tỉ lệ zoom nào bạn muốn
        }

        function resetZoom(event) {
            event.currentTarget.querySelector('img').style.transform = 'scale(1)';
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
        $('.item-slider-doc-left').slick({
            dots: false,
            slidesToShow: 2,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 2500,
            prevArrow: false,
            nextArrow: false,
            speed: 1800,
            vertical: true,
            verticalSwiping: true,
            asNavFor: '.item-slider-doc-right',
            focusOnSelect: true,
            responsive: [{
                    breakpoint: 992,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 1,
                    }
                },
                {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1,
                        vertical: true,
                        verticalSwiping: true,
                    }
                },

                {
                    breakpoint: 551,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1,
                    }
                }
            ]
        });
        $('.item-slider-doc-right').slick({
            dots: false,
            slidesToShow: 1,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 2500,
            speed: 1800,
            arrow: false,
            fade: true,
            asNavFor: '.item-slider-doc-left',
            prevArrow: '<button type="button" class="slick-custom-arrow slick-prev prev-product-lq-slick"> <svg width="64px" height="64px" viewBox="0 0 1024 1024" class="icon" version="1.1" xmlns="http://www.w3.org/2000/svg" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path d="M364.8 106.666667L298.666667 172.8 637.866667 512 298.666667 851.2l66.133333 66.133333L768 512z" fill="#000000"></path></g></svg>  </button>',
            nextArrow: '<button type="button" class="slick-custom-arrow slick-next next-product-lq-slick"> <svg width="64px" height="64px" viewBox="0 0 1024 1024" class="icon" version="1.1" xmlns="http://www.w3.org/2000/svg" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path d="M364.8 106.666667L298.666667 172.8 637.866667 512 298.666667 851.2l66.133333 66.133333L768 512z" fill="#000000"></path></g></svg> </button>',
        });
        $('.list-product-lq-slick').slick({
            dots: false,
            slidesToShow: 5,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 2500,
            speed: 1800,
            arrow: false,
            prevArrow: '<button type="button" class="slick-custom-arrow slick-prev prev-product-lq-slick"> <img src="data:image/svg+xml;base64,PHN2ZyBpZD0iTGF5ZXJfMSIgZGF0YS1uYW1lPSJMYXllciAxIiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZpZXdCb3g9IjAgMCAxMDcwLjggNjg2LjIiPjxwYXRoIGQ9Ik0xMDY5LjU1LDMyNi4yM2MtOC45My0xMS4xMS0yMy40Ni0xMi4zMy0zNy44OC0xMi0xMzguMzMuMTUtMjk5LjI5LjEyLTQ1NSwuMS0xNTEuNDksMC0zMDgtLjA1LTQ0My43OC4wOSw0MC4xOC00MCw4MC43NC04MC42MywxMjAtMTIwLDQxLjg0LTQxLjg5LDg1LjEyLTg1LjIyLDEyNy44NS0xMjcuNzUsNy40NS03LjU2LDE1LjQtMTYuNjEsMTUuNTktMjguNDRhMzEuMiwzMS4yLDAsMCwwLTgtMjNBMzEuNTYsMzEuNTYsMCwwLDAsMzY2LjI2LDQuMzdjLTE2LTEuNzQtMjguMzEsMTEuMjktMzUsMTguMzVDMjU5LjkxLDk0LjI0LDE4Ny4yNSwxNjYuODYsMTE3LDIzNy4xUTYzLjM1LDI5MC42OCw5Ljc0LDM0NC4yOGwtMy4xOCwzLjE4LDMuMTgsMy4xOEMxMTQsNDU0LjkxLDIyMS44Myw1NjIuNzMsMzI4LjY0LDY2OS4zNGwyLjQ2LDIuNDhjOC4xMiw4LjI3LDE4LjIyLDE4LjU0LDMyLjI1LDE4LjU0aDBjLjU3LDAsMS4xNCwwLDEuNzEsMGEzMi4xOCwzMi4xOCwwLDAsMCwzMS4zMi0zMC43MWMuODgtOS4zMS0zLjM0LTE5LTEyLjUyLTI4LjczbC0uMS0uMWMtNDEuMTQtNDEtODIuODMtODIuNjgtMTIzLjE0LTEyMy00MS44Mi00MS44NS04NS04NS0xMjcuNzItMTI3LjU3LDIwOS44NC4xNCw0NjYuMTQuMTIsNjkyLjc0LjFoMjE0LjM3YzkuMTctLjQzLDE5LjUxLTEuODYsMjYuNzQtOS4wOWEzMi4zOSwzMi4zOSwwLDAsMCwyLjc2LTQ1WiIgdHJhbnNmb3JtPSJ0cmFuc2xhdGUoLTYuNTYgLTQuMjEpIi8+PC9zdmc+" />  </button>',
            nextArrow: '<button type="button" class="slick-custom-arrow slick-next next-product-lq-slick"> <img src="data:image/svg+xml;base64,PHN2ZyBpZD0iTGF5ZXJfMSIgZGF0YS1uYW1lPSJMYXllciAxIiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZpZXdCb3g9IjAgMCAxMDcwLjggNjg2LjIiPjxwYXRoIGQ9Ik0xNC4zOCwzMjYuMjNjOC45Mi0xMS4xMSwyMy40Ni0xMi4zMywzNy44Ny0xMiwxMzguMzQuMTUsMjk5LjMuMTIsNDU1LC4xLDE1MS40OSwwLDMwOC0uMDUsNDQzLjc3LjA5LTQwLjE3LTQwLTgwLjc0LTgwLjYzLTEyMC0xMjAtNDEuODUtNDEuODktODUuMTItODUuMjItMTI3Ljg2LTEyNy43NS03LjQ0LTcuNTYtMTUuMzktMTYuNjEtMTUuNTktMjguNDRBMzIuMzMsMzIuMzMsMCwwLDEsNzE3LjY2LDQuMzdjMTYtMS43NCwyOC4zMSwxMS4yOSwzNSwxOC4zNUM4MjQsOTQuMjQsODk2LjY4LDE2Ni44Niw5NjcsMjM3LjFxNTMuNjEsNTMuNTgsMTA3LjIyLDEwNy4xOGwzLjE4LDMuMTgtMy4xOCwzLjE4Qzk2OS45MSw0NTQuOTEsODYyLjEsNTYyLjczLDc1NS4yOCw2NjkuMzRsLTIuNDUsMi40OGMtOC4xMyw4LjI3LTE4LjIyLDE4LjU0LTMyLjI1LDE4LjU0aDBjLS41NywwLTEuMTUsMC0xLjcyLDBBMzIuMTgsMzIuMTgsMCwwLDEsNjg3LjUsNjU5LjdjLS44Ny05LjMxLDMuMzQtMTksMTIuNTItMjguNzNsLjExLS4xYzQxLjEzLTQxLDgyLjgyLTgyLjY4LDEyMy4xNC0xMjMsNDEuODItNDEuODUsODUtODUsMTI3LjcyLTEyNy41Ny0yMDkuODQuMTQtNDY2LjE0LjEyLTY5Mi43NC4xSDQzLjg4Yy05LjE3LS40My0xOS41MS0xLjg2LTI2Ljc1LTkuMDlhMzIuNCwzMi40LDAsMCwxLTIuNzUtNDVaIiB0cmFuc2Zvcm09InRyYW5zbGF0ZSgtNi41NiAtNC4yMSkiLz48L3N2Zz4=" /> </button>',
            responsive: [{
                    breakpoint: 992,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 1,
                    }
                },
                {
                    breakpoint: 551,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1,
                    }
                }
            ]
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Tìm các phần tử có class 'qty-plus' và 'qty-minus'
            const qtyPlus = document.querySelector('.qty-plus');
            const qtyMinus = document.querySelector('.qty-minus');
            const inputField = document.getElementById('quantity_6694cb1261d2b');
            const btnsAddCart = document.querySelectorAll('.single_add_to_cart_button a')

            function setValueBtnAdd(value) {
                btnsAddCart.forEach(item => {
                    item.dataset.quantity = value
                })
            }

            qtyPlus.addEventListener('click', function(event) {
                event.preventDefault(); // Ngăn chặn hành vi mặc định của thẻ <a>
                let currentValue = parseInt(inputField.value);
                const value = currentValue + 1
                inputField.value = value;
                setValueBtnAdd(value)
            });

            qtyMinus.addEventListener('click', function(event) {
                event.preventDefault();
                let currentValue = parseInt(inputField.value);
                if (currentValue > 1) { // Giảm số lượng nhưng không dưới 1
                    const value = currentValue - 1
                    inputField.value = value;
                    setValueBtnAdd(value)
                }
            });

            const productUrl = window.location.href;
            const productTitle = document.querySelector('meta[property="og:title"]').getAttribute("content");

            document.querySelector('.social-sharing').href =
                `https://www.facebook.com/sharer/sharer.php?u=${encodeURIComponent(productUrl)}`;

        });
    </script>
@endsection
