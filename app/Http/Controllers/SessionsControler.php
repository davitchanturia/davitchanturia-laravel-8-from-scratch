<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

class SessionsControler extends Controller
{

    public function create ()
    {
        return view('sessions.create');
    }

    public function store ()
    {
        $attrs = Request()->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        dd(auth()->attempt($attrs));

        if (auth()->attempt($attrs)) {
            
            session()->flash('success', 'welcome back');

            return redirect('/');
        }else{
            throw ValidationException::withMessages(['email' => 'your provided credentials could not be found']);
        }



        // return back()
        //     ->withInput()
        //     ->withErrors(['email' => 'your provided credentials could not be found']);
    }


    public function destroy ()
    {
        // გამოსვლა
        auth()->logout();

        // ვინახავთ სესიაში, flash უზრუნველყოფს რომ შენახული იყოს შემდეგ რექუესთამდე
        session()->flash('success', 'Goodbye');

        // ვაბრუნებთ მთავარ გვერდზე
        return redirect('/');
    }
}
