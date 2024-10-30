<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Kelompok;
use App\Models\Penduduk;
use Illuminate\Http\Request;
use App\Models\KelompokAnggota;
use App\Models\KelompokJabatan;
use App\Models\KelompokKategori;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class KelompokController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kelompoks_kategori = KelompokKategori::orderBy('nama')->withCount('kelompok')->get();
        $penduduks          = Penduduk::orderBy('nama')->get();
        $kelompoks          = Kelompok::orderBy('nama')->withCount('anggota')->paginate(8);

        return view('dashboard.kelompok.index', [
            'page'      => 'Kelompok',
            'kategori'  => $kelompoks_kategori,
            'penduduk'  => $penduduks,
            'kelompok'  => $kelompoks,
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
            'kelompok_kategori_id'  =>  'required',
            'penduduk_id'           =>  'required',
            'nama'                  =>  'required'
        ]);

        $validatedData['kode']      = $request->kode;
        $validatedData['deskripsi'] = $request->deskripsi;
        $validatedData['user_id']   = Auth::user()->id;

        // dd($validatedData);

        Kelompok::create($validatedData);

        Alert::success('Success', 'Data kelompok baru berhasil ditambahkan');
        return redirect()->route('kelompok.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Kelompok $kelompok)
    {
        $penduduk   = Penduduk::orderBy('nama')->get();
        $anggotas   = KelompokAnggota::orderBy('kelompok_jabatan_id', 'asc')->where('kelompok_id', $kelompok->id)->with(['penduduk.keluarga.dusun.rw.rt'])->paginate(8);
        $jabatan    = KelompokJabatan::all();

        // dd($anggotas);

        return view('dashboard.kelompok.details', [
            'page'      => 'Kelompok ' . $kelompok->nama,
            'anggota'   =>  $penduduk,
            'jabatan'   =>  $jabatan,
            'kelompok'  =>  $kelompok,
            'anggotas'  =>  $anggotas
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kelompok $kelompok)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kelompok $kelompok)
    {
        //
    }

    public function cetak($id)
    {
        $tanggalHariIni = Carbon::now();
        $kelompok = Kelompok::findOrFail($id);
        $anggotas = KelompokAnggota::orderBy('kelompok_jabatan_id', 'asc')->where('kelompok_id', $id)->with(['penduduk.keluarga.dusun.rw.rt'])->get();

        // dd($anggotas);

        return view('dashboard.kelompok.cetak', [
            'anggotas'  => $anggotas,
            'kelompok'  => $kelompok,
            'tanggal'   => tanggal_indonesia($tanggalHariIni, false)
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $kelompok = Kelompok::findOrFail($id);
        $kelompok->delete();

        Alert::success('Success', 'Data kelompok berhasil dihapus');

        return redirect()->route('kelompok.index');
    }
}
