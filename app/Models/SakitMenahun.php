<?php

namespace App\Models;

use App\Models\Penduduk;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SakitMenahun extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $table = 'sakit_menahuns';

    public function penduduks()
    {
        return $this->hasMany(Penduduk::class, 'sakit_menahun_id');
    }
}
