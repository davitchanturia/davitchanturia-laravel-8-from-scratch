<?php

namespace App\Http\Controllers;

use App\Models\Category;
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

    public  function create()
    {
        return view('admin.posts.create', [
            'categories' => Category::all()
        ]);
    }

    public function store()
    {
        $attributes = $this->ValidatePost();

        $attributes['user_id'] = auth()->id();
        // save foto in thumbnail folder
        $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');

        Post::create($attributes);

        return redirect('/')->with('success', 'post created succesfully!');
    }

    public  function edit(Post $post)
    {
        return view('admin.posts.edit', [
            'post' => $post,
            'categories' => Category::all()
        ]);
    }

    public function update(Post $post)
    {
        $attributes = $this->ValidatePost($post);

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
        // parameter is null but if we will set parameter it will create new post
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
