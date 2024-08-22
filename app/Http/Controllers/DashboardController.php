<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\Sample;
use App\Models\AnalysisResult; // Pastikan untuk mengimpor model AnalysisResult

class DashboardController extends Controller
{
    public function index()
    {
        // Mendapatkan user yang sedang login
        $user = Auth::user();

        // Memastikan user memiliki setidaknya satu role
        if (!$user || !$user->roles()->exists()) {
            // Redirect ke halaman login jika tidak ada role
            return redirect('/login')->withErrors(['role' => 'Role tidak ditemukan untuk user ini.']);
        }

        // Mengambil role pertama dari user
        $role = $user->firstRole;

        // Memastikan bahwa role tidak null
        if ($role) {
            switch ($role->name) {
                case 'Admin Lab':
                    return view('dashboard.admin_lab');
                case 'Analist':
                    return view('dashboard.analist');
                case 'Foreman Lab':
                    return view('dashboard.foreman_lab');
                case 'Supervisor Lab':
                    return view('dashboard.supervisor_lab');
                case 'Manager':
                    return view('dashboard.manager');
                case 'General Manager':
                    return view('dashboard.general_manager');
                case 'Quality Control':
                    // Menghitung jumlah sampel yang telah dikirim
                    $jumlahSampel = Sample::count();

                    // Mengambil hasil analisa terbaru
                    $hasilAnalisa = AnalysisResult::latest()->first();

                    // Mengirim data ke view
                    return view('dashboard.quality_control', compact('jumlahSampel', 'hasilAnalisa'));
                case 'Internal Customer':
                    return view('dashboard.internal_customer');
                case 'Guest':
                    return view('dashboard.guest');
                default:
                    return redirect('/login')->withErrors(['role' => 'Role tidak valid.']);
            }
        }

        return redirect('/login')->withErrors(['role' => 'Role tidak ditemukan atau tidak valid.']);
    }
}
