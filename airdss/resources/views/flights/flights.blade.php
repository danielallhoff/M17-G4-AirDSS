@extends('master')
<head>
    <title>Flights </title>
</head>
@section('contenido')
    <div class="centrado">
        <h1>Comprar vuelos</h1>
        <a href="/flights/add">
            <button type="button">Añadir vuelo</button>
        </a>
        <table class="tabla">
            <tr>
                <th>Aeropuerto origen</th>
                <th>Aeropuerto destino</th>
                <th>Fecha salida</th>
                <th>Fecha llegada</th>
                <th>Capacidad restante</th>
                <th>Modificar</th>
                <th>Eliminar</th>
            </tr>
            @forelse($flights as $flight)
            <tr>
                <!--<td><a href="/airport{{$flight->airportOrigen->id}}"> {{$flight->airportOrigen->codigo}}-{{$flight->airportOrigen->ciudad}}</a></td>-->
                <td>{{$flight->airportOrigen->codigo}}-{{$flight->airportOrigen->ciudad}}</td>
                <td>{{$flight->airportDestino->codigo}}-{{$flight->airportDestino->ciudad}}</td>
                <td>{{$flight->fecha_salida}}</td>
                <td>{{$flight->fecha_llegada}}</td>
                <td>{{$flight->capacidadRestante()}}</td>
                <td><a href="/flight{{$flight->id}}/modify"> Modificar</a></td>
                <td><a href="/flight{{$flight->id}}/remove"> Eliminar</a></td>
            </tr>
            @empty
                <p>No hay vuelos disponibles! </p>
            @endforelse
        </table>
        <br>
        Ordenar por: 
        <a href="/flights/orderBy/origin">Aeropuerto Origen</a>
        <a href="/flights/orderBy/salida">Fecha salida</a>
        <p>{{$flights->links()}}</p>
    </div>
@endsection