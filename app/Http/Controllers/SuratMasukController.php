<?php

namespace App\Http\Controllers;

use App\Models\Pamong;
use App\Models\SuratMasuk;
use Illuminate\Http\Request;
use App\Models\KlasifikasiSurat;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class SuratMasukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $surat = SuratMasuk::orderBy('nomor_urut')->paginate(8);

        $title = 'Hapus Data Surat Masuk!';
        $text = "Anda yakin inigin menghapus data ini ?";
        confirmDelete($title, $text);

        return view('dashboard.surat-masuk.index', [
            'page'          => 'Surat Masuk',
            'suratMasuks'   => $surat
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $nomorUrut      = SuratMasuk::generateNomorUrut();
        $pamong         = Pamong::all();
        $klasifikasi    = KlasifikasiSurat::orderBy('kode')->get();

        return view('dashboard.surat-masuk.add', [
            'page'          => 'Tambah Surat Masuk',
            'nomor_urut'    => $nomorUrut,
            'klasifikasi'   => $klasifikasi,
            'pamongs'       => $pamong
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nomor_urut'            =>  'required|unique:surat_masuks',
            'nomor_surat'           =>  'required',
            'klasifikasi_surat_id'  =>  'required',
            'tanggal_surat'         =>  'required',
            'tanggal_catat'         =>  'required',
            'pengirim'              =>  'required',
            'pamong_id'             =>  'array',
            'isi_disposisi'         =>  'required',
            'perihal'               =>  'required',
            'dokumen'               =>  'file|mimes:jpg,jpeg,png,bmp,webp,pdf|max:2048'
        ]);

        if ($request->file('dokumen')) {
            $validatedData['dokumen'] = $request->file('dokumen')->store('dokumens');
        }

        $validatedData['pamong_id'] = json_encode($request->pamong_id);

        SuratMasuk::create($validatedData);

        Alert::success('Success', 'Data surat masuk berhasil ditambahkan');
        return redirect()->route('surat-masuk.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(SuratMasuk $suratMasuk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $klasifikasi    = KlasifikasiSurat::orderBy('kode')->get();
        $pamong         = Pamong::all();
        $suratMasuk     = SuratMasuk::findOrFail($id);
        $suratMasuk->pamong_id = json_decode($suratMasuk->pamong_id, true);

        return view('dashboard.surat-masuk.edit', [
            'page'          => 'Edi Surat Masuk',
            'klasifikasi'   => $klasifikasi,
            'surat'         => $suratMasuk,
            'pamongs'       => $pamong
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SuratMasuk $suratMasuk)
    {
        $rules = [
            'nomor_surat'           =>  'required',
            'klasifikasi_surat_id'  =>  'required',
            'tanggal_surat'         =>  'required',
            'tanggal_catat'         =>  'required',
            'pengirim'              =>  'required',
            'pamong_id'             =>  'array',
            'isi_disposisi'         =>  'required',
            'perihal'               =>  'required',
            'dokumen'               =>  'file|mimes:jpg,jpeg,png,bmp,webp,pdf|max:2048'
        ];

        if ($request->nomor_urut != $suratMasuk->nomor_urut) {
            $rules['nomor_urut'] = 'required|unique:surat_masuks';
        }

        $validatedData = $request->validate($rules);

        $validatedData['pamong_id'] = json_encode($request->pamong_id);

        if ($request->file('dokumen')) {
            if ($request->oldDokumen) {
                Storage::delete($request->oldDokumen);
            }
            $validatedData['dokumen'] = $request->file('dokumen')->store('dokumens');
        }

        SuratMasuk::where('id', $suratMasuk->id)
            ->update($validatedData);

        Alert::success('Success', 'Data surat masuk berhasil diperbaharui');
        return redirect()->route('surat-masuk.index');
    }

    // Cetak Data
    public function cetak()
    {
        $surat    = SuratMasuk::orderBy('nomor_urut')->get();

        return view('dashboard.surat-masuk.cetak', [
            'page'  => 'Cetak Data Surat Masuk',
            'surat' => $surat
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $suratMasuk = SuratMasuk::findOrFail($id);

        if ($suratMasuk->dokumen) {
            Storage::disk('public')->delete($suratMasuk->dokumen);
        }

        $suratMasuk->delete();

        Alert::success('Success', 'Data surat masuk berhasil dihapus');
        return redirect()->route('surat-masuk.index');
    }
}
