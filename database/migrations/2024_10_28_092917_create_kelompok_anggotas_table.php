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
        Schema::create('kelompok_anggotas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kelompok_id');
            $table->foreignId('penduduk_id');
            $table->foreignId('kelompok_jabatan');
            $table->string('nomor_anggota')->nullable();
            $table->foreignId('user_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kelompok_anggotas');
    }
};
