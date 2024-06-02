@extends('landing.layout') 

@section('title')
{{ $company->name }} | Contact Page
@endsection

@section('content')
<!-- ====================== Page Title ================= -->	
<x-landing-title title="Contact Us" current_page="Contact"/>
<!-- ====================== Page Title ================= -->
<div class="clearfix"></div>

<!-- =========== Start All Hotel In Grid View =================== -->
<section class="gray-bg">
	<div class="container">
		<div class="row">
			
			<div class="col-md-5 col-sm-5">
				<div class="form-box">
					<i class="c-icon ti-email theme-cl"></i>
					<div class="c-detail">
						<strong>Email On:</strong>
						<p>{{ $company->email }}</p>
					</div>
				</div>
				
				<div class="form-box">
					<i class="c-icon ti-headphone-alt theme-cl"></i>
					<div class="c-detail">
						<strong>Call Us:</strong>
						<p>{{ $company->phone }}</p>
					</div>
				</div>
				
				<div class="form-box">
					<i class="c-icon ti-map-alt theme-cl"></i>
					<div class="c-detail">
						<strong>Location:</strong>
						<p>{{ $company->address }}</p>
					</div>
				</div>
				
			</div>
			
			<div class="col-md-7 col-sm-7">
				<div class="form-box">
					<form class="c-form" action="{{ url('/contact') }}" method="POST">
						@csrf

						@if(session()->has('message'))
							@if(session('message_type') == 'success')
								<div class="text-center mrg-top-20 mrg-bot-20 text-success">{{ session('message') }}</div>
							@else
								<div class="text-center mrg-top-20 mrg-bot-20 text-danger">{{ session('message') }}</div>
							@endif
						@endif
					
						<div class="row">
							<div class="col-sm-6">
								<label>Name<sup class="cl-danger">*</sup></label>
								<input type="text" name="name" class="form-control" value="{{ old('name') }}" maxlength="100" required>
								@error('name')
								<div class="alert-msg text-danger" style="text-align: left;">{{ $message }}</div>
								@enderror
							</div>
							<div class="col-sm-6">
								<label>Email<sup class="cl-danger">*</sup></label>
								<input type="email" name="email" class="form-control" value="{{ old('email') }}" maxlength="100" required>
								@error('email')
								<div class="alert-msg text-danger" style="text-align: left;">{{ $message }}</div>
								@enderror
							</div>
						</div>
						
						<div class="row">
							<div class="col-sm-6">
								<label>Phone<sup class="cl-danger">*</sup></label>
								<input type="text" name="phone" class="form-control" value="{{ old('phone') }}" maxlength="20" required>
								@error('phone')
								<div class="alert-msg text-danger" style="text-align: left;">{{ $message }}</div>
								@enderror
							</div>
							<div class="col-sm-6">
								<label>Subject<sup class="cl-danger">*</sup></label>
								<input type="text" name="subject" class="form-control" value="{{ old('subject') }}" maxlength="160" required>
								@error('subject')
								<div class="alert-msg text-danger" style="text-align: left;">{{ $message }}</div>
								@enderror
							</div>
						</div>
						
						<div class="row">
							<div class="col-sm-12">
								<label>Message<sup class="cl-danger">*</sup></label>
								<textarea name="message" class="form-control height-150" maxlength="5000" required>{{ old('message') }}</textarea>
								@error('message')
								<div class="alert-msg text-danger" style="text-align: left;">{{ $message }}</div>
								@enderror
							</div>
						</div>
						
						<div class="row">
							<div class="col-sm-12">
								<button class="btn theme-btn btn-arrow">Submit Request</button>
							</div>
						</div>
						
					</form>
				</div>
			</div>
			
		</div>
	</div>
</section>
<!-- =========== End All Hotel In Grid View =================== -->
@endsection