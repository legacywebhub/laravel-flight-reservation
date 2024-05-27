@extends('landing.layout')

@section('title')
{{ $company->name }} | Checkout
@endsection

@section('content')
<!-- start banner Area -->
<section class="relative about-banner">	
	<div class="overlay overlay-bg"></div>
	<div class="container">				
		<div class="row d-flex align-items-center justify-content-center">
			<div class="about-content col-lg-12">
				<h1 class="text-white">
					Checkout
				</h1>	
				<p class="text-white link-nav"><a href="{{ route('home') }}">Home </a>  <span class="lnr lnr-arrow-right"></span>  <a href="javascript:void(0);"> Checkout Booking</a></p>
			</div>
		</div>
	</div>
</section>
<!-- End banner Area -->	
@endsection