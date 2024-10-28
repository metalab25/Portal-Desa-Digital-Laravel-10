<?php

namespace App\Models;

use App\Models\Rw;
use App\Models\Dusun;
use App\Models\Keluarga;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Rt extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $table = 'rts';

    public function dusun()
    {
        return $this->belongsTo(Dusun::class);
    }

    public function rw()
    {
        return $this->belongsTo(Rw::class);
    }

    public function keluarga()
    {
        return $this->hasMany(Keluarga::class);
    }
}
