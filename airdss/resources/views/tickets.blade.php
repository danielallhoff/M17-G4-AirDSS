@extends('master')
<head>
    <title>Tickets</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>
@section('contenido')
<div class="container-fluid">
    <div class="centrado">
        <h1>{{Auth::user()->name}}  estos son tus Tickets</h1>
        <div style="overflow-x:auto">
            <table class="tabla" width="400px">
                <tr>
                    <th>Código</th>
                    <th>Clase</th>
                    <th>Asiento</th>
                    <th>Vuelo</th>
                    <th>Tarjetas de embarque</th>
                    <th>Equipajes</th>
                    @if(Auth::user()->esAdmin == 1)
                    <th>Eliminar</th>
                    @endif
                </tr>
                @forelse($tickets as $ticket)
                <tr>
                    <td>{{$ticket->codigo}}</td>
                    <td>{{$ticket->clase}}</td>
                    <td>{{$ticket->asiento}}</td>
                    <!-- <td><a href="/flight{{$ticket->flight_id}}">{{$ticket->flight_id}}</a></td> -->
                    <td>{{$ticket->flight_id}}</td>
                    <td><a href="/ticket{{$ticket->id}}/boardingpasses">Tarjetas de embarque</a></td>
                    <td><a href="/ticket{{$ticket->id}}/packages">Packages</a></td>
                    @if(Auth::user()->esAdmin == 1)
                        <td><a href="/ticket{{$ticket->id}}/remove">Eliminar</a></td>
                    @endif
                </tr>
                @empty
                    <p>No hay tickes disponibles! </p>
                @endforelse
            </table>
        </div>
        <br>
        <!--<p>Ordenar por:</p>-->
        <h4>Ordenar por:</h4>
        <a href="/ticket/codigoAsc">
            <button class="boton_filtrar" type="button">Código Ascendente</button>
        </a>
        <a href="/ticket/codigoDesc">
            <button class="boton_filtrar" type="button">Código Descendente</button>
        </a>
        <a href="/ticket/claseAsc">
            <button class="boton_filtrar" type="button">Clase Ascendente</button>
        </a>
        <a href="/ticket/claseDesc">
            <button class="boton_filtrar" type="button">Clase Descendente</button>
        </a>
        <p>{{$tickets->links()}}</p>
    </div>
</div>
@endsection