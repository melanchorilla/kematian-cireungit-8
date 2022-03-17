@extends('layouts.main')

@section('content')
<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Dashboard</h1>

<!-- Content Row -->
<div class="row">

    <!-- Penerimaan bulanan -->
    <div class="col-xl-4 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Penerimaan (Bulanan)</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            @php
                            $penerimaan_bulanan = $laporan['queryBulanan']->penerimaan_bulanan
                            @endphp

                            {{"Rp " . number_format("$penerimaan_bulanan",0,",",".")}}

                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-file-invoice-dollar fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Pengeluaran bulanan -->
    <div class="col-xl-4 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Pengeluaran (Bulanan)</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            @php
                            $pengeluaran_bulanan = $laporan['queryBulanan']->pengeluaran_bulanan
                            @endphp

                            {{"Rp " . number_format("$pengeluaran_bulanan",0,",",".")}}

                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Saldo -->
    <div class="col-xl-4 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Saldo
                        </div>
                        <div class="row no-gutters align-items-center">
                            <div class="col-auto">
                                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                    @php
                                    $saldo = $laporan['querySaldo']->saldo
                                    @endphp

                                    {{"Rp " . number_format("$saldo",0,",",".")}}
                                </div>
                            </div>
                            <!-- <div class="col">
                                    <div class="progress progress-sm mr-2">
                                        <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div> -->
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-money-bill fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>

<!-- Content Row -->
<div class="row">
    
<!-- Area Chart -->
<div class="col-xl-12 col-lg-12">
    <div class="card shadow mb-4">
        <!-- Card Header - Dropdown -->
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Grafik</h6>
        </div>
        <!-- Card Body -->
        <div class="card-body">
            <div class="chart-area" id="chart-area" style="height:450px;">

            </div>
        </div>
    </div>
</div>

</div>
<!-- echarts -->
<script src="{{ asset('assets/echarts/echarts.min.js') }}"></script>

<script>
    var chartDom = document.getElementById('chart-area');
    var myChart = echarts.init(chartDom);
    var option;

    option = {
        title: {
            text: 'Grafik data penerimaan dan pengeluaran',
            subtext: '*dalam 1 tahun'
        },
        tooltip: {
            trigger: 'axis',
            axisPointer: {
                type: 'shadow'
            }
        },
        legend: {
            data: ['Penerimaan', 'Pengeluaran']
        },
        grid: {
            left: '3%',
            right: '4%',
            bottom: '3%',
            containLabel: true
        },
        xAxis: {
            type: 'value',
            boundaryGap: [0, 0.01]
        },
        yAxis: {
            type: 'category',
            data: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember']
        },
        series: [{
                name: 'Penerimaan',
                type: 'bar',
                data: [
                    {{ $laporan['queryJanuari']->penerimaan_januari }}, 
                    {{ $laporan['queryFebruari']->penerimaan_februari }}, 
                    {{ $laporan['queryMaret']->penerimaan_maret }}, 
                    {{ $laporan['queryApril']->penerimaan_april }}, 
                    {{ $laporan['queryMei']->penerimaan_mei }}, 
                    {{ $laporan['queryJuni']->penerimaan_juni }}, 
                    {{ $laporan['queryJuli']->penerimaan_juli }}, 
                    {{ $laporan['queryAgustus']->penerimaan_agustus }}, 
                    {{ $laporan['querySeptember']->penerimaan_september }}, 
                    {{ $laporan['queryOktober']->penerimaan_oktober }}, 
                    {{ $laporan['queryNovember']->penerimaan_november }},
                    {{ $laporan['queryDesember']->penerimaan_desember }}
                ]
            },
            {
                name: 'Pengeluaran',
                type: 'bar',
                data: [
                    {{ $laporan['queryJanuari']->pengeluaran_januari }}, 
                    {{ $laporan['queryFebruari']->pengeluaran_februari }}, 
                    {{ $laporan['queryMaret']->pengeluaran_maret }}, 
                    {{ $laporan['queryApril']->pengeluaran_april }}, 
                    {{ $laporan['queryMei']->pengeluaran_mei }}, 
                    {{ $laporan['queryJuni']->pengeluaran_juni }}, 
                    {{ $laporan['queryJuli']->pengeluaran_juli }}, 
                    {{ $laporan['queryAgustus']->pengeluaran_agustus }}, 
                    {{ $laporan['querySeptember']->pengeluaran_september }}, 
                    {{ $laporan['queryOktober']->pengeluaran_oktober }}, 
                    {{ $laporan['queryNovember']->pengeluaran_november }},
                    {{ $laporan['queryDesember']->pengeluaran_desember }}
                ]
            }
        ]
    };

    option && myChart.setOption(option);
</script>

@endsection