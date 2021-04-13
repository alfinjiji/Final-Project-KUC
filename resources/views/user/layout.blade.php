<!DOCTYPE html>
<!--[if IE]><![endif]-->
<!--[if lt IE 6 ]> <html lang="en" class="ie6">    <![endif]-->
<!--[if IE 7 ]>    <html lang="en" class="ie7">    <![endif]-->
<!--[if IE 8 ]>    <html lang="en" class="ie8">    <![endif]-->
<!--[if IE 9 ]>    <html lang="en" class="ie9">    <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!-->
<html lang="en">
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>Ecomshop | Ecommerce HTL5 template | Home page 2</title>
	
	<!-- Font css  -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,700,800' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Bitter' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Lato:400,400italic,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="{{ asset('public/user-templates/fonts/fonts.css')}}">
	
    <!-- Fontawesome css      -->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('public/user-templates/css/normalize.css')}}">
	
    <!-- Bootstrap css      -->
    <link rel="stylesheet" href="{{ asset('public/user-templates/css/bootstrap.css')}}">
	
    <!-- Owncarousel css      -->
    <link rel="stylesheet" href="{{ asset('public/user-templates/css/owl.carousel.css')}}">
	
	<!-- image zoom -->
	<link rel="stylesheet" href="{{ asset('public/user-templates/css/glasscase.css')}}">
	<link rel="stylesheet" href="{{ asset('public/user-templates/css/glasscase.minf195.css')}}">
	
    <!-- CSS STYLE-->
    <link rel="stylesheet" type="text/css" href="{{ asset('public/user-templates/css/style.css')}}" media="screen" />
	
    <!-- SLIDER REVOLUTION 4.x CSS SETTINGS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('public/user-templates/css/extralayers.css')}}" media="screen" />
    <link rel="stylesheet" type="text/css" href="{{ asset('public/user-templates/rs-plugin/css/settings.css')}}" media="screen" />
	
    <!-- Main css   -->
    <link rel="stylesheet" href="{{ asset('public/user-templates/style.css')}}">
    <link rel="stylesheet" href="{{ asset('public/user-templates/css/responsive.css')}}">
	
	<!-- Favicons -->
	<link rel="apple-touch-icon-precomposed" href="{{ asset('public/user-templates/images/apple-touch-icon-precomposed.png')}}">
	<link rel="shortcut icon" type="image/png" href="{{ asset('public/user-templates/images/favicon.png')}}"/>
    
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
	  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
	<style>
		.col5{
			background-color:#f89d18; 
			height:521px;
		}
		.col5h1{
			color:white; 
			padding:10% 0% 0% 10%;
			font-family: "bitterregular";
    		font-size: 34px;
		}
		.col5img{
			padding-top: 98%;
		}
		.col7{
			background-color:whitesmoke; 
			height:521px;
		}
		.col7input{
			width: 268px; 
			height:43px; 
			color: black;
			background-color: whitesmoke; 
			border:none; 
			border-bottom: 1px solid rgb(146, 146, 146);
		}
		.col7input2{
			width: 124px;
			height:43px; 
			color: black;
			background-color: whitesmoke; 
			border:none; 
			border-bottom: 1px solid rgb(146, 146, 146);
		}
		.btn-focus, .col7input, .col7input2:focus{
    		outline: none;
		}
	</style>
</head>

<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

    <!--  HEADER-AREA  -->
	<header class="entire_header">
		<div class="header-area">
			<div class="container">
				<div class="row">
					<div class="col-md-6 col-sm-5">
						<div class="user-menu">
							<ul class="list-unstyled list-inline">
								<li class="dropdown dropdown-small">
									<a data-toggle="dropdown" data-hover="dropdown" class="dropdown-toggle" href="#"><span class="value">English </span><i class="fa fa-angle-down"></i></a>
									<ul class="dropdown-menu">
										<li><a href="#">English</a>
										</li>
										<li><a href="#">French</a>
										</li>
										<li><a href="#">German</a>
										</li>
									</ul>
								</li>

								<li class="dropdown dropdown-small">
									<a data-toggle="dropdown" data-hover="dropdown" class="dropdown-toggle" href="#"><span class="value">USD </span><i class="fa fa-angle-down"></i></a>
									<ul class="dropdown-menu">
										<li><a href="#">USD</a>
										</li>
										<li><a href="#">INR</a>
										</li>
										<li><a href="#">GBP</a>
										</li>
									</ul>
								</li>
								<li>Welcome to Ecommerce</li>
							</ul>
						</div>
					</div>
					<div class="col-md-6 col-sm-7">
						<div class="header-right">
							<ul>
								<li class="dropdown dropdown-small">
									@if(!auth()->guard('customer')->check())
									<a data-toggle="dropdown" data-hover="dropdown" class="dropdown-toggle" href="#"><img class="account" src="{{ asset('public/user-templates/images/account.png')}}" alt="#"><span class="value">My Account </span><i class="fa fa-angle-down"></i>
									</a>
									@else
									<a data-toggle="dropdown" data-hover="dropdown" class="dropdown-toggle" href="#"><img class="account" src="{{ asset('public/user-templates/images/account.png')}}" alt="#"><span class="value">{{auth()->guard('customer')->user()->first_name}}</span><i class="fa fa-angle-down"></i>
									</a>	
									@endif
									<ul class="dropdown-menu account-menu">
										@if(auth()->guard('customer')->check())
										<li><a href="{{route('profile')}}">My account</a>
										</li>
										@endif
										<li><a href="{{route('user.wishlist')}}">Wishlist</a>
										</li>
										<li><a href="{{route('product.list')}}">Shopping</a>
										</li>
									</ul>
								</li>
								<li><a href="wishlist.html"><i class="fa fa-heart-o"></i> Wishlist</a>
								</li>
								<li>
									<a href="checkout.html"><img src="{{ asset('public/user-templates/images/check.png')}}" alt="#"> Checkout</a>
								</li>
								<li class="last-child">
									@if(!auth()->guard('customer')->check())
									<a class="logg" href="#" data-toggle="modal" data-target="#myModal">
										<img class="login" src="{{ asset('public/user-templates/images/log.png') }}" alt="#"> Login
									</a>
									@else
									<a class="logg" href="{{route('user.logout')}}">
										<img class="login" src="{{ asset('public/user-templates/images/log.png') }}" alt="#"> Logout
									</a>
									@endif
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Header-area:END -->

		<!-- Login Modal -->
		<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			<div class="modal-dialog" role="document">
			  <div class="modal-content">
				<div class="row">
					<div class="col-md-5 col5">
						<h1 class="col5h1"><b>Login</b></h1>
						<img class="col5img" src="{{ asset('public/user-templates/images/logo.png') }}" alt="">
					</div>
					<div class="col-md-7 col7" style="">
						<!-- Alert message -->
						<div class="alert alert-success alert-block" style="display: none; margin-top:5%;">
							<button type="button" class="close" data-dismiss="alert">×</button>
							  <strong class="success-msg"></strong>
						</div>
						<!-- Login form -->
						<div>
						<form id="loginForm" >
							@csrf
							<div style="padding: 20% 10% 10% 10%;">
								<input class="col7input" type="email" name="user_email" placeholder="Enter Email" id="logemail" autocomplete="off">
								<span id="error" style="color:red;"></span>
							</div>
							<div style="padding: 0% 10% 10% 10%;">
								<input class="col7input" type="password" name="user_password" placeholder="Enter Password" id="pwd">
								<span id="pass_error" style="color:red;"></span>
							</div>
							<div style="padding: 0% 10% 10% 10%;">
								<button class="btn btn-warning btn-block btn-focus" style="height:45px;" id="userlogin">Sign In</button>
							</div>
						</form>
						</div>
						<!-- Registration form -->
						<div>
							<form id="regForm">
								@csrf
								<div class="row">
									<div class="col-md-5" style="padding: 10% 10% 1% 13%;">
										<input class="col7input2" type="text" id="fname" name="fname" placeholder="First Name" autocomplete="off">
										<span style="color:red;" id="fname_err"></span>
									</div>
									<div class="col-md-5" style="padding: 10% 10% 1% 10%;">
										<input class="col7input2" type="text" id="lname" name="lname" placeholder="Last Name" autocomplete="off">
										<span style="color:red;" id="lname_err"></span>
									</div>
								</div>
								<div style="padding: 0% 10% 1% 10%;">
									<input class="col7input" type="text" id="mobile" name="mobile" placeholder="Mobile Number" autocomplete="off">
									<span style="color:red;" id="mobile_err"></span>
								</div>
								<div style="padding: 0% 10% 1% 10%;">
									<input class="col7input" type="email" id="email" name="email" placeholder="Email" autocomplete="off">
									<span style="color:red;" id="email_err"></span>
								</div>
								<div style="padding: 0% 10% 1% 10%;">
									<input class="col7input" type="password" id="password" name="password" placeholder="Password">
									<span style="color:red;" id="password_err"></span>
								</div>
								<div style="padding: 0% 10% 1% 10%;">
									<input class="col7input" type="password" id="cpswd" name="confirm_password" placeholder="Re-enter password">
									<span id="cpswd_error" style="color:red;"></span>
								</div>
								<div style="padding: 3% 10% 1% 10%;">
									<button class="btn btn-warning btn-block btn-focus" id="btn-submit" style="height:45px;">Sign up</button>
								</div>
							</form>
							</div>
							<div style="padding: 1% 10% 10% 10%; color: rgb(20, 78, 240); text-align:center;">
							<button id="tooglelink" class="btn-focus" style="height:45px; border: none; background-color: whitesmoke;">Create an account?</button>
							</div>
					</div>
				</div>
			  </div>
			</div>
		  </div>
		
		<!-- Logo-area -->
		<div class="logo_area">
			<div class="container">
				<div class="row">
					<div class="col-sm-4 col-md-4 col-xs-12">
						<div class="logo">
							<a href="index.html"><img src="{{ asset('public/user-templates/images/logo.png')}}" alt="">
							</a>
						</div>
					</div>
					<div class="col-sm-8 col-md-8 col-xs-12">
						<div class="search-area">
							<form>
								<div class="control-group">

									<ul class="categories-filter animate-dropdown">
										<li class="dropdown">

											<a class="dropdown-toggle" data-toggle="dropdown" href="#">All Categories <b class="caret"></b></a>

											<ul class="dropdown-menu" role="menu">

												<li role="presentation"><a role="menuitem" tabindex="-1" href="#">Fashion</a>
												</li>
												<li role="presentation"><a role="menuitem" tabindex="-1" href="#">Watches</a>
												</li>
												<li role="presentation"><a role="menuitem" tabindex="-1" href="#">House Wares</a>
												</li>
												<li role="presentation"><a role="menuitem" tabindex="-1" href="#">Desktop</a>
												</li>
												<li role="presentation"><a role="menuitem" tabindex="-1" href="#">Smartphones</a>
												</li>


											</ul>
										</li>
									</ul>
									<input class="search-field" placeholder="Search here..." />
									<a class="search-button" href="#"></a>
								</div>
							</form>
						</div>
						<div class="logo_right">
							<span><i class="fa fa-phone"></i></span>
							<a href="tel:+112345689">CALL US FREE
								<br/>+01 123 456 89</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- LOGO-AREA:END -->
		
		<!-- MENU-AREA -->
		<div class="menu-area">
			<div class="container">
				<div class="row">
					<div class="col-md-3 col-sm-3 col-xs-12">
						<div class="categories">
							<ul id="nav">
								<li>Categories <i class="fa fa-bars"></i>
									<ul>
										<li><a href="#"><i class="fa fa-male"></i> Fashion</a> </li>
										<li><a href="#"><i class="fa fa-clock-o"></i> Watches<i class="fa fa-angle-right icon-right"></i></a>
										</li>
										<li><a href="#"><i class="fa fa-home"></i>House Wares  <i class="fa fa-angle-right icon-right"></i></a> </li>
										<li><a href="#"><i class="fa fa-desktop"></i> Desktop & Monitors <i class="fa fa-angle-right icon-right"></i></a>
										</li>
										<li><a href="#"><i class="fa fa-mobile"></i> Smartphones</a> </li>
										<li><a href="#"><i class="fa fa-laptop"></i> Laptop & Tablates <i class="fa fa-angle-right icon-right"></i></a>
										</li>
										<li><a href="#"><i class="fa fa-lightbulb-o"></i> Light & Lamps <i class="fa fa-angle-right icon-right"></i></a>
										</li>
										<li><a href="#"><i class="fa fa-volume-up"></i> Sound & Audio</a>
										</li>
										<li><a href="#"><i class="fa fa-heart-o"></i> Health & Medical</a>
										</li>
										<li><a href="#"><i class="fa fa-wheelchair"></i> Gym Equipments</a>
										</li>
										<li class="last-li"><a href="#">View all categories</a>
										</li>
									</ul>
								</li>
							</ul>
						</div>
					</div>
					<div class="col-md-6 col-sm-6 col-xs-12">
						<nav class="main-menu">
							<ul id="navigation">
								<li class="active"><a href="{{route('home')}}">Home </a>
									
								</li>
								<li><a href="#">Pages <i class="fa fa-caret-down"></i></a>
									<ul class="drop_nav">
										<li><a href="{{route('home')}}">Blog</a></li>
										<li><a href="{{route('home')}}">Checkout</a></li>
										<li><a href="{{route('product.list')}}">Product list</a></li>
										@if(auth()->guard('customer')->check())
										<li><a href="{{route('profile')}}">Profile</a></li>
										@endif
										<li><a href="{{route('search')}}">Search result</a></li>
										<li><a href="{{route('single.product')}}">Single product</a></li>
										<li><a href="{{route('user.wishlist')}}">wishlist</a></li>
										<li><a href="404.html">404</a></li>
									</ul>
								</li>
								<li><a href="about-us.html">About Us</a>
								</li>
								<li><a href="product-list.html">Men</a>
								</li>
								<li><a href="product-list.html">Women</a>
								</li>
								<li><a href="contact-us.html">Contact Us</a>
								</li>
							</ul>
						</nav>
						
						<!-- Mobile Navigation -->
						<div class="only-for-mobile">
							<div class="col-xs-12">
								<ul class="ofm">
									<li class="m_nav"><i class="fa fa-bars"></i> Navigation</li>
								</ul>

								<!-- MOBILE MENU -->
								<div class="mobi-menu">
									<div id='cssmenu'>
										<ul>
											<li class='has-sub'>
												<a href='index.html'><span>Home</span></a>
											</li>
											<li class='has-sub'>
												<a href='#'><span>Pages</span></a>
												<ul class="sub-nav">
													<li><a href="blog.html">Blog</a></li>
													<li><a href="checkout.html">Checkout</a></li>
													<li><a href="product-list.html">Product list</a></li>
													<li><a href="profile.html">Profile</a></li>
													<li><a href="search-result.html">Search result</a></li>
													<li><a href="single-product.html">Single product</a></li>
													<li><a href="wishlist.html">wishlist</a></li>
													<li><a href="404.html">404</a></li>
												</ul>
											</li>
											<li>
												<a href='about-us.html'><span>About Us</span></a>
											</li>
											<li>
												<a href='product-list.html'><span>Men</span></a>
											</li>
											<li>
												<a href='product-list.html'><span>Women</span></a>
											</li>
											<li>
												<a href='contact-us.html'><span>Contact Us</span></a>
											</li>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-3 col-sm-3 col-xs-12">
						<div class="menu_right">
							<a href="cart-page.html"><i class="fa fa-shopping-cart"></i>My Cart</a>
							<span>2</span>

						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- MENU-AREA:END -->
	</header>
    <!-- Header-AREA END -->

    @yield('content')

     <!-- Entire FOOTER START -->
	<footer class="entire_footer">
		<!-- FOOTER-TOP-AREA -->
		<div class="footer_top_area  footer-padding">
			<div class="container">
				<div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12">
						<div class="top-border"></div>
					</div>
					<div class="col-sm-4 col-sm-4 col-xs-12">
						<div class="footer_top_single">
							<i class="fa fa-plane"></i>
							<h4>Free Shipping on order over $1000</h4>
							<p>It's time to meet the Muppets on the Muppet Show tonight. And we know Flipper.</p>
						</div>
					</div>
					<div class="col-sm-4 col-sm-4 col-xs-12">
						<div class="footer_top_single">
							<i class="fa fa-gift"></i>
							<h4>unlimited gifts on every order</h4>
							<p>It's time to meet the Muppets on the Muppet Show tonight. And we know Flipper.</p>
						</div>
					</div>
					<div class="col-sm-4 col-sm-4 col-xs-12">
						<div class="footer_top_single">
							<i class="fa fa-exchange"></i>
							<h4>100% money back guarantee</h4>
							<p>It's time to meet the Muppets on the Muppet Show tonight. And we know Flipper.</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- FOOTER-TOP-AREA:END -->
		
		<!-- FOOTER-WIDGET-AREA -->
		<div class="footer-widget">
			<div class="ovelay">
				<div class="container">
					<div class="row">
						<div class="col-sm-4 col-sm-4 col-xs-12">
							<div class="widget_logo">
								<a href="index.html"><img src="{{ asset('public/user-templates/images/logo_footer.png')}}" alt="logo"></a>
								<ul>
									<li>
										<div class="wl_left">
											<i class="fa fa-location-arrow"></i>
										</div>
										<div class="wl_right">
											<a href="#"><span>Address :</span> 09 Ecommerceshop, Design Street,  Victoria, Australia</a>
										</div>
									</li>
									<li>
										<div class="wl_left">
											<i class="fa fa-envelope-o"></i>
										</div>
										<div class="wl_right">
											<a href="#"><span>E-mail :</span> Info@Ecommerceshop.com</a>
										</div>
									</li>
									<li>
										<div class="wl_left">
											<i class="fa fa-phone"></i>
										</div>
										<div class="wl_right">
											<a href="#"><span>phone :</span> +01 123 456 78</a>
										</div>
									</li>
								</ul>
							</div>
						</div>
						<div class="col-sm-2 col-sm-2 col-xs-12">
							<div class="widget_single">
								<h4><a href="#">My Account</a></h4>
								<ul>
									<li><a href="profile.html">My Account</a>
									</li>
									<li><a href="wishlist.html">Wishlist</a>
									</li>
									<li><a href="cart-page.html">Shopping Cart</a>
									</li>
									<li><a href="checkout.html">Checkout</a>
									</li>
								</ul>
							</div>
						</div>
						<div class="col-sm-2 col-sm-2 col-xs-12">
							<div class="widget_single">
								<h4><a href="#">Information</a></h4>
								<ul>
									<li><a href="#">About Our Shop</a>
									</li>
									<li><a href="#">Top Seller</a>
									</li>
									<li><a href="#">Special Products</a>
									</li>
									<li><a href="#">Manufacturers</a>
									</li>
									<li><a href="#">Secure Shopping</a>
									</li>
									<li><a href="#">Privacy Policy</a>
									</li>
									<li><a href="#">Delivery Information</a>
									</li>
								</ul>
							</div>
						</div>
						<div class="col-sm-2 col-sm-2 col-xs-12">
							<div class="widget_single">
								<h4><a href="#">Our Support</a></h4>
								<ul>
									<li><a href="contact-us.html">Contact Us</a>
									</li>
									<li><a href="#">Shipping & Taxes</a>
									</li>
									<li><a href="#">Return Policy</a>
									</li>
									<li><a href="#">Careers</a>
									</li>
									<li><a href="#">Affiliates</a>
									</li>
									<li><a href="#">Gift Vouchers</a>
									</li>
								</ul>
							</div>
						</div>
						<div class="col-sm-2 col-sm-2 col-xs-12">
							<div class="widget_single">
								<h4><a href="#">Our Services</a></h4>
								<ul>
									<li><a href="#">Shipping & Returns</a>
									</li>
									<li><a href="#">International Shopping</a>
									</li>
									<li><a href="#">Best Customer Support</a>
									</li>
									<li><a href="#">Easy Replacement</a>
									</li>

								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- FOOTER-WIDGET-AREA:END -->
		
		<!-- FOOTER-AREA -->
		<div class="footer_area">
			<div class="container">
				<div class="row">
					<div class="col-md-6 col-sm-6 col-xs-12">
						<div class="footer_text">
							<p>&copy;2015 <a href="index.html">E-Comshop</a>. All rights reserved</p>
						</div>
					</div>
					<div class="col-md-6 col-sm-6 col-xs-12">
						<div class="footer_right">
							<ul>
								<li><a href="#"><img src="{{ asset('public/user-templates/images/mc.png')}}" alt="" /></a></li>
								<li><a href="#"><img src="{{ asset('public/user-templates/images/visa.png')}}" alt="" /></a></li>
								<li><a href="#"><img src="{{ asset('public/user-templates/images/crr.png')}}" alt="" /></a></li>
								<li><a href="#"><img src="{{ asset('public/user-templates/images/disco.png')}}" alt="" /></a></li>
								<li><a href="#"><img src="{{ asset('public/user-templates/images/bank.png')}}" alt="" /></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- FOOTER-AREA:END -->
	</footer>
	<!-- Entire FOOTER END -->
	
    
    <!-- jQuery latest -->
	<script type="text/javascript" src="{{ asset('public/user-templates/js/jQuery.2.1.4.js')}}"></script>
	
	<!-- js Modernizr -->
	<script src="{{ asset('public/user-templates/js/modernizr-2.6.2.min.js')}}"></script>
	
	<!-- js Modernizr -->
	<script src="http://cdnjs.cloudflare.com/ajax/libs/waypoints/2.0.3/waypoints.min.js"></script>
	<script src="{{ asset('public/user-templates/js/jquery.counterup.min.js')}}"></script>

    <!-- Revolution slider -->
    <script type="text/javascript" src="{{ asset('public/user-templates/rs-plugin/js/jquery.themepunch.tools.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('public/user-templates/rs-plugin/js/jquery.themepunch.revolution.min.js')}}"></script>
	
	@yield('scripts')

	<!-- Bootsrap js -->
    <script src="{{ asset('public/user-templates/js/bootstrap.min.js')}}"></script>
	
	<!-- Plugins js -->
    <script src="{{ asset('public/user-templates/js/plugins.js')}}"></script>
	
	<!-- Owl js -->
    <script src="{{ asset('public/user-templates/js/owl.carousel.min.js')}}"></script>
	
	<!-- Custom js -->
    <script src="{{ asset('public/user-templates/js/main.js')}}"></script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js" integrity="sha512-UdIMMlVx0HEynClOIFSyOrPggomfhBKJE28LKl8yR3ghkgugPnG6iLfRfHwushZl1MOPSY6TsuBDGPK2X4zYKg==" crossorigin="anonymous"></script>
	
	<script>
	$(document).ready(function () {
	// user login and register toogle
	$("#regForm").hide();
	$("#tooglelink").click(function(){
    	$("#loginForm, #regForm").toggle();
		$("#tooglelink").text($("#tooglelink").text()==='if your already register , login' ? 'Create an account?' : 'if your already register , login');
	});
	// check passwword and confirm password
	$("#cpswd").keyup(function(){
		var pswd=$("#password").val();
		var cpswd=$("#cpswd").val();
		if(cpswd != pswd){
			$("#cpswd_error").css('color','red');
         	$("#cpswd_error").html("Password not match!!");
		}
		else{
		 	$("#cpswd").css('border-color','green');
			$("#cpswd_error").html(""); 
		}
	});
	// ajax registration
    $("#btn-submit").click(function(e){
        e.preventDefault()
        var _token = $("input[name='_token']").val();
        var fname = $("#fname").val();
        var lname = $("#lname").val();
        var mobile = $("#mobile").val();
		var email = $("#email").val();
		var password = $("#password").val()
		// registration form validation
        if(fname=='' || lname=='' || mobile=='' || email=='' || password=='')
		{	
			if(fname==''){
			 	$('#fname_err').html("required");
				$('#fname').css('border-color','red');
			 	$('#fname').keyup(function(){
			 		$('#fname_err').html("");
					$('#fname').css('border-color','green');
			 	});
			}
			if(lname==''){
			 	$('#lname_err').html("required");
				$('#lname').css('border-color','red');
			 	$('#lname').keyup(function(){
			 		$('#lname_err').html("");
					$('#lname').css('border-color','green');
			 	});
			}
			if(mobile.length < 10 ||mobile.length >10 ){
			 	$('#mobile_err').html("mobile number required");
				$('#mobile').css('border-color','red');
			 	$('#mobile').on("keydown keyup change", function(){
					mobile = $("#mobile").val();
					if(mobile.length < 10){
			 		 $('#mobile_err').html("mobile number required");
					$('#mobile').css('border-color','red');
					}
					else if(mobile.length > 10){
						$('#mobile_err').html("mobile number required");
					$('#mobile').css('border-color','red');

					}
					else{
						$('#mobile_err').html("");
				        $('#mobile').css('border-color','green');
					}
			 	});
			}
			if(IsEmail(email)==false){
			 	$('#email_err').html("email required");
				$('#email').css('border-color','red');
				$('#email').keypress(function(){
				    email = $("#email").val();
					if( IsEmail(email)==false){
						$('#email_err').html("email required");
				        $('#email').css('border-color','red');
					}
					else{
						$('#email_err').html("");
					$('#email').css('border-color','green');
					}
				});
			}
			if(password==''){
			 	$('#password_err').html("password required");
				$('#password').css('border-color','red');
			 	$('#password').keyup(function(){
			 		$('#password_err').html("");
					$('#password').css('border-color','green');
			 	});
			}
		 } else {
        	$.ajax({
        	    url: "{{ route('user.register') }}",
        	    type:'POST',
        	    data: {
					_token:_token, 
					fname:fname, 
					lname:lname, 
					mobile:mobile, 
					email:email, 
					password:password
				},
        	    success: function(data) {
        	      printMsg(data);
        	    }
        	});
		 }
    }); 
	// error and success message
    function printMsg (msg) {
      if($.isEmptyObject(msg.error)){
          console.log(msg.success);
          $('.alert-block').css('display','block').append('<strong>'+msg.success+'</strong>');
		  $("#regForm")[0].reset();
		  $("#tooglelink").text($("#tooglelink").text()==='if your already register , login' ? 'Create an account?' : 'if your already register , login');
		  $("#regForm").hide();
		  $("#loginForm").show();

      }else{
        	console.log(msg.error);
			$("#email_err").html(msg.error);
		    $("#email_err").css('color','red');
			$("#email").css('border-color','red');
      }
    }
	//ajax login validation and login
		$("#userlogin").click(function(e){
			e.preventDefault();
			var _token = $("input[name='_token']").val();
			var email = $("#logemail").val();
			var pwd = $("#pwd").val();
			if( IsEmail(email)==false){
				$('#error').html("Enter a valid email");
				$('#logemail').keypress(function(){
				    email = $("#logemail").val();
					if( IsEmail(email)==false){
						$('#error').html("Enter a valid email");
					}
					else{
					$('#error').html("");}
				});
			}
			else if(pwd==''){
				$('#pass_error').html("password must enter");
				$('#pwd').keyup(function(){
					$('#pass_error').html("");
				});
			}
           else{
			$.ajax({
				url: "{{ route('user.login') }}",
				type:'POST',
				data: {_token:_token, email:email, pwd:pwd},
				success: function(data){  
						console.log(data);
                          if(data.error==0)  
                          {  
                               $('#pass_error').html("invalid email or password");  
                          }  
                          else  
                          {  
                               $('#myModal').hide();  
                               location.reload();  
                          }  
                     } 
			});
		   }
		});
		$("#mobile").keypress(function (e) {
            if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
               $("#mobile_err").html("Digits Only").show().fadeOut("slow");
		        return false;
	        }
        });
	});
	function IsEmail(email) {
  var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
  if(!regex.test(email)) {
    return false;
  }else{
    return true;
  }
}
</script>
	

</body>

</html>