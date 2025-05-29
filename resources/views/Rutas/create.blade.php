@extends('template.master')

@section('contenido')
<div class="container">
    <h1>Crear Ruta</h1>
    <form action="{{ route('rutas.store') }}" method="POST">
        @csrf
        <label for="nombre">nombre</label>
        <input type="text" name="nombre" id="nombre" required>
        <br><br>
        <label for="distancia">distancia</label>
        <input type="text" name="distancia" id="distancia" required>
        <br><br>
        <label for="tiempo_estimado">tiempo_estimado</label>
        <input type="text" name="tiempo_estimado" id="tiempo_estimado" required>
        <br><br>
        <button type="submit">Guardar Ruta</button>
    </form>
</div>
@endsection