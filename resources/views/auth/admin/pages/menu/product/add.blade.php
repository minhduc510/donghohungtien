@extends('admin.layouts.main')
@section('title', 'Thêm Sản phẩm')

@section('css')
    <link href="{{ asset('lib/select2/css/select2.min.css') }}" rel="stylesheet" />
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

        .taiphieu1 {
            text-align: center;
            text-transform: uppercase;
            background: #138496;
            font-size: 14px;
            border: #5bc0de;
            padding: 5px 20px;
            border-radius: 0;
            font-weight: 600;
            color: #fff;
        }

        .taiphieu2 {
            text-align: center;
            text-transform: uppercase;
            background: #333;
            font-size: 14px;
            border: #5bc0de;
            padding: 5px 20px;
            border-radius: 0;
            font-weight: 600;
            color: #fff;
        }

        .card-header {
            border-bottom: 0;
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

        .body_result .variant {
            display: flex;
            gap: 10px;
        }
    </style>
@endsection
@section('content')


    <div class="content-wrapper">

        @include('admin.partials.content-header', ['name' => 'Sản phẩm', 'key' => 'Thêm Sản phẩm'])

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
                                        <button type="submit" class="btn btn-primary btn-lg taiphieu1">CHẤP NHẬN</button>
                                        <button type="reset" class="btn btn-danger btn-lg taiphieu2">LÀM LẠI</button>
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
                                                    <a class="nav-link" data-toggle="tab" href="#hinh_anh2">Hình ảnh thực
                                                        tế</a>
                                                </li> --}}
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
                                                        @foreach ($langConfig as $langItem)
                                                            <div id="tong_quan_{{ $langItem['value'] }}"
                                                                class="container wrapChangeSlug tab-pane {{ $langItem['value'] == $langDefault ? 'active show' : '' }} fade">
                                                                <div class="form-group">
                                                                    <div class="row">
                                                                        <label class="col-sm-2 control-label"
                                                                            for="">Tên sản phẩm</label>
                                                                        <div class="col-sm-10">
                                                                            <input type="text"
                                                                                class="form-control nameChangeSlug {{ $langItem['value'] }}
                                                                        @error('name_' . $langItem['value']) is-invalid @enderror"
                                                                                id="name_{{ $langItem['value'] }}"
                                                                                data-lg="{{ $langItem['value'] }}"
                                                                                value="{{ old('name_' . $langItem['value']) }}"
                                                                                name="name_{{ $langItem['value'] }}"
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


                                                                {{-- <div class="form-group">
                                                                    <div class="row">
                                                                        <div class="col-md-3">
                                                                            <label class="control-label" for="">Tham
                                                                                chiếu nội
                                                                                bộ</label>
                                                                        </div>
                                                                        <div class="col-md-9">
                                                                            <input type="text"
                                                                                   class="form-control  @error('tham_chieu_nb') is-invalid  @enderror"
                                                                                   value="{{ old('tham_chieu_nb') }}"
                                                                                   name="tham_chieu_nb"
                                                                                   placeholder="Tự động tính bằng tên hãng sản xuất + model"
                                                                                   readonly>
                                                                            @error('tham_chieu_nb')
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
                                                                            <label class="control-label" for="">Mã
                                                                                vạch</label>
                                                                        </div>
                                                                        <div class="col-md-9">
                                                                            <input type="text"
                                                                                   class="form-control  @error('ma_vach') is-invalid  @enderror"
                                                                                   value="{{ old('ma_vach') }}"
                                                                                   name="ma_vach"
                                                                                   placeholder="Nhập mã vạch">
                                                                            @error('ma_vach')
                                                                            <div class="invalid-feedback d-block">
                                                                                {{ $message }}
                                                                            </div>
                                                                            @enderror
                                                                        </div>
                                                                    </div>
                                                                </div> --}}


                                                                {{-- <div class="form-group field-required">
                                                                    <div class="row">
                                                                        <div class="col-md-3">
                                                                            <label class="control-label" for="">Chọn
                                                                                hãng sản xuất</label>

                                                                        </div>
                                                                        <script>
                                                                            var supplier = [];
                                                                        </script>
                                                                        <div class="col-md-9">
                                                                            <select
                                                                                    class="form-control @error('supplier_id')
                                                                                            is-invalid
                                                                                            @enderror"
                                                                                    id=""
                                                                                    value="{{ old('supplier_id') }}"
                                                                                    name="supplier_id">

                                                                                <option value="">--- Chọn hãng thương hiệu
                                                                                    ---
                                                                                </option>
                                                                                @foreach ($supplier as $item)
                                                                                    <script>
                                                                                        supplier[{
                                                                                        {
                                                                                            $item - > id
                                                                                        }
                                                                                        }]
                                                                                        = (({
                                                                                        !!$item - > toJson()
                                                                                        !!
                                                                                        }))
                                                                                        ;
                                                                                    </script>
                                                                                    <option value="{{ $item->id }}" @if (old('supplier_id')) {{ old('supplier_id') == $item->id ? 'selected' : '' }} @endif>
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
                                                                            <label class="control-label" for="">Mã
                                                                                sản phẩm</label>
                                                                        </div>
                                                                        <div class="col-md-10">
                                                                            <input type="text" min="0"
                                                                                class="form-control @error('masp') is-invalid  @enderror"
                                                                                value="{{ old('masp') }}" name="masp"
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
                                                                                class="form-control {{ $langItem['value'] }}
                                                                        @error('description2_' . $langItem['value']) is-invalid @enderror"
                                                                                id="description2_{{ $langItem['value'] }}"
                                                                                data-lg="{{ $langItem['value'] }}"
                                                                                value="{{ old('description2_' . $langItem['value']) }}"
                                                                                name="description2_{{ $langItem['value'] }}"
                                                                                placeholder="Tình trạng">
                                                                            @error('description2_' . $langItem['value'])
                                                                                <div class="invalid-feedback d-block">
                                                                                    {{ $message }}</div>
                                                                            @enderror
                                                                        </div>
                                                                    </div>
                                                                </div> --}}
                                                                {{-- <div class="form-group">
                                                                    <div class="row">
                                                                        <label class="col-sm-2 control-label"
                                                                            for="">Link video trên banner</label>
                                                                        <div class="col-sm-10">
                                                                            <input type="text"
                                                                                class="form-control {{ $langItem['value'] }}
                                                                        @error('content3_' . $langItem['value']) is-invalid @enderror"
                                                                                id="content3_{{ $langItem['value'] }}"
                                                                                data-lg="{{ $langItem['value'] }}"
                                                                                value="{{ old('content3_' . $langItem['value']) }}"
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
                                                                                class="form-control {{ $langItem['value'] }}
                                                                        @error('content4_' . $langItem['value']) is-invalid @enderror"
                                                                                id="content4_{{ $langItem['value'] }}"
                                                                                data-lg="{{ $langItem['value'] }}"
                                                                                value="{{ old('content4_' . $langItem['value']) }}"
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
                                            <input type="text" class="form-control {{$langItem['value']}}
                                                                        @error('description3_' . $langItem['value']) is-invalid @enderror" id="description3_{{$langItem['value']}}" data-lg="{{$langItem['value']}}" value="{{ old('description3_'.$langItem['value']) }}" name="description3_{{$langItem['value']}}" placeholder="Thời gian giao hàng">
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
                                            <input type="text" class="form-control {{$langItem['value']}}
                                                                        @error('description4_' . $langItem['value']) is-invalid @enderror" id="description4_{{$langItem['value']}}" data-lg="{{$langItem['value']}}" value="{{ old('description4_'.$langItem['value']) }}" name="description4_{{$langItem['value']}}" placeholder="Giới thiệu ngắn">
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
                                            {{ old('description_' . $langItem['value']) }}
                                            </textarea>
                                                                            @error('description_' . $langItem['value'])
                                                                                <div class="invalid-feedback d-block">
                                                                                    {{ $message }}
                                                                                </div>
                                                                            @enderror
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <div class="row">
                                                                        <label class="col-sm-2 control-label"
                                                                            for="">Mô tả sản phẩm</label>
                                                                        <div class="col-sm-10">
                                                                            <textarea class="form-control tinymce_editor_init @error('phukien_' . $langItem['value']) is-invalid  @enderror"
                                                                                name="phukien_{{ $langItem['value'] }}" id="ckeditor2" rows="20" value="" placeholder="Nhập mô tả">
                                            {{ old('phukien_' . $langItem['value']) }}
                                            </textarea>
                                                                            @error('phukien_' . $langItem['value'])
                                                                                <div class="invalid-feedback d-block">
                                                                                    {{ $message }}</div>
                                                                            @enderror
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                {{-- <div class="form-group">
                                                                    <div class="row">
                                                                        <label class="col-sm-2 control-label"
                                                                            for="">Nội dung bên cạnh thông
                                                                            số</label>
                                                                        <div class="col-sm-10">
                                                                            <textarea class="form-control tinymce_editor_init @error('content2_' . $langItem['value']) is-invalid  @enderror"
                                                                                name="content2_{{ $langItem['value'] }}" id="" rows="20" value=""
                                                                                placeholder="Nội dung bên cạnh thông số">
                                            {{ old('content2_' . $langItem['value']) }}
                                            </textarea>
                                                                            @error('content2_' . $langItem['value'])
                                                                                <div class="invalid-feedback d-block">
                                                                                    {{ $message }}</div>
                                                                            @enderror
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group">
                                                                    <div class="row">
                                                                        <label class="col-sm-2 control-label"
                                                                            for="">Thông số kỹ thuật</label>
                                                                        <div class="col-sm-10">
                                                                            <textarea class="form-control tinymce_editor_init @error('model_' . $langItem['value']) is-invalid  @enderror"
                                                                                name="model_{{ $langItem['value'] }}" id="" rows="20" value=""
                                                                                placeholder="Thông số kỹ thuật">
                                            {{ old('model_' . $langItem['value']) }}
                                            </textarea>
                                                                            @error('model_' . $langItem['value'])
                                                                                <div class="invalid-feedback d-block">
                                                                                    {{ $message }}</div>
                                                                            @enderror
                                                                        </div>
                                                                    </div>
                                                                </div> --}}
                                                                {{-- <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <label class="control-label" for="">
                                                Công năng
                                            </label>
                                        </div>
                                        <div class="col-sm-10">
                                            <textarea class="form-control tinymce_editor_init @error('content4_' . $langItem['value']) is-invalid  @enderror" name="content4_{{ $langItem['value'] }}" id="" rows="20" value="" placeholder="Nhập công năng">
                                            {{ old('content4_' . $langItem['value']) }}
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
                                        <label class="col-sm-2 control-label" for="">Thông số kỹ thuật </label>
                                        <div class="col-sm-10">
                                            <textarea class="form-control tinymce_editor_init @error('tainguyen_' . $langItem['value']) is-invalid  @enderror" name="tainguyen_{{$langItem['value']}}" id="" rows="20" value="" placeholder="Nhập thông số kỹ thuật">
                                            {{ old('tainguyen_'.$langItem['value']) }}
                                            </textarea>
                                            @error('tainguyen_' . $langItem['value'])
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div> --}}
                                                                {{-- <div class="form-group">
                                    <div class="row">
                                        <label class="col-sm-2 control-label" for="">Hỗ trợ sản phẩm </label>
                                        <div class="col-sm-10">
                                            <textarea class="form-control tinymce_editor_init @error('hotro_' . $langItem['value']) is-invalid  @enderror" name="hotro_{{$langItem['value']}}" id="" rows="20" value="" placeholder="Nhập hỗ trợ sản phẩm">
                                            {{ old('hotro_'.$langItem['value']) }}
                                            </textarea>
                                            @error('hotro_' . $langItem['value'])
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div> --}}
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
                                                                <div class="card card-outline card-primary">
                                                                    <div class="body_result">

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

                                                <!-- END Hình Ảnh -->
                                                <div id="thuoctinh" class="container tab-pane fade">

                                                    <div class="alert alert-light  mt-3 mb-1">
                                                        <strong>Chọn thuộc tính</strong>
                                                    </div>

                                                    <div id="attribute">

                                                    </div>

                                                    {{-- @foreach ($attributes as $key => $attribute)
                                                        <div class="form-group">
                                                            <label class="control-label"
                                                                for="">{{ $attribute->name }}</label>
                                                            @foreach ($attribute->childs()->orderby('order')->get() as $k => $attr)
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox"
                                                                        name="attribute[{{ $key }}][]"
                                                                        value="{{ $attr->id }}"
                                                                        @if (old('attribute') && in_array($attr->id, old('attribute')[$key])) checked @endif>
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
                                                    @endforeach --}}
                                                    {{-- @foreach ($attributes_baohanh as $key => $attribute)
                                                        <div class="form-group">
                                                            <label class="control-label" for="">{{ $attribute->name }}</label>
                <select class="form-control" name="attribute[]">
                    <option value="0">--Chọn--</option>
                    @foreach ($attribute->childs()->orderby('order')->get() as $k => $attr)
                    <option value="{{ $attr->id }}" @if (old('attribute')) {{ $attr->id == old('attribute')[$key] ? 'selected' : '' }} @endif>
                        {{ $attr->name }}
                    </option>
                    @endforeach
                </select>
                @error('attribute.' . $key)
                <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>
            @endforeach --}}
                                                    <div class="form-group wrap-permission" id="loadAjaxAttribute">
                                                        <div style="border: 1px solid; padding: 5px;">
                                                            <div
                                                                style="height: 750px; overflow: auto;border: 1px solid #eee;font-size: 12px;line-height: 18px;">
                                                                @foreach ($attributes as $item)
                                                                    <div class="item-permission mt-2 mb-2">
                                                                        <div class="form-check permission-title">
                                                                            <label
                                                                                class="form-check-label p-3">{{ $item->name }}</label>
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
                                                                                                    <input type="checkbox"
                                                                                                        class="form-check-input check-attribute check-children"
                                                                                                        name="attribute[]"
                                                                                                        value="{{ $itemChild->id }}">{{ $itemChild->name }}
                                                                                                </label>
                                                                                            </div>
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
                                                <div id="hinh_anh" class="container tab-pane fade">

                                                    <div class="wrap-load-image mb-3">
                                                        <div class="form-group">
                                                            <label for="">Ảnh liên quan</label>
                                                            <input type="file"
                                                                class="form-control-file img-load-input-multiple border @error('image')
                                                            is-invalid
                                                            @enderror"
                                                                id="" name="image[]" multiple>
                                                        </div>
                                                        @error('image')
                                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                                        @enderror
                                                        <div class="load-multiple-img">
                                                            <img class=""
                                                                src="{{ asset('admin_asset/images/upload-image.png') }}">
                                                            <img class=""
                                                                src="{{ asset('admin_asset/images/upload-image.png') }}">
                                                            <img class=""
                                                                src="{{ asset('admin_asset/images/upload-image.png') }}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="hinh_anh2" class="container tab-pane fade">

                                                    <div class="wrap-load-image mb-3">
                                                        <div class="form-group">
                                                            <label for="">Ảnh thực tế</label>
                                                            <input type="file"
                                                                class="form-control-file img-load-input-multiple border @error('image2')
                                                            is-invalid
                                                            @enderror"
                                                                id="" name="image2[]" multiple>
                                                        </div>
                                                        @error('image2')
                                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                                        @enderror
                                                        <div class="load-multiple-img">
                                                            <img class=""
                                                                src="{{ asset('admin_asset/images/upload-image.png') }}">
                                                            <img class=""
                                                                src="{{ asset('admin_asset/images/upload-image.png') }}">
                                                            <img class=""
                                                                src="{{ asset('admin_asset/images/upload-image.png') }}">
                                                        </div>
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
        <div class="form-group">
            <div class="row">
                <label class="col-sm-2 control-label" for="">Nhập tags</label>
                <div class="col-sm-10">
                    {{ dd(old('tags_'.$langItem['value'])) }}
                    <select class="form-control tag-select-choose w-100" multiple="multiple" name="tags_{{$langItem['value']}}[]">
                        @if (old('tags_' . $langItem['value']))
                        @foreach (old('tags_' . $langItem['value']) as $tag)
                        <option value="{{ $tag }}" selected>{{ $tag }}</option>
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
                                        <div class="card-body">
                                            <div class="form-group wrap-permission">
                                                <div style="border: 1px solid; padding: 5px;">
                                                    <label class="control-label" for="">Lựa chọn chuyên
                                                        mục</label>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div
                                                                style="height: 250px; overflow: auto;border: 1px solid #eee;font-size: 12px;line-height: 18px;">
                                                                @foreach ($data_cate as $item)
                                                                    <div class="item-permission mt-2 mb-2">
                                                                        <div class="form-check permission-title">
                                                                            <label class="form-check-label p-2">
                                                                                <input type="checkbox"
                                                                                    class="form-check-input check-parent"
                                                                                    value="{{ $item->id }}"
                                                                                    name="category[]">{{ $item->name }}
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
                                                                                                        class="form-check-input check-children check-category"
                                                                                                        name="category[]"
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
                                                                                                                        class="form-check-input check-children check-category"
                                                                                                                        name="category[]"
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

                                                            <option value="">--- Chọn hãng thương hiệu
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
                                                                    @if (old('supplier_id')) {{ old('supplier_id') == $item->id ? 'selected' : '' }} @endif>
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
                                            {{-- <div class="form-group field-required">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <label class="control-label" for="">Mã
                                                            sản phẩm</label>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <input type="text" min="0"
                                                            class="form-control @error('masp') is-invalid  @enderror"
                                                            value="{{ old('masp') }}" name="masp"
                                                            placeholder="Nhập mã sản phẩm">
                                                        @error('masp')
                                                            <div class="invalid-feedback d-block">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group wrap-permission">
                                                <div style="border: 1px solid; padding: 5px;">
                                                    <label class="control-label" for="">Chọn sản phẩm ghép
                                                        cùng</label>
                                                    <div class="row">
                                                        <div class="form-group col-md-12">
                                                            <input id="keyword" value="" name=""
                                                                type="text" class="form-control"
                                                                placeholder="Từ khóa">
                                                        </div>
                                                        <div class="col-md-12">
                                                            <a class="btn btn-success w-100" onclick="searchProduct()"><i
                                                                    class="fas fa-search"></i></a>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div id="search-results"
                                                                style="height: 250px; overflow: auto;border: 1px solid #eee;font-size: 12px;line-height: 18px;">
                                                                @php
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
                                                                                    class="form-check-input check-parent"
                                                                                    value="{{ $item->id }}"
                                                                                    name="product_product[]">
                                                                                {{ $item->name }}
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <script>
                                                        function searchProduct() {
                                                            var keywordValue = document.getElementById("keyword").value;
                                                            $.ajax({
                                                                url: '{{ route('admin.product.search') }}',
                                                                type: 'GET',
                                                                data: {
                                                                    keyword: keywordValue
                                                                },
                                                                success: function(response) {
                                                                    $('#search-results').html(response);
                                                                },
                                                                error: function(xhr, status, error) {

                                                                }
                                                            });
                                                        }
                                                    </script>
                                                </div>
                                            </div> --}}

                                            {{-- <div class="form-group">
                                                <div class="row">
                                                    <label class="control-label" for="">Chọn nhóm sản phẩm</label>
                                                    <div class="col-sm-12">
                                                        <select name="product_child[]" class="form-control select-2-init" id="" multiple>
                                                            <option value=""></option>
                                                            @foreach ($dataProduct as $productItem)
                                                            <option value="{{ $productItem->id }}">{{ $productItem->name }}</option>
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
                        <input type="checkbox" value="{{ $danhmuc->id }}" id="checkbox-filter-{{ $danhmuc->id }}" name="danhmuc[]">
                        <label for="checkbox-filter-{{ $danhmuc->id }}" style="font-weight: normal;">
                            <span>{{ $danhmuc->name }}</span>
                        </label>
                    </li>
                    @endforeach
                    @endif
                </div>
            </div>
            <div style="height: 250px; overflow: auto;border: 1px solid #eee;font-size: 12px;line-height: 18px;">
                @foreach ($data as $item)
                <div class="item-permission mt-2 mb-2">
                    <div class="form-check permission-title">
                        <label class="form-check-label p-3">
                            <input type="checkbox" class="form-check-input check-parent" value="{{ $item->id }}" name="product_parent[]">{{ $item->name }}
                        </label>
                    </div>
                    @if (count($item->childs) > 0)
                    <div class="list-permission p-3 pl-4">
                        <div class="row">
                            @foreach ($item->childs()->with('translationsLanguage')->where('active', 1)->orderBy('order')->get() as $itemChild)
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input check-children check-category" name="category[]" value="{{ $itemChild->id }}">{{ $itemChild->name }}
                                    </label>
                                </div>
                                @if (count($itemChild->childs) > 0)
                                <div class="row">
                                    @foreach ($itemChild->childs()->with('translationsLanguage')->where('active', 1)->orderBy('order')->get() as $itemChild2)
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="form-check pl-5">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input check-children check-category" name="category[]" value="{{ $itemChild2->id }}">{{ $itemChild2->name }}
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
                                            {{-- <div class="wrap-load-image mb-3">
                                                <div class="form-group">
                                                    <label for="">Ảnh Banner</label>
                                                    <input type="file"
                                                        class="form-control-file img-load-input border @error('avatar_path2')
    is-invalid
    @enderror"
                                                        id="" name="avatar_path2">
                                                    <!-- Select avatar -->
                                                    <input type="hidden" name="avatar_path_select"
                                                        id="avatar_path_select">
                                                    <!--/ Select avatar -->
                                                    @error('avatar_path2')
                                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <img class="img-load border p-1 w-100" id="img_avatar_path"
                                                    src="{{ asset('admin_asset/images/upload-image.png') }}"
                                                    style="height: 200px;object-fit:cover; max-width: 260px;">
                                            </div> --}}
                                            <div class="wrap-load-image mb-3">
                                                <div class="form-group">
                                                    <label for="">Ảnh đại diện</label>
                                                    <input type="file"
                                                        class="form-control-file img-load-input border @error('avatar_path')
                                                    is-invalid
                                                    @enderror"
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
                                            </div>

                                            {{-- <div class="wrap-load-image mb-3">
                                                <div class="form-group">
                                                    <label for="">Ảnh mô tả</label>
                                                    <input type="file"
                                                        class="form-control-file img-load-input border @error('avatar_path3')
                                                    is-invalid
                                                    @enderror"
                                                        id="" name="avatar_path3">
                                                    <!-- Select avatar -->
                                                    <input type="hidden" name="avatar_path3_select"
                                                        id="avatar_path3_select">

                                                    <!--/ Select avatar -->
                                                    @error('avatar_path3')
                                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <img class="img-load border p-1 w-100" id="img_avatar_path"
                                                    src="{{ asset('admin_asset/images/upload-image.png') }}"
                                                    style="height: 200px;object-fit:cover; max-width: 260px;">
                                            </div> --}}
                                            {{-- <div class="form-group field-required">
                <div class="row">
                    <div class="col-md-3">
                        <label class="control-label" for="">Tiền
                            tệ</label>
                    </div>
                    <div class="col-md-9">
                        <select name="type_price" class="form-control" required>
                            @foreach (config('web_default.typePrice') as $key => $item)
                            <option value="{{ $key }}" {{ old('type_price') == $key ? 'selected' : '' }}>
{{ $item['name'] }}
</option>
@endforeach
</select>
@error('type_price')
<div class="invalid-feedback d-block">
    {{ $message }}
</div>
@enderror
</div>
</div>
</div> --}}
                                            {{-- <div class="form-group">
                <div class="row">
                    <div class="col-md-3">
                        <label class="control-label" for="">Số lượng đã bán</label>
                    </div>
                    <div class="col-md-9">
                        <input type="number" min="0" class="form-control  @error('pay') is-invalid  @enderror" value="{{ old('pay') }}" name="pay" placeholder="Nhập số lượng đã bán">
@error('price')
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
                                                            placeholder="Nhập giá">
                                                        <input id="price_hide" type="hidden" min="0"
                                                            class="form-control  @error('price') is-invalid  @enderror"
                                                            value="{{ old('price') }}" name="price"
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
                                                        <label class="control-label" for="">Giảm giá (%)</label>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <input id="old_price" type="text"
                                                            class="form-control  @error('old_price') is-invalid   @enderror"
                                                            placeholder="Giảm giá (%)">
                                                        <input id="old_price_hide" type="hidden" min="0"
                                                            class="form-control  @error('old_price') is-invalid  @enderror"
                                                            value="{{ old('old_price') }}" name="old_price"
                                                            placeholder="Giảm giá (%)">
                                                        @error('old_price')
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
                                                        <label class="control-label" for="">Sản phẩm khuyến
                                                            mãi</label>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <div class="form-check-inline">
                                                            <label class="form-check-label">
                                                                <input type="checkbox"
                                                                    class="form-check-input @error('sale')
                                                                               is-invalid
                                                                        @enderror"
                                                                    value="1" name="sale"
                                                                    @if (old('sale') === '1') {{ 'checked' }} @endif>
                                                            </label>
                                                        </div>
                                                        @error('sale')
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
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <label class="control-label" for="">Còn hàng</label>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <div class="form-check-inline">
                                                            <label class="form-check-label">
                                                                <input type="checkbox"
                                                                    class="form-check-input @error('size')
                    is-invalid
                    @enderror"
                                                                    value="1" name="size"
                                                                    @if (old('size') === '1') {{ 'checked' }} @endif>
                                                            </label>
                                                        </div>
                                                        @error('size')
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
                                                                                        <input type="datetime-local" class="form-control  @error('updated_at')
            is-invalid
            @enderror" id="" name="updated_at" value="{{ old('updated_at') }}">
                                                                                        @error('updated_at')
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
            @enderror" id="" name="deleted_at" value="{{ old('deleted_at') }}">
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
                                        </div>
                                    </div>
                                    {{-- <div class="card card-outline card-primary">
                                        <div class="card-header">
                                            <h3 class="card-title">Chọn giá sản phẩm theo size</h3>
                                        </div>
                                        <div class="card-body table-responsive p-3">
                                            <div class="item-price-default">
                                                <div class="form-group">
                                                    <label class="control-label" for="">Đơn vị khối lượng</label>
                                                    <input type="text" min="0" class="form-control  @error('size') is-invalid  @enderror"  value="{{ old('size') }}" name="size" placeholder="Nhập đơn vị khối lượng">
                                            @error('size')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label" for="">Giá</label>
                                            <input type="number" min="0" class="form-control  @error('price') is-invalid  @enderror" value="{{ old('price') }}" name="price" placeholder="Nhập giá">
                                            @error('price')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label" for="">Giá cũ</label>
                                            <input type="number" min="0" class="form-control  @error('old_price') is-invalid  @enderror" value="{{ old('old_price') }}" name="old_price" placeholder="Nhập giá cũ">
                                            @error('old_price')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                            @enderror
                                        </div>


                                    </div> --}}
                                    {{-- <div class="">Thêm loại <a
                                                    data-url="{{ route('admin.product.loadOptionProduct') }}"
                                                    class="btn  btn-info btn-md float-right " id="addOptionProduct">+ Thêm
                                                    loại</a></div> --}}
                                    {{-- <div class="list-item-option wrap-option mt-3" id="wrapOption">
                                                @if (old('priceOption') && old('priceOption'))
                                                    @foreach (old('priceOption') as $key => $value)
                                                        <div class="item-price">
                                                            <div class="box-content-price">
                                                                <div class="form-group">
                                                                <label class="control-label" for="">Số kg</label>
                                                                <input type="text" min="0" class="form-control  @error('sizeOption.' . $key) is-invalid  @enderror"  value="{{ old('sizeOption')[$key] }}" name="sizeOption[]" placeholder="Nhập kg">
                                                            @error('sizeOption.' . $key)
                                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                                            @enderror
                                                        </div>

                                                                <div class="form-group">
                                                            <label class="control-label" for="">Giá</label>
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
                                                                value="{{ old('old_priceOption')[$key] }}"
                                                                name="old_priceOption[]" placeholder="Nhập giá cũ">
                                                            @error('old_priceOption.' . $key)
                                                                <div class="invalid-feedback d-block">{{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>
                                                            </div>
                                                            <div class="action">
                                                                <a class="btn btn-sm btn-danger deleteOptionProduct"><i
                                                                        class="far fa-trash-alt"></i></a>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                @endif
                                            </div> --}}

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
        $(function() {
            $(".select-2-init").select2({
                placeholder: "Chọn nhóm sản phẩm",
                allowClear: true
            })
        });
        $(document).on('click', '.check-category', function(e) {
            var ids = [];
            $('.check-category:checked').each(function() {
                if ($(this).val() !== undefined && $(this).val() !== '') {
                    ids.push($(this).val());
                }
            });
            $.ajax({
                // headers: {
                //     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                // },
                type: 'GET',
                url: "{{ route('admin.product.get-attribute') }}",
                data: {
                    ids: ids
                },
                success: function(data) {
                    if (data.success) {
                        $('#loadAjaxAttribute').html(data.html);
                    } else {
                        $('#loadAjaxAttribute').html('<p>' + data.message + '</p>');
                    }
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        });
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

            let id = $(this).val();
            let urlRequest = $(this).data('url');
            if (id) {
                $.ajax({
                    type: "GET",
                    url: urlRequest,
                    data: {
                        id: id
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
        function updateAlias(input) {
            var slug = input.value;
            var langValue = input.name.split('_')[1];
            var aliasInput = document.getElementById('alias_' + langValue);
            aliasInput.value = slug;
        }
    </script>

    <script>
        $('.add_all_attribute').click(function() {
            $.ajax({
                url: '/admin/product/callAjaxAttributes',
                type: "GET",
                data: {
                    type: 0
                },
                success: function(res) {
                    console.log(res)
                    var html = '';
                    $('.body_result').html(res['html']);

                },
                errors: function(err) {
                    console.log(err)
                }
            })
        })
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
