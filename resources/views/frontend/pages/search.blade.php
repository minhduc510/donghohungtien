@extends('frontend.layouts.main')

@section('title', $seo['title'] ?? '')
@section('keywords', $seo['keywords'] ?? '')
@section('description', $seo['description'] ?? '')
@section('abstract', $seo['abstract'] ?? '')
@section('image', asset($seo['image'] ?? ''))
@section('content')
    <style>
        .product-info {
            text-align: center;
            padding-bottom: 20px;
        }

        .product-info span {
            font-size: 13px;
        }

        h3.product__title {
            margin-bottom: 0px;
        }

        .product__price {
            align-items: center;
        }

        .header {
            position: unset;
        }

        .product-list-body {
            padding: 0px;
        }

        .product-list-box {
            padding: 0px;
        }

        .product-list {
            background-color: white;
        }

        .product-list {
            margin-top: 20px;
        }

        .product-list-box {
            margin-bottom: 15px;
        }
    </style>
    <div class="content-wrapper">
        <div class="main">
            <div class="text-left wrap-breadcrumbs">
                <div class="ctnr">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <ul class="breadcrumb">
                                <li class="breadcrumbs-item">
                                    <a href="{{ makeLink('home') }}">{{ __('home.home') }}</a>
                                </li>
                                <li class="breadcrumbs-item"><a>{{ $breadcrumbs['name'] }}</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            @if (isset($dataProduct) && $dataProduct->count() > 0)
                <section class=" product pd-section-top pd-section-bottom">
                    <div class="ctnr">
                        <div class="row">
                            @foreach ($dataProduct as $key => $item)
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
                        </div>
                        <div>{{ $dataProduct->withQueryString()->links() }}</div>
                    </div>
                </section>
            @else
                <span>Không tìm thấy sản phẩm nào</span>
            @endif
        </div>
    </div>
@endsection
@section('js')

@endsection
