@extends('layouts.app')
@section('content')
		<div class="breadcrumbs">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="container-inner">
							<ul>
								<li class="home">
									<a href="index.html">Home</a>
									<span><i class="fa fa-angle-right"></i></span>
								</li>
								<li class="category3"><span>Đăng nhập</span></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- breadcrumbs area end -->
		<!-- account-details Area Start -->
		<div class="customer-login-area">
			<div class="container">
				<div class="row">
					<div class="col-md-6 col-xs-12">
						<div class="customer-login my-account">
							<form method="post" class="login" action="">
								@csrf
								<div class="form-fields">
									><h2>Đăng nhập </h2>
									<p class="form-row form-row-wide">
										<label for="username">email address <span class="required">*</span></label>
										<input type="text" class="input-text" name="email" id="username" value="">
									</p>
									<p class="form-row form-row-wide">
										<label for="password">Password <span class="required">*</span></label>
										<input class="input-text" type="password" name="password" id="password">
									</p>
								</div>
								<div class="form-action">
									<p class="lost_password"> <a href="{{route('forget.password')}}">Quên mật khẩu?</a></p>
									<div class="actions-log">
										<input type="submit" class="button" name="login" value="Đăng nhập">
									</div>
								</div>
							</form>
							
							<div class="social-login-buttons">
								<a class="ml-1 btn btn-primary" href="{{ route('auth.facebook',)}}">
									<i class="fa fa-facebook-square" aria-hidden="true"></i> Login with Facebook
								</a>
								
								<h4 style="text-align:center; margin-top:5px; margin-bottom:5px">Or</h4>
		
								<a class="ml-1 btn btn-danger" href="{{ route('auth.google')}}">
									<i class="fa fa-google" aria-hidden="true"></i> Login with Google
								</a>
								<hr>
								<p>Bạn chưa có tài khoản ? <i class="fa-regular fa-hand-point-down"></i>
								<div class="register-btn">
            <a href="{{ route('get.register') }}" class="button">Đăng ký ngay</a>  </p>
        
		
								</div>
							</div>
						</div>
					</div>
			
				</div>
			</div>
		</div>

@stop