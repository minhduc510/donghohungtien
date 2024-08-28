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
                    <h3>{{ $contact->title }} TỪ WEBSITE</h3>
                    <ul>
                        @if($contact->name != "")
                        <li>Họ tên: {{ $contact->name }}</li>
                        @endif
                        @if($contact->email != "")
                        <li>Email: {{ $contact->email }}</li>
                        @endif
                        @if($contact->phone != "")
                        <li>Số điện thoại: {{ $contact->phone }}</li>
                        @endif
                        {!! $contact->content !!}
                    </ul>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
