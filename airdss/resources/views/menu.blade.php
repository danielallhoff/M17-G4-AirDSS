
<ul class="menu">
    <li><a href="/airdss">AIRDSS</a></li>
    @if(Auth::check() == 1 && Auth::user()->esAdmin == 0)
        <li><a href="/flights">Comprar vuelos</a></li>
        <li><a href="/tickets">Mis vuelos</a></li>
        <li><a href="/profile">Mi perfil</a></li>
    @endif
    @if(Auth::check() == 1 && Auth::user()->esAdmin == 1)
        <li><a href="/admin" align>Administración</a></li>
    @endif
    @if(Auth::check() == 0)
        <li><a href="/login">Login</a></li>
        <li><a href="/register">Registrarse</a></li>
    @else
        <li><a href="{{ route('logout') }}">Logout</a></li>
    @endif
</ul>

