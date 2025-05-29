@extends('template.master')

@section('contenido')
<div class="container">
    <h1>Detalle del Rol</h1>
    <h2>rol: {{ $rol->rol }}</h2>
    <h2>ID: {{ $rol->id }}</h2>
    <br />
    <a href="{{ route('roles.index') }}" class="btn btn-secondary">Regresar a los Roles</a>
</div>
@endsection