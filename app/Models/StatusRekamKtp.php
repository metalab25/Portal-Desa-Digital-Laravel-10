<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusRekamKtp extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $table = 'status_rekam_ktps';
}
