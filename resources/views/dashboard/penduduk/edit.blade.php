@extends('dashboard.layouts.header')

@section('content')
    <div class="app-content">
        <div class="container-fluid">
            <form action="{{ route('penduduk.update', $penduduk->id) }}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="card rounded-3 mb-3">
                    <div class="card-header p-3 py-2">
                        <div class="pt-1">
                            <p class="text-sm mb-0 text-capitalize font-weight-bold">Data Kartu Keluarga</p>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="keluarga_id" class="form-label col-md-2">Nomor Kartu Keluarga</label>
                            <div class="col-auto">
                                <select id="keluarga_id" name="keluarga_id"
                                    class="form-control form-select @error('keluarga_id') is-invalid @enderror">
                                    <option value="">-- Pilih Nomor Kartu Keluarga -- </option>
                                    @foreach ($keluarga as $keluarga)
                                        @if (old('keluarga_id', $penduduk->keluarga_id) == $keluarga->id)
                                            @if ($keluarga->penduduk_id == null)
                                                <option value="{{ $keluarga->id }}" selected>
                                                    {{ 'No : ' . $keluarga->no_kk }}
                                                </option>
                                            @else
                                                <option value="{{ $keluarga->id }}" selected>
                                                    {{ 'No : ' . $keluarga->no_kk . ' - ' . $keluarga->penduduk->nama }}
                                                </option>
                                            @endif
                                        @else
                                            @if ($keluarga->penduduk_id == null)
                                                <option value="{{ $keluarga->id }}">
                                                    {{ 'No : ' . $keluarga->no_kk }}
                                                </option>
                                            @else
                                                <option value="{{ $keluarga->id }}">
                                                    {{ 'No : ' . $keluarga->no_kk . ' - ' . $keluarga->penduduk->nama }}
                                                </option>
                                            @endif
                                        @endif
                                    @endforeach
                                </select>
                                @error('keluarga_id')
                                    <div class="invalid-feedback">
                                        {{ 'Nomor Kartu Keluarga harus dipilih' }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <div class="card rounded-3 mb-3">
                            <div class="card-header p-3 py-2">
                                <div class="pt-1">
                                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Foto</p>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="d-flex justify-content-center">
                                    <input type="hidden" name="oldFoto" value="{{ $penduduk->foto }}">
                                    @if ($penduduk->foto)
                                        <img src="{{ asset('storage/' . $penduduk->foto) }}"
                                            class="foto-preview rounded-4 img-fluid d-block mx-auto mb-3">
                                    @else
                                        <img src="{{ asset('assets//dashboard/img/avatar5.png') }}"
                                            class="foto-preview rounded-4 img-fluid d-block mx-auto mb-3">
                                    @endif
                                </div>
                                <div class="mb-0">
                                    <p class="text-center text-xs text-danger mb-2">Maksimal 2MB dengan ukuran 400px x 600px
                                    </p>
                                    <input class="form-control @error('foto') is-invalid @enderror" type="file"
                                        name="foto" id="foto" onchange="previewFoto()">
                                    @error('foto')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="card rounded-3">
                            <div class="card-header p-3 py-2">
                                <div class="pt-1">
                                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Data Personal</p>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group mb-3">
                                            <label for="nik" class="form-label">Nomor Induk Penduduk <span
                                                    class="text-danger text-xs">(Sesuai KTP)</span></label>
                                            <input type="number" name="nik" id="nik"
                                                class="form-control @error('nik') is-invalid @enderror"
                                                value="{{ old('nik', $penduduk->nik) }}"
                                                placeholder="Nomor Induk Penduduk">
                                        </div>
                                        @error('nik')
                                            <div class="invalid-feedback">
                                                {{ 'NIK harus diisi sesuai KTP' }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group mb-3">
                                            <label for="nama" class="form-label">Nama Lengkap <span
                                                    class="text-danger text-xs">(Sesuai KTP)</span></label>
                                            <input type="text" name="nama" id="nama"
                                                class="form-control @error('nama') is-invalid @enderror"
                                                value="{{ old('nama', $penduduk->nama) }}"
                                                placeholder="Nama lengkap sesuai KTP">
                                        </div>
                                        @error('nama')
                                            <div class="invalid-feedback">
                                                {{ 'Nama lengkap harus diisi sesuai KTP' }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col-md-4">
                                        <label for="status_penduduk_id" class="form-label">Status Penduduk</label>
                                        <select id="status_penduduk_id" name="status_penduduk_id"
                                            class="form-control form-select">
                                            <option value="">-- Pilih Status -- </option>
                                            @foreach ($status_penduduk as $item)
                                                @if (old('status_penduduk_id', $penduduk->status_penduduk_id) == $item->id)
                                                    <option value="{{ $item->id }}" selected>
                                                        {{ $item->nama }}
                                                    </option>
                                                @else
                                                    <option value="{{ $item->id }}">
                                                        {{ $item->nama }}
                                                    </option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row mb-3">
                                    <div class="col-md-4">
                                        <label for="jenis_kelamin_id" class="form-label">Jenis Kelamin</label>
                                        <select id="jenis_kelamin_id" name="jenis_kelamin_id"
                                            class="form-control form-select @error('jenis_kelamin_id') is-invalid @enderror">
                                            <option value="">-- Pilih Jenis Kelamin -- </option>
                                            @foreach ($jenis_kelamin as $item)
                                                @if (old('jenis_kelamin_id', $penduduk->jenis_kelamin_id) == $item->id)
                                                    <option value="{{ $item->id }}" selected>
                                                        {{ $item->nama }}
                                                    </option>
                                                @else
                                                    <option value="{{ $item->id }}">
                                                        {{ $item->nama }}
                                                    </option>
                                                @endif
                                            @endforeach
                                        </select>
                                        @error('jenis_kelamin_id')
                                            <div class="invalid-feedback">
                                                {{ 'Jenis kelamin harus dipilih' }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col-md-4">
                                        <label for="hubungan_keluarga_id" class="form-label">Hubungan Dalam Keluarga</label>
                                        <select id="hubungan_keluarga_id" name="hubungan_keluarga_id"
                                            class="form-control form-select @error('hubungan_keluarga_id') is-invalid @enderror">
                                            <option value="">-- Pilih Hubungan Keluarga -- </option>
                                            @foreach ($hubungan_keluarga as $item)
                                                @if (old('hubungan_keluarga_id', $penduduk->hubungan_keluarga_id) == $item->id)
                                                    <option value="{{ $item->id }}" selected>
                                                        {{ $item->nama }}
                                                    </option>
                                                @else
                                                    <option value="{{ $item->id }}">
                                                        {{ $item->nama }}
                                                    </option>
                                                @endif
                                            @endforeach
                                        </select>
                                        @error('hubungan_keluarga_id')
                                            <div class="invalid-feedback">
                                                {{ 'Hubungan harus dipilih' }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col-md-4">
                                        <label for="agama_id" class="form-label">Agama</label>
                                        <select id="agama_id" name="agama_id"
                                            class="form-control form-select @error('agama_id') is-invalid @enderror">
                                            <option value="">-- Pilih Agama -- </option>
                                            @foreach ($agama as $item)
                                                @if (old('agama_id', $penduduk->agama_id) == $item->id)
                                                    <option value="{{ $item->id }}" selected>
                                                        {{ $item->nama }}
                                                    </option>
                                                @else
                                                    <option value="{{ $item->id }}">
                                                        {{ $item->nama }}
                                                    </option>
                                                @endif
                                            @endforeach
                                        </select>
                                        @error('agama_id')
                                            <div class="invalid-feedback">
                                                {{ 'Agama harus dipilih' }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-header mb-2">Data KTP</div>
                                <div class="form-group row mb-3">
                                    <div class="col-md-4">
                                        <label class="form-label">Wajib KTP</label>
                                        <input type="text" class="form-control" value="{{ $penduduk->wajib_ktp }}"
                                            disabled>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="status_ktp_id" class="form-label">Status E-KTP</label>
                                        <select id="status_ktp_id" name="status_ktp_id" class="form-control form-select">
                                            <option value="">-- Pilih Status E-KTP -- </option>
                                            @foreach ($ektp as $item)
                                                @if (old('status_ktp_id', $penduduk->status_ktp_id) == $item->id)
                                                    <option value="{{ $item->id }}" selected>
                                                        {{ $item->nama }}
                                                    </option>
                                                @else
                                                    <option value="{{ $item->id }}">
                                                        {{ $item->nama }}
                                                    </option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="status_rekam_ktp_id" class="form-label">Status Rekam E-KTP</label>
                                        <select id="status_rekam_ktp_id" name="status_rekam_ktp_id"
                                            class="form-control form-select">
                                            <option value="">-- Pilih Status Rekam E-KTP -- </option>
                                            @foreach ($rekam_ektp as $item)
                                                @if (old('status_rekam_ktp_id', $penduduk->status_rekam_ktp_id) == $item->id)
                                                    <option value="{{ $item->id }}" selected>
                                                        {{ $item->nama }}
                                                    </option>
                                                @else
                                                    <option value="{{ $item->id }}">
                                                        {{ $item->nama }}
                                                    </option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-header mb-2">Data Kelahiran</div>
                                <div class="form-group row mb-3">
                                    <div class="col-md-4">
                                        <label for="no_akta_lahir" class="form-label">No Akta Kelahiran</label>
                                        <input type="text" name="no_akta_lahir" id="no_akta_lahir"
                                            class="form-control"
                                            value="{{ old('no_akta_lahir', $penduduk->no_akta_lahir) }}"
                                            placeholder="Nomor Akta Kelahiran">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                                        <input type="text" name="tempat_lahir" id="tempat_lahir"
                                            class="form-control @error('tempat_lahir') is-invalid @enderror"
                                            value="{{ old('tempat_lahir', $penduduk->tempat_lahir) }}"
                                            placeholder="Tempat Lahir">
                                        @error('tempat_lahir')
                                            <div class="invalid-feedback">
                                                {{ 'Tempat lahir harus diisi' }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col-md-4">
                                        <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                                        <input type="date" name="tanggal_lahir" id="tanggal_lahir"
                                            class="form-control @error('tanggal_lahir') is-invalid @enderror"
                                            value="{{ old('tanggal_lahir', $penduduk->tanggal_lahir) }}"
                                            placeholder="Tanggal Lahir">
                                        @error('tanggal_lahir')
                                            <div class="invalid-feedback">
                                                {{ 'Tanggal lahir harus diisi' }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row mb-3">
                                    <div class="col-md-4">
                                        <label for="waktu_lahir" class="form-label">Waktu Kelahiran</label>
                                        <input type="time" name="waktu_lahir" id="waktu_lahir" class="form-control"
                                            value="{{ old('waktu_lahir', $penduduk->waktu_lahir) }}">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="anak_ke" class="form-label">Anak Ke <span
                                                class="text-danger text-xs">(Diisi Angka)</span></label>
                                        <input type="number" name="anak_ke" id="anak_ke" class="form-control"
                                            value="{{ old('anak_ke', $penduduk->anak_ke) }}" placeholder="0">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="jenis_kelahiran_id" class="form-label">Jenis Kelahiran</label>
                                        <select id="jenis_kelahiran_id" name="jenis_kelahiran_id"
                                            class="form-control form-select">
                                            <option value="">-- Pilih Jenis Kelahiran -- </option>
                                            @foreach ($jenis_kelahiran as $item)
                                                @if (old('jenis_kelahiran_id', $penduduk->jenis_kelahiran_id) == $item->id)
                                                    <option value="{{ $item->id }}" selected>
                                                        {{ $item->nama }}
                                                    </option>
                                                @else
                                                    <option value="{{ $item->id }}">
                                                        {{ $item->nama }}
                                                    </option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row mb-3">
                                    <div class="col-md-4">
                                        <label for="berat_lahir" class="form-label">Berat Lahir <span
                                                class="text-danger text-xs">(Kg)</span></label>
                                        <input type="text" name="berat_lahir" id="berat_lahir" class="form-control"
                                            value="{{ old('berat_lahir', $penduduk->berat_lahir) }}"
                                            placeholder="Berat Lahir">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="panjang_lahir" class="form-label">Panjang Lahir <span
                                                class="text-danger text-xs">(Cm)</span></label>
                                        <input type="text" name="panjang_lahir" id="panjang_lahir"
                                            class="form-control"
                                            value="{{ old('panjang_lahir', $penduduk->panjang_lahir) }}"
                                            placeholder="Panjang Lahir">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="penolong_kelahiran_id" class="form-label">Penolong Kelahiran</label>
                                        <select id="penolong_kelahiran_id" name="penolong_kelahiran_id"
                                            class="form-control form-select">
                                            <option value="">-- Pilih Penolong Kelahiran -- </option>
                                            @foreach ($penolong_kelahiran as $item)
                                                @if (old('penolong_kelahiran_id', $penduduk->penolong_kelahiran_id) == $item->id)
                                                    <option value="{{ $item->id }}" selected>
                                                        {{ $item->nama }}
                                                    </option>
                                                @else
                                                    <option value="{{ $item->id }}">
                                                        {{ $item->nama }}
                                                    </option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row mb-3">
                                    <div class="col-md-4">
                                        <label for="tempat_kelahiran_id" class="form-label">Tempat Kelahiran</label>
                                        <select id="tempat_kelahiran_id" name="tempat_kelahiran_id"
                                            class="form-control form-select">
                                            <option value="">-- Pilih Tempat Kelahiran -- </option>
                                            @foreach ($tempat_kelahiran as $item)
                                                @if (old('tempat_kelahiran_id', $penduduk->tempat_kelahiran_id) == $item->id)
                                                    <option value="{{ $item->id }}" selected>
                                                        {{ $item->nama }}
                                                    </option>
                                                @else
                                                    <option value="{{ $item->id }}">
                                                        {{ $item->nama }}
                                                    </option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-header mb-2">Data Pendidikan dan Pekerjaan</div>
                                <div class="form-group row mb-3">
                                    <div class="col-md-4">
                                        <label for="pendidikan_id" class="form-label">Pendidikan Ditempuh</label>
                                        <select id="pendidikan_id" name="pendidikan_id" class="form-control form-select">
                                            <option value="">-- Pilih Pendidikan Ditempuh -- </option>
                                            @foreach ($pendidikan as $item)
                                                @if (old('pendidikan_id', $penduduk->pendidikan_id) == $item->id)
                                                    <option value="{{ $item->id }}" selected>
                                                        {{ $item->nama }}
                                                    </option>
                                                @else
                                                    <option value="{{ $item->id }}">
                                                        {{ $item->nama }}
                                                    </option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="pendidikan_kk_id" class="form-label">Pendidikan Dalam KK</label>
                                        <select id="pendidikan_kk_id" name="pendidikan_kk_id"
                                            class="form-control form-select @error('pendidikan_kk_id') is-invalid @enderror">
                                            <option value="">-- Pilih Pendidikan Dalam KK -- </option>
                                            @foreach ($pendidikan_kk as $item)
                                                @if (old('pendidikan_kk_id', $penduduk->pendidikan_kk_id) == $item->id)
                                                    <option value="{{ $item->id }}" selected>
                                                        {{ $item->nama }}
                                                    </option>
                                                @else
                                                    <option value="{{ $item->id }}">
                                                        {{ $item->nama }}
                                                    </option>
                                                @endif
                                            @endforeach
                                        </select>
                                        @error('pendidikan_kk_id')
                                            <div class="invalid-feedback">
                                                {{ 'Pendidikan harus dipilih' }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col-md-4">
                                        <label for="pekerjaan_id" class="form-label">Pekerjaan</label>
                                        <select id="pekerjaan_id" name="pekerjaan_id"
                                            class="form-control form-select @error('pekerjaan_id') is-invalid @enderror">
                                            <option value="">-- Pilih Pekerjaan -- </option>
                                            @foreach ($pekerjaan as $item)
                                                @if (old('pekerjaan_id', $penduduk->pekerjaan_id) == $item->id)
                                                    <option value="{{ $item->id }}" selected>
                                                        {{ $item->nama }}
                                                    </option>
                                                @else
                                                    <option value="{{ $item->id }}">
                                                        {{ $item->nama }}
                                                    </option>
                                                @endif
                                            @endforeach
                                        </select>
                                        @error('pekerjaan_id')
                                            <div class="invalid-feedback">
                                                {{ 'Pekerjaan harus dipilih' }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-header mb-2">Data Kewarganegaraan</div>
                                <div class="form-group row mb-3">
                                    <div class="col-md-4">
                                        <label for="warga_negara_id" class="form-label">Kewarganegaraan</label>
                                        <select id="warga_negara_id" name="warga_negara_id"
                                            class="form-control form-select @error('warga_negara_id') is-invalid @enderror">
                                            <option value="">-- Pilih Kewarganegaraan -- </option>
                                            @foreach ($warga_negara as $item)
                                                @if (old('warga_negara_id', $penduduk->warga_negara_id) == $item->id)
                                                    <option value="{{ $item->id }}" selected>
                                                        {{ $item->nama }}
                                                    </option>
                                                @else
                                                    <option value="{{ $item->id }}">
                                                        {{ $item->nama }}
                                                    </option>
                                                @endif
                                            @endforeach
                                        </select>
                                        @error('warga_negara_id')
                                            <div class="invalid-feedback">
                                                {{ 'Pekerjaan harus dipilih' }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col-md-4">
                                        <label for="no_paspor" class="form-label">Nomor Paspor</label>
                                        <input type="text" name="no_paspor" id="no_paspor" class="form-control"
                                            value="{{ old('no_paspor', $penduduk->no_paspor) }}"
                                            placeholder="Nomor Paspor">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="tanggal_akhir_paspor" class="form-label">Tanggal Berakhir
                                            Paspor</label>
                                        <input type="date" name="tanggal_akhir_paspor" id="tanggal_akhir_paspor"
                                            class="form-control"
                                            value="{{ old('tanggal_akhir_paspor', $penduduk->tanggal_akhir_paspor) }}">
                                    </div>
                                </div>
                                <div class="form-group row mb-3">
                                    <div class="col-md-4">
                                        <label for="no_kitas" class="form-label">Nomor Kitas/Kitap</label>
                                        <input type="text" name="no_kitas" id="no_kitas" class="form-control"
                                            value="{{ old('no_kitas', $penduduk->no_kitas) }}"
                                            placeholder="Nomor Kitas/Kitap">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="tanggal_akhir_kitas" class="form-label">Tanggal Berakhir
                                            Kitas/Kitap</label>
                                        <input type="date" name="tanggal_akhir_kitas" id="tanggal_akhir_kitas"
                                            class="form-control"
                                            value="{{ old('tanggal_akhir_kitas', $penduduk->tanggal_akhir_kitas) }}">
                                    </div>
                                </div>
                                <div class="form-header mb-2">Data Orang Tua</div>
                                <div class="form-group row mb-3">
                                    <div class="col-md-4">
                                        <label for="nama_ayah" class="form-label">Nama Ayah</label>
                                        <input type="text" name="nama_ayah" id="nama_ayah" class="form-control"
                                            value="{{ old('nama_ayah', $penduduk->nama_ayah) }}"
                                            placeholder="Nama Lengkap Ayah">
                                    </div>
                                    <div class="col-md-8">
                                        <label for="nik_ayah" class="form-label">NIK Ayah</label>
                                        <input type="number" name="nik_ayah" id="nik_ayah" class="form-control"
                                            value="{{ old('nik_ayah', $penduduk->nik_ayah) }}"
                                            placeholder="NIK Lengkap Ayah">
                                    </div>
                                </div>
                                <div class="form-group row mb-3">
                                    <div class="col-md-4">
                                        <label for="nama_ibu" class="form-label">Nama ibu</label>
                                        <input type="text" name="nama_ibu" id="nama_ibu" class="form-control"
                                            value="{{ old('nama_ibu', $penduduk->nama_ibu) }}"
                                            placeholder="Nama Lengkap ibu">
                                    </div>
                                    <div class="col-md-8">
                                        <label for="nik_ibu" class="form-label">NIK Ibu</label>
                                        <input type="number" name="nik_ibu" id="nik_ibu" class="form-control"
                                            value="{{ old('nik_ibu', $penduduk->nik_ibu) }}"
                                            placeholder="NIK Lengkap Ibu">
                                    </div>
                                </div>
                                <div class="form-header mb-2">Data Tambahan</div>
                                <div class="form-group row mb-3">
                                    <div class="col-md-6">
                                        <label for="telepon" class="form-label">Telepon</label>
                                        <input type="number" name="telepon" id="telepon" class="form-control"
                                            value="{{ old('telepon', $penduduk->telepon) }}" placeholder="Nomor telepon">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" name="email" id="email" class="form-control"
                                            value="{{ old('email', $penduduk->email) }}"
                                            placeholder="Alamat surat elektronik">
                                    </div>
                                </div>
                                <div class="form-group row mb-3">
                                    <div class="col-md-6">
                                        <label for="alamat_sekarang" class="form-label">Alamat Sekarang</label>
                                        <input type="text" name="alamat_sekarang" id="alamat_sekarang"
                                            class="form-control"
                                            value="{{ old('alamat_sekarang', $penduduk->alamat_sekarang) }}"
                                            placeholder="Alamat sekarang">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="alamat_sebelumnya" class="form-label">Alamat Sebelumnya</label>
                                        <input type="text" name="alamat_sebelumnya" id="alamat_sebelumnya"
                                            class="form-control"
                                            value="{{ old('alamat_sebelumnya', $penduduk->alamat_sebelumnya) }}"
                                            placeholder="Alamat sebelumnya">
                                    </div>
                                </div>
                                <div class="form-header mb-2">Data Status Perkawinan</div>
                                <div class="form-group row mb-3">
                                    <div class="col-md-4">
                                        <label for="status_kawin_id" class="form-label">Status Perkawinan</label>
                                        <select id="status_kawin_id" name="status_kawin_id"
                                            class="form-control form-select @error('status_kawin_id') is-invalid @enderror">
                                            <option value="">-- Pilih Status Kawin -- </option>
                                            @foreach ($status_kawin as $item)
                                                @if (old('status_kawin_id', $penduduk->status_kawin_id) == $item->id)
                                                    <option value="{{ $item->id }}" selected>
                                                        {{ $item->nama }}
                                                    </option>
                                                @else
                                                    <option value="{{ $item->id }}">
                                                        {{ $item->nama }}
                                                    </option>
                                                @endif
                                            @endforeach
                                        </select>
                                        @error('status_kawin_id')
                                            <div class="invalid-feedback">
                                                {{ 'Status kawin harus dipilih' }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col-md-4">
                                        <label for="no_akta_kawin" class="form-label">Nomor Akta Perkawinan</label>
                                        <input type="text" name="no_akta_kawin" id="no_akta_kawin"
                                            class="form-control"
                                            value="{{ old('no_akta_kawin', $penduduk->no_akta_kawin) }}"
                                            placeholder="Nomor Akta Kawin">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="tanggal_kawin" class="form-label">Tanggal Perkawinan</label>
                                        <input type="date" name="tanggal_kawin" id="tanggal_kawin"
                                            class="form-control"
                                            value="{{ old('tanggal_kawin', $penduduk->tanggal_kawin) }}">
                                    </div>
                                </div>
                                <div class="form-group row mb-3">
                                    <div class="col-md-4">
                                        <label for="no_akta_cerai" class="form-label">Nomor Akta Cerai</label>
                                        <input type="text" name="no_akta_cerai" id="no_akta_cerai"
                                            class="form-control"
                                            value="{{ old('no_akta_cerai', $penduduk->no_akta_cerai) }}"
                                            placeholder="Nomor Akta Cerai">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="tanggal_cerai" class="form-label">Tanggal Cerai</label>
                                        <input type="date" name="tanggal_cerai" id="tanggal_cerai"
                                            class="form-control"
                                            value="{{ old('tanggal_cerai', $penduduk->tanggal_cerai) }}">
                                    </div>
                                </div>
                                <div class="form-header mb-2">Data Kesehatan</div>
                                <div class="form-group row mb-3">
                                    <div class="col-md-4">
                                        <label for="golongan_darah_id" class="form-label">Golongan Darah</label>
                                        <select id="golongan_darah_id" name="golongan_darah_id"
                                            class="form-control form-select @error('golongan_darah_id') is-invalid @enderror">
                                            <option value="">-- Pilih Golongan Darah -- </option>
                                            @foreach ($golongan_darah as $item)
                                                @if (old('golongan_darah_id', $penduduk->golongan_darah_id) == $item->id)
                                                    <option value="{{ $item->id }}" selected>
                                                        {{ $item->nama }}
                                                    </option>
                                                @else
                                                    <option value="{{ $item->id }}">
                                                        {{ $item->nama }}
                                                    </option>
                                                @endif
                                            @endforeach
                                        </select>
                                        @error('golongan_darah_id')
                                            <div class="invalid-feedback">
                                                {{ 'Status kawin harus dipilih' }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col-md-4">
                                        <label for="cacat_id" class="form-label">Cacat</label>
                                        <select id="cacat_id" name="cacat_id" class="form-control form-select">
                                            <option value="">-- Pilih Cacat -- </option>
                                            @foreach ($cacat as $item)
                                                @if (old('cacat_id', $penduduk->cacat_id) == $item->id)
                                                    <option value="{{ $item->id }}" selected>
                                                        {{ $item->nama }}
                                                    </option>
                                                @else
                                                    <option value="{{ $item->id }}">
                                                        {{ $item->nama }}
                                                    </option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="sakit_menahun_id" class="form-label">Sakit Menahun</label>
                                        <select id="sakit_menahun_id" name="sakit_menahun_id"
                                            class="form-control form-select">
                                            <option value="">-- Pilih sakit_menahun -- </option>
                                            @foreach ($sakit_menahun as $item)
                                                @if (old('sakit_menahun_id', $penduduk->sakit_menahun_id) == $item->id)
                                                    <option value="{{ $item->id }}" selected>
                                                        {{ $item->nama }}
                                                    </option>
                                                @else
                                                    <option value="{{ $item->id }}">
                                                        {{ $item->nama }}
                                                    </option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row mb-3">
                                    <div class="col-md-4">
                                        <label for="cara_kb_id" class="form-label">Akseptor KB</label>
                                        <select id="cara_kb_id" name="cara_kb_id" class="form-control form-select">
                                            <option value="">-- Pilih Akseptor KB -- </option>
                                            @foreach ($cara_kb as $item)
                                                @if (old('cara_kb_id', $penduduk->cara_kb_id) == $item->id)
                                                    <option value="{{ $item->id }}" selected>
                                                        {{ $item->nama }}
                                                    </option>
                                                @else
                                                    <option value="{{ $item->id }}">
                                                        {{ $item->nama }}
                                                    </option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="kehamilan_id" class="form-label">Status Kehamilan</label>
                                        <select id="kehamilan_id" name="kehamilan_id" class="form-control form-select">
                                            <option value="">-- Pilih Status Hamil -- </option>
                                            @foreach ($kehamilan as $item)
                                                @if (old('kehamilan_id', $penduduk->kehamilan_id) == $item->id)
                                                    <option value="{{ $item->id }}" selected>
                                                        {{ $item->nama }}
                                                    </option>
                                                @else
                                                    <option value="{{ $item->id }}">
                                                        {{ $item->nama }}
                                                    </option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer py-3">
                                <a href="{{ route('penduduk.index') }}" class="btn btn-danger btn-sm">Batal</a>
                                <button type="submit" class="btn btn-primary btn-sm float-end">Simpan</button>
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
        function previewFoto() {
            const foto = document.querySelector('#foto');
            const imgPreview = document.querySelector('.foto-preview');

            const oFReader = new FileReader();
            oFReader.readAsDataURL(foto.files[0]);

            oFReader.onLoad = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }
            const blob = URL.createObjectURL(foto.files[0]);
            imgPreview.src = blob;
        }
    </script>
@endpush
