@extends('layouts.master')

@section('title', 'Roles')

@section('additional-css')
<link href="{{asset('admin/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">

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
@endsection

@section('content')
<div class="container-fluid">
    <div class="card shadow mb-4">
        <!-- Card Header - Dropdown -->
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-success">Edit Data Role</h6>
        </div>
        <!-- Card Body -->
        <div class="card-body">
            <form action="{{route('roles.update')}}" method="POST">
                @csrf
                <div class="form-group row">
                    <label for="exampleFormControlInput1" class="col-md-2 pt-2">Username</label>
                    <input type="text" class="form-control col-md-10" name="role" value="{{$roles->role}}">
                    <input type="hidden" class="form-control col-md-10" name="id" value="{{$roles->id}}">
                </div>
                <div class="form-group text-right">
                    <button type="submit" class="btn btn-sm btn-success">Update</button>
                </div>
            </form>
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
