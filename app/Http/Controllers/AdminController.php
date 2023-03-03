<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class AdminController extends Controller
{
    /**
     * view category
     */
    public function view_category()
    {
        $data = category::all();
        return view('admin.category',compact('data'));
    }

    /**
     * add category
     */

    public function add_category(Request $request)
    {
        $data = new category;

        $data->category_name=$request->category;
        $data->save();
        return redirect()->back()->with('message','Category Added Successfully');
    }

    /**
     * delete category
     */

    public function delete_category($id)
    {
        $data = category::find($id);
        $data->delete();
        return redirect()->back()->with('message','Category Delete Successfully');
    }

    /**
     * product
     */

     public function view_product()
     {
        $category =Category::all();
        return view('admin.product',compact('category'));
     }

     /**
      * add product
      */

     public function add_product(Request $request)
     {
        $product = new Product;
        $product->title  = $request->title;
        $product->description  = $request->description;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->discount_price = $request->dis_price;
        $product->category = $request->category;
        $image = $request->image;
        $imagename = time().'.'.$image->getClientOriginalExtension();
        $request->image->move('product', $imagename);
        $product->image=$imagename;
        $product->save();
        return redirect()->back()->with('message','Product Added Successfully');
     }

     /**
      * show product
      */

      public function show_product()
      {
        $product = Product::all();
        return view('admin.show_product',compact('product'));
      }

      /**
       * delete product
       */
      public function delete_product($id)
      {
        $product = Product::find($id);
        $product->delete();
        return redirect()->back()->with('message','Product Delete Successfully');
      }

      /**
       * update product
       */

       public function update_product($id){
        $product = Product::find($id);
        $category= Category::all();
        return view('admin.update_product',compact('product','category'));
       }

       public function update_product_confirm(Request $request,$id)
       {
        $product = Product::find($id);
        $product->title  = $request->title;
        $product->description  = $request->description;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->discount_price = $request->dis_price;
        $product->category = $request->category;
        $image = $request->image;
        if($image){
            $imagename = time().'.'.$image->getClientOriginalExtension();
            $request->image->move('product', $imagename);
            $product->image=$imagename;
        }
        $product->save();
        return redirect()->back()->with('message','Product Updated Successfully');
       }
}
