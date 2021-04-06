@extends('admin.layout')
@section('title', 'Add-Product-Price')
@section('heading', 'Add Product Price')
@section('content')

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          @if(session()->has('message'))
            <div class="alert alert-success">
                 {{ session()->get('message') }}
            </div>
          @endif
        </div>
        <div class="col-md-12">
            <!--category-->
            <div class="card card-primary">
                <div class="card-header">
                  <div class="row">
                    <div class="col-md-6"><h3 class="card-title">Add Price</h3></div>
                    <div class="col-md-6 text-right"> 
                      <a href="{{route('product')}}"><button class="btn btn-success" type="button">Back</button></a> 
                    </div>
                  </div>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{route('do.product.add.price',['id'=>encrypt($product_id)])}}" method="POST">
                  @csrf
                  <div class="card-body">
                    <div class="form-group">
                      <label>From Date</label>
                      <input type="text" placeholder="yyyy-mm-dd" class="form-control" name="date_from" id="datepicker" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label>To Date</label>
                        <input type="text" class="form-control"  name="date_to" placeholder="yyyy-mm-dd" id="datepicker1" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label>Price</label>
                        <input type="number" class="form-control"  placeholder="Enter Price" name="price">
                    </div>
                  </div>
                  <!-- /.card-body -->
                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
                </form>
            </div>
        </div>

      </div>
    </div>
  </section>
  <!-- /.content -->
@endsection