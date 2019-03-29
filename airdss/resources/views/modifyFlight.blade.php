@extends('master')
<head>
    <title>Flights </title>
</head>
@section('contenido')
    <div class="centrado">
        <h1>Modificación de avión{{$flight->id}}</h1>
        <form action="" method="POST">
            <table class="tabla" width="400px">
                <tr>
                    <td><label for="Aeropuerto origen">Aeropuerto origen</label></td>
                    <td><input type="text" id="AeropuertoOrigen"></td>
                </tr>
                <tr>
                    <td><label for="Aeropuerto destino">Aeropuerto origen</label></td>
                    <td><input type="text" id="AeropuertoDestino"></td>
                </tr>
                <tr>
                    <td><label for="Fecha salida">Fecha salida</label></td>
                    <td><input type="date" id="fechaSalida"></td>
                </tr>
                <tr>
                    <td><label for="Fecha llegada">Fecha llegada</label></td>
                    <td><input type="date" id="fechaLlegada"></td>
                </tr>
                <tr>
                    <td><button type="submit">Enviar</button></td>
                </tr>
            </table>
        </form>
    </div>
@endsection