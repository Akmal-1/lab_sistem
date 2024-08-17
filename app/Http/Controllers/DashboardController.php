<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $role = $user->roles->pluck('name')->first(); // Ambil nama role pertama user
        
        // Kirim role ke view
        return view('dashboard', compact('role'));
    }
}
