@extends('landing.layout') 

@section('title')
{{ $company->name }} | Book Flight
@endsection

@section('content')
<style>
	#payment-btns {
		display: none;
	}
</style>

<!-- Paypal Inline CDN -->
<script src="https://www.paypal.com/sdk/js?client-id=AaM8VGk3wYozIz74DljGW2nwh-fa8foCVGGC-rcmNApRDQB8esB1heimnLEc3KVatPTot6fEe5iO7xTe&currency=USD&disable-funding=credit"></script>

<!-- ====================== Page Title ================= -->	
<x-landing-title title="Flight Booking" current_page="Book Flight"/>
<!-- ====================== Page Title ================= -->
<div class="clearfix"></div>				  

<!-- Start flights Area -->
<section class="testimonial-area section-gap">
	<div class="container">
		<!-- row -->
		<div class="row">
			<div class="col-md-9">
				<div class="tr-single-box">
					<div class="tr-single-header">
						<h4><i class="ti-write"></i>Billing Information</h4>
					</div>
					<div class="tr-single-body">
						<form name="booking-form" method="POST">
							@csrf
							<h5>Personal Information</h5><hr>
							<div class="row">
								<div class="col-sm-6">
									<label>Name</label>
									<input type="text" class="form-control" name="name" maxlength="100" required>
								</div>
								<div class="col-sm-6">
									<label>Email</label>
									<input type="email" class="form-control" name="email" maxlength="100" required>
								</div>
								<div class="col-sm-6">
									<label>Phone</label>
									<input type="text" class="form-control" name="phone" maxlength="20" required>
								</div>
								<div class="col-sm-6">
									<label>Address</label>
									<input type="text" class="form-control" name="address" minlength="5" maxlength="160" required>
								</div>
								<div class="col-sm-6">
									<label>Age</label>
									<input type="text" class="form-control" name="age" maxlength="3" onkeypress="return onlyNumberKey(event)" required>
								</div>
								<div class="col-sm-6">
									<label>Gender</label>
									<select class="wide form-control br-1" name="gender" required>
										<option value=""></option>
										<option value="male">Male</option>
										<option value="female">Female</option>
									</select>
								</div>
							</div>	
							<h5>Flight Information</h5><hr>
							<div class="row">
								<div class="col-sm-6">
									<label>Flight</label>
									<input type="text" class="form-control" name="flight" value="{{ $seat->flight->flight_id }}" readonly required>
								</div>
								<div class="col-sm-6">
									<label>Seat Number</label>
									<input type="email" class="form-control" name="seat_number" value="{{ $seat->seat_number }}" readonly required>
								</div>
								<div class="col-sm-6">
									<label>Seat Class</label>
									<input type="text" class="form-control" name="seat_class" value="{{ $seat->seat_class }}" readonly required>
								</div>
								<div class="col-sm-6">
									<label>Amount($)</label>
									<input type="text" class="form-control" name="amount"  value="{{ $seat->price }}" readonly required>
								</div>
							</div>
							<input type="hidden" name="flight_id" class="single-input" value="{{ $seat->flight->id }}">
							<input type="hidden" name="seat_id" class="single-input" value="{{ $seat->id }}">
							<div class="text-center" style="margin-top:30px;">
								<button class="btn theme-btn cl-white seub-btn"><span class="btn-text">Proceed</span></button>
								<div id="payment-btns"></div>
							</div>
						</form>
					</div>
				</div>
			</div>
			
			<div class="col-md-3">
				<div class="tr-single-box">
					<div class="tr-single-header">
						<h4><i class="ti-credit-card"></i>Payment Methode</h4>
					</div>
					<div class="tr-single-body">
						<!-- Paypal Option -->
						<div class="payment-card">
							<header class="payment-card-header cursor-pointer" data-toggle="collapse" data-target="#paypal" aria-expanded="true">
								<div class="payment-card-title flexbox">
									<h4>PayPal</h4>
								</div>
								<div class="pull-right">
									<img src="{{ asset('assets/img/paypal.png') }}" class="img-responsive" alt=""> 
								</div>
							</header>
							{{-- <div class="collapse" id="paypal" aria-expanded="false">
								<div class="payment-card-body">
									<div class="row mrg-bot-20">
										<div class="col-sm-6">
											<span class="custom-checkbox d-block font-12">
												<input type="checkbox" id="privacy">
												<label for="privacy"></label>
												Have a promo code?
											</span>
											<input type="text" class="form-control">
										</div>
										<div class="col-sm-6 padd-top-10 text-right">
											<label>Total Order</label>
											<h2 class="mrg-0"><span class="theme-cl">$</span>1170</h2>
										</div>
										<div class="col-sm-12 bt-1 padd-top-15">
											<span class="custom-checkbox d-block font-12">
												<input type="checkbox" id="privacy">
												<label for="privacy"></label>
												By ordering you are agreeing to our <a href="#" class="theme-cl">Privacy policy</a>.
											</span>
											<button type="submit" class="btn btn-m btn-success">Checkout</button>
										</div>
									</div>
								</div>
							</div> --}}
						</div>
						
						<!-- Debit card option -->
						<div class="payment-card">
							<header class="payment-card-header cursor-pointer" data-toggle="collapse" data-target="#debit-credit" aria-expanded="true">
								<div class="payment-card-title flexbox">
									<h4>Credit / Debit Card</h4>
								</div>
								<div class="pull-right">
									<img src="{{ asset('assets/img/credit.png') }}" class="img-responsive" alt=""> 
								</div>
							</header>
							{{-- <div class="collapse" id="debit-credit" aria-expanded="false">
								<div class="payment-card-body">
									<div class="row mrg-bot-20">
										<div class="col-sm-6">
											<label>Card Holder Name</label>
											<input type="text" class="form-control" placeholder="Daniel Singh">
										</div>
										<div class="col-sm-6">
											<label>Card No.</label>
											<input type="email" class="form-control" placeholder="1235 4785 4758 1458">
										</div>
									</div>
									<div class="row mrg-bot-20">
										<div class="col-sm-4 col-md-4">
											<label>Expire Month</label>
											<input type="text" class="form-control" placeholder="07">
										</div>
										<div class="col-sm-4 col-md-4">
											<label>Expire Year</label>
											<input type="email" class="form-control" placeholder="2020">
										</div>
										<div class="col-sm-4 col-md-4">
											<label>CCV Code</label>
											<input type="email" class="form-control" placeholder="258">
										</div>
									</div>
									<div class="row mrg-bot-20">
										<div class="col-sm-7">
											<span class="custom-checkbox d-block font-12">
												<input type="checkbox" id="privacy">
												<label for="privacy"></label>
												Have a promo code?
											</span>
											<input type="text" class="form-control">
										</div>
										<div class="col-sm-5 padd-top-10 text-right">
											<label>Total Order</label>
											<h2 class="mrg-0"><span class="theme-cl">$</span>1170</h2>
										</div>
										<div class="col-sm-12 bt-1 padd-top-15">
											<span class="custom-checkbox d-block font-12">
												<input type="checkbox" id="privacy">
												<label for="privacy"></label>
												By ordering you are agreeing to our <a href="#" class="theme-cl">Privacy policy</a>.
											</span>
											<button type="submit" class="btn btn-m btn-success">Checkout</button>
										</div>
									</div>
								</div>
							</div> --}}
						</div>
						
					</div>
				</div>
			</div>
		</div>			
    </div>
</section>

<script>
	let bookingForm = document.forms['booking-form'],
		bookingBtn = bookingForm.querySelector('.theme-btn'),
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