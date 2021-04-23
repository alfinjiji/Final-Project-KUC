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
                        <h2 id="head">Select Address</h2>
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
												<input type="number" style="border: none;" class="input-text qty text no-focus" value="{{$cart->quantity}}" id="qty" name="quantity" readonly>
											</div>
										</div>
									</td>
									<td class="cart-product-price"><div class="cc-pr">${{ $cart->product->pricelist->price }}</div></td>
									<td class="cart-product-sub-total">
                                        <div class="cc-pr float-right">
                                            <input type="text" class="form-control" id="subtotal{{ $loop->iteration }}" data-subtotal{{$loop->iteration}}="{{$cart->product->pricelist->price * $cart->quantity}}" readonly="true" value="${{$cart->product->pricelist->price * $cart->quantity}}" style="background-color:transparent; border: transparent;" >
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
                    <button type="button" class="btn btn-primary btn-md float-right" id="next2" data-cart_count={{$cart_count}}>Next</button>
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
                            <button type="button" id="clear_coupon" class="btn btn-default right-cart">Clear</button>
						</form>
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
                                <span><input type="text" readonly="true" class="subtotal no-focus" value="{{$cart->product->pricelist->price * $cart->quantity}}" data-subtotal="{{$cart->product->pricelist->price * $cart->quantity}}" style="background-color:transparent; border: transparent; width: 40px;" ></span>
                            </p>
                        @endforeach
                        <h3 class="line">Cart subtotal<span>
                            <input type="text" readonly="true" id="cart_total" class="subtotal no-focus" value="" style="background-color:transparent; border: transparent; width: 60px;" >    
                        </span></h3>
                        <h3 class="line2">Discount<span class="mcolor"><input type="text" readonly="true" id="discount_price" class="subtotal no-focus" value="0" style="background-color:transparent; border: transparent; width: 60px;" ></span></h3>
                        <h5>Order Total Price<span>
                            <input type="text" readonly="true" id="total_price" class="subtotal no-focus" value="" style="background-color:transparent; border: transparent; width: 60px;" >    
                        </span></h5>
                    </div>
                </div>
                <button type="button" class="btn btn-primary btn-md float-left" id="prev2">Back</button>
        <button type="button" class="btn btn-primary btn-md float-right" id="placeorder" data-id={{$wallet->wallet_amount}}>Next</button>
            </div>
        </div>
    </section>
     

    <!-- CHECK-CONTACT-AREA:END   -->
	
    <!-- PAYMENT-AREA   --> 
    
    <section class="payment-area" >
        <div class="container" id="payment">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="headline">
                        <h2>Select Payment Mode</h2>
                    </div>
                    <form method="POST" action="{{ route('do.cart.checkout') }}">
                        @csrf  
                    <div class="payment">
                    <div class="bank">
                        <input type="radio" id="bank" name="optradio">Direct Bank Transfer<br/>
                        <div class="b_text"><p>Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order wont be shipped
                            <br/>until the funds have cleared in our account.</p></div>
                    </div>
                    <div class="bank-radio">
                        <label>
                            <input type="radio" id="cod" name="optradio">Cash On Delivery</label>
                        <br/>
                        <label>
                            <input type="radio" id="paypal" name="optradio">Paypal<img src="{{ asset('public/user-templates/images/master-card.png') }}" alt="">
                        </label><br/>
                        <label>
                            <input type="radio" name="optradio" id="wallet">wallet &nbsp;<span style="color: rgb(0, 88, 38);">[$<span id="balance" style="color: rgb(0, 88, 38);">{{$wallet->wallet_amount}}</span>]</span></label>
                        <br/>
                      <input type="hidden" name="address_id" id="address_id">
                        <input type="hidden" name="amount" id="amount">
                        <input type="hidden" name="discount" id="discount" value="0">
                        <input type="hidden" name="coupon_id" id="coupon_id">
                        <input type="hidden" name="pay_method" id="paymethod">
                        <button type="submit" class="btn btn-default right-cart" id="submit">Place order</button>
                    </div>
                </div>
            </form>
            <button  class="btn btn-primary btn-md float-left" id="prev3">Back</button>
            </div>
        </div>
        </div>
    </section>

   <!-- PAYMENT-AREA:END   -->
	@endsection

    @section('custom_script')
    <script>
    $(document).ready(function () {
        $('#product').hide();
        $('#orderSummary').hide();
        $('#placeOrder').hide();
        $('#payment').hide();
        var price=0;
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
            $('#head').html('Selected Address');

        });
        $('#next2').click(function(){
            $('#product').hide();
            $('#orderSummary').show();
            $('#placeOrder').show();
            $('#clear_coupon').hide();
            $count = $('#next2').attr('data-cart_count');
            var total = 0;
            for($i=1;$i<=$count;$i++){
                $subtotal = $('#subtotal'+$i).attr('data-subtotal'+$i);
                total = total + parseInt($subtotal);
            }
            //cart total price
            $('#cart_total').val(total);
            $('#amount').val(total);
            // total amount after discount
            $('#total_price').val(total);


        });
        $('#prev').click(function(){
            $('#product').hide();
            $('#tbody').show();
            $('#addAddress').show();
            $('#next').show();
            $('#choosename').html("Choose Your Address");
            $('#head').html('Select Address');
        });
        $('#prev2').click(function(){
            $('#product').show();
            $('#orderSummary').hide();
            $('#placeOrder').hide(); 
        });
        $('#prev3').click(function(){
            $('#payment').hide();
            $('#orderSummary').show();
        });
        // coupon check
        $('#apply_coupon').click(function(e){
            e.preventDefault();
            price=$('#total_price').val();
            var subtot =parseInt($('#total_price').val());
            var _token = $("input[name='_token']").val();
            var coupon_code = $('#coupon_code').val()
            if(coupon_code == ''){
                $('#coupon_code').css('border-color','red');
                $('#coupon_error').html('please enter vaild coupon code!')
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
                            $('#amount').val(parseInt(data.grandtotal));
                            $('#discount').val(subtot - parseInt(data.grandtotal));
                            $('#discount_price').val(subtot - parseInt(data.grandtotal));
                            $('#total_price').val(parseInt(data.grandtotal));
                            // after coupen applied disable coupon button
                            $('#apply_coupon').hide();
                            $('#apply_coupon').css('border','none');
                            $('#clear_coupon').show();
                        }  
                    } 
		        });
            }
        });
        $('#placeorder').click(function(){
            $('#payment').show();
            $('#orderSummary').hide();
            var wallet=parseInt($('#placeorder').attr('data-id'));
            price=parseInt( $('#total_price').val());
            $('#submit').hide();
            if(wallet<price){
            $('#wallet').attr('disabled','true');
            }
        });
        $('#clear_coupon').click(function(){
            $('#coupon_code').val("");
            $('#discount_price').val('0');
            $('#coupon_error').html("");
            $('#coupon_code').css('border-color','#ddd');
            $('#clear_coupon').hide(); 
            $('#apply_coupon').show();
            $('#total_price').val(price);
        });
        $('#wallet').click(function(){
            var wallet=parseInt($('#placeorder').attr('data-id'));
            $('#submit').show();
           price=parseInt( $('#total_price').val());
           $('#balance').html([wallet-price]);
           $('#paymethod').val('wallet');
           $('#prev3').hide();
        });
        $('#cod').click(function(){
            var wallet=parseInt($('#placeorder').attr('data-id'));
            $('#submit').show();
            $('#balance').html([wallet]);
            $('#paymethod').val('cod');
            $('#prev3').hide();
        });
        $('#bank').click(function(){
            var wallet=parseInt($('#placeorder').attr('data-id'));
            $('#submit').show();
            $('#balance').html([wallet]);
            $('#paymethod').val('bank');
            $('#prev3').hide();
        });
        $('#paypal').click(function(){
            var wallet=parseInt($('#placeorder').attr('data-id'));
            $('#submit').show();
            $('#balance').html([wallet]);
            $('#paymethod').val('paypal');
            $('#prev3').hide();
        });
    });
     </script>   
    @endsection