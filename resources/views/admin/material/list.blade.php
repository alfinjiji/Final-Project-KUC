@extends('admin.layout')
@section('title', 'Material')
@section('heading', 'Material')
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
          <div class="card card-primary">
              <div class="card-header">
                <div class="row">
                  <div class="col-md-6"><h3 class="card-title">Material</h3></div>
                  <div class="col-md-6 text-right"> 
                    <a href="{{route('material.create')}}"><button class="btn btn-success" type="button">Add Material</button></a> 
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Material Name</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($materials as $material)
                    <tr>
                      <td>{{$loop->iteration}}</td>
                      <td>{{$material->material_name}}</td>
                      @if($material->status == 1)
                      <td><span class="badge bg-success">active</span></td>
                      @else
                      <td><span class="badge bg-danger">inactive</span></td>
                      @endif
                      <td>
                        <a href="{{route('material.edit',['id'=>encrypt($material->material_id)])}}"><button type="button" class="btn btn-xs btn-primary">
                          Edit
                        </button></a>
                        <a href="{{route('material.destroy',['id'=>encrypt($material->material_id)])}}"><button type="button" class="btn btn-xs btn-danger" id="material-delete" onclick="detetealert()">
                          Delete
                        </button></a>
                      </td>
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
      <!-- end category table-->
      </div>
    </div>
  </section>
  <script>
    function delete_material(){
      confirm("Do you want to delete ?");
    }
  </script>
  <!-- /.content -->
@endsection
