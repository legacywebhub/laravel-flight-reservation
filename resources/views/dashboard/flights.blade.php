@extends('dashboard.layout')

@section('title')
{{ $company->name }} | Flights
@endsection

@section('content')
<div class="row">
  <div class="col-12">
    <div class="card">
        <div class="card-body">
          <div>
            <p class="card-title my-3">Search Flight</p>
            <form class="form-inline" action="{{ url('/accounts/flights') }}" method="post">
                <label class="sr-only" for="origin">Origin</label>
                <input type="text" name="origin" class="form-control mb-2 mr-sm-2" id="origin" placeholder="Origin">
              
                <label class="sr-only" for="destination">Destination</label>
                <input type="text" name="destination" class="form-control mb-2 mr-sm-2" id="destination" placeholder="Destination">
                
                <label class="sr-only" for="departure_time">Departure Time</label>
                <input type="date" name="departure_time" class="form-control mb-2 mr-sm-2" id="departure_time" placeholder="Departure Time">
                
                <label class="sr-only" for="destination">Arrival Time</label>
                <input type="date" name="arrival_time" class="form-control mb-2 mr-sm-2" id="arrival_time" placeholder="Arrival Time">
                
                <button type="submit" class="btn btn-primary mb-2">Search</button>
            </form>
          </div>
          
          <div class="table-responsive">
            <p class="card-title mt-5 mb-2">Available Flights</p>
            <table class="table table-striped table-borderless">
              <thead>
                <tr>
                  <th>From</th>
                  <th>To</th>
                  <th>Departure Time</th>
                  <th>Arrival Time</th>
                  <th>Airline</th>
                  <th>Price</th>
                  <th>Actions</th>
                </tr>  
              </thead>
              <tbody>
                @if(count($flights) > 0)
                    @foreach($flights as $flight)
                    <tr>
                        <td>{{ $flight->origin->city.'/'.$flight->origin->country }}</td>
                        <td>{{ $flight->destination->city.'/'.$flight->destination->country }}</td>
                        <td>{{ $flight->departure_time }}</td>
                        <td>{{ $flight->arrival_time }}</td>
                        <td>{{ $flight->airline->name }}</td>
                        <td class="font-weight-medium">{{ '$'.$flight->price }}</td>
                        <td>
                            <a href="{{ url('/account/flight/view/').$flight->id }}">View</a>
                            <a href="{{ url('/account/flight/reserve/').$flight->id }}">Reserve</a>
                            <a href="{{ url('/account/flight/book').$flight->id }}">Book</a>
                        </td>
                    </tr>
                    @endforeach
                @else
                    <tr>
                        <td>No Available Flights For Now</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                @endif
              </tbody>
            </table>
          </div>
        </div>
      </div>
  </div>
</div>
@endsection