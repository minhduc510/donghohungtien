<div class="footer-container">
    <div class="footer-before">
        <div class="ctnr">
            @isset($footer['email'])
                <div class="block_newsletter">
                    <div class="title">
                        <h4 class="block_title ">{{ $footer['email']->name }}</h4>
                        <span>{{ $footer['email']->value }}</span>
                    </div>
                    <div class="block_content">
                        <form action="{{ route('contact.storeAjax') }}" data-url="{{ route('contact.storeAjax') }}"
                            data-ajax="submit" data-target="alert" data-href="#modalAjax" data-content="#content"
                            data-method="POST" method="POST">
                            <div class="input-wrapper">
                                @csrf
                                <input name="email" type="email" value="" placeholder="Nhập email của bạn">
                                <button class="btn btn-primary" name="submitNewsletter" type="submit"
                                    value="Subscribe">Đăng ký</button>
                            </div>
                        </form>
                    </div>
                </div>
            @endisset
        </div>
    </div>
</div>

<section class="footer-top">
    <div class="ctnr">
        <div class="row">
            <div class="clm" style="--w-lg:4;--w-md:6;--w-xs:12">
                <div class="box-footer-tops">
                    @isset($footer['contact_info'])
                        <ul>
                            <li class="hedding-footer ">{{ $footer['contact_info']->value }}</li>
                            <li>
                                <div class="name_company">
                                    {!! $footer['contact_info']->description !!}
                                    <br>
                                    @isset($footer['ministry_trade'])
                                        <div class="chung_nhan">
                                            {!! $footer['ministry_trade']->description !!}
                                        </div>
                                    @endisset
                                </div>
                            </li>
                        </ul>
                    @endisset

                </div>
            </div>
            <div class="clm" style="--w-lg:3;--w-md:6;--w-xs:12">
                @isset($footer['introduce_buy'])
                    <div class="box-footer-keyper">
                        <h3>{{ $footer['introduce_buy']->name }}</h3>
                        @if ($footer['introduce_buy']->posts()->where('active', 1)->count() > 0)
                            <ul>
                                @foreach ($footer['introduce_buy']->posts()->where('active', 1)->get() as $item)
                                    <li><a href="{{ $item->slug }}" title="{{ $item->name }}">
                                            <i class="fa fa-angle-right" aria-hidden="true"></i> {{ $item->name }}</a>
                                    </li>
                                @endforeach

                            </ul>
                        @endif
                    </div>
                @endisset
            </div>
            @isset($footer['links'])
                <div class="clm" style="--w-lg:2;--w-md:6;--w-xs:12">
                    <div class="box-footer-keyper footer-social">
                        <h3>{{ $footer['links']->name }}</h3>
                        @if ($footer['links']->childs()->where('active', 1)->orderBy('order', 'asc')->count() > 0)
                            <ul>
                                @foreach ($footer['links']->childs()->where('active', 1)->orderBy('order', 'asc')->get() as $item)
                                    <li><a href="{{ $item->slug }}" target="_blank">
                                            @if ($item->value)
                                                {!! $item->value !!}
                                            @else
                                                <img src="{{ asset($item->image_path) }}" alt="{{ $item->name }}">
                                            @endif
                                            <span>{{ $item->name }}</span>
                                        </a></li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                </div>
            @endisset
            <div class="clm" style="--w-lg:3;--w-md:6;--w-xs:12">
                @isset($footer['map'])
                    <div class="box-footer-keyper">
                        <h3>{{ $footer['map']->name }}</h3>
                        <div class="box_address">
                            <div class="name_company">
                                {!! $footer['map']->description !!}
                            </div>
                        </div>
                    </div>
                @endisset
            </div>
        </div>
    </div>
    <div class="ctnr-fluid">
        <div class="row">
            <div class="clm" style="--w-lg:12;--w-md:12;--w-xs:12">
                <div class="multi-lines-box margin-b100">
                    <div class="multi-lines"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="ctnr">
        <div class="row">
            <div class="clm " style="--w-lg:8;--w-md:12;--w-xs:12">
                <div class="box-footer-brand">
                    <h3>Thương hiệu</h3>
                    @if ($footer['brands']->count() > 0)
                        <ul>
                            @foreach ($footer['brands'] as $item)
                                <li><a href="{{ route('home.index') }}/?brands={{ $item->id }}"
                                        title="{{ $item->name }}"><i class="fa fa-angle-right"
                                            aria-hidden="true"></i> {{ $item->name }}</a></li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>
            <div class="clm" style="--w-lg:4">
                @isset($footer['fanpage_facebook'])
                    <div class="box-footer-keyper">
                        <h3>{{ $footer['fanpage_facebook']->name }}</h3>
                    </div>
                    <div class="item-facebook">
                        <iframe src="{{ $footer['fanpage_facebook']->value }}" width="340" height="500"
                            style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true"
                            allow="encrypted-media">
                        </iframe>
                    </div>
                @endisset
            </div>
        </div>
    </div>
</section>


@if (isset($footer['lienhe']) && count($footer['lienhe']->childs) > 0)
    <div id="button-contact-vr">
        <div id="gom-all-in-one">
            @foreach ($footer['lienhe']->childs()->where('active', 1)->orderBy('order')->get() as $item)
                @if ($item->order == 3)
                    <div id="zalo-vr" class="button-contact">
                        <div class="phone-vr">
                            <div class="phone-vr-circle-fill"></div>
                            <div class="phone-vr-img-circle">
                                <a href="{{ $item->slug }}">
                                    <img src="{{ asset($item->image_path) }}" alt="{{ $item->name }}">
                                </a>
                            </div>
                        </div>
                    </div>
                @elseif($item->order == 2)
                    <div id="viber-vr" class="button-contact">
                        <div class="phone-vr">
                            <div class="phone-vr-circle-fill"></div>
                            <div class="phone-vr-img-circle">
                                <a href="{{ $item->slug }}">
                                    <img src="{{ asset($item->image_path) }}" alt="{{ $item->name }}">
                                </a>
                            </div>
                        </div>
                    </div>
                @elseif($item->order == 1)
                    <div id="phone-vr" class="button-contact">
                        <div class="phone-vr">
                            <div class="phone-vr-circle-fill"></div>
                            <div class="phone-vr-img-circle">
                                <a href="{{ $item->slug }}">
                                    <img src="{{ asset($item->image_path) }}" alt="{{ $item->name }}">

                                </a>
                            </div>
                        </div>
                        @foreach ($footer['lienhe']->childs()->where('active', 1)->orderBy('order')->get() as $item)
                            @if ($item->order == 1)
                                <span>{{ $item->value }}</span>
                            @endif
                        @endforeach
                    </div>
                @endif
            @endforeach
        </div>
    </div>
@endif

<div class="fix-footer">
    <div class="ctnr">
        <div class="fix-footer-body">
            <div class="row">
                <div class="clm" style="--w-xs: 3;">
                    <div class="fix-footer-box">
                        <a href="{{ makelink('home') }}" class="d-block ta-center">
                            <div class="box-icon-menu-figex">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 576 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                    <path
                                        d="M575.8 255.5c0 18-15 32.1-32 32.1l-32 0 .7 160.2c0 2.7-.2 5.4-.5 8.1l0 16.2c0 22.1-17.9 40-40 40l-16 0c-1.1 0-2.2 0-3.3-.1c-1.4 .1-2.8 .1-4.2 .1L416 512l-24 0c-22.1 0-40-17.9-40-40l0-24 0-64c0-17.7-14.3-32-32-32l-64 0c-17.7 0-32 14.3-32 32l0 64 0 24c0 22.1-17.9 40-40 40l-24 0-31.9 0c-1.5 0-3-.1-4.5-.2c-1.2 .1-2.4 .2-3.6 .2l-16 0c-22.1 0-40-17.9-40-40l0-112c0-.9 0-1.9 .1-2.8l0-69.7-32 0c-18 0-32-14-32-32.1c0-9 3-17 10-24L266.4 8c7-7 15-8 22-8s15 2 21 7L564.8 231.5c8 7 12 15 11 24z" />
                                </svg>
                            </div>
                            <span class="d-block">
                                Trang chủ
                            </span>
                        </a>
                    </div>
                </div>
                @if (isset($footer['social_media']) && count($footer['social_media']->childs) > 0)
                    @foreach ($footer['social_media']->childs()->where('active', 1)->orderBy('order', 'asc')->get() as $item)
                        <div class="clm" style="--w-xs: 3;">
                            <div class="fix-footer-box">
                                <a href="{{ $item->slug }}" class="d-block ta-center">
                                    <div class="box-icon-menu-figex">
                                        <img src="{{ asset($item->image_path) }}" alt="{{ $item->name }}">
                                    </div>
                                    <span class="d-block">
                                        {{ $item->name }}
                                    </span>
                                </a>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</div>




@isset($footer['social_media'])
    <div id="button-contact-vr">
        @if ($footer['social_media']->childs()->where('active', 1)->count() > 0)
            <div id="gom-all-in-one">
                @foreach ($footer['social_media']->childs()->where('active', 1)->orderBy('order', 'asc')->get() as $item)
                    <div id="phone-vr" class="button-contact">
                        <div class="phone-vr">
                            <div class="phone-vr-circle-fill"></div>
                            <div class="phone-vr-img-circle">
                                <a href="{{ $item->slug }}">
                                    <img src="{{ asset($item->image_path) }}" alt="{{ $item->name }}">
                                </a>
                            </div>
                        </div>
                        @if ($item->id == 117)
                            <span>{{ $item->value }}</span>
                        @endif
                    </div>
                @endforeach
                {{-- <div id="viber-vr" class="button-contact">
                    <div class="phone-vr">
                        <div class="phone-vr-circle-fill"></div>
                        <div class="phone-vr-img-circle">
                            <a href="https://zalo.me/0912219033">
                                <img src="https://demo19.bivaco.net/storage/photos/zalo_1721007910.webp" alt="Zalo">
                            </a>
                        </div>
                    </div>
                </div>
                <div id="zalo-vr" class="button-contact">
                    <div class="phone-vr">
                        <div class="phone-vr-circle-fill"></div>
                        <div class="phone-vr-img-circle">
                            <a href="https://m.me/">
                                <img src="https://demo19.bivaco.net/storage/photos/messg_1721007940.webp" alt="Messenger">
                            </a>
                        </div>
                    </div>
                </div> --}}
            </div>
        @endif
    </div>
@endisset
<div class="back_to_top" id="back-to-top">
    <a onclick="scrollToTop();">
        <img src="https://demo18.largevendor.com/frontend/images/icon_back_to_top.png">
    </a>
</div>
<script>
    function scrollToTop() {
        // Cuộn lên đầu trang
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    }
</script>
<script>
    $(document).on('submit', "[data-ajax='submit']", function(event) {
        event.preventDefault();
        let myThis = $(this);
        let formValues = $(this).serialize();
        let dataInput = $(this).data();

        var emailVal = myThis.find('[name="email"]').val().trim();

        let isEmail = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;

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
                    title: 'Your work has been saved',
                    showConfirmButton: false,
                    timer: 1500
                });
            }
        });
        return false;
    });
</script>
