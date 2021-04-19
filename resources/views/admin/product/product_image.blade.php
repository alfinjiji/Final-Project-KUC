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
        </div>
        <!--product table-->
        <div class="col-md-12">
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
                            <input class="form-control img" type="file" name="image" id="formFileDisabled" required/><br>
                            <span id="spnmsg" style="color:red;"></span>
                          </div>
                          <button type="submit" class="btn btn-sm btn-primary imgBtn" id="productSubmitBtn" >Change Image</button>
                        </form>
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
    /*
    $(document).ready(function () {
      $('.imgBtn').click(function(){
        $image=$('.img').val();
        if($image==''){
          alert('please choose image');
          return false;
        }
      });
    });

    // image validation
    $(function () {
    $("#formFileDisabled").change(function () {
    var extension = $(this).val().split('.').pop().toLowerCase();
    var validFileExtensions = ['jpeg', 'jpg', 'png', 'gif', 'bmp'];
    if ($.inArray(extension, validFileExtensions) == -1) {
    $('#spnmsg').text("Failed!! Please select jpg, jpeg, png, gif, bmp file only.").show();
    $(this).replaceWith($(this).val('').clone(true));
    $('#productSubmitBtn').prop('disabled', true);
    }
    else {
    $('#spnmsg').text('').hide();
    $('#productSubmitBtn').prop('disabled', false);
    }
    });
    });
    */
  </script>
@endsection