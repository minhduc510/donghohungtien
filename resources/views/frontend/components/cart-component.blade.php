@php
    $unit = 'đ';
@endphp
<div class="cart-wrapper">
    <table border="1" cellpadding="5" cellspacing="0" bordercolor="#d2d2d2" width="100%" bgcolor="#ffffff">
        <tbody>
            <tr>
                <td width="10%"><strong>Hình ảnh</strong></td>
                <td><b>Sản phẩm</b></td>
                <td><b>Mã sản phẩm</b></td>
                <td width="13%" align="center"><b>Đơn giá</b></td>
                <td width="18%" align="center"><b>Số lượng</b></td>
                <td width="13%" colspan="2" align="center"><b>Thành tiền</b></td>
                <td width="7%" align="center"><b>Xóa</b></td>
            </tr>
            @foreach ($data as $cartItem)
                <tr height="30" class="cart-item">
                    <td bgcolor="#FFFFFF"><img src="{{ $cartItem['avatar_path'] }}" alt="{{ $cartItem['name'] }}"
                            height="40"></td>
                    <td bgcolor="#FFFFFF"><a target="_blank" href="{{ $cartItem['slug'] }}">{{ $cartItem['name'] }}</a>
                    </td>
                    <td bgcolor="#FFFFFF" align="center"><strong>{{ $cartItem['masp'] }}</strong></td>
                    <td bgcolor="#FFFFFF" align="center"><strong>{{ number_format($cartItem['price']) }}đ</strong></td>
                    <td class="cart-quantity" bgcolor="#FFFFFF" align="center" style="height:40px !important">
                        <div class="count quantity-cart">
                            <div class="uk-position-relative  box-quantity">
                                <span class="prev-cart btn abate" id="btncart"></span>

                                <input class="quantity number-cart bk-product-qty"
                                    data-url="{{ route('cart.update', ['id' => $cartItem['id'], 'option' => $cartItem['option_id']]) }}"
                                    value="{{ $cartItem['quantity'] }}" type="text" id="" name="quantity"
                                    disabled="disabled">
                                <span class="next-cart btn augment" id="btncart"></span>

                            </div>
                        </div>
                    </td>
                    <td colspan="2" align="center" bgcolor="#FFFFFF"><span>
                            &nbsp;{{ number_format($cartItem['price'] * $cartItem['quantity']) }}đ</span></td>
                    <td bgcolor="#FFFFFF" align="center">
                        <a data-url="{{ route('cart.remove', ['id' => $cartItem['id'], 'option' => $cartItem['option_id']]) }}"
                            class="remove-cart"> <i class="fa fa-trash" aria-hidden="true"></i></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
