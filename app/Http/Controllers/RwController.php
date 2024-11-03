<?php

namespace App\Http\Controllers;

use App\Models\Rt;
use App\Models\Rw;
use App\Models\Dusun;
use App\Models\Pengaturan;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class RwController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.rw.index', [
            'page'  => 'Rukun Warga',
            'dusun' =>  Dusun::orderBy('nama')->get(),
            'rws'   => RW::orderBy('nama')->withCount('rt')->withCount('keluarga')->paginate(6)
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
            'nama'      =>  'required',
            'dusun_id'  =>  'required'
        ]);

        Rw::create($validatedData);

        Alert::success('Success', 'Data Rukun Warga berhasil ditambahkan');
        return redirect('/desa/wilayah/' . $request->dusun_id);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $setting = Pengaturan::first();
        $rw = Rw::findOrFail($id);
        $dusun = Dusun::where('dusun_id', $rw->dusun_id);
        $rt = Rt::orderBy('nama')->where('rw_id', $id)->withCount('keluarga')->paginate(6);

        $title = 'Hapus Data RT!';
        $text = "Anda yakin inigin menghapus data ini ?";
        confirmDelete($title, $text);

        return view('dashboard.dusun.detail-rt', [
            'page'  =>  $setting->sebutan_dusun . ' ' . $rw->dusun->nama . ' ' . 'RW' . ' ' . $rw->nama,
            'rw'    =>  $rw,
            'rts'   =>  $rt
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Rw $rw)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Rw $rw)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Rw $rw)
    {
        //
    }
}
