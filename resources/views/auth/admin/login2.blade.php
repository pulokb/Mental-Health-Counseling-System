<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
	<title>Admin Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="{{asset('admin_login_page/images/icons/favicon.ico')}}" />
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('admin_login_page/vendor/bootstrap/css/bootstrap.min.css')}}">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css"
		href="{{asset('admin_login_page/fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css"
		href="{{asset('admin_login_page/fonts/iconic/css/material-design-iconic-font.min.css')}}">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('admin_login_page/vendor/animate/animate.css')}}">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css"
		href="{{asset('admin_login_page/vendor/css-hamburgers/hamburgers.min.css')}}">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css"
		href="{{asset('admin_login_page/vendor/animsition/css/animsition.min.css')}}">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('admin_login_page/vendor/select2/select2.min.css')}}">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css"
		href="{{asset('admin_login_page/vendor/daterangepicker/daterangepicker.css')}}">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('admin_login_page/css/util.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('admin_login_page/css/main.css')}}">
	<!--===============================================================================================-->
</head>

<body>

	<div class="limiter">
		<div class="container-login100"
			style="background-image: url('{{asset("admin/login_page/images/bg-01.jpg")}}');">
			<div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">
				{{-- @include('includes.message') --}}
				<form class="login100-form validate-form" method="POST" action="{{route('login')}}">
					@csrf
					<span class="login100-form-title p-b-49">
						Login
					</span>
					<div class="wrap-input100 validate-input m-b-23" data-validate="Username is reauired">
						<span class="label-input100">Username</span>
						<input class="input100" type="text" name="email" placeholder="Type your email"
							value="{{ old('email') }}" required autocomplete="email" autofocus>
						<span class="focus-input100" data-symbol="&#xf206;"></span>

					</div>
					@error('email')
					<span style="color:red">{{ $message }}</span>
					@enderror

					<div class="wrap-input100 validate-input" data-validate="Password is required">
						<span class="label-input100">Password</span>
						<input class="input100" type="password" name="password" required autocomplete="current-password"
							placeholder="Type your password">
						<span class="focus-input100" data-symbol="&#xf190;"></span>
					</div>

					@error('password')
					<span style="color:red">{{ $message }}</span>
					@enderror
					<br>

					<div class="text-left p-t-8 p-b-31">
						<input class="form-check-input" type="checkbox" name="remember" id="remember"
							{{ old('remember') ? 'checked' : '' }}>
						Remember Me
					</div>






					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn">
								Login
							</button>
						</div>
					</div>

				</form><br>
				<div class="text-center">
					{{-- @if (Route::has('admin.password.request'))
					<a href="{{ route('admin.password.request') }}">
					{{ __('Forgot Your Password?') }}
					</a>
					@endif --}}
				</div>
			</div>
		</div>
	</div>


	<div id="dropDownSelect1"></div>

	<!--===============================================================================================-->
	<script src="{{asset('admin_login_page/vendor/jquery/jquery-3.2.1.min.js')}}"></script>
	<!--===============================================================================================-->
	<script src="{{asset('admin_login_page/vendor/animsition/js/animsition.min.js')}}"></script>
	<!--===============================================================================================-->
	<script src="{{asset('admin_login_page/vendor/bootstrap/js/popper.js')}}"></script>
	<script src="{{asset('admin_login_page/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
	<!--===============================================================================================-->
	<script src="{{asset('admin_login_page/vendor/select2/select2.min.js')}}"></script>
	<!--===============================================================================================-->
	<script src="{{asset('admin_login_page/vendor/daterangepicker/moment.min.js')}}"></script>
	<script src="{{asset('admin_login_page/vendor/daterangepicker/daterangepicker.js')}}"></script>
	<!--===============================================================================================-->
	<script src="{{asset('admin_login_page/vendor/countdowntime/countdowntime.js')}}"></script>
	<!--===============================================================================================-->
	<script src="{{asset('admin_login_page/js/main.js')}}"></script>

</body>

</html>
