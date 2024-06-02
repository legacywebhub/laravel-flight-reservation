@extends('landing.layout') 

@section('title')
{{ $company->name }} | Flights
@endsection

@section('content')
<!-- ====================== Page Title ================= -->	
<x-landing-title title="Flights" current_page="Flights"/>
<!-- ====================== Page Title ================= -->
<div class="clearfix"></div>

<!-- ====================== Filter/Search Flight ================= -->
<section>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="heading">
					<h1>Filter Flights</h1>
					<span class="theme-cl">Search by origin, destination and departure date</span>
				</div>
			</div>
		</div>	
		<div class="row">
			<div class="form-div">
                <form action="{{ route('flights') }}" method="POST">
                    @csrf
                    <div class="row">
                      <div class="form-group">
                        <input type="text" name="origin" class="form-control" placeholder="Origin" maxlength="100">
                      </div>
                      <div class="form-group">
                        <input type="text" name="destination" class="form-control" placeholder="Destination" maxlength="100">
                      </div>
                      <div class="form-group">
                        <input type="date" name="departure_date" class="form-control" placeholder="Departure Time">
                      </div>
                      <div class="form-group">
                        <button type="submit" class="btn theme-btn cl-white seub-btn">Search</button>
                      </div>
                    </div>
                </form>
			</div>
		</div>	
	</div>
</section>
<!-- ====================== Filter/Search Flight ================= -->
<div class="clearfix"></div>

<!-- ====================== Flights ================= -->
<section>
	<div class="container">
        <div class="row">
			<div class="col-md-12">
				<div class="heading">
					<h1>Available Flights</h1>
					<span class="theme-cl">Search by origin, destination and departure date</span>
				</div>
			</div>
		</div>				
		<div class="row">
			<div class="col-12">
				<div class="table-responsive">
					<table class="table table-striped">
						<thead>
						  <tr>
							<th scopre="col">Flight ID</th>
							<th scopre="col">From</th>
							<th scopre="col">To</th>
							<th scopre="col">Departure Time</th>
							<th scopre="col">Arrival Time</th>
							<th scopre="col">Actions</th>
						  </tr>
						</thead>
						<tbody>
							@if(count($flights) > 0)
								@foreach($flights as $flight)
									<tr>
										<td>{{ $flight->flight_id }}</td>
										<td>{{ $flight->origin->city.'/'.$flight->origin->country }}</td>
										<td>{{ $flight->destination->city.'/'.$flight->destination->country }}</td>
										<td>{{ Date('d M, Y H:i A', strtotime($flight->departure_time)) }}</td>
										<td>{{ Date('d M, Y H:i A', strtotime($flight->arrival_time)) }}</td>
										<td><a href="{{ route('flight', ['id' => $flight->id]) }}" class="btn theme-btn cl-white seub-btn">View Flight</a></td>
									</tr>
								@endforeach
							@else
								<tr>
									<td>No Flights</td>
								</tr>
							@endif
						</tbody>
					</table>
				</div>
				@if(count($flights) > 0)
				<div style="margin: 30px 30px; display: flex; justify-content:space-between; align-items:center;">
					<div>
						Showing Page <b>{{ $flights->currentPage() }}</b> of <b>{{ $flights->lastPage() }}</b>
					</div>
					<div class="bs-example">
						<ul class="pagination">
							@if ($flights->onFirstPage())
								<li class="page-item">
									<a class="page-link" href="javascript:void(0);" aria-label="Previous">
										<span class="ti-arrow-left"></span>
										<span class="sr-only">Previous</span>
									</a>
								</li>
							@else
								<li class="page-item">
									<a class="page-link" href="{{ $flights->previousPageUrl() }}" aria-label="Previous">
										<span class="ti-arrow-left"></span>
										<span class="sr-only">Previous</span>
									</a>
								</li>
							@endif
	
							<li class="page-item active"><a class="page-link" href="javascript:void(0);">{{ $flights->currentPage() }}</a></li>
	
							@if ($flights->hasMorePages())
								<li class="page-item">
									<a class="page-link" href="{{ $flights->nextPageUrl() }}" aria-label="Next">
										<span class="ti-arrow-right"></span>
										<span class="sr-only">Next</span>
									</a>
								</li>
							@else
								<li class="page-item">
									<a class="page-link" href="javascript:void(0);" aria-label="Next">
										<span class="ti-arrow-right"></span>
										<span class="sr-only">Next</span>
									</a>
								</li>
							@endif
						</ul>
					</div>
				</div>
				@endif
			</div>																	
		</div>
    </div>
</section>
<!-- ====================== Flights ================= -->
<div class="clearfix"></div>
@endsection