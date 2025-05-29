@extends('template.master')

@section('contenido')
<div class="container">
    <h1>Editar Asignar_ruta</h1>
    <form action="{{ route('asignar_ruta.update', $asignar_ruta->id) }}" method="POST">
        @csrf
        @method('PATCH')
        <label for="id_driver">id_driver</label>
        <select name="id_driver" id="id_driver" required>
            <option value="">Seleccionar ...</option>
            @foreach($drivers as $driver)
                <option value="{{ $driver->id }}" @if(old('id_driver', $asignar_ruta->id_driver) == $driver->id) selected @endif>{{ $driver->id }}</option>
            @endforeach
        </select>
        <br><br>
        <label for="id_historico">id_historico</label>
        <select name="id_historico" id="id_historico" required>
            <option value="">Seleccionar ...</option>
            @foreach($historicos as $historico)
                <option value="{{ $historico->id }}" @if(old('id_historico', $asignar_ruta->id_historico) == $historico->id) selected @endif>{{ $historico->id }}</option>
            @endforeach
        </select>
        <br><br>
        <button type="submit">Actualizar Asignar_ruta</button>
    </form>
    <br>
    <a href="{{ route('asignar_ruta.index') }}" class="btn btn-secondary">Regresar</a>
</div>
@endsection