@extends('template.master')

@section('contenido')
<div class="container">
    <h1>Detalle del Usuario</h1>
    <h2>nombre: {{ $usuario->nombre }}</h2>
    <h2>email: {{ $usuario->email }}</h2>
    <h2>ID: {{ $usuario->id }}</h2>
    <br />
    <a href="{{ route('usuarios.index') }}" class="btn btn-secondary">Regresar a los Usuarios</a>
</div>
@endsection