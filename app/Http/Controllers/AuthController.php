<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    function index()
    {
        return view('auth.login');
    }

    function login(Request $request)
    {
        Session::flash('email', $request->email);
        Session::flash('password', $request->password);

        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if ( Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect(route('dashboard'));

            // if (Auth::user()->role === 'admin') {
            // } else if (Auth::user()->role === 'user') {
            //     return redirect(route('dashboard'));
            // } else {
            //     Auth::logout();
            //     Session::flash('failed', 'You dont have that access');
            //     return redirect(route('login'));
            // }
        }

        Session::flash('failed', 'Invalid Username dan Password!');

        return redirect()->route('signin');
    }

    public function register()
    {
        return view('auth.regis');
    }

    public function regis(Request $request)
    {
        $this->validate($request, [
            'name'     => 'required|unique:users|regex:/^[a-zA-Z\s]+$/',
            'email'     => 'required|unique:users',
            'password'   => 'required|min:8',
            'retype' => 'required|same:password',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => $request->role,
        ]);

        Session::flash('success', 'Success create account!');

        return redirect()->route('signin');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

}
