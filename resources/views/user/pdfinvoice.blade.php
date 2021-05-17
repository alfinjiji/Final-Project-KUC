<html>
    <head>
        <style>
            .tw{
                width: 250px;
            }
            .ta{
                padding-left: 100px;
            }
            div{
                padding: 15px;
            }
            .date{
                text-align: right;
               
            }
            input{
                display: inline;
                border: none;
                background: none;
                font-size: 15px;
                font-style: italic;
                font-family: math;
                color: blue;
            }
            button{
                margin-left: 1050px;
                background-color: skyblue;
                border: none;
                border-radius: 7px;
            }
            
        </style>
        <style media="print">
            @page {
             size: auto;
             margin: 0;
                  }
           </style>
         <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script>
            $(document).ready(function() {
            $('#print').click(function(){
                $('#pdf').hide();
                $('#print').hide();
              window.print();
              $('#print').show();
              $('#pdf').show();
            });
            });
          </script>
    </head>
<body>
   
<div style="text-align: center">
    <div class="date">Invoice date: {{date('d-m-Y', strtotime($order->delivered_at))}}
       
    </div>
<table>
    <tr>
        <td> 
            <div class="tw"> 
                <img  src="{{ asset('public/user-templates/images/logo.png') }}" alt="">
            </div>
        </td>
        <td>
            <div class="tw" >
                <b><h4 style="display: inline;">Tax invoice/Bill of supply</h4></b>
            </div>
        </td>
    </tr>
    <tr>
        <td>
            <div >
                <h4><b>Sold By</b></h4>
                <address>
                  <strong>Admin</strong><br>
                  795 Folsom Ave, Suite 600<br>
                  San Francisco, CA 94107<br>
                  Phone: (804) 123-5432<br>
                  Email: info@almasaeedstudio.com
                </address>
              </div>
        </td>
        <td>
            <div class="ta">
                <h4><b>  Billing Address</b></h4>
                <address>
                  <strong>{{$customeraddress->name}}</strong><br>
                  {{$customeraddress->house_name}},&nbsp;{{$customeraddress->area}}<br>
                  {{$customeraddress->city}},&nbsp;{{$customeraddress->state}}<br>
                  Pin Code: {{$customeraddress->pincode}}<br>
                  Phone: {{$customeraddress->mobile}}<br>
                  Email: {{$customer->email}}
                </address>
              </div>
        </td>
    </tr>
    <tr>
        <td>
            <div>
                <b>Order ID:</b> #ID00{{$order->order_id}}<br>
                <b>Order Date:</b>  {{date('d-m-Y', strtotime($order->delivered_at))}}<br>
              </div>
        </td>
        <td>
            <div class="ta">
               <h4><b> Shipping Address</b></h3>
                <address>
                    <strong>{{$customeraddress->name}}</strong><br>
                    {{$customeraddress->house_name}},&nbsp;{{$customeraddress->area}}<br>
                    {{$customeraddress->city}},&nbsp;{{$customeraddress->state}}<br>
                    Pin Code: {{$customeraddress->pincode}}<br>
                    Phone: {{$customeraddress->mobile}}<br>
                    Email: {{$customer->email}}
                  </address>
              </div>
        </td>
    </tr>
    <tr >
        <td colspan="2">
        <div>
            <table style="width: -webkit-fill-available;">
                <tr style="background-color: whitesmoke;"> 
                 <th>
                     <div>
                         Sl
                     </div>
                     </th>
                 <th>
                     <div>
                         Product Name
                     </div>
                    </th>
                 <th>
                     <div>
                         Size
                     </div>
                    </th>
                 <th>
                     <div>
                         Unit price
                     </div>
                    </th>
                 <th>
                     <div>
                     Qty
                     </div>
                    </th>
                 <th>
                     <div> 
                         Amount
                     </div>
                    </th>
                </tr>
                <tr >
                    <td rowspan="2">
                        <div style="text-align: center">
                            1
                        </div>
                        </td>
                    <td>
                        <div>
                            {{$orderline->product->product_name}}
                        </div>
                    </td>
                    <td>
                        <div style="text-align: center">
                            {{$orderline->productsize->size->size}}
                        </div>
                    </td>
                    <td>
                        <div style="text-align: center">
                            {{$orderline->unit_price}}
                        </div>
                    </td>
                    <td>
                        <div style="text-align: center">
                            {{$orderline->quantity}}
                        </div>
                    </td>
                    <td>
                        <div style="text-align: center">
                            {{$orderline->sum}}
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div>
                            Shipping Charge
                        </div>
                    </td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>
                        <div style="text-align: center">
                            0
                        </div>
                    </td>
                </tr>
                <tr style="background-color: whitesmoke;">
                     <td colspan="5">
                         <div style="text-align: center">
                            <h3><b><i> Total</i></b></h3>
                            </div>
                        </td>
                     <td>
                         <div style="text-align: center">
                            {{$orderline->sum}}
                         </div>
                    </td>
                </tr>
            </table>
        </div>
        </td>
    </tr>
</table>
</div>

</body>
</html>