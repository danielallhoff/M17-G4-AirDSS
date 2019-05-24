@extends('master')
<head>
    <title>Flights </title>
    <!--Puede que no hagan falta-->
    
</head>
@section('contenido')

    <section>
        <div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="https://www.ecestaticos.com/imagestatic/clipping/6fb/cd5/6fbcd51b2e01c1ca35c707276f862d7c/las-sorprendentes-razones-por-las-que-los-aviones-son-blancos.jpg?mtime=1516116985" class="d-block w-100 h-50" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="http://informativojuridico.com/wp-content/uploads/2017/08/aviones.jpg" class="d-block w-100 h-50" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="https://conocedores.com/wp-content/uploads/2017/08/avion-blanco-06082017.jpg" class="d-block w-100 h-50" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="https://cdn-3.expansion.mx/dims4/default/9c88694/2147483647/strip/true/crop/724x483+0+0/resize/800x534!/quality/90/?url=https%3A%2F%2Fcherry-brightspot.s3.amazonaws.com%2F0e%2Fea%2F4169f6b94c50a54cbbc2ad6b4c78%2Fistock-537714779.jpg" class="d-block w-100 h-50" alt="...">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </section>
    <section class="search-sec">
        <div class="container">
            <form action="{{url('/flights/buscar')}}" method="post">
            {{ csrf_field() }}
                <div class="row">
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-lg-3 col-md-3 col-sm-12 p-0">
                                <select name ="origen" id="origen" class="form-control search-slt">
                                @forelse($airports as $ai)
                                    <option value={{$ai['ciudad']}} >{{$ai['ciudad']}}</option>
                                @empty
                                <div class="alert alert-danger" role="alert"><p>No hay vuelos disponibles!</p></div>
                                @endforelse
                                </select>
                            </div>
                            
                            <div class="col-lg-3 col-md-3 col-sm-12 p-0">
                                <select name ="destino" id="destino" class="form-control search-slt">
                                @forelse($airports as $airport)
                                    <option value={{$airport['ciudad']}} >{{$airport['ciudad']}}</option>
                                @empty
                                <div class="alert alert-danger" role="alert"><p>No hay vuelos disponibles!</p></div>
                                @endforelse
                                </select>
                            </div>


                            <div class="col-lg-3 col-md-3 col-sm-12 p-0">
                                <button type="submit" class="btn btn-danger wrn-btn"> Buscar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
    <div class="centrado">
        @if (Auth::check() && Auth::user()->esAdministrador())
        <h1>Vuelos de la compañía</h1>
        <a href="/flights/add">
            <button type="button">Añadir vuelo</button>
        </a>
        @else
        <h1>Comprar vuelos</h1>
        @endif        
        <div style="overflow-x:auto">
            <table class="tabla">
                <tr>
                    <th>Aeropuerto origen</th>
                    <th>Aeropuerto destino</th>
                    
                    <th>Fecha salida</th>
                    <th>Fecha llegada</th>
                    <th>Estado</th>
                    @if (Auth::check())                
                        @if (Auth::user()->esAdministrador())
                        <th>Modificar</th>
                        <th>Eliminar</th>
                        @else
                        <th>Precio</th>
                        <th>Comprar</th>
                        @endif
                    @else
                    <th>Precio</th>
                    <th>Comprar</th>
                    @endif
                    
                </tr>
                @forelse($flights as $flight)
                <tr>
                    <!--<td><a href="/airport{{$flight->airportOrigen->id}}"> {{$flight->airportOrigen->codigo}}-{{$flight->airportOrigen->ciudad}}</a></td>-->
                    <td>{{$flight->airportOrigen->ciudad}}</td>
                    <td>{{$flight->airportDestino->ciudad}}</td>                    
                    <td>{{$flight->fecha_salida}}</td>
                    <td>{{$flight->fecha_llegada}}</td>
                    @if($flight->cancelado)
                    <td><div class="alert alert-danger" role="alert">Cancelado</div></td>
                    @elseif($flight->capacidadRestante() == 0)
                    <td><div class="alert alert-danger" role="alert">Agotado</div></td>
                    @else
                    <td><div class="alert alert-info" role="alert">Libre</div></td>
                    @endif
                    <td>{{$flight->precio}}€</td>
                    @if (Auth::check())                
                        @if (Auth::user()->esAdministrador())
                        <td><a href="/flight{{$flight->id}}/modify"> Modificar</a></td>
                        <td><a href="/flight{{$flight->id}}/remove"> Eliminar</a></td>
                        @else
                            @if(!$flight->cancelado && $flight->capacidadRestante() > 0)
                             <td><a href="/flight{{$flight->id}}/buy"> Comprar</a></td>
                            @else
                             <td> </td>
                            @endif
                        @endif
                    @else
                    <td><a href="/login"> Comprar</a></td>
                    @endif
                </tr>
                @empty
                    <p>No hay vuelos disponibles! </p>
                @endforelse
            </table>
        </div>
        <br>
        Ordenar por: 
        <a href="/flights/orderBy/origin">Aeropuerto Origen</a>
        <a href="/flights/orderBy/salida">Fecha salida</a>
        <p>{{$flights->links()}}</p>
    </div>
@endsection