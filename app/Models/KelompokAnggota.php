<?php

namespace App\Models;

use App\Models\Dusun;
use App\Models\Kelompok;
use App\Models\Keluarga;
use App\Models\Penduduk;
use App\Models\KelompokJabatan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class KelompokAnggota extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $table = 'kelompok_anggotas';

    public function kelompok()
    {
        return $this->belongsTo(Kelompok::class);
    }

    public function penduduk()
    {
        return $this->belongsTo(Penduduk::class);
    }

    public function kelompok_jabatan()
    {
        return $this->belongsTo(KelompokJabatan::class);
    }

    public function dusun()
    {
        return $this->hasOneThrough(
            Dusun::class,
            Keluarga::class,
            'id',          // Foreign key di model Keluarga (ke Dusun)
            'id',          // Foreign key di model Dusun
            'id',          // Foreign key di model RW
            'id',          // Foreign key di model RT
            'keluarga_id', // Foreign key di model AnggotaKelompok (ke Keluarga)
            'dusun_id',     // Foreign key di model Keluarga (ke Dusun)
            'rw_id',    // Foreign key di model Keluarga (ke Dusun)
            'rt_id'     // Foreign key di model Keluarga (ke Dusun)
        );
    }
}
