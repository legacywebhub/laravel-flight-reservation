@extends('landing.layout') 

@section('title')
{{ $company->name }} | Flight
@endsection

@section('content')
<!-- start banner Area -->
<section class="relative about-banner">	
	<div class="overlay overlay-bg"></div>
	<div class="container">				
		<div class="row d-flex align-items-center justify-content-center">
			<div class="about-content col-lg-12">
				<h1 class="text-white">
					Book Flight
				</h1>	
				<p class="text-white link-nav"><a href="{{ route('home') }}">Home </a>  <span class="lnr lnr-arrow-right"></span>  <a href="javascript:void(0);"> Book Flight</a></p>
			</div>	
		</div>
	</div>
</section>
<!-- End banner Area -->				  

<!-- Start flights Area -->
<section class="testimonial-area section-gap">
	<div class="container">
		<div class="row d-flex justify-content-center">
			<div class="menu-content pb-70 col-lg-9">
				<div class="title text-center">
					<h3 class="mb-10">
                        Provide Your Information
                    </h3>
				</div>
			</div>
		</div>					
		<div class="row d-flex justify-content-center">
			<div class="col-sm-12 col-md-9 col-lg-6">
				<form name="booking-form" method="POST"><!-- {{ route('book_flight', ['id' => $seat->id]) }} -->
					@csrf
					<h5>Personal Information</h5><hr>
					<div class="mt-10">
						<label class="ml-10 font-weight-bold">Full Name:</label>
						<input type="text" name="name" class="single-input-primary" value="{{ old('name') }}" maxlength="100" required>
						@error('name')
						<p class="alert-msg text-danger" style="text-align: left;">{{ $message }}</p>
						@enderror
					</div>
					<div class="mt-10">
						<label class="ml-10 font-weight-bold">Email:</label>
						<input type="email" name="email" class="single-input-primary" value="{{ old('email') }}" maxlength="100" required>
						@error('email')
						<p class="alert-msg text-danger" style="text-align: left;">{{ $message }}</p>
						@enderror
					</div>
					<div class="mt-10">
						<label class="ml-10 font-weight-bold">Phone:</label>
						<input type="text" name="phone" class="single-input-primary" value="{{ old('phone') }}" maxlength="30" required>
						@error('phone')
						<p class="alert-msg text-danger" style="text-align: left;">{{ $message }}</p>
						@enderror
					</div>
					<div class="mt-10">
						<label class="ml-10 font-weight-bold">Address:</label>
						<input type="text" name="address" class="single-input-primary" value="{{ old('address') }}" maxlength="160" required>
						@error('address')
						<p class="alert-msg text-danger" style="text-align: left;">{{ $message }}</p>
						@enderror
					</div>
					<div class="mt-10">
						<label class="ml-10 font-weight-bold">Age:</label>
						<input type="text" name="age" class="single-input-primary" value="{{ old('age') }}" maxlength="3" onkeypress="return onlyNumberKey(event)" required>
						@error('age')
						<p class="alert-msg text-danger" style="text-align: left;">{{ $message }}</p>
						@enderror
					</div>
					<div class="mt-10">
						<label class="ml-10 font-weight-bold">Gender:</label>
						<div class="form-select" id="default-select">
							<select name="gender" required>
								<option value=""></option>
								<option value="male">Male</option>
								<option value="female">Female</option>
							</select>
						</div>
						@error('gender')
						<p class="alert-msg text-danger" style="text-align: left;">{{ $message }}</p>
						@enderror
					</div>
					<h5 class="mt-40">Flight Information</h5><hr>
					<div class="mt-10">
						<label class="ml-10 font-weight-bold">Flight ID:</label>
						<div class="input-group-icon">
							<div class="icon"><i class="fa fa-plane" aria-hidden="true"></i></div>
							<input type="text" name="flight" class="single-input" value="{{ $seat->flight->flight_id }}" readonly required>
						</div>
					</div>
					<div class="mt-10">
						<label class="ml-10 font-weight-bold">Seat Number:</label>
						<div class="input-group-icon">
							<div class="icon"><i class="fa fa-file" aria-hidden="true"></i></div>
							<input type="text" name="seat_number" class="single-input" value="{{ $seat->seat_number }}" readonly required>
						</div>
					</div>
					<div class="mt-10">
						<label class="ml-10 font-weight-bold">Seat Class:</label>
						<div class="input-group-icon">
							<div class="icon"><i class="fa fa-thumb-tack" aria-hidden="true"></i></div>
							<input type="text" name="seat_class" class="single-input text-capitalize" value="{{ $seat->seat_class }}" readonly required>
						</div>
					</div>
					<div class="mt-10">
						<label class="ml-10 font-weight-bold">Amount:</label>
						<div class="input-group-icon">
							<div class="icon"><i class="fa fa-dollar" aria-hidden="true"></i></div>
							<input type="number" name="amount" class="single-input" value="{{ $seat->price }}" readonly required>
						</div>
					</div>
					<input type="hidden" name="flight_id" class="single-input" value="{{ $seat->flight->id }}">
					<input type="hidden" name="seat_id" class="single-input" value="{{ $seat->id }}">
					<div class="text-center mt-50">
						<button class="btn btn-warning text-light"><span class="btn-text">Proceed</span></button>
					</div>
				</form>
			</div>																	
		</div>
    </div>
</section>

<script>
	let bookingForm = document.forms['booking-form'],
		bookingBtn = bookingForm.querySelector('.btn-warning'),
		btnText = bookingBtn.querySelector('.btn-text');
	
	
	bookingForm.addEventListener('submit', (e)=>{
		e.preventDefault();
	
		// Loading animation
		btnText.innerHTML = `Submitting data...<img width='20' src="{{ asset('global/images/spinner-white.svg') }}">`;
		bookingBtn.disabled = true;
	
		setTimeout(()=>{
			fetch(window.location.href, {
				method: "POST",
				headers: {
					'Content-Type': 'application/json',
				},
				body: JSON.stringify({
					'_token': '{{ csrf_token() }}',
					'name': bookingForm['name'].value,
					'email': bookingForm['email'].value,
					'phone': bookingForm['phone'].value,
					'address': bookingForm['address'].value,
					'age': parseInt(bookingForm['age'].value),
					'gender': bookingForm['gender'].value,
					'flight_id': parseInt(bookingForm['flight_id'].value),
					'seat_id': parseInt(bookingForm['seat_id'].value),
					'amount': parseFloat(bookingForm['amount'].value)
				})
			})
			.then((response)=>{
				return response.json()
			})
			.then((data)=>{
				console.log(data);
				if (data['status'] == "success") {
					btnText.innerHTML = `Booked successfully`;
					bookingBtn.disabled = true;
					bookingForm.reset();
					swal(data['message'], {icon:'success'});
				} else {
					btnText.innerHTML = `Proceed`;
					bookingBtn.disabled = false;
					swal(data['message'], {icon: 'error'});
				}
			})
			.catch((err)=>{
				console.log(err);
				btnText.innerHTML = `Proceed`;
				bookingBtn.disabled = false;
				swal('Unknown error occured', {icon:'error'});
			})
		}, 2000);
	
	})
</script>
<!-- End flights Area -->
@endsection