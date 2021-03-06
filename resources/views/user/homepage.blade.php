@extends('user.layout')
@section('content')
	
    <!-- MAIN-SLIDER-AREA -->
    <div class="main_slider">
        <div class="tp-banner-container">
            <div class="tp-banner">
                <ul>
                    @foreach($banners as $banner)
                    <li data-transition="zoomout" data-slotamount="7" data-masterspeed="1000">
                        <!-- MAIN IMAGE -->
                        <a href="{{route('banner.show',['id'=>encrypt($banner->banner_id)])}}">
                        <img src="{{asset('storage/app/image/'.$banner->image)}}" alt="darkblurbg" data-bgfit="cover" data-bgposition="left top" data-bgrepeat="no-repeat">
                        </a>
                        <!-- LAYER NR. 1 -->
                        <div class="tp-caption black_heavy_60 skewfromleftshort tp-resizeme rs-parallaxlevel-0" data-x="50" data-y="133" data-speed="500" data-start="1850" data-easing="Power3.easeInOut" data-splitin="chars" data-splitout="none" data-elementdelay="0.1" data-endelementdelay="0.1" style="z-index: 7; max-width: auto; max-height: auto; white-space: nowrap;">Fashion for men
                        </div>
                        <!-- LAYER NR. 2 -->
                        <div class="tp-caption grey_regular_18 customin tp-resizeme rs-parallaxlevel-0" data-x="50" data-y="200" data-customin="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0;scaleY:0;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;" data-speed="500" data-start="2600" data-easing="Power3.easeInOut" data-splitin="none" data-splitout="none" data-elementdelay="0.05" data-endelementdelay="0.1" style="z-index: 9; max-width: auto; max-height: auto; white-space: nowrap;">
                            <div style="text-align:left;">That this group would somehow form a family that's the way we all became the
                                <br/> Brady Bunch. Love exciting and new. Come aboard were expecting you. Love life's
                                <br/> sweetest reward Let it flow it floats back to you! </div>
                        </div>
                        <!-- LAYER NR. 3 -->
                        <div class="tp-caption green_bold_bg_20 skewfromright randomrotateout tp-resizeme rs-parallaxlevel-10"
			data-x="50"
			data-y="290" 
			data-speed="1000"
			data-start="3900"
			data-easing="Power3.easeInOut"
			data-splitin="none"
			data-splitout="none"
			data-elementdelay="0.1"
			data-endelementdelay="0.1"
			data-end="10200"
data-endspeed="1000"
			style="z-index: 15; max-width: auto; max-height: auto; white-space: nowrap;"><a href="#"><img src="{{ asset('public/user-templates/images/shop-btn.png')}}" alt="#"></a>
		</div>
                    </li>
                    @endforeach
                </ul>
                <div class="tp-bannertimer"></div>
            </div>
        </div>
    </div>
    <!-- MAIN-SLIDER-AREA END -->
	
    <!-- recommended-CLOTHING-AREA -->
    <section class="men_clothingcurosel_area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="headline">
                        <h2>RECOMMENDED</h2>
                    </div>
                    <div class="menclothing-carousel">
                        <div class="men-single">
                            <a href="#"><img src="{{ asset('public/user-templates/images/menthr1.png') }}" alt="#">
                            </a>
                            <div class="tag new">
                                <span>new</span>
                            </div>
                            <div class="hot-wid-rating">
                                <h4><a href="#">Formal Suit for men</a></h4>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star-half-o"></i>
                                <div class="product-wid-price">
                                    <ins>$260.00</ins> <del>$280.00</del>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- recommended-CLOTHING-AREA END -->
	
    <!-- MEN-CLOTHING-AREA -->
    <section class="women-accessories-area2 section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="headline">
                        <h2>Men accessories</h2>
                    </div>
                    <div class="product-tab">
                        <ul class="nav nav-tabs women-tab" role="tablist">
                            <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">New Products</a>
                            </li>
                            <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Popular Products</a>
                            </li>
                        </ul>
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active" id="home">
                                <div class="row">
                                    @foreach($latest_men as $man)
                                    <div class="col-md-3 col-sm-3 col-xs-12 " style="width: 25%">
                                        <div class="women-single zoom">
                                            <a href="{{route('single.product',['id'=>encrypt($man->product_id)])}}"><img src="{{ asset('storage/app/'.$man->productimage->image) }}" alt="">
                                            </a>
                                            <div class="tag new">
                                                <span>new</span>
                                            </div>
                                            <div class="hot-wid-rating">
                                                <h4><a href="single-product.html">{{$man->product_name}}</a></h4>
                                                @for($i=1;$i<=$man->rating;$i++)
                                                <i class="fa fa-star checked"></i>
                                                @endfor
                                                @for($i=5-$man->rating;$i>0;$i--)
                                                <i class = "fa fa-star unchecked"></i>
                                               @endfor
                                                <div class="product-wid-price">
                                                    <ins>{{$man->pricelist->price}}</ins> <del>{{round($man->pricelist->price + ($man->pricelist->price*.12))}}</del>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                   @endforeach
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane" id="profile">
                                <div class="row">
                                    @foreach($popular_men as $men)
                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="women-single">
                                            <a href="{{route('single.product',['id'=>encrypt($men->product_id)])}}"><img src="{{ asset('storage/app/'.$men->productimage->image) }}" alt="">
                                            </a>

                                            <div class="hot-wid-rating">
                                                <h4><a href="single-product.html">{{$men->product_name}}</a></h4>
                                                @for($i=1;$i<=$men->rating;$i++)
                                                <i class="fa fa-star checked"></i>
                                                @endfor
                                                @for($i=5-$men->rating;$i>0;$i--)
                                                <i class = "fa fa-star unchecked"></i>
                                               @endfor
                                                <div class="product-wid-price">
                                                    <ins>{{$men->pricelist->price}}</ins>
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
    </section>
    <!-- MEN-CLOTHING-AREA END -->
	
    <!-- FEATURED-PROMO-AREA -->
    <section class="features-promo-area">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-md-6 col-xs-12">
                    <div class="features-promo-single">
                        <div class="features-promo-img">
                            <img src="{{ asset('public/user-templates/images/main-prd1.png')}}" alt="">
                            <div class="features-promo-text">
                                <h3>Top collection</h3>
                                <P>New collection for men</P>
                            </div>
                            <div class="promo-hover">
                                <div class="promo-in"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-xs-12">
                   <div class="features-promo-single">
                        <div class="features-promo-img">
                            <img src="{{ asset('public/user-templates/images/main-prd2.png')}}" alt="">
                            <div class="features-promo-text">
                                <h3>Trends for girls</h3>
                            <P>Accessories collection</P>
                            </div>
                            <div class="promo-hover">
                                <div class="promo-in"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- FEATURED-PROMO-AREA END -->
	
    <!-- WOMEN-ACCESSORIES-AREA -->
    <section class="women-accessories-area2 section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="headline">
                        <h2>Women accessories</h2>
                    </div>
                    <div class="product-tab">
                        <ul class="nav nav-tabs women-tab" role="tablist">
                            <li role="presentation" class="active"><a href="#homewomen" aria-controls="home" role="tab" data-toggle="tab">New Products</a>
                            </li>
                            <li role="presentation"><a href="#profilewomen" aria-controls="profile" role="tab" data-toggle="tab">Popular Products</a>
                            </li>
                        </ul>
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active" id="homewomen">
                                <div class="row">
                                    @foreach($latest_women as $woman)
                                    <div class="col-md-3 col-sm-3 col-xs-12"  style="width: 25%">
                                        <div class="women-single zoom" >
                                            <a href="{{route('single.product',['id'=>encrypt($woman->product_id)])}}"><img src="{{ asset('storage/app/'.$woman->productimage->image) }}" alt="">
                                            </a>
                                            <div class="tag new">
                                                <span>new</span>
                                            </div>
                                            <div class="hot-wid-rating">
                                                <h4><a href="single-product.html">{{$woman->product_name}}</a></h4>
                                                @for($i=1;$i<=$woman->rating;$i++)
                                                <i class="fa fa-star checked"></i>
                                                @endfor
                                                @for($i=5-$woman->rating;$i>0;$i--)
                                                <i class = "fa fa-star unchecked"></i>
                                               @endfor
                                                <div class="product-wid-price">
                                                    <ins>{{$woman->pricelist->price}}</ins> <del>{{round($woman->pricelist->price + ($woman->pricelist->price*.18))}}</del>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                   @endforeach
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane" id="profilewomen">
                                <div class="row">
                                    @foreach($popular_women as $woman)
                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="women-single">
                                            <a href="{{route('single.product',['id'=>encrypt($woman->product_id)])}}"><img src="{{ asset('storage/app/'.$woman->productimage->image) }}" alt="">
                                            </a>

                                            <div class="hot-wid-rating">
                                                <h4><a href="single-product.html">{{$woman->product_name}}</a></h4>
                                                @for($i=1;$i<=$woman->rating;$i++)
                                                <i class="fa fa-star checked"></i>
                                                @endfor
                                                @for($i=5-$woman->rating;$i>0;$i--)
                                                <i class = "fa fa-star unchecked"></i>
                                               @endfor
                                                <div class="product-wid-price">
                                                    <ins>{{$woman->pricelist->price}}</ins>
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
    </section>
    <!-- WOMEN-ACCESSORIES-AREA END -->
	
    <!--  TESTIMONIAL-AREA  -->
    <section id="testimonial" class="section-padding">
        <div class="testimonial-overlay">
            <div class="testimonial">
                <div class="container">
                    <div class="testimonial-slide">
                        <div id="carousel-testimonial" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#carousel-testimonial" data-slide-to="0" class="active"></li>
                                <li data-target="#carousel-testimonial" data-slide-to="1" class=""></li>
                                <li data-target="#carousel-testimonial" data-slide-to="2" class=""></li>
                            </ol>
                            <div class="carousel-inner">
                                <div class="item">
                                    <div class="item_quote">
                                        <i class="fa fa-quote-left"></i>
                                    </div>
                                    <div class="content">
                                        <p> Till the one day when the lady met this fellow and they knew it was much more than a hunch. These Happy Days are yours and mine Happy Days. Its mission to explore strange new worlds to seek out new man has gone before.</p>
                                    </div>
                                    <div class="client">
                                        <div class="image">
                                            <img src="{{ asset('public/user-templates/images/customer.png')}}" alt="#">
                                        </div>
                                        <div class="c_text_inner">
											<h4>Micheal Clerk</h4>
											<h5>Customer Sydney</h5>
										</div>
                                    </div>
                                </div>
                                <div class="item active left">
                                    <div class="item_quote">
                                        <i class="fa fa-quote-left"></i>
                                    </div>
                                    <div class="content">
                                        <p> Till the one day when the lady met this fellow and they knew it was much more than a hunch. These Happy Days are yours and mine Happy Days. Its mission to explore strange new worlds to seek out new man has gone before.</p>
                                    </div>
                                    <div class="client">
                                        <div class="image">
                                            <img src="{{ asset('public/user-templates/images/customer.png')}}" alt="#">
                                        </div>
                                        <div class="c_text_inner">
											<h4>Micheal Clerk</h4>
											<h5>Customer Sydney</h5>
										</div>
                                    </div>
                                </div>
                                <div class="item next left">
                                    <div class="item_quote">
                                        <i class="fa fa-quote-left"></i>
                                    </div>
                                    <div class="content">
                                        <p> Till the one day when the lady met this fellow and they knew it was much more than a hunch. These Happy Days are yours and mine Happy Days. Its mission to explore strange new worlds to seek out new man has gone before.</p>
                                    </div>
                                    <div class="client">
                                        <div class="image">
                                            <img src="{{ asset('public/user-templates/images/customer.png')}}" alt="#">
                                        </div>
                                        <div class="c_text_inner">
											<h4>Micheal Clerk</h4>
											<h5>Customer Sydney</h5>
										</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--  TESTIMONIAL-AREA END  -->
	
    <!-- LATEST-PRODUCT-AREA-AREA -->
    <section class="latest-product-area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="headline">
                        <h2>Latest product</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($latest_product as $product)
                <div class="col-md-3 col-sm-3 col-xs-12"  style="width: 25%">
                    <div class="latest-single zoom">
                        <a href="{{route('single.product',['id'=>encrypt($product->product_id)])}}"><img src="{{ asset('storage/app/'.$product->productimage->image) }}" alt="#">
                        </a>
                        <div class="tag new">
                    </div>
                        <div class="hot-wid-rating">
                            <h4>{{$product->product_name}}</h4>
                            @for($i=1;$i<=$product->rating;$i++)
                             <i class="fa fa-star checked"></i>
                            @endfor
                             @for($i=5-$product->rating;$i>0;$i--)
                             <i class = "fa fa-star unchecked"></i>
                             @endfor
                            <div class="product-wid-price">
                                <ins>{{$product->pricelist->price}}</ins>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- LATEST-PRODUCT-AREA END -->
	
    <!-- OUR-BRAND-AREA -->
    <div id="brand-bg">
        <div class="brand-overlay">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="partners_list">
						
							<div class="partners_list_carousel">
                                @foreach($menus as $menu)
								<div class="item">
									<a href=""><span>{{$menu->menu_name}}</span></a>
								</div>
                                @endforeach
								
							</div>
						
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- OUR-BRAND-AREA END -->
	
    <!-- LATEST-BLOG-AREA -->
    <section class="laest-blog-area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="headline">
                        <h2>Latest from our blog</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <div class="blog-single">
                        <div class="blog-image">
                            <img src="{{ asset('public/user-templates/images/blog1.png')}}" alt="">
                            <div class="blog-icon">
                                <img src="{{ asset('public/user-templates/images/blog-icon.png')}}" alt="#">
                            </div>
                        </div>
                        <div class="blog-text">
                            <h3><a href="single-post.html">Said Californ'y is the place</a></h3>
                            <hr class="blog-text-h3">
                            <P>Like Robinson Crusoe it's primitive as can be. Sunny Days sweepin' the clouds away. On my way to where the air is sweet Crusoe it's primitive. </P>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="blog-single">
                        <div class="blog-image">
                            <img src="{{ asset('public/user-templates/images/blog2.png')}}" alt="">
                            <div class="blog-icon">
                                <img src="{{ asset('public/user-templates/images/blog-icon.png')}}" alt="#">
                            </div>
                        </div>
                        <div class="blog-text">
                            <h3><a href="single-post.html">Your name black gold Goodbye</a></h3>
                            <hr class="blog-text-h3">
                            <P>I have always wanted to have a neighbor just like you. I've always wanted to live in a neighborhood with you here's the story of a lovely.</P>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="blog-single">
                        <div class="blog-image">
                            <img src="{{ asset('public/user-templates/images/blog3.png')}}" alt="">
                            <div class="blog-icon">
                                <img src="{{ asset('public/user-templates/images/blog-icon.png')}}" alt="#">
                            </div>
                        </div>
                        <div class="blog-text">
                            <h3><a href="single-post.html">Flying away on a wing and a prayer</a></h3>
                            <hr class="blog-text-h3">
                            <P> Just sit right back and you'll hear a tale a tale of a fateful trip that started from this tropic port aboard this tiny ship said Californ.</P>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- LATEST-BLOG-AREA END -->
	
   @endsection
