@extends('template.master')

@section('contenido')
<div class="container">
    <h1>Editar Ruta</h1>
    <form action="{{ route('rutas.update', $ruta->id) }}" method="POST">
        @csrf
        @method('PATCH')
        <label for="nombre">nombre</label>
        <input type="text" name="nombre" id="nombre" value="{{ old('nombre', $ruta->nombre) }}" required>
        <br><br>
        <label for="distancia">distancia</label>
        <input type="text" name="distancia" id="distancia" value="{{ old('distancia', $ruta->distancia) }}" required>
        <br><br>
        <label for="tiempo_estimado">tiempo_estimado</label>
        <input type="text" name="tiempo_estimado" id="tiempo_estimado" value="{{ old('tiempo_estimado', $ruta->tiempo_estimado) }}" required>
        <br><br>
        <button type="submit">Actualizar Ruta</button>
    </form>
    <br>
    <a href="{{ route('rutas.index') }}" class="btn btn-secondary">Regresar</a>
</div>
@endsection