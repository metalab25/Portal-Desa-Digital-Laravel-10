<!DOCTYPE html>
<html>

<head>
    <title>Cetak Data Kelompok</title>
    <link rel="stylesheet" href="{{ '/assets/dashboard/css/adminlte.css' }}">
    <link rel="stylesheet" href="{{ '/assets/dashboard/css/custom-style.css' }}">
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .logo {
            width: 100px;
            height: auto;
        }

        @media print {
            .no-print {
                display: none;
            }
        }
    </style>
</head>

<body>
    <table class="table mb-4">
        <tr>
            <td class="align-middle border-bottom-0">
                @if ($desa->logo)
                    <img src="{{ asset('storage/' . $desa->logo) }}" class="logo float-start"
                        alt="{{ $setting->sebutan_desa . '' . $desa->nama_desa }}">
                @else
                    <img src="{{ asset('assets//dashboard/img/avatar5.png') }}" class="logo float-start"
                        alt="{{ $setting->sebutan_desa . '' . $desa->nama_desa }}">
                @endif
                <h6 class="text-center text-uppercase text-bold">
                    Pemerintah {{ $setting->sebutan_kabupaten . ' ' . $desa->nama_kabupaten }}
                    <br>
                    {{ $setting->sebutan_kecamatan . ' ' . $desa->nama_kecamatan }}
                    <br>
                    {{ $setting->sebutan_desa . ' ' . $desa->nama_desa }}
                    <br><br>
                    Laporan Data Statistik Kependudukan Berdasarkan
                    <br>{{ $program->nama }}
                </h6>
            </td>
        </tr>
    </table>
    <button onclick="window.print()" class="no-print float-end">Cetak Halaman</button>

    <table class="table mb-4">
        <tr>
            <td class="align-middle border-bottom-0" style="width: 140px;padding:0.15rem 0.25rem">Laporan No.</td>
            <td class="text-center align-middle border-bottom-0" style="width: 10px;padding:0.15rem 0.25rem">:</td>
            <td class="align-middle border-bottom-0" style="padding:0.15rem 0.25rem">
                {{ $tanggal->format('d-m-Y') . '-0001' }}</td>
        </tr>
        <tr>
            <td class="align-middle border-bottom-0" style="width: 140px;padding:0.15rem 0.25rem">Laporan Program</td>
            <td class="text-center align-middle border-bottom-0" style="width: 10px;padding:0.15rem 0.25rem">:</td>
            <td class="align-middle border-bottom-0" style="padding:0.15rem 0.25rem">{{ $program->nama }}</td>
        </tr>
    </table>

    <div class="table-responsive">
        <table class="table table-bordered full-w">
            <thead>
                <tr>
                    <th class="text-center align-middle border-bottom-0" style="width: 50px;padding:0.15rem 0.25rem">
                        No.
                    </th>
                    <th class="align-middle border-bottom-0" style="padding:0.15rem 0.25rem">
                        Sasaran
                    </th>
                    <th class="text-center align-middle border-bottom-0" style="width:200px;padding:0.15rem 0.25rem">
                        Penerima
                    </th>
                </tr>
            </thead>
            <tbody>
                @if ($program->bantuan_sasaran_id == 1)
                    <tr>
                        <td class="text-center align-middle border-bottom-0"
                            style="width: 50px;padding:0.15rem 0.25rem">
                            1
                        </td>
                        <td class="align-middle border-bottom-0" style="padding:0.15rem 0.25rem">
                            Peserta
                        </td>
                        <td class="text-center align-middle border-bottom-0" style="padding:0.15rem 0.25rem">
                            {{ $penerima }}
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center align-middle border-bottom-0"
                            style="width: 50px;padding:0.15rem 0.25rem">
                            2
                        </td>
                        <td class="align-middle border-bottom-0" style="padding:0.15rem 0.25rem">
                            Bukan Peserta
                        </td>
                        <td class="text-center align-middle border-bottom-0" style="padding:0.15rem 0.25rem">
                            {{ $penduduk - $penerima }}
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center align-middle border-bottom-0"
                            style="width: 50px;padding:0.15rem 0.25rem">

                        </td>
                        <td class="align-middle border-bottom-0 text-semibold" style="padding:0.15rem 0.25rem">
                            Total
                        </td>
                        <td class="text-center align-middle border-bottom-0 text-semibold"
                            style="padding:0.15rem 0.25rem">
                            {{ $penduduk }}
                        </td>
                    </tr>
                @elseif($program->bantuan_sasaran_id == 2)
                    <tr>
                        <td class="text-center align-middle border-bottom-0"
                            style="width: 50px;padding:0.15rem 0.25rem">
                            1
                        </td>
                        <td class="align-middle border-bottom-0" style="padding:0.15rem 0.25rem">
                            Peserta
                        </td>
                        <td class="text-center align-middle border-bottom-0" style="padding:0.15rem 0.25rem">
                            {{ $penerima }}
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center align-middle border-bottom-0"
                            style="width: 50px;padding:0.15rem 0.25rem">
                            2
                        </td>
                        <td class="align-middle border-bottom-0" style="padding:0.15rem 0.25rem">
                            Bukan Peserta
                        </td>
                        <td class="text-center align-middle border-bottom-0" style="padding:0.15rem 0.25rem">
                            {{ $keluarga - $penerima }}
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center align-middle border-bottom-0"
                            style="width: 50px;padding:0.15rem 0.25rem">

                        </td>
                        <td class="align-middle border-bottom-0 text-semibold" style="padding:0.15rem 0.25rem">
                            Total
                        </td>
                        <td class="text-center align-middle border-bottom-0 text-semibold"
                            style="padding:0.15rem 0.25rem">
                            {{ $keluarga }}
                        </td>
                    </tr>
                @elseif($program->bantuan_sasaran_id == 3)
                    <tr>
                        <td class="text-center align-middle border-bottom-0"
                            style="width: 50px;padding:0.15rem 0.25rem">
                            1
                        </td>
                        <td class="align-middle border-bottom-0" style="padding:0.15rem 0.25rem">
                            Peserta
                        </td>
                        <td class="text-center align-middle border-bottom-0" style="padding:0.15rem 0.25rem">
                            {{ $penerima }}
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center align-middle border-bottom-0"
                            style="width: 50px;padding:0.15rem 0.25rem">
                            2
                        </td>
                        <td class="align-middle border-bottom-0" style="padding:0.15rem 0.25rem">
                            Bukan Peserta
                        </td>
                        <td class="text-center align-middle border-bottom-0" style="padding:0.15rem 0.25rem">
                            {{ $kelompok - $penerima }}
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center align-middle border-bottom-0"
                            style="width: 50px;padding:0.15rem 0.25rem">

                        </td>
                        <td class="align-middle border-bottom-0 text-semibold" style="padding:0.15rem 0.25rem">
                            Total
                        </td>
                        <td class="text-center align-middle border-bottom-0 text-semibold"
                            style="padding:0.15rem 0.25rem">
                            {{ $kelompok }}
                        </td>
                    </tr>
                @endif
            </tbody>
        </table>
        <p class="text-xs">Laporan data statistik kependudukan menurut blsm pada tanggal :
            {{ tanggal_indonesia($tanggal, false) }}</p>
        <table class="table">
            <tr>
                <td class="border-bottom-0" style="width: 70%"></td>
                <td class="border-bottom-0" style="width: 30%"></td>
            </tr>
            <tr>
                <td class="border-bottom-0" style="width: 70%"></td>
                <td class="text-center border-bottom-0">{{ $setting->sebutan_desa . ' ' . $desa->nama_desa }}</td>
            </tr>
            <tr>
                <td class="border-bottom-0" style="width: 70%"></td>
                <td class="border-bottom-0" style="width: 30%"></td>
            </tr>
            <tr>
                <td class="border-bottom-0" style="width: 70%"></td>
                <td class="border-bottom-0" style="width: 30%"></td>
            </tr>
            <tr>
                <td class="border-bottom-0" style="width: 70%"></td>
                <td class="border-bottom-0" style="width: 30%"></td>
            </tr>
            <tr>
                <td class="border-bottom-0" style="width: 70%"></td>
                <td class="border-bottom-0" style="width: 30%"></td>
            </tr>
            <tr>
                <td class="border-bottom-0" style="width: 50%;padding:0.1rem 0.25rem"></td>
                <td class="text-center border-bottom-0" style="padding:0.1rem 0.25rem">{{ $desa->nama_kepala_desa }}
                </td>
            </tr>
            <tr>
                <td class="border-bottom-0" style="width: 50%;padding:0.1rem 0.25rem"></td>
                <td class="text-center border-bottom-0" style="padding:0.1rem 0.25rem">
                    {{ 'NIP/NIAP : ' . $desa->nip_kepala_desa }}</td>
            </tr>
        </table>
        <p class="text-xs">{{ 'Tanggal cetak : ' . tanggal_indonesia($tanggal, false) }}</p>
        <p class="text-center text-light-gray text-xs mt-5 pt-2 mb-0">Dokumen ini dicetak menggunakan aplikasi
            {{ config('app.name') }}
        </p>
    </div>
</body>

</html>
