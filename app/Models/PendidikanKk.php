<?php

namespace App\Models;

use App\Models\Penduduk;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PendidikanKk extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $table = 'pendidikan_kks';

    public function penduduks()
    {
        return $this->hasMany(Penduduk::class, 'pendidikan_kk_id');
    }
}
