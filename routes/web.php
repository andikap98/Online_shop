<?php

use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\DashboardController;
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


Route::get('/auth', [AuthenticationController::class,'index'])->name('login')->middleware('guest');
Route::get('/auth/redirect', [AuthenticationController::class,'authenticate'])->middleware('guest');
Route::get('/auth/logout', [AuthenticationController::class,'logout']);

Route::get('/dashboard', [DashboardController::class,'index'])->middleware('auth');