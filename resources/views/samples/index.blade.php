@extends('layouts.app')

@section('title', 'Sample Requests') 
{{-- Menentukan judul halaman --}}

@section('content')
    <h3>Permintaan analisa</h3> 
    {{-- Judul utama halaman --}}

    <!-- Menampilkan pesan sukses -->
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <!-- Tombol untuk menuju ke halaman pembuatan request baru -->
    <a href="{{ route('samples.create') }}" class="btn btn-primary mb-3">Buat permintaan analisa sampel</a> 
    {{-- Tombol untuk membuat permintaan baru --}}

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
                    <th>Status</th> {{-- Kolom Status --}}
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
                        <td>{{ $sample->status }}</td> {{-- Menampilkan Status --}}
                        <td>
                            <a href="{{ route('samples.edit', $sample->id) }}" class="btn btn-primary btn-sm">Edit</a>
                            <!-- Trigger Modal -->
                            <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal-{{ $sample->id }}">
                                Delete
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="deleteModal-{{ $sample->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel-{{ $sample->id }}" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="deleteModalLabel-{{ $sample->id }}">Delete Sample</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('samples.destroy', $sample->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <div class="form-group">
                                                    <label for="reason-{{ $sample->id }}">Reason for deletion</label>
                                                    <input type="text" id="reason-{{ $sample->id }}" name="reason" class="form-control" required>
                                                </div>
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End of Modal -->
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>Tidak ada permintaan analisa sampel.</p> 
        {{-- Pesan yang ditampilkan jika tidak ada data --}}
    @endif
@endsection
