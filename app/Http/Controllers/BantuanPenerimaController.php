<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BantuanPenerima;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class BantuanPenerimaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
            'bantuan_id'            =>  'required',
            'bantuan_sasaran_id'    =>  'required'
        ]);

        $validatedData['penduduk_id']           = $request->penduduk_id;
        $validatedData['keluarga_id']           = $request->keluarga_id;
        $validatedData['kelompok_id']           = $request->kelompok_id;
        $validatedData['no_kartu']              = $request->no_kartu;
        $validatedData['nama_kartu']            = $request->nama_kartu;
        $validatedData['nik_kartu']             = $request->nik_kartu;
        $validatedData['tempat_lahir_kartu']    = $request->tempat_lahir_kartu;
        $validatedData['tanggal_lahir_kartu']   = $request->tanggal_lahir_kartu;
        $validatedData['alamat_kartu']          = $request->alamat_kartu;
        $validatedData['user_id']               = Auth::user()->id;

        BantuanPenerima::create($validatedData);

        Alert::success('Success', 'Data penerima bantuan berhasil ditambahkan');
        return redirect()->route('bantuan.show', $request->bantuan_id);
    }

    /**
     * Display the specified resource.
     */
    public function show(BantuanPenerima $bantuanPenerima)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BantuanPenerima $bantuanPenerima)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BantuanPenerima $bantuanPenerima)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BantuanPenerima $bantuanPenerima)
    {
        //
    }
}
