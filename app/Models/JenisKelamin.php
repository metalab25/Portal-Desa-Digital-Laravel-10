<?php

namespace App\Models;

use App\Models\Penduduk;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class JenisKelamin extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $table = 'jenis_kelamins';

    public function penduduks()
    {
        return $this->hasMany(Penduduk::class, 'jenis_kelamin_id');
    }
}
