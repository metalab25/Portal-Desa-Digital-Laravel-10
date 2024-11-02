<?php

namespace App\Http\Controllers;

use App\Models\Dusun;
use App\Models\Kelompok;
use App\Models\Keluarga;
use App\Models\Penduduk;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $dusunCount     = Dusun::count();
        $pendudukCount  = Penduduk::count();
        $keluargaCount  = Keluarga::count();
        $kelompokCount  = Kelompok::count();

        return view('dashboard.index', [
            'page'      =>  'Dashboard',
            'd_count'   =>  $dusunCount,
            'p_count'   =>  $pendudukCount,
            'k_count'   =>  $keluargaCount,
            'kel_count' =>  $kelompokCount,
        ]);
    }
}
