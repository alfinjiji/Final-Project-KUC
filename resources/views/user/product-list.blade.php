@extends('user.layout')
@section('content')
    <!-- PAGE-TITLE-AREA -->
    <section class="page-title-area">
        <div class="page-title-overlay">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="page-title">
                            <h3>Product list</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- PAGE-TITLE-AREA:END -->
	
    <!-- BREADCRUMBS  -->
    <div class="title-breadcrumb">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="bred-title">
                        <h3>Product list</h3>
                    </div>
                    <ol class="breadcrumb">
                        <li><a href="index.html">Home</a>
                        </li>
                        <li><a href="about-us.html">Product list</a>
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- BREADCRUMBS:END  -->
	
    <!-- PRODUCT-LIST-AREA  -->
    <div class="product-list-area section-padding">
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
									<a href="#"><img src="{{ asset('public/user-templates/images/sell1.png') }}" alt="" class="product-thumb">
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
									<a href="#"><img src="{{ asset('public/user-templates/images/sell2.png') }}" alt="" class="product-thumb">
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
									<a href="#"><img src="{{ asset('public/user-templates/images/sell3.png') }}" alt="" class="product-thumb">
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
									<a href="#"><img src="{{ asset('public/user-templates/images/sell4.png') }}" alt="" class="product-thumb">
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
									<a href="#"><img src="{{ asset('public/user-templates/images/sell1.png') }}" alt="" class="product-thumb">
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
									<a href="#"><img src="{{ asset('public/user-templates/images/sell2.png') }}" alt="" class="product-thumb">
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
									<a href="#"><img src="{{ asset('public/user-templates/images/sell3.png') }}" alt="" class="product-thumb">
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
									<a href="#"><img src="{{ asset('public/user-templates/images/sell4.png') }}" alt="" class="product-thumb">
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
                    <div class="row">
                        @foreach($product as $product)
                        <div class="col-md-4 col-sm-4 col-xs-12">
                            <div class="product-single">
                                <a href="#"><img src="{{asset('storage/app/'.$product->image)}}" alt="#">
                                </a>
                                <div class="tag new">
                                    <span>new</span>
                                </div>
                                <div class="hot-wid-rating">
                                    <h4><a href="single-product.html">{{$product->product_name}}</a></h4>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <div class="product-wid-price">
                                        <ins>${{$product->pricelist->price}}</ins>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- PRODUCT-LIST:END -->
	
	@endsection