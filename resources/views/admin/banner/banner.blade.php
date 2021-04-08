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
                                    <th style="width: 10px">No:</th>
                                    <th>Name</th>
                                    <th>Image</th>
                                    <th>Date From</th>
                                    <th>Expire Date</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  @foreach($banner as $baner)
                                  <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$baner->banner_name}}</td>
                                    <td><img src="{{asset('storage/app/image/'.$baner->image)}}" width="50" height="50"/> </td>
                                    <td>{{$baner->date_from}}</td>
                                    <td>{{$baner->date_to}}</td>
                                    @if($baner->status==1)
                                    <td> <span class="badge bg-success">active</span></td>
                                    @else
                                    <td> <span class="badge bg-success">inactive</span></td>
                                    @endif
                                    <td>
                                      <a href="{{route('banner.edit',['id'=>encrypt($baner->banner_id)])}}"><button type="button" class="btn btn-xs btn-primary">Edit</button></a>
                                      <a href="{{route('banner.delete',['id'=>encrypt($baner->banner_id)])}}"> <button type="button" class="btn btn-xs btn-danger" onclick="detetealert()">
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
                    <!-- end banner table-->
                </div>
                <div class="tab-pane fade" id="banner-create" role="tabpanel" aria-labelledby="banner-create-tab">
                  <div class="col-md-12">
                    <!--banner-->
                    <div class="card card-success">
                        <div class="card-header">
                          <h3 class="card-title">Create Banner</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form id="form" method="POST" action="{{route('banner.upload')}}" enctype="multipart/form-data" >
                          @csrf
                            <div class="card-body">
                                <div class="form-group">
                                  <label>Banner Name</label>
                                  <input type="text" class="form-control"  placeholder="Enter Banner Name" name="bannername">
                                </div>
                                <div class="form-group">
                                    <label>Url</label>
                                    <input type="text" class="form-control"  placeholder="Enter Url" name="url">
                                </div>
                                <div class="form-group">
                                    <label>Date From</label>
                                    <input type="text" class="form-control" placeholder="yyyy-mm-dd" id="datepicker" name="fromdate" onload="datepicker()" autocomplete="off">
                                </div>
                                <div class="form-group">
                                  <label >Date To</label>
                                  <input type="text" class="form-control" placeholder="yyyy-mm-dd" id="datepicker1" name="duedate" onclick="datepicker()" autocomplete="off">
                                </div>
                                
                                <div class="form-group">
                                    <label>Image</label><br>
                                    <img id="view" style="max-width:100px;max-height: 100px " />
                                      <div class="custom-file">
                                        <input class="form-control" type="file" id="formFileDisabled"  onchange="previewFile()" name="image"/>
                                      </div>
                                      <span id="spnmsg" style="color:red;"></span><br />
                                </div>
                          </div>
                          <!-- /.card-body -->
                          <div class="card-footer">
                            <button type="submit" class="btn btn-success" id="btnSubmit">Submit</button>
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
  <script>
    function previewFile(input){
        var file = $("input[type=file]").get(0).files[0];
 
        if(file){
            var reader = new FileReader();
 
            reader.onload = function(){
                $("#view").attr("src", reader.result);
            }
 
            reader.readAsDataURL(file);
        }

    }
  </script>
  <!-- /.content -->
@endsection
@section("validation script")
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script>
  $(document).ready(function () {
    $("#form").validate({
      rules: {
        bannername: {
          required: true,
          minlength: 2
        },
        url:{
          required:true,
          url:false
        },
        fromdate:{
          required:true
        },
        duedate:{
          required:true
        },
        image: {
          required:true
        }
      },
      messages: {
        bannername: '* Please enter a name',
        url:'* Please enter valid url',
        fromdate:'* choose date',
        duedate:'* choose date'
      },
      errorPlacement: function (error, element) {
          error.css('color', 'red');
          element.css('border-color', 'red');
        error.insertAfter(element);
      },
      highlight: function(element) {
      $(element).css('border-color', 'red');
      },
      unhighlight: function(element) {
      $(element).css('border-color', '#007bff');}
    });
  });
  $(function () {
$("#formFileDisabled").change(function () {
// Get uploaded file extension
var extension = $(this).val().split('.').pop().toLowerCase();
// Create array with the files extensions that we wish to upload
var validFileExtensions = ['jpeg', 'jpg', 'png', 'gif', 'bmp'];
//Check file extension in the array.if -1 that means the file extension is not in the list.
if ($.inArray(extension, validFileExtensions) == -1) {
$('#spnmsg').text("Failed!! Please upload jpg, jpeg, png, gif, bmp file only.").show();
// Clear fileuload control selected file
$(this).replaceWith($(this).val('').clone(true));
//Disable Submit Button
$('#btnSubmit').prop('disabled', true);
}
else {
// Check and restrict the file size to 32 KB.
/*if ($(this).get(0).files[0].size > (32768)) {
$('#spnmsg').text("Failed!! Max allowed file size is 32 kb").show();
// Clear fileuload control selected file
$(this).replaceWith($(this).val('').clone(true));
//Disable Submit Button
$('#btnSubmit').prop('disabled', true);
}
else {*/
//Clear and Hide message span
$('#spnmsg').text('').hide();
//Enable Submit Button
$('#btnSubmit').prop('disabled', false);
}
});
});
</script>  
@endsection

