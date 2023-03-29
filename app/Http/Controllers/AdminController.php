<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;

use App\Models\Product;

use App\Models\Order;
use Notification;
use App\Notifications\SendEmailNotification;
use PDF;

class AdminController extends Controller
{
   public function categoryview()
   {

    $category = category::all();
       return view('admin.categoryview', compact('category'));
   }

   public function category(Request $request)
   {
     $category = new category;
     $category->category_name = $request->category;
     $category->save();
     return redirect()->back()->with('message', 'Category added successfuly');
   }

  public function deletecategory($id)
  {
      $category = category::find($id);
      $category->delete();
      return redirect()->back()->with('message', 'Category deleted successfuly');
  }

  public function addproducts()
    {
        $category = category::all();
        return view('admin.addproducts', compact('category'));
    }

  public function uploadproduct(Request $request)
    {  
        $product = new product;
        $product->title = $request->title;
        $product->description = $request->description;
        $product->category = $request->category;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->discount_price = $request->discountprice;

        $image = $request->image;
        $imagename = time().'.'.$image->getClientOriginalExtension();
        $request->image->move('productimage', $imagename);
        $product->image = $imagename;

        $product->save();
        return redirect()->back()->with('message', 'product added successfuly');
    }

    public function showproducts()
    {
      $product = product::all();
      return view('admin.showproducts', compact('product'));
    }

    public function updateproducts($id)
    {
      $product = product::find($id);
      $category = category::all();
      return view('admin.updateproducts', compact('product', 'category'));
    }

    public function deleteproduct($id)
    {
         $product = product::find($id);
         $product->delete();
         return redirect()->back();
    }

    public function updateproduct(Request $request, $id)
    {
      $product = product::find($id);
      $product->title = $request->title;
      $product->description = $request->description;
      $product->category = $request->category;
      $product->price = $request->price;
      $product->quantity = $request->quantity;
      $product->discount_price = $request->discountprice;

  
      $image = $request->image;
      if($image)
      {
      $imagename = time().'.'.$image->getClientOriginalExtension();
      $request->image->move('productimage', $imagename);
      $product->image = $imagename;
      }

      $product->save();
      return redirect()->back()->with('message', 'product updated successfuly');
    }

    public function order()
    {
      $order = order::all();
      return view('admin.order', compact('order'));
    }

    public function delivered($id)

    {
          $order = order::find($id);
          $order->delivery_status ='Delivered';
          $order->payment_status ='Paid';
          $order->save();
          return redirect()->back();
    }

    public function printpdf($id)
    {

      $order = order::find($id);
      $pdf = PDF::loadview('admin.pdf', compact('order'));
      return $pdf->download('order details.pdf');

    }

    public function sendemail($id)
    {
      $order = order::find($id);
      return view('admin.sendemail', compact('order'));
    }

     public function send_user_email(Request $request, $id)
     {
       $order = order::find($id);

       $details = [

   'greeting' => $request->greeting,
   'body' => $request->body,
   'actiontext' =>$request->actiontext,
   'actionurl' =>$request->actionurl,
   'endpart' =>$request->endpart,
        
       ];
    Notification::send($order, new SendEmailNotification($details));
    return redirect()->back()->with('message', 'Email sent successfuly');

     }

     public function search(Request $request)
     {
         $searchText = $request->search;
         $order = order::where('name', 'LIKE', "%$searchText%")
         ->orWhere('phone', 'LIKE', "%$searchText%")->orWhere('product_title', 'LIKE', "%$searchText%")->get();

         return view('admin.order', compact('order'));
     
     }

    }
