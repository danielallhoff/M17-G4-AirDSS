@extends('master')
<head>
    <title>Equipaje | Ticket {{$ticket->id}}</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</head>
@section('contenido')
    <div class="centrado">
        <h1>Equipaje del Ticket {{$ticket->id}}</h1>
        <table class="table" width="400px">
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