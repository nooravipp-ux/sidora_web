@extends('layouts.app')
@section('title', 'Potensi Olahraga')

@section('additional-css')
<style>
    table th,
    td {
        font-size: 12px;
    }
</style>
@endsection

@section('content')
<!-- ======= Hero Section ======= -->
<section id="hero-fasilitas-olahraga">
    <div class="hero-container-fasilitas-olahraga" data-aos="zoom-in" data-aos-delay="100">
        <div class="container" data-aos="fade-up">
            <div class="section-header">
                <h3 class="section-title">Data Potensi Keolahragaan</h3>
                <p class="section-description">KABUPATEN BANDUNG</p>
            </div>
        </div>
    </div>
</section>
<div class="container-fluid data-wilayah">
    <div class="row mt-5">
        <div class="col-md-6">
            <figure class="highcharts-figure">
                <div id="container_1"></div>
            </figure>
        </div>
        <div class="col-md-6">
            <table class="table table-sm table-striped" id="dataTable3" cellspacing="0">
                <thead class="thead-light">
                    <tr>
                        <th>Desa / Kelurahan</th>
                        <th class="text-center">Jumlah</th>
                        <th class="text-center">Tahun</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($dataPrestasiAtlet as $dpa)
                    <tr>
                        <td><a href="{{route('potensiOlahraga.prestasiAtlet', ['id' => $dpa->id])}}" data-toggle="tooltip" data-placement="right" title="Klik Untuk Melihat">{{$dpa->desa_kelurahan}}</a></td>
                        <td class="text-center">{{$dpa->jumlah_potensi}}</td>
                        <td class="text-center">{{$dpa->tahun}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="row mt-5">
            <div class="col-md-6">
                <figure class="highcharts-figure">
                    <div id="container_2"></div>
                </figure>
            </div>
            <div class="col-md-6">
                <table class="table table-sm table-striped" id="dataTable2" cellspacing="0">
                    <thead class="thead-light">
                        <tr>
                            <th>Desa / Kelurahan</th>
                            <th class="text-center">Jumlah</th>
                            <th class="text-center">Tahun</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($dataKelompokOlahraga as $dko)
                        <tr>
                            <td><a href="{{route('potensiOlahraga.kegiatanOlahraga', ['id' => $dko->id])}}" data-toggle="tooltip" data-placement="right" title="Klik Untuk Melihat">{{$dko->desa_kelurahan}}</a></td>
                            <td class="text-center">{{$dko->jumlah_klub_olahraga}}</td>
                            <td class="text-center">{{$dko->tahun}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@section('additional-js')
<script src="{{asset('admin/vendor/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('admin/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>
<script>
    $(document).ready(function({}) {
        $('#dataTable1').DataTable({
            lengthChange: false,
            searching: false
        });
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
                    text: 'Data Prestasi Atlet'
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