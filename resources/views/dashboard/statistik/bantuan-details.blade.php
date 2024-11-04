@extends('dashboard.layouts.header')

@section('content')
    <div class="app-content">
        <div class="container-fluid">
            @if ($bantuans->count() > 0)
                <div class="row">
                    <div class="col-md-4">
                        <div class="card rounded-3 mb-3 shadow">
                            <div class="card-header p-3 py-2">
                                <div class="pt-1">
                                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Statistik Program Bantuan</p>
                                </div>
                            </div>
                            <div class="card-body">
                                <table class="table table-striped table-kategori mb-0">
                                    <tbody>
                                        @foreach ($bantuans as $item)
                                            <tr>
                                                <td
                                                    class="{{ request()->segment(3) == $item->id ? 'bg-warning rounded-2 border-bottom-0' : '' }}">
                                                    <a href="{{ route('statistik.bantuan', $item->id) }}">
                                                        {{ $item->nama }}
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="card rounded-3 shadow">
                            <div class="card-header">
                                <a href="{{ route('statistik.bantuan.cetak', $program->id) }}" target="_blank"
                                    class="btn btn-success btn-block btn-sm float-end  mb-0">
                                    Cetak Data
                                </a>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    @if ($program->bantuan_sasaran_id == 1)
                                        <table class="table table-striped mb-0">
                                            <thead>
                                                <tr>
                                                    <th class="text-center align-middle" width="3%">No.</th>
                                                    <th class="text-center align-middle">Sasaran</th>
                                                    <th class="text-center align-middle">Jumlah Penerima</th>
                                                    <th class="text-center align-middle">Persentase</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="align-middle text-center">1</td>
                                                    <td class="align-middle">Peserta</td>
                                                    <td class="align-middle text-center">
                                                        <a href="{{ route('bantuan.show', $program->id) }}">
                                                            {{ $penerima }}
                                                        </a>
                                                    </td>
                                                    <td class="align-middle text-center">
                                                        {{ round($penduduk > 0 ? ($penerima / $penduduk) * 100 : 0, 2) . '%' }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="align-middle text-center">2</td>
                                                    <td class="align-middle">Bukan Peserta</td>
                                                    <td class="align-middle text-center">{{ $penduduk - $penerima }}</td>
                                                    <td class="align-middle text-center">
                                                        {{ round(100 - ($penduduk > 0 ? ($penerima / $penduduk) * 100 : 0), 2) . '%' }}
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    @elseif($program->bantuan_sasaran_id == 2)
                                        <table class="table table-striped mb-0">
                                            <thead>
                                                <tr>
                                                    <th class="text-center align-middle" width="3%">No.</th>
                                                    <th class="text-center align-middle">Sasaran</th>
                                                    <th class="text-center align-middle">Jumlah Penerima</th>
                                                    <th class="text-center align-middle">Persentase</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="align-middle text-center">1</td>
                                                    <td class="align-middle">Peserta</td>
                                                    <td class="align-middle text-center">
                                                        <a href="{{ route('bantuan.show', $program->id) }}">
                                                            {{ $penerima }}
                                                        </a>
                                                    </td>
                                                    <td class="align-middle text-center">
                                                        {{ round($keluarga > 0 ? ($penerima / $keluarga) * 100 : 0, 2) . '%' }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="align-middle text-center">2</td>
                                                    <td class="align-middle">Bukan Peserta</td>
                                                    <td class="align-middle text-center">{{ $keluarga - $penerima }}</td>
                                                    <td class="align-middle text-center">
                                                        {{ round(100 - ($keluarga > 0 ? ($penerima / $keluarga) * 100 : 0), 2) . '%' }}
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    @elseif($program->bantuan_sasaran_id == 3)
                                        <table class="table table-striped mb-0">
                                            <thead>
                                                <tr>
                                                    <th class="text-center align-middle" width="3%">No.</th>
                                                    <th class="text-center align-middle">Sasaran</th>
                                                    <th class="text-center align-middle">Jumlah Penerima</th>
                                                    <th class="text-center align-middle">Persentase</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="align-middle text-center">1</td>
                                                    <td class="align-middle">Peserta</td>
                                                    <td class="align-middle text-center">
                                                        <a href="{{ route('bantuan.show', $program->id) }}">
                                                            {{ $penerima }}
                                                        </a>
                                                    </td>
                                                    <td class="align-middle text-center">
                                                        {{ round($kelompok > 0 ? ($penerima / $kelompok) * 100 : 0, 2) . '%' }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="align-middle text-center">2</td>
                                                    <td class="align-middle">Bukan Peserta</td>
                                                    <td class="align-middle text-center">{{ $kelompok - $penerima }}</td>
                                                    <td class="align-middle text-center">
                                                        {{ round(100 - ($kelompok > 0 ? ($penerima / $kelompok) * 100 : 0), 2) . '%' }}
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection
