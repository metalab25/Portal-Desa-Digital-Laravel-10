<?php

namespace App\Models;

use App\Models\Rt;
use App\Models\Rw;
use App\Models\Keluarga;
use App\Models\Penduduk;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Dusun extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $table = 'dusuns';

    public function rw()
    {
        return $this->hasMany(Rw::class);
    }

    public function rt()
    {
        return $this->hasMany(Rt::class);
    }

    public function keluarga()
    {
        return $this->hasMany(Keluarga::class);
    }

    public function penduduk()
    {
        return $this->belongsTo(Penduduk::class);
    }
}
