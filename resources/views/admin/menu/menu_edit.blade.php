@extends('admin.layout')
@section('title', 'Edit-Menu')
@section('heading', 'Edit-Menu')
@section('content')

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
            <!--category-->
            <div class="card card-success">
                <div class="card-header">
                  <h3 class="card-title">Edit Menu</h3>
                  <a href="{{route('menu')}}"><button class="btn btn-primary float-right">Back</button></a>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{route('do.menu.edit',['id'=>encrypt($menu->menu_id)])}}" method="POST" id="menuForm">
                  @csrf
                  <div class="card-body">
                    <div class="form-group">
                      <label>Menu Name</label>
                      <input type="text" name="menu_name" value="{{$menu->menu_name}}" class="form-control"  placeholder="Enter Category">
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

$('#menuForm').validate({ 
    rules: {
        menu_name: {
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