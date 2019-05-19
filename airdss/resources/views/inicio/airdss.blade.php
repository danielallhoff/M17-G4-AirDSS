@extends('master')
    <head>
        <title>Inicio | Bienvenido</title>
    </head>
@section('contenido')
<div class="container-fluid">
    <div class="centrado">
        <div class="intro">
            <p style="font-size:70px;color:white">Bienvenido a AirDSS</p>
            <p style="font-size:30px;color:white">Le damos vuelo a tus sueños.</p>
        </div>
        @if(Auth::check() && Auth::user()->esAdmin)
            <div class="alert alert-danger" role="alert">
                @foreach ($flights->all() as $flight)
                    <strong>ATENCIÓN,</strong> 
                    <p>El vuelo {{$flight->id}}, {{$flight->fecha_salida}}, se ha cancelado. Debe informar a los pasajeros de la cancelación y 
                    posibilidades de reubicación.</p>
                @endforeach
            </div>
        @endif
        <div class="cards">
            <div class="card-deck">
                <div class="card">
                    <img class="card-img-top" src="../images/Puntual.jpg" alt="Card image cap">
                    <div class="card-body">
                    <h5 class="card-title"><b>Puntual</b></h5>
                    <p class="card-text">AirDSS se destaca en el sector por ser la compañía más puntual.</p>
                    </div>
                </div>
                <div class="card">
                    <img class="card-img-top" src="../images/Rapido.jpg" alt="Card image cap">
                    <div class="card-body">
                    <h5 class="card-title"><b>Sencillo</b></h5>
                    <p class="card-text">En nuestra web podrás comprar de manera rápida y sencilla tu próximo
                            vuelo.</p>
                    </div>
                </div>
                <div class="card">
                    <img class="card-img-top" src="../images/Servicio.jpg" alt="Card image cap">
                    <div class="card-body">
                    <h5 class="card-title"><b>Servicio</b></h5>
                    <p class="card-text">AirDSS se caracteriza por su excelente servicio y atención al cliente</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
<!-- php artisan serve --host=some.other.domain --port=8001 -->