@extends('master')
<head>
    <title>Crear Cliente</title>
</head>
@section('contenido')

<div class="centrado">
    <h1>Crear Cliente</h1>
    <form method="post", action="/createClient">
        {{ csrf_field() }}
        <label for="dni">DNI:</label>
        <input type="text" name="dni" id="dni" value="{{old('dni')}}">
        <br>
        <br>
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre" value="{{old('nombre')}}">
        <br>
        <br>
        <label for="apellidos">Apellidos:</label>
        <input type="text" name="apellidos" id="apellidos" value="{{old('apellidos')}}">
        <br>
        <br>
        <label for="telefono">Teléfono:</label>
        <input type="text" name="telefono" id="telefono" value="{{old('telefono')}}">
        <br>
        <br>
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" value="{{old('email')}}">
        <br>
        <br>
        <label for="fecha">Fecha de Nacimento:</label>
        <input type="date" name="fecha" id="fecha" value="{{old('fecha')}}">
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
       <!-- <input type="submit", value="Crear/Modificar Usuario", onclick="msg()"> 
        <script>
            function msg() {
            alert("Usuario Creado");
            }
        </script>-->
    
    </form>
</div>

@endsection