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
            <form method="POST" action="{{route('product.update',['id'=>encrypt($product->product_id)])}}" enctype="multipart/form-data" id="productEditForm"> 
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
                      @foreach($categorys as $category)
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
                      @foreach($materials as $material)
                        @if($material->material_id == $product->material_id)
                          <option value="{{$material->material_id}}" selected>{{$material->material_name}}</option>
                        @else
                          <option value="{{$material->material_id}}">{{$material->material_name}}</option>
                        @endif
                      @endforeach
                    </select>
                  </div>
                  <!--
                  <div class="form-group">
                    <label>Image</label><br>
                    <img id="view" style="max-width:100px;max-height: 100px " src="{{asset('storage/app/'.$product->productimage->image)}}"/>
                    <input type="hidden" name="image_id" value="{{$product->productimage->productimage_id}}">
                    <div class="custom-file">
                      <input class="form-control" type="file" id="formFileDisabled"  onchange="previewFile()" name="image"/><br>
                      <span id="spnmsg" style="color:red;"></span>
                    </div>
                  </div>
                -->
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

@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js" integrity="sha512-UdIMMlVx0HEynClOIFSyOrPggomfhBKJE28LKl8yR3ghkgugPnG6iLfRfHwushZl1MOPSY6TsuBDGPK2X4zYKg==" crossorigin="anonymous"></script>
<script>
$(document).ready(function () {
$('#productEditForm').validate({ // initialize the plugin
    rules: {
        product_name: {
          required: true
        },
        description: {
          required: true
        },
        color: {
          required: true
        }
    },
    errorPlacement: function (error, element) { 
      element.css('border-color', 'red'); 
      error.css('color', 'red');
      error.insertAfter(element); 
    }, 
    highlight: function(element) {
        $(element).css('border-color', 'red');
    },
    unhighlight: function(element) {
        $(element).css('border-color', '#007bff');
    }
});
});

//image validation
$(function () {
$("#formFileDisabled").change(function () {
var extension = $(this).val().split('.').pop().toLowerCase();
var validFileExtensions = ['jpeg', 'jpg', 'png', 'gif', 'bmp'];
if ($.inArray(extension, validFileExtensions) == -1) {
$('#spnmsg').text("Failed!! Please select jpg, jpeg, png, gif, bmp file only.").show();
$(this).replaceWith($(this).val('').clone(true));
$('#productSubmitBtn').prop('disabled', true);
}
else {
$('#spnmsg').text('').hide();
$('#productSubmitBtn').prop('disabled', false);
}
});
});
</script>
@endsection