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
                <h3 class="section-title">Kegiatan Keolahragaan Yang Aktif di Masyarakat</h3>
                <p class="section-description">Desa / Kelurahan {{$desaKelurahan->desa_kelurahan}}</p>
            </div>
        </div>
    </div>
</section>
<div class="container-fluid data-wilayah">
    <div class="row mt-5">
        <div class="col-md-12">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <h5 class="card-title"><b>Data Kegiatan / Klub Olahraga Yang Aktif dimasyarakat</b></h5>
                    <table class="table table-sm table-striped" id="da" cellspacing="0">
                        <thead class="thead-light">
                            <tr>
                                <th>No.</th>
                                <th>Nama Klub</th>
                                <th>Cabang Olahraga</th>
                                <th>Status Ijin</th>
                                <th>Jumlah Peserta Didik</th>
                                <th>Nama Pelatih</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            @foreach($dataKelompokOlahraga as $dko)
                            <tr>
                                <td>{{$no++}}</td>
                                <td>{{$dko->nama_club}}</td>
                                <td>{{$dko->nama_cabang_olahraga}}</td>
                                <td>{{$dko->status_ijin}}</td>
                                <td>{{$dko->jumlah_peserta_didik}}</td>
                                <td>{{$dko->nama_pelatih}}</td>
                            </tr>
                            @endforeach
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            
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
@endsection