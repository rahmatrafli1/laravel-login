@extends('template/t_index')
@section('content')
@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="{{ url('read') }}">Read Data</a></li>
        <li class="active">Edit Data</li>
    </ol>
    <div class="container">
        <div class="panel panel-default">
            <div class="panel-heading">
                Edit Data
            </div>
            <div class="panel-body">
                <form action="{{ url('prosesedit', $siswas->id)  }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label>Nama <span style="color: red">*</span></label>
                        <input type="text" name="nama" class="form-control" placeholder="Nama" value="{{ $siswas->nama }}">
                        @if ($errors->has('nama'))
                            <span class="label label-danger">{!! $errors->first('nama') !!}</span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label>Alamat <span style="color: red">*</span></label>
                        <input type="text" name="alamat" class="form-control" placeholder="Alamat" value="{{ $siswas->alamat }}">
                        @if ($errors->has('alamat'))
                            <span class="label label-danger">{!! $errors->first('alamat') !!}</span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label>Kelas <span style="color: red">*</span></label>
                        <input type="text" name="kelas" class="form-control" placeholder="Kelas" value="{{ $siswas->kelas }}">
                        @if ($errors->has('kelas'))
                            <span class="label label-danger">{!! $errors->first('kelas') !!}</span>
                        @endif
                    </div>

                    <button class="btn btn-primary">Edit Data</button>
                </form>
            </div>
        </div>
    </div>
@endsection