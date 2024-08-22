<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sample extends Model
{
    use HasFactory;

    // Menentukan atribut yang dapat diisi (fillable)
    protected $fillable = [
        'date',
        'kategori_sampel', // Menambahkan kategori_sampel ke dalam daftar fillable
        'tipe_sampel',
        'batch_lot',
        'deskripsi',
        'pemohon'
    ];
}
