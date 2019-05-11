@extends('master')
<head>
    <title>Equipaje | Ticket {{$ticket->id}}</title>
</head>
@section('contenido')
    <div class="centrado">
        <h1>Equipaje del Ticket {{$ticket->id}}</h1>
        <table class="tabla" width="400px">
            <tr>
                <th>Peso</th>
                <th>Ancho</th>
                <th>Largo</th>
                <th>Alto</th>
                <th>Volumen</th>
                <th>Eliminar </th>
            </tr>
            @forelse($packages as $package)
            <tr>
                <td>{{$package->peso}}</td>
                <td>{{$package->ancho}}</td>
                <td>{{$package->largo}}</td>
                <td>{{$package->alto}}</td>
                <td>{{$package->volumen()}}</td>
                <td><a href="/package{{$package->id}}/remove"><button class="button_tabla" type="button">Eliminar</button></a></td>
            </tr>
            @empty
                <p>No hay equipaje facturado con este Ticket!</p>
            @endforelse
        </table>
        <br>
        <!--<p>Ordenar por:</p>-->
        <h4>Ordenar por:</h4>
        <a href="/ticket{{$ticket->id}}/packages/pesoAsc"><button class="boton_filtrar" type="button">Peso Ascendente</button></a>
        <a href="/ticket{{$ticket->id}}/packages/pesoDesc"><button class="boton_filtrar" type="button">Peso Descendente</button></a>
        <p>{{$packages->links()}}</p>
    </div>
@endsection