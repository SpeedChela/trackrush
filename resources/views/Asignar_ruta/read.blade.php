@extends('template.master')

@section('contenido')
<div class="container">
    <h1>Detalle del Asignar_ruta</h1>
    <h2>id_driver: {{ $asignar_ruta->id_driver }}</h2>
    <h2>id_historico: {{ $asignar_ruta->id_historico }}</h2>
    <h2>ID: {{ $asignar_ruta->id }}</h2>
    <br />
    <a href="{{ route('asignar_ruta.index') }}" class="btn btn-secondary">Regresar a los Asignar_ruta</a>
</div>
@endsection