@extends('dashboard.layouts.header')

@section('content')
    <div class="app-content">
        <div class="container-fluid">
            <div class="row mb-3">
                <div class="col-md-6">
                    <a href="{{ route('penduduk.index') }}" class="btn btn-danger btn-sm">Kembali</a>
                </div>
                <div class="col-md-6">
                    <div class="float-end">
                        <a href="#" class="btn btn-success btn-sm">Cetak Biodata</a>
                        <a href="{{ route('penduduk.edit', $penduduk->id) }}" class="btn btn-warning btn-sm">Ubah
                            Data</a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <div class="card rounded-3 mb-3">
                        <div class="card-header p-3 py-2">
                            <div class="pt-1">
                                <p class="text-sm mb-0 text-capitalize font-outfit">Foto</p>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="d-flex justify-content-center">
                                @if ($penduduk->foto)
                                    <img src="{{ asset('storage/' . $penduduk->foto) }}"
                                        class="rounded-4 img-fluid d-block mx-auto">
                                @else
                                    <img src="{{ asset('/assets/dashboard/img/no-picture.webp') }}"
                                        class="rounded-4 img-fluid d-block mx-auto">
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="card rounded-3 mb-3">
                        <div class="card-header p-3 py-2">
                            <div class="pt-1">
                                <p class="text-sm mb-0 text-capitalize font-outfit">Biodata</p>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped mb-0">
                                    <tbody>
                                        <tr>
                                            <td class="text-semibold" width="25%">Nama Lengkap</td>
                                            <td class="text-semibold text-center" width="2%">:</td>
                                            <td>{{ $penduduk->nama }}</td>
                                        </tr>
                                        <tr>
                                            <td class="text-semibold" width="25%">Nomor Kartu Keluarga</td>
                                            <td class="text-semibold text-center" width="2%">:</td>
                                            <td>{{ $penduduk->keluarga->no_kk }}</td>
                                        </tr>
                                        <tr>
                                            <td class="text-semibold" width="25%">Hubungan Dalam Keluarga</td>
                                            <td class="text-semibold text-center" width="2%">:</td>
                                            <td>{{ $penduduk->hubungan_keluarga->nama }}</td>
                                        </tr>
                                        <tr>
                                            <td class="text-semibold" width="25%">Jenis Kelamin</td>
                                            <td class="text-semibold text-center" width="2%">:</td>
                                            <td>{{ $penduduk->jenis_kelamin->nama }}</td>
                                        </tr>
                                        <tr>
                                            <td class="text-semibold" width="25%">Agama</td>
                                            <td class="text-semibold text-center" width="2%">:</td>
                                            <td>{{ $penduduk->agama->nama }}</td>
                                        </tr>
                                        <tr>
                                            <td class="text-semibold" width="25%">Status KTP</td>
                                            <td class="text-semibold text-center" width="2%">:</td>
                                            <td>{{ $penduduk->status_ktp }}</td>
                                        </tr>
                                        <tr>
                                            <td class="text-semibold" width="25%">Status Kependudukan</td>
                                            <td class="text-semibold text-center" width="2%">:</td>
                                            <td>{{ $penduduk->status_penduduk->nama }}</td>
                                        </tr>
                                        <tr>
                                            <td colspan="3" class="px-0">
                                                <div class="form-header">Data Kelahiran</div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-semibold" width="25%">No. Akta Kelahiran</td>
                                            <td class="text-semibold text-center" width="2%">:</td>
                                            <td>
                                                @if ($penduduk->no_akta_lahir == null)
                                                    -
                                                @else
                                                    {{ $penduduk->no_akta_lahir }}
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-semibold" width="25%">Tempat, Tanggal Lahir</td>
                                            <td class="text-semibold text-center" width="2%">:</td>
                                            <td>
                                                {{ $penduduk->tempat_lahir . ', ' . tanggal_indonesia($penduduk->tanggal_lahir, false) }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-semibold" width="25%">Jenis Kelahiran</td>
                                            <td class="text-semibold text-center" width="2%">:</td>
                                            <td>
                                                {{ $penduduk->jenis_kelahiran->nama }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-semibold" width="25%">Anak Ke</td>
                                            <td class="text-semibold text-center" width="2%">:</td>
                                            <td>
                                                @if ($penduduk->anak_ke == null)
                                                    -
                                                @else
                                                    {{ $penduduk->anak_ke }}
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-semibold" width="25%">Penolong Kelahiran</td>
                                            <td class="text-semibold text-center" width="2%">:</td>
                                            <td>
                                                {{ $penduduk->penolong_kelahiran->nama }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-semibold" width="25%">Tempat Dilahirkan</td>
                                            <td class="text-semibold text-center" width="2%">:</td>
                                            <td>
                                                {{ $penduduk->tempat_kelahiran->nama }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-semibold" width="25%">Berat Lahir</td>
                                            <td class="text-semibold text-center" width="2%">:</td>
                                            <td>
                                                @if ($penduduk->berat_lahir == null)
                                                    -
                                                @else
                                                    {{ $penduduk->berat_lahir . ' Kg' }}
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-semibold" width="25%">Panjang Lahir</td>
                                            <td class="text-semibold text-center" width="2%">:</td>
                                            <td>
                                                @if ($penduduk->panjang_lahir == null)
                                                    -
                                                @else
                                                    {{ $penduduk->panjang_lahir . ' Cm' }}
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="3" class="px-0">
                                                <div class="form-header">Pendidikan dan Pekerjaan</div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-semibold" width="25%">Pendidikan Ditempuh</td>
                                            <td class="text-semibold text-center" width="2%">:</td>
                                            <td>
                                                {{ $penduduk->pendidikan->nama }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-semibold" width="25%">Pendidikan Dalam Kartu Keluarga</td>
                                            <td class="text-semibold text-center" width="2%">:</td>
                                            <td>
                                                {{ $penduduk->pendidikan_kk->nama }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-semibold" width="25%">Pekerjaan</td>
                                            <td class="text-semibold text-center" width="2%">:</td>
                                            <td>
                                                {{ $penduduk->pekerjaan->nama }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="3" class="px-0">
                                                <div class="form-header">Kewarganegaraan</div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-semibold" width="25%">Warga Negara</td>
                                            <td class="text-semibold text-center" width="2%">:</td>
                                            <td>
                                                {{ $penduduk->warga_negara->nama }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-semibold" width="25%">Nomor Paspor</td>
                                            <td class="text-semibold text-center" width="2%">:</td>
                                            <td>
                                                @if ($penduduk->no_paspor == null)
                                                    -
                                                @else
                                                    {{ $penduduk->no_paspor }}
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-semibold" width="25%">Tanggal Berakhir Paspor</td>
                                            <td class="text-semibold text-center" width="2%">:</td>
                                            <td>
                                                @if ($penduduk->tanggal_akhir_paspor == null)
                                                    -
                                                @else
                                                    {{ tanggal_indonesia($penduduk->tanggal_akhir_paspor, false) }}
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-semibold" width="25%">Nomor Kitas/Kitap</td>
                                            <td class="text-semibold text-center" width="2%">:</td>
                                            <td>
                                                @if ($penduduk->no_kitas == null)
                                                    -
                                                @else
                                                    {{ $penduduk->no_kitas }}
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-semibold" width="25%">Tanggal Berakhir Paspor</td>
                                            <td class="text-semibold text-center" width="2%">:</td>
                                            <td>
                                                @if ($penduduk->tanggal_akhir_kitas == null)
                                                    -
                                                @else
                                                    {{ tanggal_indonesia($penduduk->tanggal_akhir_kitas, false) }}
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="3" class="px-0">
                                                <div class="form-header">Orang Tua</div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-semibold" width="25%">Nama Ayah</td>
                                            <td class="text-semibold text-center" width="2%">:</td>
                                            <td>
                                                @if ($penduduk->nama_ayah == null)
                                                    -
                                                @else
                                                    {{ $penduduk->nama_ayah }}
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-semibold" width="25%">NIK Ayah</td>
                                            <td class="text-semibold text-center" width="2%">:</td>
                                            <td>
                                                @if ($penduduk->nik_ayah == null)
                                                    -
                                                @else
                                                    {{ $penduduk->nik_ayah }}
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-semibold" width="25%">Nama Ibu</td>
                                            <td class="text-semibold text-center" width="2%">:</td>
                                            <td>
                                                @if ($penduduk->nama_ibu == null)
                                                    -
                                                @else
                                                    {{ $penduduk->nama_ibu }}
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-semibold" width="25%">NIK Ibu</td>
                                            <td class="text-semibold text-center" width="2%">:</td>
                                            <td>
                                                @if ($penduduk->nik_ibu == null)
                                                    -
                                                @else
                                                    {{ $penduduk->nik_ibu }}
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="3" class="px-0">
                                                <div class="form-header">Data Perkawinan</div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-semibold" width="25%">Status Perkawinan</td>
                                            <td class="text-semibold text-center" width="2%">:</td>
                                            <td>
                                                {{ $penduduk->status_kawin->nama }}
                                            </td>
                                        </tr>
                                        @if ($penduduk->status_kawin_id == 2)
                                            <tr>
                                                <td class="text-semibold" width="25%">Akta Perkawinan</td>
                                                <td class="text-semibold text-center" width="2%">:</td>
                                                <td>
                                                    @if ($penduduk->no_akta_kawin == null)
                                                        -
                                                    @else
                                                        {{ $penduduk->no_akta_kawin }}
                                                    @endif
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-semibold" width="25%">Tanggal Perkawinan</td>
                                                <td class="text-semibold text-center" width="2%">:</td>
                                                <td>
                                                    @if ($penduduk->tanggal_kawin == null)
                                                        -
                                                    @else
                                                        {{ tanggal_indonesia($penduduk->tanggal_kawin, false) }}
                                                    @endif
                                                </td>
                                            </tr>
                                        @else
                                            <tr>
                                                <td class="text-semibold" width="25%">Akta Perceraian</td>
                                                <td class="text-semibold text-center" width="2%">:</td>
                                                <td>
                                                    @if ($penduduk->no_akta_cerai == null)
                                                        -
                                                    @else
                                                        {{ $penduduk->no_akta_cerai }}
                                                    @endif
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-semibold" width="25%">Tanggal Perceraian</td>
                                                <td class="text-semibold text-center" width="2%">:</td>
                                                <td>
                                                    @if ($penduduk->tanggal_cerai == null)
                                                        -
                                                    @else
                                                        {{ tanggal_indonesia($penduduk->tanggal_cerai, false) }}
                                                    @endif
                                                </td>
                                            </tr>
                                        @endif
                                        <tr>
                                            <td colspan="3" class="px-0">
                                                <div class="form-header">Alamat dan Data Tambahan Lain</div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-semibold" width="25%">Telepon</td>
                                            <td class="text-semibold text-center" width="2%">:</td>
                                            <td>
                                                @if ($penduduk->telepon == null)
                                                    -
                                                @else
                                                    {{ $penduduk->telepon }}
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-semibold" width="25%">Email</td>
                                            <td class="text-semibold text-center" width="2%">:</td>
                                            <td>
                                                @if ($penduduk->email == null)
                                                    -
                                                @else
                                                    {{ $penduduk->email }}
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-semibold" width="25%">Alamat</td>
                                            <td class="text-semibold text-center" width="2%">:</td>
                                            <td>
                                                {{ $penduduk->keluarga->alamat . ' RT ' . $penduduk->keluarga->rt->nama . ' RW ' . $penduduk->keluarga->rw->nama . ' ' . $setting->sebutan_dusun . ' ' . $penduduk->keluarga->dusun->nama . '. ' . $setting->sebutan_desa . ' ' . $desa->nama_desa . ', ' . $setting->sebutan_kecamatan . ' ' . $desa->nama_kecamatan . ', ' . $setting->sebutan_kabupaten . ' ' . $desa->nama_kabupaten . '. Provinsi ' . $desa->provinsi->nama . '. Kodepos ' . $desa->kode_pos }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-semibold" width="25%">Alamat Sekarang</td>
                                            <td class="text-semibold text-center" width="2%">:</td>
                                            <td>
                                                @if ($penduduk->alamat_sekarang == null)
                                                    -
                                                @else
                                                    {{ $penduduk->alamat_sekarang }}
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-semibold" width="25%">Alamat Sebelumnya</td>
                                            <td class="text-semibold text-center" width="2%">:</td>
                                            <td>
                                                @if ($penduduk->alamat_sebelumnya == null)
                                                    -
                                                @else
                                                    {{ $penduduk->alamat_sebelumnya }}
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="3" class="px-0">
                                                <div class="form-header">Data Kesehatan</div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-semibold" width="25%">Golongan Darah</td>
                                            <td class="text-semibold text-center" width="2%">:</td>
                                            <td>
                                                {{ $penduduk->golongan_darah->nama }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-semibold" width="25%">Cacat</td>
                                            <td class="text-semibold text-center" width="2%">:</td>
                                            <td>
                                                {{ $penduduk->cacat->nama }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-semibold" width="25%">Riwayat Sakit</td>
                                            <td class="text-semibold text-center" width="2%">:</td>
                                            <td>
                                                {{ $penduduk->sakit_menahun->nama }}
                                            </td>
                                        </tr>
                                        @if ($penduduk->jenis_kelamin_id == 2)
                                            <tr>
                                                <td class="text-semibold" width="25%">Status Kehamilan</td>
                                                <td class="text-semibold text-center" width="2%">:</td>
                                                <td>
                                                    {{ $penduduk->kehamilan->nama }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-semibold" width="25%">Akseptor KB</td>
                                                <td class="text-semibold text-center" width="2%">:</td>
                                                <td>
                                                    {{ $penduduk->cara_kb->nama }}
                                                </td>
                                            </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer py-3">
                            <a href="{{ route('penduduk.index') }}" class="btn btn-danger btn-sm float-end">Kembali</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
