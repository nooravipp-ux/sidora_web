@extends('layouts.master')

@section('title', 'Master Cabang Olahraga')

@section('additional-css')
<link href="{{asset('admin/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.2.0/css/datepicker.min.css" rel="stylesheet">

<style>
    table th,
    td {
        font-size: 12px;
    }

    input[type="text"],
    input[type="date"],
    textarea[type="text"],
    select.form-control {
        background: transparent;
        border: none;
        border-bottom: 1px solid #E2E6E1;
        -webkit-box-shadow: none;
        box-shadow: none;
        border-radius: 0;
    }

    input[type="text"]:focus,
    input[type="date"]:focus,
    textarea[type="text"]:focus,
    select.form-control:focus {
        -webkit-box-shadow: none;
        box-shadow: none;
        border-color: #54CA33;
    }
</style>
@endsection

@section('content')
<div class="container-fluid">
    <div class="card shadow mb-4">
        <!-- Card Header - Dropdown -->
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-success">Edit Informasi Atlet</h6>
        </div>
        <!-- Card Body -->
        <div class="card-body">
            <form action="{{route('hibahPrasarana.update')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group row">
                    <label for="recipient-name" class="col-form-label col-md-3">Periode Tahun</label>
                    <input type="text" class="form-control col-md-9" name="periode_tahun" value="{{$prasarana->tahun_periode}}">
                    <input type="hidden" class="form-control col-md-9" name="id" value="{{$prasarana->id}}">
                </div>
                <div class="form-group row">
                    <label for="recipient-name" class="col-form-label col-md-3">Penerima Hibah</label>
                    <input type="text" class="form-control col-md-9" name="penerima_hibah" placeholder="ex: RW.01 / Nama Kelompok Olahraga" value="{{$prasarana->penerima_hibah}}">
                </div>
                <div class="form-group row">
                    <label for="recipient-name" class="col-form-label col-md-3">Lembaga Penerima</label>
                    <select class="form-control col-md-9" name="jenis_penerima">
                        <option value="">-</option>
                        <option value="RW" <?php if ($prasarana->jenis_penerima == "RW") echo "selected"; ?>>RW</option>
                        <option value="Kelompok Olahraga" <?php if ($prasarana->jenis_penerima == "Kelompok Olahraga") echo "selected"; ?>>Kel. Olahraga</option>
                    </select>
                </div>
                <div class="form-group row">
                    <label for="recipient-name" class="col-form-label col-md-3">Jenis Peralatan</label>
                    <select type="text" class="form-control col-md-9" name="jenis_peralatan">
                        @foreach($m_prasarana as $mprasarana)
                        <option value="{{$mprasarana->id}}" <?php if ($prasarana->jenis_peralatan == $mprasarana->id) echo "selected"; ?>>{{$mprasarana->nama_prasarana}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group row">
                    <label for="recipient-name" class="col-form-label col-md-3">Jumlah</label>
                    <input type="text" class="form-control col-md-9" name="jumlah" value="{{$prasarana->jumlah}}">
                </div>

                <div class="form-group pl-2 text-right">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('additional-js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.2.0/js/bootstrap-datepicker.min.js"></script>
<script>
    $(document).ready(function() {
        $("#tahun").datepicker({
            format: "yyyy",
            viewMode: "years",
            minViewMode: "years",
            autoclose: true
        });
    })
</script>
@endsection