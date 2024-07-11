<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\Register;

use App\Models\User;

class RegisterController extends Controller
{
    //
    public function create() {
        return view ('users.register');
    }

    public function store() {
        // Backend validation
        request()->validate([
            'name' => ['required', 'min:5', 'max:50'],
            'username' => ['required', Rule::unique('users', 'username')],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => 'required',
        ]);
        
        $user = new User();
        $user->name = request('name');
        $user->username = request('username');
        $user->email = request('email');
        $user->password = request('password');
        $user->save();
        
        auth()->login($user);

        return redirect('/');
    }
}
