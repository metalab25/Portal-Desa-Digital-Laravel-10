<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KelompokAnggota;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class KelompokAnggotaController extends Controller
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
            'kelompok_id'           =>  'required',
            'penduduk_id'           =>  'required',
            'kelompok_jabatan_id'   =>  'required'
        ]);

        $validatedData['nomor_anggota'] = $request->nomor_anggota;
        $validatedData['user_id']       = Auth::user()->id;

        // dd($validatedData);

        KelompokAnggota::create($validatedData);

        Alert::success('Success', 'Data anggota kelompok baru berhasil ditambahkan');
        return redirect()->route('kelompok.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(KelompokAnggota $kelompokAnggota)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(KelompokAnggota $kelompokAnggota)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, KelompokAnggota $kelompokAnggota)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(KelompokAnggota $kelompokAnggota)
    {
        //
    }
}
