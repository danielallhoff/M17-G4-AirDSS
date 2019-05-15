@extends('master')
    <head><title>Perfil Usuario</title></head>
@section('contenido')
    <div class="centrado">
        <h1>Perfil {{$cliente->nombre}}</h1>
        <div style="overflow-x:auto">
            <table class="cards">
                <tr>
                    <th>DNI:</th> <td>{{$cliente->dni}}</td>
                </tr>
                <tr>
                    <th>Nombre:</th> <td>{{$cliente->name}}</td>
                </tr>
                <tr>
                    <th>Apellidos:</th> <td>{{$cliente->apellidos}}</td>
                </tr>
                <tr>
                    <th>Telefono:</th> <td>{{$cliente->telefono}}</td>
                </tr>
                <tr>
                    <th>Email:</th> <td>{{$cliente->email}}</td>
                </tr>
                <tr>
                    <th>Fecha nacimiento:</th> <td>{{$cliente->fechaNto}}</td>
                </tr>
                <tr>
                    <th>Edad actual:</th> <td>{{$cliente->edad()}}</td>
                </tr>
            </table>
            <br>
            <!--<a href="/profile/change">!-->
                <a href="/modificarClient{{$cliente->id}}/modify">
                <button type="button">Editar perfil</button>
            </a>
        </div>
    </div>
@endsection