@extends('adminIndex')
<head>
    <title>Edit Clients </title>
</head>
@section('contenido')

<div class="centrado">
    <h1>Editar Cliente</h1>
    <form method="post", action="/modificarClient{{$cliente->id}}/modify">
        {{ csrf_field() }}
        <label for="dni">DNI:</label>
        <input type="text" name="dni" id="dni" value="{{$cliente->dni}}">
        <br>
        <br>
        <label for="name">Nombre:</label>
        <input type="text" name="name" id="name" value="{{$cliente->name}}">
        <br>
        <br>
        <label for="apellidos">Apellidos:</label>
        <input type="text" name="apellidos" id="apellidos" value="{{$cliente->apellidos}}">
        <br>
        <br>
        <label for="telefono">Teléfono:</label>
        <input type="text" name="telefono" id="telefono" value="{{$cliente->telefono}}">
        <br>
        <br>
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" value="{{$cliente->email}}">
        <br>
        <br>
        <label for="fecha">Fecha de Nacimento:</label>
        <input type="date" name="fecha" id="fecha" value="{{$cliente->fecha}}">
        <br>
        <br>

        @if (count($errors) > 0)
            <p>    
            @foreach ($errors->all() as $error)        
                <li>{{ $error }}</li>    
            @endforeach    
            </p>
        @endif
        <input type="submit", value="Crear/Modificar Usuario">
        <a href="/admin">
        <button type="button">Volver</button>
    
    </form>
</div>

@endsection
