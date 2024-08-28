@extends('frontend.layouts.main')
@section('title', 'Lấy lại mật khẩu')
@section('content')
<style>
    body {
        font-family: 'Open Sans', sans-serif;
        background-color: #fff!important;
    }
    @import url('https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;0,800;1,300;1,400;1,600;1,700;1,800&display=swap');
    .box_container {
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 30px 0;
    }
    .card-header {
        text-align: left;
        text-transform:uppercase;
        font-weight: 700;
        font-size: 20px;
    }
    .navbar-brand {
        font-size: 25px;
        font-weight:700; 
    }
    .container {
    }
    .card {
        background: #eee;
    }
    .card-header {
        background: #0d6b41;
        text-align: center;
        color: #fff;
    }
    .card-body .dang_ky{
        width: 100%;
        margin-top: 15px;
        text-align: center;
        max-width: 257px;
    }
    .card-body .dang_ky a{
        color: #007bff;
    }
    .navbar-light .navbar-brand {
        color: #0d6b41
    }
    label:not(.form-check-label):not(.custom-file-label) {
        font-weight: 600;
    }
    .btn-primary {
        background: #0d6b41;
        border: 0;
        padding: 5px 20px;
    }
    .btn-link {
        font-weight: 400;
        color: #0d6b41;
        font-size: 15px;
        text-decoration: none;
    }
</style>
<div class="box_container">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Lấy lại mật khẩu') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('password.update') }}">
                            @csrf

                            <input type="hidden" name="token" value="{{ $token }}">

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Email đăng ký') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Mật khẩu mới') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Nhập lại mật khẩu mới') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Thay đổi') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
