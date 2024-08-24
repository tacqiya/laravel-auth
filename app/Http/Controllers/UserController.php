<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function registerpage() {
        return view('font-page.register');
    }

    public function register(Request $request) {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:admin',
            'password' => 'required|min:6',
        ]);
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        if($user) {
            return redirect('/login')->with('success', 'Registration successful! Please log in.');
        }
        return redirect('/register')->with('error', 'Failed to register account.');
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
            return redirect()->intended('/mainpage');
        }
        return redirect('/login')->with('error', 'Invalid credentials. Please try again.');
    }

    public function mainpage() {
        return view('font-page.index');
    }

    public function logout(Request $request) {
        return redirect('login')->with(Auth::logout());
      }
}
