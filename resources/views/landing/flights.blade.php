@extends('landing.layout') 

@section('title')
{{ $company->name }} | Flights
@endsection

@section('content')
<!-- start banner Area -->
<section class="relative about-banner">	
	<div class="overlay overlay-bg"></div>
	<div class="container">				
		<div class="row d-flex align-items-center justify-content-center">
			<div class="about-content col-lg-12">
				<h1 class="text-white">
					Flights		
				</h1>	
				<p class="text-white link-nav"><a href="{{ url('/') }}">Home </a>  <span class="lnr lnr-arrow-right"></span>  <a href="javascript:void(0);"> Flights</a></p>
			</div>	
		</div>
	</div>
</section>
<!-- End banner Area -->				  

<!-- Start filter flights Area -->
<section class="other-issue-area section-gap">
	<div class="container">
        <div class="row">
            <div class="title mb-5">
                <h1> Filter Flights</h1>
				<p class="mt-2">Search by origin, destination and departure date</p>
            </div>
			<div class="col-12 mb-4">
                <form action="{{ url('/flights') }}" method="POST">
                    @csrf
                    <div class="row">
                      <div class="col-3">
                        <input type="text" name="origin" class="form-control" placeholder="Origin" maxlength="100">
                      </div>
                      <div class="col-3">
                        <input type="text" name="destination" class="form-control" placeholder="Destination" maxlength="100">
                      </div>
                      <div class="col-3">
                        <input type="date" name="departure_date" class="form-control" placeholder="Departure Time">
                      </div>
                      <div class="col-3">
                        <button class="primary-btn text-uppercase">Search</button>
                      </div>
                    </div>
                  </form>
            </div>
        </div>
	</div>	
</section>
<!-- End filter flights Area -->

<!-- Start flights Area -->
<section class="other-issue-area section-gap">
	<div class="container">
		<div class="row d-flex justify-content-center">
			<div class="menu-content pb-70 col-lg-9">
				<div class="title text-center">
					<h1 class="mb-10">
                        Available Flights
                    </h1>
				</div>
			</div>
		</div>					
		<div class="row">
			<div class="col-12">
				<div class="progress-table-wrap">
					<div class="progress-table">
						<div class="table-head">
							<div class="visit">Flight ID</div>
							<div class="visit">From</div>
							<div class="visit">To</div>
							<div class="visit">Departure Time</div>
							<div class="visit">Arrival Time</div>
							<div class="visit">Actions</div>
						</div>
						@if(count($flights) > 0)
							@foreach($flights as $flight)
							<div class="table-row">
								<div class="visit">{{ $flight->flight_id }}</div>
								<div class="visit">{{ $flight->origin->city.'/'.$flight->origin->country }}</div>
								<div class="visit">{{ $flight->destination->city.'/'.$flight->destination->country }}</div>
								<div class="visit">{{ Date('d M, Y H:i A', strtotime($flight->departure_time)) }}</div>
								<div class="visit">{{ Date('d M, Y H:i A', strtotime($flight->arrival_time)) }}</div>
								<div class="visit"><a href="{{ route('flight', ['id' => $flight->id]) }}" class="primary-btn text-uppercase">View</a></div>
							</div>
							@endforeach
							<nav class="blog-pagination justify-content-center d-flex">
		                        <ul class="pagination">
		                            <li class="page-item">
		                                <a href="#" class="page-link" aria-label="Previous">
		                                    <span aria-hidden="true">
		                                        <span class="lnr lnr-chevron-left"></span>
		                                    </span>
		                                </a>
		                            </li>
		                            <li class="page-item"><a href="#" class="page-link">01</a></li>
		                            <li class="page-item active"><a href="#" class="page-link">02</a></li>
		                            <li class="page-item"><a href="#" class="page-link">03</a></li>
		                            <li class="page-item"><a href="#" class="page-link">04</a></li>
		                            <li class="page-item"><a href="#" class="page-link">09</a></li>
		                            <li class="page-item">
		                                <a href="#" class="page-link" aria-label="Next">
		                                    <span aria-hidden="true">
		                                        <span class="lnr lnr-chevron-right"></span>
		                                    </span>
		                                </a>
		                            </li>
		                        </ul>
		                    </nav>
						@else
							<div class="table-row">
								<div class="visit">No Flights</div>
							</div>
						@endif
					</div>
				</div>
			</div>																	
		</div>
    </div>
</section>
<!-- End flights Area -->
@endsection