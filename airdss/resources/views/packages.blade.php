@extends('master')
@section('contenido')
    <div class="centrado">
        <h1>Equipaje</h1>
        <table class="tabla" width="400px">
            <tr>
                <th>Peso</th>
                <th>Ancho</th>
                <th>Largo</th>
                <th>Alto</th>
            </tr>
            @forelse($packages as $package)
            <tr>
                <td>{{$package->peso}}</td>
                <td>{{$package->ancho}}</td>
                <td>{{$package->largo}}</td>
                <td>{{$package->alto}}</td>
            </tr>
            @empty
                <p>No hay eqipaje facturado disponibles!</p>
            @endforelse
        </table>
        <p>{{$packages->links()}}</p>

    </div>
@endsection