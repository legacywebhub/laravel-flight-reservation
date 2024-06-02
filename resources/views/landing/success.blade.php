@extends('landing.layout') 

@section('title')
{{ $company->name }} | Success
@endsection

@section('content')
<!-- ====================== Page Title ================= -->	
<x-landing-title title="Payment Successful" current_page="Success"/>
<!-- ====================== Page Title ================= -->
<div class="clearfix"></div>
	
<section>
	<div class="container">
		<div class="success-wrap text-center">
			<div class="success-text">
				<i class="ti-check cl-success font-80"></i>
				<h3>Payment Successful!</h3>
				
				<ul>
					<li>Order Number:<span class="fl-right font-midium">#125 458 7589</span></li>
					<li>Total:<span class="fl-right font-25 font-midium">$370</span></li>
				</ul>
				<a href="{{ route('home') }}" class="btn theme-btn">Go To Home Page</a>
			</div>
		</div>
	</div>
</section>
@endsection