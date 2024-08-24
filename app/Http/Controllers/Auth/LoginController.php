<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

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
            $role = $user->roles()->first(); // Mengambil role pertama

            if (!$role) {
                return redirect('/samples')->withErrors(['role' => 'Role tidak ditemukan untuk user ini.']);
            }

            $roleName = $role->name;

            Session::flash('message', 'Login berhasil! Selamat datang kembali.'); // Tambahkan pesan sukses login

            // Redirect berdasarkan role
            switch ($roleName) {
                case 'Quality Control':
                    return redirect()->intended('/samples');
                case 'Analist':
                    return redirect()->intended('/samples');
                // Tambahkan role lainnya jika diperlukan
                default:
                    return redirect('/samples'); // Arahkan ke halaman samples sebagai fallback
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
