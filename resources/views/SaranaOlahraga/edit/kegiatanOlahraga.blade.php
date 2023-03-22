@extends('layouts.master')

@section('title', 'Sarana')

@section('additional-css')
<link href="{{asset('admin/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">

<style>
    table th,
    td {
        font-size: 12px;
    }

    input[type="text"],
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
    textarea[type="text"],
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
            <h6 class="m-0 font-weight-bold text-success">Edit Kegiatan Olahraga</h6>
        </div>
        <!-- Card Body -->
        <div class="card-body">
            <form action="{{route('kegiatanOlahraga.update')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group row">
                    <label for="recipient-name" class="col-form-label col-md-2">Nama Club</label>
                    <input type="text" class="form-control col-md-10" name="nama_club" value="{{$kelompokOlahraga->nama_club}}">
                    <input type="hidden" class="form-control col-md-10" name="id" value="{{$kelompokOlahraga->id}}">
                </div>
                <div class="form-group row">
                    <label for="recipient-name" class="col-form-label col-md-2">Cabang Olahraga</label>
                    <select type="text" class="form-control col-md-10" name="jenis_olahraga">
                        @foreach($cabangOlahraga as $co)
                        <option value="{{$co->id}}" <?php if ($kelompokOlahraga->jenis_olahraga == $co->id) echo "selected"; ?>>{{$co->nama_cabang_olahraga}}</option>
                        @endforeach
                    <select>
                </div>
                <div class="form-group row">
                    <label for="recipient-name" class="col-form-label col-md-2">Ketua Club</label>
                    <input type="text" class="form-control col-md-10" name="ketua_club" value="{{$kelompokOlahraga->ketua_club}}">
                </div>
                <div class="form-group row">
                    <label for="recipient-name" class="col-form-label col-md-2">Alamat Sekretariat</label>
                    <textarea type="text" class="form-control col-md-10" name="alamat">{{$kelompokOlahraga->alamat}}</textarea>
                </div>
                <div class="form-group row">
                    <label for="recipient-name" class="col-form-label col-md-2">Status Club</label>
                    <select type="text" class="form-control col-md-10" name="status_club">
                        <option value="" selected>-</option>
                        <option value="Pembinaan" <?php if ($kelompokOlahraga->status_club == "Pembinaan") echo "selected"; ?>>Pembinaan</option>
                        <option value="Masyarakat" <?php if ($kelompokOlahraga->status_club == "Masyarakat") echo "selected"; ?>>Masyarakat</option>
                    </select>
                </div>
                <div class="form-group row">
                    <label for="recipient-name" class="col-form-label col-md-2">Tempat Latihan</label>
                    <select type="text" class="form-control col-md-10" name="tempat_latihan">
                        <option selected>-</option>
                        <option value="GOR" <?php if ($kelompokOlahraga->tempat_latihan == "GOR") echo "selected"; ?>>GOR</option>
                        <option value="Lapang" <?php if ($kelompokOlahraga->tempat_latihan == "Lapang") echo "selected"; ?>>Lapang</option>
                    </select>
                </div>
                <div class="form-group row">
                    <label for="recipient-name" class="col-form-label col-md-2">Status Lapang</label>
                    <select type="text" class="form-control col-md-10" name="status_lapang">
                        <option selected>-</option>
                        <option value="" <?php if ($kelompokOlahraga->status_lapang == "") echo "selected"; ?>></option>
                        <option value="" <?php if ($kelompokOlahraga->status_lapang == "") echo "selected"; ?>></option>
                    </select>
                </div>
                <div class="form-group row">
                    <label for="recipient-name" class="col-form-label col-md-2">Jumlah Peserta Didik</label>
                    <input type="text" class="form-control col-md-10" name="jumlah_peserta_didik" value="{{$kelompokOlahraga->jumlah_peserta_didik}}">
                </div>
                <div class="form-group row">
                    <label for="recipient-name" class="col-form-label col-md-2">Nama Pelatih</label>
                    <input type="text" class="form-control col-md-10" name="nama_pelatih" value="{{$kelompokOlahraga->nama_pelatih}}">
                </div>
                <div class="form-group row">
                    <label for="recipient-name" class="col-form-label col-md-2">Status Ijin</label>
                    <select type="text" class="form-control col-md-10" name="status_ijin">
                        <option value="">-</option>
                        <option value="Terdaftar" <?php if ($kelompokOlahraga->status_ijin == "Terdaftar") echo "selected"; ?>>Terdaftar</option>
                        <option value="Tidak Terdaftar " <?php if ($kelompokOlahraga->status_ijin == "Tidak Terdaftar") echo "selected"; ?>>Tidak Terdaftar</option>
                    </select>
                </div>
                <div class="form-group text-right">
                    <button type="submit" class="btn btn-sm btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('additional-js')


@endsection