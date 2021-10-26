<?php

namespace App\Http\Controllers;
use App\Models\User;


use Illuminate\Http\Request;

class RegisterController extends Controller
{
    
    // ამ მეთოდით გამოგვაქვს სარეგისტრაციოს ფეიჯი
    public function create()
    {
        return view('register.create');
    }

    // ამ მეთოდით ვქმნით იუზერს ანუ ვასაბმითებთ ფორმას
    public function store()
    {

        $attributes = request()->validate([
            'name' =>  ['required', 'max:255', 'min:3'],
            'username' =>  ['required', 'max:255', 'min:3'],
            'password' => ['required', 'max:255', 'min:3'],
            'email' => ['required', 'email', 'max:255', 'min:3']
        ]);

        User::create($attributes);

        return redirect('/');
    }
}
