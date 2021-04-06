@extends('admin.layout')
@section('title', 'Coupon')
@section('heading', 'Coupon')
@section('content')

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-success card-outline card-tabs">
            <div class="card-header p-0 pt-1 border-bottom-0">
              <ul class="nav nav-tabs" id="custom-tabs-three-tab" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active" id="coupon-view-tab" data-toggle="pill" href="#coupon-view" role="tab" aria-controls="coupon-view" aria-selected="true">View</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="coupon-create-tab" data-toggle="pill" href="#coupon-create" role="tab" aria-controls="coupon-create" aria-selected="false">Create</a>
                </li>
              </ul>
            </div>
            <div class="card-body">
              <div class="tab-content" id="custom-tabs-three-tabContent">
                <div class="tab-pane fade show active" id="coupon-view" role="tabpanel" aria-labelledby="coupon-view-tab">
                  <!--coupon table-->
                      <div class="col-md-12">
                        <div class="card card-success">
                            <div class="card-header">
                              <h3 class="card-title">Coupon</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                              <table class="table table-bordered">
                                <thead>
                                  <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Name</th>
                                    <th>Code</th>
                                    <th>Date From</th>
                                    <th>Expire Date</th>
                                    <th>Type Value</th>
                                    <th>Action</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  @foreach($Coupon as $coup)
                                  <tr>
                                    <td>1.</td>
                                    <td>{{$coup->name}}</td>
                                    <td> {{$coup->code}}</td>
                                    <td>{{$coup->date_from}}</td>
                                    <td>{{$coup->date_to}}</td>
                                    @if($coup->type==0)
                                    <td>{{$coup->type_value}} Flat</td>
                                    @else
                                    <td>{{$coup->type_value}}%</td>
                                   @endif
                                    <td>
                                    <a href={{route('coupon.delete',['id'=>$coup->coupon_id])}} > <button type="button" class="btn btn-xs btn-danger" onclick="detetealert()">
                                        Delete
                                      </button></a>
                                    </td>
                                  </tr>
                                  @endforeach
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
                    <!-- end coupon table-->
                </div>
                <div class="tab-pane fade" id="coupon-create" role="tabpanel" aria-labelledby="coupon-create-tab">
                  <div class="col-md-6">
                    <!--coupon-->
                    <div class="card card-success">
                        <div class="card-header">
                          <h3 class="card-title">Create Coupon</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form method="POST" action="{{route('coupon.add')}}">
                          @csrf
                            <div class="card-body">
                                <div class="form-group">
                                  <label>Coupon Name</label>
                                  <input type="text" class="form-control"  placeholder="Enter coupon Name" name="name">
                                </div>
                                <div class="form-group">
                                    <label>Code</label>
                                    <input type="text" class="form-control"  placeholder="Enter Code" name="code">
                                </div>
                                <div class="form-group">
                                    <label>Date From</label>
                                    <input type="text" placeholder="yyyy-mm-dd" class="form-control" name="fromdate" id="datepicker" autocomplete="off">
                                </div>
                                <div class="form-group">
                                  <label>Date To</label>
                                  <input type="text" placeholder="yyyy-mm-dd" class="form-control" name="duedate" id="datepicker1" autocomplete="off">
                                </div>
                                <div class="form-group">
                                  <label>Type</label>
                                  <div class="form-group d-flex">
                                    <div class="custom-control custom-radio flex-column pr-3">
                                      <input class="custom-control-input" type="radio" id="customRadio2" name="type" value="0">
                                      <label for="customRadio2" class="custom-control-label">Flat</label>
                                    </div>
                                    <div class="custom-control custom-radio flex-column">
                                      <input class="custom-control-input" type="radio" id="customRadio1" name="type" value="1">
                                      <label for="customRadio1" class="custom-control-label">Percentage</label>
                                    </div>
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label>Type Value</label>
                                  <input type="number" class="form-control" placeholder="Enter Type Value" name="value">
                                </div>
                          </div>
                          <!-- /.card-body -->
                          <div class="card-footer">
                            <button type="submit" class="btn btn-success">Submit</button>
                          </div>
                        </form>
                      </div>
                      <!--end coupon-->
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