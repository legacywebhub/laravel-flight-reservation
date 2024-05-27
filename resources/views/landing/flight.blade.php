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
					Flight
				</h1>	
				<p class="text-white link-nav"><a href="{{ url('/') }}">Home </a>  <span class="lnr lnr-arrow-right"></span>  <a href="javascript:void(0);"> Flight</a></p>
			</div>	
		</div>
	</div>
</section>
<!-- End banner Area -->				  

<!-- Start filter flights Area -->
<section class="other-issue-area section-gap">
	<div class="container">
		<div class="row d-flex justify-content-center">
			<div class="menu-content pb-70 col-lg-9">
				<div class="title text-center">
					<h1 class="mb-10">Flight Information</h1>
					<p>Full insight about a flight and available seats</p>
				</div>
			</div>
		</div>	
        <div class="row">
			<div class="col-12">
				<ul>
					<li class="mt-1">
						<span class="lead mr-5">Flight ID:</span>
						<span class="lead ml-5 text-primary">{{ $flight->flight_id }}</span>
					</li><hr>
					<li class="mt-1">
						<span class="lead mr-5">Airline:</span>
						<span class="lead ml-5 text-primary text-capitalize">{{ $flight->airline->name }}</span>
					</li><hr>
					<li class="mt-1">
						<span class="lead mr-5">Departure Location/From:</span>
						<span class="lead ml-5 text-primary">{{ $flight->origin->city.'/'.$flight->origin->country }}</span>
					</li><hr>
					<li class="mt-1">
						<span class="lead mr-5">Destination/To:</span>
						<span class="lead ml-5 text-primary">{{ $flight->destination->city.'/'.$flight->destination->country }}</span>
					</li><hr>
					<li class="mt-1">
						<span class="lead mr-5">Departure Time:</span>
						<span class="lead ml-5 text-primary">{{ Date('d M, Y H:i A', strtotime($flight->departure_time)) }}</span>
					</li><hr>
					<li class="mt-1">
						<span class="lead mr-5">Calculated Arrival Time:</span>
						<span class="lead ml-5 text-primary">{{ Date('d M, Y H:i A', strtotime($flight->arrival_time)) }}</span>
					</li><hr>
					<li class="mt-1">
						<span class="lead mr-5">Number Of Seats/Passengers:</span>
						<span class="lead ml-5 text-primary">{{ $flight->available_seats }}</span>
					</li><hr>
					<li class="mt-1">
						<span class="lead mr-5">Status:</span>
						<span class="lead ml-5 text-primary text-capitalize">{{ $flight->status }}</span>
					</li>
				</ul>

				<div style="margin-top: 100px">
					<div class="title text-center">
						<h3 class="mb-30">Available Seats</h3>
					</div>
					<div class="progress-table-wrap">
						<div class="progress-table">
							<div class="table-head">
								<div class="visit"></div>
								<div class="visit">Seat Number</div>
								<div class="visit">Class</div>
								<div class="visit">Price</div>
								<div class="visit">Action</div>
							</div>
							@if(count($seats) > 0)
								@foreach($seats as $seat)
								<div class="table-row">
									<div class="visit"></div>
									<div class="visit">{{ $seat->seat_number }}</div>
									<div class="visit">{{ $seat->seat_class }}</div>
									<div class="visit">${{ $seat->price }}</div>
									<div class="visit"><a href="{{ route('book_flight', ['id' => $seat->id]) }}" class="primary-btn text-uppercase">Book</a></div>
								</div>
								@endforeach
							@else
								<div class="table-row">
									<div class="visit">No Available Seats</div>
								</div>
							@endif
						</div>
					</div>
				</div>

			</div>
        </div>
	</div>	
</section>
<!-- End filter flights Area -->
@endsection