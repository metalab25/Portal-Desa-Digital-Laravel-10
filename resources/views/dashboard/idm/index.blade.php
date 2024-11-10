@extends('dashboard.layouts.header')

@section('content')
    <div class="app-content">
        <div class="container-fluid">
            <div class="card rounded-3 mb-3 shadow">
                <div class="card-header">
                    <div class="float-end">
                        <select name="tahun" id="tahun" class="form-control form-select"
                            onchange="fetchDataByYear(this.value)">
                            <option value="">-- Pilih Tahun --</option>
                            @foreach ($years as $year)
                                <option value="{{ $year }}" {{ $year == $selectedYear ? 'selected' : '' }}>
                                    {{ $year }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <table class="table table-striped">
                                @foreach ($idmSkor as $item)
                                    <tr>
                                        <td>{{ $item['INDIKATOR'] ?? '-' }}</td>
                                        <td>:</td>
                                        <td>{{ $item['SKOR'] ?? '-' }}</td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                        <div class="col-md-6">
                            <div id="idm3DPieChart" style="width: 100%; height: 200px;"></div>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th class="text-center align-middle bg-secondary text-white text-uppercase"
                                        rowspan="2">No.</th>
                                    <th class="text-center align-middle bg-secondary text-white text-uppercase"
                                        rowspan="2">Indikator
                                    </th>
                                    <th class="text-center align-middle bg-secondary text-white text-uppercase"
                                        rowspan="2">Skor</th>
                                    <th class="text-center align-middle bg-secondary text-white text-uppercase"
                                        rowspan="2">Keterangan
                                    </th>
                                    <th class="text-center align-middle bg-secondary text-white text-uppercase"
                                        rowspan="2">Kegiatan
                                    </th>
                                    <th class="text-center align-middle bg-secondary text-white text-uppercase"
                                        rowspan="2">Nilai</th>
                                    <th class="text-center align-middle bg-secondary text-white text-uppercase"
                                        colspan="6">Yang Melaksanakan Kegiatan</th>
                                </tr>
                                <tr>
                                    <th class="text-center align-middle bg-secondary text-white text-uppercase">Pusat</th>
                                    <th class="text-center align-middle bg-secondary text-white text-uppercase">Prov</th>
                                    <th class="text-center align-middle bg-secondary text-white text-uppercase">Kab</th>
                                    <th class="text-center align-middle bg-secondary text-white text-uppercase">Desa</th>
                                    <th class="text-center align-middle bg-secondary text-white text-uppercase">CSR</th>
                                    <th class="text-center align-middle bg-secondary text-white text-uppercase">Lainnya</th>
                                </tr>
                            </thead>
                            <?php foreach ($data as $baris): ?>
                            <tr>
                                <?php foreach ($data[0] as $key => $value): ?>
                                <td class="<?php echo empty($baris['NO']) ? 'bg-light' : ''; ?>" style="padding: 10px 5px">
                                    <?= $baris[$key] ?>
                                </td>
                                <?php endforeach ?>
                            </tr>
                            <?php endforeach ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.amcharts.com/lib/4/core.js"></script>
    <script src="https://cdn.amcharts.com/lib/4/charts.js"></script>
    <script src="https://cdn.amcharts.com/lib/4/themes/animated.js"></script>

    <script>
        $(function() {
            $('body').addClass('sidebar-collapse');
        });

        function fetchDataByYear(year) {
            if (!year) return
            fetch(`/statistik/idm/fetch/${year}`, {
                    headers: {
                        'Accept': 'application/json'
                    }
                })
                .then(
                    response => response.json())
                .then(data => {
                    if (data.error) {
                        alert(data.error);
                    } else {
                        location.href = `/statistik/idm?tahun=${year}`;
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Gagal memuat data');
                });
        }

        am4core.ready(function() {
            // Menggunakan tema animasi
            am4core.useTheme(am4themes_animated);

            // Membuat chart
            var chart = am4core.create("idm3DPieChart", am4charts.PieChart3D);
            chart.hiddenState.properties.opacity = 0; // Grafik muncul dengan animasi

            // Menambahkan data dari PHP
            chart.data = @json($idmChart);

            // Mengatur tampilan chart
            chart.innerRadius = am4core.percent(50);
            chart.depth = 20;

            // Series
            var series = chart.series.push(new am4charts.PieSeries3D());
            series.dataFields.value = "SKOR";
            series.dataFields.category = "INDIKATOR";
        });
    </script>
@endpush
