<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function add_product()
    {
        return view('admin.products.addproduct');
    }
    public function product_Add(Request $request)
    {
        $product = new Product();
        $product->name = $request->product_name;
        $product->description = $request->product_description;
        $product->Price = $request->product_price;
        $product->quantity = $request->product_quantity;
        
        //for image
        //bag.jpg = 67836635762375.jpg
        $image = $request->product_image;
        $image_name = uniqid().'.'.$image->getClientOriginalExtension();
        $image->move(public_path('image/product'),$image_name);
        $product->image = $image_name;
        $product->save();
        return redirect()->back();
    }
}
