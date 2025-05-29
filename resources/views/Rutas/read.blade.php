@extends('template.master')

@section('contenido')
<div class="container">
    <h1>Detalle de la Ruta</h1>
    <h2>nombre: {{ $ruta->nombre }}</h2>
    <h2>distancia: {{ $ruta->distancia }}</h2>
    <h2>tiempo_estimado: {{ $ruta->tiempo_estimado }}</h2>
    <h2>ID: {{ $ruta->id }}</h2>
    <br />
    <a href="{{ route('rutas.index') }}" class="btn btn-secondary">Regresar a las Rutas</a>
</div>
@endsection