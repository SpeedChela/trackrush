@extends('template.master')

@section('contenido')
<div class="container">
    <h1>Crear Asignar_ruta</h1>
    <form action="{{ route('asignar_ruta.store') }}" method="POST">
        @csrf
        <label for="id_driver">id_driver</label>
        <select name="id_driver" id="id_driver" required>
            <option value="">Seleccionar ...</option>
            @foreach($asignarRuta as $driver)
                <option value="{{ $driver->id }}">{{ $driver->id }}</option>
            @endforeach
        </select>
        <br><br>
        <label for="id_historico">id_historico</label>
        <select name="id_historico" id="id_historico" required>
            <option value="">Seleccionar ...</option>
            @foreach($asignarRuta as $historico)
                <option value="{{ $historico->id }}">{{ $historico->id }}</option>
            @endforeach
        </select>
        <br><br>
        <button type="submit">Guardar Asignar_ruta</button>
    </form>
</div>
@endsection