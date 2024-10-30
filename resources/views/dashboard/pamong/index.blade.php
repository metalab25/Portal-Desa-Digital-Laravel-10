@extends('dashboard.layouts.header')

@section('content')
    <div class="app-content">
        <div class="container-fluid">
            <div class="card rounded-4 shadow">
                <div class="card-header">
                    <div class="float-end float-end-sm-none">
                        <a href="{{ route('pemerintah.cetak') }}" target="_blank"
                            class="btn btn-success btn-block btn-sm mb-sm-1">Cetak
                            Data</a>
                        <a href="{{ route('pemerintah.create') }}" class="btn btn-primary btn-block btn-sm">Tambah
                            Pemerintah {{ $setting->sebutan_desa }}</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered mb-0">
                            <thead>
                                <tr>
                                    <th class="text-center align-middle" width="3%">No.</th>
                                    <th class="align-middle">Foto</th>
                                    <th class="align-middle">Kepala Keluarga</th>
                                    <th class="text-center align-middle">Jabatan</th>
                                    <th class="text-center align-middle">Nomor SK</th>
                                    <th class="text-center align-middle">Tanggal SK</th>
                                    <th class="text-center align-middle">Pendidikan</th>
                                    <th class="text-center align-middle">Jenis Kelamin</th>
                                    <th class="text-center align-middle">Aksi</th>
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
                                        <td class="align-middle text-center">{{ $item->jabatan->nama }}</td>
                                        <td class="align-middle text-center">{{ $item->no_sk }}</td>
                                        <td class="align-middle text-center">{{ tanggal_indonesia($item->tgl_sk, false) }}
                                        </td>
                                        <td class="align-middle">{{ $item->penduduk->pendidikan_kk->nama }}</td>
                                        <td class="align-middle text-center">{{ $item->penduduk->jenis_kelamin->nama }}
                                        </td>
                                        <td class="align-middle text-center">
                                            <a href="{{ route('pemerintah.show', $item->id) }}"
                                                class="btn btn-info btn-xs mb-sm-1" title="Show">S</a>
                                            <a href="{{ route('pemerintah.edit', $item->id) }}" class="btn btn-warning btn-xs mb-sm-1" title="Edit">E</a>
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
