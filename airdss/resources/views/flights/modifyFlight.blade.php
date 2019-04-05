@extends('master')
<head>
    <title>Flights </title>
</head>
@section('contenido')
    <div class="centrado">
        <h1>Modificación de avión{{$flight->id}}</h1>
        @if($modificado == 1)
            <p>Avión{{$flight->id}} modificado correctamente</p>
        @endif
        <form method="post" action="/flight{{$flight->id}}/modify" >
            {{ csrf_field() }}
            <table class="tabla">
                <tr>
                    <td><label for="Aeropuerto origen">Aeropuerto origen</label></td>
                    <td>
                        <select name="origen">
                        @foreach ($airports as $airport)
                                @if ($airport->id == $flight->airportOrigen->id)
                                    <option value="{{$airport->id}}" selected>{{$airport->codigo}}-{{$airport->ciudad}}</option>
                                @else
                                    <option value="{{$airport->id}}">{{$airport->codigo}}-{{$airport->ciudad}}</option>
                                @endif
                            @endforeach
                        </select>
                    </td>                    
                </tr>
                <tr>
                    <td><label for="Aeropuerto destino">Aeropuerto destino</label></td>
                    <td>
                        <select name="destino">
                            @foreach ($airports as $airport)
                                @if ($airport->id == $flight->airportDestino->id)
                                    <option value="{{$airport->id}}" selected>{{$airport->codigo}}-{{$airport->ciudad}}</option>
                                @else
                                    <option value="{{$airport->id}}">{{$airport->codigo}}-{{$airport->ciudad}}</option>
                                @endif
                            @endforeach
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><label for="Capacidad">Capacidad</label></td>
                    <td><input type="text" name="capacidad" id="capacidad" value="{{$flight->capacidad}}"></td>
                </tr>
                <tr>
                    <td><label for="Fecha salida">Fecha salida</label></td>
                    <td><input type="datetime" name="salida" id="salida" value="{{$flight->fecha_salida}}"></td>
                </tr>
                <tr>
                    <td><label for="Fecha llegada">Fecha llegada</label></td>
                    <td><input type="datetime" name="llegada" id="llegada" value="{{$flight->fecha_llegada}}"></td>
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
            <ul id="errores">
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
            @endif
        </form>
    </div>
@endsection