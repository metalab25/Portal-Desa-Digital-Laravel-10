<div class="modal fade" id="modal-create-III" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="modal-form" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-warning">
                <h1 class="modal-title fs-6 font-outfit" id="exampleModalLabel">Tambah Sumber Kode III</h1>
            </div>
            <form action="{{ route('sumber-dana.index') }}" method="post">
                @csrf
                <input type="hidden" name="tipe" value="3">
                <div class="modal-body">
                    <div class="form-group mb-2">
                        <label for="parent" class="form-label">Kode I</label>
                        <select class="form-control form-select @error('parent') is-invalid @enderror" id="parent"
                            name="parent">
                            <option value="">-- Pilih Kode III Turunan --</option>
                            @foreach ($kodeII as $item)
                                @if (old('parent') == $item->id)
                                    <option value="{{ $item->id }}" selected>
                                        {{ $item->kode . '. ' . $item->nama }}
                                    </option>
                                @else
                                    <option value="{{ $item->id }}"> {{ $item->kode . '. ' . $item->nama }}
                                    </option>
                                @endif
                            @endforeach
                        </select>
                        @error('parent')
                            <div class="invalid-feedback">
                                {{ 'Kode II harus diisi' }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group row">
                        <div class="col-md-3">
                            <label for="kode" class="form-label">Kode</label>
                            <input type="text" name="kode" id="kode"
                                class="form-control @error('kode') is-invalid @enderror" value="{{ old('kode') }}">
                            @error('kode')
                                <div class="invalid-feedback">
                                    {{ 'Kode sumber dana harus diisi' }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-9">
                            <label for="nama" class="form-label">Nama Sumber Dana</label>
                            <input type="text" name="nama" id="nama"
                                class="form-control @error('nama') is-invalid @enderror" value="{{ old('nama') }}">
                            @error('nama')
                                <div class="invalid-feedback">
                                    {{ 'Nama sumber dana harus diisi' }}
                                </div>
                            @enderror
                        </div>
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
