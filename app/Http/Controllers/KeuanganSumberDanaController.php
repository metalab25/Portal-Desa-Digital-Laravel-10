<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KeuanganSumberDana;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class KeuanganSumberDanaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kode_I = KeuanganSumberDana::where('tipe', 1)->get();
        $kode_II = KeuanganSumberDana::where('tipe', 2)->get();

        $sumber = KeuanganSumberDana::orderBy('kode')->get();

        return  view('dashboard.keuangan.sumber-dana.index', [
            'page'      => 'Sumber Dana Keuangan',
            'sumber'    => $sumber,
            'kodeI'     => $kode_I,
            'kodeII'    => $kode_II,
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
            'kode'  =>  'required',
            'tipe'  =>  'required'
        ]);

        $validatedData['parent'] = $request->parent;

        KeuanganSumberDana::create($validatedData);

        Alert::success('Success', 'Data sumber dana berhasil ditambahkan');
        return redirect()->route('sumber-dana.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(KeuanganSumberDana $keuanganSumberDana)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(KeuanganSumberDana $keuanganSumberDana)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, KeuanganSumberDana $keuanganSumberDana)
    {
        //
    }

    // Tambah Anggaran
    public function addAnggaran(Request $request, KeuanganSumberDana $keuanganSumberDana)
    {
        $validatedData = $request->validate([
            'nilai_anggaran'    =>  'required',
        ]);

        $validatedData['tahun'] = date('Y');

        KeuanganSumberDana::where('id', $request->id)
            ->update($validatedData);

        Alert::success('Success', 'Data nilai anggaran berhasil ditambahkan');
        return redirect()->route('sumber-dana.index');
    }

    public function addRealisasi(Request $request, KeuanganSumberDana $keuanganSumberDana)
    {
        $validatedData = $request->validate([
            'nilai_realisasi'    =>  'required',
        ]);

        $validatedData['tahun'] = date('Y');

        KeuanganSumberDana::where('id', $request->id)
            ->update($validatedData);

        Alert::success('Success', 'Data nilai realisasi berhasil ditambahkan');
        return redirect()->route('sumber-dana.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(KeuanganSumberDana $keuanganSumberDana)
    {
        //
    }
}
