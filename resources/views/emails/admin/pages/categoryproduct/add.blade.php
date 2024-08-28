@extends('admin.layouts.main')
@section('title', 'Thêm danh mục')
@section('content')
    <div class="content-wrapper">
        @include('admin.partials.content-header', ['name' => 'Danh mục', 'key' => 'Thêm danh mục'])
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
                        <form class="form-horizontal" action="{{ route('admin.categoryproduct.store') }}" method="POST"
                            enctype="multipart/form-data">
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
                                                    <a class="nav-link active" data-toggle="tab" href="#tong_quan">Tổng
                                                        quan</a>
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

                                            <div class="tab-content">
                                                <!-- START Tổng Quan -->
                                                <div id="tong_quan" class="container tab-pane active wrapChangeSlug"><br>

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
                                                                            for="">Tên danh mục</label>
                                                                        <div class="col-sm-10">
                                                                            <input type="text"
                                                                                class="form-control nameChangeSlug {{ $langItem['value'] }}
                                                                @error('name_' . $langItem['value']) is-invalid @enderror"
                                                                                id="name_{{ $langItem['value'] }}"
                                                                                value="{{ old('name_' . $langItem['value']) }}"
                                                                                name="name_{{ $langItem['value'] }}"
                                                                                data-lg="{{ $langItem['value'] }}"
                                                                                placeholder="Nhập tên danh mục">
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
                                                                                value="{{ old('slug_' . $langItem['value']) }}"
                                                                                name="slug_{{ $langItem['value'] }}"
                                                                                data-lg="{{ $langItem['value'] }}"
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
                                                                            <textarea class="form-control  @error('description_' . $langItem['value']) is-invalid @enderror"
                                                                                name="description_{{ $langItem['value'] }}" id="" rows="3" placeholder="Nhập giới thiệu">{{ old('description_' . $langItem['value']) }}</textarea>
                                                                            @error('description_' . $langItem['value'])
                                                                                <div class="invalid-feedback d-block">
                                                                                    {{ $message }}</div>
                                                                            @enderror
                                                                        </div>
                                                                    </div>
                                                                </div>
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
                                                                            for="">Nhập
                                                                            title seo</label>
                                                                        <div class="col-sm-10">
                                                                            <input type="text"
                                                                                class="form-control @error('title_seo_' . $langItem['value']) is-invalid @enderror"
                                                                                id=""
                                                                                value="{{ old('title_seo_' . $langItem['value']) }}"
                                                                                name="title_seo_{{ $langItem['value'] }}"
                                                                                placeholder="Nhập title seo">
                                                                            @error('title_seo_' . $langItem['value'])
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
                                                                            @error('description_seo_' . $langItem['value'])
                                                                                <div class="invalid-feedback d-block">
                                                                                    {{ $message }}</div>
                                                                            @enderror
                                                                            <div class="invalid-feedback2 d-block"
                                                                                id="description_seo_{{ $langItem['value'] }}">
                                                                                (Trích lược SEO <span
                                                                                    id="da-nhap-title">160</span> ký tự
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
                                                                            @error('keyword_seo_' . $langItem['value'])
                                                                                <div class="invalid-feedback d-block">
                                                                                    {{ $message }}</div>
                                                                            @enderror
                                                                            <div class="invalid-feedback2 d-block"
                                                                                id="keyword_seo_{{ $langItem['value'] }}">
                                                                                (Từ khóa cách nhau bằng dấu phẩy, tối đa
                                                                                <span id="da-nhap-title">5</span> từ khóa)
                                                                            </div>
                                                                        </div>

                                                                    </div>

                                                                </div>
                                                                <div class="form-group">
                                                                    <div class="row">
                                                                        <label class="col-sm-2 control-label"
                                                                            for="">Đường dẫn / Alias</label>
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
                                                                                    <div class="invalid-feedback d-block">
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

                                            <hr>
                                            
                                            <div class="wrap-load-image mb-3">
                                                <div class="form-group">
                                                    <label for="">Ảnh hover</label>
                                                    <input type="file" class="form-control-file img-load-input border @error('avatar_path2')
                                                    is-invalid
                                                    @enderror" id="" name="avatar_path2">
                                                    @error('avatar_path2')
                                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <img class="img-load border p-1 w-100" src="{{asset('admin_asset/images/upload-image.png')}}" style="height: 200px;object-fit:cover; max-width: 260px;">
                                            </div>
                                            <div class="wrap-load-image mb-3">
                                                <div class="form-group">
                                                    <label for="">Ảnh banner</label>
                                                    <input type="file" class="form-control-file img-load-input border"  id="" value="" name="icon_path" >
                                                </div>
                                                @error('icon_path')
                                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                                @enderror
                                                <img class="img-load border p-1 w-100" src="{{asset('admin_asset/images/upload-image.png')}}" style="height: auto;object-fit:cover;max-width: 150px;width:auto;">
                                            </div>

                                            <!-- START Upload -->

                                            <div class="alert alert-light mt-3 mb-1">
                                                <strong>Upload file</strong>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Thông số kỹ thuật</label>
                                                <input type="file" class="form-control-file img-load-input border @error('file')
                                                is-invalid
                                                @enderror" id="" name="file">
                                                @error('file')
                                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        
                                        <!-- END Upload -->
                                        
                                        </div>
                                        <!-- END Hình Ảnh -->

                                        

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
                                                                    <input type="text" class="form-control @error('keyword_seo_' . $langItem['value']) is-invalid @enderror" id="keyword_seo" value="{{ old('keyword_seo_'.$langItem['value']) }}" name="keyword_seo_{{ $langItem['value'] }}" placeholder="Nhập từ khóa seo">
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
                                <div class="col-md-4">
                                    <div class="card card-outline card-primary">
                                        <div class="card-header">
                                            <h3 class="card-title">Cấu hình danh mục</h3>
                                        </div>
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label class="control-label" for="">Chọn danh mục</label>
                                                <div class="col-sm-12">
                                                    <select
                                                        class="form-control custom-select select-2-init @error('parent_id')
                                                is-invalid
                                                @enderror"
                                                        id="" value="{{ old('parent_id') }}" name="parent_id">

                                                        <option value="0">--- Chọn danh mục cha ---</option>

                                                        @if (old('parent_id'))
                                                            {!! \App\Models\CategoryProduct::getHtmlOptionAddWithParent(old('parent_id')) !!}
                                                        @else
                                                            {!! $option !!}
                                                        @endif
                                                    </select>
                                                    @error('parent_id')
                                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group wrap-permission row">

                                                <div class="col-sm-12">
                                                    <div style="border: 1px solid; padding: 5px;">
                                                        <label class="control-label" for="">Lựa chọn thuộc tính
                                                            được hiển thị</label>
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div
                                                                    style="height: 250px; overflow: auto;border: 1px solid #eee;font-size: 12px;line-height: 18px;">
                                                                    @foreach ($data as $item)
                                                                        <div class="item-permission mt-2 mb-2">
                                                                            <div class="form-check permission-title">
                                                                                <label class="form-check-label p-3">
                                                                                    <input type="checkbox"
                                                                                        class="form-check-input check-parent"
                                                                                        value="{{ $item->id }}"
                                                                                        name="category_product_attribute[]">{{ $item->name }}
                                                                                </label>
                                                                            </div>
                                                                            @if (count($item->childs) > 0)
                                                                                <div class="list-permission p-3 pl-4">
                                                                                    <div class="row">
                                                                                        @foreach ($item->childs()->with('translationsLanguage')->where('active', 1)->orderBy('order')->get() as $itemChild)
                                                                                            <div
                                                                                                class="col-lg-12 col-md-12 col-sm-12">
                                                                                                <div class="form-check">
                                                                                                    <label
                                                                                                        class="form-check-label">
                                                                                                        <input
                                                                                                            type="checkbox"
                                                                                                            class="form-check-input check-children"
                                                                                                            name="category_product_attribute[]"
                                                                                                            value="{{ $itemChild->id }}">{{ $itemChild->name }}
                                                                                                    </label>
                                                                                                </div>
                                                                                                @if (count($itemChild->childs) > 0)
                                                                                                    <div class="row">
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
                                                                                                                            name="category_product_attribute[]"
                                                                                                                            value="{{ $itemChild2->id }}">{{ $itemChild2->name }}
                                                                                                                    </label>
                                                                                                                </div>
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
                                            {{-- <div class="form-group">
                                                <label class="control-label" for="">Mã màu bacground</label>

                                                <input
                                                    type="color"class="form-control  @error('color') is-invalid  @enderror"
                                                    value="{{ old('color') }}" name="color">

                                                @error('color')
                                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                                @enderror
                                            </div> --}}
                                            <div class="form-group">
                                                <div class="row">
                                                    <label class="col-sm-2 control-label" for="">Số thứ tự</label>
                                                    <div class="col-sm-10">
                                                        <input type="number" min="0"
                                                            class="form-control  @error('order') is-invalid  @enderror"
                                                            value="{{ old('order') }}" name="order"
                                                            placeholder="Nhập số thứ tự">
                                                    </div>
                                                    @error('order')
                                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <label class="control-label" for="">Nổi bật</label>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <div class="form-check-inline">
                                                            <label class="form-check-label">
                                                                <input type="checkbox"
                                                                    class="form-check-input @error('hot')
                                                    is-invalid
                                                    @enderror"
                                                                    value="1" name="hot"
                                                                    @if (old('hot') === '1') {{ 'checked' }} @endif>
                                                            </label>
                                                        </div>
                                                        @error('hot')
                                                            <div class="invalid-feedback d-block">
                                                                {{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>

                                            {{-- <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label class="control-label" for="">Nổi bật 2</label>
                                            </div>
                                            <div class="col-md-9">
                                                <div class="form-check-inline">
                                                    <label class="form-check-label">
                                                        <input type="checkbox"
                                                               class="form-check-input @error('hot_2')
                                                                       is-invalid
                                                                        @enderror"
                                                               value="1" name="hot_2"
                                                        @if (old('hot_2') === '1') {{ 'checked' }} @endif>
                                                    </label>
                                                </div>
                                                @error('hot_2')
                                                <div class="invalid-feedback d-block">
                                                    {{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div> --}}

                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <label class="control-label" for="">Trạng thái</label>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <div class="form-check-inline">
                                                            <label class="form-check-label">
                                                                <input type="radio" class="form-check-input"
                                                                    value="1" name="active"
                                                                    @if (old('active') === '1' || old('active') === null) {{ 'checked' }} @endif>Hiện
                                                            </label>
                                                        </div>
                                                        <div class="form-check-inline">
                                                            <label class="form-check-label">
                                                                <input type="radio" class="form-check-input"
                                                                    value="0"
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
                                            <div class="wrap-load-image mb-3">
                                                <div class="form-group">
                                                    <label for="">Ảnh đại diện</label>
                                                    <input type="file"
                                                        class="form-control-file img-load-input border @error('avatar_path')
                                            is-invalid
                                            @enderror"
                                                        id="" name="avatar_path">
                                                    @error('avatar_path')
                                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <img class="img-load border p-1 w-100"
                                                    src="{{ asset('admin_asset/images/upload-image.png') }}"
                                                    style="height: 200px;object-fit:cover; max-width: 260px;">
                                            </div>

                                            <hr>
                                            {{-- <div class="wrap-load-image mb-3">
                                        <div class="form-group">
                                            <label for="">Ảnh icon</label>
                                            <input type="file" class="form-control-file img-load-input border @error('avatar_path2')
                                            is-invalid
                                            @enderror" id="" name="avatar_path2">
                                            @error('avatar_path2')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <img class="img-load border p-1 w-100" src="{{asset('admin_asset/images/upload-image.png')}}" style="height: 200px;object-fit:cover; max-width: 260px;">
                                    </div> --}}
                                            {{-- <div class="wrap-load-image mb-3">
                                                <div class="form-group">
                                                    <label for="">Ảnh banner</label>
                                                    <input type="file" class="form-control-file img-load-input border"
                                                        id="" value="" name="icon_path">
                                                </div>
                                                @error('icon_path')
                                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                                @enderror
                                                <img class="img-load border p-1 w-100"
                                                    src="{{ asset('admin_asset/images/upload-image.png') }}"
                                                    style="height: auto;object-fit:cover;max-width: 150px;width:auto;">
                                            </div> --}}

                                            <!-- START Upload -->

                                            {{-- <div class="alert alert-light mt-3 mb-1">
                                        <strong>Upload file</strong>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Thông số kỹ thuật</label>
                                        <input type="file" class="form-control-file img-load-input border @error('file')
                                        is-invalid
                                        @enderror" id="" name="file">
                                        @error('file')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                    </div> --}}
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
            $('input[name="keyword_seo_' + language + '"]').val(value); // Corrected line
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
