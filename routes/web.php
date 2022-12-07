<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\MainController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Personal\CommentController;
use App\Http\Controllers\Personal\LikedController;
use App\Http\Controllers\WelcomeController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [WelcomeController::class, 'index']);

Route::get('/admin', [MainController::class, 'index'])->middleware(['auth','admin']);
Route::resource('admin/categories', CategoryController::class)->middleware(['auth','admin']);
Route::resource('admin/tags', TagController::class)->middleware(['auth','admin']);
Route::resource('admin/posts', PostController::class)->middleware(['auth','admin']);
Route::resource('admin/users', UserController::class)->middleware(['auth','admin']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('home/likes', LikedController::class);
Route::resource('home/comments', CommentController::class);
