<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/adminregister', [AdminController::class, 'showregister']);
Route::post('/adminregister', [AdminController::class, 'register'])->name('adminregister');

Route::get('/adminlogin', [AdminController::class, 'showlogin']);
Route::post('/adminlogin', [AdminController::class, 'login'])->name('adminlogin');

Route::get('/dashboard', [AdminController::class, 'dashboard']);