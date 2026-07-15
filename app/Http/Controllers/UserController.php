<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\cart;

class UserController extends Controller
{
    public function index()
    {
        if (Auth::check() && Auth::user()->usertype == 'user') {
            return view('dashboard');
        } else if (Auth::check() && Auth::user()->usertype == 'admin') {
            return view('admin.dashboard');
        }
    }

    function contact()
    {
        return view('contact');
    }
    function shop()
    {
        return view('shop');
    }
    function testimonial()
    {
        return view('testimonial');
    }
    function why()
    {
        return view('why');
    }
    function product_detail(string $id)
    {
        $product = Product::find($id);
        return view('productdetails', ['pdetail' => $product]);
    }

    public function addtocart(Request $request, string $id)
    {
        if (!Auth::check()) {
            return redirect('/login');
        }

        $cart = cart::where('user_id', Auth::id())->where('product_id', $id)->first();
        if ($cart) {
            $cart->quantity += $request->quantity;
            $cart->save();
        } else {
            $cart = new cart();
            $cart->user_id = Auth::id();
            $cart->product_id = $id;
            $cart->quantity = $request->quantity;
            $cart->save();
        }
        return redirect()->back()->with('Success', 'Product added to cart successfully!');
    }

    public function cartproduct()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }
        $cart = cart::join('products', 'carts.product_id', '=', 'products.id')
            ->where('carts.user_id', Auth::id())
            ->select(
                'carts.id',
                'carts.quantity',
                'products.name',
                'products.price',
                'products.image'
            )
            ->get();

        return view('viewcart', ['cartitems' => $cart]);
    }

    public function removecart(string $id)
    {
        cart::destroy($id);
        return redirect()->back();
    }

    public function updatecart(Request $request, string $id)
    {
        $cart = cart::find($id);
        if ($cart) {
            $cart->quantity = $request->update_quantity;
            $cart->save();
            return redirect()->back()->with('success', 'Cart updated successfully!');
        } else {
            return redirect()->back()->with('error', 'Cart item not found!');
        }
    }
}
