<?php

use App\Http\Controllers\Postcontroller;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\File;

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



Route::get('/', [Postcontroller::class, 'index'])->name('home'); 

Route::get('posts/{post:slug}' , [Postcontroller::class, 'show']);


// Route::get('categories/{category:slug}', function(Category $category){

//     return view('posts', [
//         'posts' => $category->posts,
//         "currentCategory" => $category,
//         "categories" => Category::all()
//     ]);

// });

// Route::get('authors/{author:username}', function(User $author){

//     return view('posts.index', [
//         'posts' => $author->posts,
//         // "categories" => Category::all()
//     ]);

// });

