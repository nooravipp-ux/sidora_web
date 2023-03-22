@extends('layouts.master')

@section('title', 'Management Pengguna')

@section('additional-css')
<style>
    .pass_show {
        position: relative
    }

    .pass_show .ptxt {

        position: absolute;

        top: 50%;

        right: 10px;

        z-index: 1;

        color: #f36c01;

        margin-top: -10px;

        cursor: pointer;

        transition: .3s ease all;

    }

    .pass_show .ptxt:hover {
        color: #333333;
    }
</style>
@endsection

@section('content')
<div class="container-fluid">
    <div class="card shadow mb-4">
        <!-- Card Header - Dropdown -->
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-success">Perbaharui Password</h6>
        </div>
        <!-- Card Body -->
        <div class="card-body">
            <div class="row">
                <div class="col-sm-4">
                    <form action="{{route('users.storeChangePass')}}" method="POST">
                        @csrf
                        <label>Current Password</label>
                        <div class="form-group pass_show">
                            <input type="password" class="form-control" placeholder="Current Password" required
                                name="currentPassword">
                        </div>
                        @if(Session::has('msg'))
                        <div class="alert alert-danger">
                            {{Session::get('msg')}}
                        </div>
                        @endif
                        <label>New Password</label>
                        <div class="form-group pass_show">
                            <input type="password" class="form-control" placeholder="New Password" name="newPassword" required>
                        </div>
                        <label>Confirm Password</label>
                        <div class="form-group pass_show">
                            <input type="password" class="form-control" placeholder="Confirm Password" name="confirmPassword" required>
                        </div>
                        @if(Session::has('msg1'))
                        <div class="alert alert-danger">
                            {{Session::get('msg1')}}
                        </div>
                        @endif
                        <button type="submit" class="btn btn-md btn-primary">Ganti Password</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('additional-js')

<script>
    $(document).ready(function () {
        $('.pass_show').append('<span class="ptxt">Show</span>');
    });


    $(document).on('click', '.pass_show .ptxt', function () {

        $(this).text($(this).text() == "Show" ? "Hide" : "Show");

        $(this).prev().attr('type', function (index, attr) { return attr == 'password' ? 'text' : 'password'; });

    });  
</script>

@endsection