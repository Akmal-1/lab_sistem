<!-- resources/views/dashboard_parts/quality_control.blade.php -->

@extends('layouts.dashboard')

@section('content')
    <h3>Request Analysis</h3>
    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Tipe Sampel</th>
                    <th>Batch/Lot</th>
                    <th>Deskripsi</th>
                    <th>Nama</th>
                    <th>Timestamp</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody id="sample-table-body">
                <!-- Baris tabel akan ditambahkan di sini melalui JS -->
            </tbody>
        </table>
    </div>
    <button type="button" id="add-sample">Add Sample</button>
    <button type="submit">Send request</button>
@endsection
