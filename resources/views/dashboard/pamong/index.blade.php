@extends('dashboard.layouts.header')

@section('content')
    <div class="app-content">
        <div class="container-fluid">
            <div class="card rounded-4 shadow">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-6"></div>
                        <div class="col-md-6">
                            <div class="float-end">
                                <a href="{{ route('pemerintah.cetak') }}" target="_blank" class="btn btn-success btn-sm">Cetak
                                    Data</a>
                                <a href="{{ route('pemerintah.create') }}" class="btn btn-primary btn-sm">Tambah
                                    Pemerintah {{ $setting->sebutan_desa }}</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered mb-0">
                            <thead>
                                <tr>
                                    <th class="text-center" width="3%">No.</th>
                                    <th>Foto</th>
                                    <th>Kepala Keluarga</th>
                                    <th class="text-center">Jabatan</th>
                                    <th class="text-center">Nomor SK</th>
                                    <th class="text-center">Tanggal SK</th>
                                    <th class="text-center">Pendidikan</th>
                                    <th class="text-center">Jenis Kelamin</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pamongs as $item)
                                    <tr>
                                        <td class="align-middle text-center">
                                            {{ ($pamongs->currentPage() - 1) * $pamongs->perPage() + $loop->iteration }}
                                        </td>
                                        <td class="align-middle">
                                            @if ($item->foto)
                                                <img src="{{ asset('storage/' . $item->foto) }}"
                                                    class="avatar-pamong rounded-2 img-fluid d-block mx-auto">
                                            @else
                                                <img src="{{ asset('assets/dashboard/img/no-picture.webp') }}"
                                                    class="avatar-pamong rounded-2 img-fluid d-block mx-auto">
                                            @endif
                                        </td>
                                        <td class="align-middle">
                                            @if ($item->penduduk_id == null)
                                                <b>{{ $item->nama }}</b>
                                            @else()
                                                <b>{{ $item->penduduk->nama }}</b>
                                            @endif
                                            <br>
                                            @if ($item->penduduk_id == null)
                                                {{ 'NIK :' . $item->nik }}
                                            @else()
                                                {{ 'NIK :' . $item->penduduk->nik }}
                                            @endif
                                            <br>
                                            @if ($item->penduduk_id == null)
                                                NIp/NIAP : -
                                            @else()
                                                {{ 'NIP/NIAP : ' . $item->nip }}
                                            @endif
                                        </td>
                                        <td class="align-middle text-center">{{ $item->jabatan }}</td>
                                        <td class="align-middle text-center">{{ $item->no_sk }}</td>
                                        <td class="align-middle text-center">{{ tanggal_indonesia($item->tgl_sk, false) }}
                                        </td>
                                        <td class="align-middle">{{ $item->penduduk->pendidikan_kk->nama }}</td>
                                        <td class="align-middle text-center">{{ $item->penduduk->jenis_kelamin->nama }}
                                        </td>
                                        <td class="align-middle text-center">
                                            <a href="{{ route('pemerintah.show', $item->id) }}" class="btn btn-info btn-xs"
                                                title="Show">S</a>
                                            <a href="{{ route('pemerintah.edit', $item->id) }}"
                                                class="btn btn-warning btn-xs" title="Edit">E</a>
                                            <form action="{{ route('pemerintah.destroy', $item->id) }}" method="POST"
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
                        {{ $pamongs->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
