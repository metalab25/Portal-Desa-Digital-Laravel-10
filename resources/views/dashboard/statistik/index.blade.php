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
                    <div class="alert alert-danger rounded-3 mb-0">
                        Pilih statistik kependudukan disebelah kiri untuk melihat data statistik penduduk
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
