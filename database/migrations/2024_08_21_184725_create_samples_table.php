<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSamplesTable extends Migration
{
    public function up()
    {
        Schema::create('samples', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->string('kategori_sampel'); // Menambahkan kolom kategori_sampel
            $table->string('tipe_sampel');
            $table->string('batch_lot')->nullable();
            $table->text('deskripsi')->nullable();
            $table->string('pemohon');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('samples');
    }
}
