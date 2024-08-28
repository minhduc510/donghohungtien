@extends('frontend.layouts.main')
@section('title', $seo['title'] ?? '')
@section('keywords', $seo['keywords'] ?? '')
@section('description', $seo['description'] ?? '')
@section('abstract', $seo['abstract'] ?? '')
@section('image', $seo['image'] ?? '')
@section('css')
@endsection
@section('content')
    <div class="content-wrapper">
        <div class="main">
            <div class="section-5">
				<div class="ctnr">
					<div class="breadcum-h">
						@isset($breadcrumbs,$typeBreadcrumb)
							@include('frontend.components.breadcrumbs',[
								'breadcrumbs'=>$breadcrumbs,
								'type'=>$typeBreadcrumb,
							])
						@endisset
					</div>
				</div>
			</div>
            @php
                $tranData=$data->translationsLanguage()->first();
                if(!$tranData){
                    $tranData=($data->translationsLanguage(config('languages.default'))->first());
                }
            @endphp
            <div class="blog-news-detail">
                <div class="ctnr">
                    <div class="row">
						<div class="col-lg-12 col-sm-12">
							@if($category)
							<div class="group-title top">
								<div class="title title-img"> <h1>{{ $category->name }}</h1></div>
							</div>
							@endif
						</div>
                        <div class="col-lg-12 col-sm-12">
                            <div class="news-detail">
                                <div class="group-tintuc-list">
                                    <div class="blog-group-lever2 blog-group">
                                        <div class="ctnr">
                                            <div class="row">
                                                @if(isset($data) && $data)
                                                    @foreach($data->images as $value)
                                                        <div class="col-md-3 col-sm-4 col-xs-6 img-detail_item">
                                                            <div class="img-detail">
                                                                <a href="{{asset($value->image_path)}}" data-lightbox="mygallery"><img src="{{asset($value->image_path)}}" width="100%" alt="{{$value->name}}"></a>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
								<div class="box_content">
                                    <div class="content-news">
                                        {!! $tranData->content !!}
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
        $(function() {

            let normalSize = parseFloat($('#wrapSizeChange').css('fontSize'));
            $(document).on('click', '.prevSize', function() {
                let font = $('#wrapSizeChange').css('fontSize');
                console.log(parseFloat(font));
                let prevFont;
                if (parseFloat(font) <= 10) {
                    prevFont = parseFloat(font);
                } else {
                    prevFont = parseFloat(font) - 1;
                }
                $('#wrapSizeChange').css({
                    'fontSize': prevFont
                });
            });
            $(document).on('click', '.nextSize', function() {
                let font = $('#wrapSizeChange').css('fontSize');
                console.log(parseFloat(font));
                let nextFont;
                nextFont = parseFloat(font) + 1;
                $('#wrapSizeChange').css({
                    'fontSize': nextFont
                });
            });
            $(document).on('click', '.mormalSize', function() {
                $('#wrapSizeChange').css({
                    'fontSize': normalSize
                });
            });
        })
    </script>
    <script src="{{ asset('frontend/js/Comment.js') }}">
    </script>
    {{-- <script>
    console.log($('div').createFormComment());
</script> --}}
@endsection
