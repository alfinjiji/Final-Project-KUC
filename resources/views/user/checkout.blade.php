@extends('user.layout')
@section('content')
   <!-- Navbar -->
   <nav class="navbar fixed-top navbar-expand-lg navbar-light white scrolling-navbar">
    <div class="container">

      <!-- Brand -->
      <a class="navbar-brand waves-effect" href="https://mdbootstrap.com/docs/jquery/" target="_blank">
        <strong class="blue-text">MDB</strong>
      </a>

      <!-- Collapse -->
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
        aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <!-- Links -->
      <div class="collapse navbar-collapse" id="navbarSupportedContent">

        <!-- Left -->
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link waves-effect" href="#">Home
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link waves-effect" href="https://mdbootstrap.com/docs/jquery/" target="_blank">About MDB</a>
          </li>
          <li class="nav-item">
            <a class="nav-link waves-effect" href="https://mdbootstrap.com/docs/jquery/getting-started/download/" target="_blank">Free download</a>
          </li>
          <li class="nav-item">
            <a class="nav-link waves-effect" href="https://mdbootstrap.com/education/bootstrap/" target="_blank">Free tutorials</a>
          </li>
        </ul>

        <!-- Right -->
        <ul class="navbar-nav nav-flex-icons">
          <li class="nav-item">
            <a class="nav-link waves-effect">
              <span class="badge red z-depth-1 mr-1"> 1 </span>
              <i class="fas fa-shopping-cart"></i>
              <span class="clearfix d-none d-sm-inline-block"> Cart </span>
            </a>
          </li>
          <li class="nav-item">
            <a href="https://www.facebook.com/mdbootstrap" class="nav-link waves-effect" target="_blank">
              <i class="fab fa-facebook-f"></i>
            </a>
          </li>
          <li class="nav-item">
            <a href="https://twitter.com/MDBootstrap" class="nav-link waves-effect" target="_blank">
              <i class="fab fa-twitter"></i>
            </a>
          </li>
          <li class="nav-item">
            <a href="https://github.com/mdbootstrap/bootstrap-material-design" class="nav-link border border-light rounded waves-effect"
              target="_blank">
              <i class="fab fa-github mr-2"></i>MDB GitHub
            </a>
          </li>
        </ul>

      </div>

    </div>
  </nav>
  <!-- Navbar -->

  <!--Main layout-->
  <main class="mt-5 pt-4">
    <div class="container wow fadeIn">

      <!-- Heading -->
      <h2 class="my-5 h2 text-center">Checkout form</h2>

      <!--Grid row-->
      <div class="row">

        <!--Grid column-->
        <div class="col-md-8 mb-4">

          <!--Card-->
          <div class="card">

            <!--Card content-->
            <form class="card-body">

              <!--Grid row-->
              <div class="row">

                <!--Grid column-->
                <div class="col-md-6 mb-2">

                  <!--firstName-->
                  <div class="md-form ">
                    <input type="text" id="firstName" class="form-control">
                    <label for="firstName" class="">First name</label>
                  </div>

                </div>
                <!--Grid column-->

                <!--Grid column-->
                <div class="col-md-6 mb-2">

                  <!--lastName-->
                  <div class="md-form">
                    <input type="text" id="lastName" class="form-control">
                    <label for="lastName" class="">Last name</label>
                  </div>

                </div>
            </div>
        </div>
    </div>
    <!-- BREADCRUMBS:END  -->

	<!-- ADDRESS-AREA   --> 
    <section class="payment-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="headline">
                        <h2>Select Address</h2>
                    </div>
					<table class="table table-bordered">
						<thead>
							<tr>
								<th colspan="2">
                                    <h4 class="float-left" style="color:black; font-weight:5px; padding-left: 1%;" id="choosename">Choose Your Address</h4>
                                    <button class="btn btn-warning float-right" id="addAddress">Add address</button>
                                </th>
							</tr>
						</thead>
						<!-- /thead -->
						<tbody id="tbody">
                            @foreach($addresses as $address)
							<tr>
								<td style="width:75px;" class="text-center">
                                    <input type="radio" name="address_id" id="address_id{{$loop->iteration}}" data-addressid="{{$address->customer_address_id}}" data-name="{{$address->name}}" value="{{ $address->customer_address_id }}" checked="checked"></td>
								<td>
									<div class="panel panel-warning">
										<div class="panel-heading">
											{{$address->name}} 
                                            <p class="float-right">{{$address->mobile}}</p>
										</div>
										<div class="panel-body">
										  <p>
                                            {{$address->house_name}}, {{$address->area}}, {{$address->city}}, {{$address->state}},
                                            -<b>{{$address->pincode}}</b> 
										  </p>
										</div>
									</div>
								</td>
							</tr>
                            @endforeach
						</tbody>
						<!-- /tbody -->
					</table>
            	</div>
                <div class="col-md-12">
                    <button type="button" class="btn btn-primary btn-md float-right" data-count="{{$address_count}}"  id="next">Next</button>
                </div>
        	</div>
        </div>
    </section>
    <!-- ADDRESS-AREA:END   -->

	<!-- PRODUCT-AREA   --> 
    <section class="payment-area" id="product">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="headline">
                        <h2>Products</h2>
                    </div>
                    <div class="table-responsive">
						<table class="table table-bordered">
							<thead>
								<tr>
									<th class="cart-product item">Product</th>
									<th class="cart-product-name item">Product Name</th>
									<th class="cart-qty item">Quantity</th>
									<th class="cart-unit item">Unit price</th>
									<th class="cart-sub-total last-item">Sub total</th>
								</tr>
							</thead>
							<!-- /thead -->
							<tbody>
								<tr>
									<td class="cart-image">
										<a href="#" class="entry-thumbnail">
											<img src="{{asset('storage/app/'.$product->productimage->image)}}" alt="img">
										</a>
									</td>
									<td class="cart-product-name-info">
									   <div class="cc-tr-inner">
											<h4 class="cart-product-description"><a href="#l">{{ $product->product_name }}</a></h4>
											<div class="cart-product-info">
												<span class="product-color">COLOR :</span><span>{{ $product->color }}</span>
												<br>
												<span class="product-color">Size :</span><span>{{ $product->size }}</span>
											</div>
									   </div>
									</td>
									<td class="cart-product-quantity">
										<div class="cart-quantity">
											<div class="quant-input">
												<input type="number" size="4" class="input-text qty text inp" id="qty" title="Qty" value="1" name="quantity" max="119" min="1" step="1">
											</div>
										</div>
									</td>
                                    <input type="hidden" id="product" value="{{ $product->product_id }}">
                                    <input type="hidden" id="price" value="{{ $product->pricelist->price }}">
									<td class="cart-product-price"><div class="cc-pr">${{ $product->pricelist->price }}</div></td>
									<td class="cart-product-sub-total">
                                        <div class="cc-pr">
                                            <input type="text" class="form-control" readonly="true" id="sum" value="{{$product->pricelist->price}}" style="background-color:transparent; border: transparent" >
                                        </div>
                                    </td>
								</tr>
							</tbody>
							<!-- /tbody -->
						</table>
						<!-- /table -->
					</div>
            	</div>
                <div class="col-md-12">
                    <button type="button" class="btn btn-primary btn-md float-left"  id="prev">Back</button>
                    <button type="button" class="btn btn-primary btn-md float-right" id="next2">Next</button>
                </div>
        	</div>
        </div>
    </section>
    <!-- PRODUCT-AREA:END   -->
	
    <!-- CHECK-CONTACT-AREA -->
    <section class="check-contact section-padding" id="orderSummary">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="headline">
                        <h2>Apply Coupon</h2>
                    </div>
                    <div class="theme-box">
						<h4>Apply coupon code here</h4>
						<p>Enter your coupon code</p>
						<form id="discount-code">
							<input type="text">
						</form>
						<button type="button" class="btn btn-default right-cart">Apply code</button>
					</div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="headline">
                        <h2>Order summary</h2>
                    </div>
                    <div class="summary">
                        <h2>Products<span>Total</span></h2>
                        <p>{{ $product->product_name }}
                            <span><input type="text" readonly="true" class="subtotal no-focus" value="{{$product->pricelist->price}}" style="background-color:transparent; border: transparent; width: 40px;" ></span>
                        </p>
                        <h3 class="line">Cart subtotal<span>
                            <input type="text" readonly="true" class="subtotal no-focus" value="{{$product->pricelist->price}}" style="background-color:transparent; border: transparent; width: 40px;" >    
                        </span></h3>
                        <h3 class="line2">Shipping<span class="mcolor">Free shipping</span></h3>
                        <h5>Order Total Price<span>
                            <input type="text" readonly="true" class="subtotal no-focus" value="{{$product->pricelist->price}}" style="background-color:transparent; border: transparent; width: 50px;" >    
                        </span></h5>
                    </div>
                </div>
            </div>
        </div>
    </section>
        
    <section id="placeOrder">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <button type="button" class="btn btn-primary btn-md float-left" id="prev2">Back</button>
                    <form method="POST" action="{{ route('do.checkout') }}">
                        @csrf
                        <input type="hidden" name="address_id" id="address_id">
                        <input type="hidden" name="amount" id="amount" value="{{$product->pricelist->price}}">
                        <input type="hidden" name="discount" id="discount">
                        <input type="hidden" name="coupon_id" id="coupon_id">
                        <input type="hidden" name="product_id" id="product_id" value="{{$product->product_id}}">
                        <input type="hidden" name="quantity" id="quantity">
                        <input type="hidden" name="unit_price" id="unit_price" value="{{$product->pricelist->price}}">
                        <button type="submit" class="btn btn-warning btn-md float-right">Place order</button>
                    </form>
                </div>
            </div>
          </form>
          <!-- Promo code -->

        </div>
    </section>
    <!-- CHECK-CONTACT-AREA:END   -->
	
    <!-- PAYMENT-AREA   --> 
    <!--
    <section class="payment-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="headline">
                        <h2>Select Payment Mode</h2>
                    </div>
                    <div class="payment">
                    <div class="bank">
                        <input type="radio" name="optradio">Direct Bank Transfer<br/>
                        <div class="b_text"><p>Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order wont be shipped
                            <br/>until the funds have cleared in our account.</p></div>
                    </div>
                    <div class="bank-radio">
                        <label>
                            <input type="radio" name="optradio">Cash On Delivery</label>
                        <br/>
                        <label>
                            <input type="radio" name="optradio">Paypal<img src="{{ asset('public/user-templates/images/master-card.png') }}" alt="">
                        </label><br/>
                        <button type="button" class="btn btn-default right-cart">Place order</button>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
-->
    <!-- PAYMENT-AREA:END   -->
	@endsection

    @section('custom_script')
    <script>
    $(document).ready(function () {
        var sum=0;
       var product=0;
        var qty=0;
        var price=0;
        $('#quantity').val(1);
        $('.inp').on('click load', function(){
            qty = $('#qty').val();
            $('#quantity').val(qty);
            price = $('#price').val();
            sum = qty * price;
            $('#amount').val(sum);
            $('#sum').val(sum);
            $('.subtotal').val(sum);
        });
        $('#product').hide();
        $('#orderSummary').hide();
        $('#placeOrder').hide();
        $('#next').click(function(){
            $count = $('#next').attr('data-count');
            var name=0;
            for($i=1;$i<=$count;$i=$i+1){
                if($('#address_id'+$i).is(':checked'))
                {
                    $id = $('#address_id'+$i).attr('data-addressid');
                    name= $('#address_id'+$i).attr('data-name');
                    $('#address_id').val($id);
                }
            }
            $('#product').show();
            $('#tbody').hide();
            $('#addAddress').hide();
            $('#next').hide();
            $('#choosename').html(name);
        });
        $('#next2').click(function(){
            $('#product').hide();
            $('#orderSummary').show();
            $('#placeOrder').show();
        });
        $('#prev').click(function(){
            $('#product').hide();
            $('#tbody').show();
            $('#addAddress').show();
            $('#next').show();
            $('#choosename').html("Choose Your Address");
        });
        $('#prev2').click(function(){
            $('#product').show();
            $('#orderSummary').hide();
            $('#placeOrder').hide(); 
        });
        $('#discount').val(0);
        $('#coupon_id').val(1);
    });
     </script>   
    @endsection