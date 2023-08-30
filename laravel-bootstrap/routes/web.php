<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;

use App\Http\Controllers\OrderController;
// use App\Http\Controllers\Api\CategoryController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

//////////////////////////////////////     Product controller   /////////////////////
Route::get('/product',[ProductController::class,'index'])->name('product.index')->middleware('auth');
Route::get('/products/search', [ProductController::class,'search'])->name('products.search');
Route::get('/product/show/{id}',[ProductController::class,'show'])->name('product.show');
Route::delete('/product/delete/{id}',[ProductController::class,'destroy'])->name('product.delete')->middleware('is_admin');
Route::get('/product/update/{id}',[ProductController::class,'update'])->name('product.update')->middleware('is_admin');
Route::put('/product/edit/{id}',[ProductController::class,'edit'])->name('product.edit')->middleware('is_admin');
Route::get('/product/create',[ProductController::class,'create'])->name('product.create')->middleware('is_admin');
Route::post('/product/store',[App\Http\Controllers\Api\ProductController::class,'store'])->name('product.Create')->middleware('is_admin');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/admin/home',[App\Http\Controllers\HomeController::class, 'adminHome'])->name('admin.home')->middleware('is_admin');


//////////////////////////////////////     Product controller   /////////////////////
Route::get('/category',[App\Http\Controllers\CategoryController::class,'index'])->name('category.index')->middleware('auth');
Route::get('/category/search', [App\Http\Controllers\CategoryController::class,'search'])->name('category.search');
Route::get('/category/show/{id}',[App\Http\Controllers\CategoryController::class,'show'])->name('category.show');
Route::delete('/category/delete/{id}',[App\Http\Controllers\CategoryController::class,'destroy'])->name('category.delete')->middleware('is_admin');
Route::get('/category/update/{id}',[App\Http\Controllers\CategoryController::class,'update'])->name('category.update')->middleware('is_admin');
Route::put('/category/edit/{id}',[App\Http\Controllers\CategoryController::class,'edit'])->name('category.edit')->middleware('is_admin');
Route::get('/category/create',[App\Http\Controllers\CategoryController::class,'create'])->name('category.create')->middleware('is_admin');

Route::post('/category/create',[App\Http\Controllers\Api\CategoryController::class,'store'])->name('category.Create')->middleware('is_admin');

Route::post('/category/store',[App\Http\Controllers\CategoryController::class,'store'])->name('category.store')->middleware('is_admin');



Route::get('ordersss',[App\Http\Controllers\OrderController::class, 'index'])->name('ordersss');
Route::post('/order-create',[App\Http\Controllers\OrderController::class, 'create'])->name('order.create');
