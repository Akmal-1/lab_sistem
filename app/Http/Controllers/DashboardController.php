<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
{
    $user = Auth::user();

    // Pastikan pengguna memiliki setidaknya satu role
    if (!$user || !$user->roles()->exists()) {
        return redirect('/login')->withErrors(['role' => 'Role tidak ditemukan untuk user ini.']);
    }

    // Menggunakan accessor getFirstRoleAttribute untuk mendapatkan role pertama
    $role = $user->firstRole;

    // Pastikan role tidak null sebelum mengakses name
    if ($role) {
        switch ($role->name) {
            case 'Quality Control':
                return view('dashboard_parts.quality_control');
            case 'Operator Lab':
                return view('dashboard_parts.operator_lab');
            // Tambahkan role lainnya
            default:
                return redirect('/login')->withErrors(['role' => 'Role tidak valid.']);
        }
    }

    return redirect('/login')->withErrors(['role' => 'Role tidak ditemukan atau tidak valid.']);
}

}
