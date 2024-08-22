@extends('layouts.app')

@section('title', 'Ajukan Permintaan Analisa Sampel') 
{{-- Menentukan judul halaman yang akan tampil di tab browser --}}

@section('content')
    <h3>Ajukan permintaan analisa sampel</h3> 
    {{-- Judul utama halaman --}}

    <form action="{{ route('samples.store') }}" method="POST"> 
        {{-- Form untuk menyimpan data sampel ke dalam database --}}
        @csrf 
        {{-- Token keamanan untuk mencegah serangan CSRF --}}

        <!-- Div untuk kategori sampel dan tabel -->
        <div id="sample-form-container">
            <table class="table">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Kategori Sampel</th>
                        <th>Tipe Sampel</th>
                        <th>Batch/Lot</th>
                        <th>Deskripsi</th>
                        <th>Pemohon</th>
                        <th class="action-column">Action</th> 
                        {{-- Kolom untuk tombol aksi (edit/delete) --}}
                    </tr>
                </thead>
                <tbody id="sample-table-body">
                    <!-- Baris tabel akan ditambahkan di sini melalui JavaScript -->
                </tbody>
            </table>
        </div>

        <!-- Tombol untuk menambah sampel dan mengirim permintaan -->
        <button type="button" id="add-sample" class="btn btn-primary mt-3">Tambah sampel</button> 
        {{-- Tombol untuk menambah baris sampel baru --}}
        
        <button type="submit" class="btn btn-success mt-3" id="send-request" style="display: none;">
            Kirim permintaan
        </button> 
        {{-- Tombol untuk mengirimkan form, akan muncul jika ada sampel yang diinput --}}
    </form>
@endsection

@push('scripts')
    <!-- Menyertakan file JavaScript untuk mengatur form request analisa -->
    <script src="{{ asset('resources/js/form_request_analysis.js') }}"></script>
@endpush
