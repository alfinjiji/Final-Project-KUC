@extends('admin.layout')
@section('title', 'Edit-Banner')
@section('heading', 'Edit-Banner')
@section('content')

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Banner</h3>
              <a href="{{url()->previous()}}"><button class="btn btn-success float-right">Back</button></a>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form>
                <div class="card-body">
                    <div class="form-group">
                      <label>Banner Name</label>
                      <input type="text" class="form-control"  placeholder="Enter Banner Name">
                    </div>
                    <div class="form-group">
                        <label>Url</label>
                        <input type="text" class="form-control"  placeholder="Enter Url">
                    </div>
                    <div class="form-group">
                        <label>Date From</label>
                        <input type="date" class="form-control">
                    </div>
                    <div class="form-group">
                      <label>Date To</label>
                      <input type="date" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Image</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="customFile">
                            <label class="custom-file-label" for="customFile">Choose file</label>
                        </div>
                    </div>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <button type="submit" class="btn btn-success">Submit</button>
              </div>
            </form>
          </div>
        </div>
        
      </div>
    </div>
  </section>
  <!-- /.content -->
@endsection