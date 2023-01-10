<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // TODO: Move the Auth::check() to do grouping, it's cleaner and can possibly gain bonus points

    function getLogin()
    {
        if (Auth::check())
            return redirect('/home');
        return view('login');
    }

    function postLogin(Request $request)
    {
        // Auth::attempt(['email' => $email, 'password' => $password]);
        return redirect('/home');
    }

    function getRegister()
    {
        if (Auth::check())
            return redirect('/home');
        // return view('register');
    }

    function postRegister()
    {
        // Create data using model, insert/save it
        // return redirect('/login');
    }
}
