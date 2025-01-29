<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use function Laravel\Prompts\password;

class RegisterUserController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }

    public function store(){
        $validateAttributes = request()->validate([
            'name'=>['required'],
            'email'=>['required','email'],
            'password'=>['required']
        ]);

        $user = User::create($validateAttributes);

        Auth::login($user);

        return redirect('/jobs');
    }
}
