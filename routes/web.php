<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\MainController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Personal\CommentController;
use App\Http\Controllers\Personal\LikedController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\CommentsController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [WelcomeController::class, 'index']);
Route::get('posts/{post}', [WelcomeController::class, 'show'])->name('post.show');
Route::post('posts/{post}/comments', [CommentsController::class, 'store'])->name('post.comment.store');

Route::post('{post}/likes', [App\Http\Controllers\Post\Like\StoreController::class, 'store'])->name('post.like.store');

Route::get('/categories', [App\Http\Controllers\Category\IndexController::class, 'index'])->name('category.index');
Route::get('/categories/{category}', [App\Http\Controllers\Category\Post\IndexController::class, 'index'])
->name('category.post.index');

Route::get('/tags', [App\Http\Controllers\Tag\IndexController::class, 'index'])->name('tag.index');
Route::get('/tags/{tag}', [App\Http\Controllers\Tag\Post\IndexController::class, 'index'])
->name('tag.post.index');

Route::get('/admin', [MainController::class, 'index'])->middleware(['auth', 'admin']);
Route::resource('admin/categories', CategoryController::class)->middleware(['auth', 'admin']);
Route::resource('admin/tags', TagController::class)->middleware(['auth', 'admin']);
Route::resource('admin/posts', PostController::class)->middleware(['auth', 'admin']);
Route::resource('admin/users', UserController::class)->middleware(['auth', 'admin']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('home/likes', LikedController::class)->only('index', 'destroy');
Route::resource('home/comments', CommentController::class);
