@extends('user.layout')
@section('content')
	
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
	
    @endsection

	@section('scripts')

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
	
	@endsection