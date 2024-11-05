<!DOCTYPE html>
<html>

<head>
    <title>{{ $page }}</title>
    <link rel="stylesheet" href="{{ '/assets/dashboard/css/adminlte.css' }}">
    <link rel="stylesheet" href="{{ '/assets/dashboard/css/custom-style.css' }}">
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        @media print {
            .no-print {
                display: none;
            }
        }
    </style>
</head>

<body>
    <h4 class="text-center text-uppercase text-bold mb-1">{{ $setting->sebutan_desa . ' ' . $desa->nama_desa }}</h4>
    <p class="text-center text-xs mt-0">
        {{ $setting->sebutan_kecamatan . ' ' . $desa->nama_kecamatan . ', ' . $setting->sebutan_kabupaten . ' ' . $desa->nama_kabupaten }}
    </p>
    <h4 class="text-center text-bold text-uppercase my-3">Buku Peraturan
        {{ $setting->sebutan_desa . ' ' . $desa->nama_desa }}</h4>
    <button onclick="window.print()" class="no-print float-end">Cetak Halaman</button>
    <table class="table table-bordered full-w">
        <thead>
            <tr>
                <th class="text-center align-middle bg-light" style="padding: 0.5rem">No.</th>
                <th class="text-center align-middle bg-light" style="padding: 0.5rem">Peraturan</th>
                <th class="text-center align-middle bg-light" style="padding: 0.5rem">Jenis<br>Peraturan</th>
                <th class="text-center align-middle bg-light" style="padding: 0.5rem">Uraian<br>Singkat</th>
                <th class="text-center align-middle bg-light" style="padding: 0.5rem">Tanggal<br>Kesepakatan</th>
                <th class="text-center align-middle bg-light" style="padding: 0.5rem">Nomor Dan Tanggal<br>Ditetapkan
                </th>
                <th class="text-center align-middle bg-light" style="padding: 0.5rem">Nomor Dan Tanggal<br>Dilaporkan
                </th>
                <th class="text-center align-middle bg-light" style="padding: 0.5rem">Nomor Dan Tanggal<br>Diundangkan
                    Dalam Lembaran {{ $setting->sebutan_desa }}
                </th>
                <th class="text-center align-middle bg-light" style="padding: 0.5rem">Nomor Dan Tanggal<br>Diundangkan
                    Dalam Berita {{ $setting->sebutan_desa }}
                </th>
                <th class="text-center align-middle bg-light" style="padding: 0.5rem">Ket.</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($peraturans as $item)
                <tr>
                    <td class="text-center align-middle" style="padding: 0.2rem 0.25rem">
                        {{ ($peraturans->currentPage() - 1) * $peraturans->perPage() + $loop->iteration }}
                    </td>
                    <td class="align-middle" style="padding: 0.2rem 0.25rem">
                        {{ $item->nama }}
                    </td>
                    <td class="text-center align-middle" style="padding: 0.2rem 0.25rem">
                        {{ $item->jenis_peraturan }}
                    </td>
                    <td class="align-middle" style="padding: 0.2rem 0.25rem">
                        {{ $item->uraian_singkat }}
                    </td>
                    <td class="text-center align-middle" style="padding: 0.2rem 0.25rem">
                        {{ tanggal_indonesia($item->tanggal_kesepakatan, false) }}
                    </td>
                    <td class="text-center align-middle" style="padding: 0.2rem 0.25rem">
                        {{ $item->nomor_tetapan . '/' . \Carbon\Carbon::parse($item->tanggal_tetapan)->format('d-m-Y') }}
                    </td>
                    <td class="text-center align-middle" style="padding: 0.2rem 0.25rem">
                        {{ $item->nomor_dilaporkan . '/' . \Carbon\Carbon::parse($item->tanggal_dilaporkan)->format('d-m-Y') }}
                    </td>
                    <td class="text-center align-middle" style="padding: 0.2rem 0.25rem">
                        {{ $item->nomor_lembaran_desa . '/' . \Carbon\Carbon::parse($item->tanggal_lembaran_desa)->format('d-m-Y') }}
                    </td>
                    <td class="text-center align-middle" style="padding: 0.2rem 0.25rem">
                        {{ $item->nomor_berita_desa . '/' . \Carbon\Carbon::parse($item->tanggal_berita_desa)->format('d-m-Y') }}
                    </td>
                    <td class="text-center align-middle" style="padding: 0.2rem 0.25rem"></td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <table class="table full-w">
        <tr>
            <td style="border: 0 !important;width: 50%"></td>
            <td style="border: 0 !important;width: 50%"></td>
        </tr>
        <tr>
            <td style="border: 0 !important"></td>
            <td style="border: 0 !important"></td>
        </tr>
        <tr>
            <td style="border: 0 !important"></td>
            <td style="border: 0 !important"></td>
        </tr>
        <tr>
            <td class="text-center" style="padding: 0.1rem;border: 0 !important"></td>
            <td class="text-center" style="padding: 0.1rem;border: 0 !important">
                {{ $desa->nama_desa . ', ' . tanggal_indonesia($tanggal, false) }}</td>
        </tr>
        <tr>
            <td class="text-center" style="padding: 0.1rem;border: 0 !important"></td>
            <td class="text-center" style="padding: 0.1rem;border: 0 !important">{{ $setting->sebutan_kepala_desa }}
            </td>
        </tr>
        <tr>
            <td style="border: 0 !important"></td>
            <td style="border: 0 !important"></td>
        </tr>
        <tr>
            <td style="border: 0 !important"></td>
            <td style="border: 0 !important"></td>
        </tr>
        <tr>
            <td style="border: 0 !important"></td>
            <td style="border: 0 !important"></td>
        </tr>
        <tr>
            <td style="border: 0 !important"></td>
            <td class="text-center" style="border: 0 !important">
                <u><b>{{ $desa->nama_kepala_desa }}</b></u>
                <br>
                NIP : {{ $desa->nip_kepala_desa }}
            </td>
        </tr>
    </table>
</body>

</html>
