<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\Models\User;
use Illuminate\Validation\Rule;

class LoginController extends Controller
{
    //
    public function create() {
        return view ('users.login');
    }

    public function store() {

        // Backend validation
        request()->validate([
            'email' => ['required', 'email'],
            'password' => 'required',
        ]);

        // $user = User::where('email',request('email'))->first();
        // if ($user) {
        //     if (Hash::check(request('password'), $user->password)) {
        //         auth()->login($user);
        //         return redirect('/');
        //     }
        //     else {
        //         return back()->withErrors([
        //             'email' => "Wrong Password."
        //         ])->withInput();
        //     }
        // } else {
        //     return back()->withErrors([
        //         'email' => "User does not exist."
        //     ]);
        // }

        // Attempt to log in the user if previously logged in before
        if (auth()->attempt([
            'email' => request('email'),
            'password' => request('password')
        ])) {
            return redirect('/');
        }
        else {
            return back()->withErrors(['email' => "Wrong credentials. Please try again."]);
        }
    }
}