
<x-app-layout>

</x-app-layout>


<!DOCTYPE html>
<html lang="en">
  <head>
<style>

label{
    display: inline-block;
    width: 100px;
}
</style>

   @include('admin.css')
  </head>
  <body>
    <div class="container-scroller">
     @include('admin.navbar')
      
     <div style="position: relative; top:20px; right:-100px">

        @if (session()->has('message'))
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert"></button>
     {{ session()->get('message') }}
        </div>  
        @endif

        <form action="{{ url('/uploadproduct') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div style="padding: 10px">
                <label>Product Title</label>
                <input style="color:black" type="text" name="title" placeholder="Enter product title" required>
            </div>

            <div style="padding: 10px">
                <label>Product description</label>
                <input style="color:black" type="text" name="description" placeholder="Enter product description" required>
            </div>

            <div style="padding: 10px">
                <label>Product category</label>
                <select style="color:black"  name="category">
                    <option>--select category--</option>

                    @foreach ($category as $category)
                    <option>{{ $category->category_name }}</option>
                    @endforeach
                    
                </select>
            </div>

            <div style="padding: 10px">
                <label>quantity</label>
                <input style="color:black" type="number" name="quantity" placeholder="Enter product quantity" required>
            </div>

            <div style="padding: 10px">
                <label>price</label>
                <input style="color:black" type="number" name="price" placeholder="Enter product price" required>
            </div>

            <div style="padding: 10px">
                <label>Discount Price</label>
                <input style="color:black" type="number" name="discountprice" placeholder="Enter discount price">
            </div>

            <div style="padding: 10px">
                <label>Image</label>
                <input type="file" name="image" required>
            </div>


            <div style="padding: 10px">
                <input type="submit" value="Add product" class="btn btn-success" required>
            </div>


        </form>
     </div>
     
   
   
    </div>
    @include('admin.scripts')
  </body>
</html>