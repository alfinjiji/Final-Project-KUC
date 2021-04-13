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
                                        <button type="button" class="btn btn-default left-cart">Continue Shopping</button>
                                        <button type="button" class="btn btn-default right-cart right-margin">Clear shopping cart</button>
                                        <button type="button" class="btn btn-default right-cart">Update shopping cart</button>
                                    </div>
                                    <!-- /.shopping-cart-btn -->
                                </td>
                            </tr>
                        </tfoot>
                        <tbody>
                            <tr>
                                <td class="cart-image">
                                    <a href="#" class="entry-thumbnail">
                                        <img src="{{ asset('public/user-templates/images/cart1.png')}}" alt="">
                                    </a>
                                </td>
                                <td class="cart-product-name-info">
									<div class="cc-tr-inner">
										<h4 class="cart-product-description"><a href="#">Fabulas t-shirt</a></h4>
										<div class="cart-product-info">
											<span class="product-color">COLOR :</span><span>Black</span>
											<br>
											<span class="product-color">Size :</span><span>Large</span>
										</div>
								   </div>
                                </td>
                                <td class="cart-product-quantity">
                                    <div class="quant-input">
                                        <input type="number" size="4" class="input-text qty text" title="Qty" value="1" name="quantity[113]" max="119" min="0" step="1">
                                    </div>
                                </td>
                                <td class="cart-product-price"><div class="cc-pr">$75</div></td>
                                <td class="cart-product-delivery"><div class="cc-pr">Free shipping</div></td>
                                <td class="cart-product-sub-total"><div class="cc-pr">$75</div></td>
                                <td class="romove-item">
                                    <a href="#"><img src="{{ asset('public/user-templates/images/remove.png')}}" alt="">
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td class="cart-image">
                                    <a href="#" class="entry-thumbnail">
                                        <img src="{{ asset('public/user-templates/images/cart2.png')}}" alt="">
                                    </a>
                                </td>
                                <td class="cart-product-name-info">
                                   <div class="cc-tr-inner">
										<h4 class="cart-product-description"><a href="#l">Awesome t-shirt</a></h4>
										<div class="cart-product-info">
											<span class="product-color">COLOR :</span><span>Red</span>
											<br>
											<span class="product-color">Size :</span><span>Large</span>
										</div>
								   </div>
                                </td>
                                <td class="cart-product-quantity">
                                    <div class="cart-quantity">
                                        <div class="quant-input">
                                            <input type="number" size="4" class="input-text qty text" title="Qty" value="1" name="quantity[113]" max="119" min="0" step="1">
                                        </div>
                                    </div>
                                </td>
                                <td class="cart-product-price"><div class="cc-pr">$75</div></td>
                                <td class="cart-product-delivery"><div class="cc-pr">Free shipping</div></td>
                                <td class="cart-product-sub-total"><div class="cc-pr">$75</div></td>
                                <td class="romove-item">
                                    <a href="#"><img src="{{ asset('public/user-templates/images/remove.png')}}" alt="">
                                    </a>
                                </td>
                            </tr>
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
    <div class="shoping-cart-bottom-area">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="theme-box">
                        <h4>Apply coupon code here</h4>
                        <p>Enter your coupon code</p>
                        <form id="discount-code">
                            <input type="text">
                        </form>
                        <button type="button" class="btn btn-default right-cart">Apply code</button>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="shiptax">
                        <h3>Estimate Shipping and Tax</h3>
                        <p class="form_caption">Enter your destination to get a shipping estimate.</p>
                        <div class="country-form">
                            <form>
                                <label>Country*</label>
                                <br/>
                                <select>
                                    <option value="Australia">Australia</option>
                                    <option value="Austria">Austria</option>
                                    <option value="Argentina">Argentina</option>
                                    <option value="Canada">Canada</option>
                                    <option value="USA" selected="">USA</option>
                                </select>
                            </form>
                        </div>
                        <div class="state-form">
                            <form>
                                <label>State/Province</label>
                                <br/>
                                <select>
                                    <option value="Alabama">Please select region,state or province</option>
                                    <option value="Alabama">Alabama</option>
                                    <option value="Illinois">Illinois</option>
                                    <option value="Kansas">Kansas</option>
                                </select>
                            </form>
                        </div>
                        <div class="zip-form">
                            <form>
                                <label>Zip/Postal Code</label>
                                <br/>
                                <input type="text">
                            </form>
                        </div>
                        <button type="button" class="btn btn-default add-cart">Get a quote</button>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="checkout">
                        <p>Subtotal<span>$155</span>
                        </p>
                        <h4>Grandtotal<span>$155</span></h4>
                        <button type="button" class="btn btn-default">Proceed to checkout</button>
                        <h5>Checkout  with multiple addresses</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- SHOPING-CART-BOTTOM-AREA:END   -->

	@endsection