@extends('adminIndex')
<head>
    <title>Aeropuertos</title>
</head>
@section('contenido')
    <div class="centrado">
        <h1>Aeropuertos</h1>
        <table class="tabla" width="400px">
            <tr>
                <th>Código</th>
                <th>Ciudad</th>
                <th>Eliminar</th>
            </tr>
            @forelse($airports as $airport)
            <tr>
                <td>{{$airport->codigo}}</td>
                <td>{{$airport->ciudad}}</td>
                <td><a href="/airport{{$airport->id}}/remove">Eliminar</a></td>
            </tr>
            @empty
                <p>No hay aeropuertos disponibles! </p>
            @endforelse
        </table>
        <p>{{$airports->links()}}</p>

    </div>
@endsection