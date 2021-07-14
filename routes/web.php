<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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
    return view('home');
});

Auth::routes();
//get layout product
Route::get('/home', [App\Http\Controllers\HomeController::class, 'ViewProduct'])->name('home');
//get layout product
Route::get('/product',[App\Http\Controllers\HomeController::class,'ViewProduct'])->name('product');
//get layout add product
Route::get('/addproduct',[App\Http\Controllers\HomeController::class,'ViewAddProduct'])->name('addproduct');
//post data to save product
Route::post('/saveproduct',[App\Http\Controllers\HomeController::class, 'getSaveProduct'])->name('saveproduct');
//get layout edit product
Route::get('/editproduct/{id}',[App\Http\Controllers\HomeController::class,'ViewEditProduct'])->name('editproduct');
//post data to edit
Route::post('/saveedit/{id}',[App\Http\Controllers\HomeController::class, 'getSaveEdit'])->name('saveedit');
//get function controller to delete product
Route::get('/deleteproduct/{id}',[App\Http\Controllers\HomeController::class,'DeleteProduct'])->name('deleteproduct');
//get function logout
Route::get('/logout', [App\Http\Controllers\HomeController::class, 'Logout'])->name('logout');