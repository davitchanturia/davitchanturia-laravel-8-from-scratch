<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\SessionsControler;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\NewsletterController;

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

Route::get('/', [PostController::class, 'index'])->name('home');

Route::get('posts/{post:slug}', [PostController::class, 'show'])->name('show');
Route::post('posts/{post:slug}/comments', [CommentController::class, 'store'])->name('create.comment');

Route::get('register', [RegisterController::class, 'create'])->name('show.registration');
Route::post('register', [RegisterController::class, 'store'])->name('register');

Route::get('login', [SessionsControler::class, 'create'])->name('show.login');
Route::post('sessions', [SessionsControler::class, 'store'])->name('login');

Route::post('logout', [SessionsControler::class, 'destroy'])->middleware('auth')->name('logout');

Route::post('newsletter', [NewsletterController::class, 'check'])->name('send.email');

//admin
Route::middleware('can:admin')->group(function () {
	Route::get('admin/posts', [AdminController::class, 'index'])->name('dashboard');
	Route::post('admin/posts', [AdminController::class, 'store'])->name('create.post');
	Route::get('admin/posts/create', [AdminController::class, 'create'])->name('show.post.create');
	Route::get('admin/posts/{post}/edit', [AdminController::class, 'edit'])->name('show.post.edit');
	Route::patch('admin/posts/{post}', [AdminController::class, 'update'])->name('update.post');
	Route::delete('admin/posts/{post}', [AdminController::class, 'destroy'])->name('delete.post');
});
