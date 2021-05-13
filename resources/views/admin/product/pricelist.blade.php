@extends('admin.layout')
@section('title', 'Price-list')
@section('heading', 'Price List')
@section('content')

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        @if(session('message'))
                <div class="alert alert-success">
                     {{ session('message') }}
                </div>
         @endif
        <!--category table-->
        <div class="col-md-12">
          <div class="card card-primary">
              <div class="card-header">
                <div class="row">
                  <div class="col-md-6"><h3 class="card-title">Price List</h3></div>
                  <div class="col-md-6 text-right">
                    <a href="{{route('product.show')}}"><button class="btn btn-success" type="button">Back</button></a>  
                    <a href="{{route('create.price',['id'=>encrypt($product_id)])}}"><button class="btn btn-success" type="button">Add price list</button></a> 
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th style="width: 10px">Id</th>
                      <th>Date_From</th>
                      <th>Date_To</th>
                      <th>Size</th>
                      <th>Price</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($pricelist as $pricelist)
                    <tr>
                      <td>{{$loop->iteration}}</td>
                      <td>{{$pricelist->date_from}}</td>
                      <td>{{$pricelist->date_to}}</td>
                      <td>{{$pricelist->productsize->size->size}} </td>
                      <td>{{$pricelist->price}}</td>
                      @if($pricelist->status==1)
                      <td> <span class="badge bg-success">active</span></td>
                      @else
                      <td> <span class="badge bg-danger">inactive</span></td>
                      @endif
                      <td>
                        <!--
                        <a href=""><button type="button" class="btn btn-xs btn-primary">
                          Edit
                        </button></a>
                        -->
                        <a href="{{route('destroy.price',['id'=>encrypt($pricelist->pricelist_id)])}}"><button type="button" class="btn btn-xs btn-danger" onclick="detetealert()">
                          Delete
                        </button></a>
                      </td>
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
      <!-- end category table-->
      </div>
    </div>
  </section>
 
@endsection
