@extends('template/t_index')
@section('content')
@section('breadcrumb')
    <ol class="breadcrumb">
        <li class="active">Read Data</li>
    </ol>
    <div class="container">
        @if (session('success'))
            <div class="alert alert-success alert-dismissible" role="alert">
                <span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span>
                <span class="sr-only">Success:</span>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                {{ session('success') }}
            </div>
        @endif
        @if (session('fail'))
            <div class="alert alert-danger alert-dismissible" role="alert">
                <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                <span class="sr-only">fail:</span>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                {{ session('fail') }}
            </div>
        @endif
        <div class="panel panel-default">
            <div class="panel-heading">Read Data</div>
            <div class="panel-body">
                @php
                    $i = 1;
                @endphp
                <!-- Table -->
                <table class="table table-bordered">
                    <tr>
                        <th width="20px" class="text-center">No</th>
                        <th width="280px"class="text-center">Nama Siswa</th>
                        <th width="280px"class="text-center">Alamat</th>
                        <th width="280px"class="text-center">Kelas</th>
                        <th width="280px"class="text-center">Action</th>
                    </tr>

                    @foreach ($siswas as $s)
                        <tr>
                            <td width="20px" class="text-center">{{ $i++ }}</td>
                            <td width="280px"class="text-center">{{ $s->nama }}</td>
                            <td width="280px"class="text-center">{{ $s->alamat }}</td>
                            <td width="280px"class="text-center">{{ $s->kelas }}</td>
                            <td width="280px"class="text-center">
                                <a href="/editdata/{{ $s->id }}" class="btn btn-warning btn-sm">Edit</a>
                                <a href="/hapus/{{ $s->id }}" class="btn btn-danger btn-sm" onclick="return confirm('Yakin Mau dihapus?')">Hapus</a>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection