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

<section class="pessonal-detail section-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="headline">
                    <h2>Orders</h2>
                </div>
                @foreach($orders as $order)
                <div class="panel panel-default" style="background-color: #fbfbfb">
                    <div class="panel-body">
                        <div class="col-md-12 rounded">
                            <!-- title row -->
                            <div class="row">
                              <div class="col-md-12 pb-3">
                                <h4>
                                  <small class="float-right">Placed Date: </small><br>
                                  <small class="float-right">Confirmed Date: </small><br>
                                  <small class="float-right">Delivered Date:</small>
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
                                    <th>Qty</th>
                                    <th>Unit Price</th>
                                    <th>Subtotal</th>
                                  </tr>
                                  </thead>
                                  <tbody>
                                      @foreach($order->orderline as $orderline)
                                      <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td><img style="height: 75px; width:100px;" src="{{asset('storage/app/'.$orderline->product->productimage->image)}}"></td>
                                        <td>{{$orderline->product->product_name}}</td>
                                        <td>{{$orderline->quantity}}</td>
                                        <td>{{$orderline->unit_price}}</td>
                                        <td>{{$orderline->sum}}</td>
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

@endsection