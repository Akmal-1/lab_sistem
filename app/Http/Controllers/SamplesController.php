<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sample;
use Illuminate\Support\Facades\DB;

class SamplesController extends Controller
{
    public function index()
    {
        // Mengambil semua data sampel dari database
        $samples = Sample::all();

        // Mengembalikan view samples.index dengan data sampel yang diambil
        return view('samples.index', compact('samples'));
    }

    public function create()
    {
        // Mengembalikan view untuk form request analisis (halaman create)
        return view('samples.create');
    }

    public function store(Request $request)
    {
        // Validasi data input dari form
        $request->validate([
            'date.*' => 'required|date',
            'kategori_sampel.*' => 'required|string|in:Raw Material,SnCl plant,Intermediate plant,Methyltin stabilizer plant,Tin Solder plant,Other',
            'tipe_sampel.*' => 'required|string',
            'batch_lot.*' => 'nullable|string',
            'deskripsi.*' => 'nullable|string',
            'pemohon.*' => 'required|string',
        ]);

        // Menggunakan transaksi untuk memastikan semua data tersimpan dengan benar
        DB::transaction(function () use ($request) {
            foreach ($request->date as $index => $date) {
                Sample::create([
                    'date' => $date,
                    'kategori_sampel' => $request->kategori_sampel[$index], // Menyimpan kategori sampel
                    'tipe_sampel' => $request->tipe_sampel[$index],
                    'batch_lot' => $request->batch_lot[$index],
                    'deskripsi' => $request->deskripsi[$index],
                    'pemohon' => $request->pemohon[$index],
                ]);
            }
        });

        // Redirect dengan pesan sukses
        return redirect()->route('samples.index')->with('success', 'Sample berhasil ditambahkan.');
    }
}
