@extends('landing.layout') 

@section('title')
{{ $company->name }} | Sign In
@endsection

@section('content')
<!-- start banner Area -->
<section class="relative about-banner">	
	<div class="overlay overlay-bg"></div>
	<div class="container">				
		<div class="row d-flex align-items-center justify-content-center">
			<div class="about-content col-lg-12">
				<h1 class="text-white">
					Login			
				</h1>	
				<p class="text-white link-nav"><a href="{{ url('/') }}">Home </a>  <span class="lnr lnr-arrow-right"></span>  <a href="{{ url('/login') }}">Sign in</a></p>
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
					<h1 class="mb-10">Sign In</h1>
					<p>We all live in an age that belongs to the young at heart. Life that is.</p>
				</div>
			</div>
		</div>	
		<div class="row d-flex justify-content-center">
            <form action="{{ url('/login') }}" method="POST">
                @csrf
                @if(session()->has('message'))
                <div class="alert-msg" style="text-align: center;">{{ session('message') }}</div>
                @endif
                <div class="form-group">
                    <label for="email">Email address <span class="text-danger">*</span></label>
                    <input type="email" name="email" class="form-control" maxlength="100" id="email" required>
                </div>
                <div class="form-group">
                    <label for="password">Password <span class="text-danger">*</span></label>
                    <input type="password" name="password" class="form-control" id="password" maxlength="100" required>
                </div>
                <div class="form-group form-check">
                    <input type="checkbox" class="form-check-input" id="remember">
                    <label class="form-check-label" for="remember">Remember me</label>
                </div>
                <button class="genric-btn primary d-block">Submit</button>
            </form>
		</div>
	</div>	
</section>
<!-- End login-page Area -->
@endsection