@extends('dashboard.layouts.header')

@section('content')
    <div class="app-content">
        <div class="container-fluid">
            <div class="card rounded-4 shadow">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-6"></div>
                        <div class="col-md-6">
                            <a href="{{ route('penduduk.create') }}" class="btn btn-primary btn-block btn-sm float-end">Tambah
                                Penduduk</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered mb-0">
                            <thead>
                                <tr>
                                    <th class="text-center align-middle" width="3%">No.</th>
                                    <th class="text-center align-middle">NIK</th>
                                    <th class="align-middle">Nama Lengkap</th>
                                    <th class="align-middle">Nomor KK</th>
                                    <th class="text-center align-middle">{{ $setting->sebutan_dusun }}</th>
                                    <th class="text-center align-middle">RW</th>
                                    <th class="text-center align-middle">RT</th>
                                    <th class="text-center align-middle">Tanggal Lahir</th>
                                    <th class="text-center align-middle">Usia</th>
                                    <th class="text-center align-middle">Pendidikan KK</th>
                                    <th class="text-center align-middle">Pekerjaan</th>
                                    <th class="text-center align-middle">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($penduduks as $item)
                                    <tr>
                                        <td class="text-center align-middle">
                                            {{ ($penduduks->currentPage() - 1) * $penduduks->perPage() + $loop->iteration }}
                                        </td>
                                        <td class="align-middle">{{ $item->nik }}</td>
                                        <td class="align-middle">{{ $item->nama }}</td>
                                        <td class="align-middle">{{ $item->keluarga->no_kk }}</td>
                                        <td class="align-middle">{{ $item->keluarga->dusun->nama }}</td>
                                        <td class="text-center align-middle">{{ $item->keluarga->rw->nama }}</td>
                                        <td class="text-center align-middle">{{ $item->keluarga->rt->nama }}</td>
                                        <td class="text-center align-middle">
                                            {{ tanggal_indonesia($item->tanggal_lahir, false) }}</td>
                                        <td class="text-center align-middle">{{ $item->umur }}</td>
                                        <td class="align-middle">{{ $item->pendidikan_kk->nama }}</td>
                                        <td class="align-middle">{{ $item->pekerjaan->nama }}</td>
                                        <td class="text-center align-middle">
                                            <a href="{{ route('penduduk.show', $item->id) }}"
                                                class="btn btn-info btn-xs mb-sm-1" title="Show">S</a>
                                            <a href="{{ route('penduduk.edit', $item->id) }}"
                                                class="btn btn-warning btn-xs mb-sm-1" title="Edit">E</a>
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
                        {{ $penduduks->links() }}
                    </div>
                </div>
            </div>

        </div>
    </div>

    {{-- @include('dashboard.keluarga.create-kk') --}}
@endsection

@push('script')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(function() {
            $('body').addClass('sidebar-collapse');
        });
    </script>
@endpush
