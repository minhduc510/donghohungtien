@extends('admin.layouts.main')
@section('title',"Thêm review")
@section('css')
@endsection
@section('content')
<div class="content-wrapper">
    @include('admin.partials.content-header',['name'=>"Galaxy","key"=>"Thêm review"])
    <!-- Main content -->
    <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        @if(session("alert"))
                        <div class="alert alert-success">
                            {{session("alert")}}
                        </div>
                        @elseif(session('error'))
                        <div class="alert alert-warning">
                            {{session("error")}}
                        </div>
                        @endif
                        <form class="form-horizontal" action="{{route('admin.galaxy.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="card-header">
                                                    @foreach ($errors->all() as $message)
                                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                                    @endforeach
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="card-tool p-3 text-right">
                                                    <button type="submit" class="btn btn-primary btn-lg">Chấp nhận</button>
                                                    <button type="reset" class="btn btn-danger btn-lg">Làm lại</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="card card-outline card-primary">
                                                <div class="card-header mb-3">
                                                    <h3 class="card-title">Thông tin review</h3>
                                                </div>
                                                <ul class="nav nav-tabs">
                                                    <li class="nav-item">
                                                        <a class="nav-link active" data-toggle="tab" href="#tong_quan">Tổng quan</a>
                                                    </li>
                                                    <!-- <li class="nav-item">
                                                    <a class="nav-link" data-toggle="tab" href="#du_lieu">Dữ liệu</a>
                                                    </li> -->
                                                    <li class="nav-item">
                                                        <a class="nav-link" data-toggle="tab" href="#hinh_anh"> Video</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" data-toggle="tab" href="#seo">Seo</a>
                                                    </li>
                                                </ul>
                                                <div class="tab-content pl-3 pr-3">
                                                    <!-- START Tổng Quan -->
                                                    <div id="tong_quan" class="container tab-pane active "><br>

                                                        <ul class="nav nav-tabs">
                                                            @foreach ($langConfig as $langItem)
                                                            <li class="nav-item">
                                                                <a class="nav-link {{$langItem['value']==$langDefault?'active':''}}" data-toggle="tab" href="#tong_quan_{{$langItem['value']}}">{{ $langItem['name'] }}</a>
                                                            </li>
                                                            @endforeach

                                                        </ul>
                                                        <div class="tab-content">
                                                            @foreach ($langConfig as $langItem)
                                                            <div id="tong_quan_{{$langItem['value']}}" class="container wrapChangeSlug tab-pane {{$langItem['value']==$langDefault?'active show':''}} fade">
                                                                <div class="form-group">
                                                                    <div class="row">
                                                                        <label class="col-sm-2 control-label" for="">Tên review</label>
                                                                        <div class="col-sm-10">
                                                                            <input type="text" class="form-control nameChangeSlug
                                                                            @error('name_'.$langItem['value']) is-invalid @enderror" id="name_{{$langItem['value']}}" value="{{ old('name_'.$langItem['value']) }}" name="name_{{$langItem['value']}}" placeholder="Nhập tên review">                                            @error('name_'.$langItem['value'])
                                                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                                                            @enderror
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <div class="row">
                                                                        <label class="col-sm-2 control-label" for="">Slug</label>
                                                                        <div class="col-sm-10">
                                                                            <input type="text" class="form-control resultSlug
                                                                            @error('slug_'.$langItem['value']) is-invalid  @enderror" id="slug_{{ $langItem['value'] }}" value="{{ old('slug_'.$langItem['value']) }}" name="slug_{{ $langItem['value'] }}" placeholder="Nhập slug">                                            @error('slug_'.$langItem['value'])
                                                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                                                            @enderror
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group">
                                                                    <div class="row">
                                                                        <label class="col-sm-2 control-label" for="">Nhập col</label>
                                                                        <div class="col-sm-10">
                                                                            <input type="text" class="form-control @error('col_'.$langItem['value']) is-invalid @enderror" id="col" value="{{ old('col_'.$langItem['value']) }}" name="col_{{ $langItem['value'] }}" placeholder="Nhập col">                                            @error('col_'.$langItem['value'])
                                                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                                                            @enderror
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group">
                                                                    <div class="row">
                                                                        <label class="col-sm-2 control-label" for="">Nhập giới thiệu</label>
                                                                        <div class="col-sm-10">
                                                                            <textarea class="form-control  @error('description_'.$langItem['value']) is-invalid @enderror" name="description_{{$langItem['value']}}" id="" rows="3" placeholder="Nhập giới thiệu">{{ old('description_'.$langItem['value']) }}</textarea>                                            @error('description_'.$langItem['value'])
                                                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                                                            @enderror
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <div class="row">
                                                                        <label class="col-sm-2 control-label" for="">Nhập nội dung</label>
                                                                        <div class="col-sm-10">
                                                                            <textarea class="form-control tinymce_editor_init @error('content_'.$langItem['value']) is-invalid  @enderror" name="content_{{$langItem['value']}}" id="" rows="20" value="" placeholder="Nhập nội dung">
                                                                            {{ old('content_'.$langItem['value']) }}
                                                                            </textarea> @error('content_'.$langItem['value'])
                                                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                                                            @enderror
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                    <!-- END Tổng Quan -->

                                                    <!-- START Dữ Liệu -->
                                                    <!-- <div id="du_lieu" class="container tab-pane fade"><br>

                                                    </div> -->
                                                    <!-- END Dữ Liệu -->

                                                    <!-- START Hình Video -->
                                                    <div id="hinh_anh" class="container tab-pane fade"><br>
                                                        <div class="wrap-load-image mb-3">
                                                            <div class="form-group">
                                                                <label for="">Video đại diện</label>
                                                                <input type="file" class="form-control-file img-load-input border @error('avatar_path')
                                                                is-invalid
                                                                @enderror" id="" name="avatar_path"> @error('avatar_path')
                                                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                                                @enderror
                                                            </div>
                                                            <img class="img-load border p-1 w-100" src="{{asset('admin_asset/images/upload-image.png')}}" style="height: 200px;object-fit:cover; max-width: 260px;">
                                                        </div>

                                                        <div class="wrap-load-image mb-3">
                                                            <div class="form-group">
                                                                <label for="">Video liên quan</label>
                                                                <input type="file" class="form-control-file img-load-input-multiple border @error('image')
                                                                    is-invalid
                                                                    @enderror" id="" name="image[]" multiple>
                                                            </div>
                                                            @error('image')
                                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                                            @enderror
                                                            <div class="load-multiple-img">
                                                                <img class="" src="{{asset('admin_asset/images/upload-image.png')}}">
                                                                <img class="" src="{{asset('admin_asset/images/upload-image.png')}}">
                                                                <img class="" src="{{asset('admin_asset/images/upload-image.png')}}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- END Hình Video -->

                                                    <!-- START Seo -->
                                                    <div id="seo" class="container tab-pane fade"><br>
                                                        <ul class="nav nav-tabs">
                                                            @foreach ($langConfig as $langItem)
                                                            <li class="nav-item">
                                                                <a class="nav-link {{$langItem['value']==$langDefault?'active':''}}" data-toggle="tab" href="#seo_{{$langItem['value']}}">{{ $langItem['name'] }}</a>
                                                            </li>
                                                            @endforeach
                                                        </ul>
                                                        <div class="tab-content">
                                                            @foreach ($langConfig as $langItem)
                                                            <div id="seo_{{$langItem['value']}}" class="container tab-pane {{$langItem['value']==$langDefault?'active show':''}} fade">
                                                                <div class="form-group">
                                                                    <div class="row">
                                                                        <label class="col-sm-2 control-label" for="">Nhập title seo</label>
                                                                        <div class="col-sm-10">
                                                                            <input type="text" class="form-control @error('title_seo_'.$langItem['value']) is-invalid @enderror" id="title_seo" value="{{ old('title_seo_'.$langItem['value']) }}" name="title_seo_{{ $langItem['value'] }}" placeholder="Nhập title seo">                                            @error('title_seo_'.$langItem['value'])
                                                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                                                            @enderror
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group">
                                                                    <div class="row">
                                                                        <label class="col-sm-2 control-label" for="">Nhập mô tả seo</label>
                                                                        <div class="col-sm-10">
                                                                            <input type="text" class="form-control @error('description_seo_'.$langItem['value']) is-invalid @enderror" id="description_seo" value="{{ old('description_seo_'.$langItem['value']) }}" name="description_seo_{{ $langItem['value'] }}" placeholder="Nhập mô tả seo">                                            @error('description_seo_'.$langItem['value'])
                                                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                                                            @enderror
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                                <div class="form-group">
                                                                    <div class="row">
                                                                        <label class="col-sm-2 control-label" for="">Nhập từ khóa seo</label>
                                                                        <div class="col-sm-10">
                                                                            <input type="text" class="form-control @error('keyword_seo_'.$langItem['value']) is-invalid @enderror" id="keyword_seo" value="{{ old('keyword_seo_'.$langItem['value']) }}" name="keyword_seo_{{ $langItem['value'] }}" placeholder="Nhập mô tả seo">                                            @error('keyword_seo_'.$langItem['value'])
                                                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                                                            @enderror
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                    <!-- END Seo -->
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="card card-outline card-primary">
                                                <div class="card-header">
                                                    <h3 class="card-title">Thông tin chính</h3>
                                                </div>
                                                <div class="card-body">
                                                    <input type="hidden" name="division" value="1">
                                                    {{--<div class="form-group">
                                                        <label class="control-label" for="">Chọn danh mục</label>
                                                        <select class="form-control custom-select select-2-init @error('category_id')
                                                            is-invalid
                                                            @enderror" id="" value="{{ old('category_id') }}" name="category_id">

                                                            <option value="0">--- Chọn danh mục cha ---</option>

                                                            @if (old('category_id'))
                                                                {!! \App\Models\CategoryGalaxy::getHtmlOption(old('category_id')) !!}
                                                            @else
                                                            {!!$option!!}
                                                            @endif
                                                        </select> @error('category_id')
                                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                                        @enderror
                                                    </div>--}}

                                                    <div class="form-group">
                                                        <label class="control-label" for="">Số thứ tự</label>
                                                        <input type="number" min="0" class="form-control  @error('order') is-invalid  @enderror" value="{{ old('order') }}" name="order" placeholder="Nhập số thứ tự">
                                                        @error('order')
                                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                                        @enderror
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="control-label" for="">Nổi bật</label>
                                                        <div class="form-check-inline">
                                                            <label class="form-check-label">
                                                                <input type="checkbox" class="form-check-input @error('hot')
                                                                    is-invalid
                                                                    @enderror" value="1" name="hot" @if(old('hot')==="1" ) {{'checked'}} @endif>
                                                            </label>
                                                        </div>
                                                        @error('hot')
                                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label" for="">Trạng thái</label>
                                                        <div class="form-check-inline">
                                                            <label class="form-check-label">
                                                            <input type="radio" class="form-check-input" value="1" name="active" @if(old('active')==='1' ||old('active')===null) {{'checked'}} @endif>Hiện
                                                            </label>
                                                        </div>
                                                        <div class="form-check-inline">
                                                            <label class="form-check-label">
                                                                <input type="radio" class="form-check-input" value="0" @if(old('active')==="0" ){{'checked'}} @endif name="active">Ẩn
                                                            </label>
                                                        </div>
                                                        @error('active')
                                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
    </div>
</div>
@endsection
@section('js')
@endsection
