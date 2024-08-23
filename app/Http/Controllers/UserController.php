<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function registerpage() {
        return view('font-page.register');
    }

    public function register(Request $request) {
        $request->validate([
            'username' => 'required',
            'email' => 'required|email|unique:admin',
            'password' => 'required|min:6',
        ]);
        $admin = Admin::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        if($admin) {
            return redirect('/adminlogin')->with('success', 'Registration successful! Please log in.');
        }
        return redirect('/adminregister')->with('error', 'Failed to register account.');
    }

    public function loginpage() {
        return view('font-page.login');
    }

    public function login(Request $request) {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('/');
        }
        return redirect('/dashboard')->with('error', 'Invalid credentials. Please try again.');
    }

    public function mainpage() {
        return view('font-page.index');
    }
}
