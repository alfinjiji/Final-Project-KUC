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
	
    <!-- CHECK-CONTACT-AREA -->
    <section class="check-contact section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-7 col-sm-7 col-xs-12">
                    <div class="headline">
                        <h2>Your contact email</h2>
                    </div>
                    <div class="contact-mail">
                        <div class="row">
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="mail-left">
                                    <form>
                                        Email *
                                        <br>
                                        <input type="text" name="name">
                                        <br> Password *
                                        <br>
                                        <input type="text" name="phone">
                                    </form>
                                    <div class="mail-btn">
                                        <button type="button" class="btn btn-default">Sign in</button>
                                        <a href="#">Forgot password?</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="mail-right">
                                    <h3>Create an account</h3>
                                    <label>
                                        <input type="radio" name="optradio">Register and checkout together</label>
                                    <h3>Guest Checkout</h3>
                                    <label>
                                        <input type="radio" name="optradio">Checkout without registering</label>
                                    <div class="mail-rbtn">
                                        <button type="button" class="btn btn-default">Continue</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-5 col-sm-5 col-xs-12">
                    <div class="headline">
                        <h2>Order summary</h2>
                    </div>
                    <div class="summary">
                        <h2>Products<span>Total</span></h2>
                        <p>Fabulas T-shirt<span>$75</span>
                        </p>
                        <p>Awesome t-Shirt<span>$75</span>
                        </p>
                        <h3 class="line">Cart subtotal<span>$155</span></h3>
                        <h3 class="line2">Shipping<span class="mcolor">Free shipping</span></h3>
                        <h5>Order Total Price<span>$155</span></h5>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- CHECK-CONTACT-AREA:END   -->
	
    <!-- BILL-SHIP-AREA   -->
    <section class="bill-ship section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-5 col-sm-5 col-xs-12">
                   <div class="headline">
                       <h2>Billing address</h2>
                   </div>
                    <div class="billing">
                        <div class="bill-tow">
                            <div class="bill-left">
                                <form>
                                <input type="text" name="name" placeholder="First name">
                            </form>
                            </div>
                            <div class="bill-right">
                                <form>
                                <input type="text" name="name" placeholder="Last name">
                            </form>
                            </div>
                        </div>
                        <div class="bill-single">
                            <form>
                                <input type="text" name="name" placeholder="Company Name">
                            </form>
                            <form>
                                <input type="text" name="name" placeholder="Address">
                            </form>
                            <form>
                                <input type="text" name="name" placeholder="Town / City">
                            </form>
                            <form>
                                <input type="text" name="name" placeholder="State / Country">
                            </form>
                        </div>
                        <div class="bill-tow">
                            <div class="bill-left">
                                <form>
                                <input type="text" name="name" placeholder="Postcode / ZIP">
                            </form>
                            </div>
                            <div class="bill-right">
                                <form>
                                <input type="text" name="name" placeholder="Phone">
                            </form>
                            </div>
                        </div>
                        <div class="bill-text">
                        <input type="checkbox" name="vehicle" value="Bike"> Ship Items To The Above Billing Address
                        </div>
                    </div>
                </div>
                <div class="col-md-5 col-sm-5 col-xs-12">
                    <div class="headline">
                       <h2>Shipping address</h2>
                   </div>
                    <div class="Shipping">
                        <div class="bill-tow">
                            <div class="ship-left">
                                <form>
                                <input type="text" name="name" placeholder="First name">
                            </form>
                            </div>
                            <div class="ship-right">
                                <form>
                                <input type="text" name="name" placeholder="Last name">
                            </form>
                            </div>
                        </div>
                        <div class="ship-single">
                            <form>
                                <input type="text" name="name" placeholder="Company Name">
                            </form>
                            <form>
                                <input type="text" name="name" placeholder="Address">
                            </form>
                            <form>
                                <input type="text" name="name" placeholder="Town / City">
                            </form>
                            <form>
                                <input type="text" name="name" placeholder="State / Country">
                            </form>
                        </div>
                        <div class="ship-tow">
                            <div class="ship-left">
                                <form>
                                <input type="text" name="name" placeholder="Postcode / ZIP">
                            </form>
                            </div>
                            <div class="ship-right">
                                <form>
                                <input type="text" name="name" placeholder="Phone">
                            </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-2 col-sm-2 col-xs-12"></div>
            </div>
        </div>
    </section>
    <!-- BILL-SHIP-AREA:END   --> 
	
    <!-- PAYMENT-AREA   --> 
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
                            <input type="radio" name="optradio">Paypal<img src="images/master-card.png" alt="">
                        </label><br/>
                        <button type="button" class="btn btn-default right-cart">Place order</button>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
    <!-- PAYMENT-AREA:END   -->
	@endsection