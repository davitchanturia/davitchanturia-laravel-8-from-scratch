<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionsControler extends Controller
{

    public function create ()
    {
        return view('sessions.create');
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
