<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<!-- <ul class="menu">
    <li><a href="/airdss">AIRDSS</a></li>
    @if(Auth::check() == 0)
    <li><a href="/flights">Comprar vuelos</a></li>
    @endif
    @if(Auth::check() == 1 && Auth::user()->esAdministrador()istrador() == 0)
        <li><a href="/flights">Comprar vuelos</a></li>
        <li><a href="/tickets{{Auth::user()->id}}">Mis vuelos</a></li>
        <li><a href="/profile">Mi perfil</a></li>
    @endif
    @if(Auth::check() == 1 && Auth::user()->esAdministrador() == 1)
        <li><a href="/admin" align>Administración</a></li>
    @endif
    @if(Auth::check() == 0)
        <li><a href="/login">Login</a></li>
        <li><a href="/register">Registrarse</a></li>
    
    @else
        <li><a href="/profile">{{Auth::user()->name}}</a></li>
        <li><a href="{{ route('logout') }}">Logout</a></li>
    @endif
</ul> -->

<nav class="navbar navbar-expand-md bg-dark navbar-dark">
  <a class="navbar-brand" href="/airdss">AIRDSS</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
  <ul class="navbar-nav">
    @if(Auth::check() == 0 ||Auth::check() == 1 && Auth::user()->esAdministrador() == 0)
    <li class="nav-item"><a class="nav-link" href="/flights">Comprar vuelos</a></li>
    @endif
    @if(Auth::check() == 1 && Auth::user()->esAdministrador() == 0)
        <li class="nav-item"><a class="nav-link" href="/tickets{{Auth::user()->id}}">Mis vuelos</a></li>
        <li class="nav-item"><a class="nav-link" href="/profile{{Auth::user()->id}}">Mi perfil</a></li>
    @endif
    @if(Auth::check() == 1 && Auth::user()->esAdministrador() == 1)
        <li class="nav-item"><a class="nav-link" href="/admin" >Administración</a></li>
        <li class="nav-item"><a class="nav-link" href="/profile{{Auth::user()->id}}">Mi perfil</a></li>
    @endif
    @if(Auth::check() == 0)
        <li class="nav-item"><a class="nav-link" href="/login">Login</a></li>
        <li class="nav-item"><a class="nav-link" href="/register">Registrarse</a></li>
    
    @else
        <li class="nav-item"><a class="nav-link" href="{{ route('logout') }}">Logout</a></li>
    @endif
    </ul>
  </div>  
</nav>

