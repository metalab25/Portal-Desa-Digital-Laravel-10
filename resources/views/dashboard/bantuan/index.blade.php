@extends('dashboard.layouts.header')

@section('content')
    <div class="app-content">
        <div class="container-fluid">
            <div class="card rounded-4 shadow">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-6"></div>
                        <div class="col-md-6">
                            <a href="{{ route('bantuan.create') }}" class="btn btn-primary btn-block btn-sm float-end">
                                Tambah Program Bantuan
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
                                    <th class="align-middle">Nama Program</th>
                                    <th class="text-center align-middle">Sasaran</th>
                                    <th class="text-center align-middle">Masa Berlaku</th>
                                    <th class="text-center align-middle" width="10%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($bantuan as $item)
                                    <tr>
                                        <td class="text-center align-middle">
                                            {{ ($bantuan->currentPage() - 1) * $bantuan->perPage() + $loop->iteration }}
                                        </td>
                                        <td class="align-middle">{{ $item->nama }}</td>
                                        <td class="text-center align-middle">{{ $item->bantuan_sasaran->nama }}</td>
                                        <td class="text-center align-middle">
                                            {{ tanggal_indonesia($item->mulai, false) . ' s/d ' . tanggal_indonesia($item->akhir, false) }}
                                        </td>
                                        <td class="text-center align-middle">
                                            <a href="{{ route('bantuan.show', $item->id) }}"
                                                class="btn btn-info btn-xs mb-sm-1" title="Detais">S</a>
                                            <a href="{{ route('bantuan.edit', $item->id) }}"
                                                class="btn btn-warning btn-xs mb-sm-1" title="Edit">E</a>
                                            <form action="{{ route('bantuan.destroy', $item->id) }}" method="POST"
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
                        {{ $bantuan->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
