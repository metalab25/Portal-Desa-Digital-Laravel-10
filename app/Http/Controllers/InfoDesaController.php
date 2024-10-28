<?php

namespace App\Http\Controllers;

use App\Models\Config;
use App\Models\Provinsi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class InfoDesaController extends Controller
{
    public function index()
    {
        return view('dashboard.info-desa.index', [
            'page'      =>  'Identitas Desa',
            'provinsi'  =>  Provinsi::orderBy('nama')->get(),
            'desa'      =>  Config::first()
        ]);
    }

    public function update(Request $request)
    {
        $rules = [
            'nama_desa'         => 'required',
            'kode_desa'         => 'required|numeric',
            'nama_kepala_desa'  => 'required',
            'alamat_kantor'     => 'required',
            'kode_pos'          => 'required',
            'nama_kecamatan'    => 'required',
            'kode_kecamatan'    => 'required|numeric',
            'nama_kepala_camat' => 'required',
            'nama_kabupaten'    => 'required',
            'kode_kabupaten'    => 'required|numeric',
            'provinsi_id'       => 'required',
            'telepon'           => 'required|numeric',
            'email_desa'        => 'email',
            'logo'              => 'image|mimes:jpg,jpeg,png,bmp,webp|max:2048',
            'ttd'               => 'image|mimes:jpg,jpeg,png,bmp,webp|max:2048',
        ];

        $validatedData = $request->validate($rules);

        $validatedData = Config::first();
        $validatedData['nama_desa']         = $request->nama_desa;
        $validatedData['kode_desa']         = $request->kode_desa;
        $validatedData['nama_kepala_desa']  = $request->nama_kepala_desa;
        $validatedData['alamat_kantor']     = $request->alamat_kantor;
        $validatedData['kode_pos']          = $request->kode_pos;
        $validatedData['nama_kecamatan']    = $request->nama_kecamatan;
        $validatedData['kode_kecamatan']    = $request->kode_kecamatan;
        $validatedData['nama_kepala_camat'] = $request->nama_kepala_camat;
        $validatedData['nama_kabupaten']    = $request->nama_kabupaten;
        $validatedData['kode_kabupaten']    = $request->kode_kabupaten;
        $validatedData['provinsi_id']       = $request->provinsi_id;
        $validatedData['telepon']           = $request->telepon;
        $validatedData['nip_kepala_desa']   = $request->nip_kepala_desa;
        $validatedData['phone_kepala_desa'] = $request->phone_kepala_desa;
        $validatedData['nip_kepala_camat']  = $request->nip_kepala_camat;
        $validatedData['lat']               = $request->lat;
        $validatedData['lang']              = $request->lang;
        $validatedData['zoom']              = $request->zoom;
        $validatedData['map_tipe']          = $request->map_tipe;
        $validatedData['path']              = $request->path;
        $validatedData['email_desa']        = $request->email_desa;
        $validatedData['website']           = $request->website;
        $validatedData['kantor_desa']       = $request->kantor_desa;

        if ($request->file('logo')) {
            if ($request->oldLogo) {
                Storage::delete($request->oldLogo);
            }
            $validatedData['logo'] = $request->file('logo')->store('logos');
        }

        if ($request->file('ttd')) {
            if ($request->oldTtd) {
                Storage::delete($request->oldTtd);
            }
            $validatedData['ttd'] = $request->file('ttd')->store('ttds');
        }

        $validatedData->update();

        Alert::success('Success', 'Informasi Desa Berhasil Diperbaharui');

        return redirect()->route('identitas.index');
    }
}
