<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session; // Tambahkan ini

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
    
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
    
            $user = Auth::user();
            $role = $user->roles()->first()->name; // Asumsi Anda sudah memiliki relasi many-to-many untuk roles
    
            // Tambahkan pesan sukses login
            Session::flash('message', 'Login berhasil! Selamat datang kembali.');
    
            // Redirect berdasarkan role
            switch ($role) {
                case 'Quality Control':
                    return redirect()->intended('/dashboard/quality_control');
                case 'Operator Lab':
                    return redirect()->intended('/dashboard/operator_lab');
                // Tambahkan role lainnya
                default:
                    return redirect('/dashboard');
            }
        }
    
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }
    

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login'); // Mengarahkan ke halaman login setelah logout
    }
}

