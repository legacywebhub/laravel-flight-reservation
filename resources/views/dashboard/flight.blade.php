@extends('dashboard.layout')

@section('title')
{{ $company->name }} | Flight Info
@endsection

@section('content')
<div class="row">
    <div class="col-12 col-md-9 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h2 class="font-weight-bold my-2">Flight Info</h2>
            <p class="card-description">
              Full insight about a flight and connected models
            </p>
            <ul class="list-ticked">
                <li class="mt-1">
                    <span class="lead mr-5">Flight ID:</span>
                    <span class="lead ml-5 text-primary">{{ $flight->id }}</span>
                </li>
                <li class="mt-1">
                    <span class="lead mr-5">Airline:</span>
                    <span class="lead ml-5 text-primary">{{ $flight->airline->name }}</span>
                </li>
                <li class="mt-1">
                    <span class="lead mr-5">Departure Location/From:</span>
                    <span class="lead ml-5 text-primary">{{ $flight->origin->city.'/'.$flight->origin->country }}</span>
                </li>
                <li class="mt-1">
                    <span class="lead mr-5">Destination/To:</span>
                    <span class="lead ml-5 text-primary">{{ $flight->destination->city.'/'.$flight->destination->country }}</span>
                </li>
                <li class="mt-1">
                    <span class="lead mr-5">Departure Time:</span>
                    <span class="lead ml-5 text-primary">{{ Date('d M, Y H:i A', strtotime($flight->departure_time)) }}</span>
                </li>
                <li class="mt-1">
                    <span class="lead mr-5">Calculated Arrival Time:</span>
                    <span class="lead ml-5 text-primary">{{ Date('d M, Y H:i A', strtotime($flight->arrival_time)) }}</span>
                </li>
                <li class="mt-1">
                    <span class="lead mr-5">Number Of Seats/Passengers:</span>
                    <span class="lead ml-5 text-primary">{{ $flight->available_seats }}</span>
                </li>
                <li class="mt-1">
                    <span class="lead mr-5">Price:</span>
                    <span class="lead ml-5 text-primary">${{ $flight->price }}</span>
                </li>
                <li class="mt-1">
                    <span class="lead mr-5">Status:</span>
                    <span class="lead ml-5 text-primary text-capitalize">{{ $flight->status }}</span>
                </li>
            </ul>

            <h2 class="font-weight-bold mt-4">Available Seats</h2>
            <div class="table-responsive">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Seat Number</th>
                      <th>Class</th>
                      <th>Price</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    @if(count($seats) > 0)
                        @foreach($seats as $seat)
                        <tr>
                            <td>{{ $seat->index() }}</td>
                            <td class="text-uppercase">{{ $seat->seat_number }}</td>
                            <td class="text-capitalize">{{ $seat->seat_class }}</td>
                            <td>${{ $seat->price }}</td>
                            <td><a href="{{ url('user/book/').$seat->id }}" class="btn btn-outline-success btn-fw">Book</a></td>
                        </tr>
                        @endforeach
                    @else
                        <tr>
                            <td></td>
                            <td>No Available Seats</td>
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