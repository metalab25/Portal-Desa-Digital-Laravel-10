@extends('dashboard.layouts.header')

@section('content')
    <div class="app-content">
        <div class="container-fluid">
            <div class="card rounded-4 shadow">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-6"></div>
                        <div class="col-md-6">
                            <button type="button" class="btn btn-primary btn-sm float-end" data-bs-toggle="modal"
                                data-bs-target="#modal-create-rw">
                                Tambah RW
                            </button>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped mb-0">
                            <thead>
                                <tr>
                                    <th class="text-center align-middle-sm" width="3%">No.</th>
                                    <th class="align-middle-sm">RW</th>
                                    <th class="align-middle-sm" width="40%">Nama Ketua RW</th>
                                    <th class="text-center align-middle-sm">RT</th>
                                    <th class="text-center align-middle-sm">KK</th>
                                    <th class="text-center align-middle-sm" width="10%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($rws as $item)
                                    <tr>
                                        <td class="text-center align-middle-sm">
                                            {{ ($rws->currentPage() - 1) * $rws->perPage() + $loop->iteration }}</td>
                                        <td class="align-middle-sm">{{ $item->nama }}</td>
                                        <td class="align-middle-sm">
                                            @if ($item->penduduk_id == null)
                                                -
                                            @else()
                                                Baharudin
                                            @endif
                                        </td>
                                        <td class="text-center align-middle-sm">{{ $item->rt_count }}</td>
                                        <td class="text-center align-middle-sm">{{ $item->keluarga_count }}</td>
                                        <td class="text-center align-middle-sm">
                                            <a href="{{ route('rw.show', $item->id) }}" class="btn btn-info btn-xs mb-sm-1"
                                                title="List">
                                                L
                                            </a>
                                            <a href="" class="btn btn-warning btn-xs mb-sm-1" title="Edit">
                                                E
                                            </a>
                                            <a href="" class="btn btn-danger btn-xs" title="Delete">
                                                D
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer py-3">
                    <div class="float-end">
                        {{ $rws->links() }}
                    </div>
                </div>
            </div>

        </div>
    </div>

    @include('dashboard.rw.create')
@endsection
