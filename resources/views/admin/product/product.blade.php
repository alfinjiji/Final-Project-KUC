@extends('admin.layout')
@section('title', 'Products')
@section('heading', 'Products')
@section('content')

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- alert message -->
        <div class="col-md-12">
          @if(session()->has('message'))
            <div class="alert alert-success">
                 {{ session()->get('message') }}
            </div>
          @endif
        </div>
        <!--product table-->
        <div class="col-md-12">
          <div class="card card-primary">
              <div class="card-header">
                <div class="row">
                  <div class="col-md-6"><h3 class="card-title">Products</h3></div>
                  <div class="col-md-6 text-right"> 
                    <a href="{{route('product.create')}}"><button class="btn btn-success" type="button">Upload Product</button></a> 
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Name</th>
                      <th>Description</th>
                      <th>Size</th>
                      <th>Colour</th>
                      <th>Material</th>
                      <th>Category</th>
                      <th>Image</th>
                      <th>Price</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($products as $product)
                    <tr>
                      <td>{{$loop->iteration}}</td>
                      <td>{{$product->product_name}}</td>
                      <td>{{$product->description}}</td>
                      <td>{{$product->size}}</td>
                      <td>{{$product->color}}</td>
                      <td>{{$product->material_name}}</td>
                      <td>{{$product->category_name}}</td>
                      <td>
                        <img style="height: 75px; width:100px;" src="{{ asset('storage/app/'.$product->image) }}">
                      </td>
                      <td><a href="{{route('product.pricelist',['id'=>encrypt($product->product_id)])}}"><span class="badge bg-success">pricelist</span></a></td>
                      @if($product->status == 1)
                      <td><span class="badge bg-success">active</span></td>
                      @else
                      <td><span class="badge bg-danger">inactive</span></td>
                      @endif
                      <td>
                       <a href="{{route('product.edit',['id'=>encrypt($product->product_id)])}}" ><button type="button" class="btn btn-xs btn-primary" >
                          Edit
                        </button></a>
                        <a href="{{route('product.add.price',['id'=>encrypt($product->product_id)])}}"><button type="button" class="btn btn-xs btn-success" data-toggle="modal" data-target="#addprice-model">
                          Add Price
                        </button></a>
                        <a href="{{route('product.delete',['id'=>encrypt($product->product_id)])}}"><button type="button" class="btn btn-xs btn-danger" id="menu-delete" onclick="detetealert()">
                          Delete
                        </button></a>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
              <!--- Add Price Model Begin-->
            <!--  <div class="modal fade" id="addprice-model">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title">Add Price</h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <div class="card card-Success">
                        <form>
                          <div class="card-body">
                              <div class="form-group">
                                <label>From Date</label>
                                <input type="date" class="form-control">
                              </div>
                              <div class="form-group">
                                  <label>To Date</label>
                                  <input type="date" class="form-control">
                              </div>
                              <div class="form-group">
                                  <label>Price</label>
                                  <input type="number" class="form-control"  placeholder="Enter Price">
                              </div>
                          </div>
                          <div class="card-footer">
                            <button type="submit" class="btn btn-success">Submit</button>
                          </div>
                        </form>
                    </div>
                    </div>
                  </div>
                </div>
              </div>  -->
              <!--- Add price Model End-->

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
      <!-- end product table-->
      </div>
    </div>
  </section>
  
  <!-- /.content -->
@endsection