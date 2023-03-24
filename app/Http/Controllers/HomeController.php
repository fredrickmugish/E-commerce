<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\support\Facades\Auth;

use App\Models\Product;

use App\Models\Cart;

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
           return view('admin.adminhome');

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
    //An instance that will be used as a reference to get user data
       $user = Auth::user();
   //An instance that will be used as a reference to get product data
       $product = product::find($id);

   //An instance that will be used to get the user and product data
   //for it to be included in the cart table, but it will also be used
   //to pass the quantity details of the product as it is in the 
   //Add to cart form
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
}
