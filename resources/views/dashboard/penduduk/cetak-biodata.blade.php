<!DOCTYPE html>
<html>

<head>
    <title>Print Biodata Penduduk</title>
    <link rel="stylesheet" href="{{ '/assets/dashboard/css/adminlte.css' }}">
    <link rel="stylesheet" href="{{ '/assets/dashboard/css/custom-style.css' }}">
    <style>
        /* Tambahkan gaya untuk tampilan cetak */
        #printArea {
            font-family: Arial, sans-serif;
        }

        .logo {
            width: 50px;
            height: auto;
        }

        .foto {
            width: 200px;
            height: 250px;
        }

        @media print {

            /* Sembunyikan elemen yang tidak perlu saat cetak */
            .no-print {
                display: none;
            }
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Tambahkan jQuery Print setelah jQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jQuery.print/1.6.2/jQuery.print.min.js"></script>
</head>

<body>
    <div class="container-fluid">
        <table class="table">
            <tbody>
                <tr>
                    <td style="border-bottom: 0;width:60px;padding:0.15rem 0.25rem">NIK</td>
                    <td style="border-bottom: 0;padding:0.15rem 0.25rem">: {{ $penduduk->nik }}</td>
                </tr>
                <tr>
                    <td style="border-bottom: 0;width:60px;padding:0.15rem 0.25rem">No. KK</td>
                    <td style="border-bottom: 0;padding:0.15rem 0.25rem">: {{ $penduduk->keluarga->no_kk }}</td>
                </tr>
            </tbody>
        </table>
        <div class="text-center mb=5">
            @if ($desa->logo)
                <img src="{{ asset('storage/' . $desa->logo) }}" class="logo mb-3"
                    alt="{{ $setting->sebutan_desa . '' . $desa->nama_desa }}">
            @else
                <img src="{{ asset('assets//dashboard/img/avatar5.png') }}" class="logo mb-3"
                    alt="{{ $setting->sebutan_desa . '' . $desa->nama_desa }}">
            @endif
            <h4 class="text-uppercase text-bold">Biodata Penduduk Warga Negara Indonesia</h4>
            <h6>{{ $setting->singkatan_kabupaten . ' ' . $desa->nama_kabupaten . ', ' . $setting->singkatan_kecamatan . ' ' . $desa->nama_kecamatan . '. Provinsi ' . $desa->provinsi->nama }}
            </h6>
        </div>
        <table class="table mb-3">
            <tr>
                <td class="text-uppercase text-bold border-bottom-0" colspan="3">Data Personal</td>
            </tr>
            <tr>
                <td class="border-bottom-0" style="width:430px;padding:0.15rem 0.25rem">Nama Lengkap</td>
                <td class="text-center border-bottom-0" style="width: 25px;padding:0.15rem 0.25rem">:</td>
                <td class="text-uppercase border-bottom-0" style="width: 600px;padding:0.15rem 0.25rem">
                    {{ $penduduk->nama }}</td>
                <td rowspan="18" class="text-center border-bottom-0">
                    @if ($penduduk->foto)
                        <img src="{{ asset('storage/' . $penduduk->foto) }}" class="foto mb-3"
                            alt="{{ $penduduk->nama }}">
                    @else
                        <img src="{{ asset('assets//dashboard/img/avatar5.png') }}" class="foto mb-3"
                            alt="{{ $penduduk->nama }}">
                    @endif
                </td>
            </tr>
            <tr>
                <td class="border-bottom-0" style="width:430px;padding:0.15rem 0.25rem">Tempat, Tanggal Lahir</td>
                <td class="text-center border-bottom-0" style="width: 25px;padding:0.15rem 0.25rem">:</td>
                <td class="text-uppercase border-bottom-0" style="width: 600px;padding:0.15rem 0.25rem">
                    {{ $penduduk->tempat_lahir . ', ' . tanggal_indonesia($penduduk->tanggal_lahir, false) }}</td>
            </tr>
            <tr>
                <td class="border-bottom-0" style="width:430px;padding:0.15rem 0.25rem">Jenis Kelamin</td>
                <td class="text-center border-bottom-0" style="width: 25px;padding:0.15rem 0.25rem">:</td>
                <td class="text-uppercase border-bottom-0" style="width: 600px;padding:0.15rem 0.25rem">
                    {{ $penduduk->jenis_kelamin->nama }}</td>
            </tr>
            <tr>
                <td class="border-bottom-0" style="width:430px;padding:0.15rem 0.25rem">Akta Kelahiran</td>
                <td class="text-center border-bottom-0" style="width: 25px;padding:0.15rem 0.25rem">:</td>
                <td class="text-uppercase border-bottom-0" style="width: 600px;padding:0.15rem 0.25rem">
                    @if ($penduduk->no_akta_lahir == null)
                        -
                    @else
                        {{ $penduduk->no_akta_lahir }}
                    @endif
                </td>
            </tr>
            <tr>
                <td class="border-bottom-0" style="width:430px;padding:0.15rem 0.25rem">Agama</td>
                <td class="text-center border-bottom-0" style="width: 25px;padding:0.15rem 0.25rem">:</td>
                <td class="text-uppercase border-bottom-0" style="width: 600px;padding:0.15rem 0.25rem">
                    {{ $penduduk->agama->nama }}</td>
            </tr>
            <tr>
                <td class="border-bottom-0" style="width:430px;padding:0.15rem 0.25rem">Pendidikan Terakhir</td>
                <td class="text-center border-bottom-0" style="width: 25px;padding:0.15rem 0.25rem">:</td>
                <td class="text-uppercase border-bottom-0" style="width: 600px;padding:0.15rem 0.25rem">
                    {{ $penduduk->pendidikan_kk->nama }}</td>
            </tr>
            <tr>
                <td class="border-bottom-0" style="width:430px;padding:0.15rem 0.25rem">Pekerjaan</td>
                <td class="text-center border-bottom-0" style="width: 25px;padding:0.15rem 0.25rem">:</td>
                <td class="text-uppercase border-bottom-0" style="width: 600px;padding:0.15rem 0.25rem">
                    {{ $penduduk->pekerjaan->nama }}</td>
            </tr>
            <tr>
                <td class="border-bottom-0" style="width:430px;padding:0.15rem 0.25rem">Golongan Darah</td>
                <td class="text-center border-bottom-0" style="width: 25px;padding:0.15rem 0.25rem">:</td>
                <td class="text-uppercase border-bottom-0" style="width: 600px;padding:0.15rem 0.25rem">
                    {{ $penduduk->golongan_darah->nama }}</td>
            </tr>
            <tr>
                <td class="border-bottom-0" style="width:430px;padding:0.15rem 0.25rem">Cacat</td>
                <td class="text-center border-bottom-0" style="width: 25px;padding:0.15rem 0.25rem">:</td>
                <td class="text-uppercase border-bottom-0" style="width: 600px;padding:0.15rem 0.25rem">
                    {{ $penduduk->cacat->nama }}</td>
            </tr>
            <tr>
                <td class="border-bottom-0" style="width:430px;padding:0.15rem 0.25rem">Status Kawin</td>
                <td class="text-center border-bottom-0" style="width: 25px;padding:0.15rem 0.25rem">:</td>
                <td class="text-uppercase border-bottom-0" style="width: 600px;padding:0.15rem 0.25rem">
                    {{ $penduduk->status_kawin->nama }}
                </td>
            </tr>
            @if ($penduduk->status_kawin_id >= 3)
                <tr>
                    <td class="border-bottom-0" style="width:430px;padding:0.15rem 0.25rem">Tanggal Perceraian</td>
                    <td class="text-center border-bottom-0" style="width: 25px;padding:0.15rem 0.25rem">:</td>
                    <td class="text-uppercase border-bottom-0" style="width: 600px;padding:0.15rem 0.25rem">
                        @if ($penduduk->tanggal_cerai == null)
                            -
                        @else
                            {{ tanggal_indonesia($penduduk->tanggal_cerai, false) }}
                        @endif
                    </td>
                </tr>
            @elseif($penduduk->status_kawin_id == 2)
                <tr>
                    <td class="border-bottom-0" style="width:430px;padding:0.15rem 0.25rem">Tanggal Pernikahan</td>
                    <td class="text-center border-bottom-0" style="width: 25px;padding:0.15rem 0.25rem">:</td>
                    <td class="text-uppercase border-bottom-0" style="width: 600px;padding:0.15rem 0.25rem">
                        @if ($penduduk->tanggal_kawin == null)
                            -
                        @else
                            {{ tanggal_indonesia($penduduk->tanggal_kawin, false) }}
                        @endif
                    </td>
                </tr>
            @endif
            <tr>
                <td class="border-bottom-0" style="width:430px;padding:0.15rem 0.25rem">Hubungan Dalam Keluarga</td>
                <td class="text-center border-bottom-0" style="width: 25px;padding:0.15rem 0.25rem">:</td>
                <td class="text-uppercase border-bottom-0" style="width: 600px;padding:0.15rem 0.25rem">
                    {{ $penduduk->hubungan_keluarga->nama }}</td>
            </tr>
            <tr>
                <td class="border-bottom-0" style="width:430px;padding:0.15rem 0.25rem">Warga Negara</td>
                <td class="text-center border-bottom-0" style="width: 25px;padding:0.15rem 0.25rem">:</td>
                <td class="text-uppercase border-bottom-0" style="width: 600px;padding:0.15rem 0.25rem">
                    {{ $penduduk->warga_negara->nama }}</td>
            </tr>
            <tr>
                <td class="border-bottom-0" style="width:430px;padding:0.15rem 0.25rem">NIK Ayah</td>
                <td class="text-center border-bottom-0" style="width: 25px;padding:0.15rem 0.25rem">:</td>
                <td class="text-uppercase border-bottom-0" style="width: 600px;padding:0.15rem 0.25rem">
                    @if ($penduduk->nik_ayah == null)
                        -
                    @else
                        {{ $penduduk->nik_ayah }}
                    @endif
                </td>
            </tr>
            <tr>
                <td class="border-bottom-0" style="width:430px;padding:0.15rem 0.25rem">Nama Ayah</td>
                <td class="text-center border-bottom-0" style="width: 25px;padding:0.15rem 0.25rem">:</td>
                <td class="text-uppercase border-bottom-0" style="width: 600px;padding:0.15rem 0.25rem">
                    {{ $penduduk->nama_ayah }}</td>
            </tr>
            <tr>
                <td class="border-bottom-0" style="width:430px;padding:0.15rem 0.25rem">NIK Ibu</td>
                <td class="text-center border-bottom-0" style="width: 25px;padding:0.15rem 0.25rem">:</td>
                <td class="text-uppercase border-bottom-0" style="width: 600px;padding:0.15rem 0.25rem">
                    @if ($penduduk->nik_ibu == null)
                        -
                    @else
                        {{ $penduduk->nik_ibu }}
                    @endif
                </td>
            </tr>
            <tr>
                <td class="border-bottom-0" style="width:430px;padding:0.15rem 0.25rem">Nama Ibu</td>
                <td class="text-center border-bottom-0" style="width: 25px;padding:0.15rem 0.25rem">:</td>
                <td class="text-uppercase border-bottom-0" style="width: 600px;padding:0.15rem 0.25rem">
                    {{ $penduduk->nama_ibu }}</td>
            </tr>
            <tr>
                <td class="border-bottom-0" style="width:430px;padding:0.15rem 0.25rem">Status Kependudukan</td>
                <td class="text-center border-bottom-0" style="width: 25px;padding:0.15rem 0.25rem">:</td>
                <td class="text-uppercase border-bottom-0" style="width: 600px;padding:0.15rem 0.25rem">
                    {{ $penduduk->status_penduduk->nama }}</td>
            </tr>
            <tr>
                <td class="border-bottom-0" style="width:430px;padding:0.15rem 0.25rem">Alamat</td>
                <td class="text-center border-bottom-0" style="width: 25px;padding:0.15rem 0.25rem">:</td>
                <td class="text-uppercase border-bottom-0" style="width: 600px;padding:0.15rem 0.25rem"
                    colspan="2">
                    {{ $penduduk->keluarga->alamat . ' RT ' . $penduduk->keluarga->rt->nama . ' RW ' . $penduduk->keluarga->rw->nama . ' ' . $setting->singkatan_dusun . ' ' . $penduduk->keluarga->dusun->nama . '. ' . $setting->singkatan_desa . ' ' . $desa->nama_desa . ', ' . $setting->singkatan_kecamatan . ' ' . $desa->nama_kecamatan . ', ' . $setting->singkatan_kabupaten . ' ' . $desa->nama_kabupaten . '. ' . $desa->provinsi->nama . '. Kodepos ' . $desa->kode_pos }}
                </td>
            </tr>
        </table>
        <table class="table mb-4">
            <tr>
                <td class="text-uppercase text-bold border-bottom-0" colspan="3">Data Kepemilikan Dokumen</td>
            </tr>
            <tr>
                <td class="border-bottom-0" style="width:250px;padding:0.15rem 0.25rem">Nomor Kartu Keluarga (No.KK)
                </td>
                <td class="text-center border-bottom-0" style="width: 10px;padding:0.15rem 0.25rem">:</td>
                <td class="text-uppercase border-bottom-0" style="width: 600px;padding:0.15rem 0.25rem">
                    {{ $penduduk->keluarga->no_kk }}</td>
            </tr>
            <tr>
                <td class="border-bottom-0" style="width:250px;padding:0.15rem 0.25rem">Nomor Paspor
                </td>
                <td class="text-center border-bottom-0" style="width: 10px;padding:0.15rem 0.25rem">:</td>
                <td class="text-uppercase border-bottom-0" style="width: 600px;padding:0.15rem 0.25rem">
                    @if ($penduduk->no_paspor == null)
                        -
                    @else
                        {{ $penduduk->no_paspor }}
                    @endif
                </td>
            </tr>
            <tr>
                <td class="border-bottom-0" style="width:250px;padding:0.15rem 0.25rem">Tanggal Berakhir Paspor
                </td>
                <td class="text-center border-bottom-0" style="width: 10px;padding:0.15rem 0.25rem">:</td>
                <td class="text-uppercase border-bottom-0" style="width: 600px;padding:0.15rem 0.25rem">
                    @if ($penduduk->tanggal_akhir_paspor == null)
                        -
                    @else
                        {{ tanggal_indonesia($penduduk->tanggal_akhir_paspor, false) }}
                    @endif
                </td>
            </tr>
            <tr>
                <td class="border-bottom-0" style="width:250px;padding:0.15rem 0.25rem">Nomor Kitas/Kitap
                </td>
                <td class="text-center border-bottom-0" style="width: 10px;padding:0.15rem 0.25rem">:</td>
                <td class="text-uppercase border-bottom-0" style="width: 600px;padding:0.15rem 0.25rem">
                    @if ($penduduk->no_kitas == null)
                        -
                    @else
                        {{ $penduduk->no_kitas }}
                    @endif
                </td>
            </tr>
            <tr>
                <td class="border-bottom-0" style="width:250px;padding:0.15rem 0.25rem">Tanggal Berakhir Ktas/Kitap
                </td>
                <td class="text-center border-bottom-0" style="width: 10px;padding:0.15rem 0.25rem">:</td>
                <td class="text-uppercase border-bottom-0" style="width: 600px;padding:0.15rem 0.25rem">
                    @if ($penduduk->tanggal_akhir_kitas == null)
                        -
                    @else
                        {{ tanggal_indonesia($penduduk->tanggal_akhir_kitas, false) }}
                    @endif
                </td>
            </tr>

            @if ($penduduk->status_kawin_id >= 3)
                <tr>
                    <td class="border-bottom-0" style="width:250px;padding:0.15rem 0.25rem">Nomor Akta Perceraian
                    </td>
                    <td class="text-center border-bottom-0" style="width: 10px;padding:0.15rem 0.25rem">:</td>
                    <td class="text-uppercase border-bottom-0" style="width: 600px;padding:0.15rem 0.25rem">
                        @if ($penduduk->no_akta_cerai == null)
                            -
                        @else
                            {{ $penduduk->no_akta_cerai }}
                        @endif
                    </td>
                </tr>
            @elseif($penduduk->status_kawin_id >= 2)
                <tr>
                    <td class="border-bottom-0" style="width:250px;padding:0.15rem 0.25rem">Nomor Akta Perkawinan
                    </td>
                    <td class="text-center border-bottom-0" style="width: 10px;padding:0.15rem 0.25rem">:</td>
                    <td class="text-uppercase border-bottom-0" style="width: 600px;padding:0.15rem 0.25rem">
                        @if ($penduduk->no_akta_kawin == null)
                            -
                        @else
                            {{ $penduduk->no_akta_kawin }}
                        @endif
                    </td>
                </tr>
            @endif
        </table>
        <table class="table">
            <tr>
                <td class="border-bottom-0" style="width: 50%;padding:0.15rem 0.25rem"></td>
                <td class="text-center border-bottom-0" style="width: 50%;padding:0.15rem 0.25rem">
                    {{ $setting->sebutan_desa . ' ' . $desa->nama_desa . ', ' . tanggal_indonesia($tanggal, false) }}
                </td>
            </tr>
            <tr>
                <td class="text-center border-bottom-0" style="width: 50%;padding:0.15rem 0.25rem">
                    Yang Bersangkutan
                </td>
                <td class="text-center text-uppercase border-bottom-0" style="width: 50%;padding:0.15rem 0.25rem">
                    {{ $setting->sebutan_desa . ' ' . $desa->nama_desa }}
                </td>
            </tr>
            <tr>
                <td class="border-bottom-0" style="height: 80px"></td>
                <td class="border-bottom-0" style="height: 80px"></td>
            </tr>
            <tr>
                <td class="text-center text-uppercase border-bottom-0" style="width: 50%;padding:0.15rem 0.25rem">
                    {{ '( ' . $penduduk->nama . ' )' }}
                </td>
                <td class="text-center text-bold text-uppercase border-bottom-0"
                    style="width: 50%;padding:0.15rem 0.25rem">
                    {{ '( ' . $desa->nama_kepala_desa . ' )' }}
                </td>
            </tr>
        </table>
    </div>
    <p class="text-center text-light-gray text-xs mt-5 pt-2 mb-0">Dokumen ini dicetak menggunakan aplikasi
        {{ config('app.name') }}
    </p>
    <button onclick="window.print()" class="no-print">Cetak Halaman</button>
</body>

</html>
