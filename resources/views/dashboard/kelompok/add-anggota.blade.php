<div class="modal fade" id="modalTambahAnggota" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal- modal-dialog-centered modal-">
        <div class="modal-content">
            <div class="modal-header bg-warning">
                <h6 class="modal-title" id="staticBackdropLabel">Tambah Kategori Kelompok</h6>
            </div>
            <form action="{{ route('anggota.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <input type="hidden" value="{{ old('kelompok_id', $kelompok->id) }}" name="kelompok_id">
                    <div class="form-group mb-3">
                        <label for="penduduk_id" class="form-label">Nama Penduduk</label>
                        <select id="penduduk_id" name="penduduk_id"
                            class="form-control form-select @error('penduduk_id') is-invalid @enderror">
                            <option value="">-- Pilih Penduduk -- </option>
                            @foreach ($anggota as $item)
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
                    </div>
                    <div class="form-group mb-3">
                        <label for="kelompok_jabatan_id" class="form-label">Posisi Keanggotaan</label>
                        <select id="kelompok_jabatan_id" name="kelompok_jabatan_id"
                            class="form-control form-select @error('kelompok_jabatan_id') is-invalid @enderror">
                            <option value="">-- Pilih Posisi Keanggotaan -- </option>
                            @foreach ($jabatan as $item)
                                @if (old('kelompok_jabatan_id') == $item->id)
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
                        @error('kelompok_jabatan_id')
                            <div class="invalid-feedback">
                                {{ 'Posisi keanggotaan harus dipilih' }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="nomor_anggota" class="form-label">Nomor Anggota</label>
                        <input type="text" name="nomor_anggota" id="nomor_anggota" class="form-control"
                            value="{{ old('nomor_anggota') }}">
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
