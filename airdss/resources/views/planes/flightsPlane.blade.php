@extends('adminIndex')
<head>
    <title>Vuelos del avión {{$plane->id}}</title>
</head>
@section('contenido')
<div class="centrado">
        <h1>Vuelos del avión {{$plane->id}}, modelo {{$plane->modelo}}</h1>
        <table class="tabla">
            <tr>
                <th>Aeropuerto origen</th>
                <th>Aeropuerto destino</th>
                <th>Fecha salida</th>
                <th>Fecha llegada</th>
            </tr>
            @forelse($flights as $flight)
            <tr>
                <td>{{$flight->airportOrigen->ciudad}}</td>
                <td>{{$flight->airportDestino->ciudad}}</td>
                <td>{{$flight->fecha_salida}}</td>
                <td>{{$flight->fecha_llegada}}</td>    
            </tr>
            @empty
            <div class="alert alert-info" role="alert">
                <strong>0 vuelos.</strong> El avión no tiene vuelos planeados
            </div>
            @endforelse
        </table>


    </div>
@endsection