<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AdminController extends Controller
{
    public  function index()
    {
        return view('admin.posts.index', [
            'posts' => Post::paginate(50)
        ]);
        
    }

     // გამოაქვს პოსტის შესაქმნელი ფორმა
    public  function create()
    {
        return view('admin.posts.create');
    }

    // პოსტის შექმნა ადმინის მიერ
    public function store()
	{
 
		// პოსტის ვალიდაცია
		$attributes = $this->ValidatePost();

		// ვალიდაცია გავლილ პოსტს ვუმატებთ იუზერ აიდის
		$attributes['user_id'] = auth()->id();
        //ფოტოს ვინახავთ სთორიჯში thumbnail ფოლდერში
		$attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');

		// ვქმნით პოსტს
		Post::create($attributes);

		return redirect('/')->with('success', 'post created succesfully!');

	}

    public  function edit(Post $post)
    {
        return view('admin.posts.edit', ['post' => $post]);
    }
    
    public function update(Post $post)
    {
        
      // პოსტის ვალიდაცია
		$attributes = $this->ValidatePost($post);
        
        // თუ შეტანილია ფაილის ასატვირთში რამე მხოლოდ მაგ შემთხვევაში შეინახოს სთორიჯში
        if (isset($attributes['thumbnail'])) {
            $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');
        }

        $post->update($attributes);

        return back()->with('success', 'post updated!');
    }

    public function destroy(Post $post)
    {
        $post->delete();
        
        return back()->with('success', 'Post is deleted');
    }


    protected function ValidatePost(?Post $post = null): array
    {
        //პარამეტრად ვატანთ ნოლს მაგრამ ქვევით წერია რო თუ გადავცემთ პარამეტრს მეთოდის გამოძახებისას 
        //მიენიჭება გადაცემული მნიშვნელობა მაგრამ თუ არ გადავცემთ შექმნის ახალ პოსტს
        $post ??= new Post();

        $attributes = request()->validate([
			'title'          => ['required'],
			'thumbnail'      => $post->exists() ? ['image'] : ['required', 'image'],  //ვამოწმებთ თუ ბაზაში არსბეობს პოსტი მხოლოდ ფაილის ტიპი მითხოვოს სხვა შემთხვევაში ინფუთი სავალდებულო ხდება და ტიპიც აუცილებელია
			'slug'           => ['required', Rule::unique('posts', 'slug')->ignore($post->id)],
			'excerpt'        => ['required'],
			'body'           => ['required'],
			'category_id'    => ['required', Rule::exists('categories', 'id')],
		]);

        return $attributes;
    }
}
