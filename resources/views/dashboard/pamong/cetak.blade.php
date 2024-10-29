<!DOCTYPE html>
<html>

<head>
    <title>Cetak Data Pamong</title>
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
        {{ $desa->alamat_kantor . ' ' . $setting->sebutan_kecamatan . ' ' . $desa->nama_kecamatan . ' ' . $setting->sebutan_kabupaten . ' ' . $desa->nama_kabupaten }}<br>
        {{ $desa->provinsi->nama . '. Kode Pos ' . $desa->kode_pos }}<br>
        {{ 'Telp : ' . $desa->telepon . ' - Email : ' . $desa->email_desa }}<br>
        {{ $desa->website }}
    </p>
    <table>
        <thead>
            <tr>
                <th style="border: 1px solid #444 !important">Nama</th>
                <th style="border: 1px solid #444 !important">Jabatan</th>
                <th style="border: 1px solid #444 !important">Nomor SK</th>
                <th style="border: 1px solid #444 !important">Tanggal SK</th>
                <th style="border: 1px solid #444 !important">Masa Jabatan</th>
                <th style="border: 1px solid #444 !important">Pendidikan</th>
                <th style="border: 1px solid #444 !important">Jenis Kelamin</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pamongs as $pamong)
                <tr>
                    <td style="border: 1px solid #444 !important">
                        @if ($pamong->penduduk_id == null)
                            {{ $pamong->nama }}
                        @else
                            {{ $pamong->penduduk->nama }}
                        @endif
                    </td>
                    <td style="border: 1px solid #444 !important">{{ $pamong->jabatan->nama }}</td>
                    <td style="border: 1px solid #444 !important">{{ $pamong->no_sk }}</td>
                    <td style="border: 1px solid #444 !important">{{ tanggal_indonesia($pamong->tgl_sk, false) }}</td>
                    <td style="border: 1px solid #444 !important">{{ $pamong->masa_jabatan }}</td>
                    <td style="border: 1px solid #444 !important">{{ $pamong->penduduk->pendidikan_kk->nama }}</td>
                    <td style="border: 1px solid #444 !important">{{ $pamong->penduduk->jenis_kelamin->nama }}</td>
                </tr>
            @endforeach
        </tbody>
        <tfoot style="border: 0 !important">
            <tr>
                <td colspan="5" style="border: 0 !important"></td>
                <td style="border: 0 !important"></td>
                <td style="border: 0 !important"></td>
            </tr>
            <tr>
                <td colspan="5" style="border: 0 !important"></td>
                <td style="border: 0 !important"></td>
                <td style="border: 0 !important"></td>
            </tr>
            <tr>
                <td colspan="5" style="border: 0 !important"></td>
                <td style="border: 0 !important"></td>
                <td style="border: 0 !important"></td>
            </tr>
            <tr>
                <td colspan="5" style="border: 0 !important"></td>
                <td class="text-center" style="border: 0 !important">{{ $desa->nama_desa . ', ' . $tanggal }}</td>
                <td style="border: 0 !important"></td>
            </tr>
            <tr>
                <td colspan="5" style="border: 0 !important"></td>
                <td class="text-center" style="border: 0 !important">{{ $setting->sebutan_kepala_desa }}</td>
                <td style="border: 0 !important"></td>
            </tr>
            <tr>
                <td colspan="5" style="border: 0 !important"></td>
                <td style="border: 0 !important"></td>
                <td style="border: 0 !important"></td>
            </tr>
            <tr>
                <td colspan="5" style="border: 0 !important"></td>
                <td style="border: 0 !important"></td>
                <td style="border: 0 !important"></td>
            </tr>
            <tr>
                <td colspan="5" style="border: 0 !important"></td>
                <td style="border: 0 !important"></td>
                <td style="border: 0 !important"></td>
            </tr>
            <tr>
                <td colspan="5" style="border: 0 !important"></td>
                <td style="border: 0 !important"></td>
                <td style="border: 0 !important"></td>
            </tr>
            <tr>
                <td colspan="5" style="border: 0 !important"></td>
                <td style="border: 0 !important"></td>
                <td style="border: 0 !important"></td>
            </tr>
            <tr>
                <td colspan="5" style="border: 0 !important"></td>
                <td style="border: 0 !important"></td>
                <td style="border: 0 !important"></td>
            </tr>
            <tr>
                <td colspan="5" style="border: 0 !important"></td>
                <td style="border: 0 !important"></td>
                <td style="border: 0 !important"></td>
            </tr>
            <tr>
                <td colspan="5" style="border: 0 !important"></td>
                <td class="text-center" style="border: 0 !important">
                    <u><b>{{ $desa->nama_kepala_desa }}</b></u>
                    <br>
                    NIP : {{ $desa->nip_kepa }}
                </td>
                <td style="border: 0 !important"></td>
            </tr>
        </tfoot>
    </table>


    <button onclick="window.print()" class="no-print">Cetak Halaman</button>
</body>

</html>
