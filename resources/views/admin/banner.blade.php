@extends('admin.layout')
@section('title', 'Banner')
@section('heading', 'Banner')
@section('content')

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-primary card-outline card-tabs">
            <div class="card-header p-0 pt-1 border-bottom-0">
              <ul class="nav nav-tabs" id="custom-tabs-three-tab" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active" id="banner-view-tab" data-toggle="pill" href="#banner-view" role="tab" aria-controls="banner-view" aria-selected="true">View</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="banner-create-tab" data-toggle="pill" href="#banner-create" role="tab" aria-controls="banner-create" aria-selected="false">Create</a>
                </li>
              </ul>
            </div>
            <div class="card-body">
              <div class="tab-content" id="custom-tabs-three-tabContent">
                <div class="tab-pane fade show active" id="banner-view" role="tabpanel" aria-labelledby="banner-view-tab">
                  <!--banner table-->
                      <div class="col-md-12">
                        <div class="card card-primary">
                            <div class="card-header">
                              <h3 class="card-title">Banner</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                              <table class="table table-bordered">
                                <thead>
                                  <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Name</th>
                                    <th>Image</th>
                                    <th>Date From</th>
                                    <th>Expire Date</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <tr>
                                    <td>1.</td>
                                    <td></td>
                                    <td> </td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>
                                      <button type="button" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#edit-model">
                                        Edit
                                      </button>
                                      <button type="button" class="btn btn-xs btn-danger" data-toggle="modal" data-target="#delete-model">
                                        Delete
                                      </button>
                                    </td>
                                  </tr>
                                </tbody>
                              </table>
                               <!--- Edit Model Begin-->
                              <div class="modal fade" id="edit-model">
                                <div class="modal-dialog modal-md">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h4 class="modal-title">Edit</h4>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-body">
                                      <!--banner-->
                                    <div class="card card-success">
                                      <div class="card-header">
                                        <h3 class="card-title">Banner</h3>
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
                                    <!--end banner-->
                                    </div>
                                  </div>
                                  <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                              </div>
                              <!--- delete Model End-->
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
                    <!-- end banner table-->
                </div>
                <div class="tab-pane fade" id="banner-create" role="tabpanel" aria-labelledby="banner-create-tab">
                  <div class="col-md-6">
                    <!--banner-->
                    <div class="card card-success">
                        <div class="card-header">
                          <h3 class="card-title">Create Banner</h3>
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
                      <!--end banner-->
                </div>

                </div>
              </div>
            </div>
            <!-- /.card -->
          </div>
        </div>
        
      </div>
    </div>
  </section>
  <!-- /.content -->
@endsection