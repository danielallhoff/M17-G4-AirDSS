@extends('master')
    <head><title>Perfil Usuario</title></head>
@section('contenido')
    <div class="centrado">
        <h1>Perfil {{$cliente->nombre}}</h1>
        <div style="overflow-x:auto">
            <table class="tabla">
                <tr>
                    <td>DNI: {{$cliente->dni}}</td>
                    <td>Nombre: {{$cliente->nombre}}</td>
                    <td>Apellidos: {{$cliente->apellidos}}</td>
                    <td>Telefono: {{$cliente->telefono}}</td>
                    <td>Email: {{$cliente->email}}</td>
                    <td>Fecha nacimiento: {{$cliente->fechaNto}}</td>
                    <td>Edad actual: {{$cliente->edad()}}</td>
                </tr>
            </table>
        </div>
    </div>
@endsection