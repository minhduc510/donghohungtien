@extends('admin.layouts.main')
@section('title', 'Sửa thương hiệu')

@section('css')
@endsection
@section('content')
    <div class="content-wrapper lb_template_slider_edit">
        @include('admin.partials.content-header', ['name' => 'Thương hiệu', 'key' => 'Sửa thương hiệu'])
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
                        <form action="{{ route('admin.supplier.update', ['id' => $data->id]) }}" method="POST"
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
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="card card-outline card-primary">
                                        <div class="card-header">
                                            <h3 class="card-title">Thông tin thương hiệu</h3>
                                        </div>
                                        <div class="card-body table-responsive p-3">
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
                                                        class="p-3 tab-pane {{ $langItem['value'] == $langDefault ? 'active show' : '' }} fade">
                                                        <div class="form-group">
                                                            <div class="row">
                                                                <label class="col-sm-2 control-label"
                                                                    for="">Tên</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text"
                                                                        class="form-control nameChangeSlug
                                                    @error('name_' . $langItem['value']) is-invalid @enderror"
                                                                        id="name_{{ $langItem['value'] }}"
                                                                        value="{{ old('name_' . $langItem['value']) ?? optional($data->translationsLanguage($langItem['value'])->first())->name }}"
                                                                        name="name_{{ $langItem['value'] }}"
                                                                        placeholder="Nhập tên">
                                                                    @error('name_' . $langItem['value'])
                                                                        <div class="invalid-feedback d-block">
                                                                            {{ $message }}</div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>


                                                        {{-- <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-2 control-label" for="">Nhập mô tả</label>
                                                <div class="col-sm-10">
                                                    <textarea class="form-control tinymce_editor_init @error('description_' . $langItem['value']) is-invalid  @enderror" name="description_{{$langItem['value']}}" id="" rows="20" value="" placeholder="Nhập mô tả">
                                                    {{ old('description_'.$langItem['value'])??optional($data->translationsLanguage($langItem['value'])->first())->description }}
                                                    </textarea>
                                                    @error('description_' . $langItem['value'])
                                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div> --}}
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="card card-outline card-primary">
                                        <div class="card-header">
                                            <h3 class="card-title">Thông tin khác</h3>
                                        </div>
                                        <div class="card-body table-responsive p-3">
                                            <div class="wrap-load-image mb-3">
                                                <div class="form-group">
                                                    <label for="">Ảnh banner</label>
                                                    <input type="file" class="form-control-file img-load-input border"
                                                        id="" value="" name="logo_path">
                                                </div>
                                                @error('logo_path')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                                @if ($data->logo_path)
                                                    <img class="img-load border p-1 w-100"
                                                        src="{{ asset($data->logo_path) }}" alt="{{ $data->name }}"
                                                        style="object-fit:contain;">
                                                @endif
                                            </div>
                                            <div class="wrap-load-image mb-3">
                                                <div class="form-group">
                                                    <label for="">Ảnh logo thương hiệu</label>
                                                    <input type="file" class="form-control-file img-load-input border"
                                                        id="" value="" name="avatar_path">
                                                </div>
                                                @error('avatar_path')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                                @if ($data->avatar_path)
                                                    <img class="img-load border p-1 w-100"
                                                        src="{{ asset($data->avatar_path) }}" alt="{{ $data->name }}"
                                                        style="object-fit:contain;">
                                                @endif
                                            </div>
                                            {{-- <div class="form-group">
                                    <label class=" control-label" for="">Fax</label>
                                    <input type="text" class="form-control
                                    @error('fax') is-invalid @enderror" id="fax" value="{{ old('fax')??optional($data)->name }}" name="fax" placeholder="Nhập fax">
                                    @error('fax')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="">Phone</label>
                                    <input type="text" class="form-control
                                    @error('phone') is-invalid @enderror" id="phone" value="{{ old('phone')??optional($data)->phone }}" name="phone" placeholder="Nhập phone">
                                    @error('phone')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="">Email</label>
                                    <input type="text" class="form-control
                                    @error('email') is-invalid @enderror" id="email" value="{{ old('email')??optional($data)->email }}" name="email" placeholder="Nhập email">
                                    @error('email')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="">Website</label>
                                    <input type="text" class="form-control
                                    @error('website') is-invalid @enderror" id="website" value="{{ old('website')??optional($data)->website }}" name="website" placeholder="Nhập website">
                                    @error('website')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div> --}}
                                            <div class="form-group">
                                                <label class="control-label" for="">Số thứ tự</label>
                                                <input type="number" min="0"
                                                    class="form-control  @error('order') is-invalid  @enderror"
                                                    value="{{ old('order') ?? $data->order }}" name="order"
                                                    placeholder="Nhập số thứ tự">
                                                @error('order')
                                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label" for="">Trạng thái</label>
                                                <div class="form-check-inline">
                                                    <label class="form-check-label">
                                                        <input type="radio" class="form-check-input" value="1"
                                                            name="active"
                                                            @if (old('active') === '1' || $data->active == 1) {{ 'checked' }} @endif>Hiện
                                                    </label>
                                                </div>
                                                <div class="form-check-inline">
                                                    <label class="form-check-label">
                                                        <input type="radio" class="form-check-input" value="0"
                                                            @if (old('active') === '0' || $data->active == 0) {{ 'checked' }} @endif
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
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')

@endsection
