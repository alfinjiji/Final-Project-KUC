@extends('admin.layout')
@section('title', 'Create-Product')
@section('heading', 'Create-Product')
@section('content')

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <!--product-->
          <div class="card card-primary">
            <div class="card-header">
              <div class="row">
                <div class="col-md-6"><h3 class="card-title">Upload Products</h3></div>
                <div class="col-md-6 text-right"> 
                  <a href="{{route('product')}}"><button class="btn btn-success" type="button">Back</button></a> 
                </div>
              </div>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form method="POST" action="{{route('do.product.create')}}" enctype="multipart/form-data">
              @csrf
              <div class="card-body">
                  <div class="form-group">
                    <label>Product Name</label>
                    <input type="text" class="form-control"  placeholder="Enter Product Name" name="product_name">
                  </div>
                  <div class="form-group">
                      <label>Product Description</label>
                      <textarea class="form-control" rows="3" placeholder="Enter Description" name="description"></textarea>
                    </div>
                  <div class="form-group">
                      <label>Size</label>
                      <select class="form-control" name="size">
                        <option>--select size--</option>
                        <option value="S">S</option>
                        <option value="M">M</option>
                        <option value="L">L</option>
                        <option value="XL">XL</option>
                        <option value="XXL">XXL</option>
                      </select>
                  </div>
                  <div class="form-group">
                      <label>Colour</label>
                      <input type="text" class="form-control"  placeholder="Enter Colour" name="color">
                  </div>
                  <div class="form-group">
                    <label>Category</label>
                    <select class="form-control" name="category_id">
                      <option>--select category--</option>
                      @foreach($category as $category)
                      <option value="{{$category->category_id}}">{{$category->category_name}}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Material</label>
                    <select class="form-control" name="material_id">
                      <option>--select material--</option>
                      @foreach($material as $material)
                      <option value="{{$material->material_id}}">{{$material->material_name}}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Image</label>
                    <!--
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" id="customFile">
                      <label class="custom-file-label" for="customFile">Choose file</label>
                    </div>
                  -->
                  <input type="file" name="image" class="form-control">
                  </div>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <button type="submit" class="btn btn-success">Upload</button>
              </div>
            </form>
        </div>
        <!--end product-->
       </div>
      </div>
    </div>
  </section>
  <!-- /.content -->
@endsection