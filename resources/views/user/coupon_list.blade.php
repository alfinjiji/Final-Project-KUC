@extends('user.layout')
@section('content')

<!-- PAGE-TITLE-AREA -->
<section class="page-title-area">
    <div class="page-title-overlay">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="page-title">
                        <h3>My Coupon</h3>
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
                    <h3>Coupon</h3>
                </div>
                <ol class="breadcrumb">
                    <li><a href="index.html">Home</a>
                    </li>
                    <li><a href="about-us.html">My Coupon</a>
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
                    <h2>Available Coupon</h2>
                </div>
                @foreach($coupons as $coupon)
                <div class="panel panel-default" style="background-color:#daddde">
                    <div class="panel-body">
                      <table class="table">
                          <tr class="text-center">
                              <td style="border: none;"></td>
                            <td class="text-left" style="border: none;">
                                <h4>{{ $coupon->name }}</h4>
                                @if ($coupon->type == 1)
                                    <p>{{$coupon->type_value}} % off</p>
                                @else
                                    <p>flat {{$coupon->type_value}} off</p>
                                @endif
                            </td>
                            <td class="text-center" style="border: none;">
                                <h4>Coupon Code</h4>
                                <p>{{$coupon->code}}</p>
                            </td>
                            <td class="text-right" style="border: none;">
                                <p>Valid till: {{$coupon->date_to}}</p>
                            </td>
                            <td style="border: none;"></td>
                          </tr>
                      </table>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

@endsection