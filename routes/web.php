<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;

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
    return view('welcome');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/category', [CategoryController::class, 'index']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/category', [CategoryController::class,"index"] );
Route::get('/category/create', [CategoryController::class,"create"]);
Route::get('/category/{id}', [CategoryController::class,"show"]);
Route::get('/category/edit/{id}', [CategoryController::class,"edit"]);
Route::post('/category/update', [CategoryController::class,"update"]);
Route::post('/category/post', [CategoryController::class,"post"]);
Route::post('/category/destroy/{id}', [CategoryController::class,"destroy"]);
Route::post('/category/store', [CategoryController::class,"store"]);

Route::get('/', [ProductController::class,"index"]);
Route::get('products', [ProductController::class,"index"]);
Route::get('products/create', [ProductController::class,"create"]);
Route::get('products/{id}', [ProductController::class,"show"]);
Route::get('products/edit/{id}', [ProductController::class,"edit"]);
Route::post('products/update', [ProductController::class,"update"]);

