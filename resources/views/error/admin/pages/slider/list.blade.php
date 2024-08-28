@extends('admin.layouts.main')
@section('title', 'Danh sách slider và banner')
@section('css')
@endsection

@section('content')
    <div class="content-wrapper lb_template_list_slider">

        @include('admin.partials.content-header', [
            'name' => 'Slider',
            'key' => 'Danh sách slider và banner',
        ])

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
                        <a href="{{ route('admin.slider.create') }}" class="btn  btn-info btn-md mb-2">+ Thêm mới</a>
                        <div class="card card-outline card-primary">
                            <div class="card-body table-responsive p-0 lb-list-category">
                                <table class="table table-head-fixed" style="font-size: 13px;">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th class="white-space-nowrap ">Tên Slide</th>
                                            <th class="white-space-nowrap">Mô tả</th>
                                            <th class="white-space-nowrap">Hình ảnh</th>
                                            <th class="white-space-nowrap">Kiểu</th>
                                            <th>STT</th>
                                            <th class="white-space-nowrap">Hiển thị</th>
                                            <th style="width:150px;">Thao tác</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $sliderItem)
                                            <tr>
                                                <td>{{ $loop->index + 1 }}</td>
                                                <td>{{ $sliderItem->name }}</td>
                                                <td class="w-50">{!! $sliderItem->description !!}</td>
                                                <td><img src="{{ asset($sliderItem->image_path) }}"
                                                        alt="{{ $sliderItem->name }}" style="width:80px;"></td>
                                                <td>
                                                    {{ config('web_default.type_slider.' . $sliderItem->type) ?? '' }}
                                                </td>
                                                <td> <input
                                                        data-url="{{ route('admin.loadOrderVeryModel', ['table' => 'sliders', 'id' => $sliderItem->id]) }}"
                                                        class="lb-order text-center" type="number" min="0"
                                                        value="{{ $sliderItem->order ? $sliderItem->order : 0 }}"
                                                        style="width:50px" /></td>
                                                <td class="wrap-load-active"
                                                    data-url="{{ route('admin.slider.load.active', ['id' => $sliderItem->id]) }}">
                                                    @include('admin.components.load-change-active', [
                                                        'data' => $sliderItem,
                                                        'type' => 'slider',
                                                    ])
                                                </td>
                                                <td>
                                                    <a href="{{ route('admin.slider.edit', ['id' => $sliderItem->id]) }}"
                                                        class="btn btn-sm btn-success tooltip11"><i
                                                            class="fas fa-edit"></i><span class="tooltiptext">Sửa</span></a>
                                                    <a data-url="{{ route('admin.slider.destroy', ['id' => $sliderItem->id]) }}"
                                                        class="btn btn-sm btn-danger lb_delete tooltip11"><i
                                                            class="far fa-trash-alt"></i><span
                                                            class="tooltiptext">Xóa</span></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="col-md-12">
                        {{ $data->links() }}
                    </div> --}}

                    {{-- <div class="col-md-12">
                        <div class="card card-outline card-primary">
                            <div class="card-body table-responsive p-0 lb-list-category">
                                <table class="table table-head-fixed" style="font-size: 13px;">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th class="white-space-nowrap ">Tên Banner</th>
                                            <th class="white-space-nowrap ">Mô tả</th>
                                            <th class="white-space-nowrap">Hình ảnh</th>
                                            <th class="white-space-nowrap">Kiểu</th>
                                            <th>STT</th>
                                            <th class="white-space-nowrap">Hiển thị</th>
                                            <th style="width:150px;">Thao tác</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($data2 as $sliderItem)
                                            <tr>
                                                <td>{{ $loop->index + 1 }}</td>
                                                <td>{{ $sliderItem->name }}</td>
                                                <td class="w-50">{!! $sliderItem->description !!}</td>
                                                <td><img src="{{ asset($sliderItem->image_path) }}"
                                                        alt="{{ $sliderItem->name }}" style="width:80px;"></td>
                                                <td>
                                                    {{ config('web_default.type_slider.' . $sliderItem->type) ?? '' }}
                                                </td>
                                                <td> <input
                                                        data-url="{{ route('admin.loadOrderVeryModel', ['table' => 'sliders', 'id' => $sliderItem->id]) }}"
                                                        class="lb-order text-center" type="number" min="0"
                                                        value="{{ $sliderItem->order ? $sliderItem->order : 0 }}"
                                                        style="width:50px" /></td>
                                                <td class="wrap-load-active"
                                                    data-url="{{ route('admin.slider.load.active', ['id' => $sliderItem->id]) }}">
                                                    @include('admin.components.load-change-active', [
                                                        'data' => $sliderItem,
                                                        'type' => 'slider',
                                                    ])
                                                </td>
                                                <td>
                                                    <a href="{{ route('admin.slider.edit', ['id' => $sliderItem->id]) }}"
                                                        class="btn btn-sm btn-success tooltip11"><i
                                                            class="fas fa-edit"></i><span class="tooltiptext">Sửa</span></a>
                                                    <a data-url="{{ route('admin.slider.destroy', ['id' => $sliderItem->id]) }}"
                                                        class="btn btn-sm btn-danger lb_delete tooltip11"><i
                                                            class="far fa-trash-alt"></i><span
                                                            class="tooltiptext">Xóa</span></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div> --}}
                    {{-- <div class="col-md-12">
                        {{ $data2->links() }}
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
@endsection
