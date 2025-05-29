@extends('template.master')

@section('contenido')
<div class="container">
    <h1>Detalle del Historico</h1>
    <h2>fecha_entrada: {{ $historico->fecha_entrada }}</h2>
    <h2>fecha_salida: {{ $historico->fecha_salida }}</h2>
    <h2>id_estatus: {{ $historico->id_estatus }}</h2>
    <h2>comentarios: {{ $historico->comentarios }}</h2>
    <h2>ID: {{ $historico->id }}</h2>
    <br />
    <a href="{{ route('historico.index') }}" class="btn btn-secondary">Regresar a los Historico</a>
</div>
@endsection