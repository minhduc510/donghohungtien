@if($discount_id)
<form  action="{{ route('admin.discount.update.dis',['id'=> $discount_id]) }}"  data-url="{{ route('admin.discount.update.dis',['id'=> $discount_id]) }}" data-ajax="submit" data-id='{{$discount_id}}' data-target="alert" data-href="#modalAjax" data-content="#content" data-method="POST" method="POST">
    @csrf
    <span>Bạn có thể sửa lại thông tin rồi gửi</span>
    <div class="form-group">
        <label>Mã giảm giá</label>
        <input type="text"
            class="form-control @error('name') is-invalid  @enderror"
            placeholder="Nhập mã giảm giá" value="{{ $discount_name ?? '' }}" name="name">
            @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
    </div>
    <div class="form-group">
        <label>Giảm</label>
        <input type="text"
            class="form-control @error('price_is_reduced') is-invalid  @enderror"
            placeholder="vnđ" value="{{ $discount_price_is_reduced ?? '' }}vnđ" name="price_is_reduced">
            @error('price_is_reduced')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
    </div>
    <div class="form-group">
        <label>Ngày bắt đầu</label>
        <input type="datetime-local"
            class="form-control @error('created_at') is-invalid  @enderror"
            placeholder="Nhập ngày bắt đầu" value="{{ $discount_created_at ?? '' }}" name="created_at">
            @error('created_at')
            <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
    </div>
    <div class="form-group">
        <label>Ngày kết thúc</label>
        <input type="datetime-local"
            class="form-control @error('end_date') is-invalid  @enderror"
            placeholder="Nhập ngày kết thúc" value="{{ $discount_end_date ?? '' }}" name="end_date">
            @error('end_date')
            <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
    </div>
    <button type="submit" class="form-control btn btn-sm btn-info" name="submit">Gửi thông tin về cho khách hàng (tất cả khách hàng đã đăng ký tài khoản)</button>
</form>
@endif