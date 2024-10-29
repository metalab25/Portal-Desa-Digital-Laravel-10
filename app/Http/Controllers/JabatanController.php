<?php

namespace App\Http\Controllers;

use App\Models\Jabatan;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class JabatanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jabatan = Jabatan::withCount('pamong')->paginate(8);

        return view('dashboard.jabatan.index', [
            'page'      => 'Jabatan',
            'jabatan'   => $jabatan
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.jabatan.add', [
            'page'  => 'Tambah Data Jabatan'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama'   =>  'required',
        ]);

        $validatedData['tupoksi']   = $request->tupoksi;
        $validatedData['excerpt']   = Str::limit(strip_tags($request->tupoksi), 100);
        $validatedData['user_id']   = Auth::user()->id;

        Jabatan::create($validatedData);

        Alert::success('Success', 'Data jabatan baru berhasil ditambahkan');
        return redirect()->route('jabatan.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Jabatan $jabatan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $jabatan = Jabatan::findOrFail($id);

        return view('dashboard.jabatan.edit', [
            'page'      => 'Edit Jabatan',
            'jabatan'   => $jabatan
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required'
        ]);

        $jabatan = Jabatan::findOrFail($id);
        $jabatan->tupoksi = $request->tupoksi;
        $jabatan->excerpt = Str::limit(strip_tags($request->tupoksi), 100);
        $jabatan->save();

        Alert::success('Success', 'Data jabatan berhasil diperbaharui');
        return redirect()->route('jabatan.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $jabatan = Jabatan::findOrFail($id);
        $jabatan->delete();

        Alert::success('Success', 'Data jabatan berhasil dihapus');

        return redirect()->route('jabatan.index');
    }
}
