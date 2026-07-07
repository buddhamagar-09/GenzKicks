<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Product;

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
}
