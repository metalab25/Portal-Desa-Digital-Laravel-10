<div class="modal fade" id="modalTambaPenerima" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal- modal-dialog-centered modal-">
        <div class="modal-content">
            <div class="modal-header bg-warning">
                <h6 class="modal-title" id="staticBackdropLabel">Tambah Penerima Program Bantuan</h6>
            </div>
            <form action="{{ route('penerima.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <input type="hidden" value="{{ old('bantuan_id', $bantuan->id) }}" name="bantuan_id">
                    <input type="hidden" value="{{ old('bantuan_sasaran_id', $bantuan->bantuan_sasaran_id) }}"
                        name="bantuan_sasaran_id">
                    <div class="form-group">
                        @if ($bantuan->bantuan_sasaran_id == 1)
                            <label for="penduduk_id" class="form-label">Nama Penduduk</label>
                            <select id="penduduk_id" name="penduduk_id"
                                class="form-control form-control-sm form-select @error('penduduk_id') is-invalid @enderror">
                                <option value="">-- Pilih Penduduk -- </option>
                                @foreach ($penduduk as $item)
                                    @if (old('penduduk_id') == $item->id)
                                        <option value="{{ $item->id }}" selected>
                                            {{ 'NIK :' . $item->nik . ' - ' . $item->nama }}
                                        </option>
                                    @else
                                        <option value="{{ $item->id }}">
                                            {{ 'NIK :' . $item->nik . ' - ' . $item->nama }}
                                        </option>
                                    @endif
                                @endforeach
                            </select>
                            @error('penduduk_id')
                                <div class="invalid-feedback">
                                    {{ 'Penduduk harus dipilih' }}
                                </div>
                            @enderror
                        @elseif($bantuan->bantuan_sasaran_id == 2)
                            <label for="keluarga_id" class="form-label">Nama Keluarga</label>
                            <select id="keluarga_id" name="keluarga_id"
                                class="form-control form-control-sm form-select @error('keluarga_id') is-invalid @enderror">
                                <option value="">-- Pilih Keluarga -- </option>
                                @foreach ($keluarga as $item)
                                    @if (old('keluarga_id') == $item->id)
                                        <option value="{{ $item->id }}" selected>
                                            {{ 'NO KK : ' . $item->no_kk . ' - ' . $item->penduduk->nama }}
                                        </option>
                                    @else
                                        <option value="{{ $item->id }}">
                                            {{ 'NO KK : ' . $item->no_kk . ' - ' . $item->penduduk->nama }}
                                        </option>
                                    @endif
                                @endforeach
                            </select>
                            @error('keluarga_id')
                                <div class="invalid-feedback">
                                    {{ 'Keluarga harus dipilih' }}
                                </div>
                            @enderror
                        @elseif($bantuan->bantuan_sasaran_id == 3)
                            <label for="kelompok_id" class="form-label">Nama Kelompok</label>
                            <select id="kelompok_id" name="kelompok_id"
                                class="form-control form-control-sm form-select @error('kelompok_id') is-invalid @enderror">
                                <option value="">-- Pilih Penduduk -- </option>
                                @foreach ($kelompok as $item)
                                    @if (old('kelompok_id') == $item->id)
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
                            @error('kelompok_id')
                                <div class="invalid-feedback">
                                    {{ 'Kelompok harus dipilih' }}
                                </div>
                            @enderror
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="no_kartu" class="form-label">Nomor Kartu Bantuan</label>
                        <input type="text" name="no_kartu" id="no_kartu" class="form-control form-control-sm"
                            value="{{ old('no_kartu') }}">
                    </div>
                    <div class="form-group">
                        <label for="nama_kartu" class="form-label">Nama Penerima</label>
                        <input type="text" name="nama_kartu" id="nama_kartu" class="form-control form-control-sm"
                            value="{{ old('nama_kartu') }}">
                    </div>
                    <div class="form-group">
                        <label for="nik_kartu" class="form-label">NIK Penerima</label>
                        <input type="number" name="nik_kartu" id="nik_kartu" class="form-control form-control-sm"
                            value="{{ old('nik_kartu') }}">
                    </div>
                    <div class="form-group">
                        <label for="tempat_lahir_kartu" class="form-label">Tempat Lahir Penerima</label>
                        <input type="text" name="tempat_lahir_kartu" id="tempat_lahir_kartu"
                            class="form-control form-control-sm" value="{{ old('tempat_lahir_kartu') }}">
                    </div>
                    <div class="form-group">
                        <label for="tanggal_lahir_kartu" class="form-label">Tanggal Lahir Penerima</label>
                        <input type="date" name="tanggal_lahir_kartu" id="tanggal_lahir_kartu"
                            class="form-control form-control-sm" value="{{ old('tanggal_lahir_kartu') }}">
                    </div>
                    <div class="form-group">
                        <label for="alamat_kartu" class="form-label">Alamat Penerima</label>
                        <textarea name="alamat_kartu" id="alamat_kartu" cols="30" rows="3" class="form-control form-control-sm">{{ old('alamat_kartu') }}</textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger btn-block btn-sm mb-sm-1"
                        data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary btn-block btn-sm ml-auto">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
