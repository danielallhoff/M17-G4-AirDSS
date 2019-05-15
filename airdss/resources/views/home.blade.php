@extends('master')
@section('contenido')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-body">
                    @if (Auth::check())
                        <strong>Bienvenido/a, {{Auth::user()->name}}, tu sesión se ha iniciado</strong>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
