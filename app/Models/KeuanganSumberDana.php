<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KeuanganSumberDana extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $table = 'keuangan_sumber_danas';
}
