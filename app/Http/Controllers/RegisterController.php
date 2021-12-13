<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Validation\Rule;

class RegisterController extends Controller
{
	public function create()
	{
		return view('register.create');
	}

	public function store()
	{
		$attributes = request()->validate([
			'name'     => ['required', 'max:255', 'min:3'],
			'username' => ['required', 'max:255', 'min:3', Rule::unique('users', 'username')],
			'password' => ['required', 'max:255', 'min:3'],
			'email'    => ['required', 'email', 'max:255', 'min:5', Rule::unique('users', 'email')],
		]);

		$user = User::create($attributes);

		session()->flash('success', 'your account has been created');

		auth()->login($user);

		return redirect(route('home'));
	}
}
