<div class="customer-payment">
    <div class="a-left"> Tạm tính: </div>
    <div class="a-right"> {{ number_format($totalPrice) }}<sup>đ</sup></div>
</div>
@if(!empty($percent))
<div class="customer-payment">
    <div class="a-left"> Giảm giá: </div>
    <div class="a-right"> {{ number_format($percent) }}<sup>đ</sup></div>
</div>
@endif

<div class="customer-payment">
    <div class="a-left"> Vận chuyển: </div>
    <div class="a-right">
        @if($totalPrice>$free_ship)
        <span class="price">Miễn phí</span>
        @else
        <span class="price">{{ number_format($price_ship) }}<sup>đ</sup></span>
        @endif
    </div>
</div>
@guest
@else
<div class="customer-payment">
    <div class="a-left"> Điểm tích lũy: </div>
    <div class="a-right"> {{ number_format($point) }} </div>
</div>
@endguest
<div class="customer-payment total-payment">
    <div class="a-left"> Tiền phải trả: </div>
    <div class="a-right"> {{ number_format($totalPriceNew) }}<sup>đ</sup></div>
</div>