@extends('template.master')

@section('contenido')
<div class="container">
    <h1>Detalle del Vehículo</h1>
    <h2>placa: {{ $vehiculo->placa }}</h2>
    <h2>modelo: {{ $vehiculo->modelo }}</h2>
    <h2>marca: {{ $vehiculo->marca }}</h2>
    <h2>ID: {{ $vehiculo->id }}</h2>
    <br />
    <a href="{{ route('vehiculos.index') }}" class="btn btn-secondary">Regresar a los Vehículos</a>
</div>
@endsection