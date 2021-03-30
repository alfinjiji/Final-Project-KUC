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
                <form action="{{route('do.menu.edit',['id'=>encrypt($menu->menu_id)])}}" method="POST">
                  @csrf
                  <div class="card-body">
                    <div class="form-group">
                      <label>Menu Name</label>
                      <input type="text" name="menu_name" value="{{$menu->menu_name}}" class="form-control"  placeholder="Enter Category" required>
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