<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth; // Tambahkan ini

class RegisterController extends Controller
{
    // Tambahkan metode ini untuk menampilkan form registrasi
    public function showRegistrationForm()
    {
        $roles = Role::all(); // Mengambil semua role untuk ditampilkan di form registrasi
        return view('auth.register', compact('roles'));
    }

    public function register(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|string|exists:roles,name',
        ]);

        // Buat user baru
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Tambahkan role ke user
        $role = Role::where('name', $request->role)->first();
        $user->roles()->attach($role);

        // Login otomatis setelah registrasi
        Auth::login($user);

        // Redirect ke dashboard atau halaman lain setelah registrasi
        return redirect()->route('dashboard');
    }
}
