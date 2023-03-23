<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\support\Facades\Auth;

use App\Models\Product;

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
}
