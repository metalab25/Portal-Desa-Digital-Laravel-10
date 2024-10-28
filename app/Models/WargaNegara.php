<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WargaNegara extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $table = 'warga_negaras';
}
