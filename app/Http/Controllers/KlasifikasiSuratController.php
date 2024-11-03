<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KlasifikasiSurat;
use RealRashid\SweetAlert\Facades\Alert;

class KlasifikasiSuratController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $klasifikasiSurat = KlasifikasiSurat::orderBy('kode')->paginate(8);

        $title = 'Hapus Data Klasifikasi!';
        $text = "Anda yakin inigin menghapus data ini ?";
        confirmDelete($title, $text);

        return view('dashboard.klasifikasi-surat.index', [
            'page'          => 'Klasifikasi Surat',
            'klasifikasi'   =>  $klasifikasiSurat
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
            'kode'  =>  'required|unique:klasifikasi_surats',
            'nama'  =>  'required',
        ]);

        $validatedData['deskripsi']   = $request->deskripsi;

        KlasifikasiSurat::create($validatedData);

        Alert::success('Success', 'Data klasifikasi surat berhasil ditambahkan');
        return redirect()->route('klasifikasi-surat.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(KlasifikasiSurat $klasifikasiSurat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $klasifikasi = KlasifikasiSurat::findOrFail($id);

        return view('dashboard.klasifikasi-surat.edit', [
            'page'          => 'Edit Klasifikasi Surat',
            'klasifikasi'   =>  $klasifikasi
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, KlasifikasiSurat $klasifikasiSurat)
    {
        $rules = [
            'nama'  =>  'required'
        ];

        if ($request->kode != $klasifikasiSurat->kode) {
            $rules['kode'] = 'required|unique:klasifikasi_surats';
        }

        $validatedData = $request->validate($rules);

        $validatedData['deskripsi']   = $request->deskripsi;

        KlasifikasiSurat::where('id', $klasifikasiSurat->id)
            ->update($validatedData);

        Alert::success('Success', 'Data klasifikasi surat berhasil diperbaharui');
        return redirect()->route('klasifikasi-surat.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $klasifikasi = KlasifikasiSurat::findOrFail($id);

        $klasifikasi->delete();

        Alert::success('Success', 'Data klasifikasi surat berhasil dihapus');
        return redirect()->route('klasifikasi-surat.index');
    }
}
