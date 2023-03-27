
<x-app-layout>

</x-app-layout>


<!DOCTYPE html>
<html lang="en">
  <head>
   @include('admin.css')

<style>
   th,td
   {
       border: 1px solid grey;
   }
</style>
   
  </head>
  <body>
    <div class="container-scroller">
     @include('admin.navbar')
      
     <div style="position: relative; top:60px; right:-10px">
        <table>
            <tr>
                <th style="padding: 10px">Product Title</th>
                <th style="padding: 10px">Product Description</th>
                <th style="padding: 10px">Product Category</th>
                <th style="padding: 10px">Product Quantity</th>
                <th style="padding: 10px">Product Price</th>
                <th style="padding: 10px">Discount Price</th>
                <th style="padding: 10px">Product Image</th>
                 <th style="padding: 10px">Action</th>
                 <th style="padding: 10px">Action</th>
            </tr>

            @foreach ($product as $product)
            <tr align="center">
                <td>{{ $product->title }}</td>
                <td>{{ $product->description }}</td>
                <td>{{ $product->category }}</td>
                <td>{{ $product->quantity }}</td>
                <td>{{ $product->price }}</td>
                <td>{{ $product->discount_price }}</td>
                <td><img height="100" width="100" src="/productimage/{{ $product->image }}"</td>
                <td><a href="{{ url('/updateproducts', $product->id) }}" class="btn btn-primary">Update</a></td>
                <td><a href="{{ url('/deleteproduct', $product->id) }}" class="btn btn-primary">Delete</a></td>
            </tr>
            @endforeach
           

        </table>
     </div>
   
   
    </div>
    @include('admin.scripts')
  </body>
</html>