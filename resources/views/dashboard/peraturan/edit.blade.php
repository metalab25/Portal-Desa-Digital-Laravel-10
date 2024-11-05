@extends('dashboard.layouts.header')

@section('content')
    <div class="app-content">
        <div class="container-fluid">
            <div class="card rounded-3 shadow">
                <div class="card-header p-3 py-2">
                    <div class="pt-1">
                        <p class="text-sm mb-0 text-capitalize font-weight-bold">Tambah Peraturan
                            {{ $setting->sebutan_desa }}</p>
                    </div>
                </div>
                <form action="{{ route('peraturan.update', $peraturan->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="card-body">
                        <div class="form-group row mb-3">
                            <label for="nama" class="form-label col-md-3">Nama Peraturan</label>
                            <div class="col-md-9">
                                <input type="text" name="nama" id="nama"
                                    class="form-control @error('nama') is-invalid @enderror"
                                    value="{{ old('nama', $peraturan->nama) }}">
                                @error('nama')
                                    <div class="invalid-feedback">
                                        {{ 'Nama peraturan harus diisi' }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label for="jenis_peraturan" class="form-label col-md-3">Jenis Peraturan</label>
                            <div class="col-md-6">
                                <input type="text" name="jenis_peraturan" id="jenis_peraturan"
                                    class="form-control @error('jenis_peraturan') is-invalid @enderror"
                                    value="{{ old('jenis_peraturan', $peraturan->jenis_peraturan) }}">
                                @error('jenis_peraturan')
                                    <div class="invalid-feedback">
                                        {{ 'Jenis peraturan harus diisi' }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label for="uraian_singkat" class="form-label col-md-3">Uraian Singkat</label>
                            <div class="col-md-9">
                                <input type="text" name="uraian_singkat" id="uraian_singkat" class="form-control"
                                    value="{{ old('uraian_singkat', $peraturan->uraian_singkat) }}">
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label for="dokumen" class="form-label col-md-3">Berkas Scan Peraturan
                                {{ $setting->sebutan_desa }}</label>
                            <div class="col-md-5">
                                <p class="text-sm">{{ $peraturan->dokumen ?? '-' }}</p>
                                <input type="hidden" name="oldDokumen" value="{{ $peraturan->dokumen }}">
                                <input class="form-control" type="file" name="dokumen" id="dokumen">
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label for="tanggal_kesepakatan" class="form-label col-md-3">Tanggal Kesepatan</label>
                            <div class="col-md-3">
                                <input type="date" name="tanggal_kesepakatan" id="tanggal_kesepakatan"
                                    class="form-control @error('tanggal_kesepakatan') is-invalid @enderror"
                                    value="{{ old('tanggal_kesepakatan', $peraturan->tanggal_kesepakatan) }}">
                                @error('tanggal_kesepakatan')
                                    <div class="invalid-feedback">
                                        {{ 'Tanggal kesepakatan peraturan harus diisi' }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label for="nomor_tetapan" class="form-label col-md-3">Nomor Ditetapkan</label>
                            <div class="col-md-3">
                                <input type="text" name="nomor_tetapan" id="nomor_tetapan"
                                    class="form-control @error('nomor_tetapan') is-invalid @enderror"
                                    value="{{ old('nomor_tetapan', $peraturan->nomor_tetapan) }}">
                                @error('nomor_tetapan')
                                    <div class="invalid-feedback">
                                        {{ 'Nomor tetapan peraturan harus diisi' }}
                                    </div>
                                @enderror
                            </div>
                            <label for="tanggal_tetapan" class="form-label col-md-3">Tanggal Ditetapkan</label>
                            <div class="col-md-3">
                                <input type="date" name="tanggal_tetapan" id="tanggal_tetapan"
                                    class="form-control @error('tanggal_tetapan') is-invalid @enderror"
                                    value="{{ old('tanggal_tetapan', $peraturan->tanggal_tetapan) }}">
                                @error('tanggal_tetapan')
                                    <div class="invalid-feedback">
                                        {{ 'Tanggal tetapan peraturan harus diisi' }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label for="nomor_dilaporkan" class="form-label col-md-3">Nomor Dilaporkan</label>
                            <div class="col-md-3">
                                <input type="text" name="nomor_dilaporkan" id="nomor_dilaporkan"
                                    class="form-control @error('nomor_dilaporkan') is-invalid @enderror"
                                    value="{{ old('nomor_dilaporkan', $peraturan->nomor_dilaporkan) }}">
                                @error('nomor_dilaporkan')
                                    <div class="invalid-feedback">
                                        {{ 'Nomor dilaporkan peraturan harus diisi' }}
                                    </div>
                                @enderror
                            </div>
                            <label for="tanggal_dilaporkan" class="form-label col-md-3">Tanggal Dilaporkan</label>
                            <div class="col-md-3">
                                <input type="date" name="tanggal_dilaporkan" id="tanggal_dilaporkan"
                                    class="form-control @error('tanggal_dilaporkan') is-invalid @enderror"
                                    value="{{ old('tanggal_dilaporkan', $peraturan->tanggal_dilaporkan) }}">
                                @error('tanggal_dilaporkan')
                                    <div class="invalid-feedback">
                                        {{ 'Tanggal dilaporkan peraturan harus diisi' }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label for="nomor_lembaran_desa" class="form-label col-md-3">No. Diundangkan Dlm Lembaran
                                {{ $setting->sebutan_desa }}</label>
                            <div class="col-md-3">
                                <input type="text" name="nomor_lembaran_desa" id="nomor_lembaran_desa"
                                    class="form-control @error('nomor_lembaran_desa') is-invalid @enderror"
                                    value="{{ old('nomor_lembaran_desa', $peraturan->nomor_lembaran_desa) }}">
                                @error('nomor_lembaran_desa')
                                    <div class="invalid-feedback">
                                        {{ 'Nomor diundangkan dalam lembaran harus diisi' }}
                                    </div>
                                @enderror
                            </div>
                            <label for="tanggal_lembaran_desa" class="form-label col-md-3">Tgl Diundangkan Dlm Lembaran
                                {{ $setting->sebutan_desa }}</label>
                            <div class="col-md-3">
                                <input type="date" name="tanggal_lembaran_desa" id="tanggal_lembaran_desa"
                                    class="form-control @error('tanggal_lembaran_desa') is-invalid @enderror"
                                    value="{{ old('tanggal_lembaran_desa', $peraturan->tanggal_lembaran_desa) }}">
                                @error('tanggal_lembaran_desa')
                                    <div class="invalid-feedback">
                                        {{ 'Tanggal diundangkan dalam lembaran harus diisi' }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label for="nomor_berita_desa" class="form-label col-md-3">No. Diundangkan Dlm Berita
                                {{ $setting->sebutan_desa }}</label>
                            <div class="col-md-3">
                                <input type="text" name="nomor_berita_desa" id="nomor_berita_desa"
                                    class="form-control @error('nomor_berita_desa') is-invalid @enderror"
                                    value="{{ old('nomor_berita_desa', $peraturan->nomor_berita_desa) }}">
                                @error('nomor_berita_desa')
                                    <div class="invalid-feedback">
                                        {{ 'Nomor diundangkan dalam berita harus diisi' }}
                                    </div>
                                @enderror
                            </div>
                            <label for="tanggal_berita_desa" class="form-label col-md-3">Tgl Diundangkan Dlm Berita
                                {{ $setting->sebutan_desa }}</label>
                            <div class="col-md-3">
                                <input type="date" name="tanggal_berita_desa" id="tanggal_berita_desa"
                                    class="form-control @error('tanggal_berita_desa') is-invalid @enderror"
                                    value="{{ old('tanggal_berita_desa', $peraturan->tanggal_berita_desa) }}">
                                @error('tanggal_berita_desa')
                                    <div class="invalid-feedback">
                                        {{ 'Tanggal diundangkan dalam berita harus diisi' }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="card-footer py-3">
                        <a href="{{ route('peraturan.index') }}"
                            class="link btn btn-danger btn-block btn-sm mb-sm-1">Batal</a>
                        <button type="submit" class="btn btn-primary btn-block btn-sm float-end">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
