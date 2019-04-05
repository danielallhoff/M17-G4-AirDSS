@extends('master')
<head>
    <title>Add Flights </title>
</head>
@section('contenido')
    <div class="centrado">
        <h1>Añadir vuelo</h1>
        <form action="/flights/add" method="post">
            {{ csrf_field() }}
            <table class="tabla">
                <tr>
                    <td><label for="Aeropuerto origen">Aeropuerto origen</label></td>
                    <td>
                        <select name="origen">
                        @foreach ($airports as $airport)   
                            <option value="{{$airport->id}}">{{$airport->codigo}}-{{$airport->ciudad}}</option>
                        @endforeach
                        </select>
                    </td>                    
                </tr>
                <tr>
                    <td><label for="Aeropuerto destino">Aeropuerto origen</label></td>
                    <td>
                        <select name="destino">
                            @foreach ($airports as $airport)
                                    <option value="{{$airport->id}}">{{$airport->codigo}}-{{$airport->ciudad}}</option>
                            @endforeach
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><label for="Capacidad">Capacidad</label></td>
                    <td><input type="text" name="capacidad" id="capacidad"></td>
                </tr>
                <tr>
                    <td><label for="Fecha salida">Fecha salida(D/M/Y H:m)</label></td>
                    <td><input type="datetime" name="salida" id="salida"></td>
                </tr>
                <tr>
                    <td><label for="Fecha llegada">Fecha llegada(D/M/Y H:m)</label></td>
                    <td><input type="datetime" name="llegada" id="llegada"></td>
                </tr>
                    
                <tr>
                    <td><button type="submit">Enviar</button></td>
                    <td>
                        <a href="/flights">
                            <button type="button">Volver</button>
                        </a>
                    </td>
                </tr>
            </table>
            <br>
            @if (count($errors) > 0)
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
            @endif
        </form>
    </div>
@endsection