@extends('layouts.app')

@section('title', 'Edit Sample Request')

@section('content')
    <h3>Edit Permintaan Analisa</h3>

    <form action="{{ route('samples.update', $sample->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <!-- Fields for sample data -->
        <div class="form-group">
            <label for="date">Date</label>
            <input type="date" name="date" class="form-control" value="{{ $sample->date }}" required>
        </div>
        <div class="form-group">
            <label for="kategori_sampel">Kategori Sampel</label>
            <select name="kategori_sampel" class="form-control" required>
                <option value="Raw Material" {{ $sample->kategori_sampel == 'Raw Material' ? 'selected' : '' }}>Raw Material</option>
                <option value="SnCl plant" {{ $sample->kategori_sampel == 'SnCl plant' ? 'selected' : '' }}>SnCl plant</option>
                <option value="Intermediate plant" {{ $sample->kategori_sampel == 'Intermediate plant' ? 'selected' : '' }}>Intermediate plant</option>
                <option value="Methyltin stabilizer plant" {{ $sample->kategori_sampel == 'Methyltin stabilizer plant' ? 'selected' : '' }}>Methyltin stabilizer plant</option>
                <option value="Tin Solder plant" {{ $sample->kategori_sampel == 'Tin Solder plant' ? 'selected' : '' }}>Tin Solder plant</option>
                <option value="Other" {{ $sample->kategori_sampel == 'Other' ? 'selected' : '' }}>Other</option>
            </select>
        </div>
        <div class="form-group">
            <label for="tipe_sampel">Tipe Sampel</label>
            <input type="text" name="tipe_sampel" class="form-control" value="{{ $sample->tipe_sampel }}" required>
        </div>
        <div class="form-group">
            <label for="batch_lot">Batch/Lot</label>
            <input type="text" name="batch_lot" class="form-control" value="{{ $sample->batch_lot }}">
        </div>
        <div class="form-group">
            <label for="deskripsi">Deskripsi</label>
            <textarea name="deskripsi" class="form-control">{{ $sample->deskripsi }}</textarea>
        </div>
        <div class="form-group">
            <label for="pemohon">Pemohon</label>
            <input type="text" name="pemohon" class="form-control" value="{{ $sample->pemohon }}" required>
        </div>

        <!-- Field for reason of update -->
        <div class="form-group">
            <label for="reason">Reason for Update</label>
            <textarea name="reason" class="form-control" required></textarea>
        </div>

        <button type="submit" class="btn btn-success">Update</button>
    </form>
@endsection
