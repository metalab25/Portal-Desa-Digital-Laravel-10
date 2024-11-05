<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SuratKeputusan;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class SuratKeputusanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $surat = SuratKeputusan::orderBy('nama')->paginate(8);

        $title = 'Hapus Data Surat Keputusan!';
        $text = "Anda yakin inigin menghapus data ini ?";
        confirmDelete($title, $text);

        return view('dashboard.surat-keputusan.index', [
            'page'              => 'Surat Keputusan',
            'suratKeputusans'   => $surat
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.surat-keputusan.add', [
            'page'              => 'Tambah Surat Keputusan',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama'                  =>  'required',
            'nomor_keputusan'       =>  'required',
            'tanggal_keputusan'     =>  'required',
            'nomor_dilaporkan'      =>  'required',
            'tanggal_dilaporkan'    =>  'required',
            'uraian_singkat'        =>  'required',
            'dokumen'               =>  'required|file|mimes:jpg,jpeg,png,bmp,webp,pdf|max:2048'
        ]);

        if ($request->file('dokumen')) {
            $validatedData['dokumen'] = $request->file('dokumen')->store('dokumens');
        }

        $validatedData['keterangan'] = $request->keterangan;

        SuratKeputusan::create($validatedData);

        Alert::success('Success', 'Data surat keputusan berhasil ditambahkan');
        return redirect()->route('surat-keputusan.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(SuratKeputusan $suratKeputusan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $suratKeputusan = SuratKeputusan::findOrFail($id);

        return view('dashboard.surat-keputusan.edit', [
            'page'  => 'Edit Surat Keputusan',
            'surat' => $suratKeputusan
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SuratKeputusan $suratKeputusan)
    {
        $rules = [
            'nama'                  =>  'required',
            'nomor_keputusan'       =>  'required',
            'tanggal_keputusan'     =>  'required',
            'nomor_dilaporkan'      =>  'required',
            'tanggal_dilaporkan'    =>  'required',
            'uraian_singkat'        =>  'required',
            'dokumen'               =>  'file|mimes:jpg,jpeg,png,bmp,webp,pdf|max:2048'
        ];

        $validatedData = $request->validate($rules);

        if ($request->file('dokumen')) {
            if ($request->oldDokumen) {
                Storage::delete($request->oldDokumen);
            }
            $validatedData['dokumen'] = $request->file('dokumen')->store('dokumens');
        }

        SuratKeputusan::where('id', $suratKeputusan->id)
            ->update($validatedData);

        Alert::success('Success', 'Data surat keputusan berhasil diperbaharui');
        return redirect()->route('surat-keputusan.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $suratKeputusan = SuratKeputusan::findOrFail($id);

        if ($suratKeputusan->dokumen) {
            Storage::disk('public')->delete($suratKeputusan->dokumen);
        }

        $suratKeputusan->delete();

        Alert::success('Success', 'Data surat keluar berhasil dihapus');
        return redirect()->route('surat-keluar.index');
    }
}
