@extends('dashboard.layouts.header')

@section('content')
    <div class="app-content">
        <div class="container-fluid">
            <div class="card rounded-4 shadow">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-6">
                            <a href="{{ route('rw.index') }}" class="btn btn-danger btn-block btn-sm mb-sm-1">Kembali</a>
                        </div>
                        <div class="col-md-6">
                            <button type="button" class="btn btn-primary btn-block btn-sm float-end" data-bs-toggle="modal"
                                data-bs-target="#modal-add-rt">
                                Tambah RT
                            </button>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped mb-0">
                            <thead>
                                <tr>
                                    <th class="text-center" width="3%">No.</th>
                                    <th class="text-center">RT</th>
                                    <th width="40%">Nama Ketua RT</th>
                                    <th class="text-center">KK</th>
                                    <th class="text-center" width="10%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($rts as $item)
                                    <tr>
                                        <td class="text-center align-middle-sm">
                                            {{ ($rts->currentPage() - 1) * $rts->perPage() + $loop->iteration }}</td>
                                        <td class="text-center align-middle-sm">{{ $item->nama }}</td>
                                        <td class="align-middle-sm">
                                            @if ($item->penduduk_id == null)
                                                -
                                            @else()
                                                Baharudin
                                            @endif
                                        </td>
                                        <td class="text-center align-middle-sm">{{ $item->keluarga_count }}</td>
                                        <td class="text-center align-middle-sm">
                                            <a href="" class="btn btn-warning btn-xs mb-sm-1" title="Edit">E</a>
                                            <a href="" class="btn btn-danger btn-xs" title="Delete">D</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer py-3">
                    <div class="float-end">
                        {{ $rts->links() }}
                    </div>
                </div>
            </div>

        </div>
    </div>

    @include('dashboard.rt.add')
@endsection
