@extends('admin.layout')
@section('title', 'Customer Order')
@section('heading', 'Customer Order')
@section('content')
 @foreach($orders as $order)
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="invoice p-3 mb-3 col-md-12 rounded">
          <!-- title row -->
          <div class="row">
            <div class="col-md-12 pb-3">
              <h4>
                <a href="{{route('customer.show')}}">
                  <button type="button" class="btn btn-outline-success btn-sm">Back to Customer</button>
                </a>
                <small class="float-right">Placed Date:{{$order->placed_at}} </small><br>
                <small class="float-right">Confirmed Date:{{$order->confirmed_at}} </small><br>
                <small class="float-right">Delivered Date:{{$order->delivered_at}}</small>
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
                      <td><img style="height: 75px; width:100px;" src="{{ asset('storage/app/'.$orderline->product->productimage->image) }}"></td>
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
            <div class="col-6">
              <p class="lead"> </p>

              <div class="table-responsive">
                <table class="table">
                  <tbody>
                   
                    <tr>
                    <th style="width:50%">Subtotal:</th>
                    <td>{{($order->amount)+($order->discount)}}</td>
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
  </section>
  @endforeach
  <!-- /.content -->
@endsection