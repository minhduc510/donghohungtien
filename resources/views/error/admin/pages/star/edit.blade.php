@extends('admin.layouts.main')
@section('title',"Sửa đánh giá " .$configStar['modul'])

@section('content')

  <div class="content-wrapper">
    @include('admin.partials.content-header',['name'=>$configStar['modul'],"key"=>"Sửa đánh giá"])
    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">

                <form action="{{route($configStar['admin_route_update'],['id'=>$data->id])}}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            @if(session("alert"))
                                <div class="alert alert-success">
                                    {{session("alert")}}
                                </div>
                            @elseif(session('error'))
                                <div class="alert alert-warning">
                                    {{session("error")}}
                                </div>
                            @endif
                        </div>
                        <div class="col-md-6">
                           <div class="text-right">
                            <div class="form-group">
                                <button type="reset" class="btn btn-danger">Làm mới</button>
                                <button type="submit" class="btn btn-primary">Chấp nhận</button>
                            </div>
                           </div>
                        </div>
                    </div>
                    <div class="card card-outline card-primary">
                        <div class="card-header">
                        <h3 class="card-title">Thông tin bình luận</h3>
                        </div>
                        <div class="card-body table-responsive p-3">
                            <div class="form-group">
                                <label for="">Tiêu đề đánh giá</label>
                                <input type="text" class="form-control" name="name"
                                placeholder="Nhập tiêu đề đánh giá" required="" value="{{old('name')?? $data->name }}">
                            </div>
                            <div class="form-group">
                                <label for="">Điểm đánh giá</label>
                                <input type="number" step="0.1" class="form-control" min="0" max="10" name="star" placeholder="Nhập điểm đánh giá" value="{{old('star')?? $data->star }}">
                            </div>
                            <div class="form-group">
                                <label for="">Nội dung đánh giá</label>
                                <textarea name="content" class="form-control" rows="3" required="required" placeholder="Nội dung đánh giá">{{old('content')?? $data->content }}</textarea>
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
