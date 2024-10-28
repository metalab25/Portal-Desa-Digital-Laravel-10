@extends('dashboard.layouts.header')

@section('content')
    <div class="app-content">
        <div class="container-fluid">
            <div class="card rounded-4 shadow">
                <div class="card-header">
                    <div class="float-end">
                        <a href="{{ route('kelompok.index') }}" class="btn btn-danger btn-block btn-sm">Daftar Kelompok</a>
                        <a href="" class="btn btn-dark btn-block btn-sm">Unduh Data</a>
                        <a href="" class="btn btn-success btn-block btn-sm">Cetak Data</a>
                        <button type="button" class="btn btn-primary btn-block btn-sm mb-0" data-bs-toggle="modal"
                            data-bs-target="#modalTambahAnggota">
                            Tambah Anggota
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <tbody>
                                <tr>
                                    <td class="text-semibold" width="10%">Nama Kelompok</td>
                                    <td class="text-semibold text-center" width="2%">:</td>
                                    <td>{{ $kelompok->nama }}</td>
                                </tr>
                                <tr>
                                    <td class="text-semibold" width="10%">Kode Kelompok</td>
                                    <td class="text-semibold text-center" width="2%">:</td>
                                    <td>
                                        @if ($kelompok->kode == null)
                                            -
                                        @else
                                            {{ $kelompok->kode }}
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-semibold" width="10%">Ketua Kelompok</td>
                                    <td class="text-semibold text-center" width="2%">:</td>
                                    <td>
                                        @if ($kelompok->penduduk_id == null)
                                            -
                                        @else
                                            {{ $kelompok->penduduk->nama }}
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-semibold" width="10%">Kategori</td>
                                    <td class="text-semibold text-center" width="2%">:</td>
                                    <td>
                                        {{ $kelompok->kelompok_kategori->nama }}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-semibold" width="10%">Keterangan</td>
                                    <td class="text-semibold text-center" width="2%">:</td>
                                    <td>
                                        @if ($kelompok->deskripsi == null)
                                            -
                                        @else
                                            {{ $kelompok->deskripsi }}
                                        @endif
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <table class="table table-striped table-bordered mb-0">
                            <thead>
                                <tr>
                                    <th class="text-center" width="3%">No.</th>
                                    <th class="text-center">Jabatan/Posisi</th>
                                    <th class="text-center">Nomor Anggota</th>
                                    <th class="text-center">Nama Anggota</th>
                                    <th class="text-center">Jenis Kelamin</th>
                                    <th class="text-center">{{ $setting->sebutan_dusun }}</th>
                                    <th class="text-center">RW</th>
                                    <th class="text-center">RT</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($anggotas as $item)
                                    <tr>
                                        <td class="align-middle text-center">
                                            {{ ($anggotas->currentPage() - 1) * $anggotas->perPage() + $loop->iteration }}
                                        </td>
                                        <td class="align-middle text-center">
                                            {{ $item->kelompok_jabatan->nama }}
                                        </td>
                                        <td class="align-middle text-center">
                                            {{ $item->nomor_anggota }}
                                        </td>
                                        <td class="align-middle text-center">
                                            {{ $item->penduduk->nama }}
                                        </td>
                                        <td class="align-middle text-center">
                                            {{ $item->penduduk->jenis_kelamin->nama }}
                                        </td>
                                        <td class="align-middle text-center">
                                            {{ $item->penduduk->keluarga->dusun->nama ?? '-' }}
                                        </td>
                                        <td class="align-middle text-center">
                                            {{ $item->penduduk->keluarga->rw->nama ?? '-' }}
                                        </td>
                                        <td class="align-middle text-center">
                                            {{ $item->penduduk->keluarga->rt->nama ?? '-' }}
                                        </td>
                                        <td class="align-middle text-center">
                                            <a href="{{ route('anggota.show', $item->id) }}" class="btn btn-success btn-xs"
                                                title="Show">L</a>
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
                        {{ $anggotas->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('dashboard.kelompok.add-anggota')
@endsection
