<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\support\Facades\Auth;

use App\Models\Product;

use App\Models\Cart;

use App\Models\Order;

use App\Models\User;

use Stripe;

use Session;

class HomeController extends Controller
{

   public function index()
   {

    if(Auth::id())
    {
 
 return redirect('redirects');
 
    }
    else


    {
        $product = product::all();
        return view('homepage', compact('product'));
    }
    
    }


    public function redirects()
    {
        $usertype = Auth::user()->usertype;

        if($usertype == '1')
        {

            $total_product = product::all()->count();
            $total_order = order::all()->count();
            $total_user = user::all()->count();

            $order = order::all();
            $total_revenue = 0; 

            foreach($order as $order)
            {
                $total_revenue = $total_revenue + $order->price;
            }
            $total_delivered = order::where('delivery_status', '=', 'Delivered')->get()->count();
            $total_processing = order::where('delivery_status', '=', 'processing')->get()->count();
           return view('admin.adminhome', compact('total_product', 'total_order', 'total_user', 'total_revenue',
            'total_delivered', 'total_processing'));

        }

        else{

            $product = product::all();
            return view('user.home', compact('product'));
        }

    }

    public function productdetail($id)
    {
        $product = product::find($id);
         return view('productdetail', compact('product'));
    }

    public function addcart(Request $request, $id)
    {
        if(Auth::id())
        {
    //An instance that will be used as a reference to get data of the logged in user
       $user = Auth::user();
       $userid= $user->id;
   //An instance that will be used as a reference to get product data with respect to product_id
       $product = product::find($id);

       $product_exist_id=cart::where('product_id', '=', $id)
       ->where('user_id', '=',$userid)->get('id')->first();

       if($product_exist_id)
       {

           $cart=cart::find($product_exist_id)->first();
           $quantity = $cart->quantity;
           $cart->quantity = $quantity + $request->quantity;

           if($product->discount_price!=null)
           {
           $cart->price = $product->discount_price * $cart->quantity;
           }
    
           else
           {
            $cart->price = $product->price * $cart->quantity;
           }

           $cart->save();
           return redirect()->back();

       }
       else
       {

        $cart = new cart;
        $cart->name = $user->name;
        $cart->email = $user->email;
        $cart->phone = $user->phone;
        $cart->address = $user->address;
        $cart->user_id = $user->id;
        
        $cart->product_title = $product->title;
        $cart->product_id = $product->id;
        $cart->image = $product->image;
     
        if($product->discount_price!=null)
        {
        $cart->price = $product->discount_price * $request->quantity;
        }
 
        else
        {
         $cart->price = $product->price * $request->quantity;
        }
        $cart->quantity = $request->quantity;
 
        $cart->save();
        return redirect()->back();
         

       }


       $cart = new cart;
       $cart->name = $user->name;
       $cart->email = $user->email;
       $cart->phone = $user->phone;
       $cart->address = $user->address;
       $cart->user_id = $user->id;
       
       $cart->product_title = $product->title;
       $cart->product_id = $product->id;
       $cart->image = $product->image;
    
       if($product->discount_price!=null)
       {
       $cart->price = $product->discount_price * $request->quantity;
       }

       else
       {
        $cart->price = $product->price * $request->quantity;
       }
       $cart->quantity = $request->quantity;

       $cart->save();
       return redirect()->back();
            
        }

        else
        {
       return redirect('login');
        }
    }

    public function showcart()
    {

        if(Auth::id())
        {
        $id = Auth::user()->id;
        $cart = cart::where('user_id','=', $id)->get();
        return view('user.showcart', compact('cart'));
        }

        return redirect('login');
    }

    public function deletecart($id)
    {
        $cart = cart::find($id);
        $cart->delete();
        return redirect()->back();
    }

    public function cashorder()
    {
        
        //Storing multiple data in the order table
         $user = Auth::user();
         $userid = Auth::user()->id;

         $data = cart::where('user_id','=', $userid)->get();

         foreach($data as $data)
         {
           $order = new Order;
           $order->name = $data->name;
           $order->email = $data->email;
           $order->phone = $data->phone;
           $order->address = $data->address;
           $order->user_id = $data->user_id;

           $order->product_title = $data->product_title;
           $order->quantity = $data->quantity;
           $order->price = $data->price;
           $order->image = $data->image;
           $order->product_id = $data->product_id;

           $order->payment_status='cash on delivery';
           $order->delivery_status='processing';

           $order->save();

           $cart_id = $data->id;
           $cart = cart::find($cart_id);
           $cart->delete();

         }

         return redirect()->back()->with('message',
          'We have received your order we will connect with you soon');
    }


    public function stripe($totalprice)
    {
        return view('stripe', compact('totalprice'));
    }

    public function stripePost(Request $request, $totalprice)

     {

        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

      

        Stripe\Charge::create ([

                "amount" => $totalprice * 100,

                "currency" => "usd",

                "source" => $request->stripeToken,

                "description" => "Thanks for payment" 

        ]);

        $user = Auth::user();
        $userid = Auth::user()->id;

        $data = cart::where('user_id','=', $userid)->get();

        foreach($data as $data)
        {
          $order = new Order;
          $order->name = $data->name;
          $order->email = $data->email;
          $order->phone = $data->phone;
          $order->address = $data->address;
          $order->user_id = $data->user_id;

          $order->product_title = $data->product_title;
          $order->quantity = $data->quantity;
          $order->price = $data->price;
          $order->image = $data->image;
          $order->product_id = $data->product_id;

          $order->payment_status='paid';
          $order->delivery_status='processing';

          $order->save();

          $cart_id = $data->id;
          $cart = cart::find($cart_id);
          $cart->delete();

        }

        return back()

                ->with('success', 'Payment successful!');

    }

    public function showorder()
    {
        if(Auth::id())
        {

         $user = Auth::user();
         $id = $user->id;

         $order = order::where('user_id', '=', $id)->get();

            return view('order', compact('order'));
        }

        else
        return redirect('login');
    }

    public function cancel_order($id)

    {
       $order = order::find($id);
       $order->delivery_status='You cancelled the order';
       $order->save();
       return redirect()->back();
    }

    public function product_search(Request $request)

    {
       $searchText = $request->search;
       $product = product::where('title', 'LIKE', "%$searchText%")->get();

       return view('homepage', compact('product'));

    }
    public function products()
    {

        $product = product::all();
        return view('user.all_products', compact('product'));
    }

}
