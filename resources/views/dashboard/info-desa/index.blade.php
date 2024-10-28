@extends('dashboard.layouts.header')

@section('content')
    <div class="app-content">
        <div class="container-fluid">
            <form action="{{ route('identitas.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-4">
                        <div class="card rounded-3 mb-3">
                            <div class="card-header p-3 py-2">
                                <div class="pt-1">
                                    <p class="text-sm mb-0 text-capitalize font-outfit">Logo {{ $setting->sebutan_desa }}
                                    </p>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="d-flex justify-content-center">
                                    <input type="hidden" name="oldLogo" value="{{ $desa->logo }}">
                                    @if ($desa->logo)
                                        <img src="{{ asset('storage/' . $desa->logo) }}"
                                            class="logo-preview rounded-4 img-fluid d-block mx-auto mb-3">
                                    @else
                                        <img src="{{ asset('/assets/dashboard/img/no-picture.webp') }}"
                                            class="logo-preview rounded-4 img-fluid d-block mx-auto mb-3">
                                    @endif
                                </div>
                                <div class="mb-0">
                                    <input class="form-control @error('logo') is-invalid @enderror" type="file"
                                        name="logo" id="logo" onchange="previewLogo()">
                                    @error('logo')
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
                                    <p class="text-sm mb-0 text-capitalize font-outfit">Informasi
                                        {{ $setting->sebutan_desa }}</p>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="form-group row mb-3">
                                    <label for="nama_desa" class="form-label col-md-3">Nama
                                        {{ $setting->sebutan_desa }}</label>
                                    <div class="col-md-9">
                                        <input type="text" name="nama_desa" id="nama_desa"
                                            class="form-control @error('nama_desa') is-invalid @enderror"
                                            value="{{ old('nama_desa', $desa->nama_desa) }}" required>
                                        @error('nama_desa')
                                            <div class="invalid-feedback">
                                                {{ 'Nama desa harus diisi' }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row mb-3">
                                    <label for="kode_desa" class="form-label col-md-3">Kode
                                        {{ $setting->sebutan_desa }}</label>
                                    <div class="col-md-3">
                                        <input type="number" name="kode_desa" id="kode_desa"
                                            class="form-control @error('kode_desa') is-invalid @enderror"
                                            value="{{ old('kode_desa', $desa->kode_desa) }}" required>
                                        @error('kode_desa')
                                            <div class="invalid-feedback">
                                                {{ 'Kode desa harus diisi' }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row mb-3">
                                    <label for="alamat_kantor" class="form-label col-md-3">Alamat Kantor
                                        {{ $setting->sebutan_desa }}</label>
                                    <div class="col-md-9">
                                        <input type="text" name="alamat_kantor" id="alamat_kantor"
                                            class="form-control @error('alamat_kantor') is-invalid @enderror"
                                            value="{{ old('alamat_kantor', $desa->alamat_kantor) }}" required>
                                        @error('alamat_kantor')
                                            <div class="invalid-feedback">
                                                {{ 'Kode desa harus diisi' }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row mb-3">
                                    <label for="nama_kecamatan" class="form-label col-md-3">Kecamatan</label>
                                    <div class="col-md-6">
                                        <input type="text" name="nama_kecamatan" id="nama_kecamatan"
                                            class="form-control @error('nama_kecamatan') is-invalid @enderror"
                                            value="{{ old('nama_kecamatan', $desa->nama_kecamatan) }}" required>
                                        @error('nama_kecamatan')
                                            <div class="invalid-feedback">
                                                {{ 'Nama kecamatan harus diisi' }}
                                            </div>
                                        @enderror
                                    </div>
                                    <label for="kode_kecamatan" class="form-label col-md-1">Kode</label>
                                    <div class="col-md-2">
                                        <input type="number" name="kode_kecamatan" id="kode_kecamatan"
                                            class="form-control @error('kode_kecamatan') is-invalid @enderror"
                                            value="{{ old('kode_kecamatan', $desa->kode_kecamatan) }}" required>
                                        @error('kode_kecamatan')
                                            <div class="invalid-feedback">
                                                {{ 'Kode kecamatan harus diisi' }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row mb-3">
                                    <label for="nama_kabupaten" class="form-label col-md-3">Kabupaten</label>
                                    <div class="col-md-6">
                                        <input type="text" name="nama_kabupaten" id="nama_kabupaten"
                                            class="form-control @error('nama_kabupaten') is-invalid @enderror"
                                            value="{{ old('nama_kabupaten', $desa->nama_kabupaten) }}" required>
                                        @error('nama_kabupaten')
                                            <div class="invalid-feedback">
                                                {{ 'Nama kabupaten harus diisi' }}
                                            </div>
                                        @enderror
                                    </div>
                                    <label for="kode_kabupaten" class="form-label col-md-1">Kode</label>
                                    <div class="col-md-2">
                                        <input type="number" name="kode_kabupaten" id="kode_kabupaten"
                                            class="form-control @error('kode_kabupaten') is-invalid @enderror"
                                            value="{{ old('kode_kabupaten', $desa->kode_kabupaten) }}" required>
                                        @error('kode_kabupaten')
                                            <div class="invalid-feedback">
                                                {{ 'Kode kabupaten harus diisi' }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row mb-3">
                                    <label for="provinsi_id" class="form-label col-md-3">Provinsi</label>
                                    <div class="col-md-6">
                                        <select class="form-control form-select @error('provinsi_id') is-invalid @enderror"
                                            id="provinsi_id" name="provinsi_id">
                                            <option value="">-- Pilih Provinsi --</option>
                                            @foreach ($provinsi as $item)
                                                @if (old('provinsi_id', $desa->provinsi_id) == $item->id)
                                                    <option value="{{ $item->id }}" selected>
                                                        {{ $item->nama }}
                                                    </option>
                                                @else
                                                    <option value="{{ $item->id }}"> {{ $item->nama }}
                                                    </option>
                                                @endif
                                            @endforeach
                                        </select>
                                        @error('provinsi_id')
                                            <div class="invalid-feedback">
                                                {{ 'Provinsi harus diisi' }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row mb-3">
                                    <label for="kode_pos" class="form-label col-md-3">Kode Pos</label>
                                    <div class="col-md-3">
                                        <input type="number" name="kode_pos" id="kode_pos"
                                            class="form-control @error('kode_pos') is-invalid @enderror"
                                            value="{{ old('kode_pos', $desa->kode_pos) }}" required>
                                        @error('kode_pos')
                                            <div class="invalid-feedback">
                                                {{ 'Kodepos desa harus diisi' }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row mb-3">
                                    <label for="telepon" class="form-label col-md-3">Telepon Kantor
                                        {{ $setting->sebutan_desa }}</label>
                                    <div class="col-md-6">
                                        <input type="number" name="telepon" id="telepon"
                                            class="form-control @error('telepon') is-invalid @enderror"
                                            value="{{ old('telepon', $desa->telepon) }}" required>
                                        @error('telepon')
                                            <div class="invalid-feedback">
                                                {{ 'Kode desa harus diisi' }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row mb-3">
                                    <label for="email_desa" class="form-label col-md-3">Email
                                        {{ $setting->sebutan_desa }}</label>
                                    <div class="col-md-9">
                                        <input type="email" name="email_desa" id="email_desa" class="form-control"
                                            value="{{ old('email', $desa->email_desa) }}">
                                    </div>
                                </div>
                                <div class="form-group row mb-3">
                                    <label for="website" class="form-label col-md-3">Website
                                        {{ $setting->sebutan_desa }}</label>
                                    <div class="col-md-9">
                                        <input type="url" name="website" id="website" class="form-control"
                                            value="{{ old('website', $desa->website) }}">
                                    </div>
                                </div>
                                <div class="form-group row mb-3">
                                    <label for="nama_kepala_desa" class="form-label col-md-3">Kepala
                                        {{ $setting->sebutan_desa }}</label>
                                    <div class="col-md-9">
                                        <input type="text" name="nama_kepala_desa" id="nama_kepala_desa"
                                            class="form-control @error('nama_kepala_desa') is-invalid @enderror"
                                            value="{{ old('nama_kepala_desa', $desa->nama_kepala_desa) }}">
                                        @error('nama_kepala_desa')
                                            <div class="invalid-feedback">
                                                {{ 'Nama kepala desa harus diisi' }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row mb-3">
                                    <label for="nip_kepala_desa" class="form-label col-md-3">NIP
                                        {{ $setting->sebutan_kepala_desa }}</label>
                                    <div class="col-md-9">
                                        <input type="text" name="nip_kepala_desa" id="nip_kepala_desa"
                                            class="form-control"
                                            value="{{ old('nip_kepala_desa', $desa->nip_kepala_desa) }}">
                                    </div>
                                </div>
                                <div class="form-group row mb-3">
                                    <label for="phone_kepala_desa" class="form-label col-md-3">Telepon
                                        {{ $setting->sebutan_kepala_desa }}</label>
                                    <div class="col-md-6">
                                        <input type="number" name="phone_kepala_desa" id="phone_kepala_desa"
                                            class="form-control"
                                            value="{{ old('phone_kepala_desa', $desa->phone_kepala_desa) }}">
                                    </div>
                                </div>
                                <div class="form-group row mb-3">
                                    <label for="nama_kepala_camat" class="form-label col-md-3">Nama Camat</label>
                                    <div class="col-md-9">
                                        <input type="text" name="nama_kepala_camat" id="nama_kepala_camat"
                                            class="form-control @error('nama_kepala_camat') is-invalid @enderror"
                                            value="{{ old('nama_kepala_camat', $desa->nama_kepala_camat) }}">
                                        @error('nama_kepala_camat')
                                            <div class="invalid-feedback">
                                                {{ 'Nama camat harus diisi' }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="nip_kepala_camat" class="form-label col-md-3">NIP Camat</label>
                                    <div class="col-md-9">
                                        <input type="text" name="nip_kepala_camat" id="nip_kepala_camat"
                                            class="form-control"
                                            value="{{ old('nip_kepala_camat', $desa->nip_kepala_camat) }}">
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
        function previewLogo() {
            const logo = document.querySelector('#logo');
            const imgPreview = document.querySelector('.logo-preview');

            const oFReader = new FileReader();
            oFReader.readAsDataURL(logo.files[0]);

            oFReader.onLoad = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }
            const blob = URL.createObjectURL(logo.files[0]);
            imgPreview.src = blob;
        }
    </script>
@endpush
