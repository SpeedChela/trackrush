@extends('template.master')

@section('contenido')
<div class="container">
    <h1>Editar Estatus</h1>
    <form action="{{ route('estatus.update', $estatus->id) }}" method="POST">
        @csrf
        @method('PATCH')
        <label for="bodega">bodega</label>
        <input type="text" name="bodega" id="bodega" value="{{ old('bodega', $estatus->bodega) }}" required>
        <br><br>
        <label for="ruta">ruta</label>
        <input type="text" name="ruta" id="ruta" value="{{ old('ruta', $estatus->ruta) }}" required>
        <br><br>
        <label for="entregado">entregado</label>
        <select name="entregado" id="entregado" required>
            <option value="">Seleccionar ...</option>
            <option value="1" @if(old('entregado', $estatus->entregado) == 1) selected @endif>Activo</option>
            <option value="0" @if(old('entregado', $estatus->entregado) == 0) selected @endif>Baja</option>
        </select>
        <br><br>
        <label for="devuelto">devuelto</label>
        <select name="devuelto" id="devuelto" required>
            <option value="">Seleccionar ...</option>
            <option value="1" @if(old('devuelto', $estatus->devuelto) == 1) selected @endif>Activo</option>
            <option value="0" @if(old('devuelto', $estatus->devuelto) == 0) selected @endif>Baja</option>
        </select>
        <br><br>
        <button type="submit">Actualizar Estatus</button>
    </form>
    <br>
    <a href="{{ route('estatus.index') }}" class="btn btn-secondary">Regresar</a>
</div>
@endsection