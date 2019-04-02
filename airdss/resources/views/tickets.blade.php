@extends('master')
<head>
    <title>Tickets</title>
</head>
@section('contenido')
    <div class="centrado">
        <h1>Tickects</h1>
        <table class="tabla" width="400px">
            <tr>
                <th>Código</th>
                <th>Clase</th>
                <th>Asiento</th>
                <th>Vuelo</th>
                <th>Tarjetas de embarque</th>
                <th>Equipajes<th>
            </tr>
            @forelse($tickets as $ticket)
            <tr>
                <td>{{$ticket->codigo}}</td>
                <td>{{$ticket->clase}}</td>
                <td>{{$ticket->asiento}}</td>
                <td><a href="/flight{{$ticket->flight_id}}">{{$ticket->flight_id}}</a></td> 
                <td><a href="/ticket{{$ticket->id}}/boardingpasses">Tarjetas de embarque</a></td>
                <td><a href="/ticket{{$ticket->id}}/packages">Packages</a></td>
            </tr>
            @empty
                <p>No hay tickes disponibles! </p>
            @endforelse
        </table>
        <br>
        <!--<p>Ordenar por:</p>-->
        <h4>Ordenar por:</h4>
        <a href="/ticket/codigoAsc">Código Ascendente</a>
        <a href="/ticket/codigoDesc">Código Descendente</a>
        <a href="/ticket/claseAsc">Clase Ascendente</a>
        <a href="/ticket/claseDesc">Clase Descendente</a>
        <p>{{$tickets->links()}}</p>
    </div>
@endsection