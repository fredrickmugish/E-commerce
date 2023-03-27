
<x-app-layout>

</x-app-layout>


<!DOCTYPE html>
<html lang="en">
  <head>
   @include('admin.css')

   <style>
    th,td{
        border: 1px solid grey;
    }
</style>


  </head>
  <body>
    <div class="container-scroller">
     @include('admin.navbar')
      
     <div style="position: relative; top:100px; right:-200px">

        @if (session()->has('message'))
            <div class="alert alert-success">
<button type="button" class="close" data-dismiss="alert"></button>
         {{ session()->get('message') }}
            </div>
        @endif
        <h1>Categories</h1>
<form action="{{ url('/category') }}" method="post" enctype="multipart/form-data">
    @csrf
<input type="text" name="category" placeholder="Write Category name" style="color: black" required>
<input type="submit" value="Add Category" class="btn btn-primary">
</form>

<div style="padding: 30px">
    <table bgcolor="black">
        <tr>
            <th style="padding: 30px">Category Name</th>
            <th style="padding: 30px">Action</th>
        </tr>

        @foreach ($category as $category)
        <tr align="center">
            <td>{{ $category->category_name }}</td>
            <td><a  onclick="return confirm('Are you sure to delete this?')" href="{{ url('deletecategory', $category->id) }}" class="btn btn-danger">Delete</a></td>
        </tr>
        @endforeach
    </table>
</div>
     </div>
     
   
   
    </div>
    @include('admin.scripts')
  </body>
</html>