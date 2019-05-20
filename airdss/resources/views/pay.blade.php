@extends('master')
<head>
    <title>Pagar vuelo {{$flight->airportOrigen->codigo}}-{{$flight->airportOrigen->ciudad}}</title>
</head>
@section('contenido')
    <div class="centrado">
        <form action="/flight{{$flight->id}}/pay" method="post">
                {{ csrf_field() }}
            <h1>Pagar tu vuelo</h1>
            <table class="tablaInvisible" width="400px" cellpadding="20">
                <input type="hidden" name ="id" value="{{$flight->id}}">
                <input type="hidden" name ="asiento"value="{{$asiento}}">
                <input type="hidden" name ="equipaje" value="{{$equipaje}}">
                <tr>
                    <th>Titular:</th>
                    <th><input type="text" name="titular" PlaceHolder="Titular"></th>
                </tr>
                <tr>
                    <th>IBAN:</th>
                    <th><input type="text" name="iban" PlaceHolder="IBAN"></th>
                </tr>
                <tr>
                    <th>CVV:</th>
                    <th><input type="text" name="cvv" maxlength="3" PlaceHolder="CVV"></th>
                </tr>
                <tr>
                    <th>Asiento: </th>
                    <th>{{$asiento}}</th>
                </tr>
                <tr>
                    <th>Equipaje: </th>
                    <th>{{$equipaje}}</th>
                </tr>
                <tr>
                    <th>Precio: </th>
                    @if($equipaje == 1)
                    <th>{{$flight->precio + 10}}€</th>
                    @else
                    <th>{{$flight->precio}}€</th>
                    @endif
                    
                </tr>
                
                <tr>
                    <th><button type="submit" class="btn btn-primary">Pagar</button></th>
                    <th><a href="/flights" >
                    <button type="button" class="btn btn-primary">Cancelar</button>
                    </a></th>
                </tr>
            </table>
        </form>
    </div>
@endsection