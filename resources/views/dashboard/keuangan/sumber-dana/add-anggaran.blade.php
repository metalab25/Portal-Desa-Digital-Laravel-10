<div class="modal fade" id="modal-create-anggaran" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="modal-form" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-warning">
                <h1 class="modal-title fs-6 font-outfit" id="exampleModalLabel">Tambah Anggaran</h1>
            </div>
            <form action="{{ route('sumber-dana.add-anggaran') }}" method="post">
                @csrf
                <input type="hidden" name="tipe" value="1">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="id" class="form-label">Tambah Anggaran Ke</label>
                        <select name="id" id="id"
                            class="form-control form-select @error('id') is-invalid @enderror">
                            <option value=""> -- Pilih Kategori Keuangan</option>
                            @foreach ($sumber as $item)
                                @if (old('id') == $item->id)
                                    <option value="{{ $item->id }}" selected>
                                        {{ $item->kode . '. ' . $item->nama }}
                                    </option>
                                @else
                                    <option value="{{ $item->id }}"> {{ $item->kode . '. ' . $item->nama }}
                                    </option>
                                @endif
                            @endforeach
                        </select>
                        @error('kode')
                            <div class="invalid-feedback">
                                {{ 'kategori sumber dana harus diisi' }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="nilai_anggaran" class="form-label">Nilai Anggaran</label>
                        <input type="number" name="nilai_anggaran" id="nilai_anggaran"
                            class="form-control @error('nilai_anggaran') is-invalid @enderror">
                        @error('nilai_anggaran')
                            <div class="invalid-feedback">
                                {{ 'Nilai anggaran sumber dana harus diisi' }}
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
