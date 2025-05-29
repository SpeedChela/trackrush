@extends('template.master')

@section('contenido')
<div class="container">
    <h1>Editar Usuario</h1>
    <form action="{{ route('usuarios.update', $usuario->id) }}" method="POST">
        @csrf
        @method('PATCH')
        <label for="nombre">nombre</label>
        <input type="text" name="nombre" id="nombre" value="{{ old('nombre', $usuario->nombre) }}" required>
        <br><br>
        <label for="email">email</label>
        <input type="email" name="email" id="email" value="{{ old('email', $usuario->email) }}" required>
        <br><br>
        <label for="password">password</label>
        <input type="password" name="password" id="password">
        <br><br>
        <button type="submit">Actualizar Usuario</button>
    </form>
    <br>
    <a href="{{ route('usuarios.index') }}" class="btn btn-secondary">Regresar</a>
</div>
@endsection