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
                                    <th class="text-center align-middle" width="3%">No.</th>
                                    <th class="align-middle">Nomor KK</th>
                                    <th class="align-middle">Kepala Keluarga</th>
                                    <th class="text-center align-middle">NIK</th>
                                    <th class="text-center align-middle">Jenis Kelamin</th>
                                    <th class="text-center align-middle">Anggota</th>
                                    <th class="text-center align-middle">Alamat</th>
                                    <th class="text-center align-middle">{{ $setting->sebutan_dusun }}</th>
                                    <th class="text-center align-middle">RW</th>
                                    <th class="text-center align-middle">RT</th>
                                    <th class="text-center align-middle">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($keluargas as $item)
                                    <tr>
                                        <td class="text-center align-middle">
                                            {{ ($keluargas->currentPage() - 1) * $keluargas->perPage() + $loop->iteration }}
                                        </td>
                                        <td class="align-middle">{{ $item->no_kk }}</td>
                                        <td class="align-middle">
                                            @if ($item->penduduk_id == null)
                                                -
                                            @else()
                                                {{ $item->penduduk->nama }}
                                            @endif
                                        </td>
                                        <td class="text-center align-middle">
                                            @if ($item->penduduk_id == null)
                                                -
                                            @else
                                                {{ $item->penduduk->nik }}
                                            @endif
                                        </td>
                                        <td class="text-center align-middle">
                                            @if ($item->penduduk_id == null)
                                                -
                                            @else
                                                {{ $item->penduduk->jenis_kelamin->nama }}
                                            @endif
                                        </td>
                                        <td class="text-center align-middle">{{ $item->anggota_count }}</td>
                                        <td class="align-middle">{{ $item->alamat }}</td>
                                        <td class="text-center align-middle">{{ $item->dusun->nama }}</td>
                                        <td class="text-center align-middle">{{ $item->rw->nama }}</td>
                                        <td class="text-center align-middle">
                                            @if ($item->rt_id == null)
                                                -
                                            @else
                                                {{ $item->rt->nama }}
                                            @endif

                                        </td>
                                        <td class="text-center align-middle">
                                            <a href="{{ route('keluarga.show', $item->id) }}"
                                                class="btn btn-info btn-xs mb-sm-1" title="Show">S</a>
                                            <a href="{{ route('keluarga.edit', $item->id) }}"
                                                class="btn btn-warning btn-xs mb-sm-1">E</a>
                                            <a href="" class="btn btn-success btn-xs mb-sm-1" title="Pindah">P</a>
                                            <a href="{{ route('keluarga.destroy', $item->id) }}"
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
                        {{ $keluargas->links() }}
                    </div>
                </div>
            </div>

        </div>
    </div>

    @include('dashboard.keluarga.create-kk')
@endsection
