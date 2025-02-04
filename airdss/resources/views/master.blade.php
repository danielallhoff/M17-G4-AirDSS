<html>
    <head>
        <meta charset="UTF-8">
        <meta name="description" content="Web para compra de viajes">
        <meta name="keywords" content="airdss,flight,plane">
        <meta name="author" content="DavidRizoDevelopments">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <link rel="stylesheet" type="text/css" href="../../css/estilo.css"/>
    </head>
    <body>
    @include('menu')
    @if(Auth::check() && Auth::user()->esAdministrador() == 1)
        @section('submenu')
        @show
    @endif
    @section('contenido')     
    @show  
    @include('footer')
    </body>
</html>
