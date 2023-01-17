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
Route::get('/search', [HomeController::class, 'getSearch']);
Route::post('/search', [HomeController::class, 'postSearch']);

Route::post('/purchase', [ProductController::class, 'purchase']);

Route::get('/register', [LoginController::class, 'getRegister']);
Route::post('/register', [LoginController::class, 'postRegister']);
Route::get('/logout', [LoginController::class, 'logout']);
Route::get('/login', [LoginController::class, 'getLogin']);
Route::post('/login', [LoginController::class, 'postLogin']);
