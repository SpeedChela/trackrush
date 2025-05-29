@extends('template.master')

@section('contenido')
<div class="container">
    <h1>Crear Historico</h1>
    <form action="{{ route('historico.store') }}" method="POST">
        @csrf
        <label for="fecha_entrada">fecha_entrada</label>
        <input type="text" name="fecha_entrada" id="fecha_entrada" required>
        <br><br>
        <label for="fecha_salida">fecha_salida</label>
        <input type="text" name="fecha_salida" id="fecha_salida" required>
        <br><br>
        <label for="id_estatus">id_estatus</label>
        <select name="id_estatus" id="id_estatus" required>
            <option value="">Seleccionar ...</option>
            @foreach($estatus as $estatu)
                <option value="{{ $estatu->id }}">{{ $estatu->id }}</option>
            @endforeach
        </select>
        <br><br>
        <label for="comentarios">comentarios</label>
        <input type="text" name="comentarios" id="comentarios" required>
        <br><br>
        <button type="submit">Guardar Historico</button>
    </form>
</div>
@endsection