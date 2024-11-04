<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratMasuk extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $table = 'surat_masuks';

    public static function generateNomorUrut()
    {
        $latestSurat = self::latest()->first();
        $year = date('Y');

        if ($latestSurat) {
            // Ambil nomor urut terakhir, pisahkan dengan explode
            $lastNumber = intval(explode('/', $latestSurat->nomor_urut)[0]);
            $nextNumber = $lastNumber + 1;
        } else {
            $nextNumber = 1;
        }

        // Format angka menjadi tiga digit dan gabungkan dengan tahun
        return str_pad($nextNumber, 4, '0', STR_PAD_LEFT) . "/$year";
    }

    public function pamong()
    {
        return $this->belongsToMany(Pamong::class, 'pamong_id');
    }
}
