<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

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
        $credientials = ['email' => $request->email, 'password' => $request->password];
        if (!Auth::attempt($credientials)) {
            $auth_failed = true;
            return view('login')->with(compact('auth_failed'));
        }
        if ($request->rememberme) {
            Cookie::queue('email', $credientials['email'], 120); //2 hours
            Cookie::queue('password', $credientials['password'], 120);
        }
        return redirect('/home');
    }

    function logout()
    {
        Auth::logout();
        return redirect('/home');
    }

    function getRegister()
    {
        if (Auth::check())
            return redirect('/home');
        $_countries = Country::all()->toArray();
        $countries = array_column($_countries, 'name');
        return view('register')->with(compact('countries'));
    }

    function postRegister(Request $request)
    {
        $request->validate([
            'name' => 'required|min:5',
            'email' => 'required|unique:users|email:rfc,dns',
            'password' => 'required|min:8|alpha_num|required_with:confirmPassword|same:confirmPassword',
            'confirmPassword' => 'required|min:8',
            'gender' => 'required|in:Male,Female',
            'dob' => 'required|date|after:2020-01-01|before:today',
            'country' => 'required|not_in:Country'
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'gender' => $request->gender,
            'dob' => $request->dob,
            'country' => $request->country,
            'privilege' => 'User'
        ]);

        return redirect('/login');
    }
}
