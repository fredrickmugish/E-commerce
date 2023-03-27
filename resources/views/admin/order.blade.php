
<x-app-layout>

</x-app-layout>


<!DOCTYPE html>
<html lang="en">
  <head>
   @include('admin.css')

<style>
    th, td{
        border: 1px solid white;
    }
</style>

  </head>
  <body>
    <div class="container-scroller">
     @include('admin.navbar')
      
     <div style="position: relative; top:60px; ">
        <h1>All orders</h1><table>
            <tr>
        <th style="padding: 10px">Name</th>
        <th style="padding: 10px">Email</th>
        <th style="padding: 10px">Phone</th>
        <th style="padding: 10px">Address</th>
        <th style="padding: 10px">Product</th>
        <th style="padding: 10px">Quantity</th>
        <th style="padding: 10px">Price</th>
        <th style="padding: 10px">Image</th>
        <th style="padding: 10px">Payment status</th>
        <th style="padding: 10px">Delivery status</th>
        <th style="padding: 10px">Action</th>
        <th style="padding: 10px">Action</th>
            </tr>

            @foreach ($order as $order)
            <tr >
                <td>{{ $order->name }}</td>
                <td>{{ $order->email }}</td>
                <td>{{ $order->phone }}</td>
                <td>{{ $order->address }}</td>
                <td>{{ $order->product_title }}</td>
                <td>{{ $order->quantity }}</td>
                <td>{{ $order->price }}</td>
                <td><img height="" width="" src="productimage/{{ $order->image }}"></td>
                <td>{{ $order->payment_status}}</td>
                <td>{{ $order->delivery_status }}</td>
                <td>wfehnuym</td>
                <td>wfehnuym</td>
                   </tr>
       
            @endforeach
         

    </table>
    </div>
   
   
    </div>
    @include('admin.scripts')
  </body>
</html>