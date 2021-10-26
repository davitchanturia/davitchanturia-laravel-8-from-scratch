<?php

namespace App\Http\Controllers;
use App\Models\User;


use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

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
        // მომხმარებლის შეტანილ ინფოს ვინახავთ 
        $attributes = request()->validate([
            'name' =>  ['required', 'max:255', 'min:3'],
            'username' =>  ['required', 'max:255', 'min:3', Rule::unique('users', 'username')],
            'password' => ['required', 'max:255', 'min:3'],
            'email' => ['required', 'email', 'max:255', 'min:3', Rule::unique('users', 'email')]
        ]);


        // ვინახავთ ბაზაში
        User::create($attributes);
        
        // იუზერს ვაბრუნებთ მთავარ გვერდზე
        return redirect('/');
    }
}