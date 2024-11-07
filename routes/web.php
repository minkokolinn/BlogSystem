<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\AdminBlogController;
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

Route::get('/', [BlogController::class,"index"]);

Route::get('/blogs/{blog:slug}', [BlogController::class,"show"]);

Route::get('/register', [AuthController::class,"create"])->middleware('guest');

Route::post('/register', [AuthController::class,"store"])->middleware('guest');

Route::post('/logout', [AuthController::class,"logout"])->middleware('auth');

Route::get('/login', [AuthController::class,"login"])->middleware('guest');

Route::post('/login', [AuthController::class,"post_login"])->middleware('guest');

Route::post('/blogs/{blog:slug}/comments', [CommentController::class,"store"]);

Route::post('/blogs/{blog:slug}/subscription', [BlogController::class,"subscriptionHandler"]);

// Admin Routes

Route::get('/admin/blogs', [AdminBlogController::class,'index'])->middleware('admin');

Route::get('/admin/blogs/create', [AdminBlogController::class,'create'])->middleware('admin');

Route::post('/admin/blogs/create', [AdminBlogController::class,'store'])->middleware('admin');

Route::delete('/admin/blogs/{blog:slug}/delete', [AdminBlogController::class,'destory'])->middleware('admin');


// Route::get('/categories/{category:slug}', function (Category $category) {
//     return view('blogs',[
//         // "blogs" => $category->blogs->load('category','author')
//         "blogs" => $category->blogs,
//         "categoryList"=>Category::all(),
//         "currentCategory"=>$category
//     ]);
// });

// Route::get('/users/{user:username}', function (User $user) {
//     return view('blogs',[
//         // "blogs"=>$user->blogs->load('category','author')
//         "blogs"=>$user->blogs,
//         "categoryList"=>Category::all()
//     ]);
// });