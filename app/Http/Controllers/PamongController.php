<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Agama;
use App\Models\Pamong;
use App\Models\Jabatan;
use App\Models\Penduduk;
use App\Models\Pengaturan;
use App\Models\JenisKelamin;
use App\Models\PendidikanKk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class PamongController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $setting    = Pengaturan::first();
        $pamongs    = Pamong::paginate(8);

        return view('dashboard.pamong.index', [
            'page'      =>  'Pemerintah ' . $setting->sebutan_desa,
            'pamongs'   =>  $pamongs
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $setting        = Pengaturan::first();
        $penduduk       = Penduduk::orderBy('nama')->get();
        $jenis_kelamin  = JenisKelamin::orderBy('nama')->get();
        $agama          = Agama::orderBy('nama')->get();
        $pendidikan_kk  = PendidikanKk::all();
        $jabatan        = Jabatan::all();

        return view('dashboard.pamong.add', [
            'page'          => 'Tambah Data Pemerintah ' . $setting->sebutan_desa,
            'penduduk'      => $penduduk,
            'sex'           => $jenis_kelamin,
            'agama'         => $agama,
            'pendidikan_kk' => $pendidikan_kk,
            'jabatans'      => $jabatan
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $setting        = Pengaturan::first();

        $validatedData = $request->validate([
            'jabatan_id'    =>  'required',
            'foto'          =>  'image|mimes:jpg,jpeg,png,bmp,webp|max:2048',
        ]);

        $validatedData['penduduk_id']       = $request->penduduk_id;
        $validatedData['nama']              = $request->nama;
        $validatedData['nik']               = $request->nik;
        $validatedData['nip']               = $request->nip;
        $validatedData['agama_id']          = $request->agama_id;
        $validatedData['jenis_kelamin_id']  = $request->jenis_kelamin_id;
        $validatedData['pendidikan_kk_id']  = $request->pendidikan_kk_id;
        $validatedData['tempat_lahir']      = $request->tempat_lahir;
        $validatedData['tanggal_lahir']     = $request->tanggal_lahir;
        $validatedData['no_sk']             = $request->no_sk;
        $validatedData['tgl_sk']            = $request->tgl_sk;
        $validatedData['masa_jabatan']      = $request->masa_jabatan;
        $validatedData['user_id']           = Auth::user()->id;

        if ($request->file('foto')) {
            $validatedData['foto'] = $request->file('foto')->store('pamongs');
        }

        Pamong::create($validatedData);

        Alert::success('Success', 'Data pemerintah' . $setting->sebutan_desa . 'baru berhasil ditambahkan');
        return redirect()->route('pemerintah.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pamong $pamong)
    {
        $pamong         = Pamong::first();
        $setting        = Pengaturan::first();
        $penduduk       = Penduduk::orderBy('nama')->get();
        $jenis_kelamin  = JenisKelamin::orderBy('nama')->get();
        $agama          = Agama::orderBy('nama')->get();
        $pendidikan_kk  = PendidikanKk::all();
        $jabatan        = Jabatan::all();

        return view('dashboard.pamong.edit', [
            'page'          => 'Ubah Data Pemerintah ' . $setting->sebutan_desa,
            'penduduk'      => $penduduk,
            'sex'           => $jenis_kelamin,
            'agama'         => $agama,
            'pendidikan_kk' => $pendidikan_kk,
            'jabatans'      => $jabatan,
            'pamong'        => $pamong
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'jabatan_id'    =>  'required',
            'foto'          =>  'image|mimes:jpg,jpeg,png,bmp,webp|max:2048',
        ]);

        $validatedData = Pamong::findOrFail($id);

        $validatedData['penduduk_id']       = $request->penduduk_id;
        $validatedData['nama']              = $request->nama;
        $validatedData['nik']               = $request->nik;
        $validatedData['nip']               = $request->nip;
        $validatedData['agama_id']          = $request->agama_id;
        $validatedData['jenis_kelamin_id']  = $request->jenis_kelamin_id;
        $validatedData['pendidikan_kk_id']  = $request->pendidikan_kk_id;
        $validatedData['tempat_lahir']      = $request->tempat_lahir;
        $validatedData['tanggal_lahir']     = $request->tanggal_lahir;
        $validatedData['no_sk']             = $request->no_sk;
        $validatedData['tgl_sk']            = $request->tgl_sk;
        $validatedData['masa_jabatan']      = $request->masa_jabatan;
        $validatedData['user_id']           = Auth::user()->id;

        if ($request->file('foto')) {
            if ($request->oldFoto) {
                Storage::delete($request->oldFoto);
            }
            $validatedData['foto'] = $request->file('foto')->store('penduduks');
        }

        $validatedData->save();

        Alert::success('Success', 'Data pemerintah berhasil diperbaharui');
        return redirect()->route('pemerintah.index');
    }

    /**
     * Remove the specified resource from storage.
     */

    public function cetak()
    {
        $tanggalHariIni = Carbon::now();
        $pamongs = Pamong::all();

        return view('dashboard.pamong.cetak', [
            'pamongs'   => $pamongs,
            'tanggal'   => tanggal_indonesia($tanggalHariIni, false)
        ]);
    }

    public function destroy($id)
    {
        $pamong = Pamong::findOrFail($id);

        if ($pamong->foto) {
            Storage::disk('public')->delete($pamong->foto);
        }

        $pamong->delete();

        Alert::success('Success', 'Data pemerintah berhasil dihapus');

        return redirect()->route('pemerintah.index');
    }
}
