@extends('admin.layouts.main')
@section('title',"Sửa  danh mục bài viết")
@section('css')

@endsection

@section('content')

<div class="content-wrapper lb_template_categorypost_edit">
    @include('admin.partials.content-header',['name'=>"Danh mục bài viết","key"=>"Sửa danh mục bài viết"])

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
                    <form class="form-horizontal" action="{{route('admin.categorylanding.update',['id'=>$data->id])}}" method="POST" enctype="multipart/form-data">
                        @csrf
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

                        <div class="card-header">
                            <h3 class="card-title">Thông tin danh mục</h3>
                        </div>
                        <div class="row">
                            <div class="col-md-8">
                                <div class="card card-outline card-primary">
                                    <div class="card-body table-responsive p-3">
                                        <ul class="nav nav-tabs">
                                            <li class="nav-item">
                                                <a class="nav-link active" data-toggle="tab" href="#tong_quan">Tổng quan</a>
                                            </li>
                                            <!-- <li class="nav-item">
                                                <a class="nav-link" data-toggle="tab" href="#du_lieu">Dữ liệu</a>
                                            </li> -->
                                            {{--<li class="nav-item">
                                                <a class="nav-link" data-toggle="tab" href="#hinh_anh">Hình ảnh</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" data-toggle="tab" href="#seo">Seo</a>
                                            </li>--}}
                                        </ul>

                                        <div class="tab-content">
                                            <!-- START Tổng Quan -->
                                            <div id="tong_quan" class="container tab-pane active wrapChangeSlug"><br>

                                                <ul class="nav nav-tabs">
                                                    @foreach ($langConfig as $langItem)
                                                    <li class="nav-item">
                                                        <a class="nav-link {{$langItem['value']==$langDefault?'active':''}}" data-toggle="tab" href="#tong_quan_{{$langItem['value']}}">{{ $langItem['name'] }}</a>
                                                    </li>
                                                    @endforeach

                                                </ul>
                                                <div class="tab-content">
                                                    @foreach ($langConfig as $langItem)
                                                    <div id="tong_quan_{{$langItem['value']}}" class="container tab-pane {{$langItem['value']==$langDefault?'active show':''}} fade">
                                                        <div class="form-group">
                                                            <div class="row">
                                                                <label class="col-sm-2 control-label" for="">Tên danh mục</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" class="form-control nameChange nameChangeSlug {{$langItem['value']}}
                                                                    @error('name_'.$langItem['value']) is-invalid @enderror" id="name_{{$langItem['value']}}" data-lg="{{$langItem['value']}}" value="{{ old('name_'.$langItem['value'])??optional($data->translationsLanguage($langItem['value'])->first())->name }}" name="name_{{$langItem['value']}}" placeholder="Nhập tên">
                                                                    @error('name_'.$langItem['value'])
                                                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="row">
                                                                <label class="col-sm-2 control-label" for="">Slug</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" class="form-control resultSlug_{{$langItem['value']}} resultSlug1_{{$langItem['value']}} changeAlias1 {{$langItem['value']}}
                                                                    @error('slug_'.$langItem['value']) is-invalid  @enderror" id="slug_{{ $langItem['value'] }}" data-lg="{{$langItem['value']}}" value="{{ old('slug_'.$langItem['value'])??optional($data->translationsLanguage($langItem['value'])->first())->slug }}" name="slug_{{ $langItem['value'] }}" placeholder="Nhập slug">
                                                                    @error('slug_'.$langItem['value'])
                                                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="row">
                                                                <label class="col-sm-2 control-label" for="">Nhập giới thiệu</label>
                                                                <div class="col-sm-10">
                                                                    <textarea class="form-control  @error('description_'.$langItem['value']) is-invalid @enderror" name="description_{{$langItem['value']}}" id="" rows="3"  placeholder="Nhập giới thiệu">{{ old('description_'.$langItem['value'])??optional($data->translationsLanguage($langItem['value'])->first())->description  }}</textarea>
                                                                    @error('description_'.$langItem['value'])
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
                                                                    {{ old('content_'.$langItem['value'])??optional($data->translationsLanguage($langItem['value'])->first())->content }}
                                                                    </textarea>
                                                                    @error('content_'.$langItem['value'])
                                                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="card card-outline card-primary">
                                                            <div class="card-header">
                                                                <h3 class="card-title">Xem trước kết quả tìm kiếm</h3>
                                                                <button class="ui-button ui-button--link" type="button" name="button">Tùy chỉnh SEO</button>
                                                            </div>
                                                            <div class="card-body table-responsive p-3">
                                                                <div class="card-header">
                                                                    <div class="google-preview" bind-show="shouldShowGooglePreview()">
                                                                        <span class="google__title ">
                                                                            <input type="text" class="resultTitle_{{ $langItem['value'] }}" value="{{optional($data->translationsLanguage($langItem['value'])->first())->title_seo}}" readonly>
                                                                        </span>
                                                                        <div class="google__url">
                                                                            {{ $url }}/<input type="text" class="resultUrl_{{ $langItem['value'] }}" value="{{optional($data->translationsLanguage($langItem['value'])->first())->slug}}" readonly>
                                                                            
                                                                        </div>
                                                                        <div class="google__description resultDescription_{{ $langItem['value'] }}" id="resultDescription_{{ $langItem['value'] }}">{{optional($data->translationsLanguage($langItem['value'])->first())->description_seo}}
                                                                        {{--<input type="text" class="resultDescription" value="{{optional($data->translationsLanguage($langItem['value'])->first())->description_seo}}" readonly>--}}
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="card-header form-input hidden">
                                                                    <div class="form-group">
                                                                    <div class="row">
                                                                        <label class="col-sm-2 control-label"
                                                                            for="">Nhập
                                                                            title
                                                                            seo</label>
                                                                        <div class="col-sm-10">
                                                                            <input type="text"
                                                                                class="title_seo form-control @error('title_seo_' . $langItem['value']) is-invalid @enderror"
                                                                                id=""
                                                                                value="{{ old('title_seo_' . $langItem['value']) ?? optional($data->translationsLanguage($langItem['value'])->first())->title_seo }}"
                                                                                name="title_seo_{{ $langItem['value'] }}"
                                                                                placeholder="Nhập title seo">
                                                                            @error('title_seo_' . $langItem['value'])
                                                                                <div class="invalid-feedback d-block">
                                                                                    {{ $message }}</div>
                                                                            @enderror
                                                                            @php
                                                                                $countTitle =
                                                                                    70 -
                                                                                    strlen(
                                                                                        old(
                                                                                            'title_seo_' .
                                                                                                $langItem['value'],
                                                                                            optional(
                                                                                                $data
                                                                                                    ->translationsLanguage(
                                                                                                        $langItem[
                                                                                                            'value'
                                                                                                        ],
                                                                                                    )
                                                                                                    ->first(),
                                                                                            )->title_seo,
                                                                                        ),
                                                                                    );
                                                                            @endphp
                                                                            <div class="invalid-feedback2 d-block"
                                                                                id="title_seo_{{ $langItem['value'] }}">
                                                                                (META title
                                                                                @if ($countTitle > 0)
                                                                                    <span
                                                                                        id="da-nhap-title">{{ $countTitle }}</span>
                                                                                @else
                                                                                    <span
                                                                                        id="can-nhap-title">{{ $countTitle }}</span>
                                                                                @endif
                                                                                ký tự
                                                                                và từ)
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                                <div class="form-group">
                                                                    <div class="row">
                                                                        <label class="col-sm-2 control-label"
                                                                            for="">Nhập
                                                                            mô tả
                                                                            seo</label>
                                                                        <div class="col-sm-10">
                                                                            <input type="text"
                                                                                class="form-control description_seo @error('description_seo_' . $langItem['value']) is-invalid @enderror"
                                                                                id=""
                                                                                value="{{ old('description_seo_' . $langItem['value']) ?? optional($data->translationsLanguage($langItem['value'])->first())->description_seo }}"
                                                                                name="description_seo_{{ $langItem['value'] }}"
                                                                                placeholder="Nhập mô tả seo">
                                                                            @error('description_seo_' . $langItem['value'])
                                                                                <div class="invalid-feedback d-block">
                                                                                    {{ $message }}</div>
                                                                            @enderror
                                                                            @php
                                                                                $countDesc =
                                                                                    160 -
                                                                                    strlen(
                                                                                        old(
                                                                                            'description_seo_' .
                                                                                                $langItem['value'],
                                                                                            optional(
                                                                                                $data
                                                                                                    ->translationsLanguage(
                                                                                                        $langItem[
                                                                                                            'value'
                                                                                                        ],
                                                                                                    )
                                                                                                    ->first(),
                                                                                            )->description_seo,
                                                                                        ),
                                                                                    );
                                                                            @endphp
                                                                            <div class="invalid-feedback2 d-block"
                                                                                id="description_seo_{{ $langItem['value'] }}">
                                                                                (Trích lược SEO
                                                                                @if ($countDesc > 0)
                                                                                    <span
                                                                                        id="da-nhap-title">{{ $countDesc }}</span>
                                                                                @else
                                                                                    <span
                                                                                        id="can-nhap-title">{{ $countDesc }}</span>
                                                                                @endif
                                                                                ký tự
                                                                                và từ)
                                                                            </div>
                                                                        </div>
                                                                    </div>


                                                                </div>
                                                                <div class="form-group">
                                                                    <div class="row">
                                                                        <label class="col-sm-2 control-label"
                                                                            for="">Nhập
                                                                            từ
                                                                            khóa seo</label>
                                                                        <div class="col-sm-10">
                                                                            <input type="text"
                                                                                class="form-control keyword_seo @error('keyword_seo_' . $langItem['value']) is-invalid @enderror"
                                                                                id=""
                                                                                value="{{ old('keyword_seo_' . $langItem['value']) ?? optional($data->translationsLanguage($langItem['value'])->first())->keyword_seo }}"
                                                                                name="keyword_seo_{{ $langItem['value'] }}"
                                                                                placeholder="Nhập mô tả seo">
                                                                            @error('keyword_seo_' . $langItem['value'])
                                                                                <div class="invalid-feedback d-block">
                                                                                    {{ $message }}</div>
                                                                            @enderror
                                                                            @php
                                                                                $wordsArray = explode(
                                                                                    ',',
                                                                                    optional(
                                                                                        $data
                                                                                            ->translationsLanguage(
                                                                                                $langItem['value'],
                                                                                            )
                                                                                            ->first(),
                                                                                    )->keyword_seo,
                                                                                );
                                                                                $wordCount = 6 - count($wordsArray);
                                                                            @endphp
                                                                            <div class="invalid-feedback2 d-block"
                                                                                id="keyword_seo_{{ $langItem['value'] }}">
                                                                                (Từ khóa cách nhau bằng dấu phẩy, tối đa
                                                                                @if ($wordCount > 0)
                                                                                    <span
                                                                                        id="da-nhap-title">{{ $wordCount }}</span>
                                                                                @else
                                                                                    <span
                                                                                        id="can-nhap-title">{{ $wordCount }}</span>
                                                                                @endif
                                                                                từ khóa)
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                                    <div class="form-group">
                                                                        <div class="row">
                                                                            <label class="col-sm-2 control-label" for="">Đường dẫn / Alias</label>
                                                                            <div class="col-sm-10">
                                                                                <div class="next-input--stylized">
                                                                                    <span class="next-input__add-on next-input__add-on--before" style="padding-right:0">{{ $url }}/</span>
                                                                                    <input type="text" class="next-input next-input--invisible resultSlug2_{{$langItem['value']}} changeAlias2 {{$langItem['value']}}
                                                                                    @error('slug_'.$langItem['value']) is-invalid  @enderror" id="slug_{{ $langItem['value'] }}" data-lg="{{$langItem['value']}}" value="{{ old('slug_'.$langItem['value'])??optional($data->translationsLanguage($langItem['value'])->first())->slug }}" name="slug_{{ $langItem['value'] }}">
                                                                                    @error('slug_'.$langItem['value'])
                                                                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                                                                    @enderror
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
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

                                            <!-- START Hình Ảnh -->
                                            {{--<div id="hinh_anh" class="container tab-pane fade"><br>

                                                <div class="wrap-load-image mb-3">
                                                    <div class="form-group">
                                                        <label for="">Ảnh đại diện</label>
                                                        <input type="file" class="form-control-file img-load-input border" id="" name="avatar_path">
                                                    </div>
                                                    @error('avatar_path')
                                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                                    @enderror
                                                    @if ($data->avatar_path)
                                                    <img class="img-load border p-1 w-100" src="{{$data->avatar_path}}" alt="{{$data->name}}" style="height: 200px;object-fit:cover; max-width: 260px;">
                                                    @endif
                                                </div>
                                                <hr>
                                                

                                                <div class="wrap-load-image mb-3">
                                                    <div class="form-group">
                                                        <label for="">Ảnh icon</label>
                                                        <input type="file" class="form-control-file img-load-input border"  id="" value="" name="icon_path" >
                                                    </div>
                                                    @error('icon_path')
                                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                                    @enderror
                                                    @if ($data->icon_path)
                                                    <img class="img-load border p-1 w-100" src="{{$data->icon_path}}" alt="{{$data->name}}" style="height: 200px;object-fit:cover; max-width: 260px;">
                                                    @endif
                                                </div>

                                                
                                                
                                            </div>--}}
                                            <!-- END Hình Ảnh -->
                                            

                                            <!-- START Seo -->
                                            {{--<div id="seo" class="container tab-pane fade"><br>
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
                                                                        <input type="text" class="form-control @error('title_seo_'.$langItem['value']) is-invalid @enderror" id="title_seo" value="{{ old('title_seo_'.$langItem['value'])??optional($data->translationsLanguage($langItem['value'])->first())->title_seo }}" name="title_seo_{{ $langItem['value'] }}" placeholder="Nhập title seo">
                                                                        @error('title_seo_'.$langItem['value'])
                                                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <div class="row">
                                                                    <label class="col-sm-2 control-label" for="">Nhập mô tả seo</label>
                                                                    <div class="col-sm-10">
                                                                        <input type="text" class="form-control @error('description_seo_'.$langItem['value']) is-invalid @enderror" id="description_seo" value="{{ old('description_seo_'.$langItem['value'])??optional($data->translationsLanguage($langItem['value'])->first())->description_seo }}" name="description_seo_{{ $langItem['value'] }}" placeholder="Nhập mô tả seo">
                                                                        @error('description_seo_'.$langItem['value'])
                                                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                                                        @enderror
                                                                    </div>
                                                                </div>

                                                            </div>
                                                            <div class="form-group">
                                                                <div class="row">
                                                                    <label class="col-sm-2 control-label" for="">Nhập từ khóa seo</label>
                                                                    <div class="col-sm-10">
                                                                        <input type="text" class="form-control @error('keyword_seo_'.$langItem['value']) is-invalid @enderror" id="keyword_seo" value="{{ old('keyword_seo_'.$langItem['value'])??optional($data->translationsLanguage($langItem['value'])->first())->keyword_seo  }}" name="keyword_seo_{{ $langItem['value'] }}" placeholder="Nhập mô tả seo">
                                                                        @error('keyword_seo_'.$langItem['value'])
                                                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>


                                            </div>--}}
                                            <!-- END Seo -->
                                        </div>

                                    </div>   
                                </div> 
                            </div>
                            <div class="col-md-4">
                                <div class="card card-outline card-primary">
                                    <div class="card-header">
                                        <h3 class="card-title">Cấu hình danh mục</h3>
                                    </div>
                                    <div class="card-body table-responsive">  
                                        <div class="form-group">
                                            <div class="row">
                                                <label class=" control-label" for="">Chọn danh mục</label>
                                                <div class="col-sm-12">

                                                    <select class="form-control custom-select select-2-init @error('parent_id')
                                                        is-invalid
                                                        @enderror" id="" value="{{ old('parent_id') }}" name="parent_id">

                                                        <option value="0">--- Chọn danh mục cha ---</option>

                                                        @if (old('parent_id')||old('parent_id')==='0')
                                                        {!! \App\Models\categorylanding::getHtmlOptionAddWithParent(old('parent_id')) !!}
                                                        @else
                                                        {!!$option!!}
                                                        @endif
                                                    </select>
                                                    @error('parent_id')
                                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-2 control-label" for="">Số thứ tự</label>
                                                <div class="col-sm-10">
                                                    <input type="number" min="0" class="form-control  @error('order') is-invalid  @enderror"  value="{{ old('order')??$data->order }}" name="order" placeholder="Nhập số thứ tự">
                                                </div>
                                                @error('order')
                                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <label class="control-label" for="">Nổi
                                                        bật</label>
                                                </div>
                                                <div class="col-md-9">
                                                    <div class="form-check-inline">
                                                        <label class="form-check-label">
                                                            <input type="checkbox"
                                                                class="form-check-input @error('hot')
                                                        is-invalid
                                                        @enderror"
                                                                value="1" name="hot"
                                                                @if ((old('hot')??$data->hot) == '1') {{ 'checked' }} @endif>
                                                        </label>
                                                    </div>
                                                    @error('hot')
                                                        <div class="invalid-feedback d-block">
                                                            {{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <label class="control-label" for="">Trạng thái</label>
                                                </div>
                                                <div class="col-md-9">
                                                    <div class="form-check-inline">
                                                        <label class="form-check-label">
                                                        <input type="radio" class="form-check-input" value="1" name="active" @if(old('active')==='1' || $data->active==1) {{'checked'}} @endif>Hiện
                                                        </label>
                                                    </div>
                                                    <div class="form-check-inline">
                                                        <label class="form-check-label">
                                                            <input type="radio" class="form-check-input" value="0" @if(old('active')==="0" || $data->active==0){{'checked'}} @endif name="active">Ẩn
                                                        </label>
                                                    </div>

                                                    @error('active')
                                                        <div class="invalid-feedback d-block">
                                                            {{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="wrap-load-image mb-3">
                                            <div class="form-group">
                                                <label for="">Ảnh đại diện</label>
                                                <input type="file" class="form-control-file img-load-input border" id="" name="avatar_path">
                                            </div>
                                            @error('avatar_path')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                            @enderror
                                            @if ($data->avatar_path)
                                            <img class="img-load border p-1 w-100" src="{{$data->avatar_path}}" alt="{{$data->name}}" style="height: 200px;object-fit:cover; max-width: 260px;">
                                            @endif
                                        </div>
                                        <hr>
                                        

                                        <div class="wrap-load-image mb-3">
                                            <div class="form-group">
                                                <label for="">Ảnh icon</label>
                                                <input type="file" class="form-control-file img-load-input border"  id="" value="" name="icon_path" >
                                            </div>
                                            @error('icon_path')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                            @enderror
                                            @if ($data->icon_path)
                                            <img class="img-load border p-1 w-100" src="{{$data->icon_path}}" alt="{{$data->name}}" style="height: 200px;object-fit:cover; max-width: 260px;">
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> 
                    </form>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
@endsection
@section('js')
<script>
    $(document).on('click', '.ui-button', function() {
            // let id = $(this).data('id');
            $('.form-input').removeClass('hidden');
            $('.ui-button').addClass('hidden');
    });
    $(document).ready(function() {
        $('.nameChange').on('input', function() {
            let language = $(this).data('lg');
            let name = $('.nameChange.'+language).val();
            $('.changeTitle_'+language).val(name);
            $('.resultTitle_'+language).val(name);
        });
    });
    $(document).ready(function() {
        $('.changeAlias1').on('input', function() {
            let language = $(this).data('lg');
            let name = $('.changeAlias1.'+language).val();
            let slug = createSlug(name);
            $('.resultSlug2_'+language).val(slug);
            $('.resultUrl_'+language).val(slug);
        });
    });
    $(document).ready(function() {
        $('.changeAlias2').on('input', function() {
            let language = $(this).data('lg');
            let name = $('.changeAlias2.'+language).val();
            let slug = createSlug(name);
            $('.resultSlug1_'+language).val(slug);
            $('.resultUrl_'+language).val(slug);
        });
    });
    $(document).ready(function() {
        $('.changeTitle').on('input', function() {
            let language = $(this).data('lg');
            let name = $('.changeTitle.'+language).val();
            // let slug = createSlug(name);
            $('.resultTitle_'+language).val(name);
        });
    });
    $(document).ready(function() {
        $('.changeDescription').on('change', function() {

            let language = $(this).data('lg');
            let name = document.getElementById("changeDescription_"+language);
            let div = document.getElementById("resultDescription_"+language);
            // alert(name.value);
            // let slug = createSlug(name);
            //$('.resultDescription').val(name.value);
            div.innerHTML = name.value;
        });
    });

    function createSlug(name) {
        return name
            // Loại bỏ khoảng trắng đầu và cuối chuỗi
            .trim()
            .toLowerCase()
            // Loại bỏ dấu gạch ngang ở đầu và cuối chuỗi
            .replace(/^-+|-+$/g, '')
            //Đổi ký tự có dấu thành không dấu
            .replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a')
            .replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e')
            .replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i')
            .replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o')
            .replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u')
            .replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y')
            .replace(/đ/gi, 'd')
            //Xóa các ký tự đặt biệt
            .replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '')
            //Đổi khoảng trắng thành ký tự gạch ngang
            .replace(/ /gi, "-")
            //Đổi nhiều ký tự gạch ngang liên tiếp thành 1 ký tự gạch ngang
            //Phòng trường hợp người nhập vào quá nhiều ký tự trắng
            .replace(/\-\-\-\-\-/gi, '-')
            .replace(/\-\-\-\-/gi, '-')
            .replace(/\-\-\-/gi, '-')
            .replace(/\-\-/gi, '-');
    }
</script>
@endsection
