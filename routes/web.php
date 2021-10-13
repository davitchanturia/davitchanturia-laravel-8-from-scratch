<?php

use App\Models\searchPost;
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



Route::get('/', function () {

    return view('posts' , [
        "post" => searchPost::all()
    ]);
    
});

Route::get('posts/{post}' , function($element) {  

    return view('post' , [
        'post' => searchPost::findorfail($element)
    ]);

}) -> where('post' , '[A-z_\-]+');

