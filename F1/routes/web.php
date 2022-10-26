<?php

use App\Http\Controllers\AboutController;
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
Route::get('about', [AboutController::class, 'show'])->name('about');

Auth::routes();

Route::resource('/post', PostController::class);
Route::resource('/categories', CategoryController::class)->middleware('admin');

//Route::get('users/{user}', [UserController::class, 'edit']);
//Route::patch('users/{user}/update', [UserController::class, 'update']);
//Route::get('users/{user}',  ['as' => 'users.edit', 'uses' => 'App\Http\Controllers\UserController@edit']);
//Route::patch('users/{user}/update',  ['as' => 'users.update', 'uses' => 'App\Http\Controllers\UserController@update']);

Route::resource('user', UserController::class);

//Route::get('categories/{category:name}', function (Category $category){
//    return view('posts.show', [
//        'posts' => $category->posts
//    ]);
//});
