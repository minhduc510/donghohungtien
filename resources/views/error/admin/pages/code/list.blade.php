@extends('admin.layouts.main')
@section('title', 'Danh sánh code')
@section('css')
@endsection

@section('content')
    <div class="content-wrapper lb_template_list_code">

        @include('admin.partials.content-header', ['name' => 'Code', 'key' => 'Danh sách code'])

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
                        <a href="{{ route('admin.code.create') }}" class="btn  btn-info btn-md mb-2">+ Thêm mới</a>
                        <div class="card card-outline card-primary">
                            <div class="card-body table-responsive p-0 lb-list-category">
                                <table class="table table-head-fixed" style="font-size: 13px;">
                                    <thead>
                                        <tr>
                                            <th>STT</th>
                                            {{-- <th>ID</th> --}}
                                            <th>Name</th>
                                            {{-- <th>slug</th> --}}
                                            {{-- <th class="white-space-nowrap ">Mô tả</th> --}}
                                            <th>Số thứ tự</th>
                                            <th>Hiển thị</th>
                                            {{-- <th class="white-space-nowrap">Hình ảnh</th> --}}
                                            {{-- <th class="white-space-nowrap">Hiển thị</th> --}}
                                            <th style="width:150px;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($data as $codeItem)
                                            <tr>
                                                <td>{{ $loop->index }}</td>
                                                {{-- <td>{{$codeItem->id}}</td> --}}
                                                <td>{{ $codeItem->name }}</td>
                                                {{-- <td>{{$codeItem->slug}}</td> --}}
                                                {{-- <td class="w-50">{{$codeItem->description}}</td> --}}
                                                <td><input
                                                        data-url="{{ route('admin.loadOrderVeryModel', ['table' => 'codes', 'id' => $codeItem->id]) }}"
                                                        class="lb-order text-center" type="number" min="0"
                                                        value="{{ $codeItem->order ? $codeItem->order : 0 }}"
                                                        style="width:50px" />
                                                    {{-- <td><img src="{{asset($codeItem->image_path)}}" alt="{{$codeItem->name}}" style="width:80px;"></td> --}}
                                                <td class="wrap-load-active"
                                                    data-url="{{ route('admin.code.load.active', ['id' => $codeItem->id]) }}">
                                                    @include('admin.components.load-change-active', [
                                                        'data' => $codeItem,
                                                        'type' => 'code',
                                                    ])
                                                </td>
                                                <td>
                                                    <a href="{{ route('admin.code.edit', ['id' => $codeItem->id]) }}"
                                                        class="btn btn-sm btn-success"><i class="fas fa-edit"></i> Sửa</a>
                                                    {{-- <a data-url="{{route('admin.code.destroy',['id'=>$codeItem->id])}}" class="btn btn-sm btn-danger lb_delete"><i class="far fa-trash-alt"></i></a> --}}
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
