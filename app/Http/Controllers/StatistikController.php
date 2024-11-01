<?php

namespace App\Http\Controllers;

use App\Models\Bantuan;
use App\Models\Kelompok;
use App\Models\Keluarga;
use App\Models\Penduduk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StatistikController extends Controller
{
    public function index()
    {
        $bantuans =  Bantuan::orderBy('nama')->get();

        return view('dashboard.statistik.index', [
            'page'      => 'Statistik Kependudukan',
            'bantuans'  => $bantuans
        ]);
    }

    public function bantuan($id)
    {
        $bantuans   = Bantuan::orderBy('nama')->get();
        $keluarga   = Keluarga::count();
        $penduduk   = Penduduk::count();
        $kelompok   = Kelompok::count();
        $program    = Bantuan::findOrFail($id);
        $penerima = DB::table('bantuan_penerimas')
            ->join('bantuan_sasarans', 'bantuan_penerimas.bantuan_sasaran_id', '=', 'bantuan_sasarans.id')
            ->where('bantuan_penerimas.bantuan_id', $id)
            // ->where('bantuan_sasarans.id', 2)
            ->count();

        return view('dashboard.statistik.bantuan', [
            'page'      => 'Statistik Program Bantuan',
            'bantuans'  => $bantuans,
            'penerima'  => $penerima,
            'penduduk'  => $penduduk,
            'keluarga'  => $keluarga,
            'kelompok'  => $kelompok,
            'program'   => $program
        ]);
    }
}
