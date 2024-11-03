<div class="modal fade" id="modal-create-rw" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="modal-form" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-warning">
                <h1 class="modal-title fs-6 font-outfit" id="exampleModalLabel">Tambah RW
                </h1>
            </div>
            <form action="{{ route('rw.store') }}" method="post">
                @csrf
                <div class="modal-body">
                    <div class="form-group mb-3">
                        <label for="dusun_id" class="form-label">{{ $setting->sebutan_dusun }}</label>
                        <select name="dusun_id" id="dusun_id"
                            class="form-control form-select @error('dusun_id') is-invalid @enderror">
                            <option value="">-- Pilih {{ $setting->sebutan_dusun }} --</option>
                            @foreach ($dusun as $item)
                                @if (old('dusun_id') == $item->id)
                                    <option value="{{ $item->id }}" selected>
                                        {{ $setting->sebutan_dusun . ' ' . $item->nama }}
                                    </option>
                                @else
                                    <option value="{{ $item->id }}">
                                        {{ $setting->sebutan_dusun . ' ' . $item->nama }}
                                    </option>
                                @endif
                            @endforeach
                        </select>
                        @error('dusun_id')
                            <div class="invalid-feedback">
                                {{ $setting->sebutan_dusun . ' Provinsi harus diisi' }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="nama" class="form-label">Nomor RW</label>
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
