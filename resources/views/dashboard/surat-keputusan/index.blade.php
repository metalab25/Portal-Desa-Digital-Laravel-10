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
                                <a href="" target="_blank" class="btn btn-success btn-block btn-sm mb-sm-1">Cetak
                                    Data</a>
                                <a href="{{ route('surat-keputusan.create') }}" class="btn btn-primary btn-block btn-sm">
                                    Tambah Surat Keputusan
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
                                    <th class="text-center align-middle-sm" width="3%">No.</th>
                                    <th class="text-center align-middle-sm">Nama Keputusan</th>
                                    <th class="text-center align-middle-sm">Nomor & Tanggal Keputusan</th>
                                    <th class="text-center align-middle-sm">Uraian</th>
                                    <th class="text-center align-middle-sm" width="8%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($suratKeputusans as $item)
                                    <tr>
                                        <td class="text-center align-middle">
                                            {{ ($suratKeputusans->currentPage() - 1) * $suratKeputusans->perPage() + $loop->iteration }}
                                        </td>
                                        <td class="align-middle-sm">{{ $item->nama }}</td>
                                        <td class="text-center align-middle-sm">
                                            {{ $item->nomor_keputusan . '/' . \Carbon\Carbon::parse($item->tanggal_keputusan)->format('d-m-Y') }}
                                        </td>
                                        <td class="align-middle-sm">
                                            {{ $item->uraian_singkat }}</td>
                                        <td class="text-center align-middle-sm">
                                            <a href="{{ route('surat-keputusan.edit', $item->id) }}"
                                                class="btn btn-warning btn-xs mb-sm-1" title="Edit">E</a>
                                            <a href="{{ route('surat-keputusan.destroy', $item->id) }}"
                                                class="btn btn-danger btn-xs mb-sm-1" data-confirm-delete="true"
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
                        {{ $suratKeputusans->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
