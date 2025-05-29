@extends('template.master')

@section('contenido')
<div class="container">
    <h1>Editar Moderador</h1>
    <form action="{{ route('moderadores.update', $moderador->id) }}" method="POST">
        @csrf
        @method('PATCH')
        <label for="id_usuario">id_usuario</label>
        <select name="id_usuario" id="id_usuario" required>
            <option value="">Seleccionar ...</option>
            @foreach($usuarios as $usuario)
                <option value="{{ $usuario->id }}" @if(old('id_usuario', $moderador->id_usuario) == $usuario->id) selected @endif>{{ $usuario->id }}</option>
            @endforeach
        </select>
        <br><br>
        <label for="id_bodega">id_bodega</label>
        <select name="id_bodega" id="id_bodega" required>
            <option value="">Seleccionar ...</option>
            @foreach($bodegas as $bodega)
                <option value="{{ $bodega->id }}" @if(old('id_bodega', $moderador->id_bodega) == $bodega->id) selected @endif>{{ $bodega->id }}</option>
            @endforeach
        </select>
        <br><br>
        <button type="submit">Actualizar Moderador</button>
    </form>
    <br>
    <a href="{{ route('moderadores.index') }}" class="btn btn-secondary">Regresar</a>
</div>
@endsection