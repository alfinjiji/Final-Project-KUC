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
                      <label>From Date</label>
                      @if($count==0)
                      <input type="text" placeholder="yyyy-mm-dd" class="form-control" name="date_from"  id="datepicker" autocomplete="off">
                      @else 
                      <input type="text" placeholder="yyyy-mm-dd" class="form-control" name="date_from" readonly="true" id="datepicker2" value="{{$pricelist->date_to}}"  >
                     
                      @endif
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