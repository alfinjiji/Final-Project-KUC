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
          <div class="card card-success">
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
                      <th>Status</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>1.</td>
                      <td></td>
                      <td> </td>
                      <td></td>
                      <td></td>
                      <td></a></td>
                      <td><a href="#"><span class="badge bg-primary">details</span></a></td>
                      <td></td>
                    </tr>
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