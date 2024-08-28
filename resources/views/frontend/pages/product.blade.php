@extends('frontend.layouts.main')

@section('title', $seo['title'] ?? '' )
@section('keywords', $seo['keywords']??'')
@section('description', $seo['description']??'')
@section('abstract', $seo['abstract']??'')
@section('image', $seo['image']??'')
@section('content')
    <div class="content-wrapper">
        <div class="main">
            @isset($breadcrumbs,$typeBreadcrumb)
                @include('frontend.components.breadcrumbs',[
                    'breadcrumbs'=>$breadcrumbs,
                    'type'=>$typeBreadcrumb,
                ])
            @endisset

            <div class="blog-product">
                <div class="ctnr">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="group-title">
                                <div class="title title-red">
                                  {{ __('product.danh_muc_cac_dich_vu') }}
                                </div>
                            </div>
                            @isset($data)
                            <div class="list-service-2">
                                <div class="row p-75 d-flex before-after-unset justify-center">
                                    @foreach($data as $product)
                                    <div class="col-service-item-2 col-md-4 col-sm-6 col-xs-12 p-75">
                                        <div class="service-item-2">
                                            <a class="box" href="{{ $product->slug_full }}">
                                                <div class="icon">
                                                    <img src="{{ asset($product->avatar_path) }}" alt="{{ $product->name }}">
                                                </div>
                                                <h3 class="name">
                                                    {{ $product->name }}
                                                </h3>
                                                <div class="desc">
                                                    {!! $product->description !!}
                                                </div>
                                                <div class="line-div-2"></div>
                                            </a>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="col-md-12">
                                @if (count($data))
                                {{$data->links()}}
                                @endif
                            </div>
                            @endisset
                            <div class="text-center">
                                <a href="{{ makeLinkToLanguage('bao-gia',null,null,App::getLocale()) }}" class="btn-view"><i class="fa fa-paper-plane" aria-hidden="true"></i> {{ __('product.nhan_tu_van') }}</a>
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
    $(function(){
        $(document).on('click','.pt_icon_right',function(){
            event.preventDefault();
            $(this).parentsUntil('ul','li').children("ul").slideToggle();
            $(this).parentsUntil('ul','li').toggleClass('active');
        })
    })
</script>
@endsection
