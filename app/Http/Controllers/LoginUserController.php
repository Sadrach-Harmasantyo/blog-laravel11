<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginUserController extends Controller
{
    public function login(){

        return view('auth.login');
    }

    public function store(Request $request){
        //validate from request
        $request->validate([
            'email' => ['required','email'],
            'password' => ['required','string','min:8'],
        ]);
        
        //attemp to log the user in
        if(Auth::guard('web')->attempt(['email' => $request->email, 'password' => $request->password])){
            return redirect()->intended(route('posts.index'));
        }

        if(!Auth::guard('web')->attempt($request->only('email', 'password'))){
            return back()->withErrors([
                'email' => 'The provided credentials are not correct.'
            ]);
        }


    }

    public function logout(Request $request){

        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return to_route('posts.index');
    }
}
