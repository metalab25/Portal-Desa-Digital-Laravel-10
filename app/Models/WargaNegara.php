<?php

namespace App\Models;

use App\Models\Penduduk;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class WargaNegara extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $table = 'warga_negaras';

    public function penduduks()
    {
        return $this->hasMany(Penduduk::class, 'warga_negara_id');
    }
}
