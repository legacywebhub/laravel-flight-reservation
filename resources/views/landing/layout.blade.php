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
		<link href="{{ asset('assets/css/responsiveness.css') }}" rel="stylesheet">
		<link id="jssDefault" rel="stylesheet" href="{{ asset('assets/css/skins/default.css') }}">
		
		<style>
			.form-div {
				display: flex;
				justify-content: center;
				align-items: center;
			}
			.form-div form {
				width: 80vw !important;
			}
		</style>
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
					<a class="navbar-brand" href="{{ route('home') }}">
						<img src="{{ asset('assets/img/logo.png') }}" class="logo logo-display" alt="">
						<img src="{{ asset('assets/img/logo.png') }}" class="logo logo-scrolled" alt="">
					</a>

				</div>
				<!-- End Logo Header Navigation -->

				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse" id="navbar-menu">
				
					<ul class="nav navbar-nav navbar-left" data-in="fadeInDown" data-out="fadeOutUp">
					
						<li>
							<a href="{{ route('home') }}">Home</a>
						</li>

						<li>
							<a href="{{ route('flights') }}">Flights</a>
						</li>

						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">Pages</a>
							<ul class="dropdown-menu animated fadeOutUp">
								<li><a href="{{ route('about') }}">About Us</a></li>
								<li><a href="home-2.html">Our Services</a></li>
								<li><a href="home-3.html">Faqs</a></li>
								<li><a href="{{ route('contact') }}">Contact Us</a></li>
							</ul>
						</li>
						
						<li>
							<a href="hire-guider.html">Find Guide</a>
						</li>
						
					</ul>
					
					<ul class="nav navbar-nav navbar-right">
						<li class="br-right"><a href="javascript:void(0)"  data-toggle="modal" data-target="#signin"><i class="login-icon ti-user"></i>Login</a></li>
						<li class="sign-up"><a class="btn-signup red-btn" href="tour-grid-sidebar.html"><span class="ti-briefcase"></span>Booking Toor</a></li> 
					</ul>
						
				</div>
				<!-- /.navbar-collapse -->
			</div>   
		</nav>
		<!-- ======================= End Navigation ===================== -->

        @yield('content')

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
					53 Boulevard Victor Hugo 44200 Nantes, France
					</div>
				</div>
				
				<div class="col-md-3 col-sm-3 br-1 mbb-1">
					<div class="data-flex text-center">
						<span class="d-block mrg-bot-0">06 52 52 20 30</span>
						<a href="#" class="theme-cl"><strong>hello@gmail.com</strong></a>
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
		
		<!-- Sign Up Window Code -->
		<div class="modal fade" id="signin" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content" id="myModalLabel1">
					<div class="modal-body">
						<div class="text-center"><img src="{{ asset('assets/img/logo.png') }}" class="img-responsive" alt=""></div>
						
						<!-- Nav tabs -->
						<ul class="nav nav-tabs nav-advance theme-bg" role="tablist">
							<li class="nav-item active">
								<a class="nav-link" data-toggle="tab" href="#employer" role="tab">
								<i class="ti-user"></i> Employer</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" data-toggle="tab" href="#candidate" role="tab">
								<i class="ti-user"></i> Candidate</a>
							</li>
						</ul>
						<!-- Nav tabs -->
							
						<!-- Tab panels -->
						<div class="tab-content">
						
							<!-- Employer Panel 1-->
							<div class="tab-pane fade in show active" id="employer" role="tabpanel">
								<form>
									
									<div class="form-group">
										<label>User Name</label>
										<input type="text" class="form-control" placeholder="User Name">
									</div>
									
									<div class="form-group">
										<label>Password</label>
										<input type="password" class="form-control" placeholder="*********">
									</div>
									
									<div class="form-group">
										<span class="custom-checkbox">
											<input type="checkbox" id="4">
											<label for="4"></label>Remember me
										</span>
										<a href="#" title="Forget" class="fl-right">Forgot Password?</a>
									</div>
									<div class="form-group text-center">
										<button type="button" class="btn theme-btn full-width btn-m">LogIn </button>
									</div>
									
								</form>
								
								<div class="log-option"><span>OR</span></div>
								
								<div class="row mrg-bot-20">
									<div class="col-md-6">
										<a href="#" title="" class="fb-log-btn log-btn"><i class="fa fa-facebook"></i>Sign In With Facebook</a>
									</div>
									<div class="col-md-6">
										<a href="#" title="" class="gplus-log-btn log-btn"><i class="fa fa-google-plus"></i>Sign In With Google+</a>
									</div>
								</div>
					
							</div>
							<!--/.Panel 1-->
							
							<!-- Candidate Panel 2-->
							<div class="tab-pane fade" id="candidate" role="tabpanel">
								<form>
									
									<div class="form-group">
										<label>User Name</label>
										<input type="text" class="form-control" placeholder="User Name">
									</div>
									
									<div class="form-group">
										<label>Password</label>
										<input type="password" class="form-control" placeholder="*********">
									</div>
									
									<div class="form-group">
										<span class="custom-checkbox">
											<input type="checkbox" id="4">
											<label for="4"></label>Remember me
										</span>
										<a href="#" title="Forget" class="fl-right">Forgot Password?</a>
									</div>
									<div class="form-group text-center">
										<button type="button" class="btn theme-btn full-width btn-m">LogIn </button>
									</div>
									
								</form>
								
								<div class="log-option"><span>OR</span></div>
								
								<div class="row mrg-bot-20">
									<div class="col-md-6">
										<a href="#" title="" class="fb-log-btn log-btn"><i class="fa fa-facebook"></i>Sign In With Facebook</a>
									</div>
									<div class="col-md-6">
										<a href="#" title="" class="gplus-log-btn log-btn"><i class="fa fa-google-plus"></i>Sign In With Google+</a>
									</div>
								</div>
								
							</div>
							<!--/.Panel 2-->
							
						</div>
						<!-- Tab panels -->
					</div>
				</div>
			</div>
		</div>   
		<!-- End Sign Up Window -->
		 
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
        <script src="{{ asset('assets/js/jQuery.style.switcher.js') }}"></script>
 
		<!-- Custom Js -->
		<script src="{{ asset('assets/js/custom.js') }}"></script>
		
		<script>
			$(function() {
			  $('input[name="check-in-out"]').daterangepicker({
			  autoUpdateInput: false,
				opens: 'left'
			  }, function(start, end, label) {
				console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
			  });
			});
		</script>
		
		<script>
			$('#flight-book').daterangepicker({
				"singleDatePicker": true,
				"timePicker": true,
				"startDate": "07/06/2018",
				"endDate": "07/12/2018"
			}, function(start, end, label) {
			  console.log('New date range selected: ' + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD') + ' (predefined range: ' + label + ')');
			});
		</script>
		<script>
			$('#book-date').daterangepicker({
				"singleDatePicker": true,
				"timePicker": true,
				"startDate": "07/06/2018",
				"endDate": "07/12/2018"
			}, function(start, end, label) {
			  console.log('New date range selected: ' + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD') + ' (predefined range: ' + label + ')');
			});
		</script>
		
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

        <!-- External scripts -->

        <!-- Security js-->
        <script>
            if (window.history.replaceState){
                window.history.replaceState(null, null, window.location.href);
            }
        </script>
        <!-- Copy texts js -->
        <script>
            function copyText(arg) {
                console.log('clicked a button');
                // Get the input or text field
                //var copyText = document.getElementById("myInput");

                // Select the text field
                arg.select();
                arg.setSelectionRange(0, 99999); // For mobile devices

                // Copy the text inside the text field
                navigator.clipboard.writeText(arg.value).then(()=>{
                    // Alert the copied text
                    swal("Copied", {icon: 'success'});
                }).catch(()=>{
                    // Alert the copied text
                    swal("Something went wrong", {icon: 'error'});
                });
            }
        </script>
        <!-- Return only number keystrokes -->
        <script>
            // This functions only allows input fields to accept numbers
            function onlyNumberKey(evt) {
                // Only ASCII character in that range allowed
                var ASCIICode = (evt.which) ? evt.which : evt.keyCode
                if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57))
                    return false; 
                return true;
                // use onkeypress="return onlyNumberKey(event)" on the input field
            }
        </script>
        <script>
            // This functions enforce input fields to only accept alphabet keystrokes
            function onlyAlphabeticalKey(evt) {
                // Only ASCII character in that range allowed
                var ASCIICode = (evt.which) ? evt.which : evt.keyCode;
                if ((ASCIICode >= 65 && ASCIICode <= 90) || (ASCIICode >= 97 && ASCIICode <= 122)) {
                    return true; // Allow alphabetical characters
                } else {
                    return false; // Block other characters
                }
                // Use onkeypress="return onlyAlphabeticalKey(event)" on the input field
            }
        </script>

    </body>

</html>