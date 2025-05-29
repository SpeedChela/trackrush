@extends('template.master')

@section('contenido')
<div class="container">
    <h1>Crear Estatus</h1>
    <form action="{{ route('estatus.store') }}" method="POST">
        @csrf
        <label for="bodega">bodega</label>
        <input type="text" name="bodega" id="bodega" required>
        <br><br>
        <label for="ruta">ruta</label>
        <input type="text" name="ruta" id="ruta" required>
        <br><br>
        <label for="entregado">entregado</label>
        <select name="entregado" id="entregado" required>
            <option value="">Seleccionar ...</option>
            <option value="1">Activo</option>
            <option value="0">Baja</option>
        </select>
        <br><br>
        <label for="devuelto">devuelto</label>
        <select name="devuelto" id="devuelto" required>
            <option value="">Seleccionar ...</option>
            <option value="1">Activo</option>
            <option value="0">Baja</option>
        </select>
        <br><br>
        <button type="submit">Guardar Estatus</button>
    </form>
</div>
@endsection