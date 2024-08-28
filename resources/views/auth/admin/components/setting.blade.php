@php
    $folder = '';
@endphp

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
                    <div class="col-sm-5 pt-2 pb-2 slug">
                        Giá trị
                    </div>
                    <div class="col-sm-1 pt-2 pb-2 white-space-nowrap stt">
                        STT
                    </div>
                    {{-- <div class="col-sm-3 pt-2 pb-2 parent">
                        Danh mục cha
                    </div> --}}
                    {{-- <div class="col-sm-2 pt-2 pb-2 image">
                        Hình ảnh
                    </div> --}}
                    <div class="col-sm-1 pt-2 pb-2 show">
                        Hiển thị
                    </div>
                </div>
            </div>
            <div class="pt-2 pb-2 lb_list_action_recusive">
                Action
            </div>
        </div>
    </li>
    @foreach ($data as $value)
        <li class="lb_item_recusive font-weight-bold  lb_item_delete  border-bottom">
            <div class="d-flex">
                <div class="box-left lb_list_content_recusive ">
                    <div class="d-flex">
                        <div class="col-sm-1 pt-2 pb-2 white-space-nowrap folder">
                            {{-- {{$value->id}} --}}

                            @if ($value->childs->count())
                                <i class="fas fa-folder"></i>
                            @else
                                <i class="fas fa-file-alt"></i>
                            @endif
                        </div>
                        <div class="col-sm-4 pt-2 pb-2 name">
                            <a
                                href="{{ route(Route::currentRouteName(), ['parent_id' => $value->id]) }}">{{ $value->name }}</a>
                        </div>
                        <div class="col-sm-5 pt-2 pb-2 slug">
                            {!! $value->value !!}
                        </div>
                        <div class="col-sm-1 pt-2 pb-2 stt">
                            <input
                                data-url="@if (isset($routeNameOrder)) {{ route($routeNameOrder, ['table' => $table, 'id' => $value->id]) }} @endif"
                                class="lb-order text-center" type="number" min="0"
                                value="{{ $value->order ? $value->order : 0 }}" style="width:50px" />
                        </div>
                        {{-- <div class="col-sm-3 pt-2 pb-2 parent">
                            {{ $value->parent_id ? $value->parent->name : 'Root' }}

                        </div> --}}
                        {{-- <div class="col-sm-2 pt-2 pb-2 image">
                            <img src="{{ !empty($value->image_path) ? asset($value->image_path) : asset('frontend/images/360_F_473254957_bxG9yf4ly7OBO5I0O5KABlN930GwaMQz.jpg') }}"
                                alt="">

                        </div> --}}
                        <div class="ol-sm-1 pt-2 pb-2 show" style="padding-left: 9px">

                            <div class="wrap-load-active"
                                data-url="{{ route('admin.setting.load.active', ['id' => $value->id]) }}">
                                @include('admin.components.load-change-active', [
                                    'data' => $value,
                                    'type' => 'setting',
                                ])
                            </div>
                        </div>
                    </div>
                </div>

                <div class="pt-2 pb-2 lb_list_action_recusive">
                    <a href="{{ route($routeNameEdit, ['id' => $value->id]) }}" class="btn btn-sm btn-info"><i
                            class="fas fa-edit"></i></a>
                    <a href="{{ route($routeNameAdd, ['parent_id' => $value->id]) }}" class="btn btn-sm btn-info">+
                        Thêm</a>
                    <a data-url="{{ route($routeNameDelete, ['id' => $value->id]) }}"
                        class="btn btn-sm btn-danger lb_delete_recusive"><i class="far fa-trash-alt"></i></a>
                    @if ($value->childs->count())
                        <button type="button" class="btn btn-sm btn-primary lb-toggle">
                            <i class="fas fa-plus"></i>
                        </button>
                    @endif
                </div>
            </div>
            @if ($value->childs->count())
                <ul class="font-weight-normal" style="display: none;">
                    @foreach ($value->childs as $childValue)
                        @include('admin.components.setting-child', ['childs' => $childValue])
                    @endforeach
                </ul>
            @endif
        </li>
    @endforeach
</ul>
