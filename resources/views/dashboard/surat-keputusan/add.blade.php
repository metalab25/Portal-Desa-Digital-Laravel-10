@extends('dashboard.layouts.header')

@section('content')
    <div class="app-content">
        <div class="container-fluid">
            <div class="card rounded-3 shadow">
                <div class="card-header p-3 py-2">
                    <div class="pt-1">
                        <p class="text-sm mb-0 text-capitalize font-weight-bold">Tambah Surat Keputusan
                            {{ $setting->sebutan_kepala_desa }}</p>
                    </div>
                </div>
                <form action="{{ route('surat-keputusan.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group row mb-3">
                            <label for="nama" class="form-label col-md-3">Nama Dokumen</label>
                            <div class="col-md-9">
                                <input type="text" name="nama" id="nama"
                                    class="form-control @error('nama') is-invalid @enderror" value="{{ old('nama') }}">
                                @error('nama')
                                    <div class="invalid-feedback">
                                        {{ 'Nama dokumen harus diisi sesuai dengan surat keputusan' }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label for="dokumen" class="form-label col-md-3">Berkas Scan Surat Keputusan</label>
                            <div class="col-md-5">
                                <input class="form-control @error('dokumen') is-invalid @enderror" type="file"
                                    name="dokumen" id="dokumen">
                                @error('dokumen')
                                    <div class="invalid-feedback">
                                        {{ 'Dokumen scan surat keputusan harus diunggah' }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label for="nomor_keputusan" class="form-label col-md-3">Nomor Keputusan</label>
                            <div class="col-md-4">
                                <input type="text" name="nomor_keputusan" id="nomor_keputusan"
                                    class="form-control @error('nomor_keputusan') is-invalid @enderror"
                                    value="{{ old('nomor_keputusan') }}">
                                @error('nomor_keputusan')
                                    <div class="invalid-feedback">
                                        {{ 'Nomor keputusan harus diisi' }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label for="tanggal_keputusan" class="form-label col-md-3">Tanggal Keputusan</label>
                            <div class="col-md-3">
                                <input type="date" name="tanggal_keputusan" id="tanggal_keputusan"
                                    class="form-control @error('tanggal_keputusan') is-invalid @enderror"
                                    value="{{ old('tanggal_keputusan') }}">
                                @error('tanggal_keputusan')
                                    <div class="invalid-feedback">
                                        {{ 'Tanggal keputusan harus diisi' }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label for="uraian_singkat" class="form-label col-md-3">Uraian Singkat</label>
                            <div class="col-md-9">
                                <input type="text" name="uraian_singkat" id="uraian_singkat"
                                    class="form-control @error('uraian_singkat') is-invalid @enderror"
                                    value="{{ old('uraian_singkat') }}">
                                @error('uraian_singkat')
                                    <div class="invalid-feedback">
                                        {{ 'Tanggal surat harus diisi' }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label for="nomor_dilaporkan" class="form-label col-md-3">Nomor Dilaporkan</label>
                            <div class="col-md-4">
                                <input type="text" name="nomor_dilaporkan" id="nomor_dilaporkan"
                                    class="form-control @error('nomor_dilaporkan') is-invalid @enderror"
                                    value="{{ old('nomor_dilaporkan') }}">
                                @error('nomor_dilaporkan')
                                    <div class="invalid-feedback">
                                        {{ 'Nomor dilaporkan harus diisi' }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label for="tanggal_dilaporkan" class="form-label col-md-3">Tanggal Dilaporkan</label>
                            <div class="col-md-3">
                                <input type="date" name="tanggal_dilaporkan" id="tanggal_dilaporkan"
                                    class="form-control @error('tanggal_dilaporkan') is-invalid @enderror"
                                    value="{{ old('tanggal_dilaporkan') }}">
                                @error('tanggal_dilaporkan')
                                    <div class="invalid-feedback">
                                        {{ 'Tanggal dilaporkan harus diisi' }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label for="keterangan" class="form-label col-md-3">Keterangan</label>
                            <div class="col-md-9">
                                <textarea name="keterangan" id="keterangan" cols="30" rows="10" class="form-control">{{ old('keterangan') }}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer py-3">
                        <a href="{{ route('surat-keluar.index') }}"
                            class="link btn btn-danger btn-block btn-sm mb-sm-1">Batal</a>
                        <button type="submit" class="btn btn-primary btn-block btn-sm float-end">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
