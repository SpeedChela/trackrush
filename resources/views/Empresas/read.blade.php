@extends('template.master')

@section('contenido')
<div class="container">
    <h1>Detalle de la Empresa</h1>
    <h2>nombre: {{ $empresa->nombre }}</h2>
    <h2>ID: {{ $empresa->id }}</h2>
    <br />
    <a href="{{ route('empresas.index') }}" class="btn btn-secondary">Regresar a las Empresas</a>
</div>
@endsection