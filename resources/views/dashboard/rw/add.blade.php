<div class="modal fade" id="modal-add-rw" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="modal-form" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-warning">
                <h1 class="modal-title fs-5 font-outfit" id="exampleModalLabel">Tambah Rukun Warga
                </h1>
            </div>
            <form action="{{ route('rw.store') }}" method="post">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <input type="hidden" name="dusun_id" value="{{ $dusun->id }}">
                        <label for="nama" class="form-label">Nomor Rukun Warga</label>
                        <input type="text" name="nama" id="nama"
                            class="form-control @error('nama') is-invalid @enderror">
                        @error('nama')
                            <div class="invalid-feedback">
                                {{ 'Nomor RW harus diisi' }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
