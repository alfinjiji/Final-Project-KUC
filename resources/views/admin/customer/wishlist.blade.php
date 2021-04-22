@extends('admin.layout')
@section('title', 'Wishlist')
@section('heading', 'Wishlist')
@section('content')

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Favorite</h3>
                <a href="{{url()->previous()}}"><button class="btn btn-success float-right">Back</button></a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Image</th>
                      <th>Product Name</th>
                      <th>Category</th>
                      <th>Price</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($wishlist as $Wishlist)
                    <tr>
                      <td>{{$loop->iteration}}</td>
                      <td><img src="{{asset('storage/app/'.$Wishlist->product->productimage->image)}}" width="50" height="50"/> </td>
                      <td> {{$Wishlist->product->product_name}}</td>
                      <td>{{$Wishlist->product->category->category_name}}</td>
                      <td>{{$Wishlist->product->pricelist->price}}</td>
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
      </div>
    </div>
  </section>
  <!-- /.content -->
@endsection