@extends('layouts.master')
@section('title', 'Data Survey Keolahragaan')

@section('additional-css')
<link href="{{asset('admin/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">

<style>
    table th,
    td {
        font-size: 12px;
    }

    .form {
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
            <h6 class="m-0 font-weight-bold text-primary">Detail Prasarana (Peralatan Olahraga)</h6>
            <form action="{{route('distribusiPrasarana.verified')}}" method="POST">
                @csrf
                <div class="form-group row">
                    <input type="hidden" class="form-control col-md-10" name="id_distribusi_prasarana" value="{{$distribusiId}}">
                </div>
                <div class="form-group row">
                    <div class="col-md-2">
                    </div>
                </div>
            </form>
        </div>
        <!-- Card Body -->
        <div class="card-body">
            <div class="row form-group">
                <label for="exampleFormControlInput1" class="col-form-label col-md-2">Kecamatan</label>
                <input type="text" readonly class="form-control col-md-10" id="kecamatan" name="id_kecamatan" value="{{$distribusi->kecamatan}}">
            </div>
            <div class="row form-group">
                <label for="exampleFormControlInput1" class="col-form-label col-md-2">Desa / Kelurahan</label>
                <input type="text" readonly class="form-control desa_kelurahan col-md-10" name="id_desa_kelurahan" id="kelurahan" value="{{$distribusi->desa_kelurahan}}">
            </div>
            <div class="row form-group">
                <label for="exampleFormControlInput1" class="col-form-label col-md-2">Proposal</label>
                <label for="exampleFormControlInput1" class="col-form-label col-md-10"><a href="{{asset('images/doc_pengajuan/'.$distribusi->file_proposal)}}">{{$distribusi->file_proposal}}</a></label>
            </div>
            <div class="row form-group">
                <label for="exampleFormControlInput1" class="col-form-label col-md-2">SK Kelompok</label>
                <label for="exampleFormControlInput1" class="col-form-label col-md-10"><a href="{{asset('images/doc_pengajuan/'.$distribusi->file_sk_kelompok)}}">{{$distribusi->file_sk_kelompok}}</a></label>
            </div>
            <div class="row form-group">
                <label for="exampleFormControlInput1" class="col-form-label col-md-2">Foto Sarana (PDF)</label>
                <label for="exampleFormControlInput1" class="col-form-label col-md-10"><a href="{{asset('images/doc_pengajuan/'.$distribusi->file_foto_sarana)}}">{{$distribusi->file_foto_sarana}}</a></label>
            </div>

            <div class="row form-group justify-content-end pr-3">
                <a class="btn btn-sm btn-primary" data-toggle="modal" data-target="#exampleModalCenter">Tambah</a>
            </div>
            <div class="table-responsive">
                <table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
                    <thead class="thead-light">
                        <tr>
                            <th>Penerima</th>
                            <th>Alamat</th>
                            <th>Nama Prasarana</th>
                            <th>Jumlah</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($detailDistribusi as $pr)
                        <tr>
                            <td>{{$pr->nama_penerima}}</td>
                            <td>{{$pr->alamat_lembaga}}</td>
                            <td>{{$pr->nama_prasarana}}</td>
                            <td>{{$pr->jumlah}}</td>
                            <td>
                                <a href="#" class="editTrigger" title="Klik Untuk Melihat Detail Data" data-id="{{$pr->id}}" data-toggle="modal" data-target="#exampleModalCenterEdit"><i class="fas fa-edit"></i></a>
                                <a href="{{route('distribusiPrasarana.pengajuan.delete', ['id' => $pr->id])}}" onclick="return confirm('Apakah anda yakin untuk menghapus data?');"><i class="fas fa-trash-alt"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Tambah Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('distribusiPrasarana.pengajuan.tambah')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        <label for="recipient-name" class="col-form-label col-md-3">Lembaga Penerima</label>
                        <select type="text" class="form-control col-md-8" name="lembaga_penerima">
                            <option value="RW">RW</option>
                            <option value="Kelompok Olahraga">Kelompok Olahraga</option>
                        </select>
                    </div>
                    <div class="form-group row">
                        <label for="recipient-name" class="col-form-label col-md-3">Nama Penerima</label>
                        <input type="text" class="form-control col-md-8" name="nama_penerima">
                    </div>
                    <div class="form-group row">
                        <label for="recipient-name" class="col-form-label col-md-3">Alamat</label>
                        <textarea type="text" class="form-control col-md-8" name="alamat_lembaga"></textarea>
                    </div>
                    <div class="form-group row">
                        <label for="recipient-name" class="col-form-label col-md-3">Nama Prasarana (Alat)</label>
                        <input type="hidden" class="form-control col-md-10" name="id_distribusi_prasarana" value="{{$distribusiId}}">
                        <select type="text" class="form-control col-md-8" name="id_prasarana">
                            @foreach($prasarana as $pr)
                            <option value="{{$pr->id}}">{{$pr->nama_prasarana}}</option>
                            @endforeach

                        </select>
                    </div>
                    <div class="form-group row">
                        <label for="recipient-name" class="col-form-label col-md-3">Jumlah</label>
                        <input type="text" class="form-control col-md-8" name="jumlah">
                    </div>
                    <div class="form-group row">
                        <label for="recipient-name" class="col-form-label col-md-3">Keterangan</label>
                        <input type="text" class="form-control col-md-8" name="keterangan">
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

<!-- Modal Edit-->
<div class="modal fade" id="exampleModalCenterEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Edit Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body modal-edit">
                <form action="{{route('distribusiPrasarana.pengajuan.update')}}" method="POST">
                    @csrf
                    <div class="form-group row">
                        <label for="recipient-name" class="col-form-label col-md-3">Lembaga Penerima</label>
                        <select type="text" class="form-control col-md-8" name="lembaga_penerima" id="lembagaPenerima">
                            <option value="RW">RW</option>
                            <option value="Kelompok Olahraga">Kelompok Olahraga</option>
                        </select>
                    </div>
                    <div class="form-group row">
                        <label for="recipient-name" class="col-form-label col-md-3">Nama Penerima</label>
                        <input type="hidden" class="form-control col-md-8" name="id" id="id">
                        <input type="text" class="form-control col-md-8" name="nama_penerima" id="namaPenerima">
                    </div>
                    <div class="form-group row">
                        <label for="recipient-name" class="col-form-label col-md-3">Alamat</label>
                        <textarea type="text" class="form-control col-md-8" name="alamat_lembaga" id="alamatLembaga"></textarea>
                    </div>
                    <div class="form-group row">
                        <label for="recipient-name" class="col-form-label col-md-3">Nama Prasarana (Alat)</label>
                        <select type="text" class="form-control col-md-8" name="id_prasarana" id="idPrasarana">
                            @foreach($prasarana as $pr)
                            <option value="{{$pr->id}}">{{$pr->nama_prasarana}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group row">
                        <label for="recipient-name" class="col-form-label col-md-3">Jumlah</label>
                        <input type="text" class="form-control col-md-8" name="jumlah" id="jumlah">
                    </div>
                    <div class="form-group row">
                        <label for="recipient-name" class="col-form-label col-md-3">Keterangan</label>
                        <input type="text" class="form-control col-md-8" name="keterangan" id="keterangan">
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
@endsection

@section('additional-js')
<!-- Page level plugins -->
<script src="{{asset('admin/vendor/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('admin/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

<!-- Page level custom scripts -->

<script>
    $("#namaPenerima").val("Jhon");
    $('.editTrigger').on("click", function() {
        var id = $(this).data('id');
        $.ajax({
            url: "/distribusi-prasarana/pengajuan-prasarana/get-data",
            method: "GET",
            data: {
                search: id
            },
            success: function(data) {
                console.log(data.id)

                $(".modal-edit #id").val(data.id);
                $(".modal-edit #lembagaPenerima").val(data.lembaga_penerima);
                $(".modal-edit #namaPenerima").val(data.nama_penerima);
                $(".modal-edit #alamatLembaga").val(data.alamat_lembaga);
                $(".modal-edit #idPrasarana").val(data.id_prasarana);
                $(".modal-edit #jumlah").val(data.jumlah);
                $(".modal-edit #keterangan").val(data.keterangan);
            }
        });
    });
</script>

@endsection