@extends('adminIndex')
<head>
    <title>Alta de avión</title>
</head>
@section('contenido')
    <div class="centrado">
        <h1>Alta de avión</h1>
        <form method="post" action="/planes/addPlane">
            {{ csrf_field() }}
            @if($cre)
            <div class="alert alert-success" role="alert">
            <strong>¡Excelente!</strong> Avión creado correctamente.
            </div>
            @endif
            @if (count($errors) > 0)
                <div class="alert alert-danger" role="alert">
                @foreach ($errors->all() as $error)
                <strong>Error.</strong> {{ $error }}<br>
                @endforeach
                </div>
            @endif
            <label for="modelo">Modelo:</label>
            <input type="text" name="modelo" id="modelo" value="{{ old('modelo')}}">
            <br><br>
            <label for="capacidad">Capacidad:</label>
            <input type="text" name="capacidad" id="capacidad" value="{{old('capacidad')}}">
            <br><br>
            <label for="distancia">Distancia de vuelo:</label>
            <input type="text" name="distancia" id="distancia" value="{{old('distancia')}}">
            <br>
            <button type="submit">Añadir</button>
            <a href="/planes">
            <button type="button">Volver</button>
            </a>
        </form>
    </div>
@endsection