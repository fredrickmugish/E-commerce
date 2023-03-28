
<x-app-layout>

</x-app-layout>


<!DOCTYPE html>
<html lang="en">
  <head>
   @include('admin.css')
  </head>
  <body>
    <div class="container-scroller">
     @include('admin.navbar')
      @include('admin.dashboard')
     
   
   
    </div>
    @include('admin.scripts')
  </body>
</html>