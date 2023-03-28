
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
        <h1 align="center">All orders</h1>
        <div style="padding-left: 400px; padding-bottom:30px">
            <form action="{{ url('/search') }}" method="get" enctype="multipart/form-data">
                @csrf
                <input style="color:blue" type="text" name="search" placeholder="search for something">
                <input  type="submit" value="search" class="btn btn-primary">
            </form>
        </div>
        
        <table>
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
        <th style="padding: 10px">Status</th>
        <th style="padding: 10px">Print PDF</th>
        <th style="padding: 10px">Send Email</th>
            </tr>

            @foreach ($order as $order)
            <tr align="center" >
                <td>{{ $order->name }}</td>
                <td>{{ $order->email }}</td>
                <td>{{ $order->phone }}</td>
                <td>{{ $order->address }}</td>
                <td>{{ $order->product_title }}</td>
                <td>{{ $order->quantity }}</td>
                <td>${{ $order->price }}</td>
                <td><img height="100" width="100" src="productimage/{{ $order->image }}"></td>
                <td>{{ $order->payment_status}}</td>
                <td>{{ $order->delivery_status }}</td>
            <td>
                @if ($order->delivery_status =="processing")
            <a href="{{ url('/delivered', $order->id) }}" class="btn btn-primary"
                 onclick="return confirm('Are you sure the product is delivered to customer?!!!')">Delivered</a>
        
                @else
                <p style="color: green">Delivered</p>
                @endif
            </td>
            <td><a href="{{ url('/printpdf', $order->id) }}" class="btn btn-secondary">Print PDF</a></td>
            <td><a href="{{ url('/sendemail', $order->id) }}" class="btn btn-primary">Send Email</a></td>
                   </tr>
       
            @endforeach
         

    </table>
    </div>
    
   
   
    </div>
    @include('admin.scripts')
  </body>
</html>