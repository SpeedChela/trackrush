@extends('template.master')

@section('contenido')
<div class="container">
    <h1>Crear Rol</h1>
    <form action="{{ route('roles.store') }}" method="POST">
        @csrf
        <label for="rol">rol</label>
        <input type="text" name="rol" id="rol" required>
        <br><br>
        <button type="submit">Guardar Rol</button>
    </form>
</div>
@endsection