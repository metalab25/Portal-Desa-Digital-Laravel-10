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
    <h4 class="text-center text-bold mb-1">{{ $setting->sebutan_desa . ' ' . $desa->nama_desa }}</h4>
    <p class="text-center text-xs mt-0">
        {{ $setting->sebutan_kecamatan . ' ' . $desa->nama_kecamatan . ', ' . $setting->sebutan_kabupaten . ' ' . $desa->nama_kabupaten }}
    </p>
    <h4 class="text-center text-bold my-3">Agenda Surat Masuk</h4>
    <button onclick="window.print()" class="no-print float-end">Cetak Halaman</button>
    <table class="table table-bordered full-w">
        <thead>
            <tr>
                <th class="text-center align-middle" style="padding:0.25rem">Nomor Urut</th>
                <th class="text-center align-middle" style="padding:0.25rem">Nomor Surat</th>
                <th class="text-center align-middle" style="padding:0.25rem">Tanggal Surat</th>
                <th class="text-center align-middle" style="padding:0.25rem">Pengirim</th>
                <th class="text-center align-middle" style="padding:0.25rem">Perihal/Isian Singkat</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($surat as $item)
                <tr>
                    <td class="text-center align-middle" style="padding: 0.1rem 0.25rem">
                        {{ $item->nomor_urut }}
                    </td>
                    <td class="text-center align-middle" style="padding: 0.1rem 0.25rem">
                        {{ $item->nomor_surat }}
                    </td>
                    <td class="text-center align-middle" style="padding: 0.1rem 0.25rem">
                        {{ tanggal_indonesia($item->tanggal_surat, false) }}
                    </td>
                    <td class="text-center align-middle" style="padding: 0.1rem 0.25rem">{{ $item->pengirim }}</td>
                    <td class="text-center align-middle" style="padding: 0.1rem 0.25rem">{{ $item->perihal }}</td>
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
            <td class="text-center" style="border: 0 !important;padding:0.1rem 0.25rem"></td>
            <td class="text-center" style="border: 0 !important;padding:0.1rem 0.25rem">
                {{ $desa->nama_desa . ', ' . tanggal_indonesia($tanggal, false) }}</td>
        </tr>
        <tr>
            <td class="text-center" style="border: 0 !important;padding:0.1rem 0.25rem"></td>
            <td class="text-center" style="border: 0 !important;padding:0.1rem 0.25rem">
                {{ $setting->sebutan_kepala_desa }}
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
