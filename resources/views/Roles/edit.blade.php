@extends('template.master')

@section('contenido')
<div class="container">
    <h1>Editar Rol</h1>
    <form action="{{ route('roles.update', $rol->id) }}" method="POST">
        @csrf
        @method('PATCH')
        <label for="rol">rol</label>
        <input type="text" name="rol" id="rol" value="{{ old('rol', $rol->rol) }}" required>
        <br><br>
        <button type="submit">Actualizar Rol</button>
    </form>
    <br>
    <a href="{{ route('roles.index') }}" class="btn btn-secondary">Regresar</a>
</div>
@endsection