@extends('master')
<head>
    <title>Tickets</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>
@section('contenido')
<div class="container-fluid">
    <div class="centrado">
            @if ($compra == 0)
                <div class="alert alert-info" role="alert">
                    La compra no ha podido realizarse!
                </div> 
            @elseif($compra == 1)
                <div class="alert alert-info" role="alert">
                    La compra ha podido realizarse!
                </div> 
            @endif
        <h1>{{Auth::user()->name}}  estos son tus Tickets</h1>
        <div style="overflow-x:auto">
            <table class="tabla" width="400px">
                <tr>
                    <th>Código</th>
                    <th>Vuelo</th>
                    <th>Fecha compra </th>
                    <th>Tarjetas de embarque</th>
                    <th>Equipajes</th>
                    <th>Estado </th>
                    @if(Auth::user()->esAdmin == 1)
                    <th>Eliminar</th>
                    @endif
                </tr>
                @forelse($tickets as $ticket)
                <tr>
                    <td>{{$ticket->codigo}}</td>
                    <td>{{$ticket->origen}} - {{$ticket->destino}}</td>
                    <td>{{$ticket->fecha}}</td>
                    <td><a href="/ticket{{$ticket->id}}/boardingpasses">Tarjetas de embarque</a></td>
                    <td><a href="/ticket{{$ticket->id}}/packages">Packages</a></td>
                    @if($ticket->flight->cancelado)
                    <td><div class="alert alert-danger" role="alert">Cancelado</div></td>
                    @else
                    <td><div class="alert alert-info" role="alert">OK</div></td>
                    @endif
                    @if(Auth::user()->esAdmin == 1)
                        <td><a href="#">Modificar</a></td>
                        <td><a href="/ticket{{$ticket->id}}/remove">Eliminar</a></td>
                    @endif
                </tr>
                @empty
                <div class="alert alert-info" role="alert">
                    <strong>0 tickets.</strong> No hay tickes disponibles. 
                </div> 
                @endforelse
            </table>
        </div>
        <br>
        <!--<p>Ordenar por:</p>-->
        <h4>Ordenar por:</h4>
        <a href="/ticket/codigoAsc{{Auth::user()->id}}">
            <button class="boton_filtrar" type="button">Código Ascendente</button>
        </a>
        <a href="/ticket/codigoDesc{{Auth::user()->id}}">
            <button class="boton_filtrar" type="button">Código Descendente</button>
        </a>
        <a href="/ticket/fechaAsc{{Auth::user()->id}}">
            <button class="boton_filtrar" type="button">Fecha Ascendente</button>
        </a>
        <a href="/ticket/fechaDesc{{Auth::user()->id}}">
            <button class="boton_filtrar" type="button">Fecha Descendente</button>
        </a>
        <p>{{$tickets->links()}}</p>
    </div>
</div>
@endsection