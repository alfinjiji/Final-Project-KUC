@extends('admin.layout')
@section('title', 'Menu-Create')
@section('heading', 'Menu-Create')
@section('content')

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          @if(session()->has('message'))
            <div class="alert alert-success">
                 {{ session()->get('message') }}
            </div>
          @endif
        </div>
        <div class="col-md-12">
            <!--category-->
            <div class="card card-primary">
                <div class="card-header">
                  <div class="row">
                    <div class="col-md-6"><h3 class="card-title">Create Menu</h3></div>
                    <div class="col-md-6 text-right"> 
                      <a href="{{route('menu.show')}}"><button class="btn btn-success" type="button">Back</button></a> 
                    </div>
                  </div>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{route('store.menu')}}" method="POST" id="menuForm">
                  @csrf
                  <div class="card-body">
                    <div class="form-group">
                      <label>Menu Name</label>
                      <input type="text" name="menu_name" class="form-control"  placeholder="Enter Menu" id="menu_name">
                      <span id="error" style="color:red;"></span>
                    </div>
                  </div>
                  <!-- /.card-body -->
                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary" id="submit">Submit</button>
                  </div>
                </form>
            </div>
        </div>

      </div>
    </div>
  </section>
  <!-- /.content -->
@endsection

@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js" integrity="sha512-UdIMMlVx0HEynClOIFSyOrPggomfhBKJE28LKl8yR3ghkgugPnG6iLfRfHwushZl1MOPSY6TsuBDGPK2X4zYKg==" crossorigin="anonymous"></script>
<script>
 $(document).ready(function(){
    $("#menu_name").keyup(function(){
        if($("#menu_name").val() == " "){
          $("#menu_name").css("border-color", "red");
          $("#error").html("Please enter menu name");
        } else {
          $("#menu_name").css("border-color", "green");
          $("#error").html("");
        }
    });
    $('#menuForm').on('click', function() {
       if(!$('#menu_name').val()) {
          $("#menu_name").css("border-color", "red");
          $("#error").html("Please enter menu name");
          return false;
       }
    });
});
</script>
@endsection