@extends('dashboard.layout')

@section('title')
{{ $company->name }} | Dashboard
@endsection

@section('content')
<div class="col-lg-10 col-md-10 col-sm-9 col-lg-push-2 col-md-push-2 col-sm-push-3">
    <div class="row mrg-0 mrg-top-20">
        <div class="tr-single-box">
            <div class="tr-single-header">
                <h3 class="dashboard-title">Dashboard</h3>
            </div>
            <div class="tr-single-body">
                <!-- row -->
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="widget simple-widget">
                            <div class="rwidget-caption info">
                                <div class="row">
                                    <div class="col-xs-4 padd-r-0">
                                        <i class="cl-info icon ti-receipt"></i>
                                    </div>
                                    <div class="col-xs-8">
                                        <div class="widget-detail">
                                            <h3>{{ count(Auth::user()->seat_bookings) }}</h3>
                                            <span>Total Bookings</span>
                                        </div>
                                    </div>
                                    <div class="col-xs-12">
                                        <div class="widget-line">
                                            <span style="width:80%;" class="bg-info widget-horigental-line"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-6 col-sm-12">
                        <div class="widget simple-widget">
                            <div class="widget-caption danger">
                                <div class="row">
                                    <div class="col-xs-4 padd-r-0">
                                        <i class="cl-danger icon ti-alert"></i>
                                    </div>
                                    <div class="col-xs-8">
                                        <div class="widget-detail">
                                            <h3>{{ count(Auth::user()->notifications) }}</h3>
                                            <span>Total Messages</span>
                                        </div>
                                    </div>
                                    <div class="col-xs-12">
                                        <div class="widget-line">
                                            <span style="width:50%;" class="bg-danger widget-horigental-line"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /row -->

                <!-- row -->
                @if(count($upcoming_flights) > 0)
                <div class="row mrg-top-30">
                    <div class="col-12">
                        <div class="tr-single-box">
                            <div class="tr-single-header">
                                <h4 class="mb-0">Upcoming Flights</h4>
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
                                            @foreach($upcoming_flights as $flight)
                                                <tr>
                                                    <td>{{ $flight->flight_id }}</td>
                                                    <td>{{ $flight->origin->city.'/'.$flight->origin->country }}</td>
                                                    <td>{{ $flight->destination->city.'/'.$flight->destination->country }}</td>
                                                    <td>{{ Date('d M, Y H:i A', strtotime($flight->departure_time)) }}</td>
                                                    <td>{{ Date('d M, Y H:i A', strtotime($flight->arrival_time)) }}</td>
                                                    <td><a href="{{ route('dashboard.flight', ['id' => $flight->id]) }}" class="btn theme-btn cl-white seub-btn">View Flight</a></td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
                <!-- /row -->  
                
                <!-- row -->
                <div class="row">
                    <div class="tr-single-box">
                      <div class="tr-single-header">
                        <h4><i class="ti-credit-card"></i>Payment Methods</h4>
                      </div>
                      <div class="tr-single-body">
                        <!-- Paypal Option -->
                        <div class="payment-card">
                          <header class="payment-card-header cursor-pointer" data-toggle="collapse" data-target="#paypal" aria-expanded="true">
                            <div class="payment-card-title flexbox">
                              <h4>PayPal</h4>
                            </div>
                            <div class="pull-right">
                              <img src="{{ asset('assets/img/paypal.png') }}" class="img-responsive" alt=""> 
                            </div>
                          </header>
                          {{-- <div class="collapse" id="paypal" aria-expanded="false">
                            <div class="payment-card-body">
                              <div class="row mrg-bot-20">
                                <div class="col-sm-6">
                                  <span class="custom-checkbox d-block font-12">
                                    <input type="checkbox" id="privacy">
                                    <label for="privacy"></label>
                                    Have a promo code?
                                  </span>
                                  <input type="text" class="form-control">
                                </div>
                                <div class="col-sm-6 padd-top-10 text-right">
                                  <label>Total Order</label>
                                  <h2 class="mrg-0"><span class="theme-cl">$</span>1170</h2>
                                </div>
                                <div class="col-sm-12 bt-1 padd-top-15">
                                  <span class="custom-checkbox d-block font-12">
                                    <input type="checkbox" id="privacy">
                                    <label for="privacy"></label>
                                    By ordering you are agreeing to our <a href="#" class="theme-cl">Privacy policy</a>.
                                  </span>
                                  <button type="submit" class="btn btn-m btn-success">Checkout</button>
                                </div>
                              </div>
                            </div>
                          </div> --}}
                        </div>
                        
                        <!-- Debit card option -->
                        <div class="payment-card">
                          <header class="payment-card-header cursor-pointer" data-toggle="collapse" data-target="#debit-credit" aria-expanded="true">
                            <div class="payment-card-title flexbox">
                              <h4>Credit / Debit Card</h4>
                            </div>
                            <div class="pull-right">
                              <img src="{{ asset('assets/img/credit.png') }}" class="img-responsive" alt=""> 
                            </div>
                          </header>
                          {{-- <div class="collapse" id="debit-credit" aria-expanded="false">
                            <div class="payment-card-body">
                              <div class="row mrg-bot-20">
                                <div class="col-sm-6">
                                  <label>Card Holder Name</label>
                                  <input type="text" class="form-control" placeholder="Daniel Singh">
                                </div>
                                <div class="col-sm-6">
                                  <label>Card No.</label>
                                  <input type="email" class="form-control" placeholder="1235 4785 4758 1458">
                                </div>
                              </div>
                              <div class="row mrg-bot-20">
                                <div class="col-sm-4 col-md-4">
                                  <label>Expire Month</label>
                                  <input type="text" class="form-control" placeholder="07">
                                </div>
                                <div class="col-sm-4 col-md-4">
                                  <label>Expire Year</label>
                                  <input type="email" class="form-control" placeholder="2020">
                                </div>
                                <div class="col-sm-4 col-md-4">
                                  <label>CCV Code</label>
                                  <input type="email" class="form-control" placeholder="258">
                                </div>
                              </div>
                              <div class="row mrg-bot-20">
                                <div class="col-sm-7">
                                  <span class="custom-checkbox d-block font-12">
                                    <input type="checkbox" id="privacy">
                                    <label for="privacy"></label>
                                    Have a promo code?
                                  </span>
                                  <input type="text" class="form-control">
                                </div>
                                <div class="col-sm-5 padd-top-10 text-right">
                                  <label>Total Order</label>
                                  <h2 class="mrg-0"><span class="theme-cl">$</span>1170</h2>
                                </div>
                                <div class="col-sm-12 bt-1 padd-top-15">
                                  <span class="custom-checkbox d-block font-12">
                                    <input type="checkbox" id="privacy">
                                    <label for="privacy"></label>
                                    By ordering you are agreeing to our <a href="#" class="theme-cl">Privacy policy</a>.
                                  </span>
                                  <button type="submit" class="btn btn-m btn-success">Checkout</button>
                                </div>
                              </div>
                            </div>
                          </div> --}}
                        </div>
                        
                      </div>
                    </div>
                  </div>
                  <!-- /row -->
                
                {{-- <!-- row -->
                <div class="row">
                    <div class="col-md-8 col-sm-12">
                        <div class="tr-single-box">
                            <div class="tr-single-header">
                                <h4 class="mb-0">Extra Area Chart</h4>
                            </div>
                            <div class="tr-single-body">
                                <ul class="list-inline text-center m-t-40">
                                    <li>
                                        <h5><i class="fa fa-circle m-r-5 cl-purple"></i>Booking 220</h5>
                                    </li>
                                    <li>
                                        <h5><i class="fa fa-circle m-r-5 cl-inverse"></i>Cancelation 20</h5>
                                    </li>
                                    <li>
                                        <h5><i class="fa fa-circle m-r-5 cl-success"></i>Earning $220</h5>
                                    </li>
                                </ul>
                                <div class="chart" id="extra-area-chart" style="height: 350px;"></div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-4 col-sm-12">
                        <div class="tr-single-box">
                            <div class="tr-single-header">
                                <h5>Recen Booking</h5>
                            </div>
                            <div class="ground-list ground-list-hove">
                                <div class="ground ground-single-list">
                                    <a href="#">
                                        <img class="ground-avatar" src="assets/img/user-1.jpg" alt="...">
                                        <span class="profile-status bg-online pull-right"></span>
                                    </a>

                                    <div class="ground-content">
                                        <h6><a href="#">Maryam Amiri</a></h6>
                                        <small class="text-fade">Co-Founder</small>
                                    </div>

                                    <div class="ground-right">
                                        <span class="small">Online</span>
                                    </div>
                                </div>
                                
                                <div class="ground ground-single-list">
                                    <a href="#">
                                        <img class="ground-avatar" src="assets/img/user-2.jpg" alt="...">
                                        <span class="profile-status bg-offline pull-right"></span>
                                    </a>

                                    <div class="ground-content">
                                        <h6><a href="#">Maryam Amiri</a></h6>
                                        <small class="text-fade">Co-Founder</small>
                                    </div>

                                    <div class="ground-right">
                                        <span class="small">10 Min Ago</span>
                                    </div>
                                </div>
                                
                                <div class="ground ground-single-list">
                                    <a href="#">
                                        <img class="ground-avatar" src="assets/img/user-3.jpg" alt="...">
                                        <span class="profile-status bg-working pull-right"></span>
                                    </a>

                                    <div class="ground-content">
                                        <h6><a href="#">Maryam Amiri</a></h6>
                                        <small class="text-fade">Co-Founder</small>
                                    </div>

                                    <div class="ground-right">
                                        <span class="small">20 Min Ago</span>
                                    </div>
                                </div>
                                
                                <div class="ground ground-single-list">
                                    <a href="#">
                                        <img class="ground-avatar" src="assets/img/user-4.jpg" alt="...">
                                        <span class="profile-status bg-busy pull-right"></span>
                                    </a>

                                    <div class="ground-content">
                                        <h6><a href="#">Maryam Amiri</a></h6>
                                        <small class="text-fade">Co-Founder</small>
                                    </div>

                                    <div class="ground-right">
                                        <span class="small">18 Min Ago</span>
                                    </div>
                                </div>
                                
                                <div class="ground ground-single-list">
                                    <a href="#">
                                        <img class="ground-avatar" src="assets/img/user-5.jpg" alt="...">
                                        <span class="profile-status bg-online pull-right"></span>
                                    </a>

                                    <div class="ground-content">
                                        <h6><a href="#">Maryam Amiri</a></h6>
                                        <small class="text-fade">Co-Founder</small>
                                    </div>

                                    <div class="ground-right">
                                        <span class="small">Online</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /row --> --}}
            </div>
        </div>
    </div>
</div>
@endsection