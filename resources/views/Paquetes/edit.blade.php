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