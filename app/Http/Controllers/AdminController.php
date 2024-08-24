<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    // public function index() {
    //     return view()
    // } 

    public function showregister() {
        return view('admin.auth.register');
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

    public function showlogin() {
        return view('admin.auth.login');
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

    public function dashboard() {
        return view('admin.dashboard');
    }

    public function logout(Request $request) {
        // Auth::logout();
        // return redirect('/adminlogin');
        return redirect('adminlogin')->with(Auth::logout());
      }
}
