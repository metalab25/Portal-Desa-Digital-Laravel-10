<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agama extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $table = 'agamas';

    public function penduduks()
    {
        return $this->hasMany(Penduduk::class, 'agama_id');
    }
}
