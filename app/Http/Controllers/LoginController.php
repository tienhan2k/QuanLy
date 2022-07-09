<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //
    public function login()
    {
        return view('login');
    }

    public function loginProcess(Request $request)
    {
        # code...
        if(Auth::attempt($request->only('email', 'password')))
        {
            return redirect('/');
        }

        return redirect('/dang-nhap');
    }

    public function register()
    {
        return view('register');
    }

    public function registerUser(Request $request)
    {
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'remember_token' => Str::random(60),
        ]);
        return redirect('/dang-nhap');
    }

    public function logout()
    {
        # code...
        Auth::logout();
        return redirect('/dang-nhap');
    }
}
