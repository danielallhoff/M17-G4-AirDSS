@extends('master')
<head>
    <title>Configuración vuelo {{$flight->airportOrigen->codigo}}-{{$flight->airportOrigen->ciudad}}</title>
</head>
@section('contenido')
    <div class="centrado">
        <form action="/flight{{$flight->id}}/conf" method="post">
                    {{ csrf_field() }}
            <h1>Configura tu vuelo</h1>
            <table class="tablaInvisible" width="400px">
                <tr>
                    <th>Selecciona tu clase</th>
                    <th><input list="clases" name="clase" PlaceHolder="Clase"></th>
                    <datalist id="clases">
                        <option value="Alta">
                        <option value="Media">
                        <option value="Baja">
                    </datalist> 
                </tr>
                <tr>
                    <th>Selecciona tu asiento</th>
                    <th><input type="asientos" name="asiento" PlaceHolder="Asiento"></th>
                    <datalist id="asientos">
                        @foreach $asiento in $flight->asientos
                            <option value="{{$asiento->clase - $asiento->id}}">
                        @endforeach

                    </datalist> 
                </tr>
                <tr>
                    <th>¿Llevará equipaje?</th>
                    <th>Si<input type="radio" name="equipaje" value="si">No<input type="radio" name="equipaje" value="no"></th>

                </tr>
                <tr>
                    <th><button type="submit">Comprar</button></th>
                    <th><a href="/flights">Cancelar</a></th>
                </tr>
            </table>
        </form>    
    </div>
@endsection