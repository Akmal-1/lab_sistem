<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnalysisResult extends Model
{
    use HasFactory;

    // Jika Anda memiliki nama tabel khusus yang berbeda dari nama model,
    // Anda bisa mendefinisikannya di sini, misalnya:
    // protected $table = 'nama_tabel';

    // Tentukan atribut yang dapat diisi (mass assignable)
    protected $fillable = [
        'sample_id', // Contoh, ini bisa berbeda tergantung skema tabel Anda
        'result_data', // Contoh, sesuaikan dengan skema tabel Anda
        // Tambahkan kolom lain yang sesuai dengan skema tabel
    ];

    // Relasi ke model Sample jika diperlukan
    public function sample()
    {
        return $this->belongsTo(Sample::class);
    }
}
