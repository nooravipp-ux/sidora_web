@extends('layouts.app')
@section('title', 'Fasilitas Olahraga')

@section('additional-css')

@endsection

@section('content')
<!-- ======= Hero Section ======= -->
<section id="hero-fasilitas-olahraga">
    <div class="hero-container-fasilitas-olahraga" data-aos="zoom-in" data-aos-delay="100">
        <div class="container" data-aos="fade-up">
            <div class="section-header">
                <h3 class="section-title">Fasilitas Olahraga</h3>
                <p class="section-description">KABUPATEN BANDUNG</p>
            </div>
        </div>
    </div>
</section>
<div class="container-fluid data-wilayah">
    <div class="row mt-5">
        <div class="col-md-6">
            <figure class="highcharts-figure">
                <div id="container"></div>
            </figure>
        </div>
        <div class="col-md-6">
            <table class="table table-sm table-striped" id="dataTable3" cellspacing="0">
                <thead class="thead-light">
                    <tr>
                        <th>Desa / Kelurahan</th>
                        <th class="text-center">Jumlah</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($dataFasilitas as $df)
                    <tr>
                        <td><a href="{{route('fasilitasOlahraga.detail', ['id' => $df->id])}}" data-toggle="tooltip" data-placement="right" title="Klik Untuk Melihat">{{$df->desa_kelurahan}}</a></td>
                        <td class="text-center">{{$df->jumlah_fasilitas}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@section('additional-js')
<script src="{{asset('admin/vendor/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('admin/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>
<script>
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
                    text: 'Data Fasilitas Olahraga'
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
@endsection