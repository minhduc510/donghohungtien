<style>
    a.bosanphan.remove-cart:hover {
        color: #fff;
    }

    a.bosanphan.remove-cart {
        display: inline-block;
        margin-left: 7px;
    }

    .tt {
        width: 0;
        height: 0;
        opacity: 0;
    }
</style>

<section class="l-header header-centered">
    <div class="box-main-header-all">
        <div class="ctnr">
            <div id="header-top-bar" class="td_dark tbd_dark">
                <div class="">
                    <div class="row">
                        <div class="clm columns topbar-menu" style="--w-lg:6">
                            <nav id="left-site-navigation-top-bar" class="main-navigation">
                                <ul id="menu-top-bar-navigation">
                                    {{-- <li class="menu-item menu-item-type-post_type"><a
                                            href="{{ makelink('home') }}">Trang chủ</a></li>
                                    <li class="menu-item menu-item-type-post_type "><a
                                            href="{{ route('about-us') }}">Giới
                                            thiệu</a></li> --}}
                                    {{-- @if ($header['tinTuc'])
                                        <li class="menu-item menu-item-type-post_type">
                                            <a href="{{ $header['tinTuc']->slug_full }}">
                                                {{ $header['tinTuc']->name }}
                                            </a>
                                        </li>
                                    @endif --}}
                                    @isset($header['address'])
                                        <li class="menu-item menu-item-type-post_type ">
                                            {{ $header['address']->value }}
                                        </li>
                                    @endisset
                                </ul>
                            </nav>

                        </div>
                        <div class="clm columns topbar-right " style=" --w-lg:6">
                            <div class="box-header-top-media-right">
                                <nav class="main-navigation myacc-navigation">
                                    <ul id="my-account">
                                        @isset($header['shop_glasses'])
                                            <li class="wishlist-link"><a target="_blank"
                                                    href="{{ $header['shop_glasses']->slug }}" class="acc-link"><i
                                                        class="wishlist-icon"></i>{{ $header['shop_glasses']->name }}
                                                </a>
                                            </li>
                                        @endisset
                                        <li class="wishlist-link"><a href="{{ route('sale-off') }}" class="acc-link"><i
                                                    class="wishlist-icon"></i>Sale Off
                                            </a>
                                        </li>
                                        <li class="">
                                            <a href="{{ route('contact.index') }}">Liên hệ</a>
                                        </li>
                                    </ul>
                                </nav>
                                @isset($header['social_media'])
                                    @if ($header['social_media']->childs()->where('active', 1)->count() > 0)
                                        <div class="topbar-social-icons-wrapper">
                                            <ul class="social-icons">
                                                @foreach ($header['social_media']->childs()->where('active', 1)->get() as $item)
                                                    <li class="facebook">
                                                        <a href="{{ $item->slug }}">{!! $item->value !!}</a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                @endisset
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header-main-section row">
                <div class="search-area">
                    <div class="l-search">
                        <div class="woodstock-search-form">
                            <form action="{{ route('home.search') }}" method="get"
                                class="searchform woodstock-ajax-search" role="search">
                                <input type="text" class="s ajax-search-input" placeholder="Nhập từ khóa"
                                    value="" name="keyword" autocomplete="off">
                                @if (isset($header['brands']) & ($header['brands']->count() > 0))
                                    @foreach ($header['brands'] as $item)
                                        <div class="tt">{{ $item->name }}</div>
                                    @endforeach
                                @endif
                                <button type="submit" class="searchsubmit">
                                    <svg width="64px" height="64px" viewBox="0 -0.5 25 25" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round">
                                        </g>
                                        <g id="SVGRepo_iconCarrier">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M5.5 10.7655C5.50003 8.01511 7.44296 5.64777 10.1405 5.1113C12.8381 4.57483 15.539 6.01866 16.5913 8.55977C17.6437 11.1009 16.7544 14.0315 14.4674 15.5593C12.1804 17.0871 9.13257 16.7866 7.188 14.8415C6.10716 13.7604 5.49998 12.2942 5.5 10.7655Z"
                                                stroke="#000000" stroke-width="1.5" stroke-linecap="round"
                                                stroke-linejoin="round"></path>
                                            <path d="M17.029 16.5295L19.5 19.0005" stroke="#000000" stroke-width="1.5"
                                                stroke-linecap="round" stroke-linejoin="round"></path>
                                        </g>
                                    </svg>
                                </button>
                            </form>
                            <div class="search-results-wrapper sd-dark">
                                <div class="woodstock-scroll nano">
                                    <div class="woodstock-search-results woodstock-scroll-content nano-content">
                                        <div class="autocomplete-suggestions"
                                            style="position: absolute; display: none; max-height: 300px; z-index: 9999;">
                                        </div>
                                    </div>
                                </div>
                                <div class="woodstock-search-loader"></div>
                            </div>
                        </div>
                    </div>
                </div>
                @isset($header['logo'])
                    <div class="l-logo">
                        <a href="{{ makelink('home') }}" rel="home">
                            <img class="site-logo" src="{{ asset($header['logo']->image_path) }}"
                                alt="{{ $header['logo']->name }}">
                        </a>
                    </div>
                @endisset
                <div class="header-tools">
                    <ul>
                        @isset($header['hotline'])
                            <li class="contact-area  hc-dark csd-dark">
                                <div class="contact-info">
                                    <span class="icons-pager">
                                        <i class="fas fa-phone-square-alt"></i>
                                    </span>
                                    <a href="{{ $header['hotline']->slug }}">
                                        <span class="contact-info-title">
                                            <span class="contact-info-subtitle">{{ $header['hotline']->name }}</span>
                                            {{ $header['hotline']->value }}
                                        </span>
                                    </a>
                                </div>
                            </li>
                        @endisset
                        <li class="shop-bag shc-dark">
                            <a href="{{ route('cart.list') }}">
                                <div class="l-header-shop">
                                    <i class="icon-shop">
                                        <svg width="64px" height="64px" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                stroke-linejoin="round"></g>
                                            <g id="SVGRepo_iconCarrier">
                                                <path
                                                    d="M3.86376 16.4552C3.00581 13.0234 2.57684 11.3075 3.47767 10.1538C4.3785 9 6.14721 9 9.68462 9H14.3153C17.8527 9 19.6214 9 20.5222 10.1538C21.4231 11.3075 20.9941 13.0234 20.1362 16.4552C19.5905 18.6379 19.3176 19.7292 18.5039 20.3646C17.6901 21 16.5652 21 14.3153 21H9.68462C7.43476 21 6.30983 21 5.49605 20.3646C4.68227 19.7292 4.40943 18.6379 3.86376 16.4552Z"
                                                    stroke="#c99400" stroke-width="1.5"></path>
                                                <path
                                                    d="M19.5 9.5L18.7896 6.89465C18.5157 5.89005 18.3787 5.38775 18.0978 5.00946C17.818 4.63273 17.4378 4.34234 17.0008 4.17152C16.5619 4 16.0413 4 15 4M4.5 9.5L5.2104 6.89465C5.48432 5.89005 5.62128 5.38775 5.90221 5.00946C6.18199 4.63273 6.56216 4.34234 6.99922 4.17152C7.43808 4 7.95872 4 9 4"
                                                    stroke="#c99400" stroke-width="1.5"></path>
                                                <path
                                                    d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4C15 4.55228 14.5523 5 14 5H10C9.44772 5 9 4.55228 9 4Z"
                                                    stroke="#c99400" stroke-width="1.5"></path>
                                            </g>
                                        </svg>
                                    </i>
                                    <div class="overview">
                                        <span class="bag-items-number">{{ $header['totalQuantity'] }} sản phẩm</span>
                                        <span class="woocommerce-Price-amount amount"><bdi><span
                                                    class="woocommerce-Price-currencySymbol">{{ number_format($header['totalPrice']) }}</span>đ</bdi></span>
                                    </div>
                                </div>
                            </a>
                            @if (!empty($header['data-cart']))
                                <div class="box_all_hover_cart">
                                    @foreach ($header['data-cart'] as $item)
                                        <div class="list-dp-header">
                                            <div class="items-hover-avatar">
                                                <img src="{{ asset($item['avatar_path']) }}"
                                                    alt="{{ $item['name'] }}">
                                            </div>
                                            <div class="item-comtetn-hover-cart">
                                                <ul>
                                                    <li class="products-names">{{ $item['name'] }}</li>
                                                    <li class="price-hover-products">
                                                        <p>Giá: {{ number_format($item['price']) }} đ</p> <span>Số
                                                            lượng:
                                                            {{ $item['quantity'] }}</span>
                                                        <a class="bosanphan remove-cart"
                                                            data-url="{{ route('cart.remove', ['id' => $item['id'], 'option' => $item['option_id']]) }}"
                                                            title="Xóa">
                                                            <i class="fa fa-trash-o" aria-hidden="true"></i>
                                                            {{ __('home.xoa') }}
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    @endforeach
                                    <br>
                                    <hr>
                                    <div class="box_hover_dele">
                                        Tổng tiền: {{ number_format($header['totalPrice']) }} đ
                                    </div>
                                    <div class="xem_gio_hang_hover">
                                        <a href="{{ route('cart.list') }}">
                                            <button class="btn btn-danger">XEM GIỎ
                                                HÀNG
                                            </button>
                                        </a>
                                    </div>
                                </div>
                            @endif
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div id="site-nav" class="l-nav h-nav">
            <div class="ctnr">
                <div class="nav-container row">
                    <nav id="nav" class="nav-holder">
                        <ul class="navigation-header">
                            <li class="navigation-header-c1s">
                                <a href="{{ makelink('home') }}">Trang chủ</a>
                            </li>
                            @isset($header['introduce'])
                                <li class="navigation-header-c1s menu-2-hover">
                                    <a href="{{ route('about-us') }}">{{ $header['introduce']->name }}</a>
                                    @if ($header['introduce']->childs()->where('active', 1)->count() > 0)
                                        <ul class="nav-sub">
                                            @foreach ($header['introduce']->childs()->where('active', 1)->get() as $item)
                                                <li class="nav-sub-item"><a
                                                        href="{{ $item->slug }}">{{ $item->name }}</a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    @endif
                                </li>
                            @endisset
                            <li class="navigation-header-c1s menu-2-hover">
                                <a href="javascrip:void(0)">Thương hiệu</a>
                                @if (isset($header['brands']) && $header['brands']->count() > 0)
                                    <ul class="nav-sub">
                                        @foreach ($header['brands'] as $item)
                                            <li class="nav-sub-item"><a
                                                    href="{{ route('home.index') }}/?brands={{ $item->id }}">{{ $item->name }}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                @endif
                            </li>
                            {{-- @isset($header['product_men'])
                                <li class="navigation-header-c1s">
                                    <a href="{{ route('home.index') }}/?attributes={{ $header['product_men']->id }}">Đồng
                                        Hồ
                                        {{ $header['product_men']->name }}</a>
                                    <div class="box_mega">
                                        <div class="contai">
                                            <div class="main_box_mega">
                                                <div class="row">
                                                    <div class="clm" style="--w-lg:9">
                                                        <div class="box-model-menuc2">
                                                            <div class="danhmuc_child">
                                                                <h3>
                                                                    <a href="javascrip:void(0)">Thương hiệu</a>
                                                                </h3>
                                                                @if (isset($header['brands']) && $header['brands']->count() > 0)
                                                                    <ul>
                                                                        @foreach ($header['brands'] as $item)
                                                                            <li><a href="{{ route('home.index') }}/?attributes={{ $header['product_men']->id }}&brands={{ $item->id }}"
                                                                                    title="{{ $item->name }}">{{ $item->name }}</a>
                                                                            </li>
                                                                        @endforeach
                                                                    </ul>
                                                                @endif
                                                            </div>
                                                            @if (isset($header['attributes_hot']) && $header['attributes_hot']->count() > 0)
                                                                @foreach ($header['attributes_hot'] as $attribute)
                                                                    <div class="danhmuc_child">
                                                                        <h3>
                                                                            <a
                                                                                href="javascrip:void(0)">{{ $attribute->name }}</a>
                                                                        </h3>
                                                                        @if ($attribute->childs()->where('active', 1)->count() > 0)
                                                                            <ul>
                                                                                @foreach ($attribute->childs()->where('active', 1)->get() as $item)
                                                                                    @php
                                                                                        $attributes =
                                                                                            $header['product_men']->id .
                                                                                            ',' .
                                                                                            $item->id;
                                                                                    @endphp
                                                                                    <li>
                                                                                        <a href="{{ route('home.index', ['attributes' => $attributes]) }}"
                                                                                            title="{{ $item->name }}">{{ $item->name }}</a>
                                                                                    </li>
                                                                                @endforeach
                                                                            </ul>
                                                                        @endif
                                                                    </div>
                                                                @endforeach
                                                            @endif
                                                            @isset($header['prices'])
                                                                <div class="danhmuc_child">
                                                                    <h3>
                                                                        <a
                                                                            href="javascrip:void(0)">{{ $header['prices']->name }}</a>
                                                                    </h3>
                                                                    @if ($header['prices']->childs()->where('active', 1)->count() > 0)
                                                                        <ul>
                                                                            @foreach ($header['prices']->childs()->where('active', 1)->orderBy('order', 'asc')->get() as $item)
                                                                                <li>
                                                                                    <a href="{{ route('home.index') }}/?attributes={{ $header['product_men']->id }}&prices={{ $item->id }}"
                                                                                        title="{{ $item->name }}">{{ $item->name }}</a>
                                                                                </li>
                                                                            @endforeach
                                                                        </ul>
                                                                    @endif
                                                                </div>
                                                            @endisset
                                                        </div>
                                                    </div>
                                                    <div class="clm mega_right" style="--w-lg:5">
                                                        <ul>
                                                            <li>
                                                                <div class="promotions">
                                                                    <a href="{{ route('sale-off') }}">
                                                                        @isset($header['image_menu'])
                                                                            <img src="{{ $header['image_menu']->image_path }}"
                                                                                alt="{{ $header['image_menu']->name }}">
                                                                        @endisset
                                                                    </a>
                                                                    <div class="abs-block abs-left"
                                                                        style="outline: none;">
                                                                        <a href="{{ route('sale-off') }}"
                                                                            class="btn-plus btn-default btn">
                                                                            <i class="fa fa-plus"
                                                                                aria-hidden="true"></i>Xem thêm
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>


                                            </div>
                                        </div>
                                    </div>
                                </li>
                            @endisset
                            @isset($header['product_women'])
                                <li class="navigation-header-c1s">
                                    <a href="{{ route('home.index') }}/?attributes={{ $header['product_women']->id }}">Đồng
                                        Hồ {{ $header['product_women']->name }}</a>
                                    <div class="box_mega">
                                        <div class="contai">
                                            <div class="main_box_mega">
                                                <div class="row">
                                                    <div class="clm" style="--w-lg:9">
                                                        <div class="box-model-menuc2">
                                                            <div class="danhmuc_child">
                                                                <h3>
                                                                    <a href="javascrip:void(0)">Thương hiệu</a>
                                                                </h3>
                                                                @if (isset($header['brands']) && $header['brands']->count() > 0)
                                                                    <ul>
                                                                        @foreach ($header['brands'] as $item)
                                                                            <li><a href="{{ route('home.index') }}/?attributes={{ $header['product_women']->id }}&brands={{ $item->id }}"
                                                                                    title="{{ $item->name }}">{{ $item->name }}</a>
                                                                            </li>
                                                                        @endforeach
                                                                    </ul>
                                                                @endif
                                                            </div>
                                                            @if (isset($header['attributes_hot']) && $header['attributes_hot']->count() > 0)
                                                                @foreach ($header['attributes_hot'] as $attribute)
                                                                    <div class="danhmuc_child">
                                                                        <h3>
                                                                            <a
                                                                                href="javascrip:void(0)">{{ $attribute->name }}</a>
                                                                        </h3>
                                                                        @if ($attribute->childs()->where('active', 1)->count() > 0)
                                                                            <ul>
                                                                                @foreach ($attribute->childs()->where('active', 1)->get() as $item)
                                                                                    @php
                                                                                        $attributes =
                                                                                            $header['product_men']->id .
                                                                                            ',' .
                                                                                            $item->id;
                                                                                    @endphp
                                                                                    <li>
                                                                                        <a href="{{ route('home.index', ['attributes' => $attributes]) }}"
                                                                                            title="{{ $item->name }}">{{ $item->name }}</a>
                                                                                    </li>
                                                                                @endforeach
                                                                            </ul>
                                                                        @endif
                                                                    </div>
                                                                @endforeach
                                                            @endif
                                                            @isset($header['prices'])
                                                                <div class="danhmuc_child">
                                                                    <h3>
                                                                        <a
                                                                            href="javascrip:void(0)">{{ $header['prices']->name }}</a>
                                                                    </h3>
                                                                    @if ($header['prices']->childs()->where('active', 1)->count() > 0)
                                                                        <ul>
                                                                            @foreach ($header['prices']->childs()->where('active', 1)->orderBy('order', 'asc')->get() as $item)
                                                                                <li>
                                                                                    <a href="{{ route('home.index') }}/?attributes={{ $header['product_women']->id }}&prices={{ $item->id }}"
                                                                                        title="{{ $item->name }}">{{ $item->name }}</a>
                                                                                </li>
                                                                            @endforeach
                                                                        </ul>
                                                                    @endif
                                                                </div>
                                                            @endisset
                                                        </div>
                                                    </div>
                                                    <div class="clm mega_right" style="--w-lg:5">
                                                        <ul>
                                                            <li>
                                                                <div class="promotions">
                                                                    <a href="{{ route('sale-off') }}">
                                                                        @isset($header['image_menu'])
                                                                            <img src="{{ $header['image_menu']->image_path }}"
                                                                                alt="{{ $header['image_menu']->name }}">
                                                                        @endisset
                                                                    </a>
                                                                    <div class="abs-block abs-left"
                                                                        style="outline: none;">
                                                                        <a href="{{ route('sale-off') }}"
                                                                            class="btn-plus btn-default btn">
                                                                            <i class="fa fa-plus"
                                                                                aria-hidden="true"></i>Xem thêm
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </li>

                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            @endisset --}}
                            @if (isset($header['categories_product']) && $header['categories_product']->childs()->where('active', 1)->count() > 0)
                                @foreach ($header['categories_product']->childs()->where('active', 1)->orderBy('order', 'asc')->get() as $item)
                                    @php
                                        $count_child_category = $item->childs()->where('active', 1)->count();
                                        if (!$count_child_category) {
                                            $list_product_id = \App\Models\ProductForCategory::where(
                                                'category_id',
                                                $item->id,
                                            )
                                                ->pluck('product_id')
                                                ->toArray();
                                            $list_supplier_id = array_unique(
                                                \App\Models\Product::whereIn('id', $list_product_id)
                                                    ->where('active', 1)
                                                    ->pluck('supplier_id')
                                                    ->toArray(),
                                            );
                                            $brands = \App\Models\Supplier::whereIn('id', $list_supplier_id)
                                                ->orderBy('order', 'asc')
                                                ->where('active', 1)
                                                ->get();

                                            $listCategoryAttribute = $item
                                                ->categoryFilterAttributeMenu()
                                                ->pluck('attribute_id')
                                                ->toArray();
                                        }
                                    @endphp
                                    <li
                                        class="navigation-header-c1s {{ $count_child_category > 0 ? 'menu-2-hover' : '' }}">
                                        <a
                                            href="{{ $item->slug }}">{{ $item->name }}</a>
                                        @if ($count_child_category > 0)
                                            <ul class="nav-sub">
                                                @foreach ($item->childs()->where('active', 1)->orderBy('order', 'asc')->get() as $child)
                                                    <li class="nav-sub-item"><a
                                                            href="{{ $child->slug }}">{{ $child->name }}</a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        @else
                                            <div class="box_mega">
                                                <div class="contai">
                                                    <div class="main_box_mega">
                                                        <div class="row">
                                                            <div class="clm" style="--w-lg:8">
                                                                <div class="box-model-menuc2">
                                                                    <div class="danhmuc_child">
                                                                        <h3>
                                                                            <a href="javascrip:void(0)">Thương hiệu</a>
                                                                        </h3>
                                                                        @if (isset($brands) && $brands->count() > 0)
                                                                            <ul>
                                                                                @foreach ($brands as $brand)
                                                                                    <li><a href="{{ route('home.index') }}/?categories={{ $item->id }}&brands={{ $brand->id }}"
                                                                                            title="{{ $brand->name }}">{{ $brand->name }}</a>
                                                                                    </li>
                                                                                @endforeach
                                                                            </ul>
                                                                        @endif
                                                                    </div>
                                                                    @php

                                                                        $attributesCategory = \App\Models\Attribute::whereIn(
                                                                            'id',
                                                                            $listCategoryAttribute,
                                                                        )
                                                                            ->where('active', 1)
                                                                            ->orderBy('order', 'asc')
                                                                            ->limit(2)
                                                                            ->get();
                                                                    @endphp

                                                                    @if ($attributesCategory->count() > 0)
                                                                        @php
                                                                            $listCategoryAttribute = \App\Models\CategoryProductAttribute::where(
                                                                                'category_product_id',
                                                                                $item->id,
                                                                            )
                                                                                ->pluck('attribute_id')
                                                                                ->toArray();
                                                                        @endphp
                                                                        @foreach ($attributesCategory as $attribute)
                                                                            <div class="danhmuc_child">
                                                                                <h3>
                                                                                    <a
                                                                                        href="javascrip:void(0)">{{ $attribute->name }}</a>
                                                                                </h3>
                                                                                @if ($attribute->childs()->where('active', 1)->count() > 0)
                                                                                    <ul>
                                                                                        @foreach ($attribute->childs()->where('active', 1)->orderBy('order', 'asc')->get() as $attributeChild)
                                                                                            @if (in_array($attributeChild->id, $listCategoryAttribute))
                                                                                                <li>
                                                                                                    <a href="{{ route('home.index') }}/?categories={{ $item->id }}&attribtes={{ $attributeChild->id }}"
                                                                                                        title="{{ $attributeChild->name }}">{{ $attributeChild->name }}</a>
                                                                                                </li>
                                                                                            @endif
                                                                                        @endforeach
                                                                                    </ul>
                                                                                @endif
                                                                            </div>
                                                                        @endforeach
                                                                    @endif

                                                                    @isset($header['prices'])
                                                                        <div class="danhmuc_child">
                                                                            <h3>
                                                                                <a
                                                                                    href="javascrip:void(0)">{{ $header['prices']->name }}</a>
                                                                            </h3>
                                                                            @if ($header['prices']->childs()->where('active', 1)->count() > 0)
                                                                                <ul>
                                                                                    @foreach ($header['prices']->childs()->where('active', 1)->orderBy('order', 'asc')->get() as $price)
                                                                                        @if (in_array($price->id, $listCategoryAttribute))
                                                                                            <li>
                                                                                                <a href="{{ route('home.index') }}/?categories={{ $item->id }}&prices={{ $price->id }}"
                                                                                                    title="{{ $price->name }}">{{ $price->name }}</a>
                                                                                            </li>
                                                                                        @endif
                                                                                    @endforeach
                                                                                </ul>
                                                                            @endif
                                                                        </div>
                                                                    @endisset
                                                                </div>


                                                            </div>
                                                            <div class="clm mega_right" style="--w-lg:4">
                                                                <ul>
                                                                    <li>
                                                                        <div class="promotions">
                                                                            <a href="{{ route('sale-off') }}">
                                                                                @isset($header['image_menu'])
                                                                                    <img src="{{ $header['image_menu']->image_path }}"
                                                                                        alt="{{ $header['image_menu']->name }}">
                                                                                @endisset
                                                                            </a>
                                                                            <div class="abs-block abs-left"
                                                                                style="outline: none;">
                                                                                <a href="{{ route('sale-off') }}"
                                                                                    class="btn-plus btn-default btn">
                                                                                    <i class="fa fa-plus"
                                                                                        aria-hidden="true"></i>Xem thêm
                                                                                </a>
                                                                            </div>
                                                                        </div>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>


                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    </li>
                                @endforeach
                            @endif
                            @isset($header['tinTuc'])
                                <li class="navigation-header-c1s">
                                    <a href="{{ $header['tinTuc']->slug }}">{{ $header['tinTuc']->name }}</a>
                                </li>
                            @endisset

                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="header-mobile">
    <div class="ctnr">
        <div class="box-header-mobile">
            <div class="box-menu-mobile">
                <div class="icon-mav-mobile">
                    <svg width="64px" height="64px" viewBox="0 0 24 24" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                        <g id="SVGRepo_iconCarrier">
                            <path d="M3 12H21M3 6H21M9 18H21" stroke="#000000" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round"></path>
                        </g>
                    </svg>
                </div>
                <div class="icon-menu-nav-mobile">
                    <div class="close-menu-mobile">
                        <svg width="64px" height="64px" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier">
                                <path
                                    d="M16.19 2H7.81C4.17 2 2 4.17 2 7.81V16.18C2 19.83 4.17 22 7.81 22H16.18C19.82 22 21.99 19.83 21.99 16.19V7.81C22 4.17 19.83 2 16.19 2ZM15.36 14.3C15.65 14.59 15.65 15.07 15.36 15.36C15.21 15.51 15.02 15.58 14.83 15.58C14.64 15.58 14.45 15.51 14.3 15.36L12 13.06L9.7 15.36C9.55 15.51 9.36 15.58 9.17 15.58C8.98 15.58 8.79 15.51 8.64 15.36C8.35 15.07 8.35 14.59 8.64 14.3L10.94 12L8.64 9.7C8.35 9.41 8.35 8.93 8.64 8.64C8.93 8.35 9.41 8.35 9.7 8.64L12 10.94L14.3 8.64C14.59 8.35 15.07 8.35 15.36 8.64C15.65 8.93 15.65 9.41 15.36 9.7L13.06 12L15.36 14.3Z"
                                    fill="#292D32"></path>
                            </g>
                        </svg>
                    </div>

                    <div class="search-mobile">
                        <form action="{{ route('home.search') }}" method="GET">
                            <input type="text" name="keyword" placeholder="Tìm kiếm ...">
                            <button type="submit">
                                <svg width="64px" height="64px" viewBox="0 -0.5 25 25" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                    <g id="SVGRepo_iconCarrier">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M5.5 10.7655C5.50003 8.01511 7.44296 5.64777 10.1405 5.1113C12.8381 4.57483 15.539 6.01866 16.5913 8.55977C17.6437 11.1009 16.7544 14.0315 14.4674 15.5593C12.1804 17.0871 9.13257 16.7866 7.188 14.8415C6.10716 13.7604 5.49998 12.2942 5.5 10.7655Z"
                                            stroke="#000000" stroke-width="1.5" stroke-linecap="round"
                                            stroke-linejoin="round"></path>
                                        <path d="M17.029 16.5295L19.5 19.0005" stroke="#000000" stroke-width="1.5"
                                            stroke-linecap="round" stroke-linejoin="round"></path>
                                    </g>
                                </svg>
                            </button>
                        </form>
                    </div>
                    <ul>
                        <li class="menu-header-mobile">
                            <div class="item-menu-c2-mobile-smoll">
                                <a href="{{ makelink('home') }}" class="menu-nav-mobile">Trang chủ</a>
                            </div>
                        </li>
                        @isset($header['introduce'])
                            <li class="menu-header-mobile">
                                <div class="item-menu-c2-mobile-smoll">
                                    <a href="{{ route('about-us') }}"
                                        class="menu-nav-mobile">{{ $header['introduce']->name }}</a>
                                    @if ($header['introduce']->childs()->where('active', 1)->count() > 0)
                                        <svg class="toggle-class" width="64px" height="64px" viewBox="0 0 24 24"
                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round">
                                            </g>
                                            <g id="SVGRepo_iconCarrier">
                                                <path d="M7 10L12 15L17 10" stroke="#000000" stroke-width="1.5"
                                                    stroke-linecap="round" stroke-linejoin="round"></path>
                                            </g>
                                        </svg>
                                    @endif
                                </div>
                                @if ($header['introduce']->childs()->where('active', 1)->count() > 0)
                                    <ul class="box-menu-c2-mobiles">
                                        @foreach ($header['introduce']->childs()->where('active', 1)->get() as $item)
                                            <li class="item-menu-c2--smoll">
                                                <a href="{{ $item->slug }}">{{ $item->name }}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                @endif
                            </li>
                        @endisset
                        {{-- @isset($header['product_men'])
                            <li class="menu-header-mobile">
                                <div class="item-menu-c2-mobile-smoll">
                                    <a href="{{ route('home.index') }}/?attributes={{ $header['product_men']->id }}"
                                        class="menu-nav-mobile">Đồng
                                        Hồ
                                        {{ $header['product_men']->name }}</a>
                                    <svg class="toggle-class" width="64px" height="64px" viewBox="0 0 24 24"
                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round">
                                        </g>
                                        <g id="SVGRepo_iconCarrier">
                                            <path d="M7 10L12 15L17 10" stroke="#000000" stroke-width="1.5"
                                                stroke-linecap="round" stroke-linejoin="round"></path>
                                        </g>
                                    </svg>
                                </div>
                                @if (isset($header['brands']) && $header['brands']->count() > 0)
                                    <ul class="box-menu-c2-mobiles">
                                        @foreach ($header['brands'] as $item)
                                            <li class="item-menu-c2--smoll"><a
                                                    href="{{ route('home.index') }}/?attributes={{ $header['product_men']->id }}&brands={{ $item->id }}"
                                                    title="{{ $item->name }}">{{ $item->name }}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                @endif
                            </li>
                        @endisset
                        @isset($header['product_women'])
                            <li class="menu-header-mobile">
                                <div class="item-menu-c2-mobile-smoll">
                                    <a href="{{ route('home.index') }}/?attributes={{ $header['product_women']->id }}"
                                        class="menu-nav-mobile">Đồng
                                        Hồ
                                        {{ $header['product_women']->name }}</a>
                                    <svg class="toggle-class" width="64px" height="64px" viewBox="0 0 24 24"
                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round">
                                        </g>
                                        <g id="SVGRepo_iconCarrier">
                                            <path d="M7 10L12 15L17 10" stroke="#000000" stroke-width="1.5"
                                                stroke-linecap="round" stroke-linejoin="round"></path>
                                        </g>
                                    </svg>
                                </div>
                                @if (isset($header['brands']) && $header['brands']->count() > 0)
                                    <ul class="box-menu-c2-mobiles">
                                        @foreach ($header['brands'] as $item)
                                            <li class="item-menu-c2--smoll"><a
                                                    href="{{ route('home.index') }}/?attributes={{ $header['product_women']->id }}&brands={{ $item->id }}"
                                                    title="{{ $item->name }}">{{ $item->name }}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                @endif
                            </li>
                        @endisset --}}
                        @if (isset($header['categories_product']) &&
                                $header['categories_product']->childs()->where('active', 1)->orderBy('order', 'asc')->count() > 0)
                            @foreach ($header['categories_product']->childs()->where('active', 1)->orderBy('order', 'asc')->get() as $item)
                                @if ($item->childs()->where('active', 1)->count() > 0)
                                    <li class="menu-header-mobile">
                                        <div class="item-menu-c2-mobile-smoll">
                                            <a href="javascript:void(0)"
                                                class="menu-nav-mobile">{{ $item->name }}</a>
                                            @if ($item->childs()->where('active', 1)->count() > 0)
                                                <svg class="toggle-class" width="64px" height="64px"
                                                    viewBox="0 0 24 24" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                        stroke-linejoin="round">
                                                    </g>
                                                    <g id="SVGRepo_iconCarrier">
                                                        <path d="M7 10L12 15L17 10" stroke="#000000"
                                                            stroke-width="1.5" stroke-linecap="round"
                                                            stroke-linejoin="round"></path>
                                                    </g>
                                                </svg>
                                            @endif
                                        </div>
                                        @if ($item->childs()->where('active', 1)->count() > 0)
                                            <ul class="box-menu-c2-mobiles">
                                                @foreach ($item->childs()->where('active', 1)->orderBy('order', 'asc')->get() as $item)
                                                    <li class="item-menu-c2--smoll">
                                                        <a href="{{ $item->slug }}">{{ $item->name }}</a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        @endif
                                    </li>
                                @else
                                    @php
                                        $list_product_id = \App\Models\ProductForCategory::where(
                                            'category_id',
                                            $item->id,
                                        )
                                            ->pluck('product_id')
                                            ->toArray();
                                        $list_supplier_id = array_unique(
                                            \App\Models\Product::whereIn('id', $list_product_id)
                                                ->pluck('supplier_id')
                                                ->toArray(),
                                        );
                                        $brands = \App\Models\Supplier::whereIn('id', $list_supplier_id)->get();
                                    @endphp
                                    <li class="menu-header-mobile">
                                        <div class="item-menu-c2-mobile-smoll">
                                            <a href="{{ $item->slug }}"
                                                class="menu-nav-mobile">{{ $item->name }}</a>
                                            <svg class="toggle-class" width="64px" height="64px"
                                                viewBox="0 0 24 24" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                    stroke-linejoin="round">
                                                </g>
                                                <g id="SVGRepo_iconCarrier">
                                                    <path d="M7 10L12 15L17 10" stroke="#000000" stroke-width="1.5"
                                                        stroke-linecap="round" stroke-linejoin="round"></path>
                                                </g>
                                            </svg>
                                        </div>
                                        @if ($brands->count() > 0)
                                            <ul class="box-menu-c2-mobiles">
                                                @foreach ($brands as $item)
                                                    <li class="item-menu-c2--smoll"><a
                                                            href="{{ route('home.index') }}/?categories={{ $item->id }}&brands={{ $brand->id }}"
                                                            title="{{ $item->name }}">{{ $item->name }}</a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        @endif
                                @endif
                                </li>
                            @endforeach
                        @endif

                        @if ($header['tinTuc'])
                            <li class="menu-header-mobile">
                                <a class="menu-nav-mobile" href="{{ $header['tinTuc']->slug_full }}">
                                    {{ $header['tinTuc']->name }}
                                </a>
                            </li>
                        @endif
                        <li class="menu-header-mobile"><a class="menu-nav-mobile"
                                href="{{ route('sale-off') }}">Sale
                                off</a>
                        </li>
                        @isset($header['shop_glasses'])
                            <li class="menu-header-mobile"><a class="menu-nav-mobile" target="_blank"
                                    href="{{ $header['shop_glasses']->slug }}" class="acc-link"><i
                                        class="wishlist-icon"></i>{{ $header['shop_glasses']->name }}
                                </a>
                            </li>
                        @endisset

                    </ul>
                </div>
            </div>
            @isset($header['logo'])
                <div class="logo-mobile">
                    <a href="{{ makelink('home') }}">
                        <img src="{{ asset($header['logo']->image_path) }}" alt="{{ $header['logo']->name }}">
                    </a>
                </div>
            @endisset


            <a id="cart-header" class="cart-mmobile" href="{{ route('cart.list') }}" rel="nofollow">
                <i class="icon-cart fa fa-shopping-cart" aria-hidden="true"></i>
                <b id="count_shopping_cart_store">{{ $header['totalQuantity'] }}</b>
            </a>
        </div>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const menuIcon = document.querySelector('.icon-mav-mobile');
        const navMenu = document.querySelector('.icon-menu-nav-mobile');
        const closeMenuIcon = document.querySelector('.close-menu-mobile');

        menuIcon.addEventListener('click', function() {
            navMenu.classList.toggle('active-nav-mobile');
        });

        closeMenuIcon.addEventListener('click', function() {
            navMenu.classList.remove('active-nav-mobile');
        });
    });
</script>
<script>
    // Lấy tất cả các phần tử có class tt
    const ttElements = document.querySelectorAll('.tt');
    // Lấy nội dung bên trong các phần tử đó và tạo thành một mảng
    const wordSequences = Array.from(ttElements).map(el => el.textContent);

    // Chọn input đầu tiên trong search-desl
    const searchInput = document.querySelector('.woodstock-search-form input');

    let currentWordIndex = 0;
    let currentCharIndex = 0;
    let isDeleting = false;

    function typeEffect() {
        let currentWord = wordSequences[currentWordIndex];

        if (!isDeleting && currentCharIndex === currentWord.length) {
            isDeleting = true;
            setTimeout(typeEffect, 800); // Pause before deleting
            return;
        } else if (isDeleting && currentCharIndex === 0) {
            isDeleting = false;
            currentWordIndex = (currentWordIndex + 1) % wordSequences.length;
        }

        searchInput.setAttribute('placeholder', currentWord.substring(0, currentCharIndex));

        if (isDeleting) {
            currentCharIndex--;
        } else {
            currentCharIndex++;
        }

        setTimeout(typeEffect, isDeleting ? 50 : 50);
    }

    typeEffect();
</script>
<script>
document.querySelectorAll('.toggle-class').forEach(svg => {
    svg.addEventListener('click', function() {
        const liElement = this.closest('.menu-header-mobile');

        // If the clicked element already has the 'menu-mobi-active1' class, just remove it
        if (liElement.classList.contains('menu-mobi-active1')) {
            liElement.classList.remove('menu-mobi-active1');
        } else {
            // Remove 'menu-mobi-active1' class from all elements
            document.querySelectorAll('.menu-header-mobile').forEach(item => {
                item.classList.remove('menu-mobi-active1');
            });

            // Add the 'menu-mobi-active1' class to the clicked element
            liElement.classList.add('menu-mobi-active1');
        }
    });
});
</script>
<script>
    // document.addEventListener('DOMContentLoaded', function() {
    //     var header = document.querySelector('.header-bottom-main');

    //     window.addEventListener('scroll', function() {
    //         if (window.scrollY >= 30) {
    //             header.classList.add('header-bg');
    //         } else {
    //             header.classList.remove('header-bg');
    //         }
    //     });
    // });
</script>
