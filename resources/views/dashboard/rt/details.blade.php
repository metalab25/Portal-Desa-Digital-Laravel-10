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
                                    <th class="text-center">Nomor</th>
                                    <th width="40%">Nama Ketua RT</th>
                                    <th class="text-center">KK</th>
                                    <th class="text-center">L</th>
                                    <th class="text-center">P</th>
                                    <th class="text-center" width="10%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($rts as $item)
                                    <tr>
                                        <td class="text-center">
                                            {{ ($rts->currentPage() - 1) * $rts->perPage() + $loop->iteration }}</td>
                                        <td class="text-center">{{ $item->nama }}</td>
                                        <td>
                                            @if ($item->penduduk_id == null)
                                                -
                                            @else()
                                                Baharudin
                                            @endif
                                        </td>
                                        <td class="text-center"></td>
                                        <td class="text-center"></td>
                                        <td class="text-center"></td>
                                        <td class="text-center">
                                            <a href="{{ url('/desa/wilayah/rt/' . $item->id) }}"
                                                class="btn btn-info btn-sm">
                                                <i class="bi bi-list-ul"></i>
                                            </a>
                                            <a href="" class="btn btn-warning btn-sm">
                                                <i class="bi bi-pencil-fill"></i>
                                            </a>
                                            <a href="" class="btn btn-danger btn-sm">
                                                <i class="bi bi-trash-fill"></i>
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
                        {{ $rts->links() }}
                    </div>
                </div>
            </div>

        </div>
    </div>

    @include('dashboard.rt.add')
@endsection
