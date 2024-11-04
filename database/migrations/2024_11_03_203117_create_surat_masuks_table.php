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
        Schema::create('surat_masuks', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_urut')->nullable();
            $table->string('nomor_surat')->nullable();
            $table->foreignId('klasifikasi_surat_id')->nullable();
            $table->date('tanggal_surat');
            $table->timestamp('tanggal_catat');
            $table->string('pengirim')->nullable();
            $table->text('perihal')->nullable();
            $table->json('pamong_id')->nullable();
            $table->text('isi_disposisi')->nullable();
            $table->string('dokumen')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surat_masuks');
    }
};
