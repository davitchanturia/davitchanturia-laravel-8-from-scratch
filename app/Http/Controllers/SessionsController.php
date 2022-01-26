<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserLoginRequest;
use Illuminate\Validation\ValidationException;

class SessionsController extends Controller
{
	public function create()
	{
		return view('sessions.create');
	}

	public function store(UserLoginRequest $request)
	{
		$attrs = $request->validated();

		if (auth()->attempt($attrs))
		{
			session()->flash('success', 'welcome back');

			return redirect(route('home'));
		}
		else
		{
			throw ValidationException::withMessages(['email' => 'your provided credentials could not be found']);
		}
	}

	public function destroy()
	{
		auth()->logout();

		session()->flash('success', 'Goodbye');

		return redirect(route('home'));
	}
}
