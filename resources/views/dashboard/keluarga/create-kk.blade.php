<div class="modal fade" id="modal-create-kk" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="modal-form" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-warning">
                <h1 class="modal-title fs-6 font-outfit" id="exampleModalLabel">Tambah Kartu Keluarga
                </h1>
            </div>
            <form action="{{ route('keluarga.store') }}" method="post">
                @csrf
                <div class="modal-body">
                    <div class="form-group mb-3">
                        <label for="no_kk" class="form-label">Nomor Kartu Keluarga</label>
                        <input type="text" name="no_kk" id="no_kk"
                            class="form-control @error('name') is-invalid @enderror" value="{{ old('no_kk') }}">
                        @error('no_kk')
                            <div class="invalid-feedback">
                                {{ 'Nomor Kartu Keluarga harus diisi' }}
                            </div>
                        @enderror
                    </div>
                    <!-- Combo Box Dusun -->
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group-mb-3">
                                <label for="dusun_id" class="form-label">{{ $setting->sebutan_dusun }}</label>
                                <select id="dusun_id" name="dusun_id"
                                    class="form-control form-select @error('dusun_id') is-invalid @enderror">
                                    <option value="">-- Pilih {{ $setting->sebutan_dusun }} -- </option>
                                    @foreach ($dusuns as $dusun)
                                        @if (old('dusun_id') == $dusun->id)
                                            <option value="{{ $dusun->id }}" selected>
                                                {{ $setting->sebutan_dusun . ' ' . $dusun->nama }}
                                            </option>
                                        @else
                                            <option value="{{ $dusun->id }}">
                                                {{ $setting->sebutan_dusun . ' ' . $dusun->nama }}
                                            </option>
                                        @endif
                                    @endforeach
                                </select>
                                @error('dusun_id')
                                    <div class="invalid-feedback">
                                        {{ 'Nama' . $setting->sebutan_dusun . 'harus dipilih' }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group mb-3">
                                <label for="rw_id" class="form-label">RW</label>
                                <select id="rw_id" name="rw_id"
                                    class="form-control form-select @error('rw_id') is-invalid @enderror" disabled>
                                    <option value="">-- Pilih RW --</option>
                                </select>
                                @error('rw_id')
                                    <div class="invalid-feedback">
                                        {{ 'RW harus dipilih' }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group mb-3">
                                <label for="rt_id" class="form-label">RT</label>
                                <select id="rt_id" name="rt_id"
                                    class="form-control form-select @error('rt_id') is-invalid @enderror" disabled>
                                    <option value="">-- Pilih RT --</option>
                                </select>
                                @error('rt_id')
                                    <div class="invalid-feedback">
                                        {{ 'RT harus dipilih' }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <!-- Alamat -->
                    <div class="form-group">
                        <label for="alamat" class="form-label">Alamat</label>
                        <input type="text" name="alamat" id="alamat" class="form-control"
                            value={{ old('alamat') }}>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger btn-block btn-sm mb-sm-1"
                        data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary btn-block btn-sm">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

@push('script')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            // Ketika Dusun dipilih
            $('#dusun_id').on('change', function() {
                var dusun_id = $(this).val();
                if (dusun_id) {
                    $.ajax({
                        url: '/get-rw/' + dusun_id,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            $('#rw_id').empty();
                            $('#rw_id').append('<option value="">-- Pilih RW --</option>');
                            $.each(data, function(key, value) {
                                $('#rw_id').append('<option value="' + value.id + '">' +
                                    value.nama + '</option>');
                            });
                            $('#rw_id').prop('disabled', false);
                        }
                    });
                } else {
                    $('#rw_id').empty().prop('disabled', true);
                    $('#rt_id').empty().prop('disabled', true);
                }
            });

            // Ketika RW dipilih
            $('#rw_id').on('change', function() {
                var rw_id = $(this).val();
                if (rw_id) {
                    $.ajax({
                        url: '/get-rt/' + rw_id,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            $('#rt_id').empty();
                            $('#rt_id').append('<option value="">-- Pilih RT --</option>');
                            $.each(data, function(key, value) {
                                $('#rt_id').append('<option value="' + value.id + '">' +
                                    value.nama + '</option>');
                            });
                            $('#rt_id').prop('disabled', false);
                        }
                    });
                } else {
                    $('#rt_id').empty().prop('disabled', true);
                }
            });
        });
    </script>
@endpush
