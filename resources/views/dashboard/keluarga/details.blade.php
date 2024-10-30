@extends('dashboard.layouts.header')

@section('content')
    <div class="app-content">
        <div class="container-fluid">
            <div class="card rounded-3">
                <div class="card-header">
                    <div class="float-end float-end-sm-none">
                        <a href="{{ route('keluarga.cetak', $keluarga->id) }}" target="_blank"
                            class="btn btn-success btn-block btn-sm mb-sm-1">Cetak Kartu
                            Keluarga</a>
                        <a href="{{ route('keluarga.index') }}" class="btn btn-primary btn-block btn-sm">Daftar Keluarga</a>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-striped full-w mb-3">
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
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th class="text-center align-middle" width="2%">No.</th>
                                    <th class="align-middle">NIK</th>
                                    <th class="align-middle">Nama</th>
                                    <th class="align-middle">Tanggal Lahir</th>
                                    <th class="align-middle">Jenis Kelamin</th>
                                    <th class="align-middle">Hubungan</th>
                                    <th class="text-center align-middle">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($anggota as $item)
                                    <tr>
                                        <td class="text-center align-middle">
                                            {{ $loop->iteration }}
                                        </td>
                                        <td class="align-middle">{{ $item->nik }}</td>
                                        <td class="align-middle">{{ $item->nama }}</td>
                                        <td class="align-middle">{{ tanggal_indonesia($item->tanggal_lahir, false) }}</td>
                                        <td class="align-middle">{{ $item->jenis_kelamin->nama }}</td>
                                        <td class="align-middle">{{ $item->hubungan_keluarga->nama }}</td>
                                        <td class="text-center align-middle">
                                            <a href="{{ route('penduduk.edit', $item->id) }}"
                                                class="btn btn-warning btn-xs mb-sm-1">E</a>
                                            <a href="" class="btn btn-success btn-xs mb-sm-1" title="Pindah">P</a>
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
