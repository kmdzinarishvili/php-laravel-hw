<?php

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

Route::get('/', function() {
    return view('welcome');
});

Route::get('/posts', [\App\Http\Controllers\PostController::class, 'index'])->name('posts')->middleware('auth');
Route::get('/posts/{id}', [\App\Http\Controllers\PostController::class, 'show'])->name('posts.show')->middleware('auth');
Route::get("/post/create", [\App\Http\Controllers\PostController::class, 'create'])->name('posts.create')->middleware('auth');

Route::post("/post/save", [\App\Http\Controllers\PostController::class, 'save'])->name('posts.save')->middleware('auth');

Route::get('/posts/{id}/edit', [\App\Http\Controllers\PostController::class,"edit"])->name('posts.edit')->middleware('auth');
Route::put("posts/{id}/update", [\App\Http\Controllers\PostController::class, "update"])->name("posts.update")->middleware('auth');
Route::delete('/posts/{post}/delete', [\App\Http\Controllers\PostController::class, "delete"])->name("posts.delete")->middleware('auth');

Route::get('/users/login', [\App\Http\Controllers\LoginController::class, 'login'])->name('login');
Route::post('users/post-login', [\App\Http\Controllers\LoginController::class, 'postLogin'])->name('post.login');

Route::post('/users/logout', [\App\Http\Controllers\LoginController::class, 'logout'])->name('logout');

Route::get('/users/register', [\App\Http\Controllers\LoginController::class, 'register'])->name('register');
Route::post('users/post-register', [\App\Http\Controllers\LoginController::class, 'postRegister'])->name('post.register');

Route::get('/my-posts', [\App\Http\Controllers\LoginController::class, 'myPosts'])->name('my.posts');

Route::post('/posts/{post}/approve', [\App\Http\Controllers\PostController::class, 'approve'])->name('approve');
