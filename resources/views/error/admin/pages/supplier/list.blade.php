@extends('admin.layouts.main')
@section('title', 'Danh sánh Thương hiệu')
@section('css')
@endsection

@section('content')
    <div class="content-wrapper lb_template_list_slider">

        @include('admin.partials.content-header', [
            'name' => 'Thương hiệu',
            'key' => 'Danh sách Thương hiệu',
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
                        <a href="{{ route('admin.supplier.create') }}" class="btn  btn-info btn-md mb-2">+ Thêm mới</a>
                        <div class="card card-outline card-primary">
                            <div class="card-body table-responsive p-0 lb-list-category">
                                <table class="table table-head-fixed" style="font-size: 13px;">
                                    <thead>
                                        <tr>
                                            <th>STT</th>
                                            <th>ID</th>
                                            <th>Tên</th>
                                            {{-- <th>slug</th> --}}
                                            {{-- <th class="white-space-nowrap ">Mô tả</th> --}}
                                            <th class="white-space-nowrap">Hình ảnh</th>
                                            <th class="white-space-nowrap">Hiển thị</th>
                                            <th style="width:150px;">Thao tác</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($data as $supplierItem)
                                            <tr>
                                                <td>{{ $loop->index + 1 }}</td>
                                                <td>{{ $supplierItem->id }}</td>
                                                <td>{{ $supplierItem->name }}</td>
                                                {{-- <td>{{$supplierItem->slug}}</td> --}}
                                                {{-- <td class="w-50">{{$supplierItem->description}}</td> --}}
                                                <td><img src="{{ asset($supplierItem->logo_path) }}"
                                                        alt="{{ $supplierItem->name }}" style="width:80px;"></td>
                                                <td class="wrap-load-active"
                                                    data-url="{{ route('admin.supplier.load.active', ['id' => $supplierItem->id]) }}">
                                                    @include('admin.components.load-change-active', [
                                                        'data' => $supplierItem,
                                                        'type' => 'supplier',
                                                    ])
                                                </td>
                                                <td>
                                                    <a href="{{ route('admin.supplier.edit', ['id' => $supplierItem->id]) }}"
                                                        class="btn btn-sm btn-success tooltip11"><i
                                                            class="fas fa-edit"></i><span class="tooltiptext">Sửa</span></a>
                                                    <a data-url="{{ route('admin.supplier.destroy', ['id' => $supplierItem->id]) }}"
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
                    <div class="col-md-12">
                        {{ $data->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')

@endsection
