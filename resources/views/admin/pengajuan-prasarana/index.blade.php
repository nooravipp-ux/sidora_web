@extends('layouts.master')
@section('title', 'Data Survey Keolahragaan')

@section('additional-css')
<link href="{{asset('admin/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">

<style>
    table th,
    td {
        font-size: 14px;
    }
</style>
@endsection

@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h4 mb-0 text-gray-800">Monitoring Pengajuan</h1>
        <select class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" id="">
            @foreach($collectYears as $years)
            <option value="">{{$years}}</option>
            @endforeach
        </select>
    </div>

    <!-- Content Row -->
    <div class="row">
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Total Pengajuan</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$summary->total}}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Total Draft</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$summary->draft}}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Total Rejected
                            </div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{$summary->rejected}}</div>
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

        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Total Approved</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$summary->approved}}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card shadow mb-4">
        <!-- Card Header - Dropdown -->
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Pengajuan Prasarana</h6>
            <a class="btn btn-sm btn-primary" href="{{route('distribusiPrasarana.pengajuan.create')}}">Buat Pengajuan</a>
        </div>
        <!-- Card Body -->
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
                    <thead class="thead-light">
                        <tr>
                            <th>Periode Tahun</th>
                            <th>Kecamatan</th>
                            <th>Desa / Kelurahan</th>
                            <th>keterangan</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($distribusiPrasarana as $dist)
                        <tr>
                            <td>{{date('Y', strtotime($dist->tanggal))}}</td>
                            <td>{{$dist->kecamatan}}</td>
                            <td>{{$dist->desa_kelurahan}}</td>
                            <td>{{$dist->keterangan_reject}}</td>
                            @if($dist->status == 'DRAFT')
                            <td class="bg-secondary text-center">
                                <span class="text-white">Draft</span>
                            </td>
                            @elseif($dist->status == 'SUBMITTED')
                            <td class="bg-primary text-center">
                                <span class="text-white">Submitted</span>
                            </td>
                            @elseif($dist->status == 'REJECTED')
                            <td class="bg-danger text-center">
                                <span class="text-white">Rejected</span>
                            </td>
                            @elseif($dist->status == 'APPROVED')
                            <td class="bg-success text-center">
                                <span class="text-white">Approved</span>
                            </td>
                            @else
                            <td class="bg-warning text-center">
                                <span class="text-white">Closed</span>
                            </td>
                            @endif
                            <td class="text-center">
                                @if(auth()->user()->id_role == 1 || auth()->user()->id_role == 2)
                                @if($dist->status == 'SUBMITTED')
                                <a href="{{route('distribusiPrasarana.approve', ['id' => $dist->id])}}" title="Klik Untuk Approve"><i class="fas fa-check"></i></a>
                                @endif
                                @else
                                @if($dist->status == 'DRAFT')
                                <a href="{{route('distribusiPrasarana.create', ['id' => $dist->id])}}" title="Detail Peralatan"><i class="fas fa-edit"></i></a>
                                <a href="{{route('distribusiPrasarana.submit')}}" onclick="event.preventDefault();
                                                     document.getElementById('kirim-pengajuan').submit();" title="Submit Data"><i class="fa fa-paper-plane" aria-hidden="true"></i></a>
                                <form id="kirim-pengajuan" action="{{ route('distribusiPrasarana.submit') }}" method="POST" class="d-none">
                                    @csrf
                                    <input type="hidden" name="id_distribusi_prasarana" value="{{$dist->id}}">
                                </form>
                                @else
                                <a href="{{route('distribusiPrasarana.verify', ['id' => $dist->id])}}" title="Klik Untuk Melihat Detail Data"><i class="fas fa-eye"></i></a>
                                @endif
                                @endif
                            </td>
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
<!-- Page level plugins -->
<script src="{{asset('admin/vendor/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('admin/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

<!-- Page level custom scripts -->
<script>
    $(document).ready(function() {
        $('#dataTable').DataTable();
    });
</script>

@endsection