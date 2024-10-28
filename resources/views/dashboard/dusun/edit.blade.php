@extends('dashboard.layouts.header')

@section('content')
    <div class="app-content">
        <div class="container-fluid">
            <div class="card rounded-4 shadow">
                <div class="card-header p-3 py-2">
                    <div class="pt-1">
                        <p class="text-sm mb-0 text-capitalize font-weight-bold">Edit Data {{ $setting->sebutan_dusun }}</p>
                    </div>
                </div>
                <form action="{{ route('wilayah.update', $dusun->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="form-group row mb-3">
                            <label for="nama" class="form-label col-md-2">Nama {{ $setting->sebutan_dusun }}</label>
                            <div class="col-md-10">
                                <input type="text" name="nama" id="nama"
                                    class="form-control @error('name') is-invalid @enderror"
                                    value="{{ old('nama', $dusun->nama) }}">
                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ 'Nama' . $setting->sebutan_dusun . 'harus diisi' }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="penduduk_id" class="form-label col-md-2">Nama
                                {{ $setting->sebutan_kepala_dusun }}</label>
                            <div class="col-md-10">
                                <select id="penduduk_id" name="penduduk_id" class="form-control form-select">
                                    <option value="">-- Pilih {{ $setting->sebutan_kepala_dusun }} -- </option>
                                    @foreach ($penduduk as $item)
                                        @if (old('penduduk_id', $dusun->penduduk_id) == $item->id)
                                            <option value="{{ $item->id }}" selected>
                                                {{ 'NIK : ' . $item->nik . ' - ' . $item->nama }}
                                            </option>
                                        @else
                                            <option value="{{ $item->id }}">
                                                {{ 'NIK : ' . $item->nik . ' - ' . $item->nama }}
                                            </option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer py-3">
                        <a href="{{ route('wilayah.index') }}" class="btn btn-danger btn-sm">Batal</a>
                        <button type="submit" class="btn btn-primary btn-sm float-end">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
