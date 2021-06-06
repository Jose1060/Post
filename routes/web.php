<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\UserController;

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
    return redirect('/posts');
});

Route::get('/home', function () {
    return redirect('/posts');
});
######################################## POSTS #################################
Route::get('/posts', [PostController::class, 'index'])->name('post.index');
Route::get('/posts/create', [PostController::class, 'create'])->name('post.create');
Route::post('/posts/post/store',[PostController::class, 'store'])->name('post.store');
Route::get('/posts/myPosts',[PostController::class, 'userPosts'])->name('posts.myPosts');
Route::get('/posts/{id}', [PostController::class, 'show']) -> name('post');
Route::post('/comments', [CommentController::class, 'store']);



Route::get('/posts/{id}/delete', [PostController::class, 'destroy']) -> name('posts.destroy');

Route::get('posts/{post}/edit', [PostController::class, 'edit'])->name('post.editar');

Route::put('posts/{post}', [PostController::class, 'update'])->name('post.update');


#Route::post('/posts/create',[PostController::class, 'create']);


Auth::routes();

#Route::get(
#    '/home', 
#    [App\Http\Controllers\PostController::class, 'index'])->name('home');

 Route::get(
    '/post/posts/today', 
    [PostController::class, 'today'])->name('today');



######################################## USERS #################################

Route::get('users/{user}/edit', [UserController::class, 'edit'])->name('user.edit');

Route::put('users/{user}', [UserController::class, 'update'])->name('user.update');

Route::get('users/{user}/profile', [UserController::class, 'porfile'])->name('user.profile');

Route::get('users/{user}/delete', [UserController::class, 'destroy'])->name('user.destroy');

