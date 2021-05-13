@extends('admin.layout')
@section('title', 'Add-Product-Price')
@section('heading', 'Add Product Price')
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
            <!--category-->
            <div class="card card-primary">
                <div class="card-header">
                  <div class="row">
                    <div class="col-md-6"><h3 class="card-title">Add Price</h3></div>
                    <div class="col-md-6 text-right"> 
                      <a href="{{route('product.show')}}"><button class="btn btn-success" type="button">Back</button></a>  
                    </div>
                  </div>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{route('store.price',['id'=>encrypt($product_id)])}}" method="POST" id="productPriceForm">
                  @csrf
                  <div class="card-body">
                    <div class="form-group">
                     <b> Choose Size
                      <select name="size" id="size" data-id="{{$product_id}}">
                        @foreach($sizes as $productsize)
                           <option data-id="{{$productsize->product_id}}" value="{{$productsize->productsize_id}}">{{$productsize->size->size}}</option>
                          @endforeach
                      </b>
                          <input type="hidden" name="productsize_id" id="productsize_id">
                          <input type="hidden" name="flag" id="flag">
                      </select>
                    </div>
                    <div class="form-group">
                      <label>From Date</label>
                     
                      <input type="text" placeholder="yyyy-mm-dd" class="form-control" name="date_from"  id="datepicker" autocomplete="off">
                      <input type="text" placeholder="yyyy-mm-dd" class="form-control" name="date_from_ajax"  id="newdate" autocomplete="off" readonly>
                    </div>
                    <div class="form-group">
                        <label>To Date</label>
                        <input type="text" class="form-control"  name="date_to" placeholder="yyyy-mm-dd" id="datepicker1" autocomplete="off">
                      </div>
                    <div class="form-group">
                        <label>Price</label>
                        <input type="number" class="form-control"  placeholder="Enter Price" name="price" required min="0">
                    </div>
                  </div>
                  <!-- /.card-body -->
                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
                </form>
            </div>
        </div>

      </div>
    </div>
  </section>
  <!-- /.content -->
@endsection

@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js" integrity="sha512-UdIMMlVx0HEynClOIFSyOrPggomfhBKJE28LKl8yR3ghkgugPnG6iLfRfHwushZl1MOPSY6TsuBDGPK2X4zYKg==" crossorigin="anonymous"></script>
<script>
$(document).ready(function () {
  var productsize_id=$('#size').val();
  var product_id=$('#size').attr('data-id');
  $('#newdate').hide();
  $('#productsize_id').val(productsize_id);
  $.ajax({
		  		url: "{{ route('checkprice') }}",
		  		type:'GET',
		  		data: {
                  product_id:product_id,
                   productsize_id:productsize_id, 
                },
		  		success: function(data){  
		  			console.log(data);
                      if(data.error==0) {  
                        $('#datepicker').show();
                        $('#newdate').hide(); 
                        $('#flag').val(0);
                      } else { 
                        $('#datepicker').hide();   
                        $('#newdate').show();   
                        $('#newdate').val(data.success);
                        $('#flag').val(1);
				   
                      }  
                  } 
		});
  $("select").change(function(){
   var productsize_id = $(this).children("option:selected").val();
   var product_id=$(this).children("option:selected").attr('data-id');
		$('#productsize_id').val(productsize_id);
    $.ajax({
		  		url: "{{ route('checkprice') }}",
		  		type:'GET',
		  		data: {
                  product_id:product_id,
                   productsize_id:productsize_id, 
                },
		  		success: function(data){  
		  			console.log(data);
                      if(data.error==0) {  
                        $('#datepicker').show();
                        $('#newdate').hide(); 
                        $('#flag').val(0);
                      } else { 
                        $('#datepicker').hide();   
                        $('#newdate').show();   
                        $('#newdate').val(data.success);
                        $('#flag').val(1);
				   
                      }  
                  } 
		});
});

$('#productPriceForm').validate({ 
  errorPlacement: $.datepicker.errorPlacement, 
    rules: {
        date_from: {
            required: true,
            date: true
        },
        date_to: {
            required: true,
            date: true
        },
        price: {
          required: true,
          number: true
        },
        size: {
          required: true
        }
    },
    messages: {
      price: "Enter an valid price"
    },
    errorPlacement: function (error, element) { 
      element.css('border-color', 'red'); 
      error.css('color', 'red');
      error.insertAfter(element); 
    }, 
    highlight: function(element) {
        $(element).css('border-color', 'red');
    },
    unhighlight: function(element) {
        $(element).css('border-color', '#007bff');
    }
});

});

</script>
@endsection