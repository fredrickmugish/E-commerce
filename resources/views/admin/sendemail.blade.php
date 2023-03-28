
<x-app-layout>

</x-app-layout>


<!DOCTYPE html>
<html lang="en">
  <head>
    <style type="text/css">
        label{
            display: inline;
            width: 100px;
        }
    </style>
       
    <base href="/public">
   @include('admin.css')

  </head>
  <body>
    <div class="container-scroller">
     @include('admin.navbar')
      
     <div style="position: relative; top:60px; right:-100px">
   <h1>Send Email To {{ $order->email }}</h1>
   
   @if (session()->has('message'))
   <div class="alert alert-success">
    <button type="button" class="close" data-dismiss="alert"></button>
     {{ session()->get('message')}}
   </div>
   @endif

   <form  action="{{ url('/send_user_email', $order->id) }}" method="post" enctype="multipart/form-data">
      @csrf
    <div style="padding:10px">
        <lable>Email Greeting</lable>
        <input  style="color:blue" type="text" name="greeting">
     </div>

     <div style="padding: 10px">
        <label>Body</label>
        <input style="color:blue" type="text" name="body" required>
    </div>

    <div style="padding: 10px">
        <label>Action Text</label>
        <input style="color:blue" type="text" name="actiontext"  required>
    </div>

    <div style="padding: 10px">
        <label>Action Url</label>
        <input style="color:blue" type="text" name="actionurl" >
    </div>

    <div style="padding: 10px">
        <label>Endpart</label>
        <input style="color:blue"  type="text" name="endpart" required>
    </div>

   <div style="padding: 10px">
        <input class="btn btn-success" type="submit" value="send" required>
    </div>

   </form>
     </div>




    </div>
    @include('admin.scripts')
  </body>
</html>