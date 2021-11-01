<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Validation\Rule;

class Postcontroller extends Controller
{
	// მოაქვს ყველა პოსტი/კატეგორია
	public function index()
	{
		return view('posts.index', [
			'posts' => Post::latest()->filter(
				request(['search', 'category', 'author'])
			)->paginate(6)->withQueryString(), // თუ შეყვანილი არაა სერჩს ინფუთი გამოტოვებს ფილტერის ნაწილს და ჩატვირთავს ყველა პოსტს (paginate ნომრავს გვერდებს, პარამეტრდ ვუწერთ თითო გვერდზე რამდენი პოსტიც გვინდა რო იყოს)
		]);
	}

	// მოაქვს ცალკეული პოსტი
	public function show(Post $post)
	{
		return view('posts.show', [
			'post' => $post,
		]);
	}

	// გამოაქვს პოსტის შესაქმნელი ფორმა
	public function create()
	{
		return view('posts.create');
	}

	// პოსტის შექმნა ადმინის მიერ
	public function store()
	{
		// პოსტის ვალიდაცია
		$attributes = request()->validate([
			'title'          => ['required'],
			'slug'           => ['required', Rule::unique('posts', 'slug')],
			'excerpt'        => ['required'],
			'body'           => ['required'],
			'category_id'    => ['required', Rule::exists('categories', 'id')],
		]);

		// dd($attributes['category_id']);
		// ვალიდაცია გავლილ პოსტს ვუმატებთ იუზერ აიდის
		$attributes['user_id'] = auth()->id();

		// ვქმნით პოსტს
		Post::create($attributes);

		return redirect('/');
		// ddd(request()->all());
	}
}
