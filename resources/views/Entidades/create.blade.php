@extends('template.master')

@section('contenido')
<div class="container">
    <h1>Crear Entidad</h1>
    <form action="{{ route('entidades.store') }}" method="POST">
        @csrf
        <label for="id_pais">id_pais</label>
        <select name="id_pais" id="id_pais" required>
            <option value="">Seleccionar ...</option>
            @foreach($paises as $pais)
                <option value="{{ $pais->id }}">{{ $pais->id }}</option>
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
        <button type="submit">Guardar Entidad</button>
    </form>
</div>
@endsection