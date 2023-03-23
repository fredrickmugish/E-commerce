<!DOCTYPE html>
<html>
   <head>
      <!-- Basic -->
      <base href="/public">
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
        


         <div class="col-sm-6 col-md-4 col-lg-4" style="margin: auto; width:50%">
            <div class="box">
               <div class="img-box">
                  <img height="300" width="300" src="/productimage/{{ $product->image }}" alt="">
               </div>
               <div class="detail-box">
                  <h5>
                     {{ $product->title }}
                  </h5>

                  @if($product->discount_price!=null)

                  <h6 style="color: red">
                     Discount
                     <br>
                    ${{ $product->discount_price }}
                  </h6>


                  <h6 style="text-decoration:line-through; color:blue">
                     Price
                     <br>
                     ${{ $product->price }}
                  </h6>

                @else
                <h6 style="color: blue">
                  Price
                  <br>
                  ${{ $product->price }}
               </h6>
                  @endif

                  <h6>Product Category  :  {{ $product->category }}</h6>
                  <h6>Product Description  :  {{ $product->description }}</h6>
                  <h6>Quantity Available :  {{ $product->quantity }}</h6>
                  <a href="" class="btn btn-primary">Add to Cart</a>

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