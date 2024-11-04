@extends('dashboard.layouts.header')

@section('content')
    <div class="app-content">
        <div class="container-fluid">
            <div class="card rounded-3 shadow">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-6"></div>
                        <div class="col-md-6">
                            <a href="{{ route('klasifikasi-surat.create') }}"
                                class="btn btn-primary btn-block btn-sm float-end" data-bs-toggle="modal"
                                data-bs-target="#modal-create">
                                Tambah Klasifikasi Surat
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered mb-0">
                            <thead>
                                <tr>
                                    <th class="text-center align-middle" width="3%">No.</th>
                                    <th class="text-center align-middle" width="7%">Kode</th>
                                    <th class="text-center align-middle" width="30%">Klasifikasi</th>
                                    <th class="text-center align-middle" width="50%">Uraian</th>
                                    <th class="text-center align-middle">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($klasifikasi as $item)
                                    <tr>
                                        <td class="text-center align-middle">
                                            {{ ($klasifikasi->currentPage() - 1) * $klasifikasi->perPage() + $loop->iteration }}
                                        </td>
                                        <td class="text-center align-middle">{{ $item->kode }}</td>
                                        <td class="align-middle">{{ $item->nama }}</td>
                                        <td class="align-middle">{{ $item->deskripsi }}</td>
                                        <td class="text-center align-middle">
                                            <a href="{{ route('klasifikasi-surat.show', $item->id) }}"
                                                class="btn btn-info btn-xs mb-sm-1" title="Show">S</a>
                                            <a href="{{ route('klasifikasi-surat.edit', $item->id) }}"
                                                class="btn btn-warning btn-xs mb-sm-1" title="Edit">E</a>
                                            <a href="{{ route('klasifikasi-surat.destroy', $item->id) }}"
                                                class="btn btn-danger btn-xs mb-sm-1" data-confirm-delete="true"
                                                title="Hapus Data">H</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer py-3">
                    <div class="float-end">
                        {{ $klasifikasi->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('dashboard.klasifikasi-surat.add')
@endsection

@push('script')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(function() {
            $('body').addClass('sidebar-collapse');
        });
    </script>
@endpush
