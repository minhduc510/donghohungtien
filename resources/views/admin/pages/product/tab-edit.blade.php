@extends('admin.layouts.main')
@section('title',"Sửa Tab")

@section('css')
@endsection
@section('content')
<div class="content-wrapper lb_template_product_edit">
    @include('admin.partials.content-header',['name'=>"Tab","key"=>"Sửa Tab"])

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

                    <div class="box-link">
                
                        <a href="{{ route('admin.product.tab',['product_id'=>$data->product_id]) }}" class="btn btn-sm btn-success">Danh sách tab</a>
         
                    </div>

                    <form class="form-horizontal" action="{{route('admin.product.tab.update',['id'=>$data->id])}}" method="POST" enctype="multipart/form-data">
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

                            <div class="col-md-12">
                                <div class="card card-outline card-primary">
                                    <div class="card-header">
                                       <h3 class="card-title">Thông tin Tab</h3>
                                    </div>
                                    <div class="card-body table-responsive p-3">
										<ul class="nav nav-tabs">
                                            <li class="nav-item">
                                              <a class="nav-link active" data-toggle="tab" href="#tong_quan">Tổng quan</a>
                                            </li>
                                            <!-- <li class="nav-item">
                                              <a class="nav-link" data-toggle="tab" href="#du_lieu">Dữ liệu</a>
                                            </li> -->
                                            <li class="nav-item">
                                              <a class="nav-link" data-toggle="tab" href="#hinh_anh">Hình ảnh</a>
                                            </li>
                                        </ul>

                                        <div class="tab-content">
                                            <!-- START Tổng Quan -->
                                            <div id="tong_quan" class="container tab-pane active"><br>

                                                <ul class="nav nav-tabs">
                                                    @foreach ($langConfig as $langItem)
                                                    <li class="nav-item">
                                                        <a class="nav-link {{$langItem['value']==$langDefault?'active':''}}" data-toggle="tab" href="#tong_quan_{{$langItem['value']}}">{{ $langItem['name'] }}</a>
                                                    </li>
                                                    @endforeach

                                                </ul>
                                                <div class="tab-content">
                                                    @foreach ($langConfig as $langItem)
                                                    <div id="tong_quan_{{$langItem['value']}}" class="container wrapChangeSlug tab-pane {{$langItem['value']==$langDefault?'active show':''}} fade">
                                                        <div class="form-group">
                                                            <div class="row">
                                                                <label class="col-sm-2 control-label" for="">Tên</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" class="form-control 
                                                                    @error('name') is-invalid @enderror" id="name" value="{{ old('name')??$data->name }}" name="name" placeholder="Nhập tên">
                                                                    @error('name')
                                                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                                                    @enderror

                                                                    <input type="hidden" class="form-control"
                                                                    value="{{ $data->product_id }}" name="product_id">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        {{--<div class="form-group">
                                                            <div class="row">
                                                                <label class="col-sm-2 control-label" for="">Icon</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" class="form-control 
                                                                    @error('icon') is-invalid  @enderror" value="{{ old('icon')??$data->icon }}" name="icon" placeholder="Nhập icon">
                                                                    @error('icon')
                                                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>


                                                        <div class="form-group">
                                                            <div class="row">
                                                                <label class="col-sm-2 control-label" for="">Giới thiệu</label>
                                                                <div class="col-sm-10">
                                                                    <textarea class="form-control @error('description') is-invalid @enderror" name="description" rows="3"  placeholder="Nhập giới thiệu">{{ old('description')??$data->description  }}</textarea>
                                                                    @error('description')
                                                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>--}}

                                                        <div class="form-group">
                                                            <div class="row">
                                                                <label class="col-sm-2 control-label" for="">Thông tin chi tiết</label>
                                                                <div class="col-sm-10">
                                                                    <textarea class="form-control tinymce_editor_init @error('content') is-invalid  @enderror" name="content" id="ckeditor" rows="20" value="" placeholder="Nhập mô tả">
                                                                    {{ old('content')??$data->content }}
                                                                    </textarea>
                                                                    @error('content')
                                                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @endforeach

                                                </div>
                                            </div>
                                            <!-- END Tổng Quan -->

                                            <!-- START Dữ Liệu -->
                                            <!-- <div id="du_lieu" class="container tab-pane fade"><br>

                                            </div> -->
                                            <!-- END Dữ Liệu -->

                                            <!-- START Hình Ảnh -->
                                            <div id="hinh_anh" class="container tab-pane fade"><br>

                                                <div class="wrap-load-image mb-3">
                                                    <div class="form-group">
                                                        <label for="">Ảnh đại diện</label>
                                                        <input type="file" class="form-control-file img-load-input border" id="" name="avatar_path">
                                                    </div>
                                                    @error('avatar_path')
                                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                                    @enderror
                                                    @if ($data->avatar_path)
                                                    <img class="img-load border p-1 w-100" src="{{$data->avatar_path}}" alt="{{$data->name}}" style="height: 200px;object-fit:cover; max-width: 260px;">
                                                    @endif
                                                </div>


                                            </div>
                                            <!-- END Hình Ảnh -->

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
