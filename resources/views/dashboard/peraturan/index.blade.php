@extends('dashboard.layouts.header')

@section('content')
    <div class="app-content">
        <div class="container-fluid">
            <div class="card rounded-3 shadow">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-6"></div>
                        <div class="col-md-6">
                            <div class="float-end">
                                <a href="{{ route('peraturan.cetak') }}" target="_blank"
                                    class="btn btn-success btn-block btn-sm mb-sm-1">Cetak
                                    Data</a>
                                <a href="{{ route('peraturan.create') }}" class="btn btn-primary btn-block btn-sm">
                                    Tambah Peraturan {{ $setting->sebutan_desa }}
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered mb-0">
                            <thead>
                                <tr>
                                    <th class="text-center align-middle" width="3%">No.</th>
                                    <th class="text-center align-middle">Peraturan</th>
                                    <th class="text-center align-middle">Jenis Peraturan</th>
                                    <th class="text-center align-middle">Tanggal Kesepakatan</th>
                                    <th class="text-center align-middle">Nomor & Tanggal Ditetapkan</th>
                                    <th class="text-center align-middle">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($peraturans as $item)
                                    <tr>
                                        <td class="text-center align-middle">
                                            {{ ($peraturans->currentPage() - 1) * $peraturans->perPage() + $loop->iteration }}
                                        </td>
                                        <td class="align-middle">{{ $item->nama }}</td>
                                        <td class="align-middle">{{ $item->jenis_peraturan }}</td>
                                        <td class="text-center align-middle">
                                            {{ tanggal_indonesia($item->tanggal_kesepakatan, false) }}
                                        </td>
                                        <td class="text-center align-middle">
                                            {{ $item->nomor_tetapan . '/' . \Carbon\Carbon::parse($item->tanggal_tetapan)->format('d-m-Y') }}
                                        </td>
                                        <td class="text-center align-middle">
                                            <a href="{{ route('peraturan.edit', $item->id) }}"
                                                class="btn btn-warning btn-xs mb-sm-1" title="Edit">E</a>
                                            <a href="{{ route('peraturan.destroy', $item->id) }}"
                                                class="btn btn-danger btn-xs" data-confirm-delete="true"
                                                title="Hapus Data">H</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer py-3">
                    <div class="float-end">
                        {{ $peraturans->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
