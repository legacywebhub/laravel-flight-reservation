@extends('dashboard.layout')

@section('title')
{{ $company->name }} | Flight Info
@endsection

@section('content')
<div class="col-lg-10 col-md-10 col-sm-9 col-lg-push-2 col-md-push-2 col-sm-push-3">
    <div class="row mrg-0 mrg-top-20">
        <div class="tr-single-box">
            <div class="tr-single-header">
                <h3 class="dashboard-title">Flights Info</h3>
            </div>
            <div class="tr-single-body">
                <!-- row -->
                <div class="row">
                    <div class="col-12 col-md-9 grid-margin stretch-card">
                        <div class="card">
                          <div class="card-body">
                            <div class="booking-price-detail side-list no-border">
                                <h5>Full insight about a flight and connected models</h5>
                                <ul>
                                    <li>Flight ID:<strong class="pull-right">{{ $flight->flight_id }}</strong></li>
                                    <li>Airline:<strong class="pull-right">{{ $flight->airline->name }}</strong></li>
                                    <li>Departure Location/From:<strong class="pull-right">{{ $flight->origin->city.'/'.$flight->origin->country }}</strong></li>
                                    <li>Destination/To:<strong class="pull-right">{{ $flight->destination->city.'/'.$flight->destination->country }}</strong></li>
                                    <li>Departure Time:<strong class="pull-right">{{ Date('d M, Y H:i A', strtotime($flight->departure_time)) }}</strong></li>
                                    <li>Expected Arrival Time:<strong class="pull-right">{{ Date('d M, Y H:i A', strtotime($flight->arrival_time)) }}</strong></li>
                                    <li>Number Of Seats/Passengers:<strong class="pull-right">{{ $flight->available_seats }}</strong></li>
                                    <li>Status:<strong class="pull-right">{{ $flight->status }}</strong></li>
                                </ul>
                            </div>
                
                            <h4 class="text-center mrg-top-40">Available Seats</h4>
                            <div class="table-responsive">
                                <table class="table table-hover">
                                  <thead>
                                    <tr>
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
                                            <td class="text-uppercase">{{ $seat->seat_number }}</td>
                                            <td class="text-capitalize">{{ $seat->seat_class }}</td>
                                            <td>${{ $seat->price }}</td>
                                            <td><a href="{{ route('dashboard.book_flight', ['id' => $seat->id]) }}" class="btn btn-outline-success btn-fw">Book</a></td>
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
                <!-- /row -->
                
            </div>
        </div>
    </div>
</div>
@endsection