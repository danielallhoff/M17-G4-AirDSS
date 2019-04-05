@extends('master')
    <head><title>Perfil Usuario</title></head>
@section('contenido')
    <div class="centrado">
        <h1>Perfil {{$cliente->nombre}}</h1>
        <table class="tabla">
            
            <tr>
                <td><a href="/airport{{$flight->airportOrigen->id}}"> {{$flight->airportOrigen->ciudad}}</a></td>
                <td><a href="/airport{{$flight->airportDestino->id}}"> {{$flight->airportDestino->ciudad}}</a></td>
                <td>{{$flight->fecha_salida}}</td>
                <td>{{$flight->fecha_llegada}}</td>
                <td>{{$flight->capacidadRestante()}}</td>
                <td><a href="/flight{{$flight->id}}/modify"> Modificar</a></td>
                <td><a href="/flight{{$flight->id}}/remove"> Eliminar</a></td>
            </tr>
            
        </table>
    </div>
@endsection