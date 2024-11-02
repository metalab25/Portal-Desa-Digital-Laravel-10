<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cacat extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $table = 'cacats';

    public function penduduks()
    {
        return $this->hasMany(Penduduk::class, 'cacat_id');
    }
}
