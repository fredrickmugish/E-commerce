<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;

use App\Models\Product;

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
}
