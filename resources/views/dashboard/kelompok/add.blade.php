<div class="modal fade" id="modalAddKelompok" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal- modal-dialog-centered modal-">
        <div class="modal-content">
            <div class="modal-header bg-warning">
                <h6 class="modal-title" id="staticBackdropLabel">Tambah Kelompok</h6>
            </div>
            <form action="{{ route('kelompok.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-group mb-3">
                        <label for="kelompok_kategori_id" class="form-label">Ketua Kelompok</label>
                        <select id="kelompok_kategori_id" name="kelompok_kategori_id"
                            class="form-control form-select @error('kelompok_kategori_id') is-invalid @enderror">
                            <option value="">-- Pilih Kategori Kelompok -- </option>
                            @foreach ($kategori as $item)
                                @if (old('kelompok_kategori_id') == $item->id)
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
                        @error('kelompok_kategori_id')
                            <div class="invalid-feedback">
                                {{ 'Kategori kelompok harus dipilih' }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="nama" class="form-label">Nama Kelompok</label>
                        <input type="text" name="nama" id="nama"
                            class="form-control @error('nama') is-invalid @enderror" value="{{ old('nama') }}">
                        @error('nama')
                            <div class="invalid-feedback">
                                {{ 'Kategori kelompok harus diisi' }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="kode" class="form-label">Kode Kelompok</label>
                        <input type="text" name="kode" id="kode" class="form-control"
                            value="{{ old('kode') }}">
                    </div>
                    <div class="form-group mb-3">
                        <label for="penduduk_id" class="form-label">Ketua Kelompok</label>
                        <select id="penduduk_id" name="penduduk_id"
                            class="form-control form-select @error('penduduk_id') is-invalid @enderror">
                            <option value="">-- Pilih Ketua Kelompok -- </option>
                            @foreach ($penduduk as $item)
                                @if (old('penduduk_id') == $item->id)
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
                        @error('penduduk_id')
                            <div class="invalid-feedback">
                                {{ 'Nama ketua harus dipilih' }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="deskripsi" class="form-label">Keterangan Kelompok</label>
                        <textarea name="deskripsi" id="deskripsi" cols="30" rows="3" class="form-control">{{ old('deskripsi') }}</textarea>
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
