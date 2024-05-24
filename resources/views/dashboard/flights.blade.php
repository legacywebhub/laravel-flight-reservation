@extends('dashboard.layout')

@section('title')
{{ $company->name }} | Flights
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <h4 class="card-title">Search Flight</h4>
                    <form class="form-inline" action="{{ url('/user/flights') }}" method="post">  
                        @csrf
                        <div class="form-group">
                            <label for="origin">Origin</label>
                            <input type="text" name="origin" class="form-control" id="origin" placeholder="Origin">
                        </div>

                        <div class="form-group">
                            <label for="destination">Destination</label>
                            <input type="text" name="destination" class="form-control" id="destination" placeholder="Destination">
                        </div>

                        <div class="form-group">
                            <label for="departure_time">Departure Time</label>
                            <input type="date" name="departure_time" class="form-control" id="departure_time" placeholder="Departure Time">
                        </div>

                        <div class="form-group">
                            <label for="destination">Arrival Time</label>
                            <input type="date" name="arrival_time" class="form-control" id="arrival_time" placeholder="Arrival Time">
                        </div>

                        <button type="submit" class="btn btn-primary mb-2">Search</button>
                    </form>
                </div>

                <div class="row mt-5">
                    <h4 class="card-title my-3">All Flight</h4>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Flight ID</th>
                                    <th>From</th>
                                    <th>To</th>
                                    <th>Price</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(count($flights) > 0)
                                    @foreach($flights as $flight)
                                    <tr>
                                        <td>{{$flight->id}}</td>
                                        <td>{{$flight->origin->city.'/'.$flight->origin->country}}</td>
                                        <td>{{$flight->destination->city.'/'.$flight->destination->country}}</td>
                                        <td>${{$flight->price}}</td>
                                        <td class="d-flex">
                                            <a href="">View</a>
                                            <a href="">Book</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td>No Flights</td>
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
</div>
@endsection