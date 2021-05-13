@extends('user.layout')
@section('content')
	
    <!-- PAGE-TITLE-AREA -->
    <section class="page-title-area">
        <div class="page-title-overlay">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="page-title">
                            <h3>Shoping cart</h3>
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
                        <h3>Shoping cart</h3>
                    </div>
                    <ol class="breadcrumb">
                        <li><a href="index.html">Home</a>
                        </li>
                        <li><a href="cart-page.html">Shoping cart</a>
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- BREADCRUMBS:END -->
	
    <!-- SHOPING-CART-AREA   -->
    <div class="shoping-cart section-padding">
        <div class="container">
            <div class="row">
				<div class="col-md-12 col-sm-12 col-xs-12">
                <div class="headline">
                    <h2>Shopping cart</h2>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th class="cart-product item">Product</th>
                                <th class="cart-product-name item">Product Name</th>
                                <th class="cart-qty item">Quantity</th>
                                <th class="cart-unit item">Unit price</th>
                                <th class="cart-delivery item">Delivery info</th>
                                <th class="cart-sub-total last-item">Sub total</th>
                                <th class="cart-romove item">Remove</th>
                            </tr>
                        </thead>
                        <!-- /thead -->
                        <tfoot>
                            <tr>
                                <td colspan="7">
                                    <div class="shopping-cart-btn">
                                        <a href="{{route('home')}}">
                                        <button type="button" class="btn btn-default left-cart">Continue Shopping</button>
                                        </a>
                                        <a href="{{route('cart.clear')}}">
                                        <button type="button" class="btn btn-default right-cart right-margin">Clear shopping cart</button>
                                        </a>
                                        <div class="checkout">
                                            <p style>
                                                <h4>Subtotal</h4><span><input type="text"  data-count="{{$count}}"  id="subtotal" style="background-color:transparent; border: transparent; text-align:right;" readonly="true"></span>
                                            </p>
                                            <a href="{{route('checkout.cart')}}"><button type="button" class="btn btn-default right-cart">Proceed to checkout</button></a>
                                        </div>
                                    </div>
                                    <!-- /.shopping-cart-btn -->
                                </td>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach($carts as $cart)
                            <tr>
                                <td class="cart-image">
                                    <a href="{{route('single.product',['id'=>encrypt($cart->product->product_id)])}}" class="entry-thumbnail">
                                        <img src="{{asset('storage/app/'.$cart->product->productimage->image)}} "  alt="">
                                    </a>
                                </td>
                                <td class="cart-product-name-info">
									<div class="cc-tr-inner">
										<h4 class="cart-product-description"><a href="#">{{$cart->product->product_name}}</a></h4>
										<div class="cart-product-info">
											<span class="product-color">COLOR :</span><span>{{$cart->product->color}}</span>
											<br>
											<span class="product-color">Size :</span><span>{{$cart->productsize->size->size}}</span>
										</div>
								   </div>
                                </td> 
                                <td class="cart-product-quantity">
                                    <div class="quant-input ">
                                        <input type="number" size="4" data-id="{{ $loop->iteration }}" data-cart="{{$cart->cart_id}}" class="input-text qty text Btn" title="Qty" value="{{$cart->quantity}}" name="quantity[113]" max="119" min="1" step="1" id="Qty{{ $loop->iteration }}">
                                    </div>
                                </td>
                                <td class="cart-product-price"><div class="cc-pr">{{$cart->price}} <input type="hidden" id="price{{ $loop->iteration }}" value="{{$cart->price}}"></div></td>
                                <td class="cart-product-delivery"><div class="cc-pr">free shipping</div></td>
                                <td class="cart-product-sub-total"><div class="cc-pr"><input type="text"  class="form-control" readonly="true" id="sum{{ $loop->iteration }}" value="{{$cart->price * $cart->quantity}}" style="background-color:transparent; border: transparent" ></div></td>
                                <td class="romove-item">
                                    <a href="{{route('cart.destroy',['id'=>encrypt($cart->cart_id)])}}"><img src="{{ asset('public/user-templates/images/remove.png')}}" alt="">
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <!-- /tbody -->
                    </table>
                    <!-- /table -->
                </div>
				</div>
            </div>
        </div>
    </div>
    <!-- SHOPING-CART-AREA:END   -->
	
    <!-- SHOPING-CART-BOTTOM-AREA   -->
    <!-- SHOPING-CART-BOTTOM-AREA:END   -->
	@endsection

    @section('custom_script')
    <script>
    $(document).ready(function () {
        var total=0;
        var count=$('#subtotal').attr('data-count');
        for(var i=1;i<=count;i=i+1){
           total=total+parseInt($('#sum'+i).val());
        }
        $("#subtotal").val(total);
        
        $('.Btn').on('click load',function(){
            var id=$(this).attr('data-id');
            var qty=$('#Qty'+id).val();
            var price=$('#price'+id).val();
            var sum=qty*price;
            $('#sum'+id).val(sum);
            var count=$('#subtotal').attr('data-count');
            var total=0;
            for(var i=1;i<=count;i=i+1){
             total=total+parseInt($('#sum'+i).val());
               }
            $("#subtotal").val(total);
           
        });
        //cart quantity
        $(".Btn").click(function(e){
			e.preventDefault();
			var id=$(this).attr('data-id');
            var cart=$(this).attr('data-cart');
            var qty=$('#Qty'+id).val();
			$.ajax({
				url: "{{ route('cart.update') }}",
				type:'GET',
				data: {
						quantity:qty, 
                        cart:cart,
					  },
				
			});
		});
    });
     </script>   
    @endsection