<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GolonganDarah extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $table = 'golongan_darahs';

    public function penduduks()
    {
        return $this->hasMany(Penduduk::class, 'golongan_darah_id');
    }
}
