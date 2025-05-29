@extends('template.master')

@section('contenido')
<div class="container">
    <h1>Detalle de la Bodega</h1>
    <h2>id_empresa: {{ $bodega->id_empresa }}</h2>
    <h2>ubicación: {{ $bodega->ubicación }}</h2>
    <h2>latitud: {{ $bodega->latitud }}</h2>
    <h2>longitud: {{ $bodega->longitud }}</h2>
    <h2>ID: {{ $bodega->id }}</h2>
    <br />
    <a href="{{ route('bodegas.index') }}" class="btn btn-secondary">Regresar a las Bodegas</a>
</div>
@endsection