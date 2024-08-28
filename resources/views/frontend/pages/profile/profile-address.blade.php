@extends('frontend.layouts.main-profile')

@section('title', $seo['title'] ?? '' )
@section('keywords', $seo['keywords']??'')
@section('description', $seo['description']??'')
@section('abstract', $seo['abstract']??'')
@section('image', $seo['image']??'')
@section('css')
<style>
    #sidebar-profile .nav-pills {
        background-color: #17a2b8;
    }

    #sidebar-profile nav .nav-item a {
        color: #fff;
        padding: 5px 14px;
        font-size: 14px;
    }

    .box-check-radio {
        float: right;
        line-height: normal;
    }

    .box-check-item {

        height: 30px;
        line-height: 30px;
        border: 1px solid #888;
        text-align: center;
        border-radius: 4px;
        width: 90px;
    }

    .box-check-item select {
        height: auto;
    }

    .box-check-item label {
        font-size: 15px;
    }

    .form-control {
        display: inline-block;

        border: none;

    }

    textarea.form-control {
        padding: 1.375rem 0.75rem;
    }

    .form-group {
        margin-bottom: 20px
    }

    .form-control:focus {
        border: none;
        box-shadow: unset;
    }

    .table-responsive {
        overflow-x: unset;
        border-radius: 4px;
        padding: 8px 14px;
        background: transparent;
    }

    .gender {
        display: inline-block;
        width: 100%
    }

    hr {
        margin: 30px 0;
        width: 50%;
        background: #000;
        height: 1px;
        border: none;
    }

    .tab-cart-items {
        margin-bottom: 10px;
    }

    .card-header {
        padding: 0;
    }

    .tab-step-cart {
        top: -7px
    }

    @media (max-width: 550px) {
        .table-responsive {
            border-radius: 8px;
            padding: 20px 14px;
        }

        .box-check-radio {
            float: left;
        }
    }
</style>
@endsection
@section('content')
<div class="content-wrapper">
    <div class="main">
        {{-- @isset($breadcrumbs,$typeBreadcrumb)
                @include('frontend.components.breadcrumbs',[
                    'breadcrumbs'=>$breadcrumbs,
                    'type'=>$typeBreadcrumb,
                ])
            @endisset --}}
        <div class="wrap-content-main">
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
                    
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card card-outline card-primary">
                                    <div class="my-account-section-header">
                                        <div class="my-account-header-title">
                                            <div class="my-account-header-titletop">Sổ địa chỉ</div>
                                            <div class="my-account-header-subtitle">Bạn có thể tạo tối đa 15 địa chỉ.</div>
                                        </div>
                                        @if(14>$addressOfUser->count())
                                        <div class="my-account-header-button">
                                            <div class="my-account-header-submit" onclick="showFormAddressAdd()">
                                                <svg _ngcontent-vuahanghieu-app-c6="" fill="currentColor" height="20" style="margin-right: 6px" viewBox="0 0 16 16" width="20" xmlns="http://www.w3.org/2000/svg">
                                                    <path _ngcontent-vuahanghieu-app-c6="" d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"></path>
                                                </svg> Thêm mới
                                            </div>
                                        </div>
                                        @else
                                        <div class="my-account-header-button">
                                            <div class="my-account-header-submit">
                                                Đã tối đa địa chỉ
                                            </div>
                                        </div>
                                        @endif

                                    </div>
                                    <div class="card-body table-responsive">
                                        @if($addressAll)
                                            @if($addressOfUserFirst)
                                            <div class="customer-address item-default">
                                                <div class="frist-col">
                                                    <div class="address_kn">
                                                        <strong class="js__name">{{ $addressOfUserFirst->name }}</strong>
                                                        <div class="add-is-default">
                                                            <svg fill="currentColor" height="12" viewBox="0 0 16 16" width="12" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"></path>
                                                                <path d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z"></path>
                                                            </svg> Địa chỉ mặc định
                                                        </div>
                                                    </div>
                                                    <div class="address-box">
                                                        <a class="address-button address-upgrade lb-address" data-url="{{route('profile.form.edit.adddress',['id'=>$addressOfUserFirst->id])}}">Chỉnh sửa</a>
                                                    </div>
                                                </div>

                                                <div class="item-address_box">
                                                    <div class="item-address">
                                                        <div class="item-address-row">
                                                            <div class="js__address">{{ $addressOfUserFirst->address_detail }} , {{ $addressOfUserFirst->commune->name }}, {{ $addressOfUserFirst->district->name }}, {{ $addressOfUserFirst->city->name }}</div>
                                                        </div>
                                                        <div class="item-address-row">
                                                            <span class="js__tel">{{ $addressOfUserFirst->phone }}</span>
                                                        </div>
                                                    </div>

                                                </div>
                                                
                                            </div>
                                            @endif
                                            
                                            @if($addressOfUser && $addressOfUser->count()>0)
                                                @foreach($addressOfUser as $item)
                                                <aside class="customer-address item-default">
                                                    <div class="frist-col">
                                                        <div class="address_kn">
                                                            <strong class="js__name">{{ $item->name }}</strong>
                                                        </div>
                                                        <div class="address-box">
                                                            <a class="address-button address-upgrade lb-address" data-url="{{route('profile.form.edit.adddress',['id'=>$item->id])}}">Chỉnh sửa</a>
                                                            <a data-url="{{route('profile.destroy.address',['id'=>$item->id])}}" class="address-button address-upgrade lb_delete">Xoá</a>
                                                        </div>
                                                    </div>

                                                    <div class="item-address_box">
                                                        <div class="item-address">
                                                            <div class="item-address-row">
                                                            <div class="js__address">{{ $item->address_detail }} , {{ $item->commune->name }}, {{ $item->district->name }}, {{ $item->city->name }}</div>
                                                            </div>
                                                            <div class="item-address-row">
                                                                <span class="js__tel">{{ $item->phone }}</span>
                                                            </div>
                                                        </div>
                                                        <div class="address_ub">
                                                            <a class="address-chane" href="{{ route('profile.load.default.adddress',['id'=>$item->id]) }}">Thiết lập mặc định</a> 
                                                        </div>
                                                    </div>
                                                    
                                                </aside>
                                                @endforeach
                                            @endif
                                        @else
                                        <div class="profile-row" style="margin-top: 20px;"> Bạn chưa có địa chỉ nào. Hãy thêm một địa chỉ mới. </div>
                                        @endif
                                    </div>
                                    <div id="form-edit">

                                    </div>
                                    <div class="add-new-address-wrapper" id="js_add-new-address-wrapper-add">
                                        <form  action="{{ route('profile.storeAddress') }}"  data-url="{{ route('profile.storeAddress') }}" data-ajax="submit" data-target="alert" data-href="#modalAjax" data-content="#content" data-method="POST" method="POST">
                                        @csrf
                                            <div class="add-new-address-content">
                                                <span class="close-address-popup" onclick="showFormAddressAdd()">
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
                                                        <input type="text" name="name" class="address-input" required>
                                                    </div>
                                                    <div class="address-row has2col">
                                                        <div class="address-rowcol">
                                                            <label for="">
                                                                Số điện thoại
                                                                <sup>*</sup>
                                                            </label>
                                                            <input type="tel" name="phone" pattern="^(0|\+84)[35789][0-9]{8}$" class="address-input" required>
                                                        </div>
                                                        <div class="address-rowcol">
                                                            <label for="">
                                                                Email
                                                                <sup>*</sup>
                                                            </label>
                                                            <input type="email" name="email" pattern="^\w+([\-\.]?\w+)*@\w+([\-\.]?\w+)*(\.\w{2,3})$" class="address-input" required>
                                                        </div>
                                                    </div>
                                                    <div class="address-row has3col">
                                                        <div class="address-rowcol">
                                                            <label for="">
                                                                Tỉnh / Thành phố
                                                                <sup>*</sup>
                                                            </label>

                                                            <select class="address-input @error('city_id') is-invalid   @enderror" data-url="{{ route('ajax.address.districts') }}" name="city_id" id="city" required>
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
                                                            <select class="address-input @error('district_id') is-invalid   @enderror" name="district_id" id="district" data-url="{{ route('ajax.address.communes') }}" required>
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
                                                            <select class="address-input @error('commune_id')is-invalid   @enderror" name="commune_id" id="commune" required>
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
                                                        <input type="text" name="address_detail" class="address-input @error('address_detail')is-invalid   @enderror" placeholder="Số nhà, ngõ, ngách, thôn, xóm...">
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
                                    
                                    @php
                                    $modelCate = new App\Models\CategoryPost;
                                    $chinhsach = $modelCate->where('active',1)->find(98);
                                    @endphp
                                    <div class="cskh">
                                        @if(isset($chinhsach) && $chinhsach->count()>0 )
                                        <a href="{{ $chinhsach->slug_full }}">Chính sách khách hàng</a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
<script src="{{ asset('frontend/js/load-address.js') }}"></script>
<script>
    $(function() {
        // js load image khi upload
        $(document).on('change', '.img-load-input', function() {
            let input = $(this);
            displayImage(input, '.wrap-load-image', '.img-load');
        });

        function displayImage(input, selectorWrap, selectorImg) {
            let img = input.parents(selectorWrap).find(selectorImg);
            let file = input.prop('files')[0];
            let reader = new FileReader();

            reader.addEventListener("load", function() {
                // convert image file to base64 string
                img.attr('src', reader.result);
            }, false);

            if (file) {
                reader.readAsDataURL(file);
            }
        }
    });

    function activeChangeAddres() {
        const profile_change_addres = document.querySelector('.js-profile-change-addres');
        const change_address_icon = profile_change_addres.querySelector('.change-address-icon');

        // Kiểm tra trạng thái hiện tại của checkbox
        const isActive = change_address_icon.classList.contains('active');

        // Đảo ngược trạng thái của checkbox
        change_address_icon.classList.toggle('active', !isActive);

        var defaultAddressInput = document.getElementById('defaultAddressInput');

        // Nếu checkbox đã chọn, xóa giá trị của phần tử input hidden
        if (isActive) {
            defaultAddressInput.value = "";
        } else {
            // Nếu checkbox chưa chọn, đặt giá trị cho phần tử input hidden thành 1
            defaultAddressInput.value = "1";
        }
    }

    function showFormAddressAdd() {
        document.querySelector('#js_add-new-address-wrapper-add').classList.toggle('active')
    }
    function showFormAddressEdit() {
        document.querySelector('#js_add-new-address-wrapper-edit').classList.toggle('active')
    }
</script>
<script>
    $(document).on("click", ".lb_delete", actionDelete);
    function actionDelete(event) {
    event.preventDefault();
    let urlRequest = $(this).data("url");
    let mythis = $(this);
    Swal.fire({
        title: 'Bạn có chắc chắn muốn xóa',
        text: "Bạn sẽ không thể khôi phục điều này",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: "GET",
                url: urlRequest,
                success: function(data) {
                    if (data.code == 200) {

                        mythis.parents("aside").remove();
                    }
                },
                error: function() {

                }
            });
            // Swal.fire(
            // 'Deleted!',
            // 'Your file has been deleted.',
            // 'success'
            // )
        }
    })
}
</script>
<script>
    $(document).on('click', '.lb-address', function() {
        event.preventDefault();
        let formEdit = $('#form-edit');
        let urlRequest = $(this).data("url");
        let value = $(this).data("value");
        let type = $(this).data("type");
        let title = '';
        console.log(formEdit);
        // Swal.fire({
        //     title: title,
        //     icon: 'warning',
        //     showCancelButton: true,
        //     confirmButtonColor: '#3085d6',
        //     cancelButtonColor: '#d33',
        //     confirmButtonText: 'Yes, next step!'
        // }).then((result) => {
            // if (result.isConfirmed) {
                $.ajax({
                    type: "GET",
                    url: urlRequest,
                    success: function(data) {
                        if (data.code == 200) {
                            let html = data.html;
                            formEdit.html(html);
                            showFormAddressEdit();
                        }
                    }
                });
            // }
        // })
    });
</script>
@endsection