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
                    <div class="row">
                        <div class="col-lg-3 col-6">
                            <div class="small-box text-bg-success rounded-3">
                                <div class="inner p-3">
                                    <h4 class="font-outfit text-bold">{{ $idmSkor[0]['INDIKATOR'] }}</h4>
                                    <h6 class="font-outfit">{{ round($idmSkor[0]['SKOR'], 4) }}</h6>
                                </div>
                                <svg class="small-box-icon" fill="currentColor" viewBox="0 0 17 18"
                                    xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                    <path fill-rule="evenodd"
                                        d="M0 0h1v15h15v1H0zm10 3.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-1 0V4.9l-3.613 4.417a.5.5 0 0 1-.74.037L7.06 6.767l-3.656 5.027a.5.5 0 0 1-.808-.588l4-5.5a.5.5 0 0 1 .758-.06l2.609 2.61L13.445 4H10.5a.5.5 0 0 1-.5-.5" />
                                </svg>
                            </div>
                        </div>
                        <div class="col-lg-3 col-6">
                            <div class="small-box text-bg-primary rounded-3">
                                <div class="inner p-3">
                                    <h4 class="font-outfit text-bold">{{ $idmSkor[1]['INDIKATOR'] }}</h4>
                                    <h6 class="font-outfit">{{ round($idmSkor[1]['SKOR'], 4) }}</h6>
                                </div>
                                <svg class="small-box-icon" fill="currentColor" viewBox="0 0 17 18"
                                    xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                    <path
                                        d="M4 11H2v3h2zm5-4H7v7h2zm5-5v12h-2V2zm-2-1a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1zM6 7a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v7a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1zm-5 4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1z" />
                                </svg>
                            </div>
                        </div>
                        <div class="col-lg-3 col-6">
                            <div class="small-box text-bg-warning rounded-3">
                                <div class="inner p-3">
                                    <h4 class="font-outfit text-bold">{{ $idmSkor[2]['INDIKATOR'] }}</h4>
                                    <h6 class="font-outfit">{{ round($idmSkor[2]['SKOR'], 4) }}</h6>
                                </div>
                                <svg class="small-box-icon" fill="currentColor" viewBox="0 0 17 18"
                                    xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                    <path fill-rule="evenodd"
                                        d="M6 2a.5.5 0 0 1 .47.33L10 12.036l1.53-4.208A.5.5 0 0 1 12 7.5h3.5a.5.5 0 0 1 0 1h-3.15l-1.88 5.17a.5.5 0 0 1-.94 0L6 3.964 4.47 8.171A.5.5 0 0 1 4 8.5H.5a.5.5 0 0 1 0-1h3.15l1.88-5.17A.5.5 0 0 1 6 2" />
                                </svg>
                            </div>
                        </div>
                        <div class="col-lg-3 col-6">
                            <div class="small-box text-bg-danger rounded-3">
                                <div class="inner p-3">
                                    <h4 class="font-outfit text-bold">{{ $idmSkor[3]['INDIKATOR'] }}</h4>
                                    <h6 class="font-outfit">{{ round($idmSkor[3]['SKOR'], 4) }}</h6>
                                </div>
                                <svg class="small-box-icon" fill="currentColor" viewBox="0 0 17 18"
                                    xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                    <path
                                        d="M10 .5a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5.5.5 0 0 1-.5.5.5.5 0 0 0-.5.5V2a.5.5 0 0 0 .5.5h5A.5.5 0 0 0 11 2v-.5a.5.5 0 0 0-.5-.5.5.5 0 0 1-.5-.5" />
                                    <path
                                        d="M4.085 1H3.5A1.5 1.5 0 0 0 2 2.5v12A1.5 1.5 0 0 0 3.5 16h9a1.5 1.5 0 0 0 1.5-1.5v-12A1.5 1.5 0 0 0 12.5 1h-.585q.084.236.085.5V2a1.5 1.5 0 0 1-1.5 1.5h-5A1.5 1.5 0 0 1 4 2v-.5q.001-.264.085-.5M9.98 5.356 11.372 10h.128a.5.5 0 0 1 0 1H11a.5.5 0 0 1-.479-.356l-.94-3.135-1.092 5.096a.5.5 0 0 1-.968.039L6.383 8.85l-.936 1.873A.5.5 0 0 1 5 11h-.5a.5.5 0 0 1 0-1h.191l1.362-2.724a.5.5 0 0 1 .926.08l.94 3.135 1.092-5.096a.5.5 0 0 1 .968-.039Z" />
                                </svg>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <table class="table table-striped">
                                @foreach ($idmSkor as $item)
                                    <tr>
                                        <td>{{ $item['INDIKATOR'] ?? '-' }}</td>
                                        <td>:</td>
                                        <td>
                                            {{ $item['SKOR'] ?? '-' }}
                                        </td>
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
                                    <th class="text-center align-middle bg-secondary text-white text-uppercase">Lainnya
                                    </th>
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
                    location.href = `/statistik/idm?tahun=${year}`)
                .then(data => {
                    if (data.error) {
                        alert(data.error);
                    } else {
                        location.href = `/statistik/idm?tahun=${year}`;
                    }
                })
                .catch(error => {
                    alert('Gagal memuat data');
                });
        }

        am4core.ready(function() {
            am4core.useTheme(am4themes_animated);

            var chart = am4core.create("idm3DPieChart", am4charts.PieChart3D);
            chart.hiddenState.properties.opacity = 0;

            chart.data = @json($idmChart);

            chart.innerRadius = am4core.percent(50);
            chart.depth = 20;

            var series = chart.series.push(new am4charts.PieSeries3D());
            series.dataFields.value = "SKOR";
            series.dataFields.category = "INDIKATOR";
        });
    </script>
@endpush
