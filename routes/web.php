<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductTypesController;

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
    return view('index');
})->name('index');

Route::get('/product',[ProductController::class,'index'])->name('product.index');
Route::get('/product/create',[ProductController::class,'create'])->name('product.create');
Route::get('/product/{product}/edit',[ProductController::class,'edit'])->name('product.edit');
Route::put('/product/{product}/update',[ProductController::class,'update'])->name('product.update');
Route::post('/product',[ProductController::class,'store'])->name('product.store');
Route::delete('/product/{product}/delete',[ProductController::class,'delete'])->name('product.delete');

Route::get('/producttype',[ProductTypesController::class,'index'])->name('product_type.index');
Route::get('/producttype/create',[ProductTypesController::class,'create'])->name('product_type.create');
Route::get('/producttype/{product_type}/edit',[ProductTypesController::class,'edit'])->name('product_type.edit');
Route::put('/producttype/{product_type}/update',[ProductTypesController::class,'update'])->name('product_type.update');
Route::post('/producttype',[ProductTypesController::class,'store'])->name('product_type.store');
Route::delete('/producttype/{product_type}/delete',[ProductTypesController::class,'delete'])->name('product_type.delete');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
