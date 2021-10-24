<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;

use Illuminate\Http\Request;

class Postcontroller extends Controller
{

    // მოაქვს ყველა პოსტი/კატეგორია
    public function index ()
    {
    
        return view('posts' , [
            "posts" => Post::latest()->filter( request(['search']) )->get(), // თუ შეყვანილი არაა სერჩს ინფუთი გამოტოვებს ფილტერის ნაწილს და ჩატვირთავს ყველა პოსტს
            "categories" => Category::all()
        ]);

    }

    // მოაქვს ცალკეული პოსტი
    public function show (Post $post)
    {

        return view('post' , [
            'post' => $post,
        ]);

    }

    
}
