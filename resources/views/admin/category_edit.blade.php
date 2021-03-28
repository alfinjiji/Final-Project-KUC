@extends('admin.layout')
@section('title', 'Edit-Category')
@section('heading', 'Edit-Category')
@section('content')

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
            <!--category-->
            <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Edit Category</h3>
                  <a href="{{route('category')}}"><button class="btn btn-success float-right">Back</button></a>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form method="POST" action="{{route('category.update',['id'=>$cat->category_id])}}">
                  @csrf
                  <div class="card-body">
                    <div class="form-group">
                      <label>Category Name</label>
                      <input type="text" class="form-control" name="edit" placeholder="Enter Category" value="{{$cat->category_name}}" required>
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