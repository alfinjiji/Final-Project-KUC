@extends('admin.layout')
@section('title', 'Create-Category')
@section('heading', 'Create-Category')
@section('content')

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
            <!--category-->
            <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Create Category</h3>
                  <a href="{{route('category.show')}}"><button class="btn btn-success float-right">Back</button></a>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <!-- alert message div start -->
                @if(session('message'))
                <div class="alert alert-danger">
                     {{ session('message') }}
                </div>
              @endif
            
              <!-- alert message div end -->
                <form method="POST" action="{{route('category.store')}}" id="form">
                  @csrf
                  <div class="card-body">
                    <div class="form-group">
                      <label>Category Name</label>
                      <input type="text" class="form-control"  placeholder="Enter Category" id="category"  name="category" autocomplete="off">
                    </div>
                    <p id="error" style="color:red"></p>
                  </div>
                  <!-- /.card-body -->
                  <div class="card-footer">
                    <button type="submit" name="submit" id="button" class="btn btn-primary">Submit</button>
                  </div>
                </form>
            </div>
            <!--end category-->
        </div>

      </div>
    </div>
  </section>
  <!-- /.content -->
  @endsection
  @section("validation script")
  <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
  <script>
    /*$(document).ready(function () {
      $("#form").validate({
        rules: {
          category: {
            required: true,
            minlength: 2
          }
        },
        messages: {
          category: {required:'* Please enter Category', minlength:'* minimum length 2'}
        },
        errorPlacement: function (error, element) {
          error.css('color', 'red');
          element.css('border-color', 'red');
        error.insertAfter(element);
      },
      highlight: function(element) {
      $(element).css('border-color', 'red');
      },
      unhighlight: function(element) {
      $(element).css('border-color', '#007bff');}
      });
    });*/
$(document).ready(function () {
  $("#category").keyup(function(){
    if($("#category").val() !=''){
      $("#error").text("");
      $("#category").css("border-color","#ced4da");
    }
    else{
      $("#error").text("*required");
      $("#category").css("border-color","red");
    }
  });
  $("#button").click(function(){	
  var l = $("#category").val();
		if(l == '')
		{
			$("#error").text("*required");
      $("#category").css("border-color","red");
			return false;	
		}
});
});
  </script>  
  @endsection
  
 
 
