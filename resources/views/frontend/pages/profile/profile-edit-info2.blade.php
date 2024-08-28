@extends('frontend.layouts.main-profile')

@section('title', $seo['title'] ?? '' )
@section('keywords', $seo['keywords']??'')
@section('description', $seo['description']??'')
@section('abstract', $seo['abstract']??'')
@section('image', $seo['image']??'')
@section('css')
    <style>
        #sidebar-profile .nav-pills{
            background-color: #17a2b8;
        }

        #sidebar-profile nav .nav-item a{
            color: #fff;
            padding: 5px 14px;
            font-size: 14px;
        }
        .box-check-radio{
            float: right;
            line-height:normal;
        }
        .box-check-item {
           
            height: 30px;
            line-height: 30px;
            border: 1px solid #888;
            text-align: center;
            border-radius: 4px;
            width: 90px;
        }
        .box-check-item select{
            height:auto;
        }
        .box-check-item label{
            font-size: 15px;
        }
        .form-control{
            display:inline-block;

            border:none;
            
        }
        textarea.form-control{
            padding: 1.375rem 0.75rem;
        }
        .form-group{margin-bottom:20px}
        .form-control:focus{
            border:none;
            box-shadow:unset;
        }
        .table-responsive{
            overflow-x:unset;
            border-radius:14px;
            padding:8px 14px;
        }
        .gender{
            display:inline-block;
            width:100%
        }
        hr {
        margin: 30px 0;
        width: 50%;
        background: #000;
        height: 1px;
        border: none;
        }
        .tab-cart-items{
            margin-bottom:10px;
        }
        .card-header{
            padding:0;
        }
        .tab-step-cart{
            top:-7px
        }

        @media (max-width: 550px){
            .table-responsive {
                border-radius: 8px;
                padding: 20px 14px;
            }

            .box-check-radio{
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
                        <form action="{{route('profile.updateInfo',['id'=>$data->id])}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card card-outline card-primary">
                                        {{--<div class="card-header">
                                            <h3 class="card-title">Tài khoản của tôi</h3>
                                            <div class="tab-step-cart">
                                                <ul class="tab-cart-items">
                                                    <li class="tab-cart-item active" onclick="openTab('Tab1')" data-id="Tab1">
                                                        <a href="{{route('profile.editInfo')}}" class="tab-cart-link">
                                                            <span>Hồ sơ</span>
                                                        </a>
                                                    </li>
                                                    <li class="tab-cart-item" onclick="openTab('Tab2')" data-id="Tab2">
                                                        <a href="{{asset('profile/change-password')}}" class="tab-cart-link">
                                                            <span>Đổi mật khẩu</span>
                                                        </a>
                                                    </li>
                                                    <li class="tab-cart-item" onclick="openTab('Tab3')" data-id="Tab3">
                                                        <a href="{{route('profile.history')}}" class="tab-cart-link">
                                                            <span>Lịch sử mua hàng</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>--}}
                                        <div class="card-body table-responsive">

                                            <div class="row">
                                                <div class="col-md-12 col-card-body">
                                                    <div class="card-body-text">
                                                        AKI luôn luôn mang đến cho khách hàng sản phẩm và dịch vụ tốt nhất
                                                    </div>
                                                </div>
                                                <div class="col-md-1"></div>
                                                <div class="col-md-9">
                                                    {{--
                                                    <div class="wrap-load-image mb-3">
                                                        <div class="form-group">
                                                            <label for="">Ảnh đại diện</label>
                                                            <input type="file" class="form-control-file img-load-input border" id="" name="avatar_path">
                                                        </div>
                                                        @error('avatar_path')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror
                                                        <img class="img-load border p-1 w-100" src="{{$data->avatar_path?$data->avatar_path:$shareFrontend['userNoImage']}}" alt="{{$data->name}}" style="height: auto;width:auto;max-width:150px;object-fit:cover;">
                                                    </div>
                                                    --}}
                                                    <div class="form-group">
                                                        <label for="">Họ tên</label>
                                                        <div class="box-form-control">
                                                            <input type="text" class="form-control @error('name') is-invalid @enderror" value="{{old('name')?? $data->name }}" name="name" >
                                                        </div>
                                                        @error('name')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="">Email</label>
                                                        <div class="box-form-control">
                                                            <input type="text" class="form-control @error('email') is-invalid @enderror"  value="{{old('email')?? $data->email }}"
                                                                name="email" placeholder="Email">
                                                        </div>
                                                        @error('email')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Số điện thoại</label>
                                                        <div class="box-form-control">
                                                            <input type="text" class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone')?? $data->phone }}" name="phone" placeholder="Số điện thoại">
                                                        </div>
                                                        @error('phone')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                    {{--
                                                    <div class="form-group">
                                                        <label for="">Tài khoản</label>
                                                        <input type="text" class="form-control  @error('username') is-invalid @enderror"
                                                        {{ $data->status==1? '':'disabled'}}
                                                        value="{{old('username')?? $data->username }}" name="username" placeholder="username">
                                                        @error('username')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                    --}}
                                                    <div class="form-group">
                                                        <label for="">Địa chỉ</label>
                                                        <div class="box-form-control">
                                                            <input type="text" class="form-control  @error('address') is-invalid @enderror" value="{{old('address')?? $data->address }}" name="address">
                                                        </div>
                                                        @error('address')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                    {{--
                                                    <div class="form-group">
                                                        <div class="form-check-inline">
                                                            <label class="form-check-label">
                                                                <input type="radio" class="form-check-input" value="1" name="sex" @if((old('sex')?? $data->sex)=="1"||$data->sex==null) {{'checked'}} @endif>Nam
                                                            </label>
                                                        </div>
                                                        <div class="form-check-inline">
                                                            <label class="form-check-label">
                                                                <input type="radio" class="form-check-input" value="0" @if( (old('sex')?? $data->sex)=="0"){{'checked'}} @endif name="sex">Nữ
                                                            </label>
                                                        </div>
                                                        @error('sex')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Ngày sinh</label>
                                                        <input type="date" class="form-control  @error('date_birth') is-invalid @enderror"
                                                        {{ $data->status==1? '':'disabled'}}
                                                        value="{{ old('date_birth')?? $data->date_birth }}" name="date_birth" placeholder="Ngày sinh">
                                                        @error('date_birth')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                    --}}
                                                    <div class="gender">
                                                        <label class="label-gender">Giới tính:</label>
                                                        <div class="box-check-radio">
                                                            <div class="box-check-item">
                                                                <input type="radio" value="2" name="sex" @if((old('sex')?? $data->sex)=="1"||$data->sex==null) {{'checked'}} @endif>
                                                                <label>Nam</label>
                                                            </div>
                                                            <div class="box-check-item">
                                                                <input type="radio" value="1" name="sex" @if( (old('sex')?? $data->sex)=="0"){{'checked'}} @endif>
                                                                <label>Nữ</label>
                                                            </div>
                                                            <div class="box-check-item">
                                                                <input type="radio" value="0" name="sex" @if( (old('sex')?? $data->sex)=="2"){{'checked'}} @endif>
                                                                <label>Khác</label>
                                                            </div>
                                                        </div>
                                                    </div>
    <div class="gender">
        <label class="label-gender">Ngày sinh:</label>
        <div class="box-check-radio">
            <div class="box-check-item">
                <select name="day">
                    <option value="1" @if(Carbon::parse($data->date_birth)->format('d') == 1) selected @endif>1</option>
                    <option value="2" @if(Carbon::parse($data->date_birth)->format('d') == 2) selected @endif>2</option>
                    <option value="3" @if(Carbon::parse($data->date_birth)->format('d') == 3) selected @endif>3</option>
                    <option value="4" @if(Carbon::parse($data->date_birth)->format('d') == 4) selected @endif>4</option>
                    <option value="5" @if(Carbon::parse($data->date_birth)->format('d') == 5) selected @endif>5</option>
                    <option value="6" @if(Carbon::parse($data->date_birth)->format('d') == 6) selected @endif>6</option>
                    <option value="7" @if(Carbon::parse($data->date_birth)->format('d') == 7) selected @endif>7</option>
                    <option value="8" @if(Carbon::parse($data->date_birth)->format('d') == 8) selected @endif>8</option>
                    <option value="9" @if(Carbon::parse($data->date_birth)->format('d') == 9) selected @endif>9</option>
                    <option value="10" @if(Carbon::parse($data->date_birth)->format('d') == 10) selected @endif>10</option>
                    <option value="11" @if(Carbon::parse($data->date_birth)->format('d') == 11) selected @endif>11</option>
                    <option value="12" @if(Carbon::parse($data->date_birth)->format('d') == 12) selected @endif>12</option>
                    <option value="13" @if(Carbon::parse($data->date_birth)->format('d') == 13) selected @endif>13</option>
                    <option value="14" @if(Carbon::parse($data->date_birth)->format('d') == 14) selected @endif>14</option>
                    <option value="15" @if(Carbon::parse($data->date_birth)->format('d') == 15) selected @endif>15</option>
                    <option value="16" @if(Carbon::parse($data->date_birth)->format('d') == 16) selected @endif>16</option>
                    <option value="17" @if(Carbon::parse($data->date_birth)->format('d') == 17) selected @endif>17</option>
                    <option value="18" @if(Carbon::parse($data->date_birth)->format('d') == 18) selected @endif>18</option>
                    <option value="19" @if(Carbon::parse($data->date_birth)->format('d') == 19) selected @endif>19</option>
                    <option value="20" @if(Carbon::parse($data->date_birth)->format('d') == 20) selected @endif>20</option>
                    <option value="21" @if(Carbon::parse($data->date_birth)->format('d') == 21) selected @endif>21</option>
                    <option value="22" @if(Carbon::parse($data->date_birth)->format('d') == 22) selected @endif>22</option>
                    <option value="23" @if(Carbon::parse($data->date_birth)->format('d') == 23) selected @endif>23</option>
                    <option value="24" @if(Carbon::parse($data->date_birth)->format('d') == 24) selected @endif>24</option>
                    <option value="25" @if(Carbon::parse($data->date_birth)->format('d') == 25) selected @endif>25</option>
                    <option value="26" @if(Carbon::parse($data->date_birth)->format('d') == 26) selected @endif>26</option>
                    <option value="27" @if(Carbon::parse($data->date_birth)->format('d') == 27) selected @endif>27</option>
                    <option value="28" @if(Carbon::parse($data->date_birth)->format('d') == 28) selected @endif>28</option>
                    <option value="29" @if(Carbon::parse($data->date_birth)->format('d') == 29) selected @endif>29</option>
                    <option value="30" @if(Carbon::parse($data->date_birth)->format('d') == 30) selected @endif>30</option>
                    <option value="31" @if(Carbon::parse($data->date_birth)->format('d') == 31) selected @endif>31</option>
                </select>
            </div>
            <div class="box-check-item">
                <select name="month">
                    <option value="1" @if(Carbon::parse($data->date_birth)->format('m') == 1) selected @endif>Tháng 1</option>
                    <option value="2" @if(Carbon::parse($data->date_birth)->format('m') == 2) selected @endif>Tháng 2</option>
                    <option value="3" @if(Carbon::parse($data->date_birth)->format('m') == 3) selected @endif>Tháng 3</option>
                    <option value="4" @if(Carbon::parse($data->date_birth)->format('m') == 4) selected @endif>Tháng 4</option>
                    <option value="5" @if(Carbon::parse($data->date_birth)->format('m') == 5) selected @endif>Tháng 5</option>
                    <option value="6" @if(Carbon::parse($data->date_birth)->format('m') == 6) selected @endif>Tháng 6</option>
                    <option value="7" @if(Carbon::parse($data->date_birth)->format('m') == 7) selected @endif>Tháng 7</option>
                    <option value="8" @if(Carbon::parse($data->date_birth)->format('m') == 8) selected @endif>Tháng 8</option>
                    <option value="9" @if(Carbon::parse($data->date_birth)->format('m') == 9) selected @endif>Tháng 9</option>
                    <option value="10" @if(Carbon::parse($data->date_birth)->format('m') == 10) selected @endif>Tháng 10</option>
                    <option value="11" @if(Carbon::parse($data->date_birth)->format('m') == 11) selected @endif>Tháng 11</option>
                    <option value="12" @if(Carbon::parse($data->date_birth)->format('m') == 12) selected @endif>Tháng 12</option>
                </select>
            </div>
            <div class="box-check-item">
                <select name="year">
                    <option value="1950" @if(Carbon::parse($data->date_birth)->format('Y') == 1950) selected @endif>1950</option>
                    <option value="1951" @if(Carbon::parse($data->date_birth)->format('Y') == 1951) selected @endif>1951</option>
                    <option value="1952" @if(Carbon::parse($data->date_birth)->format('Y') == 1952) selected @endif>1952</option>
                    <option value="1953" @if(Carbon::parse($data->date_birth)->format('Y') == 1953) selected @endif>1953</option>
                    <option value="1954" @if(Carbon::parse($data->date_birth)->format('Y') == 1954) selected @endif>1954</option>
                    <option value="1955" @if(Carbon::parse($data->date_birth)->format('Y') == 1955) selected @endif>1955</option>
                    <option value="1956" @if(Carbon::parse($data->date_birth)->format('Y') == 1956) selected @endif>1956</option>
                    <option value="1957" @if(Carbon::parse($data->date_birth)->format('Y') == 1957) selected @endif>1957</option>
                    <option value="1958" @if(Carbon::parse($data->date_birth)->format('Y') == 1958) selected @endif>1958</option>
                    <option value="1959" @if(Carbon::parse($data->date_birth)->format('Y') == 1959) selected @endif>1959</option>
                    <option value="1960" @if(Carbon::parse($data->date_birth)->format('Y') == 1960) selected @endif>1960</option>
                    <option value="1961" @if(Carbon::parse($data->date_birth)->format('Y') == 1961) selected @endif>1961</option>
                    <option value="1962" @if(Carbon::parse($data->date_birth)->format('Y') == 1962) selected @endif>1962</option>
                    <option value="1963" @if(Carbon::parse($data->date_birth)->format('Y') == 1963) selected @endif>1963</option>
                    <option value="1964" @if(Carbon::parse($data->date_birth)->format('Y') == 1964) selected @endif>1964</option>
                    <option value="1965" @if(Carbon::parse($data->date_birth)->format('Y') == 1965) selected @endif>1965</option>
                    <option value="1966" @if(Carbon::parse($data->date_birth)->format('Y') == 1966) selected @endif>1966</option>
                    <option value="1967" @if(Carbon::parse($data->date_birth)->format('Y') == 1967) selected @endif>1967</option>
                    <option value="1968" @if(Carbon::parse($data->date_birth)->format('Y') == 1968) selected @endif>1968</option>
                    <option value="1969" @if(Carbon::parse($data->date_birth)->format('Y') == 1969) selected @endif>1969</option>
                    <option value="1970" @if(Carbon::parse($data->date_birth)->format('Y') == 1970) selected @endif>1970</option>
                    <option value="1971" @if(Carbon::parse($data->date_birth)->format('Y') == 1971) selected @endif>1971</option>
                    <option value="1972" @if(Carbon::parse($data->date_birth)->format('Y') == 1972) selected @endif>1972</option>
                    <option value="1973" @if(Carbon::parse($data->date_birth)->format('Y') == 1973) selected @endif>1973</option>
                    <option value="1974" @if(Carbon::parse($data->date_birth)->format('Y') == 1974) selected @endif>1974</option>
                    <option value="1975" @if(Carbon::parse($data->date_birth)->format('Y') == 1975) selected @endif>1975</option>
                    <option value="1976" @if(Carbon::parse($data->date_birth)->format('Y') == 1976) selected @endif>1976</option>
                    <option value="1977" @if(Carbon::parse($data->date_birth)->format('Y') == 1977) selected @endif>1977</option>
                    <option value="1978" @if(Carbon::parse($data->date_birth)->format('Y') == 1978) selected @endif>1978</option>
                    <option value="1979" @if(Carbon::parse($data->date_birth)->format('Y') == 1979) selected @endif>1979</option>
                    <option value="1980" @if(Carbon::parse($data->date_birth)->format('Y') == 1980) selected @endif>1980</option>
                    <option value="1981" @if(Carbon::parse($data->date_birth)->format('Y') == 1981) selected @endif>1981</option>
                    <option value="1982" @if(Carbon::parse($data->date_birth)->format('Y') == 1982) selected @endif>1982</option>
                    <option value="1983" @if(Carbon::parse($data->date_birth)->format('Y') == 1983) selected @endif>1983</option>
                    <option value="1984" @if(Carbon::parse($data->date_birth)->format('Y') == 1984) selected @endif>1984</option>
                    <option value="1985" @if(Carbon::parse($data->date_birth)->format('Y') == 1985) selected @endif>1985</option>
                    <option value="1986" @if(Carbon::parse($data->date_birth)->format('Y') == 1986) selected @endif>1986</option>
                    <option value="1987" @if(Carbon::parse($data->date_birth)->format('Y') == 1987) selected @endif>1987</option>
                    <option value="1988" @if(Carbon::parse($data->date_birth)->format('Y') == 1988) selected @endif>1988</option>
                    <option value="1989" @if(Carbon::parse($data->date_birth)->format('Y') == 1989) selected @endif>1989</option>

                    <option value="1990" @if(Carbon::parse($data->date_birth)->format('Y') == 1990) selected @endif>1990</option>
                    <option value="1991" @if(Carbon::parse($data->date_birth)->format('Y') == 1991) selected @endif>1991</option>
                    <option value="1992" @if(Carbon::parse($data->date_birth)->format('Y') == 1992) selected @endif>1992</option>
                    <option value="1993" @if(Carbon::parse($data->date_birth)->format('Y') == 1993) selected @endif>1993</option>
                    <option value="1994" @if(Carbon::parse($data->date_birth)->format('Y') == 1994) selected @endif>1994</option>
                    <option value="1995" @if(Carbon::parse($data->date_birth)->format('Y') == 1995) selected @endif>1995</option>
                    <option value="1996" @if(Carbon::parse($data->date_birth)->format('Y') == 1996) selected @endif>1996</option>
                    <option value="1997" @if(Carbon::parse($data->date_birth)->format('Y') == 1997) selected @endif>1997</option>
                    <option value="1998" @if(Carbon::parse($data->date_birth)->format('Y') == 1998) selected @endif>1998</option>
                    <option value="1999" @if(Carbon::parse($data->date_birth)->format('Y') == 1999) selected @endif>1999</option>

                    <option value="2000" @if(Carbon::parse($data->date_birth)->format('Y') == 2000) selected @endif>2000</option>
                    <option value="2001" @if(Carbon::parse($data->date_birth)->format('Y') == 2001) selected @endif>2001</option>
                    <option value="2002" @if(Carbon::parse($data->date_birth)->format('Y') == 2002) selected @endif>2002</option>
                    <option value="2003" @if(Carbon::parse($data->date_birth)->format('Y') == 2003) selected @endif>2003</option>
                    <option value="2004" @if(Carbon::parse($data->date_birth)->format('Y') == 2004) selected @endif>2004</option>
                    <option value="2005" @if(Carbon::parse($data->date_birth)->format('Y') == 2005) selected @endif>2005</option>
                    <option value="2006" @if(Carbon::parse($data->date_birth)->format('Y') == 2006) selected @endif>2006</option>
                    <option value="2007" @if(Carbon::parse($data->date_birth)->format('Y') == 2007) selected @endif>2007</option>
                    <option value="2008" @if(Carbon::parse($data->date_birth)->format('Y') == 2008) selected @endif>2008</option>
                    <option value="2009" @if(Carbon::parse($data->date_birth)->format('Y') == 2009) selected @endif>2009</option>

                    <option value="2010" @if(Carbon::parse($data->date_birth)->format('Y') == 2010) selected @endif>2010</option>
                    <option value="2011" @if(Carbon::parse($data->date_birth)->format('Y') == 2011) selected @endif>2011</option>
                    <option value="2012" @if(Carbon::parse($data->date_birth)->format('Y') == 2012) selected @endif>2012</option>
                    <option value="2013" @if(Carbon::parse($data->date_birth)->format('Y') == 2013) selected @endif>2013</option>
                    <option value="2014" @if(Carbon::parse($data->date_birth)->format('Y') == 2014) selected @endif>2014</option>
                    <option value="2015" @if(Carbon::parse($data->date_birth)->format('Y') == 2015) selected @endif>2015</option>
                    <option value="2016" @if(Carbon::parse($data->date_birth)->format('Y') == 2016) selected @endif>2016</option>
                    <option value="2017" @if(Carbon::parse($data->date_birth)->format('Y') == 2017) selected @endif>2017</option>
                    <option value="2018" @if(Carbon::parse($data->date_birth)->format('Y') == 2018) selected @endif>2018</option>
                    <option value="2019" @if(Carbon::parse($data->date_birth)->format('Y') == 2019) selected @endif>2019</option>
                    <option value="2020" @if(Carbon::parse($data->date_birth)->format('Y') == 2020) selected @endif>2020</option>
                    <option value="2021" @if(Carbon::parse($data->date_birth)->format('Y') == 2021) selected @endif>2021</option>
                    <option value="2022" @if(Carbon::parse($data->date_birth)->format('Y') == 2022) selected @endif>2022</option>
                </select>
            </div>
            
        </div>
    </div>
                                                    <hr></hr>
                                                    
                                                    {{--
                                                    <div class="form-group">
                                                        <label for="">Hộ khẩu thường trú</label>
                                                        <input type="text" class="form-control  @error('hktt') is-invalid @enderror"
                                                        {{ $data->status==1? '':'disabled'}}
                                                        value="{{ old('hktt')?? $data->hktt }}" name="hktt" placeholder="Hộ khẩu thường trú">
                                                        @error('hktt')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Chứng minh thư</label>
                                                        <input type="text" class="form-control @error('cmt') is-invalid @enderror"
                                                        {{ $data->status==1? '':'disabled' }}
                                                        value="{{  old('cmt')?? $data->cmt }}" name="cmt" placeholder="Chứng minh thư">
                                                        @error('cmt')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                    --}}

                                                    <div class="form-group">
                                                        <button type="submit" class="btn btn-primary">Cập nhật</button>
                                                        <button type="reset" class="btn btn-danger">Làm lại</button>
                                                    </div>
                                                    
                                                </div>
                                                <div class="col-md-2"></div>
                                                
                                            </div>
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
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
<script>

   $(function(){
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

</script>
@endsection
