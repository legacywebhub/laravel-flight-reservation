@extends('landing.layout')

@section('title')
{{ $company->name }} | Home
@endsection

@section('content')
<!-- ======================= Slide Multiple Booking Start Banner ===================== -->
<section class="main-banner scroll-con-sec hero-section" data-scrollax-parent="true" id="sec1">
	<div class="slideshow-container">
		<!-- slideshow-item -->	
		<div class="slideshow-item">
			<div class="bg"  data-bg="assets/img/banner-6.jpg"></div>
		</div>
		<!--  slideshow-item end  -->	
		<!-- slideshow-item -->	
		<div class="slideshow-item">
			<div class="bg"  data-bg="assets/img/banner-7.jpg"></div>
		</div>
		<!--  slideshow-item end  -->	
		<!-- slideshow-item -->	
		<div class="slideshow-item">
			<div class="bg"  data-bg="assets/img/banner-8.jpg"></div>
		</div>
		<!--  slideshow-item end  -->	                        
	</div>
	<div class="overlay"></div>
	<div class="hero-section-wrap fl-wrap multi-option-booking">
		<div class="container">
			<div class="intro-item fl-wrap">
				
				<div class="padd-15">
					<h1>Make Your Trip</h1>
					<div class="tab" role="tabpanel">
						<!-- Nav tabs -->
						<ul class="nav nav-tabs" role="tablist">
							{{-- <li role="presentation"><a href="#Hotel" aria-controls="profile" role="tab" data-toggle="tab"><i class="fa fa-hotel"></i>Hotel</a></li> --}}
							<li role="presentation" class="active"><a href="#Flight" aria-controls="messages" role="tab" data-toggle="tab"><i class="fa fa-fighter-jet"></i>Flight</a></li>
						</ul>
						<!-- Tab panes -->
					</div>
				</div>
				<div class="tab-content tabs">

					{{-- <!-- Hotel Book Form -->
					<div role="tabpanel" class="tab-pane fade in" id="Hotel">
						<form>
							<fieldset class="home-form-1">
							
								<div class="col-md-3 col-sm-3 padd-0">
									<input type="text" class="form-control br-1" placeholder="City, Country">
								</div>
								
								<div class="col-md-2 col-sm-2 padd-0">
									<select class="wide form-control br-1">
										<option data-display="Person">Person</option>
										<option value="1">01</option>
										<option value="2">02</option>
										<option value="3">03</option>
										<option value="4">04</option>
									</select>
								</div>
								
								<div class="col-md-2 col-sm-2 padd-0">
									<div class="sl-box">
										<select class="wide form-control br-1">
											<option data-display="Children">Children</option>
											<option value="1">01</option>
											<option value="2">02</option>
											<option value="3">03</option>
											<option value="4">04</option>
										</select>
									</div>
								</div>
									
								<div class="col-md-3 col-sm-3 padd-0">
									<input type="text" name="check-in-out" class="form-control br-1" value="Check In & Out">
								</div>
									
								<div class="col-md-2 col-sm-2 padd-0">
									<button type="submit" class="btn theme-btn cl-white seub-btn">FIND Hotel</button>
								</div>
									
							</fieldset>
						</form>
					</div> --}}
					
					<!-- Flight Book Form -->
					<div role="tabpanel" class="tab-pane fade in active" id="Flight">
						<form action="{{ route('flights') }}" method="POST">
							@csrf
							<fieldset class="home-form-1">
							
								<div class="col-md-2 col-sm-2 padd-0">
									<input type="text" name="origin" class="form-control br-1" placeholder="Leaving From..">
								</div>
								
								<div class="col-md-2 col-sm-2 padd-0">
									<input type="text" name="destination" class="form-control br-1" placeholder="Going To..">
								</div>
								
								<div class="col-md-2 col-sm-2 padd-0">
									<input type="date" name="departure_date" class="form-control br-1" value="When..">
								</div>

								<div class="col-md-2 col-sm-2 padd-0">
									<input type="date" name="arrival_date" class="form-control br-1" value="When..">
								</div>
									
								<div class="col-md-2 col-sm-2 padd-0">
									<button class="btn theme-btn cl-white seub-btn">SEARCH</button>
								</div>
									
							</fieldset>
						</form>
					</div>
				</div>
				
			</div>
		</div>
	</div>
</section>
<!-- ======================= Slide Multiple Booking End Banner ===================== -->
<div class="clearfix"></div>

<!-- Start flights Area -->
<section>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="heading">
					<span class="theme-cl">Top Destinations</span>
					<h1>Upcoming Flights</h1>
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
							@if(count($upcoming_flights) > 0)
								@foreach($upcoming_flights as $flight)
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
				@if(count($upcoming_flights) > 0)
					<div class="text-center mt-5">
						<a href="{{ route('flights') }}" class="btn theme-btn cl-white seub-btn">See More</a>
					</div>
				@endif
			</div>																	
		</div>
	</div>	
</section>
<!-- End flights Area -->

<!-- ====================== Popular Destinations ================= -->
<section>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="heading">
					<span class="theme-cl">Top Destinations</span>
					<h1>Popular Destinations</h1>
				</div>
			</div>
		</div>
		
		<div class="row">
			<!-- Single Destination -->
			<div class="col-md-4 col-md-6">
				<article class="destination-box style-1">

					<div class="destination-box-image">
						<figure>
							<a href="destination-detail.html">
								<img src="assets/img/destination/des-6.jpg" class="img-responsive listing-box-img" alt="" />
								<div class="list-overlay"></div>
							</a>
							<div class="discount-flick">-12%</div>
							<h4 class="destination-place">
								<a href="destination-detail.html">Halifax, Nova Scotia </a>
							</h4>
							<a href="#" class="list-like left"><i class="ti-heart"></i></a>
						</figure>
					</div>
					
					<div class="entry-meta">
						<div class="meta-item meta-rating">
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star-half"></i>
						</div>
						<div class="meta-item meta-comment fl-right">
							<span class="text-through">$7802</span><span class="real-price padd-l-10 font-bold">$7581</span>
						</div>
					</div>

					<div class="inner-box">
						<div class="box-inner-ellipsis">
							<h4 class="entry-location">
								<a href="destination-detail.html">Singapore</a>
							</h4>
							<div class="price-box">
								<div class="destination-price fl-right">
									<a href="#"><i class="theme-cl ti-arrow-right"></i></a>
								</div>
							</div>
						</div>
					</div>
					
				</article>
			</div>
			
			<!-- Single Destination -->
			<div class="col-md-4 col-md-6">
				<article class="destination-box style-1">

					<div class="destination-box-image">
						<figure>
							<a href="destination-detail.html">
								<img src="assets/img/destination/des-5.jpg" class="img-responsive listing-box-img" alt="" />
								<div class="list-overlay"></div>
							</a>
							<div class="discount-flick">-12%</div>
							<h4 class="destination-place">
								<a href="destination-detail.html">New York City, New York</a>
							</h4>
							<a href="#" class="list-like left"><i class="ti-heart"></i></a>
						</figure>
					</div>
					
					<div class="entry-meta">
						<div class="meta-item meta-rating">
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star-half"></i>
						</div>
						<div class="meta-item meta-comment fl-right">
							<span class="text-through">$4525</span><span class="real-price padd-l-10 font-bold">$4258</span>
						</div>
					</div>

					<div class="inner-box">
						<div class="box-inner-ellipsis">
							<h4 class="entry-location">
								<a href="destination-detail.html">Switzerland</a>
							</h4>
							<div class="price-box">
								<div class="destination-price fl-right">
									<a href="#"><i class="theme-cl ti-arrow-right"></i></a>
								</div>
							</div>
						</div>
					</div>
					
				</article>
			</div>
			
			<!-- Single Destination -->
			<div class="col-md-4 col-md-6">
				<article class="destination-box style-1">

					<div class="destination-box-image">
						<figure>
							<a href="destination-detail.html">
								<img src="assets/img/destination/des-4.jpg" class="img-responsive listing-box-img" alt="" />
								<div class="list-overlay"></div>
							</a>
							<div class="discount-flick">-12%</div>
							<h4 class="destination-place">
								<a href="#">Marrakech, Morroco</a>
							</h4>
							<a href="#" class="list-like left"><i class="ti-heart"></i></a>
						</figure>
					</div>
					
					<div class="entry-meta">
						<div class="meta-item meta-rating">
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star-half"></i>
						</div>
						<div class="meta-item meta-comment fl-right">
							<span class="text-through">$1856</span><span class="real-price padd-l-10 font-bold">$1750</span>
						</div>
					</div>

					<div class="inner-box">
						<div class="box-inner-ellipsis">
							<h4 class="entry-location">
								<a href="destination-detail.html">Saudi Arabia</a>
							</h4>
							<div class="price-box">
								<div class="destination-price fl-right">
									<a href="#"><i class="theme-cl ti-arrow-right"></i></a>
								</div>
							</div>
						</div>
					</div>
					
				</article>
			</div>
			
		</div>

	</div>
</section>
<!-- ====================== Popular Destinations ================= -->		
<div class="clearfix"></div>

<!-- ====================== Tour Guide ================= -->
<section class="gray-bg">
	<div class="container">
		
		<div class="row">
			<div class="col-md-12">
				<div class="heading">
					<span class="theme-cl">Select Guide</span>
					<h1>Popular Guide</h1>
				</div>
			</div>
		</div>
		
		<div class="row">
			
			<!-- Single Guide -->
			<div class="col-md-3 col-sm-6">
				<div class="guides-container">
				
					<div class="guides-box">
						<div class="guides-img-box">
							<img src="assets/img/user-1.jpg" class="img-responsive" alt="" />
						</div>
						<div class="guider-detail">
							<h4>Suryansh Vighul</h4>
							<h5 class="theme-cl font-bold">$42/Hour</h5>
						</div>
					</div>
					<a href="guide-detail.html" class="btn theme-btn full-width">Book Now</a>
				
				</div>
			</div>
			
			<!-- Single Guide -->
			<div class="col-md-3 col-sm-6">
				<div class="guides-container">
				
					<div class="guides-box">
						<div class="guides-img-box">
							<img src="assets/img/user-2.jpg" class="img-responsive" alt="" />
						</div>
						<div class="guider-detail">
							<h4>Richita Setthy</h4>
							<h5 class="theme-cl font-bold">$32/Hour</h5>
						</div>
					</div>
					<a href="guide-detail.html" class="btn theme-btn full-width">Book Now</a>
				
				</div>
			</div>
			
			<!-- Single Guide -->
			<div class="col-md-3 col-sm-6">
				<div class="guides-container">
				
					<div class="guides-box">
						<div class="guides-img-box">
							<img src="assets/img/user-3.jpg" class="img-responsive" alt="" />
						</div>
						<div class="guider-detail">
							<h4>Adam Survinia</h4>
							<h5 class="theme-cl font-bold">$47/Hour</h5>
						</div>
					</div>
					<a href="guide-detail.html" class="btn theme-btn full-width">Book Now</a>
				
				</div>
			</div>
			
			<!-- Single Guide -->
			<div class="col-md-3 col-sm-6">
				<div class="guides-container">
				
					<div class="guides-box">
						<div class="guides-img-box">
							<img src="assets/img/user-4.jpg" class="img-responsive" alt="" />
						</div>
						<div class="guider-detail">
							<h4>Shilpa Suchi</h4>
							<h5 class="theme-cl font-bold">$50/Hour</h5>
						</div>
					</div>
					<a href="guide-detail.html" class="btn theme-btn full-width">Book Now</a>
				
				</div>
			</div>
			
			<!-- Single Guide -->
			<div class="col-md-3 col-sm-6">
				<div class="guides-container">
				
					<div class="guides-box">
						<div class="guides-img-box">
							<img src="assets/img/user-5.jpg" class="img-responsive" alt="" />
						</div>
						<div class="guider-detail">
							<h4>Moris Adam</h4>
							<h5 class="theme-cl font-bold">$65/Hour</h5>
						</div>
					</div>
					<a href="guide-detail.html" class="btn theme-btn full-width">Book Now</a>
				
				</div>
			</div>
			
			<!-- Single Guide -->
			<div class="col-md-3 col-sm-6">
				<div class="guides-container">
				
					<div class="guides-box">
						<div class="guides-img-box">
							<img src="assets/img/user-6.jpg" class="img-responsive" alt="" />
						</div>
						<div class="guider-detail">
							<h4>Arcita Rivani</h4>
							<h5 class="theme-cl font-bold">$45/Hour</h5>
						</div>
					</div>
					<a href="guide-detail.html" class="btn theme-btn full-width">Book Now</a>
				
				</div>
			</div>
			
			<!-- Single Guide -->
			<div class="col-md-3 col-sm-6">
				<div class="guides-container">
				
					<div class="guides-box">
						<div class="guides-img-box">
							<img src="assets/img/user-7.jpg" class="img-responsive" alt="" />
						</div>
						<div class="guider-detail">
							<h4>Daniel Divanchia</h4>
							<h5 class="theme-cl font-bold">$38/Hour</h5>
						</div>
					</div>
					<a href="guide-detail.html" class="btn theme-btn full-width">Book Now</a>
				
				</div>
			</div>
			
			<!-- Single Guide -->
			<div class="col-md-3 col-sm-6">
				<div class="guides-container">
				
					<div class="guides-box">
						<div class="guides-img-box">
							<img src="assets/img/user-8.jpg" class="img-responsive" alt="" />
						</div>
						<div class="guider-detail">
							<h4>Beauty Queen</h4>
							<h5 class="theme-cl font-bold">$57/Hour</h5>
						</div>
					</div>
					<a href="guide-detail.html" class="btn theme-btn full-width">Book Now</a>
				
				</div>
			</div>
			
		</div>

	</div>
</section>
<!-- ====================== Tour Guide ================= -->
<div class="clearfix"></div>

<!-- ====================== How It Work ================= -->
<section class="how-it-works">
	<div class="container">
		
		<div class="row">
			<div class="col-md-12">
				<div class="heading">
					<span class="theme-cl">Working Process</span>
					<h1>How It Works?</h1>
				</div>
			</div>
		</div>
		
		<div class="row">
		
			<div class="col-md-4 col-sm-4">
				<div class="work-process">
					<div class="process-img">
						<img src="assets/img/tour-1.png" class="img-responsive" alt="" />
						<span class="process-num">01</span>
					</div>
					<h4>Choose a Destination & Guide</h4>
					<p>Post a job to tell us about your project. We'll quickly match you with the right freelancers.</p>
				</div>
			</div>
			
			<div class="col-md-4 col-sm-4">
				<div class="work-process">
					<div class="process-img">
						<img src="assets/img/tour-2.png" class="img-responsive" alt="" />
						<span class="process-num">02</span>
					</div>
					<h4>Choose your guide & Customize</h4>
					<p>Post a job to tell us about your project. We'll quickly match you with the right freelancers.</p>
				</div>
			</div>
			
			<div class="col-md-4 col-sm-4">
				<div class="work-process">
					<div class="process-img">
						<img src="assets/img/tour-3.png" class="img-responsive" alt="" />
						<span class="process-num">03</span>
					</div>
					<h4>Book Your Guide Online</h4>
					<p>Post a job to tell us about your project. We'll quickly match you with the right freelancers.</p>
				</div>
			</div>
			
		</div>

	</div>
</section>
<!-- ====================== How It Work ================= -->
<div class="clearfix"></div>
		
<!-- ====================== Top Tour & Activities ================= -->
<section class="gray-bg">
	<div class="container">
		
		<div class="row">
			<div class="col-md-12">
				<div class="heading">
					<span class="theme-cl">Select Tour</span>
					<h1>Top Tour & Activities</h1>
				</div>
			</div>
		</div>
		
		<div class="row">
			<div class="list-slider">
			
				<!-- Single Tour -->
				<div class="list-slide-box">
					<article class="tour-box style-1">
					
						<div class="tour-box-image">
							<figure>
								<a href="tour-detail.html">
									<img src="assets/img/tour/tour-4.jpg" class="img-responsive listing-box-img" alt="" />
									<div class="list-overlay"></div>
									<div class="entry-bookmark">                                   
										<a href="#"><i class="ti-bookmark"></i></a>
									</div>
									<div class="tour-time">
										<i class="ti ti-car"></i><span>22h</span>
									</div>
									<h4 class="destination-place">
										<a href="#">New York, Sean Pavone</a>
									</h4>
									<span class="featured-tour"><i class="fa fa-star"></i></span>
									<a href="#" class="list-like left"><i class="ti-heart"></i></a>
								</a>
							</figure>
						</div>
						
						<div class="entry-meta">
							<div class="meta-item meta-author">
								<div class="coauthors">
									<span class="vcard author">
										<span class="fn">
											<a href="#"><img alt="" src="assets/img/user-4.jpg" class="avatar avatar-24" height="24" width="24">Lisa Scholfield</a>
										</span>
									</span>
								</div>
							</div>
							<div class="meta-item meta-comment fl-right">
								<i class="ti-comment-alt"></i><span>18</span>
							</div>
							<div class="meta-item meta-rating fl-right">
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star-half"></i>
							</div>
						</div>

						<div class="inner-box">
							<div class="box-inner-ellipsis">
								<h4 class="entry-title">
									<a href="#">New York</a>
								</h4>
								<div class="price-box">
									<div class="tour-price fl-right">
										<i class="ti ti-user"></i><span class="theme-cl f-bold">$240</span>
									</div>
								</div>
							</div>
						</div>
	
					</article>
				</div>
			
				<!-- Single Tour -->
				<div class="list-slide-box">
					<article class="tour-box style-1">
					
						<div class="tour-box-image">
							<figure>
								<a href="tour-detail.html">
									<img src="assets/img/tour/tour-5.jpg" class="img-responsive listing-box-img" alt="" />
									<div class="list-overlay"></div>
									<div class="entry-bookmark">                                   
										<a href="#"><i class="ti-bookmark"></i></a>
									</div>
									<div class="tour-time">
										<i class="ti ti-car"></i><span>17h</span>
									</div>
									<h4 class="destination-place">
										<a href="#">Dubai, United Arab Emirates</a>
									</h4>
									<span class="featured-tour"><i class="fa fa-star"></i></span>
									<a href="#" class="list-like left"><i class="ti-heart"></i></a>
								</a>
							</figure>
						</div>
						
						<div class="entry-meta">
							<div class="meta-item meta-author">
								<div class="coauthors">
									<span class="vcard author">
										<span class="fn">
											<a href="#"><img alt="" src="assets/img/user-5.jpg" class="avatar avatar-24" height="24" width="24">Lisa Scholfield</a>
										</span>
									</span>
								</div>
							</div>
							<div class="meta-item meta-comment fl-right">
								<i class="ti-comment-alt"></i><span>15</span>
							</div>
							<div class="meta-item meta-rating fl-right">
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star-half"></i>
							</div>
						</div>

						<div class="inner-box">
							<div class="box-inner-ellipsis">
								<h4 class="entry-title">
									<a href="#">Saudi Arabia</a>
								</h4>
								<div class="price-box">
									<div class="tour-price fl-right">
										<i class="ti ti-user"></i><span class="theme-cl f-bold">$117</span>
									</div>
								</div>
							</div>
						</div>
	
					</article>
				</div>
			
				<!-- Single Tour -->
				<div class="list-slide-box">
					<article class="tour-box style-1">
					
						<div class="tour-box-image">
							<figure>
								<a href="tour-detail.html">
									<img src="assets/img/tour/tour-6.jpg" class="img-responsive listing-box-img" alt="" />
									<div class="list-overlay"></div>
									<div class="entry-bookmark">                                   
										<a href="#"><i class="ti-bookmark"></i></a>
									</div>
									<div class="tour-time">
										<i class="ti ti-car"></i><span>1 day</span>
									</div>
									<h4 class="destination-place">
										<a href="#">Paris, France. neirfy</a>
									</h4>
									<span class="featured-tour"><i class="fa fa-star"></i></span>
									<a href="#" class="list-like left"><i class="ti-heart"></i></a>
								</a>
							</figure>
						</div>
						
						<div class="entry-meta">
							<div class="meta-item meta-author">
								<div class="coauthors">
									<span class="vcard author">
										<span class="fn">
											<a href="#"><img alt="" src="assets/img/user-6.jpg" class="avatar avatar-24" height="24" width="24">Lisa Scholfield</a>
										</span>
									</span>
								</div>
							</div>
							<div class="meta-item meta-comment fl-right">
								<i class="ti-comment-alt"></i><span>22</span>
							</div>
							<div class="meta-item meta-rating fl-right">
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star-half"></i>
							</div>
						</div>

						<div class="inner-box">
							<div class="box-inner-ellipsis">
								<h4 class="entry-title">
									<a href="#">Singapore</a>
								</h4>
								<div class="price-box">
									<div class="tour-price fl-right">
										<i class="ti ti-user"></i><span class="theme-cl f-bold">$310</span>
									</div>
								</div>
							</div>
						</div>
	
					</article>
				</div>
				
				<!-- Single Tour -->
				<div class="list-slide-box">
					<article class="tour-box style-1">
					
						<div class="tour-box-image">
							<figure>
								<a href="tour-detail.html">
									<img src="assets/img/tour/tour-2.jpg" class="img-responsive listing-box-img" alt="" />
									<div class="list-overlay"></div>
									<div class="entry-bookmark">                                   
										<a href="#"><i class="ti-bookmark"></i></a>
									</div>
									<div class="tour-time">
										<i class="ti ti-car"></i><span>70h</span>
									</div>
									<h4 class="destination-place">
										<a href="#">London, England. AndreaAstes</a>
									</h4>
									<span class="featured-tour"><i class="fa fa-star"></i></span>
									<a href="#" class="list-like left"><i class="ti-heart"></i></a>
								</a>
							</figure>
						</div>
						
						<div class="entry-meta">
							<div class="meta-item meta-author">
								<div class="coauthors">
									<span class="vcard author">
										<span class="fn">
											<a href="#"><img alt="" src="assets/img/user-7.jpg" class="avatar avatar-24" height="24" width="24">Lisa Scholfield</a>
										</span>
									</span>
								</div>
							</div>
							<div class="meta-item meta-comment fl-right">
								<i class="ti-comment-alt"></i><span>15</span>
							</div>
							<div class="meta-item meta-rating fl-right">
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star-half"></i>
							</div>
						</div>

						<div class="inner-box">
							<div class="box-inner-ellipsis">
								<h4 class="entry-title">
									<a href="#">United Kingdom</a>
								</h4>
								<div class="price-box">
									<div class="tour-price fl-right">
										<i class="ti ti-user"></i><span class="theme-cl f-bold">$217</span>
									</div>
								</div>
							</div>
						</div>
	
					</article>
				</div>
				
				<!-- Single Tour -->
				<div class="list-slide-box">
					<article class="tour-box style-1">
					
						<div class="tour-box-image">
							<figure>
								<a href="tour-detail.html">
									<img src="assets/img/tour/tour-7.jpg" class="img-responsive listing-box-img" alt="" />
									<div class="list-overlay"></div>
									<div class="entry-bookmark">                                   
										<a href="#"><i class="ti-bookmark"></i></a>
									</div>
									<div class="tour-time">
										<i class="ti ti-car"></i><span>2 days</span>
									</div>
									<h4 class="destination-place">
										<a href="#">Bangkok, Thailand. thitivong</a>
									</h4>
									<span class="featured-tour"><i class="fa fa-star"></i></span>
									<a href="#" class="list-like left"><i class="ti-heart"></i></a>
								</a>
							</figure>
						</div>
						
						<div class="entry-meta">
							<div class="meta-item meta-author">
								<div class="coauthors">
									<span class="vcard author">
										<span class="fn">
											<a href="#"><img alt="" src="assets/img/user-8.jpg" class="avatar avatar-24" height="24" width="24">Lisa Scholfield</a>
										</span>
									</span>
								</div>
							</div>
							<div class="meta-item meta-comment fl-right">
								<i class="ti-comment-alt"></i><span>20</span>
							</div>
							<div class="meta-item meta-rating fl-right">
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star-half"></i>
							</div>
						</div>

						<div class="inner-box">
							<div class="box-inner-ellipsis">
								<h4 class="entry-title">
									<a href="#">Hong Kong</a>
								</h4>
								<div class="price-box">
									<div class="tour-price fl-right">
										<i class="ti ti-user"></i><span class="theme-cl f-bold">$177</span>
									</div>
								</div>
							</div>
						</div>
	
					</article>
				</div>
			
			</div>
		</div>

	</div>
</section>
<!-- ====================== Top Tour & Activities ================= -->
<div class="clearfix"></div>

<!-- ====================== Popular Domestic Routes From India ================= -->
<section>
	<div class="container">
		
		<div class="row">
			<div class="col-md-12">
				<div class="heading">
					<span class="theme-cl">Domestic Routes</span>
					<h1>Popular Domestic Routes From India</h1>
				</div>
			</div>
		</div>
		
		<div class="row">
		
			<!-- Single Domestic Routes -->
			<div class="col-md-4 col-sm-6">
				<div class="domestic-routes">
					
					<div class="domestic-routes-thumb">
						<a href="#"><img src="assets/img/tour-2.png" class="img-responsive" alt="" /></a>
					</div>
					<div class="domestic-routes-detail">
						<h5><a href="#">Delhi To Austrailia</a></h5>
						<span>Flight</span>
						<span class="domestic-offer bg-success">-15% Off</span>
					</div>
					<div class="domestic-price">
						<h5><a href="#" class="theme-cl">$255</a></h5>
					</div>
					
				</div>
			</div>
			
			<!-- Single Domestic Routes -->
			<div class="col-md-4 col-sm-6">
				<div class="domestic-routes">
					
					<div class="domestic-routes-thumb">
						<a href="#"><img src="assets/img/tour-2.png" class="img-responsive" alt="" /></a>
					</div>
					<div class="domestic-routes-detail">
						<h5><a href="#">Chandigarh To Canada</a></h5>
						<span>Flight</span>
					</div>
					<div class="domestic-price">
						<h5><a href="#" class="theme-cl">$350</a></h5>
					</div>
					
				</div>
			</div>
			
			<!-- Single Domestic Routes -->
			<div class="col-md-4 col-sm-6">
				<div class="domestic-routes">
					
					<div class="domestic-routes-thumb">
						<a href="#"><img src="assets/img/tour-2.png" class="img-responsive" alt="" /></a>
					</div>
					<div class="domestic-routes-detail">
						<h5><a href="#">Delhi To United State</a></h5>
						<span>Flight</span>
						<span class="domestic-offer bg-success">-10% Off</span>
					</div>
					<div class="domestic-price">
						<h5><a href="#" class="theme-cl">$450</a></h5>
					</div>
					
				</div>
			</div>
			
			<!-- Single Domestic Routes -->
			<div class="col-md-4 col-sm-6">
				<div class="domestic-routes">
					
					<div class="domestic-routes-thumb">
						<a href="#"><img src="assets/img/tour-2.png" class="img-responsive" alt="" /></a>
					</div>
					<div class="domestic-routes-detail">
						<h5><a href="#">Delhi To Switzerland</a></h5>
						<span>Flight</span>
					</div>
					<div class="domestic-price">
						<h5><a href="#" class="theme-cl">$720</a></h5>
					</div>
					
				</div>
			</div>
			
			<!-- Single Domestic Routes -->
			<div class="col-md-4 col-sm-6">
				<div class="domestic-routes">
					
					<div class="domestic-routes-thumb">
						<a href="#"><img src="assets/img/tour-2.png" class="img-responsive" alt="" /></a>
					</div>
					<div class="domestic-routes-detail">
						<h5><a href="#">Mumbai To Singapore</a></h5>
						<span>Flight</span>
						<span class="domestic-offer bg-success">-12% Off</span>
					</div>
					<div class="domestic-price">
						<h5><a href="#" class="theme-cl">$370</a></h5>
					</div>
					
				</div>
			</div>
			
			<!-- Single Domestic Routes -->
			<div class="col-md-4 col-sm-6">
				<div class="domestic-routes">
					
					<div class="domestic-routes-thumb">
						<a href="#"><img src="assets/img/tour-2.png" class="img-responsive" alt="" /></a>
					</div>
					<div class="domestic-routes-detail">
						<h5><a href="#">Chandigarh To Hong Kong</a></h5>
						<span>Flight</span>
					</div>
					<div class="domestic-price">
						<h5><a href="#" class="theme-cl">$640</a></h5>
					</div>
					
				</div>
			</div>
			
			<!-- Single Domestic Routes -->
			<div class="col-md-4 col-sm-6">
				<div class="domestic-routes">
					
					<div class="domestic-routes-thumb">
						<a href="#"><img src="assets/img/tour-2.png" class="img-responsive" alt="" /></a>
					</div>
					<div class="domestic-routes-detail">
						<h5><a href="#">Delhi To Netherlands</a></h5>
						<span>Flight</span>
						<span class="domestic-offer bg-success">-07% Off</span>
					</div>
					<div class="domestic-price">
						<h5><a href="#" class="theme-cl">$820</a></h5>
					</div>
					
				</div>
			</div>
			
			<!-- Single Domestic Routes -->
			<div class="col-md-4 col-sm-6">
				<div class="domestic-routes">
					
					<div class="domestic-routes-thumb">
						<a href="#"><img src="assets/img/tour-2.png" class="img-responsive" alt="" /></a>
					</div>
					<div class="domestic-routes-detail">
						<h5><a href="#">Mumbai To Qatar</a></h5>
						<span>Flight</span>
					</div>
					<div class="domestic-price">
						<h5><a href="#" class="theme-cl">$680</a></h5>
					</div>
					
				</div>
			</div>
			
			<!-- Single Domestic Routes -->
			<div class="col-md-4 col-sm-6">
				<div class="domestic-routes">
					
					<div class="domestic-routes-thumb">
						<a href="#"><img src="assets/img/tour-2.png" class="img-responsive" alt="" /></a>
					</div>
					<div class="domestic-routes-detail">
						<h5><a href="#">Delhi To Switzerland</a></h5>
						<span>Flight</span>
						<span class="domestic-offer bg-success">-22% Off</span>
					</div>
					<div class="domestic-price">
						<h5><a href="#" class="theme-cl">$680</a></h5>
					</div>
					
				</div>
			</div>
			
		</div>

	</div>
</section>
<!-- ====================== Domestic Routes ================= -->
<div class="clearfix"></div>
@endsection		