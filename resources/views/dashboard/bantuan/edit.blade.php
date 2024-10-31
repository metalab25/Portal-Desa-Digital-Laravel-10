@extends('dashboard.layouts.header')

@section('content')
    <div class="app-content">
        <div class="container-fluid">
            <div class="card rounded-3 shadow">
                <div class="card-header p-3 py-2">
                    <div class="pt-1">
                        <p class="text-sm mb-0 text-capitalize font-outfit">Edit Program Bantuan
                        </p>
                    </div>
                </div>
                <form action="{{ route('bantuan.update', $bantuan->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="form-group row mb-3">
                            <label for="nama" class="form-label col-md-2">Nama Program Bantuan</label>
                            <div class="col-md-10">
                                <input type="text" name="nama" id="nama"
                                    class="form-control @error('nama') is-invalid @enderror"
                                    value="{{ old('nama', $bantuan->nama) }}" placeholder="Nama program bantuan">
                                @error('logo')
                                    <div class="invalid-feedback">
                                        {{ 'Nama program bantuan harus diisi' }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label for="bantuan_sasaran_id" class="form-label col-md-2">Sasaran Program Bantuan</label>
                            <div class="col-md-10">
                                <select class="form-control form-select @error('bantuan_sasaran_id') is-invalid @enderror"
                                    id="bantuan_sasaran_id" name="bantuan_sasaran_id">
                                    <option value="">-- Pilih Sasaran Bantuan --</option>
                                    @foreach ($sasaran as $item)
                                        @if (old('bantuan_sasaran_id', $bantuan->bantuan_sasaran_id) == $item->id)
                                            <option value="{{ $item->id }}" selected>
                                                {{ $item->nama }}
                                            </option>
                                        @else
                                            <option value="{{ $item->id }}"> {{ $item->nama }}
                                            </option>
                                        @endif
                                    @endforeach
                                </select>
                                @error('bantuan_sasaran_id')
                                    <div class="invalid-feedback">
                                        {{ 'Sasaran bantuan harus dipilih' }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label for="deskripsi" class="form-label col-md-2">Keterangan</label>
                            <div class="col-md-10">
                                <textarea id="deskripsi" name="deskripsi" class="form-control" rows="8" cols="10">{{ old('deskripsi', $bantuan->deskripsi) }}</textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="mulai" class="form-label col-md-2">Masa Berlaku</label>
                            <div class="col-md-4">
                                <input type="date" name="mulai" id="mulai"
                                    class="form-control @error('mulai') is-invalid @enderror"
                                    value="{{ old('mulai', $bantuan->mulai) }}">
                                @error('mulai')
                                    <div class="invalid-feedback">
                                        {{ 'Tanggal mulai bantuan harus diisi' }}
                                    </div>
                                @enderror
                            </div>
                            <label for="akhir" class="form-label col-md-2">Sampai Dengan</label>
                            <div class="col-md-4">
                                <input type="date" name="akhir" id="akhir"
                                    class="form-control @error('akhir') is-invalid @enderror"
                                    value="{{ old('akhir', $bantuan->akhir) }}">
                                @error('akhir')
                                    <div class="invalid-feedback">
                                        {{ 'Tanggal berakhir bantuan harus diisi' }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="card-footer py-3">
                        <a href="{{ route('bantuan.index') }}" class="btn btn-danger btn-block btn-sm mb-sm-1">Batal</a>
                        <button type="submit" class="btn btn-primary btn-block btn-sm float-end">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
