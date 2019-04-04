@extends('master')
<head>
    <title>Administracion AirDSS</title>
</head>
@section('submenu')
@include('menuAdmin')
@endsection
@section('contenido')
    <div class="areaAdmin">
        <p style="font-size:70px;color:white">Área administrativa</p>
        <p style="font-size:30px;color:white">Opciones:</p>
        <table class="optionTabla" width="400px">
        <tr>
            <td>- Listar clientes</td>
            <td>- Listar aviones</td>
        </tr>
        <tr>
            <td>- Añadir vuelo</td>
            <td>- Añadir avión</td>
        </tr>
        <tr>
            <td>- Modificar datos vuelo</td>
            <td>- Modificar datos avion</td>
        </tr>
        <tr>
            <td>- Eliminar vuelos</td>
            <td>- Eliminar avion</td>
        </tr>
        </table>
    </div>

@endsection