<?php

namespace App\Http\Controllers;

use App\Models\Rw;
use App\Models\Dusun;
use App\Models\Penduduk;
use App\Models\Pengaturan;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class DusunController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $setting = Pengaturan::first();

        $dusun = Dusun::withCount('rw')->withCount('rt')->withCount('keluarga')->withCount([
            'keluarga as jumlah_kepala_keluarga_laki_laki' => function ($query) {
                $query->whereHas('anggota', function ($query) {
                    $query->where('jenis_kelamin_id', '1')
                        ->where('hubungan_keluarga_id', '1');
                });
            },
            'keluarga as jumlah_kepala_keluarga_perempuan' => function ($query) {
                $query->whereHas('anggota', function ($query) {
                    $query->where('jenis_kelamin_id', '2')
                        ->where('hubungan_keluarga_id', '1');
                });
            }
        ])->paginate(8);

        return view('dashboard.dusun.index', [
            'page'  => $setting->sebutan_dusun,
            'dusun' => $dusun
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama'  =>  'required',
        ]);

        Dusun::create($validatedData);

        Alert::success('Success', 'Data wilayah berhasil ditambahkan');
        return redirect('/desa/wilayah');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $setting = Pengaturan::first();
        $dusun = Dusun::findOrFail($id);
        $rw = Rw::orderBy('nama')->where('dusun_id', $id)->withCount('rt')->withCount('keluarga')->paginate(6);

        return view('dashboard.dusun.detail-rw', [
            'page'  =>  $setting->sebutan_dusun . ' ' . $dusun->nama,
            'dusun' =>  $dusun,
            'rws'   =>  $rw
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $setting = Pengaturan::first();
        $dusun = Dusun::findOrFail($id);
        $penduduk = Penduduk::orderBy('nama')->get();

        return view('dashboard.dusun.edit', [
            'page'      =>  'Edit Data ' . $setting->sebutan_dusun . ' ' . $dusun->nama,
            'dusun'     =>  $dusun,
            'penduduk'  =>  $penduduk
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $setting = Pengaturan::first();

        $request->validate([
            'nama'  => 'required',
            'penduduk_id' => 'nullable|exists:penduduks,id'
        ]);

        $dusun = Dusun::findOrFail($id);
        $dusun->nama = $request->nama;
        $dusun->penduduk_id = $request->penduduk_id;
        $dusun->save();

        Alert::success('Success', 'Data ' . $setting->sebutan_dusun . ' berhasil diperbaharui');
        return redirect()->route('wilayah.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $setting = Pengaturan::first();
        $dusun = Dusun::findOrFail($id);

        $dusun->delete();

        Alert::success('Success', 'Data' . $setting->sebutan_dusun . 'berhasil dihapus');

        return redirect()->route('wilayah.index');
    }
}
