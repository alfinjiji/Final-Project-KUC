@extends('user.layout')
@section('content')
    <!-- PAGE-TITLE-AREA -->
    <section class="page-title-area">
        <div class="page-title-overlay">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="page-title">
                            <h3>Place Order</h3>
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
    <!-- BREADCRUMBS:END -->
   <!-- ADDRESS-AREA   --> 
    <section class="payment-area" id="address">
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
                                    <a href="{{route('address')}}"><button class="btn btn-warning float-right" id="addAddress">Add address</button></a>
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
                            @csrf
							<input class="no-focus" type="text" name="coupon_code" id="coupon_code" autocomplete="off">
                            <br><span style="color: red;" id="coupon_error"></span><br>
                            <button type="button" id="apply_coupon" class="btn btn-default right-cart">Apply code</button>
                            <button type="button" id="clear_coupon" class="btn btn-default right-cart">Clear code</button>
						</form>
					</div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="headline">
                        <h2>Order summary</h2>
                    </div>
                    <div class="summary">
                        <h2>Products<span>Total</span></h2>
                        <p>{{ $product->product_name }}
                            <span><input type="text" readonly="true" class="subtotal no-focus" value="{{$product->pricelist->price}}" style="background-color:transparent; border: transparent; width: 60px;" ></span>
                        </p>
                        <h3 class="line">Cart subtotal<span>
                            <input type="text" readonly="true" class="subtotal no-focus" value="{{$product->pricelist->price}}" style="background-color:transparent; border: transparent; width: 60px; color: #3333;" >    
                        </span></h3>
                        <h3 class="line2">Discount<span style="padding-right: 7%;" id="discount_val">0</span></h3>
                        <h3 class="line2">Shipping<span class="mcolor">Free shipping</span></h3>
                        <h5>Order Total Price<span>
                            <input type="text" id="total_price" readonly="true" class="subtotal no-focus" value="{{$product->pricelist->price}}" style="background-color:transparent; border: transparent; width: 70px;" >    
                        </span></h5>
                    </div>
                </div>
                <div class="col-md-12" style="padding: 2% 2% 0% 2%">
                    <button type="button" class="btn btn-primary btn-md float-left"  id="prev2">Back</button>
                    <button type="button" class="btn btn-warning btn-md float-right" id="next3">Checkout</button>
                </div>
            </div>
        </div>
    </section>

    <!-- PAYMENT-AREA   --> 
    
    <section class="payment-area" id="payment">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="headline">
                        <h2>Select Payment Mode</h2>
                    </div>
                    <div class="payment">
                    <div class="bank">
                        <input type="radio" name="optradio" disabled>Direct Bank Transfer<br/>
                        <div class="b_text"><p>Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order wont be shipped
                            <br/>until the funds have cleared in our account.</p></div>
                    </div>
                    <div class="bank-radio">
                        <form method="POST" action="{{ route('do.checkout') }}">
                            @csrf
                            <label>
                                <input type="radio" name="optradio" id="cod">Cash On Delivery</label>
                            <br/>
                            <label>
                                <input type="radio" name="optradio" id="paypal" disabled>Paypal<img src="{{ asset('public/user-templates/images/master-card.png') }}" alt="">
                            </label><br/>
                            <label>
                                <input type="radio" name="optradio" id="wallet" data-walletBal="{{Auth::guard('customer')->user()->wallet_amount}}">Wallet &nbsp; <span style="color: green;" id="balance"> [ ${{Auth::guard('customer')->user()->wallet_amount}} ]</span>
                            </label><br/>
                            <input type="hidden" name="address_id" id="address_id">
                            <input type="hidden" name="amount" id="amount" value="{{$product->pricelist->price}}">
                            <input type="hidden" name="discount" id="discount" value="0">
                            <input type="hidden" name="coupon_id" id="coupon_id">
                            <input type="hidden" name="product_id" id="product_id" value="{{$product->product_id}}">
                            <input type="hidden" name="quantity" id="quantity">
                            <input type="hidden" name="unit_price" id="unit_price" value="{{$product->pricelist->price}}">
                            <input type="hidden" name="payment_mode" id="payment_mode">
                            <button type="submit" id="place_order" class="btn btn-default right-cart">Place order</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>

    <!-- PAYMENT-AREA:END   -->
       
    <!-- place order  -->
    <section id="placeOrder">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <button type="button" class="btn btn-primary btn-md float-right" id="prev3">Back</button>
                    <!--
                    <form method="POST" action="{{ route('do.checkout') }}">
                        @csrf
                        <input type="hidden" name="address_id" id="address_id">
                        <input type="hidden" name="amount" id="amount" value="{{$product->pricelist->price}}">
                        <input type="hidden" name="discount" id="discount" value="0">
                        <input type="hidden" name="coupon_id" id="coupon_id">
                        <input type="hidden" name="product_id" id="product_id" value="{{$product->product_id}}">
                        <input type="hidden" name="quantity" id="quantity">
                        <input type="hidden" name="unit_price" id="unit_price" value="{{$product->pricelist->price}}">
                        <button type="submit" class="btn btn-warning btn-lg float-left">Place order</button>
                    </form>  -->
                </div>
            </div>
          </form>
          <!-- Promo code -->

        </div>
    </section>
    <!-- end  place order  -->
    
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
        $('#payment').hide();
        $('#clear_coupon').hide();
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
        });
        $('#next3').click(function(){
            $('#orderSummary').hide();
            $('#address').hide();
            $('#payment').show();
            $('#placeOrder').show();
            $('#place_order').hide();
            $wallet_balance = parseFloat($('#wallet').attr('data-walletBal'));
            $amount = parseFloat($('#amount').val());
            if($amount > $wallet_balance){
                $('#wallet').attr('disabled','true');
            } 
           
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
        $('#prev3').click(function(){
            $('#orderSummary').show();
            $('#address').show();
            $('#payment').hide();
            $('#placeOrder').hide();
            $balance = $('#wallet').attr('data-walletBal');
            $('#balance').html("[ $"+$balance+" ]");
            $('#wallet').prop('disabled',false);
            $('#wallet').prop('checked',false);
        });
        // prevent refresh on enter press
        $("#coupon_code").keypress(function (event) {
            if (event.keyCode == 13) {
                event.preventDefault();
            }
        });
        // clear coupon code
        $('#clear_coupon').click(function(){
            $('#coupon_code').css('border-color','#ddd');
            $('#coupon_code').val("");
            $('#coupon_error').html('');
            $amount = $('#amount').val();
            $discount = $('#discount').val();
            $('#total_price').val(parseFloat($amount) + parseFloat($discount));
            $('#discount_val').html(0);
            $('#amount').val(parseFloat($amount) + parseFloat($discount));
            $('#discount').val(0);
            $('#clear_coupon').hide();
            $('#apply_coupon').show();
        });
        // wallet click
        $('#wallet').click(function(){
            $('#place_order').show();
            $wallet_balance = $('#wallet').attr('data-walletBal');
            $amount = $('#amount').val();
            $balance = parseFloat($wallet_balance)-parseFloat($amount);
            $('#balance').html("[ $"+$balance+" ]");
            $('#payment_mode').val('wallet');
        });
        // cod click
        $('#cod').click(function(){
            $('#place_order').show();
            $('#payment_mode').val('cod');
        });
        // coupon check
        $('#apply_coupon').click(function(e){
            e.preventDefault();
            var subtot =parseInt($('#sum').val());
            var _token = $("input[name='_token']").val();
            var coupon_code = $('#coupon_code').val();
            if(coupon_code == ''){
                $('#coupon_code').css('border-color','red');
                $('#coupon_error').css('color','red'); 
                $('#coupon_error').html('please enter vaild coupon code!');

            } else {
                $.ajax({
		        	url: "{{ route('coupon.check') }}",
		        	type:'POST',
		        	data: {
                            _token:_token, 
                            subtot:subtot,
                            coupon_code:coupon_code, 
                          },
		        	success: function(data){  
		        		console.log(data);
                        if(data.error==0) {  
                            $('#coupon_error').html("invalid coupon code");
                            $('#coupon_error').css('color','red');  
                            $('#coupon_code').css('border-color','red'); 
                        } else {    
                            $('#coupon_error').html("coupen verified");
                            $('#coupon_error').css('color','green'); 
                            $('#coupon_code').css('border-color','green');
                            $('#coupon_id').val(data.coupon_id);
                            $('#amount').val(data.grandtotal);
                            $('#discount').val(subtot - parseFloat(data.grandtotal));
                            $('#total_price').val(data.grandtotal);
                            $('#discount_val').html(subtot - parseFloat(data.grandtotal));
                            // after coupen applied disable coupon button
                            $('#apply_coupon').hide();
                            $('#clear_coupon').show();
                            $('#apply_coupon').css('border','none');
                        }  
                    } 
		        });
            }
        });
    });
     </script>   
    @endsection