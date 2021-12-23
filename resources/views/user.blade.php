@extends('template/t_index')
@section('content')
@section('breadcrumb')
    <ol class="breadcrumb">
        <li class="active">Home</li>
    </ol>
<div class="container">
        <center><h1>BELAJAR LARAVEL 8</h1></center>
        <h4>Selamat Datang <b>{{Auth::user()->nama}}</b>, Anda Login sebagai <b>{{Auth::user()->hak_akses}}</b>.</h4> 
</div> 
@endsection