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
                  <!--  <div class="brands">
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
                    </div> -->
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
											@foreach($product->productimages as $product_image)
												<li>
													<img src="{{asset('storage/app/'.$product_image->image)}}" alt='image' />
												</li>
											@endforeach
											
										</ul>
									</div>
									
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="single-product-content">
                                    <h3>{{ $product->product_name }}</h3>
									<input type="hidden" value="{{ $product->product_id }}" id="product_id">
                                    <div class="product-review">
                                        <ul>
                                            <li>
                                                <i  class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-half-o"></i>
                                            </li>
                                            <li>{{$review_count}} Review(s) </li>
                                            
                                        </ul>
                                        <h4>Availability <span>: In Stock </span>
                                    </h4>
									
                                        <div class="product-wid-price">
                                            <ins id="price">${{$product->pricelist->price}}</ins> <del id="del_price">${{$product->pricelist->price+($product->pricelist->price*.2)}}</del>
                                        </div>
                                        <p> </p>
                                    </div>
									<div class="row">
										<div class="col-md-6">
											<h4><b style="color: black;">Color </b>: {{ $product->color }}</h4>
										</div>
										<div class="col-md-6">
											<h4><b style="color: black;">Size </b>: 
												<select name="size" id="size">
													@foreach($productsizes as $productsize) 
												     <option data-id="{{$productsize->size->size}}" value="{{$productsize->productsize_id}}">{{$productsize->size->size}}</option>
												    @endforeach
											  </select>
											</h4>
										</div>
									</div>
									<!-- review modal -->
									
									<!-- review modal  end -->
									<!--
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
                                    </div> -->
									<!--
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
										
                                        </div>
                                    </div>
                                    </div> -->
									<div class="row" style="padding-top: 20px;">
										<div class="col-md-4">
											@if(Auth::guard('customer')->check())
												
												    <input type="button"  id="cartBtn"  data-id="{{ $product->product_id}}" class="fa fa-shopping-cart btn btn-warning btn-block btn-cus" value="Add to cart">
													<!--<a href="" id="cartBtn" data-id="{{ $product->product_id}}" class="fa fa-shopping-cart btn btn-warning btn-block btn-cus"> Add to cart</a> -->
												
											@else
												<a href=""  data-toggle="modal" data-target="#myModal" class="fa fa-shopping-cart btn btn-warning btn-block btn-cus"> Add to cart</a>	
											@endif
										</div>
										<div class="col-md-4">
											@if(Auth::guard('customer')->check())
											  <form method="POST" action="{{route('show.checkout')}}">
												  @csrf
												  <input type="hidden" name="product_id" value="{{$product->product_id}}" >
												  <input type="hidden" name="productsize_id" id="productsize_id">
												  <input type="submit" class="fa fa-shopping-cart btn btn-warning btn-block btn-cus" value="Buy now">
											  </form>
											@else 
												<a href="" class="fa fa-shopping-cart btn btn-warning btn-block btn-cus" data-toggle="modal" data-target="#myModal"> Buy now</a>
											@endif
										</div>
										@if(Auth::guard('customer')->check())
									@if($product->wishlist_flag == 0)
										<button type="submit" id="wishlist_btn" data-id="{{ $product->product_id }}">
											<span class="PrdWishlist "><i id="{{ $product->product_id }}" class="PrdWishlistActive fa fa-heart color_change" aria-hidden="true"></i></span>
										</button>
									@else 
										<button type="submit" id="wishlist_btn" data-id="{{ $product->product_id }}">
											<span class="PrdWishlist "><i id="{{ $product->product_id }}" class="PrdWishlist fa fa-heart color_change" aria-hidden="true"></i></span>
										</button>
									@endif
								@else 
									<button type="submit" id="wishlist_btn" data-toggle="modal" data-target="#myModal">
										<span class="PrdWishlist "><i class="PrdWishlistActive fa fa-heart color_change" aria-hidden="true"></i></span>
									</button>
								@endif
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
                          
                        </ul>
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active" id="home">{{ $product->description }}</div>
                            <div role="tabpanel" class="tab-pane" id="profile">
								<div class="review_panel">
									<div class="review_comments">
										<div class="review_heading">
											<div class="review_heading_left">
												<h2><span>Review for </span> {{ $product->product_name }}</h2>
											</div>
										</div>
										<div class="single_review_comment">
											@foreach ($reviews as $review)
											<div class="single_review_text">
												<h4>{{$review->review_summary}}</h4>
												
												<p>{{$review->review}}</p>
												<div class="review_italic">
													<p><span>{{$review->customer->first_name}},</span> {{date('d-m-Y', strtotime($review->updated_at))}}</p>
												</div>
											</div>
											@endforeach
										</div>
									</div>
									<!--
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
								-->
								</div>
							</div>
                           
                        </div>
                    </div>
                    <div class="product-latest">
                        <div class="">
                            <div class="headline">
                                <h2>Similar products</h2>
                            </div>
							<div class="row">
								@foreach($similar_products as $similar_product)
								<div class="col-md-4 col-sm-4 col-xs-12">
									<div class="product-single">
										<a href="{{route('single.product',['id'=>encrypt($similar_product->product_id)])}}"><img src="{{ asset('storage/app/'.$similar_product->productimage->image) }}" alt="#">
										</a>
										<!--<div class="tag percent">
											<span>15%</span>
										</div> -->
										<div class="hot-wid-rating">
											<h4><a href="#">{{$similar_product->product_name}}</a></h4>
											@for($i=1;$i<=$similar_product->rating;$i++)
											<i class="fa fa-star checked"></i>
										   @endfor
											@for($i=5-$similar_product->rating;$i>0;$i--)
											<i class = "fa fa-star unchecked"></i>
											@endfor
											<div class="product-wid-price">
												<ins>${{$similar_product->pricelist->price}}</ins>
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
        </div>
    </div>
    <!-- PRODUCT-LIST:END -->
	
    @endsection

	@section('scripts')
    <script>
		
	$(document).ready(function(){
		var  productsize_id = $('#size').val();
		$('#productsize_id').val(productsize_id);
		 product_id = $("#product_id").val();
		//page load cart ajax
		$.ajax({
				url: "{{ route('cart.check') }}",
				type:'GET',
				data: {
						product_id:product_id,  
						productsize_id:productsize_id,
					  },
				success: function(data){  
					console.log(data);
					if(data.error==0) {  
						//error
						$('#cartBtn').attr('disabled',false);
						//alert("already in cart");
					} else {    
					   //success
					   $('#cartBtn').attr('disabled',true);
					}  
				} 
			});
		
			// ajax wishlist
		$("#cartBtn").click(function(e){
			e.preventDefault();
			//var _token = $("input[name='_token']").val();
			var product_id = $("#cartBtn").attr('data-id');
			productsize_id=$('#productsize_id').val();
			console.log(product_id);
			$.ajax({
				url: "{{ route('cart.store') }}",
				type:'GET',
				data: {
						product_id:product_id,  
						productsize_id:productsize_id,
					  },
				success: function(data){  
					console.log(data);
					if(data.error==0) {  
						//error
						$('#cartBtn').attr('disabled',true);
						//alert("already in cart");
					} else {    
					   //success
					   $('#cartBtn').attr('disabled',true);
					}  
				} 
			});
		});
		$("#wishlist_btn").click(function(e){
		        	e.preventDefault();
		        	//var _token = $("input[name='_token']").val();
					var product_id = $(this).attr('data-id');
					console.log(product_id);
		        	$.ajax({
		        		url: "{{ route('wishlist.store') }}",
		        		type:'GET',
		        		data: {
                               // _token:_token, 
                                product_id:product_id, 
                              },
		        		success: function(data){  
		        			console.log(data);
                            if(data.error==0) {  
                                //remove from wishlist
								$("#"+product_id).removeClass("PrdWishlist");
								$("#"+product_id).addClass("PrdWishlistActive");
                            } else {    
                               //add to wishlist 
							    $("#"+product_id).removeClass("PrdWishlistActive");
								$("#"+product_id).addClass("PrdWishlist");
                            }  
                        } 
		        	});
		        });
				$('#review').click(function(){
					$('#reviewmodal').show();
				});

				$("select").change(function(){
                  var  productsize_id = $(this).children("option:selected").val();
                  var product_id=$(this).children("option:selected").attr('data-id');
				  $.ajax({
		        		url: "{{ route('sizevariant') }}",
		        		type:'GET',
		        		data: {
                               // _token:_token, 
                                productsize_id:productsize_id, 

                              },
		        		success: function(data){  
		        			console.log(data);
                           $('#price').html(data.price);
						   var price=data.price+(data.price*.2);
						   $('#del_price').html(price);
                           $('#productsize_id').val(productsize_id);
						   if(data.flag==0) {  
						     //error
						     $('#cartBtn').attr('disabled',false);
					        } else {    
					         //success
					         $('#cartBtn').attr('disabled', true);
					        }  
                        } 
		        	});
               });
	});
		</script>
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