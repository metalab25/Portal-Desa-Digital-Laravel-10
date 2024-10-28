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
        Schema::create('keluargas', function (Blueprint $table) {
            $table->id();
            $table->string('no_kk', '16')->unique();
            $table->foreignId('penduduk_id')->nullable();
            $table->foreignId('dusun_id')->nullable();
            $table->foreignId('rw_id')->nullable();
            $table->foreignId('rt_id')->nullable();
            $table->text('alamat')->nullable();
            $table->dateTime('tanggal_cetak')->nullable();
            $table->foreignId('user_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('keluargas');
    }
};
