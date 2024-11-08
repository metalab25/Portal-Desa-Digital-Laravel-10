@extends('dashboard.layouts.header')

@section('content')
    <div class="app-content">
        <div class="container-fluid">
            <div class="card rounded-3 mb-3 shadow">
                <div class="card-header">
                    <div class="float-end">
                        <a href="{{ route('idm.fetch') }}" class="btn btn-primary btn-block btn-sm">Fetch Data</a>
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
                                    <?php foreach ($data[0] as $key => $value): ?>
                                    <th>
                                        <?= $key ?>
                                    </th>
                                    <?php endforeach; ?>
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
    <script src="https://cdn.amcharts.com/lib/4/core.js"></script>
    <script src="https://cdn.amcharts.com/lib/4/charts.js"></script>
    <script src="https://cdn.amcharts.com/lib/4/themes/animated.js"></script>

    <script>
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
