<?php

namespace App\Http\Controllers;

use App\Models\SuratKeluar;
use Illuminate\Http\Request;
use App\Models\KlasifikasiSurat;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class SuratKeluarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $surat = SuratKeluar::orderBy('nomor_urut')->paginate(8);

        $title = 'Hapus Data Surat Keluar!';
        $text = "Anda yakin inigin menghapus data ini ?";
        confirmDelete($title, $text);

        return view('dashboard.surat-keluar.index', [
            'page'          => 'Surat Keluar',
            'suratKeluars'  => $surat
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $nomorUrut      = SuratKeluar::generateNomorUrut();
        $klasifikasi    = KlasifikasiSurat::orderBy('kode')->get();

        return view('dashboard.surat-keluar.add', [
            'page'          => 'Tambah Surat Keluar',
            'nomor_urut'    => $nomorUrut,
            'klasifikasi'   => $klasifikasi
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nomor_urut'            =>  'required|unique:surat_keluars',
            'nomor_surat'           =>  'required',
            'klasifikasi_surat_id'  =>  'required',
            'tanggal_surat'         =>  'required',
            'tujuan'                =>  'required',
            'perihal'               =>  'required',
            'dokumen'               =>  'file|mimes:jpg,jpeg,png,bmp,webp,pdf|max:2048'
        ]);

        if ($request->file('dokumen')) {
            $validatedData['dokumen'] = $request->file('dokumen')->store('dokumens');
        }

        SuratKeluar::create($validatedData);

        Alert::success('Success', 'Data surat keluar berhasil ditambahkan');
        return redirect()->route('surat-keluar.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(SuratKeluar $suratKeluar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $klasifikasi    = KlasifikasiSurat::orderBy('kode')->get();
        $suratKeluar    = SuratKeluar::findOrFail($id);

        return view('dashboard.surat-keluar.edit', [
            'page'          => 'Edi Surat Keluar',
            'klasifikasi'   => $klasifikasi,
            'surat'         => $suratKeluar
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SuratKeluar $suratKeluar)
    {
        $rules = [
            'nomor_surat'           =>  'required',
            'klasifikasi_surat_id'  =>  'required',
            'tanggal_surat'         =>  'required',
            'tujuan'                =>  'required',
            'perihal'               =>  'required',
            'dokumen'               =>  'file|mimes:jpg,jpeg,png,bmp,webp,pdf|max:2048'
        ];

        if ($request->nomor_urut != $suratKeluar->nomor_urut) {
            $rules['nomor_urut'] = 'required|unique:surat_keluars';
        }

        $validatedData = $request->validate($rules);

        if ($request->file('dokumen')) {
            if ($request->oldDokumen) {
                Storage::delete($request->oldDokumen);
            }
            $validatedData['dokumen'] = $request->file('dokumen')->store('dokumens');
        }

        SuratKeluar::where('id', $suratKeluar->id)
            ->update($validatedData);

        Alert::success('Success', 'Data surat keluar berhasil diperbaharui');
        return redirect()->route('surat-keluar.index');
    }

    // Cetak Data
    public function cetak()
    {
        $surat    = SuratKeluar::orderBy('nomor_urut')->get();

        return view('dashboard.surat-keluar.cetak', [
            'page'  => 'Cetak Data Surat Keluar',
            'surat' => $surat
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $suratKeluar = SuratKeluar::findOrFail($id);

        if ($suratKeluar->dokumen) {
            Storage::disk('public')->delete($suratKeluar->dokumen);
        }

        $suratKeluar->delete();

        Alert::success('Success', 'Data surat keluar berhasil dihapus');
        return redirect()->route('surat-keluar.index');
    }
}
