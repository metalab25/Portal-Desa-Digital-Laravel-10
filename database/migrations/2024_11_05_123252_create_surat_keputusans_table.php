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
        Schema::create('surat_keputusans', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('nomor_keputusan');
            $table->date('tanggal_keputusan');
            $table->string('nomor_dilaporkan');
            $table->date('tanggal_dilaporkan');
            $table->text('uraian_singkat');
            $table->longText('keterangan')->nullable();
            $table->string('dokumen');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surat_keputusans');
    }
};
