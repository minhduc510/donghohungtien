@extends('frontend.layouts.main')
@section('title', $seo['title'] ?? '')
@section('keywords', $seo['keywords'] ?? '')
@section('description', $seo['description'] ?? '')
@section('abstract', $seo['abstract'] ?? '')
@section('image', $seo['image'] ?? '')
@php
    $about_us = App\Models\CategoryPost::where('active', 1)->find(1);
@endphp
@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/header.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/about-us.css') }}">
@endsection
{{-- @section('canonical')
    <link rel="canonical" href="{{ $about_us->slug_full }}" />
@endsection --}}
@section('content')
    <script>
        $(document).ready(function() {
            $("a.scrollLink").click(function(event) {
                event.preventDefault();
                $("html, body").animate({
                    scrollTop: $($(this).attr("href")).offset().top - 100
                }, 500);
            });
        });
    </script>
    <style>
        .content-page td {
            padding: 0px !important;
        }

        .content-page tr td:nth-child(1) {
            padding-right: 15px !important;
        }
    </style>
    <main>
        @php
            $about_us = App\Models\CategoryPost::where('active', 1)->find(1);
        @endphp
        {{-- <div class="banner-product-by">
            <img src="{{ asset($about_us->icon_path ?? "") }}" alt="{{ $about_us->name ?? "" }}"/>
        </div> --}}
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
                            <li class="breadcrumbs-item">
                                <a href="javascript:;" class="currentcat">Giới thiệu</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="section__8_gt main">
            <div class="ctnr">
                <h1>{{ $data->description }}</h1>
                <div class="wrap_background_aside">
                    <div class="content-page">
                        {!! $data->content !!}
                    </div>
                </div>
            </div>
        </div>
        <div class="line-to"><img src="images/line-to.png" alt=""></div>
    </main>
@endsection
@section('js')
@endsection
