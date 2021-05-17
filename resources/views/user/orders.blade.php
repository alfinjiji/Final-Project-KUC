@extends('user.layout')
@section('content')

<!-- PAGE-TITLE-AREA -->
<section class="page-title-area">
    <div class="page-title-overlay">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="page-title">
                        <h3>My Order</h3>
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
                    <h3>My Order</h3>
                </div>
                <ol class="breadcrumb">
                    <li><a href="index.html">Home</a>
                    </li>
                    <li><a href="about-us.html">My Order</a>
                    </li>
                </ol>
            </div>
        </div>
    </div>
</div>
<!-- BREADCRUMBS:END -->
<!-- pending order -->
<section class="pessonal-detail section-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="headline">
                    <h2>Pendding Orders</h2>
                </div>
                @foreach($orders_pending as $order)
                <div class="panel panel-default" style="background-color: #fbfbfb">
                    <div class="panel-body">
                        <div class="col-md-12 rounded">
                            <!-- title row -->
                            <div class="row">
                              <div class="col-md-12 pb-3">
                                <h4>
                                  <small class="float-right">Placed Date : {{ date('d-m-Y', strtotime($order->placed_at))}} </small><br>
                                  @if($order->confirmed_at)
                                  <small class="float-right">Confirmed Date: {{ date('d-m-Y', strtotime($order->confirmed_at))}}</small><br>
                                  @endif
                                  @if($order->delivered_at)
                                  <small class="float-right">Delivered Date: {{ date('d-m-Y', strtotime($order->delivered_at))}}</small>
                                  @endif
                                </h4>
                              </div>
                              <!-- /.col -->
                            </div>
                            <!-- info row -->
                            <!-- Table row -->
                            <div class="row">
                              <div class="col-12 table-responsive">
                                <table class="table table-striped">
                                  <thead>
                                  <tr>
                                    <th>No:</th>
                                    <th>Image</th>
                                    <th>Product</th>
                                    <th>Size</th>
                                    <th>Qty</th>
                                    <th>Unit Price</th>
                                    <th>Subtotal</th>
                                    <th></th>
                                  </tr>
                                  </thead>
                                  <tbody>
                                      @foreach($order->orderline as $orderline)
                                      <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td><img style="height: 75px; width:100px;" src="{{asset('storage/app/'.$orderline->product->productimage->image)}}"></td>
                                        <td>{{$orderline->product->product_name}}</td>
                                        <td>{{$orderline->productsize->size->size}}</td>
                                        <td>{{$orderline->quantity}}</td>
                                        <td>{{$orderline->unit_price}}</td>
                                        <td>{{$orderline->sum}}</td>
                                        <td> <a href="{{route('order.destroy',['id'=>$orderline->orderline_id])}}"><img src="{{ asset('public/user-templates/images/remove.png')}}" alt="">
                                        </a>
                                      </td>
                                      </tr>
                                      @endforeach
                                   </tbody>
                                </table>
                              </div>
                              <!-- /.col -->
                            </div>
                            <!-- /.row -->
                  
                            <div class="row">
                              <!-- /.col -->
                            <div class="col-md-8 float-left">
                                <h4>Delevered Address</h4>
                                <p>{{$order->address->name}}</p>
                                <p>{{$order->address->house_name}}, {{$order->address->area}}</p>
                                <p>{{$order->address->city}}, {{$order->address->state}} - {{$order->address->pincode}}</p>
                                <p>{{$order->address->mobile}}</p>
                            </div>
                              <div class="col-md-4">
                                <p class="lead"> </p>
                  
                                <div class="table-responsive">
                                  <table class="table">
                                    <tbody>
                                     
                                      <tr>
                                      <th style="width:50%">Subtotal:</th>
                                      <td>{{$order->amount + $order->discount}}</td>
                                    </tr>
                                    <tr>
                                      <th>Discount</th>
                                      <td>{{$order->discount}}</td>
                                    </tr>
                                    <tr>
                                      <th>Total:</th>
                                      <td>{{$order->amount}}</td>
                                    </tr>
                                   
                                  </tbody></table>
                                </div>
                              </div>
                              <!-- /.col -->
                            </div>
                            <!-- /.row -->
                          </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
<!--end pending order -->

<!-- delivered order order -->
<section class="pessonal-detail section-padding">
  <div class="container">
      <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="headline">
                  <h2>Delivered Orders</h2>
              </div>
              @foreach($orders_delivered as $order)
              <div class="panel panel-default" style="background-color: #fbfbfb">
                  <div class="panel-body">
                      <div class="col-md-12 rounded">
                          <!-- title row -->
                          <div class="row">
                            <div class="col-md-12 pb-3">
                              <h4>
                                <small class="float-right">Placed Date : {{ date('d-m-Y', strtotime($order->placed_at))}} </small><br>
                                @if($order->confirmed_at)
                                <small class="float-right">Confirmed Date: {{ date('d-m-Y', strtotime($order->confirmed_at))}}</small><br>
                                @endif
                                @if($order->delivered_at)
                                <small class="float-right">Delivered Date: {{ date('d-m-Y', strtotime($order->delivered_at))}}</small>
                                @endif
                              </h4>
                            </div>
                            <!-- /.col -->
                          </div>
                          <!-- info row -->
                          <!-- Table row -->
                          <div class="row">
                            <div class="col-12 table-responsive">
                              <table class="table table-striped">
                                <thead>
                                <tr>
                                  <th>No:</th>
                                  <th>Image</th>
                                  <th>Product</th>
                                  <th>Size</th>
                                  <th>Qty</th>
                                  <th>Unit Price</th>
                                  <th>Subtotal</th>
                                  <th>Rate this product</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($order->orderline as $orderline)
                                    <tr>
                                      <td>{{$loop->iteration}}</td>
                                      <td><img style="height: 75px; width:100px;" src="{{asset('storage/app/'.$orderline->product->productimage->image)}}"></td>
                                      <td>{{$orderline->product->product_name}}</td>
                                      <td>{{$orderline->quantity}}</td>
                                      <td>{{$orderline->productsize->size->size}}</td>
                                      <td>{{$orderline->unit_price}}</td>
                                      <td>{{$orderline->sum}}</td>
                                      <td>
                                            @if($ratings=='[]')
                                            <a class="rate" href="#" data-toggle="modal" data-target="#rating" data-id="{{$orderline->product_id}}">
                                              @for($i=1;$i<=5;$i++)
                                                <i class = "fa fa-star unchecked" aria-hidden = "true" data-id="{{$orderline->product_id}}" ></i>
                                              @endfor
                                            </a>
                                            @else 
                                              @foreach($ratings as $rating)
                                              <a class="rate" href="#" data-toggle="modal" data-target="#rating" data-id="{{$orderline->product_id}}" data-rate="{{$rating->rating}}">
                                                @if($rating->product_id==$orderline->product_id && $rating->flag==1 )
                                                  @for($i=1;$i<=$rating->rating;$i++)
                                                    <i class = "fa fa-star checked" aria-hidden = "true"  ></i>
                                                  @endfor
                                                  @for($i=5-$rating->rating,$j=5-($i-1);$i>0;$i--,$j++)
                                                    <i class = "fa fa-star unchecked" aria-hidden = "true" ></i>
                                                  @endfor
                                                 
                                                @endif
                                              </a>
                                              @endforeach
                                            @endif
                                        </a>
                                        <a class="logg" href="#" data-toggle="modal" data-target="#review" data-id="{{$orderline->product_id}}">
                                          <br> Add Your Review
                                        </a><br>
                                        <a href="{{route('invoice',['id'=>encrypt($orderline->orderline_id)])}}" >Invoice</a>
                                      </td>
                                    </tr>
                                    @endforeach
                                 </tbody>
                              </table>
                            </div>
                            <!-- /.col -->
                          </div>
                          <!-- /.row -->
                
                          <div class="row">
                            <!-- /.col -->
                          <div class="col-md-8 float-left">
                              <h4>Delevered Address</h4>
                              <p>{{$order->address->name}}</p>
                              <p>{{$order->address->house_name}}, {{$order->address->area}}</p>
                              <p>{{$order->address->city}}, {{$order->address->state}} - {{$order->address->pincode}}</p>
                              <p>{{$order->address->mobile}}</p>
                          </div>
                            <div class="col-md-4">
                              <p class="lead"> </p>
                
                              <div class="table-responsive">
                                <table class="table">
                                  <tbody>
                                   
                                    <tr>
                                    <th style="width:50%">Subtotal:</th>
                                    <td>{{$order->amount + $order->discount}}</td>
                                  </tr>
                                  <tr>
                                    <th>Discount</th>
                                    <td>{{$order->discount}}</td>
                                  </tr>
                                  <tr>
                                    <th>Total:</th>
                                    <td>{{$order->amount}}</td>
                                  </tr>
                                 
                                </tbody></table>
                              </div>
                            </div>
                            <!-- /.col -->
                          </div>
                          <!-- /.row -->
                        </div>
                  </div>
              </div>
              @endforeach
          </div>
      </div>
  </div>
<!-- review modal -->
  <div class="modal fade" id="review" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
     <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
      <div class="review_input_heading">
        <h3>Write your review</h3>
      </div>
       </div>
    <div class="modal-body">
      <div class="review_comment_input">
        <form action="{{route('review.store')}}" method="POST" >
          @csrf
          <input type="hidden" id="product_id" placeholder="Summary of your Review" name="product_id"><br>
        <input type="text" placeholder="Summary of your Review" id="summary" name="summary"><br>
        <textarea cols="30" rows="10" placeholder="Write your review" id="user_review"  name="user_review"></textarea><br>
        <input type="submit" value="Submit Review" id="save">
        </form>
      </div>
    </div>
    <div class="modal-footer">
    </div>
    </div>
   </div>
  </div>
    <!-- end review modal -->

    <!-- rating modal -->
  <div class="modal fade" id="rating" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
     <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
      <div class="review_input_heading">
        <h3>Rate this product</h3>
      </div>
       </div>
    <div class="modal-body">
      <div class="review_comment_input">
        <form action="{{route('orders')}}" method="GET" >
          @csrf
          <input type="hidden" id="product_id2" placeholder="Summary of your Review" >
          <input type="hidden" id="rate" placeholder="Summary of your Review" ><br>
          @for($i=1;$i<=5;$i++)
          <i class = "fa fa-star unchecked" aria-hidden = "true" id = "st{{$i}}" data-id="{{$orderline->product_id}}" ></i>
        @endfor 
        <br>
        <input type="submit" value="Rate" id="submit">
        </form>
      </div>
    </div>
    <div class="modal-footer">
    </div>
    </div>
   </div>
  </div>
    <!-- end rating modal -->
</section>
<!--end delivered order -->
@endsection


@section('custom_script')
<script>
  $(document).ready(function() {
   

    $("#st1").click(function(e) {
      e.preventDefault();
      $(".fa-star").css("color", "black");
      $("#st1").css("color", "#f89d18");
				var product_id = $('#product_id2').val();
					console.log(product_id);
		        	$.ajax({
		        		url: "{{ route('rate.store') }}",
		        		type:'GET',
		        		data: {
                        product_id:product_id,
                        rating:1, 
                      },
		        		success: function(data){  
		        			console.log(data);
                            if(data.success==1) {  
                              $('#submit').show();
                              $('#submit').val("Thank you for rating");
                               
                            } 
                        } 
		        	});
    });
    $("#st2").click(function(e) {
        e.preventDefault();
        $(".fa-star").css("color", "black");
        $("#st1, #st2").css("color", "#f89d18");
        var product_id = $('#product_id2').val();
					console.log(product_id);
		        	$.ajax({
		        		url: "{{ route('rate.store') }}",
		        		type:'GET',
		        		data: {
                        product_id:product_id,
                        rating:2, 
                      },
		        		success: function(data){  
		        			console.log(data);
                            if(data.success==1) {  
                              $('#submit').show();
                              $('#submit').val("Thank you for rating");
                            } 
                        } 
		        	});

    });
    $("#st3").click(function(e) {
        e.preventDefault();
        $(".fa-star").css("color", "black")
        $("#st1, #st2, #st3").css("color", "#f89d18");
        var product_id = $('#product_id2').val();
					console.log(product_id);
		        	$.ajax({
		        		url: "{{ route('rate.store') }}",
		        		type:'GET',
		        		data: {
                        product_id:product_id,
                        rating:3, 
                      },
		        		success: function(data){  
		        			console.log(data);
                            if(data.success==1) {  
                              $('#submit').show();
                              $('#submit').val("Thank you for rating");
                            } 
                        } 
		        	});
    });
    $("#st4").click(function(e) {
      e.preventDefault();
        $(".fa-star").css("color", "black");
        $("#st1, #st2, #st3, #st4").css("color", "#f89d18");
        var product_id = $('#product_id2').val();
					console.log(product_id);
		        	$.ajax({
		        		url: "{{ route('rate.store') }}",
		        		type:'GET',
		        		data: {
                        product_id:product_id,
                        rating:4, 
                      },
		        		success: function(data){  
		        			console.log(data);
                            if(data.success==1) {  
                              $('#submit').show();
                              $('#submit').val("Thank you for rating");
                            } 
                        } 
		        	});
    });
    $("#st5").click(function(e) {
      e.preventDefault();
        $(".fa-star").css("color", "black");
        $("#st1, #st2, #st3, #st4, #st5").css("color", "#f89d18");
        var product_id = $('#product_id2').val();
					console.log(product_id);
		        	$.ajax({
		        		url: "{{ route('rate.store') }}",
		        		type:'GET',
		        		data: {
                        product_id:product_id,
                        rating:5, 
                      },
		        		success: function(data){  
		        			console.log(data);
                            if(data.success==1) {  
                              $('#submit').show();
                              $('#submit').val("Thank you for rating");
                            } 
                        } 
		        	});
    });

    $(".logg").click(function () {
            var id = $(this).attr("data-id");
            $("#product_id").val(id);
    });
      $(".rate").click(function () {
            var id = $(this).attr("data-id");
            var rate=$(this).attr("data-rate");
            $("#product_id2").val(id);
            $("#rate").val(rate);
            $('#submit').hide();
      });
  });
</script>
@endsection