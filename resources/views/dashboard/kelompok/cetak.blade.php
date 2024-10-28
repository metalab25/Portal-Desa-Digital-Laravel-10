<!DOCTYPE html>
<html>

<head>
    <title>Cetak Data Kelompok</title>
    <style>
        /* Tambahkan gaya untuk tampilan cetak */
        body {
            font-family: Arial, sans-serif;
        }

        .mb-0 {
            margin-bottom: 0;
        }

        .mb-1 {
            margin-bottom: 10px;
        }

        .mt-0 {
            margin-top: 0;
        }

        .text-center {
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table,
        th,
        td {
            padding: 5px;
            text-align: left;
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
    <h1 class="text-center mb-1">{{ $setting->sebutan_desa . ' ' . $desa->nama_desa }}</h1>
    <p class="text-center mt-0">
        {{ $desa->alamat_kantor . ' ' . $setting->sebutan_desa . ' ' . $desa->nama_desa . '. ' . $setting->sebutan_kecamatan . ' ' . $desa->nama_kecamatan . ', ' . $setting->sebutan_kabupaten . ' ' . $desa->nama_kabupaten }}<br>
        {{ $desa->provinsi->nama . '. Kode Pos ' . $desa->kode_pos }}<br>
        {{ 'Telp : ' . $desa->telepon . ' - Email : ' . $desa->email_desa }}<br>
        {{ $desa->website }}
    </p>
    <table style="margin-bottom: 20px">
        <tbody>
            <tr>
                <td width="150px"><b>Nama Kelompok</b></td>
                <td class="text-center" width="2%"><b>:</b></td>
                <td>{{ $kelompok->nama }}</td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td width="150px"><b>Kategori Kelompok</b></td>
                <td class="text-center" width="2%"><b>:</b></td>
                <td>{{ $kelompok->kelompok_kategori->nama }}</td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        </tbody>
    </table>
    {{-- <p class="mb-0"><b>Nama Kelompok : </b>{{ $kelompok->nama }}</p>
    <p class="mt-0"><b>Kategoti : </b>{{ $kelompok->kelompok_kategori->nama }}</p> --}}
    <table>
        <thead>
            <tr>
                <th style="border: 1px solid #444 !important">Nama</th>
                <th class="text-center" style="border: 1px solid #444 !important">Nomor Anggota</th>
                <th class="text-center" style="border: 1px solid #444 !important">Jabatan</th>
                <th class="text-center" style="border: 1px solid #444 !important">Jenis Kelamin</th>
                <th class="text-center" style="border: 1px solid #444 !important">RT</th>
                <th class="text-center" style="border: 1px solid #444 !important">RW</th>
                <th class="text-center" style="border: 1px solid #444 !important">{{ $setting->sebutan_dusun }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($anggotas as $item)
                <tr>
                    <td style="border: 1px solid #444 !important">
                        {{ $item->penduduk->nama }}
                    </td>
                    <td class="text-center" style="border: 1px solid #444 !important">
                        {{ $item->nomor_anggota }}
                    </td>
                    <td class="text-center" style="border: 1px solid #444 !important">
                        {{ $item->kelompok_jabatan->nama }}
                    </td>
                    <td class="text-center" style="border: 1px solid #444 !important">
                        {{ $item->penduduk->jenis_kelamin->nama }}
                    </td>
                    <td class="text-center" style="border: 1px solid #444 !important">
                        {{ $item->penduduk->keluarga->rt->nama ?? '-' }}
                    </td>
                    <td class="text-center" style="border: 1px solid #444 !important">
                        {{ $item->penduduk->keluarga->rw->nama ?? '-' }}
                    </td>
                    <td class="text-center" style="border: 1px solid #444 !important">
                        {{ $item->penduduk->keluarga->dusun->nama ?? '-' }}
                    </td>
                </tr>
            @endforeach
        </tbody>
        <tfoot style="border: 0 !important">
            <tr>
                <td colspan="6" style="border: 0 !important"></td>
                <td style="border: 0 !important"></td>
            </tr>
            <tr>
                <td colspan="6" style="border: 0 !important"></td>
                <td style="border: 0 !important"></td>
            </tr>
            <tr>
                <td colspan="6" style="border: 0 !important"></td>
                <td style="border: 0 !important"></td>
            </tr>
            <tr>
                <td colspan="6" style="border: 0 !important"></td>
                <td class="text-center" style="border: 0 !important">{{ $desa->nama_desa . ', ' . $tanggal }}</td>
            </tr>
            <tr>
                <td colspan="6" style="border: 0 !important"></td>
                <td class="text-center" style="border: 0 !important">{{ $setting->sebutan_kepala_desa }}</td>
            </tr>
            <tr>
                <td colspan="6" style="border: 0 !important"></td>
                <td style="border: 0 !important"></td>
            </tr>
            <tr>
                <td colspan="6" style="border: 0 !important"></td>
                <td style="border: 0 !important"></td>
            </tr>
            <tr>
                <td colspan="6" style="border: 0 !important"></td>
                <td style="border: 0 !important"></td>
            </tr>
            <tr>
                <td colspan="6" style="border: 0 !important"></td>
                <td style="border: 0 !important"></td>
            </tr>
            <tr>
                <td colspan="6" style="border: 0 !important"></td>
                <td style="border: 0 !important"></td>
            </tr>
            <tr>
                <td colspan="6" style="border: 0 !important"></td>
                <td style="border: 0 !important"></td>
            </tr>
            <tr>
                <td colspan="6" style="border: 0 !important"></td>
                <td style="border: 0 !important"></td>
            </tr>
            <tr>
                <td colspan="6" style="border: 0 !important"></td>
                <td class="text-center" style="border: 0 !important">
                    <u><b>{{ $desa->nama_kepala_desa }}</b></u>
                    <br>
                    NIP : {{ $desa->nip_kepa }}
                </td>
            </tr>
        </tfoot>
    </table>


    <button onclick="window.print()" class="no-print">Cetak Halaman</button>
</body>

</html>
