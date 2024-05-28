@extends('landing.layout') 

@section('title')
{{ $company->name }} | Flight
@endsection

@section('content')
<style>
	#payment-btns {
		display: none;
	}
</style>

<!-- Paypal Inline CDN -->
<script src="https://www.paypal.com/sdk/js?client-id=AaM8VGk3wYozIz74DljGW2nwh-fa8foCVGGC-rcmNApRDQB8esB1heimnLEc3KVatPTot6fEe5iO7xTe&currency=USD&disable-funding=credit"></script>

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
						<div id="payment-btns"></div>
					</div>
				</form>
			</div>																	
		</div>
    </div>
</section>

<script>
	let bookingForm = document.forms['booking-form'],
		bookingBtn = bookingForm.querySelector('.btn-warning'),
		paymentBtns = bookingForm.querySelector('#payment-btns'),
		amount = parseInt({{ $seat->price }}),
		formData = null;
	
	
	bookingForm.addEventListener('submit', (e)=>{
		e.preventDefault();

		// Extracting form info
		formData = {
			'_token': '{{ csrf_token() }}',
			'name': bookingForm['name'].value,
			'email': bookingForm['email'].value,
			'phone': bookingForm['phone'].value,
			'address': bookingForm['address'].value,
			'age': parseInt(bookingForm['age'].value),
			'gender': bookingForm['gender'].value,
			'flight_id': parseInt(bookingForm['flight_id'].value),
			'seat_id': parseInt(bookingForm['seat_id'].value),
			'amount': parseFloat(bookingForm['amount'].value),
		}
	
		// Hide submit button and show paypal buttons
		bookingBtn.style.display = "none";
		paymentBtns.style.display = "contents";
	})
</script>

<script>
	function submitFormData(transactionID) {

		// Appending transaction/reference ID to formData
		formData.reference_id = transactionID;
		console.log(formData);
	
		fetch(window.location.href, {
			method: "POST",
			headers: {
				'Content-Type': 'application/json',
			},
			body: JSON.stringify(formData)
		})
		.then((response)=>{
			return response.json()
		})
		.then((data)=>{
			console.log(data);
			if (data['status'] == "success") {
				paymentBtns.innerHTML = `<h4>Booking successful!</h4>`;
				swal(data['message'], {icon:'success'});
				setTimeout(()=>{
				 	window.location.href = data['invoice_url'];
				}, 3000)
			} else {
				swal(data['message'], {icon: 'error'});
			}
		})
		.catch((err)=>{
			console.log(err);
			swal('Unknown error occured', {icon:'error'});
		})

	}
</script>

<script>
	// Paypal function
	// Render the PayPal button into #paypal-button-container
	paypal.Buttons({
	
	// Set up the transaction
	createOrder: function(data, actions) {
		return actions.order.create({
			purchase_units: [{
				amount: {
					value: amount
				}
			}]
		});
	},

	// Finalize the transaction
	onApprove: function(data, actions) {
		return actions.order.capture().then(function(orderData) {
			// Successful capture! For demo purposes:
			//console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
			var transaction = orderData.purchase_units[0].payments.captures[0];
			submitFormData(transaction.id);

			// Replace the above to show a success message within this page, e.g.
			// const element = document.getElementById('paypal-button-container');
			// element.innerHTML = '';
			// element.innerHTML = '<h3>Thank you for your payment!</h3>';
			// Or go to another URL:  actions.redirect('thank_you.html');
		});
	}

	// Note that that no DOM element should bear an ID of paypal else this won't work

}).render('#payment-btns');

</script>
<!-- End flights Area -->
@endsection