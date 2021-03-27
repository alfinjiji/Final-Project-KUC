@extends('admin.layout')
@section('title', 'Category')
@section('heading', 'Category')
@section('content')

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <!--category table-->
        <div class="col-md-12">
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
                        <a href="{{route('category.edit')}}"><button type="button" class="btn btn-xs btn-primary">
                          Edit
                        </button></a>
                        <button type="button" class="btn btn-xs btn-danger" data-toggle="modal" data-target="#delete-model">
                          Delete
                        </button>
                      </td>
                    </tr>
                  </tbody>
                </table>
                <!--- Delete Model Begin-->
                <div class="modal fade" id="delete-model">
                  <div class="modal-dialog modal-sm">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title">Delete Product</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <p>Do you want to delete&hellip;</p>
                      </div>
                      <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                        <button type="button" class="btn btn-primary">Yes</button>
                      </div>
                    </div>
                    <!-- /.modal-content -->
                  </div>
                  <!-- /.modal-dialog -->
                </div>
                <!--- delete Model End-->

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
      </div>
    </div>
  </section>
  <!-- /.content -->
@endsection