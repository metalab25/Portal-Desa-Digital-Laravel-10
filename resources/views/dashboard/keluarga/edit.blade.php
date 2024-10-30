@extends('dashboard.layouts.header')

@section('content')
    <div class="app-content">
        <div class="container-fluid">
            <div class="card rounded-3">
                <div class="card-header p-3 py-2">
                    <div class="pt-1">
                        <p class="text-sm mb-0 text-capitalize font-weight-bold">Data Kartu Keluarga</p>
                    </div>
                </div>
                <form action="{{ route('keluarga.update', $keluarga->id) }}" method="POST">
                    @method('PUT')
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="no_kk" class="form-label">Nomor Kartu Keluarga</label>
                                    <input type="number" name="no_kk" id="no_kk"
                                        class="form-control @error('name') is-invalid @enderror"
                                        value="{{ old('no_kk', $keluarga->no_kk) }}" readonly>
                                    @error('no_kk')
                                        <div class="invalid-feedback">
                                            {{ 'Nomor Kartu Keluarga harus diisi' }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="penduduk_id" class="form-label">Kepala Keluarga</label>
                                    <select id="penduduk_id" name="penduduk_id"
                                        class="form-control form-select @error('penduduk_id') is-invalid @enderror">
                                        <option value="">-- Pilih Kepala Keluarga -- </option>
                                        @foreach ($kepala_keluarga as $item)
                                            @if (old('penduduk_id', $keluarga->penduduk_id) == $item->id)
                                                <option value="{{ $item->id }}" selected>
                                                    {{ $item->nama . ' - NIK : ' . $item->nik }}
                                                </option>
                                            @else
                                                <option value="{{ $item->id }}">
                                                    {{ $item->nama . ' - NIK : ' . $item->nik }}
                                                </option>
                                            @endif
                                        @endforeach
                                    </select>
                                    @error('penduduk_id')
                                        <div class="invalid-feedback">
                                            {{ 'Kepala keluarga harus dipilih' }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group-mb-3">
                                    <label for="dusun_id" class="form-label">{{ $setting->sebutan_dusun }}</label>
                                    <select id="dusun_id" name="dusun_id" class="form-control" readonly>
                                        <option value="">-- Pilih {{ $setting->sebutan_dusun }} -- </option>
                                        @foreach ($dusuns as $item)
                                            @if (old('dusun_id', $keluarga->dusun_id) == $item->id)
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
                                            {{ 'Nama' . $setting->sebutan_dusun . 'harus dipilih' }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label for="rw_id" class="form-label">RW</label>
                                    <select id="rw_id" name="rw_id" class="form-control" readonly>
                                        <option value="{{ $keluarga->rw_id }}">
                                            {{ $keluarga->rw->nama }}
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label for="rt_id" class="form-label">RT</label>
                                    <select id="rt_id" name="rt_id" class="form-control" readonly>
                                        <option value="{{ $keluarga->rt_id }}">
                                            {{ $keluarga->rt->nama }}
                                        </option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <!-- Alamat -->
                        <div class="form-group">
                            <label for="alamat" class="form-label">Alamat : </label>
                            <input type="text" name="alamat" id="alamat" class="form-control"
                                value="{{ old('alamat', $keluarga->alamat) }}">

                        </div>
                    </div>
                    <div class="card-footer py-3">
                        <a href="{{ route('keluarga.index') }}" class="btn btn-danger btn-block btn-sm mb-sm-1">Batal</a>
                        <button type="submit" class="btn btn-primary btn-block btn-sm float-end">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

{{-- @push('script')
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
@endpush --}}
