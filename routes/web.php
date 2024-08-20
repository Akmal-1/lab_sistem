<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;

// Route ke halaman welcome
Route::get('/', function () {
    return view('welcome');
});

    // Route untuk halaman login
        Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
        Route::post('login', [LoginController::class, 'login']);

    // Route untuk logout dengan redirect ke halaman login setelah berhasil logout
        Route::post('logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');

    // Route untuk halaman register
        Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
        Route::post('register', [RegisterController::class, 'register']);

    // Route untuk dashboard dengan middleware auth
        Route::middleware('auth')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::get('/profile', [ProfileController::class, 'show'])->name('profile');

    // Route untuk view, edit, update, dan delete
        Route::get('/samples/{id}/view', [SampleController::class, 'view'])->name('samples.view');
        Route::get('/samples/{id}/edit', [SampleController::class, 'edit'])->name('samples.edit');
        Route::post('/samples/{id}/update', [SampleController::class, 'update'])->name('samples.update');
        Route::delete('/samples/{id}', [SampleController::class, 'delete'])->name('samples.delete');
        
});
