@extends('template.master')

@section('contenido')
<div class="container">
    <h1>Detalle de la Entidad</h1>
    <h2>id_pais: {{ $entidad->id_pais }}</h2>
    <h2>nombre: {{ $entidad->nombre }}</h2>
    <h2>status: {{ $entidad->status }}</h2>
    <h2>ID: {{ $entidad->id }}</h2>
    <br />
    <a href="{{ route('entidades.index') }}" class="btn btn-secondary">Regresar a las Entidades</a>
</div>
@endsection