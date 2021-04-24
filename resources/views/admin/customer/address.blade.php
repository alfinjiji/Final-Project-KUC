@extends('admin.layout')
@section('title', 'Customer-Address')
@section('heading', 'Customer-Address')
@section('content')

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <!--customer table-->
        <div class="col-md-12">
          <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Customers Address</h3>
                <a href="{{url()->previous()}}"><button class="btn btn-success float-right">Back</button></a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th style="width: 10px">No:</th>
                      <th>House Name</th>
                      <th>Area</th>
                      <th>City</th>
                      <th>State</th>
                      <th>PIN</th>
                      <th>Landmark</th>
                      <th>Status</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($addresses as $address)
                    <tr>
                      <td>{{$loop->iteration}}</td>
                      <td>{{$address->house_name}}</td>
                      <td> {{$address->area}}</td>
                      <td>{{$address->city}}</td>
                      <td>{{$address->state}}</td>
                      <td>{{$address->pincode}} </td>
                      <td>{{$address->landmark}}</td>
                      @if($address->status==1)
                      <td> <span class="badge bg-success">active</span></td>
                      @else
                      <td> <span class="badge bg-danger">inactive</span></td>
                      @endif
                    </tr>
                    @endforeach
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
      </div>
    </div>
  </section>
  <!-- /.content -->
@endsection