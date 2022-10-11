<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HelloController;
use App\Http\Controllers\PostController;
use App\Models\Category;
use App\Models\Post;
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
Route::get('about', [AboutController::class, 'show'])->name('about')->middleware('admin');

Auth::routes();

Route::resource('/post', PostController::class);
Route::resource('/categories', CategoryController::class);

//Route::get('categories/{category}', function ($id){
//    return view('posts', [
//        'posts' => Post::findOrFail($id)
//    ]);
//});
