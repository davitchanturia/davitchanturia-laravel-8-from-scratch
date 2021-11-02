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

//admin

Route::get('admin/posts', [AdminController::class, 'index'])->middleware('admin');  //ადმინის მიერ დაშბორდის გამოტანა სადაც ყველა პოსტი ცხრილის სახითაა
Route::post('admin/posts', [AdminController::class, 'store'])->middleware('admin');  // ადმინის მიერ პოსტის შექმნის მოთხოვნა
Route::get('admin/posts/create', [AdminController::class, 'create'])->middleware('admin');  // ადმინის მიერ პოსტის შექმნის ფეიჯზე მოთხოვნა
Route::get('admin/posts/{post}/edit', [AdminController::class, 'edit'])->middleware('admin');   //ადმინის მიერ დაშბორდის ედით ფეიჯის გამოტანა
Route::patch('admin/posts/{post}', [AdminController::class, 'update'])->middleware('admin'); //ადმინის მიერ დაედითებული პოსტის განახლება
Route::delete('admin/posts/{post}', [AdminController::class, 'destroy'])->middleware('admin');  //ადმინის მიერ  პოსტის წაშლა
