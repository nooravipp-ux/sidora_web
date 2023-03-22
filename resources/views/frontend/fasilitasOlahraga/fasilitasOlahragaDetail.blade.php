@extends('layouts.app')
@section('title', 'Fasilitas Olahraga')

<style>
    input[type="text"],
    select.form-control {
        background: transparent;
        border: none;
        border-bottom: 1px solid #E2E6E1;
        -webkit-box-shadow: none;
        box-shadow: none;
        border-radius: 0;
    }

    input[type="text"]:focus,
    select.form-control:focus {
        -webkit-box-shadow: none;
        box-shadow: none;
        border-color: #54CA33;
    }

    .highcharts-figure,
    .highcharts-data-table table {
        min-width: 320px;
        max-width: 800px;
        margin: 1em auto;
    }

    .highcharts-data-table table {
        font-family: Verdana, sans-serif;
        border-collapse: collapse;
        border: 1px solid #ebebeb;
        margin: 10px auto;
        text-align: center;
        width: 100%;
        max-width: 500px;
    }

    .highcharts-data-table caption {
        padding: 1em 0;
        font-size: 1.2em;
        color: #555;
    }

    .highcharts-data-table th {
        font-weight: 600;
        padding: 0.5em;
    }

    .highcharts-data-table td,
    .highcharts-data-table th,
    .highcharts-data-table caption {
        padding: 0.5em;
    }

    .highcharts-data-table thead tr,
    .highcharts-data-table tr:nth-child(even) {
        background: #f8f8f8;
    }

    .highcharts-data-table tr:hover {
        background: #f1f7ff;
    }

    input[type="number"] {
        min-width: 50px;
    }
</style>

@section('content')
<!-- ======= Hero Section ======= -->
<section id="hero-fasilitas-olahraga">
    <div class="hero-container-fasilitas-olahraga" data-aos="zoom-in" data-aos-delay="100">
        <div class="container" data-aos="fade-up">
            <div class="section-header">
                <h3 class="section-title">Fasilitas Olahraga</h3>
                <p class="section-description">Desa / Kelurahan {{$desaKelurahan->desa_kelurahan}}</p>
            </div>
        </div>
    </div>
</section>
<div class="container data-wilayah">
    <div class="row mt-5">
        <div class="col-md-12">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <h5 class="card-title"><b>Data Summary</b></h5>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label for="exampleFormControlInput1" class="col-md-4 pt-2"><b>Desa / Kelurahan </b></label> <label for="exampleFormControlInput1" class="col-md-8 pt-2">: {{$dataInformasiDesa->desa_kelurahan}}</label>
                            </div>
                            <div class="form-group row">
                                <label for="exampleFormControlInput1" class="col-md-4 pt-2"><b>Email Desa</b></label><label for="exampleFormControlInput1" class="col-md-8 pt-2">: {{$dataInformasiDesa->email_desa_kel}}</label>
                            </div>
                            <div class="form-group row">
                                <label for="exampleFormControlInput1" class="col-md-4 pt-2"><b>Website Desa</b></label><label for="exampleFormControlInput1" class="col-md-8 pt-2">: {{$dataInformasiDesa->website_desa_kel}}</label>
                            </div>
                            <div class="form-group row">
                                <label for="exampleFormControlInput1" class="col-md-4 pt-2"><b>Jumlah RT</b></label><label for="exampleFormControlInput1" class="col-md-8 pt-2">: {{$dataInformasiDesa->jumlah_rt}}</label>
                            </div>
                            <div class="form-group row">
                                <label for="exampleFormControlInput1" class="col-md-4 pt-2"><b>Jumlah RW</b></label><label for="exampleFormControlInput1" class="col-md-8 pt-2">: {{$dataInformasiDesa->jumlah_rw}}</label>
                            </div>
                            <div class="form-group row">
                                <label for="exampleFormControlInput1" class="col-md-4 pt-2"><b>Jumlah Penduduk</b></label><label for="exampleFormControlInput1" class="col-md-8 pt-2">: {{$dataInformasiDesa->jumlah_penduduk}}</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <h5 class="card-title"><b>Sumary Data Fasilitas</b></h5>
                            <table class="table table-sm table-striped" id="dataTable3" cellspacing="0">
                                <thead class="thead-light">
                                    <tr>
                                        <th>Nama Fasilitas</th>
                                        <th class="text-center">Jumlah</th>
                                        <th class="text-center">Tahun</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($dataSaranaSummary as $dss)
                                    <tr>
                                        <td>{{$dss->nama_sarana}}</td>
                                        <td class="text-center">{{$dss->jumlah_fasilitas}}</td>
                                        <td class="text-center">{{$dss->tahun}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <h5 class="card-title"><b>Deskripsi</b></h5>
                    @foreach($dataSarana as $data)
                    <div class="row mt-3">
                        <div class="col-md-4">
                            <img src="{{asset('images/pendukung/'.$data->foto_lokasi)}}" width="400" height="300" />
                        </div>
                        <div class="col-md-8">
                            <div class="form-group row">
                                <label for="exampleFormControlInput1" class="col-md-3 col-sm-2 pt-2"><b>Nama Sarana</b></label> <span class="col-md-5 pt-2">: {{$data->nama_sarana}}</span>
                            </div>
                            <div class="form-group row">
                                <label for="exampleFormControlInput1" class="col-md-3 col-sm-2 pt-2"><b>Tipe Sarana</b></label> <span class="col-md-5 pt-2">: {{$data->tipe_sarana}}</span>
                            </div>
                            <div class="form-group row">
                                <label for="exampleFormControlInput1" class="col-md-3 col-sm-2 pt-2"><b>Status Kepemilikan</b></label> <span class="col-md-5 pt-2">: {{$data->status_kepemilikan}}</span>
                            </div>
                            <div class="form-group row">
                                <label for="exampleFormControlInput1" class="col-md-3 col-sm-2 pt-2"><b>Luas Lapang</b></label> <span class="col-md-5 pt-2">: {{$data->luas_lapang}}</span>
                            </div>
                            <div class="form-group row">
                                <label for="exampleFormControlInput1" class="col-md-3 col-sm-2 pt-2"><b>Kondisi Lapang</b></label> <span class="col-md-5 pt-2">: {{$data->kondisi_lapang}}</span>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <h5 class="card-title"><b>Data Prasarana</b></h5>
                    <div class="col-md-8">
                        <table class="table table-sm table-striped" id="dataTable3" cellspacing="0">
                            <thead class="thead-light">
                                <tr>
                                    <th>Nama Prasarana</th>
                                    <th class="text-center">Jumlah</th>
                                    <th class="text-center">Penerima</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($dataPrasarana as $dp)
                                <tr>
                                    <td>{{$dp->nama_prasarana}}</td>
                                    <td class="text-center">{{$dp->jumlah}}</td>
                                    <td class="text-center">{{$dp->penerima_hibah}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
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
        $('#dataTable3').DataTable({
            searching: false,
            paging: false,
            info: false
        });
    });
</script>


@endsection