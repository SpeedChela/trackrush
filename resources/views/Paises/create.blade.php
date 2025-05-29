@extends('template.master')

@section('contenido')
<div class="container">
    <h1>Crear País</h1>
    <form action="{{ route('paises.store') }}" method="POST">
        @csrf
        <label for="nombre">nombre</label>
        <input type="text" name="nombre" id="nombre" required>
        <br><br>
        <label for="clave">clave</label>
        <input type="text" name="clave" id="clave" required>
        <br><br>
        <label for="estatus">estatus</label>
        <select name="estatus" id="estatus" required>
            <option value="">Seleccionar ...</option>
            <option value="1">Activo</option>
            <option value="0">Baja</option>
        </select>
        <br><br>
        <button type="submit">Guardar País</button>
    </form>
</div>
@endsection