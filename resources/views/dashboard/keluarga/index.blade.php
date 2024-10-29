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
                                data-bs-target="#modal-create-kk">
                                Tambah KK Baru
                            </button>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered mb-0">
                            <thead>
                                <tr>
                                    <th class="text-center" width="3%">No.</th>
                                    <th>Nomor KK</th>
                                    <th>Kepala Keluarga</th>
                                    <th class="text-center">NIK</th>
                                    <th class="text-center">Jenis Kelamin</th>
                                    <th class="text-center">Anggota</th>
                                    <th class="text-center">Alamat</th>
                                    <th class="text-center">{{ $setting->sebutan_dusun }}</th>
                                    <th class="text-center">RW</th>
                                    <th class="text-center">RT</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($keluargas as $item)
                                    <tr>
                                        <td class="text-center">
                                            {{ ($keluargas->currentPage() - 1) * $keluargas->perPage() + $loop->iteration }}
                                        </td>
                                        <td>{{ $item->no_kk }}</td>
                                        <td>
                                            @if ($item->penduduk_id == null)
                                                -
                                            @else()
                                                {{ $item->penduduk->nama }}
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            @if ($item->penduduk_id == null)
                                                -
                                            @else
                                                {{ $item->penduduk->nik }}
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            @if ($item->penduduk_id == null)
                                                -
                                            @else
                                                {{ $item->penduduk->jenis_kelamin->nama }}
                                            @endif
                                        </td>
                                        <td class="text-center">{{ $item->anggota_count }}</td>
                                        <td>{{ $item->alamat }}</td>
                                        <td class="text-center">{{ $item->dusun->nama }}</td>
                                        <td class="text-center">{{ $item->rw->nama }}</td>
                                        <td class="text-center">
                                            @if ($item->rt_id == null)
                                                -
                                            @else
                                                {{ $item->rt->nama }}
                                            @endif

                                        </td>
                                        <td class="text-center">
                                            <a href="{{ route('keluarga.show', $item->id) }}" class="btn btn-info btn-xs"
                                                title="Show">S</a>
                                            <a href="{{ route('keluarga.edit', $item->id) }}"
                                                class="btn btn-warning btn-xs">E</a>
                                            <a href="" class="btn btn-success btn-xs" title="Pindah">P</a>
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
                        {{ $keluargas->links() }}
                    </div>
                </div>
            </div>

        </div>
    </div>

    @include('dashboard.keluarga.create-kk')
@endsection
