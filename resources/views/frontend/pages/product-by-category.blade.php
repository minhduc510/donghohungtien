@extends('frontend.layouts.main')
@section('title', $seo['title'] ?? '')
@section('keywords', $seo['keywords'] ?? '')
@section('description', $seo['description'] ?? '')
@section('abstract', $seo['abstract'] ?? '')
@section('image', asset($seo['image'] ?? ''))
@section('css')
    <style>
        ul.list-sever-limit li.active,
        .list-item-prostus.loc-gia li.active,
        .list-filter-active.hang-products ul.manu li.active {
            background: rgb(26, 141, 249);
            color: #fff
        }

        ul.list-sever-limit li.active span,
        .list-item-prostus.loc-gia li.active a,
        .list-filter-active.hang-products ul.manu li.active a {
            color: #fff
        }
    </style>
@endsection

@php
    $nextPageUrl = $products->nextPageUrl();
    $previousPageUrl = $products->previousPageUrl();
    $page = request()->input('page');

    $slug = request()->path();

    function renderCategory($category, $categories_params = [])
    {
        if ($category->count() > 0) {
            foreach ($category as $item) {
                if ($item->childs()->where('active', 1)->count() > 0) {
                    renderCategory($item->childs()->where('active', 1)->get(), $categories_params);
                } else {
                    echo '<li class="filter-box ' .
                        (in_array($item->id, $categories_params) ? 'active' : '') .
                        '"><a href="javascript:void(0)" name="categories" data-id=' .
                        $item->id .
                        '>' .
                        $item->name .
                        '</a></li>';
                }
            }
        }
    }
@endphp

@isset($category)
    @section('canonical')
        <link rel="canonical" href="{{ $category->slug_full }}" />
    @endsection
    @if (request()->has('page') && ($page == 1 || $page == 2))
        @section('prevPage')
            <link rel="prev" href="{{ $category->slug_full }}" />
        @endsection
    @else
        @if ($previousPageUrl)
            @section('prevPage')
                <link rel="prev" href="{{ $previousPageUrl }}" />
            @endsection
        @endif
    @endif
@endisset


@if ($nextPageUrl)
    @section('nextPage')
        <link rel="next" href="{{ $nextPageUrl }}" />
    @endsection
@endif

@php
    $categories_params = explode(',', request()->input('categories'));
    $attributes_params = explode(',', request()->input('attributes'));
    $prices_params = explode(',', request()->input('prices'));
    $brands_params = explode(',', request()->input('brands'));
@endphp

@section('content')
    <div class="main-by-category">

        <div class="banenr-locs">
            <div class="item-locs-images">
                <img src="	https://demo12.bivaco.net/storage/photos/logo_1572597701_1721277377.webp" alt="">
            </div>
        </div>
        <div class="box-bg-product-locs">
            <div class="ctnr">
                <div class="box-loc-sp">
                    <div class="list-loc-by-products">
                        <ul>
                            <li class="all-loc loc-btn-all">
                                <div class="box-item-all-loc-icon">
                                    <div class="arrow-filter"></div>
                                    <i class="fas fa-filter"></i>
                                    <span>
                                        Bộ lọc
                                        <p id="total-filter">1</p>
                                    </span>
                                </div>
                                <div class="filter-show-all">
                                    <div class="bg-loc-filer"></div>
                                    <div class="list-box-brans-product-all">
                                        <div class="close-limit-products">
                                            <i class="fas fa-times"></i>
                                            Đóng
                                        </div>
                                        {{--
                                    <div class="list-filter-active">
                                        <span>Đã chọn: </span>
                                        <ul class="manu">
                                            <li class="loc-list item-locs" data-id="1">
                                                <p>Daikin</p>
                                                <span class="icon-close-ffiler">
                                                    <i class="fas fa-times"></i>
                                                </span>
                                            </li>

                                            <li class="loc-list item-locs" data-id="2">
                                                <p>Daikin</p>
                                                <span class="icon-close-ffiler">
                                                    <i class="fas fa-times"></i>
                                                </span>
                                            </li>

                                            <li class="loc-list item-locs" data-id="3">
                                                <p>Daikin</p>
                                                <span class="icon-close-ffiler">
                                                    <i class="fas fa-times"></i>
                                                </span>
                                            </li>


                                        </ul>
                                    </div>
                                    --}}
                                        @isset($brands)
                                            <div class="list-filter-active hang-products">
                                                <span>Thương hiệu</span>
                                                @if ($brands->count() > 0)
                                                    <ul class="manu">
                                                        @foreach ($brands as $brand)
                                                            <li
                                                                class="filter-box {{ in_array($brand->id, $brands_params) ? 'active' : '' }}">
                                                                {{-- <div class="brand-name-after">{{ $brand->name }}</div> --}}
                                                                <a href="javascript:void(0)" name="brands"
                                                                    data-id={{ $brand->id }} data-name="{{ $brand->name }}">
                                                                    <img src="{{ asset($brand->avatar_path) }}"
                                                                        alt="{{ $brand->name }}">
                                                                </a>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                @endif
                                            </div>
                                        @endisset

                                        <div class="grid-loc-products">
                                            {{-- @isset($attributes_sex)
                                            <div class="list-item-prostus">
                                                <p>Đối tượng sử dụng</p>
                                                @if ($attributes_sex->count() > 0)
                                                    <ul class="list-sever-limit">
                                                        @foreach ($attributes_sex as $item)
                                                            <li
                                                                class="filter-box {{ in_array($item->id, $attributes_params) ? 'active' : '' }}">
                                                                <a href="javascript:void(0)" name="attributes"
                                                                    data-id={{ $item->id }}><img
                                                                        src="https://cdn.tgdd.vn/ValueIcons/8b2f1b4b1b3ea22a4135b590a9e1da67.png"
                                                                        alt=""> <span>{{ $item->name }}</span></a>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                @endif
                                            </div>
                                        @endisset --}}
                                            @if (isset($prices) && $prices->childs()->where('active', 1)->orderBy('order', 'asc')->count() > 0)
                                                <div class="list-item-prostus loc-gia">
                                                    <p>{{ $prices->name }}</p>
                                                    @if ($prices->childs()->where([['active', 1], ['hot', 1]])->orderBy('order', 'asc')->count() > 0)
                                                        <ul class="list-sever-limit">
                                                            @foreach ($prices->childs()->where('active', 1)->orderBy('order', 'asc')->get() as $item)
                                                                @if (isset($categoryProductAttribute_total) && in_array($item->id, $categoryProductAttribute_total))
                                                                    <li
                                                                        class="filter-box {{ in_array($item->id, $prices_params) ? 'active' : '' }}">
                                                                        <a href="javascript:void(0)"
                                                                            data-id={{ $item->id }}
                                                                            name="prices">{{ $item->name }}</a>
                                                                    </li>
                                                                @endif
                                                            @endforeach
                                                        </ul>
                                                    @endif
                                                </div>
                                            @endif

                                            {{-- @if ($category_total && isset($category_total) && $category_total->count() > 0)
                                                <div class="list-item-prostus loc-gia">
                                                    <p>Sản phẩm</p>
                                                    <ul class="list-sever-limit">
                                                        {{ renderCategory($category_total, $categories_params) }}
                                                        @foreach ($category_total->childs()->where('active', 1)->get() as $item)
                                                        <li
                                                            class="filter-box {{ in_array($item->id, $categories_params) || $slug === $item->slug ? 'active' : '' }}">
                                                            <a href="javascript:void(0)" name="categories"
                                                                data-id={{ $item->id }}>{{ $item->name }}</a>
                                                        </li>
                                                    @endforeach
                                                    </ul>
                                                </div>
                                            @endif --}}

                                            @if (isset($attributes_total) && $attributes_total->count() > 0)

                                                @foreach ($attributes_total as $attribute)
                                                    <div class="list-item-prostus loc-gia">
                                                        <p>{{ $attribute->name }}</p>
                                                        @if ($attribute->childs()->where([['active', 1], ['hot', 1]])->orderBy('order', 'asc')->count() > 0)
                                                            <ul class="list-sever-limit">
                                                                @foreach ($attribute->childs()->where([['active', 1], ['hot', 1]])->orderBy('order', 'asc')->get() as $item)
                                                                    @if (isset($categoryProductAttribute) && in_array($item->id, $categoryProductAttribute))
                                                                        <li
                                                                            class="filter-box {{ in_array($item->id, $attribute->id === 157 ? $prices_params : $attributes_params) ? 'active' : '' }}">
                                                                            <a href="javascript:void(0)"
                                                                                data-id={{ $item->id }}
                                                                                name="{{ $attribute->id === 157 ? 'prices' : 'attributes' }}">{{ $item->name }}</a>
                                                                        </li>
                                                                    @endif
                                                                @endforeach
                                                            </ul>
                                                        @endif
                                                    </div>
                                                @endforeach
                                            @endif

                                        </div>

                                    </div>
                                    {{-- <div class="filter-button-vels">
                                        <a href="javascript:void(0)" class="btn-remove-filter">Bỏ chọn</a>
                                        <a href="" class="btn-filter-readmore"> Xem <b>{{ $total_products }}</b>
                                            kết quả</a>
                                    </div> --}}

                                </div>
                            </li>

                            {{-- @isset($category_total)
                            <li class="all-loc loc-products-2">
                                <div class="box-item-all-loc-icon">
                                    <div class="arrow-filter"></div>
                                    <span>
                                        Danh mục

                                    </span>
                                </div>
                                <div class="filter-show-all">
                                    <div class="bg-loc-filer"></div>
                                    <div class="list-box-brans-product-all">
                                        <div class="close-limit-products">
                                            <i class="fas fa-times"></i>
                                            Đóng
                                        </div>


                                        <div class="list-filter-active hang-products">
                                            <span>{{ $category_total->name }}</span>
                                            @if ($category_total->childs()->where('active', 1)->count() > 0)
                                                <ul class="manu">
                                                    @foreach ($category_total->childs()->where('active', 1)->get() as $category)
                                                        <li
                                                            class="filter-box {{ in_array($category->id, $categories_params) || $slug === $category->slug ? 'active' : '' }}">
                                                            <a href="javascript:void(0)" name="categories"
                                                                data-id={{ $category->id }}>{{ $category->name }}</a>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            @endif
                                        </div>


                                        <div class="filter-button-vels">
                                            <a href="javascript:void(0)" class="btn-remove-filter">Bỏ chọn</a>
                                            <a href="" class="btn-filter-readmore"> Xem <b>{{ $total_products }}</b>
                                                kết quả</a>
                                        </div>
                                    </div>

                                </div>
                            </li>
                        @endisset --}}

                            {{-- @if ($category_total && isset($category_total) && $category_total->count() > 0)
                                <li class="all-loc fiter-2">
                                    <div class="box-item-all-loc-icon">
                                        <div class="arrow-filter"></div>
                                        <span>Sản phẩm

                                        </span>
                                    </div>
                                    <div class="filter-show-all">
                                        <div class="bg-loc-filer"></div>
                                        <div class="list-box-brans-product-all">
                                            <div class="close-limit-products">
                                                <i class="fas fa-times"></i>
                                                Đóng
                                            </div>
                                            <div class="list-filter-active hang-products">
                                                <span>{{ $prices->name }}</span>
                                                @if ($prices->childs()->where('active', 1)->count() > 0)
                                                    <ul class="list-sever-limit">
                                                        {{ renderCategory($category_total, $categories_params) }}
                                                    </ul>
                                                @endif
                                            </div>
                                            <div class="filter-button-vels">
                                                <a href="javascript:void(0)" class="btn-remove-filter">Bỏ chọn</a>
                                                <a href="" class="btn-filter-readmore"> Xem
                                                    <b>{{ $total_products }}</b> kết quả</a>
                                            </div>
                                        </div>

                                    </div>
                                </li>
                            @endif --}}

                            @if (isset($brands) && $brands->count() > 0)
                                <li class="all-loc fiter-2 filter-thuonghieu">
                                    <div class="box-item-all-loc-icon">
                                        <div class="arrow-filter"></div>
                                        <span>Thương hiệu

                                        </span>
                                    </div>
                                    <div class="filter-show-all">
                                        <div class="bg-loc-filer"></div>
                                        <div class="list-box-brans-product-all">
                                            <div class="close-limit-products">
                                                <i class="fas fa-times"></i>
                                                Đóng
                                            </div>
                                            <div class="list-filter-active hang-products">
                                                <span>Hãng</span>
                                                @if ($brands->count() > 0)
                                                    <ul class="manu">
                                                        @foreach ($brands as $brand)
                                                            <li
                                                                class="filter-box {{ in_array($brand->id, $brands_params) ? 'active' : '' }}">
                                                                {{-- <div class="brand-name-after">{{ $brand->name }}</div> --}}
                                                                <a href="javascript:void(0)" name="brands"
                                                                    data-id={{ $brand->id }}
                                                                    data-name="{{ $brand->name }}">
                                                                    <img src="{{ asset($brand->avatar_path) }}"
                                                                        alt="{{ $brand->name }}">
                                                                </a>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                @endif
                                            </div>
                                            <div class="filter-button-vels">
                                                <a href="javascript:void(0)" class="btn-remove-filter">Bỏ chọn</a>
                                                <a href="" class="btn-filter-readmore"> Xem
                                                    <b>{{ $total_products }}</b> kết quả</a>
                                            </div>
                                        </div>

                                    </div>
                                </li>
                            @endif

                            @if (isset($prices))
                                <li class="all-loc fiter-2">
                                    <div class="box-item-all-loc-icon">
                                        <div class="arrow-filter"></div>
                                        <span>{{ $prices->name }}

                                        </span>
                                    </div>
                                    <div class="filter-show-all">
                                        <div class="bg-loc-filer"></div>
                                        <div class="list-box-brans-product-all">
                                            <div class="close-limit-products">
                                                <i class="fas fa-times"></i>
                                                Đóng
                                            </div>
                                            <div class="list-filter-active hang-products">
                                                <span>{{ $prices->name }}</span>
                                                @if ($prices->childs()->where('active', 1)->count() > 0)
                                                    <ul class="list-sever-limit">
                                                        @foreach ($prices->childs()->where('active', 1)->orderBy('order', 'asc')->get() as $price)
                                                            @if (isset($categoryProductAttribute_total) && in_array($price->id, $categoryProductAttribute_total))
                                                                <li
                                                                    class="filter-box {{ in_array($price->id, $prices_params) ? 'active' : '' }}">
                                                                    <a href="javascript:void(0)"
                                                                        data-id={{ $price->id }}
                                                                        name="prices">{{ $price->name }}</a>
                                                                </li>
                                                            @endif
                                                        @endforeach
                                                    </ul>
                                                @endif
                                            </div>
                                            <div class="filter-button-vels">
                                                <a href="javascript:void(0)" class="btn-remove-filter">Bỏ chọn</a>
                                                <a href="" class="btn-filter-readmore"> Xem
                                                    <b>{{ $total_products }}</b> kết quả</a>
                                            </div>
                                        </div>

                                    </div>
                                </li>
                            @endif


                            @if (isset($attributes) && $attributes->count() > 0)
                                @foreach ($attributes as $attribute)
                                    <li class="all-loc fiter-2">
                                        <div class="box-item-all-loc-icon">
                                            <div class="arrow-filter"></div>
                                            <span>{{ $attribute->name }}

                                            </span>
                                        </div>
                                        <div class="filter-show-all">
                                            <div class="bg-loc-filer"></div>
                                            <div class="list-box-brans-product-all">
                                                <div class="close-limit-products">
                                                    <i class="fas fa-times"></i>
                                                    Đóng
                                                </div>
                                                <div class="list-filter-active hang-products">
                                                    <span>{{ $attribute->name }}</span>
                                                    @if ($attribute->childs()->where([['active', 1], ['hot', 1]])->count() > 0)
                                                        <ul class="list-sever-limit">
                                                            @foreach ($attribute->childs()->where([['active', 1], ['hot', 1]])->orderBy('order', 'asc')->get() as $item)
                                                                @if (isset($categoryProductAttribute) && in_array($item->id, $categoryProductAttribute))
                                                                    <li
                                                                        class="filter-box {{ in_array($item->id, $attributes_params) ? 'active' : '' }}">
                                                                        <a href="javascript:void(0)"
                                                                            data-id={{ $item->id }}
                                                                            name="attributes">{{ $item->name }}</a>
                                                                    </li>
                                                                @endif
                                                            @endforeach
                                                        </ul>
                                                    @endif
                                                </div>
                                                <div class="filter-button-vels">
                                                    <a href="javascript:void(0)" class="btn-remove-filter">Bỏ
                                                        chọn</a>
                                                    <a href="" class="btn-filter-readmore"> Xem
                                                        <b>{{ $total_products }}</b> kết quả</a>
                                                </div>
                                            </div>

                                        </div>
                                    </li>
                                @endforeach
                            @endif





                        </ul>
                    </div>
                </div>


            </div>
        </div>


        <div class="loc-sapxep">
            <div class="ctnr">
                <div class="list-box-sapxepaz">
                    <ul>
                        <li class="d-flex ai-center">
                            <div class="list-iner-text-boloc">
                                <div class="item-list-text-boloc">
                                    <p></p>
                                </div>
                            </div>

                            <b>{{ $total_products }}</b>
                            sản phẩm
                        </li>

                        <li>
                            @php
                                $sort = request()->query('sort');
                            @endphp
                            <select id="sort">
                                <option value="">Xếp theo: Mặc định</option>
                                <option @if ($sort === 'createdAt_desc') selected @endif value="createdAt_desc">Xếp theo:
                                    Sản phẩm mới nhất</option>
                                <option @if ($sort === 'createdAt_asc') selected @endif value="createdAt_asc">Xếp theo:
                                    Sản phẩm cũ nhất</option>
                                <option @if ($sort === 'price_asc') selected @endif value="price_asc">Xếp theo: Giá
                                    tăng dần</option>
                                <option @if ($sort === 'price_desc') selected @endif value="price_desc">Xếp theo: Giá
                                    giảm dần</option>
                            </select>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="ctnr">
            <div class="list-product-item-home row">
                @if ($products)
                    @foreach ($products as $item)
                        <div class="col-item-product p10 clm" style="--w-lg:2.4;--w-md:4;--w-xs:6">
                            <div class="spinner-bounce palign-center">
                                <article class="item">
                                    <div class="product">
                                        <article class="product-miniature js-product-miniature">
                                            <div class="thumbnail-container">
                                                <a href="{{ $item->slug }}" class="thumbnail product-thumbnail">
                                                    <img class="img-fluid " src="{{ asset($item->avatar_path) }}"
                                                        height="370" width="328" alt="{{ $item->name }}"
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
                @else
                    <div>Không có sản phẩm nào !</div>
                @endif
            </div>
            <div>{{ $products->withQueryString()->links() }}</div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const urlAllProduct = "{{ $category_all->slug_full }}";

            const contentContainer = document.querySelector('.item-list-text-boloc');
            const urlParams = new URLSearchParams(window.location.search);
            const categories_params = urlParams.get('categories');
            const attributes_params = urlParams.get('attributes');
            const prices_params = urlParams.get('prices');
            const brands_params = urlParams.get('brands');
            const textTotalFilterElement = document.getElementById('total-filter')
            const sortSelect = document.getElementById('sort')
            const btnRemoveFilter = document.querySelectorAll('.btn-remove-filter');
            const boxBgProductLocs = document.querySelector('.box-bg-product-locs');

            const allLocElements = document.querySelectorAll(".all-loc");
            const listBtnReadMore = document.querySelectorAll('.btn-filter-readmore')
            const listFilterItem = document.querySelectorAll(".filter-box");
            const filterObj = {
                categories: [],
                attributes: [],
                prices: [],
                brands: [],
            }

            const scrollToFilterBox = () => boxBgProductLocs.scrollIntoView({
                behavior: "smooth"
            })

            @if (isset($categoryId))
                filterObj.categories.push('{{ $categoryId }}')
            @endif

            if (categories_params) {
                filterObj.categories = categories_params.split(',')
            }

            if (attributes_params) {
                filterObj.attributes = attributes_params.split(',')
            }

            if (prices_params) {
                filterObj.prices = prices_params.split(',')
            }

            if (brands_params) {
                filterObj.brands = brands_params.split(',')
            }

            for (const filter in filterObj) {
                if (filterObj[filter].length > 0) {
                    scrollToFilterBox()
                    break
                }
            }

            const setTextTotalFilterElement = () => {
                let total = 0;
                for (let x in filterObj) {
                    total += filterObj[x].length
                }
                textTotalFilterElement.innerText = total
            }

            const generateFilterSelected = () => {
                const listSelected = document.querySelectorAll('.filter-box.active');
                const arrText = [];
                listSelected.forEach(item => {
                    const aTag = item.querySelector('a')
                    const dataName = aTag.dataset.name
                    const text = dataName ?? aTag.innerText
                    const data = {
                        id: aTag.dataset.id,
                        text,
                        name: aTag.name
                    }
                    if (!arrText.some(item => item.text === text)) {
                        arrText.push(data)
                    }
                })
                if (arrText.length > 0) {
                    arrText.forEach(item => {
                        const newParagraph = document.createElement('p');
                        newParagraph.setAttribute('name', item.name)
                        newParagraph.setAttribute('data-id', item.id)
                        newParagraph.innerHTML =
                            `${item.text} <span class="btn-remove-filter-selected">&times;</span>`;
                        contentContainer.appendChild(newParagraph);
                    })
                    const btnsRemoveFilterSelected = document.querySelectorAll(".btn-remove-filter-selected");
                    btnsRemoveFilterSelected.forEach(item => {
                        item.onclick = function() {
                            const parentElement = this.parentNode
                            const name = parentElement.getAttribute('name')
                            filterObj[name] = filterObj[name].filter(
                                itemChild =>
                                itemChild !==
                                parentElement.dataset.id)
                            setTextTotalFilterElement()
                            callApiProduct()
                        }
                    })
                }
            }

            generateFilterSelected()

            setTextTotalFilterElement()

            const callApiTotalProduct = async function() {
                var url = new URL('{{ route('getTotalProduct') }}')

                const searchParams = {};
                for (let x in filterObj) {
                    if (filterObj[x].length > 0) {
                        searchParams[x] = filterObj[x]
                    }
                }
                url.search = new URLSearchParams(searchParams);

                const response = await fetch(url.toString())
                const {
                    status,
                    total
                } = await response.json()

                if (status === 200) {
                    listBtnReadMore.forEach(item => item.innerHTML = `Xem <b>${total}</b> kết quả`)
                }
            }

            const callApiProduct = () => {
                var url = new URL('{{ route('home.index') }}');
                const searchParams = {};
                for (let x in filterObj) {
                    if (filterObj[x].length > 0) {
                        searchParams[x] = filterObj[x]
                    }
                }

                if (Object.keys(searchParams).length) {
                    url.search = new URLSearchParams(searchParams);
                    window.location.href = url.toString();
                } else {
                    window.location.href = urlAllProduct
                }
            }

            btnRemoveFilter.forEach(item => {
                item.onclick = function() {
                    window.location.href = urlAllProduct
                }
            })

            listBtnReadMore.forEach(function(item) {
                item.onclick = function(e) {
                    e.preventDefault();
                    callApiProduct()
                }
            })

            listFilterItem.forEach(item => {
                item.onclick = function() {
                    const aElement = this.querySelector('a')
                    const nameAElement = aElement.name
                    const idValue = aElement.dataset.id
                    const elementRelated = document.querySelectorAll(
                        `a[name="${nameAElement}"][data-id="${idValue}"]`)
                    elementRelated.forEach(item => {
                        item.parentNode.classList.toggle('active')
                    })
                    if (filterObj[nameAElement].includes(idValue)) {
                        filterObj[nameAElement] = filterObj[nameAElement].filter(item => item !==
                            idValue)
                    } else {
                        filterObj[nameAElement].push(idValue)
                    }
                    setTextTotalFilterElement()
                    // callApiTotalProduct()
                    callApiProduct()
                }
            })

            sortSelect.onchange = function() {
                const value = this.value
                var url = new URL('{{ route('home.index') }}');
                const searchParams = {};
                for (let x in filterObj) {
                    if (filterObj[x].length > 0) {
                        searchParams[x] = filterObj[x]
                    }
                }
                if (value) {
                    searchParams.sort = value
                }
                url.search = new URLSearchParams(searchParams);

                window.location.href = url.toString();
            }

            allLocElements.forEach(function(allLocElement) {
                const boxItemAllLocIcon = allLocElement.querySelector(".box-item-all-loc-icon");
                const closeLimitProductsElement = allLocElement.querySelector(".close-limit-products");
                const bgLocFilerElement = allLocElement.querySelector(".bg-loc-filer");

                boxItemAllLocIcon.addEventListener("click", function(event) {
                    allLocElement.classList.toggle("active");
                    event.stopPropagation();
                });

                closeLimitProductsElement.addEventListener("click", function(event) {
                    allLocElement.classList.remove("active");
                    event.stopPropagation();
                });

                bgLocFilerElement.addEventListener("click", function(event) {
                    allLocElement.classList.remove("active");
                    event.stopPropagation();
                });

                document.addEventListener("click", function(event) {
                    if (!allLocElement.contains(event.target)) {
                        allLocElement.classList.remove("active");
                    }
                });
            });
        });
    </script>
@endsection
