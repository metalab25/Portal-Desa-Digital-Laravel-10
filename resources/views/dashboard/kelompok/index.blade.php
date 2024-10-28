@extends('dashboard.layouts.header')

@section('content')
    <div class="app-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">
                    <div class="card rounded-4 shadow">
                        <div class="card-header p-3 py-2">
                            <div class="pt-1">
                                <p class="text-sm mb-0 text-capitalize font-weight-bold">Kategori Kelompok</p>
                            </div>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped table-kategori mb-0">
                                <tbody>
                                    @foreach ($kategori as $item)
                                        <tr>
                                            <td>
                                                <a href="{{ route('kelompok-kategori.show', $item->id) }}">
                                                    {{ $item->nama }} <span
                                                        class="badge badge-kat-kelompok text-bg-danger float-end">{{ $item->kelompok_count }}</span>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="card-footer py-3">
                            <button type="button" class="btn btn-primary btn-full btn-sm mb-0" data-bs-toggle="modal"
                                data-bs-target="#modalCreate">
                                Tambah Kategoti
                            </button>
                        </div>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="card rounded-4 shadow">
                        <div class="card-header">
                            <button type="button" class="btn btn-primary btn-block btn-sm float-end  mb-0"
                                data-bs-toggle="modal" data-bs-target="#modalAddKelompok">
                                Tambah Kelompok
                            </button>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered mb-0">
                                    <thead>
                                        <tr>
                                            <th class="text-center" width="3%">No.</th>
                                            <th class="text-center">Nama Kelompok</th>
                                            <th class="text-center">Kode</th>
                                            <th class="text-center">Ketua</th>
                                            <th class="text-center">Kategori</th>
                                            <th class="text-center">Anggota</th>
                                            <th class="text-center">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($kelompok as $item)
                                            <tr>
                                                <td class="align-middle text-center">
                                                    {{ ($kelompok->currentPage() - 1) * $kelompok->perPage() + $loop->iteration }}
                                                </td>
                                                <td class="align-middle">
                                                    {{ $item->nama }}
                                                </td>
                                                <td class="align-middle text-center">
                                                    {{ $item->kode }}
                                                </td>
                                                <td class="align-middle">
                                                    @if ($item->penduduk_id == null)
                                                        -
                                                    @else()
                                                        {{ $item->penduduk->nama }}
                                                    @endif
                                                </td>
                                                <td class="align-middle text-center">
                                                    {{ $item->kelompok_kategori->nama }}
                                                </td>
                                                <td class="align-middle text-center">
                                                    {{ $item->anggota_count }}
                                                </td>
                                                <td class="align-middle text-center">
                                                    <a href="{{ route('kelompok.show', $item->id) }}"
                                                        class="btn btn-success btn-xs" title="Show">L</a>
                                                    <a href="{{ route('pemerintah.edit', $item->id) }}"
                                                        class="btn btn-warning btn-xs" title="Edit">E</a>
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
                                {{ $kelompok->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('dashboard.kelompok.add-kategori')
    @include('dashboard.kelompok.add')
@endsection
