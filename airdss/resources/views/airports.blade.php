@extends('master')
@section('contenido')
    <div class="centrado">
        <h1>Aeropuertos</h1>
        <table class="tabla" width="400px">
            <tr>
                <th>Código</th>
                <th>Ciudad</th>
            </tr>
            @forelse($airports as $airport)
            <tr>
                <td>{{$airport->codigo}}</td>
                <td>{{$airport->ciudad}}</td>
            </tr>
            @empty
                <p>No hay aeropuertos disponibles! </p>
            @endforelse
        </table>
        <p>{{$airports->links()}}</p>

    </div>
@endsection