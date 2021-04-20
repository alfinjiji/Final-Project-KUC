@extends('user.layout')
@section('content')

    <!-- PAGE-TITLE-AREA -->
    <section class="page-title-area">
        <div class="page-title-overlay">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="page-title">
                            <h3>My Address</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- PAGE-TITLE-AREA:END -->
	
    <!-- BREADCRUMBS -->
    <div class="title-breadcrumb">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="bred-title">
                        <h3>My Address</h3>
                    </div>
                    <ol class="breadcrumb">
                        <li><a href="index.html">Home</a>
                        </li>
                        <li><a href="about-us.html">My address</a>
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- BREADCRUMBS:END -->
	
    <!-- PERSONAL-DETAIL-AREA -->
    <section class="pessonal-detail section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-12 col-xs-12">
                    <div class="headline">
						<h2>Add a New Address</h2>
					</div>
                    @if(session()->has('message'))
                        <div class="alert alert-success alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            {{ session()->get('message') }}
                        </div>
                    @endif
                    <div class="personal-form">
                        <div class="userright" style="margin-top: 0px;">
                            <form  id="addressForm" method="POST" action="{{route('add.address')}}">
                                @csrf
                                Name
                                <br>
                                <input class="no-focus" type="text" id="name" name="name" placeholder="Name (Required)*">
                                <br>Mobile
                                <br>
                                <input class="no-focus" type="text" id="mobile" name="mobile" placeholder="10 digit mobile number (Required)*">
                                <br>Building Name
                                <br>
                                <input class="no-focus" type="text" id="housename" name="housename" placeholder="House No., Building Name (Required)*">
                                <br> Area
                                <br>
                                <input class="no-focus" type="text" id="area" name="area" placeholder="Road name, Area, Colony (Required)*">
                                <br> City
                                <br>
                                <input class="no-focus" type="text" id="city" name="city" placeholder="City (Required)*">
                                <br> State
                                <br>
                                <input class="no-focus" type="text" id="state" name="state" placeholder="State (Required)*">
                                <br> Pincode
                                <br>
                                <input class="no-focus" type="number" id="pincode" name="pincode" placeholder="Pincode (Required)*">
                                <br> Landmark
                                <br>
                                <input class="no-focus" type="text" id="landmark" name="landmark" placeholder="Landmark (Optional)">
                                <br>
                                <br>
                                <button type="submit" class="btn btn-warning btn-default">Save Address</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <!-- col-md-6 -->
                    <div class="headline">
						<h2>Your Address</h2>
					</div>
                    @if(session()->has('message2'))
                        <div class="alert alert-success alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            {{ session()->get('message2') }}
                        </div>
                    @endif
                    @foreach($addresses as $address)
                        <div class="panel panel-warning">
                            <div class="panel-heading">
                                {{$address->name}} 
                                <a href="{{ route('delete.address',['id'=>encrypt($address->customer_address_id)]) }}" class="float-right" style="padding-left: 5%; color: red;">X</a>
                                <p class="float-right">{{$address->mobile}}</p></div>
                            <div class="panel-body">
                              <p>
                                  {{$address->house_name}}, {{$address->area}}, {{$address->city}}, {{$address->state}},
                                  -<b>{{$address->pincode}}</b> 
                              </p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!-- PERSONAL-DETAIL-AREA:END   -->
	
	@endsection
    
    @section('custom_script')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js" integrity="sha512-UdIMMlVx0HEynClOIFSyOrPggomfhBKJE28LKl8yR3ghkgugPnG6iLfRfHwushZl1MOPSY6TsuBDGPK2X4zYKg==" crossorigin="anonymous"></script>
        <script>
            $('#addressForm').validate({ 
                rules: {
                    name: {
                        required: true
                    },
                    mobile: {
                        required: true
                    },
                    housename: {
                        required: true
                    },
                    area: {
                        required: true
                    },
                    city: {
                        required: true
                    },
                    state: {
                        required: true
                    },
                    pincode: {
                        required: true
                    }
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
        </script>
    @endsection