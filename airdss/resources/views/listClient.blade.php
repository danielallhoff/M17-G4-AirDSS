@extends('master')
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
            @forelse ($clients as $client)
                <td>{{$client->dni}}</td>
                <td>{{$client->nombre}}</td>
                <td>{{$client->apellidos}}</td>
                <td>{{$client->telefono}}</td>
                <td>{{$client->email}}</td>
                <td>{{$client->}}</td>
                <td></td>
                <td></td>
            @empty<p>No hay clientes</p>
            @endforelse
            <tr>
            </tr>
        </table>
    </div>
@endsection