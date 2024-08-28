@extends('admin.layouts.main')
@section('title',"Danh sách đánh giá sản phẩm")
@section('css')

@endsection

@section('content')
<div class="content-wrapper lb_template_list_product">

    @include('admin.partials.content-header',['name'=>'Sản phẩm',"key"=>"Danh sách đánh giá"])
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

                 <div class="card card-outline card-primary">

                    <div class="card-body table-responsive p-0 lb-list-category">
                        <table class="table table-head-fixed" style="font-size: 13px;">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Tên</th>
                                    <th class="white-space-nowrap">Số sao</th>
                                    <th class="white-space-nowrap">Người đánh giá</th>
{{--                                    <th class="white-space-nowrap">Ảnh thực tế</th>--}}
                                    <th>Duyệt</th>
                                    <th>Tác vụ</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $modelProduct = new App\Models\Product;
                                @endphp
                                @foreach($data as $item)
                                    @php
                                        $product = $modelProduct->find($item->product_id);
                                        $image = $item->images()->first();
                                    @endphp
                                <tr>
                                    <td>{{$loop->index+1}}</td>
                                    <td>
                                        <strong>Tên:</strong> {{$item->name}} <br>
                                        @if($item->phone)
                                        <strong>Số điện thoại:</strong> {{$item->phone}} <br>
                                        @endif
                                        @if($item->email)
                                        <strong>Email:</strong> {{$item->email}} <br>
                                        @endif
                                        <strong>Nội dung:</strong>  {!! $item->content !!} <br>
                                        <strong>Tên sản phẩm</strong> <a target="blank" href="{{ $product->slug_full }}">{{ $product->name }}</a>
                                    </td>
                                    <td>{{ $item->star }}</td>
                                    <td>
                                        {{ $item->name }}
                                    </td>
                                    {{--<td>
                                        @if(isset($image->image_path))
                                          <img src="{{ asset($image->image_path) }}" alt="{{$item->name}}" style="width:80px;">
                                        @else
                                          <img src="{{ asset($shareFrontend['noImage']) }}" alt="No Image" style="width:80px;">
                                        @endif
                                    </td>--}}
                                    <td>
                                    
                                        @include('admin.pages.star.load-change-active-star',['data'=>$item,'routeActive'=>'admin.product.activeStar'])
                                    </td>
                                    <td>
                                        {{--
                                        <a href="{{route('admin.product.editStar',['id'=>$item->id])}}" class="btn btn-sm btn-info"><i class="fas fa-edit"></i></a>
                                        --}}
                                        <a data-url="{{route('admin.product.destroyStar',['id'=>$item->id])}}" class="btn btn-sm btn-danger lb_delete"><i class="far fa-trash-alt"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                {{$data->appends(request()->input())->links()}}
            </div>
        </div>
      </div>
    </div>
</div>

@endsection

@section('js')

@endsection
