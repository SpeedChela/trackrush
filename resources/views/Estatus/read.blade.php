@extends('template.master')

@section('contenido')
<div class="container">
    <h1>Detalle del Estatus</h1>
    <h2>bodega: {{ $estatus->bodega }}</h2>
    <h2>ruta: {{ $estatus->ruta }}</h2>
    <h2>entregado: {{ $estatus->entregado }}</h2>
    <h2>devuelto: {{ $estatus->devuelto }}</h2>
    <h2>ID: {{ $estatus->id }}</h2>
    <br />
    <a href="{{ route('estatus.index') }}" class="btn btn-secondary">Regresar a los Estatus</a>
</div>
@endsection