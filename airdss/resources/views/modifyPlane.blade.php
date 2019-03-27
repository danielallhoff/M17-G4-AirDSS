@extends('master')
<head>
    <title>Modificación de avión {{$id}}</title>
</head>
@section('contenido')
    <div class="centrado">
        <h1>Modificación de avión {{$id}}</h1>
        <form method="post" action="/plane{{$id}}/{{$modelo}}/{{$capacidad}}/{{$distancia}}/modify">
            {{ csrf_field() }}
            
            <label for="modelo">Modelo:</label>
            <input type="text" name="modelo" id="modelo" >
            <br><br>
            <label for="capacidad">Capacidad:</label>
            <input type="text" name="capacidad" id="capacidad">
            <br><br>
            <label for="distancia">Distancia de vuelo:</label>
            <input type="text" name="distancia" id="distancia" >
            <br><br>
            <button type="submit">Modificar</button>
            <a href="/planes">
            <button type="button">Volver</button>
            </a>
        </form>
    </div>
@endsection