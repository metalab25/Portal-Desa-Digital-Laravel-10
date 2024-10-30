@extends('dashboard.layouts.header')

@section('content')
    <div class="app-content">
        <div class="container-fluid">
            <form action="{{ route('pemerintah.update', $pamong->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-4">
                        <div class="card rounded-3 mb-3">
                            <div class="card-header p-3 py-2">
                                <div class="pt-1">
                                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Foto</p>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="d-flex justify-content-center">
                                    <input type="hidden" name="oldFoto" value="{{ $pamong->foto }}">
                                    @if ($pamong->foto)
                                        <img src="{{ asset('storage/' . $pamong->foto) }}"
                                            class="foto-preview rounded-4 img-fluid d-block mx-auto mb-3">
                                    @else
                                        <img src="{{ asset('/assets/dashboard/img/no-picture.webp') }}"
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
                    <div class="col-md-8">
                        <div class="card rounded-3 mb-3">
                            <div class="card-header p-3 py-2">
                                <div class="pt-1">
                                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Ambil Data Dari Penduduk</p>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="penduduk_id" class="form-label col-md-2 pt-2">Penduduk</label>
                                    <div class="col-md-10">
                                        <select id="penduduk_id" name="penduduk_id" class="form-control form-select">
                                            <option value="">-- Pilih Penduduk -- </option>
                                            @foreach ($penduduk as $item)
                                                @if (old('penduduk_id', $pamong->penduduk_id) == $item->id)
                                                    <option value="{{ $item->id }}" selected>
                                                        {{ $item->nama . ' - NIK : ' . $item->nik }}
                                                    </option>
                                                @else
                                                    <option value="{{ $item->id }}">
                                                        {{ $item->nama . ' - NIK : ' . $item->nik }}
                                                    </option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card rounded-3 mb-3">
                            <div class="card-header p-3 py-2">
                                <div class="pt-1">
                                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Biodata</p>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="form-group row mb-3">
                                    <label for="jabatan_id" class="form-label col-md-2 pt-2">Jabatan</label>
                                    <div class="col-md-10">
                                        <select id="jabatan_id" name="jabatan_id" class="form-control form-select">
                                            <option value="">-- Pilih Jabatan -- </option>
                                            @foreach ($jabatans as $item)
                                                @if (old('jabatan_id', $pamong->jabatan_id) == $item->id)
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
                                        @error('jabatan')
                                            <div class="invalid-feedback">
                                                {{ 'Jabatan harus dipilih' }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row mb-3">
                                    <label for="nip" class="form-label col-md-2 pt-2">NIP/NIAP</label>
                                    <div class="col-md-10">
                                        <input type="text" name="nip" id="nip" class="form-control"
                                            value="{{ old('nip', $pamong->nip) }}" placeholder="Tuliskan NIP/NIAP">
                                    </div>
                                </div>
                                <div class="form-group row mb-3">
                                    <label for="no_sk" class="form-label col-md-2 pt-2">Nomor SK</label>
                                    <div class="col-md-10">
                                        <input type="text" name="no_sk" id="no_sk" class="form-control"
                                            value="{{ old('no_sk', $pamong->no_sk) }}"
                                            placeholder="Tuliskan Nomor SK Pengangkatan">
                                    </div>
                                </div>
                                <div class="form-group row mb-3">
                                    <label for="tgl_sk" class="form-label col-md-2 pt-2">Tanggal SK</label>
                                    <div class="col-md-10">
                                        <input type="date" name="tgl_sk" id="tgl_sk" class="form-control"
                                            value="{{ old('tgl_sk', $pamong->tgl_sk) }}">
                                    </div>
                                </div>
                                <div class="form-group row mb-3">
                                    <label for="masa_jabatan" class="form-label col-md-2 pt-2">Masa Jabatan</label>
                                    <div class="col-md-10">
                                        <input type="text" name="masa_jabatan" id="masa_jabatan" class="form-control"
                                            value="{{ old(', $pamong->no_sk', $pamong->masa_jabatan) }}"
                                            placeholder="Tuliskan masa jabatan sejak tahun sampai dengan tahun">
                                    </div>
                                </div>
                                <div class="form-group row mb-3">
                                    <label for="nama" class="form-label col-md-2 pt-2">Nama Lengkap</label>
                                    <div class="col-md-6">
                                        <input type="text" name="nama" id="nama" class="form-control"
                                            value="{{ old('nama', $pamong->nama) }}" placeholder="Nama Lengkap Pejabat">
                                    </div>
                                    <div class="col-md-4">
                                        <div class="text-xs text-danger pt-2">Diisi apabila bukan penduduk {{ $setting->sebutan_desa }}</div>
                                    </div>
                                </div>
                                <div class="form-group row mb-3">
                                    <label for="nik" class="form-label col-md-2 pt-2">NIK Pejabat</label>
                                    <div class="col-md-6">
                                        <input type="text" name="nik" id="nik" class="form-control"
                                            value="{{ old('nik', $pamong->nik) }}" placeholder="NIK Pejabat">
                                    </div>
                                    <div class="col-md-4">
                                      <div class="text-xs text-danger pt-2">Diisi apabila bukan penduduk {{ $setting->sebutan_desa }}</div>
                                    </div>
                                </div>
                                <div class="form-group row mb-3">
                                    <label for="pendidikan_kk_id" class="form-label col-md-2 pt-2">Pendidikan</label>
                                    <div class="col-md-6">
                                        <select id="pendidikan_kk_id" name="pendidikan_kk_id"
                                            class="form-control form-select">
                                            <option value="">-- Pilih Pendidikan -- </option>
                                            @foreach ($pendidikan_kk as $item)
                                                @if (old('pendidikan_kk_id', $pamong->pendidikan_kk_id) == $item->id)
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
                                        <div class="text-xs text-danger pt-2">Diisi apabila bukan penduduk {{ $setting->sebutan_desa }}</div>
                                    </div>
                                </div>
                                <div class="form-group row mb-3">
                                    <label for="tempat_lahir" class="form-label col-md-2 pt-2">Tempat Lahir</label>
                                    <div class="col-md-6">
                                        <input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control"
                                            value="{{ old('tempat_lahir', $pamong->tempat_lahir) }}"
                                            placeholder="Tuliskan Tempat Lahir">
                                    </div>
                                    <div class="col-md-4">
                                          <div class="text-xs text-danger pt-2">Diisi apabila bukan penduduk  {{ $setting->sebutan_desa }}</div>
                                    </div>
                                </div>
                                <div class="form-group row mb-3">
                                    <label for="tanggal_lahir" class="form-label col-md-2 pt-2">Tanggal Lahir</label>
                                    <div class="col-md-6">
                                        <input type="date" name="tanggal_lahir" id="tanggal_lahir"
                                            class="form-control"
                                            value="{{ old('tanggal_lahir', $pamong->tanggal_lahir) }}">
                                    </div>
                                    <div class="col-md-4">
                                          <div class="text-xs text-danger pt-2">Diisi apabila bukan penduduk {{ $setting->sebutan_desa }}</div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer py-3">
                                <a href="{{ route('pemerintah.index') }}"
                                    class="btn btn-danger btn-block btn-sm mb-sm-2">Batal</a>
                                <button type="submit" class="btn btn-primary btn-sm btn-block float-end">Simpan</button>
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
