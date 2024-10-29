<?php

namespace App\Models;

use App\Models\Rt;
use App\Models\Rw;
use App\Models\Dusun;
use App\Models\Penduduk;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Keluarga extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $table = 'keluargas';

    public function dusun()
    {
        return $this->belongsTo(Dusun::class);
    }

    public function rw()
    {
        return $this->belongsTo(Rw::class);
    }

    public function rt()
    {
        return $this->belongsTo(Rt::class);
    }

    public function penduduk()
    {
        return $this->belongsTo(Penduduk::class);
    }

    public function anggota()
    {
        return $this->hasMany(Penduduk::class, 'keluarga_id', 'id');
    }
}
