@extends('user.layout')
@section('content')

    <!-- PAGE-TITLE-AREA -->
    <section class="page-title-area">
        <div class="page-title-overlay">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="page-title">
                            <h3>My profile</h3>
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
                        <h3>My profile</h3>
                    </div>
                    <ol class="breadcrumb">
                        <li><a href="index.html">Home</a>
                        </li>
                        <li><a href="about-us.html">My profile</a>
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
                <!--btn for change password transction toggle view-->
                <div class="col-md-12" style="text-align: end;">
                    <button class="btn btn-success btn-focus" id="changePassBtn">Change Password</button>
                    <button class="btn btn-success btn-focus" id="viewWalletBtn">View Wallet Transaction</button>
                </div>
				<div class="col-md-6 col-sm-12 col-xs-12">
					<div class="headline">
						<h2>Personal details</h2>
					</div>
                    @if(session()->has('message'))
                        <div class="alert alert-success alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            {{ session()->get('message') }}
                        </div>
                    @endif
                    <div class=" change-form">
                        <form method="POST" action="{{route('update.profile',['id'=>encrypt(auth()->guard('customer')->user()->customer_id)])}}">
                            @csrf
                             Firstname
                            <br>
                            <input type="text" placeholder="First name" name="first_name" value="{{ auth()->guard('customer')->user()->first_name }}" autocomplete="off">
                            <br> Lastname
                            <br>
                            <input type="text" placeholder="Last name" name="last_name" value="{{ auth()->guard('customer')->user()->last_name }}" autocomplete="off">
                            <br> Mobile
                            <br>
                            <input type="text" placeholder="Mobile" name="mobile" value="{{ auth()->guard('customer')->user()->mobile }}" autocomplete="off">
                            <br> Email
                            <br>
                            <input type="email" placeholder="Email" name="email" value="{{ auth()->guard('customer')->user()->email }}" disabled>
                            <br> 
                            <button type="submit" class="btn btn-warning btn-default">Update Details</button>
                        </form>
                    </div>
                </div>
                <!--change password-->
                <div class="col-md-6 col-sm-12 col-xs-12" id="pass_change">
                    <div class="headline">
                        <h2>Change your password</h2>
                    </div>
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="change-form">
                            <form>
                                @csrf
                                Old Password
                                <br>
                                <input class="no-focus" type="password" id="old_password" name="password">
                                <br><span id="old_password_error"></span>
                                <br> New Password
                                <br>
                                <input class="no-focus" type="password" id="new_password" name="new_password">
                                <br><span id="new_password_error"></span>
                                <br> Repeat New Password
                                <br>
                                <input class="no-focus" type="password" id="confirm_password">
                                <br><span id="confirm_password_error"></span>
                                <br>
                                <button type="button" class="btn btn-warning btn-default" id="change_password">Save changes</button>
                            </form>
                        </div>
                    </div>
                </div>
                <!--wallet transaction-->
                <div class="col-md-6 col-sm-12 col-xs-12" id="wallet_tran">
                    <div class="headline">
                        <h2>Wallet Transaction</h2>
                    </div>
                    <div class="col-md-12 col-sm-12 col-xs-12" style='overflow-y:scroll; height:435px;'>
                        <div class="text-center" style="background-color: #eee; padding:5px; border-radius: 10px; margin-bottom:15px;">
                            <div class="row">
                                <div class="col-md-8">
                                    <p>Your Balance</p>
                                    <h4>${{auth()->guard('customer')->user()->wallet_amount}}</h4>
                                </div>
                                <div class="col-md-4" style="width: auto; padding-top:20px;">
                                    <button class="btn btn-success btn-sm btn-focus" data-toggle="modal" data-target="#exampleModalCenter">Top-up</button>
                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                      <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                          <div class="modal-header" style="background-color: #f89d18; border-radius:5px;">
                                            <h5 class="modal-title" style="color:white; font-size:20px;">Wallet Top-up</h5>
                                          </div>
                                          <div class="modal-body" style="background-color: #eee; color:black;">
                                            <form class="form-inline">
                                                @csrf
                                                <label style="color: black; padding-right:5px;">Amount</label>
                                                <input type="number" class="form-control" placeholder="Enter Amount" id="amount">
                                                <button type="button" class="btn btn-success" id="topup_btn">Top-up</button>
                                            </form>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @foreach ($wallets as $wallet)
                            @if($wallet->flag==0)
                                <div class="alert alert-success" role="alert">+ ${{$wallet->amount}}<span style="text-align: right; position: absolute; right: 90px;">{{$wallet->created_at->isoFormat('L')}}</span></div>
                            @else
                                <div class="alert alert-danger" role="alert">- ${{$wallet->amount}}<span style="text-align: right; position: absolute; right: 90px;">{{$wallet->created_at->isoFormat('L')}}</span></div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- PERSONAL-DETAIL-AREA:END   -->
	
	@endsection

    @section('custom_script')
    <script src = "https://checkout.razorpay.com/v1/checkout.js"></script>
        <script>
            $(document).ready(function () {
                $('#pass_change').hide();
                $('#viewWalletBtn').hide();
                //change password view
                $('#changePassBtn').click(function(){
                    $('#wallet_tran').hide();
                    $('#changePassBtn').hide();
                    $('#pass_change').show();
                    $('#viewWalletBtn').show();
                });
                //wallet transaction view
                $('#viewWalletBtn').click(function(){
                    $('#wallet_tran').show();
                    $('#changePassBtn').show();
                    $('#pass_change').hide();
                    $('#viewWalletBtn').hide();
                })
                // check old password validation
                $("#old_password").on("keypress keyup",function(){
                    var old_password = $("#old_password").val();
                    if(old_password.length < 8){
                        $('#old_password').css('border-color','red');
                        $('#old_password_error').css('color','red');
                        $('#old_password_error').html("min 8 character required*");
                    } else {
                        $('#old_password').css('border-color','green');
                        $('#old_password_error').html("");
                    }
                });
                // check new password validation
                $("#new_password").on("keypress keyup",function(){
                    var new_password = $("#new_password").val();
                    if(new_password.length < 8){
                        $('#new_password').css('border-color','red');
                        $('#new_password_error').css('color','red');
                        $('#new_password_error').html("min 8 character required*");
                    } else {
                        $('#new_password').css('border-color','green');
                        $('#new_password_error').html("");
                    }
                });
                // check confirm password validation
                $("#confirm_password").on("keypress keyup",function(){
                    var confirm_password = $("#confirm_password").val();
                    if(confirm_password.length < 8){
                        $('#confirm_password').css('border-color','red');
                        $('#confirm_password_error').css('color','red');
                        $('#confirm_password_error').html("min 8 character required*");
                    } else {
                        $('#confirm_password').css('border-color','green');
                        $('#confirm_password_error').html("");
                    }
                });
                // check passwword and confirm password
                $("#confirm_password").on("keypress keyup", function(){
                	var pswd=$("#new_password").val();
                	var cpswd=$("#confirm_password").val();
                	if(cpswd != pswd){
                		$("#confirm_password_error").css('color','red');
                     	$("#confirm_password_error").html("Password not match!!");
                        $("#confirm_password").css('border-color','red');
                	}
                	else{
                	 	$("#confirm_password").css('border-color','green');
                		$("#confirm_password_error").html(""); 
                	}
                });
                // ajax change password
		        $("#change_password").click(function(e){
		        	e.preventDefault();
		        	var _token = $("input[name='_token']").val();
		        	var old_password = $("#old_password").val();
		        	var new_password = $("#new_password").val();
                    var confirm_password=$("#confirm_password").val();
		        	if (old_password.length < 7 || new_password.length < 7 || confirm_password.length < 7){
                        if(old_password.length < 8){
                            $('#old_password').css('border-color','red');
                            $('#old_password_error').css('color','red');
                            $('#old_password_error').html("old password required*");
                        }
                        if(new_password.length == 0){
                            $('#new_password').css('border-color','red');
                            $('#new_password_error').css('color','red');
                            $('#new_password_error').html("new password required*");
                        }
                        if(confirm_password.length == 0){
                            $('#confirm_password').css('border-color','red');
                            $('#confirm_password_error').css('color','red');
                            $('#confirm_password_error').html("confirm password required*");
                        }
                    } else { 
		        	$.ajax({
		        		url: "{{ route('change.password') }}",
		        		type:'POST',
		        		data: {
                                _token:_token, 
                                new_password:new_password, 
                                old_password:old_password
                              },
		        		success: function(data){  
		        			console.log(data);
                            if(data.error==0) {  
                                $('#old_password_error').html("password not match"); 
                                $('#old_password').css('border-color','red'); 
                            } else {    
                                alert("password changed successfully! please login");
                                location.reload();  
                            }  
                        } 
		        	});
		           }
		        });
                // razorpay payment
                $('body').on('click','#topup_btn',function(e){
                    e.preventDefault();
                    var amount = $('#amount').val();
                    var total_amount = amount * 100;    
                    var name = {!! json_encode(auth()->guard('customer')->user()->first_name . " " . auth()->guard('customer')->user()->last_name) !!}; 
                    var email = {!! json_encode(auth()->guard('customer')->user()->email) !!}; 
                    var mobile = {!! json_encode(auth()->guard('customer')->user()->mobile) !!};
                    var options = {
                        "key": "{{ env('RAZOR_KEY') }}", // Enter the Key ID generated from the Dashboard
                        "amount": total_amount, // Amount is in currency subunits. Default currency is INR. Hence, 10 refers to 1000 paise
                        "currency": "INR",
                        "name": name.toUpperCase(),
                        "description": "",
                        "image": "",
                        "order_id": "", //This is a sample Order ID. Pass the `id` obtained in the response of Step 1
                        "handler": function (response){
                            $.ajaxSetup({
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                }
                            });
                            $.ajax({
                                type:'POST',
                                url:"{{ route('payment.topup') }}",
                                data:{razorpay_payment_id:response.razorpay_payment_id, amount:amount},
                                success:function(data){
                                    alert(data.success);
                                    location.reload();
                                }
                            });
                        },
                        "prefill": {
                            "name": name,
                            "email": email,
                            "contact": mobile
                        },
                        "theme": {
                            "color": "#528FF0"
                        }
                    };
                    var rzp1 = new Razorpay(options);
                    rzp1.open();
                });
            });
        </script>
    @endsection