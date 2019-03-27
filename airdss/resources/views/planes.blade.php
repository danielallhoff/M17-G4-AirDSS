@extends('master')
<head>
    <title>Aviones de la compañía</title>
</head>
@section('contenido')
    <div class="centrado">
        <h1>Aviones de la compañía</h1>
        <table class="tabla">
            <tr>
                <th>Modelo</th>
                <th>Capacidad</th>
                <th>Distancia de vuelo</th>
                <th>Vuelos</th>
                <th>Modificar</th>
                <th>Eliminar</th>
            </tr>
            @foreach($planes as $plane)
            <tr>
                <td>{{$plane->modelo}}</td>
                <td>{{$plane->capacidad}}</td>
                <td>{{$plane->distancia_Vuelo}}</td>
                <td><a href="/plane{{$plane->id}}/flights">Vuelos</td>
                <td><a href="/plane{{$plane->id}}/modify">Modificar</td>
                <td><a href="/planes">Eliminar</td>
            </tr>
            @endforeach
        </table>
        <p>{{$planes->links()}}</p>

    </div>
@endsection