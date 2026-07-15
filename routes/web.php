<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard');
})->name('home');


Route::get('/dashboard', [UserController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/cart', [UserController::class, 'cartproduct'])->middleware(['auth', 'verified'])->name('cart_table');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
//Admin routes
Route::middleware('admin')->group(function () {
    Route::get('/addproduct',[AdminController::class,'add_product']) -> name('add.products');
    Route::post('/productAdd',[AdminController::class,'product_Add']) -> name('admin_add_products');
    Route::get('/viewproduct',[AdminController::class,'view_products']) -> name('view.products');
    Route::get('/deleteProduct/{id}',[AdminController::class,'delete_products']) -> name('delete.product');
    Route::get('/editProduct/{id}',[AdminController::class,'edit_products']) -> name('edit.product');
    Route::post('/updateProduct/{id}',[AdminController::class,'update_products']) -> name('admin_update_product');
});

//Frontend routes
Route::get('/contact', [UserController::class, 'contact'])->name('contact');
Route::get('/shop', [UserController::class, 'shop'])->name('shop');
Route::get('/testimonial', [UserController::class, 'testimonial'])->name('testimonial');
Route::get('/why', [UserController::class, 'why'])->name('why');
Route::get('/productdetails/{id}', [UserController::class, 'product_detail'])->name('product.detail');
Route::get('/addtocart/{id}',[UserController::class,'addtocart'])->name('add_to_cart');
Route::get('/removecart/{id}',[UserController::class,'removecart'])->name('delete_cart_item');
Route::post('/updatecart/{id}',[UserController::class, 'updatecart'])->name('update_cart');


require __DIR__ . '/auth.php';
