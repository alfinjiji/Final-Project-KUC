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
    <title>Ecomshop | Ecommerce HTL5 template | Single Product page</title>
	
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
									<a data-toggle="dropdown" data-hover="dropdown" class="dropdown-toggle" href="#"><img class="account" src="{{ asset('public/user-templates/images/account.png')}}" alt="#"><span class="value">My Account </span><i class="fa fa-angle-down"></i>
									</a>
									<ul class="dropdown-menu account-menu">
										<li><a href="profile.html">My account</a>
										</li>
										<li><a href="wishlist.html">Wishlist</a>
										</li>
										<li><a href="product-list.html">Shopping</a>
										</li>
									</ul>
								</li>
								<li><a href="wishlist.html"><i class="fa fa-heart-o"></i> Wishlist</a>
								</li>
								<li>
									<a href="checkout.html"><img src="{{ asset('public/user-templates/images/check.png')}}" alt="#"> Checkout</a>
								</li>
								<li class="last-child">
									<a class="logg" href="#"><img class="login" src="{{ asset('public/user-templates/images/log.png')}}" alt="#"> Login</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Header-area:END -->
		
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
								<li class="active"><a href="index.html">Home <i class="fa fa-caret-down"></i></a>
									<ul class="drop_nav">
										<li><a href="homepage_02.html">Home two</a></li>
										<li><a href="homepage_03.html">Home three</a></li>
									</ul>
								</li>
								<li><a href="#">Pages <i class="fa fa-caret-down"></i></a>
									<ul class="drop_nav">
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
												<ul class="sub-nav">
													<li><a href="homepage_02.html"><span>Home version 2</span></a></li>
													<li><a href="homepage_03.html"><span>Home version 3</span></a></li>
												</ul>
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
	
    <!-- PAGE-TITLE-AREA -->
    <section class="page-title-area">
        <div class="page-title-overlay">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="page-title">
                            <h3>Product details</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- PAGE-TITLE-AREA:END -->
	
    <!-- BREADCRUMBS -->
    <div class="title-breadcrumb">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="bred-title">
                        <h3>Product details</h3>
                    </div>
                    <ol class="breadcrumb">
                        <li><a href="index.html">Home</a>
                        </li>
                        <li><a href="about-us.html">Product details</a>
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- BREADCRUMBS:END -->
	
    <!-- PRODUCT-LIST-AREA -->
    <div class="single-product-area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-3 col-xs-12">
                    <div class="brands">
                        <h3>Brands <i class="fa fa-bars"></i></h3>
                        <ul>
                            <li> <input type="checkbox" name="vehicle" value="Bike"> Awesome <span>(03)</span>
                            </li>
                            <li> <input type="checkbox" name="vehicle" value="Bike"> Beauty <span>(05)</span>
                            </li>
                            <li> <input type="checkbox" name="vehicle" value="Bike"> Elegant <span>(11)</span>
                            </li>
                            <li> <input type="checkbox" name="vehicle" value="Bike"> Fantastic <span>(01)</span>
                            </li>
                            <li> <input type="checkbox" name="vehicle" value="Bike"> Wonderful <span>(06)</span>
                            </li>
                        </ul>
                    </div>
                    <div class="filter">
                        <h3>Filter by price</h3>
                        <div class="filter_inner">
							<div id="slider-range"></div>
							<div class="f_price">
								<div class="filter_a">
									<a href="">Filter</a>
								</div>
								<div class="cat_filter_box">
									<p>
									  <input type="text" id="amount" readonly style="border:0; color:#000; font-weight:bold;">
									</p>
								</div>
							</div>
						</div>
                    </div>
                    <div class="colours">
                        <h3>Colours <i class="fa fa-bars"></i></h3>
                        <ul>
                            <li> <input type="checkbox" name="vehicle" value="Bike">  White <span>(03)</span>
                            </li>
                            <li> <input type="checkbox" name="vehicle" value="Bike">  Black <span>(05)</span>
                            </li>
                            <li> <input type="checkbox" name="vehicle" value="Bike">  Blue <span>(11)</span>
                            </li>
                            <li> <input type="checkbox" name="vehicle" value="Bike">  Yellow <span>(01)</span>
                            </li>
                            <li> <input type="checkbox" name="vehicle" value="Bike">  Red <span>(06)</span>
                            </li>
                        </ul>
                    </div>
                    <div class="best-sell">
                        <h3>Best seller</h3>
						
						<div id="plCarousel" class="carousel slide" data-ride="carousel">

						  <!-- Wrapper for slides -->
						  <div class="carousel-inner" role="listbox">
							<div class="item active">
								<div class="single-wid-product sel-pd">
									<a href="#"><img src="{{ asset('public/user-templates/images/sell1.png')}}" alt="" class="product-thumb">
									</a>
									<h2><a href="single-product.html">Canon mini model</a></h2>
									<div class="product-wid-rating">
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
									</div>
									<div class="product-wid-price">
										<ins>$250.00</ins>
									</div>
								</div>
								<div class="single-wid-product sel-pd">
									<a href="#"><img src="{{ asset('public/user-templates/images/sell2.png')}}" alt="" class="product-thumb">
									</a>
									<h2><a href="single-product.html">Nexus</a></h2>
									<div class="product-wid-rating">
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
									</div>
									<div class="product-wid-price">
										<ins>$250.00</ins>
									</div>
								</div>
								<div class="single-wid-product sel-pd">
									<a href="#"><img src="{{ asset('public/user-templates/images/sell3.png')}}" alt="" class="product-thumb">
									</a>
									<h2><a href="single-product.html">Pink women bag</a></h2>
									<div class="product-wid-rating">
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
									</div>
									<div class="product-wid-price">
										<ins>$250.00</ins>
									</div>
								</div>
								<div class="single-wid-product sel-pd">
									<a href="#"><img src="{{ asset('public/user-templates/images/sell4.png')}}" alt="" class="product-thumb">
									</a>
									<h2><a href="single-product.html">Trendy Watch</a></h2>
									<div class="product-wid-rating">
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
									</div>
									<div class="product-wid-price">
										<ins>$250.00</ins>
									</div>
								</div>
							</div>
							<div class="item">
								<div class="single-wid-product sel-pd">
									<a href="#"><img src="{{ asset('public/user-templates/images/sell1.png')}}" alt="" class="product-thumb">
									</a>
									<h2><a href="single-product.html">Canon mini model</a></h2>
									<div class="product-wid-rating">
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
									</div>
									<div class="product-wid-price">
										<ins>$250.00</ins>
									</div>
								</div>
								<div class="single-wid-product sel-pd">
									<a href="#"><img src="{{ asset('public/user-templates/images/sell2.png')}}" alt="" class="product-thumb">
									</a>
									<h2><a href="single-product.html">Nexus</a></h2>
									<div class="product-wid-rating">
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
									</div>
									<div class="product-wid-price">
										<ins>$250.00</ins>
									</div>
								</div>
								<div class="single-wid-product sel-pd">
									<a href="#"><img src="{{ asset('public/user-templates/images/sell3.png')}}" alt="" class="product-thumb">
									</a>
									<h2><a href="single-product.html">Pink women bag</a></h2>
									<div class="product-wid-rating">
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
									</div>
									<div class="product-wid-price">
										<ins>$250.00</ins>
									</div>
								</div>
								<div class="single-wid-product sel-pd">
									<a href="#"><img src="{{ asset('public/user-templates/images/sell4.png')}}" alt="" class="product-thumb">
									</a>
									<h2><a href="single-product.html">Trendy Watch</a></h2>
									<div class="product-wid-rating">
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
									</div>
									<div class="product-wid-price">
										<ins>$250.00</ins>
									</div>
								</div>
							</div>

						  </div>

						  <!-- Left and right controls -->
						  <a class="left carousel-control" href="#plCarousel" role="button" data-slide="prev">
							<i class="fa fa-angle-left"></i>
						  </a>
						  <a class="right carousel-control" href="#plCarousel" role="button" data-slide="next">
							<i class="fa fa-angle-right"></i>
						  </a>
						</div>
						
                    </div>
                </div>
                <div class="col-md-9 col-sm-9 col-xs-12">
                    <div class="single-product-details">
                        <div class="row">
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="product-img-detail">
										
									<div class="single_product_image">
										<input type="hidden" id="__VIEWxSTATE" />
										<ul id='zoom1' class=''>
											<li>
												<img src="{{ asset('public/user-templates/images/Single-Product.png')}}" alt='image1' />
											</li>
											<li>
												<img src="{{ asset('public/user-templates/images/Single-Product1.jpg')}}" alt='image2' />
											</li>
											<li>
												<img src="{{ asset('public/user-templates/images/Single-Product2.jpg')}}" alt='image3' />
											</li>
											<li>
												<img src="{{ asset('public/user-templates/images/Single-Product3.jpg')}}" alt='image1' />
											</li>
											<li>
												<img src="{{ asset('public/user-templates/images/Single-Product4.jpg')}}" alt='image2' />
											</li>
											<li>
												<img src="{{ asset('public/user-templates/images/Single-Product5.jpg')}}" alt='image2' />
											</li>
										</ul>
									</div>
									
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="single-product-content">
                                    <h3>Awesome stylish shirts</h3>
                                    <div class="product-review">
                                        <ul>
                                            <li>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-half-o"></i>
                                            </li>
                                            <li>5 Review(s) <span class="rev-border">|</span></li>
                                            <li>Add Your Review</li>
                                        </ul>
                                        <h4>Availability <span>: In Stock 20 Item(s)</span>
                                    </h4>
                                        <div class="product-wid-price">
                                            <ins>$75</ins> <del>$85</del>
                                        </div>
                                        <p>The ship set ground on the shore of this uncharted desert isle with Gilligan the Skipper too the millionaire and his wife. And when the odds are against him and their dangers work to do. </p>
                                    </div>

                                    <div class="single-color">
                                        <div class="product-color">
                                            <h4>Color :</h4>
                                            <ul>
                                                <li>
                                                    <a class="black-clr" href="#"></a>
                                                </li>
                                                <li>
                                                    <a class="yellow-clr" href="#"></a>
                                                </li>
                                                <li>
                                                    <a class="red-clr" href="#"></a>
                                                </li>
                                                <li>
                                                    <a class="rose-clr" href="#"></a>
                                                </li>
                                                <li>
                                                    <a class="pest-clr" href="#"></a>
                                                </li>
                                                <li>
                                                    <a class="grey-clr" href="#"></a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="product-size">
                                            <p>Size :</p>
                                            <select>
                                                <option>XL</option>
                                                <option>L</option>
                                                <option>M</option>
                                                <option>S</option>
                                                <option>XS</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="single-color">
                                        <div class="product-collection">
                                            <ul>
                                                <li><a href="#"><i class="fa fa-heart-o"></i></a>
                                                </li>
                                                <li><a href="#"><i class="fa fa-exchange"></i></a>
                                                </li>
                                                <li><a href="#"><i class="fa fa-envelope-o"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="single-color last-color-child">
                                        <div class="size-heading">
                                            <h5>Qty :</h5>
                                        </div>
                                        <div class="size-down">
                                            <input type="number" step="1" min="0" max="119" name="quantity[113]" value="1" title="Qty" class="input-text qty text" size="4">
                                        </div>
                                        <div class="size-cart">
										<a href="" class="fa fa-shopping-cart"> Add to cart</a>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="product-tab product-tab-single">
                        <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Product description</a>
                            </li>
                            <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Reviews</a>
                            </li>
                            <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Product tags</a>
                            </li>
                        </ul>
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active" id="home">Then along come two they got nothin' but their jeans. Flying away on a wing and a prayer. Who could it be? Believe it or not its just me. Today still wanted by the government they survive as soldiers of fortune. Boy the way Glen Miller played. Songs that made the hit parade. Guys like us we had it made. Those were the days.</div>
                            <div role="tabpanel" class="tab-pane" id="profile">
								<div class="review_panel">
									<div class="review_comments">
										<div class="review_heading">
											<div class="review_heading_left">
												<h2><span>Review for </span> "Gray Structured T-Shirt"</h2>
											</div>
											<div class="review_heading_right">
												<ul id="review_heading_star">
													<li><a href="" class="fa fa-star"></a></li>
													<li><a href="" class="fa fa-star"></a></li>
													<li><a href="" class="fa fa-star"></a></li>
													<li><a href="" class="fa fa-star"></a></li>
													<li><a href="" class="fa fa-star"></a></li>
												</ul>
											</div>
										</div>
										<div class="single_review_comment">
											<div class="single_review_img">
												<img src="{{ asset('public/user-templates/images/kous.png')}}" alt="">
											</div>
											<div class="single_review_text">
												<h4>A Stunning Beauty!</h4>
												<ul id="single_review_star">
													<li><a href="" class="fa fa-star"></a></li>
													<li><a href="" class="fa fa-star"></a></li>
													<li><a href="" class="fa fa-star"></a></li>
													<li><a href="" class="fa fa-star"></a></li>
													<li><a href="" class="fa fa-star"></a></li>
												</ul>
												<p>Semper orci etiam ac ultricies ante. Donec lobortis variusjusto et. Curabitur egestas aliquet massa non elementum. Quisque at risus nisl. Aliquam erat volutpat. Suspendisse potenti. Nullam porta faucibus elit.</p>
												<div class="review_italic">
													<p><span>Nicole Bailey,</span> 12.05.2013</p>
												</div>
											</div>
										</div>
									</div>
									<div class="Review_input">
										<div class="review_input_heading">
											<h3>Write your review</h3>
										</div>
										<div class="review_comment_input">
											<input type="text" placeholder="Enter Your Nickname"><br>
											<input type="text" placeholder="Summary of your Review"><br>
											<textarea cols="30" rows="10" placeholder="Write your review"></textarea><br>
											<input type="submit" value="Submit Review">
										</div>
									</div>
								</div>
							</div>
                            <div role="tabpanel" class="tab-pane" id="messages">Boy the way Glen Miller played.Then along come two they got nothin' but their jeans. Flying away on a wing and a prayer. Who could it be? Believe it or not its just me. Today still wanted by the government they survive as soldiers of fortune. Boy the way Glen Miller played. Songs that made the hit parade. Guys like us we had it made. Those were the days.</div>
                        </div>
                    </div>
                    <div class="product-latest">
                        <div class="">
                            <div class="headline">
                                <h2>Latest product</h2>
                            </div>
							<div class="row">
								<div class="col-md-4 col-sm-4 col-xs-12">
									<div class="product-single">
										<a href="#"><img src="{{ asset('public/user-templates/images/product7.png')}}" alt="#">
										</a>
										<div class="tag percent">
											<span>15%</span>
										</div>
										<div class="hot-wid-rating">
											<h4><a href="#">stylish dress for women</a></h4>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<div class="product-wid-price">
												<ins>$3000.00</ins>
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-4 col-sm-4 col-xs-12">
									<div class="product-single">
										<a href="#"><img src="{{ asset('public/user-templates/images/product8.png')}}" alt="#">
										</a>
										<div class="hot-wid-rating">
											<h4><a href="#">stylish dress for women</a></h4>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<div class="product-wid-price">
												<ins>$3000.00</ins>
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-4 col-sm-4 col-xs-12">
									<div class="product-single">
										<a href="#"><img src="{{ asset('public/user-templates/mages/product9.png')}}" alt="#">
										</a>
										<div class="hot-wid-rating">
											<h4><a href="#">stylish dress for women</a></h4>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<div class="product-wid-price">
												<ins>$3000.00</ins>
											</div>
										</div>
									</div>
								</div>
							</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- PRODUCT-LIST:END -->
	
    <!-- Entire FOOTER:START -->
	<footer class="entire_footer">
		<!-- FOOTER-TOP-AREA -->
		<div class="footer_top_area  footer-padding">
			<div class="container">
				<div class="row">
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
	<!-- Entire FOOTER:END -->
	
    <!-- jQuery latest -->
	<script type="text/javascript" src="{{ asset('public/user-templates/js/jQuery.2.1.4.js')}}"></script>
	
	<!-- js Modernizr -->
	<script src="{{ asset('public/user-templates/js/modernizr-2.6.2.min.js')}}"></script>

    <!-- Revolution slider -->
    <script type="text/javascript" src="{{ asset('public/user-templates/rs-plugin/js/jquery.themepunch.tools.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('public/user-templates/rs-plugin/js/jquery.themepunch.revolution.min.js')}}"></script>
	
	<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
	<script>
	  $(function() {
		$( "#slider-range" ).slider({
		  range: true,
		  min: 150,
		  max: 1400,
		  values: [ 520, 1100 ],
		  slide: function( event, ui ) {
			$( "#amount" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
		  }
		});
		$( "#amount" ).val( "$" + $( "#slider-range" ).slider( "values", 0 ) +
		  " - $" + $( "#slider-range" ).slider( "values", 1 ) );
	  });
	</script>
	
	<!-- glasscase js -->
	<script src="{{ asset('public/user-templates/js/jquery.glasscase.minf195.js')}}"></script>
	
	<script type="text/javascript">
		$(function () {
			//ZOOM
			$("#zoom1").glassCase({ 'widthDisplay': 456, 'heightDisplay': 470, 'isSlowZoom': true });
		});
	</script>
	
	<!-- Bootsrap js -->
    <script src="{{ asset('public/user-templates/js/bootstrap.min.js')}}"></script>
	
	<!-- Plugins js -->
    <script src="{{ asset('public/user-templates/js/plugins.js')}}"></script>
	
	<!-- Owl js -->
    <script src="{{ asset('public/user-templates/js/owl.carousel.min.js')}}"></script>
	
	<!-- Custom js -->
    <script src="{{ asset('public/user-templates/js/main.js')}}"></script>

</body>

</html>