<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Agama;
use App\Models\Cacat;
use App\Models\Dusun;
use App\Models\CaraKb;
use App\Models\Keluarga;
use App\Models\Penduduk;
use App\Models\Kehamilan;
use App\Models\Pekerjaan;
use App\Models\Pendidikan;
use App\Models\StatusDasar;
use App\Models\StatusKawin;
use App\Models\WargaNegara;
use App\Models\JenisKelamin;
use App\Models\PendidikanKk;
use App\Models\SakitMenahun;
use Illuminate\Http\Request;
use App\Models\GolonganDarah;
use App\Models\JenisKelahiran;
use App\Models\StatusPenduduk;
use App\Models\TempatKelahiran;
use App\Models\HubunganKeluarga;
use App\Models\PenolongKelahiran;
use App\Models\StatusKtp;
use App\Models\StatusRekamKtp;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class PendudukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $penduduk = Penduduk::orderBy('keluarga_id', 'asc')->paginate(8);

        return view('dashboard.penduduk.index', [
            'page'      => 'Penduduk',
            'penduduks' => $penduduk
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $keluarga           = Keluarga::orderBy('no_kk')->get();
        $penolong_kelahiran = PenolongKelahiran::all();
        $jenis_kelahiran    = JenisKelahiran::all();
        $tempat_kelahiran   = TempatKelahiran::all();
        $jenis_kelamin      = JenisKelamin::all();
        $status_penduduk    = StatusPenduduk::all();
        $hubungan_keluarga  = HubunganKeluarga::all();
        $agama              = Agama::all();
        $pendidikan_kk      = PendidikanKk::all();
        $pendidikan         = Pendidikan::all();
        $pekerjaan          = Pekerjaan::all();
        $warganegara        = WargaNegara::all();
        $status_kawin       = StatusKawin::all();
        $golongan_darah     = GolonganDarah::all();
        $cacat              = Cacat::all();
        $sakit_menahun      = SakitMenahun::all();
        $hamil              = Kehamilan::all();
        $cara_kb            = CaraKb::all();
        $ektp               = StatusKtp::all();
        $rekam_ektp         = StatusRekamKtp::all();

        return view('dashboard.penduduk.add', [
            'page'                  =>  'Tambah Data Penduduk',
            'keluarga'              =>  $keluarga,
            'penolong_kelahiran'    =>  $penolong_kelahiran,
            'jenis_kelahiran'       =>  $jenis_kelahiran,
            'tempat_kelahiran'      =>  $tempat_kelahiran,
            'status_penduduk'       =>  $status_penduduk,
            'jenis_kelamin'         =>  $jenis_kelamin,
            'hubungan_keluarga'     =>  $hubungan_keluarga,
            'agama'                 =>  $agama,
            'pendidikan'            =>  $pendidikan,
            'pendidikan_kk'         =>  $pendidikan_kk,
            'pekerjaan'             =>  $pekerjaan,
            'warga_negara'          =>  $warganegara,
            'status_kawin'          =>  $status_kawin,
            'golongan_darah'        =>  $golongan_darah,
            'cacat'                 =>  $cacat,
            'sakit_menahun'         =>  $sakit_menahun,
            'cara_kb'               =>  $cara_kb,
            'kehamilan'             =>  $hamil,
            'ektp'                  =>  $ektp,
            'rekam_ektp'            =>  $rekam_ektp
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'keluarga_id'           =>  'required',
            'nik'                   =>  'required|numeric|unique:penduduks',
            'nama'                  =>  'required',
            'jenis_kelamin_id'      =>  'required',
            'hubungan_keluarga_id'  =>  'required',
            'agama_id'              =>  'required',
            'tempat_lahir'          =>  'required',
            'tanggal_lahir'         =>  'required',
            'pendidikan_kk_id'      =>  'required',
            'pekerjaan_id'          =>  'required',
            'warga_negara_id'       =>  'required',
            'status_kawin_id'       =>  'required',
            'golongan_darah_id'     =>  'required',
            'foto'                  =>  'image|mimes:jpg,jpeg,png,bmp,webp|max:2048',
        ]);

        if ($request->file('foto')) {
            $validatedData['foto'] = $request->file('foto')->store('penduduks');
        }

        $validatedData['status_penduduk_id']    = $request->status_penduduk_id;
        $validatedData['no_akta_lahir']         = $request->no_akta_lahir;
        $validatedData['waktu_lahir']           = $request->waktu_lahir;
        $validatedData['anak_ke']               = $request->anak_ke;
        $validatedData['jenis_kelahiran_id']    = $request->jenis_kelahiran_id;
        $validatedData['berat_lahir']           = $request->berat_lahir;
        $validatedData['panjang_lahir']         = $request->panjang_lahir;
        $validatedData['penolong_kelahiran_id'] = $request->penolong_kelahiran_id;
        $validatedData['tempat_kelahiran_id']   = $request->tempat_kelahiran_id;
        $validatedData['pendidikan_id']         = $request->pendidikan_id;
        $validatedData['no_paspor']             = $request->no_paspor;
        $validatedData['tanggal_akhir_paspor']  = $request->tanggal_akhir_paspor;
        $validatedData['no_kitas']              = $request->no_kitas;
        $validatedData['tanggal_akhir_kitas']   = $request->tanggal_akhir_kitas;
        $validatedData['nama_ayah']             = $request->nama_ayah;
        $validatedData['nik_ayah']              = $request->nik_ayah;
        $validatedData['nama_ibu']              = $request->nama_ibu;
        $validatedData['nik_ibu']               = $request->nik_ibu;
        $validatedData['alamat_sekarang']       = $request->alamat_sekarang;
        $validatedData['alamat_sebelumnya']     = $request->alamat_sebelumnya;
        $validatedData['no_akta_kawin']         = $request->no_akta_kawin;
        $validatedData['tanggal_kawin']         = $request->tanggal_kawin;
        $validatedData['no_akta_cerai']         = $request->no_akta_cerai;
        $validatedData['tanggal_cerai']         = $request->tanggal_cerai;
        $validatedData['telepon']               = $request->telepon;
        $validatedData['email']                 = $request->email;
        $validatedData['cacat_id']              = $request->cacat_id;
        $validatedData['sakit_menahun_id']      = $request->sakit_menahun_id;
        $validatedData['cara_kb_id']            = $request->cara_kb_id;
        $validatedData['kehamilan_id']          = $request->kehamilan_id;
        $validatedData['status_ktp_id']         = $request->status_ktp_id;
        $validatedData['status_rekam_ktp_id']   = $request->status_rekam_ktp_id;
        $validatedData['user_id']               = Auth::user()->id;

        Penduduk::create($validatedData);

        Alert::success('Success', 'Data penduduk baru berhasil ditambahkan');
        return redirect()->route('penduduk.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $penduduk = Penduduk::findOrFail($id);

        // Hitung tanggal 17 tahun setelah tanggal lahir
        $tanggalWajibKTP = Carbon::parse($penduduk->tanggal_lahir)->addYears(17);

        // Tentukan status wajib KTP berdasarkan apakah tanggal hari ini sudah lewat dari atau sama dengan tanggal wajib KTP
        $penduduk->wajib_ktp = $tanggalWajibKTP->isPast() ? 'Wajib' : 'Belum Wajib';

        return view('dashboard.penduduk.details', [
            'page'      => 'Biodata ' . $penduduk->nama,
            'penduduk'  => $penduduk
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $penduduk = Penduduk::findOrFail($id);

        // Hitung tanggal 17 tahun setelah tanggal lahir
        $tanggalWajibKTP = Carbon::parse($penduduk->tanggal_lahir)->addYears(17);

        // Tentukan status wajib KTP berdasarkan apakah tanggal hari ini sudah lewat dari atau sama dengan tanggal wajib KTP
        $penduduk->wajib_ktp = $tanggalWajibKTP->isPast() ? 'Wajib' : 'Belum Wajib';


        $keluarga           = Keluarga::orderBy('no_kk')->get();
        $penolong_kelahiran = PenolongKelahiran::all();
        $jenis_kelahiran    = JenisKelahiran::all();
        $tempat_kelahiran   = TempatKelahiran::all();
        $jenis_kelamin      = JenisKelamin::all();
        $status_penduduk    = StatusPenduduk::all();
        $hubungan_keluarga  = HubunganKeluarga::all();
        $agama              = Agama::all();
        $pendidikan_kk      = PendidikanKk::all();
        $pendidikan         = Pendidikan::all();
        $pekerjaan          = Pekerjaan::all();
        $warganegara        = WargaNegara::all();
        $status_kawin       = StatusKawin::all();
        $golongan_darah     = GolonganDarah::all();
        $cacat              = Cacat::all();
        $sakit_menahun      = SakitMenahun::all();
        $hamil              = Kehamilan::all();
        $cara_kb            = CaraKb::all();
        $ektp               = StatusKtp::all();
        $rekam_ektp         = StatusRekamKtp::all();

        return view('dashboard.penduduk.edit', [
            'page'                  => 'Ubah Biodata ' . $penduduk->nama,
            'keluarga'              =>  $keluarga,
            'penolong_kelahiran'    =>  $penolong_kelahiran,
            'jenis_kelahiran'       =>  $jenis_kelahiran,
            'tempat_kelahiran'      =>  $tempat_kelahiran,
            'status_penduduk'       =>  $status_penduduk,
            'jenis_kelamin'         =>  $jenis_kelamin,
            'hubungan_keluarga'     =>  $hubungan_keluarga,
            'agama'                 =>  $agama,
            'pendidikan'            =>  $pendidikan,
            'pendidikan_kk'         =>  $pendidikan_kk,
            'pekerjaan'             =>  $pekerjaan,
            'warga_negara'          =>  $warganegara,
            'status_kawin'          =>  $status_kawin,
            'golongan_darah'        =>  $golongan_darah,
            'cacat'                 =>  $cacat,
            'sakit_menahun'         =>  $sakit_menahun,
            'cara_kb'               =>  $cara_kb,
            'kehamilan'             =>  $hamil,
            'penduduk'              =>  $penduduk,
            'ektp'                  =>  $ektp,
            'rekam_ektp'            =>  $rekam_ektp
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Penduduk $penduduk)
    {
        $rules = [
            'keluarga_id'           =>  'required',
            'nama'                  =>  'required',
            'jenis_kelamin_id'      =>  'required',
            'hubungan_keluarga_id'  =>  'required',
            'agama_id'              =>  'required',
            'tempat_lahir'          =>  'required',
            'tanggal_lahir'         =>  'required',
            'pendidikan_kk_id'      =>  'required',
            'pekerjaan_id'          =>  'required',
            'warga_negara_id'       =>  'required',
            'status_kawin_id'       =>  'required',
            'golongan_darah_id'     =>  'required',
            'foto'                  =>  'image|mimes:jpg,jpeg,png,bmp,webp|max:2048',
        ];

        if ($request->nik != $penduduk->nik) {
            $rules['nik'] = 'required|unique:penduduk';
        }
        if ($request->telepon != $penduduk->telepon) {
            $rules['telepon'] = 'nullable|unique:penduduk';
        }
        if ($request->email != $penduduk->email) {
            $rules['email'] = 'nullable|email|unique:penduduk';
        }

        $validatedData = $request->validate($rules);

        $validatedData['status_penduduk_id']    = $request->status_penduduk_id;
        $validatedData['no_akta_lahir']         = $request->no_akta_lahir;
        $validatedData['waktu_lahir']           = $request->waktu_lahir;
        $validatedData['anak_ke']               = $request->anak_ke;
        $validatedData['jenis_kelahiran_id']    = $request->jenis_kelahiran_id;
        $validatedData['berat_lahir']           = $request->berat_lahir;
        $validatedData['panjang_lahir']         = $request->panjang_lahir;
        $validatedData['penolong_kelahiran_id'] = $request->penolong_kelahiran_id;
        $validatedData['tempat_kelahiran_id']   = $request->tempat_kelahiran_id;
        $validatedData['pendidikan_id']         = $request->pendidikan_id;
        $validatedData['no_paspor']             = $request->no_paspor;
        $validatedData['tanggal_akhir_paspor']  = $request->tanggal_akhir_paspor;
        $validatedData['no_kitas']              = $request->no_kitas;
        $validatedData['tanggal_akhir_kitas']   = $request->tanggal_akhir_kitas;
        $validatedData['nama_ayah']             = $request->nama_ayah;
        $validatedData['nik_ayah']              = $request->nik_ayah;
        $validatedData['nama_ibu']              = $request->nama_ibu;
        $validatedData['nik_ibu']               = $request->nik_ibu;
        $validatedData['alamat_sekarang']       = $request->alamat_sekarang;
        $validatedData['alamat_sebelumnya']     = $request->alamat_sebelumnya;
        $validatedData['no_akta_kawin']         = $request->no_akta_kawin;
        $validatedData['tanggal_kawin']         = $request->tanggal_kawin;
        $validatedData['no_akta_cerai']         = $request->no_akta_cerai;
        $validatedData['tanggal_cerai']         = $request->tanggal_cerai;
        $validatedData['cacat_id']              = $request->cacat_id;
        $validatedData['sakit_menahun_id']      = $request->sakit_menahun_id;
        $validatedData['cara_kb_id']            = $request->cara_kb_id;
        $validatedData['kehamilan_id']          = $request->kehamilan_id;
        $validatedData['status_ktp_id']         = $request->status_ktp_id;
        $validatedData['status_rekam_ktp_id']   = $request->status_rekam_ktp_id;
        $validatedData['user_id']               = Auth::user()->id;

        if ($request->file('foto')) {
            if ($request->oldFoto) {
                Storage::delete($request->oldFoto);
            }
            $validatedData['foto'] = $request->file('foto')->store('penduduks');
        }

        Penduduk::where('id', $penduduk->id)
            ->update($validatedData);

        Alert::success('Success', 'Data penduduk baru berhasil diperbaharui');
        return redirect()->route('penduduk.index');
    }

    public function cetak($id)
    {
        $penduduk = Penduduk::findOrFail($id);

        // Hitung tanggal 17 tahun setelah tanggal lahir
        $tanggalWajibKTP = Carbon::parse($penduduk->tanggal_lahir)->addYears(17);

        // Tentukan status wajib KTP berdasarkan apakah tanggal hari ini sudah lewat dari atau sama dengan tanggal wajib KTP
        $penduduk->wajib_ktp = $tanggalWajibKTP->isPast() ? 'Wajib' : 'Belum Wajib';

        return view('dashboard.penduduk.cetak-biodata', [
            'page'      => 'Biodata ' . $penduduk->nama,
            'penduduk'  => $penduduk
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Penduduk $penduduk)
    {
        //
    }
}
