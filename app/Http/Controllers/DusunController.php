<?php

namespace App\Http\Controllers;

use App\Models\Rw;
use App\Models\Dusun;
use App\Models\Pengaturan;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class DusunController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $setting = Pengaturan::first();

        return view('dashboard.dusun.index', [
            'page'  => $setting->sebutan_dusun,
            'dusun' => Dusun::orderBy('nama')->withCount('rw')->withCount('rt')->withCount('keluarga')->paginate(6)
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
        ]);

        Dusun::create($validatedData);

        Alert::success('Success', 'Data wilayah berhasil ditambahkan');
        return redirect('/desa/wilayah');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $setting = Pengaturan::first();
        $dusun = Dusun::findOrFail($id);
        $rw = Rw::orderBy('nama')->where('dusun_id', $id)->withCount('rt')->withCount('keluarga')->paginate(6);

        return view('dashboard.dusun.detail-rw', [
            'page'  =>  $setting->sebutan_dusun . ' ' . $dusun->nama,
            'dusun' =>  $dusun,
            'rws'   =>  $rw
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Dusun $dusun)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Dusun $dusun)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Dusun $dusun)
    {
        //
    }
}
