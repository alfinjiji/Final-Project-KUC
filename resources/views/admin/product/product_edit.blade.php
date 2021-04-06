@extends('admin.layout')
@section('title', 'Products')
@section('heading', 'Products')
@section('content')

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Edit Product</h3>
              <a href="{{url()->previous()}}"><button class="btn btn-success float-right">Back</button></a>
            </div>
            <!-- form start -->
            <form method="POST" action="{{route('do.product.edit',['id'=>encrypt($product->product_id)])}}" enctype="multipart/form-data">
              @csrf
              <div class="card-body">
                  <div class="form-group">
                    <label>Product Name</label>
                    <input type="text" class="form-control"  placeholder="Enter Product Name" value="{{$product->product_name}}" name="product_name">
                  </div>
                  <div class="form-group">
                      <label>Product Description</label>
                      <textarea class="form-control" rows="3" placeholder="Enter Description" name="description">{{$product->description}}</textarea>
                    </div>
                  <div class="form-group">
                      <label>Size</label>
                      <select class="form-control" name="size">
                        <option selected value="{{$product->size}}">{{$product->size}}</option>
                        <option value="S">S</option>
                        <option value="M">M</option>
                        <option value="L">L</option>
                        <option value="XL">XL</option>
                        <option value="XXL">XXL</option>
                      </select>
                  </div>
                  <div class="form-group">
                      <label>Colour</label>
                      <input type="text" class="form-control"  placeholder="Enter Colour" value="{{$product->color}}" name="color">
                  </div>
                  <div class="form-group">
                    <label>Category</label>
                    <select class="form-control" name="category_id">
                      <option>--select category</option>
                      @foreach($category as $category)
                        @if($category->category_id == $product->category_id)
                          <option value="{{$category->category_id}}" selected>{{$category->category_name}}</option>
                        @else
                          <option value="{{$category->category_id}}">{{$category->category_name}}</option>
                        @endif
                      @endforeach
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Material</label>
                    <select class="form-control" name="material_id">
                      <option>--select material</option>
                      @foreach($material as $material)
                        @if($material->material_id == $product->material_id)
                          <option value="{{$material->material_id}}" selected>{{$material->material_name}}</option>
                        @else
                          <option value="{{$material->material_id}}">{{$material->material_name}}</option>
                        @endif
                      @endforeach
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Image</label><br>
                    <!--
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" id="customFile">
                      <label class="custom-file-label" for="customFile">Choose file</label>
                    </div>
                  -->
                    <img id="view" style="max-width:100px;max-height: 100px " src="{{asset('storage/app/'.$product->image)}}"/>
                    <div class="custom-file">
                      <input class="form-control" type="file" id="formFileDisabled"  onchange="previewFile()" name="image"/>
                    </div>
                  </div>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <button type="submit" class="btn btn-info">Submit</button>
              </div>
            </form>
        </div>
        </div>
      </div>
    </div>
  </section>
  <!-- /.content -->
  <script>
    function previewFile(input){
        var file = $("input[type=file]").get(0).files[0];
 
        if(file){
            var reader = new FileReader();
 
            reader.onload = function(){
                $("#view").attr("src", reader.result);
            }
 
            reader.readAsDataURL(file);
        }

    }
   
    
  </script>
  
@endsection