@extends('master')
<head>
    <title>Pagar vuelo {{$flight->airportOrigen->codigo}}-{{$flight->airportOrigen->ciudad}}</title>
</head>
@section('contenido')
    <div class="centrado">
        <form action="/flight{{$flight->id}}/pay" method="post">
                {{ csrf_field() }}
            <h1>Pagar tu vuelo</h1>
            <table class="tablaInvisible" width="400px">
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
                    <th>Precio: </th>
                    <th>20$</th>
                </tr>
                <tr>
                    <th><button type="submit">Pagar</button></th>
                    <th><a href="/flights">Cancelar</a></th>
                </tr>
            </table>
        </form>
    </div>
@endsection