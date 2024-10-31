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

        .border-1 {
            border: 1px solid #444;
            max-width: fit-content;
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
    <div class="container-fluid">
        <div class="text-center mb=5">
            @if ($desa->logo)
                <img src="{{ asset('storage/' . $desa->logo) }}" class="logo mb-3"
                    alt="{{ $setting->sebutan_desa . '' . $desa->nama_desa }}">
            @else
                <img src="{{ asset('assets//dashboard/img/avatar5.png') }}" class="logo mb-3"
                    alt="{{ $setting->sebutan_desa . '' . $desa->nama_desa }}">
            @endif
            <h5 class="text-uppercase text-bold">{{ $setting->sebutan_desa . ' ' . $desa->nama_desa }}</h5>
            <h6>
                {{ $desa->alamat_kantor . ' ' . $setting->sebutan_kecamatan . ' ' . $desa->nama_kecamatan . ', ' . $setting->singkatan_kabupaten . ' ' . $desa->nama_kabupaten . '. Provinsi ' . $desa->provinsi->nama . ' . Kode Pos ' . $desa->kode_pos }}
                <br>
                {{ 'Telp. ' . $desa->telepon . ' - Email. ' . $desa->email_desa . ' - ' . $desa->website }}
            </h6>
            <h4 class="text-uppercase text-bold mb-3">Daftar Penerima Program Bantuan</h4>
        </div>
        <button onclick="window.print()" class="no-print float-end">Cetak Halaman</button>
        <table class="table table-striped mb-3">
            <tbody>
                <tr>
                    <td class="border-bottom-0" width="130px">Nama Program</td>
                    <td class="text-center border-bottom-0" width="10px">:</td>
                    <td class="border-bottom-0">{{ $bantuan->nama }}</td>
                </tr>
                <tr>
                    <td class="border-bottom-0" width="130px">Sasaran Program</td>
                    <td class="text-center border-bottom-0" width="10px">:</td>
                    <td class="border-bottom-0">{{ $bantuan->bantuan_sasaran->nama }}</td>
                </tr>
                <tr>
                    <td class="border-bottom-0" width="130px">Masa Berlaku</td>
                    <td class="text-center" width="10px">:</td>
                    <td class="border-bottom-0">
                        {{ tanggal_indonesia($bantuan->mulai, false) . ' s/d ' . tanggal_indonesia($bantuan->akhir, false) }}
                    </td>
                </tr>
                <tr>
                    <td class="border-bottom-0" width="130px">Keterangan</td>
                    <td class="text-center border-bottom-0" width="10px">:</td>
                    <td class="border-bottom-0">{{ $bantuan->deskripsi }}</td>
                </tr>
            </tbody>
        </table>
        <div class="table-responsive">
            <table class="table table-striped table-bordered mb-5">
                <thead>
                    <tr>
                        <th class="text-center align-middle" width="3%">No.</th>
                        <th class="text-center align-middle">
                            @if ($bantuan->bantuan_sasaran_id == 1)
                                Nama Penduduk
                            @elseif($bantuan->bantuan_sasaran_id == 2)
                                Kepala Keluarga
                            @elseif($bantuan->bantuan_sasaran_id == 3)
                                Nama Ketua
                            @endif
                        </th>
                        <th class="text-center align-middle">
                            @if ($bantuan->bantuan_sasaran_id == 1)
                                NIK
                            @elseif($bantuan->bantuan_sasaran_id == 2)
                                Nomor KK
                            @elseif($bantuan->bantuan_sasaran_id == 3)
                                Nama Kelompok
                            @endif
                        </th>
                        <th class="text-center align-middle">Alamat</th>
                        <th class="text-center align-middle">No. Kartu Bantuan</th>
                        <th class="text-center align-middle">Nama Kartu Bantuan</th>
                        <th class="text-center align-middle">Tempat, Tanggal Lahir</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($penerima as $item)
                        <tr>
                            <td class="text-center align-middle">
                                {{ ($penerima->currentPage() - 1) * $penerima->perPage() + $loop->iteration }}
                            </td>
                            <td class="align-middle">
                                @if ($item->bantuan_sasaran_id == 1)
                                    {{ $item->penduduk->nama }}
                                @elseif($item->bantuan_sasaran_id == 2)
                                    {{ $item->keluarga->penduduk->nama }}
                                @elseif($item->bantuan_sasaran_id == 3)
                                    {{ $item->kelompok->penduduk->nama }}
                                @endif
                            </td>
                            <td class="text-center align-middle">
                                @if ($item->bantuan_sasaran_id == 1)
                                    {{ $item->penduduk->nik }}
                                @elseif($item->bantuan_sasaran_id == 2)
                                    {{ $item->keluarga->no_kk }}
                                @elseif($item->bantuan_sasaran_id == 3)
                                    {{ $item->kelompok->nama }}
                                @endif
                            </td>
                            <td class="align-middle">
                                @if ($item->bantuan_sasaran_id == 1)
                                    {{ $item->penduduk->keluarga->alamat . ' RT ' . $item->penduduk->keluarga->rt->nama . ' RW ' . $item->penduduk->keluarga->rw->nama . ' ' . $setting->sebutan_dusun . ' ' . $item->penduduk->keluarga->dusun->nama }}
                                @elseif($item->bantuan_sasaran_id == 2)
                                    {{ $item->keluarga->alamat . ' RT ' . $item->keluarga->rt->nama . ' RW ' . $item->keluarga->rw->nama . ' ' . $setting->sebutan_dusun . ' ' . $item->keluarga->dusun->nama }}
                                @endif

                            </td>
                            <td class="text-center align-middle">
                                {{ $item->no_kartu }}
                            </td>
                            <td class="align-middle">
                                {{ $item->nama_kartu }}
                            </td>
                            <td class="text-center align-middle">
                                {{ $item->tempat_lahir_kartu . ', ' . tanggal_indonesia($item->tanggal_lahir_kartu, false) }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <table class="table">
                <tr>
                    <td class="border-bottom-0" style="width: 50%;padding:0.15rem 0.25rem"></td>
                    <td class="text-center border-bottom-0" style="width: 50%;padding:0.15rem 0.25rem">
                        Mengetahui
                    </td>
                </tr>
                <tr>
                    <td class="text-center border-bottom-0" style="width: 50%;padding:0.15rem 0.25rem"></td>
                    <td class="text-center text-uppercase border-bottom-0" style="width: 50%;padding:0.15rem 0.25rem">
                        {{ $setting->sebutan_desa . ' ' . $desa->nama_desa }}
                    </td>
                </tr>
                <tr>
                    <td class="border-bottom-0" style="height: 60px"></td>
                    <td class="border-bottom-0" style="height: 60px"></td>
                </tr>
                <tr>
                    <td class="text-uppercase border-bottom-0" style="width: 50%;padding:0.15rem 0.25rem">
                        <div class="border-1 py-1 px-2">
                            <b>Cetak :</b>
                            {{ tanggal_indonesia($tanggal, false) }}
                        </div>
                    </td>
                    <td class="text-center text-bold text-uppercase border-bottom-0"
                        style="width: 50%;padding:0.15rem 0.25rem">
                        {{ '( ' . $desa->nama_kepala_desa . ' )' }}
                    </td>
                </tr>
            </table>
        </div>
    </div>
    <p class="text-center text-light-gray text-xs mt-5 pt-2 mb-0">Dokumen ini dicetak menggunakan aplikasi
        {{ config('app.name') }}
    </p>
</body>

</html>
