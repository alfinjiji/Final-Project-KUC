@extends('admin.layout')
@section('title', 'Menu-Create')
@section('heading', 'Menu-Create')
@section('content')

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
            <!--category-->
            <div class="card card-primary">
                <div class="card-header">
                  <div class="row">
                    <div class="col-md-6"><h3 class="card-title">Create Menu</h3></div>
                    <div class="col-md-6 text-right"> 
                      <a href="{{route('menu')}}"><button class="btn btn-success" type="button">Back</button></a> 
                    </div>
                  </div>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form>
                  <div class="card-body">
                    <div class="form-group">
                      <label>Menu Name</label>
                      <input type="text" class="form-control"  placeholder="Enter Menu" required>
                    </div>
                  </div>
                  <!-- /.card-body -->
                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
                </form>
            </div>
        </div>

      </div>
    </div>
  </section>
  <!-- /.content -->
@endsection