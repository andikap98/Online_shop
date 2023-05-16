<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\ProdukController;

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


Route::get('/auth', [AuthenticationController::class,'index'])->name('login')->middleware('guest');
Route::get('/auth/redirect', [AuthenticationController::class,'authenticate'])->middleware('guest');
Route::get('/auth/logout', [AuthenticationController::class,'logout']);
Route::prefix('')->middleware('auth')->group(
    function(){
        Route::get('/dashboard', [DashboardController::class,'index']);
        Route::resource('customer', CustomerController::class);
        Route::resource('produk', ProdukController::class);

    }
);