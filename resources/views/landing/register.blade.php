@extends('landing.layout') 

@section('title')
{{ $company->name }} | Sign Up
@endsection

@section('content')
<!-- start banner Area -->
<section class="relative about-banner">	
	<div class="overlay overlay-bg"></div>
	<div class="container">				
		<div class="row d-flex align-items-center justify-content-center">
			<div class="about-content col-lg-12">
				<h1 class="text-white">
					Register		
				</h1>	
				<p class="text-white link-nav"><a href="{{ url('/') }}">Home </a>  <span class="lnr lnr-arrow-right"></span>  <a href="javascript:void(0);">Sign up</a></p>
			</div>	
		</div>
	</div>
</section>
<!-- End banner Area -->				  

<!-- Start login-page Area -->
<section class="contact-page-area section-gap">
	<div class="container">
        <div class="row d-flex justify-content-center">
			<div class="menu-content pb-70 col-lg-9">
				<div class="title text-center">
					<h1 class="mb-10">Sign Up</h1>
					<p>Enjoy amazing price discounts on international flights when you sign up with us</p>
				</div>
			</div>
		</div>	
		<div class="row d-flex justify-content-center">
            <form name="reg-form" action="{{ url('/register') }}" method="POST">
                @csrf
                <input type="hidden" name="timezone" class="form-control">
                <div class="form-group">
                    <label>Full Name <span class="text-danger">*</span></label>
                    <input type="text" name="name" class="form-control" maxlength="100" value="{{ old('name') }}" required>
                    @error('name')
                    <p class="alert-msg text-danger" style="text-align: left;">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Email address <span class="text-danger">*</span></label>
                    <input type="email" name="email" class="form-control" maxlength="100" value="{{ old('email') }}" required>
                    @error('email')
                    <p class="alert-msg text-danger" style="text-align: left;">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Phone <span class="text-danger">*</span></label>
                    <input type="text" name="phone" class="form-control" maxlength="100" value="{{ old('phone') }}" required>
                    @error('phone')
                    <p class="alert-msg text-danger" style="text-align: left;">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Address <span class="text-danger">*</span></label>
                    <input type="text" name="address" class="form-control" maxlength="160" value="{{ old('address') }}" required>
                    @error('address')
                    <p class="alert-msg text-danger" style="text-align: left;">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Age <span class="text-danger">*</span></label>
                    <input type="text" name="age" class="form-control" maxlength="3" value="{{ old('age') }}" required>
                    @error('age')
                    <p class="alert-msg text-danger" style="text-align: left;">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Gender <span class="text-danger">*</span></label>
                    <select class="form-control" name="gender" required>
                        <option value="">Select</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                    </select>
                    @error('age')
                    <p class="alert-msg text-danger" style="text-align: left;">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Password <span class="text-danger">*</span></label>
                    <input type="password" name="password" class="form-control" maxlength="100" value="{{ old('password') }}" required>
                    @error('password')
                    <p class="alert-msg text-danger" style="text-align: left;">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Confirm Password <span class="text-danger">*</span></label>
                    <input type="password" name="password_confirmation" class="form-control" maxlength="100" value="{{ old('password_confirmation') }}" required>
                    @error('password_confirmation')
                    <p class="alert-msg text-danger" style="text-align: left;">{{ $message }}</p>
                    @enderror
                </div>

                @if(session()->has('message'))
                    <div class="alert-msg" style="text-align: center;">{{ session('message') }}</div>
                @endif
                
                <button class="genric-btn primary d-block">Submit</button>

                <div class="mt-5">Already have an account? Sign in <a href="{{ url('/login') }}">here</a></div>
            </form>
		</div>
	</div>	
</section>
<!-- End login-page Area -->

<script>
    let regForm = document.forms["reg-form"];

    // Inserting timezone of user
    regForm["timezone"].value = Intl.DateTimeFormat().resolvedOptions().timeZone
  </script>
@endsection