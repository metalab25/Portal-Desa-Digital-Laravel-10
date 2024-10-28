<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KelompokKategori;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class KelompokKategoriController extends Controller
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
            'nama'     =>  'required'
        ]);

        $validatedData['deskripsi']  = $request->deskripsi;
        $validatedData['user_id']   = Auth::user()->id;

        // dd($validatedData);

        KelompokKategori::create($validatedData);

        Alert::success('Success', 'Data kategori kelompok baru berhasil ditambahkan');
        return redirect()->route('kelompok.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(KelompokKategori $kelompokKategori)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(KelompokKategori $kelompokKategori)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, KelompokKategori $kelompokKategori)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(KelompokKategori $kelompokKategori)
    {
        //
    }
}
