@extends('layouts.master')

@section('title','Detail Hasil Survey')

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
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Deskripsi Wilayah</h6>
        </div>
        <div class="card-body">
            <form action="{{route('sarana.storeP1P2')}}" method="POST">
                @csrf
                <div class="form-group row">
                    <label for="recipient-name" class="col-form-label col-md-2">Kecamatan</label>
                    <input type="text" class="form-control col-md-10" value="{{$data->kecamatan}}" readonly>
                </div>
                <div class="form-group row">
                    <label for="recipient-name" class="col-form-label col-md-2">Desa / Kelurahan</label>
                    <input type="text" class="form-control col-md-10" value="{{$data->desa_kelurahan}}" readonly>
                </div>
            </form>
        </div>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Fasilitas Sarana Olahraga</h6>
            <a class="btn btn-sm btn-primary" href="javascript(0);" data-toggle="modal" data-target="#sarana"><i class="fas fa-plus-circle"></i></a>
        </div>
        <div class="card-body">
            <table class="table" id="tbl-sarana">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Jenis Sarana</th>
                        <th scope="col">Tipe</th>
                        <th scope="col">Kepemilikan</th>
                        <th scope="col">Nama Pemilik</th>
                        <th scope="col">Luas</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Kondisi</th>
                        <th scope="col" class="text-center">Foto Sarana</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    @foreach($t_sarana as $sarana)
                    <tr>
                        <td><?php echo $i++; ?></td>
                        <td>{{$sarana->nama_sarana}}</td>
                        <td>{{$sarana->tipe_sarana}}</td>
                        <td>{{$sarana->status_kepemilikan}}</td>
                        <td>{{$sarana->nama_pemilik}}</td>
                        <td>{{$sarana->luas_lapang}}</td>
                        <td>{{$sarana->alamat_lokasi}}</td>
                        <td class="text-center">{{$sarana->kondisi_lapang}}</td>
                        <td class="text-center">
                            @if($sarana->foto_lokasi == "-")
                            <span>-</span>
                            @else
                            <img src="{{asset('images/pendukung/'. $sarana->foto_lokasi)}}" width="200" height="100" alt="">
                            @endif
                        </td>
                        <td><a href="{{route('saranaOlahraga.sarana.edit', ['id' => $sarana->id])}}"><i class="fas fa-edit"></i></a> | <a href="{{route('saranaOlahraga.sarana.delete', ['id' => $sarana->id])}}" onclick="return confirm('Apakah anda yakin untuk menghapus data?');"><i class="fas fa-trash-alt"></i></a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Prasarana Olahraga Yang Diberikan Oleh Pemerintah</h6>
            <a class="btn btn-sm btn-primary" href="javascript(0);" data-toggle="modal" data-target="#prasarana"><i class="fas fa-plus-circle"></i></a>
        </div>
        <div class="card-body">
            <table class="table" id="tbl-prasarana">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Jenis Penerima</th>
                        <th scope="col">Penerima</th>
                        <th scope="col">Nama Prasarana</th>
                        <th scope="col">Jumlah</th>
                        <th scope="col">Periode Tahun</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $j = 1; ?>
                    @foreach($t_prasarana as $prasarana)
                    <tr>
                        <td><?php echo $j++; ?></td>
                        <td>{{$prasarana->jenis_penerima}}</td>
                        <td>{{$prasarana->penerima_hibah}}</td>
                        <td>{{$prasarana->nama_prasarana}}</td>
                        <td>{{$prasarana->jumlah}}</td>
                        <td>{{$prasarana->tahun_periode}}</td>
                        <td><a href="{{route('hibahPrasarana.edit', ['id' => $prasarana->id])}}"><i class="fas fa-edit"></i></a> | <a href="{{route('hibahPrasarana.delete', ['id' => $prasarana->id])}}" onclick="return confirm('Apakah anda yakin untuk menghapus data?');"><i class="fas fa-trash-alt"></i></a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Kegiatan Olahraga Yang Berkembang Di Masyarakat</h6>
            <a class="btn btn-sm btn-primary" href="javascript(0);" data-toggle="modal" data-target="#kegiatan-olaharaga"><i class="fas fa-plus-circle"></i></a>
        </div>
        <div class="card-body">
            <table class="table" id="tbl-kegiatan-olahraga">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Cabang Olahraga</th>
                        <th scope="col">Nama Klub</th>
                        <th scope="col">Ketua Klub</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Status Ijin</th>
                        <th scope="col">Status Klub</th>
                        <th scope="col">Nama Pelatih</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $k = 1; ?>
                    @foreach($t_kel_olahraga as $ko)
                    <tr>
                        <td><?php echo $k++; ?></td>
                        <td>{{$ko->nama_cabang_olahraga }}</td>
                        <td>{{$ko->nama_club}}</td>
                        <td>{{$ko->ketua_club}}</td>
                        <td>{{$ko->alamat}}</td>
                        <td>
                            @if($ko->status_ijin == "Terdaftar")
                            <span>Terdaftar</span>
                            @else
                            <span>Tidak Terdaftar</span>
                            @endif
                        </td>
                        <td>{{$ko->status_club}}</td>
                        <td>{{$ko->nama_pelatih}}</td>
                        <td><a href="{{route('kegiatanOlahraga.edit', ['id' => $ko->id])}}"><i class="fas fa-edit"></i></a> | <a href="{{route('kegiatanOlahraga.delete', ['id' => $ko->id])}}" onclick="return confirm('Apakah anda yakin untuk menghapus data?');"><i class="fas fa-trash-alt"></i></a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Potensi Olahraga Prestasi Yang Ada Di Wilayah</h6>
            <a class="btn btn-sm btn-primary" href="javascript(0);" data-toggle="modal" data-target="#prestasi-olahraga"><i class="fas fa-plus-circle"></i></a>
        </div>
        <div class="card-body">
            <table class="table" id="tbl-potensi-olahraga">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama Atlet</th>
                        <th scope="col">Cabang Olahraga</th>
                        <th scope="col">Jenis Potensi</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $l = 1; ?>
                    @foreach($t_prestasi_olahraga as $po)
                    <tr>
                        <td><?php echo $l++; ?></td>
                        <td>{{$po->nama}}</td>
                        <td>{{$po->nama_cabang_olahraga}}</td>
                        <td>{{$po->jenis_potensi}}</td>
                        <td class="text-center"><a href="{{route('prestasiOlahraga.edit', ['id' => $po->id])}}"><i class="fas fa-edit"></i></a>
                            | <a href="{{route('prestasiOlahraga.delete', ['id' => $po->id])}}" onclick="return confirm('Apakah anda yakin untuk menghapus data?');"><i class="fas fa-trash-alt"></i></a>
                            </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal Sarana-->
    <div class="modal fade" id="sarana" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tamabah Sarana</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="p-2" action="{{route('saranaOlahraga.sarana.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="recipient-name" class="col-form-label col-md-3">Jenis Sarana</label>
                            <select type="text" class="form-control col-md-9" name="jenis_sarana" required>
                                <option value="">-</option>
                                @foreach($m_sarana as $sarana)
                                <option value="{{$sarana->id}}"> {{$sarana->nama_sarana}}</option>
                                @endforeach
                            </select>
                            <input type="hidden" class="form-control col-md-10" name="sarana_prasarana_id" value="{{$data->id}}">
                        </div>
                        <div class="form-group row">
                            <label for="recipient-name" class="col-form-label col-md-3">Tipe Sarana</label>
                            <select class="form-control col-md-9" name="tipe_sarana">
                                <option value="">-</option>
                                <option value="INDOOR">Indoor</option>
                                <option value="OUTDOOR">Outdoor</option>
                            </select>
                        </div>
                        <div class="form-group row">
                            <label for="recipient-name" class="col-form-label col-md-3">Status Kepemilikan</label>
                            <input type="text" class="form-control col-md-9" name="status_kepemilikan">
                        </div>
                        <div class="form-group row">
                            <label for="recipient-name" class="col-form-label col-md-3">Nama Pemilik</label>
                            <input type="text" class="form-control col-md-9" name="nama_pemilik">
                        </div>
                        <div class="form-group row">
                            <label for="recipient-name" class="col-form-label col-md-3">Luas Lapangan</label>
                            <input type="text" class="form-control col-md-9" name="luas_lapang">
                        </div>
                        <div class="form-group row">
                            <label for="recipient-name" class="col-form-label col-md-3">kondisi Lapang</label>
                            <select type="text" class="form-control col-md-9" name="kondisi_lapang">
                                <option value="">-</option>
                                <option value="Baik">Baik</option>
                                <option value="Cukup">Cukup</option>
                                <option value="Buruk">Buruk</option>
                            </select>
                        </div>
                        <div class="form-group row">
                            <label for="recipient-name" class="col-form-label col-md-3">Alamat</label>
                            <textarea type="text" class="form-control col-md-9" name="alamat_lokasi"></textarea>
                        </div>
                        <div class="form-group row">
                            <label for="recipient-name" class="col-form-label col-md-3">Foto Lokasi</label>
                            <input type="file" class="form-control col-md-9" name="lokasi">
                        </div>
                        <div class="form-group row">
                            <div class="col-md-2">
                            </div>
                            <div class="col-md-10 text-right">
                                <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Prasarana-->
    <div class="modal fade" id="prasarana" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Prasarana</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="p-2" action="{{route('hibahPrasarana.store')}}" method="POST">
                        @csrf
                        <div class="form-group row">
                            <label for="recipient-name" class="col-form-label col-md-3">Penerima Hibah</label>
                            <input type="text" class="form-control col-md-9" name="penerima_hibah" placeholder="ex: RW.01 / Nama Kelompok Olahraga">
                            <input type="hidden" class="form-control col-md-10" name="sarana_prasarana_id" value="{{$data->id}}">
                        </div>
                        <div class="form-group row">
                            <label for="recipient-name" class="col-form-label col-md-3">Lembaga Penerima</label>
                            <select class="form-control col-md-9" name="jenis_penerima">
                                <option value="">-</option>
                                <option value="RW">RW</option>
                                <option value="Kelompok Olahraga">Kel. Olahraga</option>
                            </select>
                        </div>
                        <div class="form-group row">
                            <label for="recipient-name" class="col-form-label col-md-3">Jenis Peralatan</label>
                            <select type="text" class="form-control col-md-9" name="jenis_peralatan">
                                <option value="">-</option>
                                @foreach($m_prasarana as $prasarana)
                                <option value="{{$prasarana->id}}">{{$prasarana->nama_prasarana}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group row">
                            <label for="recipient-name" class="col-form-label col-md-3">Jumlah</label>
                            <input type="text" class="form-control col-md-9" name="jumlah">
                        </div>
                        <div class="form-group row">
                            <label for="recipient-name" class="col-form-label col-md-3">Periode Tahun</label>
                            <input type="text" class="form-control col-md-9" name="tahun_periode">
                        </div>
                        <div class="form-group row">
                            <div class="col-md-2">
                            </div>
                            <div class="col-md-10 text-right">
                                <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Kegiatan Olahraga-->
    <div class="modal fade" id="kegiatan-olaharaga" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tamabah Kegiatan Olahraga</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="p-3" action="{{route('kegiatanOlahraga.create')}}" method="POST">
                        @csrf
                        <div class="form-group row">
                            <label for="recipient-name" class="col-form-label col-md-3">Nama Club</label>
                            <input type="text" class="form-control col-md-9" name="nama_club">
                            <input type="hidden" class="form-control col-md-10" name="sarana_prasarana_id" value="{{$data->id}}">
                        </div>
                        <div class="form-group row">
                            <label for="recipient-name" class="col-form-label col-md-3">Cabang Olahraga</label>
                            <select type="text" class="form-control col-md-9" name="jenis_olahraga">
                                <option value="">-</option>
                                @foreach($cabangOlahraga as $co)
                                <option value="{{$co->id}}">{{$co->nama_cabang_olahraga}}</option>
                                @endforeach
                                <select>
                        </div>
                        <div class="form-group row">
                            <label for="recipient-name" class="col-form-label col-md-3">Ketua Club</label>
                            <input type="text" class="form-control col-md-9" name="ketua_club">
                        </div>
                        <div class="form-group row">
                            <label for="recipient-name" class="col-form-label col-md-3">Alamat Sekretariat</label>
                            <textarea type="text" class="form-control col-md-9" name="alamat"></textarea>
                        </div>
                        <div class="form-group row">
                            <label for="recipient-name" class="col-form-label col-md-3">Status Club</label>
                            <select type="text" class="form-control col-md-9" name="status_club">
                                <option value="" selected>-</option>
                                <option value="Pembinaan">Pembinaan</option>
                                <option value="Masyarakat">Masyarakat</option>
                            </select>
                        </div>
                        <div class="form-group row">
                            <label for="recipient-name" class="col-form-label col-md-3">Tempat Latihan</label>
                            <select type="text" class="form-control col-md-9" name="tempat_latihan">
                                <option value="" selected>-</option>
                                <option value="GOR">GOR</option>
                                <option value="Lapang">Lapang</option>
                            </select>
                        </div>
                        <div class="form-group row">
                            <label for="recipient-name" class="col-form-label col-md-3">Status Lapang</label>
                            <select type="text" class="form-control col-md-9" name="status_lapang">
                                <option value="" selected>-</option>
                                <option value=""></option>
                                <option value=""></option>
                            </select>
                        </div>
                        <div class="form-group row">
                            <label for="recipient-name" class="col-form-label col-md-3">Jumlah Peserta Didik</label>
                            <input type="text" class="form-control col-md-9" name="jumlah_peserta_didik">
                        </div>
                        <div class="form-group row">
                            <label for="recipient-name" class="col-form-label col-md-3">Nama Pelatih</label>
                            <input type="text" class="form-control col-md-9" name="nama_pelatih">
                        </div>
                        <div class="form-group row">
                            <label for="recipient-name" class="col-form-label col-md-3">Status Ijin</label>
                            <select type="text" class="form-control col-md-9" name="status_ijin">
                                <option value="" selected>-</option>
                                <option value="Terdaftar">Terdaftar</option>
                                <option value="Tidak Terdaftar">Tidak Terdaftar</option>
                            </select>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-2">
                            </div>
                            <div class="col-md-10 text-right">
                                <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Prestasi Olahraga-->
    <div class="modal fade" id="prestasi-olahraga" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Prestasi Olahraga</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{route('prestasiOlahraga.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row form-group pl-2 pr-2">
                            <label for="exampleFormControlInput1" class="col-form-label col-md-3">Nama Lengkap</label>
                            <input type="text" class="form-control col-md-9" name="nama">
                            <input type="hidden" class="form-control col-md-10" name="sarana_prasarana_id" value="{{$data->id}}">
                        </div>
                        <div class="row form-group pl-2 pr-2">
                            <label for="exampleFormControlInput1" class="col-form-label col-md-3">Tempat Lahir</label>
                            <input type="text" class="form-control col-md-9" name="tempat_lahir">
                        </div>
                        <div class="row form-group pl-2 pr-2">
                            <label for="exampleFormControlInput1" class="col-form-label col-md-3">Tanggal Lahir</label>
                            <input type="date" class="form-control col-md-9" name="tanggal_lahir">
                        </div>
                        <div class="row form-group pl-2 pr-2">
                            <label for="exampleFormControlInput1" class="col-form-label col-md-3">Alamat</label>
                            <textarea type="text" class="form-control col-md-9" name="alamat"></textarea>
                        </div>
                        <div class="row form-group pl-2 pr-2">
                            <label for="exampleFormControlInput1" class="col-form-label col-md-3">Jenis Potensi</label>
                            <select type="text" class="form-control desa_kelurahan col-md-9" name="jenis_potensi">
                                <option value="">-</option>
                                <option value="Atlet Usia Dini">Atlet Usia Dini</option>
                                <option value="Atlet Profesional">Atlet Profesional</option>
                                <option value="Pelatih">Pelatih</option>
                            </select>
                        </div>
                        <div class="row form-group pl-2 pr-2">
                            <label for="exampleFormControlInput1" class="col-form-label col-md-3">Jenis Olahraga</label>
                            <select type="text" class="form-control desa_kelurahan col-md-9" name="jenis_olahraga">
                                <option value="">-</option>
                                @foreach($cabangOlahraga as $co)
                                <option value="{{$co->id}}">{{$co->nama_cabang_olahraga}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="row form-group pl-2 pr-2">
                            <label for="exampleFormControlInput1" class="col-form-label col-md-3">Foto Atlet</label>
                            <input type="file" class="form-control col-md-9" name="foto">
                        </div>

                        <div class="form-group pl-2 text-right">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
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
        $('#tbl-sarana').DataTable();
        $('#tbl-prasarana').DataTable();
        $('#tbl-kegiatan-olahraga').DataTable();
        $('#tbl-potensi-olahraga').DataTable();
    });
</script>
<script>
    $(".kecamatan").select2({
        placeholder: "Pilih Kecamatan",
        allowClear: true
    });
</script>

@endsection