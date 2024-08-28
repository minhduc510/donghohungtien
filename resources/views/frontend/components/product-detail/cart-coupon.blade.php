<div class="cart-coupon ">
    <div class="cart-coupon-header">
        <span class="coupon-toggle-btn" onclick="show_coupon()">
            <i class="fa fa-arrow-left "> </i>
        </span>
        <div class="title__cart_header">
            Mã giảm giá
            <small class="d-block">(Áp dụng ở trang thanh toán)</small>
        </div>
    </div>
    <div class="section__coupons">
        @include('frontend.components.product-detail.coupon__item')
        @include('frontend.components.product-detail.coupon__item')
        @include('frontend.components.product-detail.coupon__item')
        @include('frontend.components.product-detail.coupon__item')
        @include('frontend.components.product-detail.coupon__item')
        @include('frontend.components.product-detail.coupon__item')
        @include('frontend.components.product-detail.coupon__item')
    </div>
</div>
<div class="coupon-modal">
    <div class="modal__content__coupon">
        <button class="close__coupon__modal" onclick="coupon_modal_show()">
            <i class="ti-close"></i>
        </button>
        <h3 class="coupon-title">
            MÃ: ONLINE5
        </h3>
        <div class="code_coupon-row">
            <div class="coupon-label">Mã khuyến mãi:</div>
            <span class="code">ONLINE5</span>
        </div>
        <div class="condition_coupon-row">
            <div class="coupon-label">Điều kiện:</div>
            <div class="coupon-info">
                - Mã giảm 5% cho đơn hàng có giá trị tối thiểu 1 triệu <br>
                - Chỉ áp dụng cho đơn hàng mua online
            </div>
        </div>
        <div class="coupon-action flex flex-center-y flex-space-between">
            <button type="button" class="btn coupon__action__btn" onclick="coupon_modal_show()">Đóng</button>
            <button class="btn btn-main coupon__action__copy">
                <span>Sao chép</span>
            </button>
        </div>

    </div>
</div>
<div class="cart-coupon-overlay "></div>