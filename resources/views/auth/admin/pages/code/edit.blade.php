@extends('admin.layouts.main')
@section('title',"Sửa code")

@section('css')
@endsection
@section('content')
<div class="content-wrapper lb_template_code_edit">
   @include('admin.partials.content-header',['name'=>"code","key"=>"Edit code"])
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
               <form action="{{route('admin.code.update',['id'=>$data->id])}}" method="POST" enctype="multipart/form-data">
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
                               <h3 class="card-title">Thông tin code</h3>
                            </div>
                            <div class="card-body table-responsive p-3">
                                <div class="form-group">
                                    <div class="row">
                                        <label class="col-sm-2 control-label" for="">Tên</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control nameChangeSlug
                                            @error('name') is-invalid @enderror" id="name" value="{{ old('name') ?? $data->name }}" name="name" placeholder="Nhập tên">
                                            @error('name')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <label class="col-sm-2 control-label" for="">Nhập mô tả</label>
                                        <div class="col-sm-10">
                                            <textarea class="form-control @error('description') is-invalid  @enderror" name="description" id="" rows="20" value="" placeholder="Nhập mô tả">{{ old('description')??$data->description }}
                                            </textarea>
                                            @error('description')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                {{-- <div class="wrap-load-image mb-3">
                                    <div class="form-group">
                                        <label for="">Hình ảnh</label>
                                        <input type="file" class="form-control-file img-load-input border" id="" value="" name="image_path">
                                    </div>
                                    @error('image_path')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                    @if ($data->image_path)
                                    <img class="img-load border p-1 w-100" src="{{asset($data->image_path)}}" alt="{{$data->name}}" style="object-fit:contain;">
                                    @endif
                                </div> --}}

                                <div class="form-group">
                                    <label class="control-label" for="">Số thứ tự</label>

                                    <input type="number" min="0" class="form-control  @error('order') is-invalid  @enderror"  value="{{ old('order')??$data->order }}" name="order" placeholder="Nhập số thứ tự">

                                    @error('order')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="">Trạng thái</label>
                                    <div class="form-check-inline">
                                        <label class="form-check-label">
                                        <input type="radio" class="form-check-input" value="1" name="active" @if(old('active')==='1' || $data->active==1) {{'checked'}} @endif>Hiện
                                        </label>
                                    </div>
                                    <div class="form-check-inline">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" value="0" @if(old('active')==="0" || $data->active==0){{'checked'}} @endif name="active">Ẩn
                                        </label>
                                    </div>
                                    @error('active')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
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
