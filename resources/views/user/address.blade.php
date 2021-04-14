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
						<h2>Your Address</h2>
					</div>
                    <div class="personal-form">
                        <div class="userright" style="margin-top: 0px;">
                            <form>
                                Building Name
                                <br>
                                <input type="text" placeholder="House No., Building Name (Required)*">
                                <br> Area
                                <br>
                                <input type="text" placeholder="Road name, Area, Colony (Required)*">
                                <br> City
                                <br>
                                <input type="text" placeholder="City (Required)*">
                                <br> State
                                <br>
                                <input type="text" placeholder="State (Required)*">
                                <br> Pincode
                                <br>
                                <input type="text" placeholder="Pincode (Required)*">
                                <br> Landmark
                                <br>
                                <input type="text" placeholder="Landmark">
                                <br>
                                <br>
                                <button type="button" class="btn btn-warning btn-default">Save Address</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <!-- col-md-6 -->
                </div>
            </div>
        </div>
    </section>
    <!-- PERSONAL-DETAIL-AREA:END   -->
	
	
	@endsection