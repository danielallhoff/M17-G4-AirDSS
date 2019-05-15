@extends('adminIndex')
<head>
    <title>Equipaje</title>
</head>
@section('contenido')
    <div class="centrado">
        <h1>Equipajes</h1>
        <div style="overflow-x:auto">
            <table class="tabla" width="400px">
                <tr>
                    <th>Peso</th>
                    <th>Ancho</th>
                    <th>Largo</th>
                    <th>Alto</th>
                    <th>Volumen</th>
                    <th>Eliminar</th>
                </tr>
                @forelse($packages as $package)
                <tr>
                    <td>{{$package->peso}}</td>
                    <td>{{$package->ancho}}</td>
                    <td>{{$package->largo}}</td>
                    <td>{{$package->alto}}</td>
                    <td>{{$package->volumen()}}</td>
                    <td><a href="/package{{$package->id}}/remove">Eliminar</a></td>
                </tr>
                @empty
                <div class="alert alert-info" role="alert">
                <strong>0 equipajes.</strong> No hay equipajes existentes.
                </div>
                @endforelse
            </table>
        </div>
        <br>
        <p>{{$packages->links()}}</p>
    </div>
@endsection