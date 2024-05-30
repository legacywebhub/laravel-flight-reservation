@extends('dashboard.layout')

@section('title')
{{ $company->name }} | Bookings
@endsection

@section('content')
<div class="col-lg-10 col-md-10 col-sm-9 col-lg-push-2 col-md-push-2 col-sm-push-3">
    <div class="row mrg-0 mrg-top-20">
        <div class="tr-single-box">
            <div class="tr-single-header">
                <h3 class="dashboard-title">My Bookings</h3>
            </div>
            <div class="tr-single-body">
                <!-- row -->
                <div class="row mrg-bot-15">
                    <form action="{{ route('dashboard.bookings') }}">
                        @csrf
                        <div class="col-md-4 col-sm-7">
                            <input type="text" name="search" class="form-control height-50" maxlength="30" placeholder="Search booking ID">
                        </div>
                        <div class="col-md-6 col-sm-5">
                            <button class="btn theme-btn height-50 width-150">Search</button>
                        </div>
                    </form>
                </div>
                <!-- /row -->
                
                <!-- row -->
                <div class="row mrg-top-40">
                    <div class="col-12">
                        <div class="tr-single-box">
                            <div class="tr-single-header">
                                <h4 class="mb-0">My Bookings</h4>
                            </div>
                            <div class="tr-single-body">
                                <!-- row -->
                                <div class="table-responsive mrg-30">
                                    <table class="table table-striped">
                                        <thead>
                                          <tr>
                                            <th scopre="col">Date & Time</th>
                                            <th scopre="col">Booking ID</th>
                                            <th scopre="col">Flight ID</th>
                                            <th scopre="col">Seat Number</th>
                                            <th scopre="col">Amount</th>
                                            <th scopre="col">Actions</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                            @if(count($bookings) > 0)
                                                @foreach($bookings as $booking)
                                                    <tr>
                                                        <td>{{ Date('d M, Y H:i A', strtotime($booking->date))  }}</td>
                                                        <td>{{ $booking->booking_id }}</td>
                                                        <td>{{ $booking->seat->flight_id }}</td>
                                                        <td>{{ $booking->seat->seat_number }}</td>
                                                        <td>${{ $booking->amount }}</td>
                                                        <td><a href="{{ route('dashboard.invoice', ['booking_id' => $booking->booking_id]) }}" class="btn theme-btn cl-white seub-btn">View Invoice</a></td>
                                                    </tr>
                                                @endforeach
                                            @else
                                                <tr>
                                                    <td>No Bookings Yet</td>
                                                </tr>
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                                <div class="bs-example">
                                    <ul class="pagination">
                                        <li class="page-item">
                                          <a class="page-link" href="#" aria-label="Previous">
                                            <span class="ti-arrow-left"></span>
                                            <span class="sr-only">Previous</span>
                                          </a>
                                        </li>
                                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                                        <li class="page-item active"><a class="page-link" href="#">3</a></li>
                                        <li class="page-item"><a class="page-link" href="#">4</a></li>
                                        <li class="page-item"><a class="page-link" href="#">5</a></li>
                                        <li class="page-item">
                                          <a class="page-link" href="#" aria-label="Next">
                                            <span class="ti-arrow-right"></span>
                                            <span class="sr-only">Next</span>
                                          </a>
                                        </li>
                                    </ul>
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