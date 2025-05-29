@extends('template.master')

@section('contenido')
<div class="container">
    <h1>Crear Municipio</h1>
    <form action="{{ route('municipios.store') }}" method="POST">
        @csrf
        <label for="id_entidad">id_entidad</label>
        <select name="id_entidad" id="id_entidad" required>
            <option value="">Seleccionar ...</option>
            @foreach($entidades as $entidad)
                <option value="{{ $entidad->id }}">{{ $entidad->id }}</option>
            @endforeach
        </select>
        <br><br>
        <label for="nombre">nombre</label>
        <input type="text" name="nombre" id="nombre" required>
        <br><br>
        <label for="status">status</label>
        <select name="status" id="status" required>
            <option value="">Seleccionar ...</option>
            <option value="1">Activo</option>
            <option value="0">Baja</option>
        </select>
        <br><br>
        <button type="submit">Guardar Municipio</button>
    </form>
</div>
@endsection