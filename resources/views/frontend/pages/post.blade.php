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

            <h1 class="title-template-news hidden">{{ $category->name??"" }}</h1>
                <div class="blog-news">
                    <div class="container">
                        <div class="row">
                            <div class="col-xs-12">

                                <div class="group-title">
                                    <div class="title title-red">
                                        {{ __('post.tin_tuc_noi_bat') }}
                                    </div>
                                </div>
                                @isset($data_hot)
                                <div class="list-news-2">
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12 col-xs-12 right list-news-blog list-news-blog-nb">
                                            <div class="row d-flex before-after-unset">
                                                @foreach ($data_hot as $post)
                                                <div class="fo-03-col-news  col-xs-12 col-sm-3 col-md-3">
                                                    <div class="fo-03-news">
                                                        <div class="box">
                                                            <div class="image">
                                                                <a href="{{ makeLink('post',$post->id,$post->slug) }}"><img src="{{ asset($post->avatar_path) }}" alt="{{ $post->name }}"></a>
                                                            </div>
                                                            <div class="content">
                                                                <h3><a href="{{ makeLink('post',$post->id,$post->slug) }}">{{ $post->name }}</a></h3>
                                                                <div class="desc">{!! $post->description  !!}</div>
                                                                <div class="block-action-news">
                                                                    <a href="{{ makeLink('post',$post->id,$post->slug) }}" class="xemthem">{{ __('post.xem_them') }}</a>
                                                                    <span class="date">{{ date_format($post->updated_at,"d/m/Y")}}</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                @endisset

                                <div class="line-div-long"></div>

                                <div class="group-title">
                                    <div class="title title-red">
                                        {{ $category->name??"" }}
                                    </div>
                                </div>
                                @isset($data)
                                <div class="list-news-2">
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12 col-xs-12 right list-news-blog">
                                            <div class="row d-flex before-after-unset">
                                                @foreach ($data as $post)
                                                <div class="fo-03-col-news  col-xs-12 col-sm-3 col-md-3">
                                                    <div class="fo-03-news">
                                                        <div class="box">
                                                            <div class="image">
                                                                <a href="{{ makeLink('post',$post->id,$post->slug) }}"><img src="{{ asset($post->avatar_path) }}" alt="{{ $post->name }}"></a>
                                                            </div>
                                                            <div class="content">
                                                                <h3><a href="{{ makeLink('post',$post->id,$post->slug) }}">{{ $post->name }}</a></h3>
                                                                <div class="desc">{!! $post->description  !!}</div>
                                                                <div class="block-action-news">
                                                                    <a href="{{ makeLink('post',$post->id,$post->slug) }}" class="xemthem">{{ __('post.xem_them') }}</a>
                                                                    <span class="date">{{ date_format($post->updated_at,"d/m/Y")}}</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-sm-12 col-xs-12 right">
                                            <div class="pagination-group">
                                                <div class="pagination">
                                                    @if (count($data))
                                                    {{$data->links()}}
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endisset
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
