<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Models\User;

class RegisterController extends Controller
{
	public function create()
	{
		return view('register.create');
	}

	public function store(StoreUserRequest $request)
	{
		$attributes = $request->validated();

		$user = User::create($attributes);

		session()->flash('success', 'your account has been created');

		auth()->login($user);

		return redirect(route('home'));
	}
}
