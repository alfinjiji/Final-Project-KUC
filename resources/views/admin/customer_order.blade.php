@extends('admin.layout')
@section('title', 'Customer Order')
@section('heading', 'Customer Order')
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
                <small class="float-right">Date: 2/10/2014</small>
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
                  <th>Qty</th>
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

          <div class="row">
            <!-- /.col -->
            <div class="col-6">
              <p class="lead"> </p>

              <div class="table-responsive">
                <table class="table">
                  <tbody><tr>
                    <th style="width:50%">Subtotal:</th>
                    <td>$250.30</td>
                  </tr>
                  <tr>
                    <th>Discount</th>
                    <td>$10.34</td>
                  </tr>
                  <tr>
                    <th>Total:</th>
                    <td>$265.24</td>
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
  <!-- /.content -->
@endsection