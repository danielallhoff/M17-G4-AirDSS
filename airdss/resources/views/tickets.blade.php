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
                <th>Tarjetas de embarque<th>
                <th>Equipajes<th>
            </tr>
            @forelse($tickets as $ticket)
            <tr>
                <td>{{$ticket->codigo}}</td>
                <td>{{$ticket->clase}}</td>
                <td>{{$ticket->asiento}}</td>
                <td><a href="/tickets{{$ticket->id}}/flights">{{$ticket->flight_id}}</a></td>
                <td><a href="/ticket{{$ticket->id}}/boardingpasses">Tarjetas de embarque</a></td>
                <td><a href="/tickets{{$ticket->id}}/packages">Packages</a></td>
            </tr>
            @empty
                <p>No hay tickes disponibles! </p>
            @endforelse
        </table>
        <p>{{$tickets->links()}}</p>
    </div>
@endsection