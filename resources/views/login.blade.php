@extends('template/t_index')
@section('content')
    <div class="container">
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="glyphicon glyphicon-user"></span> Login

                @if (Session::has('message'))
                    <span class="label label-danger">{{ Session::get('message') }}</span>
                @endif
            </div>

            <div class="panel-body">
                <form action="{{ url('proseslogin') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label>Username:</label>
                        <input type="text" name="username" class="form-control" placeholder="Username" value="{{ old('username') }}">
                        @if ($errors->has('username'))
                            <span class="label label-danger">{!! $errors->first('username') !!}</span>
                        @endif
                    </div>
                    
                   <div class="form-group">
                        <label>Password:</label>
                        <input type="password" name="password" class="form-control" placeholder="Password">
                        @if ($errors->has('password'))
                            <span class="label label-danger">{!! $errors->first('password') !!}</span>
                        @endif
                    </div>
                    <button type="submit" class="btn btn-primary">Login</button>
                </form>
            </div>
        </div>
    </div>
@endsection