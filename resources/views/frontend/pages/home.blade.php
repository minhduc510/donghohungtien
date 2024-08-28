@extends('frontend.layouts.main')
@section('title', $header['seo_home']->name)
@section('image', asset($header['seo_home']->image_path))
@section('keywords', $header['seo_home']->slug)
@section('description', $header['seo_home']->value)
@section('abstract', $header['seo_home']->slug)
@section('canonical')
    <link rel="canonical" href="{{ makeLink('home') }}" />
@endsection
@section('content')
    <main>
        @if (isset($slide))
            <section class="banner-desk-pages">
                <div class="list-banner-deskp">
                    @foreach ($slide as $item)
                        <div class="item-banner-desk">
                            <img src="{{ $item->image_path }}" alt="{{ $item->name }}">
                        </div>
                    @endforeach
                </div>
            </section>
        @endif

        @isset($clock_hungtien)
            <section class="abouts">
                <div class="content-section" id="sec2">
                    <div class="section-dec"
                        style="background: url('{{ asset($clock_hungtien->icon_path) }}') no-repeat center;"></div>
                    <div class="ctnr">
                        <div class="row">
                            <div class="col-lg-6 box-order-mert">
                                <div class="section-title text-align_left">
                                    <h4>{{ $clock_hungtien->value }}</h4>
                                    <h2>{{ $clock_hungtien->name }}</h2>
                                </div>
                                <div class="text-block tb-sin">
                                    {!! $clock_hungtien->description !!}
                                    <a href="{{ route('about-us') }}" class="btn fl-btn ">Xem thêm về chúng tôi</a>
                                    <div class="dc_dec-item_left"><span></span></div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12 col-xs-12 box-hero-wrap1">
                                <div class="hero-image-collge-wrap">
                                    @if ($clock_hungtien->childs()->where('active', 1)->count() > 0)
                                        <div class="single-dec_img">
                                            @foreach ($clock_hungtien->childs()->where('active', 1)->get() as $item)
                                                <div class="item-dong-bground @if ($loop->first) active @endif">
                                                    <img src="{{ asset($item->image_path) }}" alt="{{ $item->name }}">
                                                </div>
                                            @endforeach
                                        </div>
                                    @endif
                                </div>
                                <div class="d-flex js-center mobile-aboust">
                                    <a href="{{ route('about-us') }}" class="btn fl-btn mobile-sbtn-abouts">Xem thêm về chúng
                                        tôi</a>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="content-dec2 fs-wrapper"></div>
                    <div class="content-dec"><span></span></div>
                </div>
            </section>
        @endisset

        @isset($supports)
            <section class="category-usps">
                <div class="ctnr">
                    @if ($supports->childs()->where('active', 1)->count() > 0)
                        <div class="desktop-category-usps">
                            @foreach ($supports->childs()->where('active', 1)->get() as $item)
                                <div class="span4 usp-item">
                                    <div class="clearfix">
                                        <img src="{{ asset($item->icon_path) }}" alt="{{ $item->name }}">
                                        <div class="usp-text">{{ $item->name }}</div>
                                        <span>{{ $item->value }}</span>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </section>
        @endisset

        @isset($suppliers)
            <section class="box-category-dongho">
                <div class="ctnr">
                    @if ($suppliers->count() > 0)
                        <ul class="product-category-list">
                            @foreach ($suppliers as $item)
                                <li class="category_grid_item">
                                    <div class="category_grid_box">
                                        <span class="category_item_bkg"
                                            style="background-image:url('{{ asset($item->logo_path) }}')"></span>
                                        <a class="category_item" href="{{ route('home.index') }}/?brands={{ $item->id }}">
                                            <span class="category_name">
                                                <h3>{{ $item->name }}</h3>
                                                {{-- <span>{{ $item->productsByCategory()->count() }} Sản phẩm</span> --}}
                                            </span>
                                        </a>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </section>
        @endisset

        @isset($promotional_products)
            <section class="block-brand"
                style="background: {{ $promotional_products->image_path ? 'url(' . asset($promotional_products->image_path) . ')' : (isset($promotional_products->color) ? $promotional_products->color : '#fff') }}">
                <div class="ctnr">
                    <div class="box-hedding-title-block">
                        <div class="block-title">{{ $promotional_products->name }}</div>
                        <div class="block-sub-title">{{ $promotional_products->value }}</div>
                    </div>
                    @if ($category_products_hot && count($category_products_hot))
                        <div class="block">
                            <div class="box-tabs-mains-products">
                                <div class="tabs" id="tabs-group-11">
                                    @foreach ($category_products_hot as $item)
                                        <button class="tablinks @if ($loop->first) active @endif"
                                            data-electronic="bvc{{ $item->id }}">{{ $item->name }}</button>
                                    @endforeach
                                </div>
                            </div>
                            <div class="">
                                <div class="box-product-tabs">
                                    <div class="wrapper_tabcontent">
                                        @foreach ($category_products_hot as $item)
                                            <div id="bvc{{ $item->id }}"
                                                class="tabcontent @if ($loop->first) active @endif">
                                                <div class=" row-75">
                                                    <div class=" left-1">
                                                        <div class="item-ss-home-1">
                                                            <div class="row">
                                                                <div class="clm" style="--w-lg:3;--w-md:12;--w-xs:12">
                                                                    <div class="item-banner-left">
                                                                        <img
                                                                            src="{{ asset($promotional_products->icon_path) }}">
                                                                    </div>
                                                                </div>
                                                                <div class="clm" style="--w-lg:9;--w-md:12;--w-xs:12">
                                                                    <div class="list-product-item-home row">
                                                                        @php
                                                                            $list_product_id = \App\Models\ProductForCategory::where(
                                                                                'category_id',
                                                                                $item->id,
                                                                            )
                                                                                ->pluck('product_id')
                                                                                ->toArray();
                                                                            $products = \App\Models\Product::whereIn(
                                                                                'id',
                                                                                $list_product_id,
                                                                            )
                                                                                ->where([
                                                                                    ['active', 1],
                                                                                    ['sale', 1],
                                                                                    ['old_price', '>', 0],
                                                                                ])
                                                                                ->orderBy('created_at', 'desc')
                                                                                ->limit(4)
                                                                                ->get();
                                                                        @endphp
                                                                        @if ($products->count() > 0)
                                                                            @foreach ($products as $item)
                                                                                <div class="col-item-product p10 clm"
                                                                                    style="--w-lg:3;--w-md:4;--w-xs:6">
                                                                                    <div class="spinner-bounce palign-center">
                                                                                        <article class="item">
                                                                                            <div class="product">
                                                                                                <article
                                                                                                    class="product-miniature js-product-miniature">
                                                                                                    <div
                                                                                                        class="thumbnail-container">
                                                                                                        <a href="{{ $item->slug }}"
                                                                                                            class="thumbnail product-thumbnail">
                                                                                                            <img class="img-fluid remove-bg"
                                                                                                                src="{{ asset($item->avatar_path) }}"
                                                                                                                height="370"
                                                                                                                width="328"
                                                                                                                alt="{{ $item->name }}"
                                                                                                                loading="lazy"
                                                                                                                data-full-size-image-url="{{ asset($item->avatar_path) }}">
                                                                                                            <img class="replace-2x img_1 img-responsive remove-bg"
                                                                                                                alt=""
                                                                                                                src="{{ asset($item->avatar_path) }}">
                                                                                                        </a>
                                                                                                        @if ($item->old_price)
                                                                                                            <ul
                                                                                                                class="product-flags js-product-flags">
                                                                                                                <li
                                                                                                                    class="product-flag new">
                                                                                                                    -{{ $item->old_price }}%
                                                                                                                </li>
                                                                                                            </ul>
                                                                                                        @endif
                                                                                                    </div>

                                                                                                    <div
                                                                                                        class="box-content-model-pagess">
                                                                                                        <div
                                                                                                            class="product-description">
                                                                                                            <span
                                                                                                                class="h3 product-title"><a
                                                                                                                    class=""
                                                                                                                    href="{{ $item->slug }}">{{ $item->name }}</a></span>
                                                                                                        </div>
                                                                                                        <div
                                                                                                            class="box-prices-products">
                                                                                                            @if ($item->price)
                                                                                                                @if ($item->old_price)
                                                                                                                    <div
                                                                                                                        class="price1">
                                                                                                                        Giá cũ:
                                                                                                                        <span>{{ number_format($item->price) }}</span>
                                                                                                                        VNĐ
                                                                                                                    </div>
                                                                                                                    <div
                                                                                                                        class="price">
                                                                                                                        Giá bán:
                                                                                                                        <span>{{ number_format($item->price * ((100 - $item->old_price) / 100)) }}</span>
                                                                                                                        VNĐ
                                                                                                                    </div>
                                                                                                                @else
                                                                                                                    <div
                                                                                                                        class="price">
                                                                                                                        Giá bán:
                                                                                                                        <span>{{ number_format($item->price) }}</span>
                                                                                                                        VNĐ
                                                                                                                    </div>
                                                                                                                @endif
                                                                                                            @else
                                                                                                                <div
                                                                                                                    class="price">
                                                                                                                    <span>Liên
                                                                                                                        hệ</span>
                                                                                                                </div>
                                                                                                            @endif
                                                                                                        </div>
                                                                                                        <div class="status">

                                                                                                            Tình trạng:
                                                                                                            @if ($item->size)
                                                                                                                <span
                                                                                                                    class="conhang">Còn
                                                                                                                    hàng</span>
                                                                                                            @else
                                                                                                                <span
                                                                                                                    class="hethang">Hết
                                                                                                                    hàng</span>
                                                                                                            @endif
                                                                                                        </div>
                                                                                                        @if ($item->size)
                                                                                                            <div
                                                                                                                class="product-bottom">

                                                                                                                <div
                                                                                                                    class="add-to-cart-button">
                                                                                                                    <form
                                                                                                                        method="post"
                                                                                                                        class="add-to-cart-or-refresh">
                                                                                                                        <button
                                                                                                                            class="btn btn-primary add-to-cart  "
                                                                                                                            data-cart-list="{{ route('cart.list') }}"
                                                                                                                            data-post_id="{{ $item->id }}"
                                                                                                                            data-url="{{ route('cart.add', ['id' => $item->id]) }}"
                                                                                                                            data-start="{{ route('cart.add', ['id' => $item->id]) }}"
                                                                                                                            data-quantity="1">
                                                                                                                            Thêm
                                                                                                                            vào
                                                                                                                            giỏ
                                                                                                                            hàng
                                                                                                                        </button>
                                                                                                                    </form>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        @endif
                                                                                                    </div>
                                                                                                </article>
                                                                                            </div>
                                                                                        </article>
                                                                                    </div>
                                                                                </div>
                                                                            @endforeach
                                                                        @else
                                                                            <div>Không có sản phẩm nào !</div>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                        <div class="btn-vel-all-products">
                                            <a href="{{ route('sale-off') }}">Xem tất cả</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
                </div>
            </section>
        @endisset

        <div class="multi-lines-box margin-b100">
            <div class="multi-lines"></div>
            <div class="multi-lines"></div>
            <div class="multi-lines"></div>
        </div>

        @isset($clocks_men)
            <section class="block-brand"
                style="background: {{ $clocks_men->image_path ? 'url(' . asset($clocks_men->image_path) . ')' : (isset($clocks_men->color) ? $clocks_men->color : '#fff') }}">
                <div class="ctnr">
                    <div class="box-hedding-title-block">
                        <div class="block-title">{{ $clocks_men->name }}</div>
                        <div class="block-sub-title">{{ $clocks_men->value }}</div>
                    </div>

                    <div class="block">
                        <div class="container-productss">
                            <div class="">
                                <div class="box-product-tabs">
                                    <div class="wrapper_tabcontent">
                                        <div id="bvc9" class="tabcontent active">
                                            <div class=" row-75">
                                                <div class=" left-1">
                                                    <div class="item-ss-home-1 row">
                                                    <div class="clm" style="--w-lg:3;--w-md:12;--w-xs:12">
                                                            <div class="item-banner-left">
                                                                <img src="{{ asset($clocks_men->icon_path) }}">
                                                            </div>
                                                        </div>
                                                        <div class="clm" style="--w-lg:9;--w-md:12;--w-xs:12">
                                                            @if ($products_men)
                                                                <div class="list-product-item-home row">
                                                                    @foreach ($products_men as $item)
                                                                        <div class="col-item-product p10 clm"
                                                                            style="--w-lg:3;--w-md:4;--w-xs:6">
                                                                            <div class="spinner-bounce palign-center">
                                                                                <article class="item">
                                                                                    <div class="product">
                                                                                        <article
                                                                                            class="product-miniature js-product-miniature">
                                                                                            <div class="thumbnail-container">
                                                                                                <a href="{{ $item->slug }}"
                                                                                                    class="thumbnail product-thumbnail">
                                                                                                    <img class="img-fluid remove-bg"
                                                                                                        src="{{ asset($item->avatar_path) }}"
                                                                                                        height="370"
                                                                                                        width="328"
                                                                                                        alt="{{ $item->name }}"
                                                                                                        loading="lazy"
                                                                                                        data-full-size-image-url="{{ asset($item->avatar_path) }}">
                                                                                                    <img class="replace-2x img_1 img-responsive remove-bg"
                                                                                                        alt=""
                                                                                                        src="{{ asset($item->avatar_path) }}">
                                                                                                </a>
                                                                                                @if ($item->old_price)
                                                                                                    <ul
                                                                                                        class="product-flags js-product-flags">
                                                                                                        <li
                                                                                                            class="product-flag new">
                                                                                                            -{{ $item->old_price }}%
                                                                                                        </li>
                                                                                                    </ul>
                                                                                                @endif
                                                                                            </div>
                                                                                            <div
                                                                                                class="box-content-model-pagess">

                                                                                                <div
                                                                                                    class="product-description">
                                                                                                    <span
                                                                                                        class="h3 product-title"><a
                                                                                                            class=""
                                                                                                            href="{{ $item->slug }}">{{ $item->name }}</a></span>

                                                                                                </div>
                                                                                                <div
                                                                                                    class="box-prices-products">
                                                                                                    @if ($item->price)
                                                                                                        @if ($item->old_price)
                                                                                                            <div
                                                                                                                class="price1">
                                                                                                                Giá
                                                                                                                cũ:
                                                                                                                <span>{{ number_format($item->price) }}</span>
                                                                                                                VNĐ
                                                                                                            </div>
                                                                                                            <div
                                                                                                                class="price">
                                                                                                                Giá
                                                                                                                bán:
                                                                                                                <span>{{ number_format($item->price * ((100 - $item->old_price) / 100)) }}</span>
                                                                                                                VNĐ
                                                                                                            </div>
                                                                                                        @else
                                                                                                            <div
                                                                                                                class="price">
                                                                                                                Giá
                                                                                                                bán:
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
                                                                                                        <span
                                                                                                            class="conhang">Còn
                                                                                                            hàng</span>
                                                                                                    @else
                                                                                                        <span
                                                                                                            class="hethang">Hết
                                                                                                            hàng</span>
                                                                                                    @endif
                                                                                                </div>
                                                                                                @if ($item->size)
                                                                                                    <div
                                                                                                        class="product-bottom">

                                                                                                        <div
                                                                                                            class="add-to-cart-button">
                                                                                                            <form
                                                                                                                method="post"
                                                                                                                class="add-to-cart-or-refresh">
                                                                                                                <button
                                                                                                                    class="btn btn-primary add-to-cart  "
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
                                                                                            </div>
                                                                                        </article>
                                                                                    </div>
                                                                                </article>
                                                                            </div>
                                                                        </div>
                                                                    @endforeach
                                                                </div>
                                                            @endif
                                                        </div>
                                                       
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @isset($category_clock_men)
                                    <div class="btn-vel-all-products">
                                        <a href="{{ $category_clock_men->slug }}">Xem tất cả</a>
                                    </div>
                                @endisset
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        @endisset

        @isset($clocks_women)
            <section class="block-brand"
                style="background: {{ $clocks_women->image_path ? 'url(' . asset($clocks_women->image_path) . ')' : (isset($clocks_women->color) ? $clocks_women->color : '#fff') }}">
                <div class="ctnr">
                    <div class="box-hedding-title-block">
                        <div class="block-title">{{ $clocks_women->name }}</div>
                        <div class="block-sub-title">{{ $clocks_women->value }}</div>
                    </div>

                    <div class="block">
                        <div class="container-productss">
                            <div class="">
                                <div class="box-product-tabs">
                                    <div class="wrapper_tabcontent">
                                        <div id="bvc9" class="tabcontent active">
                                            <div class=" row-75">
                                                <div class=" left-1">
                                                    <div class="item-ss-home-1 row">
                                                        <div class="clm" style="--w-lg:3;--w-md:12;--w-xs:12">
                                                            <div class="item-banner-left">
                                                                <img src="{{ asset($clocks_women->icon_path) }}">
                                                            </div>
                                                        </div>
                                                        <div class="clm" style="--w-lg:9;--w-md:12;--w-xs:12">
                                                            @if ($products_women)
                                                                <div class="list-product-item-home row">
                                                                    @foreach ($products_women as $item)
                                                                        <div class="col-item-product p10 clm"
                                                                            style="--w-lg:3;--w-md:4;--w-xs:6">
                                                                            <div class="spinner-bounce palign-center">
                                                                                <article class="item">
                                                                                    <div class="product">
                                                                                        <article
                                                                                            class="product-miniature js-product-miniature">
                                                                                            <div class="thumbnail-container">
                                                                                                <a href="{{ $item->slug }}"
                                                                                                    class="thumbnail product-thumbnail">
                                                                                                    <img class="img-fluid remove-bg"
                                                                                                        src="{{ asset($item->avatar_path) }}"
                                                                                                        height="370"
                                                                                                        width="328"
                                                                                                        alt="{{ $item->name }}"
                                                                                                        loading="lazy"
                                                                                                        data-full-size-image-url="{{ asset($item->avatar_path) }}">
                                                                                                    <img class="replace-2x img_1 img-responsive remove-bg"
                                                                                                        alt=""
                                                                                                        src="{{ asset($item->avatar_path) }}">
                                                                                                </a>
                                                                                                @if ($item->old_price)
                                                                                                    <ul
                                                                                                        class="product-flags js-product-flags">
                                                                                                        <li
                                                                                                            class="product-flag new">
                                                                                                            -{{ $item->old_price }}%
                                                                                                        </li>
                                                                                                    </ul>
                                                                                                @endif
                                                                                            </div>
                                                                                            <div
                                                                                                class="box-content-model-pagess">

                                                                                                <div
                                                                                                    class="product-description">
                                                                                                    <span
                                                                                                        class="h3 product-title"><a
                                                                                                            class=""
                                                                                                            href="{{ $item->slug }}">{{ $item->name }}</a></span>

                                                                                                </div>
                                                                                                <div
                                                                                                    class="box-prices-products">
                                                                                                    @if ($item->price)
                                                                                                        @if ($item->old_price)
                                                                                                            <div
                                                                                                                class="price1">
                                                                                                                Giá
                                                                                                                cũ:
                                                                                                                <span>{{ number_format($item->price) }}</span>
                                                                                                                VNĐ
                                                                                                            </div>
                                                                                                            <div
                                                                                                                class="price">
                                                                                                                Giá
                                                                                                                bán:
                                                                                                                <span>{{ number_format($item->price * ((100 - $item->old_price) / 100)) }}</span>
                                                                                                                VNĐ
                                                                                                            </div>
                                                                                                        @else
                                                                                                            <div
                                                                                                                class="price">
                                                                                                                Giá
                                                                                                                bán:
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
                                                                                                        <span
                                                                                                            class="conhang">Còn
                                                                                                            hàng</span>
                                                                                                    @else
                                                                                                        <span
                                                                                                            class="hethang">Hết
                                                                                                            hàng</span>
                                                                                                    @endif
                                                                                                </div>
                                                                                                @if ($item->size)
                                                                                                    <div
                                                                                                        class="product-bottom">

                                                                                                        <div
                                                                                                            class="add-to-cart-button">
                                                                                                            <form
                                                                                                                method="post"
                                                                                                                class="add-to-cart-or-refresh">
                                                                                                                <button
                                                                                                                    class="btn btn-primary add-to-cart  "
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
                                                                                            </div>
                                                                                        </article>
                                                                                    </div>
                                                                                </article>
                                                                            </div>
                                                                        </div>
                                                                    @endforeach
                                                                </div>
                                                            @endif
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @isset($category_clock_women)
                                    <div class="btn-vel-all-products">
                                        <a href="{{ $category_clock_women->slug }}">Xem tất cả</a>
                                    </div>
                                @endisset
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        @endisset

        @isset($bannerTop)
            <div class="container-wide ">
                <div class="item-images-wide">
                    <img src="{{ asset($bannerTop->image_path) }}" alt="{{ $bannerTop->name }}">
                </div>
            </div>
        @endisset

        @isset($clocks_wall)
            <section class="block-brand"
                style="background: {{ $clocks_wall->image_path ? 'url(' . asset($clocks_wall->image_path) . ')' : (isset($clocks_wall->color) ? $clocks_wall->color : '#fff') }}">
                <div class="ctnr">
                    <div class="box-hedding-title-block">
                        <div class="block-title">{{ $clocks_wall->name }}</div>
                        <div class="block-sub-title">{{ $clocks_wall->value }}</div>
                    </div>

                    <div class="block">
                        <div class="container-productss">
                            <div class="">
                                <div class="box-product-tabs">
                                    <div class="wrapper_tabcontent">
                                        <div id="bvc5" class="tabcontent active">
                                            <div class=" row-75">
                                                <div class=" left-1">
                                                    <div class="item-ss-home-1 row">
                                                    <div class="clm" style="--w-lg:3;--w-md:12;--w-xs:12">
                                                            <div class="item-banner-left">
                                                                <img src="{{ asset($clocks_wall->icon_path) }}">
                                                            </div>
                                                        </div>
                                                        <div class="clm" style="--w-lg:9;--w-md:12;--w-xs:12">
                                                            @if ($product_clock_wall)
                                                                <div class="list-product-item-home row">
                                                                    @foreach ($product_clock_wall as $item)
                                                                        <div class="col-item-product p10 clm"
                                                                            style="--w-lg:3;--w-md:4;--w-xs:6">
                                                                            <div class="spinner-bounce palign-center">
                                                                                <article class="item">
                                                                                    <div class="product">
                                                                                        <article
                                                                                            class="product-miniature js-product-miniature">
                                                                                            <div class="thumbnail-container">
                                                                                                <a href="{{ $item->slug }}"
                                                                                                    class="thumbnail product-thumbnail">
                                                                                                    <img class="img-fluid remove-bg"
                                                                                                        src="{{ asset($item->avatar_path) }}"
                                                                                                        height="370"
                                                                                                        width="328"
                                                                                                        alt="{{ $item->name }}"
                                                                                                        loading="lazy"
                                                                                                        data-full-size-image-url="{{ asset($item->avatar_path) }}">
                                                                                                    <img class="replace-2x img_1 img-responsive remove-bg"
                                                                                                        alt=""
                                                                                                        src="{{ asset($item->avatar_path) }}">
                                                                                                </a>
                                                                                                @if ($item->old_price)
                                                                                                    <ul
                                                                                                        class="product-flags js-product-flags">
                                                                                                        <li
                                                                                                            class="product-flag new">
                                                                                                            -{{ $item->old_price }}%
                                                                                                        </li>
                                                                                                    </ul>
                                                                                                @endif
                                                                                            </div>
                                                                                            <div
                                                                                                class="box-content-model-pagess">

                                                                                                <div
                                                                                                    class="product-description">
                                                                                                    <span
                                                                                                        class="h3 product-title"><a
                                                                                                            class=""
                                                                                                            href="{{ $item->slug }}">{{ $item->name }}</a></span>

                                                                                                </div>
                                                                                                <div
                                                                                                    class="box-prices-products">
                                                                                                    @if ($item->price)
                                                                                                        @if ($item->old_price)
                                                                                                            <div
                                                                                                                class="price1">
                                                                                                                Giá
                                                                                                                cũ:
                                                                                                                <span>{{ number_format($item->price) }}</span>
                                                                                                                VNĐ
                                                                                                            </div>
                                                                                                            <div
                                                                                                                class="price">
                                                                                                                Giá
                                                                                                                bán:
                                                                                                                <span>{{ number_format($item->price * ((100 - $item->old_price) / 100)) }}</span>
                                                                                                                VNĐ
                                                                                                            </div>
                                                                                                        @else
                                                                                                            <div
                                                                                                                class="price">
                                                                                                                Giá
                                                                                                                bán:
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
                                                                                                        <span
                                                                                                            class="conhang">Còn
                                                                                                            hàng</span>
                                                                                                    @else
                                                                                                        <span
                                                                                                            class="hethang">Hết
                                                                                                            hàng</span>
                                                                                                    @endif
                                                                                                </div>
                                                                                                @if ($item->size)
                                                                                                    <div
                                                                                                        class="product-bottom">

                                                                                                        <div
                                                                                                            class="add-to-cart-button">
                                                                                                            <form
                                                                                                                method="post"
                                                                                                                class="add-to-cart-or-refresh">
                                                                                                                <button
                                                                                                                    class="btn btn-primary add-to-cart  "
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
                                                                                            </div>
                                                                                        </article>
                                                                                    </div>
                                                                                </article>
                                                                            </div>
                                                                        </div>
                                                                    @endforeach
                                                                </div>
                                                            @endif
                                                        </div>
                                                       
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="btn-vel-all-products">
                                    <a href="{{ $category_clock_wall->slug }}">Xem tất cả</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        @endisset


        <div class="multi-lines-box margin-b100">
            <div class="multi-lines"></div>
            <div class="multi-lines"></div>
            <div class="multi-lines"></div>
        </div>

        @isset($bannersBottom)
            <div class="box-qc-two-section">
                <div class="ctnr">
                    @if ($bannersBottom->childs()->where('active', 1)->count() > 0)
                        <div class="row">
                            @foreach ($bannersBottom->childs()->where('active', 1)->get() as $item)
                                <div class="clm" style="--w-lg:6;--w-md:12;--w-xs:12">
                                    <div class="item-image-qc">
                                        <img src="{{ asset($item->image_path) }}" alt="{{ $item->name }}">
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        @endisset
        @isset($bannersBottom)
            <div class="box-qc-two-section-mobile">
                <div class="ctnr">
                    @if ($bannersBottom->childs()->where('active', 1)->count() > 0)
                        <div class="box-qc-two-section-slider">
                            @foreach ($bannersBottom->childs()->where('active', 1)->get() as $item)
                                <div class="item-slider-qc">
                                    <img src="{{ asset($item->image_path) }}" alt="{{ $item->name }}" />
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        @endisset

        <div class="multi-lines-box margin-b100">
            <div class="multi-lines"></div>
            <div class="multi-lines"></div>
            <div class="multi-lines"></div>
        </div>

        @if ($news_title)
            <section class="block-news"
                style="background: {{ $news_title->image_path ? 'url(' . asset($news_title->image_path) . ')' : (isset($news_title->color) ? $news_title->color : '#fff') }}">
                <div class="ctnr">
                    <div class="box-hedding-title-block">
                        <div class="block-title">{{ $news_title->name }}</div>
                        <div class="block-sub-title">{{ $news_title->value }}</div>
                    </div>

                    @isset($posts_hot)
                        <div class="slick-blog-news">
                            @if ($posts_hot->count() > 0)
                                @foreach ($posts_hot as $item)
                                    <div class="item-blog-news">
                                        <div class="item">
                                            <div class="image-post">
                                                <a href="{{ $item->slug }}">
                                                    <img class="" src="{{ asset($item->avatar_path) }}"
                                                        alt="{{ $item->name }}">
                                                </a>
                                                <div class="post-date">
                                                    <span class="value">
                                                        <span
                                                            class="date second-font">{{ $item->created_at->format('d') }}</span>
                                                        <span class="month">{{ $item->created_at->format('F') }}</span>
                                                    </span>
                                                </div>
                                            </div>

                                            <div class="info-post">
                                                <div class="post-title">
                                                    <a class="post-item-link second-font"
                                                        href="{{ $item->slug }}">{{ $item->name }}</a>
                                                </div>

                                                <div class="post-short-description">
                                                    {!! $item->description !!}
                                                </div>

                                                <!-- <div class="post-read-more second-font">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        <a href="">Read more</a>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    </div> -->
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif

                        </div>
                    @endisset
                </div>
            </section>
        @endif

    </main>
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
        $('.page-template-default-banner').slick({
            dots: false,
            slidesToShow: 1,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 2500,
            speed: 1800,
        });
        $('.box-qc-two-section-slider').slick({
            dots: false,
            slidesToShow: 1,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 2500,
            speed: 1800,
        });

        $('.list-banner-deskp').slick({
            dots: false,
            slidesToShow: 1,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 2500,
            speed: 1800,
        });


        $('.product-category-list').slick({
            dots: false,
            slidesToShow: 4,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 2500,
            speed: 1800,
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
        $('.slick-blog-news').slick({
            dots: false,
            slidesToShow: 4,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 2500,
            speed: 1800,
            responsive: [{
                    breakpoint: 992,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 1,
                    }
                }, {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1,
                    }
                },
                {
                    breakpoint: 551,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                    }
                }
            ]
        });
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const blocks = document.querySelectorAll(".block");

            blocks.forEach(block => {
                const tabLinks = block.querySelectorAll(".tablinks");

                tabLinks.forEach(link => {
                    link.addEventListener("click", function() {
                        const tabId = this.getAttribute("data-electronic");

                        // Remove active class from all tab contents and tab links within the same block
                        block.querySelectorAll(".tabcontent").forEach(content => {
                            content.classList.remove("active");
                        });
                        block.querySelectorAll(".tablinks").forEach(link => {
                            link.classList.remove("active");
                        });

                        // Add active class to the clicked tab's content and tab link within the same block
                        block.querySelector(`#${tabId}`).classList.add("active");
                        this.classList.add("active");
                    });
                });
            });
        });
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const images = document.querySelectorAll(".item-dong-bground");
            let currentIndex = 0;

            setInterval(function() {
                // Remove the active class from the current element
                images[currentIndex].classList.remove("active");

                // Calculate the next index
                currentIndex = (currentIndex + 1) % images.length;

                // Add the active class to the next element
                images[currentIndex].classList.add("active");
            }, 5000); // 2000 milliseconds = 2 seconds
        });
    </script>
@endsection
