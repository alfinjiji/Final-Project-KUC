@extends('admin.layout')
@section('title', 'Material-Create')
@section('heading', 'Material-Create')
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
                    <div class="col-md-6"><h3 class="card-title">Create Material</h3></div>
                    <div class="col-md-6 text-right"> 
                      <a href="{{route('material')}}"><button class="btn btn-success" type="button">Back</button></a> 
                    </div>
                  </div>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{route('do.material.create')}}" method="POST">
                  @csrf
                  <div class="card-body">
                    <div class="form-group">
                      <label>Material Name</label>
                      <input type="text" name="material_name" class="form-control"  placeholder="Enter material" required>
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