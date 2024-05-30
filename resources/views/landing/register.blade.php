@extends('landing.layout') 

@section('title')
{{ $company->name }} | Register
@endsection

@section('content')
<!-- ====================== Page Title ================= -->	
<x-landing-title title="Register" current_page="Register"/>
<!-- ====================== Page Title ================= -->
<div class="clearfix"></div>

<!-- =========== Start All Hotel In Grid View =================== -->
<section class="gray-bg">
	<div class="container">
		<div class="row d-flex">
			
			<div class="col-12 col-md-9" style="width: 80vw;">
				<div class="form-box">
					<h4>Sign Up</h4><hr>
					<form class="reg-form" action="{{ url('/login') }}" method="POST" style="padding: 0px 20px;">
						@csrf

						@if(session()->has('message'))
							<div class="mt-20 mb-20 text-danger">{{ session('message') }}</div>
						@endif
					
                        <div class="form-group">
                            <label>Full Name <span class="text-danger">*</span></label>
                            <input type="text" name="name" class="form-control" minlength="5" maxlength="100" required>
                            @error('name')
                            <div class="mrg-top-10 text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Email <span class="text-danger">*</span></label>
                            <input type="email" name="email" class="form-control" maxlength="100" required>
                            @error('email')
                            <div class="mrg-top-10 text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Phone <span class="text-danger">*</span></label>
                            <input type="text" name="phone" class="form-control" minlength="7" maxlength="20" required>
                            @error('phone')
                            <div class="mrg-top-10 text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Address <span class="text-danger">*</span></label>
                            <input type="text" name="address" class="form-control" minlength="5" maxlength="160" required>
                            @error('address')
                            <div class="mrg-top-10 text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Age <span class="text-danger">*</span></label>
                            <input type="text" name="age" class="form-control" maxlength="3" onkeypress="return onlyNumberKey(event)" required>
                            @error('age')
                            <div class="mrg-top-10 text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Gender <span class="text-danger">*</span></label>
                            <select class="wide form-control br-1" name="gender" required>
                                <option value=""></option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Password <span class="text-danger">*</span></label>
                            <input type="password" name="password" class="form-control" minlength="5" maxlength="100" required>
                            @error('password')
                            <div class="mrg-top-10 text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Confirm Password <span class="text-danger">*</span></label>
                            <input type="password" name="password_confirmation" class="form-control" minlength="5" maxlength="100" required>
                            @error('password_confirmation')
                            <div class="mrg-top-10 text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <input type="hidden" name="timezone" class="form-control">

                        <div class="form-group text-center mrg-top-20">
                            <button class="btn theme-btn full-width btn-m">Register</button>
                        </div>
						
						<div class="row mt-50 mb-20 text-center">
							Already have an account? Sign in <a href="{{ url('/login') }}">here</a>
						</div>
					</form>
				</div>
			</div>
			
		</div>
	</div>
</section>
<!-- =========== End All Hotel In Grid View =================== -->
@endsection