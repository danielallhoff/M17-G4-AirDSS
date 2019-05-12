@extends('master')
    <head>
        <title>Información | AirDSS</title>
    </head>
@section('contenido')
    <div class="info_container">
        <a>Acerca de nosotros</a>
        <img src="../images/plane.jpg">
        <p>Somos una aerolínea fundada a principios del 2019, nuestro objetivo es permitir a todas las personas poder 
        viajar a diferentes paises sin tener que vaciar la cuenta, esto lo logramos eliminando pasos intermedios para la compra de un viaje como lo son 
        las agencias, mediante nuestra web el cliente podra comprar de manera segura y rapida su siguiente viaje.</p>
        <p>No dude en contactar con nuestro servicio de antencion al cliente si tienen alguna duda.</p>
        <a href="/contacto"><button class="boton_contacto-info" type="button">Contacto</button></a>
    </div>
@endsection