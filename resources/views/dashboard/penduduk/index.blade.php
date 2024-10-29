@extends('dashboard.layouts.header')

@section('content')
    <div class="app-content">
        <div class="container-fluid">
            <div class="card rounded-4 shadow">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-6"></div>
                        <div class="col-md-6">
                            <a href="{{ route('penduduk.create') }}" class="btn btn-primary btn-sm float-end">Tambah
                                Penduduk</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered mb-0">
                            <thead>
                                <tr>
                                    <th class="text-center" width="3%">No.</th>
                                    <th class="text-center">NIK</th>
                                    <th>Nama Lengkap</th>
                                    <th>Nomor KK</th>
                                    <th class="text-center">{{ $setting->sebutan_dusun }}</th>
                                    <th class="text-center">RW</th>
                                    <th class="text-center">RT</th>
                                    <th class="text-center">Tanggal Lahir</th>
                                    <th class="text-center">Usia</th>
                                    <th class="text-center">Pendidikan KK</th>
                                    <th class="text-center">Pekerjaan</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($penduduks as $item)
                                    <tr>
                                        <td class="text-center">
                                            {{ ($penduduks->currentPage() - 1) * $penduduks->perPage() + $loop->iteration }}
                                        </td>
                                        <td>{{ $item->nik }}</td>
                                        <td>{{ $item->nama }}</td>
                                        <td>{{ $item->keluarga->no_kk }}</td>
                                        <td>{{ $item->keluarga->dusun->nama }}</td>
                                        <td class="text-center">{{ $item->keluarga->rw->nama }}</td>
                                        <td class="text-center">{{ $item->keluarga->rt->nama }}</td>
                                        <td class="text-center">{{ tanggal_indonesia($item->tanggal_lahir, false) }}</td>
                                        <td class="text-center">{{ $item->umur }}</td>
                                        <td>{{ $item->pendidikan_kk->nama }}</td>
                                        <td>{{ $item->pekerjaan->nama }}</td>
                                        <td class="text-center">
                                            <a href="{{ route('penduduk.show', $item->id) }}" class="btn btn-info btn-xs"
                                                title="Show">S</a>
                                            <a href="{{ route('penduduk.edit', $item->id) }}"
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
