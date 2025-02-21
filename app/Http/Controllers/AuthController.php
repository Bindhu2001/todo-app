<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    public function showSignupForm()
    {
        return view('signup');
    }

    public function signup(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users|max:255',
            'password' => 'required|min:6',
        ], [
            'name.required' => 'The name field is required.',
            'email.required' => 'The email field is required.',
            'email.email' => 'Please provide a valid email address.',
            'email.unique' => 'This email is already taken.',
            'password.required' => 'The password field is required.',
            'password.min' => 'Password must be at least 6 characters.',
      
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
        ]);

        session()->flash('success', 'Account created successfully!');
        return redirect()->route('login.form');
    }

    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        if (Auth::attempt($request->only('email', 'password'))) {
            return redirect()->route('dashboard')->with('success', 'Welcome back!');
        }

        return redirect()->route('login.form')->with('error', 'Invalid credentials');
    }

    public function dashboard()
    {

        if (!Auth::check()) {
            return redirect()->route('login.form')->with('error', 'Please login to access the dashboard');
        }

        return view('dashboard', ['user' => Auth::user()]);
    }

    public function logout()
    {
        Auth::logout();
        session()->flash('success', 'Logged out successfully!');
        return redirect()->route('login.form');
    }
}
