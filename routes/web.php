<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});



// Untuk authconroller
use App\Http\Controllers\Auth\AuthController;

Route::get('login', function () {
    return view('auth.login');
})->name('login');

Route::post('login', [AuthController::class, 'login']);
Route::post('logout', [AuthController::class, 'logout'])->name('logout');


// Route untuk register
use App\Http\Controllers\Auth\RegisterController;

Route::get('register', function () {
    return view('auth.register');
})->name('register');

Route::post('register', [RegisterController::class, 'register']);


// untuk dashboard
use App\Http\Controllers\DashboardController;

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

