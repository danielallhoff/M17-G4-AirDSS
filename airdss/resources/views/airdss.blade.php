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
        <div class="cards">
            <div class="tarjeta">
                <img src="../images/Puntual.jpg" alt="Avatar" style="width:100%;height:50%">
                <div class="container">
                    <h2><b>Puntual</b></h2> 
                    <p style="font-size:20px">AirDSS se destaca en el sector por ser la compañía más puntual.</p> 
                </div>
            </div>
            <div class="tarjeta">
                <img src="../images/Rapido.jpg" alt="Avatar" style="width:100%;height:50%">
                <div class="container">
                    <h2><b>Sencillo</b></h2> 
                    <p style="font-size:20px">En nuestra web podrás comprar de manera rápida y sencilla tu próximo
                        vuelo.</p> 
                </div>
            </div>
            <div class="tarjeta">
                <img src="../images/Servicio.jpg" alt="Avatar" style="width:100%;height:50%">
                <div class="container">
                    <h2><b>Servicio</b></h2> 
                    <p style="font-size:20px">AirDSS se caracteriza por su excelente servicio y atención al cliente</p> 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection