@extends('frontend.layouts.main')
@section('title', 'Trang chủ')
@section('css')
   <style>
       .btn-light{
            color: #fff;
            text-decoration: none;
            text-transform: uppercase;
            background-color: #a3a3a3;
       }

       .cart-content-box{
            padding-top: 50px;
       }

       .section_cart .info-prod-cart-box{
            margin-top: 0;
       }
   </style>
@endsection

@section('content')
    <div class="content-wrapper section_cart">
        <div class="main">

            <div class="bg-cart-color">
                <div class="ctnr container-cart">
                    <div class="row">
                        <div class="col-sm-12">
                            @if(session('error'))
                            <div class="alert alert-warning">
                                {{session("error")}}
                            </div>
                            @endif
                            <div class="panel panel-danger">
                                <div class="cart-wrapper">
                                    <div class="wrap-cart-step-1">
                                        <form id="regForm" action="{{ route('cart.order.submit') }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="step_order step_order1">
                                                <div class="cart-content-box">
                                                    <div class="col-sm-12 col-12">
                                                        <div class="row">
                                                            <div class="col-12 col-sm-12 col-md-8 col-cart-left">
                                                                <div class="step-buy-box">
                                                                    <div class="box-step-buy">
                                                                        <div class="box-step">
                                                                            <span class="active">1</span>
                                                                            <div class="step-items">{{ __('home.dien_thong_tin') }}</div>
                                                                        </div>
                                                                        <div class="box-step">
                                                                            <span class="">2</span>
                                                                            <div class="step-items">{{ __('home.chon_thanh_toan') }}</div>
                                                                        </div>
                                                                        <div class="box-step last-step">
                                                                            <span class="">3</span>
                                                                            <div class="step-items">{{ __('home.hoan_thanh') }}</div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-register-edit">
                                                                    <div class="row">
                                                                        <div class="col-12 ">
                                                                            <label>{{ __('home.ho_ten') }}</label>
                                                                            <input class="form-input-register @error('name')is-invalid @enderror" type="text" name="name" required>
                                                                            @error('name')
                                                                                <div class="invalid-feedback">{{ $message }}</div>
                                                                            @enderror
                                                                        </div>
                                                                        <div class="col-12 ">
                                                                            <label>{{ __('home.dia_chi') }}*</label>
                                                                            <input  class="form-input-register @error('address_detail')is-invalid @enderror" type="text" name="address_detail" placeholder="" required>
                                                                            @error('address_detail')
                                                                                <div class="invalid-feedback">{{ $message }}</div>
                                                                            @enderror
                                                                        </div>
                                                                        <div class="col-12">
                                                                            <label>{{ __('home.sdt') }}</label>
                                                                            <input id="phone" type="tel" pattern="^(0|\+84)[3|5|7|8|9][0-9]{8}$" class="form-input-register" name="phone" required>
                                                                            <div id="error-message" class="error-message"></div> <!-- Thông báo lỗi -->
                                                                        </div>
                                                                        @if($discount->count()>0)
                                                                            <div class="col-sm-12">
                                                                                <label>Mã giảm giá (nếu có)</label>
                                                                                <input type="text" class="form-control" id="" name="discount_name" placeholder="Nhập mã giảm giá (nếu có)">
                                                                            </div>
                                                                            <div class="col-sm-12">
                                                                                @if(session('error'))
                                                                                    <div class="invalid-feedback" style="display: block;">{{session("error")}}</div>
                                                                                @endif
                                                                            </div>
                                                                        @endif
                                                                        <div class="col-12 ">
                                                                            <label>{{ __('home.ghi_chu') }}</label>
                                                                            <textarea name="note" id="" cols="" rows="5" placeholder="Ghi chú về đơn hàng, ví dụ: thời gian hay chi dẫn địa chỉ giao hàng chi tiết"></textarea>
                                                                        </div>
                                                                        
                                                                    </div>
                                                                   
                                                                    {{-- <div class="row">
                                                                        <div class="col-12 col-sm-12 col-md-6">
                                                                            <label>Tỉnh/ Thành phố</label>
                                                                            <select name="city_id" id="city" class="form-input-register @error('city_id') is-invalid   @enderror"  data-url="{{ route('ajax.address.districts') }}" required="required">
                                                                                <option value="">Chọn tỉnh/ Thành phố</option>
                                                                                {!! $cities !!}
                                                                            </select>
                                                                            @error('city_id')
                                                                                <div class="invalid-feedback">{{ $message }}</div>
                                                                            @enderror
                                                                        </div>
                                                                        <div class="col-12 col-sm-12 col-md-6">
                                                                            <label>Quận/ Huyện</label>
                                                                            <select name="district_id" id="district" class="form-input-register  @error('district_id') is-invalid @enderror"  data-url="{{ route('ajax.address.communes') }}"  required="required">
                                                                                <option value="">Chọn quận/ huyện</option>
                                                                            </select>
                                                                            @error('district_id')
                                                                                <div class="invalid-feedback">{{ $message }}</div>
                                                                            @enderror
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-12 col-sm-12 col-md-6">
                                                                            <label>Phường/ Xã</label>
                                                                            <select name="commune_id" id="commune" class="form-input-register @error('commune_id')is-invalid   @enderror" required="required">
                                                                                <option value="">Chọn xã/phường/thị trấn</option>
                                                                            </select>
                                                                            @error('commune_id')
                                                                                <div class="invalid-feedback">{{ $message }}</div>
                                                                            @enderror
                                                                        </div>
                                                                        <div class="col-12 col-sm-12 col-md-6">
                                                                            <label>Địa chỉ chi tiết</label>
                                                                            <input class="form-input-register @error('address_detail')is-invalid @enderror" type="text" name="address_detail" placeholder="Số nhà/ đường phố">
                                                                            @error('address_detail')
                                                                                <div class="invalid-feedback">{{ $message }}</div>
                                                                            @enderror
                                                                        </div>
                                                                    </div> --}}
                                                                    {{--<div class="your-cart">
                                                                        <div class="your-cart-title">Giỏ hàng của bạn</div>
                                                                        @if(count($data)>0)
                                                                        @foreach($data as $cartItem)
                                                                        <div class="your-cart-main">
                                                                            <img src="{{ $cartItem['avatar_path'] }}" alt="{{ $cartItem['name'] }}">
                                                                            <div class="your-cart-content">{{ $cartItem['name'] }}</div>
                                                                        </div>
                                                                        @endforeach
                                                                        @endif
                                                                    </div>--}}
                                                                </div>
                                                            </div>

                                                            <div class="col-12 col-sm-12 col-lg-4 col-cart-right">
                                                                <div class="info-prod-cart-box">
                                                                    <div class="info-cart-title">
                                                                        {{ __('home.tomtat') }}
                                                                    </div>
                                                                    @foreach($data as $cartItem)
                                                                    <div class="value-pro ">
                                                                        <span class="label">{{ $cartItem['name'] }} x {{ $cartItem['quantity'] }}</span>
                                                                        <span class="price-value"><span>{{ number_format($cartItem['totalPriceOneItem']) }}</span><span class="unit">₫</span></span>
                                                                    </div>
                                                                    @endforeach
                                                                    

                                                                    {{--@if(isset ($cartItem['totalOldPriceOneItem']) && $cartItem['totalOldPriceOneItem']>0 )
                                                                    <div class="value-pro">
                                                                        <span class="label">Tổng tiền trước giảm</span>
                                                                        <span class="price-value"><span>{{ number_format($totalOldPrice)}}</span><span class="unit">₫</span></span>
                                                                    </div>
                                                                    @endif--}}
                                                                    <div class="value-pro ">
                                                                        <span class="label">{{ __('home.tonggia') }}</span>
                                                                        <span class="price-value  last-value"><span>{{ number_format($totalPrice) }}</span><span class="unit">₫</span></span>
                                                                    </div>
                                                                    <div class="sp-pay-box">
                                                                        <div class="sp-pay-title">{{ __('home.hotro') }}</div>
                                                                        <ul>
                                                                            <li>
                                                                                <span>{{ __('home.thanhtoankhi') }}</span>
                                                                            </li>
                                                                            {{--
                                                                            <li>
                                                                                <span>Thanh toán tại cửa hàng</span>
                                                                            </li>
                                                                            --}}
                                                                            <li>
                                                                                <span>{{ __('home.thanhtoanbang') }}</span>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                    {{--@if(isset ($cartItem['totalOldPriceOneItem']) && $cartItem['totalOldPriceOneItem'] > $cartItem['totalPriceOneItem'] )
                                                                    <div class="value-pro">
                                                                        <span class="label">Giảm giá</span>
                                                                        <span class="price-value">Giảm <span>{{ number_format($totalOldPrice - $totalPrice) }}</span><span class="unit">₫</span></span>
                                                                    </div>
                                                                    @endif--}}


                                                                    <div class="value-pro free-ship">
                                                                        <div class="label">{{ __('home.giao_hang') }}</div>
                                                                        <div class="free">{{ __('home.mien_phi') }}</div>
                                                                    </div>
                                                                    {{-- <div class="value-total-pro">
                                                                        <div class="label-total">Tổng đơn đặt hàng</div>
                                                                        <div class="total-value"><span>{{ number_format($cartItem['totalPriceOneItem']) }}</span><span class="unit">₫</span></div>
                                                                    </div> --}}
                                                                    <div class="neext-step-box">
                                                                        <button onclick="validatePhoneNumber()" class="change_step2" type="submit">{{ __('home.tienthanh') }}</button>
                                                                    </div>
                                                                    
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="step_order step_order2">
                                                <div class="cart-content-box">
                                                    <div class="col-sm-12 col-12">
                                                        <div class="row">
                                                            <div class="col-12 col-sm-12 col-md-8 col-cart-left">

                                                                <div class="step-buy-box">
                                                                    <div class="box-step-buy">
                                                                        <div class="box-step">
                                                                            <span class="">1</span>
                                                                            <div class="step-items">Điền thông tin giao hàng</div>
                                                                        </div>
                                                                        <div class="box-step">
                                                                            <span class="active">2</span>
                                                                            <div class="step-items">Chọn thanh toán</div>
                                                                        </div>
                                                                        <div class="box-step last-step">
                                                                            <span class="">3</span>
                                                                            <div class="step-items">Hoàn thành đơn hàng</div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                {{--
                                                                <div class="form-pay">
                                                                    <div class="container-pay">
                                                                        <div class="pay-item">
                                                                            <select>
                                                                                <option value="">Thanh toán khi nhận hàng</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="pay-item">
                                                                            <select>
                                                                                <option value="">Thanh toán tại cửa hàng</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="pay-item">
                                                                            <select>
                                                                                <option value="">Thanh toán bằng thẻ ATM</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                --}}
                                                                <div class="col-md-12 ol-sm-12 col-xs-12 col-12">
                                                                    <div class="row">
                                                                         {{--<div class="col-md-12 col-sm-12 col-xs-12 col-12">

                                                                            @if (isset($vanchuyen)&&$vanchuyen)
                                                                            <h2 class="title-cart">
                                                                                {{ $vanchuyen->name }}
                                                                            </h2>
                                                                            <div class="desc-collapse">
                                                                                {!!  $vanchuyen->description !!}
                                                                            </div>
                                                                            @endif
                                                                            <h2 class="title-cart">
                                                                                {{ $thanhtoan->name }}
                                                                            </h2>
                                                                            @if (isset($thanhtoan)&&$thanhtoan)
                                                                            <input type="hidden"  name="httt" id="hinhthuc" required value="{{ optional($thanhtoan->childs()->orderby('order')->orderByDesc('created_at')->first())->id }}">
                                                                            @endif
                                                                            <div id="list-thanhtoan">
                                                                                @if (isset($thanhtoan)&&$thanhtoan)
                                                                                    @foreach ($thanhtoan->childs()->orderby('order')->orderByDesc('created_at')->get() as $item)

                                                                                    <div class="card colsap @if ($loop->first) active @endif" data-value='{{ $item->id }}'>
                                                                                        <div class="card-header btn-colsap @if ($loop->first) active @endif">
                                                                                            {{ $item->name }}
                                                                                        </div>
                                                                                        
                                                                                        <div class="card-body content-colsap">
                                                                                            {!!  $item->description !!}
                                                                                        </div>
                                                                                       
                                                                                    </div>
                                                                                    @endforeach
                                                                                @endif
                                                                            </div>
                                                                        </div> --}}
    <div class="col-md-12 col-sm-12 col-xs-12 col-12">
        
        <div id="list-thanhtoan">
            @if (isset($thanhtoan)&&$thanhtoan)
                @foreach ($thanhtoan->childs()->where('active', 1)->orderby('order')->orderByDesc('created_at')->get() as $item)
                    <div class="card colsap @if ($loop->first) active @endif" data-value='{{ $item->id }}'>
                        <div class="card-header btn-colsap @if ($loop->first) active @endif">
                            {{ $item->name }}
                        </div>
                        @if(count($item->childs)>0)
                        <div class="card-body content-colsap">
                           
                            @isset($item)
                                @foreach($item->childs()->where('active', 1)->orderBy('order')->get() as $child)
                                <li>
                                    <div class="input-check">
                                        <input type="radio" name="cn" value="{{$child->id}}" class="checkbox-round">
                                    </div>
                                    @if($child->image_path)
                                        <div class="image">
                                            <img src="{{asset($child->image_path)}}" alt="">
                                        </div>
                                    @endif
                                    <div class="desc">
                                        <h3>{{$child->name}}</h3>
                                        <p>{{$child->value}}</p>
                                    </div>
                                </li>
                                @endforeach
                                <li>Lưu ý khi chuyển khoản: Nội dung chuyển khoản ghi rõ tên hoặc số điện thoại</li>
                            @endisset
                        </div>
                        @endif
                    </div>
                @endforeach
            @endif
        </div>
        @if (isset($thanhtoan)&&$thanhtoan)
        <input type="hidden"  name="httt" id="hinhthuc" required value="{{ optional($thanhtoan->childs()->orderby('order')->orderByDesc('created_at')->first())->id }}">
        @endif
    </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-12 col-sm-12 col-lg-4 col-cart-right">
                                                                <div class="info-prod-cart-box">
                                                                    <div class="info-cart-title">
                                                                        Tóm tắt đơn hàng
                                                                    </div>

                                                                    <div class="value-pro ">
                                                                        <span class="label">Tổng giá trị đơn hàng</span>
                                                                        <span class="price-value  last-value"><span>{{ number_format($totalPrice) }}</span><span class="unit">₫</span></span>
                                                                    </div>
                                                                    <div class="sp-pay-box">
                                                                        <div class="sp-pay-title">Hỗ trợ thanh toán</div>
                                                                        <ul>
                                                                            <li>
                                                                                <span>Thanh toán khi nhận hàng/Thanh toán sau</span>
                                                                            </li>
                                                                            {{--
                                                                            <li>
                                                                                <span>Thanh toán tại cửa hàng</span>
                                                                            </li>
                                                                            --}}
                                                                            <li>
                                                                                <span>Thanh toán bằng thẻ ATM/mã QR/Ví điện tử</span>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                    {{--@if(isset ($cartItem['totalOldPriceOneItem']) && $cartItem['totalOldPriceOneItem'] > $cartItem['totalPriceOneItem'] )
                                                                    <div class="value-pro">
                                                                        <span class="label">Giảm giá</span>
                                                                        <span class="price-value">Giảm <span>{{ number_format($totalOldPrice - $totalPrice) }}</span><span class="unit">₫</span></span>
                                                                    </div>
                                                                    @endif--}}


                                                                    <div class="value-pro free-ship">
                                                                        <div class="label">Giao hàng (Miễn phí vận chuyển)</div>
                                                                        <div class="free">Miễn phí</div>
                                                                    </div>
                                                                    <div class="neext-step-box">
                                                                        <button type="submit">Đặt hàng</button>
                                                                    </div>
                                                                    <div class="sp-pay-box">
                                                                        <div class="sp-pay-title">Hỗ trợ thanh toán</div>
                                                                        <ul>
                                                                            <li>
                                                                                <span>Thanh toán khi nhận hàng/Thanh toán sau</span>
                                                                            </li>
                                                                            <li>
                                                                                <span>Thanh toán tại cửa hàng</span>
                                                                            </li>

                                                                            <li>
                                                                                <span>Thanh toán bằng thẻ ATM/mã QR/Ví điện tử</span>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
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
            </div>
        </div>
    </div>
@endsection

@section('js')
<script src="{{ asset('frontend/js/load-address.js') }}"></script>
{{-- <script>
    $(document).on('click','.btn-colsap',function(){
        $('#list-thanhtoan').find('.active').removeClass('active');
        $(this).addClass('active');
        $(this).parent('.colsap').addClass('active');
        let value= $(this).parent('.colsap.active').data('value');
        $('#hinhthuc').val(value);
        console.log(value);
        $('#list-thanhtoan').find('.colsap:not(".active") .content-colsap').slideUp();
            $(this).parent('.colsap.active').find('.content-colsap').slideDown();
    });
    $("#chinhanh").change(function () {
        var id = $(this).val();
        if (id != "0") {
            $(".list-chinhanh #cn_" + id).addClass("active").siblings().removeClass("active");
        }
        else
            $(".list-chinhanh .item").removeClass("active");
    });

    $(document).on('click', '.change_step2', function () {
        var phoneNumber = $("input[name='phone']").val();
        var phonePattern = /^(0|\+84)[3|5|7|8|9][0-9]{8}$/;
        var msg = "";

        if ($("input[name='name']").val() == '' || 0) {
            msg += "+ Vui lòng nhập họ tên \n";
        }

        if ($("input[name='phone_order']").val() == '') {
            msg += "+ Vui lòng nhập số điện thoại người đặt hàng \n";
        }

        if ($("input[name='phone']").val() == '') {
            msg += "+ Vui lòng nhập số điện thoại người nhận hàng \n";
        }
        if (phoneNumber == '') {
            msg += "+ Vui lòng nhập số điện thoại người nhận hàng\n";
        } else if (!phonePattern.test(phoneNumber)) {
            msg += "+ Số điện thoại không hợp lệ. Vui lòng kiểm tra lại định dạng.\n";
        }

        if ($("[name='city_id']").val() == '') {
            msg += "+ Vui lòng chọn tỉnh/thành phố \n";
        }

        if ($("[name='district_id']").val() == '') {
            msg += "+ Vui lòng chọn quận huyện \n";
        }

        if ($("[name='commune_id']").val() == '') {
            msg += "+ Vui lòng chọn phường xã \n";
        }

        if ($("input[name='address_detail']").val() == '') {
            msg += "+ Bạn đang để trống địa chỉ chi tiết \n";
        }

        if (msg != "") {
            alert("Vui lòng nhập đầy đủ thông tin các thông tin sau:\n" + msg);
            return false; // Ngăn chặn chuyển tiếp nếu thông tin không hợp lệ
        } else {
            $('.wrap-cart-step-1').addClass('active');
        }
    });


</script> --}}
@endsection
