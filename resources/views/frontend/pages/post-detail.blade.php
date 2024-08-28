@extends('frontend.layouts.main')
@section('title', $seo['title'] ?? '')
@section('keywords', $seo['keywords'] ?? '')
@section('description', $seo['description'] ?? '')
@section('abstract', $seo['abstract'] ?? '')
@section('image', $seo['image'] ?? '')
@section('css')
    <link rel="stylesheet" href="{{ asset('frontend/css/blog-details.css') }}">
    <style>
        .page_news .news_item {
            padding: 0px 7px;
        }

        .news_list .autoplay4 {
            margin: 0px -7px;
        }
    </style>
@endsection
@section('canonical')
    <link rel="canonical" href="{{ $data->slug_full }}" />
@endsection
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
        <div class="breadcrumbs clearfix">
            <div class="ctnr">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <ul>
                            <li class="breadcrumbs-item">
                                <a href="{{ makeLink('home') }}" title="{{ __('home.home') }}" style="color: #333;">
                                    {{ __('home.home') }}
                                </a>
                            </li>
                            <li class="breadcrumbs-item" style="color: #84c561; padding-left:12px">
                                <a href="{{ $category->slug }}">
                                    {{ $category->name }}
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="news_detail">
            <div class="ctnr">
                <div class="row">
                    @if ($data->paragraphs()->count() > 0)
                        <div class="clm col-right" style="--w-md: 2.5; --w-xs: 12;">
                            @foreach (config('paragraph.posts.type') as $typeKey => $typeParagraph)
                                @if ($data->paragraphs()->where([['type', $typeKey], ['active', 1]])->count() > 0)
                                    <div class="box-link-paragraph">
                                        <h2 class="content chuyenmuc-ss4">
                                            <div class="title-chuyenmuc">
                                                Nội dung bài viết
                                            </div>
                                        </h2>
                                        <ul>
                                            @include('frontend.components.paragraph', [
                                                'typeKey' => $typeKey,
                                                'data' => $data,
                                            ])
                                        </ul>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                        <div class="clm col-right" style="--w-md: 6.5; --w-xs: 12;">
                            <div class="box_news_detail">
                                <h1>{{ $data->name }}</h1>
                                <div class="date_time d-flex ai-center">
                                    <div class="d-flex ai-center">
                                        <i class="fa fa-calendar" aria-hidden="true"></i>
                                        <span>{{ $data->created_at->format('d/m/Y') }}</span>
                                    </div>
                                    <div class="d-flex ai-center">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 576 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                            <path
                                                d="M288 80c-65.2 0-118.8 29.6-159.9 67.7C89.6 183.5 63 226 49.4 256c13.6 30 40.2 72.5 78.6 108.3C169.2 402.4 222.8 432 288 432s118.8-29.6 159.9-67.7C486.4 328.5 513 286 526.6 256c-13.6-30-40.2-72.5-78.6-108.3C406.8 109.6 353.2 80 288 80zM95.4 112.6C142.5 68.8 207.2 32 288 32s145.5 36.8 192.6 80.6c46.8 43.5 78.1 95.4 93 131.1c3.3 7.9 3.3 16.7 0 24.6c-14.9 35.7-46.2 87.7-93 131.1C433.5 443.2 368.8 480 288 480s-145.5-36.8-192.6-80.6C48.6 356 17.3 304 2.5 268.3c-3.3-7.9-3.3-16.7 0-24.6C17.3 208 48.6 156 95.4 112.6zM288 336c44.2 0 80-35.8 80-80s-35.8-80-80-80c-.7 0-1.3 0-2 0c1.3 5.1 2 10.5 2 16c0 35.3-28.7 64-64 64c-5.5 0-10.9-.7-16-2c0 .7 0 1.3 0 2c0 44.2 35.8 80 80 80zm0-208a128 128 0 1 1 0 256 128 128 0 1 1 0-256z" />
                                        </svg>
                                        <span>{{ $data->view }}</span>
                                    </div>
                                </div>
                                <div class="news_note">
                                    {!! $data->description !!}
                                </div>
                                <div class="noi_dung_in">

                                    {!! $data->content !!}
                                    @foreach (config('paragraph.posts.type') as $typeKey => $typeParagraph)
                                        @if ($data->paragraphs()->where([['type', $typeKey], ['active', 1]])->count() > 0)
                                            <div class="list-content-paragraph">
                                                @include('frontend.components.paragraph-content', [
                                                    'typeKey' => $typeKey,
                                                    'data' => $data,
                                                ])
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                                <div class="share">
                                    <div class="share-article">
                                        <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-591d2f6c5cc3d5e5"></script>
                                        <div class="addthis_inline_share_toolbox"></div>
                                    </div>
                                </div>
                                @if ($data->tags->count() > 0)
                                    <div class="tags">
                                        @foreach ($data->tags as $tag)
                                            <a href="{{ route('post.tag', ['slug' => $tag->slug]) }}" class="tag-item">
                                                {{ $tag->name }}
                                            </a>
                                        @endforeach
                                    </div>
                                @endif
                            </div>
                        </div>
                    @else
                        <div class="clm col-right" style="--w-md: 9; --w-xs: 12;">
                            <div class="box_news_detail">
                                <h1>{{ $data->name }}</h1>
                                <div class="date_time d-flex ai-center">
                                    <div class="d-flex ai-center">
                                        <i class="fa fa-calendar" aria-hidden="true"></i>
                                        <span>{{ $data->created_at->format('d/m/Y') }}</span>
                                    </div>
                                    <div class="d-flex ai-center">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 576 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                            <path
                                                d="M288 80c-65.2 0-118.8 29.6-159.9 67.7C89.6 183.5 63 226 49.4 256c13.6 30 40.2 72.5 78.6 108.3C169.2 402.4 222.8 432 288 432s118.8-29.6 159.9-67.7C486.4 328.5 513 286 526.6 256c-13.6-30-40.2-72.5-78.6-108.3C406.8 109.6 353.2 80 288 80zM95.4 112.6C142.5 68.8 207.2 32 288 32s145.5 36.8 192.6 80.6c46.8 43.5 78.1 95.4 93 131.1c3.3 7.9 3.3 16.7 0 24.6c-14.9 35.7-46.2 87.7-93 131.1C433.5 443.2 368.8 480 288 480s-145.5-36.8-192.6-80.6C48.6 356 17.3 304 2.5 268.3c-3.3-7.9-3.3-16.7 0-24.6C17.3 208 48.6 156 95.4 112.6zM288 336c44.2 0 80-35.8 80-80s-35.8-80-80-80c-.7 0-1.3 0-2 0c1.3 5.1 2 10.5 2 16c0 35.3-28.7 64-64 64c-5.5 0-10.9-.7-16-2c0 .7 0 1.3 0 2c0 44.2 35.8 80 80 80zm0-208a128 128 0 1 1 0 256 128 128 0 1 1 0-256z" />
                                        </svg>
                                        <span>{{ $data->view }}</span>
                                    </div>
                                </div>
                                <div class="news_note">
                                    {!! $data->description !!}
                                </div>
                                <div class="noi_dung_in">
                                    {!! $data->content !!}
                                </div>
                                <div class="tag">
                                    @if ($data->tags->count() > 0)
                                        <ul>
                                            @foreach ($data->tags as $item)
                                                <li>
                                                    <a
                                                        href="{{ route('post.tag', ['slug' => $item->slug]) }}">{{ $item->name }}</a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endif
                    <div class="clm news_rale" style="--w-md: 3; --w-xs: 12;">
                        <div class="title-headding">
                            <div class="bg_img">
                                <div class="title">
                                    Bài viết liên quan
                                </div>
                            </div>
                        </div>
                        @isset($dataRelate)
                            @if ($dataRelate)
                                @if ($dataRelate->count())
                                    <div class="row">
                                        @foreach ($dataRelate as $item)
                                            <div class="clm" style="--w-md:12; --w-xs:12;">
                                                <div class="news_item">
                                                    <div class="image">
                                                        <a href="{{ $item->slug_full }}">
                                                            <img src="{{ asset($item->avatar_path ?? 'frontend/images/no_image.jpg') }}"
                                                                alt="{{ $item->name }}">
                                                        </a>
                                                    </div>
                                                    <div class="news_infor">
                                                        <h3>
                                                            <a href="{{ $item->slug_full }}">{{ $item->name }}</a>
                                                        </h3>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                @endif
                            @endif
                        @endisset
                        @if (isset($bannerRight))
                            <div class="picture">
                                <a href="{{ $bannerRight->slug }}">
                                    <img src="{{ asset($bannerRight->image_path) }}" alt="{{ $bannerRight->name }}">
                                </a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        {{-- <div class="page_news">
        <div class="ctnr">
            <div class="">
                <div class="title title-img">
                    <h2>Các bài viết liên quan</h2>
                </div>
				@if (count($dataRelate) > 0)
                <div class="news_list ">
                    <div class="autoplay4">
						@foreach ($dataRelate as $item)
                        <div class="news_item">
                            <div class="image">
                                <a href="{{ $item->slug_full }}">
                                    <img src="{{ asset($item->avatar_path ?? 'frontend/images/no_image.jpg') }}" alt="{{ $item->name }}">
                                </a>
                            </div>
                            <div class="date-time">
                                Đăng bởi {{ $item->getAdmin->name }}, 
                                {{ $item->created_at->format('d/m/Y') }}
                            </div>
                            <div class="news_infor">
                                <h3>
									<a href="{{ $item->slug_full }}">{{ $item->name }}</a>
								</h3>
                                <div class="desc">
                                    {{ $item->description }}
                                </div>
								<div class="d-flex js-center">
								 <a href="{{ $item->slug_full }}"
                                    class="see-more d-flex ai-center">
                                    Đọc thêm<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                        <!--!Font Awesome Free 6.5.2 by @fontawesome  - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                        <path
                                            d="M470.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-160-160c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L402.7 256 265.4 393.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l160-160zm-352 160l160-160c12.5-12.5 12.5-32.8 0-45.3l-160-160c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L210.7 256 73.4 393.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0z">
                                        </path>
                                    </svg>

                                </a>
								</div>
                            </div>
                        </div>
						@endforeach
                    </div>
                </div>
				@endif
            </div>
        </div>
    </div> --}}
    </div>

@endsection
@section('js')

@endsection
