@extends('template/t_index')
@section('content')
@section('breadcrumb')
    <ol class="breadcrumb">
        <li class="active">Tambah Data</li>
    </ol>
    <div class="container">
        <div class="panel panel-default">
            <div class="panel-heading">
                Tambah Data
            </div>
            <div class="panel-body">
                <form action="{{ url('/prosestambah') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label>Nama <span style="color: red">*</span></label>
                        <input type="text" name="nama" class="form-control" placeholder="Nama">
                        @if ($errors->has('nama'))
                            <span class="label label-danger">{!! $errors->first('nama') !!}</span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label>Alamat <span style="color: red">*</span></label>
                        <input type="text" name="alamat" class="form-control" placeholder="Alamat">
                        @if ($errors->has('alamat'))
                            <span class="label label-danger">{!! $errors->first('alamat') !!}</span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label>Kelas <span style="color: red">*</span></label>
                        <input type="text" name="kelas" class="form-control" placeholder="Kelas">
                        @if ($errors->has('kelas'))
                            <span class="label label-danger">{!! $errors->first('kelas') !!}</span>
                        @endif
                    </div>

                    <button class="btn btn-primary">Tambah Data</button>
                </form>
            </div>
        </div>
    </div>
@endsection