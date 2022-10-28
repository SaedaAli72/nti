<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\Authentication\UsersController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductsController;

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
Route::get('dashboard',[DashboardController::class,'index']);
Route::get('dashboard/allproducts',[ProductsController::class,'index']);
Route::get('dashboard/products/create',[ProductsController::class,'create']);
Route::get('dashboard/products/edit',[ProductsController::class,'edit']);


// Route::get('welcome',[WelcomeController::class,'print']);
// Route::get('mona',[WelcomeController::class,'printMyName']);
// Route::get('users/all',[UsersController::class,'index']);


// // helper asset();
// // helper route();

