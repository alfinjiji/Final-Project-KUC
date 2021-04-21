@extends('user.layout')
@section('content')
    <!-- PAGE-TITLE-AREA -->
    <section class="page-title-area">
        <div class="page-title-overlay">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="page-title">
                            <h3>Checkout</h3>
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
                        <h3>Checkout</h3>
                    </div>
                    <ol class="breadcrumb">
                        <li><a href="index.html">Home</a>
                        </li>
                        <li><a href="about-us.html">Checkout</a>
                        </li>
                    </ol>
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
                                @foreach($cart as $cart)
								<tr>
									<td class="cart-image">
										<a href="#" class="entry-thumbnail">
											<img src="{{asset('storage/app/'.$cart->product->productimage->image)}} " alt="">
										</a>
									</td>
									<td class="cart-product-name-info">
									   <div class="cc-tr-inner">
											<h4 class="cart-product-description"><a href="#l">{{ $cart->product->product_name }}</a></h4>
											<div class="cart-product-info">
												<span class="product-color">COLOR :</span><span>{{ $cart->product->color }}</span>
												<br>
												<span class="product-color">Size :</span><span>{{ $cart->product->size }}</span>
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
									<td class="cart-product-price"><div class="cc-pr">${{ $cart->product->pricelist->price }}</div></td>
									<td class="cart-product-sub-total">
                                        <div class="cc-pr float-right">
                                            <input type="text" class="form-control" readonly="true" id="sum" value="${{$cart->product->pricelist->price}}" style="background-color:transparent; border: transparent;" >
                                        </div>
                                    </td>
								</tr>
                                @endforeach
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
                        @foreach($summary as $cart)
                            <p>{{ $cart->product->product_name }}
                                <span><input type="text" readonly="true" class="subtotal no-focus" value="{{$cart->product->pricelist->price}}" style="background-color:transparent; border: transparent; width: 40px;" ></span>
                            </p>
                        @endforeach
                        <h3 class="line">Cart subtotal<span>
                            <input type="text" readonly="true" class="subtotal no-focus" value="" style="background-color:transparent; border: transparent; width: 40px;" >    
                        </span></h3>
                        <h3 class="line2">Shipping<span class="mcolor">Free shipping</span></h3>
                        <h5>Order Total Price<span>
                            <input type="text" readonly="true" class="subtotal no-focus" value="" style="background-color:transparent; border: transparent; width: 50px;" >    
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
                        <input type="text" name="address_id" id="address_id">
                        <input type="text" name="amount" id="amount" value="">
                        <input type="text" name="discount" id="discount">
                        <input type="text" name="coupon_id" id="coupon_id">
                        <input type="text" name="product_id" id="product_id" value="">
                        <input type="text" name="quantity" id="quantity">
                        <input type="text" name="unit_price" id="unit_price" value="">
                        <button type="submit" class="btn btn-warning btn-md float-right">Place order</button>
                    </form>
                </div>
            </div>
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