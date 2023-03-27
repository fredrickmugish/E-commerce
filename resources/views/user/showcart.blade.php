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
    <tr>
        <th style="padding: 30px">Product Title</th>
        <th style="padding: 30px">Price</th>
        <th style="padding: 30px">Quantity</th>
        <th style="padding: 30px">Image</th>
        <th style="padding: 30px">Action</th>
    </tr>
<?php $totalprice=0; ?>
    @foreach ($cart as $cart)
    <tr align="center">
        <td>{{ $cart->product_title }}</td>
        <td>${{ $cart->price }}</td>
        <td>{{ $cart->quantity }}</td>
        <td><img height="100" width="100" src="/productimage/{{ $cart->image }}"></td>
        <td><a href="{{ url('/deletecart', $cart->id) }}" class="btn btn-danger"
            onclick="return confirm('Are you sure to delete this?')">Remove</a></td>
    </tr>
    <?php $totalprice = $totalprice + $cart->price ?>
    @endforeach
    
</table>
<div>
    <h1 class="total_deg">Total price : ${{ $totalprice }}</h1>
</div>

<!---Making payments-->
<div>
    <h1 style="font-size: 25px; padding-bottom:15px">Proceed to order</h1>
<a href="{{ url('/cashorder') }}" class="btn btn-danger">Cash on Delivery</a>
    <a href=" " class="btn btn-danger">Card Payment</a>

</div>






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