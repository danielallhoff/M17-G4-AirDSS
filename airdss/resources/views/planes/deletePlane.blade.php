@extends('master')
<head>
    <title>Borrado de avión {{$plane->id}}</title>
</head>
@section('contenido')
    <div class="centrado">
        <h1>Borrado de avión {{$plane->id}}</h1>
        <form method="post" action="/plane{{$plane->id}}/delete" method="POST">
            {{ csrf_field() }}
            <label for="modelo">Modelo:</label>
            <input type="text" name="modelo" id="modelo" value="{{$plane->modelo}}" readonly>
            <br><br>
            <label for="capacidad">Capacidad:</label>
            <input type="text" name="capacidad" id="capacidad" value="{{$plane->capacidad}}" readonly>
            <br><br>
            <label for="distancia">Distancia de vuelo:</label>
            <input type="text" name="distancia" id="distancia" value="{{$plane->distancia_Vuelo}}" readonly>
            <br>
            <br>
            <button type="submit">Eliminar</button>
            <a href="/planes">
            <button type="button">Volver</button>
            </a>
        </form>
    </div>
@endsection