@extends('frontend.layouts.main')
@section('title', __('contact.thong_tin_lien_he'))
@section('keywords', $seo['keywords'] ?? '')
@section('description', $seo['description'] ?? '')
@section('abstract', $seo['abstract'] ?? '')
@section('image', $seo['image'] ?? '')
@section('css')
    <style>
        .header {
            position: unset;
        }

        .main {
            margin-top: unset !important;
            background-color: #e6e6e6;
        }

        .header.fixed {
            position: fixed !important;
        }
    </style>
@endsection
@section('canonical')
    <link rel="canonical" href="{{ route('contact.index') }}" />
@endsection
@section('content')
    <div class="main">
        <div class="breadcrumbs clearfix">
            <div class="ctnr">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <ul>
                            <li class="breadcrumbs-item">
                                <a href="{{ makeLink('home') }}" title="{{ __('home.home') }}" style="color: #333">
                                    {{ __('home.home') }}
                                </a>
                            </li>
                            @isset($breadcrumbs, $typeBreadcrumb)
                                <li class="breadcrumbs-item">
                                    @foreach ($breadcrumbs as $item)
                                        @if ($loop->last)
                                            <a href="{{ makeLink($typeBreadcrumb, $item['id'] ?? '', $item['slug']) ?? '' }}"
                                                class="currentcat">{{ $item['name'] }}</a>
                                        @else
                                            <a
                                                href="{{ makeLink($typeBreadcrumb, $item['id'] ?? '', $item['slug']) ?? '' }}">{{ $item['name'] }}</a>
                                        @endif
                                    @endforeach
                                </li>
                            @endisset
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="group-tintuc-list">
            <div class="blog-group-lever2 blog-group">
                <div class="ctnr">
                    <div class="contact-temp-body">
                        <div class="row">
                            <div class="clm" style="--w-md: 5; --w-xs: 12;">
                                <div class="map">
                                    {!! $map->description ?? '' !!}
                                </div>
                            </div>
                            <div class="clm" style="--w-md: 7; --w-xs: 12;">
                                <div class="left-bot">
                                    <div class="ct-right">
                                        <h1>{{ $dataAddress->value ?? '' }}</h1>
                                        {!! $dataAddress->description ?? '' !!}
                                    </div>
                                </div>
                                <div class="left-bot">
                                    <div class="ct-left ct-right">
                                        <h1>Liên hệ với chúng tôi</h1>
                                        <p>{{ __('contact.title_contact') }}</p>
                                        <form action="{{ route('contact.storeAjax') }}"
                                            data-url="{{ route('contact.storeAjax') }}" data-ajax="submit02"
                                            data-target="alert" data-href="#modalAjax" data-content="#content"
                                            data-method="POST" method="POST" name="frm" id="frm">
                                            <input type="hidden" name="title" value="THÔNG TIN LIÊN HỆ">
                                            @csrf
                                            <input type="text" placeholder="Họ tên" name="name">
                                            <input type="text" placeholder="Email" name="email">
                                            <input type="text" placeholder="Số điện thoại" name="phone">
                                            <textarea name="content" placeholder="Nhập nội dung" id="noidung" cols="30" rows="5"></textarea>
                                            <button class="hvr-float-shadow">Gửi thông tin</button>
                                        </form>
                                    </div>
                                </div>
                                
                            </div>


                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="row">
                                    <div class="col-md-6 col-xs-12">
                                    
                                    </div>
                                    <div class="col-md-6 col-xs-12">
                                        
                                    
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
    <script>
        $(document).on('submit', "[data-ajax='submit02']", function(event) {
            event.preventDefault();
            console.log('Click');
            let myThis = $(this);
            let formValues = $(this).serialize();
            let dataInput = $(this).data();

            var nameVal = myThis.find('[name="name"]').val().trim();
            var emailVal = myThis.find('[name="email"]').val().trim();
            var phoneVal = myThis.find('[name="phone"]').val().trim();

            let isEmail = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
            let isPhone = /^\d{10,}$/;

            if (nameVal === '') {
                Swal.fire({
                    position: 'center',
                    icon: 'error',
                    title: 'Vui lòng nhập Tên!',
                    showConfirmButton: false,
                    timer: 1500
                });
                return false;
            }

            if (emailVal === '') {
                Swal.fire({
                    position: 'center',
                    icon: 'error',
                    title: 'Vui lòng nhập email!',
                    showConfirmButton: false,
                    timer: 1500
                });
                return false;
            } else if (!(isEmail.test(emailVal))) {
                Swal.fire({
                    position: 'center',
                    icon: 'error',
                    title: 'Vui lòng nhập email hợp lệ!',
                    showConfirmButton: false,
                    timer: 1500
                });
                return false;
            }

            if (phoneVal === '') {
                Swal.fire({
                    position: 'center',
                    icon: 'error',
                    title: 'Vui lòng nhập số điện thoại!',
                    showConfirmButton: false,
                    timer: 1500
                });
                return false;
            } else if (!(isPhone.test(phoneVal))) {
                Swal.fire({
                    position: 'center',
                    icon: 'error',
                    title: 'Vui lòng nhập số điện thoại hợp lệ!',
                    showConfirmButton: false,
                    timer: 1500
                });
                return false;
            }

            $.ajax({
                type: dataInput.method,
                url: dataInput.url,
                data: formValues,
                dataType: "json",
                success: function(response) {
                    if (response.code == 200) {
                        myThis.find('input:not([type="hidden"]), textarea:not([type="hidden"])').val(
                            '');
                        if (dataInput.content) {
                            $(dataInput.content).html(response.html);

                        }
                        if (dataInput.target) {
                            switch (dataInput.target) {
                                case 'modal':
                                    $(dataInput.href).modal();
                                    break;
                                case 'alert':
                                    Swal.fire({
                                        position: 'center',
                                        icon: 'success',
                                        title: response.html,
                                        showConfirmButton: false,
                                        timer: 1500
                                    });
                                default:
                                    break;
                            }
                        }
                    } else {
                        Swal.fire({
                            position: 'center',
                            icon: 'error',
                            title: response.html,
                            showConfirmButton: false,
                            timer: 1500
                        });
                    }
                },
                error: function(response) {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'error',
                        title: 'Gửi thông tin thấy bại',
                        showConfirmButton: false,
                        timer: 1500
                    });
                }
            });
            return false;
        });
    </script>
@endsection
