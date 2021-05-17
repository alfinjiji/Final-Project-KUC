<html>
    <head>
    </head>
<body style="margin-left: 85px;margin-right: 200px;margin-top: 20px;">
    <div>
   <h3 style="color: chocolate;"> Hello {{$details['first_name']}} </h3>
   <br>
    We thought you'd like to know that we've dispatched your item(s). Your order is on the way. If you need to return an item from this shipment or manage other orders, please visit <a href="{{$details['url']}}">Your Orders </a>.
    </div>
    <br>
    <div class="panel panel-default" style="background-color: #fbfbfb">
        <div class="panel-body">
            <div class="col-md-12 rounded">
                <!-- title row -->
                <div class="row">
                  <div class="col-md-12 pb-3">
                   
                  </div>
                  <!-- /.col -->
                </div>
                <!-- info row -->
                <!-- Table row -->
                <div class="row">
                  <div class="col-12 table-responsive">
                    <table class="table table-striped">
                      <thead>
                      <tr>
                        <th>No:</th>
                        <th>Image</th>
                        <th>Product</th>
                        <th>Size</th>
                        <th>Qty</th>
                        <th>Unit Price</th>
                        <th>Subtotal</th>
                      
                      </tr>
                      </thead>
                      <tbody>
                          @foreach($order_lines as $orderline)
                          <tr>
                            <td>{{$loop->iteration}}</td>
                            <td><img style="height: 75px; width:100px;" src="http://localhost/Final-Project-KUC//storage/app/"{{$orderline->product->productimage->image}}></td>
                            <td>{{$orderline->product->product_name}}</td>
                            <td>{{$orderline->productsize->size->size}}</td>
                            <td>{{$orderline->quantity}}</td>
                            <td>{{$orderline->unit_price}}</td>
                            <td>{{$orderline->sum}}</td>
                          </tr>
                          @endforeach
                       </tbody>
                    </table>
                  </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->
      
                <div class="row">
                  <!-- /.col -->
                <div class="col-md-8 float-left">
                    <h4>Delevered Address</h4>
                    <p>{{ $details['first_name']}}&nbsp;{{ $details['last_name']}}</p>
                    <p>{{$details['addressline1']}}</p>
                    <p>{{$details['addressline2']}}</p>
                    <p>{{$details['addressline3']}}</p>
                </div>
                  <div class="col-md-4">
                    <p class="lead"> </p>
      
                    <div class="table-responsive">
                      <table class="table">
                        <tbody>
                         
                          <tr>
                          <th style="width:50%">Subtotal:</th>
                          <td>{{number_format( $details['subtotal'])}}</td>
                        </tr>
                        <tr>
                          <th>Discount</th>
                          <td>{{ number_format($details['discount'])}}</td>
                        </tr>
                        <tr>
                          <th>Total:</th>
                          <td>{{number_format( $details['total'])}}</td>
                        </tr>
                       
                      </tbody></table>
                    </div>
                  </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->
              </div>
        </div>
    </div>
    <br>
    We hope to see you again soon!
</body>
</html>