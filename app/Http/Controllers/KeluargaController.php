<?php

namespace App\Http\Controllers;

use App\Models\Rt;
use App\Models\Rw;
use Carbon\Carbon;
use App\Models\Dusun;
use App\Models\Keluarga;
use App\Models\Penduduk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class KeluargaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dusuns = Dusun::orderBy('nama')->get();
        $keluarga = Keluarga::orderBy('no_kk')->withCount('anggota')->paginate(6);

        return view('dashboard.keluarga.index', [
            'page'      =>  'Keluarga',
            'dusuns'    =>  $dusuns,
            'keluargas' =>  $keluarga
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
            'no_kk'     =>  'required|numeric'
        ]);

        $validatedData['dusun_id']  = $request->dusun_id;
        $validatedData['rw_id']     = $request->rw_id;
        $validatedData['rt_id']     = $request->rt_id;
        $validatedData['alamat']    = $request->alamat;
        $validatedData['user_id']   = Auth::user()->id;

        // dd($validatedData);

        Keluarga::create($validatedData);

        Alert::success('Success', 'Data keluarga baru berhasil ditambahkan');
        return redirect()->route('keluarga.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $keluarga   = Keluarga::findOrFail($id);
        $anggota    = Penduduk::where('keluarga_id', $id)->get();

        return view('dashboard.keluarga.details', [
            'page'      => 'Details Keluarga',
            'keluarga'  => $keluarga,
            'anggota'   => $anggota
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $dusuns     = Dusun::orderBy('nama')->get();
        $penduduk   = Penduduk::orderBy('nama')->where('hubungan_keluarga_id', '1')->get();
        $keluarga   = Keluarga::findOrFail($id);

        return view('dashboard.keluarga.edit', [
            'page'              =>  'Keluarga',
            'dusuns'            =>  $dusuns,
            'kepala_keluarga'   =>  $penduduk,
            'keluarga'          =>  $keluarga
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Keluarga $keluarga)
    {
        $rules = [
            // 'no_kk'         => 'required',
            'penduduk_id'   => 'required'
        ];

        $validatedData = $request->validate($rules);

        $validatedData['dusun_id']      = $request->dusun_id;
        $validatedData['rw_id']         = $request->rw_id;
        $validatedData['rt_id']         = $request->rt_id;
        $validatedData['alamat']        = $request->alamat;
        $validatedData['user_id']       = Auth::user()->id;

        // dd($validatedData);

        Keluarga::where('id', $keluarga->id)
            ->update($validatedData);

        Alert::success('Success', 'Data keluarga baru berhasil diperbaharui');
        return redirect()->route('keluarga.index');
    }

    public function cetak($id)
    {
        $tanggalHariIni = Carbon::now();
        $keluarga       = Keluarga::findOrFail($id);
        $anggota        = Penduduk::where('keluarga_id', $id)->get();

        return view('dashboard.keluarga.cetak', [
            'page'      => 'Details Keluarga',
            'keluarga'  => $keluarga,
            'anggota'   => $anggota,
            'tanggal'   => tanggal_indonesia($tanggalHariIni, false)
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Keluarga $keluarga)
    {
        //
    }

    // Mengambil RW berdasarkan Dusun
    public function getRwByDusun($dusun_id)
    {
        $rws = Rw::orderBy('nama')->where('dusun_id', $dusun_id)->get();
        return response()->json($rws); // Kembalikan data dalam bentuk JSON
    }

    // Mengambil RT berdasarkan RW
    public function getRtByRw($rw_id)
    {
        $rts = Rt::orderBy('nama')->where('rw_id', $rw_id)->get();
        return response()->json($rts); // Kembalikan data dalam bentuk JSON
    }
}
