<?php

namespace App\Models;

use Carbon\Carbon;
use App\Models\Agama;
use App\Models\Cacat;
use App\Models\Dusun;
use App\Models\CaraKb;
use App\Models\Keluarga;
use App\Models\Kehamilan;
use App\Models\StatusKtp;
use App\Models\Pendidikan;
use App\Models\StatusKawin;
use App\Models\WargaNegara;
use App\Models\JenisKelamin;
use App\Models\SakitMenahun;
use App\Models\GolonganDarah;
use App\Models\JenisKelahiran;
use App\Models\StatusPenduduk;
use App\Models\TempatKelahiran;
use App\Models\HubunganKeluarga;
use App\Models\PenolongKelahiran;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Penduduk extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $table = 'penduduks';

    public function keluarga()
    {
        return $this->belongsTo(Keluarga::class);
    }

    public function dusun()
    {
        return $this->belongsTo(Dusun::class);
    }

    public function pendidikan_kk()
    {
        return $this->belongsTo(PendidikanKk::class);
    }
    public function pendidikan()
    {
        return $this->belongsTo(Pendidikan::class);
    }

    public function pekerjaan()
    {
        return $this->belongsTo(Pekerjaan::class);
    }

    public function jenis_kelamin()
    {
        return $this->belongsTo(JenisKelamin::class);
    }

    public function hubungan_keluarga()
    {
        return $this->belongsTo(HubunganKeluarga::class);
    }

    public function agama()
    {
        return $this->belongsTo(Agama::class);
    }

    public function status_penduduk()
    {
        return $this->belongsTo(StatusPenduduk::class);
    }

    public function jenis_kelahiran()
    {
        return $this->belongsTo(JenisKelahiran::class);
    }

    public function penolong_kelahiran()
    {
        return $this->belongsTo(PenolongKelahiran::class);
    }

    public function tempat_kelahiran()
    {
        return $this->belongsTo(TempatKelahiran::class);
    }

    public function warga_negara()
    {
        return $this->belongsTo(WargaNegara::class);
    }

    public function status_kawin()
    {
        return $this->belongsTo(StatusKawin::class);
    }

    public function golongan_darah()
    {
        return $this->belongsTo(GolonganDarah::class);
    }

    public function cacat()
    {
        return $this->belongsTo(Cacat::class);
    }

    public function sakit_menahun()
    {
        return $this->belongsTo(SakitMenahun::class);
    }

    public function kehamilan()
    {
        return $this->belongsTo(Kehamilan::class);
    }

    public function cara_kb()
    {
        return $this->belongsTo(CaraKb::class);
    }

    public function status_ktp()
    {
        return $this->belongsTo(StatusKtp::class);
    }

    public function status_rekam_ktp()
    {
        return $this->belongsTo(StatusRekamKtp::class);
    }

    public function getUmurAttribute()
    {
        return Carbon::parse($this->tanggal_lahir)->age;
    }

    // public function tanggalLahir(): Attribute
    // {
    //     return new Attribute(
    //         get: fn() => \Carbon\Carbon::parse($this->attributes['tanggal_lahir'])->format('d-m-Y')
    //     );
    // }
}
