@extends('dashboard.layouts.header')

@section('content')
    <div class="app-content">
        <div class="container-fluid">
            <div class="card rounded-4 shadow">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-6"></div>
                        <div class="col-md-6">
                            <a href="{{ route('jabatan.create') }}" class="btn btn-primary btn-block btn-sm float-end">
                                Tambah Jabatan
                            </a>

                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped mb-0">
                            <thead>
                                <tr>
                                    <th class="text-center align-middle" width="3%">No.</th>
                                    <th class="align-middle">Nama Jabatan</th>
                                    <th class="align-middle hidden-xs">Deskripsi</th>
                                    <th class="text-center align-middle">Jumlah Staf</th>
                                    <th class="text-center align-middle" width="10%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($jabatan as $item)
                                    <tr>
                                        <td class="text-center align-middle">
                                            {{ ($jabatan->currentPage() - 1) * $jabatan->perPage() + $loop->iteration }}
                                        </td>
                                        <td class="align-middle">{{ $item->nama }}</td>
                                        <td class="align-middle hidden-xs">{{ $item->excerpt }}</td>
                                        <td class="text-center align-middle">{{ $item->pamong_count }}</td>
                                        <td class="text-center align-middle">
                                            <a href="{{ route('jabatan.edit', $item->id) }}"
                                                class="btn btn-warning btn-xs mb-sm-1" title="Edit">E</a>
                                            <form action="{{ route('jabatan.destroy', $item->id) }}" method="POST"
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
                        {{ $jabatan->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- @include('dashboard.dusun.add') --}}
@endsection
