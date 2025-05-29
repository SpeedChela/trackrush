@extends('template.master')

@section('contenido')
<div class="container">
    <h1>Editar Entidad</h1>
    <form action="{{ route('entidades.update', $entidad->id) }}" method="POST">
        @csrf
        @method('PATCH')
        <label for="id_pais">id_pais</label>
        <select name="id_pais" id="id_pais" required>
            <option value="">Seleccionar ...</option>
            @foreach($paises as $pais)
                <option value="{{ $pais->id }}" @if(old('id_pais', $entidad->id_pais) == $pais->id) selected @endif>{{ $pais->id }}</option>
            @endforeach
        </select>
        <br><br>
        <label for="nombre">nombre</label>
        <input type="text" name="nombre" id="nombre" value="{{ old('nombre', $entidad->nombre) }}" required>
        <br><br>
        <label for="status">status</label>
        <select name="status" id="status" required>
            <option value="">Seleccionar ...</option>
            <option value="1" @if(old('status', $entidad->status) == 1) selected @endif>Activo</option>
            <option value="0" @if(old('status', $entidad->status) == 0) selected @endif>Baja</option>
        </select>
        <br><br>
        <button type="submit">Actualizar Entidad</button>
    </form>
    <br>
    <a href="{{ route('entidades.index') }}" class="btn btn-secondary">Regresar</a>
</div>
@endsection