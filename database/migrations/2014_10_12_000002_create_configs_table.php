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
        Schema::create('configs', function (Blueprint $table) {
            $table->id();
            $table->string('nama_desa');
            $table->string('kode_desa');
            $table->string('nama_kepala_desa');
            $table->string('nip_kepala_desa')->nullable();
            $table->string('phone_kepala_desa')->nullable();
            $table->string('kode_pos');
            $table->string('nama_kecamatan');
            $table->string('kode_kecamatan');
            $table->string('nama_kepala_camat');
            $table->string('nip_kepala_camat')->nullable();
            $table->string('nama_kabupaten');
            $table->string('kode_kabupaten');
            $table->foreignId('provinsi_id');
            $table->string('logo')->nullable();
            $table->string('ttd')->nullable();
            $table->string('lat')->nullable();
            $table->string('lang')->nullable();
            $table->string('zoom')->nullable();
            $table->string('map_tipe')->nullable();
            $table->longText('path')->nullable();
            $table->string('alamat_kantor');
            $table->string('email_desa')->nullable();
            $table->string('telepon');
            $table->string('website')->nullable();
            $table->longText('kantor_desa')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('configs');
    }
};
