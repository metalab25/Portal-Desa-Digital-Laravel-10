<div class="modal fade" id="modal-create" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="modal-form" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-warning">
                <h1 class="modal-title fs-6 font-outfit" id="exampleModalLabel">Tambah Klasifikasi Surat</h1>
            </div>
            <form action="{{ route('klasifikasi-surat.store') }}" method="post">
                @csrf
                <div class="modal-body">
                    <div class="form-group mb-2">
                        <label for="kode" class="form-label">Kode</label>
                        <input type="text" name="kode" id="kode"
                            class="form-control @error('kode') is-invalid @enderror" value="{{ old('kode') }}">
                        @error('kode')
                            <div class="invalid-feedback">
                                {{ 'Kode klasifikasi surat harus diisi' }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group mb-2">
                        <label for="nama" class="form-label">Nama Klasifikasi</label>
                        <input type="text" name="nama" id="nama"
                            class="form-control @error('name') is-invalid @enderror" value="{{ old('nama') }}">
                        @error('name')
                            <div class="invalid-feedback">
                                {{ 'Nama klasifikasi surat harus diisi' }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group ">
                        <label for="deskripsi" class="form-label">Uraian Klasifikasi</label>
                        <textarea name="deskripsi" id="deskripsi" cols="30" rows="5" class="form-control">{{ old('deskripsi') }}</textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
