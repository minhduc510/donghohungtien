@extends('frontend.layouts.main')
@section('title', $seo['title'] ?? '')
@section('keywords', $seo['keywords'] ?? '')
@section('description', $seo['description'] ?? '')
@section('abstract', $seo['abstract'] ?? '')
@section('image', $seo['image'] ?? '')
@section('css')
@endsection
@php
    $nextPageUrl = $data->nextPageUrl();
    $previousPageUrl = $data->previousPageUrl();
    $page = request()->input('page');
@endphp

@section('canonical')
    <link rel="canonical" href="{{ $category->slug_full }}" />
@endsection

@if (request()->has('page') && ($page == 1 || $page == 2))
    @section('prevPage')
        <link rel="prev" href="{{ $category->slug_full }}" />
    @endsection
@else
    @if ($previousPageUrl)
        @section('prevPage')
            <link rel="prev" href="{{ $previousPageUrl }}" />
        @endsection
    @endif
@endif

@if ($nextPageUrl)
    @section('nextPage')
        <link rel="next" href="{{ $nextPageUrl }}" />
    @endsection
@endif
@section('content')

    <div class="main">
        @php
            $banner = App\Models\Slider::where('active', 1)->find(1);
        @endphp
        <!-- @if (isset($banner) && $banner)
    <div class="banner-img-news">
                                               <div class="item-img-banners-news">
                                                <img src="{{ asset($banner->image_path) }}" alt="{{ $banner->name }}">
                                               </div>
                                              </div>
    @endif -->
        <style>

        </style>
        <div class="breadcrumbs clearfix">
            <div class="ctnr">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <ul>
                            <li class="breadcrumbs-item">
                                <a href="{{ makeLink('home') }}" title="{{ __('home.home') }}"
                                    style="color: #333;">{{ __('home.home') }}</a>
                            </li>
                            <li class="breadcrumbs-item" style="color: #84c561;"><a
                                    href="{{ $category->slug }}">{{ $category->name }}</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="page_news">
            <div class="ctnr">
                <div class="">
                    <div class="news_list ">
                        <div class="noi_dung_in">
                            {!! $category->content !!}
                        </div>
                        @if ($data->count() > 0)
                            <div class="row">
                                @foreach ($data as $i)
                                    <div class="news_item clm" style="--w-lg:3; --w-md:4; --w-sm:6; --w-xs:12;">
                                        <div class="box-tinttuc-newss">
                                            <div class="image">
                                                <a href="{{ $i->slug }}">
                                                    <img src="{{ asset($i->avatar_path ?? 'frontend/images/no_image.jpg') }}"
                                                        alt="{{ $i->name }}">
                                                </a>
                                            </div>
                                            <div class="date-time">
                                                {{-- Đăng bởi {{$i->getAdmin->name}}, {{ $i->created_at->format('d/m/Y') }} --}}
                                            </div>
                                            <div class="news_infor">
                                                <h3><a href="{{ $i->slug_full }}">{{ $i->name }}</a></h3>
                                                <div class="desc">
                                                    {!! $i->description !!}
                                                </div>
                                                <div class="box-xemthem">
                                                    <a href="{{ $i->slug_full }}" class="see-more d-flex ai-center">
                                                        Đọc thêm<svg xmlns="http://www.w3.org/2000/svg"
                                                            viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                                            <path
                                                                d="M470.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-160-160c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L402.7 256 265.4 393.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l160-160zm-352 160l160-160c12.5-12.5 12.5-32.8 0-45.3l-160-160c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L210.7 256 73.4 393.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0z" />
                                                        </svg>

                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            {{ $data->appends(request()->input())->links() }}
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('js')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            if (window.location.href.includes('page=1')) {
                window.location.href = '{{ $category->slug_full }}';
            }
        });
    </script>
@endsection
