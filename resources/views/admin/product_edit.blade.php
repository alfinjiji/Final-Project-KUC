@extends('admin.layout')
@section('title', 'Products')
@section('heading', 'Products')
@section('content')

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-primary">
            <!-- form start -->
            <form>
              <div class="card-body">
                  <div class="form-group">
                    <label>Product Name</label>
                    <input type="text" class="form-control"  placeholder="Enter Product Name">
                  </div>
                  <div class="form-group">
                      <label>Product Description</label>
                      <textarea class="form-control" rows="3" placeholder="Enter Description"></textarea>
                    </div>
                  <div class="form-group">
                      <label>Size</label>
                      <input type="text" class="form-control"  placeholder="Enter Size">
                  </div>
                  <div class="form-group">
                      <label>Colour</label>
                      <input type="text" class="form-control"  placeholder="Enter Colour">
                  </div>
                  <div class="form-group">
                    <label>Material</label>
                    <select class="form-control">
                      <option>--select material</option>
                      <option></option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Image</label>
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" id="customFile">
                      <label class="custom-file-label" for="customFile">Choose file</label>
                    </div>
                </div>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <button type="submit" class="btn btn-info">Submit</button>
              </div>
            </form>
        </div>
        </div>
      </div>
    </div>
  </section>
  <!-- /.content -->
@endsection