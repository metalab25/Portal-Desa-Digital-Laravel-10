<?php

namespace App\Models;

use App\Models\Dusun;
use App\Models\Keluarga;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Rw extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $table = 'rws';

    public function dusun()
    {
        return $this->belongsTo(Dusun::class);
    }

    public function rt()
    {
        return $this->hasMany(Rt::class);
    }

    public function keluarga()
    {
        return $this->hasMany(Keluarga::class);
    }
}
