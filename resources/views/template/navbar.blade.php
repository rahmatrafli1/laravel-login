<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      @if(!Auth::user())
        <a class="navbar-brand" href="/">Laravel 8</a>
      @endif
      @can('isAdmin')
        <a class="navbar-brand" href="/">Laravel 8</a>
      @endcan
      @can('isUser')
        <a class="navbar-brand" href="/user">Laravel 8</a>
      @endcan
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        @can('isAdmin')  
          <li class="{{ ($title === 'Home') ? 'active' : ''}}"><a href="/">Home <span class="sr-only">(current)</span></a></li>
          <li class="{{ ($title === 'Tambah Data') ? 'active' : ''}}"><a href="/form">Tambah Data</a></li>
          <li class="{{ ($title === 'Read Data') ? 'active' : ''}}"><a href="/read">Read Data</a></li>
        @endcan
        @can('isUser')
          <li class="{{ ($title === 'Home') ? 'active' : ''}}"><a href="/user">Home <span class="sr-only">(current)</span></a></li>
        @endcan
      </ul>
      <ul class="nav navbar-nav navbar-right">  
        <li class="dropdown">
            @if (!Auth::user())    
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Pilihan <span class="caret"></span></a>
            @else
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->nama }} <span class="caret"></span></a>
            @endif
            <ul class="dropdown-menu">
              @can('isAdmin')
                <li><a href="#">{{ Auth::user()->hak_akses }}</a></li>
                <li class="{{ ($title === 'Ubah Password') ? 'active' : '' }}"><a href="/changepassword/{{ Auth::user()->id }}">Ubah Password</a></li>
                <li role="separator" class="divider"></li>
                <li><a href="{{ url('logout') }}">Keluar</a></li>
              @endcan
              @can('isUser')
                <li><a href="#">{{ Auth::user()->hak_akses }}</a></li>
                <li class="{{ ($title === 'Ubah Password') ? 'active' : '' }}"><a href="/changepassword/{{ Auth::user()->id}}">Ubah Password</a></li>
                <li role="separator" class="divider"></li>
                <li><a href="{{ url('logout') }}">Keluar</a></li>
              @endcan
    
              @if (!Auth::user())
                <li class="{{ ($title === 'Login') ? 'active' : '' }}"><a href="{{ url('login') }}">Login</a></li>
                <li class="{{ ($title === 'Register') ? 'active' : '' }}"><a href="{{ url('register') }}">Register</a></li>  
              @endif
            </ul>
          </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>