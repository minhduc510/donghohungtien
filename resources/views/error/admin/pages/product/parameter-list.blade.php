@extends('admin.layouts.main')
@section('title',"Danh sách Thông số")
@section('css')

@endsection
@section('control')
<a href="{{route('admin.product.create')}}" class="btn  btn-info btn-md mb-2">+ Thêm mới</a>
@endsection
@section('content')
<div class="content-wrapper lb_template_list_product">

    @include('admin.partials.content-header',['name'=>"tab","key"=>"Danh sách Thông số"])
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
                    <a href="{{route('admin.product.parameter.create',['product_id' => $product_id, 'parent_id' => $parentId])}}" class="btn btn-info btn-md mb-2">+ Thêm mới</a>
             
                    
                    <a href="{{route('admin.product.edit',['id'=>$product_id])}}" class="btn ml-2 btn-info btn-md mb-2">Sửa thông tin sản phẩm</a>
                </div>

                @if (isset($parentBr)&&$parentBr)
                <ol class="breadcrumb">
                  <li><a href="{{ route('admin.product.parameter',['product_id'=>$product_id ,'parent_id'=>0]) }}">Root</a></li>
               
                  @foreach ($parentBr->breadcrumb as $item)
                   <li><a href="{{ route('admin.product.parameter',['product_id'=>$product_id ,'parent_id'=>$item['id']]) }}">{{ $item['name'] }}</a></li>
                  @endforeach
                  <li><a href="{{ route('admin.product.parameter',['product_id'=>$product_id ,'parent_id'=>$parentBr->id]) }}">{{ $parentBr->name }}</a></li>
                </ol>
                @endif
                <div class="card card-outline card-primary">
                    <div class="card-body table-responsive lb-list-category">
                        <ul class="lb_list_category">
                            <li class="border-bottom font-weight-bold  title-card-recusive">
                                <div class="d-flex">
                                    <div class="box-left lb_list_content_recusive">
                                        <div class="d-flex">
                                            <div class="col-sm-1 pt-2 pb-2 white-space-nowrap folder">
                                                Folder
                                            </div>
                                            <div class="col-sm-4 pt-2 pb-2 name">
                                                Tên nội dung
                                            </div>
                                            <div class="col-sm-3 pt-2 pb-2 slug">
                                                Giá trị
                                            </div>
                                            <div class="col-sm-1 pt-2 pb-2 white-space-nowrap stt">
                                                STT
                                            </div>
                                            <div class="col-sm-3 pt-2 pb-2 parent">
                                                Danh mục cha
                                            </div>
                                        </div>
                                    </div>
                                    <div class="pt-2 pb-2 lb_list_action_recusive">
                                        Action
                                    </div>
                                </div>
                            </li>

                            @foreach($data as $tabItem)
                            <li class="lb_item_recusive font-weight-bold  lb_item_delete  border-bottom">
                                <div class="d-flex">
                                    <div class="box-left lb_list_content_recusive ">
                                        <div class="d-flex">
                                            <div class="col-sm-1 pt-2 pb-2 white-space-nowrap folder">
                                                @if ($tabItem->childs->count())
                                                    <i class="fas fa-folder"></i>
                                                @else
                                                    <i class="fas fa-file-alt"></i>
                                                @endif
                                            </div>
                                            <div class="col-sm-4 pt-2 pb-2 name">
                                                <a href="{{ route('admin.product.parameter',['product_id'=>$product_id, 'parent_id'=>$tabItem->id]) }}">
                                                    {{ $tabItem->name }}
                                                </a>
                                                
                                            </div>
                                            <div class="col-sm-3 pt-2 pb-2 slug">
                                                {!! $tabItem->description !!}
                                            </div>
                                            <div class="col-sm-1 pt-2 pb-2 stt">
                                                <input data-url="{{ route('admin.loadOrderVeryModel',['table'=>'product_parameters','id'=>$tabItem->id]) }}" class="lb-order text-center"  type="number" min="0" value="{{ $tabItem->order?$tabItem->order:0 }}" style="width:50px" />
                                            </div>
                                            <div class="col-sm-3 pt-2 pb-2 parent">
                                                {{ $tabItem->parent_id? $tabItem->parent->name:"Root" }}
                                            </div>
                                        </div>
                                    </div>

                                    <div class="pt-2 pb-2 lb_list_action_recusive">
                                        <a href="{{route('admin.product.parameter.edit',['id'=>$tabItem->id])}}" class="btn btn-sm btn-info"><i class="fas fa-edit"></i></a>
                                        <a href="{{route('admin.product.parameter.create',['product_id' => $product_id,'parent_id'=>$tabItem->id])}}" class="btn btn-sm btn-info">+ Thêm</a>
                                        <a data-url="{{route('admin.product.destroyParameter',['id'=>$tabItem->id])}}" class="btn btn-sm btn-danger lb_delete"><i class="far fa-trash-alt"></i></a>
                                        @if ($tabItem->childs->count())
                                        <button type="button" class="btn btn-sm btn-primary lb-toggle">
                                            <i class="fas fa-plus"></i>
                                        </button>
                                        @endif
                                    </div>
                                </div>
                                @if ($tabItem->childs->count())
                                    <ul class="font-weight-normal" style="display: none;">
                                        @foreach($tabItem->childs as $childValue)
                                        <li class=" lb_item_delete  border-bottom">
                                            <div class="d-flex flex-wrap ">
                                                <div class="box-left lb_list_content_recusive">

                                                    <div class="d-flex">
                                                        <div class="col-sm-1 pt-2 pb-2 white-space-nowrap folder">
                                                              <i class='fas fa-long-arrow-alt-right'></i>
                                                              @if ($childValue->childs->count())
                                                                     <i class="fas fa-folder"></i>
                                                              @else
                                                                    <i class="fas fa-file-alt"></i>
                                                              @endif
                                                        </div>
                                                        <div class="col-sm-4 pt-2 pb-2 name">
                                                            {{ $childValue->name }}
                                                        </div>
                                                        <div class="col-sm-3 pt-2 pb-2 slug">
                                                            {!!  $childValue->description  !!}
                                                        </div>
                                                        <div class="col-sm-1 pt-2 pb-2 stt">
                                                            <input data-url="{{ route('admin.loadOrderVeryModel',['table'=>'product_parameters','id'=>$childValue->id]) }}" class="lb-order text-center"  type="number" min="0" value="{{ $childValue->order?$childValue->order:0 }}" style="width:50px" />
                                                        </div>

                                                        <div class="col-sm-3 pt-2 pb-2 parent">
                                                            {{ $childValue->parent->name }}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="pt-2 pb-2 lb_list_action_recusive" >
                                                    <a href="{{route('admin.product.parameter.edit',['id'=>$childValue->id])}}" class="btn btn-sm btn-info"><i class="fas fa-edit"></i></a>
                                                    <a href="{{route('admin.product.parameter.create',['product_id' => $product_id,'parent_id'=>$childValue->id])}}" class="btn btn-sm btn-info">+ Thêm</a>
                                                    <a data-url="{{route('admin.product.destroyParameter',['id'=>$childValue->id])}}" class="btn btn-sm btn-danger lb_delete"><i class="far fa-trash-alt"></i></a>
                                                    @if ($childValue->childs->count())
                                                    <button type="button" class="btn btn-sm btn-primary lb-toggle">
                                                        <i class="fas fa-plus"></i>
                                                    </button>
                                                    @endif
                                                </div>
                                            </div>
                                        </li>
                                        @endforeach
                                    </ul>
                                @endif
                            </li>
                            @endforeach


                        </ul>
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
