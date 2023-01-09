<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\products;
use App\Http\Controllers\category;
use App\Http\Controllers\Product;
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
return view('authentication/loginform');
});
Route::get('signup', function(){
    return view('authentication/signup');
    });
Route::get('adminpage', function(){
        return view('adminpage');
        });
Route::get('registerproduct', function(){
        return view('products/registerproducts');
        });
Route::get('registercategory', function(){
        return view('products/productcategory');
        });
Route::get('productsection', function(){
        return view('products/products_page');
        });
Route::get('productgraphs', function(){
        return view('products/graphs');
        });
// Route::get('availableproducts', function(){
//         return view('products/allproductspage');
//         });
Route::resource('availableproducts', Product::class);
// Route::get('home1', [testing::class,'index']);
Route::resource('home1', testing::class);
Route::resource('products', products::class);
Route::resource('category', category::class);
Route::resource('product', Product::class);