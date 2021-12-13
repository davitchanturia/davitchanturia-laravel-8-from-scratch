<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

class SessionsControler extends Controller
{

    public function create()
    {
        return view('sessions.create');
    }

    public function store()
    {
        $attrs = Request()->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (auth()->attempt($attrs)) {

            session()->flash('success', 'welcome back');

            return redirect('/');
        } else {
            throw ValidationException::withMessages(['email' => 'your provided credentials could not be found']);
        }
    }


    public function destroy()
    {
        auth()->logout();

        session()->flash('success', 'Goodbye');

        return redirect('/');
    }
}
