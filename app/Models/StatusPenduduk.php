<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusPenduduk extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $table = 'status_penduduks';
}
