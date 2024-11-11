@extends('dashboard.layouts.header')

@section('content')
    <div class="app-content">
        <div class="container-fluid">
            <div class="card rounded-3 shadow">
                <div class="card-header">
                    <div class="float-end">
                        <button type="button" class="btn btn-primary btn-block btn-sm" data-bs-toggle="modal"
                            data-bs-target="#modal-create-I">
                            Tambah Sumber Kode I
                        </button>
                        <button type="button" class="btn btn-primary btn-block btn-sm" data-bs-toggle="modal"
                            data-bs-target="#modal-create-II">
                            Tambah Sumber Kode II
                        </button>
                        <button type="button" class="btn btn-primary btn-block btn-sm" data-bs-toggle="modal"
                            data-bs-target="#modal-create-III">
                            Tambah Sumber Kode III
                        </button>
                        <button type="button" class="btn btn-success btn-block btn-sm" data-bs-toggle="modal"
                            data-bs-target="#modal-create-anggaran">
                            Tambah Anggaran
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered mb-0">
                            <thead>
                                <tr>
                                    <th class="text-center align-middle" colspan="3" rowspan="2">Uraian</th>
                                    <th class="text-center align-middle">Anggaran</th>
                                    <th class="text-center align-middle">Realisasi</th>
                                    <th class="text-center align-middle">Lebih/Kurang</th>
                                    <th class="text-center align-middle">Persentase</th>
                                </tr>
                                <tr>
                                    <th class="text-center align-middle">(Rp)</th>
                                    <th class="text-center align-middle">(Rp)</th>
                                    <th class="text-center align-middle">(Rp)</th>
                                    <th class="text-center align-middle">(%)</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($sumber as $item)
                                    @php
                                        // Jika item memiliki tipe 2, hitung total berdasarkan parent jika nilai_anggaran atau nilai_realisasi bernilai null
                                        if ($item->tipe == 2) {
                                            $totalAnggaran = $item->nilai_anggaran;
                                            $totalRealisasi = $item->nilai_realisasi;

                                            if ($item->nilai_anggaran === null || $item->nilai_realisasi === null) {
                                                $totalAnggaran = $sumber
                                                    ->where('parent', $item->id)
                                                    ->sum('nilai_anggaran');
                                                $totalRealisasi = $sumber
                                                    ->where('parent', $item->id)
                                                    ->sum('nilai_realisasi');
                                            }

                                            // Hitung total selisih dan persentase
                                            $totalSelisih = $totalAnggaran - $totalRealisasi;
                                            $totalPersentase =
                                                $totalAnggaran > 0 ? ($totalRealisasi / $totalAnggaran) * 100 : 0;
                                        }

                                        // Menghitung selisih dan persentase untuk item saat ini
                                        $selisih = $item->nilai_anggaran - $item->nilai_realisasi;
                                        $persentase =
                                            $item->nilai_anggaran > 0
                                                ? ($item->nilai_realisasi / $item->nilai_anggaran) * 100
                                                : 0;
                                    @endphp

                                    <tr>
                                        @if ($item->tipe == 2)
                                            <td class="align-middle text-end" width="5%">{{ $item->kode }}</td>
                                            <td class="align-middle text-bold" colspan="2">{{ $item->nama }}</td>
                                            <td class="align-middle text-end text-bold">
                                                {{ number_format($totalAnggaran, 2, ',', '.') }}
                                            </td>
                                            <td class="align-middle text-end text-bold">
                                                {{ number_format($totalRealisasi, 2, ',', '.') }}
                                            </td>
                                            <td class="align-middle text-end text-bold">
                                                {{ number_format($totalSelisih, 2, ',', '.') }}
                                            </td>
                                            <td class="align-middle text-end text-bold">
                                                {{ number_format($totalPersentase, 2, ',', '.') }}%
                                            </td>
                                        @elseif($item->tipe == 3)
                                            <td width="5%"></td>
                                            <td class="align-middle text-end" width="5%">{{ $item->kode }}</td>
                                            <td class="align-middle">{{ $item->nama }}</td>
                                            <td class="align-middle text-end">
                                                {{ number_format($item->nilai_anggaran, 2, ',', '.') }}
                                            </td>
                                            <td class="align-middle text-end">
                                                {{ number_format($item->nilai_realisasi, 2, ',', '.') }}
                                            </td>
                                            <td class="align-middle text-end">
                                                {{ number_format($selisih, 2, ',', '.') }}
                                            </td>
                                            <td class="align-middle text-end">
                                                {{ number_format($persentase, 2, ',', '.') }}%
                                            </td>
                                        @else
                                            <td class="align-middle text-uppercase text-bold letter-spacing-1"
                                                colspan="7">
                                                {{ $item->kode . '. ' . $item->nama }}
                                            </td>
                                        @endif
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('dashboard.keuangan.sumber-dana.add-i')
    @include('dashboard.keuangan.sumber-dana.add-ii')
    @include('dashboard.keuangan.sumber-dana.add-iii')
    @include('dashboard.keuangan.sumber-dana.add-anggaran')
@endsection
