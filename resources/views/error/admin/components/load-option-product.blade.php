<div class="item-price">
    <div class="box-content-price">
        {{-- <div class="form-group">
            <label class="control-label" for="">Màu sắc</label>
            <input type="text" class="form-control  @error('color') is-invalid  @enderror" value="{{ old('color') }}"
                name="colorOption[]" placeholder="Nhập mã">
            @error('colorOption')
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div> --}}

        <div class="form-group">
            <label class="control-label" for="">Kích thước</label>
            <input type="text" min="0" class="form-control  @error('size') is-invalid  @enderror"
                value="{{ old('size') }}" name="sizeOption[]" placeholder="Nhập đơn vị khối lượng">
            @error('sizeOption')
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>

        {{-- <div class="form-group">
            <label class="control-label" for="">Thể tích</label>
            <input type="text" min="0" class="form-control  @error('volume') is-invalid  @enderror"
                value="{{ old('volume') }}" name="volumeOption[]" placeholder="Nhập đơn vị thể tích">
            @error('volumeOption')
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div> --}}

        <div class="form-group">
            <label class="control-label" for="">Giá</label>
            <input type="number" min="0" class="form-control  @error('priceOption') is-invalid  @enderror"
                value="{{ old('priceOption') }}" name="priceOption[]" placeholder="Nhập giá">
            @error('priceOption')
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>

        {{-- <div class="form-group">
            <label class="control-label" for="">Giá cũ</label>
            <input type="number" min="0" class="form-control  @error('old_priceOption') is-invalid  @enderror"
                value="{{ old('old_priceOption') }}" name="old_priceOption[]" placeholder="Nhập giá cũ">
            @error('old_priceOption')
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div> --}}

        {{-- <div class="form-group">
            <label class="control-label" for="">Ảnh đại diện</label>
            <input type="file"
                class="form-control-file img-load-input border @error('avatar_type')
            is-invalid @enderror"
                id="" name="avatar_type[]">
            @error('avatar_type')
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
            @if ($data->avatar_type)
                <label class="form-check-label" style="padding-left: 20px; margin-top: 5px;">
                    <input type="checkbox" class="form-check-input" value="1" name="deleteavatar_type">
                    Xóa ảnh
                </label>
            @endif
        </div> --}}
    </div>
    <div class="action">
        <a class="btn btn-sm btn-danger deleteOptionProduct"><i class="far fa-trash-alt"></i></a>
    </div>
</div>
