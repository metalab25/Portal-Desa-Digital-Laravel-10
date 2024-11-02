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
                                        <td>
                                            <a href="{{ route('statistik.agama') }}">Agama</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <a href="{{ route('statistik.jenis-kelamin') }}">Jenis Kelamin</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <a href="">Pendidikan Sedang Ditempuh</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <a href="">Pendidikan Dalam KK</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <a href="">Pekerjaan</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <a href="">Warga Negara</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <a href="">Status Kawin</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <a href="">Golongan Darah</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <a href="">Penyandang Cacat</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <a href="">Sakit Menahun</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <a href="">Akseptor KB</a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
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
