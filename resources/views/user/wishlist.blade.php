@extends('user.layout')
@section('content')

    <!-- PAGE-TITLE-AREA -->
    <section class="page-title-area">
        <div class="page-title-overlay">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="page-title">
                            <h3>Wishlist</h3>
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
                <div class="col-md-12">
                    <div class="bred-title">
                        <h3>Wishlist</h3>
                    </div>
                    <ol class="breadcrumb">
                        <li><a href="index.html">Home</a>
                        </li>
                        <li><a href="about-us.html">Wishlist</a>
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- BREADCRUMBS:END -->
	
    <!-- WISH-AREA     -->
    <div class="wish-area section-padding">
        <div class="container">
            <div class="row">
                @foreach($wishlists as $Wishlist)
                <div class="col-md-3 col-sm-3 col-xs-12">
                    <div class="product-single">
                        <a href="{{route('single.product',['id'=>encrypt($Wishlist->product->product_id)])}}"><img src="{{asset('storage/app/'.$Wishlist->product->productimage->image)}}" alt="#" height="100dp" width="100dp">
                        </a>
                        <div class="PrdWishlist ">
                            <a href="{{route('wishlist.destroy',['pid'=>encrypt($Wishlist->product->product_id),'cid'=>encrypt(auth()->guard('customer')->user()->customer_id)])}}"><i class="fa fa-trash" aria-hidden="true"></i>
                        </div>
                        <div class="hot-wid-rating">
                            <h4><a href="">{{$Wishlist->product->product_name}}</a></h4>
                            @for($i=1;$i<=$loop->iteration && $i<=5 ;$i=$i+1)
                            <i class="fa fa-star"></i>
                           @endfor

                            <div class="product-wid-price">
                                <ins>{{$Wishlist->product->pricelist->price}}</ins>
                            </div>
                        </div>
                    </div>
                </div>
               @endforeach
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="wish-button">
                      <!-- <a href="{{route('cart.store.all')}}">  <button type="button" class="btn btn-default add-cart">Add all to the cart</button> </a> -->
                       <a href="{{route('wishlist.clear',['id'=>encrypt(auth()->guard('customer')->user()->customer_id)])}}"> <button type="button" class="btn btn-default clear-list">Clear the list</button> </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- WISH-AREA:END   -->
	
   @endsection