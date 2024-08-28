@extends('admin.layouts.main')
@section('title', 'Thêm bài viết')
@section('css')
@endsection
@section('content')
    <div class="content-wrapper">
        @include('admin.partials.content-header', ['name' => 'Bài viết', 'key' => 'Thêm bài viết'])
        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        @if (session('alert'))
                            <div class="alert alert-success">
                                {{ session('alert') }}
                            </div>
                        @elseif(session('error'))
                            <div class="alert alert-warning">
                                {{ session('error') }}
                            </div>
                        @endif
                        <form class="form-horizontal" action="{{ route('admin.post.store') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card card-outline card-primary">
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
                                        <div class="col-md-9">
                                            <div class="card card-outline card-primary">
                                                <div class="card-header">
                                                    <h3 class="card-title">Thông tin bài viết</h3>
                                                </div>
                                                <div class="card-body table-responsive p-3">
                                                    <ul class="nav nav-tabs">
                                                        <li class="nav-item">
                                                            <a class="nav-link active" data-toggle="tab"
                                                                href="#tong_quan">Tổng quan</a>
                                                        </li>
                                                        <!-- <li class="nav-item">
                                                                <a class="nav-link" data-toggle="tab" href="#du_lieu">Dữ liệu</a>
                                                                </li> -->
                                                        {{-- <li class="nav-item">
                                                        <a class="nav-link" data-toggle="tab" href="#hinh_anh">Hình ảnh</a>
                                                        </li>
                                                        <li class="nav-item">
                                                        <a class="nav-link" data-toggle="tab" href="#seo">Seo</a>
                                                        </li> --}}
                                                    </ul>

                                                    <div class="tab-content pl-3 pr-3">
                                                        <!-- START Tổng Quan -->
                                                        <div id="tong_quan"
                                                            class="container tab-pane active wrapChangeSlug"><br>

                                                            <ul class="nav nav-tabs">
                                                                @foreach ($langConfig as $langItem)
                                                                    <li class="nav-item">
                                                                        <a class="nav-link {{ $langItem['value'] == $langDefault ? 'active' : '' }}"
                                                                            data-toggle="tab"
                                                                            href="#tong_quan_{{ $langItem['value'] }}">{{ $langItem['name'] }}</a>
                                                                    </li>
                                                                @endforeach

                                                            </ul>
                                                            <div class="tab-content">
                                                                @foreach ($langConfig as $langItem)
                                                                    <div id="tong_quan_{{ $langItem['value'] }}"
                                                                        class="container wrapChangeSlug tab-pane {{ $langItem['value'] == $langDefault ? 'active show' : '' }} fade">
                                                                        <div class="form-group">
                                                                            <div class="row">
                                                                                <label class="col-sm-2 control-label"
                                                                                    for="">Tên bài viết</label>
                                                                                <div class="col-sm-10">
                                                                                    <input type="text"
                                                                                        class="form-control nameChangeSlug {{ $langItem['value'] }}
                                                                                @error('name_' . $langItem['value']) is-invalid @enderror"
                                                                                        id="name_{{ $langItem['value'] }}"
                                                                                        data-lg="{{ $langItem['value'] }}"
                                                                                        value="{{ old('name_' . $langItem['value']) }}"
                                                                                        name="name_{{ $langItem['value'] }}"
                                                                                        placeholder="Nhập tên bài viết">
                                                                                    @error('name_' . $langItem['value'])
                                                                                        <div class="invalid-feedback d-block">
                                                                                            {{ $message }}</div>
                                                                                    @enderror
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <div class="row">
                                                                                <label class="col-sm-2 control-label"
                                                                                    for="">Slug</label>
                                                                                <div class="col-sm-10">
                                                                                    <input type="text"
                                                                                        class="form-control resultSlug_{{ $langItem['value'] }} changeAlias1 {{ $langItem['value'] }}
                                                                                @error('slug_' . $langItem['value']) is-invalid  @enderror"
                                                                                        id="slug_{{ $langItem['value'] }}"
                                                                                        data-lg="{{ $langItem['value'] }}"
                                                                                        value="{{ old('slug_' . $langItem['value']) }}"
                                                                                        name="slug_{{ $langItem['value'] }}"
                                                                                        placeholder="Nhập slug">
                                                                                    @error('slug_' . $langItem['value'])
                                                                                        <div class="invalid-feedback d-block">
                                                                                            {{ $message }}</div>
                                                                                    @enderror
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <div class="row">
                                                                                <label class="col-sm-2 control-label"
                                                                                    for="">Nhập giới thiệu</label>
                                                                                <div class="col-sm-10">
                                                                                    <textarea class="form-control tinymce_editor_init @error('description_' . $langItem['value']) is-invalid @enderror"
                                                                                        name="description_{{ $langItem['value'] }}" id="description_{{ $langItem['value'] }}" rows="3"
                                                                                        placeholder="Nhập giới thiệu">{{ old('description_' . $langItem['value']) }}</textarea>
                                                                                    @error('description_' .
                                                                                        $langItem['value'])
                                                                                        <div class="invalid-feedback d-block">
                                                                                            {{ $message }}</div>
                                                                                    @enderror
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        {{-- <div class="form-group">
                                                                        <div class="row">
                                                                            <label class="col-sm-2 control-label"
                                                                                for="">Nhập
                                                                                Mã Schema</label>
                                                                            <div class="col-sm-10">
                                                                                <textarea class="form-control  @error('code_schema_' . $langItem['value']) is-invalid @enderror"
                                                                                    name="code_schema_{{ $langItem['value'] }}" id="" rows="3" placeholder="Nhập mã schema">{{ old('code_schema_' . $langItem['value']) }}</textarea>
                                                                                @error('code_schema_' . $langItem['value'])
                                                                                    <div class="invalid-feedback d-block">
                                                                                        {{ $message }}</div>
                                                                                @enderror
                                                                            </div>
                                                                        </div>
                                                                    </div> --}}
                                                                        <div class="form-group">
                                                                            <div class="row">
                                                                                <label class="col-sm-2 control-label"
                                                                                    for="">Nhập nội dung</label>
                                                                                <div class="col-sm-10">
                                                                                    <textarea class="form-control tinymce_editor_init @error('content_' . $langItem['value']) is-invalid  @enderror"
                                                                                        name="content_{{ $langItem['value'] }}" id="ckeditor" rows="20" value="" placeholder="Nhập nội dung">
                                                                                {{ old('content_' . $langItem['value']) }}
                                                                                </textarea>
                                                                                    @error('content_' . $langItem['value'])
                                                                                        <div class="invalid-feedback d-block">
                                                                                            {{ $message }}</div>
                                                                                    @enderror
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <div class="row">
                                                                                <label class="col-sm-2 control-label"
                                                                                    for="">Nhập tags</label>
                                                                                <div class="col-sm-10">

                                                                                    <select
                                                                                        class="form-control tag-select-choose w-100"
                                                                                        multiple="multiple"
                                                                                        name="tags_{{ $langItem['value'] }}[]">
                                                                                        @if (old('tags_' . $langItem['value']))
                                                                                            @foreach (old('tags_' . $langItem['value']) as $tag)
                                                                                                <option
                                                                                                    value="{{ $tag }}"
                                                                                                    selected>
                                                                                                    {{ $tag }}
                                                                                                </option>
                                                                                            @endforeach
                                                                                        @endif
                                                                                    </select>
                                                                                    @error('tags')
                                                                                        <div class="invalid-feedback d-block">
                                                                                            {{ $message }}</div>
                                                                                    @enderror
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <div class="row">
                                                                                <label class="col-sm-2 control-label"
                                                                                    for="">Nhập
                                                                                    title seo</label>
                                                                                <div class="col-sm-10">
                                                                                    <input type="text"
                                                                                        class="form-control @error('title_seo_' . $langItem['value']) is-invalid @enderror"
                                                                                        id=""
                                                                                        value="{{ old('title_seo_' . $langItem['value']) }}"
                                                                                        name="title_seo_{{ $langItem['value'] }}"
                                                                                        placeholder="Nhập title seo">
                                                                                    @error('title_seo_' .
                                                                                        $langItem['value'])
                                                                                        <div class="invalid-feedback d-block">
                                                                                            {{ $message }}</div>
                                                                                    @enderror
                                                                                    <div class="invalid-feedback2 d-block"
                                                                                        id="title_seo_{{ $langItem['value'] }}">
                                                                                        (META title <span
                                                                                            id="da-nhap-title">70</span>
                                                                                        ký tự
                                                                                        và từ)
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                        </div>

                                                                        <div class="form-group">
                                                                            <div class="row">
                                                                                <label class="col-sm-2 control-label"
                                                                                    for="">Nhập mô
                                                                                    tả seo</label>
                                                                                <div class="col-sm-10">
                                                                                    <input type="text"
                                                                                        class="form-control @error('description_seo_' . $langItem['value']) is-invalid @enderror"
                                                                                        id=""
                                                                                        value="{{ old('description_seo_' . $langItem['value']) }}"
                                                                                        name="description_seo_{{ $langItem['value'] }}"
                                                                                        placeholder="Nhập mô tả seo">
                                                                                    @error('description_seo_' .
                                                                                        $langItem['value'])
                                                                                        <div class="invalid-feedback d-block">
                                                                                            {{ $message }}</div>
                                                                                    @enderror
                                                                                    <div class="invalid-feedback2 d-block"
                                                                                        id="description_seo_{{ $langItem['value'] }}">
                                                                                        (Trích lược SEO <span
                                                                                            id="da-nhap-title">160</span>
                                                                                        ký tự
                                                                                        và từ)
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                        </div>
                                                                        <div class="form-group">
                                                                            <div class="row">
                                                                                <label class="col-sm-2 control-label"
                                                                                    for="">Nhập từ
                                                                                    khóa seo</label>
                                                                                <div class="col-sm-10">
                                                                                    <input type="text"
                                                                                        class="form-control @error('keyword_seo_' . $langItem['value']) is-invalid @enderror"
                                                                                        id=""
                                                                                        value="{{ old('keyword_seo_' . $langItem['value']) }}"
                                                                                        name="keyword_seo_{{ $langItem['value'] }}"
                                                                                        placeholder="Nhập từ khóa seo">
                                                                                    @error('keyword_seo_' .
                                                                                        $langItem['value'])
                                                                                        <div class="invalid-feedback d-block">
                                                                                            {{ $message }}</div>
                                                                                    @enderror
                                                                                    <div class="invalid-feedback2 d-block"
                                                                                        id="keyword_seo_{{ $langItem['value'] }}">
                                                                                        (Từ khóa cách nhau bằng dấu phẩy,
                                                                                        tối đa
                                                                                        <span id="da-nhap-title">5</span>
                                                                                        từ khóa)
                                                                                    </div>
                                                                                </div>

                                                                            </div>

                                                                        </div>
                                                                        <div class="form-group">
                                                                            <div class="row">
                                                                                <label class="col-sm-2 control-label"
                                                                                    for="">Đường dẫn /
                                                                                    Alias</label>
                                                                                <div class="col-sm-10">
                                                                                    <div class="next-input--stylized">
                                                                                        <span
                                                                                            class="next-input__add-on next-input__add-on--before"
                                                                                            style="padding-right:0">{{ $url }}/</span>
                                                                                        <input type="text"
                                                                                            class="next-input next-input--invisible resultSlug_{{ $langItem['value'] }} changeAlias2 {{ $langItem['value'] }}
                                                                                    @error('slug_' . $langItem['value']) is-invalid  @enderror"
                                                                                            id="slug_{{ $langItem['value'] }}"
                                                                                            data-lg="{{ $langItem['value'] }}"
                                                                                            value="{{ old('slug_' . $langItem['value']) }}"
                                                                                            name="slug_{{ $langItem['value'] }}">
                                                                                        @error('slug_' . $langItem['value'])
                                                                                            <div
                                                                                                class="invalid-feedback d-block">
                                                                                                {{ $message }}</div>
                                                                                        @enderror
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
                                                        {{-- <div id="hinh_anh" class="container tab-pane fade"><br>
                                                            <div class="wrap-load-image mb-3">
                                                                <div class="form-group">
                                                                    <label for="">Ảnh đại diện</label>
                                                                    <input type="file" class="form-control-file img-load-input border @error('avatar_path')
                                                                    is-invalid
                                                                    @enderror" id="" name="avatar_path">
                                                                    @error('avatar_path')
                                                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                                                    @enderror
                                                                </div>
                                                                <img class="img-load border p-1 w-100" src="{{asset('admin_asset/images/upload-image.png')}}" style="height: 200px;object-fit:cover; max-width: 260px;">
                                                            </div>
                                                        </div> --}}
                                                        <!-- END Hình Ảnh -->

                                                        <!-- START Seo -->
                                                        {{-- <div id="seo" class="container tab-pane fade"><br>
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
                                                                                    <input type="text" class="form-control @error('title_seo_' . $langItem['value']) is-invalid @enderror" id="title_seo" value="{{ old('title_seo_'.$langItem['value']) }}" name="title_seo_{{ $langItem['value'] }}" placeholder="Nhập title seo">
                                                                                    @error('title_seo_' . $langItem['value'])
                                                                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                                                                    @enderror
                                                                                </div>
                                                                            </div>

                                                                        </div>

                                                                        <div class="form-group">
                                                                            <div class="row">
                                                                                <label class="col-sm-2 control-label" for="">Nhập mô tả seo</label>
                                                                                <div class="col-sm-10">
                                                                                    <input type="text" class="form-control @error('description_seo_' . $langItem['value']) is-invalid @enderror" id="description_seo" value="{{ old('description_seo_'.$langItem['value']) }}" name="description_seo_{{ $langItem['value'] }}" placeholder="Nhập mô tả seo">
                                                                                    @error('description_seo_' . $langItem['value'])
                                                                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                                                                    @enderror
                                                                                </div>
                                                                            </div>

                                                                        </div>
                                                                        <div class="form-group">
                                                                            <div class="row">
                                                                                <label class="col-sm-2 control-label" for="">Nhập từ khóa seo</label>
                                                                                <div class="col-sm-10">
                                                                                    <input type="text" class="form-control @error('keyword_seo_' . $langItem['value']) is-invalid @enderror" id="keyword_seo" value="{{ old('keyword_seo_'.$langItem['value']) }}" name="keyword_seo_{{ $langItem['value'] }}" placeholder="Nhập mô tả seo">
                                                                                    @error('keyword_seo_' . $langItem['value'])
                                                                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                                                                    @enderror
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        
                                                                    </div>
                                                                @endforeach
                                                            </div>
                                                        </div> --}}
                                                        <!-- END Seo -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="card card-outline card-primary">
                                                <div class="card-header">
                                                    <h3 class="card-title">Cấu hình bài viết</h3>
                                                </div>
                                                <div class="card-body">
                                                    {{-- <div class="form-group">
                                                        
                                                        <div style="display: none;">
                                                            <select class="form-control custom-select select-2-init @error('category_id')
                                                                is-invalid
                                                                @enderror" id="" value="{{ old('category_id') }}" name="category_id">
                                                                @if (old('category_id'))
                                                                    {!! \App\Models\CategoryPost::getHtmlOption(old('category_id')) !!}
                                                                @else
                                                                {!!$option!!}
                                                                @endif
                                                            </select>
                                                        </div>
                                                        <select class="form-control tag-select-choose w-100" multiple="multiple"   name="category[]">
                                                                @if (old('category_id'))
                                                                    {!! \App\Models\CategoryPost::getHtmlOption(old('category_id')) !!}
                                                                @else
                                                                {!!$option!!}
                                                                @endif
                                                                
                                                        </select>
                                                        @error('category_id')
                                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                                        @enderror
                                                    </div> --}}
                                                    <div class="form-group wrap-permission">
                                                        <div style="border: 1px solid; padding: 5px;">
                                                            <label class="control-label" for="">Lựa chọn chuyên
                                                                mục</label>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div
                                                                        style="height: 250px; overflow: auto;border: 1px solid #eee;font-size: 12px;line-height: 18px;">
                                                                        @foreach ($data->where('active', 1) as $item)
                                                                            <div class="item-permission mt-2 mb-2">
                                                                                <div class="form-check permission-title">
                                                                                    <label class="form-check-label p-2">
                                                                                        <input type="checkbox"
                                                                                            class="form-check-input check-parent"
                                                                                            value="{{ $item->id }}"
                                                                                            name="category[]">
                                                                                        {{ $item->name }}
                                                                                    </label>
                                                                                </div>
                                                                                @if (count($item->childs) > 0)
                                                                                    <div class="list-permission p-2 pl-4">
                                                                                        <div class="row">
                                                                                            @foreach ($item->childs()->with('translationsLanguage')->where('active', 1)->orderBy('order')->get() as $itemChild)
                                                                                                <div
                                                                                                    class="col-lg-12 col-md-12 col-sm-12">
                                                                                                    <div
                                                                                                        class="form-check">
                                                                                                        <label
                                                                                                            class="form-check-label">
                                                                                                            <input
                                                                                                                type="checkbox"
                                                                                                                class="form-check-input check-children"
                                                                                                                name="category[]"
                                                                                                                value="{{ $itemChild->id }}">{{ $itemChild->name }}
                                                                                                        </label>
                                                                                                    </div>
                                                                                                    @if (count($itemChild->childs) > 0)
                                                                                                        <div
                                                                                                            class="row">
                                                                                                            @foreach ($itemChild->childs()->with('translationsLanguage')->where('active', 1)->orderBy('order')->get() as $itemChild2)
                                                                                                                <div
                                                                                                                    class="col-lg-12 col-md-12 col-sm-12">
                                                                                                                    <div
                                                                                                                        class="form-check pl-5">
                                                                                                                        <label
                                                                                                                            class="form-check-label">
                                                                                                                            <input
                                                                                                                                type="checkbox"
                                                                                                                                class="form-check-input check-children"
                                                                                                                                name="category[]"
                                                                                                                                value="{{ $itemChild2->id }}">{{ $itemChild2->name }}
                                                                                                                        </label>
                                                                                                                    </div>
                                                                                                                    @if (count($itemChild2->childs) > 0)
                                                                                                                        <div
                                                                                                                            class="row">
                                                                                                                            @foreach ($itemChild2->childs()->with('translationsLanguage')->where('active', 1)->orderBy('order')->get() as $itemChild3)
                                                                                                                                <div
                                                                                                                                    class="col-lg-12 col-md-12 col-sm-12">
                                                                                                                                    <div class="form-check pl-5"
                                                                                                                                        style="padding-left: 4rem!important;">
                                                                                                                                        <label
                                                                                                                                            class="form-check-label">
                                                                                                                                            <input
                                                                                                                                                type="checkbox"
                                                                                                                                                class="form-check-input check-children"
                                                                                                                                                name="category[]"
                                                                                                                                                value="{{ $itemChild3->id }}">{{ $itemChild3->name }}
                                                                                                                                        </label>
                                                                                                                                    </div>
                                                                                                                                </div>
                                                                                                                            @endforeach
                                                                                                                        </div>
                                                                                                                    @endif
                                                                                                                </div>
                                                                                                            @endforeach
                                                                                                        </div>
                                                                                                    @endif
                                                                                                </div>
                                                                                            @endforeach
                                                                                        </div>
                                                                                    </div>
                                                                                @endif
                                                                            </div>
                                                                        @endforeach
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                {{-- <div class="select-category-s wrap-permission">
                                                        <div style="border: 1px solid;">
                                                            <label class="control-label" for="">Lựa chọn chuyên mục <i class="fa fa-angle-down list-prd-sb-3"></i></label>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="tabs">
                                                                        <div class="tablinks active" data-electronic="tatcachuyenmuc">Tất cả chuyên mục</div>
                                                                        <div class="tablinks" data-electronic="dungnhieunhat">Dùng nhiều nhất</div>
                                                                    </div>

                                                                    <!-- Tab content -->
                                                                    <div class="wrapper_tabcontent">
                                                                        <div id="tatcachuyenmuc" class="tabcontent active">
                                                                            @foreach ($data as $item)
                                                                            <div class="check-chuyenmuc">
                                                                                <div class="form-checkchuyenmuc">
                                                                                    <div class="item_checkchuyenmuc check-{{ $item->id }}">
                                                                                        <input type="checkbox" class="form-check-input check-parent" value="{{ $item->id }}" name="category[]">
                                                                                        {{ $item->name }}
                                                                                        @if (count($item->childs) > 0)
                                                                                        <i class="fa fa-angle-down list-prd-sb-3" data-id="{{ $item->id }}"></i>
                                                                                        @endif
                                                                                    </div>
                                                                                </div>
                                                                                @if (count($item->childs) > 0)
                                                                                <div class="chuyenmuc-c2 caccap-chuyenmuc check-chuyen-muc-{{ $item->id }}">
                                                                                    @foreach ($item->childs()->with('translationsLanguage')->where('active', 1)->orderBy('order')->get() as $itemChild)
                                                                                    <div class="form-checkchuyenmuc">
                                                                                        <div class="item_checkchuyenmuc check-{{ $itemChild->id }}">
                                                                                            <input type="checkbox" class="form-check-input check-children"  name="category[]" value="{{ $itemChild->id }}">{{ $itemChild->name }}
                                                                                            @if (count($itemChild->childs) > 0)
                                                                                            <i class="fa fa-angle-down list-prd-sb-3" data-id="{{ $itemChild->id }}"></i>
                                                                                            @endif
                                                                                        </div>
                                                                                    </div>
                                                                                        @if (count($itemChild->childs) > 0)
                                                                                        <div class="chuyenmuc-c3 caccap-chuyenmuc check-chuyen-muc-{{ $itemChild->id }}">
                                                                                            @foreach ($itemChild->childs()->with('translationsLanguage')->where('active', 1)->orderBy('order')->get() as $itemChild2)
                                                                                            <div class="form-checkchuyenmuc">
                                                                                                <div class="item_checkchuyenmuc check-{{ $itemChild2->id }}">
                                                                                                    <input type="checkbox" class="form-check-input check-children"  name="category[]" value="{{ $itemChild2->id }}"
                                                                                                    >{{ $itemChild2->name }}
                                                                                                    @if (count($itemChild2->childs) > 0)
                                                                                                    <i class="fa fa-angle-down list-prd-sb-3" data-id="{{ $itemChild2->id }}"></i>
                                                                                                    @endif
                                                                                                </div>
                                                                                            </div>
                                                                                            @endforeach
                                                                                        </div>
                                                                                        @endif
                                                                                    @endforeach
                                                                                </div>
                                                                                @endif
                                                                            </div>
                                                                            @endforeach
                                                                        </div>

                                                                        <div id="dungnhieunhat" class="tabcontent">
                                                                            @foreach ($data_dungNhieu as $item)
                                                                            <div class="check-chuyenmuc">
                                                                                <div class="form-checkchuyenmuc">
                                                                                    <div class="item_checkchuyenmuc check-{{ $item->id }}">
                                                                                        <input type="checkbox" class="form-check-input check-parent" value="{{ $item->id }}" name="category[]">
                                                                                        {{ $item->name }}
                                                                                        @if (count($item->childs) > 0)
                                                                                        <i class="fa fa-angle-down list-prd-sb-3" data-id="{{ $item->id }}"></i>
                                                                                        @endif
                                                                                    </div>
                                                                                </div>
                                                                                @if (count($item->childs) > 0)
                                                                                <div class="chuyenmuc-c2 caccap-chuyenmuc check-chuyen-muc-{{ $item->id }}">
                                                                                    @foreach ($item->childs()->with('translationsLanguage')->where('active', 1)->orderBy('order')->get() as $itemChild)
                                                                                    <div class="form-checkchuyenmuc">
                                                                                        <div class="item_checkchuyenmuc check-{{ $itemChild->id }}">
                                                                                            <input type="checkbox" class="form-check-input check-children"  name="category[]" value="{{ $itemChild->id }}">{{ $itemChild->name }}
                                                                                            @if (count($itemChild->childs) > 0)
                                                                                            <i class="fa fa-angle-down list-prd-sb-3" data-id="{{ $itemChild->id }}"></i>
                                                                                            @endif
                                                                                        </div>
                                                                                    </div>
                                                                                        @if (count($itemChild->childs) > 0)
                                                                                        <div class="chuyenmuc-c3 caccap-chuyenmuc check-chuyen-muc-{{ $itemChild->id }}">
                                                                                            @foreach ($itemChild->childs()->with('translationsLanguage')->where('active', 1)->orderBy('order')->get() as $itemChild2)
                                                                                            <div class="form-checkchuyenmuc">
                                                                                                <div class="item_checkchuyenmuc check-{{ $itemChild2->id }}">
                                                                                                    <input type="checkbox" class="form-check-input check-children"  name="category[]" value="{{ $itemChild2->id }}"
                                                                                                    >{{ $itemChild2->name }}
                                                                                                    @if (count($itemChild2->childs) > 0)
                                                                                                    <i class="fa fa-angle-down list-prd-sb-3" data-id="{{ $itemChild2->id }}"></i>
                                                                                                    @endif
                                                                                                </div>
                                                                                            </div>
                                                                                            @endforeach
                                                                                        </div>
                                                                                        @endif
                                                                                    @endforeach
                                                                                </div>
                                                                                @endif
                                                                            </div>
                                                                            @endforeach
                                                                        </div>

                                                                        
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div> --}}

                                                {{-- <div class="form-group  mb-1">
                                                        <div class="form-check-inline">
                                                            <label class="form-check-label">
                                                                <input type="checkbox" class="form-check-input @error('tt_tuyen_truyen') is-invalid @enderror" value="1" name="tt_tuyen_truyen" @if (old('tt_tuyen_truyen') === '1') {{'checked'}} @endif>
                                                                    Thông tin tuyên truyền
                                                            </label>
                                                        </div>
                                                        @error('tt_tuyen_truyen')
                                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                                        @enderror
                                                    </div> --}}
                                                {{-- <div class="form-group">
                                                        <label class="control-label" for="">Số lượt xem ban đầu</label>
                                                        <input type="number" min="0" class="form-control  @error('view_start') is-invalid  @enderror" value="{{ old('view_start') }}" name="view_start" placeholder="Nhập số view bắt đầu">
                                                        @error('view_start')
                                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                                        @enderror
                                                    </div> --}}

                                                <div class="wrap-load-image mb-3">
                                                    <div class="form-group">
                                                        <label for="">Ảnh đại diện</label>
                                                        <input type="file"
                                                            class="form-control-file img-load-input border @error('avatar_path') is-invalid @enderror"
                                                            id="" name="avatar_path">
                                                        <!-- Select avatar -->
                                                        <input type="hidden" name="avatar_path_select"
                                                            id="avatar_path_select">
                                                        {{-- <a href="javascript:void(0)" onClick="openSelectAvatarModal()">Chọn từ thư viện</a> --}}
                                                        <!--/ Select avatar -->
                                                        @error('avatar_path')
                                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                    <img class="img-load border p-1 w-100" id="img_avatar_path"
                                                        src="{{ asset('admin_asset/images/upload-image.png') }}"
                                                        style="height: 200px;object-fit:cover; max-width: 260px;">
                                                    <!-- Add delete image button -->
                                                    {{--                                                        <button type="button" class="btn btn-danger mt-2" id="btn_delete_avatar">Xóa ảnh</button> --}}
                                                </div>


                                                <div class="form-group">
                                                    <label class="control-label" for="">Số thứ tự</label>
                                                    <input type="number" min="0"
                                                        class="form-control  @error('order') is-invalid  @enderror"
                                                        value="{{ old('order') }}" name="order"
                                                        placeholder="Nhập số thứ tự">
                                                    @error('order')
                                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                {{-- <div class="form-group">
                                                        <label for="">File tài liệu</label>
                                                        <input type="file" class="form-control-file border @error('file')
                                                        is-invalid
                                                        @enderror" id="" name="file_path">
                                                        @error('file_path')
                                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                                        @enderror
                                                    </div> --}}

                                                <div class="form-group">
                                                    {{-- placeholder="dd-mm-yyyy h:i:s" --}}
                                                    <label for="">Tự đặt ngày đăng</label>
                                                    <input type="datetime-local"
                                                        class="form-control  @error('created_at')
                                                        is-invalid
                                                        @enderror"
                                                        id="" name="created_at"
                                                        value="{{ old('created_at') }}">
                                                    @error('created_at')
                                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                                    @enderror
                                                </div>


                                                {{-- <div class="form-group mb-1">
                                                        <div class="form-check-inline">
                                                            <label class="form-check-label">
                                                                <input type="checkbox" class="form-check-input @error('hot_new')
                                                                    is-invalid
                                                                    @enderror" value="1" name="hot_new" @if (old('hot_new') === '1') {{'checked'}} @endif>
                                                                    Tin hot
                                                            </label>
                                                        </div>
                                                        @error('hot_new')
                                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group  mb-1">
                                                        <div class="form-check-inline">
                                                            <label class="form-check-label">
                                                                <input type="checkbox" class="form-check-input @error('tin_cap_nhat')
                                                                    is-invalid
                                                                    @enderror" value="1" name="tin_cap_nhat" @if (old('tin_cap_nhat') === '1') {{'checked'}} @endif>
                                                                    Tin tức cập nhật
                                                            </label>
                                                        </div>
                                                        @error('tin_cap_nhat')
                                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                                        @enderror
                                                    </div> --}}
                                                <div class="form-group  mb-1">
                                                    <div class="form-check-inline">
                                                        <label class="form-check-label">
                                                            <input type="checkbox"
                                                                class="form-check-input @error('hot')
                                                                    is-invalid
                                                                    @enderror"
                                                                value="1" name="hot"
                                                                @if (old('hot') === '1') {{ 'checked' }} @endif>
                                                            Tin nổi bật
                                                        </label>
                                                    </div>
                                                    @error('hot')
                                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                                    @enderror
                                                </div>


                                                {{-- <div class="form-group  mb-1">
                                                        <div class="form-check-inline">
                                                            <label class="form-check-label">
                                                                <input type="checkbox" class="form-check-input @error('nhan')
                                                                    is-invalid
                                                                    @enderror" value="1" name="nhan" @if (old('nhan') === '1') {{'checked'}} @endif>
                                                                    Hiện logo tcktkt
                                                            </label>
                                                        </div>
                                                        @error('nhan')
                                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                                        @enderror
                                                    </div>

                                                    <div class="form-group mb-1">
                                                        <div class="form-check-inline">
                                                            <label class="form-check-label">
                                                                <input type="checkbox" class="form-check-input @error('save_tam')
                                                                    is-invalid
                                                                    @enderror" value="1" name="save_tam" @if (old('save_tam') === '1') {{'checked'}} @endif>
                                                                    Lưu tạm (bản nháp)
                                                            </label>
                                                        </div>
                                                        @error('save_tam')
                                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                                        @enderror
                                                    </div> --}}

                                                <div class="form-group">
                                                    <label class="control-label" for="">Trạng thái</label>
                                                    <div class="form-check-inline">
                                                        <label class="form-check-label">
                                                            <input type="radio" class="form-check-input" value="1"
                                                                name="active"
                                                                @if (old('active') === '1' || old('active') === null) {{ 'checked' }} @endif>Hiện
                                                        </label>
                                                    </div>
                                                    <div class="form-check-inline">
                                                        <label class="form-check-label">
                                                            <input type="radio" class="form-check-input" value="0"
                                                                @if (old('active') === '0') {{ 'checked' }} @endif
                                                                name="active">Ẩn
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
                            <div class="col-md-12">
                                <div class="card card-outline card-primary">
                                    <div class="card-header">
                                        <h3 class="card-title w-100">Thêm mục lục <a
                                                data-url="{{ route('admin.post.loadParagraphPost') }}"
                                                class="btn  btn-info btn-md float-right " id="addParagraph">+ Thêm mục
                                                lục</a></h3>
                                    </div>
                                    <div class="card-body table-responsive p-3">
                                        <div class="wrap-paragraph">
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th style="width:calc(100% - 50px);">Nhập thông tin mục lục</th>
                                                        <th style="width:50px;">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    @if (old('typeParagraph') && old('typeParagraph'))
                                                        @foreach (old('typeParagraph') as $key => $value)
                                                            <tr class="paragraph">
                                                                <td class="" style="width:calc(100% - 50px);">
                                                                    <div class="row">
                                                                        <div class="col-md-9">
                                                                            <ul class="nav nav-tabs">
                                                                                @foreach ($langConfig as $langItem)
                                                                                    <li class="nav-item">
                                                                                        <a class="nav-link {{ $langItem['value'] == $langDefault ? 'active' : '' }}"
                                                                                            data-toggle="tab"
                                                                                            href="#thong_tin_paragraph_{{ $key . $langItem['value'] }}">{{ $langItem['name'] }}</a>
                                                                                    </li>
                                                                                @endforeach
                                                                            </ul>
                                                                            <div class="tab-content">
                                                                                @foreach ($langConfig as $langItem)
                                                                                    <div id="thong_tin_paragraph_{{ $key . $langItem['value'] }}"
                                                                                        class="container tab-pane {{ $langItem['value'] == $langDefault ? 'active show' : '' }} fade">
                                                                                        <div class="form-group">
                                                                                            <div class="row">
                                                                                                <label
                                                                                                    class="col-sm-2 control-label"
                                                                                                    for="">Tên
                                                                                                    đoạn</label>
                                                                                                <div class="col-sm-10">
                                                                                                    <input type="text"
                                                                                                        class="form-control @error('nameParagraph_' . $langItem['value'] . '.' . $key) is-invalid @enderror"
                                                                                                        value="{{ old('nameParagraph_' . $langItem['value'])[$key] }}"
                                                                                                        name="nameParagraph_{{ $langItem['value'] }}[]"
                                                                                                        placeholder="Nhập tên"
                                                                                                        required>
                                                                                                    @error('nameParagraph_'
                                                                                                        . $langItem['value'] .
                                                                                                        '.' . $key)
                                                                                                        <div
                                                                                                            class="invalid-feedback d-block">
                                                                                                            {{ $message }}
                                                                                                        </div>
                                                                                                    @enderror
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="form-group">
                                                                                            <div class="row">
                                                                                                <label
                                                                                                    class="col-sm-2 control-label"
                                                                                                    for="">Nhập nội
                                                                                                    dung đoạn</label>
                                                                                                <div class="col-sm-10">
                                                                                                    <textarea
                                                                                                        class="form-control tinymce_editor_init @error('valueParagraph_' . $langItem['value'] . '.' . $key) is-invalid  @enderror"
                                                                                                        name="valueParagraph_{{ $langItem['value'] }}[]" id="ckeditor2" rows="15" value=""
                                                                                                        placeholder="Nhập nội dung đoạn văn">{{ old('valueParagraph_' . $langItem['value'])[$key] }}</textarea>
                                                                                                    @error('valueParagraph_'
                                                                                                        . $langItem['value'] .
                                                                                                        '.' . $key)
                                                                                                        <div
                                                                                                            class="invalid-feedback d-block">
                                                                                                            {{ $message }}
                                                                                                        </div>
                                                                                                    @enderror
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                @endforeach
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-3">
                                                                            <div class="wrap-load-image mb-3">
                                                                                <div class="form-group">
                                                                                    <label for="">Ảnh đại
                                                                                        diện</label>
                                                                                    <input type="file"
                                                                                        class="form-control-file img-load-input border"
                                                                                        id=""
                                                                                        name="image_path_paragraph[]">
                                                                                </div>
                                                                                <img class="img-load border p-1 w-100"
                                                                                    src="{{ asset('admin_asset/images/upload-image.png') }}"
                                                                                    style="height: 150px;object-fit:cover; max-width: 200px;">
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <div class="row">
                                                                                    <label class="col-sm-4 control-label"
                                                                                        for="">Chọn kiểu</label>
                                                                                    <div class="col-sm-8">
                                                                                        <select class="form-control"
                                                                                            id="" value=""
                                                                                            name="typeParagraph[]"
                                                                                            required>
                                                                                            <option value="">--- Chọn
                                                                                                kiểu đoạn ---</option>
                                                                                            @foreach (config('paragraph.posts') as $keyC => $valueC)
                                                                                                <option
                                                                                                    value="{{ $keyC }}"
                                                                                                    {{ old('typeParagraph')[$key] == $keyC ? 'selected' : '' }}>
                                                                                                    {{ $valueC }}
                                                                                                </option>
                                                                                            @endforeach
                                                                                        </select>
                                                                                        @error('typeParagraph.' . $key)
                                                                                            <div
                                                                                                class="invalid-feedback d-block">
                                                                                                {{ $message }}</div>
                                                                                        @enderror
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                            <div class="form-group">
                                                                                <div class="row">
                                                                                    <label class="col-sm-4 control-label"
                                                                                        for="">Số thứ tự</label>
                                                                                    <div class="col-sm-8">
                                                                                        <input type="number"
                                                                                            min="0"
                                                                                            class="form-control"
                                                                                            value="{{ old('orderParagraph')[$key] }}"
                                                                                            name="orderParagraph[]"
                                                                                            placeholder="Nhập số thứ tự">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <div class="row">
                                                                                    <label class="col-sm-4 control-label"
                                                                                        for="">Trạng thái</label>
                                                                                    <div class="col-sm-8">
                                                                                        <div class="form-check-inline">
                                                                                            <label
                                                                                                class="form-check-label">
                                                                                                <input type="checkbox"
                                                                                                    class="form-check-input checkParagraph"
                                                                                                    value="1"
                                                                                                    name="activeParagraph[]"
                                                                                                    {{ old('activeParagraph')[$key] == 1 ? 'checked' : '' }}>Hiện
                                                                                            </label>
                                                                                        </div>
                                                                                        <div class="form-check-inline">
                                                                                            <label
                                                                                                class="form-check-label">
                                                                                                <input type="checkbox"
                                                                                                    class="form-check-input checkParagraph"
                                                                                                    value="0"
                                                                                                    name="activeParagraph[]"
                                                                                                    {{ old('activeParagraph')[$key] == 0 ? 'checked' : '' }}>Ẩn
                                                                                            </label>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td style="width:50px;">
                                                                    <a class="btn btn-sm btn-danger deleteParagraph"><i
                                                                            class="far fa-trash-alt"></i></a>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    @else
                                                    @endif
                                                </tbody>
                                            </table>
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
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const imgInput = document.querySelector('input[name="avatar_path"]');
            const imgSelect = document.querySelector('#avatar_path_select');
            const imgPreview = document.querySelector('#img_avatar_path');
            const btnDeleteAvatar = document.querySelector('#btn_delete_avatar');

            // Xử lý sự kiện khi người dùng chọn ảnh
            imgInput.addEventListener('change', function() {
                const file = this.files[0];
                if (file) {
                    const reader = new FileReader();

                    reader.addEventListener('load', function() {
                        imgPreview.src = reader.result;
                    });

                    reader.readAsDataURL(file);
                }
            });

            // Xử lý sự kiện khi người dùng nhấn nút xóa ảnh
            btnDeleteAvatar.addEventListener('click', function() {
                imgInput.value = ''; // Xóa giá trị trong input file
                imgSelect.value = ''; // Xóa giá trị trong input hidden
                imgPreview.src =
                    '{{ asset('admin_asset/images/upload-image.png') }}'; // Đặt lại ảnh mặc định
            });
        });
    </script>

    <script>
        // Lấy slug theo name
        $(document).ready(function() {
            $('.nameChangeSlug').on('input', function() {
                let language = $(this).data('lg');
                let name = $('.nameChangeSlug.' + language).val();
                let slug = createSlug(name);
                $('.resultSlug_' + language).val(slug);
            });
        });
        $(document).ready(function() {
            $('.changeAlias1').on('input', function() {
                let language = $(this).data('lg');
                let name = $('.changeAlias1.' + language).val();
                let slug = createSlug(name);
                $('.resultSlug_' + language).val(slug);
            });
        });
        $(document).ready(function() {
            $('.changeAlias2').on('input', function() {
                let language = $(this).data('lg');
                let name = $('.changeAlias2.' + language).val();
                let slug = createSlug(name);
                $('.resultSlug_' + language).val(slug);
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
    <script>
        $('.nameChangeSlug').on('keyup', function() {
            let language = $(this).data('lg');
            var value = $(this).val();
            $('#title_seo_' + language).val(value);
            $('#description_seo_' + language).val(value);
            $('input[name="keyword_seo_' + language + '"]').val(value);
        });
    </script>
    @foreach (config('languages.supported') as $langItem)
        <script>
            $(document).ready(function() {
                $("input[name='name_{{ $langItem['value'] }}']").keyup(function() {
                    // Lấy giá trị của input
                    var name = $(this).val();
                    $("input[name='title_seo_{{ $langItem['value'] }}']").val(name);
                    $("input[name='description_seo_{{ $langItem['value'] }}']").val(name);
                });
            });
        </script>
    @endforeach
@endsection
