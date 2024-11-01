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
                                                <td>
                                                    <a href="{{ route('statistik.bantuan', $item->id) }}">
                                                        {{ $item->nama }} <span
                                                            class="badge badge-kat-kelompok text-bg-danger float-end"></span>
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
                        <div class="card rounded-4 shadow">
                            <div class="card-header">
                                <button type="button" class="btn btn-success btn-block btn-sm float-end  mb-0"
                                    data-bs-toggle="modal" data-bs-target="#modalAddKelompok">
                                    Cetak Data
                                </button>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered mb-0">
                                        <thead>
                                            <tr>
                                                <th class="text-center align-middle" width="3%">No.</th>
                                                <th class="text-center align-middle">Sasaran</th>
                                                <th class="text-center align-middle">Jumlah</th>
                                                <th class="text-center align-middle">Persentase</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            {{-- @foreach ($kelompok as $item)
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
                                                        class="btn btn-success btn-xs mb-sm-1" title="Show">L</a>
                                                    <a href="" class="btn btn-warning btn-xs mb-sm-1"
                                                        title="Edit">E</a>
                                                    <form action="{{ route('kelompok.destroy', $item->id) }}"
                                                        method="POST" class="d-inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-xs" title="Delete"
                                                            onclick="return confirm('Apakah Anda yakin ingin menghapus data ini ?')">D</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach --}}
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="card-footer py-3">
                                <div class="float-end">
                                    {{-- {{ $kelompok->links() }} --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection
