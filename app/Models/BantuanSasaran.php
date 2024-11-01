<?php

namespace App\Models;

use App\Models\Bantuan;
use App\Models\BantuanPenerima;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BantuanSasaran extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $table = 'bantuan_sasarans';

    public function bantuan()
    {
        return $this->belongsTo(Bantuan::class);
    }

    public function penerimas()
    {
        return $this->hasMany(BantuanPenerima::class);
    }
}
