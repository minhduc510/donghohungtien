
<div class="box__info_product">
    <h2 class="title-product fw-700">
        {{$data['name']}}
    </h2>
    <div class="group-status">
        <span class="first_status">
            Thương hiệu:
            <span class="status_name">
                <a href="/collections/all?q=vendor.filter_key:(%22Maison 21G Paris%22)&amp;page=1&amp;view=grid" target="_blank" class="text-primary" title="Maison 21G Paris">
                    Maison 21G Paris
                </a>
            </span>
        </span>
        <span class="first_status">
            Mã sản phẩm:
            <a href="" class="status_name">{{$data['slug']}}</a>
        </span>
    </div>
    <div class="rating-box">
        <div class="rating-box-txt">Đánh giá:</div>
        {{-- @for ($data['price'])
            
        @endfor --}}
        <div class="product-rating">
            <!---->
            <i class="rating-star fa-solid fa-star rating-star-yellow"></i>
            <!---->
            <i class="rating-star fa-solid fa-star rating-star-yellow"></i>
            <!---->
            <i class="rating-star fa-solid fa-star rating-star-yellow"></i>
            <!---->
            <i class="rating-star fa-solid fa-star rating-star-yellow"></i>
            <!---->
            <i class="rating-star fa-solid fa-star rating-star-yellow"></i>
            <!---->
            <span class="rating-count">(99)</span>
        </div>
        <!---->
        <span class="write-review">Viết đánh giá</span>
    </div>
    <div class="waper_price">
        <div class="price_new">{{ number_format($data['price']) }} VND</div>
        <div class="price_old" style="display: none;">{{ number_format($data['price_old']) }} VND</div>
    </div>
    <div class="box_note">
        <h3 class="box_note_title fw-600">
            <i class="fa-solid fa-gift gift"></i>
            KHUYẾN MÃI - ƯU ĐÃI
        </h3>
        <ul class="box_note_ul">
            <li class="box_note_li">
                Ưu đãi đặt biệt khi mua cùng các sản phẩm Home Collection.
            </li>
            <li class="box_note_li">
                Ưu đãi đặt biệt khi mua cùng các sản phẩm Home Collection.
            </li>
            <li class="box_note_li">
                Ưu đãi đặt biệt khi mua cùng các sản phẩm Home Collection.
            </li>
            <li class="box_note_li">
                Ưu đãi đặt biệt khi mua cùng các sản phẩm Home Collection.
            </li>
        </ul>
    </div>
    <div class="product-coupon__wrapper my-3">
        <div class="product-coupon_title">Mã giảm giá</div>
        <div class="product-coupons">
            <div class="coupon_item">
                <div class="coupon_content">
                    ONLINE5
                </div>
            </div>
            <div class="coupon_item">
                <div class="coupon_content">
                    ONLINE5
                </div>
            </div>
            <div class="coupon_item">
                <div class="coupon_content">
                    ONLINE5
                </div>
            </div>
            <div class="coupon_item">
                <div class="coupon_content">
                    ONLINE5
                </div>
            </div>

        </div>
    </div>
    {{-- @dd($arrayAttribute) --}}
    @php
        $i = 1;
    @endphp
    @foreach ($arrayAttribute as $attribute)

        <div class="swatch__div">
            <div class="swatch">
                <div class="swatch__header">
                    <span class="swatch__header_name">
                        Mùi hương {{$i}}:
                    </span>
                    <div class="swatch-value">
                        Cashmere Wood
                    </div>
                </div>
                <ul class="swatch__list">
                    @php
                        $j = 1;
                    @endphp
                    @foreach ($attribute as $key1 => $item)
                        <li class="swatch__item">
                            <input type="radio" name="check__swtch_{{$i}}" 
                                @if(empty(request()->query('variant')))
                                    @if ($j == 1)
                                        checked="true"
                                    @endif
                                @else
                                    @if($i == 1)
                                        @if ($getCurrentVariant['attribute1'] == $item->id)
                                            checked="true"
                                        @endif
                                    @elseif($i == 2)
                                        @if ($getCurrentVariant['attribute2'] == $item->id)
                                            checked="true"
                                        @endif
                                    @endif
                                @endif
                            class="swatch__item__input" value="{{ $item->id }}">
                            <label class="swatch__item__label">
                                {{$item->name}}
                                <i class="fas fa-check icon_check"></i>
                            </label>
                        </li>
                        @php
                            $j++;
                        @endphp
                    @endforeach
                </ul>
            </div>
        </div>
        @php
            $i++;
        @endphp
    @endforeach
    
    <div class="form-product">
        <div class="form_button_details">
            <div class="form_product_content">
                <div class="soluong_type_1">
                    <div class="input_number_product">
                        <button class="button_qty button__qty__minus">
                            <i class="ti-minus"></i>
                        </button>
                        <input type="text" class="input_product" value="1">
                        <button class="button_qty button__qty__plus">
                            <i class="ti-plus"></i>
                        </button>
                    </div>
                    <div class="button_actions">
                        <button class="button_action">
                            THÊM VÀO GIỎ
                        </button>
                    </div>
                </div>
                <div class="button_buynow">
                    <button type="submit" class="buynow">MUA NGAY</button>
                </div>
                <p class="product-hotline mt-1 mb-0 text-center">
                    Gọi đặt mua <a class="link" href="tel:0393069720">0393069720</a> (10:00 - 21:00)
                </p>
            </div>
        </div>
    </div>
    <div class="product-policises-wrapper">
        <ul class="product-policises">
            <li class="media">
                <div class="media-icon">
                    <img data-src="{{ asset('frontend/images/policy_product_image_1.webp') }}" class="lazyload" alt="">
                </div>
                <div class="media-body">
                    Giao hàng toàn quốc
                </div>
            </li>
            <li class="media">
                <div class="media-icon">
                    <img data-src="{{ asset('frontend/images/policy_product_image_1.webp') }}" class="lazyload" alt="">
                </div>
                <div class="media-body">
                    Giao hàng toàn quốc
                </div>
            </li>
            <li class="media">
                <div class="media-icon">
                    <img data-src="{{ asset('frontend/images/policy_product_image_1.webp') }}" class="lazyload" alt="">
                </div>
                <div class="media-body">
                    Giao hàng toàn quốc
                </div>
            </li>
            <li class="media">
                <div class="media-icon">
                    <img data-src="{{ asset('frontend/images/policy_product_image_1.webp') }}" class="lazyload" alt="">
                </div>
                <div class="media-body">
                    Giao hàng toàn quốc
                </div>
            </li>
        </ul>
    </div>
</div>