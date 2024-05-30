@extends('landing.layout') 

@section('title')
{{ $company->name }} | Login
@endsection

@section('content')
<!-- ====================== Page Title ================= -->	
<x-landing-title title="Login" current_page="Login"/>
<!-- ====================== Page Title ================= -->
<div class="clearfix"></div>

<!-- =========== Start All Hotel In Grid View =================== -->
<section class="gray-bg">
	<div class="container">
		<div class="row d-flex">
			
			<div class="col-12 col-md-9" style="width: 80vw;">
				<div class="form-box">
					<h4>Sign In</h4><hr>
					<form class="reg-form" action="{{ url('/login') }}" method="POST" style="padding: 0px 20px;">
						@csrf

						@if(session()->has('message'))
							<div class="mt-20 mb-20 text-danger">{{ session('message') }}</div>
						@endif
					
						<div class="row">
							<div class="col-12">
								<label>Email<sup class="cl-danger">*</sup></label>
								<input type="email" name="email" class="form-control" value="{{ old('email') }}" maxlength="100" required>
								@error('email')
								<div class="mrg-top-10 text-danger">{{ $message }}</div>
								@enderror
							</div>
						</div>
						
						<div class="row">
							<div class="col-12">
								<label>Password<sup class="cl-danger">*</sup></label>
								<input type="password" name="password" class="form-control" value="{{ old('password') }}" maxlength="100" required>
								@error('password')
								<div class="mrg-top-10 text-danger" style="text-align: left;">{{ $message }}</div>
								@enderror
							</div>
						</div>
						
						<div class="row mrg-top-20">
							<button class="btn theme-btn btn-arrow">Login</button>
						</div>
						
						<div class="row mt-50 mb-20">
							You don't have an account? Sign up <a href="{{ url('/register') }}">here</a>
						</div>
					</form>
				</div>
			</div>
			
		</div>
	</div>
</section>
<!-- =========== End All Hotel In Grid View =================== -->
@endsection