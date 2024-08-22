@extends('layouts.app')

@section('title', 'Sample Requests') {{-- Menentukan judul halaman --}}

@section('content')
    <h3>Permintaan analisa</h3> {{-- Judul utama halaman --}}

    <!-- Menampilkan pesan sukses -->
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <!-- Tombol untuk menuju ke halaman pembuatan request baru -->
    <a href="{{ route('samples.create') }}" class="btn btn-primary mb-3">Buat permintaan analisa sampel</a> {{-- Tombol untuk membuat permintaan baru --}}

    <!-- Cek apakah ada data samples -->
    @if($samples->count() > 0)
        <table class="table">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Tipe Sampel</th>
                    <th>Batch/Lot</th>
                    <th>Deskripsi</th>
                    <th>Pemohon</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <!-- Looping data request -->
                @foreach($samples as $sample)
                    <tr>
                        <td>{{ $sample->date }}</td>
                        <td>{{ $sample->tipe_sampel }}</td>
                        <td>{{ $sample->batch_lot }}</td>
                        <td>{{ $sample->deskripsi }}</td>
                        <td>{{ $sample->pemohon }}</td>
                        <td>
                            <!-- Tindakan edit dan delete bisa ditambahkan di sini -->
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>Tidak ada permintaan analisa sampel.</p> {{-- Pesan yang ditampilkan jika tidak ada data --}}
    @endif
@endsection
