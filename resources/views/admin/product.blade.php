@extends('admin.layout')
@section('title', 'Products')
@section('heading', 'Products')
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
                  <a class="nav-link active" id="product-view-tab" data-toggle="pill" href="#product-view" role="tab" aria-controls="product-view" aria-selected="true">View</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="product-create-tab" data-toggle="pill" href="#product-create" role="tab" aria-controls="product-create" aria-selected="false">Create</a>
                </li>
              </ul>
            </div>
            <div class="card-body">
              <div class="tab-content" id="custom-tabs-three-tabContent">
                <div class="tab-pane fade show active" id="product-view" role="tabpanel" aria-labelledby="product-view-tab">
                  <!--product table-->
                      <div class="col-md-12">
                        <div class="card card-primary">
                            <div class="card-header">
                              <h3 class="card-title">Products</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                              <table class="table table-bordered">
                                <thead>
                                  <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Size</th>
                                    <th>Colour</th>
                                    <th>Material</th>
                                    <th>Category</th>
                                    <th>Image</th>
                                    <th>Price</th>
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
                                    <td> </td>
                                    <td></td>
                                    <td> </td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>
                                      <button type="button" class="btn btn-block btn-xs btn-primary">Edit</button>
                                      <button type="button" class="btn btn-block btn-xs btn-success">Add Price</button>
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
                    <!-- end product table-->
                </div>
                <div class="tab-pane fade" id="product-create" role="tabpanel" aria-labelledby="product-create-tab">
                  <div class="col-md-6">
                    <!--product-->
                    <div class="card card-info">
                      <div class="card-header">
                        <h3 class="card-title">Upload Product</h3>
                      </div>
                      <!-- /.card-header -->
                      <!-- form start -->
                      <form>
                        <div class="card-body">
                            <div class="form-group">
                              <label>Product Name</label>
                              <input type="text" class="form-control"  placeholder="Enter Product Name">
                            </div>
                            <div class="form-group">
                                <label>Product Description</label>
                                <textarea class="form-control" rows="3" placeholder="Enter Description"></textarea>
                              </div>
                            <div class="form-group">
                                <label>Size</label>
                                <input type="text" class="form-control"  placeholder="Enter Size">
                            </div>
                            <div class="form-group">
                                <label>Colour</label>
                                <input type="text" class="form-control"  placeholder="Enter Colour">
                            </div>
                            <div class="form-group">
                              <label>Material</label>
                              <select class="form-control">
                                <option>--select material</option>
                                <option></option>
                              </select>
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
                          <button type="submit" class="btn btn-info">Submit</button>
                        </div>
                      </form>
                  </div>
                  <!--end product-->
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