<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/adminregister', [AdminController::class, 'showregister']);
Route::post('/adminregister', [AdminController::class, 'register'])->name('adminregister');

Route::get('/adminlogin', [AdminController::class, 'showlogin']);
Route::post('/adminlogin', [AdminController::class, 'login'])->name('adminlogin');


// Route::prefix('admin')->group(function () {
//     Route::get('/dashboard', [AdminController::class, 'dashboard']);
// });
Route::get('/dashboard', [AdminController::class, 'dashboard']);


Route::get('/register', [UserController::class, 'registerpage']);
Route::post('/register', [UserController::class, 'register'])->name('register');

Route::get('/login', [UserController::class, 'loginpage']);
Route::post('/login', [UserController::class, 'login'])->name('login');

Route::get('/mainpage', [UserController::class, 'mainpage']);