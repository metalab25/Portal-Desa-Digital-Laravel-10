<?php

namespace App\Models;

use App\Models\Keluarga;
use App\Models\Penduduk;
use App\Models\BantuanSasaran;
use App\Models\BantuanPenerima;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Bantuan extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $table = 'bantuans';

    public function bantuan_sasaran()
    {
        return $this->belongsTo(BantuanSasaran::class);
    }

    public function sasarans()
    {
        return $this->hasMany(BantuanSasaran::class);
    }
}
