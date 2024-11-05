<?php

namespace App\Http\Controllers;

use App\Models\Peraturan;
use App\Models\Pengaturan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class PeraturanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $setting = Pengaturan::first();

        $peraturan = Peraturan::paginate(8);

        return view('dashboard.peraturan.index', [
            'page'          => 'Peraturan ' . $setting->sebutan_desa,
            'peraturans'    => $peraturan
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $setting = Pengaturan::first();

        return view('dashboard.peraturan.add', [
            'page'          => 'Tambah Peraturan ' . $setting->sebutan_desa,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama'                  =>  'required',
            'jenis_peraturan'       =>  'required',
            'tanggal_kesepakatan'   =>  'required',
            'nomor_tetapan'         =>  'required',
            'tanggal_tetapan'       =>  'required',
            'nomor_dilaporkan'      =>  'required',
            'tanggal_dilaporkan'    =>  'required',
            'nomor_lembaran_desa'   =>  'required',
            'tanggal_lembaran_desa' =>  'required',
            'nomor_berita_desa'     =>  'required',
            'tanggal_berita_desa'   =>  'required',
            'dokumen'               =>  'file|mimes:jpg,jpeg,png,bmp,webp,pdf|max:2048'
        ]);

        if ($request->file('dokumen')) {
            $validatedData['dokumen'] = $request->file('dokumen')->store('dokumens');
        }

        $validatedData['uraian_singkat'] = $request->uraian_singkat;

        Peraturan::create($validatedData);

        Alert::success('Success', 'Data peraturan berhasil ditambahkan');
        return redirect()->route('peraturan.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Peraturan $peraturan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $setting = Pengaturan::first();
        $peraturan    = Peraturan::findOrFail($id);

        return view('dashboard.peraturan.edit', [
            'page'      => 'Edit Peraturan ' . $setting->sebutan_desa,
            'peraturan' => $peraturan
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Peraturan $peraturan)
    {
        $rules = [
            'nama'                  =>  'required',
            'jenis_peraturan'       =>  'required',
            'tanggal_kesepakatan'   =>  'required',
            'nomor_tetapan'         =>  'required',
            'tanggal_tetapan'       =>  'required',
            'nomor_dilaporkan'      =>  'required',
            'tanggal_dilaporkan'    =>  'required',
            'nomor_lembaran_desa'   =>  'required',
            'tanggal_lembaran_desa' =>  'required',
            'nomor_berita_desa'     =>  'required',
            'tanggal_berita_desa'   =>  'required',
            'dokumen'               =>  'file|mimes:jpg,jpeg,png,bmp,webp,pdf|max:2048'
        ];

        if ($request->nomor_urut != $peraturan->nomor_urut) {
            $rules['nomor_urut'] = 'required|unique:surat_keluars';
        }

        $validatedData = $request->validate($rules);

        if ($request->file('dokumen')) {
            if ($request->oldDokumen) {
                Storage::delete($request->oldDokumen);
            }
            $validatedData['dokumen'] = $request->file('dokumen')->store('dokumens');
        }

        $validatedData['uraian_singkat'] = $request->uraian_singkat;

        Peraturan::where('id', $peraturan->id)
            ->update($validatedData);

        Alert::success('Success', 'Data peraturan berhasil diperbaharui');
        return redirect()->route('peraturan.index');
    }

    // Cetak Data
    public function cetak()
    {
        $setting = Pengaturan::first();

        $peraturan = Peraturan::paginate(8);

        return view('dashboard.peraturan.cetak', [
            'page'          => 'Cetak Peraturan ' . $setting->sebutan_desa,
            'peraturans'    => $peraturan
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $peraturan = Peraturan::findOrFail($id);

        if ($peraturan->dokumen) {
            Storage::disk('public')->delete($peraturan->dokumen);
        }

        $peraturan->delete();

        Alert::success('Success', 'Data peraturan berhasil dihapus');
        return redirect()->route('peraturan.index');
    }
}
