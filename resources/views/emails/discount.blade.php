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
                    <h1>Thông tin mã giảm giá từ VITYSOLAR</h1>
                    <span>Bạn đã nhận được mã giảm giá. Nhanh chóng đặt hàng để được hưởng ưu đãi! (Số lượng có hạn)</span>
                    <ul>
                        <li>Mã: <a href="javascipt:;">{{ $discount->name }}</a></li>
                        <li>Giảm: {{ $discount->price_is_reduced }}đ</li>
                        <li>Mã giảm giá có hiệu lực từ {{ Illuminate\Support\Carbon::parse($discount->created_at)->format('d/m/Y')  }} đến {{ Illuminate\Support\Carbon::parse($discount->end_date)->format('d/m/Y')  }}</li>
                        {{--<li>Ngày bắt đầu: {{ Illuminate\Support\Carbon::parse($discount->created_at)->format('d/m/Y')  }}</li>
                        <li>Ngày kết thúc: {{ Illuminate\Support\Carbon::parse($discount->end_date)->format('d/m/Y')  }}</li>--}}
                    </ul>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
