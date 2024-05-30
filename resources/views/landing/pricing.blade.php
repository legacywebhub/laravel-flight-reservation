@extends('landing.layout') 

@section('title')
{{ $company->name }} | Pricing
@endsection

@section('content')
<!-- ====================== Page Title ================= -->	
<x-landing-title title="Pricing" current_page="Pricing"/>
<!-- ====================== Page Title ================= -->
		
<!-- =========== Start Pricing =================== -->
<section class="gray-bg">
	<div class="container">
		<div class="container">
	
			<div class="col-md-4">
				<div class="price-table-box style-2 br-primary">
				
					<i class="ti-settings"></i>
					<h4>Professional</h4>
					
					<div class="price-box">
						<h2><sup>$</sup>45</h2>
					</div>
					
					<div class="price-features">
						<ul>
							<li>2 PSD With Font</li>
							<li>2 Logo Option</li>
							<li>45 Days Trial</li>
							<li>30 GB Space</li>
							<li>Sale After Purchase</li>
							<li>24X7 Full Support</li>
						</ul>
					</div>	
					
					<div class="price-btn">
						<a href="#" class="btn btn-pricing">Purchase Now<i class="ti-shopping-cart"></i></a>
					</div>
					
				</div>
			</div>
			
			<div class="col-md-4">
				<div class="price-table-box style-2 active br-danger">
				
					<i class="ti-thumb-up"></i>
					<h4>Standard</h4>
					
					<div class="price-box">
						<h2><sup>$</sup>199</h2>
					</div>
					
					<div class="price-features">
						<ul>
							<li>2 PSD With Font</li>
							<li>2 Logo Option</li>
							<li>45 Days Trial</li>
							<li>30 GB Space</li>
							<li>Sale After Purchase</li>
							<li>24X7 Full Support</li>
						</ul>
					</div>
					
					<div class="price-btn">
						<a href="#" class="btn btn-pricing">Purchase Now<i class="ti-shopping-cart"></i></a>
					</div>
					
				</div>
			</div>
			
			<div class="col-md-4">
				<div class="price-table-box style-2 br-success">
				
					<i class="ti-cup"></i>
					<h4>Premium</h4>
					
					<div class="price-box">
						<h2><sup>$</sup>299</h2>
					</div>
					
					<div class="price-features">
						<ul>
							<li>2 PSD With Font</li>
							<li>2 Logo Option</li>
							<li>45 Days Trial</li>
							<li>30 GB Space</li>
							<li>Sale After Purchase</li>
							<li>24X7 Full Support</li>
						</ul>
					</div>		
					
					<div class="price-btn">
						<a href="#" class="btn btn-pricing">Purchase Now<i class="ti-shopping-cart"></i></a>
					</div>
					
				</div>
			</div>

		</div>
	</div>
</section>
<!-- =========== End Pricing =================== -->
@endsection