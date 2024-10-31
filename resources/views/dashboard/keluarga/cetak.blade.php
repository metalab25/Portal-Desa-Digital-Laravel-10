<!DOCTYPE html>
<html>

<head>
    <title>Cetak Data Kelompok</title>
    <link rel="stylesheet" href="{{ '/assets/dashboard/css/adminlte.css' }}">
    <link rel="stylesheet" href="{{ '/assets/dashboard/css/custom-style.css' }}">
    <style>
        /* Tambahkan gaya untuk tampilan cetak */
        body {
            font-family: Arial, sans-serif !important;
        }

        .table> :not(caption)>*>* {
            padding: 0.15rem 0.5rem !important;
        }

        @media print {

            /* Sembunyikan elemen yang tidak perlu saat cetak */
            .no-print {
                display: none;
            }
        }
    </style>
</head>

<body>
    <h3 class="text-center text-bolder mb-1">SALINAN KARTU KELUARGA</h3>
    <h3 class="text-center text-bold mt-0 mb-5">
        {{ 'No. ' . $keluarga->no_kk }}
    </h3>
    <div class="row mt-5">
        <div class="col-1">
            <div class="d-flex justify-content-center">
                <img src="{{ asset('assets/dashboard/img/pancasila.png') }}" class="img-fluid d-block mx-auto mb-2">
            </div>
        </div>
        <div class="col-sm-6">
            <div class="row">
                <div class="col-sm-4 text-xs">Nama Kepala Keluarga</div>
                <div class="col-sm-8 text-xs">
                    <div class="text-uppercase">
                        : {{ $keluarga->penduduk->nama }}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4 text-xs">Alamat</div>
                <div class="col-sm-8 text-xs">
                    <div class="text-uppercase">
                        : {{ $keluarga->alamat . ' ' . $keluarga->dusun->nama }}</div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4 text-xs">RT/RW</div>
                <div class="col-sm-8 text-xs">
                    <div class="text-uppercase">
                        : {{ $keluarga->rt->nama . '/' . $keluarga->rw->nama }}</div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4 text-xs">RT/RW</div>
                <div class="col-sm-8 text-xs">
                    <div class="text-uppercase">
                        : {{ $desa->kode_pos }}</div>
                </div>
            </div>
        </div>
        <div class="col-sm-5">
            <div class="row">
                <div class="col-sm-4 text-xs">Desa/Kelurahan</div>
                <div class="col-sm-8 text-xs">
                    <div class="text-uppercase">
                        : {{ $desa->nama_desa }}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4 text-xs">{{ $setting->sebutan_kecamatan }}</div>
                <div class="col-sm-8 text-xs">
                    <div class="text-uppercase">
                        : {{ $desa->nama_kecamatan }}</div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4 text-xs">Kabupaten/Kota</div>
                <div class="col-sm-8 text-xs">
                    <div class="text-uppercase">
                        : {{ $desa->nama_kabupaten }}</div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4 text-xs">Provinsi</div>
                <div class="col-sm-8 text-xs">
                    <div class="text-uppercase">
                        : {{ $desa->provinsi->nama }}</div>
                </div>
            </div>
        </div>
    </div>

    <table class="table table-bordered mb-1">
        <thead>
            <tr>
                <th class="text-center align-middle text-xs">No.</th>
                <th class="text-center align-middle text-xs">Nama Lengkap</th>
                <th class="text-center align-middle text-xs">NIK</th>
                <th class="text-center align-middle text-xs">Jenis<br>Kelamin</th>
                <th class="text-center align-middle text-xs">Tempat Lahir</th>
                <th class="text-center align-middle text-xs">Tempat<br>Lahir</th>
                <th class="text-center align-middle text-xs">Agama</th>
                <th class="text-center align-middle text-xs">Pendidikan</th>
                <th class="text-center align-middle text-xs">Jenis Pekerjaan</th>
                <th class="text-center align-middle text-xs">Golongan<br>Darah</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="text-center align-middle text-xs bg-light"></td>
                <td class="text-center align-middle text-xs bg-light">(1)</td>
                <td class="text-center align-middle text-xs bg-light">(2)</td>
                <td class="text-center align-middle text-xs bg-light">(3)</td>
                <td class="text-center align-middle text-xs bg-light">(4)</td>
                <td class="text-center align-middle text-xs bg-light">(5)</td>
                <td class="text-center align-middle text-xs bg-light">(6)</td>
                <td class="text-center align-middle text-xs bg-light">(7)</td>
                <td class="text-center align-middle text-xs bg-light">(8)</td>
                <td class="text-center align-middle text-xs bg-light">(9)</td>
            </tr>
            @foreach ($anggota as $item)
                <tr>
                    <td class="text-center align-middle text-xs">{{ $loop->iteration }}</td>
                    <td class="align-middle text-xs">{{ $item->nama }}</td>
                    <td class="text-center align-middle text-xs">{{ $item->nik }}</td>
                    <td class="text-center align-middle text-xs">{{ $item->jenis_kelamin->nama }}</td>
                    <td class="text-center align-middle text-xs">{{ $item->tempat_lahir }}</td>
                    <td class="text-center align-middle text-xs">
                        {{ \Carbon\Carbon::parse($item->tanggal_lahir)->format('d-m-Y') }}
                    </td>
                    <td class="text-center align-middle text-xs">{{ $item->agama->nama }}</td>
                    <td class="text-center align-middle text-xs">{{ $item->pendidikan_kk->nama }}</td>
                    <td class="text-center align-middle text-xs">{{ $item->pekerjaan->nama }}</td>
                    <td class="text-center align-middle text-xs">{{ $item->golongan_darah->nama }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th class="text-center align-middle text-xs" rowspan="2">No.</th>
                <th class="text-center align-middle text-xs" rowspan="2">Status<br>Perkawinan</th>
                <th class="text-center align-middle text-xs" rowspan="2">Tanggal<br>Perkawinan</th>
                <th class="text-center align-middle text-xs" rowspan="2">Status Hubungan<br>Dalam Keluarga</th>
                <th class="text-center align-middle text-xs" rowspan="2">Kewarganegaraan</th>
                <th class="text-center align-middle text-xs" colspan="2">Dokumen Imigrasi</th>
                <th class="text-center align-middle text-xs" colspan="2">Nama Orang Tua</th>
            </tr>
            <tr>
                <th class="text-center align-middle text-xs">No. Paspor</th>
                <th class="text-center align-middle text-xs">No. KITAP</th>
                <th class="text-center align-middle text-xs">Ayah</th>
                <th class="text-center align-middle text-xs">Ibu</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="text-center align-middle text-xs bg-light"></td>
                <td class="text-center align-middle text-xs bg-light">(10)</td>
                <td class="text-center align-middle text-xs bg-light">(11)</td>
                <td class="text-center align-middle text-xs bg-light">(12)</td>
                <td class="text-center align-middle text-xs bg-light">(13)</td>
                <td class="text-center align-middle text-xs bg-light">(14)</td>
                <td class="text-center align-middle text-xs bg-light">(14)</td>
                <td class="text-center align-middle text-xs bg-light">(16)</td>
                <td class="text-center align-middle text-xs bg-light">(17)</td>
            </tr>
            @foreach ($anggota as $item)
                <tr>
                    <td class="text-center align-middle text-xs">{{ $loop->iteration }}</td>
                    <td class="align-middle text-xs">
                        @if ($item->status_kawin_id == 2)
                            Kawin Tercatat
                        @else
                            {{ $item->status_kawin->nama }}
                        @endif

                    </td>
                    <td class="text-center align-middle text-xs">
                        @if ($item->tanggal_kawin == null)
                            -
                        @else
                            {{ \Carbon\Carbon::parse($item->tanggal_kawin)->format('d-m-Y') }}
                        @endif
                    </td>
                    <td class="text-center align-middle text-xs">{{ $item->hubungan_keluarga->nama }}</td>
                    <td class="text-center align-middle text-xs">{{ $item->warga_negara->nama }}</td>
                    <td class="text-center align-middle text-xs">
                        @if ($item->no_paspor == null)
                            -
                        @else
                            {{ $item->no_paspor }}
                        @endif
                    </td>
                    <td class="text-center align-middle text-xs">
                        @if ($item->no_kitas == null)
                            -
                        @else
                            {{ $item->no_kitas }}
                        @endif
                    </td>
                    <td class="text-center align-middle text-xs">{{ $item->nama_ayah }}</td>
                    <td class="text-center align-middle text-xs">{{ $item->nama_ibu }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="row">
        <div class="col-sm-4">
            <table class="table">
                <tbody>
                    <tr>
                        <td style="border-bottom: 0;"></td>
                    </tr>
                    <tr>
                        <td style="border-bottom: 0;"></td>
                    </tr>
                    <tr>
                        <td style="border-bottom: 0;"></td>
                    </tr>
                    <tr>
                        <td style="border-bottom: 0;"></td>
                    </tr>
                    <tr>
                        <td style="border-bottom: 0;"></td>
                    </tr>
                    <tr>
                        <td style="border-bottom: 0;"></td>
                    </tr>
                    <tr>
                        <td class="text-center text-xs text-uppercase" style="border-bottom: 0;">
                            Kepala Keluarga
                        </td>
                    </tr>
                    <tr>
                        <td style="border-bottom: 0;"></td>
                    </tr>
                    <tr>
                        <td style="border-bottom: 0;"></td>
                    </tr>
                    <tr>
                        <td style="border-bottom: 0;"></td>
                    </tr>
                    <tr>
                        <td style="border-bottom: 0;"></td>
                    </tr>
                    <tr>
                        <td style="border-bottom: 0;"></td>
                    </tr>
                    <tr>
                        <td style="border-bottom: 0;"></td>
                    </tr>
                    <tr>
                        <td style="border-bottom: 0;"></td>
                    </tr>
                    <tr>
                        <td style="border-bottom: 0;"></td>
                    </tr>
                    <tr>
                        <td style="border-bottom: 0;"></td>
                    </tr>
                    <tr>
                        <td style="border-bottom: 0;"></td>
                    </tr>
                    <tr>
                        <td style="border-bottom: 0;"></td>
                    </tr>
                    <tr>
                        <td style="border-bottom: 0;"></td>
                    </tr>
                    <tr>
                        <td style="border-bottom: 0;"></td>
                    </tr>
                    <tr>
                        <td style="border-bottom: 0;"></td>
                    </tr>
                    <tr>
                        <td style="border-bottom: 0;"></td>
                    </tr>
                    <tr>
                        <td style="border-bottom: 0;"></td>
                    </tr>
                    <tr>
                        <td style="border-bottom: 0;"></td>
                    </tr>
                    <tr>
                        <td class="text-center text-xs text-uppercase" style="border-bottom: 0;">
                            {{ $keluarga->penduduk->nama }}
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="col-sm-4"></div>
        <div class="col-sm-4">
            <table class="table">
                <tbody>
                    <tr>
                        <td class="text-center text-xs text-uppercase" style="border-bottom: 0;">
                            {{ $desa->nama_desa . ', ' . $tanggal }}
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center text-xs text-uppercase" style="border-bottom: 0;">
                            {{ $setting->sebutan_kepala_desa . ' ' . $desa->nama_desa }}
                        </td>
                    </tr>
                    <tr>
                        <td style="border-bottom: 0;"></td>
                    </tr>
                    <tr>
                        <td style="border-bottom: 0;"></td>
                    </tr>
                    <tr>
                        <td style="border-bottom: 0;"></td>
                    </tr>
                    <tr>
                        <td style="border-bottom: 0;"></td>
                    </tr>
                    <tr>
                        <td style="border-bottom: 0;"></td>
                    </tr>
                    <tr>
                        <td style="border-bottom: 0;"></td>
                    </tr>
                    <tr>
                        <td style="border-bottom: 0;"></td>
                    </tr>
                    <tr>
                        <td style="border-bottom: 0;"></td>
                    </tr>
                    <tr>
                        <td style="border-bottom: 0;"></td>
                    </tr>
                    <tr>
                        <td style="border-bottom: 0;"></td>
                    </tr>
                    <tr>
                        <td style="border-bottom: 0;"></td>
                    </tr>
                    <tr>
                        <td style="border-bottom: 0;"></td>
                    </tr>
                    <tr>
                        <td style="border-bottom: 0;"></td>
                    </tr>
                    <tr>
                        <td style="border-bottom: 0;"></td>
                    </tr>
                    <tr>
                        <td style="border-bottom: 0;"></td>
                    </tr>
                    <tr>
                        <td style="border-bottom: 0;"></td>
                    </tr>
                    <tr>
                        <td style="border-bottom: 0;"></td>
                    </tr>
                    <tr>
                        <td class="text-center text-xs text-uppercase" style="border-bottom: 0;">
                            {{ $desa->nama_kepala_desa }}
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <p class="text-center text-xs">Dokumen ini dicetak menggunakan aplikasi Portal Desa Digital</p>

    <button onclick="window.print()" class="no-print">Cetak Halaman</button>
</body>

</html>
