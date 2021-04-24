@extends('admin.layout')
@section('title', 'Order-Status')
@section('heading', 'Order-Status')
@section('content')

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
            <!--category-->
            <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Order Confirmation</h3>
                  <a href="{{route('order.show')}}"><button class="btn btn-success float-right">Back</button></a>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
              <!-- alert message div end -->
                <form method="POST" action="{{route('update.status',['id'=>encrypt($order->order_id)])}}">
                  @csrf
                  <div class="card-body">
                    <div class="form-group">
                      <label>Order Status</label>
                      <select class="form-control" name="status">
                        @if($order->status == 0)
                        <option value="{{$order->status}}" selected>Order Delevered</option>
                        <option value="2">Order Confirmed</option>
                        @elseif($order->status == 2)
                          <option value="{{$order->status}}" selected>Order Confirmed</option>
                          <option value="0">Order Delevered</option>
                        @else
                          <option value="{{$order->status}}" selected>Order Placed</option>
                          <option value="2">Order Confirmed</option>
                          <option value="0">Order Delevered</option>
                        @endif
                      </select>
                    </div>
                  </div>
                  <!-- /.card-body -->
                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
                </form>
            </div>
            <!--end category-->
        </div>

      </div>
    </div>
  </section>
  <!-- /.content -->
@endsection