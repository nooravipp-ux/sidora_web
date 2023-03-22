@extends('layouts.master')

@section('title', 'Dashboard')

@section('additional-css')
<link href="{{asset('admin/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">

<style>
    table th,
    td {
        font-size: 12px;
    }
</style>
@endsection

@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h4 mb-0 text-gray-800">Summary Data Keolahragaan</h1>
    </div>
    <div class="row">
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-4 col-md-4 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Total Fasilitas Olahraga</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$jmlFasilitasOlahraga}}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-4 col-md-4 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Total Kelompok Olahraga</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$jmlKelompokOlahraga}}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-4 col-md-4 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Total Potensi Atlet
                            </div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{$jmlPotensiAtlet}}</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <h5 class="card-title">Fasilitas Olahraga</h5>
                    <table class="table table-sm table-striped" id="dataTable1" cellspacing="0">
                        <thead class="thead-light">
                            <tr>
                                <th>Desa / Kelurahan</th>
                                <th class="text-center">Jumlah Fasilitas</th>
                                <th>Tahun</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($dataFasilitas as $df)
                            <tr>
                                <td>{{$df->desa_kelurahan}}</td>
                                <td class="text-center">{{$df->jumlah_fasilitas}}</td>
                                <td class="text-center">{{$df->tahun}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <figure class="highcharts-figure">
                        <div id="container"></div>
                    </figure>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <h5 class="card-title">Kelompok Olahraga</h5>
                    <table class="table table-sm table-striped" id="dataTable2" cellspacing="0">
                        <thead class="thead-light">
                            <tr>
                                <th>Desa / Kelurahan</th>
                                <th class="text-center">Jumlah</th>
                                <th>tahun</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($dataKelompokOlahraga as $dkk)
                            <tr>
                                <td>{{$dkk->desa_kelurahan}}</td>
                                <td class="text-center">{{$dkk->jumlah_klub_olahraga}}</td>
                                <td class="text-center">{{$dkk->tahun}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <figure class="highcharts-figure">
                        <div id="container_2"></div>
                    </figure>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <h5 class="card-title">Potensi Atlet</h5>
                    <table class="table table-sm table-striped" id="dataTable3" cellspacing="0">
                        <thead class="thead-light">
                            <tr>
                                <th>Desa / Kelurahan</th>
                                <th class="text-center">Jumlah</th>
                                <th>Tahun</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($dataPrestasiAtlet as $dpa)
                            <tr>
                                <td>{{$dpa->desa_kelurahan}}</td>
                                <td class="text-center">{{$dpa->jumlah_potensi}}</td>
                                <td class="text-center">{{$dpa->tahun}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <figure class="highcharts-figure">
                        <div id="container_1"></div>
                    </figure>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection

@section('additional-js')
<!-- Page level plugins -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('myChart').getContext('2d');
    const myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
            datasets: [{
                label: '# of Votes',
                data: [12, 19, 3, 5, 2, 3],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>

<!-- Page level custom scripts -->

<script src="{{asset('admin/vendor/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('admin/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>
<script>
    $(document).ready(function() {
        $('#dataTable1').DataTable();
    });

    $(document).ready(function() {
        $('#dataTable2').DataTable();
    });

    $(document).ready(function() {
        $('#dataTable3').DataTable();
    });
</script>

<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
<script>
    $.ajax({
        type: "GET",
        url: "/get-data-sumary-sarana",
        data: {
            'desa_kelurahan_id': 97,
        },
        success: function(data) {
            data_fasilitas = data.data
            console.log(eval())
            Highcharts.chart('container', {
                chart: {
                    plotBackgroundColor: null,
                    plotBorderWidth: null,
                    plotShadow: false,
                    type: 'pie'
                },
                title: {
                    text: 'Data Fasilitas Olahraga Per Kecamatan'
                },
                tooltip: {
                    pointFormat: '{point.name}: <b>{point.y}</b>'
                },
                accessibility: {
                    point: {
                        valueSuffix: '%'
                    }
                },
                plotOptions: {
                    pie: {
                        allowPointSelect: true,
                        cursor: 'pointer',
                        dataLabels: {
                            enabled: true,
                            format: '<b>{point.name}</b>: {point.y}'
                        }
                    }
                },
                series: [{
                    name: 'Brands',
                    colorByPoint: true,
                    data: JSON.parse(data_fasilitas)
                }]
            });
        }
    });
</script>

<script>
    $.ajax({
        type: "GET",
        url: "/get-data-sumary-prestasi-atlet",
        data: {
            'desa_kelurahan_id': 97,
        },
        success: function(data) {
            data_potensi = data.data
            console.log(eval())
            Highcharts.chart('container_1', {
                chart: {
                    plotBackgroundColor: null,
                    plotBorderWidth: null,
                    plotShadow: false,
                    type: 'pie'
                },
                title: {
                    text: 'Data Potensi Atlet Per Kecamatan'
                },
                tooltip: {
                    pointFormat: '{point.name}: <b>{point.y}</b>'
                },
                accessibility: {
                    point: {
                        valueSuffix: '%'
                    }
                },
                plotOptions: {
                    pie: {
                        allowPointSelect: true,
                        cursor: 'pointer',
                        dataLabels: {
                            enabled: true,
                            format: '<b>{point.name}</b>: {point.y}'
                        }
                    }
                },
                series: [{
                    name: 'Brands',
                    colorByPoint: true,
                    data: JSON.parse(data_potensi)
                }]
            });
        }
    });
</script>

<script>
    $.ajax({
        type: "GET",
        url: "/get-data-sumary-kelompok-olahraga",
        data: {
            'desa_kelurahan_id': 97,
        },
        success: function(data) {
            data_kelompok_olahraga = data.data
            console.log(eval())
            Highcharts.chart('container_2', {
                chart: {
                    plotBackgroundColor: null,
                    plotBorderWidth: null,
                    plotShadow: false,
                    type: 'pie'
                },
                title: {
                    text: 'Data Kelompok Olahraga Per Kecamatan'
                },
                tooltip: {
                    pointFormat: '{point.name}: <b>{point.y}</b>'
                },
                accessibility: {
                    point: {
                        valueSuffix: '%'
                    }
                },
                plotOptions: {
                    pie: {
                        allowPointSelect: true,
                        cursor: 'pointer',
                        dataLabels: {
                            enabled: true,
                            format: '<b>{point.name}</b>: {point.y}'
                        }
                    }
                },
                series: [{
                    name: 'Brands',
                    colorByPoint: true,
                    data: JSON.parse(data_kelompok_olahraga)
                }]
            });
        }
    });
</script>

@endsection