@extends('dashboard.layouts.header')

@section('content')
    <div class="app-content">
        <div class="container-fluid">
            <div class="card rounded-3">
                <div class="card-header">
                    <div class="float-end">
                        <a class="btn btn-success btn-sm">Cetak Kartu Keluarga</a>
                        <a href="{{ route('keluarga.index') }}" class="btn btn-primary btn-sm">Daftar Keluarga</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped mb-3">
                            <tbody>
                                <tr>
                                    <td width="180px"><b>Nomor Kartu Keluarga (KK)</b></td>
                                    <td class="text-center" width="2%"><b>:</b></td>
                                    <td>{{ $keluarga->no_kk }}</td>
                                </tr>
                                <tr>
                                    <td><b>Nama Kepala Keluarga</b></td>
                                    <td class="text-center" width="2%"><b>:</b></td>
                                    <td>{{ $keluarga->penduduk->nama }}</td>
                                </tr>
                                <tr>
                                    <td><b>Alamat</b></td>
                                    <td class="text-center" width="2%"><b>:</b></td>
                                    <td>{{ $keluarga->alamat . ' RT: ' . $keluarga->rt->nama . ' RW: ' . $keluarga->rw->nama . ' ' . $setting->sebutan_dusun . ' ' . $keluarga->dusun->nama . '. ' . $setting->sebutan_desa . ' ' . $desa->nama_desa }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th class="text-center" width="2%">No.</th>
                                    <th>NIK</th>
                                    <th>Nama</th>
                                    <th>Tanggal Lahir</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Hubungan</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($anggota as $item)
                                    <tr>
                                        <td class="text-center">
                                            {{ $loop->iteration }}
                                        </td>
                                        <td>{{ $item->nik }}</td>
                                        <td>{{ $item->nama }}</td>
                                        <td>{{ tanggal_indonesia($item->tanggal_lahir, false) }}</td>
                                        <td>{{ $item->jenis_kelamin->nama }}</td>
                                        <td>{{ $item->hubungan_keluarga->nama }}</td>
                                        <td class="text-center">
                                            <a href="{{ route('penduduk.edit', $item->id) }}"
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
            </div>
        </div>
    </div>
@endsection
