@extends('admin.layouts.main')
@section('title',"Copy bài viêt")

@section('css')
@endsection
@section('content')
<div class="content-wrapper lb_template_post_edit">
    @include('admin.partials.content-header',['name'=>"Bài viết","key"=>"Copy bài viết"])

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
                    <form class="form-horizontal" action="{{route('admin.post.update_coppy',['id'=>$data->id])}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card card-outline card-primary">
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
                                                <button type="submit" class="btn btn-primary btn-lg">Lưu bài viết</button>
                                                <button type="reset" class="btn btn-danger btn-lg">Nhập lại bài viết</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="card card-outline card-primary">
                                    <div class="card-header">
                                       <h3 class="card-title">Thông tin bài viết</h3>
                                    </div>
                                    <div class="card-body table-responsive p-3">
										<ul class="nav nav-tabs">
                                            <li class="nav-item">
                                              <a class="nav-link active" data-toggle="tab" href="#tong_quan">Tổng quan</a>
                                            </li>
                                            <!-- <li class="nav-item">
                                              <a class="nav-link" data-toggle="tab" href="#du_lieu">Dữ liệu</a>
                                            </li> -->
                                            {{--<li class="nav-item">
                                              <a class="nav-link" data-toggle="tab" href="#hinh_anh">Hình ảnh</a>
                                            </li>
                                            <li class="nav-item">
                                              <a class="nav-link" data-toggle="tab" href="#seo">Seo</a>
                                            </li>--}}
                                        </ul>
                                        <div class="tab-content">
                                            <!-- START Tổng Quan -->
                                            <div id="tong_quan" class="container tab-pane active wrapChangeSlug"><br>

                                                <ul class="nav nav-tabs">
                                                    @foreach ($langConfig as $langItem)
                                                    <li class="nav-item">
                                                        <a class="nav-link {{$langItem['value']==$langDefault?'active':''}}" data-toggle="tab" href="#tong_quan_{{$langItem['value']}}">{{ $langItem['name'] }}</a>
                                                    </li>
                                                    @endforeach

                                                </ul>
                                                <div class="tab-content">
                                                    @foreach ($langConfig as $langItem)
                                                    <div id="tong_quan_{{$langItem['value']}}" class="container tab-pane {{$langItem['value']==$langDefault?'active show':''}} fade">
                                                        <div class="form-group">
                                                            <div class="row">
                                                                <label class="col-sm-2 control-label" for="">Tên bài viết</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" class="form-control nameChange nameChangeSlug {{$langItem['value']}}
                                                                    @error('name_'.$langItem['value']) is-invalid @enderror" id="name_{{$langItem['value']}}" data-lg="{{$langItem['value']}}" value="{{ old('name_'.$langItem['value'])??optional($data->translationsLanguage($langItem['value'])->first())->name }}" name="name_{{$langItem['value']}}" placeholder="Nhập tên">
                                                                    @error('name_'.$langItem['value'])
                                                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="row">
                                                                <label class="col-sm-2 control-label" for="">Slug</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" class="form-control resultSlug_{{$langItem['value']}} resultSlug1_{{$langItem['value']}} changeAlias1 {{$langItem['value']}}
                                                                    @error('slug_'.$langItem['value']) is-invalid  @enderror" id="slug_{{ $langItem['value'] }}" data-lg="{{$langItem['value']}}" value="{{ old('slug_'.$langItem['value'])??optional($data->translationsLanguage($langItem['value'])->first())->slug }}" name="slug_{{ $langItem['value'] }}" placeholder="Nhập slug">
                                                                    @error('slug_'.$langItem['value'])
                                                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="row">
                                                                <label class="col-sm-2 control-label" for="">Nhập giới thiệu</label>
                                                                <div class="col-sm-10">
                                                                    <textarea class="form-control  @error('description_'.$langItem['value']) is-invalid @enderror" name="description_{{$langItem['value']}}" id="" rows="3"  placeholder="Nhập giới thiệu">{{ old('description_'.$langItem['value'])??optional($data->translationsLanguage($langItem['value'])->first())->description  }}</textarea>
                                                                    @error('description_'.$langItem['value'])
                                                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="row">
                                                                <label class="col-sm-2 control-label" for="">Nhập mã schema</label>
                                                                <div class="col-sm-10">
                                                                    <textarea class="form-control  @error('code_schema_'.$langItem['value']) is-invalid @enderror" name="code_schema_{{$langItem['value']}}" id="" rows="3"  placeholder="Nhập mã schema">{{ old('code_schema_'.$langItem['value'])??optional($data->translationsLanguage($langItem['value'])->first())->code_schema  }}</textarea>
                                                                    @error('code_schema_'.$langItem['value'])
                                                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="row">
                                                                <label class="col-sm-2 control-label" for="">Nhập nội dung</label>
                                                                <div class="col-sm-10">
                                                                    <textarea class="form-control tinymce_editor_init @error('content_'.$langItem['value']) is-invalid  @enderror" name="content_{{$langItem['value']}}" id="ckeditor" rows="20" value="" placeholder="Nhập nội dung">
                                                                    {{ old('content_'.$langItem['value'])??optional($data->translationsLanguage($langItem['value'])->first())->content }}
                                                                    </textarea>
                                                                    @error('content_'.$langItem['value'])
                                                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="row">
                                                                <label class="col-sm-2 control-label" for="">Nhập tags</label>
                                                                <div class="col-sm-10">
                                                                    
                                                                    <select class="form-control tag-select-choose w-100" multiple="multiple" name="tags_{{$langItem['value']}}[]">
                                                                        @if (old('tags_'.$langItem['value']))
                                                                            @foreach (old('tags_'.$langItem['value']) as $tag)
                                                                                <option value="{{ $tag }}" selected>{{ $tag }}</option>
                                                                            @endforeach
                                                                        @else
                                                                        @foreach($data->tagsLanguage($langItem['value'])->get() as $tagItem)
                                                                            <option value="{{$tagItem->name}}" selected>{{$tagItem->name}}</option>
                                                                        @endforeach
                                                                        @endif
                                                                    </select>
                                                                    @error('title_seo')
                                                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="card card-outline card-primary">
                                                            <div class="card-header">
                                                                <h3 class="card-title">Xem trước kết quả tìm kiếm</h3>
                                                                <button class="ui-button ui-button--link" type="button" name="button">Tùy chỉnh SEO</button>
                                                            </div>
                                                            <div class="card-body table-responsive p-3">
                                                                <div class="card-header">
                                                                    <div class="google-preview" bind-show="shouldShowGooglePreview()">
                                                                        <span class="google__title ">
                                                                            <input type="text" class="resultTitle_{{ $langItem['value'] }}" value="{{optional($data->translationsLanguage($langItem['value'])->first())->title_seo}}" readonly>
                                                                        </span>
                                                                        <div class="google__url">
                                                                            {{ $url }}/<input type="text" class="resultUrl_{{ $langItem['value'] }}" value="{{optional($data->translationsLanguage($langItem['value'])->first())->slug}}" readonly>
                                                                            
                                                                        </div>
                                                                        <div class="google__description resultDescription_{{ $langItem['value'] }}" id="resultDescription_{{ $langItem['value'] }}">{{optional($data->translationsLanguage($langItem['value'])->first())->description_seo}}
                                                                        {{--<input type="text" class="resultDescription" value="{{optional($data->translationsLanguage($langItem['value'])->first())->description_seo}}" readonly>--}}
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="card-header form-input hidden">
                                                                    <div class="form-group">
                                                                        <div class="row">
                                                                            <label class="col-sm-2 control-label" for="">Nhập title seo</label>
                                                                            <div class="col-sm-10">
                                                                                <input type="text" class="form-control changeTitle_{{ $langItem['value'] }}
                                                                                @error('title_seo_'.$langItem['value']) is-invalid @enderror" id="title_seo_{{ $langItem['value'] }}" value="{{ old('title_seo_'.$langItem['value'])??optional($data->translationsLanguage($langItem['value'])->first())->title_seo }}" name="title_seo_{{ $langItem['value'] }}" placeholder="Nhập title seo">
                                                                                @error('title_seo_'.$langItem['value'])
                                                                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                                                                @enderror
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <div class="row">
                                                                            <label class="col-sm-2 control-label" for="">Nhập mô tả seo</label>
                                                                            <div class="col-sm-10">
                                                                                <textarea
                                                                                    class="form-control changeDescription
                                                                                    @error('description_seo_' . $langItem['value']) is-invalid  @enderror"
                                                                                    name="description_seo_{{ $langItem['value'] }}"
                                                                                    id="description_seo_{{ $langItem['value'] }}" rows="3" value=""
                                                                                    data-lg="{{$langItem['value']}}"
                                                                                    >{{ old('description_seo_' . $langItem['value'])??optional($data->translationsLanguage($langItem['value'])->first())->description_seo }}</textarea>
                                                                                @error('description_seo_' . $langItem['value'])
                                                                                    <div class="invalid-feedback d-block">
                                                                                        {{ $message }}</div>
                                                                                @enderror
                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                    <div class="form-group">
                                                                        <div class="row">
                                                                            <label class="col-sm-2 control-label" for="">Nhập từ khóa seo</label>
                                                                            <div class="col-sm-10">
                                                                                <input type="text" class="form-control @error('keyword_seo_'.$langItem['value']) is-invalid @enderror" id="keyword_seo_{{ $langItem['value'] }}" value="{{ old('keyword_seo_'.$langItem['value'])??optional($data->translationsLanguage($langItem['value'])->first())->keyword_seo  }}" name="keyword_seo_{{ $langItem['value'] }}" placeholder="Nhập mô tả seo">
                                                                                @error('keyword_seo_'.$langItem['value'])
                                                                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                                                                @enderror
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <div class="row">
                                                                            <label class="col-sm-2 control-label" for="">Đường dẫn / Alias</label>
                                                                            <div class="col-sm-10">
                                                                                <div class="next-input--stylized">
                                                                                    <span class="next-input__add-on next-input__add-on--before" style="padding-right:0">{{ $url }}/</span>
                                                                                    <input type="text" class="next-input next-input--invisible resultSlug2_{{$langItem['value']}} changeAlias2 {{$langItem['value']}}
                                                                                    @error('slug_'.$langItem['value']) is-invalid  @enderror" id="slug_{{ $langItem['value'] }}" data-lg="{{$langItem['value']}}" value="{{ old('slug_'.$langItem['value'])??optional($data->translationsLanguage($langItem['value'])->first())->slug }}" name="slug_{{ $langItem['value'] }}">
                                                                                    @error('slug_'.$langItem['value'])
                                                                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                                                                    @enderror
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
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
                                            {{--<div id="hinh_anh" class="container tab-pane fade"><br>

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
                                                    @if($data->avatar_path)
                                                        <label class="form-check-label" style="padding-left: 20px; margin-top: 5px;">
                                                            <input type="checkbox" class="form-check-input" value="1" name="deleteavatar">
                                                            Xóa ảnh
                                                        </label>
                                                    @endif
                                                </div>

                                                <hr>

                                            </div>--}}
                                            <!-- END Hình Ảnh -->

                                            <!-- START Seo -->
                                            {{--<div id="seo" class="container tab-pane fade"><br>
                                                <ul class="nav nav-tabs">
                                                    @foreach ($langConfig as $langItem)
                                                    <li class="nav-item">
                                                        <a class="nav-link {{$langItem['value']==$langDefault?'active':''}}" data-toggle="tab" href="#seo_{{$langItem['value']}}">{{ $langItem['name'] }}</a>
                                                    </li>
                                                    @endforeach
                                                </ul>
                                                <div class="tab-content">
                                                    @foreach ($langConfig as $langItem)
                                                        <div id="seo_{{$langItem['value']}}" class="container tab-pane {{$langItem['value']==$langDefault?'active show':''}} fade">
                                                            <div class="form-group">
                                                                <div class="row">
                                                                    <label class="col-sm-2 control-label" for="">Nhập title seo</label>
                                                                    <div class="col-sm-10">
                                                                        <input type="text" class="form-control @error('title_seo_'.$langItem['value']) is-invalid @enderror" id="title_seo" value="{{ old('title_seo_'.$langItem['value'])??optional($data->translationsLanguage($langItem['value'])->first())->title_seo }}" name="title_seo_{{ $langItem['value'] }}" placeholder="Nhập title seo">
                                                                        @error('title_seo_'.$langItem['value'])
                                                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <div class="row">
                                                                    <label class="col-sm-2 control-label" for="">Nhập mô tả seo</label>
                                                                    <div class="col-sm-10">
                                                                        <input type="text" class="form-control @error('description_seo_'.$langItem['value']) is-invalid @enderror" id="description_seo" value="{{ old('description_seo_'.$langItem['value'])??optional($data->translationsLanguage($langItem['value'])->first())->description_seo }}" name="description_seo_{{ $langItem['value'] }}" placeholder="Nhập mô tả seo">
                                                                        @error('description_seo_'.$langItem['value'])
                                                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                                                        @enderror
                                                                    </div>
                                                                </div>

                                                            </div>
                                                            <div class="form-group">
                                                                <div class="row">
                                                                    <label class="col-sm-2 control-label" for="">Nhập từ khóa seo</label>
                                                                    <div class="col-sm-10">
                                                                        <input type="text" class="form-control @error('keyword_seo_'.$langItem['value']) is-invalid @enderror" id="keyword_seo" value="{{ old('keyword_seo_'.$langItem['value'])??optional($data->translationsLanguage($langItem['value'])->first())->keyword_seo  }}" name="keyword_seo_{{ $langItem['value'] }}" placeholder="Nhập mô tả seo">
                                                                        @error('keyword_seo_'.$langItem['value'])
                                                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                                                        @enderror
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>--}}
                                            <!-- END Seo -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card card-outline card-primary">
                                    <div class="card-header">
                                        <h3 class="card-title">Cấu hình bài viết</h3>
                                     </div>
                                     <div class="card-body table-responsive">                                        
                                        <div class="form-group wrap-permission">
                                            <div style="border: 1px solid; padding: 5px;">
                                                <label class="control-label" for="">Lựa chọn chuyên mục</label>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div style="height: 250px; overflow: auto;border: 1px solid #eee;font-size: 12px;line-height: 18px;">
                                                            @foreach($data_ed->where('active',1) as $item)
                                                            <div class="item-permission mt-2 mb-2">
                                                                <div class="form-check permission-title">
                                                                    <label class="form-check-label p-2">
                                                                        <input type="checkbox" class="form-check-input check-children" value="{{ $item->id }}" name="category[]"
                                                                        @if ($categoryPostOfAdmin->contains($item->id))
                                                                        {{ 'checked' }}
                                                                        @endif
                                                                        >{{ $item->name }}
                                                                    </label>
                                                                </div>
                                                                @if(count($item->childs)>0)
                                                                <div class="list-permission p-2 pl-4">
                                                                    <div class="row">
                                                                        @foreach($item->childs()->with('translationsLanguage')->where('active', 1)->orderBy("order")->get() as $itemChild)
                                                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                                                            <div class="form-check">
                                                                                <label class="form-check-label">
                                                                                <input type="checkbox" class="form-check-input check-children" name="category[]" value="{{ $itemChild->id }}"
                                                                                @if ($categoryPostOfAdmin->contains($itemChild->id))
                                                                                    {{ 'checked' }}
                                                                                @endif
                                                                                >{{ $itemChild->name }}
                                                                                </label>
                                                                            </div>
                                                                            @if(count($itemChild->childs)>0)
                                                                            <div class="row">
                                                                                @foreach($itemChild->childs()->with('translationsLanguage')->where('active', 1)->orderBy("order")->get() as $itemChild2)
                                                                                <div class="col-lg-12 col-md-12 col-sm-12">
                                                                                    <div class="form-check pl-5">
                                                                                        <label class="form-check-label">
                                                                                        <input type="checkbox" class="form-check-input check-children" name="category[]" value="{{ $itemChild2->id }}"
                                                                                        @if ($categoryPostOfAdmin->contains($itemChild2->id))
                                                                                        {{ 'checked' }}
                                                                                        @endif
                                                                                        >{{ $itemChild2->name }}
                                                                                        </label>
                                                                                    </div>
                                                                                    @if(count($itemChild2->childs)>0)
                                                                                    <div class="row">
                                                                                        @foreach($itemChild2->childs()->with('translationsLanguage')->where('active', 1)->orderBy("order")->get() as $itemChild3)
                                                                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                                                                            <div class="form-check pl-5" style="padding-left: 4rem!important;">
                                                                                                <label class="form-check-label">
                                                                                                <input type="checkbox" class="form-check-input check-children" name="category[]" value="{{ $itemChild3->id }}"
                                                                                                @if ($categoryPostOfAdmin->contains($itemChild3->id))
                                                                                                {{ 'checked' }}
                                                                                                @endif
                                                                                                >{{ $itemChild3->name }}
                                                                                                </label>
                                                                                            </div>
                                                                                        </div>
                                                                                        @endforeach
                                                                                    </div>
                                                                                    @endif
                                                                                </div>
                                                                                @endforeach
                                                                            </div>
                                                                            @endif
                                                                        </div>
                                                                        @endforeach
                                                                    </div>
                                                                </div>
                                                                @endif
                                                            </div>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                        
                                                </div>
                                            </div>
                                        </div>
                                        {{--<div class="select-category-s">
                                            <div style="border: 1px solid;">
                                                <label class="control-label" for="">Lựa chọn chuyên mục <i class="fa fa-angle-down list-prd-sb-3"></i></label>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="tabs">
                                                            <div class="tablinks active" data-electronic="tatcachuyenmuc">Tất cả chuyên mục</div>
                                                            <div class="tablinks" data-electronic="dungnhieunhat">Dùng nhiều nhất</div>
                                                         
                                                        </div>

                                                        <div class="wrapper_tabcontent">
                                                            <div id="tatcachuyenmuc" class="tabcontent active">
                                                                @foreach($data_ed as $item)
                                                                <div class="check-chuyenmuc">
                                                                    <div class="form-checkchuyenmuc">
                                                                        <div class="item_checkchuyenmuc check-{{ $item->id }}">
                                                                            <input type="checkbox" class="form-check-input check-children" value="{{ $item->id }}" name="category[]"
                                                                            @if ($categoryPostOfAdmin->contains($item->id))
                                                                            {{ 'checked' }}
                                                                            @endif
                                                                            >{{ $item->name }}
                                                                            @if(count($item->childs)>0)
                                                                            <i class="fa fa-angle-down list-prd-sb-3" data-id="{{ $item->id }}"></i>
                                                                            @endif
                                                                        </div>
                                                                    </div>
                                                                    @if(count($item->childs)>0)
                                                                    <div class="chuyenmuc-c2 caccap-chuyenmuc check-chuyen-muc-{{ $item->id }}">
                                                                        @foreach($item->childs()->with('translationsLanguage')->where('active', 1)->orderBy("order")->get() as $itemChild)
                                                                            <div class="form-checkchuyenmuc">
                                                                                <div class="item_checkchuyenmuc check-{{ $itemChild->id }}">
                                                                                    <input type="checkbox" class="form-check-input check-children" name="category[]" value="{{ $itemChild->id }}"
                                                                                    @if ($categoryPostOfAdmin->contains($itemChild->id))
                                                                                        {{ 'checked' }}
                                                                                    @endif
                                                                                    >{{ $itemChild->name }}
                                                                                    @if(count($itemChild->childs)>0)
                                                                                    <i class="fa fa-angle-down list-prd-sb-3" data-id="{{ $itemChild->id }}"></i>
                                                                                    @endif
                                                                                </div>
                                                                            </div>
                                                                            @if(count($itemChild->childs)>0)
                                                                            <div class="chuyenmuc-c3 caccap-chuyenmuc check-chuyen-muc-{{ $itemChild->id }}">
                                                                                @foreach($itemChild->childs()->with('translationsLanguage')->where('active', 1)->orderBy("order")->get() as $itemChild2)
                                                                                <div class="form-checkchuyenmuc">
                                                                                    <div class="item_checkchuyenmuc check-{{ $itemChild2->id }}">
                                                                                        <input type="checkbox" class="form-check-input check-children" name="category[]" value="{{ $itemChild2->id }}"
                                                                                        @if ($categoryPostOfAdmin->contains($itemChild2->id))
                                                                                        {{ 'checked' }}
                                                                                        @endif
                                                                                        >{{ $itemChild2->name }}
                                                                                        @if(count($itemChild2->childs)>0)
                                                                                        <i class="fa fa-angle-down list-prd-sb-3" data-id="{{ $itemChild2->id }}"></i>
                                                                                        @endif
                                                                                    </div>
                                                                                </div>
                                                                                @endforeach
                                                                            </div>
                                                                            @endif
                                                                        @endforeach
                                                                    </div>
                                                                    @endif
                                                                </div>
                                                                @endforeach
                                                            </div>

                                                            <div id="dungnhieunhat" class="tabcontent">
                                                                @foreach($data_ed_dungNhieu as $item)
                                                                <div class="check-chuyenmuc">
                                                                    <div class="form-checkchuyenmuc">
                                                                        <div class="item_checkchuyenmuc check-{{ $item->id }}">
                                                                            <input type="checkbox" class="form-check-input check-children" value="{{ $item->id }}" name="category[]"
                                                                            @if ($categoryPostOfAdmin->contains($item->id))
                                                                            {{ 'checked' }}
                                                                            @endif
                                                                            >{{ $item->name }}
                                                                            @if(count($item->childs)>0)
                                                                            <i class="fa fa-angle-down list-prd-sb-3" data-id="{{ $item->id }}"></i>
                                                                            @endif
                                                                        </div>
                                                                    </div>
                                                                    @if(count($item->childs)>0)
                                                                    <div class="chuyenmuc-c2 caccap-chuyenmuc check-chuyen-muc-{{ $item->id }}">
                                                                        @foreach($item->childs()->with('translationsLanguage')->where('active', 1)->orderBy("order")->get() as $itemChild)
                                                                            <div class="form-checkchuyenmuc">
                                                                                <div class="item_checkchuyenmuc check-{{ $itemChild->id }}">
                                                                                    <input type="checkbox" class="form-check-input check-children" name="category[]" value="{{ $itemChild->id }}"
                                                                                    @if ($categoryPostOfAdmin->contains($itemChild->id))
                                                                                        {{ 'checked' }}
                                                                                    @endif
                                                                                    >{{ $itemChild->name }}
                                                                                    @if(count($itemChild->childs)>0)
                                                                                    <i class="fa fa-angle-down list-prd-sb-3" data-id="{{ $itemChild->id }}"></i>
                                                                                    @endif
                                                                                </div>
                                                                            </div>
                                                                            @if(count($itemChild->childs)>0)
                                                                            <div class="chuyenmuc-c3 caccap-chuyenmuc check-chuyen-muc-{{ $itemChild->id }}">
                                                                                @foreach($itemChild->childs()->with('translationsLanguage')->where('active', 1)->orderBy("order")->get() as $itemChild2)
                                                                                <div class="form-checkchuyenmuc">
                                                                                    <div class="item_checkchuyenmuc check-{{ $itemChild2->id }}">
                                                                                        <input type="checkbox" class="form-check-input check-children" name="category[]" value="{{ $itemChild2->id }}"
                                                                                        @if ($categoryPostOfAdmin->contains($itemChild2->id))
                                                                                        {{ 'checked' }}
                                                                                        @endif
                                                                                        >{{ $itemChild2->name }}
                                                                                        @if(count($itemChild2->childs)>0)
                                                                                        <i class="fa fa-angle-down list-prd-sb-3" data-id="{{ $itemChild2->id }}"></i>
                                                                                        @endif
                                                                                    </div>
                                                                                </div>
                                                                                @endforeach
                                                                            </div>
                                                                            @endif
                                                                        @endforeach
                                                                    </div>
                                                                    @endif
                                                                </div>
                                                                @endforeach
                                                            </div>

                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>--}}


                                        <div class="form-group">
                                            
                                            <div style="display: none;">
                                            <select class="form-control custom-select select-2-init @error('category_id')
                                                is-invalid
                                                @enderror" id="" value="{{ old('category_id') }}" name="category_id">
                                                @if (old('category_id')||old('category_id')==='0')
                                                    {!! \App\Models\CategoryPost::getHtmlOption(old('category_id')) !!}
                                                @else
                                                {!!$option!!}
                                                
                                                @endif
                                            </select>
                                            </div>
                                            @error('category_id')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                            @enderror

                                            
                                                
                                            {{--<select class="form-control tag-select-choose w-100" multiple="multiple"  name="category[]">
                                                @if (old('category_id')||old('category_id')==='0')
                                                    {!! \App\Models\CategoryPost::getHtmlOption(old('category_id')) !!}
                                                @else
                                                    @if($cate!=null)
                                                        @foreach($cate as $item)
                                                        {!! \App\Models\CategoryPost::getHtmlOption($item['id']) !!}
                                                        @endforeach
                                                    @else
                                                    {!!$option!!}
                                                    @endif
                                                @endif
                                            </select>--}}
                                         
                                        </div>
                                        {{--<div class="form-group mb-1">
                                            <div class="form-check-inline">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input @error('tt_tuyen_truyen') is-invalid
                                                        @enderror" value="1" name="tt_tuyen_truyen" @if(old('tt_tuyen_truyen')==="1"||$data->tt_tuyen_truyen==1 ) {{'checked'}} @endif>
                                                        Thông tin tuyên truyền
                                                </label>
                                            </div>
                                            @error('hot')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="">File tài liệu</label>
                                            @if ($data->file_path)
                                                <div class="list_file mb-2">
                                                   <ul class="list-group">
                                                    <li class="file_item list-group-item">
                                                        <a href="{{ asset($data->file_path) }}" target="blank">{{ $data->file_path }}   </a>
                                                         <a data-url="{{ route('admin.post.destroyFile',['id'=>$data->id,'field'=>'file_path']) }}" class="lb_delete_file"><i class="fas fa-times-circle"></i></a>
                                                    </li>
                                                  </ul>
                                                </div>
                                            @endif
                                            <input type="file" class="form-control-file border @error('file')
                                            is-invalid
                                            @enderror" id="" name="file_path">
                                            @error('file_path')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                            @enderror
                                        </div>--}}
                                        <div class="form-group">
                                            <label class="control-label" for="">Số lượt xem ban đầu</label>
                                            <input type="number" min="0" class="form-control  @error('view_start') is-invalid  @enderror" value="{{ old('view_start')??$data->view_start }}" name="view_start" placeholder="Nhập số view bắt đầu">
                                            @error('view_start')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="wrap-load-image mb-3">
                                            <div class="form-group">
                                                <label for="">Ảnh đại diện</label>
                                                <input type="file" class="form-control-file img-load-input border" id="" name="avatar_path">
                                                <input type="hidden" name="avatar_path_select" id="avatar_path_select">
                                                {{--<a href="javascript:void(0)" onClick="openSelectAvatarModal()">Chọn từ thư viện</a>--}}
                                            </div>
                                            @error('avatar_path')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                            @enderror
                                            @if ($data->avatar_path)
                                            <div class="item-avatar">
                                            <img class="img-load border p-1 w-100" id="img_avatar_path" src="{{$data->avatar_path}}" alt="{{$data->name}}" style="height: 200px;object-fit:cover; max-width: 260px;">
                                            <a class="btn btn-sm btn-danger deleteAvatarProductDB"  data-url="{{ route('admin.post.delete_avatar_path',['id'=>$data->id]) }}"><i class="far fa-trash-alt"></i></a>
                                            </div>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label for="">Tự đặt ngày đăng</label>
                                            <input type="datetime-local" class="form-control  @error('created_at')
                                            is-invalid
                                            @enderror" id="" name="created_at"  value="{{ old('created_at')?? date_format($data->created_at,"Y-m-d\TH:i") }}" >
                                            @error('created_at')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        
                                        {{--<div class="form-group mb-1">
                                            <div class="form-check-inline">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input @error('hot_new') is-invalid
                                                        @enderror" value="1" name="hot_new" @if(old('hot_new')==="1"||$data->hot_new==1 ) {{'checked'}} @endif>
                                                        Tin hot
                                                </label>
                                            </div>
                                            @error('hot_new')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group mb-1">
                                            <div class="form-check-inline">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input @error('tin_cap_nhat') is-invalid
                                                        @enderror" value="1" name="tin_cap_nhat" @if(old('tin_cap_nhat')==="1"||$data->tin_cap_nhat==1 ) {{'checked'}} @endif>
                                                        Tin tức cập nhật
                                                </label>
                                            </div>
                                            @error('tin_cap_nhat')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                            @enderror
                                        </div>--}}
                                        <div class="form-group mb-1">
                                            <div class="form-check-inline">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input @error('hot') is-invalid
                                                        @enderror" value="1" name="hot" @if(old('hot')==="1"||$data->hot==1 ) {{'checked'}} @endif>
                                                        Tin nổi bật
                                                </label>
                                            </div>
                                            @error('hot')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        

                                        {{--<div class="form-group mb-1">
                                            <div class="form-check-inline">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input @error('nhan') is-invalid
                                                        @enderror" value="1" name="nhan" @if(old('nhan')==="1"||$data->nhan==1 ) {{'checked'}} @endif>
                                                        Hiện logo tcktkt
                                                </label>
                                            </div>
                                            @error('nhan')
                                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        @if ($data->save_tam==1)
                                        <div class="form-group mb-1">
                                            <div class="form-check-inline">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input @error('nhan') is-invalid
                                                        @enderror" value="1" name="save_tam" @if(old('nhan')==="1"||$data->save_tam==1 ) {{'checked'}} @endif>
                                                        Lưu tạm (bản nháp)
                                                </label>
                                            </div>
                                            @error('save_tam')
                                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        @endif--}}

                                      
                                        <div class="form-group">
                                            <label class="control-label" for="">Số thứ tự</label>
                                            <input type="number" min="0" class="form-control  @error('order') is-invalid  @enderror"  value="{{ old('order')??$data->order }}" name="order" placeholder="Nhập số thứ tự">
                                            @error('order')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                            @enderror
                                        </div>



                                        <div class="form-group">
                                            <label class=" control-label" for="">Trạng thái</label>
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
                           <div class="col-md-12">
                                <div class="card card-outline card-primary">
                                    <div class="card-header">
                                    <h3 class="card-title w-100">Mục lục đã thêm <a data-url="{{ route('admin.post.loadCreateParagraphPost',['id'=>$data->id]) }}" class="btn  btn-info btn-md float-right " id="addParagraphAjax">+ Thêm mục lục</a></h3>
                                    </div>
                                    <div class="card-body table-responsive p-3">
                                        <div id="loadListParagraph">
                                            @include('admin.components.paragraph.load-list-paragraph',[
                                                'type'=>config('paragraph.posts'),
                                                'data'=>$data,
                                                'routeDelete'=>'admin.post.destroyParagraphPost',
                                                'routeEdit'=>'admin.post.loadEditParagraphPost',
                                                ])
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>


<div class="modal fade in" id="loadAjaxParent">
    <div class="modal-dialog modal-dialog-centered modal-xl">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Mục lục</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
         <div class="content p-3" id="loadContent">
            
         </div>
        </div>
      </div>
    </div>
</div>
@endsection

@section('js')
<script>
    function Clone() {
        var menu = document.querySelector('.modal');
        document.querySelectorAll(".clickBoxup").forEach((element) => {
            element.addEventListener("click", () => {

                menu.classList.remove('showbopuppro');

            })
        });

    }
    Clone();
</script>
<script>
    $(document).on('click', '.ui-button', function() {
            // let id = $(this).data('id');
            $('.form-input').removeClass('hidden');
            $('.ui-button').addClass('hidden');
    });
    $(document).ready(function() {
        $('.nameChange').on('input', function() {
            let language = $(this).data('lg');
            let name = $('.nameChange.'+language).val();
            let slug = createSlug(name);
            $('.changeTitle_'+language).val(name);
            $('.resultTitle_'+language).val(name);
            $('.resultSlug1_'+language).val(slug);
            $('.resultSlug2_'+language).val(slug);
            $('.resultUrl_'+language).val(slug);
        });
    });
    $(document).ready(function() {
        $('.changeAlias1').on('input', function() {
            let language = $(this).data('lg');
            let name = $('.changeAlias1.'+language).val();
            let slug = createSlug(name);
            $('.resultSlug2_'+language).val(slug);
            $('.resultUrl_'+language).val(slug);
            $('.resultSlug1_'+language).val(slug);
            $('.resultUrl_'+language).val(slug);
        });
    });
    $(document).ready(function() {
        $('.changeAlias2').on('input', function() {
            let language = $(this).data('lg');
            let name = $('.changeAlias2.'+language).val();
            let slug = createSlug(name);
            $('.resultSlug1_'+language).val(slug);
            $('.resultUrl_'+language).val(slug);
        });
    });
    $(document).ready(function() {
        $('.changeTitle').on('input', function() {
            let language = $(this).data('lg');
            let name = $('.changeTitle.'+language).val();
            // let slug = createSlug(name);
            $('.resultTitle_'+language).val(name);
        });
    });
    $(document).ready(function() {
        $('.changeDescription').on('change', function() {

            let language = $(this).data('lg');
            let name = document.getElementById("description_seo_"+language);
            let div = document.getElementById("resultDescription_"+language);
            // alert(name.value);
            // let slug = createSlug(name);
            //$('.resultDescription').val(name.value);
            div.innerHTML = name.value;
        });
    });

    function createSlug(name) {
        return name
            // Loại bỏ khoảng trắng đầu và cuối chuỗi
            .trim()
            .toLowerCase()
            // Loại bỏ dấu gạch ngang ở đầu và cuối chuỗi
            .replace(/^-+|-+$/g, '')
            //Đổi ký tự có dấu thành không dấu
            .replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a')
            .replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e')
            .replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i')
            .replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o')
            .replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u')
            .replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y')
            .replace(/đ/gi, 'd')
            //Xóa các ký tự đặt biệt
            .replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '')
            //Đổi khoảng trắng thành ký tự gạch ngang
            .replace(/ /gi, "-")
            //Đổi nhiều ký tự gạch ngang liên tiếp thành 1 ký tự gạch ngang
            //Phòng trường hợp người nhập vào quá nhiều ký tự trắng
            .replace(/\-\-\-\-\-/gi, '-')
            .replace(/\-\-\-\-/gi, '-')
            .replace(/\-\-\-/gi, '-')
            .replace(/\-\-/gi, '-');
    }
</script>
<script>
    $(document).ready(function() {
        $('.check-product').on('change', function () {
            var productItem = $(this).val();
            var post_id = $(this).data('post-id');
            var isChecked = $(this).prop('checked');
            $.ajax({
                type: 'POST',
                url: '{{ route("update-product-post") }}',
                data: {
                    productItem: productItem,
                    post_id: post_id,
                    isChecked: isChecked,
                    _token: '{{ csrf_token() }}'
                },
                success: function (data) {
                    if (data.success) {
                        console.log('Dữ liệu đã được cập nhật thành công.');
                    }
                }
            });
        });
    });
</script>
@endsection
