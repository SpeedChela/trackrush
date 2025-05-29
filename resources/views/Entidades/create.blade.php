@extends('template.master')

@section('contenido')
<div class="container">
    <h1>Crear Entidad</h1>
    <form action="{{ route('entidades.store') }}" method="POST">
        @csrf
        <label for="id_pais">País</label>
        <select name="id_pais" id="id_pais" required>
            <option value="">Seleccionar ...</option>
            @foreach($paises as $pais)
                <option value="{{ $pais->id }}">{{ $pais->nombre }}</option> <!-- Asegúrate de que 'nombre' sea un atributo válido -->
            @endforeach
        </select>
        <br><br>
        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" id="nombre" required>
        <br><br>
        <button type="submit">Guardar Entidad</button>
    </form>
</div>
@endsection