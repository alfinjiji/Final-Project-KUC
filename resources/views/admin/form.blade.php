@extends('admin.layout')
@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Category</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Category</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
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
                  </div>
                  <!-- /.card-body -->
                  <div class="card-footer">
                    <button type="submit" class="btn btn-info">Submit</button>
                  </div>
                </form>
            </div>
            <!--end product-->
            <!--price list-->
            <div class="card card-success">
                <div class="card-header">
                  <h3 class="card-title">Price List</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form>
                  <div class="card-body">
                    <div class="form-group">
                        <label>Select Product</label>
                        <select class="form-control">
                            <option>-- Select Product--</option>
                            <option>option 2</option>
                          </select>
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
                        <label>Amount</label>
                        <input type="number" class="form-control">
                    </div>
                  </div>
                  <!-- /.card-body -->
                  <div class="card-footer">
                    <button type="submit" class="btn btn-success">Submit</button>
                  </div>
                </form>
            </div>
            <!--end price list-->
        </div>

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
              <!--coupon-->
            <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Create Coupon</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form>
                  <div class="card-body">
                    <div class="form-group">
                      <label>Coupon Name</label>
                      <input type="text" class="form-control"  placeholder="Enter Coupon Name">
                    </div>
                    <div class="form-group">
                        <label>Coupon Code</label>
                        <input type="text" class="form-control"  placeholder="Enter Coupon Code">
                    </div>
                    <div class="form-group">
                        <label>Valid From</label>
                        <input type="date" class="form-control"  placeholder="Enter Coupon Name">
                    </div>
                    <div class="form-group">
                        <label>Valid To</label>
                        <input type="date" class="form-control"  placeholder="Enter Coupon Name">
                    </div>
                    <div class="form-group">
                        <label>Coupon Type</label>
                        <select class="form-control">
                            <option>-- Select Coupon Type --</option>
                            <option>Flat</option>
                            <option>percentage</option>
                          </select>
                    </div>
                    <div class="form-group">
                        <label>Type Value</label>
                        <input type="number" class="form-control" placeholder="Enter Type Value">
                    </div>
                  </div>
                  <!-- /.card-body -->
                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
                </form>
            </div>
            <!--end coupon-->
        </div>

        <!--customer table-->
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Customers</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th style="width: 10px">#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Mobile</th>
                        <th>Address</th>
                        <th>Orders</th>
                        <th>Wishlist</th>
                        <th>Wallet</th>
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
                        <td> </td>
                        <td></td>
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
        <!-- end customer table-->

        <!--product table-->
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Products</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th style="width: 10px">#</th>
                        <th>Product Name</th>
                        <th>Image</th>
                        <th>Description</th>
                        <th>Size</th>
                        <th>Color</th>
                        <th>Category</th>
                        <th>Price</th>
                        <th>Status</th>
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
                        <td> </td>
                        <td></td>
                        <td></td>
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

        <!--coupon table-->
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Coupons</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th style="width: 10px">#</th>
                        <th>Coupon Name</th>
                        <th>Code</th>
                        <th>Date From</th>
                        <th>Date To</th>
                        <th>Type</th>
                        <th>Type Value</th>
                        <th>Status</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>1.</td>
                        <td> </td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td> </td>
                        <td></td>
                        <td></td>
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
        <!-- end coupon table-->

        <!--order table-->
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Orders</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th style="width: 10px">#</th>
                        <th>Customer Name</th>
                        <th>Address</th>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Discount</th>
                        <th>Coupon Applied</th>
                        <th>Net Amount</th>
                        <th>Status</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>1.</td>
                        <td></td>
                        <td></td>
                        <td> </td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td> </td>
                        <td></td>
                        <td></td>
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
        <!-- end order table-->

        <!--banner table-->
        <div class="col-md-6">
            <div class="card">
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
                        <th>Url</th>
                        <th>Status</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>1.</td>
                        <td></td>
                        <td> </td>
                        <td></td>
                        <td></td>
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
        <!-- end banner table-->
        
      </div>
    </div>
  </section>

  <!-- /.content -->
</div>
@endsection