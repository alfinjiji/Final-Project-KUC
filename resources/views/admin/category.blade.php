@extends('admin.layout')
@section('title', 'Category')
@section('heading', 'Category')
@section('content')

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <!--category table-->
        <div class="col-md-6">
          <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Category</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Category Name</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>1.</td>
                      <td></td>
                      <td></td>
                      <td>
                        <button type="button" class="btn btn-block btn-xs btn-primary">Edit</button>
                        <button type="button" class="btn btn-block btn-xs btn-danger">Delete</button>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
                <ul class="pagination pagination-sm m-0 float-right">
                  <li class="page-item"><a class="page-link" href="#">«</a></li>
                  <li class="page-item"><a class="page-link" href="#">1</a></li>
                  <li class="page-item"><a class="page-link" href="#">2</a></li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item"><a class="page-link" href="#">»</a></li>
                </ul>
              </div>
            </div> 
      </div>
      <!-- end category table-->

        <div class="col-md-6">
            <!--category-->
            <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Create Category</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form>
                  <div class="card-body">
                    <div class="form-group">
                      <label>Category Name</label>
                      <input type="text" class="form-control"  placeholder="Enter Category">
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