<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CaraKb extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $table = 'cara_kbs';

    public function penduduks()
    {
        return $this->hasMany(Penduduk::class, 'cara_kb_id');
    }
}
