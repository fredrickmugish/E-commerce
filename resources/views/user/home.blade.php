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
   </head>
   <body>
      <div class="hero_area">
         <!-- header section strats -->
         @include('user.header')
         <!-- end header section -->
         <!-- slider section -->
         @include('user.slider')
         <!-- end slider section -->
      </div>
      <!-- why section -->
      @include('user.whyshop')
      <!-- end why section -->
      
      <!-- arrival section -->
     @include('user.arrival')
      <!-- end arrival section -->
      
      <!-- product section -->
     @include('user.products')
      <!-- end product section -->

      <!-- subscribe section -->
      @include('user.subscribe')
      <!-- end subscribe section -->
      <!-- client section -->
      @include('user.testimonial')
      <!-- end client section -->
      <!-- footer start -->
     @include('user.footer')
      <!-- footer end -->
      <div class="cpy_">
         <p>© 2021 All Rights Reserved By <a href="https://html.design/">Free Html Templates</a></p>
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