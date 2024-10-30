@extends('dashboard.layouts.header')

@section('content')
    <div class="app-content">
        <div class="container-fluid">
            <div class="card rounded-4 shadow">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-6"></div>
                        <div class="col-md-6">
                            <button type="button" class="btn btn-primary btn-block btn-sm float-end" data-bs-toggle="modal"
                                data-bs-target="#modal-create">
                                Tambah {{ $setting->sebutan_dusun }}
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
                                    <th class="align-middle-sm">Nama {{ $setting->sebutan_dusun }}</th>
                                    <th class="align-middle-sm" width="40%">Nama {{ $setting->sebutan_kepala_dusun }}
                                    </th>
                                    <th class="text-center align-middle-sm">RW</th>
                                    <th class="text-center align-middle-sm">RT</th>
                                    <th class="text-center align-middle-sm">KK</th>
                                    <th class="text-center align-middle-sm">L</th>
                                    <th class="text-center align-middle-sm">P</th>
                                    <th class="text-center align-middle-sm" width="10%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($dusun as $item)
                                    <tr>
                                        <td class="text-center align-middle-sm">
                                            {{ ($dusun->currentPage() - 1) * $dusun->perPage() + $loop->iteration }}</td>
                                        <td class="align-middle-sm">{{ $setting->sebutan_dusun . ' ' . $item->nama }}</td>
                                        <td class="align-middle-sm">
                                            @if ($item->penduduk_id == null)
                                                -
                                            @else()
                                                <b>NIK : </b>{{ $item->penduduk->nik . ' - ' . $item->penduduk->nama }}
                                            @endif
                                        </td>
                                        <td class="text-center align-middle-sm">{{ $item->rw_count }}</td>
                                        <td class="text-center align-middle-sm">{{ $item->rt_count }}</td>
                                        <td class="text-center align-middle-sm">{{ $item->keluarga_count }}</td>
                                        <td class="text-center align-middle-sm">
                                            {{ $item->jumlah_kepala_keluarga_laki_laki }}</td>
                                        <td class="text-center align-middle-sm">
                                            {{ $item->jumlah_kepala_keluarga_perempuan }}</td>
                                        <td class="text-center align-middle-sm">
                                            <a href="{{ route('wilayah.show', $item->id) }}"
                                                class="btn btn-info btn-xs mb-sm-1" title="List">L</a>
                                            <a href="{{ route('wilayah.edit', $item->id) }}"
                                                class="btn btn-warning btn-xs mb-sm-1" title="Edit">E</a>
                                            <form action="{{ route('wilayah.destroy', $item->id) }}" method="POST"
                                                class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-xs" title="Delete"
                                                    onclick="return confirm('Apakah Anda yakin ingin menghapus data ini ?')">D</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer py-3">
                    <div class="float-end">
                        {{ $dusun->links() }}
                    </div>
                </div>
            </div>

        </div>
    </div>

    @include('dashboard.dusun.add')
@endsection
