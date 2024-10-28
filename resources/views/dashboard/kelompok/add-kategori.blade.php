<div class="modal fade" id="modalCreate" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal- modal-dialog-centered modal-">
        <div class="modal-content">
            <div class="modal-header bg-warning">
                <h6 class="modal-title" id="staticBackdropLabel">Tambah Kategori Kelompok</h6>
            </div>
            <form action="{{ route('kelompok-kategori.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-group mb-3">
                        <label for="nama" class="form-label">Kategori Kelompok</label>
                        <input type="text" name="nama" id="nama"
                            class="form-control @error('nama') is-invalid @enderror" value="{{ old('nama') }}">
                        @error('nama')
                            <div class="invalid-feedback">
                                {{ 'Kategori kelompok harus diisi' }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="name" class="form-label">Keterangan Kategori</label>
                        <textarea name="deskripsi" id="deskripsi" cols="30" rows="3" class="form-control">{{ old('deskripsi') }}</textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary btn-sm ml-auto">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
