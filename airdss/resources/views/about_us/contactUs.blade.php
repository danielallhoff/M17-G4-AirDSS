@extends('master')
<head>
    <title>Contactanos</title>
</head>
@section('contenido')
        <div class="info_container">
            <h1>Contacte con nosotros</h1>
            <p>Tiene los siguientes medios a su disposición</p>
        </div>
        
        <div class="cards">
            <div class="tarjeta">
                <img src="../images/movil.png" alt="smartphone" style="width:80%;height:50%;">
                <div class="container">
                    <h2><b>Telefono AirDSS</b></h2> 
                    <p style="font-size:20px">684529875</p> 
                </div>
            </div>

            <div class="tarjeta">
                <img src="../images/correo-electronico.jpg" alt="correo-electronico" style="width:98%;height:50%">
                <div class="container">
                    <h2><b>Correo electrónico AirDSS</b></h2> 
                    <p style="font-size:20px">airdss@hotmail.com</p> 
                </div>
            </div>

            <div class="tarjeta">
            <img src="../images/geolocalizacion.jpeg" alt="geolocaclizacion" style="width:98%;height:0%">
                <div class="container"> 
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1563.6810582511105!2d-0.5120104884887196!3d38.386875524109094!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd6236ba3945f62d%3A0x1102cf5dd16442ed!2sEdificio+15+-+Escuela+Politecnica+Superior+2%2C+03690+San+Vicente+del+Raspeig%2C+Alicante!5e0!3m2!1ses!2ses!4v1557606191375!5m2!1ses!2ses" width="200" height="200" frameborder="0" style="width:100%;height:98%" allowfullscreen></iframe>
                </div>
            </div>
        </div>
@endsection