@extends('template/t_index')
@section('content')
@section('breadcrumb')
    <ol class="breadcrumb">
        <li class="active">Ubah Password</li>
    </ol>
    <div class="container">
        @if (session('message'))
                <div class="alert alert-success alert-dismissible" role="alert">
                    <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                    <span class="sr-only">message:</span>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    {{ session('message') }}
                </div>
        @endif
        <div class="panel panel-default">
            <div class="panel-heading">
                Ubah Password
            </div>
            <div class="panel-body">
                <form action="/prosesubahpassword/{{ Auth::user()->id }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="password1">Password Lama <span style="color: red">*</span></label>
                        <input type="password" name="password1" id="password1" class="form-control" placeholder="Password Lama">
                        @if ($errors->has('password1'))
                            <span class="label label-danger">{!! $errors->first('password1') !!}</span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="password">Password Baru <span style="color: red">*</span></label>
                        <input type="password" name="password" id="password" class="form-control" placeholder="Password Baru">
                        @if ($errors->has('password'))
                            <span class="label label-danger">{!! $errors->first('password') !!}</span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="password_confirmed">Ulangi Password Baru <span style="color: red">*</span></label>
                        <input type="password" name="password_confirmed" id="password_confirmed" class="form-control" placeholder="Ulangi Password Baru">
                        @if ($errors->has('password_confirmed'))
                            <span class="label label-danger">{!! $errors->first('password_confirmed') !!}</span>
                        @endif
                    </div>

                    <button class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
@endsection