@if($data)
    <div class="add-new-address-wrapper" id="js_add-new-address-wrapper-edit">
        <form  action="{{ route('profile.updateAddress', ['id'=>$data->id]) }}"  data-url="{{ route('profile.updateAddress', ['id'=>$data->id]) }}" data-ajax="submit" data-target="alert" data-href="#modalAjax" data-content="#content" data-method="POST" method="POST">
        @csrf
            <div class="add-new-address-content">
                <span class="close-address-popup" onclick="showFormAddressEdit()">
                    <svg _ngcontent-vuahanghieu-app-c6="" fill="currentColor" height="24" viewBox="0 0 16 16" width="24" xmlns="http://www.w3.org/2000/svg">
                        <path _ngcontent-vuahanghieu-app-c6="" d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"></path>
                    </svg>
                </span>
                <div class="address-content-header">
                    Thêm mới địa chỉ
                </div>
                <div class="address-content-contain">
                    <div class="address-row">
                        <label for="">
                            Họ và tên
                            <sup>*</sup>
                        </label>
                        <input type="text" name="name" class="address-input" value="{{ $data->name }}" required>
                    </div>
                    <div class="address-row has2col">
                        <div class="address-rowcol">
                            <label for="">
                                Số điện thoại
                                <sup>*</sup>
                            </label>
                            <input type="tel" name="phone" pattern="^(0|\+84)[35789][0-9]{8}$" class="address-input" value="{{ $data->phone }}" required>
                        </div>
                        <div class="address-rowcol">
                            <label for="">
                                Email
                                <sup>*</sup>
                            </label>
                            <input type="email" name="email" pattern="^\w+([\-\.]?\w+)*@\w+([\-\.]?\w+)*(\.\w{2,3})$" class="address-input" value="{{ $data->email }}" required>
                        </div>
                    </div>
                    <div class="address-row has3col">
                        <div class="address-rowcol">
                            <label for="">
                                Tỉnh / Thành phố
                                <sup>*</sup>
                            </label>

                            <select class="address-input @error('city_id') is-invalid  @enderror" data-url="{{ route('ajax.address.districts') }}" value="{{ $data->city_id }}" name="city_id" id="city" required>
                                <option value="">Chọn tỉnh/Thành phố</option>
                                {!! $cities !!}
                            </select>
                            @error('city_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="address-rowcol">
                            <label for="">
                                Quận / Huyện
                                <sup>*</sup>
                            </label>
                            <select class="address-input @error('district_id') is-invalid   @enderror" name="district_id" id="district" data-url="{{ route('ajax.address.communes') }}" value="{{ $data->district_id }}" required>
                                <option value="">Chọn quận/huyện</option>
                            </select>
                            @error('district_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="address-rowcol">
                            <label for="">
                                Phường / Xã
                                <sup>*</sup>
                            </label>
                            <select class="address-input @error('commune_id')is-invalid   @enderror" name="commune_id" id="commune" value="{{ $data->commune_id }}" required>
                                <option value="">Chọn xã/phường/thị trấn</option>
                            </select>
                            @error('commune_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="address-row">
                        <label for="">
                            Địa chỉ
                            <sup>*</sup>
                        </label>
                        <input type="text" name="address_detail" class="address-input @error('address_detail')is-invalid   @enderror" placeholder="Số nhà, ngõ, ngách, thôn, xóm..." value="{{ $data->address_detail }}">
                    </div>
                    <div class="profile-change-address">
                        <div class="js-profile-change-addres" onclick="activeChangeAddres()">
                            <span class="change-address-icon">
                                <input type="hidden" name="default_address" class="change-address-text" id="defaultAddressInput">
                                <i class="fas fa-check" aria-hidden="true"></i>
                            </span>
                                Đặt làm địa chỉ mặc định
                        </div>
                    </div>
                    <div class="address-action-gr">
                        <button type="submit" class="address_btn address-action-submit">
                            Lưu lại
                        </button>
                        <button class="address_btn address-action-reset">
                            Hủy bỏ
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endif