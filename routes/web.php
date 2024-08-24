<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\SamplesController;
use App\Http\Controllers\ProfileController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
| Rute untuk halaman umum, autentikasi, dan area yang dilindungi oleh middleware.
|--------------------------------------------------------------------------
*/

/*
|--------------------------------------------------------------------------
| Routes untuk Autentikasi (Login, Register, Logout)
|--------------------------------------------------------------------------
*/
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');

Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'register']);

/*
|--------------------------------------------------------------------------
| Routes untuk halaman yang dilindungi (Authenticated Pages)
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {
    /*
    |--------------------------------------------------------------------------
    | Routes untuk Manajemen Samples
    |--------------------------------------------------------------------------
    */
    Route::prefix('samples')->group(function () {
        Route::get('/', [SamplesController::class, 'index'])->name('samples.index');
        Route::post('store', [SamplesController::class, 'store'])->name('samples.store');
        Route::get('create', [SamplesController::class, 'create'])->name('samples.create');
        Route::get('{id}/edit', [SamplesController::class, 'edit'])->name('samples.edit');
        Route::put('{id}', [SamplesController::class, 'update'])->name('samples.update');
        Route::delete('{id}', [SamplesController::class, 'destroy'])->name('samples.destroy');
    });

    /*
    |--------------------------------------------------------------------------
    | Routes untuk Manajemen Profile
    |--------------------------------------------------------------------------
    */
    Route::get('profile', [ProfileController::class, 'show'])->name('profile');
});
