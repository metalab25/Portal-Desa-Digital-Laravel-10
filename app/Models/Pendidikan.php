<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendidikan extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $table = 'pendidikans';

    public function penduduks()
    {
        return $this->hasMany(Penduduk::class, 'pendidikan_id');
    }
}
