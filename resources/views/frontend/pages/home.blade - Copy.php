@extends('frontend.layouts.main')
@section('title', $header['seo_home']->name)
@section('image', asset($header['seo_home']->image_path))
@section('keywords', $header['seo_home']->slug)
@section('description', $header['seo_home']->value)
@section('abstract', $header['seo_home']->slug)
@section('content')
<section class="banner-part">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 order-0 order-lg-1 order-xl-1">
                <div class="home-grid-slider slider-arrow slider-dots">
                    @if($slide)
                    @foreach($slide as $i)
                    <a href="#"><img src="{{$i->image_path}}" alt="{{$i->name}}"></a>
                    @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
@if(isset($product_new) && count($product_new)>0)
<section class="section newitem-part">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="section-heading">
                    <h2>Sản phẩm mới</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <ul class="new-slider slider-arrow">
                    @foreach($product_new as $prod)
                    <li>
                        <div class="product-card">
                            <div class="product-media">
                                <div class="product-label"><label class="label-text new">Mới</label></div>
                                <a class="product-image" href="{{ $prod->slug_full }}"><img src="{{ $prod->avatar_path }}" alt="{{ $prod->name }}"></a>
                                <div class="product-widget">
                                    <a title="Product View" href="{{ $prod->slug_full }}" class="fas fa-eye" data-bs-toggle="modal" data-bs-target="#product-view"></a>
                                </div>
                            </div>
                            <div class="product-content">
                                <h6 class="product-name"><a href="{{ $prod->slug_full }}">{{ $prod->name }}</a></h6>
                                <h6 class="product-price"><span>{{ number_format($prod->price) }}{{ $Unit }}<small>/{{ $prod->size }}</small></span></h6>
                                <a class="product-add add-to-cart" title="Add to Cart" id="addCart" data-url="{{ route('cart.add',['id' => $prod->id,]) }}" data-start="{{ route('cart.add',['id' => $prod->id,]) }}">
                                    <i class="fas fa-shopping-basket"></i><span>Mua ngay</span>
                                </a>
                            </div>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="section-btn-25"><a href="shop-4column.html" class="btn btn-outline"><i class="fas fa-eye"></i><span>Xem thêm</span></a></div>
            </div>
        </div>
    </div>
</section>
@endif
<section class="section recent-part">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-heading">
                    <h2>Sản phẩm bán chạy nhất</h2>
                </div>
            </div>
        </div>
        <div class="row row-cols-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-5">
            @if( $product_hot->count() == 0)
            @foreach($product_hot as $item )
            <div class="col">
                <div class="product-card product-disable">
                    <div class="product-media">
                        <div class="product-label"><label class="label-text sale">sale</label></div><button class="product-wish wish"></button>
                        <a class="product-image" href="{{$item->slug_full}}"><img src="{{$item->avatar_path}}" alt="{{$item->name}}"></a>
                        <div class="product-widget">
                            <a title="Product View" href="#" class="fas fa-eye" data-bs-toggle="modal" data-bs-target="#product-view">
                            </a>
                        </div>
                    </div>
                    <div class="product-content">
                        <h6 class="product-name"><a href="product-details.html">{{$item->name}}</a></h6>
                        <h6 class="product-price"><span>{{ number_format($prod->price) }}{{ $Unit }}<small>/{{ $prod->size }}</small></span></h6>
                        <a class="product-add add-to-cart" title="Add to Cart" id="addCart" data-url="{{ route('cart.add',['id' => $prod->id,]) }}" data-start="{{ route('cart.add',['id' => $prod->id,]) }}">
                            <i class="fas fa-shopping-basket"></i><span>Mua ngay</span>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
            @else
            @foreach($product_hot as $item )
            <div class="col">
                <div class="product-card">
                    <div class="product-media">
                        <div class="product-label"><label class="label-text sale">sale</label></div><button class="product-wish wish"></button>
                        <a class="product-image" href="{{$item->slug_full}}"><img src="{{$item->avatar_path}}" alt="{{$item->name}}"></a>
                        <div class="product-widget">
                            <a title="Product View" href="#" class="fas fa-eye" data-bs-toggle="modal" data-bs-target="#product-view">
                            </a>
                        </div>
                    </div>
                    <div class="product-content">
                        <h6 class="product-name"><a href="product-details.html">{{$item->name}}</a></h6>
                        <h6 class="product-price"><span>{{ number_format($prod->price) }}{{ $Unit }}<small>/{{ $prod->size }}</small></span></h6>
                        <a class="product-add" title="Mua ngay">
                            <i class="fas fa-shopping-basket"></i><span>Mua ngay</span>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
            @endif
            <div class="col">
                <div class="product-card">
                    <div class="product-media">
                        <div class="product-label"><label class="label-text sale">sale</label></div><button class="product-wish wish"></button>
                        <a class="product-image" href="product-details.html"><img src="images/product/03.jpg" alt="product"></a>
                        <div class="product-widget">
                            <a title="Product View" href="#" class="fas fa-eye" data-bs-toggle="modal" data-bs-target="#product-view"></a>
                        </div>
                    </div>
                    <div class="product-content">
                        <h6 class="product-name"><a href="product-details.html">Dưa chuột</a></h6>
                        <h6 class="product-price"><span>9.000đ<small>/kg</small></span></h6>
                        <a class="product-add" title="Mua ngay"><i class="fas fa-shopping-basket"></i><span>Mua ngay</span></a></li>

                    </div>
                </div>
            </div>
            <div class="col">
                <div class="product-card">
                    <div class="product-media">
                        <div class="product-label"><label class="label-text sale">sale</label></div><button class="product-wish wish"></button>
                        <a class="product-image" href="product-details.html"><img src="images/product/04.jpg" alt="product"></a>
                        <div class="product-widget">
                            <a title="Product View" href="#" class="fas fa-eye" data-bs-toggle="modal" data-bs-target="#product-view"></a>
                        </div>
                    </div>
                    <div class="product-content">
                        <h6 class="product-name"><a href="product-details.html">Cà tím</a></h6>
                        <h6 class="product-price"><span>9.000đ<small>/kg</small></span></h6>
                        <a class="product-add" title="Mua ngay"><i class="fas fa-shopping-basket"></i><span>Mua ngay</span></a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="product-card">
                    <div class="product-media">
                        <div class="product-label"><label class="label-text sale">sale</label></div><button class="product-wish wish"></i></button>
                        <a class="product-image" href="product-details.html"><img src="images/product/05.jpg" alt="product"></a>
                        <div class="product-widget">

                            <a title="Product View" href="#" class="fas fa-eye" data-bs-toggle="modal" data-bs-target="#product-view"></a>
                        </div>
                    </div>
                    <div class="product-content">
                        <h6 class="product-name"><a href="product-details.html">Đậu</a></h6>
                        <h6 class="product-price"><span>9.000đ<small>/kg</small></span></h6>
                        <a class="product-add" title="Mua ngay"><i class="fas fa-shopping-basket"></i><span>Mua ngay</span></a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="product-card">
                    <div class="product-media">
                        <div class="product-label"><label class="label-text sale">sale</label></div><button class="product-wish wish"></i></button>
                        <a class="product-image" href="product-details.html"><img src="images/product/06.jpg" alt="product"></a>
                        <div class="product-widget">
                            <a title="Product View" href="#" class="fas fa-eye" data-bs-toggle="modal" data-bs-target="#product-view"></a>
                        </div>
                    </div>
                    <div class="product-content">
                        <h6 class="product-name"><a href="product-details.html">Cà chua</a></h6>
                        <h6 class="product-price"><span>9.000đ<small>/kg</small></span></h6>
                        <a class="product-add" title="Mua ngay"><i class="fas fa-shopping-basket"></i><span>Mua ngay</span></a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="product-card">
                    <div class="product-media">
                        <div class="product-label"><label class="label-text sale">sale</label></div><button class="product-wish wish"></button>
                        <a class="product-image" href="product-details.html"><img src="images/product/07.jpg" alt="product"></a>
                        <div class="product-widget">
                            <a title="Product View" href="#" class="fas fa-eye" data-bs-toggle="modal" data-bs-target="#product-view"></a>
                        </div>
                    </div>
                    <div class="product-content">
                        <h6 class="product-name"><a href="product-details.html">Hành tím</a></h6>
                        <h6 class="product-price"><span>9.000đ<small>/kg</small></span></h6>
                        <a class="product-add" title="Mua ngay"><i class="fas fa-shopping-basket"></i><span>Mua ngay</span></a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="product-card">
                    <div class="product-media">
                        <div class="product-label"><label class="label-text sale">sale</label></div><button class="product-wish wish"></button>
                        <a class="product-image" href="product-details.html"><img src="images/product/08.jpg" alt="product"></a>
                        <div class="product-widget">
                            <a title="Product View" href="#" class="fas fa-eye" data-bs-toggle="modal" data-bs-target="#product-view"></a>
                        </div>
                    </div>
                    <div class="product-content">
                        <h6 class="product-name"><a href="product-details.html">Bắp cải</a></h6>
                        <h6 class="product-price"><span>9.000đ<small>/kg</small></span></h6>
                        <a class="product-add" title="Mua ngay"><i class="fas fa-shopping-basket"></i><span>Mua ngay</span></a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="product-card">
                    <div class="product-media">
                        <div class="product-label"><label class="label-text sale">sale</label></div><button class="product-wish wish"></button>
                        <a class="product-image" href="product-simple.html"><img src="images/product/09.jpg" alt="product"></a>
                        <div class="product-widget">
                            <a title="Product View" href="#" class="fas fa-eye" data-bs-toggle="modal" data-bs-target="#product-view"></a>
                        </div>
                    </div>
                    <div class="product-content">
                        <h6 class="product-name"><a href="product-simple.html">Cải chíp</a></h6>
                        <h6 class="product-price"><span>9.000đ<small>/kg</small></span></h6>
                        <a class="product-add" title="Mua ngay"><i class="fas fa-shopping-basket"></i><span>Mua ngay</span></a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="product-card">
                    <div class="product-media">
                        <div class="product-label"><label class="label-text sale">sale</label></div><button class="product-wish wish"></button>
                        <a class="product-image" href="product-simple.html"><img src="images/product/10.jpg" alt="product"></a>
                        <div class="product-widget">

                            <a title="Product View" href="#" class="fas fa-eye" data-bs-toggle="modal" data-bs-target="#product-view"></a>
                        </div>
                    </div>
                    <div class="product-content">
                        <h6 class="product-name"><a href="product-simple.html">Ớt cay</a></h6>
                        <h6 class="product-price"><span>9.000đ<small>/kg</small></span></h6>
                        <a class="product-add" title="Mua ngay"><i class="fas fa-shopping-basket"></i><span>Mua ngay</span></a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="product-card">
                    <div class="product-media">
                        <div class="product-label"><label class="label-text sale">sale</label></div><button class="product-wish wish"></button>
                        <a class="product-image" href="product-simple.html"><img src="images/product/11.jpg" alt="product"></a>
                        <div class="product-widget">
                            <a title="Product View" href="#" class="fas fa-eye" data-bs-toggle="modal" data-bs-target="#product-view"></a>
                        </div>
                    </div>
                    <div class="product-content">
                        <h6 class="product-name"><a href="product-simple.html">Đậu</a></h6>
                        <h6 class="product-price"><span>9.000đ<small>/kg</small></span></h6>
                        <a class="product-add" title="Mua ngay"><i class="fas fa-shopping-basket"></i><span>Mua ngay</span></a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="product-card">
                    <div class="product-media">
                        <div class="product-label"><label class="label-text sale">sale</label></div><button class="product-wish wish"></button>
                        <a class="product-image" href="product-details.html"><img src="images/product/12.jpg" alt="product"></a>
                        <div class="product-widget">
                            <a title="Product View" href="#" class="fas fa-eye" data-bs-toggle="modal" data-bs-target="#product-view"></a>
                        </div>
                    </div>
                    <div class="product-content">
                        <h6 class="product-name"><a href="product-details.html">bí đỏ</a></h6>
                        <h6 class="product-price"><span>9.000đ<small>/kg</small></span></h6>
                        <a class="product-add" title="Mua ngay"><i class="fas fa-shopping-basket"></i><span>Mua ngay</span></a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="product-card">
                    <div class="product-media">
                        <div class="product-label"><label class="label-text sale">sale</label></div><button class="product-wish wish"></button>
                        <a class="product-image" href="product-details.html"><img src="images/product/13.jpg" alt="product"></a>
                        <div class="product-widget">
                            <a title="Product View" href="#" class="fas fa-eye" data-bs-toggle="modal" data-bs-target="#product-view"></a>
                        </div>
                    </div>
                    <div class="product-content">
                        <h6 class="product-name"><a href="product-details.html">Dâu tây</a></h6>
                        <h6 class="product-price"><span>9.000đ<small>/kg</small></span></h6>
                        <a class="product-add" title="Mua ngay"><i class="fas fa-shopping-basket"></i><span>Mua ngay</span></a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="product-card">
                    <div class="product-media">
                        <div class="product-label"><label class="label-text sale">sale</label></div><button class="product-wish wish"></button>
                        <a class="product-image" href="product-details.html"><img src="images/product/14.jpg" alt="product"></a>
                        <div class="product-widget">

                            <a title="Product View" href="#" class="fas fa-eye" data-bs-toggle="modal" data-bs-target="#product-view"></a>
                        </div>
                    </div>
                    <div class="product-content">
                        <h6 class="product-name"><a href="product-details.html">Xoài</a></h6>
                        <h6 class="product-price"><span>9.000đ<small>/kg</small></span></h6>
                        <a class="product-add" title="Mua ngay"><i class="fas fa-shopping-basket"></i><span>Mua ngay</span></a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="product-card">
                    <div class="product-media">
                        <div class="product-label"><label class="label-text sale">sale</label></div><button class="product-wish wish"></button>
                        <a class="product-image" href="product-details.html"><img src="images/product/15.jpg" alt="product"></a>
                        <div class="product-widget">

                            <a title="Product View" href="#" class="fas fa-eye" data-bs-toggle="modal" data-bs-target="#product-view"></a>
                        </div>
                    </div>
                    <div class="product-content">
                        <h6 class="product-name"><a href="product-details.html">Hạnh nhân</a></h6>
                        <h6 class="product-price"><span>9.000đ<small>/kg</small></span></h6>
                        <a class="product-add" title="Mua ngay"><i class="fas fa-shopping-basket"></i><span>Mua ngay</span></a>
                    </div>
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="section-btn-25"><a href="shop-4column.html" class="btn btn-outline"><i class="fas fa-eye"></i><span>Hiển thị thêm</span></a></div>
            </div>
        </div>
    </div>
</section>
<section class="section deals-part">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-heading">
                    <h2>Đồ uống công nghệ</h2>
                </div>
            </div>
        </div>
        @if(isset($do_uong) && count($do_uong)>0)
        <div class="row row-cols-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-4">
            @foreach($do_uong as $item)
            <div class="col">
                <div class="product-card">
                    <div class="product-media">
                        <div class="product-label"><label class="label-text new">New</label></div><button class="product-wish wish"></button>
                        <a class="product-image" href="product-simple.html"><img src="{{$item->avatar_path}}" alt="{{$item->name}}"></a>
                        <div class="product-widget">
                            <a title="Product View" href="#" class="fas fa-eye" data-bs-toggle="modal" data-bs-target="#product-view"></a>
                        </div>
                    </div>
                    <div class="product-content">
                        <h6 class="product-name"><a href="product-simple.html">{{$item->name}}</a></h6>
                        <h6 class="product-price"><span>{{ number_format($item->price) }}{{ $Unit }}<small>/ {{$item->size}}</small></span></h6>
                        <a class="product-add" title="Add to Cart"><i class="fas fa-shopping-basket"></i><span>Mua ngay</span></a>

                    </div>
                </div>
            </div>
            @endforeach
            <!-- <div class="col">
                <div class="product-card">
                    <div class="product-media">
                        <div class="product-label"><label class="label-text new">new</label></div><button class="product-wish wish"></button>
                        <a class="product-image" href="product-simple.html"><img src="images/product/drink/dua luoi 1.jpg" alt="product"></a>
                        <div class="product-widget">
                            <a title="Product View" href="#" class="fas fa-eye" data-bs-toggle="modal" data-bs-target="#product-view"></a>
                        </div>
                    </div>
                    <div class="product-content">
                        <h6 class="product-name"><a href="product-details.html">Nước dưa lưới vàng</a></h6>
                        <h6 class="product-price"><span>50.000đ<small>/ chai 330ml</small></span></h6>
                        <a class="product-add" title="Add to Cart"><i class="fas fa-shopping-basket"></i><span>Mua ngay</span></a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="product-card">
                    <div class="product-media">
                        <div class="product-label"><label class="label-text new">New</label></div><button class="product-wish wish"><i class="fas fa-heart"></i></button>
                        <a class="product-image" href="product-details.html"><img src="images/product/drink/ep oi 2.jpg" alt="product"></a>
                        <div class="product-widget">
                            <a title="Product View" href="#" class="fas fa-eye" data-bs-toggle="modal" data-bs-target="#product-view"></a>
                        </div>
                    </div>
                    <div class="product-content">
                        <h6 class="product-name"><a href="product-details.html">Nước ép ổi</a></h6>
                        <h6 class="product-price"><span>38.000đ<small>/ chai 330ml</small></span></h6>
                        <a class="product-add" title="Add to Cart"><i class="fas fa-shopping-basket"></i><span>Mua ngay</span></a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="product-card">
                    <div class="product-media">
                        <div class="product-label"><label class="label-text off">-10%</label></div><button class="product-wish wish"></button>
                        <a class="product-image" href="product-details.html"><img src="images/product/drink/nuoc cam 1.jpg" alt="product"></a>
                        <div class="product-widget">
                            <a title="Product View" href="#" class="fas fa-eye" data-bs-toggle="modal" data-bs-target="#product-view"></a>
                        </div>
                    </div>
                    <div class="product-content">
                        <h6 class="product-name"><a href="product-details.html">Nước cam ép</a></h6>
                        <h6 class="product-price"><span>55.000đ<small>/ chai 330ml</small></span></h6>
                        <a class="product-add" title="Add to Cart"><i class="fas fa-shopping-basket"></i><span>Mua ngay</span></a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="product-card">
                    <div class="product-media">
                        <div class="product-label"><label class="label-text off">-15%</label></div><button class="product-wish wish"></button>
                        <a class="product-image" href="product-details.html"><img src="images/product/drink/nuoc tao.jpg" alt="product"></a>
                        <div class="product-widget">
                            <a title="Product View" href="#" class="fas fa-eye" data-bs-toggle="modal" data-bs-target="#product-view"></a>
                        </div>
                    </div>
                    <div class="product-content">
                        <h6 class="product-name"><a href="product-details.html">Nước ép táo</a></h6>
                        <h6 class="product-price"><span>65.000đ<small>/chai 330ml</small></span></h6>
                        <a class="product-add" title="Add to Cart"><i class="fas fa-shopping-basket"></i><span>Mua ngay</span></a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="product-card">
                    <div class="product-media">
                        <div class="product-label"><label class="label-text off">-18%</label></div><button class="product-wish wish"></i></button>
                        <a class="product-image" href="product-details.html"><img src="images/product/drink/thom 1.jpg" alt="product"></a>
                        <div class="product-widget">
                            <a title="Product View" href="#" class="fas fa-eye" data-bs-toggle="modal" data-bs-target="#product-view"></a>
                        </div>
                    </div>
                    <div class="product-content">
                        <h6 class="product-name"><a href="product-details.html">Nước dứa ép</a></h6>
                        <h6 class="product-price"><span>35.000đ<small>/chai 330ml</small></span></h6>
                        <a class="product-add" title="Add to Cart"><i class="fas fa-shopping-basket"></i><span>Mua ngay</span></a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="product-card">
                    <div class="product-media">
                        <div class="product-label"><label class="label-text off">-18%</label></div><button class="product-wish wish"></i></button>
                        <a class="product-image" href="product-details.html"><img src="images/product/drink/thom 1.jpg" alt="product"></a>
                        <div class="product-widget">
                            <a title="Product View" href="#" class="fas fa-eye" data-bs-toggle="modal" data-bs-target="#product-view"></a>
                        </div>
                    </div>
                    <div class="product-content">
                        <h6 class="product-name"><a href="product-details.html">Nước dứa ép</a></h6>
                        <h6 class="product-price"><span>35.000đ<small>/chai 330ml</small></span></h6>
                        <a class="product-add" title="Add to Cart"><i class="fas fa-shopping-basket"></i><span>Mua ngay</span></a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="product-card">
                    <div class="product-media">
                        <div class="product-label"><label class="label-text off">-18%</label></div><button class="product-wish wish"></i></button>
                        <a class="product-image" href="product-details.html"><img src="images/product/drink/thom 1.jpg" alt="product"></a>
                        <div class="product-widget">
                            <a title="Product View" href="#" class="fas fa-eye" data-bs-toggle="modal" data-bs-target="#product-view"></a>
                        </div>
                    </div>
                    <div class="product-content">
                        <h6 class="product-name"><a href="product-details.html">Nước dứa ép</a></h6>
                        <h6 class="product-price"><span>35.000đ<small>/chai 330ml</small></span></h6>
                        <a href="http://" class="product-add" title="Add to Cart"><i class="fas fa-shopping-basket"></i><span>Mua ngay</span></a>

                    </div>
                </div>
            </div> -->


        </div>
        @endif
        <div class="row">
            <div class="col-lg-12">
                <div class="section-btn-25"><a href="product-all.html" class="btn btn-outline"><i class="fas fa-eye"></i><span>Hiển thị thêm</span></a></div>
            </div>
        </div>
    </div>
</section>
<div class="section promo-part">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="promo-img">
                    <a href="#"><img src="images/promo/home/03.jpg" alt="promo"></a>
                </div>
            </div>
        </div>
    </div>
</div>
<section class="section feature-part">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-heading">
                    <h2>Giỏ quả đẹp</h2>
                </div>
            </div>
        </div>
        @if(isset($gio_qua) && count($gio_qua)>0)
        <div class="row row-cols-1 row-cols-md-1 row-cols-lg-2 row-cols-xl-2">
            @foreach($gio_qua as $key=> $qua)
            @if($key == 0)
            <div class="col">
                <div class="feature-card">
                    <div class="feature-media">
                        <div class="feature-label"><label class="label-text feat">được chọn nhiều</label></div><button class="feature-wish wish"></button>
                        <a class="feature-image" href="product-details.html"><img src="images/product/gio 1.jpg" alt="product"></a>
                        <div class="feature-widget">
                            <a title="Product View" href="#" class="fas fa-eye" data-bs-toggle="modal" data-bs-target="#product-view"></a>
                        </div>
                    </div>
                    <div class="feature-content">
                        <h6 class="feature-name"><a href="product-details.html">{{$qua->name}}</a></h6>
                        <h6 class="feature-price"><span>{{ number_format($item->price) }}{{ $Unit }}<small>/ {{$item->size}}</small></span></h6>
                        <p class="feature-desc">{!!$qua->description!!}</p>
                        <a class="product-add" title="Add to Cart"><i class="fas fa-shopping-basket"></i><span>Mua ngay</span></a>
                    </div>
                </div>
            </div>
            @endif
            @endforeach
            @foreach($gio_qua as $key=> $qua)
            @if($key == 1)
            <div class="col">
                <div class="feature-card">
                    <div class="feature-media">
                        <div class="feature-label"><label class="label-text feat">Best Seller</label></div><button class="feature-wish wish"></button>
                        <a class="feature-image" href="product-details.html"><img src="images/product/gio 10.jpg" alt="product"></a>
                        <div class="feature-widget">
                            <a title="Product View" href="#" class="fas fa-eye" data-bs-toggle="modal" data-bs-target="#product-view"></a>
                        </div>
                    </div>
                    <div class="feature-content">
                        <h6 class="feature-name"><a href="product-details.html">{{$qua->name}}</a></h6>
                        <h6 class="feature-price">{{ number_format($item->price) }}{{ $Unit }}<small>/ {{$item->size}}</small></span></h6>
                        <p class="feature-desc">{!!$qua->description!!}</p>
                        <a class="product-add" title="Add to Cart"><i class="fas fa-shopping-basket"></i><span>Mua ngay</span></a>
                    </div>
                </div>
            </div>
            @endif
            @endforeach
            @foreach($gio_qua as $key=> $qua)
            @if($key == 2)
            <div class="col">
                <div class="feature-card">
                    <div class="feature-media">
                        <div class="feature-label"><label class="label-text feat">Giỏ tặng</label></div><button class="feature-wish wish"></button>
                        <a class="feature-image" href="product-details.html"><img src="images/product/gio 11.jpg" alt="product"></a>
                        <div class="feature-widget">
                            <a title="Product View" href="#" class="fas fa-eye" data-bs-toggle="modal" data-bs-target="#product-view"></a>
                        </div>
                    </div>
                    <div class="feature-content">
                        <h6 class="feature-name"><a href="product-details.html">{{$qua->name}}</a></h6>
                        <h6 class="feature-price">{{ number_format($item->price) }}{{ $Unit }}<small>/ {{$item->size}}</small></span></h6>
                        <p class="feature-desc">{!!$qua->desccription!!}</p>
                        <a class="product-add" title="Add to Cart"><i class="fas fa-shopping-basket"></i><span>Mua ngay</span></a>
                    </div>
                </div>
            </div>
            @endif
            @endforeach
            @foreach($gio_qua as $key=> $qua)
            @if($key == 3)
            <div class="col">
                <div class="feature-card">
                    <div class="feature-media">
                        <div class="feature-label"><label class="label-text feat">Được yêu thích</label></div><button class="feature-wish wish"></button>
                        <a class="feature-image" href="product-details.html"><img src="images/product/gio 8.jpg" alt="product"></a>
                        <div class="feature-widget">
                            <a title="Product View" href="#" class="fas fa-eye" data-bs-toggle="modal" data-bs-target="#product-view"></a>
                        </div>
                    </div>
                    <div class="feature-content">
                        <h6 class="feature-name"><a href="product-details.html">{{$qua->name}}</a></h6>
                        <h6 class="feature-price">{{ number_format($item->price) }}{{ $Unit }}<small>/ {{$item->size}}</small></span></h6>
                        <p class="feature-desc">{!!$qua->description!!}</p><a class="product-add" title="Add to Cart"><i class="fas fa-shopping-basket"></i><span>Mua ngay</span></a>
                    </div>
                </div>
            </div>
            @endif
            @endforeach
            @foreach($gio_qua as $key=> $qua)
            @if($key == 4)
            <div class="col">
                <div class="feature-card">
                    <div class="feature-media">
                        <div class="feature-label"><label class="label-text feat">Yêu thích</label></div><button class="feature-wish wish"></button>
                        <a class="feature-image" href="product-details.html"><img src="images/product/gio 6.jpg" alt="product"></a>
                        <div class="feature-widget">
                            <a title="Product View" href="#" class="fas fa-eye" data-bs-toggle="modal" data-bs-target="#product-view"></a>
                        </div>
                    </div>
                    <div class="feature-content">
                        <h6 class="feature-name"><a href="product-details.html">{{$qua->name}}</a></h6>
                        <h6 class="feature-price">{{ number_format($item->price) }}{{ $Unit }}<small>/ {{$item->size}}</small></span></h6>
                        <p class="feature-desc">{!!$qua->description!!}</p>
                        <a class="product-add" title="Add to Cart"><i class="fas fa-shopping-basket"></i><span>Mua ngay</span></a>
                    </div>
                </div>
            </div>
            @endif
            @endforeach
            @foreach($gio_qua as $key=> $qua)
            @if($key == 5)
            <div class="col">
                <div class="feature-card">
                    <div class="feature-media">
                        <div class="feature-label"><label class="label-text feat">feature</label></div><button class="feature-wish wish"></button>
                        <a class="feature-image" href="product-details.html"><img src="images/product/gio 5.jpg" alt="product"></a>
                        <div class="feature-widget">
                            <a title="Product View" href="#" class="fas fa-eye" data-bs-toggle="modal" data-bs-target="#product-view"></a>
                        </div>
                    </div>
                    <div class="feature-content">
                        <h6 class="feature-name"><a href="product-details.html">{{$qua->name}}</a></h6>
                        <h6 class="feature-price">{{ number_format($item->price) }}{{ $Unit }}<small>/ {{$item->size}}</small></span></h6>
                        <p class="feature-desc">{!!$qua->description!!}</p>
                        <a class="product-add" title="Add to Cart"><i class="fas fa-shopping-basket"></i><span>Mua ngay</span></a>
                    </div>
                </div>
            </div>
            @endif
            @endforeach
        </div>
        @endif
        <div class="row">
            <div class="col-lg-12">
                <div class="section-btn-25"><a href="product-all.html" class="btn btn-outline"><i class="fas fa-eye"></i><span>hiển thị thêm</span></a></div>
            </div>
        </div>
    </div>
</section>


<div class="section promo-part">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-6 col-lg-6 px-xl-3">
                <div class="promo-img">
                    <a href="#"><img src="images/promo/home/01.jpg" alt="promo"></a>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-6 px-xl-3">
                <div class="promo-img">
                    <a href="#"><img src="images/promo/home/02.jpg" alt="promo"></a>
                </div>
            </div>
        </div>
    </div>
</div>
@if($doitac)
<section class="section brand-part">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-heading">
                    <h2>{{$doitac->name}}</h2>
                </div>
            </div>
        </div>
        @if($doitac->childs() &&count($doitac->childs)>0)
        <div class="brand-slider slider-arrow">
            @foreach($doitac->childs()->get() as $i)
            <div class="brand-wrap">
                <div class="brand-media"><img src="{{$i->image_path}}" alt="{{$i->name}}">
                    <div class="brand-overlay"><a href="{{$i->slug}}"><i class="fas fa-link"></i></a></div>
                </div>
                <div class="brand-meta">
                    <h4>{{$i->name}}</h4>
                    <p>số lượng</p>
                </div>
            </div>
            @endforeach
        </div>
        @endif
    </div>
</section>
@endif
@if($khachhang )
<section class="section testimonial-part">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-heading">
                    <h2>{{$khachhang->name}}</h2>
                </div>
            </div>
        </div>
        @if($khachhang->childs()&& count($khachhang->childs)>0)
        <div class="row">
            <div class="col-lg-12">

                <div class="testimonial-slider slider-arrow">
                    @foreach($khachhang->childs()->get() as $i)
                    <div class="testimonial-card"><i class="fas fa-quote-left"></i>
                    
                    <p>{!!$i->description!!}</p>
                        <h5>{{$i->name}}</h5>
                        <ul>
                            <li class="fas fa-star"></li>
                            <li class="fas fa-star"></li>
                            <li class="fas fa-star"></li>
                            <li class="fas fa-star"></li>
                            <li class="fas fa-star"></li>
                        </ul><img src="{{$i->image_path}}" alt="{{$i->name}}">
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        @endif
    </div>

    <!-- <div class="modal fade" id="addto-cart-modal">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content product-view">
                    <div class="modal-header border-bottom-0 bg-light justify-content-center">
                        <h4 class="modal-title text-center">Product successfully added to your shopping cart</h4>
                        <button type="button" class="modal-close icofont-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class=" p-5">
                        <div class="row align-items-center align-items-lg-start">
                            <div class="col-lg-5">
                                <div class="row align-items-center align-items-lg-start">
                                    <div class="col-md-6">
                                        <img class="product-image" src="assets/images/products/product-13.jpg" alt="images_not_found">
                                    </div>
                                    <div class="col-md-6">
                                        <h6 class="product-name">Snacking Essentials Walnuts</h6>
                                        <ul class="quntity-list">
                                            <li>€23.06</li>
                                            <li>Color: White</li>
                                            <li>Quantity:1</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-7">
                                <div class="cart-content">
                                    <p class="title">There are 3 items in your cart.</p>
                                    <p><span>Total products:</span>€23.06</p>
                                    <p><span>Total shipping:</span>Free</p>
                                    <p><span>Taxes:</span> €0.00</p>
                                    <p><span>Total:</span> €23.06 (tax excl.)</p>
                                    <div class="cart-content-btn">
                                        <button class="btn btn-sm btn-dark me-1 mt-3 mt-sm-0" data-bs-dismiss="modal">Continue
                                            shopping</button>
                                        <button class="btn btn-sm btn-dark mt-3 mt-sm-0"><a href="checkout.html">Proceed to
                                            checkout</a></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->

</section>
@endif
<section class="section blog-part">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-heading">
                    <h2>Bài viết</h2>
                </div>
            </div>
        </div>
        @if(isset($bai_viet) && count($bai_viet)>0)
        <div class="row">
            <div class="col-lg-12">
                <div class="blog-slider slider-arrow">
                    @foreach($bai_viet as $i)
                    <div class="blog-card">
                        <div class="blog-media">
                            <a class="blog-img" href="{{$i->slug}}"><img src="{{$i->avatar_path}}" alt="{{$i->name}}"></a>
                        </div>
                        <div class="blog-content">
                            <ul class="blog-meta">
                                <li><i class="fas fa-user"></i><span>admin</span></li>
                                <li><i class="fas fa-calendar-alt"></i><span>{{$i->created_at->format('F d, Y')}}</span></li>
                            </ul>
                            <h4 class="blog-title"><a href="blog-details.html">{{$i->name}}</a></h4>
                            <p class="blog-desc">{{$i->description}} </p><a class="blog-btn" href="{{$i->slug}}"><span>read more</span><i class="icofont-arrow-right"></i></a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        @endif
        <div class="row">
            <div class="col-lg-12">
                <div class="section-btn-25"><a href="blog-grid.html" class="btn btn-outline"><i class="fas fa-eye"></i><span>Xem tất cả bài viết</span></a></div>
            </div>
        </div>
    </div>
</section>
@endsection
@section('js')

@endsection