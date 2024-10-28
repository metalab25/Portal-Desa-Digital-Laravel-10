<?php

namespace App\Http\Controllers;

use App\Models\Rt;
use App\Models\Rw;
use App\Models\Dusun;
use App\Models\Pengaturan;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class RtController extends Controller
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
            'nama'      =>  'required',
            'dusun_id'  =>  'required',
            'rw_id'     =>  'required'
        ]);

        Rt::create($validatedData);

        Alert::success('Success', 'Data Rukun Tetangga berhasil ditambahkan');
        return redirect()->route('rw.show', $request->rw_id);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Rt $rt)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Rt $rt)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Rt $rt)
    {
        //
    }
}
