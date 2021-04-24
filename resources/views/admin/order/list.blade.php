@extends('admin.layout')
@section('title', 'Orders')
@section('heading', 'Orders')
@section('content')

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <!--order table-->
        <div class="col-md-12">
          @if(session()->has('message'))
            <div class="alert alert-success">
                 {{ session()->get('message') }}
            </div>
          @endif
        </div>
        <div class="col-md-12">
          <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Orders</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Name</th>
                      <th>Address</th>
                      <th>Amount</th>
                      <th>Discount</th>
                      <th>Coupon</th>
                      <th>Products</th>
                      <th>Payment</th>
                      <th>Status</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($orders as $order)
                    <tr>
                      <td>{{$loop->iteration}}</td>
                      <td>{{$order->customer->first_name . ' ' . $order->customer->last_name}}</td>
                      <td>
                        {{$order->address->house_name}} <br>
                        {{$order->address->area}} <br>
                        {{$order->address->city}} <br>
                        {{$order->address->pincode}} <br>
                        {{$order->address->landmark}} <br>
                      </td>
                      <td>{{$order->amount}}</td>
                      <td>{{$order->discount}}</td>
                      @if ($order->coupon)
                        <td>{{$order->coupon->name}}</td>
                      @else
                          <td></td>
                      @endif
                      <td><a href="{{route('show.order.product',['id'=>encrypt($order->order_id)])}}"><span class="badge bg-primary">details</span></a></td>
                      <td class="text-center">
                        {{ $order->payment_mode }} <br>
                        @if($order->payment_status == 1)
                          <p class="text-success">Paid</p>
                        @else 
                          <p class="text-primary">Pending</p>
                        @endif
                      </td>
                      @if($order->status == 0)
                        <td>
                          <span class="badge bg-danger">order Delevered</span><br>
                          <a href="{{route('edit.status',['id'=>encrypt($order->order_id)])}}"><span class="badge bg-primary">Update</span></a>
                        </td>
                      @elseif($order->status == 2)
                        <td>
                          <span class="badge bg-warning">order confirmed</span><br>
                          <a href="{{route('edit.status',['id'=>encrypt($order->order_id)])}}"><span class="badge bg-primary">Update</span></a></td>
                        </td>
                      @else
                        <td>
                          <span class="badge bg-success">order placed</span><br>
                          <a href="{{route('edit.status',['id'=>encrypt($order->order_id)])}}"><span class="badge bg-primary">Update</span></a></td>
                        </td>
                      @endif
                      
                    </tr>
                    @endforeach
                  </tbody>
                  
                </table>
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
                <ul class="pagination pagination-sm m-0 float-right">
                  <li class="page-item"><a class="page-link" href="#">«</a></li>
                  <li class="page-item"><a class="page-link" href="#">1</a></li>
                  <li class="page-item"><a class="page-link" href="#">2</a></li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item"><a class="page-link" href="#">»</a></li>
                </ul>
              </div>
            </div> 
      </div>
      <!-- end order table-->
      </div>
    </div>
  </section>
  <!-- /.content -->
@endsection