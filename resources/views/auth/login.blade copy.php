@extends('frontend.layouts.main')
@section('title', 'Đăng nhập')

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
		background: #eeeeee
	}
	.card-header {
		text-align: center;
		text-transform:none;
		font-size: 18px;
		background: #fff;
		border: none
	}
	.navbar-brand {
		font-size: 25px;
		font-weight:700; 
	}
	.container {
	}
	.card {
		background: #fff;
		border: none;
		padding: 20px 10%;
	}
	.card-header p {
		display: inline-block;
		font-size: 18px;
		font-weight: 400;
		padding: 5px 30px;
	}
	.card-header .active {
		background: #fba200;
		border-top-left-radius:5px; 
		border-top-right-radius:5px;
		color: #333;
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
		color: #c01d25
	}
	label:not(.form-check-label):not(.custom-file-label) {
		font-weight: 600;
	}
	.btn-primary {
		background: #c01d25;
		border: 0;
		padding: 5px 20px;
	}
	.btn-link {
		font-weight: 400;
		color: #c01d25;
		font-size: 15px;
		text-decoration: none;
	}
	.form-check {
		font-size: 13px;
		padding-top: 5px;
	}
	.form-check input {
		font-size: 12px;
	}
	.btn-primary {
		background: #fba200;
		border: 0;
		padding: 10px 30px;
		text-transform: uppercase;
	}
</style>
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
        background: #000;
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
        color: #c01d25;
    }
    .navbar-light .navbar-brand {
        color: #c01d25
    }
    label:not(.form-check-label):not(.custom-file-label) {
        font-weight: 600;
    }
    .btn-primary {
        background: #c01d25;
        border: 0;
        padding: 5px 20px;
    }
    .btn-link {
        font-weight: 400;
        color: #c01d25;
        font-size: 15px;
        text-decoration: none;
    }
</style>
<div class="box_container">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-6">
				<div class="card">
					{{-- <div class="card-header">{{ __('Login') }}</div> --}}
					<div class="card-header">
						<p class="tab-login active"><a >Đăng Ký</a></p>
						<p class="tab-login ">Đăng Nhập</p>
					</div>
					
					<div class="card-body">
						@isset($url)
						<form method="POST" action='{{ url("login/$url") }}' aria-label="{{ __('Login') }}">
						@else
						<form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
						@endisset
						{{-- <form method="POST" action="{{ route('login') }}"> --}}
							@csrf

							<div class="form-group row">
								<div class="col-md-12">
									<input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>
									@error('username')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
									@enderror
								</div>
							</div>

							<div class="form-group row">
								<div class="col-md-12">
									<input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
									@error('password')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
									@enderror
								</div>
							</div>

							<div class="form-group row">
								<div class="col-md-12 offset-md-12">
									<div class="form-check">
										<input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
										<label class="form-check-label" for="remember">
											Ghi nhớ đăng nhập
										</label>
									</div>
								</div>
							</div>

							<div class="form-group row mb-0">
								<div class="col-md-8 offset-md-4">
									<button type="submit" class="btn btn-primary">
										Đăng nhập
									</button>

									{{--@if (Route::has('password.request'))
										<a class="btn btn-link" href="{{ route('password.request') }}">
											Quên mật khẩu?
										</a>
									@endif--}}
								</div>
								{{--
								<div class="col-md-8 offset-md-4">
									<div class="dang_ky">
										Nếu bạn chưa có tài khoản vui lòng đăng ký <a href="{{ route('register') }}">tại đây</a>
									</div>
								</div>
								--}}
								
							</div>
							<div class="login-with-fb-gg">
								<div class="login-with">
									<div class="login-with-img">
										<img src="../frontend/images/login-01.png" alt="">
									</div>
									<div class="login-with-text">
										Đăng nhập bằng facebook
									</div>
								</div>
								<div class="login-with">
									<div class="login-with-img">
										<img src="../frontend/images/login-02.png" alt="">
									</div>
									<div class="login-with-text">
										Đăng nhập bằng Google
									</div>
								</div>

								
							</div>
								
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script>
        function openTab(tabName) {
        var i;
        var x = document.getElementsByClassName("tab");
        for (i = 0; i < x.length; i++) {
            x[i].style.display = "none";  
        }
        document.getElementById(tabName).style.display = "block";  
        }
    </script>
    <script>
        
        $(document).on('click','.tab-cart-item', function(){
            let id = $(this).data('id');
            $('.tab-cart-item').removeClass('active');
            $(this).addClass('active');

            $('.tab').removeClass('active');
            $('#'+id).addClass('active');
        })
    </script>
</div>
@endsection
