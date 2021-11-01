<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Postcontroller;
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
// if(request('search')){
//     $post->where('title', 'like', '%' . request('seaarch') . '%' );
// }

Route::get('/', [Postcontroller::class, 'index'])->name('home');  // მთავარი გვერდის მოთხოვნა

Route::get('posts/{post:slug}', [Postcontroller::class, 'show']);  // კონკრეტული პოსტის მოთხოვნა
Route::post('posts/{post:slug}/comments', [CommentController::class, 'store']);  // პოსტის კომენტარის შენახვ ბაზაში

Route::get('register', [RegisterController::class, 'create'])->middleware('guest');  // რეგისტრაციის გვერდის მოთხოვნა
Route::post('register', [RegisterController::class, 'store'])->middleware('guest');  // ახალი იუზერის რეგისტრაციის მოთხოვნა

Route::get('login', [SessionsControler::class, 'create'])->middleware('guest');  // ლოგინ გვერდის მოთხოვნა
Route::post('sessions', [SessionsControler::class, 'store'])->middleware('guest');  // იუზერის მიერ დალოგინების მოთხოვნა

Route::post('logout', [SessionsControler::class, 'destroy'])->middleware('auth');  // იუზერის მიერ გამოსვლის მოთხოვნა

Route::post('newsletter', [NewsletterController::class, 'check']);  // როცა იუზერისგან მოდის მეილის newsletter გამოწერის მოთხოვნა

Route::get('admin/posts/create', [Postcontroller::class, 'create'])->middleware('admin');
