<?php

namespace App\Http\Controllers;

use App\Models\Bantuan;
use App\Models\BantuanPenerima;
use App\Models\Kelompok;
use App\Models\Keluarga;
use App\Models\Penduduk;
use Illuminate\Http\Request;
use App\Models\BantuanSasaran;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class BantuanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bantuan = Bantuan::orderBy('nama')->paginate(8);

        $title = 'Hapus Data Bantuan!';
        $text = "Anda yakin inigin menghapus data ini ?";
        confirmDelete($title, $text);

        return view('dashboard.bantuan.index', [
            'page'      => 'Program Bantuan',
            'bantuan'   => $bantuan
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $sasaran = BantuanSasaran::all();

        return view('dashboard.bantuan.add', [
            'page'      => 'Tambah Program Bantuan',
            'sasaran'   => $sasaran
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama'                  =>  'required',
            'bantuan_sasaran_id'    =>  'required',
            'mulai'                 =>  'required',
            'akhir'                 =>  'required',
        ]);

        $validatedData['deskripsi']   = $request->deskripsi;
        $validatedData['user_id']   = Auth::user()->id;

        // dd($validatedData);

        Bantuan::create($validatedData);

        Alert::success('Success', 'Data program bantuan baru berhasil ditambahkan');
        return redirect()->route('bantuan.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $bantuan    = Bantuan::findOrFail($id);
        $keluarga   = Keluarga::all();
        $kelompok   = Kelompok::all();
        $penduduk   = Penduduk::all();
        $penerima   = BantuanPenerima::where('bantuan_id', $id)->paginate(4);

        $title = 'Hapus Penerima Bantuan!';
        $text = "Anda yakin inigin menghapus data ini ?";
        confirmDelete($title, $text);


        return view('dashboard.bantuan.details', [
            'page'      => $bantuan->nama,
            'bantuan'   => $bantuan,
            'keluarga'  => $keluarga,
            'kelompok'  => $kelompok,
            'penduduk'  => $penduduk,
            'penerima'  => $penerima
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $bantuan    = Bantuan::findOrFail($id);

        $sasaran = BantuanSasaran::all();

        return view('dashboard.bantuan.edit', [
            'page'      => 'Edit Program Bantuan',
            'sasaran'   => $sasaran,
            'bantuan'   => $bantuan
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Bantuan $bantuan)
    {
        $rules = [
            'nama'                  =>  'required',
            'bantuan_sasaran_id'    =>  'required',
            'mulai'                 =>  'required',
            'akhir'                 =>  'required',
        ];

        $validatedData = $request->validate($rules);

        $validatedData['deskripsi']    = $request->deskripsi;

        Bantuan::where('id', $bantuan->id)
            ->update($validatedData);

        Alert::success('Success', 'Data bantuan berhasil diperbaharui');
        return redirect()->route('bantuan.index');
    }

    public function cetakBantuan($id)
    {
        $bantuan    = Bantuan::findOrFail($id);
        $keluarga   = Keluarga::all();
        $kelompok   = Kelompok::all();
        $penduduk   = Penduduk::all();
        $penerima   = BantuanPenerima::where('bantuan_id', $id)->paginate(4);

        return view('dashboard.bantuan.cetak-bantuan', [
            'page'      => $bantuan->nama,
            'bantuan'   => $bantuan,
            'keluarga'  => $keluarga,
            'kelompok'  => $kelompok,
            'penduduk'  => $penduduk,
            'penerima'  => $penerima
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $bantuan = Bantuan::findOrFail($id);
        $bantuan->delete();

        Alert::success('Success', 'Data bantuan berhasil dihapus');

        return redirect()->route('bantuan.index');
    }
}
