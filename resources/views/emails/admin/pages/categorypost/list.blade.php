@extends('admin.layouts.main')
@section('title', 'danh sach category post')
@section('css')
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;0,800;1,300;1,400;1,600;1,700;1,800&display=swap');

        .card-header {
            color: #4c4d5a;
            border-color: #dcdcdc;
            background: #f6f6f6;
            text-shadow: 0 -1px 0 rgb(50 50 50 / 0%);
        }

        .title-card-recusive {
            font-size: 13px;
            background: #ECF0F5;
        }

        .lb_list_category {
            font-size: 13px;
            margin-bottom: 0;
        }

        .fa-check-circle {
            color: #169F85;
            font-size: 18px;
        }

        .fa-check-circle {
            color: #169F85;
            font-size: 18px;
        }

        .fa-times-circle {
            color: #f23b3b;
            font-size: 18px;
        }

        body {
            font-family: 'Open Sans', sans-serif;
            background-color: #fff !important;
        }

        .justify-content-between {
            text-align: right;
        }

        .justify-content-between a {
            text-align: right;
        }

        .content-header h1 {
            font-size: 25px;
            margin: 0;
        }

        .card-primary.card-outline {
            border-top: 3px solid #333;
        }
    </style>
@endsection
@section('content')

    <div class="content-wrapper">
        @include('admin.partials.content-header', [
            'name' => 'Quản lý danh mục tin tức',
            'key' => 'Danh mục tin tức',
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

                        <div class="d-flex justify-content-between ">
                            <div class="text-right w-100">
                                <a href="{{ route('admin.categorypost.create', ['parent_id' => request()->parent_id ?? 0]) }}"
                                    class="btn btn-info btn-md mb-2 ">+ Thêm mới</a>
                            </div>

                            {{-- <div class="group-button-right d-flex">
                        <form action="{{route('admin.categorypost.import.excel.database')}}" class="form-inline" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group" style="max-width: 250px">
                            <input type="file" class="form-control-file" name="fileExcel" accept=".xlsx" required>
                        </div>
                        <input type="submit" value="Import Execel" class=" btn btn-info ml-1">
                        </form>
                        <form class="form-inline ml-3" action="{{route('admin.categorypost.export.excel.database')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="submit" value="Export Execel" class=" btn btn-danger">
                        </form>
                    </div> --}}
                        </div>

                        <div class="card card-outline card-info">
                            <div class="card-header pt-2 pb-2">
                                <div class="card-tools w-100 mb-3">
                                    <form action="{{ route('admin.categorypost.index') }}" method="GET">
                                        <div class="row">
                                            <div class="col-md-10">
                                                <div class="row">
                                                    <div class="form-group col-md-6 mb-0">
                                                        <input id="keyword" value="" name="keyword" type="text"
                                                            class="form-control"
                                                            placeholder="Nhập từ khóa tìm kiếm danh mục">
                                                        <div id="keyword_feedback" class="invalid-feedback">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-1 mb-0">
                                                <button type="submit" class="btn btn-success w-100">Tìm kiếm</button>
                                            </div>
                                            <div class="col-md-1 mb-0">
                                                <a class="btn btn-danger w-100"
                                                    href="{{ route('admin.categorypost.index') }}">Làm
                                                    lại</a>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        @if (isset($parentBr) && $parentBr)
                            <ol class="breadcrumb">
                                <li><a href="{{ route('admin.categorypost.index', ['parent_id' => 0]) }}">Root</a></li>

                                @php
                                    $breadcrumbs = [];
                                    $currentItem = $parentBr;
                                    $parentItem = null;
                                    while ($currentItem) {
                                        if ($parentItem && $currentItem->id !== $parentItem->id) {
                                            array_unshift($breadcrumbs, $currentItem);
                                        }
                                        $parentItem = $currentItem;
                                        $currentItem = $currentItem->parent; // Giả sử có một thuộc tính "parent" trỏ đến cấp cha trong mô hình
                                    }
                                @endphp

                                @foreach ($breadcrumbs as $item)
                                    <li><a
                                            href="{{ route('admin.categorypost.index', ['parent_id' => $item['id']]) }}">{{ $item['name'] }}</a>
                                    </li>
                                @endforeach
                                <li><a
                                        href="{{ route('admin.categorypost.index', ['parent_id' => $parentBr->id]) }}">{{ $parentBr->name }}</a>
                                </li>
                            </ol>
                        @endif
                        <div class="card card-outline card-primary">
                            <div class="card-body table-responsive lb-list-category">
                                @include('admin.components.category', [
                                    'data' => $data,
                                    'routeNameEdit' => 'admin.categorypost.edit',
                                    'routeNameAdd' => 'admin.categorypost.create',
                                    'routeNameDelete' => 'admin.categorypost.destroy',
                                    'routeNameOrder' => 'admin.loadOrderVeryModel',
                                    'routeLoadActive' => 'admin.categorypost.load.active',
                                    'routeLoadHot' => 'admin.categorypost.load.hot',
                                    'table' => 'category_posts',
                                ])
                            </div>
                        </div>
                        <div class="card-header pt-2 pb-2">
                            <div class="cart-title">
                                <i class="fas fa-list"></i> Danh Sách tin tức theo danh mục
                            </div>
                        </div>
                        <div class="card-body table-responsive p-0 lb-list-category">
                            <table class="table table-head-fixed" style="font-size:13px;">
                                <thead>
                                    <tr>
                                    <tr>
                                        <th>STT</th>
                                        <th>Tên bài viết</th>
                                        <th class="white-space-nowrap">Giới thiệu</th>
                                        <th class="white-space-nowrap">Số lượt xem</th>
                                        <th class="white-space-nowrap">Ảnh</th>
                                        <th class="white-space-nowrap">Trạng thái</th>
                                        <th class="white-space-nowrap">Nổi bật</th>
                                        <th class="white-space-nowrap">Thứ tự</th>
                                        <th class="white-space-nowrap">Danh mục</th>
                                        <th class="white-space-nowrap">Hành động</th>
                                    </tr>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($post_all as $postItem)
                                        <tr>
                                            <td>{{ $loop->index + 1 }}</td>
                                            <td>{{ $postItem->name }}</td>
                                            <td>{!! $postItem->description !!}</td>
                                            <td>{{ $postItem->view }}</td>
                                            <td><img src="{{ asset($postItem->avatar_path) }}" alt="{{ $postItem->name }}"
                                                    style="width:80px;"></td>
                                            <td class="wrap-load-active"
                                                data-url="{{ route('admin.post.load.active', ['id' => $postItem->id]) }}">
                                                @include('admin.components.load-change-active', [
                                                    'data' => $postItem,
                                                    'type' => 'bài viết',
                                                ])
                                            </td>
                                            <td class="wrap-load-hot"
                                                data-url="{{ route('admin.post.load.hot', ['id' => $postItem->id]) }}">
                                                @include('admin.components.load-change-hot', [
                                                    'data' => $postItem,
                                                    'type' => 'bài viết',
                                                ])
                                            </td>
                                            <td><input
                                                    data-url="{{ route('admin.loadOrderVeryModel', ['table' => 'posts', 'id' => $postItem->id]) }}"
                                                    class="lb-order text-center" type="number" min="0"
                                                    value="{{ $postItem->order ? $postItem->order : 0 }}"
                                                    style="width:50px" />
                                            </td>
                                            <td>{{ optional($postItem->category)->name }}</td>
                                            <td class="white-space-nowrap">
                                                <a href="{{ route('admin.post.edit', ['id' => $postItem->id]) }}"
                                                    class="btn btn-sm btn-info tooltip11"><i class="fas fa-edit"></i><span
                                                        class="tooltiptext">Sửa</span></a>
                                                <a data-url="{{ route('admin.post.destroy', ['id' => $postItem->id]) }}"
                                                    class="btn btn-sm btn-danger lb_delete tooltip11"><i
                                                        class="far fa-trash-alt"></i><span
                                                        class="tooltiptext">Xóa</span></a>
                                                {{-- <a href="{{ route('admin.post.coppy', ['id' => $postItem->id]) }}"
                                                    class="btn btn-sm btn-info tooltip11" title="Coppy"><i
                                                        class="far fa-copy"></i><span class="tooltiptext">coppy</span></a> --}}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="col-md-12">
                                {{ $post_all->appends(request()->all())->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('js')

@endsection
