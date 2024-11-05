<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('peraturans', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('jenis_peraturan');
            $table->text('uraian_singkat')->nullable();
            $table->date('tanggal_kesepakatan');
            $table->string('nomor_tetapan');
            $table->date('tanggal_tetapan');
            $table->string('nomor_dilaporkan');
            $table->date('tanggal_dilaporkan');
            $table->string('nomor_lembaran_desa');
            $table->date('tanggal_lembaran_desa');
            $table->string('nomor_berita_desa');
            $table->date('tanggal_berita_desa');
            $table->string('dokumen')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('peraturans');
    }
};
