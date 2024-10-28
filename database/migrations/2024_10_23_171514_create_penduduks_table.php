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
        Schema::create('penduduks', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('nik')->unique();
            $table->foreignId('keluarga_id');
            $table->foreignId('hubungan_keluarga_id');
            $table->foreignId('jenis_kelamin_id');
            $table->foreignId('agama_id');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->time('waktu_lahir')->nullable();
            $table->string('no_akta_lahir')->nullable();
            $table->foreignId('status_ktp_id')->nullable();
            $table->foreignId('status_rekam_ktp_id')->nullable();
            $table->foreignId('pendidikan_kk_id');
            $table->foreignId('pendidikan_id');
            $table->foreignId('pekerjaan_id');
            $table->foreignId('status_kawin_id');
            $table->foreignId('warga_negara_id');
            $table->string('no_paspor')->nullable();
            $table->date('tanggal_akhir_paspor')->nullable();
            $table->string('no_kitas')->nullable();
            $table->date('tanggal_akhir_kitas')->nullable();
            $table->foreignId('golongan_darah_id');
            $table->foreignId('status_penduduk_id');
            $table->foreignId('status_dasar_id')->nullable();
            $table->foreignId('cacat_id')->nullable();
            $table->foreignId('sakit_menahun_id')->nullable();
            $table->foreignId('cara_kb_id')->nullable();
            $table->foreignId('kehamilan_id')->nullable();
            $table->string('telepon')->nullable();
            $table->string('email')->nullable();
            $table->text('alamat_sekarang')->nullable();
            $table->text('alamat_sebelumnya')->nullable();
            $table->string('nik_ayah')->nullable();
            $table->string('nama_ayah')->nullable();
            $table->string('nik_ibu')->nullable();
            $table->string('nama_ibu')->nullable();
            $table->date('tanggal_kawin')->nullable();
            $table->string('no_akta_kawin')->nullable();
            $table->date('tanggal_cerai')->nullable();
            $table->string('no_akta_cerai')->nullable();
            $table->string('anak_ke')->nullable();
            $table->string('berat_lahir')->nullable();
            $table->string('panjang_lahir')->nullable();
            $table->foreignId('penolong_kelahiran_id')->nullable();
            $table->foreignId('tempat_kelahiran_id')->nullable();
            $table->foreignId('jenis_kelahiran_id')->nullable();
            $table->string('foto')->nullable();
            $table->foreignId('user_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penduduks');
    }
};
