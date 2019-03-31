@extends('adminIndex')
<head>
    <title>Clients </title>
</head>
@section('contenido')
    <div class="centrado">
        <h1>Clientes</h1>
        <table class="tabla" width="400px">
            <tr>
                <th>DNI</th>
                <th>Nombre</th>
                <th>Apellidos</th>
                <th>Telefono</th>
                <th>Email</th>
                <th>FechaNacimiento</th>
                <th>Modificar</th>
                <th>Eliminar</th>
            </tr>
            @forelse ($clientes as $client)
            <tr>
                <td>{{$client->dni}}</td>
                <td>{{$client->nombre}}</td>
                <td>{{$client->apellidos}}</td>
                <td>{{$client->telefono}}</td>
                <td>{{$client->email}}</td>
                <td>{{$client->fechaNto}}</td>
                <td><a href="/modificarClient{{$client->id}}"> Modificar</a></td>
                <td><a href="/eliminarClient{{$client->id}}"> Eliminar</a></td>
            </tr>            
            @empty<p>No hay clientes</p>
            @endforelse

        </table>
        <br>
        <p>Ordenar por:</p>
        <a href="/client/orderBy/apellido">Nombre</a>
        <a href="/client/orderBy/fechaNacimiento">Fecha Nacimiento</a>
        <p>{{$clientes->links()}}</p>
    </div>
@endsection