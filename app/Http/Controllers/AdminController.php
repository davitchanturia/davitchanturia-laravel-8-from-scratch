<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Requests\StorePostRequest;

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

    public function store(StorePostRequest $request)
    {
        $attributes = $request->validated();

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
}
