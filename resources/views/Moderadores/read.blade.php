@extends('template.master')

@section('contenido')
<div class="container">
    <h1>Detalle del Moderador</h1>
    <h2>id_usuario: {{ $moderador->id_usuario }}</h2>
    <h2>id_bodega: {{ $moderador->id_bodega }}</h2>
    <h2>ID: {{ $moderador->id }}</h2>
    <br />
    <a href="{{ route('moderadores.index') }}" class="btn btn-secondary">Regresar a los Moderadores</a>
</div>
@endsection