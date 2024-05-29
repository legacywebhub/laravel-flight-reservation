@extends('landing.layout') 

@section('title')
{{ $company->name }} | Flight
@endsection

@section('content')
<!-- ====================== Page Title ================= -->	
<x-landing-title title="Flight" current_page="Flight"/>
<!-- ====================== Page Title ================= -->
<div class="clearfix"></div>				  

<!-- ====================== Flight Information ================= -->
<section class="gray-bg">
	<div class="container">
		
		<!-- row -->
		<div class="row">
			{{-- <div class="col-12">
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

			</div> --}}
			<div class="col-md-6">
				<div class="tr-single-box">
					<div class="tr-single-header">
						<h4><i class="fa fa-plane"></i>Flight Information</h4>
					</div>
					<div class="tr-single-body">
						<div class="booking-price-detail side-list no-border">
							<h5>Full insight about a flight and available seats</h5>
							<ul>
								<li>Flight ID:<strong class="pull-right">{{ $flight->flight_id }}</strong></li>
								<li>Airline:<strong class="pull-right">{{ $flight->airline->name }}</strong></li>
								<li>Origin:<strong class="pull-right">{{ $flight->origin->city.'/'.$flight->origin->country }}</strong></li>
								<li>Destination:<strong class="pull-right">{{ $flight->destination->city.'/'.$flight->destination->country }}</strong></li>
								<li>Departure Time:<strong class="pull-right">{{ Date('d M, Y H:i A', strtotime($flight->departure_time)) }}</strong></li>
								<li>Calculated Arrival Time:<strong class="pull-right">{{ Date('d M, Y H:i A', strtotime($flight->arrival_time)) }}</strong></li>
								<li>Number Of Seats/Passengers:<strong class="pull-right">{{ $flight->available_seats }}</strong></li>
								<li>Status:<strong class="pull-right">{{ $flight->status }}</strong></li>
							</ul>
						</div>
						<div class="booking-price-detail side-list no-border">
							<h5>Features include</h5>
							<div class="include-features">
								<span class="features-tag">Free Parking</span>
								<span class="features-tag">Indoor pool</span>
								<span class="features-tag">Security cameras</span>
								<span class="features-tag">Hot Water</span>
								<span class="features-tag">Spa/Sauna</span>
								<span class="features-tag">Free Wifi</span>
							</div>
						</div>
					</div>
				</div>
			</div>
			
			<div class="col-md-6">
				<div class="tr-single-box">
					<div class="tr-single-header">
						<h4><i class="ti-wheelchair"></i>Available Seats</h4>
					</div>
					<div class="tr-single-body">
						<div class="table-responsive">
							<table class="table table-striped">
								<thead>
								  <tr>
									<th scopre="col">Seat Number</th>
									<th scopre="col">Seat Class</th>
									<th scopre="col">Cost</th>
									<th scopre="col">Action</th>
								  </tr>
								</thead>
								<tbody>
									@if(count($seats) > 0)
										@foreach($seats as $seat)
											<tr>
												<td>{{ $seat->seat_number }}</td>
												<td>{{ $seat->seat_class }}</td>
												<td>${{ $seat->price }}</td>
												<td><a href="{{ route('book_flight', ['id' => $seat->id]) }}" class="btn theme-btn cl-white seub-btn">Book</a></td>
											</tr>
										@endforeach
									@else
										<tr>
											<td>No Available Seats</td>
										</tr>
									@endif
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- ====================== Flight Information ================= -->
<div class="clearfix"></div>
@endsection