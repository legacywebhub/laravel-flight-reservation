<!DOCTYPE html>
<html lang="en">
	
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title')</title>

    <!-- Plugins CSS -->
	<link rel="stylesheet" href="{{ asset('assets/plugins/css/plugins.css') }}">	
    
    <!-- Custom style -->
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
	<link href="{{ asset('assets/css/responsiveness.css') }}" rel="stylesheet"><link id="jssDefault" rel="stylesheet" href="assets/css/skins/default.css">
    
	</head>
	
	<body>
		
		<!-- ======================= Start Navigation ===================== -->
		<nav class="navbar navbar-default navbar-mobile navbar-fixed light bootsnav">
			<div class="container">
			
				<!-- Start Logo Header Navigation -->
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
						<i class="fa fa-bars"></i>
					</button>
					<a class="navbar-brand" href="{{ route('dashboard') }}">
						<img src="{{ asset('assets/img/logo.png') }}" class="logo logo-display" alt="">
						<img src="{{ asset('assets/img/logo.png') }}" class="logo logo-scrolled" alt="">
					</a>

				</div>
				<!-- End Logo Header Navigation -->

				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse" id="navbar-menu">
				
					<ul class="nav navbar-nav navbar-left" data-in="fadeInDown" data-out="fadeOutUp">
					
						<li>
							<a href="{{ route('dashboard') }}">Dashboard</a>
						</li>

						<li>
							<a href="{{ route('dashboard.flights') }}">Flights</a>
						</li>

						<li>
							<a href="{{ route('dashboard.bookings') }}">Bookings</a>
						</li>
					
						
						{{-- <li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">Extra</a>
							<ul class="dropdown-menu animated fadeOutUp">
								<li><a href="cart.html">Add To Cart</a></li>
								<li><a href="payment-methode.html">Paayment Methode</a></li>
							</ul>
						</li> --}}
						
					</ul>
					
					<ul class="nav navbar-nav navbar-right">
						<li class="dropdown dash-link"><a href="#" class="dropdown-toggle"><img src="{{ asset('assets/img/user-3.jpg') }}" class="img-responsive avatar" alt="" />Hi, {{ explode(' ', Auth::user()->name)[0] }}</a> 
							<ul class="dropdown-menu left-nav">
								<li><a href="{{ route('dashboard') }}">Dashboard</a></li>
								<li><a href="{{ route('dashboard.profile') }}">My Profile</a></li>
								<li><a href="{{ route('dashboard.logout') }}">Log Out</a></li>
							</ul>
						</li>
					</ul>
						
				</div>
				<!-- /.navbar-collapse -->
			</div>   
		</nav>
		<!-- ======================= End Navigation ===================== -->

		
		<!-- ======================= Start Dashboard ===================== -->
		<section class="dashboard gray-bg padd-0 mrg-top-50">
			<div class="container-fluid">
				<div class="row">
					
					<div class="col-lg-2 col-md-2 col-sm-3 dashboard-bg">
						<!-- /. NAV TOP  -->
							<nav class="navbar navbar-side">
							<!-- Start Logo Header Navigation -->
							<div class="navbar-header">
								<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#dashboard-menu">
									<i class="fa fa-bars"></i>
								</button>

							</div>
							<div class="collapse sidebar-collapse" id="dashboard-menu">
								<div class="profile-wrapper">
									<div class="profile-wrapper-thumb">
										<img src="{{ asset('assets/img/user-3.jpg') }}" class="img-responsive img-circle" alt="" />
										<span class="dashboard-user-status bg-success"></span>
									</div>
									<h4>{{ auth()->user()->name }}</h4>
								</div>
								<ul class="nav" id="main-menu">
									
									<li class="active">
										<a href="{{ route('dashboard') }}"><i class="fa fa-dashboard" aria-hidden="true"></i>Dashboard</a>
									</li>
									
									<li>
										<a href="{{ route('dashboard.flights') }}"><i class="fa fa-plane" aria-hidden="true"></i>Book Flight</a>
									</li>

									<li>
										<a href="{{ route('dashboard.bookings') }}"><i class="fa fa-calendar" aria-hidden="true"></i>My Bookings</a>
									</li>

									<li>
										<a href="javascript:void(0)"><i class="fa fa-user" aria-hidden="true"></i>Personal <span class="fa arrow"></span></a>
										<ul class="nav nav-second-level">
											
											<li>
												<a href="{{ route('dashboard.profile') }}"><i class="fa fa-circle-o-notch" aria-hidden="true"></i>Profile</a>
											</li>
											<li>
												<a href="{{ route('dashboard.notifications') }}"><i class="fa fa-circle-o-notch" aria-hidden="true"></i>Notifications</a>
											</li>
										</ul>
									</li>

									<li>
										<a href="{{ route('dashboard.logout') }}"><i class="ti-power-off" aria-hidden="true"></i>Logout</a>
									</li>
	
								</ul>
							</div>
						</nav>
						<!-- /. NAV SIDE  -->
					</div>
					
					@yield('content')					
				</div>
			</div>
		</section>
		<!-- ======================= End Dashboard ===================== -->
			
		<!-- ============== Before Footer ====================== -->
		<section class="before-footer bt-1 bb-1">
			<div class="container-fluid padd-0 full-width">
			
				<div class=" col-md-2 col-sm-2 br-1 mbb-1">
					<div class="data-flex">
						<h4>Contact Us!</h4>
					</div>
				</div>
				
				<div class="col-md-3 col-sm-3 br-1 mbb-1">
					<div class="data-flex text-center">
					{{ $company->address }}
					</div>
				</div>
				
				<div class="col-md-3 col-sm-3 br-1 mbb-1">
					<div class="data-flex text-center">
						<span class="d-block mrg-bot-0">{{ $company->phone }}</span>
						<a href="#" class="theme-cl"><strong>{{ $company->email }}</strong></a>
					</div>
				</div>
				
				<div class="col-md-4 col-sm-4 padd-0">
					<div class="data-flex padd-0">
						<ul class="social-share">
							<li><a href="#"><i class="fa fa-facebook theme-cl"></i></a></li>
							<li><a href="#"><i class="fa fa-google-plus theme-cl"></i></a></li>
							<li><a href="#"><i class="fa fa-twitter theme-cl"></i></a></li>
							<li><a href="#"><i class="fa fa-linkedin theme-cl"></i></a></li>
						</ul>
					</div>
				</div>
				
			</div>
		</section>
		<!-- =================== Before Footer ====================== -->
			
		<!-- ================= footer start ========================= -->
		<footer class="footer dark-bg">
			<div class="container">
				
				<!-- Row Start -->
				<div class="row">
				
					<div class="col-md-8 col-sm-8">
						<div class="row">
							<div class="col-md-4 col-sm-4">
								<h4>Featured Destinations</h4>
								<ul>
									<li><a href="destination-grid.html">Destination Grid</a></li>
									<li><a href="destination-list.html">Destination List</a></li>
									<li><a href="destination-grid-sidebar.html">Destination Grid Sidebar</a></li>
									<li><a href="destination-list-sidebar.html">Destination List Sidebar</a></li>
									<li><a href="destination-detail.html">Destination Detail</a></li>
									<li><a href="restaurant-grid.html">Restaurant Grid</a></li>
								</ul>
							</div>
							<div class="col-md-4 col-sm-4">
								<h4>Featured Tours</h4>
								<ul>
									<li><a href="tour-grid.html">Tour Grid</a></li>
									<li><a href="tour-list.html">Tour List</a></li>
									<li><a href="tour-grid-sidebar.html">Tour Grid Sidebar</a></li>
									<li><a href="tour-list-sidebar.html">tour List Sidebar</a></li>
									<li><a href="tour-detail.html">Tour Detail</a></li>
									<li><a href="http://themezhub.com/">Restaurant Grid</a></li>
								</ul>
							</div>
							<div class="col-md-4 col-sm-4">
								<h4>Featured Hotels</h4>
								<ul>
									<li><a href="hotel-grid.html">Hotel Grid</a></li>
									<li><a href="hotel-list.html">Hotel List</a></li>
									<li><a href="hotel-grid-sidebar.html">Hotel Grid Sidebar</a></li>
									<li><a href="hotel-list-sidebar.html">Hotel List Sidebar</a></li>
									<li><a href="hotel-detail.html">Hotel Detail</a></li>
									<li><a href="restaurant-detail.html">Restaurant Detail</a></li>
								</ul>
							</div>
						</div>
					</div>
					
					<div class="col-md-4 col-sm-4">
						<h4>Subscribe Now</h4>
						<!-- Newsletter -->
						<div class="input-group">
							<input type="text" class="form-control" placeholder="Enter Email">
							<span class="input-group-btn">
								<button type="button" class="btn btn-default"><i class="fa fa-location-arrow font-20"></i></button>
							</span>
						</div>
						
						<!-- Social Box -->
						<div class="f-social-box">
							<ul>
								<li><a href="#"><i class="fa fa-facebook facebook-cl"></i></a></li>
								<li><a href="#"><i class="fa fa-google google-plus-cl"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter twitter-cl"></i></a></li>
								<li><a href="#"><i class="fa fa-pinterest pinterest-cl"></i></a></li>
								<li><a href="#"><i class="fa fa-instagram instagram-cl"></i></a></li>
							</ul>
						</div>
						
						<!-- App Links -->
						<div class="f-app-box">
							<ul>
								<li><a href="#"><i class="fa fa-apple"></i>App Store</a></li>
								<li><a href="#"><i class="fa fa-android"></i>Play Store</a></li>
							</ul>
						</div>
						
					</div>
					
				</div>
				
				<!-- Row Start -->
				<div class="row">
					<div class="col-md-12">
						<div class="copyright text-center">
							<p><a target="_blank" href="https://www.templateshub.net">Templates Hub</a></p>
						</div>
					</div>
				</div>
				
			</div>
		</footer>
		 
		<!-- =================== START JAVASCRIPT ================== -->
		<script src="{{ asset('assets/plugins/js/jquery.min.js') }}"></script>
		<script src="{{ asset('assets/plugins/js/bootstrap.min.js') }}"></script>
		<script src="{{ asset('assets/plugins/js/viewportchecker.js') }}"></script>
		<script src="{{ asset('assets/plugins/js/bootsnav.js') }}"></script>
		<script src="{{ asset('assets/plugins/js/slick.min.js') }}"></script>
		<script src="{{ asset('assets/plugins/js/jquery.nice-select.min.js') }}"></script>
		<script src="{{ asset('assets/plugins/js/jquery.fancybox.min.js') }}"></script>
		<script src="{{ asset('assets/plugins/js/jquery.downCount.js') }}"></script>
		<script src="{{ asset('assets/plugins/js/freshslider.1.0.0.js') }}"></script>
		<script src="{{ asset('assets/plugins/js/moment.min.js') }}"></script>
		<script src="{{ asset('assets/plugins/js/daterangepicker.js') }}"></script>
		<script src="{{ asset('assets/plugins/js/wysihtml5-0.3.0.js') }}"></script>
		<script src="{{ asset('assets/plugins/js/bootstrap-wysihtml5.js') }}"></script>
		<script src="{{ asset('assets/plugins/js/sweetalert.min.js') }}"></script>
		
		<!-- Dashboard Js -->
		<script src="{{ asset('assets/plugins/js/jquery.slimscroll.min.js') }}"></script>
		<script src="{{ asset('assets/plugins/js/jquery.metisMenu.js') }}"></script>
		<script src="{{ asset('assets/plugins/js/jquery.easing.min.js') }}"></script>
		<script src="{{ asset('assets/plugins/js/raphael.min.js') }}"></script>
		<script src="{{ asset('assets/plugins/js/morris.min.js') }}"></script>
		<script src="{{ asset('assets/js/chart.js') }}"></script>
 
		<!-- Custom Js -->
		<script src="{{ asset('assets/js/custom.js') }}"></script>
		
		<script src="{{ asset('assets/js/jQuery.style.switcher.js') }}"></script>
		<script>
			function openRightMenu() {
				document.getElementById("rightMenu").style.display = "block";
			}
			function closeRightMenu() {
				document.getElementById("rightMenu").style.display = "none";
			}
		</script>

		<script type="text/javascript">
			$(document).ready(function() {
				$('#styleOptions').styleSwitcher();
			});
		</script>
	
    </body>

</html>