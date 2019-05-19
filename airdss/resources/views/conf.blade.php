@extends('master')
<head>
    <title>Configuración vuelo {{$flight->airportOrigen->codigo}}-{{$flight->airportOrigen->ciudad}}</title>
</head>
@section('contenido')
    <div class="centrado">
        <form action="/flight{{$flight->id}}/buy" method="post">
                    {{ csrf_field() }}
            <h1>Configura tu vuelo</h1>
            <table class="tablaInvisible" width="400px" cellpadding="20">
                <tr>
                    <input type="hidden" name="id" value="{{$flight->id}}"> 
                    <th>Selecciona tu asiento</th>
                    <th>
                        <select name="asiento">
                            @foreach ($flight->ticketsDisponibles() as $ticket)
                                <option value="{{$ticket}}">{{$ticket}}</option>
                            @endforeach
                        </select>
                </tr>
                <tr>
                    <th>¿Llevará equipaje?</th>
                    <th>Si <input type="radio" name="equipaje" value="si"> No <input type="radio" name="equipaje" value="no" checked="checked"></th>

                </tr>
                <tr>
                    <th><button type="submit" class="btn btn-primary">Comprar</button></th>
                    <th><a href="/flights" >
                    <button type="button" class="btn btn-primary">Cancelar</button>
                    </a></th>
                </tr>
                @if (count($errors) > 0)
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
                @endif
            </table>
        </form>    
    </div>
@endsection