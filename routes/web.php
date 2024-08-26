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
| Route untuk Halaman Home/Welcome
|--------------------------------------------------------------------------
|
| Route ini akan menampilkan halaman welcome sebagai halaman utama dari
| aplikasi Anda. File view yang digunakan adalah `welcome.blade.php`.
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('home');

/*
|--------------------------------------------------------------------------
| Routes untuk Autentikasi (Login, Register, Logout)
|--------------------------------------------------------------------------
|
| Berikut adalah rute yang menangani proses autentikasi seperti login,
| register, dan logout.
|
*/

Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');

Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'register']);

/*
|--------------------------------------------------------------------------
| Routes untuk Halaman yang Dilindungi (Authenticated Pages)
|--------------------------------------------------------------------------
|
| Semua rute di dalam grup ini hanya bisa diakses oleh pengguna yang sudah
| terautentikasi. Middleware 'auth' memastikan hal ini.
|
*/

Route::middleware('auth')->group(function () {
    /*
    |--------------------------------------------------------------------------
    | Routes untuk Manajemen Samples
    |--------------------------------------------------------------------------
    |
    | Rute-rute ini mengelola seluruh proses CRUD untuk entitas "samples".
    |
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
    |
    | Rute ini menangani tampilan profil pengguna.
    |
    */
    Route::get('profile', [ProfileController::class, 'show'])->name('profile');
});
