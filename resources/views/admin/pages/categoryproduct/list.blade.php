@extends('admin.layouts.main')
@section('title', 'danh sach danh mục sản phẩm')
@section('css')
    <style>
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
    </style>
@endsection
@section('content')
    <div class="content-wrapper">

        @include('admin.partials.content-header', [
            'name' => 'Danh mục sản phẩm',
            'key' => 'Danh sách danh mục sản phẩm',
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
                        <div class="d-flex justify-content-end">
                            <div class="text-right w-100">
                                <a href="{{ route('admin.categoryproduct.create', ['parent_id' => request()->parent_id ?? 0]) }}"
                                    class="btn  btn-info btn-md mb-2">+ Thêm mới</a>
                            </div>
                            {{-- <!--<div class="group-button-right d-flex">
                        <form action="{{route('admin.categoryproduct.import.excel.database')}}" class="form-inline" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group" style="max-width: 250px">
                            <input type="file" class="form-control-file" name="fileExcel" accept=".xlsx" required>
                        </div>
                        <input type="submit" value="Import Execel" class=" btn btn-info ml-1">
                        </form>
                        <form class="form-inline ml-3" action="{{route('admin.categoryproduct.export.excel.database')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="submit" value="Export Execel" class=" btn btn-danger">
                        </form>
                    </div>--> --}}
                        </div>

                        <div class="card card-outline card-info">
                            <div class="card-header pt-2 pb-2">
                                <div class="card-tools w-100 mb-3">
                                    <form action="{{ route('admin.categoryproduct.index') }}" method="GET">
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
                                                    href="{{ route('admin.categoryproduct.index') }}">Làm
                                                    lại</a>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        @if (isset($parentBr) && $parentBr)
                            <ol class="breadcrumb">
                                <li><a href="{{ route('admin.categoryproduct.index', ['parent_id' => 0]) }}">Root</a></li>

                                @foreach ($parentBr->breadcrumb as $item)
                                    <li><a
                                            href="{{ route('admin.categoryproduct.index', ['parent_id' => $item['id']]) }}">{{ $item['name'] }}</a>
                                    </li>
                                @endforeach
                                <li><a
                                        href="{{ route('admin.categoryproduct.index', ['parent_id' => $parentBr->id]) }}">{{ $parentBr->name }}</a>
                                </li>
                            </ol>
                        @endif

                        <div class="card card-outline card-primary">
                            <div class="card-body table-responsive lb-list-category" style="padding: 0; font-size:13px;">
                                @include('admin.components.category', [
                                    'data' => $data,
                                    'routeNameEdit' => 'admin.categoryproduct.edit',
                                    'routeNameAdd' => 'admin.categoryproduct.create',
                                    'routeNameDelete' => 'admin.categoryproduct.destroy',
                                    'routeNameOrder' => 'admin.loadOrderVeryModel',
                                    'routeLoadActive' => 'admin.categoryproduct.load.active',
                                    'routeLoadHot' => 'admin.categoryproduct.load.hot',
                                    'table' => 'category_products',
                                ])
                            </div>
                        </div>
                        <div class="card card-outline card-info">
                            <div class="card-header pt-2 pb-2">
                                <div class="cart-title">
                                    <i class="fas fa-list"></i> Danh Sách sản phẩm theo danh mục
                                </div>
                            </div>
                            <div class="card-body table-responsive p-0 lb-list-category">
                                <table class="table table-head-fixed" style="font-size: 13px;">
                                    <thead>
                                        <tr>
                                            <th style="display: flex;align-items: center;justify-content: space-between;">
                                                <input type="checkbox" id="check_all">
                                                <div style="margin-left: 10px">
                                                    <a class="btn btn-sm btn-danger lb_delete_checkbox tooltip11"><i
                                                            class="far fa-trash-alt"></i></a>
                                                </div>
                                            </th>
                                            <th>STT</th>
                                            <th>Tên</th>
                                            {{-- <th class="white-space-nowrap">Số lượt xem</th> --}}
                                            <th class="white-space-nowrap">Hình ảnh</th>
                                            <th class="white-space-nowrap">Trạng thái</th>
                                            <th class="white-space-nowrap">Nổi bật</th>
                                           <th class="white-space-nowrap">Thứ tự</th> 
                                            <th class="white-space-nowrap">Danh mục</th>
                                            <th>Hành động</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($product_all as $productItem)
                                            {{-- {{dd($productItem->category)}} --}}
                                            <tr>
                                                <td>
                                                    <input class="delete_checkbox" type="checkbox" name="deleteCheckbox"
                                                        value="{{ $productItem->id }}">
                                                </td>
                                                <td>{{ $loop->index + 1 }}</td>
                                                <td>{{ $productItem->name }}</td>
                                                {{-- <td class="text-nowrap">{{$productItem->view}}</td> --}}

                                                <td>
                                                    <img src="{{ $productItem->avatar_path ? asset($productItem->avatar_path) : $shareFrontend['noImage'] }}"
                                                        alt="{{ $productItem->name }}" style="width:80px;">
                                                </td>
                                                <td class="wrap-load-active"
                                                    data-url="{{ route('admin.product.load.active', ['id' => $productItem->id]) }}">
                                                    @include('admin.components.load-change-active', [
                                                        'data' => $productItem,
                                                        'type' => 'sản phẩm',
                                                    ])
                                                </td>
                                                <td class="wrap-load-hot"
                                                    data-url="{{ route('admin.product.load.hot', ['id' => $productItem->id]) }}">
                                                    @include('admin.components.load-change-hot', [
                                                        'data' => $productItem,
                                                        'type' => 'sản phẩm',
                                                    ])
                                                </td>
                                                <td><input
                                                        data-url="{{ route('admin.loadOrderVeryModel', ['table' => 'products', 'id' => $productItem->id]) }}"
                                                        class="lb-order text-center" type="number" min="0"
                                                        value="{{ $productItem->order ? $productItem->order : 0 }}"
                                                        style="width:50px" /></td>
                                                <td>{{ optional($productItem->category)->name }}</td>
                                                <td>
                                                    <a href="{{ route('admin.product.edit', ['id' => $productItem->id]) }}"
                                                        class="btn btn-sm btn-info tooltip11"><i
                                                            class="fas fa-edit"></i><span class="tooltiptext">Sửa</span></a>
                                                    <a data-url="{{ route('admin.product.destroy', ['id' => $productItem->id]) }}"
                                                        class="btn btn-sm btn-danger lb_delete tooltip11"><i
                                                            class="far fa-trash-alt"></i><span
                                                            class="tooltiptext">Xóa</span></a>
                                                    {{-- <a href="{{ route('admin.product.coppy', ['id' => $productItem->id]) }}"
                                                        class="btn btn-sm btn-info tooltip11" title="Coppy"><i
                                                            class="far fa-copy"></i><span
                                                            class="tooltiptext">coppy</span></a> --}}
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="col-md-12">
                                    {{ $product_all->appends(request()->all())->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                    {{--            <div class="col-md-12"> --}}
                    {{--                {{$data->appends(request()->all())->links()}} --}}
                    {{--            </div> --}}
                </div>

                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>


@endsection

@section('js')
    <script>
        $(document).ready(function() {
            var checkedValues = []; // Mảng lưu trữ các giá trị đã chọn

            $('#check_all').click(function() {
                $('.delete_checkbox').prop('checked', $(this).prop('checked'))
                    .change(); // Gọi sự kiện "change" sau khi thiết lập thuộc tính
            });

            $('.delete_checkbox').change(function() {
                var value = $(this).val(); // Lấy giá trị của checkbox đã thay đổi

                // Kiểm tra xem checkbox đã được chọn hay không
                if ($(this).is(":checked")) {
                    // Nếu đã chọn, thêm giá trị vào mảng
                    checkedValues.push(value);
                } else {
                    // Nếu bỏ chọn, loại bỏ giá trị khỏi mảng
                    var index = checkedValues.indexOf(value);
                    if (index !== -1) {
                        checkedValues.splice(index, 1);
                    }
                }

            });

            $(document).on('click', '.lb_delete_checkbox', function() {
                event.preventDefault();
                let title = 'Bạn có chắc chắn muốn xóa những sản phẩm mà bạn đã tích chọn';
                Swal.fire({
                    title: title,
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, next step!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            type: "GET",
                            url: "{{ route('admin.product.delete.all') }}",
                            data: {
                                checkedValues: checkedValues
                            },
                            success: function(data) {
                                if (data.code == 200) {
                                    location.reload();
                                }
                            }
                        });
                    }
                })
            });
        });
    </script>
@endsection
