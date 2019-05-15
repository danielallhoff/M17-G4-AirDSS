@extends('master')
<head>
    <title>Flights </title>
</head>
@section('contenido')
    <div class="centrado">
        @if (Auth::check() && Auth::user()->esAdmin)
        <h1>Vuelos de la compañía</h1>
        <a href="/flights/add">
            <button type="button">Añadir vuelo</button>
        </a>
        @else
        <h1>Comprar vuelos</h1>
        @endif        
        <div style="overflow-x:auto">
            <table class="tabla">
                <tr>
                    <th>Aeropuerto origen</th>
                    <th>Aeropuerto destino</th>
                    <th>Fecha salida</th>
                    <th>Fecha llegada</th>
                    <th>Capacidad restante</th>
                    <th>Estado</th>
                    @if (Auth::check())                
                        @if (Auth::user()->esAdmin)
                        <th>Modificar</th>
                        <th>Eliminar</th>
                        @else
                        <th>Comprar</th>
                        @endif
                    @else
                    <th>Comprar</th>
                    @endif
                    
                </tr>
                @forelse($flights as $flight)
                <tr>
                    <!--<td><a href="/airport{{$flight->airportOrigen->id}}"> {{$flight->airportOrigen->codigo}}-{{$flight->airportOrigen->ciudad}}</a></td>-->
                    <td>{{$flight->airportOrigen->codigo}}-{{$flight->airportOrigen->ciudad}}</td>
                    <td>{{$flight->airportDestino->codigo}}-{{$flight->airportDestino->ciudad}}</td>
                    <td>{{$flight->fecha_salida}}</td>
                    <td>{{$flight->fecha_llegada}}</td>
                    <td>{{$flight->capacidadRestante()}}</td>
                    @if($flight->cancelado)
                    <td><div class="alert alert-danger" role="alert">Cancelado</div></td>
                    @elseif($flight->capacidadRestante() == 0)
                    <td><div class="alert alert-danger" role="alert">Agotado</div></td>
                    @else
                    <td><div class="alert alert-info" role="alert">Libre</div></td>
                    @endif
                    @if (Auth::check())                
                        @if (Auth::user()->esAdmin)
                        <td><a href="/flight{{$flight->id}}/modify"> Modificar</a></td>
                        <td><a href="/flight{{$flight->id}}/remove"> Eliminar</a></td>
                        @else
                        <td><a href="/flight{{$flight->id}}/buy"> Comprar</a></td>
                        @endif
                    @else
                    <td><a href="/login"> Comprar</a></td>
                    @endif
                </tr>
                @empty
                    <p>No hay vuelos disponibles! </p>
                @endforelse
            </table>
        </div>
        <br>
        Ordenar por: 
        <a href="/flights/orderBy/origin">Aeropuerto Origen</a>
        <a href="/flights/orderBy/salida">Fecha salida</a>
        <p>{{$flights->links()}}</p>
    </div>
@endsection