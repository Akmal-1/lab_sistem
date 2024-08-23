<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\SamplesController;
use App\Http\Controllers\ProfileController; // Pastikan ProfileController diimpor

// Route ke halaman welcome
Route::get('/', function () {
    return view('welcome');
});

// Route untuk halaman login
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);

// Route untuk logout dengan middleware auth
Route::post('logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');

// Route untuk halaman register
Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'register']);

// Route yang dilindungi oleh middleware 'auth'
Route::middleware('auth')->group(function () {
    // Alihkan ke halaman samples setelah login
    Route::get('/samples', [SamplesController::class, 'index'])->name('samples.index');

    // Route untuk menyimpan data sample
    Route::post('/samples/store', [SamplesController::class, 'store'])->name('samples.store');

    // Route untuk menampilkan form request analysis
    Route::get('/samples/create', [SamplesController::class, 'create'])->name('samples.create');

    // Route untuk edit sample
    Route::get('/samples/{id}/edit', [SamplesController::class, 'edit'])->name('samples.edit');

    // Route untuk update sample
    Route::put('/samples/{id}', [SamplesController::class, 'update'])->name('samples.update');

    // Route untuk delete sample
    Route::delete('/samples/{id}', [SamplesController::class, 'destroy'])->name('samples.destroy');

    // Route untuk halaman profile
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile');
});
