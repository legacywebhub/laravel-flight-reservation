<!DOCTYPE html>
<html lang="zxx" class="no-js">
<head>
    <!-- Mobile Specific Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon-->
    <link rel="shortcut icon" href="{{ asset('landing/img/fav.png') }}">
    <!-- Author Meta -->
    <meta name="author" content="colorlib">
    <!-- Meta Description -->
    <meta name="description" content="">
    <!-- Meta Keyword -->
    <meta name="keywords" content="">
    <!-- meta character set -->
    <meta charset="UTF-8">
    <!-- Site Title -->
    <title>@yield('title', 'My Laravel App')</title>

    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet"> 
        <!--
        CSS
        ============================================= -->
        <link rel="stylesheet" href="{{ asset('landing/css/linearicons.css') }}">
        <link rel="stylesheet" href="{{ asset('landing/css/font-awesome.min.css') }}">
        <link rel="stylesheet" href="{{ asset('landing/css/bootstrap.css') }}">
        <link rel="stylesheet" href="{{ asset('landing/css/magnific-popup.css') }}">
        <link rel="stylesheet" href="{{ asset('landing/css/jquery-ui.css') }}">				
        <link rel="stylesheet" href="{{ asset('landing/css/nice-select.css') }}">							
        <link rel="stylesheet" href="{{ asset('landing/css/animate.min.css') }}">
        <link rel="stylesheet" href="{{ asset('landing/css/owl.carousel.css') }}">				
        <link rel="stylesheet" href="{{ asset('landing/css/main.css') }}">
    </head>
    <body>	
        <header id="header">
            <div class="header-top">
                <div class="container">
                  <div class="row align-items-center">
                      <div class="col-lg-6 col-sm-6 col-6 header-top-left">
                          <ul>
                            @auth
                            <li>Welcome <span class="text-uppercase">{{auth()->user->name}}</span></li>
                            @else
                            <li><a href="#">Visit Us</a></li>
                            <li><a href="#">Buy Tickets</a></li>
                            @endauth
                          </ul>			
                      </div>
                      <div class="col-lg-6 col-sm-6 col-6 header-top-right">
                        <div class="header-social">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-dribbble"></i></a>
                            <a href="#"><i class="fa fa-behance"></i></a>
                        </div>
                      </div>
                  </div>			  					
                </div>
            </div>
            <div class="container main-menu">
                <div class="row align-items-center justify-content-between d-flex">
                  <div id="logo">
                    <a href="{{ url('/') }}"><img src="{{ asset('landing/img/logo.png') }}" alt="" title="" /></a>
                  </div>
                  <nav id="nav-menu-container">
                    <ul class="nav-menu">
                      <li><a href="{{ url('/') }}">Home</a></li>
                      <li><a href="{{ url('/about') }}">About</a></li>
                      <li><a href="{{ url('/flights') }}">Flights</a></li>
                      <li class="menu-has-children"><a href="">Booking & Reservations</a>
                        <ul>
                          <li><a href="{{ url('/login') }}">Login</a></li>
                          <li><a href="{{ url('/register') }}">Register</a></li>
                        </ul>
                      </li>					          					          		          
                      <li><a href="{{ url('/contact') }}">Contact</a></li>
                    </ul>
                  </nav><!-- #nav-menu-container -->					      		  
                </div>
            </div>
        </header><!-- #header -->

        @yield('content')

        <!-- start footer Area -->		
        <footer class="footer-area section-gap">
            <div class="container">

                <div class="row">
                    <div class="col-lg-3  col-md-6 col-sm-6">
                        <div class="single-footer-widget">
                            <h6>About Agency</h6>
                            <p>
                                The world has become so fast paced that people don’t want to stand by reading a page of information, they would much rather look at a presentation and understand the message. It has come to a point 
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="single-footer-widget">
                            <h6>Navigation Links</h6>
                            <div class="row">
                                <div class="col">
                                    <ul>
                                        <li><a href="{{ url('/') }}">Home</a></li>
                                        <li><a href="{{ url('/about') }}">About</a></li>
                                        <li><a href="#">Book Flight</a></li>
                                        <li><a href="{{ url('/contact') }}">Contact Us</a></li>
                                    </ul>
                                </div>
                                <div class="col">
                                    <ul>
                                        <li><a href="#">Team</a></li>
                                        <li><a href="#">Pricing</a></li>
                                        <li><a href="#">Blog</a></li>
                                        <li><a href="#">Contact</a></li>
                                    </ul>
                                </div>										
                            </div>							
                        </div>
                    </div>							
                    <div class="col-lg-3  col-md-6 col-sm-6">
                        <div class="single-footer-widget">
                            <h6>Newsletter</h6>
                            <p>
                                For business professionals caught between high OEM price and mediocre print and graphic output.									
                            </p>								
                            <div id="mc_embed_signup">
                                <form target="_blank" action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01" method="get" class="subscription relative">
                                    <div class="input-group d-flex flex-row">
                                        <input name="EMAIL" placeholder="Email Address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email Address '" required="" type="email">
                                        <button class="btn bb-btn"><span class="lnr lnr-location"></span></button>		
                                    </div>									
                                    <div class="mt-10 info"></div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3  col-md-6 col-sm-6">
                        <div class="single-footer-widget mail-chimp">
                            <h6 class="mb-20">InstaFeed</h6>
                            <ul class="instafeed d-flex flex-wrap">
                                <li><img src="{{ asset('landing/img/i1.jpg') }}" alt=""></li>
                                <li><img src="{{ asset('landing/img/i2.jpg') }}" alt=""></li>
                                <li><img src="{{ asset('landing/img/i3.jpg') }}" alt=""></li>
                                <li><img src="{{ asset('landing/img/i4.jpg') }}" alt=""></li>
                                <li><img src="{{ asset('landing/img/i5.jpg') }}" alt=""></li>
                                <li><img src="{{ asset('landing/img/i6.jpg') }}" alt=""></li>
                                <li><img src="{{ asset('landing/img/i7.jpg') }}" alt=""></li>
                                <li><img src="{{ asset('landing/img/i8.jpg') }}" alt=""></li>
                            </ul>
                        </div>
                    </div>						
                </div>

                <div class="row footer-bottom d-flex justify-content-between align-items-center">
                    <p class="col-lg-8 col-sm-12 footer-text m-0">
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    </p>
                    <div class="col-lg-4 col-sm-12 footer-social">
                        <a href="#"><i class="fa fa-facebook"></i></a>
                        <a href="#"><i class="fa fa-twitter"></i></a>
                        <a href="#"><i class="fa fa-dribbble"></i></a>
                        <a href="#"><i class="fa fa-behance"></i></a>
                    </div>
                </div>
            </div>
        </footer>
        <!-- End footer Area -->	

        <script src="{{ asset('landing/js/vendor/jquery-2.2.4.min.js') }}"></script>
        <script src="{{ asset('landing/js/popper.min.js') }}"></script>
        <script src="{{ asset('landing/js/vendor/bootstrap.min.js') }}"></script>			
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhOdIF3Y9382fqJYt5I_sswSrEw5eihAA"></script>		
        <script src="{{ asset('landing/js/jquery-ui.js') }}"></script>					
        <script src="{{ asset('landing/js/easing.min.js') }}"></script>			
        <script src="{{ asset('landing/js/hoverIntent.js') }}"></script>
        <script src="{{ asset('landing/js/superfish.min.js') }}"></script>	
        <script src="{{ asset('landing/js/jquery.ajaxchimp.min.js') }}"></script>
        <script src="{{ asset('landing/js/jquery.magnific-popup.min.js') }}"></script>						
        <script src="{{ asset('landing/js/jquery.nice-select.min.js') }}"></script>					
        <script src="{{ asset('landing/js/owl.carousel.min.js') }}"></script>							
        <script src="{{ asset('landing/js/mail-script.js') }}"></script>	
        <script src="{{ asset('landing/js/main.js') }}"></script>	
    </body>
</html>