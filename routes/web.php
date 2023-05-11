<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UpdateProductController;

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
Route::get('/products', [PostController::class, 'index']);
Route::get('/orders', [PostController::class, 'getOrders']);
Route::get('/updateproduct/{id}', [PostController::class,'updateProduct']);
Route::get('/updatemeta/{id}', [PostController::class,'updateMetafield']);
Route::get('/getmeta/{id}', [PostController::class,'getProductMetafields']);
Route::get('/orderfulfilment/{id}', [PostController::class,'orderFulfilment']);
Route::get('/getblogs', [PostController::class,'getBlogs']);

