@extends('frontend.layouts.main')
@section('title', 'Trang chủ')
@section('css')
<style>
    .section_cart {
        width: 100%;
        padding: 30px 0;
    }

    .template-search {
        background: #eee;
    }

    .title-cart {
        font-size: 15px;
        font-weight: 600;
        margin: 0;
        margin-bottom: 20px;
    }

    .bg-cart {
        background: #fff;
    }

    .sucess-order {
        display: block;
        overflow: hidden;
        background-color: #f5f5f5;
        text-align: center;
        padding: 10px 0;
        color: #34c772;
        font-size: 25px;
        font-weight: bold;
        margin-top: 15px;
    }

    .order-content {
        padding: 10px 0px;
    }

    .order-content .infor-order {}

    .thank-you {}

    .order-content .list-infor {
        display: block;
        overflow: hidden;
        background-color: #f3f3f3;
        padding: 10px;
    }

    .order-content .list-infor li {
        line-height: 25px;
        padding: 5px 0;
    }

    .order-content .list-infor li span {
        font-weight: 600;
        color: #000;
    }

    .order-content .total-price {
        color: red;
    }

    .order-content .total-price span {}

    .wanning_cart {
        text-align: center;
        margin: 30px 0;
        font-size: 20px;
        font-weight: 700;
        background-color: #84C561;
        line-height: 60px;
        border-radius: 4px;
        color: beige;
    }

    .buy-more {}

    .buy-more a {
        overflow: hidden;
        border: 1px solid #288ad6;
        color: #288ad6;
        background-color: #fff;
        border-radius: 4px;
        padding: 10px;
        margin-bottom: 20px;
        width: 100%;
    }

    .order-item h4 {
        margin: 0;
        font-size: 12px;
        font-weight: bold;
    }

    .title-order {
        font-size: 14px;
        font-weight: bold;

    }
    @media (max-width: 786px) {
		.box_info_order_success .list_sp_order_success .box {
    display: block;
}

.list_sp_order_success .cart-product-image img {
    object-fit: contain;
    height: 100px;
}
		.box_order_success {
    margin-top: 20px;
}
        .box_order_success .box_icon_sucess .icon::before {
            width: 100px;
            height: 100px;
        }
        .box_order_success .box_icon_sucess .icon::after {
            width: 120px;
            height: 120px;
        }
        .box_order_success .box_icon_sucess .icon {
            width: 80px;
            height: 80px;
        }
    }
    @media (max-width: 586px) {
        .box_order_success .box_icon_sucess .icon {
            width: 60px;
            height: 60px;
        }
        .box_order_success .box_icon_sucess .icon::before {
            width: 80px;
            height: 80px;
        }
        .box_order_success .box_icon_sucess .icon::after {
            width: 100px;
            height: 100px;
        }
        .box_info_order_success .info_customer .name,
        .box_info_order_success .info_customer .phone,
        .box_info_order_success .info_customer .address {
            font-size: 18px;
        }
    }
    
</style>
@endsection
@section('content')
<div class="content-wrapper">
    <div class="main">
        <div class="section_cart">
            <div class="ctnr container-cart">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2 col-sm-12 col-12">
                        <form>
                            @if (session("sucess"))
                            <div class="box_order_success">
                                <div class="box_icon_sucess">
                                    <div class="icon">
                                        <i class="fas fa-check"></i>
                                    </div>
                                    <div class="title_success">
                                    {{__('home.dat_hang_thanh_cong')}}
                                    </div>
                                </div>
                                <div class="box_info_order_success">
                                    <div class="info_customer">
                                        <div class="name">
                                            <strong>{{__('home.ten_nguoi_nhan')}}: </strong>{{ $data->name }}
                                        </div>
                                        <div class="name">
                                            <strong>{{__('home.ma_don_hang')}}: </strong>{{ $data->id }}
                                        </div>
                                        <div class="phone">
                                            <strong>{{__('contact.sdt')}}: </strong>{{ $data->phone }}
                                        </div>
                                        <div class="address">
                                            @if(!empty($data->district)&&!empty($data->city))
                                            <strong>{{__('home.dia_chi')}}: </strong>{{ $data->address_detail }}, {{ $data->district->name }}, {{ $data->city->name }} ({{__('home.nhan_vien_goi')}}).
                                            @else
                                            <strong>{{__('home.dia_chi')}}: </strong>{{ $data->address_detail }} ({{__('home.nhan_vien_goi')}}).
                                            @endif

                                        </div>
                                    </div>
                                    <div class="list_sp_order_success">
                                        @foreach ($data->orders as $productItem)
                                        <div class="item">
                                            <div class="box">
                                                <div class="cart-item cart-image">
                                                    <div class="cart-product-image">
                                                        <img src="{{ $productItem->avatar_path }}" alt="{{ $productItem->name }}">
                                                    </div>
                                                </div>
                                                <div class="box_name">
                                                    <div class="name">
                                                        {{ $productItem->name }}
                                                    </div>
                                                    <div class="box_info">
                                                        <div class="qty">
                                                            {{__('home.so_luong')}}: {{ $productItem->quantity }}
                                                        </div>
                                                        <div class="price">
                                                            {{__('home.gia')}}: {{ number_format($productItem->new_price) }}₫
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                    <div>
                                        <strong>{{__('home.tong_tien')}}:</strong> {{ number_format($data->total) }}₫ @if($data->sale) ({{__('home.giam')}} {{ number_format($data->sale) }}₫) @endif
                                    </div>
                                </div>
                                <div class="thank_you">
                                    <div class="content_thank">
                                        <strong>
                                            {{__('home.lien_he_voi_ban')}}<br>{{__('home.thac_mac')}}
                                        </strong>
                                    </div>
                                    @php
                                    $modelCate = new App\Models\CategoryProduct;
                                    $cuahang = $modelCate->where('active',1)->find(2);
                                    @endphp
                                    <div class="group_button_home">
                                        <a class="back_home" href="{{ makeLink('home') }}">
                                            {{__('home.tro_ve_trang_chu')}}
                                        </a>
                                    </div>
                                </div>
                            </div>
                            @elseif(session("error"))
                            <div class="wanning_cart">
                                <i class="fas fa-shopping-bag mr-3"></i> {{ session("error") }}
                            </div>
                            @else
                            <div class="wanning_cart">
                                {{__('home.gio_hang_trong')}}
                            </div>
                            @endif
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')

@endsection