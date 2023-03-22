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
</style>

@section('content')
<!-- ======= Hero Section ======= -->
<section id="hero-fasilitas-olahraga">
    <div class="hero-container-fasilitas-olahraga" data-aos="zoom-in" data-aos-delay="100">
        <div class="container" data-aos="fade-up">
            <div class="section-header">
                <h3 class="section-title">Prestasi Atlet</h3>
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
                            <table class="table table-sm table-striped" id="dataTable3" cellspacing="0">
                                <thead class="thead-light">
                                    <tr>
                                        <th>Nama Atlet</th>
                                        <th>Jenis Potensi</th>
                                        <th>Cabang Olahraga</th>
                                        <th>tingkat Prestasi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($dataPrestasi as $dp)
                                    <tr>
                                        <td>{{$dp->nama}}</td>
                                        <td>{{$dp->jenis_potensi}}</td>
                                        <td>{{$dp->nama_cabang_olahraga}}</td>
                                        <td>{{$dp->tingkat_prestasi}}</td>
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
                    @foreach($dataPrestasi as $data)
                    <div class="row mt-3">
                        <div class="col-md-4">
                            <img src="{{asset('images/pendukung/'.$data->foto)}}" width="400" height="300" />
                        </div>
                        <div class="col-md-8">
                            <div class="form-group row">
                                <label for="exampleFormControlInput1" class="col-md-3 col-sm-2 pt-2"><b>Nama Atlet</b></label> <span class="col-md-5 pt-2">: {{$data->nama}}</span>
                            </div>
                            <div class="form-group row">
                                <label for="exampleFormControlInput1" class="col-md-3 col-sm-2 pt-2"><b>Tempat Tanggal Lahir</b></label> <span class="col-md-5 pt-2">: {{$data->tempat_lahir}}, {{$data->tanggal_lahir}}</span>
                            </div>
                            <div class="form-group row">
                                <label for="exampleFormControlInput1" class="col-md-3 col-sm-2 pt-2"><b>Alamat</b></label> <span class="col-md-5 pt-2">: </span>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('additional-js')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('myChart').getContext('2d');
    const myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['2019', '2020', '2021', '2022'],
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

    const ctx2 = document.getElementById('myChart2').getContext('2d');
    const myChart2 = new Chart(ctx2, {
        type: 'bar',
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