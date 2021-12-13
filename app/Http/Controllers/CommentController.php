<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentPostRequest;
use App\Models\Comment;
use App\Models\Post;

class CommentController extends Controller
{
	public function store(CommentPostRequest $request, Post $post)
	{
		$attributes = $request->validated();

		$attributes['post_id'] = $post->id;
		$attributes['user_id'] = auth()->user()->id;

		Comment::create($attributes);

		return back();
	}
}
