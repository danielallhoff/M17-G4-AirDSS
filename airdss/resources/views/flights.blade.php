@extends('master')
<head>
    <title>Flights </title>
</head>
@section('contenido')
    <div class="centrado">
        <h1>Comprar vuelos</h1>
        <table class="tabla" width="400px">
            <tr>
                <th>Aeropuerto origen</th>
                <th>Aeropuerto destino</th>
                <th>Fecha destino</th>
                <th>Fecha llegada</th>
                <th>Capacidad restante</th>
                <th>Modificar</th>
                <th>Eliminar</th>
            </tr>
            @forelse($flights as $flight)
            <tr>
                <td><a href="/airport{{$flight->airportOrigen->id}}"> {{$flight->airportOrigen->ciudad}}</a></td>
                <td><a href="/airport{{$flight->airportDestino->id}}"> {{$flight->airportDestino->ciudad}}</a></td>
                <td>{{$flight->fecha_llegada}}</td>
                <td>{{$flight->fecha_salida}}</td>
                <td>{{$flight->capacidadRestante()}}</td>
                <td><a href="/modificarFlight{{$flight->id}}"> Modificar</a></td>
                <td><a href="/eliminarFlight{{$flight->id}}"> Eliminar</a></td>
            </tr>
            @empty
                <p>No hay vuelos disponibles! </p>
            @endforelse
        </table>
        <br>
        Ordenar por: 
        <a href="/flights/orderBy/fechaSalida">Fecha de salida</a>
        <a href="/flights/orderBy/origen">Aeropuerto de origen</a>
        <p>{{$flights->links()}}</p>
    </div>
@endsection