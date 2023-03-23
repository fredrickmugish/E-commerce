
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
      
     <div style="position: relative; top:60px; right:-10px">
        <table>
            <tr>
                <th>Product Title</th>
                <th>Product Description</th>
                <th>Product Category</th>
                <th>Product Quantity</th>
                <th>Product Price</th>
                <th>Discount Price</th>
                <th>Product Image</th>
                 <th>Action</th>
                 <th>Action</th>
            </tr>

            @foreach ($product as $product)
            <tr>
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