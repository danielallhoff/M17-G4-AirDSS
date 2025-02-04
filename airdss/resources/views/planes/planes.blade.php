@extends('adminIndex')
<head>
    <title>Aviones de la compañía</title>
</head>
@section('contenido')
    <div class="centrado">
        <h1>Aviones de la compañía 
        <a href="/planes/addPlane">
        <button type="button">Añadir avión</button>
        </a>
        </h1>
        <div style="overflow-x:auto">
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
                    <td><a href="/plane{{$plane->id}}/delete">Eliminar</td>
                </tr>
                @endforeach
            </table>
        </div>
        <br>
        Ordenar por: 
        <a href="/planes/orderBy/distancia">Distancia de vuelo</a>
        <a href="/planes/orderBy/capacidad">Capacidad</a>
        {{$planes->links()}}

    </div>
@endsection