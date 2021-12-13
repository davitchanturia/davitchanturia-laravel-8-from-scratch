<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Postcontroller;
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

Route::get('/', [Postcontroller::class, 'index'])->name('home');

Route::get('posts/{post:slug}', [Postcontroller::class, 'show']);
Route::post('posts/{post:slug}/comments', [CommentController::class, 'store']);

Route::get('register', [RegisterController::class, 'create']);
Route::post('register', [RegisterController::class, 'store']);

Route::get('login', [SessionsControler::class, 'create']);
Route::post('sessions', [SessionsControler::class, 'store']);


Route::post('logout', [SessionsControler::class, 'destroy'])->middleware('auth');

Route::post('newsletter', [NewsletterController::class, 'check']);  // subscribe request in newsletter

//admin
Route::middleware('can:admin')->group(function () {
    Route::get('admin/posts', [AdminController::class, 'index']);
    Route::post('admin/posts', [AdminController::class, 'store']);
    Route::get('admin/posts/create', [AdminController::class, 'create']);
    Route::get('admin/posts/{post}/edit', [AdminController::class, 'edit']);
    Route::patch('admin/posts/{post}', [AdminController::class, 'update']);
    Route::delete('admin/posts/{post}', [AdminController::class, 'destroy']);
});
