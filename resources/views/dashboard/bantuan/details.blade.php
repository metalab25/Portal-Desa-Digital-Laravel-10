@extends('dashboard.layouts.header')

@section('content')
    <div class="app-content">
        <div class="container-fluid">
            <div class="card rounded-4 shadow">
                <div class="card-header">
                    <div class="float-end float-end-sm-none">
                        <a href="{{ route('bantuan.index') }}" class="btn btn-danger btn-block btn-sm mb-sm-1">Daftar Program
                            Bantuan</a>
                        <a href="{{ route('bantuan.cetak-bantuan', $bantuan->id) }}" target="_blank"
                            class="btn btn-success btn-block btn-sm mb-sm-1">
                            Cetak Data
                        </a>
                        <button type="button" class="btn btn-primary btn-btn-block btn-sm" data-bs-toggle="modal"
                            data-bs-target="#modalTambaPenerima">
                            Tambah Penerima
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-striped mb-3">
                        <tbody>
                            <tr>
                                <td width="120px">Nama Program</td>
                                <td class="text-center" width="10px">:</td>
                                <td>{{ $bantuan->nama }}</td>
                            </tr>
                            <tr>
                                <td width="120px">Sasaran Program</td>
                                <td class="text-center" width="10px">:</td>
                                <td>{{ $bantuan->bantuan_sasaran->nama }}</td>
                            </tr>
                            <tr>
                                <td width="120px">Masa Berlaku</td>
                                <td class="text-center" width="10px">:</td>
                                <td>{{ tanggal_indonesia($bantuan->mulai, false) . ' s/d ' . tanggal_indonesia($bantuan->akhir, false) }}
                                </td>
                            </tr>
                            <tr>
                                <td width="120px">Keterangan</td>
                                <td class="text-center" width="10px">:</td>
                                <td>{{ $bantuan->deskripsi }}</td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered mb-0">
                            <thead>
                                <tr>
                                    <th class="text-center align-middle" width="3%">No.</th>
                                    <th class="text-center align-middle">
                                        @if ($bantuan->bantuan_sasaran_id == 1)
                                            Nama Penduduk
                                        @elseif($bantuan->bantuan_sasaran_id == 2)
                                            Kepala Keluarga
                                        @elseif($bantuan->bantuan_sasaran_id == 3)
                                            Nama Ketua
                                        @endif
                                    </th>
                                    <th class="text-center align-middle">
                                        @if ($bantuan->bantuan_sasaran_id == 1)
                                            NIK
                                        @elseif($bantuan->bantuan_sasaran_id == 2)
                                            Nomor KK
                                        @elseif($bantuan->bantuan_sasaran_id == 3)
                                            Nama Kelompok
                                        @endif
                                    </th>
                                    <th class="text-center align-middle">Alamat</th>
                                    <th class="text-center align-middle">No. Kartu Bantuan</th>
                                    <th class="text-center align-middle">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($penerima as $item)
                                    <tr>
                                        <td class="text-center align-middle">
                                            {{ ($penerima->currentPage() - 1) * $penerima->perPage() + $loop->iteration }}
                                        </td>
                                        <td class="align-middle">
                                            @if ($item->bantuan_sasaran_id == 1)
                                                {{ $item->penduduk->nama }}
                                            @elseif($item->bantuan_sasaran_id == 2)
                                                {{ $item->keluarga->penduduk->nama }}
                                            @elseif($item->bantuan_sasaran_id == 3)
                                                {{ $item->kelompok->penduduk->nama }}
                                            @endif
                                        </td>
                                        <td class="text-center align-middle">
                                            @if ($item->bantuan_sasaran_id == 1)
                                                {{ $item->penduduk->nik }}
                                            @elseif($item->bantuan_sasaran_id == 2)
                                                {{ $item->keluarga->no_kk }}
                                            @elseif($item->bantuan_sasaran_id == 3)
                                                {{ $item->kelompok->nama }}
                                            @endif
                                        </td>
                                        <td class="align-middle">
                                            @if ($item->bantuan_sasaran_id == 1)
                                                {{ $item->penduduk->keluarga->alamat . ' RT ' . $item->penduduk->keluarga->rt->nama . ' RW ' . $item->penduduk->keluarga->rw->nama . ' ' . $setting->sebutan_dusun . ' ' . $item->penduduk->keluarga->dusun->nama }}
                                            @elseif($item->bantuan_sasaran_id == 2)
                                                {{ $item->keluarga->alamat . ' RT ' . $item->keluarga->rt->nama . ' RW ' . $item->keluarga->rw->nama . ' ' . $setting->sebutan_dusun . ' ' . $item->keluarga->dusun->nama }}
                                            @endif

                                        </td>
                                        <td class="text-center align-middle">
                                            {{ $item->no_kartu }}
                                        </td>
                                        <td class="text-center align-middle">
                                            <a href="{{ route('penerima.show', $item->id) }}"
                                                class="btn btn-info btn-xs mb-sm-1" title="Detais">S</a>
                                            <a href="{{ route('penerima.edit', $item->id) }}"
                                                class="btn btn-warning btn-xs mb-sm-1" title="Edit">E</a>
                                            <form action="{{ route('penerima.destroy', $item->id) }}" method="POST"
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
                        {{ $penerima->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('dashboard.bantuan.add-penerima')
@endsection
