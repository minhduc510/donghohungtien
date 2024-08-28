@extends('admin.layouts.main')
@section('title',"Danh sách tab")
@section('css')

@endsection
@section('control')
<a href="{{route('admin.product.create')}}" class="btn  btn-info btn-md mb-2">+ Thêm mới</a>
@endsection
@section('content')
<div class="content-wrapper lb_template_list_product">

    @include('admin.partials.content-header',['name'=>"tab","key"=>"Danh sách tab"])
    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                @if(session("alert"))
                <div class="alert alert-success">
                    {{session("alert")}}
                </div>
                @elseif(session('error'))
                <div class="alert alert-warning">
                    {{session("error")}}
                </div>
                @endif
                <div class="d-flex justify-content-between ">
                    <a href="{{route('admin.product.tab.create',['product_id' => $product_id])}}" class="btn btn-info btn-md mb-2">+ Thêm mới</a>

                    <a href="{{route('admin.product.edit',['id'=>$product_id])}}" class="btn ml-2 btn-info btn-md mb-2">Sửa thông tin sản phẩm</a>
                </div>



                <div class="card card-outline card-primary">
                    <div class="card-body table-responsive p-0 lb-list-category">
                        <table class="table table-head-fixed" style="font-size: 13px;">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Tên</th>
                                    <th class="white-space-nowrap">Hình ảnh</th>
                         
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data as $tabItem)
           
                                <tr>
                                    <td>{{$loop->index}}</td>
                                    <td>{{$tabItem->name}}</td>
                                    <td>
                                        <img src="{{$tabItem->avatar_path?asset($tabItem->avatar_path): $shareFrontend['noImage']}}"
                                        alt="{{$tabItem->name}}" style="width:80px;"></td>
                            
                 
                                    <td>
                                        <a href="{{route('admin.product.tab.edit',['id'=>$tabItem->id])}}" class="btn btn-sm btn-info"><i class="fas fa-edit"></i></a>
                                        <a data-url="{{route('admin.product.destroyTab',['id'=>$tabItem->id])}}" class="btn btn-sm btn-danger lb_delete"><i class="far fa-trash-alt"></i></a>
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

@endsection
