@extends('template.master')

@section('contenido')
<div class="container">
    <h1>Crear Bodega</h1>
    <form action="{{ route('bodegas.store') }}" method="POST">
        @csrf
        <label for="id_empresa">id_empresa</label>
        <select name="id_empresa" id="id_empresa" required>
            <option value="">Seleccionar ...</option>
            @foreach($empresas as $empresa)
                <option value="{{ $empresa->id }}">{{ $empresa->id }}</option>
            @endforeach
        </select>
        <br><br>
        <label for="ubicación">ubicación</label>
        <input type="text" name="ubicación" id="ubicación" required>
        <br><br>
        <label for="latitud">latitud</label>
        <input type="text" name="latitud" id="latitud" required>
        <br><br>
        <label for="longitud">longitud</label>
        <input type="text" name="longitud" id="longitud" required>
        <br><br>
        <button type="submit">Guardar Bodega</button>
    </form>
</div>
@endsection