<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;


class AuthController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function register()
    {
        return view('register');
    }

    // cek login
    public function authenticating(Request $request)
    {
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);

        // cek apakan login valid


        if (Auth::attempt($credentials)) {
            // cek user active 

            if (Auth::user()->status != 'active') {
                // return redirect('login')->with('status', 'Your account is not active yet. Please contact admin!');
                Auth::logout();
                $request->session()->invalidate();

                $request->session()->regenerateToken();
                // Session::flash('status', 'Failed!');
                // Session::flash('message', 'Your account is not active yet. Please contact');

                // return redirect()->intended('/login');
                return redirect('/login')->with('failed', 'Your account is not active yet. Please contact admin');
            }

            $request->session()->regenerate();

            if (Auth::user()->role_id == 1) {
                return redirect()->intended('/dashboard');
            }

            return redirect()->intended('/');
        }

        Session::flash('status', 'Failed!');
        Session::flash('message', 'Login failed!');

        return back();
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }


    public function registerProcess(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'username' => 'required|unique:users|max:255|min:6',
            'email' => 'required|email',
            'phone' => 'required|numeric|min:8',
            'address' => 'required',
            'password' => 'required|min:5|max:255'
        ]);

        $validated['password'] = Hash::make($validated['password']);

        User::create($validated);

        // The blog post is valid...
        return redirect('/login')->with('success', 'Sign Up successfully! Please contact admin to approval');
    }
}
