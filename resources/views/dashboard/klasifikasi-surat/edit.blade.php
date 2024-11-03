@extends('dashboard.layouts.header')

@section('content')
    <div class="app-content">
        <div class="container-fluid">
            <div class="card rounded-3 shadow">
                <form action="{{ route('klasifikasi-surat.update', $klasifikasi->id) }}" method="post" class="mb-0">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="form-group mb-2">
                            <label for="kode" class="form-label">Kode</label>
                            <input type="text" name="kode" id="kode"
                                class="form-control @error('kode') is-invalid @enderror"
                                value="{{ old('kode', $klasifikasi->kode) }}">
                            @error('kode')
                                <div class="invalid-feedback">
                                    {{ 'Kode klasifikasi surat harus diisi' }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group mb-2">
                            <label for="nama" class="form-label">Nama Klasifikasi</label>
                            <input type="text" name="nama" id="nama"
                                class="form-control @error('nama') is-invalid @enderror"
                                value="{{ old('nama', $klasifikasi->nama) }}">
                            @error('nama')
                                <div class="invalid-feedback">
                                    {{ 'Nama klasifikasi surat harus diisi' }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group ">
                            <label for="deskripsi" class="form-label">Uraian Klasifikasi</label>
                            <textarea name="deskripsi" id="deskripsi" cols="30" rows="5" class="form-control">{{ old('deskripsi', $klasifikasi->deskripsi ?? '-') }}</textarea>
                        </div>
                    </div>
                    <div class="card-footer py-3">
                        <a href="{{ route('klasifikasi-surat.index') }}" class="btn btn-danger btn-block btn-sm mb-sm-1"
                            data-bs-dismiss="modal">Batal</a>
                        <button type="submit" class="btn btn-primary btn-block btn-sm float-end">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
