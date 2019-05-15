@extends('adminIndex')
<head>
    <title>Clients </title>
</head>
@section('contenido')
    <div class="centrado">
        <h1>Clientes</h1>
        <div class="buscador">
            <form action="{{url('/admin/client/buscar')}}" method="get">
                {{ csrf_field() }}
                <label for="buscar">Buscador</label>
                <input type="text" name="buscar" id="buscar" PlaceHolder="Busca lo que desees">
                
                <button type="submit">Enviar</button><br>
                <label for="opcion">Elige una opcion para buscar:</label>
                <input type="radio" name="opcion" id="opcion" value="name", checked>Nombre
                <input type="radio" name="opcion" id="opcion" value="dni">DNI
    
            </form>
        </div>
        <div style="overflow-x:auto">
            <table class="tabla" width="400px">
                <tr>
                    <th>DNI</th>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>Telefono</th>
                    <th>Email</th>
                    <th>FechaNacimiento</th>
                    <th>Edad</th>
                    <th>Modificar</th>
                    <th>Eliminar</th>
                </tr>
                @forelse ($clientes as $client)
                <tr>
                    <td>{{$client->dni}}</td>
                    <td>{{$client->name}}</td>
                    <td>{{$client->apellidos}}</td>
                    <td>{{$client->telefono}}</td>
                    <td>{{$client->email}}</td>
                    <td>{{$client->fechaNto}}</td>
                    <td>{{$client->edad()}}</td>
                    <td><a href="/modificarClient{{$client->id}}/modify"> Modificar</a></td>
                    <td><a href="/eliminarClient{{$client->id}}"> Eliminar</a></td>
                </tr>            
                @empty<p>No hay clientes</p>
                @endforelse

            </table>
        </div>
        <br>
        <!--<p>Ordenar por:</p>-->
        Ordenar por:
        <a href="/admin/client/nombreAsc">Nombre Ascendente</a>
        <a href="/admin/client/nombreDesc">Nombre Descendente</a>
        <a href="/admin/client/fechaNacimientoAsc">Fecha Nacimiento Ascendente</a>
        <a href="/admin/client/fechaNacimientoDesc">Fecha Nacimiento Descendente</a>
        <p>{{$clientes->links()}}</p>
    </div>
@endsection

