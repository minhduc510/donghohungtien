@extends('frontend.layouts.main')
@section('title', 'Trang chủ')
@section('css')
<style>
    .btn-light {
        color: #fff;
        text-decoration: none;
        text-transform: uppercase;
        background-color: #a3a3a3;
    }
</style>
@endsection

@section('content')
<div class="content-wrapper section_cart">
    <div class="main">
        <div class="text-left wrap-breadcrumbs">
            <div class="ctnr">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <ul class="breadcrumb">
                            <li class="breadcrumbs-item">
                                <a href="{{ makeLink('home') }}">Trang chủ</a>
                            </li>
                            <li class="breadcrumbs-item"><a href="#" class="currentcat">Giỏ hàng</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-cart-color">
            <div class="ctnr container-cart">
                <div class="row">
                    <div class="col-sm-12">
                        <form action="{{ route('cart.order.submit') }}" method="POST"
                            enctype="multipart/form-data" id="buynow">
                            @csrf
                            <div class="panel panel-danger">
                                <div class="cart-wrapper">
                                    <div class="title__cart">
                                        <h3 class="title__cart-h3">
                                            <svg class="bi bi-basket" fill="currentColor" height="16" viewBox="0 0 16 16" width="16" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M5.757 1.071a.5.5 0 0 1 .172.686L3.383 6h9.234L10.07 1.757a.5.5 0 1 1 .858-.514L13.783 6H15a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1v4.5a2.5 2.5 0 0 1-2.5 2.5h-9A2.5 2.5 0 0 1 1 13.5V9a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h1.217L5.07 1.243a.5.5 0 0 1 .686-.172zM2 9v4.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V9H2zM1 7v1h14V7H1zm3 3a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3A.5.5 0 0 1 4 10zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3A.5.5 0 0 1 6 10zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3A.5.5 0 0 1 8 10zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 1 .5-.5zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 1 .5-.5z"></path>
                                            </svg>
                                            Giỏ hàng của bạn
                                        </h3>
                                        <div class="checkout-cart">
                                            @include('frontend.components.cart-component',[
                                                ])
                                            <div class="infomation-wrapper" id="checkout-information">
                                                <div class="infomation-left">
                                                    <div class="infomation-item infomation">
                                                        <h2 class=" infomation-title">
                                                            <svg class="bi bi-geo-alt" fill="currentColor" height="16" viewBox="0 0 16 16" width="16" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A31.493 31.493 0 0 1 8 14.58a31.481 31.481 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94zM8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10z"></path>
                                                                <path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"></path>
                                                            </svg>
                                                            <span>
                                                                Thông Tin Nhận Hàng
                                                            </span>
                                                        </h2>
                                                        <div class="infomation-content customer-info">
                                                            @guest
                                                            <div class="">
                                                                <div class="gr-2colum">
                                                                    <div class="gr-box">
                                                                        <label class="label" for="customer-name">Họ và tên<sup>*</sup></label>
                                                                        <input class="input ng-untouched ng-pristine ng-valid" id="customer-name" name="name" tabindex="1" type="text" required>
                                                                        <small class="gr-notification" hidden="">Mời nhập tên người nhận.</small>
                                                                    </div>
                                                                    <div class="gr-box">
                                                                        <label class="label" for="customer-phone">Số điện thoại<sup>*</sup></label>
                                                                        <input class="input ng-untouched ng-pristine ng-valid" id="customer-phone" tabindex="2" type="tel" name="phone" pattern="^(0|\+84)[35789][0-9]{8}$" required>
                                                                        <small class="gr-notification" hidden="">Mời nhập số điện thoại người nhận.</small>
                                                                    </div>
                                                                </div>
                                                                <div class="gr-3colum">
                                                                    <div class="gr-box"><label class="label" for="customer-city">Tỉnh / Thành phố<sup>*</sup></label>
                                                                        <select name="city_id" id="city" class="seclet_gc @error('city_id') is-invalid   @enderror"  data-url="{{ route('ajax.address.districts') }}" required>
                                                                            <option value="">Chọn tỉnh/Thành phố</option>
                                                                            {!! $cities !!}
                                                                        </select>
                                                                        <div class="col-sm-12">
                                                                            @error('city_id')
                                                                                <div class="invalid-feedback">{{ $message }}</div>
                                                                            @enderror
                                                                        </div>
                                                                        <small class="gr-notification" hidden="">Mời chọn Tỉnh / Thành phố.</small>
                                                                    </div>
                                                                    <div class="gr-box"><label class="label" for="customer-dist">Quận / Huyện<sup>*</sup></label>
                                                                        <select name="district_id" id="district" class="seclet_gc  @error('district_id') is-invalid   @enderror"  data-url="{{ route('ajax.address.communes') }}"  required>
                                                                            <option value="">Chọn quận/huyện</option>
                                                                        </select>
                                                                        @error('district_id')
                                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                                        @enderror
                                                                        <small class="gr-notification" hidden="">Mời chọn Quận / Huyện.</small>
                                                                    </div>
                                                                    <div class="gr-box"><label class="label" for="customer-ward">Phường / Xã<sup>*</sup></label>
                                                                        <select name="commune_id" id="commune" class="seclet_gc   @error('commune_id')is-invalid   @enderror" required>
                                                                            <option value="">Chọn xã/phường/thị trấn</option>
                                                                        </select>
                                                                        @error('commune_id')
                                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                                        @enderror
                                                                        <small class="gr-notification" hidden="">Mời chọn Phường / Xã.</small>
                                                                    </div>
                                                                </div>
                                                                <div class="gr-1colum">
                                                                    <div class="gr-box">
                                                                        <label class="label" for="customer-address">Địa chỉ<sup>*</sup></label>
                                                                        <input class="input ng-untouched ng-pristine ng-valid" id="customer-address" type="text" name="address_detail" required>
                                                                        <small class="gr-notification" hidden="">Mời nhập địa chỉ nhận hàng.</small>
                                                                    </div>
                                                                </div>
                                                                <div class="gr-2colum">
                                                                    <div class="gr-box">
                                                                        <label class="label" for="customer-email">Email</label>
                                                                        <input class="input ng-untouched ng-pristine ng-valid" id="customer-email" type="email" name="email" pattern="^\w+([\-\.]?\w+)*@\w+([\-\.]?\w+)*(\.\w{2,3})$" required>
                                                                        <small class="gr-notification" hidden="">Địa chỉ Email không hợp lệ.</small>
                                                                    </div>
                                                                    <div class="gr-box">
                                                                        <label class="label" for="customer-note">Ghi chú giao hàng<sup></sup></label>
                                                                        <select name="note" id="" class="seclet_gc">
                                                                            <option value="Giao ngoài giờ hành chính">
                                                                                Giao ngoài giờ hành chính
                                                                            </option>
                                                                            <option value="Đặt hàng hộ người thân">
                                                                                Đặt hàng hộ người thân
                                                                            </option>
                                                                            
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            @else
                                                            <div class="">
                                                                <div class="receiving-list">
                                                                    @if(Auth::guard('web')->check())
                                                                    @php
                                                                        $address = Auth::guard()->user()->addressOfUser->where('default_address', 1)->first()
                                                                    @endphp
                                                                    
                                                                    <div class="receiving-item">
                                                                        <div class="receiving-content">
                                                                            <div class="receiving-title">
                                                                                {{ $address->name }}
                                                                                <input type="hidden" name="name" value="{{ $address->name }}">
                                                                            </div>
                                                                            <div class="receiving-title">
                                                                                {{ $address->phone }}
                                                                                <input type="hidden" name="phone" value="{{ $address->phone }}">
                                                                            </div>
                                                                            <div class="receiving-title">
                                                                                {{ $address->email }}
                                                                                <input type="hidden" name="mail" value="{{ $address->email }}">
                                                                            </div>
                                                                            <div class="receiving-address">
                                                                                {{ $address->address_detail }} , {{ $address->commune->name }}, {{ $address->district->name }}, {{ $address->city->name }}
                                                                                <input type="hidden" name="address_detail" value="{{ $address->address_detail }}">
                                                                                <input type="hidden" name="commune_id" value="{{ $address->commune_id }}">
                                                                                <input type="hidden" name="district_id" value="{{ $address->district_id }}">
                                                                                <input type="hidden" name="city_id" value="{{ $address->city_id }}">
                                                                            </div>
                                                                        </div>
                                                                        <a class="receiving-change"> Thay đổi </a>
                                                                    </div>
                                                                    @endif
                                                                </div>
                                                                <div class="gr-box">
                                                                    <label for="" class="label_gc">
                                                                        Ghi chú giao hàng
                                                                    </label>
                                                                    <select name="" id="" class="seclet_gc">
                                                                        <option value="">
                                                                            Giao ngoài giờ hành chính
                                                                        </option>
                                                                        <option value="">
                                                                            Giao ngoài giờ hành chính
                                                                        </option>
                                                                        <option value="">
                                                                            Giao ngoài giờ hành chính
                                                                        </option>
                                                                        <option value="">
                                                                            Giao ngoài giờ hành chính
                                                                        </option>
                                                                        <option value="">
                                                                            Giao ngoài giờ hành chính
                                                                        </option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            @endguest
                                                        </div>
                                                    </div>
                                                    {{--<div class="infomation-item gift">
                                                        <h2 class="infomation-title">
                                                            <svg class="bi bi-gift" fill="currentColor" height="16" viewBox="0 0 16 16" width="16" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M3 2.5a2.5 2.5 0 0 1 5 0 2.5 2.5 0 0 1 5 0v.006c0 .07 0 .27-.038.494H15a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1v7.5a1.5 1.5 0 0 1-1.5 1.5h-11A1.5 1.5 0 0 1 1 14.5V7a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1h2.038A2.968 2.968 0 0 1 3 2.506V2.5zm1.068.5H7.5a1.5 1.5 0 1 0-3 0c0 .085.002.274.045.43a.522.522 0 0 0 .023.07zM9 3h2.932a.56.56 0 0 0 .023-.07c.043-.156.045-.345.045-.43a1.5 1.5 0 0 0-3 0V3zM1 4v2h6V4H1zm8 0v2h6V4H9zm5 3H9v8h4.5a.5.5 0 0 0 .5-.5V7zm-7 8V7H2v7.5a.5.5 0 0 0 .5.5H7z"></path>
                                                            </svg>
                                                            <span>Thông Tin Quà Tặng</span>
                                                        </h2>
                                                        <div class="infomation-content">
                                                            <input class="gift-checkbox ng-untouched ng-pristine ng-valid" id="gift-infomation" type="checkbox">
                                                            <label class="gift-infomation" for="gift-infomation">
                                                                <small class="checkbox"></small>
                                                                <span class="gift-title">Gửi quà tặng đến bạn bè, người thân <b>(30.000<sup>đ</sup> bao gồm phí gói quà và thiệp)</b>
                                                                </span>
                                                            </label>
                                                            <div class="gift-content">
                                                                <div class="gr-2colum">
                                                                    <div class="gr-box">
                                                                        <label class="label" for="customer2-name">Họ và tên người gửi<sup>*</sup></label>
                                                                        <input class="input ng-untouched ng-pristine ng-valid" id="customer2-name" type="text">
                                                                        <small class="gr-notification" hidden="">Mời nhập họ và tên người gửi.</small>
                                                                    </div>
                                                                    <div class="gr-box">
                                                                        <label class="label" for="customer2-phone">Số điện thoại người gửi<sup>*</sup>
                                                                        </label>
                                                                        <input class="input ng-untouched ng-pristine ng-valid" id="customer2-phone" type="text">
                                                                        <small class="gr-notification" hidden="">Mời nhập số điện thoại người gửi.</small>
                                                                    </div>
                                                                </div>
                                                                <div class="gr-box"><label class="label" for="customer2-name">Họ và tên người nhận<sup>*</sup></label><input class="input ng-untouched ng-pristine ng-valid" id="customer2-name" type="text"><small class="gr-notification" hidden="">Mời nhập họ và tên người nhận.</small></div>
                                                                <div class="gr-box"><label class="label" for="customer2-note">Lời nhắn<sup>*</sup></label><textarea class="input ng-untouched ng-pristine ng-valid" id="customer2-note" placeholder="Ví dụ: Chúc mừng sinh nhật bạn (tối đa 200 ký tự)"></textarea><small class="gr-notification" hidden="">Mời nhập nội dung lời nhắn. Không quá 200 ký tự.</small></div><small class="gr-notification" style="display: block; color: #212121; font-style: italic;"><sup>*</sup>Hóa đơn của đơn hàng này sẽ không in giá.</small>
                                                            </div>
                                                        </div>
                                                    </div>--}}
                                                    @if($htgh)
                                                    <div class="infomation-item delivery">
                                                        <h2 class="infomation-title">
                                                            <svg class="bi bi-truck" fill="currentColor" height="16" viewBox="0 0 16 16" width="16" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M0 3.5A1.5 1.5 0 0 1 1.5 2h9A1.5 1.5 0 0 1 12 3.5V5h1.02a1.5 1.5 0 0 1 1.17.563l1.481 1.85a1.5 1.5 0 0 1 .329.938V10.5a1.5 1.5 0 0 1-1.5 1.5H14a2 2 0 1 1-4 0H5a2 2 0 1 1-3.998-.085A1.5 1.5 0 0 1 0 10.5v-7zm1.294 7.456A1.999 1.999 0 0 1 4.732 11h5.536a2.01 2.01 0 0 1 .732-.732V3.5a.5.5 0 0 0-.5-.5h-9a.5.5 0 0 0-.5.5v7a.5.5 0 0 0 .294.456zM12 10a2 2 0 0 1 1.732 1h.768a.5.5 0 0 0 .5-.5V8.35a.5.5 0 0 0-.11-.312l-1.48-1.85A.5.5 0 0 0 13.02 6H12v4zm-9 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm9 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"></path>
                                                            </svg><span>{{ $htgh->name }}</span>
                                                        </h2>
                                                        <div class="delivery-type-list">
                                                            <div class="delivery-type-item">
                                                                <input id="delivery-tieu-chuan" name="price_ship" value="{{ $htgh->price_ship }}" type="radio" class="ng-untouched ng-pristine ng-valid" checked>
                                                                <label class="radio" for="delivery-tieu-chuan"></label>
                                                                <label for="delivery-tieu-chuan">
                                                                    <span class="delivery-title">{{ $htgh->value }}</span>
                                                                    <div class="delivery-desc">
                                                                        {!! $htgh->description !!}
                                                                    </div>
                                                                    <!-- <div class="delivery-desc">Các địa chỉ khác: <b>30.000</b><sup>đ</sup></div> -->
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @endif
                                                </div>
                                                <div class="infomation-right">
                                                    <div class="infomation-item payment-method">
                                                        <h2 class="infomation-title">
                                                            <svg class="bi bi-wallet2" fill="currentColor" height="16" viewBox="0 0 16 16" width="16" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M12.136.326A1.5 1.5 0 0 1 14 1.78V3h.5A1.5 1.5 0 0 1 16 4.5v9a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 13.5v-9a1.5 1.5 0 0 1 1.432-1.499L12.136.326zM5.562 3H13V1.78a.5.5 0 0 0-.621-.484L5.562 3zM1.5 4a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-13z"></path>
                                                            </svg>
                                                            <span>Phương Thức Thanh Toán</span>
                                                        </h2>
                                                        <div class="infomation-content">
                                                            @if (isset($thanhtoan)&&$thanhtoan)
                                                                @foreach ($thanhtoan->childs()->orderby('order')->orderByDesc('created_at')->get() as $item)
                                                                    @if($loop->first)
                                                                    <div class="delivery-type-item">
                                                                        <input id="home" name="httt" type="radio" value="{{ $item->id }}" class="ng-untouched ng-pristine ng-valid" checked>
                                                                        <label class="radio" for="home"></label>
                                                                        <label for="home">
                                                                            <span class="delivery-title">{{ $item->name }}</span>
                                                                            <span class="delivery-desc">{!!  $item->description !!}</span>
                                                                        </label>
                                                                    </div>
                                                                    @else
                                                                    <div class="delivery-type-item">
                                                                        <input id="vnpay" name="httt" type="radio" value="{{ $item->id }}" class="ng-untouched ng-pristine ng-valid">
                                                                        <label class="radio" for="vnpay"></label><label for="vnpay">
                                                                            <span class="delivery-title">{{ $item->name }}</span>
                                                                            <span class="delivery-desc">{!!  $item->description !!}</span>
                                                                        </label>
                                                                    </div>
                                                                    @endif
                                                                @endforeach
                                                            @endif   
                                                        </div>
                                                    </div>
                                                    <div class="infomation-item discount">
                                                        <h2 class="infomation-title">
                                                            <svg class="bi bi-tags" fill="currentColor" height="16" viewBox="0 0 16 16" width="16" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M3 2v4.586l7 7L14.586 9l-7-7H3zM2 2a1 1 0 0 1 1-1h4.586a1 1 0 0 1 .707.293l7 7a1 1 0 0 1 0 1.414l-4.586 4.586a1 1 0 0 1-1.414 0l-7-7A1 1 0 0 1 2 6.586V2z"></path>
                                                                <path d="M5.5 5a.5.5 0 1 1 0-1 .5.5 0 0 1 0 1zm0 1a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3zM1 7.086a1 1 0 0 0 .293.707L8.75 15.25l-.043.043a1 1 0 0 1-1.414 0l-7-7A1 1 0 0 1 0 7.586V3a1 1 0 0 1 1-1v5.086z"></path>
                                                            </svg>
                                                            <span>Mã Giảm Giá</span>
                                                        </h2>
                                                        <div class="infomation-content">
                                                            <form action="" method="post" novalidate="" class="ng-untouched ng-pristine ng-valid">
                                                                <div class="cart-coupon-giftcard">
                                                                    <input class="input ng-untouched ng-pristine ng-valid" name="discount_name" placeholder="Nhập mã khuyến mãi">
                                                                    <button class="button-apply" type="button" value="Áp dụng"> Áp dụng </button>
                                                                </div>
                                                                
                                                            </form>
                                                            {{--<div class="view-promocode">Chọn hoặc nhập mã giảm giá</div>--}}
                                                        </div>
                                                    </div>
                                                    <div class="infomation-content">
                                                        <div class="customer-payment">
                                                            <div class="a-left"> Tạm tính: </div>
                                                            <div class="a-right"> {{ number_format($totalPrice) }}<sup>đ</sup></div>
                                                        </div>
                                                        {{--<div class="customer-payment">
                                                            <div class="a-left"> Chiết khấu: </div>
                                                            <div class="a-right"> 0<sup>đ</sup></div>
                                                        </div>
                                                        
                                                        <div class="customer-payment">
                                                            <div class="a-left"> Vận chuyển: </div>
                                                            <div class="a-right">
                                                                <span class="price">Vui lòng nhập địa chỉ</span>
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="customer-payment">
                                                            <div class="a-left"> Phụ phí: </div>
                                                            <div class="a-right"> +30.000<sup>đ</sup></div>
                                                        </div>
                                                        <div class="customer-payment">
                                                            <div class="a-left"> Điểm tích lũy: </div>
                                                            <div class="a-right"> 11.200 </div>
                                                        </div>--}}
                                                        <div class="customer-payment total-payment">
                                                            <div class="a-left"> Tiền phải trả: </div>
                                                            <div class="a-right"> {{ number_format($totalPrice) }}<sup>đ</sup></div>
                                                        </div>
                                                        
                                                    </div>
                                                </div>
                                                <div class="button-action-gr">
                                                    <div class="infomation-item">
                                                        <button class="button btn-continue lg-continue" type="button"> Tiếp tục mua sắm </button>
                                                        <button class="button btn-proceed-checkout" type="submit"> Đặt hàng </button>
                                                    </div>
                                                    
                                                    {{--<a class="cart-customer-review" href="https://customerreviews.google.com/v/merchant?q=vuahanghieu.com&amp;c=VN&amp;v=19&amp;hl=vi" target="_blank">
                                                        <div class="cart-customer-review-fbox" style="flex-wrap: wrap;">
                                                            <div>Khách hàng của chúng tôi đánh giá</div>
                                                            <div class="product-rating">
                                                                <div class="rating-star"></div>
                                                                <div class="rating-star"></div>
                                                                <div class="rating-star"></div>
                                                                <div class="rating-star"></div>
                                                                <div class="rating-star haft-star"></div>
                                                            </div>
                                                        </div>
                                                        <div class="cart-customer-review-sbox"> 4.5 / 5 dựa trên 247 lượt đánh giá trên <img alt="Đánh giá của khách hàng trên Google" class="cart-customer-review-item" height="20" src="https://asset.vuahanghieu.com/assets/images/google-reviews.svg" width="60"></div>
                                                    </a>
                                                    
                                                    <p class="cart-report-box" style="justify-content: center; width: 100%;">
                                                        <img alt="Báo lỗi" src="https://asset.vuahanghieu.com/assets/images/report-icon.svg">
                                                        <span>Bạn không đặt được hàng? Hãy <span class="link">thông báo</span> ngay cho chúng tôi.</span>
                                                    </p>--}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        </form>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script src="{{ asset('frontend/js/load-address.js') }}"></script>
<script>
    $(document).on('click', '.btn-colsap', function() {
        $('#list-thanhtoan').find('.active').removeClass('active');
        $(this).addClass('active');
        $(this).parent('.colsap').addClass('active');
        let value = $(this).parent('.colsap.active').data('value');
        $('#hinhthuc').val(value);
        console.log(value);
        $('#list-thanhtoan').find('.colsap:not(".active") .content-colsap').slideUp();
        $(this).parent('.colsap.active').find('.content-colsap').slideDown();
    });
    $("#chinhanh").change(function() {
        var id = $(this).val();
        if (id != "0") {
            $(".list-chinhanh #cn_" + id).addClass("active").siblings().removeClass("active");
        } else
            $(".list-chinhanh .item").removeClass("active");
    });
</script>
@endsection