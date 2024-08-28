@extends('admin.layouts.main')
@section('title', 'Coppy Sản phẩm')

@section('css')
    <link href="{{ asset('lib/select2/css/select2.min.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/themes/base/jquery-ui.min.css" />
    <style>
        .select2-container--default .select2-selection--multiple .select2-selection__choice {
            background-color: #000 !important;
        }

        .select2-container .select2-selection--single {
            height: auto;
        }

        .tinymce_editor_init {
            height: 300px !important;
        }

        .taiphieu {
            text-align: center;
            text-transform: uppercase;
            background: #58be5a;
            font-size: 14px;
            border: #5bc0de;
            padding: 5px 20px;
            border-radius: 0;
            font-weight: 600;
            color: #fff;
        }

        .box_list_danhmuc {
            border: 1px solid #ddd;
            padding: 10px;
        }

        .list_danhmuc {
            height: 200px;
            overflow-y: auto;
        }

        .list_danhmuc li {
            list-style: none;
        }
    </style>
@endsection
@section('content')


    <div class="content-wrapper">

        @include('admin.partials.content-header', ['name' => 'Sản phẩm', 'key' => 'Coppy sản phẩm'])

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        @if (session()->has('alert'))
                            <div class="alert alert-success">
                                {{ session()->get('alert') }}
                            </div>
                        @elseif(session()->has('error'))
                            <div class="alert alert-warning">
                                {{ session('error') }}
                            </div>
                        @endif
                        {{-- <div class="box-link">
                        <a href="{{ route('admin.product.tab',['product_id'=>$data->id]) }}" class="btn btn-sm btn-success">Danh sách tab</a>
                    </div> --}}
                        <form class="form-horizontal" action="{{ route('admin.product.store') }}" method="POST"
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
                                        <button type="submit" class="btn btn-primary btn-lg taiphieu">Chấp nhận</button>
                                        <button type="reset" class="btn btn-danger btn-lg taiphieu">Làm lại</button>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="card card-outline card-primary">
                                        <div class="card-header">
                                            <h3 class="card-title">Thông tin Sản phẩm</h3>
                                        </div>
                                        <div class="card-body table-responsive p-3">
                                            <ul class="nav nav-tabs">
                                                <li class="nav-item">
                                                    <a class="nav-link active" data-toggle="tab" href="#tong_quan">Thông tin
                                                        chung
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" data-toggle="tab" href="#thuoctinh">Thuộc tính</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" data-toggle="tab" href="#hinh_anh">Hình ảnh liên
                                                        quan</a>
                                                </li>
                                                {{-- <li class="nav-item">
                                                    <a class="nav-link" data-toggle="tab" href="#seo">Seo</a>
                                                </li> --}}
                                            </ul>
                                            <div class="tab-content pl-3 pr-3">
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
                                                        <!-- START Tổng Quan -->
                                                        @foreach ($langConfig as $langItem)
                                                            <div id="tong_quan_{{ $langItem['value'] }}"
                                                                class="container wrapChangeSlug tab-pane {{ $langItem['value'] == $langDefault ? 'active show' : '' }} fade">
                                                                <br>

                                                                <div class="form-group">
                                                                    <div class="row">
                                                                        <label class="col-sm-2 control-label"
                                                                            for="">Tên sản phẩm</label>
                                                                        <div class="col-sm-10">
                                                                            <input type="text"
                                                                                class="form-control nameChange nameChangeSlug {{ $langItem['value'] }}
                                                                                @error('name_' . $langItem['value']) is-invalid @enderror"
                                                                                id="name_{{ $langItem['value'] }}"
                                                                                data-lg="{{ $langItem['value'] }}"
                                                                                value="{{ old('name_' . $langItem['value']) ?? optional($data->translationsLanguage($langItem['value'])->first())->name }}"
                                                                                name="name_{{ $langItem['value'] }}"
                                                                                placeholder="Nhập tên sản phẩm">
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
                                                                                class="form-control resultSlug_{{ $langItem['value'] }} resultSlug1_{{ $langItem['value'] }} changeAlias1 {{ $langItem['value'] }}
                                                                                @error('slug_' . $langItem['value']) is-invalid  @enderror"
                                                                                id="slug_{{ $langItem['value'] }}"
                                                                                data-lg="{{ $langItem['value'] }}"
                                                                                value="{{ old('slug_' . $langItem['value']) ?? optional($data->key($langItem['value'])->first())->slug }}"
                                                                                name="slug_{{ $langItem['value'] }}"
                                                                                placeholder="Nhập slug">
                                                                            @error('slug_' . $langItem['value'])
                                                                                <div class="invalid-feedback d-block">
                                                                                    {{ $message }}</div>
                                                                            @enderror
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                {{-- <div class="form-group field-required">
                                                                        <div class="row">
                                                                            <div class="col-md-3">
                                                                                <label class="control-label" for="">Chọn hãng thương hiệu</label>

                                                                            </div>
                                                                            <script>
                                                                                var supplier=[];
                                                                            </script>
                                                                            <div class="col-md-9">
                                                                                <select
                                                                                    class="form-control @error('supplier_id')
                                                                                is-invalid
                                                                                @enderror"
                                                                                    id="" value="{{ old('supplier_id') }}"
                                                        name="supplier_id">

                                                        <option value="">--- Chọn hãng thương hiệu ---
                                                        </option>
                                                        @foreach ($supplier as $item)
                                                        <script>
                                                            supplier[{
                                                                {
                                                                    $item - > id
                                                                }
                                                            }] = (({
                                                                !!$item - > toJson() !!
                                                            }));
                                                        </script>
                                                        <option value="{{ $item->id }}" {{ (old('supplier_id')??$data->supplier_id) == $item->id ? 'selected' : '' }}>
                                                            {{ $item->name }}
                                                        </option>
                                                        @endforeach
                                                        </select>
                                                        @error('supplier_id')
                                                        <div class="invalid-feedback d-block">
                                                            {{ $message }}
                                                        </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div> --}}
                                                                {{-- <div class="form-group field-required">
                                                                    <div class="row">
                                                                        <div class="col-md-2">
                                                                            <label class="control-label" for="">
                                                                                Mã sản phẩm
                                                                            </label>
                                                                        </div>
                                                                        <div class="col-md-10">
                                                                            <input type="text" min="0"
                                                                                class="form-control  @error('masp') is-invalid  @enderror"
                                                                                value="{{ old('masp') ?? $data->masp }}"
                                                                                name="masp"
                                                                                placeholder="Nhập mã sản phẩm">
                                                                            @error('masp')
                                                                                <div class="invalid-feedback d-block">
                                                                                    {{ $message }}
                                                                                </div>
                                                                            @enderror
                                                                        </div>
                                                                    </div>
                                                                </div> --}}
                                                                {{-- <div class="form-group">
                                                                    <div class="row">
                                                                        <label class="col-sm-2 control-label"
                                                                            for="">Tình trạng</label>
                                                                        <div class="col-sm-10">
                                                                            <input type="text"
                                                                                class="form-control  {{ $langItem['value'] }}
                                                                                @error('description2_' . $langItem['value']) is-invalid @enderror"
                                                                                id="description2_{{ $langItem['value'] }}"
                                                                                data-lg="{{ $langItem['value'] }}"
                                                                                value="{{ old('description2_' . $langItem['value']) ?? optional($data->translationsLanguage($langItem['value'])->first())->description2 }}"
                                                                                name="description2_{{ $langItem['value'] }}"
                                                                                placeholder="Tình trạng">
                                                                            @error('description2_' . $langItem['value'])
                                                                                <div class="invalid-feedback d-block">
                                                                                    {{ $message }}</div>
                                                                            @enderror
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <div class="row">
                                                                        <label class="col-sm-2 control-label"
                                                                            for="">Link video</label>
                                                                        <div class="col-sm-10">
                                                                            <input type="text"
                                                                                class="form-control  {{ $langItem['value'] }}
                                                                                @error('content3_' . $langItem['value']) is-invalid @enderror"
                                                                                id="content3_{{ $langItem['value'] }}"
                                                                                data-lg="{{ $langItem['value'] }}"
                                                                                value="{{ old('content3_' . $langItem['value']) ?? optional($data->translationsLanguage($langItem['value'])->first())->content3 }}"
                                                                                name="content3_{{ $langItem['value'] }}"
                                                                                placeholder="Link video">
                                                                            @error('content3_' . $langItem['value'])
                                                                                <div class="invalid-feedback d-block">
                                                                                    {{ $message }}</div>
                                                                            @enderror
                                                                        </div>
                                                                    </div>
                                                                </div> --}}
                                                                {{-- <div class="form-group">
                                                                    <div class="row">
                                                                        <label class="col-sm-2 control-label"
                                                                            for="">Đã bán</label>
                                                                        <div class="col-sm-10">
                                                                            <input type="number"
                                                                                class="form-control  {{ $langItem['value'] }}
                                                                                @error('content4_' . $langItem['value']) is-invalid @enderror"
                                                                                id="content4_{{ $langItem['value'] }}"
                                                                                data-lg="{{ $langItem['value'] }}"
                                                                                value="{{ old('content4_' . $langItem['value']) ?? optional($data->translationsLanguage($langItem['value'])->first())->content4 }}"
                                                                                name="content4_{{ $langItem['value'] }}"
                                                                                placeholder="Đã bán">
                                                                            @error('content4_' . $langItem['value'])
                                                                                <div class="invalid-feedback d-block">
                                                                                    {{ $message }}</div>
                                                                            @enderror
                                                                        </div>
                                                                    </div>
                                                                </div> --}}
                                                                {{-- <div class="form-group">
                                                <div class="row">
                                                    <label class="col-sm-2 control-label" for="">Thời gian giao hàng</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control  {{$langItem['value']}}
                                                                                @error('description3_' . $langItem['value']) is-invalid @enderror" id="description3_{{$langItem['value']}}" data-lg="{{$langItem['value']}}" value="{{ old('description3_'.$langItem['value'])??optional($data->translationsLanguage($langItem['value'])->first())->description3 }}" name="description3_{{$langItem['value']}}" placeholder="Thời gian giao hàng">
                                                        @error('description3_' . $langItem['value'])
                                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div> --}}
                                                                {{-- <div class="form-group">
                                                <div class="row">
                                                    <label class="col-sm-2 control-label" for="">Giới thiệu ngắn</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control  {{$langItem['value']}}
                                                                                @error('description4_' . $langItem['value']) is-invalid @enderror" id="description4_{{$langItem['value']}}" data-lg="{{$langItem['value']}}" value="{{ old('description4_'.$langItem['value'])??optional($data->translationsLanguage($langItem['value'])->first())->description4 }}" name="description4_{{$langItem['value']}}" placeholder="Giới thiệu ngắn">
                                                        @error('description4_' . $langItem['value'])
                                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div> --}}

                                                                <div class="form-group">
                                                                    <div class="row">
                                                                        <div class="col-md-2">
                                                                            <label class="control-label" for="">
                                                                                Giới thiệu
                                                                            </label>
                                                                        </div>
                                                                        <div class="col-sm-10">
                                                                            <textarea class="form-control tinymce_editor_init @error('description_' . $langItem['value']) is-invalid  @enderror"
                                                                                name="description_{{ $langItem['value'] }}" id="ckeditor" rows="3" value="" placeholder="Giới thiệu">
                                                        {{ old('description_' . $langItem['value']) ?? optional($data->translationsLanguage($langItem['value'])->first())->description }}
                                                        </textarea>
                                                                            @error('description_' . $langItem['value'])
                                                                                <div class="invalid-feedback d-block">
                                                                                    {{ $message }}
                                                                                </div>
                                                                            @enderror
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <!-- <div class="form-group">
                                                                <div class="row">
                                                                    <label class="col-sm-2 control-label" for="">mô tả </label>
                                                                    <div class="col-sm-10">
                                                                        <textarea class="form-control tinymce_editor_init @error('content_' . $langItem['value']) is-invalid  @enderror"
                                                                            name="content_{{ $langItem['value'] }}" id="" rows="20" value=""
                                                                            placeholder="Nhập mô tả sản phẩm">
                                                        {{ old('content_' . $langItem['value']) ?? optional($data->translationsLanguage($langItem['value'])->first())->content }}
                                                        </textarea>
                                                                        @error('content_' . $langItem['value'])
        <div class="invalid-feedback d-block">{{ $message }}</div>
    @enderror
                                                                    </div>
                                                                </div>
                                                            </div> -->
                                                                {{-- <div class="form-group">
                                                                    <div class="row">
                                                                        <div class="col-md-2">
                                                                            <label class="control-label" for="">
                                                                                Chi tiết sản phẩm
                                                                            </label>
                                                                        </div>
                                                                        <div class="col-sm-10">
                                                                            <textarea class="form-control tinymce_editor_init @error('content2_' . $langItem['value']) is-invalid  @enderror"
                                                                                name="content2_{{ $langItem['value'] }}" id="" rows="3" value=""
                                                                                placeholder="Chi tiết sản phẩm">
                                                        {{ old('content2_' . $langItem['value']) ?? optional($data->translationsLanguage($langItem['value'])->first())->content2 }}
                                                        </textarea>
                                                                            @error('content2_' . $langItem['value'])
                                                                                <div class="invalid-feedback d-block">
                                                                                    {{ $message }}
                                                                                </div>
                                                                            @enderror
                                                                        </div>
                                                                    </div>
                                                                </div> --}}
                                                                <div class="form-group">
                                                                    <div class="row">
                                                                        <div class="col-md-2">
                                                                            <label class="control-label" for="">
                                                                                Mô tả sả phẩm
                                                                            </label>
                                                                        </div>
                                                                        <div class="col-sm-10">
                                                                            <textarea class="form-control tinymce_editor_init @error('phukien_' . $langItem['value']) is-invalid  @enderror"
                                                                                name="phukien_{{ $langItem['value'] }}" id="ckeditor2" rows="3" value="" placeholder="Mô tả">
                                                        {{ old('phukien_' . $langItem['value']) ?? optional($data->translationsLanguage($langItem['value'])->first())->phukien }}
                                                        </textarea>
                                                                            @error('phukien_' . $langItem['value'])
                                                                                <div class="invalid-feedback d-block">
                                                                                    {{ $message }}
                                                                                </div>
                                                                            @enderror
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                {{-- <div class="form-group">
                                                <div class="row">
                                                    <div class="col-md-2">
                                                        <label class="control-label" for="">Công năng
                                                        </label>
                                                    </div>
                                                    <div class="col-sm-10">
                                                        <textarea class="form-control tinymce_editor_init @error('content4_' . $langItem['value']) is-invalid  @enderror" name="content4_{{ $langItem['value'] }}" id="" rows="20" value="" placeholder="Công năng">
                                                        {{ old('content4_' . $langItem['value'])??optional($data->translationsLanguage($langItem['value'])->first())->content4 }}
                                                        </textarea>
                                                        @error('content4_' . $langItem['value'])
                                                        <div class="invalid-feedback d-block">
                                                            {{ $message }}
                                                        </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div> --}}
                                                                {{-- <div class="form-group">
                                                <div class="row">
                                                    <div class="col-md-2">
                                                        <label class="control-label" for="">
                                                            Thông số kỹ thuật
                                                        </label>
                                                    </div>
                                                    <div class="col-sm-10">
                                                        <textarea class="form-control tinymce_editor_init @error('tainguyen_' . $langItem['value']) is-invalid  @enderror" name="tainguyen_{{ $langItem['value'] }}" id="" rows="3" value="" placeholder="Thông số kỹ thuật">
                                                        {{ old('tainguyen_' . $langItem['value'])??optional($data->translationsLanguage($langItem['value'])->first())->tainguyen }}
                                                        </textarea>
                                                        @error('tainguyen_' . $langItem['value'])
                                                        <div class="invalid-feedback d-block">
                                                            {{ $message }}
                                                        </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div> --}}
                                                                {{-- <div class="form-group">
                                                <div class="row">
                                                    <div class="col-md-2">
                                                        <label class="control-label" for="">
                                                            Hỗ trợ sản phẩm
                                                        </label>
                                                    </div>
                                                    <div class="col-sm-10">
                                                        <textarea class="form-control tinymce_editor_init @error('hotro_' . $langItem['value']) is-invalid  @enderror" name="hotro_{{ $langItem['value'] }}" id="" rows="3" value="" placeholder="Hỗ trợ sản phẩm">
                                                        {{ old('hotro_' . $langItem['value'])??optional($data->translationsLanguage($langItem['value'])->first())->hotro }}
                                                        </textarea>
                                                        @error('hotro_' . $langItem['value'])
                                                        <div class="invalid-feedback d-block">
                                                            {{ $message }}
                                                        </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div> --}}
                                                                <div class="card card-outline card-primary">
                                                                    <div class="card-header">
                                                                        <h3 class="card-title">Xem trước kết quả tìm kiếm
                                                                        </h3>
                                                                        <button class="ui-button ui-button--link"
                                                                            type="button" name="button">Tùy chỉnh
                                                                            SEO</button>
                                                                    </div>
                                                                    <div class="card-body table-responsive p-3">
                                                                        <div class="card-header">
                                                                            <div class="google-preview"
                                                                                bind-show="shouldShowGooglePreview()">
                                                                                <span class="google__title ">
                                                                                    <input type="text"
                                                                                        class="resultTitle_{{ $langItem['value'] }}"
                                                                                        value="{{ optional($data->translationsLanguage($langItem['value'])->first())->title_seo }}"
                                                                                        readonly>
                                                                                </span>
                                                                                <div class="google__url">
                                                                                    {{ $url }}/<input
                                                                                        type="text"
                                                                                        class="resultUrl_{{ $langItem['value'] }}"
                                                                                        value="{{ optional($data->translationsLanguage($langItem['value'])->first())->slug }}"
                                                                                        readonly>

                                                                                </div>
                                                                                <div class="google__description resultDescription_{{ $langItem['value'] }}"
                                                                                    id="resultDescription_{{ $langItem['value'] }}">
                                                                                    {{ optional($data->translationsLanguage($langItem['value'])->first())->description_seo }}
                                                                                    {{-- <input type="text" class="resultDescription" value="{{optional($data->translationsLanguage($langItem['value'])->first())->description_seo}}" readonly> --}}
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="card-header form-input hidden">
                                                                            <div class="form-group">
                                                                                <div class="row">
                                                                                    <label class="col-sm-2 control-label"
                                                                                        for="">Nhập title
                                                                                        seo</label>
                                                                                    <div class="col-sm-10">
                                                                                        <input type="text"
                                                                                            class="form-control changeTitle_{{ $langItem['value'] }}
                                                                                            @error('title_seo_' . $langItem['value']) is-invalid @enderror"
                                                                                            id="title_seo_{{ $langItem['value'] }}"
                                                                                            value="{{ old('title_seo_' . $langItem['value']) ?? optional($data->translationsLanguage($langItem['value'])->first())->title_seo }}"
                                                                                            name="title_seo_{{ $langItem['value'] }}"
                                                                                            placeholder="Nhập title seo">
                                                                                        @error('title_seo_' .
                                                                                            $langItem['value'])
                                                                                            <div
                                                                                                class="invalid-feedback d-block">
                                                                                                {{ $message }}</div>
                                                                                        @enderror
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <div class="row">
                                                                                    <label class="col-sm-2 control-label"
                                                                                        for="">Nhập mô tả
                                                                                        seo</label>
                                                                                    <div class="col-sm-10">
                                                                                        <textarea
                                                                                            class="form-control changeDescription
                                                                                                @error('description_seo_' . $langItem['value']) is-invalid  @enderror"
                                                                                            name="description_seo_{{ $langItem['value'] }}" id="description_seo_{{ $langItem['value'] }}" rows="3"
                                                                                            value="" data-lg="{{ $langItem['value'] }}">{{ old('description_seo_' . $langItem['value']) ?? optional($data->translationsLanguage($langItem['value'])->first())->description_seo }}</textarea>
                                                                                        @error('description_seo_' .
                                                                                            $langItem['value'])
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
                                                                                    <label class="col-sm-2 control-label"
                                                                                        for="">Nhập từ khóa
                                                                                        seo</label>
                                                                                    <div class="col-sm-10">
                                                                                        <input type="text"
                                                                                            class="form-control @error('keyword_seo_' . $langItem['value']) is-invalid @enderror"
                                                                                            id="keyword_seo_{{ $langItem['value'] }}"
                                                                                            value="{{ old('keyword_seo_' . $langItem['value']) ?? optional($data->translationsLanguage($langItem['value'])->first())->keyword_seo }}"
                                                                                            name="keyword_seo_{{ $langItem['value'] }}"
                                                                                            placeholder="Nhập mô tả seo">
                                                                                        @error('keyword_seo_' .
                                                                                            $langItem['value'])
                                                                                            <div
                                                                                                class="invalid-feedback d-block">
                                                                                                {{ $message }}</div>
                                                                                        @enderror
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
                                                                                                class="next-input next-input--invisible resultSlug2_{{ $langItem['value'] }} changeAlias2 {{ $langItem['value'] }}
                                                                                                @error('slug_' . $langItem['value']) is-invalid  @enderror"
                                                                                                id="slug_{{ $langItem['value'] }}"
                                                                                                data-lg="{{ $langItem['value'] }}"
                                                                                                value="{{ old('slug_' . $langItem['value']) ?? optional($data->translationsLanguage($langItem['value'])->first())->slug }}"
                                                                                                name="slug_{{ $langItem['value'] }}">
                                                                                            @error('slug_' .
                                                                                                $langItem['value'])
                                                                                                <div
                                                                                                    class="invalid-feedback d-block">
                                                                                                    {{ $message }}</div>
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
                                                        <!-- END Tổng Quan -->
                                                    </div>
                                                </div>

                                                <!-- START Dữ Liệu -->
                                                <!-- <div id="du_lieu" class="container tab-pane fade"><br>

                                                                        </div> -->
                                                <!-- END Dữ Liệu -->

                                                <!-- START Hình Ảnh -->

                                                <!-- END Hình Ảnh -->
                                                <div id="thuoctinh" class="container tab-pane fade">

                                                    <div class="alert alert-light  mt-3 mb-1">
                                                        <strong>Chọn thuộc tính</strong>
                                                    </div>

                                                    <div id="attribute">

                                                    </div>
                                                    @foreach ($attributes as $key => $attribute)
                                                        <div class="form-group">
                                                            <label class="control-label"
                                                                for="">{{ $attribute->name }}</label>
                                                            @foreach ($attribute->childs()->orderby('order')->get() as $k => $attr)
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox"
                                                                        name="attribute[{{ $key }}][]"
                                                                        value="{{ $attr->id }}"
                                                                        @if (old('attribute')) @if (in_array($attr->id, old('attribute')[$key]))
                                            checked @endif
                                                                    @else
                                                                        @if ($data->attributes()->get()->pluck('id')->contains($attr->id)) checked @endif
                                                                        @endif
                                                                    >
                                                                    <label class="form-check-label"
                                                                        for="{{ $attribute->name }}_{{ $attr->id }}">
                                                                        {{ $attr->name }}
                                                                    </label>
                                                                </div>
                                                            @endforeach
                                                            @error('attribute.' . $key)
                                                                <div class="invalid-feedback d-block">{{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>
                                                    @endforeach
                                                    {{-- @foreach ($attributes_baohanh as $key => $attribute)
                                                        <div class="form-group">
                                                            <label class="control-label" for="">{{ $attribute->name }}</label>
                                    <select class="form-control" name="attribute[]">
                                        <option value="0">--Chọn--</option>
                                        @foreach ($attribute->childs()->orderby('order')->get() as $k => $attr)
                                        <option value="{{ $attr->id }}" @if (old('attribute')) @if ($attr->id == old('attribute')[$key])
                                            selected
                                            @else
                                            {{ $data->attributes()->get()->pluck('id')->contains($attr->id)?'selected':"" }}
                                            @endif
                                            @else
                                            {{ $data->attributes()->get()->pluck('id')->contains($attr->id)?'selected':"" }}
                                            @endif
                                            >
                                            {{ $attr->name }}
                                        </option>
                                        @endforeach
                                    </select>
                                    @error('attribute.' . $key)
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>
                                @endforeach --}}
                                                    {{-- <div class="form-group wrap-permission">
                                                        <div style="border: 1px solid; padding: 5px;">
                                                            <label class="control-label" for="">Lựa chọn danh mục được hiển thị</label>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div style="height: 250px; overflow: auto;border: 1px solid #eee;font-size: 12px;line-height: 18px;">
                                                                        @foreach ($attributes as $item)
                                                                        <div class="item-permission mt-2 mb-2">
                                                                            <div class="form-check permission-title">
                                                                                <label class="form-check-label p-3">
                                                                                    <input type="checkbox" class="form-check-input check-children" value="{{ $item->id }}" name="attribute[]"
                                @if ($categoryAttrOfAdmin->contains($item->id))
                                {{ 'checked' }}
                                @endif
                                >{{ $item->name }}
                                </label>
                            </div>
                            @if (count($item->childs) > 0)
                            <div class="list-permission p-3 pl-4">
                                <div class="row">
                                    @foreach ($item->childs()->with('translationsLanguage')->where('active', 1)->orderBy('order')->get() as $itemChild)
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input check-children" name="attribute[]" value="{{ $itemChild->id }}" @if ($categoryAttrOfAdmin->contains($itemChild->id))
                                                {{ 'checked' }}
                                                @endif
                                                >{{ $itemChild->name }}
                                            </label>
                                        </div>
                                        @if (count($itemChild->childs) > 0)
                                        <div class="row">
                                            @foreach ($itemChild->childs()->with('translationsLanguage')->where('active', 1)->orderBy('order')->get() as $itemChild2)
                                            <div class="col-lg-12 col-md-12 col-sm-12">
                                                <div class="form-check pl-5">
                                                    <label class="form-check-label">
                                                        <input type="checkbox" class="form-check-input check-children" name="attribute[]" value="{{ $itemChild2->id }}" @if ($categoryAttrOfAdmin->contains($itemChild2->id))
                                                        {{ 'checked' }}
                                                        @endif
                                                        >{{ $itemChild2->name }}
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
</div> --}}
                                                </div>
                                                <div id="hinh_anh" class="container tab-pane fade">

                                                    <div class="wrap-load-image mb-3">
                                                        <style>
                                                            .image-list-small {
                                                                font-family: Arial, Helvetica, sans-serif;
                                                                margin: 0 auto;
                                                                text-align: center;
                                                                max-width: 640px;
                                                                padding: 0;
                                                            }

                                                            .image-list-small li {
                                                                display: inline-block;
                                                                width: 181px;
                                                                margin: 0 12px 30px;
                                                            }


                                                            /* Photo */

                                                            .image-list-small li>a {
                                                                display: block;
                                                                text-decoration: none;
                                                                background-size: cover;
                                                                background-repeat: no-repeat;
                                                                height: 137px;
                                                                margin: 0;
                                                                padding: 0;
                                                                border: 4px solid #ffffff;
                                                                outline: 1px solid #d0d0d0;
                                                                box-shadow: 0 2px 1px #DDD;
                                                            }

                                                            .image-list-small .details {
                                                                margin-top: 13px;
                                                            }


                                                            /* Title */

                                                            .image-list-small .details h3 {
                                                                display: block;
                                                                font-size: 12px;
                                                                margin: 0 0 3px 0;
                                                                white-space: nowrap;
                                                                overflow: hidden;
                                                                text-overflow: ellipsis;
                                                            }

                                                            .image-list-small .details h3 a {
                                                                color: #303030;
                                                                text-decoration: none;
                                                            }

                                                            .image-list-small .details .image-author {
                                                                display: block;
                                                                color: #717171;
                                                                font-size: 11px;
                                                                font-weight: normal;
                                                                margin: 0;
                                                            }
                                                        </style>

                                                        <hr>
                                                        <span class="badge badge-primary mb-3">Thêm ảnh liên quan</span>
                                                        <div class="form-group">
                                                            {{-- <label for="">Thêm ảnh</label> --}}
                                                            <input type="file"
                                                                class="form-control-file img-load-input-multiple border"
                                                                id="" name="image[]" multiple>
                                                        </div>
                                                        @error('image')
                                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                                        @enderror
                                                        <!-- <div class="load-multiple-img">
                                    @if (!$data->images()->get()->count())
                        <img class="" src="{{ asset('admin_asset/images/upload-image.png') }}" alt="'no image">
                                    <img class="" src="{{ asset('admin_asset/images/upload-image.png') }}" alt="'no image">
                                    <img class="" src="{{ asset('admin_asset/images/upload-image.png') }}" alt="'no image">
                @endif
                            </div> -->
                                                        <ul class="image-list-small">
                                                            @foreach ($data->images()->get() as $productImageItem)
                                                                @php
                                                                    $url = asset('');
                                                                @endphp

                                                                <li style="position: relative">
                                                                    <a href="javascript:;"
                                                                        style="background-image: url({{ $url }}{{ $productImageItem->image_path }});"></a>
                                                                    <input type="hidden" name="file_xx[]"
                                                                        value="{{ $productImageItem->image_path }}">
                                                                    <a style="position:absolute; top:0; right:0; width:25px; height:27px;"
                                                                        class="btn btn-sm btn-danger lb_delete_image_new"
                                                                        data-id="{{ $productImageItem->id }}"
                                                                        data-url="{{ route('admin.product.destroy-image', ['id' => $productImageItem->id]) }}"><i
                                                                            class="far fa-trash-alt"></i></a>
                                                                </li>
                                                            @endforeach
                                                        </ul>

                                                    </div>

                                                </div>
                                                <!-- START Seo -->
                                                {{-- <div id="seo" class="container tab-pane fade"><br>
                                                    <div class="tab-content">
                                                        @foreach ($langConfig as $langItem)
                                                            <div id="seo_{{$langItem['value']}}" class="container tab-pane {{$langItem['value']==$langDefault?'active show':''}} fade">
<div class="form-group">
    <div class="row">
        <label class="col-sm-2 control-label" for="">Nhập title seo</label>
        <div class="col-sm-10">
            <input type="text" class="form-control @error('title_seo_' . $langItem['value']) is-invalid @enderror" id="title_seo" value="{{ old('title_seo_'.$langItem['value'])??optional($data->translationsLanguage($langItem['value'])->first())->title_seo }}" name="title_seo_{{ $langItem['value'] }}" placeholder="Nhập title seo">
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
            <input type="text" class="form-control @error('description_seo_' . $langItem['value']) is-invalid @enderror" id="description_seo" value="{{ old('description_seo_'.$langItem['value'])??optional($data->translationsLanguage($langItem['value'])->first())->description_seo }}" name="description_seo_{{ $langItem['value'] }}" placeholder="Nhập mô tả seo">
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
            <input type="text" class="form-control @error('keyword_seo_' . $langItem['value']) is-invalid @enderror" id="keyword_seo" value="{{ old('keyword_seo_'.$langItem['value'])??optional($data->translationsLanguage($langItem['value'])->first())->keyword_seo  }}" name="keyword_seo_{{ $langItem['value'] }}" placeholder="Nhập mô tả seo">
            @error('keyword_seo_' . $langItem['value'])
            <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>
    </div>

</div>
<div class="form-group">
    <div class="row">
        <label class="col-sm-2 control-label" for="">Nhập tags</label>
        <div class="col-sm-10">

            <select class="form-control tag-select-choose w-100" multiple="multiple" name="tags_{{$langItem['value']}}[]">
                @if (old('tags_' . $langItem['value']))
                @foreach (old('tags_' . $langItem['value']) as $tag)
                <option value="{{ $tag }}" selected>{{ $tag }}</option>
                @endforeach
                @else
                @foreach ($data->tagsLanguage($langItem['value'])->get() as $tagItem)
                <option value="{{$tagItem->name}}" selected>{{$tagItem->name}}</option>
                @endforeach
                @endif
            </select>
            @error('title_seo')
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
                                            <h3 class="card-title">Cấu hình bài viết</h3>
                                        </div>
                                        <div class="card-body table-responsive">
                                            <div class="form-group wrap-permission">
                                                <div style="border: 1px solid; padding: 5px;">
                                                    <label class="control-label" for="">Lựa chọn chuyên
                                                        mục</label>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div
                                                                style="height: 250px; overflow: auto;border: 1px solid #eee;font-size: 12px;line-height: 18px;">
                                                                @foreach ($data_cate_ed as $item)
                                                                    <div class="item-permission mt-2 mb-2">
                                                                        <div class="form-check permission-title">
                                                                            <label class="form-check-label p-2">
                                                                                <input type="checkbox"
                                                                                    class="form-check-input check-children"
                                                                                    value="{{ $item->id }}"
                                                                                    name="category[]"
                                                                                    @if ($categoryProductOfAdmin->contains($item->id)) {{ 'checked' }} @endif>{{ $item->name }}
                                                                            </label>
                                                                        </div>
                                                                        @if (count($item->childs) > 0)
                                                                            <div class="list-permission p-2 pl-4">
                                                                                <div class="row">
                                                                                    @foreach ($item->childs()->with('translationsLanguage')->where('active', 1)->orderBy('order')->get() as $itemChild)
                                                                                        <div
                                                                                            class="col-lg-12 col-md-12 col-sm-12">
                                                                                            <div class="form-check">
                                                                                                <label
                                                                                                    class="form-check-label">
                                                                                                    <input type="checkbox"
                                                                                                        class="form-check-input check-children"
                                                                                                        name="category[]"
                                                                                                        value="{{ $itemChild->id }}"
                                                                                                        @if ($categoryProductOfAdmin->contains($itemChild->id)) {{ 'checked' }} @endif>{{ $itemChild->name }}
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
                                                                                                                        name="category[]"
                                                                                                                        value="{{ $itemChild2->id }}"
                                                                                                                        @if ($categoryProductOfAdmin->contains($itemChild2->id)) {{ 'checked' }} @endif>{{ $itemChild2->name }}
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
                                            <div class="form-group field-required">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <label class="control-label" for="">Chọn
                                                            hãng sản xuất</label>

                                                    </div>
                                                    <script>
                                                        var supplier = [];
                                                    </script>
                                                    <div class="col-md-12">
                                                        <select
                                                            class="form-control @error('supplier_id')
                            is-invalid
@enderror"
                                                            id="" value="{{ old('supplier_id') }}"
                                                            name="supplier_id">

                                                            <option value="">--- Chọn hãng sản
                                                                xuất
                                                                ---
                                                            </option>
                                                            @foreach ($supplier as $item)
                                                                <script>
                                                                    supplier[{
                                                                        {
                                                                            $item - > id
                                                                        }
                                                                    }] = (({
                                                                        !!$item - > toJson() !!
                                                                    }));
                                                                </script>
                                                                <option value="{{ $item->id }}"
                                                                    {{ (old('supplier_id') ?? $data->supplier_id) == $item->id ? 'selected' : '' }}>
                                                                    {{ $item->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                        @error('supplier_id')
                                                            <div class="invalid-feedback d-block">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- <div class="row mb-3">
                                                <div class="col-12">
                                                    <label class="control-label" for="">
                                                        Mã sản phẩm
                                                    </label>
                                                </div>
                                                <div class="col-md-12">
                                                    <input type="text" min="0"
                                                        class="form-control  @error('masp') is-invalid  @enderror"
                                                        value="{{ old('masp') ?? $data->masp }}" name="masp"
                                                        placeholder="Nhập mã sản phẩm">
                                                    @error('masp')
                                                        <div class="invalid-feedback d-block">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group wrap-permission">
                                                <div style="border: 1px solid; padding: 5px;">
                                                    <label class="control-label" for="">Chọn sản phẩm ghép
                                                        cùng</label>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div
                                                                style="height: 250px; overflow: auto;border: 1px solid #eee;font-size: 12px;line-height: 18px;">
                                                                @php
                                                                    $product_ids = DB::table('product_and_product')
                                                                        ->where('main_product_id', $data->id)
                                                                        ->pluck('compound_product_id')
                                                                        ->toArray();
                                                                    $modeCateProduct = new App\Models\CategoryProduct();
                                                                    $modelProductCate = new App\Models\ProductForCategory();
                                                                    $modelProduct = new App\Models\Product();
                                                                    $categoryId = $modeCateProduct->getALlCategoryChildrenAndSelf(
                                                                        36,
                                                                    );
                                                                    $idProduct = $modelProductCate
                                                                        ->whereIn('category_id', $categoryId)
                                                                        ->pluck('product_id')
                                                                        ->toArray();
                                                                    $product = $modelProduct
                                                                        ->whereIn('id', $idProduct)
                                                                        ->get();
                                                                @endphp
                                                                @foreach ($product as $item)
                                                                    <div class="item-permission mt-2 mb-2">
                                                                        <div class="form-check permission-title">
                                                                            <label class="form-check-label p-2">
                                                                                <input type="checkbox"
                                                                                    class="form-check-input check-children check-product"
                                                                                    value="{{ $item->id }}"
                                                                                    name="product_product[]"
                                                                                    data-main="{{ $data->id }}"
                                                                                    data-compound="{{ $item->id }}"
                                                                                    {{ in_array($item->id, $product_ids) ? 'checked' : '' }}>
                                                                                {{ $item->name ?? '' }}
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                @endforeach
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div> --}}

                                            {{-- <div class="form-group">
                                                <div class="row">
                                                    <label class="control-label" for="">Chọn nhóm sản phẩm</label>
                                                    <div class="col-sm-12">
                                                        <select name="product_child[]" class="form-control select-2-init" id="" multiple>
                                                            <option value=""></option>
                                                            @foreach ($dataProduct as $productItem)
                                                            <option
                                                            {{ $dataRelateOfUser->get()->contains($productItem->id)?'selected':"" }}
            value="{{ $productItem->id }}"
            >
            {{ $productItem->name }}
            </option>
            @endforeach
            </select>
            @error('product_child')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>
</div>
<div class="form-group field-required">
    <div class="row">
        <div class="col-md-2" style="flex: 0 0 15%;
                                                    max-width: 15%;">
            <label class="control-label" for="">Lựa chọn sản phẩm</label>
        </div>
        <div class="col-md-10">
            <div class="box_list_danhmuc">
                <div class="list_danhmuc">
                    @if (isset($list_danhmuc) && $list_danhmuc->count() > 0)
                    @foreach ($list_danhmuc as $k => $danhmuc)
                    <li>
                        <input type="checkbox" value="{{ $danhmuc->id }}" id="checkbox-filter-{{ $danhmuc->id }}" name="danhmuc[]" @if (old('danhmuc')) @if ($danhmuc->id == old('danhmuc')[$k])
                        checked
                        @else
                        {{ $data->productForCategory()->get()->pluck('id')->contains($danhmuc->id)?'checked':"" }}
                        @endif
                        @else
                        {{ $data->productForCategory()->get()->pluck('id')->contains($danhmuc->id)?'checked':"" }}

                        @endif
                        >
                        <label for="checkbox-filter-{{ $danhmuc->id }}" style="font-weight: normal;">
                            <span>{{ $danhmuc->name }}</span>
                        </label>
                    </li>
                    @endforeach
                    @endif
                </div>
            </div>
            <div style="height: 250px; overflow: auto;border: 1px solid #eee;font-size: 12px;line-height: 18px;">
                @foreach ($data_ed as $item)
                <div class="item-permission mt-2 mb-2">
                    <div class="form-check permission-title">
                        <label class="form-check-label p-3">
                            <input type="checkbox" class="form-check-input check-children" value="{{ $item->id }}" name="product_parent[]" @if ($categoryParentOfAdmin->contains($item->id))
                            {{ 'checked' }}
                            @endif
                            >{{ $item->name }}
                        </label>
                    </div>
                    @if (count($item->childs) > 0)
                    <div class="list-permission p-3 pl-4">
                        <div class="row">
                            @foreach ($item->childs()->with('translationsLanguage')->where('active', 1)->orderBy('order')->get() as $itemChild)
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input check-children" name="category[]" value="{{ $itemChild->id }}" @if ($categoryPostOfAdmin->contains($itemChild->id))
                                        {{ 'checked' }}
                                        @endif
                                        >{{ $itemChild->name }}
                                    </label>
                                </div>
                                @if (count($itemChild->childs) > 0)
                                <div class="row">
                                    @foreach ($itemChild->childs()->with('translationsLanguage')->where('active', 1)->orderBy('order')->get() as $itemChild2)
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="form-check pl-5">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input check-children" name="category[]" value="{{ $itemChild2->id }}" @if ($categoryPostOfAdmin->contains($itemChild2->id))
                                                {{ 'checked' }}
                                                @endif
                                                >{{ $itemChild2->name }}
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
</div> --}}
                                            <div class="wrap-load-image mb-3">
                                                <div class="form-group">
                                                    <label for="">Ảnh đại diện</label>
                                                    <input type="file" class="form-control-file img-load-input border"
                                                        id="" name="avatar_path">
                                                    <input type="hidden" name="avatar_path_select"
                                                        id="avatar_path_select">
                                                    {{-- <a href="javascript:void(0)" onClick="openSelectAvatarModal()">Chọn từ thư viện</a> --}}
                                                </div>

                                                @error('avatar_path')
                                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                                @enderror
                                                @if ($data->avatar_path)
                                                    <div class="item-avatar">
                                                        <img class="img-load border  p-1 w-100"
                                                            src="{{ $data->avatar_path }}" alt="{{ $data->name }}"
                                                            style="height: 200px;object-fit:cover; max-width: 260px;">
                                                        <a class="btn btn-sm btn-danger deleteAvatarProductDB"
                                                            data-url="{{ route('admin.product.delete_avatar_path', ['id' => $data->id]) }}"><i
                                                                class="far fa-trash-alt"></i></a>
                                                    </div>

                                                @endif
                                            </div>
                                            {{-- <div class="wrap-load-image mb-3">
                                                <div class="form-group">
                                                    <label for="">Ảnh Banner</label>
                                                    <input type="file" class="form-control-file img-load-input border"
                                                        id="" name="avatar_path2">
                                                    <input type="hidden" name="avatar_path_select"
                                                        id="avatar_path_select">
                                                </div>

                                                @error('avatar_path2')
                                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                                @enderror
                                                @if ($data->avatar_path2)
                                                    <img class="img-load border p-1 w-100" id="img_avatar_path"
                                                        src="{{ $data->avatar_path2 }}" alt="{{ $data->name }}"
                                                        style="height: 200px;object-fit:cover; max-width: 260px;">
                                                @endif
                                            </div> --}}
                                            <div class="wrap-load-image mb-3">
                                                <div class="form-group">
                                                    <label for="">Ảnh mô tả</label>
                                                    <input type="file" class="form-control-file img-load-input border"
                                                        id="" name="avatar_path3">
                                                    <input type="hidden" name="avatar_path_select"
                                                        id="avatar_path_select">
                                                </div>

                                                @error('avatar_path3')
                                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                                @enderror
                                                @if ($data->avatar_path3)
                                                    <img class="img-load border p-1 w-100" id="img_avatar_path"
                                                        src="{{ $data->avatar_path3 }}" alt="{{ $data->name }}"
                                                        style="height: 200px;object-fit:cover; max-width: 260px;">
                                                @endif
                                            </div>
                                            {{-- <div class="form-group">
                <div class="row">
                    <div class="col-md-3">
                        <label class="control-label" for="">Số lượng đã bán</label>
                    </div>
                    <div class="col-md-9">
                        <input type="number" min="0" class="form-control  @error('pay') is-invalid  @enderror" value="{{ old('pay')??$data->pay }}" name="pay" placeholder="Nhập số lượng đã bán">
@error('pay')
<div class="invalid-feedback d-block">
    {{ $message }}
</div>
@enderror
</div>
</div>
</div> --}}
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <label class="control-label" for="">Giá</label>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <input id="price" type="text"
                                                            class="form-control  @error('price') is-invalid  @enderror"
                                                            value="{{ old('price') ?? $data->price }}"
                                                            placeholder="Nhập giá">

                                                        <input id="price_hide" type="hidden" min="0"
                                                            class="form-control  @error('price') is-invalid  @enderror"
                                                            value="{{ old('price') ?? $data->price }}" name="price"
                                                            placeholder="Nhập giá">
                                                        @error('price')
                                                            <div class="invalid-feedback d-block">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <label class="control-label" for="">Giá cũ</label>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <input id="old_price" type="text"
                                                            class="form-control  @error('old_price') is-invalid  @enderror"
                                                            value="{{ old('old_price') ?? $data->old_price }}"
                                                            placeholder="Nhập giá cũ">
                                                        <input id="old_price_hide" type="hidden" min="0"
                                                            class="form-control  @error('old_price') is-invalid  @enderror"
                                                            value="{{ old('old_price') ?? $data->old_price }}"
                                                            name="old_price" placeholder="Nhập giá cũ">
                                                        @error('old_price')
                                                            <div class="invalid-feedback d-block">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- <div class="form-group">
                    <div class="row">
                        <div class="col-md-3">
                            <label class="control-label" for="">Sản phẩm khuyến mãi
                            </label>
                        </div>
                        <div class="col-md-9">
                            <div class="form-check-inline">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input @error('sale')
                    is-invalid
                    @enderror" value="1" name="sale" @if ((old('sale') ?? $data->sale) == '1') {{ 'checked' }} @endif>
                                </label>
                            </div>
                            @error('sale')
        <div class="invalid-feedback d-block">
                                                {{ $message }}
                                            </div>
    @enderror
                        </div>
                    </div>
                </div> -->
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
                                                                    @if ((old('hot') ?? $data->hot) == '1') {{ 'checked' }} @endif>
                                                            </label>
                                                        </div>
                                                        @error('hot')
                                                            <div class="invalid-feedback d-block">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- <div class="form-group">
                    <div class="row">
                        <div class="col-md-3">
                            <label class="control-label" for="">Ngày bắt đầu(Sale)</label>
                        </div>
                        <div class="col-md-9">
                            <input type="datetime-local" class="form-control  @error('created_at')
                is-invalid
                @enderror" id="" name="created_at" value="{{ old('created_at') ?? Carbon::parse($data->created_at)->format('Y-m-d\TH:i') }}">
                            @error('created_at')
        <div class="invalid-feedback d-block">{{ $message }}</div>
    @enderror
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-3">
                            <label class="control-label" for="">Ngày kết thúc(Sale)</label>
                        </div>
                        <div class="col-md-9">
                            <input type="datetime-local" class="form-control  @error('deleted_at')
                is-invalid
                @enderror" id="" name="deleted_at" value="{{ old('deleted_at') ?? Carbon::parse($data->deleted_at)->format('Y-m-d\TH:i') }}">
                            @error('deleted_at')
        <div class="invalid-feedback d-block">{{ $message }}</div>
    @enderror
                        </div>
                    </div>
                </div> -->

                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <label class="control-label" for="">Hiện trên
                                                            website</label>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <div class="form-check-inline">
                                                            <label class="form-check-label">
                                                                <input type="radio" class="form-check-input"
                                                                    value="1" name="active"
                                                                    @if (old('active') === '1' || $data->active == 1) {{ 'checked' }} @endif>Hiện
                                                            </label>
                                                        </div>
                                                        <div class="form-check-inline">
                                                            <label class="form-check-label">
                                                                <input type="radio" class="form-check-input"
                                                                    value="0"
                                                                    @if (old('active') === '0' || $data->active == 0) {{ 'checked' }} @endif
                                                                    name="active">Ẩn
                                                            </label>
                                                        </div>

                                                        @error('active')
                                                            <div class="invalid-feedback d-block">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- <div class="card card-outline card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Nhập giá sản phẩm</h3>
                    </div>
                    <div class="card-body table-responsive p-3">
                        {{-- <div class="item-price-default">
                                                    <div class="form-group">
                                                        <label class="control-label" for="">Đơn vị khối lượng</label>
                                                        <input type="text" min="0" class="form-control  @error('size') is-invalid  @enderror"  value="{{ old('size')??$data->size }}" name="size" placeholder="Nhập đơn vị khối lượng">
        @error('size')
        <div class="invalid-feedback d-block">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <label class="control-label" for="">Giá</label>
        <input type="number" min="0" class="form-control  @error('price') is-invalid  @enderror" value="{{ old('price')??$data->price }}" name="price" placeholder="Nhập giá">
        @error('price')
        <div class="invalid-feedback d-block">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <label class="control-label" for="">Giá cũ</label>
        <input type="number" min="0" class="form-control  @error('old_price') is-invalid  @enderror" value="{{ old('old_price')??$data->old_price }}" name="old_price" placeholder="Nhập giá cũ">
        @error('old_price')
        <div class="invalid-feedback d-block">{{ $message }}</div>
        @enderror
    </div>


</div> --}}

                <div class="list-item-option wrap-option mt-3">
                    <h5>Các loại sản phẩm</h5>
                    @foreach ($data->options()->latest()->get() as $key => $item)
    <div class="item-price">
                        <div class="box-content-price">
                            <div class="form-group">
                                <label class="control-label" for="">Màu sắc</label>
                                <input type="text" min="0" class="form-control  @error('colorOptionOld.' . $key) is-invalid  @enderror" value="{{ old('colorOptionOld')[$key] ?? $item->color }}" name="colorOptionOld[]" placeholder="Nhập Màu sắc">
                                @error('colorOptionOld.' . $key)
        <div class="invalid-feedback d-block">{{ $message }}</div>
    @enderror
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="">Khối lượng</label>
                                <input type="text" min="0" class="form-control  @error('sizeOptionOld.' . $key) is-invalid  @enderror" value="{{ old('sizeOptionOld')[$key] ?? $item->size }}" name="sizeOptionOld[]" placeholder="Nhập đơn vị khối lượng">
                                @error('sizeOptionOld.' . $key)
        <div class="invalid-feedback d-block">{{ $message }}</div>
    @enderror
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="">Thể tích</label>
                                <input type="text" min="0" class="form-control  @error('volumeOptionOld.' . $key) is-invalid  @enderror" value="{{ old('volumeOptionOld')[$key] ?? $item->volume }}" name="volumeOptionOld[]" placeholder="Nhập đơn vị thể tích">
                                @error('volumeOptionOld.' . $key)
        <div class="invalid-feedback d-block">{{ $message }}</div>
    @enderror
                            </div>


                            <div class="form-group">
                                <label class="control-label" for="">Giá</label>
                                <input type="hidden" name="idOption[]" value="{{ $item->id }}">
                                <input type="number" min="0" class="form-control  @error('priceOptionOld.' . $key) is-invalid  @enderror" value="{{ old('priceOptionOld')[$key] ?? $item->price }}" name="priceOptionOld[]" placeholder="Nhập giá">
                                @error('priceOptionOld.' . $key)
        <div class="invalid-feedback d-block">{{ $message }}</div>
    @enderror
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="">Giá cũ</label>
                                <input type="number" min="0" class="form-control  @error('old_priceOptionOld.' . $key) is-invalid  @enderror" value="{{ old('old_priceOptionOld')[$key] ?? $item->old_price }}" name="old_priceOptionOld[]" placeholder="Nhập giá cũ">
                                @error('old_priceOptionOld.' . $key)
        <div class="invalid-feedback d-block">{{ $message }}</div>
    @enderror
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="">Ảnh đại diện</label>
                                <input type="file" class="form-control-file img-load-input border @error('avatar_type')
                                                                is-invalid @enderror" id="" name="avatar_typeOld[]">
                                @if ($item->avatar_type)
    <img src="{{ asset($item->avatar_type) }}" alt="{{ $item->name }}">
    @endif

                                @error('avatar_type')
        <div class="invalid-feedback d-block">{{ $message }}</div>
    @enderror
                                @if ($item->avatar_type)
    <label class="form-check-label" style="padding-left: 20px; margin-top: 5px;">
                                    <input type="checkbox" class="form-check-input" value="1" name="deleteavatar_type">
                                    Xóa ảnh
                                </label>
    @endif
                            </div>
                        </div>
                        <div class="action">
                            <a class="btn btn-sm btn-danger deleteOptionProductDB" data-url="{{ route('admin.product.destroyOptionProduct', ['id' => $item->id]) }}"><i class="far fa-trash-alt"></i></a>
                        </div>
                    </div>
    @endforeach
                </div>

                <div class="">Thêm loại mới <a data-url="{{ route('admin.product.loadOptionProduct') }}" class="btn  btn-info btn-md float-right " id="addOptionProduct">+ Thêm loại</a></div> -->
                                    <div class="list-item-option wrap-option mt-3" id="wrapOption">
                                        @if (old('priceOption') && old('priceOption'))
                                            @foreach (old('priceOption') as $key => $value)
                                                <div class="item-price">
                                                    <div class="box-content-price">

                                                        {{-- <div class="form-group">
                                                                    <label class="control-label" for="">Nhập số kg</label>
                                                                    <input type="text" min="0" class="form-control  @error('sizeOption.' . $key) is-invalid  @enderror"  value="{{ old('sizeOption')[$key] }}" name="sizeOption[]" placeholder="Nhập số kg">
            @error('sizeOption.' . $key)
            <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div> --}}
                                                        <div class="form-group">
                                                            <label class="control-label" for="">Đơn vị khối
                                                                lượng</label>
                                                            <input type="text" min="0"
                                                                class="form-control  @error('size') is-invalid  @enderror"
                                                                value="{{ old('size') }}" name="sizeOption[]"
                                                                placeholder="Nhập đơn vị khối lượng">
                                                            @error('sizeOption')
                                                                <div class="invalid-feedback d-block">{{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="control-label" for="">Giá mới</label>
                                                            <input type="number" min="0"
                                                                class="form-control  @error('priceOption.' . $key) is-invalid  @enderror"
                                                                value="{{ $value }}" name="priceOption[]"
                                                                placeholder="Nhập giá">
                                                            @error('priceOption.' . $key)
                                                                <div class="invalid-feedback d-block">{{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="control-label" for="">Giá cũ</label>
                                                            <input type="number" min="0"
                                                                class="form-control  @error('old_priceOption.' . $key) is-invalid  @enderror"
                                                                value="{{ $value }}" name="old_priceOption[]"
                                                                placeholder="Nhập giá cũ">
                                                            @error('old_priceOption.' . $key)
                                                                <div class="invalid-feedback d-block">{{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label" for="">Ảnh đại
                                                                diện</label>
                                                            <input type="file"
                                                                class="form-control-file img-load-input border @error('avatar_type')
                                                                    is-invalid @enderror"
                                                                id="" name="avatar_type[]">
                                                            @error('avatar_type')
                                                                <div class="invalid-feedback d-block">{{ $message }}
                                                                </div>
                                                            @enderror
                                                            @if ($item->avatar_type)
                                                                <label class="form-check-label"
                                                                    style="padding-left: 20px; margin-top: 5px;">
                                                                    <input type="checkbox" class="form-check-input"
                                                                        value="1" name="deleteavatar_type">
                                                                    Xóa ảnh
                                                                </label>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="action">
                                                        <a class="btn btn-sm btn-danger deleteOptionProduct"><i
                                                                class="far fa-trash-alt"></i></a>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endif
                                    </div>

                                </div>

                            </div>

                    </div>
                    </form>
                    <div class="card card-outline card-primary" style="width:100%">
                        <div class="card-header">
                            <h3 class="card-title">Danh sách bình luận</h3>
                        </div>

                        @php
                            $coment = \App\Models\ProductComment::where('product_id', $data->id)->get();
                        @endphp
                        <div class="card-body table-responsive p-0">
                            <table class="table table-head-fixed">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th class="text-nowrap">Họ tên</th>
                                        <th class="text-nowrap">Email</th>
                                        <th class="text-nowrap">Nội dung</th>
                                        {{-- <th class="text-nowrap">Số sao</th>  --}}
                                        <th class="text-nowrap">Bình luận Sản phẩm</th>
                                        <th class="text-nowrap">Trạng thái</th>
                                        <th>Thời gian</th>
                                        <th>Hành động</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($coment as $productstar)
                                        <tr>
                                            <td>{{ $productstar->id }}</td>
                                            <td>{{ $productstar->name }}</td>
                                            <td>{{ $productstar->email }}</td>
                                            <td>{{ $productstar->content }}</td>
                                            {{-- <td>{{ $productstar->star }}</td> --}}

                                            <td> <a href="{{ $productstar->origin->slug_full }}" target="_blank">
                                                    {{ $productstar->origin->name }} </a></td>
                                            <td class="wrap-load-hot"
                                                data-url="{{ route('admin.productcomment.load.hot', ['id' => $productstar->id]) }}">
                                                @include('admin.components.load-change-hot1', [
                                                    'data' => $productstar,
                                                    'type' => 'bình luận',
                                                ])
                                            </td>
                                            <td class="text-nowrap">{{ $productstar->created_at }}</td>
                                            <td>
                                                <a href=""
                                                    data-url="{{ route('admin.productcomment.destroy', ['id' => $productstar->id]) }}"
                                                    class="btn btn-sm btn-info btn-danger lb_delete"><i
                                                        class="far fa-trash-alt"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
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
            $(".select-2-init").select2({
                placeholder: "Chọn nhóm sản phẩm",
                allowClear: true
            })
        })
    </script>
    <script>
        $(function() {
            $(document).on('change', '.changeSupplier', function() {
                let val = parseInt($(this).val());
                if (val) {
                    $(".xacthuc a").text(supplier[val].link_verify);
                    $(".xacthuc a").attr('href', supplier[val].link_verify);
                }
            });
        });

        $(document).on('change', '.js_change_arr', function() {
            event.preventDefault();

            let category_id = $(this).val();
            let product_id = '{{ $data->id }}';
            let urlRequest = $(this).data('url');
            if (category_id) {
                $.ajax({
                    type: "GET",
                    url: urlRequest,
                    data: {
                        category_id: category_id,
                        product_id: product_id
                    },
                    dataType: "json",
                    success: function(response) {
                        if (response.code == 200) {
                            $("#attribute").html(response.html);
                        }
                    },
                });
            }
        });

        $(document).ready(function() {
            $('#price').number(true, 0, '.', ',');
            let price_show = $('#price').val();
            let price_hide = $('#price_hide').val(price_show);

            $('#old_price').number(true, 0, '.', ',');
            let old_price_show = $('#old_price').val();
            let old_price_hide = $('#old_price_hide').val(old_price_show);

            $('#capital').number(true, 0, '.', ',');
            let capital_show = $('#capital').val();
            let capital_hide = $('#capital_hide').val(capital_show);
        });

        $('#price').on('change', function() {
            let price_show = $('#price').val();
            let price_hide = $('#price_hide').val(price_show);
        });

        $('#old_price').on('change', function() {
            let old_price_show = $('#old_price').val();
            let old_price_hide = $('#old_price_hide').val(old_price_show);
        });

        $('#capital').on('change', function() {
            let capital_show = $('#capital').val();
            let capital_hide = $('#capital_hide').val(capital_show);
        });
    </script>
    <script>
        $(document).on('click', '.ui-button', function() {
            // let id = $(this).data('id');
            $('.form-input').removeClass('hidden');
            $('.ui-button').addClass('hidden');
        });
        $(document).ready(function() {
            $('.nameChange').on('input', function() {
                let language = $(this).data('lg');
                let name = $('.nameChange.' + language).val();
                let slug = createSlug(name);
                $('.changeTitle_' + language).val(name);
                $('.resultTitle_' + language).val(name);
                $('.resultSlug1_' + language).val(slug);
                $('.resultSlug2_' + language).val(slug);
                $('.resultUrl_' + language).val(slug);
            });
        });
        $(document).ready(function() {
            $('.changeAlias1').on('input', function() {
                let language = $(this).data('lg');
                let name = $('.changeAlias1.' + language).val();
                let slug = createSlug(name);
                $('.resultSlug2_' + language).val(slug);
                $('.resultUrl_' + language).val(slug);
            });
        });
        $(document).ready(function() {
            $('.changeAlias2').on('input', function() {
                let language = $(this).data('lg');
                let name = $('.changeAlias2.' + language).val();
                let slug = createSlug(name);
                $('.resultSlug1_' + language).val(slug);
                $('.resultUrl_' + language).val(slug);
            });
        });
        $(document).ready(function() {
            $('.changeTitle').on('input', function() {
                let language = $(this).data('lg');
                let name = $('.changeTitle.' + language).val();
                // let slug = createSlug(name);
                $('.resultTitle_' + language).val(name);
            });
        });
        $(document).ready(function() {
            $('.changeDescription').on('change', function() {

                let language = $(this).data('lg');
                let name = document.getElementById("description_seo_" + language);
                let div = document.getElementById("resultDescription_" + language);
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
    <script>
        $(document).ready(function() {
            $('.check-product').on('change', function() {
                var mainProductId = $(this).data('main');
                var compoundProductId = $(this).data('compound');
                var isChecked = $(this).prop('checked');
                $.ajax({
                    type: 'POST',
                    url: '{{ route('update-product-post') }}',
                    data: {
                        mainProductId: mainProductId,
                        compoundProductId: compoundProductId,
                        isChecked: isChecked,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(data) {
                        if (data.success) {
                            console.log('Dữ liệu đã được cập nhật thành công.');
                        }
                    }
                });
            });
        });
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/jquery-ui.min.js"
        integrity="sha512-57oZ/vW8ANMjR/KQ6Be9v/+/h6bq9/l3f0Oc7vn6qMqyhvPd1cvKBRWWpzu0QoneImqr2SkmO4MSqU+RpHom3Q=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $(function() {
            $(".image-list-small").sortable({
                change: function(event, ui) {
                    var form = $("#formNew");
                    form.find("input[name='index[]']").remove();

                    $(".image-list-small li").each(function(index, element) {
                        var inputValue = $(element).find("input[name='file_xx[]']").val();
                        if (inputValue && inputValue.trim() !== "") {
                            form.append('<input type="hidden" name="index[]" value="' +
                                inputValue + '">');
                        }
                    });
                },
            });
        });
    </script>
    <script>
        $(document).on('change', 'input[name="image[]"]', function(e) {
            // var count = $(this).val();
            // console.log(count.length);
            var file = e.target.files;
            var product_id_hidden = $('input[name="product_id_hidden"]').val();
            var formData = new FormData();
            for (let i = 0; i < file.length; i++) {
                formData.append('image' + i, file[i]);
            }
            formData.append('id', product_id_hidden);
            formData.append("total", file.length);
            $.ajax({
                headers: {
                    "X-CSRF-Token": $('input[name="_token"]').val(),
                },
                url: '{{ route('admin.product.uploadFileNew') }}',
                cache: false,
                type: "POST",
                data: formData,
                processData: false, ///required to upload file
                contentType: false, /// required
                success: function(response) {
                    console.log(response);
                    var u = response.arrPath;
                    console.log(u.length);
                    var html = '';
                    for (let j = 0; j < u.length; j++) {
                        var assetUrl =
                            "{{ asset('') }}"; // Sử dụng Laravel Blade syntax để đặt URL cơ sở của tệp tĩnh
                        html += `
                    <li style="position: relative">
                        <a href="javascript:;" style="background-image: url(${assetUrl}storage/${u[j]});"></a>
                        <input type="hidden" name="file_xx[]" value="storage/` + u[j] + `">
                    </li>
                    `;
                    }
                    $('.image-list-small').append(html);
                },
            });
        });
        $(".lb_delete_image_new").click(function() {
            // Xóa phần tử li chứa nút đã được click
            var dataId = $(this).data('id');
            var hiddenInput = '<input type="hidden" name="deleted_image_ids[]" value="' + dataId + '">';
            $("form").append(hiddenInput);
            $(this).closest("li").remove();
        });
    </script>
@endsection
