@extends('template.master')

@section('contenido')
<div class="container">
    <h1>Editar Bodega</h1>
    <form action="{{ route('bodegas.update', $bodega->id) }}" method="POST">
        @csrf
        @method('PATCH')
        <label for="id_empresa">id_empresa</label>
        <select name="id_empresa" id="id_empresa" required>
            <option value="">Seleccionar ...</option>
            @foreach($empresas as $empresa)
                <option value="{{ $empresa->id }}" @if(old('id_empresa', $bodega->id_empresa) == $empresa->id) selected @endif>{{ $empresa->id }}</option>
            @endforeach
        </select>
        <br><br>
        <label for="ubicación">ubicación</label>
        <input type="text" name="ubicación" id="ubicación" value="{{ old('ubicación', $bodega->ubicación) }}" required>
        <br><br>
        <label for="latitud">latitud</label>
        <input type="text" name="latitud" id="latitud" value="{{ old('latitud', $bodega->latitud) }}" required>
        <br><br>
        <label for="longitud">longitud</label>
        <input type="text" name="longitud" id="longitud" value="{{ old('longitud', $bodega->longitud) }}" required>
        <br><br>
        <button type="submit">Actualizar Bodega</button>
    </form>
    <br>
    <a href="{{ route('bodegas.index') }}" class="btn btn-secondary">Regresar</a>
</div>
@endsection