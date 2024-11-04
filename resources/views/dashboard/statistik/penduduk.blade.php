@extends('dashboard.layouts.header')

@section('content')
    <div class="app-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4">
                    <div class="card rounded-3 mb-3 shadow">
                        <div class="card-header p-3 py-2">
                            <div class="pt-1">
                                <p class="text-sm mb-0 text-capitalize font-weight-bold">
                                    Statistik Kependudukan
                                </p>
                            </div>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped table-kategori mb-0">
                                <tbody>
                                    <tr>
                                        <td class="{{ request()->segment(3) == 'agama' ? 'bg-warning rounded-2' : '' }}">
                                            <a href="{{ route('statistik.agama') }}">Agama</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td
                                            class="{{ request()->segment(3) == 'jenis-kelamin' ? 'bg-warning rounded-2' : '' }}">
                                            <a href="{{ route('statistik.jenis-kelamin') }}">Jenis Kelamin</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td
                                            class="{{ request()->segment(3) == 'pendidikan-ditempuh' ? 'bg-warning rounded-2' : '' }}">
                                            <a href="{{ route('statistik.pendidikan-ditempuh') }}">Pendidikan Sedang
                                                Ditempuh</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td
                                            class="{{ request()->segment(3) == 'pendidikan-kk' ? 'bg-warning rounded-2' : '' }}">
                                            <a href="{{ route('statistik.pendidikan-kk') }}">Pendidikan Dalam KK</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td
                                            class="{{ request()->segment(3) == 'pekerjaan' ? 'bg-warning rounded-2' : '' }}">
                                            <a href="{{ route('statistik.pekerjaan') }}">Pekerjaan</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td
                                            class="{{ request()->segment(3) == 'warganegara' ? 'bg-warning rounded-2' : '' }}">
                                            <a href="{{ route('statistik.warganegara') }}">Warga Negara</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td
                                            class="{{ request()->segment(3) == 'status-kawin' ? 'bg-warning rounded-2' : '' }}">
                                            <a href="{{ route('statistik.status-kawin') }}">Status Kawin</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td
                                            class="{{ request()->segment(3) == 'golongan-darah' ? 'bg-warning rounded-2' : '' }}">
                                            <a href="{{ route('statistik.golongan-darah') }}">Golongan Darah</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="{{ request()->segment(3) == 'cacat' ? 'bg-warning rounded-2' : '' }}">
                                            <a href="{{ route('statistik.cacat') }}">Penyandang Cacat</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td
                                            class="{{ request()->segment(3) == 'sakit-menahun' ? 'bg-warning rounded-2' : '' }}">
                                            <a href="{{ route('statistik.sakit-menahun') }}">Sakit Menahun</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td
                                            class="border-bottom-0 {{ request()->segment(3) == 'cara-kb' ? 'bg-warning rounded-2' : '' }}">
                                            <a href="{{ route('statistik.cara-kb') }}">Akseptor KB</a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card rounded-3 shadow">
                        @if (request()->segment(3) == 'agama')
                            <div class="card-header">
                                <a href="" target="_blank" class="btn btn-success btn-block btn-sm float-end  mb-0">
                                    Cetak Data
                                </a>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered mb-0">
                                        <thead>
                                            <tr>
                                                <th class="text-center align-middle" width="5%">No.</th>
                                                <th class="text-center align-middle">Agama</th>
                                                <th class="text-center align-middle">Laki-Laki</th>
                                                <th class="text-center align-middle">Perempuan</th>
                                                <th class="text-center align-middle" colspan="2">Jumlah</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($agamaData as $agama)
                                                <tr>
                                                    <td class="text-center align-middle">{{ $loop->iteration }}</td>
                                                    <td class="align-middle">{{ $agama->nama }}</td>
                                                    <td class="text-center align-middle">{{ $agama->laki_laki_count }}</td>
                                                    <td class="text-center align-middle">{{ $agama->perempuan_count }}</td>
                                                    <td class="text-center align-middle">{{ $agama->total_penduduk }}</td>
                                                    <td class="text-center align-middle">{{ $agama->total_percent . '%' }}
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        @elseif (request()->segment(3) == 'jenis-kelamin')
                            <div class="card-header">
                                <a href="" target="_blank" class="btn btn-success btn-block btn-sm float-end  mb-0">
                                    Cetak Data
                                </a>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered mb-0">
                                        <thead>
                                            <tr>
                                                <th class="text-center align-middle" width="5%">No.</th>
                                                <th class="text-center align-middle">Jenis Kelamin</th>
                                                <th class="text-center align-middle" colspan="2">Jumlah</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($sexData as $item)
                                                <tr>
                                                    <td class="text-center align-middle">{{ $loop->iteration }}</td>
                                                    <td class="align-middle">{{ $item->nama }}</td>
                                                    <td class="text-center align-middle">{{ $item->total_penduduk }}</td>
                                                    <td class="text-center align-middle">{{ $item->total_percent . '%' }}
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        @elseif (request()->segment(3) == 'pendidikan-ditempuh')
                            <div class="card-header">
                                <a href="" target="_blank" class="btn btn-success btn-block btn-sm float-end  mb-0">
                                    Cetak Data
                                </a>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered mb-0">
                                        <thead>
                                            <tr>
                                                <th class="text-center align-middle" width="5%">No.</th>
                                                <th class="text-center align-middle">Pendidikan</th>
                                                <th class="text-center align-middle">Laki-Laki</th>
                                                <th class="text-center align-middle">Perempuan</th>
                                                <th class="text-center align-middle" colspan="2">Jumlah</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($pendidikanData as $item)
                                                <tr>
                                                    <td class="text-center align-middle">{{ $loop->iteration }}</td>
                                                    <td class="align-middle">{{ $item->nama }}</td>
                                                    <td class="text-center align-middle">{{ $item->laki_laki_count }}</td>
                                                    <td class="text-center align-middle">{{ $item->perempuan_count }}</td>
                                                    <td class="text-center align-middle">{{ $item->total_penduduk }}</td>
                                                    <td class="text-center align-middle">{{ $item->total_percent . '%' }}
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        @elseif (request()->segment(3) == 'pendidikan-kk')
                            <div class="card-header">
                                <a href="" target="_blank" class="btn btn-success btn-block btn-sm float-end  mb-0">
                                    Cetak Data
                                </a>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered mb-0">
                                        <thead>
                                            <tr>
                                                <th class="text-center align-middle" width="5%">No.</th>
                                                <th class="text-center align-middle">Pendidikan</th>
                                                <th class="text-center align-middle">Laki-Laki</th>
                                                <th class="text-center align-middle">Perempuan</th>
                                                <th class="text-center align-middle" colspan="2">Jumlah</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($pendidikanKKData as $item)
                                                <tr>
                                                    <td class="text-center align-middle">{{ $loop->iteration }}</td>
                                                    <td class="align-middle">{{ $item->nama }}</td>
                                                    <td class="text-center align-middle">{{ $item->laki_laki_count }}</td>
                                                    <td class="text-center align-middle">{{ $item->perempuan_count }}</td>
                                                    <td class="text-center align-middle">{{ $item->total_penduduk }}</td>
                                                    <td class="text-center align-middle">{{ $item->total_percent . '%' }}
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        @elseif (request()->segment(3) == 'pekerjaan')
                            <div class="card-header">
                                <a href="" target="_blank"
                                    class="btn btn-success btn-block btn-sm float-end  mb-0">
                                    Cetak Data
                                </a>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered mb-0">
                                        <thead>
                                            <tr>
                                                <th class="text-center align-middle" width="5%">No.</th>
                                                <th class="text-center align-middle">Pekerjaan</th>
                                                <th class="text-center align-middle">Laki-Laki</th>
                                                <th class="text-center align-middle">Perempuan</th>
                                                <th class="text-center align-middle" colspan="2">Jumlah</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($pekerjaanData as $item)
                                                <tr>
                                                    <td class="text-center align-middle">{{ $loop->iteration }}</td>
                                                    <td class="align-middle">{{ $item->nama }}</td>
                                                    <td class="text-center align-middle">{{ $item->laki_laki_count }}</td>
                                                    <td class="text-center align-middle">{{ $item->perempuan_count }}</td>
                                                    <td class="text-center align-middle">{{ $item->total_penduduk }}</td>
                                                    <td class="text-center align-middle">{{ $item->total_percent . '%' }}
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        @elseif (request()->segment(3) == 'warganegara')
                            <div class="card-header">
                                <a href="" target="_blank"
                                    class="btn btn-success btn-block btn-sm float-end  mb-0">
                                    Cetak Data
                                </a>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered mb-0">
                                        <thead>
                                            <tr>
                                                <th class="text-center align-middle" width="5%">No.</th>
                                                <th class="text-center align-middle">Kewarganegaraan</th>
                                                <th class="text-center align-middle">Laki-Laki</th>
                                                <th class="text-center align-middle">Perempuan</th>
                                                <th class="text-center align-middle" colspan="2">Jumlah</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($wargaNegaraData as $item)
                                                <tr>
                                                    <td class="text-center align-middle">{{ $loop->iteration }}</td>
                                                    <td class="align-middle">{{ $item->nama }}</td>
                                                    <td class="text-center align-middle">{{ $item->laki_laki_count }}</td>
                                                    <td class="text-center align-middle">{{ $item->perempuan_count }}</td>
                                                    <td class="text-center align-middle">{{ $item->total_penduduk }}</td>
                                                    <td class="text-center align-middle">{{ $item->total_percent . '%' }}
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        @elseif (request()->segment(3) == 'status-kawin')
                            <div class="card-header">
                                <a href="" target="_blank"
                                    class="btn btn-success btn-block btn-sm float-end  mb-0">
                                    Cetak Data
                                </a>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered mb-0">
                                        <thead>
                                            <tr>
                                                <th class="text-center align-middle" width="5%">No.</th>
                                                <th class="text-center align-middle">Status Kawin</th>
                                                <th class="text-center align-middle">Laki-Laki</th>
                                                <th class="text-center align-middle">Perempuan</th>
                                                <th class="text-center align-middle" colspan="2">Jumlah</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($statusKawinData as $item)
                                                <tr>
                                                    <td class="text-center align-middle">{{ $loop->iteration }}</td>
                                                    <td class="align-middle">{{ $item->nama }}</td>
                                                    <td class="text-center align-middle">{{ $item->laki_laki_count }}</td>
                                                    <td class="text-center align-middle">{{ $item->perempuan_count }}</td>
                                                    <td class="text-center align-middle">{{ $item->total_penduduk }}</td>
                                                    <td class="text-center align-middle">{{ $item->total_percent . '%' }}
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        @elseif (request()->segment(3) == 'golongan-darah')
                            <div class="card-header">
                                <a href="" target="_blank"
                                    class="btn btn-success btn-block btn-sm float-end  mb-0">
                                    Cetak Data
                                </a>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered mb-0">
                                        <thead>
                                            <tr>
                                                <th class="text-center align-middle" width="5%">No.</th>
                                                <th class="text-center align-middle">Golongan Darah</th>
                                                <th class="text-center align-middle">Laki-Laki</th>
                                                <th class="text-center align-middle">Perempuan</th>
                                                <th class="text-center align-middle" colspan="2">Jumlah</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($golonganDarahData as $item)
                                                <tr>
                                                    <td class="text-center align-middle">{{ $loop->iteration }}</td>
                                                    <td class="align-middle">{{ $item->nama }}</td>
                                                    <td class="text-center align-middle">{{ $item->laki_laki_count }}</td>
                                                    <td class="text-center align-middle">{{ $item->perempuan_count }}</td>
                                                    <td class="text-center align-middle">{{ $item->total_penduduk }}</td>
                                                    <td class="text-center align-middle">{{ $item->total_percent . '%' }}
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        @elseif (request()->segment(3) == 'cacat')
                            <div class="card-header">
                                <a href="" target="_blank"
                                    class="btn btn-success btn-block btn-sm float-end  mb-0">
                                    Cetak Data
                                </a>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered mb-0">
                                        <thead>
                                            <tr>
                                                <th class="text-center align-middle" width="5%">No.</th>
                                                <th class="text-center align-middle">Cacat</th>
                                                <th class="text-center align-middle">Laki-Laki</th>
                                                <th class="text-center align-middle">Perempuan</th>
                                                <th class="text-center align-middle" colspan="2">Jumlah</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($cacatData as $item)
                                                <tr>
                                                    <td class="text-center align-middle">{{ $loop->iteration }}</td>
                                                    <td class="align-middle">{{ $item->nama }}</td>
                                                    <td class="text-center align-middle">{{ $item->laki_laki_count }}</td>
                                                    <td class="text-center align-middle">{{ $item->perempuan_count }}</td>
                                                    <td class="text-center align-middle">{{ $item->total_penduduk }}</td>
                                                    <td class="text-center align-middle">{{ $item->total_percent . '%' }}
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        @elseif (request()->segment(3) == 'sakit-menahun')
                            <div class="card-header">
                                <a href="" target="_blank"
                                    class="btn btn-success btn-block btn-sm float-end  mb-0">
                                    Cetak Data
                                </a>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered mb-0">
                                        <thead>
                                            <tr>
                                                <th class="text-center align-middle" width="5%">No.</th>
                                                <th class="text-center align-middle">Penyakit</th>
                                                <th class="text-center align-middle">Laki-Laki</th>
                                                <th class="text-center align-middle">Perempuan</th>
                                                <th class="text-center align-middle" colspan="2">Jumlah</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($sakitMenahunData as $item)
                                                <tr>
                                                    <td class="text-center align-middle">{{ $loop->iteration }}</td>
                                                    <td class="align-middle">{{ $item->nama }}</td>
                                                    <td class="text-center align-middle">{{ $item->laki_laki_count }}</td>
                                                    <td class="text-center align-middle">{{ $item->perempuan_count }}</td>
                                                    <td class="text-center align-middle">{{ $item->total_penduduk }}</td>
                                                    <td class="text-center align-middle">{{ $item->total_percent . '%' }}
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        @elseif (request()->segment(3) == 'cara-kb')
                            <div class="card-header">
                                <a href="" target="_blank"
                                    class="btn btn-success btn-block btn-sm float-end  mb-0">
                                    Cetak Data
                                </a>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered mb-0">
                                        <thead>
                                            <tr>
                                                <th class="text-center align-middle" width="5%">No.</th>
                                                <th class="text-center align-middle">Akseptor KB</th>
                                                <th class="text-center align-middle">Laki-Laki</th>
                                                <th class="text-center align-middle">Perempuan</th>
                                                <th class="text-center align-middle" colspan="2">Jumlah</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($caraKBData as $item)
                                                <tr>
                                                    <td class="text-center align-middle">{{ $loop->iteration }}</td>
                                                    <td class="align-middle">{{ $item->nama }}</td>
                                                    <td class="text-center align-middle">{{ $item->laki_laki_count }}</td>
                                                    <td class="text-center align-middle">{{ $item->perempuan_count }}</td>
                                                    <td class="text-center align-middle">{{ $item->total_penduduk }}</td>
                                                    <td class="text-center align-middle">{{ $item->total_percent . '%' }}
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
