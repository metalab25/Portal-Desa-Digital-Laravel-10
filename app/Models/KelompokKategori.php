<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KelompokKategori extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $table = 'kelompok_kategoris';

    public function kelompok()
    {
        return $this->hasMany(Kelompok::class);
    }
}
