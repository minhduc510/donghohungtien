<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Thông tin liên hệ</title>
</head>

<body>
    <div class="wrap-email">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h1>Thông tin mua hàng Website</h1>
                    <ul>
                        <li>Họ tên: {{ $transaction->name }}</li>
                        <li>Số điên thoại: {{ $transaction->phone }}</li>
                        {{-- <li>Số điện thoại nhận hàng: {{ $transaction->phone_order }}</li> --}}
                        <li>Địa chỉ: {{ $transaction->address_detail }} (nhân viên sẽ gọi xác nhận trước khi giao).</li>

                        {{-- <li>Địa chỉ: <br> {{ $transaction->address_detail }}, {{ $transaction->commune->name }}, {{ $transaction->district->name }}, {{ $transaction->city->name }} (nhân viên sẽ gọi xác nhận trước khi giao).</li> --}}
                        <li>Hình thức thanh toán: {{ optional($transaction->setting)->name }}
                            {{-- @if ($transaction->httt === 145)
                                Thanh toán khi nhận HÀNG
                            @elseif($transaction->httt === 146)
                                Thanh toán tiền mặt tại cửa hàng
                            @else
                                Thanh toán bằng thẻ ATM
                            @endif --}}
                        </li>
                    </ul>
                    <table border="1" cellpadding="5" cellspacing="0"
                        style="border-collapse: collapse; margin-top:0px " bordercolor="#9999CC"='#cc3300'=""
                        width="100%" bgcolor="#ffffff">
                        <tbody>
                            <tr>
                                <td width="10%" bgcolor="#eee" style="font-weight:bold">{{ __('home.hinh_anh') }}
                                </td>
                                <td bgcolor="#eee" style="font-weight:bold">{{ __('home.sp') }}</td>
                                <td bgcolor="#eee" style="font-weight:bold">{{ __('home.masp') }}</td>
                                <td width="15%" align="center" bgcolor="#eee" style="font-weight:bold">
                                    {{ __('home.don_gia') }}</td>
                                <td width="14%" align="center" bgcolor="#eee" style="font-weight:bold">
                                    {{ __('home.so_luong') }}</td>
                                <td width="9%" align="center" bgcolor="#eee" style="font-weight:bold">
                                    {{ __('home.thanh_tien') }}</td>

                            </tr>
                            {{-- @dd($transaction->orders()) --}}
                            
                            @foreach ($transaction->orders()->get() as $cartItem)
                            {{-- @dd($cartItem['totalPriceOneItem']) --}}
                                <tr height="30" class="pay-product">
                                    <td data-title="Hình ảnh" bgcolor="#FFFFFF"><img
                                            src="{{ asset($cartItem->avatar_path) }}" alt="{{ $cartItem->name }}"
                                            height="40"></td>
                                    <td data-title="Sản phẩm" bgcolor="#FFFFFF">{{ $cartItem->name }}</td>
                                    <td data-title="Mã sản phẩm" bgcolor="#FFFFFF">{{ $cartItem->product->masp }}</td>
                                    <td data-title="Đơn giá" bgcolor="#FFFFFF" align="center">
                                        {{ number_format($cartItem->product->price) }} VNĐ</td>
                                    <td data-title="Số lượng" bgcolor="#FFFFFF" align="center">
                                        {{ $cartItem->quantity }}</td>
                                    <td data-title="Thành tiền" align="center" bgcolor="#FFFFFF">
                                        <strong>{{ number_format($cartItem->new_price) }}
                                            VNĐ</strong></td>
                                </tr>
                            @endforeach
                            <tr>
                                <td colspan="4" class="chu_noidung">{{ __('home.tong_tien') }}:</td>
                                <td colspan="2" align="center" style="font-weight:bold; color:#F00; font-size:14px">
                                    {{ number_format($transaction->total) }} VNĐ</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
