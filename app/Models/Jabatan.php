<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jabatan extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $table = 'jabatans';

    public function pamong()
    {
        return $this->hasMany(Pamong::class, 'jabatan_id');
    }
}
