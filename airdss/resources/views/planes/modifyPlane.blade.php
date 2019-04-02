@extends('adminIndex')
<head>
    <title>Modificación de avión {{$plane->id}}</title>
</head>
@section('contenido')
    <div class="centrado">
        <h1>Modificación de avión {{$plane->id}}</h1>
        <form method="post" action="/plane{{$plane->id}}/modify">
            {{ csrf_field() }}
            @if($mod)
                <p>Avión {{$plane->id}} modificado</p>
            @endif
            <label for="modelo">Modelo:</label>
            <input type="text" name="modelo" id="modelo" value={{$plane->modelo}}>
            <br><br>
            <label for="capacidad">Capacidad:</label>
            <input type="text" name="capacidad" id="capacidad" value={{$plane->capacidad}}>
            <br><br>
            <label for="distancia">Distancia de vuelo:</label>
            <input type="text" name="distancia" id="distancia" value={{$plane->distancia_Vuelo}}>
            <br>
            @if (count($errors) > 0)
                <p>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
                </p>
            @endif
            <br>
            <button type="submit">Modificar</button>
            <a href="/planes">
            <button type="button">Volver</button>
            </a>
        </form>
    </div>
@endsection