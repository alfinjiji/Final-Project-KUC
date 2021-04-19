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
            <form method="POST" action="{{route('do.product.create')}}" enctype="multipart/form-data" id="productForm">
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
                        <option value="default">--select size--</option>
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
                      <option value="default">--select category--</option>
                      @foreach($category as $category)
                      <option value="{{$category->category_id}}">{{$category->category_name}}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Material</label>
                    <select class="form-control" name="material_id">
                      <option value="default">--select material--</option>
                      @foreach($material as $material)
                      <option value="{{$material->material_id}}">{{$material->material_name}}</option>
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
                  <!-- image 1 -->
                  <img id="view-1" style="max-width:100px;max-height: 100px " />
                  <div class="custom-file">
                    <input class="form-control" type="file" id="formFile-1"  onchange="previewFile_1()" name="image_1"/><br>
                    <span id="spnmsg" style="color:red;"></span>
                  </div>
                  <!-- image 2 -->
                  <img id="view-2" style="max-width:100px;max-height: 100px " />
                  <div class="custom-file">
                    <input class="form-control" type="file" id="formFile-2"  onchange="previewFile_2()" name="image_2"/><br>
                    <span id="spnmsg" style="color:red;"></span>
                  </div>
                  <!-- image 3 -->
                  <img id="view-3" style="max-width:100px;max-height: 100px " />
                  <div class="custom-file">
                    <input class="form-control" type="file" id="formFile-3"  onchange="previewFile_3()" name="image_3"/><br>
                    <span id="spnmsg" style="color:red;"></span>
                  </div>
                  <!-- image 4 -->
                  <img id="view-4" style="max-width:100px;max-height: 100px " />
                  <div class="custom-file">
                    <input class="form-control" type="file" id="formFile-4"  onchange="previewFile_4()" name="image_4"/><br>
                    <span id="spnmsg" style="color:red;"></span>
                  </div>
                  </div>
                  
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <button type="submit" class="btn btn-success" id="productSubmitBtn">Upload</button>
              </div>
            </form>
        </div>
        <!--end product-->
       </div>
      </div>
    </div>
  </section>
  <!-- /.content -->
  <script>
    // image 1
    function previewFile_1(input){
        var file = $("#formFile-1").get(0).files[0];
        if(file){
            var reader = new FileReader();
            reader.onload = function(){
                $("#view-1").attr("src", reader.result);
            }
            reader.readAsDataURL(file);
        }
    }
    // image 2
    function previewFile_2(input){
        var file = $("#formFile-2").get(0).files[0];
        if(file){
            var reader = new FileReader();
            reader.onload = function(){
                $("#view-2").attr("src", reader.result);
            }
            reader.readAsDataURL(file);
        }
    }
    // image 3
    function previewFile_3(input){
        var file = $("#formFile-3").get(0).files[0];
        if(file){
            var reader = new FileReader();
            reader.onload = function(){
                $("#view-3").attr("src", reader.result);
            }
            reader.readAsDataURL(file);
        }
    }
    // image 4
    function previewFile_4(input){
        var file = $("#formFile-4").get(0).files[0];
        if(file){
            var reader = new FileReader();
            reader.onload = function(){
                $("#view-4").attr("src", reader.result);
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
  
  $.validator.addMethod("valueNotEquals", function(value, element, arg){
  return arg !== value;
 }, "Please select an item!");

$('#productForm').validate({ 
    rules: {
        product_name: {
          required: true,
          minlength: 2
        },
        description: {
          required: true,
          minlength: 10
        },
        size : {
          required: true,
          valueNotEquals: "default" 
        },
        color: {
          required: true,
          minlength: 2
        },
        category_id: {
          required: true,
          valueNotEquals: "default"
        },
        material_id: {
          required: true,
          valueNotEquals: "default"
        },
        image: {
          required:true
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
// Get uploaded file extension
var extension = $(this).val().split('.').pop().toLowerCase();
// Create array with the files extensions that we wish to upload
var validFileExtensions = ['jpeg', 'jpg', 'png', 'gif', 'bmp'];
//Check file extension in the array.if -1 that means the file extension is not in the list.
if ($.inArray(extension, validFileExtensions) == -1) {
$('#spnmsg').text("Failed!! Please upload jpg, jpeg, png, gif, bmp file only.").show();
// Clear fileuload control selected file
$(this).replaceWith($(this).val('').clone(true));
//Disable Submit Button
$('#productSubmitBtn').prop('disabled', true);
}
else {
// Check and restrict the file size to 32 KB.
/*if ($(this).get(0).files[0].size > (32768)) {
$('#spnmsg').text("Failed!! Max allowed file size is 32 kb").show();
// Clear fileuload control selected file
$(this).replaceWith($(this).val('').clone(true));
//Disable Submit Button
$('#btnSubmit').prop('disabled', true);
}
else {*/
//Clear and Hide message span
$('#spnmsg').text('').hide();
//Enable Submit Button
$('#productSubmitBtn').prop('disabled', false);
}
});
});

</script>
@endsection


