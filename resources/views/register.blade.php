@extends('template/t_index')
@section('content')
    <div class="container">
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="glyphicon glyphicon-plus-sign"></span> Register

                @if (Session::has('message'))
                    <span class="label label-success">{{ Session::get('message') }}</span>
                @endif
            </div>

            <div class="panel-body">
                <form action="{{ url('tambahlogin') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label>Nama Lengkap:</label>
                        <input type="text" name="nama" class="form-control" placeholder="Nama Lengkap" value="{{ old('nama') }}">
                        @if ($errors->has('nama'))
                            <span class="label label-danger">{!! $errors->first('nama') !!}</span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label>Username:</label>
                        <input type="text" name="username" class="form-control" placeholder="Username" value="{{ old('username') }}">
                        @if ($errors->has('username'))
                            <span class="label label-danger">{!! $errors->first('username') !!}</span>
                        @endif
                    </div>
                    
                   <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" name="password" id="password" class="form-control" placeholder="Password">
                        @if ($errors->has('password'))
                            <span class="label label-danger">{!! $errors->first('password') !!}</span>
                        @endif
                    </div>

                   <div class="form-group">
                        <label for="password_confirmation">Konfirmasi Password:</label>
                        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="Konfirmasi Password">
                        @if ($errors->has('password_confirmation'))
                            <span class="label label-danger">{!! $errors->first('password_confirmation') !!}</span>
                        @endif
                    </div>
                    <button type="submit" class="btn btn-primary">Register</button>
                </form>
            </div>
        </div>
    </div>
@endsection