@extends('master')
<head>
    <title>Administracion AirDSS</title>
</head>
@section('submenu')
@include('menuAdmin')
@endsection
@section('contenido')
    <div class="centrado">
        <div class="container-fluid text-center text-md-left">
            <!-- Grid row -->
            <div class="row">

                <!-- Grid column -->
                <div class="col-md-6 mt-md-0 mt-3">

                    <!-- Content -->
                    <h1 class="text-uppercase">Área administrativa</h1>
                    <p style="font-size:20px;text-align: justify">Siendo administrador podras realizar diferentes operaciones, desde listar clientes hasta añadir aeropuertos. Si tiene cualquier duda
                    comunicarse con el departamento de informatica.</p>

                </div>
                <!-- Grid column -->

                <hr class="clearfix w-100 d-md-none pb-3">

                <!-- Grid column -->
                <div class="col-md-3 mb-md-0 mb-3">

                    <!-- Links -->
                    <h3 class="text-uppercase">Clientes</h3>

                    <ul class="list-unstyled">
                    <li>
                        <a>Listar Clientes</a>
                    </li>
                    <li>
                        <a>Modificar Clientes</a>
                    </li>
                    <li>
                        <a>Eliminiar Clientes</a>
                    </li>
                    </ul>

                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-md-3 mb-md-0 mb-3">

                    <!-- Links -->
                    <h3 class="text-uppercase">Vuelos</h3>

                    <ul class="list-unstyled">
                    <li>
                        <a>Listar Vuelos</a>
                    </li>
                    <li>
                        <a>Añadir Vuelos</a>
                    </li>
                    <li>
                        <a>Modificar Vuelos</a>
                    </li>
                    <li>
                        <a>Eliminar Vuelos</a>
                    </li>
                    </ul>

                </div>
                <!-- Grid column -->

            </div>
            <!-- Grid row -->

            <!-- Grid row -->
            <div class="row">
                <!-- Grid column -->
                <div class="col-md-6 mt-md-0 mt-3">
                </div>
                <!-- Grid column -->
                <hr class="clearfix w-100 d-md-none pb-3">

                <!-- Grid column -->    
                <div class="col-md-3 mb-md-0 mb-3">

                    <!-- Links -->
                    <h3 class="text-uppercase">Aviones</h3>

                    <ul class="list-unstyled">
                    <li>
                        <a>Listar Aviones</a>
                    </li>
                    <li>
                        <a>Añadir un Avión</a>
                    </li>
                    <li>
                        <a>Modificar un Avión</a>
                    </li>
                    <li>
                        <a>Eliminar un Avión</a>
                    </li>
                    <li>
                        <a >Vuelos de un Avión</a>
                    </li>
                    </ul>

                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-md-3 mb-md-0 mb-3">

                    <!-- Links -->
                    <h3 class="text-uppercase">Aeropuerto</h4>

                    <ul class="list-unstyled">
                    <li>
                        <a>Listar Aeropuertos</a>
                    </li>
                    <li>
                        <a>Añadir un Aeropuerto</a>
                    </li>
                    <li>
                        <a>Eliminar un Aeropuerto</a>
                    </li>
                    </ul>

                </div>
                <!-- Grid column -->
            </div>
            <!-- Grid row -->
        </div>
    </div>


@endsection