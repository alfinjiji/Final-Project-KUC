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
				<div class="col-md-12 col-sm-12 col-xs-12">
					<div class="headline">
						<h2>Personal details</h2>
					</div>
                
                    <div class="personal-form">
                        <div class="userleft">
                            <form>
                                Username
                                <br>
                                <input type="text" placeholder="Anderson">
                                <br> Firstname
                                <br>
                                <input type="text" placeholder="Cory">
                                <br> Email
                                <br>
                                <input type="email" placeholder="Mail@YourDomain.Com">
                                <br> Address
                                <br>
                                <input type="text" placeholder="Street And House Number">
                                <br> State/Country
                                <br>
                                <input type="text" placeholder="Your Country">
                            </form>
                        </div>
                        <div class="userright">
                            <h5>Username cannot be changed</h5>
                            <form>
                                Lastname
                                <br>
                                <input type="text" placeholder="Anderson">
                                <br> Phone
                                <br>
                                <input type="text" placeholder="+91 123 456 78">
                                <br> ZIP Code
                                <br>
                                <input type="text" placeholder="Your City Name">
                                <br> State/Country
                                <br>
                                <input type="text" placeholder="0123 Australia">
                                <br>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- PERSONAL-DETAIL-AREA:END   -->
	
    <!-- CHANGE-PASSWORD-AREA   -->
    <section class="password-change">
        <div class="container">
            <div class="row">
				<div class="col-md-12 col-sm-12 col-xs-12">
                <div class="headline">
                    <h2>Change your password</h2>
                </div>
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="change-form">
                        <form>
                            Old Password
                            <br>
                            <input type="text">
                            <br> New Password
                            <br>
                            <input type="text">
                            <br> Repeat New Password
                            <br>
                            <input type="text">
                            <br>
                        </form>
                        <button type="button" class="btn btn-default">Save changes</button>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </section>
    <!-- CHANGE-PASSWORD-AREA:END -->
	
	@endsection