@extends('landing.layout') 

@section('title')
{{ $company->name }} | Contact Page
@endsection

@section('content')
<!-- start banner Area -->
<section class="relative about-banner">	
	<div class="overlay overlay-bg"></div>
	<div class="container">				
		<div class="row d-flex align-items-center justify-content-center">
			<div class="about-content col-lg-12">
				<h1 class="text-white">
					Contact Us				
				</h1>	
				<p class="text-white link-nav"><a href="{{ url('/') }}">Home </a>  <span class="lnr lnr-arrow-right"></span>  <a href="{{ url('/contact') }}"> Contact Us</a></p>
			</div>	
		</div>
	</div>
</section>
<!-- End banner Area -->				  

<!-- Start contact-page Area -->
<section class="contact-page-area section-gap">
	<div class="container">
		<div class="row">
			<div class="map-wrap" style="width:100%; height: 445px;" id="map"></div>
			<div class="col-lg-4 d-flex flex-column address-wrap">
				<div class="single-contact-address d-flex flex-row">
					<div class="icon">
						<span class="lnr lnr-home"></span>
					</div>
					<div class="contact-details">
						<h5>Binghamton, New York</h5>
						<p>
							4343 Hinkle Deegan Lake Road
						</p>
					</div>
				</div>
				<div class="single-contact-address d-flex flex-row">
					<div class="icon">
						<span class="lnr lnr-phone-handset"></span>
					</div>
					<div class="contact-details">
						<h5>{{ $company->phone }}</h5>
						<p>Mon to Fri 9am to 6 pm</p>
					</div>
				</div>
				<div class="single-contact-address d-flex flex-row">
					<div class="icon">
						<span class="lnr lnr-envelope"></span>
					</div>
					<div class="contact-details">
						<h5>{{ $company->email }}</h5>
						<p>Send us your query anytime!</p>
					</div>
				</div>														
			</div>
			<div class="col-lg-8">
				<form class="form-area contact-form text-right" action="{{ url('/contact') }}" method="POST">
					@csrf
					<div class="row">	
						<div class="col-lg-6 form-group">
							<div class="mb-20">
								<input type="text" name="name" maxlength="100" class="common-input form-control" placeholder="Enter your name*" required>
								@error('name')
								<div class="alert-msg text-danger" style="text-align: left;">{{ $message }}</div>
								@enderror
							</div>
							<div class="mb-20">
								<input type="email" name="email" maxlength="100" class="common-input form-control" placeholder="Enter email*" required>
								@error('email')
								<div class="alert-msg text-danger" style="text-align: left;">{{ $message }}</div>
								@enderror
							</div>
							<div class="mb-20">
								<input type="text" name="phone" maxlength="30" class="common-input form-control" placeholder="Enter mobile number">
								@error('phone')
								<div class="alert-msg text-danger" style="text-align: left;">{{ $message }}</div>
								@enderror
							</div>
							<div class="mb-20">
								<input type="text" name="subject" maxlength="160" class="common-input form-control" placeholder="Enter subject*" required>
								@error('subject')
								<div class="alert-msg text-danger" style="text-align: left;">{{ $message }}</div>
								@enderror
							</div>
						</div>
						<div class="col-lg-6 form-group">
							<textarea class="common-textarea form-control" name="message" placeholder="Enter Messege*" maxlength="5000" required></textarea>				
							@error('message')
							<div class="alert-msg text-danger" style="text-align: left;">{{ $message }}</div>
							@enderror
						</div>
						<div class="col-lg-12">
							@if(session()->has('message'))
							<div class="alert-msg" style="text-align: right;">{{ session('message') }}</div>
							@endif
							<button class="genric-btn primary" style="float: right;">Send Message</button>											
						</div>
					</div>
				</form>	
			</div>
		</div>
	</div>	
</section>
<!-- End contact-page Area -->
@endsection