@extends('admin.layout')
@section('title', 'Order Product')
@section('heading', 'Order Product')
@section('content')

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="invoice p-3 mb-3 col-md-12 rounded">
          <!-- title row -->
          <div class="row">
            <div class="col-md-12 pb-3">
              <h4>
                <a href="{{route('order')}}">
                  <button type="button" class="btn btn-outline-success btn-sm">Back to Orders</button>
                </a>
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
                  <th>#</th>
                  <th>Product</th>
                  <th>Qty</th>
                  <th>Unit Price</th>
                  <th>Subtotal</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                  <td>1</td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                </tr>
                </tbody>
              </table>
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
      </div>
    </div>
  </section>
  <!-- /.content -->
@endsection