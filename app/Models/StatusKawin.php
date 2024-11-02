<?php

namespace App\Models;

use App\Models\Penduduk;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class StatusKawin extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $table = 'status_kawins';

    public function penduduks()
    {
        return $this->hasMany(Penduduk::class, 'status_kawin_id');
    }
}
