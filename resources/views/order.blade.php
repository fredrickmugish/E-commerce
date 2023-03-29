<!DOCTYPE html>
<html>
   <head>
      <!-- Basic -->
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <!-- Mobile Metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <!-- Site Metas -->
      <meta name="keywords" content="" />
      <meta name="description" content="" />
      <meta name="author" content="" />
      <link rel="shortcut icon" href="images/favicon.png" type="">
      <title>Famms - Fashion HTML Template</title>
      <!-- bootstrap core css -->
      <link rel="stylesheet" type="text/css" href="user/css/bootstrap.css" />
      <!-- font awesome style -->
      <link href="user/css/font-awesome.min.css" rel="stylesheet" />
      <!-- Custom styles for this template -->
      <link href="user/css/style.css" rel="stylesheet" />
      <!-- responsive style -->
      <link href="user/css/responsive.css" rel="stylesheet" />
<style>
    table,th,td
    {
        border: 1px solid grey;
    }

    .total_deg
    {
       font-size: 20px;
       padding: 10px;
    }
</style>


   </head>
   <body>
      <div class="hero_area">
         <!-- header section strats -->
         @include('user.header')
         <!-- end header section -->

     @if (session()->has('message'))
     <div class="alert alert-success">
<button type="button" class="close" data-dismiss="alert"></button>
        {{ session()->get('message') }}
     </div>  
     @endif

<div style="position: relative; top:60px; right:-200px">

<table>
    <tr style="background-color:skyblue">
        <th style="padding: 30px">Product Name</th>
        <th style="padding: 30px">Quantity</th>
        <th style="padding: 30px">Price</th>
        <th style="padding: 30px">payment status</th>
        <th style="padding: 30px">Delivery status</th>
        <th style="padding: 30px">Image</th>
        <th style="padding: 30px">Cancel order</th>
    </tr>
@foreach ($order as $order)
<tr align="center">
    <td>{{ $order->product_title }}</td>
    <td>{{ $order->quantity }}</td>
    <td>${{ $order->price }}</td>
    <td>{{ $order->payment_status }}</td>
    <td>{{ $order->delivery_status}}</td>
    <td><img height="100" width="100" src="productimage/{{ $order->image }}"</td>
    <td>
        @if ($order->delivery_status=='processing')
        <a href="{{ url('/cancel_order', $order->id) }}" class="btn btn-danger"
            onclick="return confirm('Are you sure to cancel the order!!?')">Cancel order</a>
            @else
            <p>Not allowed</p>
        @endif
    </td>  
</tr>
@endforeach
    
</table>






      </div>
    </div>
     @include('user.footer')
      <!-- footer end -->
      <div class="cpy_">
         <p>© 2023 All Rights Reserved, By Fredrick Mugisha </p>
      </div>
      <!-- jQery -->
      <script src="user/js/jquery-3.4.1.min.js"></script>
      <!-- popper js -->
      <script src="user/js/popper.min.js"></script>
      <!-- bootstrap js -->
      <script src="user/js/bootstrap.js"></script>
      <!-- custom js -->
      <script src="user/js/custom.js"></script>
   </body>
</html>