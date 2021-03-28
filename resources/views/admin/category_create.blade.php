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
                  <a href="{{route('category')}}"><button class="btn btn-success float-right">Back</button></a>
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
                <form method="POST" action="{{route('category.add')}}">
                  @csrf
                  <div class="card-body">
                    <div class="form-group">
                      <label>Category Name</label>
                      <input type="text" class="form-control"  placeholder="Enter Category" required name="category">
                    </div>
                  </div>
                  <!-- /.card-body -->
                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
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