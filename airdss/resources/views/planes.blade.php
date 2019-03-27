@extends('master')
<head>
    <title>Aviones de la compañía</title>
</head>
@section('contenido')
<div class="centrado">
        <h1>Aviones de la compañía</h1>
        <table class="tabla" width="400px">
            <tr>
                <th>Modelo</th>
                <th>Capacidad</th>
                <th>Distancia de vuelo</th>
                <th>Modificar</th>
                <th>Eliminar</th>
            </tr>
            @foreach($planes as $plane)
            <tr>
                <td>{{$plane->modelo}}</td>
                <td>{{$plane->capacidad}}</td>
                <td>{{$plane->distancia_Vuelo}}</td>
            </tr>
            @endforeach
        </table>


    </div>
@endsection