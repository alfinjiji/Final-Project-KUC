@extends('admin.layout')
@section('title', 'Customer Order')
@section('heading', 'Customer Order')
@section('content')
 @foreach($order as $or)
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="invoice p-3 mb-3 col-md-12 rounded">
          <!-- title row -->
          <div class="row">
            <div class="col-md-12 pb-3">
              <h4>
                <a href="{{route('customer')}}">
                  <button type="button" class="btn btn-outline-success btn-sm">Back to Customer</button>
                </a>
                <small class="float-right">Placed Date:{{$or->placed_at}} </small><br>
                <small class="float-right">Confirmed Date:{{$or->confirmed_at}} </small><br>
                <small class="float-right">Delivered Date:{{$or->delivered_at}}</small>
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
                  <th>Product</th>
                  <th>Qty</th>
                  <th>Unit Price</th>
                  <th>Subtotal</th>
                </tr>
                </thead>
                <tbody>
                  @foreach($product as $pro)
                <tr>
                  <td>{{$loop->iteration}}</td>
                  <td>{{$pro->quantity}}</td>
                  <td>{{$pro->quantity}}</td>
                  <td>{{$pro->unit_price}}</td>
                  <td>{{$pro->sum}}</td>
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
                    <td>{{$or->amount}}</td>
                  </tr>
                  <tr>
                    <th>Discount</th>
                    <td>{{$or->discount}}</td>
                  </tr>
                  <tr>
                    <th>Total:</th>
                    <td>{{($or->amount)-($or->discount)}}</td>
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