@extends('frontend.layouts.main')
@section('title', 'Đăng nhập')

@section('content')
<style>
	body {
		font-family: 'Open Sans', sans-serif;
		background-color: #fff!important;
	}

	.header{
		display: none;
	}

	.footer{
		display: none;
	}

	.box_container {
		display: flex;
		align-items: center;
		justify-content: center;
		padding: 30px 0;
		background: #eeeeee;
		/* height: calc(100vh - 66px); */
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
		font-family: 'MarkPro';
		text-align: center;
		width: 168px;
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
	    padding: 9px 0 8px;
	    padding-left: 1.25rem;
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
	.form-control:focus {
		border: none;
		box-shadow: unset;
	}

	.header_login{

		padding: 10px 0;width: 100%;}

	.header_login .box_content{

		display: flex;align-items: center;justify-content: center;

	}

	.header_login .logo_login{

	display: inline-block;padding: 0 10px;background-color: #000;border-radius: 6px;}

	.box_content .logo_login img{

	height: 46px;}

	.box_content .label_title_login{

	display: inline-block;margin-left: 40px;font-size: 30px;}

	.btn-primary{
		margin: 40px auto 0;
		display: block;
	}

	.id_form{
		display: none;
	}

	.id_form.active{
		display: block;
	}

	@media (min-width: 1440px){
		.header_login{
			padding: 15px 0;
		}

		.box_container{
			padding: 120px 0;
		}

		.form-check {
		    font-size: 13px;
		    padding: 13px 0;
		    padding-left: 1.25rem;
		}

		.login-with {
		    height: 56px;
		    line-height: 56px;
		    width: 399px;
		}

		.login-with-img img{
			width: 47px;
		}

		.box_container .form-control{
			height: 50px;
			font-size: 20px;
		}

		.box_container .btn-primary{

		}

		.btn-primary {
		    background: #fba200;
		    border: 0;
		    padding: 13px 40px;
		    font-size: 18px;
		    text-transform: uppercase;
		}

		.form-check-label{
			font-size: 16px;
		}

		.card{
			padding: 20px 10%;
			border-radius: 15px;
		}

		.card-header p{
			font-size: 30px;
			width: 230px;
		}

		.login-with-fb-gg{
			margin-top: 60px;
		}

		.login-with{
			margin: 19px auto;
		}
	}
	@media(max-width:440px){
		.header_login .box_content{
			display:block;
			text-align:center;
		}
		.box_content .label_title_login{
			font-size:35px;
			margin-left:0
		}
		.login-with-img img{
			font-size:32px;
		}
		.login-with-text{
			height:40px;
			line-height:40px;
			font-size:10px;
		}
		.card-header{
			display:flex;
			justify-content:space-around;
		}
		.card-header p{
			padding:1px 5px;
			width: auto;
			font-size:16px;
		}
		
	}
</style>

<div class="header_login">
	<div class="container">
		<div class="row">
			<div class="col-sm-12 col-12">
				<div class="box_content">
					<div class="logo_login">
						<a href="{{ makeLink('home') }}">
							<img src="{{ asset('frontend/images/logo_1.png')}}" alt="logo">
						</a>
					</div>
					<div class="label_title_login">
						Đăng nhập tài khoản AKITECH
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="box_container">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-6">
				<div class="card">
					{{-- <div class="card-header">{{ __('Login') }}</div> --}}
					<div class="card-header">
						<p style="cursor: pointer;" class="tab-login" onclick="window.location.href='{{ route('register') }}'" data-form="register"><a >Đăng Ký</a></p>
						<p style="cursor: pointer;" class="tab-login active" onclick="window.location.href='{{ route('login') }}'" data-form="login">Đăng Nhập</p>
					</div>
					
					<div class="card-body">
						
						<div id="login" class="id_form active">
							@isset($url)
							<form method="POST" action='{{ url("login/$url") }}' aria-label="{{ __('Login') }}">
							@else
							<form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
							@endisset
							{{-- <form method="POST" action="{{ route('login') }}"> --}}
								@csrf

								@if(session('error'))
								<div class="alert alert-warning">
								{{session("error")}}
								</div>
								@endif
								@if ($errors->any())
									<div class="alert alert-danger">
										<ul>
											@foreach ($errors->all() as $error)
												<li>{{ $error }}</li>
											@endforeach
										</ul>
									</div>
								@endif

								<div class="form-group row">
									<div class="col-md-12">
										<input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus placeholder="Tài khoản">
										@error('username')
											<span class="invalid-feedback" role="alert">
												<strong>{{ $message }}</strong>
											</span>
										@enderror
									</div>
								</div>

								<div class="form-group row">
									<div class="col-md-12">
										<input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Mật khẩu">
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
											<input class="form-check-input" type="radio" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
											<label class="form-check-label" for="remember">
												Ghi ID của tôi
											</label>
										</div>
									</div>
								</div>

								<div class="form-group row mb-0">
									<div class="col-md-12 {{-- offset-md-4 --}}">
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
										<a href="{{ route('login.facebook') }}">
											<div class="login-with-img">
												<img src="../frontend/images/login-01.png" alt="">
											</div>
											<div class="login-with-text">
												
												Đăng nhập bằng facebook
											</div>
										</a>
									</div>
									{{--
									<div class="login-with">
										<a href="{{ route('login.google') }}">
											<div class="login-with-img">
												<img src="../frontend/images/login-02.png" alt="">
											</div>
											<div class="login-with-text">
												Đăng nhập bằng Google
											</div>
										</a>
									</div>
									--}}
								</div>
									
							</form>
						</div>
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
    {{-- <script>
        
        $(document).on('click','.tab-cart-item', function(){
            let id = $(this).data('id');
            $('.tab-cart-item').removeClass('active');
            $(this).addClass('active');

            $('.tab').removeClass('active');
            $('#'+id).addClass('active');
        })


        $(document).on('click','.tab-login', function(){
            let form = $(this).data('form');
            $('.tab-login').removeClass('active');
            $(this).addClass('active');

            $('.id_form').removeClass('active');
            $('#'+form).addClass('active');
        })

        
    </script> --}}
</div>
@endsection
