@extends('user.layout')
@section('content')

    <!-- PAGE-TITLE-AREA -->
    <section class="page-title-area">
        <div class="page-title-overlay">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="page-title">
                            <h3>Search result</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- PAGE-TITLE-AREA:END -->
	
    <!--BREADCRUMBS    -->
    <div class="title-breadcrumb">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="bred-title">
                        <h3>Search result &nbsp; &nbsp;
							<i class="fa fa-filter "  aria-hidden="true" id="info" style="display: inline-block ; color: whitesmoke ;padding-right: 20px;"></i>
						    <i class="fa fa-sort-amount-desc" aria-hidden="true" id="sort_desc" style="display: inline-block ; color: whitesmoke;padding-right: 20px;"></i>
							<i class="fa fa-sort-amount-asc" aria-hidden="true" id="sort_asc" style="display: inline-block ; color: whitesmoke;padding-right: 20px;"></i>
							
						</h3>
                    </div>
                    <ol class="breadcrumb">
                        <li><a href="index.html">Home</a>
                        </li>
                        <li><a href="about-us.html">Search result</a>
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!--BREADCRUMBS:END    -->
	
    <!--PRODUCT-LIST-AREA    -->
    <div class="search-result-area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-3 col-xs-12" id="filter_bar"  >
					<form method="POST" action="{{route('filter')}}" >
						@csrf
						<div class="brands">
							<h3>Filter by price <i id="show_price" class="fa fa-bars"></i></h3>
							 <div class="filter_inner" id="price">
								 <div id="slider-range" class="ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all"><div class="ui-slider-range ui-widget-header ui-corner-all" style="left: 9%; width: 55.36%;"></div><span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0" style="left: 9%;"></span><span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0" style="left: 9%;"></span></div>
								 <div class="f_price">
									 
									 <div class="cat_filter_box">
										 <p>
										   <input type="text" id="amount" readonly="" style="border:0; color:#000; font-weight:bold;">
										 </p>
									 </div>
								 </div>
							 </div>
						</div>
						<div class="brands">
							<h3>Category <i id="show_category" class="fa fa-bars"></i></h3>
						    <div  style='overflow-y:scroll; width:auto;height:100px;' id="category">
                               <ul >
								   @foreach($categories as $category)
                                   <li> <input class="c" type="checkbox" name="material" value="{{$category->category_id}}" checked> {{$category->category_name}} </li>
                                   @endforeach
                               </ul>
						    </div>
                        </div>
                        <div class="brands">
							<h3>Material <i id="show_material" class="fa fa-bars"></i></h3>
						    <div  style='overflow-y:scroll; width:auto;height:250px;' id="material">
                               <ul >
								   @foreach($materials as $material)
                                   <li> <input class="m" type="checkbox" name="material" value="{{$material->material_id}}"> {{$material->material_name}} </li>
                                   @endforeach
                               </ul>
						    </div>
                        </div>
						<div class="brands">
							<h3>Colours <i id="show_color" class="fa fa-bars"></i></h3>
						    <div style='overflow-y:scroll; width:auto;height:250px;' id="color">
                                 <ul>
									@foreach($colors as $color)
									<li> <input class="color" type="checkbox" name="color" value="{{$color->color}}"> {{$color->color}} </li>
									@endforeach
                                     
                                 </ul>
						    </div>
                        </div>
                        <div class="brands">
							<h3>size <i id="show_size" class="fa fa-bars"></i></h3>
						    <div style='overflow-y:scroll; width:auto;height:250px;' id="size">
                                 <ul>
                                     <li> <input class="size" type="checkbox" name="size" value="1"> S</li>
                                     <li> <input class="size" type="checkbox" name="size" value="2">  M</li>
									 <li> <input class="size" type="checkbox" name="size" value="3">  L</li>
									 <li> <input class="size" type="checkbox" name="size" value="4">  XL</li>
									 <li> <input class="size" type="checkbox" name="size" value="5">  XXL</li>
                                     
                                 </ul>
						    </div>
                        </div>
						<div>
							<div class="filter_a">
								<input type="hidden" id="min_price" name="min_price">
						    	<input type="hidden" id="max_price" name="max_price">
						    	<input type="hidden" id="category_id" name="category">
								<input type="hidden" id="sizes" name="sizes">
								<input type="hidden" id="colors" name="colors">
								<input type="hidden" id="materials" name="materials">
								<input class="btn btn-warning" type="submit" id="filter" value="Filter" style="width: 270px; margin-top:20px;"  class="btn btn-default">
							</div>
						</div>
					</form>
                </div>
                <div class="col-md-9 col-sm-9 col-xs-12">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="headline">
                                <h2>Search result <span>{{$count}}(items)</span></h2>
                            </div>
                            <div class="product-tab">
                                
                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane active" id="home">
										<!--search product-->
                                        <div class="row" id="searchProduct">
                                            @foreach($products as $product)
                                            <div class="col-md-4 col-sm-4 col-xs-12">
                                                <div class="product-single">
                                                    <a href="{{route('single.product',['id'=>encrypt($product->product_id)])}}"><img src="{{ asset('storage/app/'.$product->productimage->image) }}" alt="#">
                                                    </a>
                                                    @if(Auth::guard('customer')->check())
									                   @if($product->wishlist_flag == 0)
										                   <button type="submit" class="wishlist_btn" data-id="{{ $product->product_id }}">
											                  <span class="PrdWishlist "><i id="{{ $product->product_id }}" class="PrdWishlistActive fa fa-heart color_change" aria-hidden="true"></i></span>
										                  </button>
									                    @else 
										                    <button type="submit" class="wishlist_btn" data-id="{{ $product->product_id }}">
											                  <span class="PrdWishlist "><i id="{{ $product->product_id }}" class="PrdWishlist fa fa-heart color_change" aria-hidden="true"></i></span>
										                    </button>
									                    @endif
								                    @else 
									                    <button type="submit" class="wishlist_btn" data-toggle="modal" data-target="#myModal">
										                  <span class="PrdWishlist "><i class="PrdWishlistActive fa fa-heart color_change" aria-hidden="true"></i></span>
									                    </button>
								                    @endif
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
										<!--sort by asc-->
										<div class="row" id="productByAsc">
                                            @foreach($products_asc as $product)
                                            <div class="col-md-4 col-sm-4 col-xs-12">
                                                <div class="product-single">
                                                    <a href="{{route('single.product',['id'=>encrypt($product->product_id)])}}"><img src="{{ asset('storage/app/'.$product->productimage->image) }}" alt="#">
                                                    </a>
                                                    @if(Auth::guard('customer')->check())
									                   @if($product->wishlist_flag == 0)
										                   <button type="submit" class="wishlist_btn" data-id="{{ $product->product_id }}">
											                  <span class="PrdWishlist "><i id="{{ $product->product_id }}" class="PrdWishlistActive fa fa-heart color_change" aria-hidden="true"></i></span>
										                  </button>
									                    @else 
										                    <button type="submit" class="wishlist_btn" data-id="{{ $product->product_id }}">
											                  <span class="PrdWishlist "><i id="{{ $product->product_id }}" class="PrdWishlist fa fa-heart color_change" aria-hidden="true"></i></span>
										                    </button>
									                    @endif
								                    @else 
									                    <button type="submit" class="wishlist_btn" data-toggle="modal" data-target="#myModal">
										                  <span class="PrdWishlist "><i class="PrdWishlistActive fa fa-heart color_change" aria-hidden="true"></i></span>
									                    </button>
								                    @endif
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
										<!--sort by desc-->
										<div class="row" id="productByDesc">
                                            @foreach($products_desc as $product)
                                            <div class="col-md-4 col-sm-4 col-xs-12">
                                                <div class="product-single">
                                                    <a href="{{route('single.product',['id'=>encrypt($product->product_id)])}}"><img src="{{ asset('storage/app/'.$product->productimage->image) }}" alt="#">
                                                    </a>
                                                    @if(Auth::guard('customer')->check())
									                   @if($product->wishlist_flag == 0)
										                   <button type="submit" class="wishlist_btn" data-id="{{ $product->product_id }}">
											                  <span class="PrdWishlist "><i id="{{ $product->product_id }}" class="PrdWishlistActive fa fa-heart color_change" aria-hidden="true"></i></span>
										                  </button>
									                    @else 
										                    <button type="submit" class="wishlist_btn" data-id="{{ $product->product_id }}">
											                  <span class="PrdWishlist "><i id="{{ $product->product_id }}" class="PrdWishlist fa fa-heart color_change" aria-hidden="true"></i></span>
										                    </button>
									                    @endif
								                    @else 
									                    <button type="submit" class="wishlist_btn" data-toggle="modal" data-target="#myModal">
										                  <span class="PrdWishlist "><i class="PrdWishlistActive fa fa-heart color_change" aria-hidden="true"></i></span>
									                    </button>
								                    @endif
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
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--  PRODUCT-LIST:END -->
	
	
   @endsection
   @section('custom_script')
	<!-- filter -->
   		<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
		<script>
		  $(function() {
			$( "#slider-range" ).slider({
			  range: true,
			  min: 100,
			  max: 10000,
			  values: [ 100, 10000 ],
			  slide: function( event, ui ) {
				$( "#amount" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
			  }
			});
			$( "#amount" ).val( "$" + $( "#slider-range" ).slider( "values", 0 ) +
			  " - $" + $( "#slider-range" ).slider( "values", 1 ) );
		  });
		</script>
	<!-- end filter -->
		<script>
			$(document).ready(function(){
				//filter
				$('#filter_bar').show();
				$('#material').hide();
				$('#color').hide();
				$('#size').hide();
				$('#price').show();
				$('#productByAsc').hide();
				$('#productByDesc').hide();
				var material=[];
				var size=[];
				var color=[];
				var category=[{!! $category_ids !!}];
				$('#category_id').val(category);
				$('#show_material').click(function(){
					$('#material').toggle();
				});
				$('#show_size').click(function(){
					$('#size').toggle();
				});
				$('#show_color').click(function(){
					$('#color').toggle();
				});
				$('#show_price').click(function(){
					$('#price').toggle();
				});
				// filter info
				$("#info").click(function(){
					$('#filter_bar').toggle();
				});

				//sort desc info
				$("#sort_desc").click(function(){
					$('#searchProduct').hide();
					$('#productByAsc').hide();
					$('#productByDesc').show();
				});

				//sort asc info
				$("#sort_asc").click(function(){
					$('#searchProduct').hide();
					$('#productByDesc').hide();
					$('#productByAsc').show();
				});
				// for selected category
				$('.c').click(function(){
					if($(this).is(":checked")){
						var category_val = $(this).val();
						var len = category.length;
						if(len == 0){
							category[0] = category_val;
						} else {
							category[len] = category_val;
						}
					} else {
						var category_val = $(this).val();
						var len = category.length;
						for(var i=0;i<len;i++){
                           if(category[i]==category_val){
							   break;
						   }
						}
						for(;i<len-1;i++){
							category[i]=category[i+1];
						}
						category.pop();
					}
					
					$('#category_id').val(category);
				});
                // for selected material
                $('.m').click(function(){
					if($(this).is(":checked")){
						var s=$(this).val();
						var l=material.length;
						if(l==0){
							material[0]=s;
						}else{
							material[l]=s;
						   
						}
					}else{
						var s=$(this).val();
					    var l=material.length;
						for(var i=0;i<l;i++){
                           if(material[i]==s){
							   break;
						   }
						}
						for(;i<l-1;i++){
							material[i]=material[i+1];
						}
						material.pop();
					}
					
					$('#materials').val(material);
				});
              // for selected size
			  $('.size').click(function(){
					if($(this).is(":checked")){
						var s=$(this).val();
						var l=size.length;
						if(l==0){
							size[0]=s;
						}else{
							size[l]=s;
						   
						}
					}else{
						var s=$(this).val();
					    var l=size.length;
						for(var i=0;i<l;i++){
                           if(size[i]==s){
							   break;
						   }
						}
						for(;i<l-1;i++){
							size[i]=size[i+1];
						}
						size.pop();
					}
					
					$('#sizes').val(size);
				});
                // for selected colors
				$('.color').click(function(){
					if($(this).is(":checked")){
						var s=$(this).val();
						var l=color.length;
						if(l==0){
							color[0]=s;
						}else{
							color[l]=s;
						   
						}
					}else{
						var s=$(this).val();
					    var l=color.length;
						for(var i=0;i<l;i++){
                           if(color[i]==s){
							   break;
						   }
						}
						for(;i<l-1;i++){
							color[i]=color[i+1];
						}
						color.pop();
					}
					
					$('#colors').val(color);
				});
				//filter click
				$("#filter").click(function(){
					var min_price=$( "#slider-range" ).slider( "values", 0 );
					var max_price=$( "#slider-range" ).slider( "values", 1 );
					$("#min_price").val(min_price);
					$("#max_price").val(max_price);
				});
				// ajax wishlist
				$(".wishlist_btn").click(function(e){
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
			});
		</script>
	@endsection