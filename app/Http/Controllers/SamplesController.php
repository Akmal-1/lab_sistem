<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sample;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

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

        try {
            // Menggunakan transaksi untuk memastikan semua data tersimpan dengan benar
            DB::transaction(function () use ($request) {
                foreach ($request->date as $index => $date) {
                    Sample::create([
                        'date' => $date,
                        'kategori_sampel' => $request->kategori_sampel[$index],
                        'tipe_sampel' => $request->tipe_sampel[$index],
                        'batch_lot' => $request->batch_lot[$index],
                        'deskripsi' => $request->deskripsi[$index],
                        'pemohon' => $request->pemohon[$index],
                        'status' => 'Dalam Antrian', // Menambahkan status awal
                    ]);
                }
            });

            // Redirect dengan pesan sukses
            return redirect()->route('samples.index')->with('success', 'Sample berhasil ditambahkan.');

        } catch (\Exception $e) {
            // Logging error untuk keperluan debugging jika terjadi masalah
            Log::error('Error saving samples: ' . $e->getMessage());

            // Redirect kembali dengan pesan error
            return back()->withErrors('Terjadi kesalahan saat menyimpan sampel. Silakan coba lagi.');
        }
    }

    public function edit($id)
    {
        // Menemukan sample berdasarkan ID
        $sample = Sample::findOrFail($id);
        return view('samples.edit', compact('sample'));
    }

    public function update(Request $request, $id)
    {
        // Validasi data input dari form
        $request->validate([
            'date' => 'required|date',
            'kategori_sampel' => 'required|string|in:Raw Material,SnCl plant,Intermediate plant,Methyltin stabilizer plant,Tin Solder plant,Other',
            'tipe_sampel' => 'required|string',
            'batch_lot' => 'nullable|string',
            'deskripsi' => 'nullable|string',
            'pemohon' => 'required|string',
            'reason' => 'required|string', // Alasan perubahan wajib diisi
            'status' => 'required|string|in:Dalam Antrian,Sampel Sedang Dikerjakan,Selesai' // Menambahkan validasi status
        ]);

        try {
            // Menggunakan transaksi untuk memastikan semua data tersimpan dengan benar
            DB::transaction(function () use ($request, $id) {
                $sample = Sample::findOrFail($id);
                $sample->update($request->all());

                // Menambahkan audit trail
                Log::info('Sample updated', [
                    'user_id' => auth()->user()->id,
                    'sample_id' => $sample->id,
                    'changes' => $request->all(),
                    'reason' => $request->input('reason'),
                ]);
            });

            // Redirect dengan pesan sukses
            return redirect()->route('samples.index')->with('success', 'Sample berhasil diupdate.');

        } catch (\Exception $e) {
            // Logging error untuk keperluan debugging jika terjadi masalah
            Log::error('Error updating sample: ' . $e->getMessage());

            // Redirect kembali dengan pesan error
            return back()->withErrors('Terjadi kesalahan saat mengupdate sampel. Silakan coba lagi.');
        }
    }

    public function destroy(Request $request, $id)
    {
        // Validasi alasan penghapusan
        $request->validate([
            'reason' => 'required|string', // Alasan penghapusan wajib diisi
        ]);

        try {
            // Menggunakan transaksi untuk memastikan data terhapus dengan benar
            DB::transaction(function () use ($request, $id) {
                $sample = Sample::findOrFail($id);
                $sample->delete();

                // Menambahkan audit trail
                Log::info('Sample deleted', [
                    'user_id' => auth()->user()->id,
                    'sample_id' => $sample->id,
                    'reason' => $request->input('reason'),
                ]);
            });

            // Redirect dengan pesan sukses
            return redirect()->route('samples.index')->with('success', 'Sample berhasil dihapus.');

        } catch (\Exception $e) {
            // Logging error untuk keperluan debugging jika terjadi masalah
            Log::error('Error deleting sample: ' . $e->getMessage());

            // Redirect kembali dengan pesan error
            return back()->withErrors('Terjadi kesalahan saat menghapus sampel. Silakan coba lagi.');
        }
    }
}
