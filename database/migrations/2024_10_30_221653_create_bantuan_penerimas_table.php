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
        Schema::create('bantuan_penerimas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('bantuan_id');
            $table->foreignId('bantuan_sasaran_id');
            $table->foreignId('keluarga_id')->nullable();
            $table->foreignId('penduduk_id')->nullable();
            $table->foreignId('kelompok_id')->nullable();
            $table->string('no_kartu')->nullable();
            $table->string('nama_kartu')->nullable();
            $table->string('nik_kartu')->nullable();
            $table->string('tempat_lahir_kartu')->nullable();
            $table->string('tanggal_lahir_kartu')->nullable();
            $table->string('alamat_kartu')->nullable();
            $table->foreignId('user_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bantuan_penerimas');
    }
};
