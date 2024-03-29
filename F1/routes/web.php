<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('about', [AboutController::class, 'show'])->name('about')->middleware('auth');;

Auth::routes();

Route::resource('/post', PostController::class)->middleware('auth');
Route::get('/changeActive', [ PostController::class, 'isActive'])->name('changeActive')->middleware('auth');;
Route::resource('/categories', CategoryController::class)->middleware('admin');
Route::resource('user', UserController::class)->middleware('auth');;

Route::get('/admin', [AdminController::class, 'index'])->name('admin')->middleware('admin');
