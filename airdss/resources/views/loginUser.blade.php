@extends('master')
<head>
    <title>Login</title>
</head>
@section('contenido')
    <div class="centrado">
    <h1>Iniciar Sesión</h1>
        <form method="post" action="">
            <label for="user">Usuario:</label>
            <input type="text" name="user" PlaceHolder="admin@example.com">
            <br><br><br>
            <label for="password">Contraseña:</label>
            <input type="text" name="password"  PlaceHolder="Password">
            <br><br>
            <a href=""><button type="button" style="font-size:20px;border-radius:5px">Login</button></a>
            <a href="/createClient"><button type="button" style="font-size:20px;border-radius:5px">Registrar</button></a>
        </form>
    </div>
@endsection