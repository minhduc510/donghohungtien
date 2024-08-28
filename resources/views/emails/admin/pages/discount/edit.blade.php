@extends('admin.layouts.main')
@section('title',"Edit mã giảm giá")
@section('css')
<link href="{{asset('lib/select2/css/select2.min.css')}}" rel="stylesheet" />
<style>
   .select2-container--default .select2-selection--multiple .select2-selection__choice{
   background-color: #000 !important;
   }
   .select2-container .select2-selection--single{
   height: auto;
   }
</style>
@endsection

@section('content')
<div class="content-wrapper">
   @include('admin.partials.content-header',['name'=>"Mã giảm giá","key"=>"Sửa mã giảm giá"])
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
               <form action="{{route('admin.discount.update',['id'=>$data->id])}}" method="POST">
                  @csrf
                  <div class="row">
                     <div class="col-md-8">
                        <div class="card card-outline card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Thông tin mã giảm giá</h3>
                            </div>
                            <div class="card-body table-responsive p-3">
                                <div class="form-group">
                                <label for="">Mã giảm giá</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    id=""
                                    value="{{ $data->name }}"  name="name"
                                    placeholder="Nhập mã giảm giá"
                                    >
                                @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                </div>
                                <div class="form-group">
                                    <label for="">Giá giảm</label>
                                    <input type="number" min="0" class="form-control  @error('price_is_reduced')
                                    is-invalid
                                    @enderror" id="" name="price_is_reduced"  value="{{ old('price_is_reduced')?? $data->price_is_reduced }}" placeholder="vnđ">
                                    @error('price_is_reduced')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                 </div>
                                <div class="form-group">
                                    <label for="">Ngày bắt đầu</label>
                                    <input type="datetime-local" class="form-control  @error('created_at')
                                    is-invalid
                                    @enderror" id="" name="created_at"  value="{{ old('created_at')?? Illuminate\Support\Carbon::parse($data->created_at)->format("Y-m-d\TH:i") }}" >
                                    @error('created_at')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                 </div>
                                 <div class="form-group">
                                    <label for="">Ngày kết thúc</label>
                                    <input type="datetime-local" class="form-control  @error('end_date')
                                    is-invalid
                                    @enderror" id="" name="end_date"  value="{{ old('end_date')?? Illuminate\Support\Carbon::parse($data->end_date)->format("Y-m-d\TH:i")  }}" > 
                                    @error('end_date')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                 </div>
                                <div class="form-group">
                                 <button type="reset" class="btn btn-danger">Reset</button>
                                 <button type="submit" class="btn btn-primary">Chấp nhận</button>
                                </div>
                            </div>
                        </div>
                     </div>
                  </div>
               </form>
            </div>
         </div>
         <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
   </div>
   <!-- /.content -->
</div>
@endsection
@section('js')
<script src="{{asset('lib/select2/js/select2.min.js')}}"></script>
<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js"></script>
<script>
   $(function(){
     $(".select-2-init").select2({
       placeholder: "Chọn role",
       allowClear: true
     })
   })
</script>
@endsection
