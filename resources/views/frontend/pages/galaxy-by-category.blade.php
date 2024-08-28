@extends('frontend.layouts.main')
@section('title', $seo['title'] ?? '' )
@section('keywords', $seo['keywords']??'')
@section('description', $seo['description']??'')
@section('abstract', $seo['abstract']??'')
@section('image', $seo['image']?asset($seo['image']):'')
@section('code_schema')
{!!$category->code_schema!!}
@endsection
@section('css')
<style type="text/css">
    .wrap-breadcrumbs{
        margin-bottom: 0;
    }
    
</style>
@endsection
@section('content')
    <div class="content-wrapper block-product-category-top">
		<div class="img-pbcb">
			<div class="ctnr content-baner-pbcb">
				<div>
					@if (isset($category)&&$category)
						<h1>{{$category->name}}</h1>
					@endif
				</div>
				 @isset($breadcrumbs,$typeBreadcrumb)
					@include('frontend.components.breadcrumbs',[
						'breadcrumbs'=>$breadcrumbs,
						'type'=>$typeBreadcrumb,
					])
				@endisset
			</div>
		</div>
        <div class="main">
                <div class="block-news">
                    <div class="ctnr">
                        <div class="row">
                            @if($category->childs->count()>0)
                            <div class="col-lg-12 col-sm-12  block-content-right1">
                                    <div class="wrap-list-news">
                                        <div class="list-card-news-horizontal">
                                            <div class="row">
                                                @foreach($category->childs()->where('active', 1)->orderBy('order')->get() as $galaxy_item)
                                                <div class="col-card-news-horizontal col-sm-4">
                                                    <div class="card-news-horizontal card-news-horizontal-2">
                                                        <div class="box">
                                                            <div class="image">
                                                                <a href="{{ $galaxy_item->slug_full }}"><img src="{{ $galaxy_item->avatar_path != null ? asset($galaxy_item->avatar_path) : '../frontend/images/no-images.png' }}" alt="{{$galaxy_item->name}}"></a>
																
                                                            </div>
                                                            <div class="content">
                                                                <h3><a href="{{ $galaxy_item->slug_full }}">{{$galaxy_item->name}}</a></h3>
                                                                <div class="desc">
                                                                    {{$galaxy_item->description}}
                                                                </div>
                                                               {{--<div class="text-right">
                                                                <a href="{{$link}}" class="btn-viewmore btn btn-light"><i class="fas fa-angle-double-right"></i> {{ __('post.xem_them') }}</a>
                                                               </div>--}}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                            </div>
                            @endif
                            @if($category->slug=='hinh-anh')
                            <div class="col-lg-12 col-sm-12  block-content-right1">
								{{-- <h1>{{$category->name}}</h1> --}}
								@if ($category->content)
                                <div class="content-category" id="wrapSizeChange">
                                    {!! $category->content !!}
                                </div>
                                @endif
                                @if($data2->count()>0)
                                    <div class="wrap-list-news">
                                        <div class="list-card-news-horizontal">
                                            <div class="row">
                                                @foreach($data2 as $galaxy_item)
                                                <div class="col-card-news-horizontal col-sm-4">
                                                    <div class="card-news-horizontal card-news-horizontal-2">
                                                        <div class="box">
                                                            <div class="image">
                                                            
                                                                <a href="{{ $galaxy_item->avatar_path }}" data-fancybox>
                                                                    <img class="box_consultatinon_left-img" src="{{ $galaxy_item->avatar_path }}" alt="{{ $galaxy_item->name }}">
                                                                </a>
																{{--<span class="clock"><i class="far fa-clock"></i> {{ Illuminate\Support\Carbon::parse($galaxy_item->created_at)->format('d/m/Y') }} </span>
																<span class="faeye" style="left: 140px;"><i class="fa fa-eye"></i> {{$galaxy_item->view}} </span>--}}
                                                            </div>
                                                            {{--<div class="content">
                                                                <h3><a href="{{$galaxy_item->value}}">{{$galaxy_item->name}}</a></h3>
                                                                <div class="desc">
                                                                    {{$galaxy_item->description}}
                                                                </div>
                                                               <div class="text-right">
                                                                <a href="{{$galaxy_item->value}}" class="btn-viewmore btn btn-light"><i class="fas fa-angle-double-right"></i> {{ __('post.xem_them') }}</a>
                                                               </div>
                                                            </div>--}}
                                                        </div>
                                                    </div>
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            @if (count($data2))
                                            {{$data2->appends(request()->all())->links()}}
                                            @endif
                                        </div>
                                    </div>
                                @else
                                <span>Đang cập nhật dữ liệu!</span>
                                @endif
                                
                                
                            </div>
                            @else
                            <div class="col-lg-12 col-sm-12  block-content-right1">
								{{-- <h1>{{$category->name}}</h1> --}}
								@if ($category->content)
                                <div class="content-category" id="wrapSizeChange">
                                    {!! $category->content !!}
                                </div>
                                @endif
                                @if($data2->count()>0)
                                    <div class="wrap-list-news">
                                        <div class="list-card-news-horizontal">
                                            <div class="row">
                                                @foreach($data2 as $galaxy_item)
                                                <div class="col-card-news-horizontal col-sm-4">
                                                    <div class="card-news-horizontal card-news-horizontal-2">
                                                        <div class="box">
                                                            <div class="image">
                                                            
                                                                <a href="{{ $galaxy_item->description }}" class="box_consultatinon_left-a" data-fancybox>
                                                                    <img class="box_consultatinon_left-img" src="{{ $galaxy_item->avatar_path }}" alt="{{ $galaxy_item->name }}">
                                                                    <i class="fab fa-youtube"></i>
                                                                </a>
                                                            </div>
                                                            <div class="content">
                                                                <h3><a href="{{$galaxy_item->description}}">{{$galaxy_item->name}}</a></h3>
                                                               
                                                            
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            @if (count($data2))
                                            {{$data2->appends(request()->all())->links()}}
                                            @endif
                                        </div>
                                    </div>
                                @else
                                <span>Đang cập nhật dữ liệu!</span>
                                @endif
                                
                                
                            </div>
                            @endif
                          
                        </div>
                       
                    </div>
                </div>
        </div>
    </div>
  {{--
    <div class="baner-contact">
        <div class="background-overlay"></div>
        <div class="ctnr">
            <div class="row">
                <div class="col-12">
                    <div class="content-baner-ct">
                        
                        <h2>{{$header['course']->name}}</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if(isset($data)&&$data)
    <div class="section-post-by-category">
        <div class="ctnr">
            <div class="row">
                <div class="col-lg-8">
                    @foreach($data as $galaxy_item)
                        @php
                            $link = route('checkKey',['slug'=>$galaxy_item->slug]);
                        @endphp
                        <div class="box-post-by-category">
                            <div class="img-box-post-by-category">
                                <a href="{{$galaxy_item->slug}}">
                                    <img src="{{$galaxy_item->avatar_path}}" alt="" width = "100%">
                                </a>
                            </div>
                            <div class="content-box-post-by-category">
                                <div class="icon-cbpbc">
                                    <span>
                                        <i class="fa-solid fa-snowflake"></i>
                                        <a href="">David MacLean</a>
                                    </span>
                                    <span>
                                        <i class="fa-solid fa-snowflake"></i>
                                        <a href="">{{ ($galaxy_item->created_at)->format('d/m/Y' ) }}</a>
                                    </span>
                                    <span>
                                        <i class="fa-solid fa-snowflake"></i>
                                        <a href="">Master Program, PHD Degree</a>
                                    </span>
                                </div>
                                <h2>
                                    <a href="{{$galaxy_item->slug}}">{{$galaxy_item->name}}</a>
                                </h2>
                                <div class="post-content-post-by-category">
                                <div>
                                    <p>{!!$galaxy_item->description!!}</p>

                                </div>
                                <div class="btn-by-category">
                                    <a href="{{$galaxy_item->slug}}">Continue
                                        <i class ="fas fa-angle-double-right"></i>
                                    </a>
                                </div>
                            </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="col-lg-4">
                    <div class="search-2">
                        <form action="" method="post">
                            <div class="input-group">
                                <input type="text" placeholder="Search" >
                                <button>
                                    <i class ="fas fa-search"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                    
                        <div class="box-post-by-category">
                            
                            <div class="item-box-pbc">
                                <h4 class = "headline--box-pbc-right">
                                    {{$sidebar['ten_noi_bat']->name}}
                                </h4>
                                @if(isset($tinnoi)&&$tinnoi)
                                    <div class="content-recent-posts">
                                        <div class="item-content-recent-posts display-flex">
                                            <div>
                                                <a href="{{$tinnoi->slug}}" class = "img-rp">
                                                    <img src="{{$tinnoi->avatar_path}}" alt="" width = "100%" height = "100%">
                                                </a>
                                            </div>
                                            <div class="body-content-recent-posts">
                                                <h6>
                                                    <a href="">{{$tinnoi->name}}</a>
                                                </h6>
                                                <span>
                                                    <i class="fa-solid fa-snowflake"></i>
                                                    <a href="">{{ ($tinnoi->created_at)->format('d/m/Y' ) }}</a>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    <div class="box-post-by-category">
                        <div class="item-box-pbc">
                            <h4 class = "headline--box-pbc-right">
                                Recent posts
                            </h4>
                            <div class="content-recent-posts">
                                <ul>
                                    <li>
                                        <a href="">
                                            November 2021
                                        </a>
                                    </li>
                                    <li>
                                        <a href="">
                                            March 2021
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="box-post-by-category">
                        <div class="item-box-pbc">
                            <h4 class = "headline--box-pbc-right">
                                Recent posts
                            </h4>
                            <div class="content-recent-posts">
                                <ul>
                                    <li>
                                        <a href="">
                                            November 2021
                                        </a>
                                    </li>
                                    <li>
                                        <a href="">
                                            March 2021
                                        </a>
                                    </li>
                                    <li>
                                        <a href="">
                                            March 2021
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
    <div class="stt9">
        <div class="item-stt9">
            <div class="ctnr">
                <div class="row">
                    <div class="col-lg-6 title-stt9  col-sm-6 ol-12">
                        <h2>{{$footer['logo_footer']->value}}</h2>
                    </div>
                    <div class="col-lg-6 col-sm-6 col-12">
                         <div class="btn-stt9  ">
                            <a href="" class = "btn-left">
                               Apply
                                <i class="fas fa-angle-double-right"></i>
                            </a>
                            <a href="" class = "btn-right">
                                Reqest info
                                <i class="fas fa-angle-double-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>--}}
@endsection
@section('js')
<script>
    $(function(){

    })
</script>
@endsection
