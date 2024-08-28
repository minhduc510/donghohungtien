<form class="form-horizontal formEditParagaphAjax" data-url="{{ $urlUpload }}" method="POST"
    enctype="multipart/form-data">
    @csrf
    <div class="loadHtmlErrorValide">

    </div>
    <div class="text-right mb-3">
        <button class="btn btn-primary btn-lg" type="submit">Lưu lại</button>
    </div>
    <div class="row">
        <div class="col-md-9">
            <ul class="nav nav-tabs">
                @foreach ($langConfig as $langItem)
                    <li class="nav-item">
                        <a class="nav-link {{ $langItem['value'] == $langDefault ? 'active' : '' }}" data-toggle="tab"
                            href="#thong_tin_paragraph_edit_{{ $loop->index . '_' . $langItem['value'] }}">{{ $langItem['name'] }}</a>
                    </li>
                @endforeach
            </ul>
            <div class="tab-content">
                @foreach ($langConfig as $langItem)
                    <div id="thong_tin_paragraph_edit_{{ $loop->index . '_' . $langItem['value'] }}"
                        class="container tab-pane {{ $langItem['value'] == $langDefault ? 'active show' : '' }} fade">
                        <div class="form-group">
                            <div class="row">
                                <label class="col-sm-2 control-label" for="">Tên mục lục</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control"
                                        value="{{ old('nameParagraphEdit_' . $langItem['value']) ?? optional($data->translationsLanguage($langItem['value'])->first())->name }}"
                                        name="nameParagraphEdit_{{ $langItem['value'] }}" placeholder="Nhập tên"
                                        required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <label class="col-sm-2 control-label" for="">Nhập nội dung đoạn</label>
                                <div class="col-sm-10">
                                    <textarea
                                        class="form-control tinymce_editor_init @error('valueParagraphEdit_' . $langItem['value']) is-invalid  @enderror"
                                        name="valueParagraphEdit_{{ $langItem['value'] }}" id="" rows="15" value=""
                                        placeholder="Nhập nội dung đoạn văn">
                                    {{ old('valueParagraphEdit_' . $langItem['value']) ?? optional($data->translationsLanguage($langItem['value'])->first())->value }}
                                </textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="col-md-3">
            <div class="wrap-load-image mb-3">
                {{-- <div class="form-group">
                    <label for="">Ảnh đại diện</label>
                    <input type="file" class="form-control-file img-load-input border" id="" name="image_path_paragraph_edit">
                </div>
                @error('image_path_paragraph_edit')
                <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
                <img class="img-load border p-1" src="{{$data->image_path?asset($data->image_path):asset('admin_asset/images/upload-image.png')}}" style="max-height: 150px;object-fit:cover; max-width: 200px;"> --}}
            </div>

            <div class="form-group">
                <div class="row">
                    <label class="col-sm-4 control-label" for="">Chọn kiểu</label>
                    <div class="col-sm-8">
                        <select class="form-control" id="paragraphType" data-url="{{ $routeLoadParagraphType }}"
                            value="" name="typeParagraphEdit" required>
                            <option value="">--- Chọn kiểu đoạn ---</option>
                            @foreach ($type as $key => $value)
                                <option value="{{ $key }}" {{ $key == $data->type ? 'selected' : '' }}>
                                    {{ $value }} </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <label class="col-sm-4 control-label" for="">Chọn đoạn văn cha</label>
                    <div class="col-sm-8">
                        <select class="form-control" id="paragraphParent" value="{{ old('parentIdParagraphEdit') }}"
                            name="parentIdParagraphEdit">
                            <option value="">--- Chọn đoạn văn ---</option>
                            @if (old('parentIdParagraphEdit') || old('parentIdParagraphEdit') === '0')
                                {!! \App\Models\ParagraphPost::getHtmlOption(old('parentIdParagraphEdit')) !!}
                            @elseif (isset($htmlselect))
                                {!! $htmlselect !!}
                            @endif
                        </select>
                    </div>
                </div>
            </div>


            <div class="form-group">
                <div class="row">
                    <label class="col-sm-4 control-label" for="">Số thứ tự</label>
                    <div class="col-sm-8">
                        <input type="number" min="0" class="form-control" value="{{ $data->order }}"
                            name="orderParagraphEdit" placeholder="Nhập số thứ tự">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <label class="col-sm-4 control-label" for="">Trạng thái</label>
                    <div class="col-sm-8">
                        <div class="form-check-inline">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input checkParagraph" value="1"
                                    name="activeParagraphEdit"
                                    {{ (old('activeParagraphEdit') ?? $data->active) == 1 ? 'checked' : '' }}>Hiện
                            </label>
                        </div>
                        <div class="form-check-inline">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input checkParagraph" value="0"
                                    name="activeParagraphEdit"
                                    {{ (old('activeParagraphEdit') ?? $data->active) == 0 ? 'checked' : '' }}>Ẩn
                            </label>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</form>
