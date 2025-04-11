<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;

class RegisteredUserController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }

    public function store()
    {
        $attributes = request()->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => ['required', 'email'],
            'password' => ['required', 'confirmed', Password::min(6)]
            // ->letters()
            // ->mixedCase()
            // ->numbers()
            // ->symbols()],
        ]);

        $user = User::create($attributes);
        Auth::login($user);
        return redirect("/jobs");
    }


    public function destroy()
    {
        dd('destroy registration');
     
    }
}
