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
        Schema::create('pamongs', function (Blueprint $table) {
            $table->id();
            $table->string('nama')->nullable();
            $table->string('nik')->nullable();
            $table->string('nip')->nullable();
            $table->foreignId('jabatan_id');
            $table->foreignId('penduduk_id')->nullable();
            $table->foreignId('agama_id')->nullable();
            $table->foreignId('jenis_kelamin_id')->nullable();
            $table->string('tempat_lahir')->nullable();
            $table->string('tanggal_lahir')->nullable();
            $table->foreignId('pendidikan_kk_id')->nullable();
            $table->string('no_sk')->nullable();
            $table->string('tgl_sk')->nullable();
            $table->string('masa_jabatan')->nullable();
            $table->boolean('ttd')->default('0');
            $table->string('foto')->nullable();
            $table->boolean('status')->default('1');
            $table->foreignId('user_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pamongs');
    }
};
