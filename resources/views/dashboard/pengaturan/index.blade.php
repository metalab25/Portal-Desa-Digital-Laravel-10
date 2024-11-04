@extends('dashboard.layouts.header')

@section('content')
    <div class="app-content">
        <div class="container-fluid">
            <form action="{{ route('setting.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-4">
                        <div class="card rounded-3 mb-3">
                            <div class="card-header p-3 py-2">
                                <div class="pt-1">
                                    <p class="text-sm mb-0 text-capitalize font-outfit">Favicon</p>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="d-flex justify-content-center">
                                    <input type="hidden" name="oldIcon" value="{{ $pengaturan->icon }}">
                                    @if ($pengaturan->icon)
                                        <img src="{{ asset('storage/' . $pengaturan->icon) }}"
                                            class="icon-preview rounded-3 img-fluid d-block mx-auto mb-3">
                                    @else
                                        <img src="{{ asset('/assets/dashboard/img/no-picture.webp') }}"
                                            class="icon-preview rounded-3 img-fluid d-block mx-auto mb-3">
                                    @endif
                                </div>
                                <div class="mb-0">
                                    <input class="form-control @error('icon') is-invalid @enderror" type="file"
                                        name="icon" id="icon" onchange="previewIcon()">
                                    @error('icon')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="card rounded-3">
                            <div class="card-header p-3 py-2">
                                <div class="pt-1">
                                    <p class="text-sm mb-0 text-capitalize font-outfit">Pengaturan Aplikasi</p>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="form-group row mb-3">
                                    <label for="sebutan_desa" class="form-label col-md-3">Sebutan Desa</label>
                                    <div class="col-md-9">
                                        <input type="text" name="sebutan_desa" id="sebutan_desa"
                                            class="form-control @error('sebutan_desa') is-invalid @enderror"
                                            value="{{ old('sebutan_desa', $pengaturan->sebutan_desa) }}" required>
                                        @error('sebutan_desa')
                                            <div class="invalid-feedback">
                                                {{ 'Nama desa harus diisi' }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row mb-3">
                                    <label for="sebutan_kecamatan" class="form-label col-md-3">Sebutan Kecamatan</label>
                                    <div class="col-md-9">
                                        <input type="text" name="sebutan_kecamatan" id="sebutan_kecamatan"
                                            class="form-control @error('sebutan_kecamatan') is-invalid @enderror"
                                            value="{{ old('sebutan_kecamatan', $pengaturan->sebutan_kecamatan) }}" required>
                                    </div>
                                </div>
                                <div class="form-group row mb-3">
                                    <label for="sebutan_kabupaten" class="form-label col-md-3">Sebutan Kabupaten</label>
                                    <div class="col-md-9">
                                        <input type="text" name="sebutan_kabupaten" id="sebutan_kabupaten"
                                            class="form-control @error('sebutan_kabupaten') is-invalid @enderror"
                                            value="{{ old('sebutan_kabupaten', $pengaturan->sebutan_kabupaten) }}" required>
                                        @error('sebutan_kabupaten')
                                            <div class="invalid-feedback">
                                                {{ 'Kode desa harus diisi' }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row mb-3">
                                    <label for="sebutan_dusun" class="form-label col-md-3">Sebutan Dusun</label>
                                    <div class="col-md-9">
                                        <input type="text" name="sebutan_dusun" id="sebutan_dusun"
                                            class="form-control @error('sebutan_dusun') is-invalid @enderror"
                                            value="{{ old('sebutan_dusun', $pengaturan->sebutan_dusun) }}" required>
                                        @error('sebutan_dusun')
                                            <div class="invalid-feedback">
                                                {{ 'Nama kecamatan harus diisi' }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row mb-3">
                                    <label for="sebutan_kepala_desa" class="form-label col-md-3">Sebutan Kepala Desa</label>
                                    <div class="col-md-9">
                                        <input type="text" name="sebutan_kepala_desa" id="sebutan_kepala_desa"
                                            class="form-control @error('sebutan_kepala_desa	') is-invalid @enderror"
                                            value="{{ old('sebutan_kepala_desa', $pengaturan->sebutan_kepala_desa) }}"
                                            required>
                                        @error('sebutan_kepala_desa')
                                            <div class="invalid-feedback">
                                                {{ 'Nama kecamatan harus diisi' }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row mb-3">
                                    <label for="sebutan_camat" class="form-label col-md-3">Sebutan Camat</label>
                                    <div class="col-md-9">
                                        <input type="text" name="sebutan_camat" id="sebutan_camat"
                                            class="form-control @error('sebutan_camat	') is-invalid @enderror"
                                            value="{{ old('sebutan_camat', $pengaturan->sebutan_camat) }}" required>
                                        @error('sebutan_camat')
                                            <div class="invalid-feedback">
                                                {{ 'Nama kecamatan harus diisi' }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row mb-3">
                                    <label for="sebutan_bupati" class="form-label col-md-3">Sebutan Bupati</label>
                                    <div class="col-md-9">
                                        <input type="text" name="sebutan_bupati" id="sebutan_bupati"
                                            class="form-control @error('sebutan_bupati	') is-invalid @enderror"
                                            value="{{ old('sebutan_bupati', $pengaturan->sebutan_bupati) }}" required>
                                        @error('sebutan_bupati')
                                            <div class="invalid-feedback">
                                                {{ 'Nama kecamatan harus diisi' }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row mb-3">
                                    <label for="sebutan_kepala_dusun" class="form-label col-md-3">Sebutan Kepala
                                        Dusun</label>
                                    <div class="col-md-9">
                                        <input type="text" name="sebutan_kepala_dusun" id="sebutan_kepala_dusun"
                                            class="form-control @error('sebutan_kepala_dusun	') is-invalid @enderror"
                                            value="{{ old('sebutan_kepala_dusun', $pengaturan->sebutan_kepala_dusun) }}"
                                            required>
                                        @error('sebutan_kepala_dusun')
                                            <div class="invalid-feedback">
                                                {{ 'Nama kecamatan harus diisi' }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row mb-3">
                                    <label for="singkatan_desa" class="form-label col-md-3">Singkatan Desa</label>
                                    <div class="col-md-9">
                                        <input type="text" name="singkatan_desa" id="singkatan_desa"
                                            class="form-control @error('singkatan_desa	') is-invalid @enderror"
                                            value="{{ old('singkatan_desa', $pengaturan->singkatan_desa) }}" required>
                                        @error('singkatan_desa')
                                            <div class="invalid-feedback">
                                                {{ 'Nama kecamatan harus diisi' }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row mb-3">
                                    <label for="singkatan_kecamatan" class="form-label col-md-3">Singkatan
                                        Kecamatan</label>
                                    <div class="col-md-9">
                                        <input type="text" name="singkatan_kecamatan" id="singkatan_kecamatan"
                                            class="form-control @error('singkatan_kecamatan	') is-invalid @enderror"
                                            value="{{ old('singkatan_kecamatan', $pengaturan->singkatan_kecamatan) }}"
                                            required>
                                        @error('singkatan_kecamatan')
                                            <div class="invalid-feedback">
                                                {{ 'Nama kecamatan harus diisi' }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row mb-3">
                                    <label for="singkatan_kabupaten" class="form-label col-md-3">Singkatan
                                        Kabupaten</label>
                                    <div class="col-md-9">
                                        <input type="text" name="singkatan_kabupaten" id="singkatan_kabupaten"
                                            class="form-control @error('singkatan_kabupaten	') is-invalid @enderror"
                                            value="{{ old('singkatan_kabupaten', $pengaturan->singkatan_kabupaten) }}"
                                            required>
                                        @error('singkatan_kabupaten')
                                            <div class="invalid-feedback">
                                                {{ 'Nama kecamatan harus diisi' }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row mb-3">
                                    <label for="singkatan_dusun" class="form-label col-md-3">Singkatan Dusun</label>
                                    <div class="col-md-9">
                                        <input type="text" name="singkatan_dusun" id="singkatan_dusun"
                                            class="form-control @error('singkatan_dusun	') is-invalid @enderror"
                                            value="{{ old('singkatan_dusun', $pengaturan->singkatan_dusun) }}" required>
                                        @error('singkatan_dusun')
                                            <div class="invalid-feedback">
                                                {{ 'Nama kecamatan harus diisi' }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row mb-3">
                                    <label for="format_nomor_surat" class="form-label col-md-3">Format Nomor Surat</label>
                                    <div class="col-md-9">
                                        <input type="text" name="format_nomor_surat" id="format_nomor_surat"
                                            class="form-control @error('format_nomor_surat	') is-invalid @enderror"
                                            value="{{ old('format_nomor_surat', $pengaturan->format_nomor_surat) }}"
                                            required>
                                        @error('format_nomor_surat')
                                            <div class="invalid-feedback">
                                                {{ 'Nama kecamatan harus diisi' }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row mb-3">
                                    <label for="title_web" class="form-label col-md-3">Title Website</label>
                                    <div class="col-md-9">
                                        <input type="text" name="title_web" id="title_web"
                                            class="form-control @error('title_web	') is-invalid @enderror"
                                            value="{{ old('title_web', $pengaturan->title_web) }}" required>
                                        @error('title_web')
                                            <div class="invalid-feedback">
                                                {{ 'Nama kecamatan harus diisi' }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row mb-3">
                                    <label for="zona_waktu" class="form-label col-md-3">Zona Waktu</label>
                                    <div class="col-md-6">
                                        <select class="form-control form-select @error('zona_waktu') is-invalid @enderror"
                                            id="zona_waktu" name="zona_waktu">
                                            <option value="1" {{ $pengaturan->zona_waktu == 1 ? 'selected' : '' }}>
                                                Asia/Jakarta
                                            </option>
                                            <option value="2" {{ $pengaturan->zona_waktu == 2 ? 'selected' : '' }}>
                                                Asia/Pontianak
                                            </option>
                                            <option value="3" {{ $pengaturan->zona_waktu == 3 ? 'selected' : '' }}>
                                                Asia/Makassar
                                            </option>
                                            <option value="4" {{ $pengaturan->zona_waktu == 4 ? 'selected' : '' }}>
                                                Asia/Jayapura
                                            </option>
                                        </select>
                                        @error('zona_waktu')
                                            <div class="invalid-feedback">
                                                {{ 'Zona waktu harus dipilih' }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer py-3">
                                <button type="submit" class="btn btn-success btn-sm float-end">Simpan</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('script')
    <script>
        function previewIcon() {
            const icon = document.querySelector('#icon');
            const imgPreview = document.querySelector('.icon-preview');

            const oFReader = new FileReader();
            oFReader.readAsDataURL(icon.files[0]);

            oFReader.onLoad = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }
            const blob = URL.createObjectURL(icon.files[0]);
            imgPreview.src = blob;
        }
    </script>
@endpush
