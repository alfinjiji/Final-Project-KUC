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
                <div class="col-md-6 col-sm-12 col-xs-12">
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
            </div>
        </div>
    </section>
    <!-- PERSONAL-DETAIL-AREA:END   -->
	
	@endsection

    @section('custom_script')
        <script>
            $(document).ready(function () {
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
            });
        </script>
    @endsection