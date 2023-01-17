<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [HomeController::class, 'home']);
Route::get('/home', [HomeController::class, 'home']);
Route::get('/category', [HomeController::class, 'category']);
Route::get('/category/{name}', [HomeController::class, 'category']);
Route::get('/product', [HomeController::class, 'product']);
Route::get('/product/{id}', [HomeController::class, 'product']);
Route::get('/search', [HomeController::class, 'search']);

Route::middleware('admin')->group(function () {
    Route::get('/manage', [ProductController::class, 'manage']);
    Route::get('/manage/add', [ProductController::class, 'viewAddProduct']);
    Route::post('/manage/add', [ProductController::class, 'submitAddProduct']);
    Route::get('/manage/update/{id}', [ProductController::class, 'update']);
    Route::post('/manage/update', [ProductController::class, 'postUpdate']);
    Route::get('/manage/update', function () {
        return redirect('/manage');
    });

    Route::get('/manage/search', [ProductController::class, 'adminSearch']);

    Route::get('/manage/delete/{id}', [ProductController::class, 'delete']);
    Route::get('/manage/delete', function () {
        return redirect('/manage');
    });
});
Route::post('/purchase', [ProductController::class, 'purchase']);
Route::post('/addToCart', [ProductController::class, 'addToCart']);
Route::get('/cart', [ProductController::class, 'cart']);
Route::get('/removeFromCart/{id}', [ProductController::class, 'removeFromCart']);
Route::get('/history', [ProductController::class, 'history']);

Route::get('/register', [LoginController::class, 'getRegister']);
Route::post('/register', [LoginController::class, 'postRegister']);
Route::get('/logout', [LoginController::class, 'logout']);
Route::get('/login', [LoginController::class, 'getLogin']);
Route::post('/login', [LoginController::class, 'postLogin']);
Route::get('/profile', [LoginController::class, 'profile']);
