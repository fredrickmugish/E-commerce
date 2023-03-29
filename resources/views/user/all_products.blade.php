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
      <title>Ecommerce</title>
      <!-- bootstrap core css -->
      <link rel="stylesheet" type="text/css" href="user/css/bootstrap.css" />
      <!-- font awesome style -->
      <link href="user/css/font-awesome.min.css" rel="stylesheet" />
      <!-- Custom styles for this template -->
      <link href="user/css/style.css" rel="stylesheet" />
      <!-- responsive style -->
      <link href="user/css/responsive.css" rel="stylesheet" />
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" 
      integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" 
      crossorigin="anonymous" referrerpolicy="no-referrer"></script>
   </head>
   <body>
      <div class="hero_area">
         <!-- header section strats -->
         @include('user.header')
         <!-- end header section -->
         <!-- slider section -->
       
         <!-- end slider section -->
    
      <!-- why section -->
     
      <!-- product section -->
     @include('user.products')
      <!-- end product section -->

      <!-------comment and reply system starts here--------->
      <!---
<div style="text-align: center; padding-bottom:30px">
<h1 style="text-align: center; padding-top:20px; 
padding-bottom:20px; font-size:30px">comments</h1>
<form>
   <textarea style="height:150px; width:600px" placeholder="comment something here"></textarea>
   <br>
    <a href="" class="btn btn-primary">comment</a>
</form>
</div>

<div style="padding-left: 20%">
   <h1 style="padding-bottom: 20px; font-size:20px">All comments</h1>

   <div>
      <b>Fredrick</b>
      <p>This is my first comment</p>
      <a href="javascript::void(0)">Reply</a>
   </div>


   <div>
      <b>Mugisha</b>
      <p>This is my second comment</p>
      <a href="javascript::void(0)" onclick="reply(this)">Reply</a>
   </div>

   <div>
      <b>Gotfried</b>
      <p>This is my third comment</p>
      <a href="javascript::void(0)" onclick="reply(this)">Reply</a>
   </div>

   <div style="display:none" class="replyDiv">
      <textarea  style="height:100px; width:500px" placeholder="write something here"></textarea>
      <br>
      <a href="" class="btn btn-primary" onclick="reply(this)">Reply</a>
   </div>
</div>


      <------comment and reply system ends here------->

   
      <!-- subscribe section -->
     
      <div class="cpy_">
         <p>© 2023 All Rights Reserved, By Fredrick Mugisha </p>
      </div>
      
      <script type="text/javascript">
      function reply(caller)
      {
        $(.replyDiv).insertAfter($(caller));
        $(.replyDiv).show();
      }
      </script>
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