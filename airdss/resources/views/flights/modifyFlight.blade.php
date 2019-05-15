@extends('master')
<head>
    <title>Flights </title>
</head>
@section('contenido')
    <div class="centrado">
        <h1>Modificación de vuelo{{$flight->id}}</h1>
        @if($modificado == 1)
            <div class="alert alert-success" role="alert">
            <strong>¡Excelente!</strong> Vuelo {{$flight->id}} modificado.
            </div>
        @endif
        @if (count($errors) > 0)
            <div class="alert alert-danger" role="alert">
            @foreach ($errors->all() as $error)
            <strong>Error.</strong> {{ $error }}<br>
            @endforeach
            </div>
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
        </form>
    </div>
@endsection