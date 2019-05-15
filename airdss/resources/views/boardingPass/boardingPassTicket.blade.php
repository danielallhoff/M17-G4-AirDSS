@extends('master')
<head>
    <title>Tarjetas de embarque del Ticket{{$ticket->id}}</title>
</head>
@section('contenido')
    <div class="centrado">
        <h1>Tarjetas de embarque del Ticket{{$ticket->id}}</h1>
        <div style="overflow-x:auto">
        <table class="tabla">
            <tr>
                <th>Asiento</th>
                <th>Puerta</th>
                <th>Fecha</th>
                <th>Embarque</th>
                <th>Llegada</th>
            </tr>
            @forelse($boardingPasses as $pass)
            <tr>
                <td>{{$pass->asiento}}</td>
                <td>{{$pass->puerta}}</td>
                <td>{{$pass->fecha}}</td>
                <td>{{$pass->embarque}}</td>
                <td>{{$pass->llegada}}</td>
            </tr>
            @empty
            <div class="alert alert-info" role="alert">
                <strong>0 tarjetas de embarque.</strong> No hay tarjetas de embarque disponibles para este ticket
            </div>
            @endforelse
        </table>
        </div>
    </div>
@endsection