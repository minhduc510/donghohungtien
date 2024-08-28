@extends('admin.layouts.main')
@section('title', 'Danh sách sản phẩm')
@section('css')

@endsection
@section('control')
    <a href="{{ route('admin.product.create') }}" class="btn  btn-info btn-md mb-2">+ Thêm mới</a>
@endsection
@php
    session()->put('page', request()->input('page') ?? 1);
@endphp
@section('content')
    <div class="content-wrapper lb_template_list_product">

        @include('admin.partials.content-header', ['name' => 'Sản phẩm', 'key' => 'Danh sách sản phẩm'])
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
                            <a href="{{ route('admin.product.create') }}" class="btn  btn-info btn-md mb-2">+ Thêm mới</a>
                            {{-- <div class="group-button-right d-flex">
                        <form action="{{route('admin.product.import.excel.database')}}" class="form-inline" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group" style="max-width: 250px">
                                <input type="file" class="form-control-file" name="fileExcel" accept=".xlsx" required>
                              </div>
                            <input type="submit" value="Import Execel" class=" btn btn-info ml-1">
                        </form>
                        <form class="form-inline ml-3" action="{{route('admin.product.export.excel.database')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="submit" value="Export Execel" class=" btn btn-danger">
                        </form>
                    </div> --}}
                        </div>

                        <div class="card card-outline card-primary">
                            <div class="card-header">
                                <div class="card-tools w-100 mb-3">
                                    <form action="{{ route('admin.product.index') }}" method="GET">
                                        <div class="row">
                                            <div class="col-md-10">
                                                <div class="row">
                                                    <div class="form-group col-md-3 mb-0">
                                                        <input id="keyword" value="{{ $keyword }}" name="keyword"
                                                            type="text" class="form-control" placeholder="Từ khóa">
                                                        <div id="keyword_feedback" class="invalid-feedback">

                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-3 mb-0" style="min-width:100px;">
                                                        <select id="order" name="order_with" class="form-control">
                                                            <option value="">-- Sắp xếp theo --</option>
                                                            <option value="dateASC"
                                                                {{ $order_with == 'dateASC' ? 'selected' : '' }}>Ngày tạo
                                                                tăng
                                                                dần</option>
                                                            <option value="dateDESC"
                                                                {{ $order_with == 'dateDESC' ? 'selected' : '' }}>Ngày tạo
                                                                giảm
                                                                dần</option>
                                                            <option value="viewASC"
                                                                {{ $order_with == 'viewASC' ? 'selected' : '' }}>Lượt xem
                                                                tăng
                                                                dần</option>
                                                            <option value="viewDESC"
                                                                {{ $order_with == 'viewDESC' ? 'selected' : '' }}>Lượt xem
                                                                giảm
                                                                dần</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-3 mb-0" style="min-width:100px;">
                                                        <select id="" name="fill_action" class="form-control">
                                                            <option value="">-- Lọc --</option>
                                                            <option value="hot"
                                                                {{ $fill_action == 'hot' ? 'selected' : '' }}>Sản phẩm hot
                                                            </option>
                                                            <option value="no_hot"
                                                                {{ $fill_action == 'no_hot' ? 'selected' : '' }}>Sản phẩm
                                                                không
                                                                hot</option>
                                                            <option value="active"
                                                                {{ $fill_action == 'active' ? 'selected' : '' }}>Sản phẩm
                                                                hiển
                                                                thị</option>
                                                            <option value="no_active"
                                                                {{ $fill_action == 'no_active' ? 'selected' : '' }}>Sản
                                                                phẩm
                                                                bị
                                                                ẩn</option>
                                                            <option value="no_active"
                                                                {{ $fill_action == 'sell' ? 'selected' : '' }}>Sản
                                                                phẩm
                                                                khuyến mãi</option>
                                                            <option value="no_active"
                                                                {{ $fill_action == 'no_sell' ? 'selected' : '' }}>Sản
                                                                phẩm không
                                                                khuyến mãi</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-3 mb-0" style="min-width:100px;">
                                                        <select id="categoryProduct" name="category" class="form-control">
                                                            <option value="">-- Tất cả danh mục --</option>
                                                            {{-- <option value="-1" {{ $status==0? 'selected':'' }}>Đơn hàng đã hủy</option> --}}
                                                            {!! $option !!}
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-1 mb-0">
                                                <button type="submit" class="btn btn-success w-100">Tìm</button>
                                            </div>
                                            <div class="col-md-1 mb-0">
                                                <a class="btn btn-danger w-100"
                                                    href="{{ route('admin.product.index') }}">Làm mới</a>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="card-tools text-right pl-3 pr-3 pt-2 pb-2">
                                <div class="count">
                                    Tổng số bản ghi <strong>{{ $data->count() }}</strong> / {{ $totalProduct }}
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
                                            <th class="white-space-nowrap">Sản phẩm hiển thị ngoài trang chủ
                                            </th>
                                            <th class="white-space-nowrap">Sản phẩm khuyến mại</th>
                                            {{-- <th class="white-space-nowrap">Thứ tự</th> --}}
                                            <th class="white-space-nowrap">Danh mục</th>
                                            <th>Hành động</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $productItem)
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
                                                <td class="wrap-load-hot"
                                                    data-url="{{ route('admin.product.load.promotional', ['id' => $productItem->id]) }}">
                                                    @include('admin.components.load-change-promotional', [
                                                        'data' => $productItem,
                                                        'type' => 'sản phẩm khuyến mãi',
                                                    ])
                                                </td>
                                                {{-- <td><input
                                                        data-url="{{ route('admin.loadOrderVeryModel', ['table' => 'products', 'id' => $productItem->id]) }}"
                                                        class="lb-order text-center" type="number" min="0"
                                                        value="{{ $productItem->order ? $productItem->order : 0 }}"
                                                        style="width:50px" /></td> --}}
                                                <td>{{ optional($productItem->category)->name }}</td>
                                                <td>
                                                    <a href="{{ route('admin.product.edit', ['id' => $productItem->id]) }}"
                                                        class="btn btn-sm btn-info tooltip11 "><i class="fas fa-edit"></i>
                                                        <span class="tooltiptext">Sửa</span></a>
                                                    <a data-url="{{ route('admin.product.destroy', ['id' => $productItem->id]) }}"
                                                        class="btn btn-sm btn-danger lb_delete tooltip11"><i
                                                            class="far fa-trash-alt"></i><span
                                                            class="tooltiptext">xóa</span></a>
                                                    {{-- <a href="{{ route('admin.product.coppy', ['id' => $productItem->id]) }}"
                                                        class="btn btn-sm btn-info tooltip11" title="Coppy"><i
                                                            class="far fa-copy"></i><span
                                                            class="tooltiptext">Coppy</span></a> --}}
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        {{ $data->appends(request()->input())->links() }}
                    </div>
                </div>
            </div>
        </div>
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
