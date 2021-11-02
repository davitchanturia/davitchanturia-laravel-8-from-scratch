<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AdminController extends Controller
{
    public static function index()
    {
        return view('admin.posts.index', [
            'posts' => Post::paginate(50)
        ]);
        
    }

     // გამოაქვს პოსტის შესაქმნელი ფორმა
    public static function create()
    {
        return view('admin.posts.create');
    }

    // პოსტის შექმნა ადმინის მიერ
    public function store()
	{

		
		// პოსტის ვალიდაცია
		$attributes = request()->validate([
			'title'          => ['required'],
			'thumbnail'      => ['required', 'image'],
			'slug'           => ['required', Rule::unique('posts', 'slug')],
			'excerpt'        => ['required'],
			'body'           => ['required'],
			'category_id'    => ['required', Rule::exists('categories', 'id')],
		]);

		// ვალიდაცია გავლილ პოსტს ვუმატებთ იუზერ აიდის
		$attributes['user_id'] = auth()->id();

		$attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');

		// ვქმნით პოსტს
		Post::create($attributes);

		return redirect('/');

	}

    public static function edit(Post $post)
    {
        return view('admin.posts.edit', ['post' => $post]);
    }
    
    public static function update(Post $post)
    {
        
        // დაედითებული პოსტის ვალიდაცია პოსტის ვალიდაცია
		$attributes = request()->validate([
			'title'          => ['required'],
			'thumbnail'      => ['image'],
			'slug'           => ['required', Rule::unique('posts', 'slug')->ignore($post->id)],
			'excerpt'        => ['required'],
			'body'           => ['required'],
			'category_id'    => ['required', Rule::exists('categories', 'id')],
		]);
        
        // თუ შეტანილია ფაილის ასატვირთში რამე მხოლოდ მაგ შემთხვევაში შეინახოს სთორიჯში
        if (isset($attributes['thumbnail'])) {
            $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');
        }

        $post->update($attributes);

        return back()->with('success', 'post updated!');
    }

    public static function destroy(Post $post)
    {
        $post->delete();
        
        return back()->with('success', 'Post is deleted');
    }

}
