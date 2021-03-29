@extends('admin.layout')
@section('title', 'Customer')
@section('heading', 'Customer')
@section('content')

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <!--customer table-->
        <div class="col-md-12">
          <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Customers</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Mobile</th>
                      <th>Address</th>
                      <th>Orders</th>
                      <th>Wishlist</th>
                      <th>Wallet</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($cust as $customer)
                    <tr>
                      <td>{{$customer->customer_id}}</td>
                      <td>{{$customer->first_name.$customer->last_name}}</td>
                      <td> {{$customer->email}}</td>
                      <td>{{$customer->mobile}}</td>
                      <td><a href="{{route('customer.address',['id'=>encrypt($customer->customer_id)])}}"><span class="badge bg-danger">click</span></a></td>
                      <td><a href="{{route('customer.order',['id'=>encrypt($customer->customer_id)])}}"><span class="badge bg-success">click</span></a></td>
                      <td><a href="{{route('wishlist',['id'=>encrypt($customer->customer_id)])}}"><span class="badge bg-primary">click</span></a></td>
                      <td></td>
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
      <!-- end customer table-->
      </div>
    </div>
  </section>
  <!-- /.content -->
@endsection