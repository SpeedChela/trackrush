@extends('template.master')

@section('contenido')
<div class="container">
    <h1>Detalle de la Entrega</h1>
    <h2>id_paquete: {{ $entrega->id_paquete }}</h2>
    <h2>id_driver: {{ $entrega->id_driver }}</h2>
    <h2>id_historico: {{ $entrega->id_historico }}</h2>
    <h2>ID: {{ $entrega->id }}</h2>
    <br />
    <a href="{{ route('entregas.index') }}" class="btn btn-secondary">Regresar a las Entregas</a>
</div>
@endsection