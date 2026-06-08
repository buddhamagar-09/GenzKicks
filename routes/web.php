<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard');
});


Route::get('/dashboard', [UserController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
//Admin routes
Route::middleware('admin')->group(function () {
    Route::get('/addproduct',[AdminController::class,'add_product']) -> name('add.products');
    Route::post('/productAdd',[AdminController::class,'product_Add']) -> name('admin_add_products');
});

//Frontend routes
Route::get('/contact', [UserController::class, 'contact'])->name('contact');
Route::get('/shop', [UserController::class, 'shop'])->name('shop');
Route::get('/testimonial', [UserController::class, 'testimonial'])->name('testimonial');
Route::get('/why', [UserController::class, 'why'])->name('why');


require __DIR__ . '/auth.php';
