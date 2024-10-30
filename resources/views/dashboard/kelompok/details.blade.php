@extends('dashboard.layouts.header')

@section('content')
    <div class="app-content">
        <div class="container-fluid">
            <div class="card rounded-4 shadow">
                <div class="card-header">
                    <div class="float-end float-end-sm-none">
                        <a href="{{ route('kelompok.index') }}" class="btn btn-danger btn-block btn-sm mb-sm-1">Daftar
                            Kelompok</a>
                        <a href="" class="btn btn-dark btn-block btn-sm mb-sm-1">Unduh Data</a>
                        <a href="{{ route('kelompok.cetak', $kelompok->id) }}" target="_blank"
                            class="btn btn-success btn-block btn-sm mb-sm-1">Cetak Data</a>
                        <button type="button" class="btn btn-primary btn-block btn-sm mb-0" data-bs-toggle="modal"
                            data-bs-target="#modalTambahAnggota">
                            Tambah Anggota
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-striped mb-3">
                        <tbody>
                            <tr>
                                <td class="text-semibold align-middle" width="120px">Nama Kelompok</td>
                                <td class="text-semibold text-center align-middle" width="2%">:</td>
                                <td class="align-middle">{{ $kelompok->nama }}</td>
                            </tr>
                            <tr>
                                <td class="text-semibold align-middle" width="120px">Kode Kelompok</td>
                                <td class="text-semibold text-center align-middle" width="2%">:</td>
                                <td class="align-middle">
                                    @if ($kelompok->kode == null)
                                        -
                                    @else
                                        {{ $kelompok->kode }}
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td class="text-semibold align-middle" width="120px">Ketua Kelompok</td>
                                <td class="text-semibold text-center align-middle" width="2%">:</td>
                                <td class="align-middle">
                                    @if ($kelompok->penduduk_id == null)
                                        -
                                    @else
                                        {{ $kelompok->penduduk->nama }}
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td class="text-semibold align-middle" width="120px">Kategori</td>
                                <td class="text-semibold text-center align-middle" width="2%">:</td>
                                <td class="align-middle">
                                    {{ $kelompok->kelompok_kategori->nama }}
                                </td>
                            </tr>
                            <tr>
                                <td class="text-semibold align-middle" width="120px">Keterangan</td>
                                <td class="text-semibold text-center align-middle" width="2%">:</td>
                                <td class="align-middle">
                                    @if ($kelompok->deskripsi == null)
                                        -
                                    @else
                                        {{ $kelompok->deskripsi }}
                                    @endif
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered mb-0">
                            <thead>
                                <tr>
                                    <th class="text-center align-middle" width="3%">No.</th>
                                    <th class="text-center align-middle">Jabatan/Posisi</th>
                                    <th class="text-center align-middle">Nomor Anggota</th>
                                    <th class="text-center align-middle">Nama Anggota</th>
                                    <th class="text-center align-middle">Jenis Kelamin</th>
                                    <th class="text-center align-middle">{{ $setting->sebutan_dusun }}</th>
                                    <th class="text-center align-middle">RW</th>
                                    <th class="text-center align-middle">RT</th>
                                    <th class="text-center align-middle">Aksi</th>
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
                        {{ $anggotas->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('dashboard.kelompok.add-anggota')
@endsection
