@extends('dashboard.layouts.header')

@section('content')
    <div class="app-content">
        <div class="container-fluid">
            <div class="card rounded-3 shadow">
                <div class="card-header p-3 py-2">
                    <div class="pt-1">
                        <p class="text-sm mb-0 text-capitalize font-weight-bold">Tambah Surat Keluar</p>
                    </div>
                </div>
                <form action="{{ route('surat-keluar.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group row mb-3">
                            <label for="nomor_urut" class="form-label col-md-2">Nomor Urut</label>
                            <div class="col-md-2">
                                <input type="text" name="nomor_urut" id="nomor_urut" class="form-control"
                                    value="{{ old('nomor_urut', $nomor_urut) }}" readonly>
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label for="dokumen" class="form-label col-md-2">Berkas Scan Surat Keluar</label>
                            <div class="col-md-5">
                                <input class="form-control" type="file" name="dokumen" id="dokumen">
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label for="nomor_surat" class="form-label col-md-2">Nomor Surat</label>
                            <div class="col-md-4">
                                <input type="text" name="nomor_surat" id="nomor_surat"
                                    class="form-control @error('nomor_surat') is-invalid @enderror"
                                    value="{{ old('nomor_surat') }}">
                                @error('nomor_surat')
                                    <div class="invalid-feedback">
                                        {{ 'Nomor surat harus diisi' }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label for="klasifikasi_surat_id" class="form-label col-md-2">Klasifikasi Surat</label>
                            <div class="col-md-6">
                                <select id="klasifikasi_surat_id" name="klasifikasi_surat_id"
                                    class="form-control form-select @error('klasifikasi_surat_id') is-invalid @enderror">
                                    <option value="">-- Pilih Klasifikasi Surat -- </option>
                                    @foreach ($klasifikasi as $item)
                                        @if (old('klasifikasi_surat_id') == $item->id)
                                            <option value="{{ $item->id }}" selected>
                                                {{ $item->kode . ' - : ' . $item->nama }}
                                            </option>
                                        @else
                                            <option value="{{ $item->id }}">
                                                {{ $item->kode . ' -  ' . $item->nama }}
                                            </option>
                                        @endif
                                    @endforeach
                                </select>
                                @error('klasifikasi_surat_id')
                                    <div class="invalid-feedback">
                                        {{ 'Kode atau klasifikasi surat harus dipilih' }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label for="tanggal_surat" class="form-label col-md-2">Tanggal Surat</label>
                            <div class="col-md-3">
                                <input type="date" name="tanggal_surat" id="tanggal_surat"
                                    class="form-control @error('tanggal_surat') is-invalid @enderror"
                                    value="{{ old('tanggal_surat') }}">
                                @error('tanggal_surat')
                                    <div class="invalid-feedback">
                                        {{ 'Tanggal surat harus diisi' }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label for="tujuan" class="form-label col-md-2">Tujuan</label>
                            <div class="col-md-10">
                                <input type="text" name="tujuan" id="tujuan"
                                    class="form-control @error('tujuan') is-invalid @enderror" value="{{ old('tujuan') }}">
                                @error('tujuan')
                                    <div class="invalid-feedback">
                                        {{ 'Tanggal surat harus diisi' }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label for="perihal" class="form-label col-md-2">Perihal/Isi Singkat</label>
                            <div class="col-md-10">
                                <input type="text" name="perihal" id="perihal"
                                    class="form-control @error('perihal') is-invalid @enderror"
                                    value="{{ old('perihal') }}">
                                @error('perihal')
                                    <div class="invalid-feedback">
                                        {{ 'Tanggal surat harus diisi' }}
                                    </div>
                                @enderror
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
