<?php

namespace App\Http\Controllers;

use App\Models\Pengaturan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class PengaturanController extends Controller
{
    public function index()
    {
        return view('dashboard.pengaturan.index', [
            'page'          =>  'Pengaturan Aplikasi',
            'pengaturan'    =>  Pengaturan::first()
        ]);
    }

    public function update(Request $request)
    {
        $rules = [
            'sebutan_desa'          => 'required',
            'sebutan_kecamatan'     => 'required',
            'sebutan_kabupaten'     => 'required',
            'sebutan_dusun'         => 'required',
            'sebutan_kepala_desa'   => 'required',
            'sebutan_camat'         => 'required',
            'sebutan_bupati'        => 'required',
            'sebutan_kepala_dusun'  => 'required',
            'singkatan_desa'        => 'required',
            'singkatan_kecamatan'   => 'required',
            'singkatan_kabupaten'   => 'required',
            'singkatan_dusun'       => 'required',
            'format_nomor_surat'    => 'required',
            'zona_waktu'            => 'required',
            'title_web'             => 'required',
            'icon'                  => 'image|mimes:jpg,jpeg,png,bmp,webp|max:2048',
        ];

        $validatedData = $request->validate($rules);

        $validatedData = Pengaturan::first();
        $validatedData['sebutan_desa']          = $request->sebutan_desa;
        $validatedData['sebutan_kecamatan']     = $request->sebutan_kecamatan;
        $validatedData['sebutan_kabupaten']     = $request->sebutan_kabupaten;
        $validatedData['sebutan_dusun']         = $request->sebutan_dusun;
        $validatedData['sebutan_kepala_desa']   = $request->sebutan_kepala_desa;
        $validatedData['sebutan_camat']         = $request->sebutan_camat;
        $validatedData['sebutan_bupati']        = $request->sebutan_bupati;
        $validatedData['sebutan_kepala_dusun']  = $request->sebutan_kepala_dusun;
        $validatedData['singkatan_desa']        = $request->singkatan_desa;
        $validatedData['singkatan_kecamatan']   = $request->singkatan_kecamatan;
        $validatedData['singkatan_kabupaten']   = $request->singkatan_kabupaten;
        $validatedData['singkatan_dusun']       = $request->singkatan_dusun;
        $validatedData['format_nomor_surat']    = $request->format_nomor_surat;
        $validatedData['zona_waktu']            = $request->zona_waktu;
        $validatedData['title_web']             = $request->title_web;

        if ($request->file('icon')) {
            if ($request->oldIcon) {
                Storage::delete($request->oldIcon);
            }
            $validatedData['icon'] = $request->file('icon')->store('icons');
        }

        // dd($validatedData);

        $validatedData->update();

        Alert::success('Success', 'Pengaturan Aplikasi Berhasil Diperbaharui');

        return redirect()->route('setting.index');
    }
}
