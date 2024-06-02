@extends('landing.layout') 

@section('title')
{{ $company->name }} | Our Services
@endsection

@section('content')
<!-- ====================== Page Title ================= -->	
<x-landing-title title="Services" current_page="Our Services"/>
<!-- ====================== Page Title ================= -->
<div class="clearfix"></div>
		
<!-- ================= Features ===================== -->
<section class="gray-bg">
	<div class="container">
	
		<div class="row">
			<div class="col-md-12">
				<div class="heading">
					<span class="theme-cl">New Services</span>
					<h1>Latest Services</h1>
				</div>
			</div>
		</div>
		
		<div class="row">
			
			<div class="col-md-4 col-sm-6">
				<div class="info-services">
					<img src="assets/img/tt-1.png" alt="">
					<h4 class="infobox_title">Sightseeing Tours</h4>
					<div class="infobox_content">Cryptronick caters to clients who require an intensive, full-service approach to SEO</div>
				</div>
			</div>
			
			<div class="col-md-4 col-sm-6">
				<div class="info-services">
					<img src="assets/img/tt-2.png" alt="">
					<h4 class="infobox_title">Trips out of town</h4>
					<div class="infobox_content">Cryptronick caters to clients who require an intensive, full-service approach to SEO</div>
				</div>
			</div>
			
			<div class="col-md-4 col-sm-6">
				<div class="info-services">
					<img src="assets/img/tt-3.png" alt="">
					<h4 class="infobox_title">Extraordinary Tours</h4>
					<div class="infobox_content">Cryptronick caters to clients who require an intensive, full-service approach to SEO</div>
				</div>
			</div>
			
			<div class="col-md-4 col-sm-6">
				<div class="info-services">
					<img src="assets/img/tt-4.png" alt="">
					<h4 class="infobox_title">History & Architecture</h4>
					<div class="infobox_content">Cryptronick caters to clients who require an intensive, full-service approach to SEO</div>
				</div>
			</div>
			
			<div class="col-md-4 col-sm-6">
				<div class="info-services">
					<img src="assets/img/tt-5.png" alt="">
					<h4 class="infobox_title">Food & Cooking Tours</h4>
					<div class="infobox_content">Cryptronick caters to clients who require an intensive, full-service approach to SEO</div>
				</div>
			</div>
			
			<div class="col-md-4 col-sm-6">
				<div class="info-services">
					<img src="assets/img/tt-6.png" alt="">
					<h4 class="infobox_title">Museums & Art</h4>
					<div class="infobox_content">Cryptronick caters to clients who require an intensive, full-service approach to SEO</div>
				</div>
			</div>
			
		</div>
	</div>
</section>
<!-- ===================== End fetures ===================== -->
@endsection