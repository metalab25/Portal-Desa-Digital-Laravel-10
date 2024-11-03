@extends('dashboard.layouts.header')

@section('content')
    <div class="app-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4">
                    @if ($bantuans->count() > 0)
                        <div class="card rounded-3 mb-3 shadow">
                            <div class="card-header p-3 py-2">
                                <div class="pt-1">
                                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Statistik Program Bantuan</p>
                                </div>
                            </div>
                            <div class="card-body">
                                <table class="table table-striped table-kategori mb-0">
                                    <tbody>
                                        @foreach ($bantuans as $item)
                                            <tr>
                                                <td>
                                                    <a href="{{ route('statistik.bantuan', $item->id) }}">
                                                        {{ $item->nama }}
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    @endif
                </div>
                <div class="col-md-8">
                    <div class="alert alert-danger rounded-3 mb-0">
                        Pilih program bantuan disebelah kiri untuk melihat data statistik bantuan
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
