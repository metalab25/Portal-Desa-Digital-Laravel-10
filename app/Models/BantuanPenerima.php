<?php

namespace App\Models;

use App\Models\Kelompok;
use App\Models\Keluarga;
use App\Models\Penduduk;
use App\Models\BantuanSasaran;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BantuanPenerima extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $table = 'bantuan_penerimas';

    public function keluarga()
    {
        return $this->belongsTo(Keluarga::class);
    }

    public function penduduk()
    {
        return $this->belongsTo(Penduduk::class);
    }

    public function kelompok()
    {
        return $this->belongsTo(Kelompok::class);
    }

    public function sasaran()
    {
        return $this->belongsTo(BantuanSasaran::class);
    }
}
