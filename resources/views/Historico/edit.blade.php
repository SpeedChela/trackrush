@extends('template.master')

@section('contenido')
<div class="container">
    <h1>Editar Historico</h1>
    <form action="{{ route('historico.update', $historico->id) }}" method="POST">
        @csrf
        @method('PATCH')
        <label for="fecha_entrada">fecha_entrada</label>
        <input type="text" name="fecha_entrada" id="fecha_entrada" value="{{ old('fecha_entrada', $historico->fecha_entrada) }}" required>
        <br><br>
        <label for="fecha_salida">fecha_salida</label>
        <input type="text" name="fecha_salida" id="fecha_salida" value="{{ old('fecha_salida', $historico->fecha_salida) }}" required>
        <br><br>
        <label for="id_estatus">id_estatus</label>
        <select name="id_estatus" id="id_estatus" required>
            <option value="">Seleccionar ...</option>
            @foreach($estatus as $estatu)
                <option value="{{ $estatu->id }}" @if(old('id_estatus', $historico->id_estatus) == $estatu->id) selected @endif>{{ $estatu->id }}</option>
            @endforeach
        </select>
        <br><br>
        <label for="comentarios">comentarios</label>
        <input type="text" name="comentarios" id="comentarios" value="{{ old('comentarios', $historico->comentarios) }}" required>
        <br><br>
        <button type="submit">Actualizar Historico</button>
    </form>
    <br>
    <a href="{{ route('historico.index') }}" class="btn btn-secondary">Regresar</a>
</div>
@endsection