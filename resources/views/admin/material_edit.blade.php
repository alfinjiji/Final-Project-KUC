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
                  <a href="{{route('material')}}"><button class="btn btn-primary float-right">Back</button></a>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{route('do.material.edit',['id'=>encrypt($material->material_id)])}}" method="POST">
                  @csrf
                  <div class="card-body">
                    <div class="form-group">
                      <label>Material Name</label>
                      <input type="text" name="material_name" value="{{$material->material_name}}" class="form-control"  placeholder="Enter Category" required>
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