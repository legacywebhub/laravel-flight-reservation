@extends('dashboard.layout')

@section('title')
{{ $company->name }} | Flights
@endsection

@section('content')
<div class="col-lg-10 col-md-10 col-sm-9 col-lg-push-2 col-md-push-2 col-sm-push-3">
    <div class="row mrg-0 mrg-top-20">
        <div class="tr-single-box">
            <div class="tr-single-header">
                <h3 class="dashboard-title">Flights</h3>
            </div>
            <div class="tr-single-body">
                <!-- row -->
                <div class="row">
                    <div class="col-9">
                        <form action="{{ route('dashboard.flights') }}" method="POST">
                            @csrf
                            <p>Search origin, destination and departure date</p>
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
                        </form>
                    </div>
                    
                </div>
                <!-- /row -->
                
                <!-- row -->
                <div class="row mrg-top-30">
                    <div class="col-12">
                        <div class="tr-single-box">
                            <div class="tr-single-header">
                                <h4 class="mb-0">Available Flights</h4>
                            </div>
                            <div class="tr-single-body">
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
                                                        <td><a href="{{ route('dashboard.flight', ['id' => $flight->id]) }}" class="btn theme-btn cl-white seub-btn">View Flight</a></td>
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
                </div>
                <!-- /row -->
                
            </div>
        </div>
    </div>
</div>
@endsection