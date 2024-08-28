@extends('frontend.layouts.main')
@section('title', $seo['title'] ?? '')
@section('keywords', $seo['keywords'] ?? '')
@section('description', $seo['description'] ?? '')
@section('abstract', $seo['abstract'] ?? '')
@section('image', $seo['image'] ?? '')
@section('css')
    <style>
        .group-map h3 {
            position: relative;
            font-weight: 400;
            font-size: 15px;
            color: #42464e;
            position: relative;
            padding-left: 12px;
            cursor: pointer;
            padding-bottom: 0px;
        }
        .group-map p:before {
            display: none;
        }

        .group-map h3:before {
            content: "";
            width: 5px;
            height: 5px;
            background: #5e6268;
            position: absolute;
            top: 10px;
            left: 0;
            border-radius: 5px;
        }
    </style>
@endsection


@section('content')
    <div class="main">
        <div class="breadcrumbs clearfix">
            <div class="ctnr">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <ul>
                            <li class="breadcrumbs-item">
                                <a href="{{ makeLink('home') }}" title="{{ __('home.home') }}"
                                    style="color: #333;">{{ __('home.home') }}</a>
                            </li>
                            <li class="breadcrumbs-item" style="color: #84c561; padding-left:12px">{{ $category->name }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        @if ($maps)
            <section class="select-map pd-section-top pd-section-bottom">
                <div class="ctnr">
                    <div class="row">
                        <div class="clm" style="--w-md:7.5; --w-xs:12;">
                            <div class="select-map-box h-100">
                                @foreach ($maps->childs()->where('active', 1)->orderBy('order')->get() as $key => $i)
                                    @if ($key == 0)
                                        <iframe id="map-iframe" style="border: 0;" src="{{ $i->value }}" width="600"
                                            height="450" allowfullscreen="allowfullscreen" loading="lazy"></iframe>
                                    @endif
                                @endforeach

                            </div>
                        </div>
                        <div class="clm" style="--w-md:4.5; --w-xs:12;">
                            <h5 class="d-flex ai-center">
                                <img src="https://demo11.bivaco.net/frontend/images/location.png" alt="">
                                Hệ thống văn phòng và chi nhánh
                            </h5>

                            <div class="group-map" id="groupMap">
                                @foreach ($maps->childs()->where('active', 1)->orderBy('order')->get() as $i)
                                    <span onclick="changeMap(this)" data-add="{{ $i->value }}" class="active">
                                        <h3><strong>{{ $i->name }}</strong></h3>
                                        {!! $i->description !!}
                                    </span>
                                @endforeach

                            </div>
                        </div>
                    </div>
                </div>
            </section>
        @endif
    </div>





@endsection
@section('js')
    <script>
        function changeMap(element) {
            var newSrc = element.getAttribute('data-add');
            document.getElementById('map-iframe').src = newSrc;

            // Đặt lại lớp active cho các span
            var spans = document.querySelectorAll('.select-map-box span');
            spans.forEach(function(span) {
                span.classList.remove('active');
            });
            element.classList.add('active');
        }
    </script>
@endsection
