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
                    <th>Action</th>
                </tr>
            </thead>
            <tbody id="sample-table-body">
                <tr>
                    <td><input type="text" name="date[]" placeholder="dd/mm/yyyy"></td>
                    <td>
                        <select name="tipe_sampel[]">
                            <option value="DMT Line 1">DMT Line 1</option>
                            <option value="DMT Line 2">DMT Line 2</option>
                            <option value="DMT Line 3">DMT Line 3</option>
                        </select>
                    </td>
                    <td><input type="text" name="batch_lot[]"></td>
                    <td><input type="text" name="deskripsi[]"></td>
                    <td><input type="text" name="nama[]" placeholder="Auto" readonly></td>
                    <td>
                        <button class="view"><i class="fas fa-eye"></i></button>
                        <button class="edit"><i class="fas fa-edit"></i></button>
                        <button class="save"><i class="fas fa-save"></i></button>
                        <button class="delete"><i class="fas fa-trash"></i></button>
                    </td>
                </tr>
                <!-- Baris tabel tambahan akan ditambahkan di sini melalui JS -->
            </tbody>
        </table>
    </div>
    <button type="button" id="add-sample">Add Sample</button>
    <button type="submit">Send request</button>
@endsection
