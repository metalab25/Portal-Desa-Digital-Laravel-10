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
                                <a href="{{ route('surat-masuk.create') }}" class="btn btn-primary btn-block btn-sm">
                                    Tambah Surat Masuk
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
                                    <th class="text-center align-middle-sm" width="6%">No. Urut</th>
                                    <th class="text-center align-middle-sm">Nomor Surat</th>
                                    <th class="text-center align-middle-sm">Tanggal Surat</th>
                                    <th class="text-center align-middle-sm">Pengirim</th>
                                    <th class="text-center align-middle-sm" width="35%">Perihal</th>
                                    <th class="text-center align-middle-sm" width="%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($suratMasuks as $item)
                                    <tr>
                                        <td class="text-center align-middle-sm">{{ $item->nomor_urut }}</td>
                                        <td class="text-center align-middle-sm">{{ $item->nomor_surat }}</td>
                                        <td class="text-center align-middle-sm">
                                            {{ tanggal_indonesia($item->tanggal_surat, false) }}</td>
                                        <td class="align-middle-sm">{{ $item->pengirim }}</td>
                                        <td class="align-middle-sm">{{ $item->perihal }}</td>
                                        <td class="text-center align-middle-sm">
                                            <a href="" class="btn btn-info btn-xs mb-sm-1" title="Unduh Berkas">U</a>
                                            <a href="{{ route('surat-masuk.edit', $item->id) }}"
                                                class="btn btn-warning btn-xs mb-sm-1" title="Edit">E</a>
                                            <a href="{{ route('surat-masuk.destroy', $item->id) }}"
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
                        {{ $suratMasuks->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
