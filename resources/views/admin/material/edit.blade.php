@extends('admin.layout')
@section('title', 'Edit-Material')
@section('heading', 'Edit-Material')
@section('content')

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
            <!--category-->
            <div class="card card-success">
                <div class="card-header">
                  <h3 class="card-title">Edit Material</h3>
                  <a href="{{route('material.show')}}"><button class="btn btn-primary float-right">Back</button></a>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{route('material.update',['id'=>encrypt($material->material_id)])}}" method="POST" id="materialForm">
                  @csrf
                  <div class="card-body">
                    <div class="form-group">
                      <label>Material Name</label>
                      <input type="text" name="material_name" value="{{$material->material_name}}" class="form-control"  placeholder="Enter Category">
                    </div>
                  </div>
                  <!-- /.card-body -->
                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Update</button>
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

@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js" integrity="sha512-UdIMMlVx0HEynClOIFSyOrPggomfhBKJE28LKl8yR3ghkgugPnG6iLfRfHwushZl1MOPSY6TsuBDGPK2X4zYKg==" crossorigin="anonymous"></script>
<script>
$(document).ready(function () {

$('#materialForm').validate({ 
    rules: {
        material_name: {
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
</script>
@endsection