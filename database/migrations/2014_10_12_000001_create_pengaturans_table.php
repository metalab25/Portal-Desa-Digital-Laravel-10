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
        Schema::create('pengaturans', function (Blueprint $table) {
            $table->id();
            $table->string('sebutan_desa')->nullable();
            $table->string('sebutan_kecamatan')->nullable();
            $table->string('sebutan_kabupaten')->nullable();
            $table->string('sebutan_dusun')->nullable();
            $table->string('sebutan_kepala_desa')->nullable();
            $table->string('sebutan_camat')->nullable();
            $table->string('sebutan_bupati')->nullable();
            $table->string('sebutan_kepala_dusun')->nullable();
            $table->string('singkatan_desa')->nullable();
            $table->string('singkatan_kecamatan')->nullable();
            $table->string('singkatan_kabupaten')->nullable();
            $table->string('singkatan_dusun')->nullable();
            $table->string('format_nomor_surat')->nullable();
            $table->boolean('zona_waktu')->default('1');
            $table->string('title_web')->nullable();
            $table->string('icon')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengatutans');
    }
};
