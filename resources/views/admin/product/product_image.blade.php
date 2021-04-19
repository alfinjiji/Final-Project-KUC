@extends('admin.layout')
@section('title', 'Product-Images')
@section('heading', 'Product-Images')
@section('content')

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- alert message -->
        <div class="col-md-12">
          @if(session()->has('message'))
            <div class="alert alert-success">
                 {{ session()->get('message') }}
            </div>
          @endif
          @if(session()->has('error')) 
            <div class="alert alert-warning">
                {{ session()->get('error') }}
            </div>
          @endif
        </div>
        <!--product table-->
        <div class="col-md-12">

          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Upload more Images</h3>
            </div>
            <div class="card-body">
              <form method="POST" action="{{ route('add.product.image',['id'=>encrypt($product_id)]) }}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                  <div class="col-5">
                    <input type="file" class="form-control" id="uploadimage"  name="image" >
                    <span id="error" style="color:red;"></span>
                  </div>
                  <div class="col-3">
                    <button class="btn btn-success" type="submit" id="submitBtn">Upload</button>
                  </div>
                </div>
              </form>
            </div>
            <!-- /.card-body -->
          </div>

          <div class="card card-primary">
              <div class="card-header">
                <div class="row">
                  <div class="col-md-6"><h3 class="card-title">Product Images</h3></div>
                  <div class="col-md-6 text-right"> 
                    <a href="{{route('product')}}"><button class="btn btn-success" type="button">Back</button></a> 
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Image</th>
                      <th>Edit Image</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($product_images as $product_image)
                    <tr>
                      <td>{{$loop->iteration}}</td>
                      <td>
                        <img style="height: 75px; width:100px;" src="{{ asset('storage/app/'.$product_image->image) }}">
                      </td>
                      <td>
                        <form method="POST" enctype="multipart/form-data" action="{{ route('edit.product.image',['id'=>encrypt($product_image->productimage_id)]) }}">
                          @csrf
                          <div class="custom-file">
                            <input class="form-control img" type="file" name="image"  id="formFileDisabled{{ $loop->iteration }}" /><br>
                            <span id="spnmsg{{ $loop->iteration }}" style="color:red;"></span>
                          </div>
                          <button type="submit" class="btn btn-sm btn-primary imgBtn" data-id="{{ $loop->iteration }}" id="productSubmitBtn{{ $loop->iteration }}">Change Image</button>
                        </form>
                      </td>
                      <td>
                        <a href="{{ route('delete.product.image',['id'=>encrypt($product_image->productimage_id)]) }}"><button type="button" class="btn btn-sm btn-danger">
                          Delete
                        </button></a>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>

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
    </div>
  </section>
  
  <!-- /.content -->
@endsection
@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js" integrity="sha512-UdIMMlVx0HEynClOIFSyOrPggomfhBKJE28LKl8yR3ghkgugPnG6iLfRfHwushZl1MOPSY6TsuBDGPK2X4zYKg==" crossorigin="anonymous"></script>
  <script>
    // image validation
    $(document).ready(function () {
      $('.imgBtn').click(function(){
        var id = $(this).attr('data-id');
        if( $('#formFileDisabled'+id).val()=='')
        {  
          alert('choose image'); 
          return false;
        }
        var extension = $('#formFileDisabled'+id).val().split('.').pop().toLowerCase();
        var validFileExtensions = ['jpeg', 'jpg', 'png', 'gif', 'bmp'];
        if ($.inArray(extension, validFileExtensions) == -1) {
        $('#spnmsg'+id).text("Failed!! Please select jpg, jpeg, png, gif, bmp file only.").show();
          return false;
        }
    });
    $('#submitBtn').click(function(){
        if( $('#uploadimage').val()=='')
        {  
          alert('choose image'); 
          return false;
        }
        var extension = $('#uploadimage').val().split('.').pop().toLowerCase();
        var validFileExtensions = ['jpeg', 'jpg', 'png', 'gif', 'bmp'];
        if ($.inArray(extension, validFileExtensions) == -1) {
        $('#error').text("Failed!! Please select jpg, jpeg, png, gif, bmp file only.").show();
          return false;
        }
    });
    });
  </script>
@endsection