@extends('dashboard.layout')

@section('title')
{{ $company->name }} | Invoice
@endsection

@section('content')
<!-- ======================= Start Invoice ===================== -->
<div class="col-lg-10 col-md-10 col-sm-9 col-lg-push-2 col-md-push-2 col-sm-push-3">
    <div class="row mrg-0 mrg-top-20">
        <div class="tr-single-box">
            <div class="tr-single-header">
                <h3 class="dashboard-title">View Invoice</h3>
            </div>
            <div class="tr-single-body">
                    
                <div class="detail-wrapper padd-top-30 padd-bot-30">
        
                    <div class="row text-center">
                        <div class="col-md-12">
                            <a href="javascript:window.print()" class="btn theme-btn">Print this invoice</a>
                        </div>
                    </div>
                    
                    <div class="row mrg-0">
                        <div class="col-md-6">
                            <div id="logo"><img src="{{ asset('assets/img/logo.png') }}" class="img-responsive" alt=""></div>
                        </div>

                        <div class="col-md-6">	
                            <p id="invoice-info">
                                <strong>Booking ID:</strong> # {{ $seat_booking->booking_id }} <br>
                                <strong>Issued:</strong> {{ Date('d M, Y H:i A', strtotime($seat_booking->date)) }} <br>
                            </p>
                        </div>
                        
                    </div>
                    
                    <div class="row  mrg-0 detail-invoice">
                    
                        <div class="col-md-12">
                            <h2>INVOICE</h2>
                        </div>
                        
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-lg-7 col-md-7 col-sm-7">
                                
                                <h4>Billed to: </h4>
                                <h5>{{ $seat_booking->name }}</h5>
                                <p>
                                    {{ $seat_booking->email }}<br>
                                    
                                    {{ $seat_booking->phone }}<br>
                                    
                                    {{ $seat_booking->address }}<br>
                                </p>
                                
                                </div>
                                <div class="col-lg-5 col-md-5 col-sm-5">
                                    <h4>Booking Info:</h4>
                                    <strong class="mrg-r-10">Booking ID:</strong>{{ $seat_booking->booking_id }}<br>
                                    <strong class="mrg-r-10">Flight ID:</strong>{{ $seat_booking->seat->flight->flight_id }}<br>
                                    <strong class="mrg-r-10">Seat ID:</strong>{{ $seat_booking->seat->id }}<br>
                                    <strong class="mrg-r-10">Seat Number:</strong>{{ $seat_booking->seat->seat_number }}<br>
                                    <strong class="mrg-r-10">Seat Class:</strong>{{ $seat_booking->seat->seat_class }}<br>
                                    <strong class="mrg-r-10">Seat Price:</strong>${{ $seat_booking->seat->price }}<br>
                                    <strong class="mrg-r-10">Seat Status:</strong>{{ $seat_booking->seat->status }}<br>
                                </div>
                                <div class="col-12">
                                    <h4>Payment Info:</h4>
                                    <strong class="mrg-r-10">Reference ID:</strong>{{ $seat_booking->payment->reference_id }}<br>
                                    <strong class="mrg-r-10">Amount:</strong>${{ $seat_booking->payment->amount }}<br>
                                    <strong class="mrg-r-10">Payment Method:</strong>{{ $seat_booking->payment->payment_method }}<br>
                                    <strong class="mrg-r-10">Payment Status:</strong>{{ $seat_booking->payment->payment_status }}<br>
                                    <strong class="mrg-r-10">Payment Date:</strong>{{ Date('d M, Y H:i A', strtotime($seat_booking->payment->payment_date)) }}
                                </div>
                            </div>
                        </div>
                        <hr />
                        
                        
                        <div class="col-lg-12 col-md-12 col-sm-12 mrg-top-30">
                            <strong>COST SUMMARY</strong>
                            <div class="invoice-table">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>S/N</th>
                                                <th>Item</th>
                                                <th>Price</th>
                                                <th>Quantity</th>
                                                <th>Totals</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>Flight Ticket</td>
                                                <td>${{ $seat_booking->payment->amount }}</td>
                                                <td>1</td>
                                                <td>${{ $seat_booking->payment->amount }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <hr>
                                <div>
                                    <h5>Subtotal : {{ 0.9 * $seat_booking->payment->amount }} USD</h5>
                                </div>
                                <hr>
                                <div>
                                    <h5>Taxes : {{ 0.1 * $seat_booking->payment->amount }} USD </h5>
                                </div>
                                <hr>
                                <div>
                                    <h4>Total : {{ $seat_booking->payment->amount }} USD </h4>
                                </div>
                            </div>

                            @if($seat_booking->seat->status == 'booked')
                            <div class="col-lg-12 mrg-top-30">
                                <p>Dear Customer,</p>
                
                                <p>Thank you for booking your flight with us. Please proceed to the airport and present your booking ID for ticket collection:</p>
                
                                <p>Booking ID: {{ $seat_booking->booking_id }}</p>
                
                                <p>Safe travels!</p>
                
                                <p>Best regards,<br>{{ $company->name }}</p>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</div>
<!-- ======================= End  Invoice===================== -->
@endsection