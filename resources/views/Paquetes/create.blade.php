<h1>Crear Paquete</h1>
<form action="/{str.lower(model)}" method="POST">
    @csrf
    <label>id_bodega:</label><input type="text" name="id_bodega" required><br><label>guia:</label><input type="text" name="guia" required><br><label>peso:</label><input type="text" name="peso" required><br><label>estado:</label><input type="text" name="estado" required><br>
    <button type="submit">Guardar</button>
</form>
<a href="/{str.lower(model)}">Volver al listado</a>
@extends('template.master')

@section('contenido')
<div class="container">
    <h1>Crear Paquete</h1>
    <form action="{{ route('paquetes.store') }}" method="POST">
        @csrf
        <label for="id_bodega">id_bodega</label>
        <select name="id_bodega" id="id_bodega" required>
            <option value="">Seleccionar ...</option>
            @foreach($bodegas as $bodega)
                <option value="{{ $bodega->id }}">{{ $bodega->id }}</option>
            @endforeach
        </select>
        <br><br>
        <label for="guia">guia</label>
        <input type="text" name="guia" id="guia" required>
        <br><br>
        <label for="peso">peso</label>
        <input type="text" name="peso" id="peso" required>
        <br><br>
        <label for="estado">estado</label>
        <input type="text" name="estado" id="estado" required>
        <br><br>
        <button type="submit">Guardar Paquete</button>
    </form>
</div>
@endsection