@extends('template.master')

@section('contenido')
<div class="container">
    <h1>Detalle del Paquete</h1>
    <h2>id_bodega: {{ $paquete->id_bodega }}</h2>
    <h2>guia: {{ $paquete->guia }}</h2>
    <h2>peso: {{ $paquete->peso }}</h2>
    <h2>estado: {{ $paquete->estado }}</h2>
    <h2>ID: {{ $paquete->id }}</h2>
    <br />
    <a href="{{ route('paquetes.index') }}" class="btn btn-secondary">Regresar a los Paquetes</a>
</div>
@endsection