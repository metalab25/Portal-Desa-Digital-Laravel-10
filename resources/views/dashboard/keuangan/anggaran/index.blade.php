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
                                <button type="button" class="btn btn-primary btn-block btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#modal-create">
                                    Tambah Anggaran
                                </button>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered mb-0">
                            <thead>
                                <tr>
                                    <th class="text-center align-middle" colspan="3">Uraian</th>
                                    <th class="text-center align-middle" width="8%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($anggaran as $item)
                                    <tr>
                                        @if ($item->sumber->tipe == 2)
                                            <td class="align-middle text-end" width="5%">{{ $item->sumber->kode }}</td>
                                            <td class="align-middle" colspan="2">{{ $item->sumber->nama }}</td>
                                        @elseif($item->sumber->tipe == 3)
                                            <td width="5%"></td>
                                            <td class="align-middle text-end" width="5%">{{ $item->sumber->kode }}</td>
                                            <td class="align-middle">{{ $item->sumber->nama }}</td>
                                        @elseif($item->sumber->tipe == 1)
                                            <td class="align-middle text-uppercase text-bold letter-spacing-1"
                                                colspan="3">
                                                {{ $item->sumber->kode . '. ' . $item->sumber->nama }}
                                            </td>
                                        @endif
                                        <td class="text-center align-middle">
                                            <a href="{{ route('sumber-dana.edit', $item->id) }}"
                                                class="btn btn-warning btn-xs mb-sm-1" title="Edit">E</a>
                                            <a href="{{ route('sumber-dana.destroy', $item->id) }}"
                                                class="btn btn-danger btn-xs mb-sm-1" data-confirm-delete="true"
                                                title="Hapus Data">H</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('dashboard.keuangan.anggaran.add')
@endsection
