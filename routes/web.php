<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\products;
use App\Http\Controllers\category;
use App\Http\Controllers\Product;
use App\Http\Controllers\sales;
use App\Http\Controllers\UserController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcomepage');
});
Route::get('login', function(){
return view('authentication/loginform')->middleware('auth');
});
Route::get('signup', function(){
    return view('authentication/signup')->middleware('auth');
    });
Route::get('adminpage', function(){
        return view('adminpage');
        })->middleware('auth');
Route::get('registerproduct', function(){
        return view('products/registerproducts')->middleware('auth');
        });
Route::get('registercategory', function(){
        return view('products/productcategory');
        })->middleware('auth');
Route::get('productsection', function(){
        return view('products/products_page');
        })->middleware('auth');
Route::get('productgraphs', function(){
        return view('products/graphs');
        })->middleware('auth');
// Route::get('availableproducts', function(){
//         return view('products/allproductspage');
//         });
Route::resource('availableproducts', Product::class);
// Route::get('home1', [testing::class,'index']);
Route::resource('products', products::class)->middleware('auth');
Route::resource('category', category::class)->middleware('auth');
Route::resource('product', Product::class)->middleware('auth');
Route::resource('product', Product::class)->middleware('auth');
Route::resource('sales', sales::class)->middleware('auth');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
