@extends('user.layout')
@section('content')

<!-- PAGE-TITLE-AREA -->
<section class="page-title-area">
    <div class="page-title-overlay">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="page-title">
                        <h3>My Order</h3>
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
                    <h3>My Order</h3>
                </div>
                <ol class="breadcrumb">
                    <li><a href="index.html">Home</a>
                    </li>
                    <li><a href="about-us.html">My Order</a>
                    </li>
                </ol>
            </div>
        </div>
    </div>
</div>
<!-- BREADCRUMBS:END -->

<section class="pessonal-detail section-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="headline">
                    <h2>Orders</h2>
                </div>
                <div class="panel panel-default" style="background-color: #fbfbfb">
                    <div class="panel-body">
                      <table class="table">
                          <tr class="text-center">
                              <td style="border: none;"></td>
                            <td class="text-left" style="border: none;">
                                <h4>Delivery Address</h4>
                                <p>Name</p>
                                <p>address</p>
                                <p>city pin code</p>
                                <p>mobile</p>
                            </td>
                            <td class="text-left" style="border: none;">
                                <img src="{{ asset('public/user-templates/images/mc.png')}}" alt="">
                            </td>
                            <td class="text-left" style="border: none;">
                                <p>Product</p>
                                <p>Color : <span>White</span></p>
                                <p>Size : <span>XL</span></p>
                                <p>Qty : <span>1</span></p>
                            </td>
                            <td style="border: none;">
                                <p>$599</p>
                            </td>
                            <td style="border: none;">order status</td>
                          </tr>
                      </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection