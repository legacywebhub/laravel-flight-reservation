@extends('landing.layout') 

@section('title')
{{ $company->name }} | Invoice
@endsection

@section('content')		  
<!-- start banner Area -->
<section class="about-banner relative">
	<div class="overlay overlay-bg"></div>
	<div class="container">				
		<div class="row d-flex align-items-center justify-content-center">
			<div class="about-content col-lg-12">
				<h1 class="text-white">
					Booking Invoice	
				</h1>	
				<p class="text-white link-nav"><a href="{{ route('home') }}">Home </a>  <span class="lnr lnr-arrow-right"></span>  <a href="javascript:void(0);"> Invoice</a></p>
			</div>	
		</div>
	</div>
</section>
<!-- End banner Area -->

<!-- Start invoice Area -->
<section class="other-issue-area section-gap">
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="invoice-title">
                <h2 class="d-flex align-items-center justify-content-between">
                    <span>Booking Invoice</span>
                    <span># {{ $seat_booking->booking->booking_id }}</span>
                </h2>
            </div><hr>
            <div class="row">
                <div class="col-12">
                    <address>
                        <h5>Billed To:</h5>
                        <strong class="mr-10">Name:</strong>{{ $seat_booking->booking->name }}<br>
                        <strong class="mr-10">Email:</strong>{{ $seat_booking->booking->email }}<br>
                        <strong class="mr-10">Address:</strong>{{ $seat_booking->booking->address }}<br>
                        <strong class="mr-10">Age:</strong>{{ $seat_booking->booking->age }}<br>
                        <strong class="mr-10">Gender:</strong>{{ $seat_booking->booking->gender }}<br>
                    </address>
                </div>
                <div class="col-12 text-right">
                    <address>
                        <h5>Booking Info:</h5>
                        <strong class="mr-10">Booking ID:</strong>{{ $seat_booking->booking->booking_id }}<br>
                        <strong class="mr-10">Flight ID:</strong>{{ $seat_booking->seat->flight->flight_id }}<br>
                        <strong class="mr-10">Seat ID:</strong>{{ $seat_booking->seat->id }}<br>
                        <strong class="mr-10">Seat Number:</strong>{{ $seat_booking->seat->seat_number }}<br>
                        <strong class="mr-10">Seat Class:</strong>{{ $seat_booking->seat->seat_class }}<br>
                        <strong class="mr-10">Seat Price:</strong>${{ $seat_booking->seat->price }}<br>
                        <strong class="mr-10">Seat Status:</strong>{{ $seat_booking->seat->status }}<br>
                    </address>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <address>
                        <h5>Payment Info:</h5>
                        <strong class="mr-10">Reference ID:</strong>{{ $seat_booking->booking->payment->reference_id }}<br>
                        <strong class="mr-10">Amount:</strong>${{ $seat_booking->booking->payment->amount }}<br>
                        <strong class="mr-10">Payment Method:</strong>{{ $seat_booking->booking->payment->payment_method }}<br>
                        <strong class="mr-10">Payment Status:</strong>{{ $seat_booking->booking->payment->payment_status }}<br>
                        <strong class="mr-10">Payment Date:</strong>{{ Date('d M, Y H:i A', strtotime($seat_booking->booking->payment->payment_date)) }}
                    </address>
                </div>
                <div class="col-12 text-right">
                    <address>
                        <h5>Booking/Purchase Date:</h5> 
                        {{ Date('d M, Y H:i A', strtotime($seat_booking->date)) }}
                    </address>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-20">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title"><strong>Price summary</strong></h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-condensed">
                            <thead>
                                <tr>
                                    <td><strong>Item</strong></td>
                                    <td class="text-center"><strong>Price</strong></td>
                                    <td class="text-center"><strong>Quantity</strong></td>
                                    <td class="text-right"><strong>Totals</strong></td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Flight Ticket</td>
                                    <td class="text-center">${{ $seat_booking->booking->payment->amount }}</td>
                                    <td class="text-center">1</td>
                                    <td class="text-right">${{ $seat_booking->booking->payment->amount }}</td>
                                </tr>
                                <tr>
                                    <td class="thick-line"></td>
                                    <td class="thick-line"></td>
                                    <td class="thick-line text-center"><strong>Subtotal</strong></td>
                                    <td class="thick-line text-right">${{ 0.9 * $seat_booking->booking->payment->amount }}</td>
                                </tr>
                                <tr>
                                    <td class="no-line"></td>
                                    <td class="no-line"></td>
                                    <td class="no-line text-center"><strong>Tax</strong></td>
                                    <td class="no-line text-right">${{ 0.1 * $seat_booking->booking->payment->amount }}</td>
                                </tr>
                                <tr>
                                    <td class="no-line"></td>
                                    <td class="no-line"></td>
                                    <td class="no-line text-center"><strong>Total</strong></td>
                                    <td class="no-line text-right">${{ $seat_booking->booking->payment->amount }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-40">
        <div class="col-lg-12">
            <blockquote class="generic-blockquote font-weight-bold">
                <p>Dear Customer,</p>

                <p>Thank you for booking your flight with us. Please proceed to the airport and present your booking ID for ticket collection:</p>

                <p>Booking ID: {{ $seat_booking->booking->booking_id }}</p>

                <p>Safe travels!</p>

                <p>Best regards,<br>{{ $company->name }}</p>   
            </blockquote>
        </div>
    </div>
</div>
</section>
<!-- End invoice Area -->
@endsection