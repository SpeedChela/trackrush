@extends('template.master')

@section('contenido')
<div class="container">
    <h1>Editar Municipio</h1>
    <form action="{{ route('municipios.update', $municipio->id) }}" method="POST">
        @csrf
        @method('PATCH')
        <label for="id_entidad">id_entidad</label>
        <select name="id_entidad" id="id_entidad" required>
            <option value="">Seleccionar ...</option>
            @foreach($entidades as $entidad)
                <option value="{{ $entidad->id }}" @if(old('id_entidad', $municipio->id_entidad) == $entidad->id) selected @endif>{{ $entidad->id }}</option>
            @endforeach
        </select>
        <br><br>
        <label for="nombre">nombre</label>
        <input type="text" name="nombre" id="nombre" value="{{ old('nombre', $municipio->nombre) }}" required>
        <br><br>
        <label for="status">status</label>
        <select name="status" id="status" required>
            <option value="">Seleccionar ...</option>
            <option value="1" @if(old('status', $municipio->status) == 1) selected @endif>Activo</option>
            <option value="0" @if(old('status', $municipio->status) == 0) selected @endif>Baja</option>
        </select>
        <br><br>
        <button type="submit">Actualizar Municipio</button>
    </form>
    <br>
    <a href="{{ route('municipios.index') }}" class="btn btn-secondary">Regresar</a>
</div>
@endsection