<?php

namespace App\Http\Controllers;

use App\Models\Agama;
use App\Models\Bantuan;
use App\Models\Cacat;
use App\Models\CaraKb;
use App\Models\GolonganDarah;
use App\Models\JenisKelamin;
use App\Models\Kelompok;
use App\Models\Keluarga;
use App\Models\Pekerjaan;
use App\Models\Pendidikan;
use App\Models\PendidikanKk;
use App\Models\Penduduk;
use App\Models\SakitMenahun;
use App\Models\StatusKawin;
use App\Models\WargaNegara;
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

    public function agama()
    {
        $penduduk = Penduduk::count();
        $agamaData = Agama::withCount([
            'penduduks as total_penduduk',
            'penduduks as laki_laki_count' => function ($query) {
                $query->where('jenis_kelamin_id', 1);
            },
            'penduduks as perempuan_count' => function ($query) {
                $query->where('jenis_kelamin_id', 2);
            }
        ])->get();

        foreach ($agamaData as $agama) {
            $agama->total_percent = $penduduk > 0
                ? round(($agama->total_penduduk / $penduduk) * 100, 2)
                : 0;
            $agama->laki_laki_percent = $agama->total_penduduk > 0
                ? round(($agama->laki_laki_count / $agama->total_penduduk) * 100, 2)
                : 0;
            $agama->perempuan_percent = $agama->total_penduduk > 0
                ? round(($agama->perempuan_count / $agama->total_penduduk) * 100, 2)
                : 0;
        }

        return view('dashboard.statistik.penduduk', [
            'page'      => 'Statistik Data Agama',
            'penduduk'  => $penduduk,
            'agamaData' => $agamaData,
        ]);
    }

    public function jenisKelamin()
    {
        $penduduk = Penduduk::count();
        $sexData = JenisKelamin::withCount('penduduks as total_penduduk')->get();

        foreach ($sexData as $item) {
            $item->total_percent = $penduduk > 0
                ? round(($item->total_penduduk / $penduduk) * 100, 2)
                : 0;
        }
        return view('dashboard.statistik.penduduk', [
            'page'      => 'Statistik Data Jenis Kelamin',
            'penduduk'  => $penduduk,
            'sexData'   => $sexData,
        ]);
    }

    public function pendididkanDitempuh()
    {
        $penduduk = Penduduk::count();
        $pendidikanData = Pendidikan::withCount([
            'penduduks as total_penduduk',
            'penduduks as laki_laki_count' => function ($query) {
                $query->where('jenis_kelamin_id', 1);
            },
            'penduduks as perempuan_count' => function ($query) {
                $query->where('jenis_kelamin_id', 2);
            }
        ])->get();

        foreach ($pendidikanData as $item) {
            $item->total_percent = $penduduk > 0
                ? round(($item->total_penduduk / $penduduk) * 100, 2)
                : 0;
            $item->laki_laki_percent = $item->total_penduduk > 0
                ? round(($item->laki_laki_count / $item->total_penduduk) * 100, 2)
                : 0;
            $item->perempuan_percent = $item->total_penduduk > 0
                ? round(($item->perempuan_count / $item->total_penduduk) * 100, 2)
                : 0;
        }

        return view('dashboard.statistik.penduduk', [
            'page'              => 'Statistik Data Pendidikan Ditempuh',
            'penduduk'          => $penduduk,
            'pendidikanData'    => $pendidikanData,
        ]);
    }

    public function pendididkanKK()
    {
        $penduduk = Penduduk::count();
        $pendidikanKKData = PendidikanKk::withCount([
            'penduduks as total_penduduk',
            'penduduks as laki_laki_count' => function ($query) {
                $query->where('jenis_kelamin_id', 1);
            },
            'penduduks as perempuan_count' => function ($query) {
                $query->where('jenis_kelamin_id', 2);
            }
        ])->get();

        foreach ($pendidikanKKData as $item) {
            $item->total_percent = $penduduk > 0
                ? round(($item->total_penduduk / $penduduk) * 100, 2)
                : 0;
            $item->laki_laki_percent = $item->total_penduduk > 0
                ? round(($item->laki_laki_count / $item->total_penduduk) * 100, 2)
                : 0;
            $item->perempuan_percent = $item->total_penduduk > 0
                ? round(($item->perempuan_count / $item->total_penduduk) * 100, 2)
                : 0;
        }

        return view('dashboard.statistik.penduduk', [
            'page'              => 'Statistik Data Pendidikan KK',
            'penduduk'          => $penduduk,
            'pendidikanKKData'  => $pendidikanKKData,
        ]);
    }

    public function pekerjaan()
    {
        $penduduk = Penduduk::count();
        $pekerjaanData = Pekerjaan::withCount([
            'penduduks as total_penduduk',
            'penduduks as laki_laki_count' => function ($query) {
                $query->where('jenis_kelamin_id', 1);
            },
            'penduduks as perempuan_count' => function ($query) {
                $query->where('jenis_kelamin_id', 2);
            }
        ])->get();

        foreach ($pekerjaanData as $item) {
            $item->total_percent = $penduduk > 0
                ? round(($item->total_penduduk / $penduduk) * 100, 2)
                : 0;
            $item->laki_laki_percent = $item->total_penduduk > 0
                ? round(($item->laki_laki_count / $item->total_penduduk) * 100, 2)
                : 0;
            $item->perempuan_percent = $item->total_penduduk > 0
                ? round(($item->perempuan_count / $item->total_penduduk) * 100, 2)
                : 0;
        }

        return view('dashboard.statistik.penduduk', [
            'page'              => 'Statistik Data Pekerjaan',
            'penduduk'          => $penduduk,
            'pekerjaanData'  => $pekerjaanData,
        ]);
    }

    public function wargaNegara()
    {
        $penduduk = Penduduk::count();
        $wargaNegaraData = WargaNegara::withCount([
            'penduduks as total_penduduk',
            'penduduks as laki_laki_count' => function ($query) {
                $query->where('jenis_kelamin_id', 1);
            },
            'penduduks as perempuan_count' => function ($query) {
                $query->where('jenis_kelamin_id', 2);
            }
        ])->get();

        foreach ($wargaNegaraData as $item) {
            $item->total_percent = $penduduk > 0
                ? round(($item->total_penduduk / $penduduk) * 100, 2)
                : 0;
            $item->laki_laki_percent = $item->total_penduduk > 0
                ? round(($item->laki_laki_count / $item->total_penduduk) * 100, 2)
                : 0;
            $item->perempuan_percent = $item->total_penduduk > 0
                ? round(($item->perempuan_count / $item->total_penduduk) * 100, 2)
                : 0;
        }

        return view('dashboard.statistik.penduduk', [
            'page'              => 'Statistik Data Warga Negara',
            'penduduk'          => $penduduk,
            'wargaNegaraData'   => $wargaNegaraData,
        ]);
    }

    public function statusKawin()
    {
        $penduduk = Penduduk::count();
        $statusKawinData = StatusKawin::withCount([
            'penduduks as total_penduduk',
            'penduduks as laki_laki_count' => function ($query) {
                $query->where('jenis_kelamin_id', 1);
            },
            'penduduks as perempuan_count' => function ($query) {
                $query->where('jenis_kelamin_id', 2);
            }
        ])->get();

        foreach ($statusKawinData as $item) {
            $item->total_percent = $penduduk > 0
                ? round(($item->total_penduduk / $penduduk) * 100, 2)
                : 0;
            $item->laki_laki_percent = $item->total_penduduk > 0
                ? round(($item->laki_laki_count / $item->total_penduduk) * 100, 2)
                : 0;
            $item->perempuan_percent = $item->total_penduduk > 0
                ? round(($item->perempuan_count / $item->total_penduduk) * 100, 2)
                : 0;
        }

        return view('dashboard.statistik.penduduk', [
            'page'              => 'Statistik Data Status Kawin',
            'penduduk'          => $penduduk,
            'statusKawinData'   => $statusKawinData,
        ]);
    }

    public function golonganDarah()
    {
        $penduduk = Penduduk::count();
        $golonganDarahData = GolonganDarah::withCount([
            'penduduks as total_penduduk',
            'penduduks as laki_laki_count' => function ($query) {
                $query->where('jenis_kelamin_id', 1);
            },
            'penduduks as perempuan_count' => function ($query) {
                $query->where('jenis_kelamin_id', 2);
            }
        ])->get();

        foreach ($golonganDarahData as $item) {
            $item->total_percent = $penduduk > 0
                ? round(($item->total_penduduk / $penduduk) * 100, 2)
                : 0;
            $item->laki_laki_percent = $item->total_penduduk > 0
                ? round(($item->laki_laki_count / $item->total_penduduk) * 100, 2)
                : 0;
            $item->perempuan_percent = $item->total_penduduk > 0
                ? round(($item->perempuan_count / $item->total_penduduk) * 100, 2)
                : 0;
        }

        return view('dashboard.statistik.penduduk', [
            'page'              => 'Statistik Data Golongan Darah',
            'penduduk'          => $penduduk,
            'golonganDarahData' => $golonganDarahData,
        ]);
    }

    public function cacat()
    {
        $penduduk = Penduduk::count();
        $cacatData = Cacat::withCount([
            'penduduks as total_penduduk',
            'penduduks as laki_laki_count' => function ($query) {
                $query->where('jenis_kelamin_id', 1);
            },
            'penduduks as perempuan_count' => function ($query) {
                $query->where('jenis_kelamin_id', 2);
            }
        ])->get();

        foreach ($cacatData as $item) {
            $item->total_percent = $penduduk > 0
                ? round(($item->total_penduduk / $penduduk) * 100, 2)
                : 0;
            $item->laki_laki_percent = $item->total_penduduk > 0
                ? round(($item->laki_laki_count / $item->total_penduduk) * 100, 2)
                : 0;
            $item->perempuan_percent = $item->total_penduduk > 0
                ? round(($item->perempuan_count / $item->total_penduduk) * 100, 2)
                : 0;
        }

        return view('dashboard.statistik.penduduk', [
            'page'      => 'Statistik Data Penyandang Cacat',
            'penduduk'  => $penduduk,
            'cacatData' => $cacatData,
        ]);
    }

    public function sakitMenahun()
    {
        $penduduk = Penduduk::count();
        $sakitMenahunData = SakitMenahun::withCount([
            'penduduks as total_penduduk',
            'penduduks as laki_laki_count' => function ($query) {
                $query->where('jenis_kelamin_id', 1);
            },
            'penduduks as perempuan_count' => function ($query) {
                $query->where('jenis_kelamin_id', 2);
            }
        ])->get();

        foreach ($sakitMenahunData as $item) {
            $item->total_percent = $penduduk > 0
                ? round(($item->total_penduduk / $penduduk) * 100, 2)
                : 0;
            $item->laki_laki_percent = $item->total_penduduk > 0
                ? round(($item->laki_laki_count / $item->total_penduduk) * 100, 2)
                : 0;
            $item->perempuan_percent = $item->total_penduduk > 0
                ? round(($item->perempuan_count / $item->total_penduduk) * 100, 2)
                : 0;
        }

        return view('dashboard.statistik.penduduk', [
            'page'              => 'Statistik Data Penyandang Sakit Menahun',
            'penduduk'          => $penduduk,
            'sakitMenahunData'  => $sakitMenahunData,
        ]);
    }

    public function caraKB()
    {
        $penduduk = Penduduk::count();
        $caraKBData = CaraKb::withCount([
            'penduduks as total_penduduk',
            'penduduks as laki_laki_count' => function ($query) {
                $query->where('jenis_kelamin_id', 1);
            },
            'penduduks as perempuan_count' => function ($query) {
                $query->where('jenis_kelamin_id', 2);
            }
        ])->get();

        foreach ($caraKBData as $item) {
            $item->total_percent = $penduduk > 0
                ? round(($item->total_penduduk / $penduduk) * 100, 2)
                : 0;
            $item->laki_laki_percent = $item->total_penduduk > 0
                ? round(($item->laki_laki_count / $item->total_penduduk) * 100, 2)
                : 0;
            $item->perempuan_percent = $item->total_penduduk > 0
                ? round(($item->perempuan_count / $item->total_penduduk) * 100, 2)
                : 0;
        }

        return view('dashboard.statistik.penduduk', [
            'page'          => 'Statistik Data Akseptor KB',
            'penduduk'      => $penduduk,
            'caraKBData'    => $caraKBData,
        ]);
    }

    public function bantuanIndex()
    {
        $bantuans   = Bantuan::orderBy('nama')->get();

        return view('dashboard.statistik.bantuan', [
            'page'      => 'Statistik Program Bantuan',
            'bantuans'  => $bantuans,
        ]);
    }

    public function bantuan($id)
    {
        $bantuans   = Bantuan::orderBy('nama')->get();
        $keluarga   = Keluarga::count();
        $penduduk   = Penduduk::count();
        $kelompok   = Kelompok::count();
        $program    = Bantuan::findOrFail($id);
        $penerima   = DB::table('bantuan_penerimas')
            ->join('bantuan_sasarans', 'bantuan_penerimas.bantuan_sasaran_id', '=', 'bantuan_sasarans.id')
            ->where('bantuan_penerimas.bantuan_id', $id)
            ->count();

        return view('dashboard.statistik.bantuan-details', [
            'page'      => 'Statistik Program Bantuan',
            'bantuans'  => $bantuans,
            'penerima'  => $penerima,
            'penduduk'  => $penduduk,
            'keluarga'  => $keluarga,
            'kelompok'  => $kelompok,
            'program'   => $program
        ]);
    }

    public function bantuanCetak($id)
    {
        $bantuans   = Bantuan::orderBy('nama')->get();
        $keluarga   = Keluarga::count();
        $penduduk   = Penduduk::count();
        $kelompok   = Kelompok::count();
        $program    = Bantuan::findOrFail($id);
        $penerima = DB::table('bantuan_penerimas')
            ->join('bantuan_sasarans', 'bantuan_penerimas.bantuan_sasaran_id', '=', 'bantuan_sasarans.id')
            ->where('bantuan_penerimas.bantuan_id', $id)
            ->count();

        return view('dashboard.statistik.bantuan-cetak', [
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
