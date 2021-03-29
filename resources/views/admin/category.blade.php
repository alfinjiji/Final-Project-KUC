@extends('admin.layout')
@section('title', 'Category')
@section('heading', 'Category')
@section('content')

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        @if(session('message'))
                <div class="alert alert-success">
                     {{ session('message') }}
                </div>
         @endif
        <!--category table-->
        <div class="col-md-12">
          <div class="card card-primary">
              <div class="card-header">
                <div class="row">
                  <div class="col-md-6"><h3 class="card-title">Category</h3></div>
                  <div class="col-md-6 text-right"> 
                    <a href="{{route('category.create')}}"><button class="btn btn-success" type="button">Create</button></a> 
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th style="width: 10px">Id</th>
                      <th>Category Name</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($cat as $Cat)
                    <tr>
                      <td>{{ $Cat->category_id }}</td>
                      <td>{{$Cat->category_name}}</td>
                      @if($Cat->status==1)
                      <td> <span class="badge bg-success">active</span></td>
                      @else
                      <td> <span class="badge bg-danger">inactive</span></td>
                      @endif
                      <td>
                        <a href="{{route('category.edit',['id'=>encrypt($Cat->category_id)]) }}"><button type="button" class="btn btn-xs btn-primary">
                          Edit
                        </button></a>
                        <!--<button type="button" class="btn btn-xs btn-danger" data-toggle="modal" data-target="#delete-model">
                          Delete
                        </button>-->
                        <a href="{{route('category.delete',['id'=>encrypt($Cat->category_id)]) }}"><button type="button" class="btn btn-xs btn-danger" onclick="detetealert()">
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
      <!-- end category table-->
      </div>
    </div>
  </section>
  <script>
    function detetealert() {
      alert("Deleted Successfuly");
    }
    </script>
 
@endsection
