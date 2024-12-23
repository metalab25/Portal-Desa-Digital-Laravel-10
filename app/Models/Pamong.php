<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pamong extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $table = 'pamongs';

    public function penduduk()
    {
        return $this->belongsTo(Penduduk::class);
    }

    public function jabatan()
    {
        return $this->belongsTo(Jabatan::class);
    }
}
