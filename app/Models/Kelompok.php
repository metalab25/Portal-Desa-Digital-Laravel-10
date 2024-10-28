<?php

namespace App\Models;

use App\Models\Penduduk;
use App\Models\KelompokAnggota;
use App\Models\KelompokKategori;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Kelompok extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $table = 'kelompoks';

    public function kelompok_kategori()
    {
        return $this->belongsTo(KelompokKategori::class);
    }

    public function penduduk()
    {
        return $this->belongsTo(Penduduk::class);
    }

    public function anggota()
    {
        return $this->hasMany(KelompokAnggota::class);
    }


    public function kelompok_jabatan()
    {
        return $this->belongsTo(KelompokJabatan::class);
    }
}
